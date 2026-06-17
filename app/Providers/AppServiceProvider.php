<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notifikasi;

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
        View::composer('*', function ($view) {

            $totalNotif = 0;

            if (auth()->check()) {
                $totalNotif = Notifikasi::where('user_id', auth()->id())
                    ->where('dibaca', false)
                    ->count();
            }

            $view->with('totalNotif', $totalNotif);
        });
    }
}