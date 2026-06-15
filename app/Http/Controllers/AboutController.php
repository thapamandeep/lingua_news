<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AboutController extends Controller
{
    public function abouts(){

    $settings = Setting::pluck('value', 'key');

$logo = $settings['site_logo'] ?? null;
$siteTitle = $settings['site_title'] ?? '';

    return view('fronted.abouts.abouts', compact('settings','logo','siteTitle'));
    }
}
