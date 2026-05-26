<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Language;
use Carbon\Carbon;

class SiteController extends Controller
{
public function home()
{
    $categories = Category::all();

<<<<<<< HEAD
    /*
    ====================
    GET SELECTED LANGUAGE
    ====================
    */
    $lang = session('lang', 'en');

    $language = Language::where('code', $lang)->first();

    // fallback to English if session language not found
    if (!$language) {
        $language = Language::where('code', 'en')->first();
    }

    /*
    ====================
    FETCH NEWS WITH TRANSLATION
=======
    $lang = session('lang', 'en');

    $language = Language::where('code', $lang)->first()
        ?? Language::where('code', 'en')->first();

    /*
    ====================
    FETCH NEWS
>>>>>>> 158f77579a6b05585a9b865a881f0528a745bd6e
    ====================
    */
    $news = News::with([
            'subcategory',
<<<<<<< HEAD
            'translations' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }
=======
            'translations'
>>>>>>> 158f77579a6b05585a9b865a881f0528a745bd6e
        ])
        ->where('status', 'published')
        ->latest()
        ->get();

    /*
    ====================
<<<<<<< HEAD
    MAP TRANSLATED DATA SAFELY
=======
    FILTER TRANSLATION IN MEMORY
>>>>>>> 158f77579a6b05585a9b865a881f0528a745bd6e
    ====================
    */
    $news->each(function ($item) use ($language) {

<<<<<<< HEAD
        $translation = $item->translations->first();

        if ($translation) {
            $item->title = $translation->title;
            $item->description = $translation->description;
            $item->content = $translation->content;
        } else {
            // fallback if translation missing
            $item->title = $item->title;
            $item->description = $item->description;
        }
    });

    /*
    ====================
    RETURN VIEW WITH SPLIT DATA
    ====================
    */
=======
        $translation = $item->translations
            ->where('language_id', $language->id)
            ->first();

        $item->title = $translation->title ?? 'No Title';
        $item->description = $translation->description ?? '';
        $item->content = $translation->content ?? '';
    });

>>>>>>> 158f77579a6b05585a9b865a881f0528a745bd6e
    return view('fronted.home.index', [
        'categories' => $categories,

        'heroNews' => $news->take(3)->values(),
<<<<<<< HEAD

        'subHeroNews' => $news->skip(1)->take(2)->values(),

        'latestNews' => $news->skip(3)->take(8)->values(),

        'previousNews' => $news->skip(11)->values(),

=======
        'subHeroNews' => $news->skip(1)->take(2)->values(),
        'latestNews' => $news->skip(3)->take(8)->values(),
        'previousNews' => $news->skip(11)->values(),

>>>>>>> 158f77579a6b05585a9b865a881f0528a745bd6e
        'languages' => Language::all(),
    ]);
}
public function categoryPage($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $lang = session('lang', 'en');

    $language = Language::where('code', $lang)->first();

    $news = News::with(['translations'])
        ->where('category_id', $category->id)
        ->where('status', 'published')
        ->whereHas('translations', function ($q) use ($language) {
            $q->where('language_id', $language->id);
        })
        ->latest()
        ->get()
        ->map(function ($item) use ($language) {

            $translation = $item->translations
                ->where('language_id', $language->id)
                ->first();

            $item->title = $translation->title ?? $item->title;
            $item->description = $translation->description ?? $item->description;

            return $item;
        });

    $subcategories = Subcategory::where('category_id', $category->id)
        ->where('status', 1)
        ->get();

    return view('fronted.news.index', compact('category', 'news', 'subcategories'));
}
public function subcategoryPage($slug)
{
    $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

    $lang = session('lang', 'en');

    $language = Language::where('code', $lang)->first();

    $news = News::with(['translations'])
        ->where('subcategory_id', $subcategory->id)
        ->where('status', 'published')
        ->whereHas('translations', function ($q) use ($language) {
            $q->where('language_id', $language->id);
        })
        ->latest()
        ->get()
        ->map(function ($item) use ($language) {

            $translation = $item->translations
                ->where('language_id', $language->id)
                ->first();

            $item->title = $translation->title ?? $item->title;
            $item->description = $translation->description ?? $item->description;

            return $item;
        });

    $subcategories = Subcategory::where('category_id', $subcategory->category_id)
        ->where('status', 1)
        ->get();

    return view('fronted.news.subcategoryNews.index', compact(
        'subcategory',
        'news',
        'subcategories'
    ));
}

public function changeLanguage(Request $request)
{
    session(['lang' => $request->language]);
    return response()->json(['success' => true]);
}
   
}

