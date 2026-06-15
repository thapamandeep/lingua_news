<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\InformationMail;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Helper Function
    |--------------------------------------------------------------------------
    */

<<<<<<< HEAD
    private function saveSetting($key, $value)
    {
=======
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
   
$file->storeAs('settings', $newImage, 'public');

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

>>>>>>> a5cb47a0530d443b6c4d012b3486c35ef462fdd0
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | GENERAL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function view()
    {
        return view('admin.pages.settings.pages.general');
    }

    public function storeGeneral(Request $request)
    {
        $this->saveSetting('site_title', $request->site_title);
        $this->saveSetting('tagline', $request->tagline);

        $this->saveSetting('email', $request->email);
        $this->saveSetting('phone', $request->phone);
        $this->saveSetting('description', $request->description);
        $this->saveSetting('timezone', $request->timezone);

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $imageName = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/settings', $imageName);

            $this->saveSetting(
                'site_logo',
                'storage/settings/' . $imageName
            );
        }

        return back()->with(
            'success',
            'General settings updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HEADER & FOOTER
    |--------------------------------------------------------------------------
    */

    public function headerFooter()
    {
        return view('admin.pages.settings.pages.header-footer');
    }

    public function storeHeaderFooter(Request $request)
    {
        $this->saveSetting('show_topbar', $request->show_topbar);
        $this->saveSetting('header_style', $request->header_style);
        $this->saveSetting('breaking_text', $request->breaking_text);
        $this->saveSetting('show_search', $request->show_search);

        $this->saveSetting('footer_text', $request->footer_text);
        $this->saveSetting('show_social', $request->show_social);
        $this->saveSetting('footer_layout', $request->footer_layout);

        return back()->with(
            'success',
            'Header & Footer settings updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SOCIAL LINKS
    |--------------------------------------------------------------------------
    */

    public function socialLinks()
    {
        return view('admin.pages.settings.pages.social-link');
    }

    public function storeSocialLinks(Request $request)
    {
        $this->saveSetting('facebook', $request->facebook);
        $this->saveSetting('twitter', $request->twitter);
        $this->saveSetting('instagram', $request->instagram);
        $this->saveSetting('youtube', $request->youtube);
        $this->saveSetting('linkedin', $request->linkedin);
        $this->saveSetting('tiktok', $request->tiktok);

        return back()->with(
            'success',
            'Social links updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEO SETTINGS
    |--------------------------------------------------------------------------
    */

    public function seo()
    {
        return view('admin.pages.settings.pages.seo');
    }

    public function storeSeo(Request $request)
    {
        $this->saveSetting('meta_title', $request->meta_title);
        $this->saveSetting('meta_keywords', $request->meta_keywords);
        $this->saveSetting('meta_description', $request->meta_description);
        $this->saveSetting('google_analytics', $request->google_analytics);

        $this->saveSetting('og_title', $request->og_title);
        $this->saveSetting('og_description', $request->og_description);

        if ($request->hasFile('og_image')) {

            $file = $request->file('og_image');

            $imageName = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/seo', $imageName);

            $this->saveSetting(
                'og_image',
                'storage/seo/' . $imageName
            );
        }

        return back()->with(
            'success',
            'SEO settings updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EMAIL SETTINGS
    |--------------------------------------------------------------------------
    */

    public function email()
    {
        return view('admin.pages.settings.pages.emails');
    }

    public function storeEmail(Request $request)
    {
        $request->validate([
            'email_title' => 'required|string',
            'email_information' => 'required|string',
        ]);

        // SMTP

        $this->saveSetting('mail_driver', $request->mail_driver);
        $this->saveSetting('mail_host', $request->mail_host);
        $this->saveSetting('mail_port', $request->mail_port);
        $this->saveSetting('mail_username', $request->mail_username);

        if (!empty($request->mail_password)) {
            $this->saveSetting(
                'mail_password',
                encrypt($request->mail_password)
            );
        }

        $this->saveSetting(
            'mail_encryption',
            $request->mail_encryption
        );

        // Email Content

        $this->saveSetting(
            'email_title',
            $request->email_title
        );

        $this->saveSetting(
            'email_information',
            $request->email_information
        );

        return back()->with(
            'success',
            'Email settings updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEND TEST EMAIL
    |--------------------------------------------------------------------------
    */

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email'
        ]);

        $title = Setting::where(
            'key',
            'email_title'
        )->value('value');

        $emailMessage = Setting::where(
            'key',
            'email_information'
        )->value('value');

        // Debug if data missing

        if (!$title || !$emailMessage) {

            return back()->with(
                'error',
                'Please save Email Title and Email Information first.'
            );
        }

        $data = [
            'title' => $title,
            'email_message' => $emailMessage,
        ];

        Mail::to($request->test_email)
            ->send(new InformationMail($data));

        return back()->with(
            'success',
            'Test email sent successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | AUTHOR SETTINGS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view(
            'author.settings.index',
            [
                'user' => Auth::user()
            ]
        );
    }
}