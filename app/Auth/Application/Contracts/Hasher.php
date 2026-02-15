<?php

namespace App\Auth\Application\Contracts;

interface Hasher
{
    public function hash(string $plain): string;

    public function check(string $plain, string $hash): bool;
}