<?php

namespace App\Shared\Domain\Contracts;

interface Uuid
{
    public function get(): string;
}