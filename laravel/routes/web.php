<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;


Route::post('/admin', function () {
    
})->name('admin');


Route::any('admin/categories/search', [CategoryController::class, 'search'])->name('categories.search');
Route::resource('admin/categories', CategoryController::class);
Route::get('/home', function () {
    return view('home');
});

Route::post('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
