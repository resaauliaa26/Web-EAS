<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Asset;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Fix untuk Railway deployment - pastikan path public benar
        $this->app->bind('path.public', function() {
            return base_path('public');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS di production (Railway menggunakan HTTPS)
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        
        // Fix asset URLs untuk Vite (jika menggunakan Vite)
        if (config('app.env') === 'production') {
            // Pastikan asset menggunakan manifest.json yang benar
            Asset::useManifestFilename('manifest.json');
        }
    }
}