<?php

use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\CartController as ApiCartController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;

Route::prefix('api')->group(function () {

    Route::get('products', [ApiProductController::class, 'index'])->name('api.products.index');
    
    Route::get('cart', [ApiCartController::class, 'index'])->name('api.cart.index');
    Route::post('cart/add/{id}', [ApiCartController::class, 'add'])->name('api.cart.add');
    Route::post('cart/remove/{id}', [ApiCartController::class, 'remove'])->name('api.cart.remove');
    
    Route::get('order/summary', [ApiOrderController::class, 'summary'])->name('api.order.summary');
    Route::post('order/place', [ApiOrderController::class, 'placeOrder'])->name('api.order.place');

});
