<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function newsAdd(){

    $categories = Category::all();

    return view('admin.pages.news.add', compact('categories'));
    }

public function store(Request $request)
{
    // 1. Validation
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:news,slug',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|string',
        'content' => 'nullable|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|in:draft,published',
    ]);

     // 3. Image Upload
    $imageName ="";
    if ($request->hasFile('image')) {

        $file = $request->file('image');

        $imageName = time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('gallery',$imageName,'public');
   
    }

    // 2. Create News object
    $news = new News();

    $news->title = $data['title'];

    // optional: auto-fix slug if needed
    $news->slug = Str::slug($data['slug']);

    $news->category_id = $data['category_id'];
    $news->description = $data['description'];
    $news->content = $data['content'] ?? null;
    $news->status = $data['status'];
    $news->image = $imageName;

   

    // 4. Save
    $news->save();

    // 5. Redirect
    return redirect()->back()->with('success', 'News created successfully!');
}
}
