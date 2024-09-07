<?php

namespace App\Providers;

use App\Contracts\Repositories\LivroRepositoryContract;
use App\Repositories\LivroRepository;
use Illuminate\Support\ServiceProvider;

class LivroRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LivroRepositoryContract::class, LivroRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
