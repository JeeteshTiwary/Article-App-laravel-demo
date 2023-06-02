<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormExample extends Controller
{
    function getData(Request $req)
    {
        // echo "Form Submitted";
        // print_r($req->input());
        echo "Hello ".($req->input('name')).", You are: ".$req->input('age')." Years old.";
    }
}
