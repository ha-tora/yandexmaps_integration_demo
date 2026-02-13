<?php

namespace App\Option\Application\UseCases\UpdateOptions;

class UpdateOptionsCommand
{
    /**
     * @param array{key: string, value: string}[] $options
     */
    public function __construct(
        public readonly array $options
    ) {}
}