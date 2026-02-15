<?php

namespace App\Shared\Infrastructure\Providers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
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
        Response::macro('success', function ($data = [], int $status = 200, string $message = 'OK'): JsonResponse {
            $format = [
                'status'    => true,
                'message'   => $message,
                'data'      => $data
            ];

            return Response::json($format, $status);
        });
        
        Response::macro('error', function ($errors = [], int $status = 500, string $message = 'Internal Server Error'): JsonResponse {
            $format = [
                'status' => $status,
                'message' => $message,
                'errors' => $errors
            ];

            return Response::json($format, $status);
        });

        Response::macro('created', function ($data = [], int $status = 201, string $message = 'Created'): JsonResponse {
            $format = [
                'status'    => true,
                'message'   => $message,
                'data'      => $data
            ];
            
            return Response::json($format, $status);
        });
    }
}
