<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('customers', [CustomersController::class, 'index']);
Route::get('customer/{customersId}', [CustomersController::class, 'show']);
Route::put('customers/{customersId}/update', [CustomersController::class, 'update']);
Route::get('customers/{customersId}/delete', [CustomersController::class, 'destroy']);
