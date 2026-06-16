<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\About;

class AboutController extends Controller
{
    public function abouts(){

    $settings = Setting::pluck('value', 'key');

$logo = $settings['site_logo'] ?? null;
$siteTitle = $settings['site_title'] ?? '';
$about = About::first();

    return view('fronted.abouts.abouts', compact('settings','logo','siteTitle','about'));
    }

    public function create(){
       
    return view('admin.pages.settings.pages.create-abouts');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'about_site_name' => 'nullable|string|max:255',
        'about_hero_description' => 'nullable|string',

        'feature_1' => 'nullable|string|max:255',
        'feature_2' => 'nullable|string|max:255',
        'feature_3' => 'nullable|string|max:255',
        'feature_4' => 'nullable|string|max:255',

        'story_title' => 'nullable|string|max:255',

        'who_we_are' => 'nullable|string',
        'mission_quote' => 'nullable|string',
        'vision_content' => 'nullable|string',

        'stat1_number' => 'nullable|string|max:50',
        'stat1_label' => 'nullable|string|max:255',

        'stat2_number' => 'nullable|string|max:50',
        'stat2_label' => 'nullable|string|max:255',

        'stat3_number' => 'nullable|string|max:50',
        'stat3_label' => 'nullable|string|max:255',
    ]);

    $about = new About();

    $about->about_site_name = $data['about_site_name'];
    $about->about_hero_description = $data['about_hero_description'];

    $about->feature_1 = $data['feature_1'];
    $about->feature_2 = $data['feature_2'];
    $about->feature_3 = $data['feature_3'];
    $about->feature_4 = $data['feature_4'];

    $about->story_title = $data['story_title'];

    $about->who_we_are = $data['who_we_are'];
    $about->mission_quote = $data['mission_quote'];
    $about->vision_content = $data['vision_content'];

    $about->stat1_number = $data['stat1_number'];
    $about->stat1_label = $data['stat1_label'];

    $about->stat2_number = $data['stat2_number'];
    $about->stat2_label = $data['stat2_label'];

    $about->stat3_number = $data['stat3_number'];
    $about->stat3_label = $data['stat3_label'];

    $about->save();

    return redirect()->back()->with('success', 'About page created successfully.');
}
}
