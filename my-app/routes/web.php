<?php

use App\Http\Controllers\BrokersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertysController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Json Test UI

// Property.
Route::get('/property', [PropertysController::class, 'index']);
Route::get('/property/{id}', [PropertysController::class, 'show']);
// Brokers
Route::get('/brokers', [BrokersController::class, 'index']);
Route::get('/brokers/{id}', [BrokersController::class, 'show']);