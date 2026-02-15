<?php

namespace App\Review\Infrastructure\Persistence\YandexMaps;

use App\Review\Domain\Entities\Rating;
use App\Review\Domain\ValueObjects\Business;

class YandexMapsRatingMapper
{
    public function toDomain(array $array)
    {
        return new Rating(
            (float)$array['stars_count'],
            (int)$array['reviews_count'],
            new Business(
                $array['business_id'],
                $array['business_name']
            )
        );
    }
}