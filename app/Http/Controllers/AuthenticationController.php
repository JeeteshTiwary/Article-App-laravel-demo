<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $is_authenticated = User::where(['email' => $request->email, 'authenticated_at' => null])->first();
            if ($is_authenticated) {
                $otp = rand(1000, 9999);
                $user->authentication_otp = $otp;
                $user->save();
                $mailData = [
                    'title' => 'OTP for account authentication.',
                    'body' => 'OTP: ' . $otp,
                ];

                \Mail::to($user->email)->send(new SendOTP($mailData));

                return view('authentication.verifyOTP', ['email' => $user->email, 'msg' => '']);
            }
            return redirect('/dashboard')->with('msg', 'Your account already has been authenticated.');
        }
        return redirect()->back()->with('msg', 'we didn\'t found user with entered email.');
    }

    function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return view('authentication.verifyOTP', ['email' => $request->email, 'msg' => ''])
            ->withErrors($validator);
        }

        $user = User::where('email', $request->email)->first();
        if ($user->authentication_otp == $request->otp) {
            return view('authentication.verifyPassword', ['email' => $user->email, 'msg' => '']);
        }
        return view('authentication.verifyOTP', ['email' => $user->email, 'msg' => 'Invalid OTP']);
    }

    function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (password_verify($request->password, $user->password)) {
            $user->authenticated_at = date('Y-m-d H:i:s', time());
            $user->save();
            return redirect('/dashboard')->with('msg', 'Your account has been authenticated successfully !!');
        }
        return view('authentication.verifyPassword', ['email' => $user->email, 'msg' => 'Invalid Password']);
    }
}