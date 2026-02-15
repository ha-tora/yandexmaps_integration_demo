<?php

namespace App\Review\Domain\ValueObjects;

class Author
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}
}