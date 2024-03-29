<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\AcceptOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationReadController;

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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/hello', [IndexController::class, 'show'])->middleware('auth');

// If we want to only include some routes only, we can use only():
// Route::resource('listing', ListingController::class)->only(['index', 'show', 'create', 'store']);

// If we want to exclude a route from a resource controller, we can use except() instead of only():
// Route::resource('listing', ListingController::class)->except(['delete']);

Route::resource('listing', ListingController::class)
    ->only(['create', 'store', 'edit', 'update'])
    ->middleware('auth');

    
Route::resource('listing', ListingController::class)
    ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::resource('listing.offer', ListingOfferController::class)
    ->only(['store'])
    ->middleware('auth');

Route::resource('notification', NotificationController::class)
    ->only(['index'])
    ->middleware('auth');

Route::put('notification/{notification}/read', [NotificationReadController::class, '__invoke'])
    ->name('notification.read')
    ->middleware('auth');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('listing', RealtorListingController::class)
            // ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
            
            ->withTrashed();

        Route::name('offer.accept')->put('offer/{offer}/accept', AcceptOfferController::class);

        Route::resource('listing.image', RealtorListingImageController::class)
            ->only(['create', 'store', 'destroy']);
});