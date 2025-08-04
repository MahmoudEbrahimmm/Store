<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeConreoller;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeConreoller::class,'index'])->name('home');

Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/{product:slug}',[ProductsController::class,'show'])->name('products.show');

Route::resource('cart',CartController::class);

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
