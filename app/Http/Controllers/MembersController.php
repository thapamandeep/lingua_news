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


public function profile(Member $member){

return view('fronted.profiles.details', compact('member'));
}

public function edit(Member $member){

return view('fronted.profiles.edit', compact('member'));
}
public function update(Request $request, Member $member)
{
    $data = $request->validate([
        'name' => 'nullable|string|max:200',
        'username' => 'nullable|string|max:200',
        'email' => 'nullable|email',
        'country' => 'nullable|string',
        'current_password' => 'nullable|min:6',
        'password' => 'nullable|min:6',
        'confirm_password' => 'nullable|min:6|same:password',
    ]);

    $member->name = $data['name'];
    $member->username = $data['username'];
    $member->email = $data['email'];
    $member->country = $data['country'];

    if ($request->filled('password')) {

        if (!Hash::check($request->current_password, $member->password)) {

            return redirect()->back()->withErrors([
                'current_password' => 'Current password is incorrect'
            ]);
        }

        $member->password = Hash::make($data['password']);
    }

    $member->save();

    return redirect()
        ->route('member.profile', $member->id)
        ->with('success', 'Profile updated successfully');
}

}
