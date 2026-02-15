<?php

namespace App\Auth\Infrastructure\Services\Hasher;

use App\Auth\Application\Contracts\Hasher;
use Hash;

class LaravelHasher implements Hasher
{
    public function hash(string $plain): string
    {
        return Hash::make($plain);
    }

    public function check(string $plain, string $hash): bool
    {
        return Hash::check($plain, $hash);
    }
}