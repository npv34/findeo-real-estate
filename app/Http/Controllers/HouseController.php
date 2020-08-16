<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\CreateHouseRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function create()
    {
        return view('layout.houses.add');
    }

    public function uploadFile(Request $request)
    {
        dd($request->all());
    }

    public function store(CreateHouseRequest $request)
    {
        $house = new House();
        $house->fill($request->all());
        $house->save();

        $res = [
            'status' => 'success',
            'message' => 'Create success'
        ];
        return response()->json($res);
    }
}
