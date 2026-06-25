<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(15);

        return view('admin.pages.notifications.index', compact('notifications'));
    }

    public function read(Notification $notification)
    {
        $notification->update([
            'is_read' => true
        ]);

        return redirect()->back()
            ->with('success', 'Notification marked as read.');
    }

    public function readAll()
    {
        Notification::where('is_read', false)
            ->update([
                'is_read' => true
            ]);

        return redirect()->back()
            ->with('success', 'All notifications marked as read.');
    }
}