<?php

namespace App\Review\Infrastructure\Persistence\YandexMaps;

use App\Review\Domain\Repositories\ReviewRepository;
use App\Review\Infrastructure\Clients\YandexMapsClient\YandexMapsClient;
use App\Shared\Domain\Entities\Pagination;

class YandexMapsReviewRepository implements ReviewRepository
{
    public function __construct(
        private YandexMapsClient $client,
        private YandexMapsReviewMapper $mapper,
    ) {}

    public function paginate(string $businessId, int $page, int $perPage): Pagination
    {
        $response = $this->client->get('maps/api/business/fetchReviews', [
            "csrfToken" => "4f48630f487710ea779b2d490b2b9f1517c6fec6:1771182429",
            "ajax" => "1",
            "businessId" => $businessId,
            "page" => $page,
            "pageSize" => $perPage,
            "locale" => "ru_RU"
        ], true);

        return $this->mapper->toDomain($response);
    }
}