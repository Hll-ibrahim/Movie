<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MovieController::class, 'index'])->name('index');
Route::get('/movie/{id}',[MovieController::class, 'single'])->name('single');
Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/movie/store',[MovieController::class, 'store'])->name('movie.store');
    Route::get('/movies',[DashboardController::class, 'movies'])->name('movies');
    Route::get('/directors', [DashboardController::class, 'directors'])->name('directors');
});
Route::get('/{category_id}', [CategoryController::class, 'index'])->name('category.index');
