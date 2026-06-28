<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\News;
use App\Models\Role;
use App\Models\Subcategory;
use App\Models\Setting;
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
 News::with(['author', 'category']);

    // for author dashboard
   if(auth()->check() && auth()->user()->role_id == 2){
        $layout = 'author.layouts.template';
    }

return view('admin.pages.news.add-news', compact('categories','subcategories','roles','layout'));
}
  



public function store(Request $request)
{
     
    $data = $request->validate([
        'slug' => 'required|unique:news,slug',
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
        
        'image' => 'required|image',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('gallery', $imageName, 'public');
    }

    $news = new News();
    $news->slug = Str::slug($data['slug']);
    $news->category_id = $data['category_id'];
    $news->subcategory_id = $data['subcategory_id'];
    $news->status = 'pending';

    // NEW SYSTEM FIELDS
    $news->author_id = auth()->id();
    $news->image = $imageName;


    $news->save();

    return back()->with('success', 'News created successfully');
}

public function index()
{
    $news = News::with(['author', 'category'])
        ->latest()
        ->get();

    return view('admin.pages.news.news-index', compact('news'));
}

public function editNews(News $news){

$subcategories = Subcategory::all();
$roles = Role::all();

return view('admin.pages.news.edit',compact('news','subcategories','roles'));
}

public function newsTranslate()
{
    $news = News::latest()->get();
    $languages = Language::all();

    $layout = 'admin.layouts.template';

    if (auth()->check() && auth()->user()->role_id == 2) {
        $layout = 'author.layouts.template';
    }

    return view(
        'admin.pages.news_translations.news-translations',
        compact('news', 'languages', 'layout')
    );
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

    NewsTranslation::updateOrCreate(
        [
            'news_id' => $data['news_id'],
            'language_id' => $data['language_id'],
        ],
        [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],

            // Workflow fields
            'author_id' => auth()->id(),
            'status' => 'pending',
            'approved_by' => null,
            'approved_at' => null,
        ]
    );

    return redirect()
        ->back()
        ->with('success', 'Translation submitted for review successfully.');
}

public function translateIndex(){

$news = NewsTranslation::with([
    'author',
    'approver'
])->latest()->get();

return view('admin.pages.news_translations.index',compact('news'));
}

public function edit(NewsTranslation $translation){

$languages = Language::all();
$subcategories = Subcategory::all();
$roles = Role::all();

return view('admin.pages.news_translations.edit',compact('translation','languages','subcategories','roles'));
}


public function updateNews(Request $request, News $news)
{
    $data = $request->validate([
        'slug' => 'required|unique:news,slug,' . $news->id,
        'category_id' => 'required|exists:categories,id',
        'subcategory_id' => 'nullable|exists:subcategories,id',
       
        'image' => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        if ($news->image) {
            Storage::disk('public')->delete('gallery/' . $news->image);
        }

        $file = $request->file('image');
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('gallery', $imageName, 'public');

        $news->image = $imageName;
    }

    $news->slug = Str::slug($data['slug']);
    $news->category_id = $data['category_id'];
    $news->subcategory_id = $data['subcategory_id'];
    $news->status = 'pending';
    $news->author_id = auth()->id();

    $news->save();

    return back()->with('success', 'News updated successfully');
}



public function updateTranslation(Request $request, NewsTranslation $translation)
{
    $data = $request->validate([
        'news_id' => 'required|exists:news,id',
        'language_id' => 'required|exists:languages,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'content' => 'nullable|string',
    ]);

        $translation->news_id = $data['news_id'];
$translation->language_id = $data['language_id'];
$translation->title = $data['title'];
$translation->description = $data['description'];
$translation->content = $data['content'];

// Workflow
$translation->author_id = auth()->id();
$translation->status = 'pending';
$translation->approved_by = null;
$translation->approved_at = null;

$translation->save();
      

    return redirect()->back()->with('success', 'Translation updated successfully');
}


// public function update(Request $request, News $news , NewsTranslation $translation)
// {
//     $data = $request->validate([

//         // NEWS
//         'slug' => 'required|unique:news,slug,' . $news->id,
//         'category_id' => 'required|exists:categories,id',
//         'subcategory_id' => 'nullable|exists:subcategories,id',
//         'role_id' => 'required|exists:roles,id',
//         'status' => 'required|in:draft,published',
//         'image' => 'nullable|image',

//         // TRANSLATION
//         'language_id' => 'required|exists:languages,id',
//         'title' => 'required|string|max:255',
//         'description' => 'required|string',
//         'content' => 'nullable|string',
//     ]);

//     /*
//     ==================
//     IMAGE UPDATE
//     ==================
//     */

//     if ($request->hasFile('image')) {

//         if ($news->image) {

//             Storage::disk('public')
//                 ->delete('gallery/' . $news->image);
//         }

//         $file = $request->file('image');

//         $imageName =
//             time().'.'.
//             $file->getClientOriginalExtension();

//         $file->storeAs(
//             'gallery',
//             $imageName,
//             'public'
//         );

//         $news->image = $imageName;
//     }

//     /*
//     ==================
//     UPDATE NEWS
//     ==================
//     */

//     $news->slug =
//         \Illuminate\Support\Str::slug($data['slug']);

//     $news->category_id =
//         $data['category_id'];

//     $news->subcategory_id =
//         $data['subcategory_id'];

//     $news->role_id =
//         $data['role_id'];

//     $news->status =
//         $data['status'];

//     $news->save();

//     /*
//     ==================
//     UPDATE TRANSLATION
//     ==================
//     */

//     $translation =
//         NewsTranslation::where(
//             'news_id',
//             $news->id
//         )
//         ->where(
//             'language_id',
//             $data['language_id']
//         )
//         ->first();

//     if ($translation) {

//         $translation->title =
//             $data['title'];

//         $translation->description =
//             $data['description'];

//         $translation->content =
//             $data['content'];

//         $translation->save();
//     }

//     return redirect()
//         ->back()
//         ->with(
//             'success',
//             'News updated successfully'
//         );
// }


public function delete(NewsTranslation $translation)
{
    $translation->delete();

    return back()->with('success', 'Translation deleted successfully');
}

public function approve(News $news)
{
    $news->status = 'approved';
    $news->approved_by = auth()->id();
    $news->approved_at = now();
    $news->save();

    return back()->with('success', 'News approved');
}

public function reject(News $news)
{
    $news = News::where('status', 'rejected')->get();

       dd($news->first());


    return view('editor.news.rejected-news', compact('news'));
}

public function approveTranslation(NewsTranslation $translation)
{
    $translation->status = 'approved';
    $translation->approved_by = auth()->id();
    $translation->approved_at = now();

    $translation->save();

    return back()->with(
        'success',
        'Translation approved successfully'
    );
}

public function rejectTranslation(NewsTranslation $translation)
{
    $translation->status = 'rejected';
    $translation->approved_by = auth()->id();
    $translation->approved_at = now();

    $translation->save();

    return back()->with(
        'success',
        'Translation rejected successfully'
    );
}

// search-----------------------//

public function search(Request $request)
{
    $query = News::with(['translations', 'category']);
    
   $logo = Setting::where('key', 'site_logo')->first();
     $siteTitle = Setting::where('key', 'site_title')->value('value');
   $settings = Setting::pluck('value', 'key');

    // Search by title or description
    if ($request->filled('search')) {

        $search = trim($request->search);

        $query->whereHas('translations', function ($q) use ($search) {

            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('description', 'LIKE', "%{$search}%");
        });
    }

    // Filter by date
    if ($request->filled('date')) {
        $query->whereDate('created_at', $request->date);
    }

    $news = $query->latest()->paginate(10);



    return view('fronted.searchs.index', compact('news','logo','siteTitle','settings'));
}
}
