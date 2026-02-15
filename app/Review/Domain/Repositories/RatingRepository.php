<?php

namespace App\Review\Domain\Repositories;

use App\Review\Domain\Entities\Rating;

interface RatingRepository
{
    public function get(string $businessId): Rating|null;
}