<?php

namespace App\Review\Application\Read\GetAllReviews;

use App\Review\Application\Exceptions\BusinessNotFound;
use App\Review\Application\Services\BusinessUrlParser;
use App\Option\Domain\Repositories\OptionRepository;
use App\Review\Domain\Repositories\ReviewRepository;
use App\Shared\Domain\Entities\Pagination;

class GetAllReviewsQueryHandler
{
    public function __construct(
        private OptionRepository $optionRepository,
        private ReviewRepository $reviewRepository,
        private BusinessUrlParser $businessUrlParser,
    ) {}

    public function handle(GetAllReviewsQuery $query): Pagination
    {
        $businessUrlOption = $this->optionRepository->getByKeys(['business_url'])[0] ?? null;

        if (!$businessUrlOption || !$businessId = $this->businessUrlParser->parse($businessUrlOption->value)) {
            throw new BusinessNotFound();
        }

        $reviews = $this->reviewRepository->paginate(
            $businessId,
            $query->page,
            $query->perPage,
        );

        return $reviews;
    }
}