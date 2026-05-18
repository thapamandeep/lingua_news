<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class SiteController extends Controller
{
    public function home(){

       $categories = Category::all();

    
    return view ('fronted.home.index',compact('categories'));
    }

    public function categoryPage($slug)
{
    // find category by slug
    $category = Category::where('slug', $slug)->firstOrFail();

    // get news under that category
    $news = News::where('category_id', $category->id)
                ->where('status', 'published')
                ->latest()
                ->get();

    // optional: for navbar
    $categories = Category::where('status', 'active')->get();

    return view('fronted.categories.index', compact('category', 'news', 'categories'));
}

  


   

    
}

