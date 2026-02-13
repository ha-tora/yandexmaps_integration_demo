<?php

namespace App\Option\Infrastructure\Providers;

use App\Option\Application\Read\GetAllOptions\GetAllOptionsQuery;
use App\Option\Application\Read\GetAllOptions\GetAllOptionsQueryHandler;
use App\Option\Application\Read\GetOptionsByKeys\GetOptionsByKeysQuery;
use App\Option\Application\Read\GetOptionsByKeys\GetOptionsByKeysQueryHandler;
use App\Option\Application\UseCases\UpdateOptions\UpdateOptionsCommand;
use App\Option\Application\UseCases\UpdateOptions\UpdateOptionsCommandHandler;
use App\Option\Domain\Repositories\OptionRepository;
use App\Option\Infrastructure\Persistence\Eloquent\EloquentOptionRepository;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class OptionServiceProvider extends ServiceProvider
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
        $this->app->bind(OptionRepository::class, EloquentOptionRepository::class);

        $this->app->get(Dispatcher::class)->map([
            GetAllOptionsQuery::class       => GetAllOptionsQueryHandler::class,
            GetOptionsByKeysQuery::class    => GetOptionsByKeysQueryHandler::class,

            UpdateOptionsCommand::class     => UpdateOptionsCommandHandler::class,
        ]);
    }
}
