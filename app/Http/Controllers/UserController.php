<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\ImageHouse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getMyHouse()
    {
        $houses = Auth::user()->houses;
        return view('layout.users.my-house', compact('houses'));
    }

    public function getMyProfile()
    {
        $userLogin = Auth::user();
        return view('layout.users.my-profile', compact('userLogin'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $userLogin = User::findOrFail(Auth::id());
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $nameImage = time() . '-' . str_replace(" ",'-', $file->getClientOriginalName());
            $file->move('avatar', Str::lower($nameImage));
            $userLogin->avatar = 'avatar/' . Str::lower($nameImage);
        }
        $userLogin->phone = $request->phone;
        $userLogin->facebook = $request->facebook;
        $userLogin->save();

        return back();
    }
}
