<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(Request $request){
    return "Hello API";
});

Route::get('/goodbye/{name}', function(Request $request, $name){
    return "Goodbye ".$name;
});

Route::post('/info', function (Request $request){
    return "Hello ".$request["name"]
    ." You are ".$request["age"]." years old";
});

Route::post('/movies',[MovieController::class,'create']);

Route::get('/movies',[MovieController::class,'getAll']);

Route::get('/movies/{id}',[MovieController::class,'getById']);

Route::put('/movies/{id}',[MovieController::class,'update']);

Route::delete('/movies/{id}',[MovieController::class,'delete']);

Route::post('/actors',[ActorController::class, 'create']);
Route::get('/actors',[ActorController::class,'getAll']);
Route::get('/actors/{id}',[ActorController::class,'getById']);
Route::put('/actors/{id}',[ActorController::class,'update']);
Route::delete('/actors/{id}',[ActorController::class,'delete']);

Route::post('/categories',[CategoryController::class,'create']);
Route::get('/categories',[CategoryController::class,'getAll']);
Route::get('/categories',[CategoryController::class,'getById']);
