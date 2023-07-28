<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // SHOW REGISTER VIEW
    public function register () {
        return view('pages.register');
    }

    // STORE USER DETAILS
    public function store (CreateUserRequest $request) {
        $formFields = $request->validated();

        if ($request->hasFile('profile_image')) {
            $origExt = $request->file('profile_image')->getClientOriginalExtension();
            $filename = 'profile_image_' . $formFields['name'] . '.' . $origExt;
            $request->file('profile_image')->storeAs('profile-images', $filename);

            $formFields['profile_image'] = $filename;
        }

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
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($credentials, $request->boolean('remember'))) {
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

