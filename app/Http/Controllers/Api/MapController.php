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
        $cafeterias = Map::all();

        return view('map.index', compact('cafeterias'));
    }

    public function show($id)
    {
        $map = Map::findOrFail($id);

        return view('map.show')->with('map', $map);
    }

    public function store(Request $request)
    {
        $map = new Map;
        $map->name = $request->input('name');
        $map->description = $request->input('description');
        $map->left = $request->input('left');
        $map->top = $request->input('top');
        $map->save();

        return redirect()->route('map.index');
    }

    public function delete($id)
    {
        Map::destroy($id);

        return back();
    }
}
