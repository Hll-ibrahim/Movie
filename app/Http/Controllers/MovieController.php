<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('updated_at', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('front/index', compact('movies','categories'));
    }
    public function single($id) {
        $movie = Movie::findOrFail($id);
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('front/single', compact('movie','categories'));
    }
    public function create() {
        $movies = Movie::orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        $directors = Director::orderBy('id', 'ASC')->get();
        return view('back.movie.create', compact('movies','categories', 'directors'));
    }
    public function store(Request $request) {
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->image = $request->image;
        $movie->director_id = $request->director_id;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->created_at = now();
        $movie->updated_at = now();

        $movie->save();
        return redirect()->route('admin.movies');
    }

}
