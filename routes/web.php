<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\greeting;
use App\Http\Controllers\FormExample;
use App\Http\Controllers\user;
use App\Http\Controllers\userController;
use App\Http\Controllers\httpClientDemo;
use App\Http\Controllers\flashSessionDemo;
use App\Http\Controllers\fileUploadDemo;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userList;
use App\Http\Controllers\QueryBuilderDemo;
use App\Mail\testMail;
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

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
})->where('id', '[0-9]+');

// Route::get('/user/{name?}', function (string $name = 'Jeetesh') {
//     return $name;
// });

Route::view("/test","test");
Route::view("/count","count");
Route::view("/view","test.check");

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

Route::view("/flashSessionDemo","flashSessionDemoForm");
Route::post("/flashSession",[flashSessionDemo::class,'flash']);

Route::view("/fileUploadDemo","fileUploadDemo");
Route::post("/fileUpload",[fileUploadDemo::class,'upload']);

Route::view("/login","loginForm");
Route::view("/profile","profile");
Route::post("/user",[loginController::class,'login']);
Route::get("/logout",function(){
    if(session()->has('name')){
        session()->pull('name',null);
        return redirect("login");
    }
    return redirect("login");
});
Route::get("/profile",function(){
    if(session()->has('name')){
        return view("profile");
    }
    return redirect("login");
});
Route::get("/login",function(){
    if(session()->has('name')){
        return redirect("profile");
    }
});
Route::view("/home","home");
Route::get("/home/{lang}",function($lang){
    App::setlocale($lang);
    return view("home");
});

Route::get("/userlist",[userList::class,"show"]);

Route::view("/addUser","addUser");
Route::post("/addUser",[userList::class,"add"]);
Route::get("/delete/{id}",[userList::class,"delete"]);
Route::get("/update/{id}",[userList::class,"showData"]);
Route::post("/update/{id}",[userList::class,"update"]);

Route::get("/QueryBuilderDemo/{id}",[QueryBuilderDemo::class,'QueryBuilder']);

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from jmt',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('jmt@narola.email')->send(new testMail($details));
   
    echo ("Email is Sent.");
});