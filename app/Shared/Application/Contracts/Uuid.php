<?php

namespace App\Shared\Application\Contracts;

interface Uuid
{
    public function get(): string;
}