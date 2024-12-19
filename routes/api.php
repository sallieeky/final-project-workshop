<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('warehouses', \App\Http\Controllers\WarehouseController::class);
Route::resource('inventories', \App\Http\Controllers\InventoryController::class);
