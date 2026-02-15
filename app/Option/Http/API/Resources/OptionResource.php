<?php

namespace App\Option\Http\API\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'key'               => $this->key,
            'value'             => $this->value,
            'title'             => $this->title,
            'description'       => $this->description,
            'validation_rules'  => $this->validationRules,
        ];
    }
}
