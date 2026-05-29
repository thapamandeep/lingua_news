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
     * Get active language safely
     */
    private function getLanguage()
    {
        $code = session('lang', 'en');

        return Language::where('code', $code)->first()
            ?? Language::where('code', 'en')->first();
    }

    /**
     * Apply translations
     */
    private function applyTranslations($news, $language)
    {
        return $news->map(function ($item) use ($language) {

            $translation = $item->translations
                ->where('language_id', $language->id)
                ->first();

            if ($translation) {
                $item->title = $translation->title;
                $item->description = $translation->description;
                $item->content = $translation->content ?? $item->content;
            }

            return $item;
        });
    }

    /**
     * Home Page
     */
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

        return view('fronted.news.index', compact(
            'category',
            'news',
            'subcategories'
        ));
    }

    /**
     * Subcategory Page
     */
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

        $subcategories = Subcategory::where('category_id', $subcategory->category_id)
            ->where('status', 1)
            ->get();

        return view('fronted.news.subcategoryNews.index', compact(
            'subcategory',
            'news',
            'subcategories'
        ));
    }

    /**
     * Change Language
     */
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

    /**
     * News Detail
     */
    public function detail($id)
    {
        $language = $this->getLanguage();

        $news = News::with('translations')->findOrFail($id);

        $translation = $news->translations
            ->where('language_id', $language->id)
            ->first();

        if ($translation) {
            $news->title = $translation->title;
            $news->description = $translation->description;
            $news->content = $translation->content;
        }

        return view('fronted.news.detail', compact('news'));
    }
}