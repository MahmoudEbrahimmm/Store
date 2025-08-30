<?php
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsContrller;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard/index', [DashboardController::class,'index'])
->middleware('auth','verified','auth.type:super-admin,admin')
->name('dashboard');

Route::group([
    'middleware'=>['auth', 'verified','auth.type:super-admin,admin'],
    'as'=>'dashboard.'

], function(){
    Route::get('profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('profile',[ProfileController::class,'update'])->name('profile.update');

    Route::get('categories/trash', [CategoriesController::class,'trash'])->name('categories.trash');
    Route::put('categories/{category}/restore', [CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{category}/force-delete', [CategoriesController::class,'force-delete'])->name('categories.force-delete');
    Route::resource('dashboard/categories',CategoriesController::class);

    Route::resource('dashboard/products',ProductsContrller::class);

    // Route::get('roles/trash', [RolesController::class,'trash'])->name('roles.trash');
    // Route::put('roles/{role}/restore', [RolesController::class,'restore'])->name('role.restore');
    // Route::delete('roles/{role}/force-delete', [RolesController::class,'force-delete'])->name('roles.force-delete');
    Route::resource('dashboard/roles',RolesController::class);
});
