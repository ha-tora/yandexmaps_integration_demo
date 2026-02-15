<?php

namespace App\Auth\Application\UseCases\LoginUser;

use App\Auth\Application\Contracts\Hasher;
use App\Auth\Domain\Entities\Token;
use App\Auth\Domain\Repositories\TokenRepository;
use App\Auth\Domain\Repositories\UserRepository;
use App\Shared\Application\Exceptions\UnauthorizedException;

class LoginUserCommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
        private TokenRepository $tokenRepository,
        private Hasher $hasher,
    ) {}

    public function handle(LoginUserCommand $command): Token
    {
        $user = $this->userRepository->getByEmail($command->email);

        if (!$user || !$this->hasher->check($command->password, $user->password)) {
            throw new UnauthorizedException();
        }

        $token = $this->tokenRepository->create($user);

        return $token;
    }
}