<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Notification;

class EditorController extends Controller
{
    /* -----------------------------
        DASHBOARD
    ------------------------------*/
  public function dashboard()
{
    $totalNews = News::count();

    $pendingNews = News::where('status', 'pending')->count();

    $approvedNews = News::where('status', 'approved')->count();

    $rejectedNews = News::where('status', 'rejected')->count();

    $recentPendingNews = News::with([
        'translations',
        'author',
        'category.translation'
    ])
    ->where('status', 'pending')
    ->latest()
    ->take(10)
    ->get();

    return view('editor.dashboard', compact(
        'totalNews',
        'pendingNews',
        'approvedNews',
        'rejectedNews',
        'recentPendingNews'
    ));
}

    /* -----------------------------
        PENDING NEWS
    ------------------------------*/
    public function pendingNews()
    {
        $news = News::with(['author', 'translations.language'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('editor.news.pending-news', compact('news'));
    }

    /* -----------------------------
        APPROVED NEWS
    ------------------------------*/
    public function approvedNews()
    {
        $news = News::with(['author', 'translations.language'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('editor.news.approved-news', compact('news'));
    }

    /* -----------------------------
        REJECTED NEWS
    ------------------------------*/
    public function rejectedNews()
    {
          $news = News::with('translations')
                ->where('status', 'rejected')
                ->get();
           

        return view('editor.news.rejected-news', compact('news'));
    }

    /* -----------------------------
        APPROVE NEWS (MAIN)
    ------------------------------*/
    public function approve(News $news)
    {
        if ($news->status === 'approved') {
            return back()->with('info', 'News is already approved');
        }

        if ($news->status === 'rejected') {
            return back()->with('error', 'Rejected news cannot be approved directly');
        }

        $news->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        // update translations too
        $news->translations()->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        // notification to author
        Notification::create([
            'user_id' => $news->author_id,
            'title' => 'News Approved',
            'message' => 'Your article "' . ($news->translations->first()->title ?? 'Untitled') . '" has been approved.'
        ]);

        return back()->with('success', 'News approved successfully');
    }

    /* -----------------------------
        REJECT NEWS (MAIN)
    ------------------------------*/
    public function reject(News $news)
    {
        if ($news->status === 'rejected') {
            return back()->with('info', 'News is already rejected');
        }

        $news->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        $news->translations()->update([
            'status' => 'rejected',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        Notification::create([
            'user_id' => $news->author_id,
            'title' => 'News Rejected',
            'message' => 'Your article "' . ($news->translations->first()->title ?? 'Untitled') . '" has been rejected.'
        ]);

        return back()->with('success', 'News rejected successfully');
    }
}