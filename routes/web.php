<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsListController;
use App\Http\Controllers\ViewCartController;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductsListController::class)
    ->name('products');

Route::get('/add-to-cart/{product}/{count}', AddToCartController::class)
    ->where('count', '[0-9]+')
    ->name('add-to-cart');

Route::get('/cart', ViewCartController::class)
    ->name('cart');

Route::middleware('auth:sanctum')
    ->get('/checkout', [CheckoutController::class, 'show'])
    ->name('checkout');

Route::get('/checkout/success', [CheckoutController::class, 'success'])
    ->name('checkout.success');

Route::get('/checkout/cancelled', [CheckoutController::class, 'cancelled'])
    ->name('checkout.cancelled');
