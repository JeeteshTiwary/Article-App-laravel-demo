<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user;
class userController extends Controller
{
    //
    function getData(){
        // echo "Connecting with database";
        // echo "<pre>";
        // print_r(user::all());
        // echo "</pre>";
        // return user::all();
        $data = user::join('todos', 'todos.user_id', '=', 'users.id')
                    ->get(['users.name', 'todos.title', 'todos.description']);
 
        return $data;
    }
}
 
