<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/index', [DashboardController::class,'index'])
->middleware(['auth', 'verified'])
->name('dashboard');


Route::get('/dashboard/categories',[CategoriesController::class,'index'])
->name('categories');
Route::get('/categories/create',[CategoriesController::class,'create'])
->name('categories.create');
Route::post('/categories/store',[CategoriesController::class,'store'])
->name('categories.store');
Route::get('/categories/edit',[CategoriesController::class,'edit'])
->name('categories.edit');
