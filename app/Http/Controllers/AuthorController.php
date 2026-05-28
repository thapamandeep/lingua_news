<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function dashboard(){

  return view('author.dashboard'); 
  }
}
