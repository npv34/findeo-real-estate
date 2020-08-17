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
        $house = House::findOrFail($request->id);
        return view('layout.houses.upload-file', compact('house'));
    }

    public function store(CreateHouseRequest $request)
    {
        $house = new House();
        $house->fill($request->all());
        $house->save();

        $res = [
            'status' => 'success',
            'message' => 'Create success',
            'house_id' => $house->id
        ];
        return response()->json($res);
    }

    public function upload(Request $request)
    {
        dd($request->all());
    }
}
