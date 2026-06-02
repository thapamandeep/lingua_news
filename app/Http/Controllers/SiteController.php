<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Subcategory;
use App\Models\Language;

class SiteController extends Controller
{
    /**
     * Get current language
     */
    private function getLanguage()
    {
        $code = session('lang', 'en');

        return Language::where('code', $code)->first()
            ?? Language::where('code', 'en')->first();
    }

<<<<<<< HEAD
=======

>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
    /**
     * Apply translations to collection
     */
<<<<<<< HEAD
=======
    

>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
    private function applyTranslations($news, $language)
    {
        if (!$language) {
            return $news;
        }

        return $news->map(function ($item) use ($language) {

            $translation = $item->translations
                ->where('language_id', $language->id)
                ->first();

            if ($translation) {
                $item->title = $translation->title;
                $item->description = $translation->description;
                $item->content = $translation->content;
            }

            return $item;
        });
    }

    /**
     * Apply translation to single news
     */
    private function applySingleTranslation($news, $language)
    {
        if (!$language) {
            return $news;
        }

        $translation = $news->translations
            ->where('language_id', $language->id)
            ->first();

        if ($translation) {
            $news->title = $translation->title;
            $news->description = $translation->description;
            $news->content = $translation->content;
        }

        return $news;
    }

    /**
     * Home Page
     */
    public function home()
    {
        $language = $this->getLanguage();

        $news = News::with(['subcategory', 'translations'])
            ->where('status', 'published')
            ->latest()
            ->get();

        $news = $this->applyTranslations($news, $language);

        return view('fronted.home.index', [
            'categories'   => Category::all(),
            'heroNews'     => $news->take(3)->values(),
            'subHeroNews'  => $news->skip(3)->take(2)->values(),
            'latestNews'   => $news->skip(5)->take(8)->values(),
            'previousNews' => $news->skip(13)->values(),
            'languages'    => Language::all(),
        ]);
    }

    /**
     * Category Page
     */
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

        return view(
            'fronted.news.index',
            compact('category', 'news', 'subcategories')
        );
    }

<<<<<<< HEAD
    /**
     * Subcategory Page
     */
=======

    /**
     * Subcategory Page
     */

   

>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
    public function subcategoryPage($slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

        $language = $this->getLanguage();

        $news = News::with('translations')
            ->where('subcategory_id', $subcategory->id)
            ->where('status', 'published')
            ->latest()
            ->get();

        $news = $this->applyTranslations($news, $language);

        $subcategories = Subcategory::where(
            'category_id',
            $subcategory->category_id
        )
        ->where('status', 1)
        ->get();

        return view(
            'fronted.news.subcategoryNews.index',
            compact('subcategory', 'news', 'subcategories')
        );
    }

<<<<<<< HEAD
    /**
     * Change Language
     */
=======

    /**
     * Change Language


  

>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
    public function changeLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|string'
        ]);

        session([
            'lang' => $request->language
        ]);

        return response()->json([
            'success' => true,
            'language' => $request->language
        ]);
    }

<<<<<<< HEAD
    /**
     * News Detail Page
=======

  
     * News Detail
>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
     */
public function detail($id)
{
    $language = $this->getLanguage();

<<<<<<< HEAD
        $news = News::with([
            'translations',
            'category',
            'subcategory'
        ])->findOrFail($id);

        $news = $this->applySingleTranslation(
            $news,
            $language
        );

        return view(
            'fronted.news.detail',
            compact('news', 'language')
        );
    }
=======
    $news = News::with(['translations', 'category'])->findOrFail($id);

    $translation = $news->translations
        ->where('language_id', $language->id)
        ->first();

    return view('fronted.news.detail', compact('news','translation','language'));
}
    // public function detail($id)
    // {
    //     $news = News::with(['translations', 'category'])
    //         ->findOrFail($id);


    //     return view('fronted.news.detail', compact('news'));
    // }
>>>>>>> 5c0e138e5342b04d25c85d5c1e8cc1fe2a1323f5
}