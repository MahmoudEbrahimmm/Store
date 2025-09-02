<?php

use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CurrencyConverterController;
use App\Http\Controllers\Front\HomeConreoller;
use App\Http\Controllers\Front\PaymentsController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){

Route::get('mahmoud',function(){
    return view('mahmoud');
});

Route::get('/',[HomeConreoller::class,'index'])->name('home');

Route::get('products',[ProductsController::class,'index'])->name('products.index');
Route::get('products/{product:slug}',[ProductsController::class,'show'])->name('products.show');

Route::resource('cart', CartController::class);
Route::get('checkout',[CheckoutController::class,'create'])->name('checkout');
Route::post('checkout',[CheckoutController::class,'store']);

Route::post('currency',[CurrencyConverterController::class,'store'])
    ->name('currency.store');

});

Route::get('auth/{provider}/redirect', [SocialiteLoginController::class,'redirect'])
    ->name('auth.socilaite.redirect');
Route::get('auth/{provider}/callback', [SocialiteLoginController::class,'callback'])
    ->name('auth.socilaite.callback');

Route::get('orders/{order}/pay',[PaymentsController::class,'create'])
    ->name('orders.payments.create');
Route::post('orders/{order}/stripe/payment-intent',[PaymentsController::class,'createStripePaymentIntent'])
    ->name('stripe.paymentIntent.create');
Route::get('orders/{order}/pay/stripe/callback',[PaymentsController::class,'confirm'])
    ->name('stripe.return');


// require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
