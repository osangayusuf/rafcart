<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // SHOW REGISTER VIEW
    public function register () {
        return view('pages.register');
    }

    // STORE USER DETAILS
    public function store (Request $request) {
        $formFields = $request->validate([
            'name' => 'min:3|max:64|required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        Auth::login($user);

        return redirect('/')->with('message', 'Created account successfully');

    }

    // SHOW LOGIN PAGE
    public function login () {
        return view('pages.login');
    }

    // AUTHENTICATE USER DETAILS
    public function authenticate (Request $request) {
        // dd($request->post());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->remember ?? false;

        if(auth()->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Login successful');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    // LOG USER OUT
    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }

    // SHOW USER ACCOUNT PAGE
    public function showAccount (User $user) {
        return view('pages.account', [
            'user' => $user
        ]);
    }

    // SHOW USER WISHLIST PAGE
    public function showWishlist (User $user) {
        $wishlist_ids = explode(',', $user['wishlist']);

        return view('pages.wishlist', [
            'user' => $user,
            'wishlist_products' => Product::all()->find($wishlist_ids)
        ]);
    }

    // ADD PRODUCT TO USERS WISHLIST
    public function addToWishlist(User $user, Product $product){
        if($user['wishlist']) {
            $user['wishlist'] = $user['wishlist'] . ',' . $product['id'];
            $wishlist = array_unique(explode(',', $user['wishlist']));
            $user['wishlist'] = join(',',$wishlist);
        } else {
            $user['wishlist'] = $product['id'];
        }

        $user->save();

        return redirect('/wishlist/' . $user->id)->with('message', $product->name . ' added to wishlist');
    }

    // SHOW USER CART PAGE
    public function showCart (User $user) {
        $cart_ids = explode(',', $user['cart']);

        return view('pages.cart', [
            'user' => $user,
            'cart_items' => Product::all()->find($cart_ids)
        ]);
    }

    // ADD PRODUCT TO USERS CART
    public function addToCart(User $user, Product $product){
        if($user['cart']) {
            $user['cart'] = $user['cart'] . ',' . $product['id'];
            $cart = array_unique(explode(',', $user['cart']));
            $user['cart'] = join(',',$cart);
        } else {
            $user['cart'] = $product['id'];
        }

        $user->save();

        return redirect('/cart/' . $user->id)->with('message', $product->name . ' added to cart');
    }
}
