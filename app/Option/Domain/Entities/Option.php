<?php

namespace App\Option\Domain\Entities;

class Option
{
    public function __construct(
        public string $key,
        public ?string $value,
        public string $title,
        public string $description,
        public string $validationRules,
    ) {}
}