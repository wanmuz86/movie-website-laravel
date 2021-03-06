<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    //

    public function create(Request $request){

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->poster_url = $request->poster_url;
        $movie->synopsis = $request->synopsis;
        $movie->video_url = $request->video_url;
        $movie->year = $request->year;
        $movie->director_id = 1;
        $movie->category_id = 1;
        // When this is called, the SQL function INSERT INTO movies ... will happen
        // Eloquent is calling method (save/ get/ find/ update/ findById) , 
        // instead of SQL Query INSERT INTO, SELECT * , SELECT * ..., UPDATE .., DELETE
        if ($movie->save()){
            return response()->json(["success"=>true, "data"=>$movie]);
        }

    }

    public function getAll(Request $request){
        $movies = Movie::get();
        return response()->json(["success"=>true,"data"=>$movies]);
    }

    public function getById(Request $request, $id){
        $movie = Movie::with('actors')->with('category')->find($id);
        return response()->json(["success"=>true,"data"=>$movie]);
    }

    public function update(Request $request, $id){
        $movie = Movie::find($id);
        if ($movie){
            // THis line of code, which is fill , required you to add the fillable property in Movie.php
            $updated = $movie->fill($request->all())->save();
            if ($updated){
                return response()->json(["success"=>true,"movie"=>$movie]);
            }
            else {
                return response()->json(["success"=>false,"message"=>"Cannot saved"]);
            }
        }
        else {
            return response()->json(["success"=>false, "message"=>"Movie not found"]);
        }
    }

    public function delete(Request $request, $id){
        $movie = Movie::find($id);
        if ($movie){
            if($movie->delete()){
                return response()->json(["success"=>true,"message"=>"Movie succesfully deleted"]);
            }
            else {
                return response()->json(["success"=>false,"message"=>"Cannot be deleted"]);
            }
        }
        else {
            return response()->json(["success"=>false,"message"=>"Movie not found"]);
        }
    }
}
