<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('category.create', compact('categories'));
    }
}
