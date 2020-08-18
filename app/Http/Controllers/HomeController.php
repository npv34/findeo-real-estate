<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $houses = House::latest()->take(8)->get();
        return view('layout.home', compact('houses'));
    }

    public function contact(){
        return view('layout.contact');
    }
}
