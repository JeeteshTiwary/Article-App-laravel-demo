<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\models;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    function getData(){
        // echo "Connecting with database";
        echo "<pre>";
        print_r(DB::select("select id,name from users"));
        echo "</pre>";
    }
}
