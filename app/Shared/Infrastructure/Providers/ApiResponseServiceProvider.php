<?php

namespace App\Shared\Infrastructure\Providers;

use App;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
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
            if ($data instanceof JsonResource) {
                $data = $data->toArray(App::get(Request::class));
            }

            $value = is_array($data)
                ? ($data['data'] ?? $data)
                : ($data->data ?? $data);

            $meta = is_array($data)
                ? ($data['meta'] ?? null)
                : ($data->meta ?? null);

            $format = [
                'status'  => true,
                'message' => $message,
                'data'    => $value,
            ] + ($meta !== null ? ['meta' => $meta] : []);

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
