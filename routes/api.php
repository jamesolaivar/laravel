<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/products', [ProductController::class,'index'])
        ->middleware('permission:view product');

    Route::post('/products', [ProductController::class,'store'])
        ->middleware('permission:create product');

    Route::put('/products/{product}', [ProductController::class,'update'])
        ->middleware('permission:edit product');

    Route::delete('/products/{product}', [ProductController::class,'destroy'])
        ->middleware('permission:delete product');

});