<?php

namespace App\Shared\Http\API\Requests;

use App\Shared\Application\Exceptions\UnauthorizedException;
use App\Shared\Http\Exceptions\BadRequestException;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new BadRequestException($validator->errors()->toArray());
    }

    public function failedAuthorization()
    {
        throw new UnauthorizedException();
    }
}
