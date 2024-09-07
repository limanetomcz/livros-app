<?php

namespace App\Providers;

use App\Contracts\Services\AutorServiceContract;
use App\Services\AutorService;
use Illuminate\Support\ServiceProvider;

class AutorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AutorServiceContract::class, AutorService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
