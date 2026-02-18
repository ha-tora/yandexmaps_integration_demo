<?php

namespace App\Auth\Http\Middleware;

use App\Auth\Application\UseCases\DecodeToken\DecodeTokenCommand;
use Closure;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function __construct(
        private Dispatcher $dispatcher,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $token = trim(str_replace('Bearer', '', $request->header('Authorization')));
        
        $this->dispatcher->dispatchSync(new DecodeTokenCommand($token));
        
        return $next($request);
    }
}
