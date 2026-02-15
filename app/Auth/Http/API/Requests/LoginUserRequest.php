<?php

namespace App\Auth\Http\API\Requests;

use App\Shared\Http\API\Requests\ApiFormRequest;

class LoginUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }
}
