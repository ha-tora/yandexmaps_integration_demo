<?php

namespace App\Option\Http\API\Requests;

use App\Shared\Http\API\Requests\ApiFormRequest;

class UpdateOptionsRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            '*' => ['required', 'array:key,value'],
            '*.key' => ['required', 'string', 'exists:options,key'],
            '*.value' => ['required', 'nullable'],
        ];
    }
}
