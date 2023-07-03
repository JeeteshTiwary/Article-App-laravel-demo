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
            'otp' => 'required|numeric|min:4|max:4',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user->authentication_otp == $request->otp) {
            $user->otp_vaidated_at = date('Y-m-d H:i:s', time());
            $user->save();
            return view('authentication.passwordCheck', ['email' => $user->email]);
        }
        $request->session()->flash('msg', 'Invalid OTP');
        return view('authentication.verifyOTP', ['email' => $user->email]);
    }

    function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user->password == Hash::make($request->password)) {
            return redirect('/dashboard')->with('msg', 'Your account has been authenticated successfully !!');
        }
        $request->session()->flash('msg', 'Invalid password');
        return view('authentication.verifyPassword', ['email' => $user->email]);
    }
}