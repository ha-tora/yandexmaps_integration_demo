<?php

namespace App\Review\Domain\Entities;

use App\Review\Domain\ValueObjects\Business;

class Rating
{
    public function __construct(
        public float $starsCount,
        public int $reviewsCount,
        public Business $business,
    ) {}
}