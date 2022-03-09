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
        $movie->director = 1;
        $movie->category = 1;
        if ($movie->save()){
            return response()->json(["success"=>true, "data"=>movie]);
        }

    }

    public function getAll(Request $request){

    }

    public function getById(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

    public function delete(Request $request, $id){

    }
}
