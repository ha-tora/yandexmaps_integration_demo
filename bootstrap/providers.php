<?php

return [
    App\Auth\Infrastructure\Providers\AuthServiceProvider::class,
    App\Option\Infrastructure\Providers\OptionServiceProvider::class,
    App\Review\Infrastructure\Providers\ReviewServiceProvider::class,
    App\Shared\Infrastructure\Providers\ApiResponseServiceProvider::class,
    App\Shared\Infrastructure\Providers\ApiRouteServiceProvider::class,
    App\Shared\Infrastructure\Providers\AppServiceProvider::class,
    App\Shared\Infrastructure\Providers\ExceptionHandlerServiceProvider::class,
];
