<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Director;
use App\Models\MoviesCategories;
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
    public function edit($id) {
        $movie = Movie::findOrFail($id);
        $directors = Director::orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('back.movie.update',compact('movie', 'directors','categories'));
    }
    public function update(Request $request, $id) {
        $movie = Movie::find($id);
        $categories = Category::orderBy('created_at', 'ASC')->get();

        $movie->name = $request->name;
        $movie->image = $request->image;
        $movie->director_id = $request->director_id;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->updated_at = now();
        $movie->save();

        foreach ($categories as $category){
            if($request->{$category->id} == "on") {
                if($movie->isCategories($category->id)) {
                    continue;
                }
                else {
                    $movies_categories = new MoviesCategories;
                    $movies_categories->movies_id = $movie->id;
                    $movies_categories->categories_id = $category->id;
                    $movies_categories->save();
                }
            }
            else {
                if(($movie->isCategories($category->id))) {
                    $movies_categories = MoviesCategories::where('movies_id',$movie->id)->where('categories_id',$category->id);
                    $movies_categories->delete();
                }
            }
        }
        return redirect()->route('admin.movies');
    }
    public function store(Request $request) {
        $categories = Category::orderBy('id', 'ASC')->get();
        $movie = new Movie;

        $movie->name = $request->name;
        $movie->image = $request->image;
        $movie->director_id = $request->director_id;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->created_at = now();
        $movie->updated_at = now();
        $movie->save();
        foreach ($categories as $category){
            $id = $category->id;
            if($request->{$id} == "on") {
                $movies_categories = new MoviesCategories;
                $movies_categories->movies_id = $movie->id;
                $movies_categories->categories_id = $category->id;
                $movies_categories->save();
            }
        }
        return redirect()->route('admin.movies');
    }

    public function delete($id) {
        $movie = Movie::find($id);
        $categories = Category::orderBy('created_at','ASC')->get();
        foreach($categories as $category) {
            if($movie->isCategories($category->id)) {
                MoviesCategories::where('movies_id',$movie->id)->where('categories_id',$category->id)->delete();
            }
        }
        $movie->delete();
        return view('admin.movies');
    }

}
