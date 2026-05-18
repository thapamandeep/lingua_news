<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class SportsController extends Controller
{
   public function index()
{
    // get sports category
    $category = Category::where('slug', 'sports')->firstOrFail();

    // get all news under sports
    $news = News::where('category_id', $category->id)
                ->where('status', 'published')
                ->latest()
                ->get();

    return view('fronted.categories.index', compact('news', 'category'));
}
}