<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('layout.login-register');
    }

    public function login(LoginRequest $request) {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('page.home');
        }

        return redirect()->route('auth.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('page.home');
    }


}
