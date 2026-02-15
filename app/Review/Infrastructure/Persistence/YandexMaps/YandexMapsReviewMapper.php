<?php

namespace App\Review\Infrastructure\Persistence\YandexMaps;

use App\Review\Domain\Entities\Review;
use App\Review\Domain\ValueObjects\Author;
use App\Shared\Domain\Entities\Pagination;
use Arr;

class YandexMapsReviewMapper
{
    public function toDomain($array)
    {
        return new Pagination(
            Arr::map($array['data']['reviews'], function ($review) {
                return new Review(
                    $review['reviewId'],
                    $review['text'],
                    $review['businessId'],
                    new Author(
                        $review['author']['publicId'],
                        $review['author']['name'],
                    ),
                    $review['updatedTime']
                );
            }),
            $array['data']['params']['limit'],
            $array['data']['params']['page'],
            $array['data']['params']['totalPages'],
            $array['data']['params']['count'],
        );
    }
}