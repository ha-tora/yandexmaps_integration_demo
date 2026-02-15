<?php

namespace App\Review\Application\Read\GetRating;

use App\Review\Application\Exceptions\BusinessNotFound;
use App\Review\Application\Services\BusinessUrlParser;
use App\Option\Domain\Repositories\OptionRepository;
use App\Review\Domain\Repositories\RatingRepository;

class GetRatingQueryHandler
{
    public function __construct(
        private OptionRepository $optionRepository,
        private RatingRepository $ratingRepository,
        private BusinessUrlParser $businessUrlParser,
    ) {}

    public function handle()
    {
        $businessUrlOption = $this->optionRepository->getByKeys(['business_url'])[0] ?? null;

        if (!$businessUrlOption || !$businessId = $this->businessUrlParser->parse($businessUrlOption->value)) {
            throw new BusinessNotFound();
        }

        $rating = $this->ratingRepository->get($businessId);

        if (!$rating) {
            throw new BusinessNotFound();
        }

        return $rating;
    }
}