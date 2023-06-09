<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request){
        $name= $request->input('email');
        // echo $name;
        $request->session()->put('name',$name);
        return redirect("profile");
    }
}
