<?php

namespace App\Auth\Application\UseCases\RegisterUser;

use App\Auth\Application\UseCases\RegisterUser\RegisterUserCommand;
use App\Auth\Application\Contracts\Hasher;
use App\Auth\Domain\Entities\Token;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Repositories\TokenRepository;
use App\Auth\Domain\Repositories\UserRepository;
use App\Shared\Application\Contracts\Uuid;

class RegisterUserCommandHandler
{
    public function __construct(
        private UserRepository $userRepository,
        private TokenRepository $tokenRepository,
        private Hasher $hasher,
        private Uuid $uuid,
    ) {}

    public function handle(RegisterUserCommand $command): Token 
    {
        $user = new User(
            id: $this->uuid->get(),
            name: $command->name,
            email: $command->email,
            password: $this->hasher->hash($command->password),
        );

        $this->userRepository->save($user);

        $token = $this->tokenRepository->create($user);

        return $token;
    }
}