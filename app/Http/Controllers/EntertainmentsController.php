<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntertainmentsController extends Controller
{
    public function index(){

    return view('fronted.entertainments.index');
    }
}
