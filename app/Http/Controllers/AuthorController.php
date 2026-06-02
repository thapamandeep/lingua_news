<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Category;
use App\Models\Subcategory;

class AuthorController extends Controller
{
  public function dashboard(){

   $publishedNews = News::with('translations')
                        ->where('status', 'published')
                        ->latest()
                        ->get();

    $categories = Category::all();
    $subcategories = Subcategory::all();                    

  return view('author.dashboard',compact('publishedNews','categories','subcategories')); 
  }

 public function pendingReview()
{
    $pendingNews = News::where('status','draft')
        ->latest()
        ->get();

    return view('author.pages.pending-review', compact('pendingNews'));
}
}
