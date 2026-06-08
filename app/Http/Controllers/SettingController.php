<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\InformationMail;

class SettingController extends Controller
{

// ===============================general+site=================//
    public function view(){

    return view('admin.pages.settings.pages.general');
    }


    public function storeGeneral(Request $request)
{
    // ================= SITE IDENTITY =================
    Setting::updateOrCreate(
        ['key' => 'site_title'],
        ['value' => $request->site_title]
    );

    Setting::updateOrCreate(
        ['key' => 'tagline'],
        ['value' => $request->tagline]
    );

    // ================= GENERAL SETTINGS =================
    Setting::updateOrCreate(
        ['key' => 'email'],
        ['value' => $request->email]
    );

    Setting::updateOrCreate(
        ['key' => 'phone'],
        ['value' => $request->phone]
    );

    Setting::updateOrCreate(
        ['key' => 'description'],
        ['value' => $request->description]
    );

    Setting::updateOrCreate(
        ['key' => 'timezone'],
        ['value' => $request->timezone]
    );

    if ($request->hasFile('logo')) {

    $file = $request->file('logo');

    $newImage = time() . '.' . $file->getClientOriginalExtension();

    // store in storage/app/public/settings
    $file->storeAs('public/settings', $newImage);

    Setting::updateOrCreate(
        ['key' => 'site_logo'],
        ['value' => 'storage/settings/' . $newImage]
    );
}

    return redirect()->back()->with('success', 'General settings updated successfully!');
}
    //    public function index()
    // {
    //     return view('admin.pages.settings.pages.general');
    // }

    // header/footer============================//

    public function headerFooter()
{
    return view('admin.pages.settings.pages.header-footer');
}

public function storeHeaderFooter(Request $request)
{
    // ================= HEADER SETTINGS =================
    Setting::updateOrCreate(
        ['key' => 'show_topbar'],
        ['value' => $request->show_topbar]
    );

    Setting::updateOrCreate(
        ['key' => 'header_style'],
        ['value' => $request->header_style]
    );

    Setting::updateOrCreate(
        ['key' => 'breaking_text'],
        ['value' => $request->breaking_text]
    );

    Setting::updateOrCreate(
        ['key' => 'show_search'],
        ['value' => $request->show_search]
    );

    // ================= FOOTER SETTINGS =================
    Setting::updateOrCreate(
        ['key' => 'footer_text'],
        ['value' => $request->footer_text]
    );

    Setting::updateOrCreate(
        ['key' => 'show_social'],
        ['value' => $request->show_social]
    );

    Setting::updateOrCreate(
        ['key' => 'footer_layout'],
        ['value' => $request->footer_layout]
    );

    return redirect()->back()->with('success', 'Header & Footer settings updated successfully!');
}

// social link ================================//

public function socialLinks()
{
    return view('admin.pages.settings.pages.social-link');
}

public function storeSocialLinks(Request $request)
{
    // ================= SOCIAL LINKS =================
    Setting::updateOrCreate(
        ['key' => 'facebook'],
        ['value' => $request->facebook]
    );

    Setting::updateOrCreate(
        ['key' => 'twitter'],
        ['value' => $request->twitter]
    );

    Setting::updateOrCreate(
        ['key' => 'instagram'],
        ['value' => $request->instagram]
    );

    Setting::updateOrCreate(
        ['key' => 'youtube'],
        ['value' => $request->youtube]
    );

    Setting::updateOrCreate(
        ['key' => 'linkedin'],
        ['value' => $request->linkedin]
    );

    Setting::updateOrCreate(
        ['key' => 'tiktok'],
        ['value' => $request->tiktok]
    );

    return redirect()->back()->with('success', 'Social links updated successfully!');
}


// Seo=========================================//
public function seo()
{
    return view('admin.pages.settings.pages.seo');
}

public function storeSeo(Request $request)
{
    // ================= BASIC SEO =================
    Setting::updateOrCreate(
        ['key' => 'meta_title'],
        ['value' => $request->meta_title]
    );

    Setting::updateOrCreate(
        ['key' => 'meta_keywords'],
        ['value' => $request->meta_keywords]
    );

    Setting::updateOrCreate(
        ['key' => 'meta_description'],
        ['value' => $request->meta_description]
    );

    Setting::updateOrCreate(
        ['key' => 'google_analytics'],
        ['value' => $request->google_analytics]
    );

    // ================= OPEN GRAPH =================
    Setting::updateOrCreate(
        ['key' => 'og_title'],
        ['value' => $request->og_title]
    );

    Setting::updateOrCreate(
        ['key' => 'og_description'],
        ['value' => $request->og_description]
    );

    // ================= OG IMAGE =================
    if ($request->hasFile('og_image')) {

        $file = $request->file('og_image');

        $imageName = time() . '.' . $file->getClientOriginalExtension();

        // store in storage/app/public/seo
        $file->storeAs('public/seo', $imageName);

        Setting::updateOrCreate(
            ['key' => 'og_image'],
            ['value' => 'storage/seo/' . $imageName]
        );
    }

    return redirect()->back()->with('success', 'SEO settings updated successfully!');
} 

// emails===========================//

public function email()
{
    return view('admin.pages.settings.pages.emails');
}

public function storeEmail(Request $request)
{
    // validate to prevent NULL values
    $request->validate([
        'email_title' => 'required',
        'email_information' => 'required',
    ]);

    // ================= SMTP CONFIG =================
    Setting::updateOrCreate(
        ['key' => 'mail_driver'],
        ['value' => $request->mail_driver]
    );

    Setting::updateOrCreate(
        ['key' => 'mail_host'],
        ['value' => $request->mail_host]
    );

    Setting::updateOrCreate(
        ['key' => 'mail_port'],
        ['value' => $request->mail_port]
    );

    Setting::updateOrCreate(
        ['key' => 'mail_username'],
        ['value' => $request->mail_username]
    );

    Setting::updateOrCreate(
        ['key' => 'mail_password'],
        ['value' => $request->mail_password ? encrypt($request->mail_password) : null]
    );

    Setting::updateOrCreate(
        ['key' => 'mail_encryption'],
        ['value' => $request->mail_encryption]
    );

    // ================= EMAIL INFORMATION =================
    Setting::updateOrCreate(
        ['key' => 'email_title'],
        ['value' => $request->email_title]
    );

    Setting::updateOrCreate(
        ['key' => 'email_information'],
        ['value' => $request->email_information]
    );

    return redirect()->back()->with('success', 'Email settings updated successfully!');
}

public function sendTestEmail(Request $request)
{
    $request->validate([
        'test_email' => 'required|email',
    ]);

    $data = [
        'title' => Setting::where('key', 'email_title')->value('value') ?? 'No Title',
        'email_message' => Setting::where('key', 'email_information')->value('value') ?? 'No Message',
    ];

    Mail::to($request->test_email)
        ->send(new InformationMail($data));

    return back()->with('success', 'Test email sent successfully!');
}

// author=================//

  public function index()
    {
        return view('author.settings.index', [
            'user' => Auth::user()
        ]);
    }
}

