<?php

namespace App\Shared\Domain\Exceptions;

class NotFoundException extends BaseException
{
    public function __construct(
        string $message = 'Not Found'
    ) {
        parent::__construct(null, $message);
    }
}
