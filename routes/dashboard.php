<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/index', [DashboardController::class,'index'])
->middleware('auth')
->name('dashboard');

Route::group([
    'middleware'=>['auth', 'verified'],
    'as'=>'dashboard.'

], function(){
    
    Route::resource('/dashboard/categories',CategoriesController::class);
});
