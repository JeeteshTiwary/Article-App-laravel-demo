<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class userList extends Controller
{
    function show(){
        $data=user::paginate(5);
        // die($data);
        return view('userList',['users'=>$data]);
    }
    function add(Request $request){
        // $data = $request->all();
        //     return $data;
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = password_hash("$request->password",PASSWORD_DEFAULT );
        $user->save();
        $request->session()->flash("name",$user->name);
        return redirect('userlist');
    }
}
