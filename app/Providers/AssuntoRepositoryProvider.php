<?php

namespace App\Providers;

use App\Contracts\Repositories\AssuntoRepositoryContract;
use App\Repositories\AssuntoRepository;
use Illuminate\Support\ServiceProvider;

class AssuntoRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AssuntoRepositoryContract::class, AssuntoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
