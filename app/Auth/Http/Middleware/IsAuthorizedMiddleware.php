<?php

namespace App\Auth\Http\Middleware;

use App\Auth\Domain\Repositories\UserRepository;
use App\Shared\Application\Exceptions\UnauthorizedException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuthorizedMiddleware
{
    public function __construct(
        private UserRepository $userRepository,
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->userRepository->getAuthorized()) {
            throw new UnauthorizedException();
        }

        return $next($request);
    }
}
