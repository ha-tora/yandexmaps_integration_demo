<?php

namespace App\Auth\Http\API\Requests;

use App\Shared\Http\API\Requests\ApiFormRequest;

class RegisterUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'unique:users,name'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8']
        ];
    }
}
