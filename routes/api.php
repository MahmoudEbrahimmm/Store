<?php

use App\Http\Controllers\Api\AccessTokensController;
use App\Http\Controllers\Api\DeleveriesController;
use App\Http\Controllers\Api\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Apiresource('products',ProductsController::class); // except('create','edit')

Route::post('auth/accecc-tokens',[AccessTokensController::class,'store'])
->middleware('guest:sanctum');
Route::delete('auth/accecc-tokens/{token?}',[AccessTokensController::class,'destroy'])
->middleware('guest:sanctum');

Route::get('deleveries/{delivery}',[DeleveriesController::class,'show']);
Route::put('deleveries/{delivery}',[DeleveriesController::class,'update']);