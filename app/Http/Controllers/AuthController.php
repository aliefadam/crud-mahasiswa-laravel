<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route("mahasiswa.index");
        }

        return redirect()->back()->with("message", "Username atau password Salah");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
