<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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