<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class flashSessionDemo extends Controller
{
    function flash(Request $req)
    {
        $data= $req->input('name');
        // // echo $data;
        // //  $req->session()->flash('status', 'Session working!');
        // $req->session()->reflash();
         $req->session()->flash('name',$data);
         return redirect('flashSessionDemo');
    }
}