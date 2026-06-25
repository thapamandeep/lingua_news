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

        $request->validate([
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }
}