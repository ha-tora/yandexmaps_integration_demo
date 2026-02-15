<?php

namespace App\Review\Infrastructure\Persistence\YandexMaps;

use App\Review\Domain\Entities\Rating;
use App\Review\Domain\Repositories\RatingRepository;
use App\Review\Infrastructure\Clients\YandexMapsClient\YandexMapsClient;
use App\Review\Infrastructure\Clients\YandexMapsClient\YandexMapsHtmlParser;

class YandexMapsRatingRepository implements RatingRepository
{
    public function __construct(
        private YandexMapsClient $client,
        private YandexMapsHtmlParser $parser,
        private YandexMapsRatingMapper $mapper,
    ) {}

    public function get(string $businessId): Rating|null
    {
        $response = $this->client->get('maps-reviews-widget/' . $businessId . '?comments');

        $rating = $this->parser->parse($response, [
            'business_name' => '.mini-badge__org-name',
            'reviews_count' => 'a.mini-badge__rating',
            'stars_count' => 'p.mini-badge__stars-count'
        ]);

        $rating['business_id'] = $businessId;

        $rating['stars_count'] = str_replace(',', '.', $rating['stars_count']);

        return $this->mapper->toDomain($rating);
    }
}