<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\CreateHouseRequest;
use App\ImageHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

    public function upload(Request $request, $id)
    {
        $house = House::findOrFail($request->id);
        $file = $request->file;
        $nameImage = time() . '-' . str_replace(" ",'-', $file->getClientOriginalName());
        $file->move('file-upload', Str::lower($nameImage));
        $image = new ImageHouse();
        $image->url = 'file-upload/' . Str::lower($nameImage);
        $image->house_id = $house->id;
        $image->save();
    }

    public function delete($id)
    {
        $house = House::findOrFail($id);
        $house->images()->delete();
        $house->delete();
        Session::flash('delete_success', 'Delete Success!');
        return back();
    }
}
