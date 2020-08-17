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
        $file->move('file_upload', Str::lower($nameImage));
        $image = new ImageHouse();
        $image->url = 'file_upload/' . Str::lower($nameImage);
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

    public function search(Request $request)
    {
        $result = House::query();

        if ($request->keyword) {
            $result = $result->where('city', 'like', '%'.$request->keyword.'%')
                            ->orWhere('address','like', '%'.$request->keyword.'%')
                            ->orWhere('state','like', '%'.$request->keyword.'%')
                            ->orWhere('zip_code','like', '%'.$request->keyword.'%');
        }

        if ($request->type) {
            $result = $result->where('type', '=', $request->type);
        }


        if ($request->min_price) {
            $result = $result->where('price', '>=', $request->min_price);
        }

        if ($request->max_price) {
            $result = $result->where('price', '<=', $request->max_price);
        }

        if ($request->tab != 0) {
            $result = $result->where('status', '<=', $request->tab);
        }

        $houses = $result->get();
        return view('layout.houses.search', compact('houses'));
    }

    public function detail($id)
    {
        $house = House::findOrFail($id);
        $similarHouse = House::where('type', $house->type)->get();
        return view('layout.houses.detail', compact('house','similarHouse'));
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        return view('layout.houses.edit', compact('house'));
    }

    public function update(CreateHouseRequest $request, $id)
    {
        $house = House::findOrFail($id);
        $house->fill($request->all());
        $house->save();

        return back();
    }
}
