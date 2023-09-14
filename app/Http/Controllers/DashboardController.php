<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    public function index() { // Arka tarafta admin için listelenen filmler
        $movies = Movie::orderBy('rating', 'DESC')->get();
        $directors = Director::all();
        return view('back.dashboard',compact('movies'));
    }

    public function movies_fetch()
    {
        $movies = Movie::where('admin_id',Auth::user()->id)->get();
        return DataTables::of($movies)
            ->addColumn('crud', function ($data) {
                return ' <a class="btn btn-info" href="'.route('admin.movie.update',$data->id).'">' . '<i class="fa-sharp fa-solid fa-pen"></i></a>
                         <button onclick="movieDelete (' . $data->id . ')" class="btn btn-danger"><i class="fa-solid fa-trash""></i></button>';
            })->editColumn('image',function($data) {
                return '<img src="'.$data->image.'" height="150">';
            })->editColumn('director_id',function($data) {
                return $data->director->name;
            })->addColumn('categories',function($data) {
                $categories = '';
                foreach ($data->categories as $category){
                    $categories .= ' '.$category->name.' ';
                }
                return $categories;
            })->editColumn('rating',function($data) {
                return $data->rating.'/10';
            })->rawColumns(['crud','image','director_id','categories','rating'])->make();
    }



    public function movies() {
        $movies = Movie::orderBy('created_at', 'ASC')->get();
        $directors = Director::all();
        $categories = Category::all();
        return view('back/movie/index', compact('movies','directors','categories'));
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
