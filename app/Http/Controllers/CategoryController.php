<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('back.category.update',compact('category'));
    }
    public function update(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_at = now();
        $category->save();

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
}
