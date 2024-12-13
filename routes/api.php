<?php
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::post('/cart', [CartController::class, 'add']);
Route::delete('/cart/{id}', [CartController::class, 'remove']);
Route::post('/order', [OrderController::class, 'placeOrder']);
Route::get('/orders', [OrderController::class, 'index']);

