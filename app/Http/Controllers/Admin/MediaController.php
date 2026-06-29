<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display a listing of media.
     */
    public function index()
    {
        $media = Media::with('news')
            ->latest()
            ->paginate(10);

        return view('admin.pages.media.index', compact('media'));
    }

    /**
     * Show upload form.
     */
    public function create()
    {
        $news = News::orderBy('id', 'desc')->get();

        return view('admin.pages.media.create', compact('news'));
    }

    /**
     * Store new media.
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
            'media_type' => 'required|in:thumbnail,featured,gallery,banner',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $file = $request->file('image');

        $path = $file->store('media', 'public');

        $imageInfo = getimagesize($file);

        Media::create([
            'news_id' => $request->news_id,
            'image' => $path,
            'alt_text' => $request->alt_text,
            'caption' => $request->caption,
            'media_type' => $request->media_type,
            'mime_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'width' => $imageInfo[0],
            'height' => $imageInfo[1],
            'is_featured' => $request->has('is_featured'),
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pages.media.index')
            ->with('success', 'Media uploaded successfully.');
    }

    /**
     * Edit media.
     */
    public function edit(Media $medium)
    {
        $news = News::all();

        return view('admin.media.edit', [
            'media' => $medium,
            'news' => $news
        ]);
    }

    /**
     * Update media.
     */
    public function update(Request $request, Media $medium)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'alt_text' => 'nullable|string|max:255',
            'caption' => 'nullable|string',
            'media_type' => 'required|in:thumbnail,featured,gallery,banner',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'news_id' => $request->news_id,
            'alt_text' => $request->alt_text,
            'caption' => $request->caption,
            'media_type' => $request->media_type,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {

            if ($medium->image && Storage::disk('public')->exists($medium->image)) {
                Storage::disk('public')->delete($medium->image);
            }

            $file = $request->file('image');

            $path = $file->store('media', 'public');

            $imageInfo = getimagesize($file);

            $data['image'] = $path;
            $data['mime_type'] = $file->getMimeType();
            $data['file_size'] = $file->getSize();
            $data['width'] = $imageInfo[0];
            $data['height'] = $imageInfo[1];
        }

        $medium->update($data);

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media updated successfully.');
    }

    /**
     * Delete media.
     */
    public function destroy(Media $medium)
    {
        if ($medium->image && Storage::disk('public')->exists($medium->image)) {
            Storage::disk('public')->delete($medium->image);
        }

        $medium->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('success', 'Media deleted successfully.');
    }
}