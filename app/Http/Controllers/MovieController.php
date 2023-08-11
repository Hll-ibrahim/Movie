<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Director;
use App\Models\MoviesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MovieController extends Controller
{
    // Front
    public function index() { // Front tarafındaki filmler
        $movies = Movie::orderBy('updated_at', 'ASC')->get();
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('front/index', compact('movies','categories'));
    }
    public function single($id) {
        $movie = Movie::findOrFail($id);
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('front/single', compact('movie','categories'));
    }

    // Back

    public function updatePost (Request $request) {
        $movie = Movie::where('id',$request->id)->first();
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
        $validatedData = $request->validate([
            'name'=>'required',
            'image'=>'required',
            'director_id'=>'required',
            'rating'=>'required',
            'description'=>'required',
        ]);
        $categories = Category::orderBy('id', 'ASC')->get();
        $movie = new Movie;

        $movie->name = $request->name;
        $movie->image = $request->image;
        $movie->director_id = $request->director_id;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->admin_id = Auth::user()->id;
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
        return response()->json(['Success'=>'Başarıyla Silindi']);
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
        return response()->json(['Success'=>'Başarıyla Silindi']);
    }

    public function category($id){
        $category = Category::find($id);
        $movies = $category->movies()->get();
        $categories = Category::all();
        return view('front/index', compact('movies','categories'));
    }
 /*
    public function update(Request $request){
        return Movie::where('id',$request->id)->get();
    }
*/
    public function update($id) {
        $movie = Movie::where('id',$id)->first();
        $directors = Director::all();
        $categories = Category::all();
        return view('back.movie.update',compact('movie','directors','categories'));
    }
}
