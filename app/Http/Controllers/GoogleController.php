<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
       public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

     public function callback()
    {
        try {

            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {

                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt(Str::random(16)),
                ]);
            }

            Auth::login($user);

            return redirect()->route('home');

        } catch (\Exception $e) {

            return redirect()->route('login')
                ->with('error', 'Google login failed.');
        }
    }
}

