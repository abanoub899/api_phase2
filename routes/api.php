<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\StudentController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// api login and register routes
Route::post("register",[StudentController::class,"register"]);
Route::post("login",[StudentController::class,"login"]);

// route group
Route::group(["middleware"=>["auth:sanctum"]],function(){
Route::get("profile",[StudentController::class,"profile"]);
Route::get("logout",[StudentController::class,"logout"]);
Route::post("createProject",[ProjectController::class,"createProject"]);
Route::get("listProject",[ProjectController::class,"listProject"]);
Route::get("singleProject/{id}",[ProjectController::class,"singleProject"]);
Route::delete("deleteProject/{id}",[ProjectController::class,"deleteProject"]);



});
