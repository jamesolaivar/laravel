<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('products', ProductController::class);
});

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

// Route::apiResource('products', ProductController::class);