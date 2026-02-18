<?php

namespace App\Review\Http\API\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'rating' => $this->rating,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
            ],
            'business_id' => $this->businessId,
            'created_at' => $this->createdAt,
        ];
    }
}
