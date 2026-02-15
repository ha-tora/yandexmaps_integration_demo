<?php

namespace App\Shared\Application\Exceptions;

use App\Shared\Domain\Exceptions\BaseException;

class UnauthorizedException extends BaseException
{
    public function __construct(
        array|string|null $errors = null, 
        string $message = 'Unauthorized'
    ) {
        parent::__construct($errors, $message);
    }
}
