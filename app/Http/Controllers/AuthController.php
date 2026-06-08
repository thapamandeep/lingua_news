<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\OtpMail;

class AuthController extends Controller
{
  public function showLogin(){

  return view('auth.login');
  }

  public function showRegister(){

  return view('auth.register');
  }

public function login(Request $request)
{
    $credentails = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $credentails['email'])->first();

    if ($user) {

        if (Hash::check($credentails['password'], $user->password)) {

            Auth::login($user);

            $request->session()->regenerate();

            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard');
            }

            elseif ($user->role_id == 2) {
                return redirect()->route('author.dashboard');
            }

            elseif ($user->role_id == 3) {
                return redirect()->route('editor.dashboard');
            }

            else {
                Session::flash('error', 'User not recognized');
                return redirect()->back();
            }

        } else {

            Session::flash('error', 'Incorrect password');
            return redirect()->back();
        }

    } else {

        Session::flash('error', 'User not found');
        return redirect()->back();
    }
}

public function logout(){

Auth::logout();

return redirect()->route('login');
}

public function forgotPassword(){

return view('auth.forgot-password');
}

public function otp(Request $request){

$request->validate([
    'email'=>'required|email|exists:users,email',
]);

$otp = rand(100000,999999);

$user = User::where('email',$request->email)->first();

    $user->otp = $otp; // SAVE OTP
    $user->save();


Mail::to($request->email)->send(new OtpMail($otp));





return redirect()->route('new.password');
}

public function newPassword(){

return view('auth.update-password');
}

public function updatePassword(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
        'password' => 'required|min:4',
        'password_confirmation' => 'required|same:password',
    ]);

    $user = User::where('email', $data['email'])->first();

    if (!$user) {
        return back()->with('error', 'User not found');
    }

    if ($user->otp != $data['otp']) {
        return back()->with('error', 'Invalid OTP');
    }

    $user->password = Hash::make($data['password']);
    $user->otp = null;
    $user->save();

    Session::flash('success', 'Your password has been updated successfully');

    return redirect()->route('login');
}

}
