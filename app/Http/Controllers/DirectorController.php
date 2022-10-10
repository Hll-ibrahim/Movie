<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function create() {
        return view('back.director.create');
    }
    public function store(Request $request) {
        $director = new Director;
        $director->name = $request->name;
        $director->image = $request->image;
        $director->created_at = now();
        $director->updated_at = now();
        $director->save();
        return redirect()->route('admin.directors');
    }
}
