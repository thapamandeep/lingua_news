<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Language;
use Illuminate\Support\Facades\View;

class SetLanguageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $langCode = session('lang', 'en');

        // Get language model
        $language = Language::where('code', $langCode)->first();

        // fallback if not found
        if (!$language) {
            $language = Language::where('code', 'en')->first();
        }

        // Set Laravel locale
        App::setLocale($language->code);

        // Share globally with all Blade views
        View::share('language', $language);

        return $next($request);
    }
}