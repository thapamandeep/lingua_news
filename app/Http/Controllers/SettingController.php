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

    private function saveSetting($key, $value)
    {
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