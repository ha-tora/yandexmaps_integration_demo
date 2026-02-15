<?php

namespace App\Auth\Application\UseCases\LoginUser;

class LoginUserCommand
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}
}