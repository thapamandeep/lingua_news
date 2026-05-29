<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class EditorController extends Controller
{
    public function dashboard()
    {
        $totalNews = News::count();

        $pendingNews = News::where('status','pending')->count();

        $approvedNews = News::where('status','approved')->count();

        $rejectedNews = News::where('status','rejected')->count();

        return view('editor.dashboard', compact(
            'totalNews',
            'pendingNews',
            'approvedNews',
            'rejectedNews'
        ));
    }

    public function pendingNews()
    {
        $news = News::where('status','pending')->latest()->get();

        return view('editor.news.pending-news', compact('news'));
    }

    public function approvedNews()
    {
        $news = News::where('status','approved')->latest()->get();

        return view('editor.news.approved-news', compact('news'));
    }

    public function rejectedNews()
    {
        $news = News::where('status','rejected')->latest()->get();

        return view('editor.news.rejected-news', compact('news'));
    }
}