<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class EditorController extends Controller
{
    public function dashboard()
    {
        $totalNews = News::count();

        $pendingNews = News::where('status', 'pending')->count();
        $approvedNews = News::where('status', 'approved')->count();
        $rejectedNews = News::where('status', 'rejected')->count();

        return view('editor.dashboard', compact(
            'totalNews',
            'pendingNews',
            'approvedNews',
            'rejectedNews'
        ));
    }

    public function pendingNews()
    {
        $news = News::with(['author', 'translations.language'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('editor.news.pending-news', compact('news'));
    }

    public function approvedNews()
    {
        $news = News::with(['author', 'translations.language'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('editor.news.approved-news', compact('news'));
    }

    public function rejectedNews()
    {
        $news = News::with(['author', 'translations.language'])
            ->where('status', 'rejected')
            ->latest()
            ->get();

        return view('editor.news.rejected-news', compact('news'));
    }

    /* -----------------------------
        APPROVE NEWS
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

        $news->translations()->update([
        'status' => 'approved',
        'approved_by' => auth()->id(),
        'approved_at' => now(),
    ]);

        return back()->with('success', 'News approved successfully');
    }

    /* -----------------------------
        REJECT NEWS
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

        return back()->with('success', 'News rejected successfully');
    }
}