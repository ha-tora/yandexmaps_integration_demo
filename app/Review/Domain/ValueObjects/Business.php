<?php

namespace App\Review\Domain\ValueObjects;

class Business
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}
}