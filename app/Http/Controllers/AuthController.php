<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('layout.login-register');
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('page.home');
        }

        Session::flash('login-error','The account or password does not exist!');
        return redirect()->route('auth.showFormLogin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('page.home');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password1);
        $user->role = RoleConstant::USER;
        $user->save();
        Session::flash('register-success','Register for a successful account');
        return redirect()->route('auth.showFormLogin');
    }

}
