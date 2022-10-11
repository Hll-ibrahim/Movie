<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MoviesCategories;
use Illuminate\Http\Request;
use App\Models\Movie;

class CategoryController extends Controller
{
    public function index($id) {
        $categories = Category::orderBy('id', 'ASC')->get();
        $category = Category::findOrFail($id);
        return view('front.category', compact( 'categories', 'category'));
    }

    public function create() {
        $categories = Category::orderBy('id', 'ASC')->get();
        return view('back.category.create', compact('categories'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $movies = Movie::all();
        return view('back.category.update',compact('category', 'movies'));
    }

    public function update(Request $request, $id) {
        $category = Category::find($id);
        $movies = Movie::all();
        $category->name = $request->name;
        $category->updated_at = now();
        $category->save();

        foreach ($movies as $movie){
            if($request->{$movie->id} == "on") {
                if($category->isCategories($movie->id)) {
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
        return redirect()->route('admin.categories');
    }

    public function store(Request $request) {
        $category = new Category;
        $category->name = $request->name;
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();
        return redirect()->route('admin.categories');
    }

    public function delete($id) {
        $category = Category::find($id);
        foreach($category->movies as $movie) {
            MoviesCategories::where('movies_id', $movie->id)->where('categories_id', $category->id)->delete();
        }
        $category->delete();
        return redirect()->route('admin.categories');
    }
}
