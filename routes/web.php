<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/',[MovieController::class, 'index'])->name('index');
Route::get('/movie/{id}',[MovieController::class, 'single'])->name('single');
Route::get('/movie/category/{id}',[MovieController::class, 'category'])->name('movie.category');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::get('giris',[AuthController::class, 'login'])->name('login');
    Route::post('giris',[AuthController::class, 'loginPost'])->name('login.post');

    Route::get('kayit', [AuthController::class, 'register'])->name('register');
    Route::post('kayit', [AuthController::class, 'registerPost'])->name('register.post');

    Route::get('/cikis', [AuthController::class, 'logout'])->name('logout');
});


Route::prefix('admin')->name('admin.')->middleware('isUser')->group(function() {
    Route::get('/', [DashboardController::class, 'movies'])->name('home');

    Route::get('/movies',[DashboardController::class, 'movies'])->name('movies');
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/movie/store',[MovieController::class, 'store'])->name('movie.store');
    Route::post('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
    Route::get('/movie/{id}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::get('/movie/delete/{id}',[MovieController::class, 'delete'])->name('movie.delete');

    Route::get('/directors', [DashboardController::class, 'directors'])->name('directors');
    Route::get('/director/create', [DirectorController::class, 'create'])->name('director.create');
    Route::post('/director/store', [DirectorController::class, 'store'])->name('director.store');
    Route::get('/director/{id}',[DirectorController::class, 'edit'])->name('director.edit');
    Route::post('/director/{id}',[DirectorController::class, 'update'])->name('director.update');
    Route::get('/director/delete/{id}', [DirectorController::class, 'delete'])->name('director.delete');

    Route::resource('categories', CategoryController::class)->middleware('isUser');
});
