<?php

return [
    App\Auth\Infrastructure\Providers\AuthServiceProvider::class,
    App\Option\Infrastructure\Providers\OptionServiceProvider::class,
    App\Shared\Infrastructure\Providers\ApiResponseServiceProvider::class,
    App\Shared\Infrastructure\Providers\ApiRouteServiceProvider::class,
    App\Shared\Infrastructure\Providers\ExceptionHandlerServiceProvider::class,
    App\Shared\Infrastructure\Providers\AppServiceProvider::class,
];
