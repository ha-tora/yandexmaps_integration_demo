<?php

namespace App\Review\Application\Read\GetAllReviews;

class GetAllReviewsQuery
{
    public function __construct(
        public readonly int $page,
        public readonly int $perPage,
    ) {}
}