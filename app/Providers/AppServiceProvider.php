<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\Models\Category;
use App\Models\Language;
use App\Models\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {

            // Frontend Categories
            $categories = Category::where('status', 'active')->get();

            // Languages
            $languages = Language::all();

            // Unread Notifications Count
            $unreadNotifications = Notification::where('is_read', false)->count();

            $view->with([
                'categories' => $categories,
                'languages' => $languages,
                'unreadNotifications' => $unreadNotifications,
            ]);

        });
    }
}