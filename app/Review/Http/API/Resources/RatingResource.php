<?php

namespace App\Review\Http\API\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'business' => [
                'id' => $this->business->id,
                'name' => $this->business->name,
            ],
            'stars_count' => $this->starsCount,
            'reviews_count' => $this->reviewsCount
        ];
    }
}
