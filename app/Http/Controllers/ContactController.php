<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show contact page
    public function index()
    {
        $settings = Setting::pluck('value', 'key');

$logo = $settings['site_logo'] ?? null;
$siteTitle = $settings['site_title'] ?? '';

        return view('fronted.contact.create', compact('settings', 'logo', 'siteTitle'));
    }

    // Store contact form
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'department' => 'required',
            'message' => 'required|min:10',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $filePath = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/contacts', $fileName);
            $filePath = 'storage/contacts/' . $fileName;
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'department' => $request->department,
            'message' => $request->message,
            'attachment' => $filePath,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}