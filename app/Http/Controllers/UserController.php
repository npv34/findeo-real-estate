<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getMyHouse()
    {
        $houses = Auth::user()->houses;
        return view('layout.users.my-house', compact('houses'));
    }
}
