<?php

namespace App\Auth\Http\Web\Middleware;

use App\Auth\Domain\Repositories\UserRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAuthorizedMiddleware
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
            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
