<?php

namespace App\Auth\Infrastructure\Providers;

use App\Auth\Application\Read\GetAuthorizedUser\GetAuthorizedUserQuery;
use App\Auth\Application\Read\GetAuthorizedUser\GetAuthorizedUserQueryHandler;
use App\Auth\Application\UseCases\LoginUser\LoginUserCommand;
use App\Auth\Application\UseCases\LoginUser\LoginUserCommandHandler;
use App\Auth\Application\UseCases\RegisterUser\RegisterUserCommand;
use App\Auth\Application\UseCases\RegisterUser\RegisterUserCommandHandler;
use App\Auth\Application\Contracts\Hasher;
use App\Auth\Domain\Repositories\TokenRepository;
use App\Auth\Domain\Repositories\UserRepository;
use App\Auth\Infrastructure\Persistence\Token\JWT\JWTokenRepository;
use App\Auth\Infrastructure\Persistence\User\Eloquent\EloquentUserModel;
use App\Auth\Infrastructure\Persistence\User\Eloquent\EloquentUserRepository;
use App\Auth\Infrastructure\Services\Hasher\LaravelHasher;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
        Config::set('auth.providers.users.model', EloquentUserModel::class);

        $this->app->get(Dispatcher::class)->map([
            LoginUserCommand::class         => LoginUserCommandHandler::class,
            RegisterUserCommand::class      => RegisterUserCommandHandler::class,
            GetAuthorizedUserQuery::class   => GetAuthorizedUserQueryHandler::class,
        ]);

        $this->app->bind(UserRepository::class, EloquentUserRepository::class);

        $this->app->bind(TokenRepository::class, JWTokenRepository::class);

        $this->app->bind(Hasher::class, LaravelHasher::class);
    }
}
