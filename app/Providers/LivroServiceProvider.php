<?php

namespace App\Providers;

use App\Contracts\Services\LivroServiceContract;
use App\Services\LivroService;
use Illuminate\Support\ServiceProvider;

class LivroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LivroServiceContract::class, LivroService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
