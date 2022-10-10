<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MovieController::class, 'index'])->name('index');
Route::get('/movie/{id}',[MovieController::class, 'single'])->name('single');

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/movies',[DashboardController::class, 'movies'])->name('movies');
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/movie/store',[MovieController::class, 'store'])->name('movie.store');
    Route::post('/movie/{id}', [MovieController::class, 'update'])->name('movie.update');
    Route::get('/movie/{id}', [MovieController::class, 'edit'])->name('movie.edit');

    Route::get('/directors', [DashboardController::class, 'directors'])->name('directors');
    Route::get('/director/create', [DirectorController::class, 'create'])->name('director.create');
    Route::post('/director/store', [DirectorController::class, 'store'])->name('director.store');

    Route::get('/categories',[DashboardController::class, 'categories'])->name('categories');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
});
Route::get('/{category_id}', [CategoryController::class, 'index'])->name('category.index');
