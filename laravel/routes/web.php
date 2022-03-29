<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UsersController;

Route::get('/', [DashboardController::class, 'index'])->name('admin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::resource('categories', CategoryController::class);
    Route::any('products/search', [ProductController::class, 'search'])->name('products.search');;
    Route::resource('products', ProductController::class);
    Route::resource('users', UsersController::class);
    Route::any('users/search', [UsersController::class, 'search'])->name('users.search');
});

Route::post('/register', function () {
    return view('auth.register');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
