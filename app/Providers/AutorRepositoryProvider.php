<?php

namespace App\Providers;

use App\Contracts\Repositories\AutorRepositoryContract;
use App\Repositories\AutorRepository;
use Illuminate\Support\ServiceProvider;

class AutorRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AutorRepositoryContract::class, AutorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
