<?php

namespace App\Review\Domain\Entities;

use App\Review\Domain\ValueObjects\Author;
use App\Review\Domain\ValueObjects\Business;

class Review
{
    public function __construct(
        public string $id,
        public string $text,
        public int $rating,
        public string $businessId,
        public Author $author,
        public string $createdAt,
    ) {}
}