<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ShowController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products/register', [RegisterController::class, 'index']);

Route::post('/products', [RegisterController::class, 'store']);

Route::get('/products', [IndexController::class, 'index']);

Route::get('/products/{:productId}', [IndexController::class, 'show']);

Route::post('/products/detail/{:productId}', [IndexController::class, 'show']);

Route::get('products/search', [IndexController::class, 'search']);

Route::get('/products/detail', [ShowController::class, 'index']);

Route::patch('/products/detail/update', [ShowController::class, 'update']);

Route::delete('/products/detail/delete', [ShowController::class, 'destroy']);
