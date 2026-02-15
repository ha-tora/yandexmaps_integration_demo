<?php

namespace App\Shared\Http\Exceptions;

use App\Shared\Domain\Exceptions\BaseException;

class BadRequestException extends BaseException
{
    public function __construct(
        array|string|null $data = [],
        string $message = 'Bad Request',
    ) {
        parent::__construct($data, $message);
    }
}
