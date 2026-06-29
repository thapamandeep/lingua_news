<?php

namespace App\Http\Controllers;

use App\Mail\InformationMail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SettingController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Helper Method
    |--------------------------------------------------------------------------
    */


    private function saveSetting($key, $value)
    {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    private function uploadFile($file, $folder)
    {
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs($folder, $fileName, 'public');

        return 'storage/' . $folder . '/' . $fileName;
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
        $settings = [
            'site_title',
            'tagline',
            'email',
            'phone',
            'description',
            'timezone'
        ];

        foreach ($settings as $setting) {
            $this->saveSetting($setting, $request->$setting);
        }

        $this->saveSetting('site_title', $request->site_title);
        $this->saveSetting('tagline', $request->tagline);
        $this->saveSetting('email', $request->email);
        $this->saveSetting('phone', $request->phone);
        $this->saveSetting('description', $request->description);
        $this->saveSetting('timezone', $request->timezone);


        if ($request->hasFile('logo')) {
            $path = $this->uploadFile(
                $request->file('logo'),
                'settings'
            );

            $this->saveSetting('site_logo', $path);
        }

        return back()->with(
            'success',
            'General settings updated successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HEADER & FOOTER SETTINGS
    |--------------------------------------------------------------------------
    */

    public function headerFooter()
    {
        return view('admin.pages.settings.pages.header-footer');
    }

    public function storeHeaderFooter(Request $request)
    {
        $settings = [
            'show_topbar',
            'header_style',
            'breaking_text',
            'show_search',
            'footer_text',
            'show_social',
            'footer_layout'
        ];

        foreach ($settings as $setting) {
            $this->saveSetting($setting, $request->$setting);
        }

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
        $socials = [
            'facebook',
            'twitter',
            'instagram',
            'youtube',
            'linkedin',
            'tiktok'
        ];

        foreach ($socials as $social) {
            $this->saveSetting($social, $request->$social);
        }

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
        $seoSettings = [
            'meta_title',
            'meta_keywords',
            'meta_description',
            'google_analytics',
            'og_title',
            'og_description'
        ];

        foreach ($seoSettings as $setting) {
            $this->saveSetting($setting, $request->$setting);
        }

        if ($request->hasFile('og_image')) {

            $path = $this->uploadFile(
                $request->file('og_image'),
                'seo'
            );

            $this->saveSetting('og_image', $path);
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

        $this->saveSetting('mail_driver', $request->mail_driver);
        $this->saveSetting('mail_host', $request->mail_host);
        $this->saveSetting('mail_port', $request->mail_port);
        $this->saveSetting('mail_username', $request->mail_username);

        if ($request->filled('mail_password')) {
            $this->saveSetting(
                'mail_password',
                encrypt($request->mail_password)
            );
        }

        $this->saveSetting(
            'mail_encryption',
            $request->mail_encryption
        );

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
    | TEST EMAIL
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

        $message = Setting::where(
            'key',
            'email_information'
        )->value('value');

        if (!$title || !$message) {
            return back()->with(
                'error',
                'Please save email settings first.'
            );
        }

        Mail::to($request->test_email)
            ->send(
                new InformationMail([
                    'title' => $title,
                    'email_message' => $message
                ])
            );

        return back()->with(
            'success',
            'Test email sent successfully.'
        );
    }

    // public function sendTestEmail(Request $request)
    // {
    //     // your existing code

    // }

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