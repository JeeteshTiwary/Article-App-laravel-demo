<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    function show($name){
        // return "test Controller";
        return "Hello ".$name;
    }
}
