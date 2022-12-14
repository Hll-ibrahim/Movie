<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index() {
        $movies = Movie::orderBy('rating', 'DESC')->get();
        return view('back.dashboard',compact('movies'));
    }
    public function movies() {
        $movies = Movie::orderBy('created_at', 'ASC')->get();
        return view('back/movie/index', compact('movies'));
    }
    public function directors() {
        $directors = Director::orderBy('created_at', 'ASC')->get();
        return view('back/director/index',compact('directors'));
    }
    public function categories() {
        $categories = Category::orderBy('created_at','ASC')->get();
        return view('back/category/index',compact('categories'));
    }
}
