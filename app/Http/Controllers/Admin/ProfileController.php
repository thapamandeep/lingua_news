<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
 public function index()
{
    $user = auth()->user();

    $totalNews = \App\Models\News::count();
    $totalCategories = \App\Models\Category::count();

    return view('admin.pages.profile.index', compact(
        'user',
        'totalNews',
        'totalCategories'
    ));
}
public function update(Request $request)
{
    $user = Auth::user();

    if ($request->field == 'name') {

        $request->validate([
            'value' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->value,
        ]);
    }

    if ($request->field == 'email') {

        $request->validate([
            'value' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'email' => $request->value,
        ]);
    }

    if ($request->field == 'image') {

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $fileName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads/profile'),
            $fileName
        );

        $user->update([
            'image' => $fileName
        ]);
    }

    return back()->with(
        'success',
        'Profile updated successfully.'
    );
}
}