<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function front(){

    return view ('fronted.layouts.template');
    }

    
}

