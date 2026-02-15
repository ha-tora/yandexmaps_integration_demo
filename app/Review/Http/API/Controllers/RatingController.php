<?php

namespace App\Review\Http\API\Controllers;

use App\Review\Application\Read\GetRating\GetRatingQuery;
use App\Review\Http\API\Resources\RatingResource;
use App\Shared\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function index()
    {
        $rating = $this->dispatcher->dispatchSync(new GetRatingQuery());

        return response()->success(new RatingResource($rating));
    }
}