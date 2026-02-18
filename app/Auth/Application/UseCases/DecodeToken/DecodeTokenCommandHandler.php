<?php

namespace App\Auth\Application\UseCases\DecodeToken;

use App\Auth\Domain\Repositories\TokenRepository;
use App\Auth\Domain\Repositories\UserRepository;

class DecodeTokenCommandHandler
{
    public function __construct(
        private TokenRepository $tokenRepository,
        private UserRepository $userRepository,
    ) {}

    public function handle(DecodeTokenCommand $command)
    {        
        if (!$command->token) return;
        
        $payload = $this->tokenRepository->decode($command->token);

        if (!$payload?->user_id || !$payload?->expires_at >= now()->getTimestamp()) return;

        $this->userRepository->authorize($payload->user_id ?? '');
    }
}