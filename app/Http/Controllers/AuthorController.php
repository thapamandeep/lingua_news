<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Notification;

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
   $pendingNews = News::with(['translations', 'translations.language'])
    ->whereHas('translations', function ($q) {
        $q->where('status', 'pending');
    })
    ->latest()
    ->get();

    return view('author.pages.pending-review', compact('pendingNews'));
}

public function articles()
{
    $articles = News::with(['translations.language'])
        ->where('author_id', auth()->id())
        ->latest()
        ->get();

    return view('author.pages.articles', compact('articles'));
}

    public function notifications()
{
    $notifications = Notification::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('author.pages.notifications', compact('notifications'));
}
}
