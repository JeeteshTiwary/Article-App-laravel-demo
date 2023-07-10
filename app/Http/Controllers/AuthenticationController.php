<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\SendOTP;
use Illuminate\Support\Facades\Validator;
use App\Notifications\AuthenticationOTP;

class AuthenticationController extends Controller
{
    public function sendOTP(Request $request)
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
                    'user' => $user->name,
                    'body' => 'Here is your OTP: ' . $otp,
                ];

                $user->notify(new AuthenticationOTP($mailData));

                return view('authentication.verifyOTP', ['email' => $user->email, 'msg' => '']);
            }
            return redirect('dashboard')->with('msg', 'Your account already has been authenticated.');
        }
        return redirect()->back()->with('msg', 'we didn\'t found user with entered email.');
    }

    public function verifyOTP(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|numeric',
            ]);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return view('authentication.verifyOTP', ['email' => $request->email, 'msg' => ''])
                ->withErrors(['error' => $error]);
            //throw $th;
        }

        $user = User::where('email', $request->email)->first();
        if ($user->authentication_otp == $request->otp) {
            return view('authentication.verifyPassword', ['email' => $user->email, 'msg' => '']);
        }
        return view('authentication.verifyOTP', ['email' => $user->email, 'msg' => 'Invalid OTP']);
    }

    public function verifyPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (password_verify($request->password, $user->password)) {
            $user->authenticated_at = date('Y-m-d H:i:s', time());
            $user->save();
            return redirect('dashboard')->with('msg', 'Your account has been authenticated successfully !!');
        }
        return view('authentication.verifyPassword', ['email' => $user->email, 'msg' => 'Invalid Password']);
    }
}