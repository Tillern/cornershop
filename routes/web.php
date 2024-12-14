<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/{$id}', [ProductController::class, 'show']) -> name('admin.products.show');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::resource('categories', CategoryController::class);
    
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/{category}',[CategoryController::class, 'show']) -> name('admin.categories.show');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.dashboard');

    Route::get('products', [CustomerController::class, 'viewProducts'])->name('customer.products.index');
    
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    
    Route::get('order-summary', [OrderController::class, 'orderSummary'])->name('order.summary');
    Route::post('place-order', [OrderController::class, 'placeOrder'])->name('order.place');
    Route::get('orders', [OrderController::class, 'userOrders'])->name('customer.orders.index');
    Route::get('orders/{order}', [OrderController::class, 'show'])->name('customer.orders.show');
});