<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Language;
<<<<<<< HEAD
use App\Models\NewsTranslation;
use Carbon\Carbon;
=======
>>>>>>> 0493b47f4414f19ea3e228404d4b704593dbc28a

class SiteController extends Controller
{
    /**
     * Get active language safely
     */
    private function getLanguage()
    {
        $code = session('lang', 'en');

<<<<<<< HEAD
        return Language::where('code', $code)->first()
            ?? Language::where('code', 'en')->first();
    }

    /**
     * Apply translation to a news collection
     */
    private function applyTranslations($news, $language)
    {
        return $news->map(function ($item) use ($language) {
=======
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

    
    
    $lang = session('lang', 'en');
>>>>>>> 9b9704cd9fb83b3d122a6b08e14b05a83763d835

            $translation = $item->translations
                ->where('language_id', $language->id)
                ->first();

<<<<<<< HEAD
            if ($translation) {
                $item->title = $translation->title;
                $item->description = $translation->description;
                $item->content = $translation->content ?? $item->content;
            }
=======
    /*
    ====================
    FETCH NEWS
    */
    $news = News::with([
            'subcategory',

            'translations' => function ($q) use ($language) {
                $q->where('language_id', $language->id);
            }

         

        ])
        ->where('status', 'published')
        ->latest()
        ->get();

    /*
 


    */
    $news->each(function ($item) use ($language) {


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



    
   


    return view('fronted.home.index', [
        'categories' => $categories,

        'heroNews' => $news->take(3)->values(),


        'subHeroNews' => $news->skip(1)->take(2)->values(),

        'latestNews' => $news->skip(3)->take(8)->values(),

        'previousNews' => $news->skip(11)->values(),


       
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
>>>>>>> 9b9704cd9fb83b3d122a6b08e14b05a83763d835

            return $item;
        });
    }

    public function home()
    {
        $categories = Category::all();
        $language = $this->getLanguage();

        $news = News::with(['subcategory', 'translations'])
            ->where('status', 'published')
            ->latest()
            ->get();

        $news = $this->applyTranslations($news, $language);

        return view('fronted.home.index', [
            'categories'   => $categories,
            'heroNews'     => $news->take(3)->values(),
            'subHeroNews'  => $news->skip(3)->take(2)->values(),
            'latestNews'   => $news->skip(5)->take(8)->values(),
            'previousNews' => $news->skip(13)->values(),
            'languages'    => Language::all(),
        ]);
    }

    public function categoryPage($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $language = $this->getLanguage();

        $news = News::with('translations')
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->latest()
            ->get();

        $news = $this->applyTranslations($news, $language);

        $subcategories = Subcategory::where('category_id', $category->id)
            ->where('status', 1)
            ->get();

        return view('fronted.news.index', compact('category', 'news', 'subcategories'));
    }

    public function subcategoryPage($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();
        $language = $this->getLanguage();

<<<<<<< HEAD
public function changeLanguage(Request $request)
{
    session(['lang' => $request->language]);
    return response()->json(['success' => true]);
}



public function detail($id)
{
    $news = News::with('translations')->findOrFail($id);

    return view('fronted.news.detail', compact('news'));
}
   
}
=======
        $news = News::with('translations')
            ->where('subcategory_id', $subcategory->id)
            ->where('status', 'published')
            ->latest()
            ->get();
>>>>>>> 0493b47f4414f19ea3e228404d4b704593dbc28a

        $news = $this->applyTranslations($news, $language);

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
        $request->validate([
            'language' => 'required|string'
        ]);

        session(['lang' => $request->language]);

        return response()->json([
            'success' => true,
            'language' => $request->language
        ]);
    }
}