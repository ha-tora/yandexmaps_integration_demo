<?php

namespace App\Auth\Application\UseCases\DecodeToken;

class DecodeTokenCommand
{
    public function __construct(
        public string $token
    ) {}
}