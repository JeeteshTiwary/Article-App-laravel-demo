<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendOTP;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $otp = rand(1000, 9999);
            $user->authentication_otp = $otp;
            $user->save();
            $mailData = [
                'title' => 'OTP for account authentication.',
                'body' => 'OTP: ' . $otp,
            ];

            \Mail::to($user->email)->send(new SendOTP($mailData));

            return view('authentication.verifyOTP', ['email' => $user->email]);
        }
        return redirect()->back()->with('msg', 'we didn\'t found user with entered email.');
    }

    function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user->authentication_otp == $request->otp) {
            $user->otp_vaidated_at = date('Y-m-d H:i:s', time());
            $user->save();
            return view('authentication.verifyPassword', ['email' => $user->email]);
        }
        return view('authentication.verifyOTP', ['email' => $user->email, 'msg' => 'Invalid OTP']);
    }

    function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (password_verify($request->password,$user->password)) {
            return redirect('/dashboard')->with('msg', 'Your account has been authenticated successfully !!');
        }
        return view('authentication.verifyPassword', ['email' => $user->email, 'msg' => 'Invalid Password']);
    }
}