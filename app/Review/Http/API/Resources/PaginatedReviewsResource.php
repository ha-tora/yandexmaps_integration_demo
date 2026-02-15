<?php

namespace App\Review\Http\API\Resources;

use Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginatedReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => Arr::map($this->items, function ($review) {
                return new ReviewResource($review);
            }),
            'meta' => [
                'current_page' => $this->pageLink($this->currentPage),
                'prev_page' => $this->pageLink($this->prevPage),
                'next_page' => $this->pageLink($this->nextPage),
                'first_page' => $this->pagelink($this->firstPage),
                'last_page' => $this->pageLink($this->lastPage),
                'per_page' => $this->perPage,
                'total' => $this->count,
            ]
        ];
    }

    private function pageLink(int|null $page)
    {
        return [
            'value' => $page,
            'url' => $page ? route('api.reviews.index', ['page' => $page]) : null
        ];
    }
}
