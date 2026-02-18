<?php

namespace App\Shared\Infrastructure\Providers;

use App\Shared\Application\Contracts\Uuid;
use App\Shared\Infrastructure\Services\Uuid\SymfonyUuid;
use Illuminate\Support\Facades\Vite;
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
        Vite::prefetch(concurrency: 3);

        $this->app->bind(Uuid::class, SymfonyUuid::class);
    }
}
