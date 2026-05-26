<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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

            if ($user->role_id == 5) {
                return redirect()->route('admin.dashboard');
            }

            elseif ($user->role_id == 1) {
                return redirect()->route('author.dashboard');
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

}
