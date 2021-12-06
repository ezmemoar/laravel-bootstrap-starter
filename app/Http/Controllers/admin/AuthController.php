<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validatedForm = $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if(Auth::attempt($validatedForm)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username does not match our records',
            'password' => 'Password Incorrect',
        ]);
    }
}
