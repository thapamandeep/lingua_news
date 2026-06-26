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
                        ->where('status', 'approved')
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

public function category(){

$categories = Category::where('status','active')->get();

return view('author.pages.categories.category-index',compact('categories'));
}
public function subcategory($locale = 'en')
{
    $subcategories = Subcategory::with([
        'translations' => function ($query) use ($locale) {
            $query->where('locale', $locale);
        }
    ])->get();

    return view(
        'author.pages.subcategories.subcategory-index',
        compact('subcategories')
    );
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

public function profile()
{
    return view('author.pages.profiles.profile');
}
public function updateProfile(Request $request)
{
    $field = $request->field;

    if ($field == 'name') {

        $request->validate([
            'value' => 'required|string|max:255',
        ]);

        auth()->user()->update([
            'name' => $request->value,
        ]);
    }

    if ($field == 'email') {

        $request->validate([
            'value' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update([
            'email' => $request->value,
        ]);
    }

    return back()->with('success', 'Profile updated successfully.');
}
}
