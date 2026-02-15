<?php

namespace App\Review\Http\API\Controllers;

use App\Review\Application\Read\GetAllReviews\GetAllReviewsQuery;
use App\Review\Http\API\Resources\PaginatedReviewsResource;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = $this->dispatcher->dispatchSync(new GetAllReviewsQuery(
            $request->page ?? 1,
            $request->perPage ?? 50,
        ));

        return response()->success(new PaginatedReviewsResource($reviews));
    }
}