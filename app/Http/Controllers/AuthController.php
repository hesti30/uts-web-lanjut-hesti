<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        // validasi request (inputan)
        $credentials = $request->validate([
            'email' => ['required', 'string', 'max:50', 'email'],
            'password' => ['required', Rules\Password::defaults()]
        ]);

        // validasi apakah data request (input) sesuai dengan database
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('adminindex');
        }

        // error jika terdapat kesahalan data pada database dengan request atau inputan data
        return back()->withErrors([
            'email' => 'Email and Password are invalid'
        ])->onlyInput('email');
    }

    // function untuk logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
