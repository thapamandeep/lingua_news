<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Subcategory;

class SiteController extends Controller
{
    public function home(){

       $categories = Category::all();
      
       $heroNews = News::where('status', 'published')
                ->latest()
                ->take(5)
                ->get();


    
    return view ('fronted.home.index',compact('categories','heroNews'));
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
  $subcategories = Subcategory::where('category_id', $category->id)->get();

    return view('fronted.news.index', compact('category', 'news', 'categories','subcategories'));
}

public function subcategoryPage($slug)
{
    $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

    $news = News::where('subcategory_id', $subcategory->id)
                ->where('status', 'published')
                ->latest()
                ->get();

    $subcategories = Subcategory::where('category_id', $subcategory->category_id)
                ->where('status', 1)
                ->get();

    return view('fronted.news.subcategoryNews.index', compact(
        'subcategory',
        'news',
        'subcategories'
    ));
}

  


   

    
}

