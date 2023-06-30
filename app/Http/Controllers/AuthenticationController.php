<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    function sendOTP(Request $request) {
        $request->validate([
            'email'=> 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            $otp = rand(1000, 9999);
            
            return view('/authentication', ['email' => $user->email]);
        }
        return redirect()->back()->with('msg','we didn\'t found user with entered email.');
    }


}
