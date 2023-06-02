<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Greeting extends Controller
{
    //
    private $greetMessage = null; 
    function greet($name){
        echo "<center>";
        echo "<h1> Hello ".$name.",</h1>";
        echo "<h3> Welcome in the world of Laravel.</h3>";
        echo "</center>";
    }
}
