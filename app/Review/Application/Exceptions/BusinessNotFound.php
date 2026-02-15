<?php

namespace App\Review\Application\Exceptions;

use App\Shared\Domain\Exceptions\NotFoundException;

class BusinessNotFound extends NotFoundException
{
    public function __construct() {
        return parent::__construct('Business not found');
    }
}