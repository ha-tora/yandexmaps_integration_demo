<?php

namespace App\Auth\Domain\Entities;

class Token
{
    public function __construct(
        public string $token,
        public string $expiresAt
    ) {}
}