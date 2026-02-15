<?php

namespace App\Option\Domain\Exceptions;

use App\Shared\Domain\Exceptions\InvalidValueException;

class InvalidOptionValueException extends InvalidValueException
{
    public function __construct($errors) {
        parent::__construct($errors, 'Invalid option values');
    }
}
