<?php

namespace App\Auth\Http\Middleware;

use App\Auth\Domain\Repositories\TokenRepository;
use App\Auth\Domain\Repositories\UserRepository;
use App\Shared\Application\Exceptions\UnauthorizedException;
use Auth;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function __construct(
        private TokenRepository $tokenRepository,
        private UserRepository $userRepository,
    ) {}

    public function handle(Request $request, Closure $next): Response
    {
        $token = trim(str_replace('Bearer', '', $request->header('Authorization')));
        
        if (!$token) return $next($request);
        
        $payload = $this->tokenRepository->decode($token);

        if (!$payload->user_id || !$payload->expires_at >= now()->getTimestamp()) return $next($request);

        $this->userRepository->authorize($payload->user_id ?? '');
        
        return $next($request);
    }
}
