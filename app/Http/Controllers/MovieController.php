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
        $request->validate([
            'update_name'=>'required',
            'update_director_id'=>'required',
            'update_rating'=>'required',
            'update_description'=>'required',
        ]);
        $movie = Movie::where('id',$request->update_id)->first();
        $categories = Category::orderBy('created_at', 'ASC')->get();

        // image dosyasinin yuklenmesi
        if($request->has("update_image")){
            // eger filmin zaten bir resmi varsa silinsin
            if (!is_null($movie->image)) {
                if (file_exists(public_path("documents/".$movie->id."/".$movie->image))) {
                    unlink(public_path("documents/".$movie->id."/".$movie->image));
                }
            }

            // yeni resim yuklensin
            $file = $request->file("update_image");
            $filePath = "documents/".$movie->id;
            if(!$file->move($filePath,$file->getClientOriginalName())){
                return response()->json(['Error'=>'Something wrong']);
            }
            $movie->image = $request->update_image->getClientOriginalName();
        }


        $movie->name = $request->update_name;
        $movie->director_id = $request->update_director_id;
        $movie->rating = $request->update_rating;
        $movie->description = $request->update_description;
        $movie->updated_at = now();
        $movie->save();


        foreach ($categories as $category){
            $updateKey = "update_" . $category->id;
            if($request->$updateKey == "on") {
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

        return response()->json(['Success'=>'Movie updated successfully']);
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
        $movie->director_id = $request->director_id;
        $movie->rating = $request->rating;
        $movie->description = $request->description;
        $movie->admin_id = Auth::user()->id;
        $movie->created_at = now();
        $movie->updated_at = now();
        $movie->save();

        // image dosyasinin yuklenmesi
        $file = $request->file("image");
        $filePath = "documents/".$movie->id;
        if(!$file->move($filePath,$file->getClientOriginalName())){
            return response()->json(['Error'=>'Something wrong']);
        }
        $movie->image = $request->image->getClientOriginalName();
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

    public function delete(Request $request) {
        $movie = Movie::find($request->id);

        // eger filmin bir resmi varsa silinsin
        if (!is_null($movie->image)) {
            if (file_exists(public_path("documents/".$movie->id."/".$movie->image))) {
                unlink(public_path("documents/".$movie->id."/".$movie->image));
            }
        }

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
