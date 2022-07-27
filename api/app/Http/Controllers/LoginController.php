<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller

{
    /**
     * The laravel_session cookie token is returned in the headers and is automatically
     * absorbed into an HTTP-compliant Ajax interface; no token handling necessary here.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['Bad login']);
        }

        return $request->user();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response(200);
    }
}
