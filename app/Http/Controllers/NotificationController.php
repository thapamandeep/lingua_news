<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
{
    $notifications = Notification::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('author.pages.notifications', compact('notifications'));
}
}
