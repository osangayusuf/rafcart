<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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
Route::controller(UserController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::prefix('/login')->group(function () {
            // Show login page
            Route::get('/', 'login')->name('login');

            // Authenticate user details
            Route::post('/authenticate', 'authenticate');
        });
        Route::prefix('/register')->group(function () {
            // Show register page
            Route::get('/', 'register')->name('register');

            // Store user details
            Route::post('/', 'store');
        });
    });

    Route::middleware('auth')->group(function () {
        // Show account page
        Route::get('/account/{user}', 'showAccount')->name('account');

        // Log user out
        Route::post('/logout', 'logout');
    });

});

Route::controller(ProductController::class)->group(function () {
    // Show homepage
    Route::get('/', 'index');
    Route::redirect('/home', '/', 301);

    // Show shop page
    Route::get('/shop', 'shop');

    // Show product page
    Route::get('/product/{product}', 'productInfo');
});

Route::middleware('auth')->group(function () {
    // Cart resource route
    Route::resource('cart', CartController::class, );

    // Wishlist resource route
    Route::resource('wishlist', WishlistController::class);
});

Route::fallback(function () {
    return "Page not found";
});
