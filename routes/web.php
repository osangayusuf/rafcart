<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
        // Show login page
        Route::get('/login', 'login')->name('login');

        // Authenticate user details
        Route::post('/login/authenticate', 'authenticate');

        // Show register page
        Route::get('/register', 'register');

        // Store user details
        Route::post('/register', 'store');
    });

    Route::middleware('auth')->group(function () {
        // Show account page
        Route::get('/account/{user}', 'showAccount')->name('account');

        // Show wishlist page
        Route::get('/wishlist/{user}', 'showWishlist')->name('wishlist');

        // Add product to wishlist
        Route::get('/wishlist/{user}/add/{product}', 'addToWishlist');

         // Show cart page
         Route::get('/cart/{user}', 'showCart')->name('cart');

         // Delete product from cart
         Route::post('/cart/{user}/delete/{cart}', 'deleteFromCart');

         // Add product to cart
         Route::get('/cart/{user}/add/{product}', 'addToCart');

        // Log user out
        Route::post('/logout', 'logout');
    });

});

Route::controller(ProductController::class)->group(function () {
    // Show homepage
    Route::get('/', 'index');
    Route::get('/home', 'index');

    // Show shop page
    Route::get('/shop', 'shop');

    // Show product page
    Route::get('/product/{product}', 'showProduct');
});

