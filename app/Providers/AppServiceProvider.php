<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Setting;
use App\Observers\ActivityObserver;
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
        Banner::observe(ActivityObserver::class);
        Setting::observe(ActivityObserver::class);
    }
}
