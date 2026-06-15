<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

class SubscribeController extends Controller
{
   public function subscribe(Member $member)
{
    if ($member->id !== auth()->id()) {
        abort(403);
    }

    $member->newsletter_subscribed = true;
    $member->save();

    // Send email
    Mail::to($member->email)->send(
        new SubscriberMail($member->name)
    );

    return back()->with('success', 'Subscribed successfully!');
}
}
