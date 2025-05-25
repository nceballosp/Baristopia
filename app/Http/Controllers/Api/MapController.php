<?php

// JJVG

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index');
    }

    public function show($id)
    {
        $map = Map::findOrFail($id);
        return view('map.show')->with('map', $map);
    }

    public function store(Request $request)
    {
        $map = new Map();
        $map->setName($request->input('name'));
        $map->setDescription($request->input('description'));
        $map->setAddress($request->input('address'));
        $map->setLatitude($request->input('latitude'));
        $map->setLongitude($request->input('longitude'));
        $map->setPhone($request->input('phone'));
        $map->setOpeningHours($request->input('opening_hours'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('maps', 'public');
            $map->setImage($imagePath);
        }

        $map->save();

        return redirect()->route('map.index');
    }

    public function delete($id)
    {
        Map::destroy($id);
        return back();
    }
}
