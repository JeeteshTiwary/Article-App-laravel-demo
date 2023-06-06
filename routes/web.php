<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\greeting;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\user;
use App\Http\Controllers\userController;
use App\Http\Controllers\httpClientDemo;
// use App\Http\Controllers\count;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 
if (View::exists('about')) {
    Route::view("/about","about");
}

Route::view("/test","test");
Route::view("/count","count");
// Route::view("test.check","/view");

Route::get("/testController/{name}",[TestController::class,'show']);
// Route::get("/greet/{name}",[Greeting::class,'greet']);
// Route::get("/count",[count::class,'count']);

Route::post("/form",[FormExample::class,'getData']);
// Route::view("/form","form");

Route::group(['middleware'=>['grpMiddleware']],function(){
    Route::view("/form","form");
});

Route::get("/greet/{name}",[Greeting::class,'greet'])->middleware('routeMiddleware');

Route::get("/user",[user::class,'getData']);
Route::get("/users",[userController::class,'getData']);

Route::get("/httpClientDemo",[httpClientDemo::class,'showData']);
