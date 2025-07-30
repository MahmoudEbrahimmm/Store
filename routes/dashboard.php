<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsContrller;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/index', [DashboardController::class,'index'])
->middleware('auth','auth.type:admin,user')
->name('dashboard');

Route::group([
    'middleware'=>['auth', 'verified','auth.type:admin'],
    'as'=>'dashboard.'

], function(){
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');

    Route::get('/categories/trash', [CategoriesController::class,'trash'])->name('categories.trash');
    Route::put('/categories/{category}/restore', [CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('/categories/{category}/force-delete', [CategoriesController::class,'force-delete'])->name('categories.force-delete');
    Route::resource('/dashboard/categories',CategoriesController::class);

    Route::resource('/dashboard/products',ProductsContrller::class);
});
