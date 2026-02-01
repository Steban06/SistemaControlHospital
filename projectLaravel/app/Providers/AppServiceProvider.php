<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Share notifications data with header partial
        view()->composer('layouts.partials.header', function ($view) {
            if (auth()->check()) {
                $unreadCount = \App\Models\Notification::where('user_id', auth()->id())
                    ->where('is_read', false)
                    ->count();
                
                $recentNotifications = \App\Models\Notification::where('user_id', auth()->id())
                    ->where('is_read', false)
                    ->orderBy('created_at', 'desc')
                    ->limit(3)
                    ->get();
                
                $view->with([
                    'unreadCount' => $unreadCount,
                    'recentNotifications' => $recentNotifications
                ]);
            }
        });
    }
}
