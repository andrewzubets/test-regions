<?php

namespace App\Providers;

use App\Custom\RegionManager;
use App\Models\Region;
use App\Observers\RegionObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('region_manager', RegionManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Region::observe(RegionObserver::class);
    }
}
