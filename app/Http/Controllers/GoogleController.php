<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
    $googleUser = Socialite::driver('google')
        ->stateless()
        ->user();

    $member = Member::firstOrCreate(
        ['email' => $googleUser->email],
        [
            'name' => $googleUser->name,
            'password' => bcrypt(Str::random(16)),
        ]
    );

    Auth::guard('member')->login($member);

    return redirect()->route('home.index');
}
}

