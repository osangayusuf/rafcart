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
        Route::get('/account/{user}', 'showAccount');

        // Show wishlist page
        Route::get('/wishlist/{user}', 'showWishlist');

        // Add product to wishlist/cart
        Route::get('/wishlist/{user}/add/{product}', 'addToWishlist');

         // Show cart page
         Route::get('/cart/{user}', 'showCart');

         // Add product to wishlist/cart
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
// // SHOW HOMEPAGE
// Route::get('/', [ProductController::class, 'index']);

// // SHOW SHOP PAGE
// Route::get('/shop', [ProductController::class, 'shop']);

// // SHOW PRODUCT PAGE
// Route::get('/product/{product}', [ProductController::class, 'showProduct']);

// // SHOW LOGIN PAGE
// Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// // AUTHENTICATE USER DETAILS
// Route::post('/login/authenticate', [UserController::class, 'authenticate']);

// // SHOW REGISTER PAGE
// Route::get('/register', [UserController::class, 'register']);

// // STORE USER DETAILS
// Route::post('/register', [UserController::class, 'store']);

// // LOG USER OUT
// Route::post('/logout', [UserController::class, 'logout']);

// // SHOW ACCOUNT PAGE
// Route::get('/account/{user}', [UserController::class, 'showAccount']);

// // SHOW WISHLIST PAGE
// Route::get('/wishlist/{user}', [UserController::class, 'showWishlist']);

// // ADD PRODUCT TO WISHLIST/CART
// Route::get('/wishlist/{user}/add/{product}', [UserController::class, 'addToWishlist']);
