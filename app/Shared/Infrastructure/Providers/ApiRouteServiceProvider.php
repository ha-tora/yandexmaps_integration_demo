<?php

namespace App\Shared\Infrastructure\Providers;

use App\Shared\Domain\Exceptions\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApiRouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->name('api.')
            ->missing(function (Request $request) {
                throw new NotFoundException();
            })
            ->group(base_path('routes/api.php'));
    }
}
