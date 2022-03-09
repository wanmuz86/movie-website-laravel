<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Movie;

class ActorController extends Controller
{
    //

    public function create(Request $request){
        $actor = new Actor();
        $actor->name = $request->name;
        $actor->pic_url = $request->pic_url;
        $actor->dob = $request->dob;
        if ($actor->save()){
            return response()->json(["success"=>true, "data"=>$actor]);
        }

    }

    public function getAll(){
        $actors = Actor::select(['id','name','pic_url','dob'])->get();
        return response()->json(["success"=>true,"data"=>$actors]);

    }

    public function getById($id){

        $actor = Actor::find($id);
        if ($actor){
            return response()->json(["success"=>true,"data"=>$actor]);
        }
        else {
            return response()->json(["success"=>false,"message"=>"Actor not found"]);
        }
    }
    
    public function update(Request $request, $id){

    }

    public function delete($id){

    }

    public function setMovies(Request $request, $id){
        $actor = Actor::find($id);
        if ($actor){
            $actor->movies()->detach();
            $actor->movies()->attach($request->movies);
            return response()->json(["success"=>true,"data"=>$actor]);
        }
        else {
            return response()->json(["success"=>false, "message"=>"Actor not found"]);
        }
    }
}
