<?php

namespace App\Providers;

use App\Contracts\Services\AssuntoServiceContract;
use App\Services\AssuntoService;
use Illuminate\Support\ServiceProvider;

class AssuntoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AssuntoServiceContract::class, AssuntoService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
