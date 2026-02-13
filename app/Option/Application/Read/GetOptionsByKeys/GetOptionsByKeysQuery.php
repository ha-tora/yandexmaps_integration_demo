<?php

namespace App\Option\Application\Read\GetOptionsByKeys;

class GetOptionsByKeysQuery
{
    public function __construct(
        public array $keys,
    ) {}
}