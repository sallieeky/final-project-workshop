<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('v1/products', \App\Http\Controllers\ProductController::class);
Route::resource('v1/warehouses', \App\Http\Controllers\WarehouseController::class);
Route::resource('v1/inventories', \App\Http\Controllers\InventoryController::class);
