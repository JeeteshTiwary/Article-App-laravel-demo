<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class httpClientDemo extends Controller
{
    function showData(){
        $response = Http::get('https://reqres.in/api/users?page=1');
        return view("/httpClientDemo",['data'=>$response['data']]);
    }
}
