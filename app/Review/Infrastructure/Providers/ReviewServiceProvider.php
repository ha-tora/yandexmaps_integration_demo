<?php

namespace App\Review\Infrastructure\Providers;

use App\Review\Application\Read\GetAllReviews\GetAllReviewsQuery;
use App\Review\Application\Read\GetAllReviews\GetAllReviewsQueryHandler;
use App\Review\Application\Read\GetRating\GetRatingQuery;
use App\Review\Application\Read\GetRating\GetRatingQueryHandler;
use App\Review\Application\Services\BusinessUrlParser;
use App\Review\Domain\Repositories\RatingRepository;
use App\Review\Domain\Repositories\ReviewRepository;
use App\Review\Infrastructure\Persistence\YandexMaps\YandexMapsRatingRepository;
use App\Review\Infrastructure\Persistence\YandexMaps\YandexMapsReviewRepository;
use App\Review\Infrastructure\Services\YandexMapsBusinessUrlParser;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->get(Dispatcher::class)->map([
            GetAllReviewsQuery::class => GetAllReviewsQueryHandler::class,
            GetRatingQuery::class => GetRatingQueryHandler::class,
        ]);

        $this->app->bind(ReviewRepository::class, YandexMapsReviewRepository::class);
        $this->app->bind(RatingRepository::class, YandexMapsRatingRepository::class);

        $this->app->bind(BusinessUrlParser::class, YandexMapsBusinessUrlParser::class);
    }
}
