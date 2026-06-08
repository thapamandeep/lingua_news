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
     * Current language
     */
    private function getLanguage()
    {
        return Language::where(
            'code',
            session('lang', 'en')
        )->first()
        ?? Language::where('code', 'en')->first();
    }

    /**
     * Apply translations to collection
     */
    private function applyTranslations($news, $language)
    {
        if (!$language) {
            return $news;
        }

        return $news->map(function ($item) use ($language) {

            $translation = $item->translations
                ->firstWhere(
                    'language_id',
                    $language->id
                );

            if ($translation) {
                $item->title = $translation->title;
                $item->description = $translation->description;
                $item->content = $translation->content;
            }

            return $item;
        });
    }

    /**
     * Apply translation to single news item
     */
    private function applySingleTranslation($news, $language)
    {
        if (!$language) {
            return $news;
        }

        $translation = $news->translations
            ->firstWhere(
                'language_id',
                $language->id
            );

        if ($translation) {
            $news->title = $translation->title;
            $news->description = $translation->description;
            $news->content = $translation->content;
        }

        return $news;
    }

    /**
     * Homepage
     */
    public function home()
    {
        $language = $this->getLanguage();

        $news = News::with([
                'translations',
                'subcategory'
            ])
            ->where('status', 'approved')
            ->latest()
            ->get();

        $news = $this->applyTranslations(
            $news,
            $language
        );

        return view('fronted.home.index', [
            'categories'   => Category::all(),
            'languages'    => Language::all(),
            'heroNews'     => $news->take(3)->values(),
            'subHeroNews'  => $news->skip(3)->take(2)->values(),
            'latestNews'   => $news->skip(5)->take(8)->values(),
            'previousNews' => $news->skip(13)->values(),
        ]);
    }

    /**
     * Category Page
     */
    public function categoryPage($slug)
    {
        $category = Category::where(
            'slug',
            $slug
        )->firstOrFail();

        $language = $this->getLanguage();

        $news = News::with('translations')
            ->where('category_id', $category->id)
            ->where('status', 'approved')
            ->latest()
            ->get();

        $news = $this->applyTranslations(
            $news,
            $language
        );

        $subcategories = Subcategory::where(
                'category_id',
                $category->id
            )
            ->where('status', 1)
            ->get();

        return view(
            'fronted.news.index',
            compact(
                'category',
                'news',
                'subcategories'
            )
        );
    }

    /**
     * Subcategory Page
     */
    public function subcategoryPage($slug)
    {
        $subcategory = Subcategory::where(
            'slug',
            $slug
        )->firstOrFail();

        $language = $this->getLanguage();

        $news = News::with('translations')
            ->where(
                'subcategory_id',
                $subcategory->id
            )
            ->where('status', 'approved')
            ->latest()
            ->get();

        $news = $this->applyTranslations(
            $news,
            $language
        );

        $subcategories = Subcategory::where(
                'category_id',
                $subcategory->category_id
            )
            ->where('status', 1)
            ->get();

        return view(
            'fronted.news.subcategoryNews.index',
            compact(
                'subcategory',
                'news',
                'subcategories'
            )
        );
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

        $news = News::with([
                'translations',
                'category',
                'subcategory'
            ])
            ->where('status', 'approved')
            ->findOrFail($id);

        $news = $this->applySingleTranslation(
            $news,
            $language
        );

        return view(
            'fronted.news.detail',
            compact(
                'news',
                'language'
            )
        );
    }
}
