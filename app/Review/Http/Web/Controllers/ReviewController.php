<?php

namespace App\Review\Http\Web\Controllers;

use App\Option\Application\Read\GetOptionsByKeys\GetOptionsByKeysQuery;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviewsOption = $this->dispatcher->dispatchSync(new GetOptionsByKeysQuery(
            ['business_url']
        ))[0] ?? null;

        return Inertia::render('Reviews/Index', [
            'business_url' => $reviewsOption->value
        ]);
    }
}