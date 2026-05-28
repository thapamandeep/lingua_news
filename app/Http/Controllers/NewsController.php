<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\News;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\Language;
use App\Models\NewsTranslation;
use Illuminate\Support\Str;

class NewsController extends Controller
{

public function news(){

$categories = Category::all();
$subcategories = Subcategory::all();
$roles = Role::all();
 $layout = 'admin.layouts.template';

    // for author dashboard
    if(auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

return view('admin.pages.news.add-news', compact('categories','subcategories','roles','layout'));
}
  



 public function store(Request $request)
{
    $data = $request->validate([
        // NEWS ONLY
        'slug' => 'required|unique:news,slug',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        'role_id' => 'required|exists:roles,id',
        'status' => 'required|in:draft,published',
        'image' => 'required|image',
    ]);

    // IMAGE UPLOAD
    $imageName = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');

        $imageName = time().'.'.$file->getClientOriginalExtension();

        $file->storeAs('gallery', $imageName, 'public');
    }

    // SAVE NEWS
    $news = new News();

    $news->slug = Str::slug($data['slug']);
    $news->category_id = $data['category_id'];
    $news->subcategory_id = $data['subcategory_id'];
    $news->role_id = $data['role_id'];
    $news->status = $data['status'];
    $news->image = $imageName;

    $news->save();

    return redirect()->back()->with('success','news has been added');
}

public function index(){

$news = News::all();

return view('admin.pages.news.news-index', compact('news'));
}

public function newsTranslate(){

$news = News::all();

$slugs =  News::where('slug')->get();

return view('admin.pages.news_translations.news-translations',compact('slugs','news'));
}

public function storeTranslation(Request $request)
{
    $data = $request->validate([
        'news_id' => 'required|exists:news,id',
        'language_id' => 'required|exists:languages,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'nullable|string',
    ]);

    // Save or update translation (prevents duplicates)
    NewsTranslation::updateOrCreate(
        [
            'news_id' => $data['news_id'],
            'language_id' => $data['language_id'],
        ],
        [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
        ]
    );

    return redirect()
        ->back()
        ->with('success', 'News translation saved successfully');
}

public function translateIndex(){

$news = NewsTranslation::all();

return view('admin.pages.news_translations.index',compact('news'));
}

public function edit(NewsTranslation $news){

$languages = Language::all();
$subcategories = Subcategory::all();
$roles = Role::all();

return view('admin.pages.news.edit',compact('news','languages','subcategories','roles'));
}


public function update(Request $request, News $news)
{
    $data = $request->validate([

        // NEWS
        'slug' => 'required|unique:news,slug,' . $news->id,
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        'role_id' => 'required|exists:roles,id',
        'status' => 'required|in:draft,published',
        'image' => 'nullable|image',

        // TRANSLATION
        'language_id' => 'required|exists:languages,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'nullable|string',
    ]);

    /*
    ==================
    IMAGE UPDATE
    ==================
    */

    if ($request->hasFile('image')) {

        if ($news->image) {

            Storage::disk('public')
                ->delete('gallery/' . $news->image);
        }

        $file = $request->file('image');

        $imageName =
            time().'.'.
            $file->getClientOriginalExtension();

        $file->storeAs(
            'gallery',
            $imageName,
            'public'
        );

        $news->image = $imageName;
    }

    /*
    ==================
    UPDATE NEWS
    ==================
    */

    $news->slug =
        \Illuminate\Support\Str::slug($data['slug']);

    $news->category_id =
        $data['category_id'];

    $news->subcategory_id =
        $data['subcategory_id'];

    $news->role_id =
        $data['role_id'];

    $news->status =
        $data['status'];

    $news->save();

    /*
    ==================
    UPDATE TRANSLATION
    ==================
    */

    $translation =
        NewsTranslation::where(
            'news_id',
            $news->id
        )
        ->where(
            'language_id',
            $data['language_id']
        )
        ->first();

    if ($translation) {

        $translation->title =
            $data['title'];

        $translation->description =
            $data['description'];

        $translation->content =
            $data['content'];

        $translation->save();
    }

    return redirect()
        ->back()
        ->with(
            'success',
            'News updated successfully'
        );
}

public function delete( NewsTranslation $news){

$news->delete();

return redirect()->back();
}
}
