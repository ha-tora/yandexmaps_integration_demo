<?php

namespace App\Review\Domain\Repositories;

use App\Review\Domain\Entities\Review;
use App\Shared\Domain\Entities\Pagination;

interface ReviewRepository
{
    /**
     * @param string $businessId
     * @param int $page
     * @param int $perRage
     * @return Pagination<Review>
     */
    public function paginate(string $businessId, int $page, int $perRage): Pagination;
}