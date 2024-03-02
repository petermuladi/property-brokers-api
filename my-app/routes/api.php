<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokersController;
use App\Http\Controllers\PropertysController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');

// Protected route
Route::middleware(['auth:sanctum',])->group(function () {

    // User
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::resource('brokers', BrokersController::class)->only('update', 'destroy', 'store');
    Route::resource('property', PropertysController::class)->only('update', 'destroy', 'store');
});

// Poperty
Route::get('/property', [PropertysController::class,'index']);
Route::get('/property/{id}', [PropertysController::class,'show']);
// Brokers
Route::get('/brokers', [BrokersController::class,'index']);
Route::get('/brokers/{id}', [BrokersController::class,'show']);