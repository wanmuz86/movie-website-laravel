<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function create(Request $request){
        $category = new Category();
        $category->name = $request->name;
        if ($category->save()){
            return response()->json(["success"=>true, "data"=>$category]);
        }

    }

    public function getAll(){
        $categories = Category::all();
        return response()->json(["success"=>true, "data"=>$categories]);
    }
    
    public function getById($id){
        $category = Category::find($id);
        if ($category){
            return response()->json(["success"=>true,"data"=>$category]);
        }
        else {
            return response()->json(["success"=>false,"message"=>"Category not found"]);

        }

    }
    
    public function getMovies($id){
        $category = Category::find($id);
        if ($category){
            return response()->json(["success"=>true,"data"=>$category->movies]);
        }
        else {
            return response()->json(["success"=>false,"message"=>"Category not found"]);
        }
    }
}
