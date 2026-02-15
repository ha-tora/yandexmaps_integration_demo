<?php

namespace App\Auth\Domain\Entities;

use App\Auth\Domain\Traits\HasUuid;

class User
{
    public function __construct(
        public string|null $id,
        public string $name,
        public string $email,
        public string $password,
    ) {}
}