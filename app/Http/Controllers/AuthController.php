<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('layout.login-register');
    }
}
