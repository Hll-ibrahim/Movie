<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Director;
use App\Models\MoviesCategories;
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
    public function edit ($id) {
        $director = Director::find($id);
        $movies = Movie::all();
        return view('back.director.update',compact('director', 'movies'));
    }
    public function update(Request $request,$id) {
        $director = Director::find($id);
        $movies = Movie::all();

        $director->name = $request->name;
        $director->image = $request->image;
        $director->save();

        foreach ($movies as $movie){
            if($request->{$movie->id} == "on") {
                if($director->isDirected($movie->id)) {
                    continue;
                }
                else {
                    $movie->director_id = $director->id;
                }
            }
            else {
                if(($director->isDirected($movie->id))) {
                    $movie->director_id = 0;
                }
            }
            $movie->save();
        }
        return redirect()->route('admin.directors');
    }

    public function delete($id) {
        $director = Director::find($id);
        foreach($director->movies as $movie) {
            $movie->director_id = 1;
            $movie->save();
        }
        $director->delete();
        return redirect()->route('admin.directors');
    }

}
