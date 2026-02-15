<?php

namespace App\Auth\Application\Read\GetAuthorizedUser;

use App\Shared\Application\Exceptions\UnauthorizedException;
use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Repositories\UserRepository;

class GetAuthorizedUserQueryHandler
{
    public function __construct(
        private UserRepository $userRepository,
    ) {}

    public function handle(GetAuthorizedUserQuery $query): User
    {
        $user = $this->userRepository->getAuthorized();

        if (!$user) {
            throw new UnauthorizedException();
        }

        return $user;
    }
}