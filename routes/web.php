<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

// If we want to only include some routes only, we can use only():
// Route::resource('listing', ListingController::class)->only(['index', 'show', 'create', 'store']);

// If we want to exclude a route from a resource controller, we can use except() instead of only():
Route::resource('listing', ListingController::class)->except(['delete']);