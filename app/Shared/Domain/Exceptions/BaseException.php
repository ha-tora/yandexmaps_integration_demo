<?php

namespace App\Shared\Domain\Exceptions;

use Exception;

class BaseException extends Exception
{
    public function __construct(
        protected string|array|null $data = null,
        string $message
    ) {
        $this->message = $message;
    }

    public function getData(): array|string|null 
    {
        return $this->data;
    }
}
