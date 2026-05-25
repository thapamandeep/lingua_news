<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\Language;
use App\Models\NewsTranslation;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function newsAdd(){

    $categories = Category::all();
    $subcategories = Subcategory::all();
    $roles = Role::all();
    $languages = Language::all();

    return view('admin.pages.news.add', compact('categories','subcategories','roles','languages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([

            // NEWS
            'slug' => 'required|unique:news,slug',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:draft,published',
            'image' => 'required|image',

            // TRANSLATION
            'language_id' => 'required|exists:languages,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
        ]);

        /*
        ==================
        IMAGE UPLOAD
        ==================
        */

        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $imageName =
                time().'.'.
                $file->getClientOriginalExtension();

            $file->storeAs(
                'gallery',
                $imageName,
                'public'
            );
        }

        /*
        ==================
        SAVE NEWS
        ==================
        */

    
    $news = new News();

    $news->slug = \Illuminate\Support\Str::slug($data['slug']);
    $news->category_id = $data['category_id'];
    $news->subcategory_id = $data['subcategory_id'];
    $news->role_id = $data['role_id'];
    $news->status = $data['status'];
    $news->image = $imageName;

    $news->save();

        /*
        ==================
        SAVE TRANSLATION
        ==================
        */
$translation = new NewsTranslation();

$translation->news_id = $news->id;
$translation->language_id = $data['language_id'];
$translation->title = $data['title'];
$translation->description = $data['description'];
$translation->content = $data['content'];

$translation->save();

// dd($request->all());

return redirect()->back()->with('success','news has added');
}

public function index(){

$news = NewsTranslation::all();

return view('admin.pages.news.index', compact('news'));
}

public function edit(NewsTranslation $news){

return view('admin.pages.news.edit');
}
}
