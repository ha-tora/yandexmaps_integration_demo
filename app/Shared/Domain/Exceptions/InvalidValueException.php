<?php

namespace App\Shared\Domain\Exceptions;

class InvalidValueException extends BaseException
{
    public function __construct(
        string|array|null $errors = [], 
        string $message = 'Invalid values',
    ) {
        parent::__construct($errors, $message);
    }
}
