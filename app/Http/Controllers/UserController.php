<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

