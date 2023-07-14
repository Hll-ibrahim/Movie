<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MoviesCategories;
use Illuminate\Http\Request;
use App\Models\Movie;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request) {

        $categories = Category::latest()->get();

        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCategory">Edit</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-name="'.$row->name.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteCategory">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.category.index', compact( 'categories'));
    }


    public function edit($id){
        $category = Category::find($id);
        return response()->json($category);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);
        Category::updateOrCreate(['id' => $request->category_id],
            ['name' => $request->name]);
        return response()->json(['Success' => 'Success']);

    }

    public function destroy($id) {
        $category = Category::find($id);
        foreach($category->movies as $movie) {
            MoviesCategories::where('movies_id', $movie->id)->where('categories_id', $category->id)->delete();
        }
        $category->delete();
        return response()->json(['success'=>'Category deleted successfully.']);
    }
}
