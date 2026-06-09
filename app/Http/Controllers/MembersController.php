<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MembersController extends Controller
{
    public function store(Request $request){

    $data = $request->validate([
        'email' => 'required|email|unique:members,email',
      'password' => 'required|min:6',
        'confirm_password'=>'required|same:password',
    ]);

    $member = new Member();
    $member->email = $data['email'];
    $member->password = Hash::make($data['password']);

    $member->save();

    return redirect()->route('login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $member = Member::where('email', $credentials['email'])->first();

    if (!$member) {
        return back()->with('error', 'Member not found');
    }

    if (!Hash::check($credentials['password'], $member->password)) {
        return back()->with('error', 'Incorrect password');
    }

    session([
        'member_id' => $member->id,
        'member_name' => $member->name,
        'member_email' => $member->email,
    ]);

    $request->session()->regenerate();

    return redirect()->route('home.index');
}
}
