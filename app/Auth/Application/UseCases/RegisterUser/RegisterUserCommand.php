<?php

namespace App\Auth\Application\UseCases\RegisterUser;

class RegisterUserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}
}