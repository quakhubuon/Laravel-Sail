<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiCategoryController;
use App\Http\Controllers\apiProductController;
use App\Http\Controllers\apiUserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::resource('categories', apiCategoryController::class);
    Route::resource('products', apiProductController::class);
    Route::resource('users', apiUserController::class);



