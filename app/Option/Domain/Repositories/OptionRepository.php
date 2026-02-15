<?php

namespace App\Option\Domain\Repositories;

use App\Option\Domain\Entities\Option;

interface OptionRepository
{
    public function get(): array;

    /**
     * @param string[] $keys
     * @return Option[]
     */
    public function getByKeys(array $keys): array;

    /**
     * @param Option[] $options
     * @return Option[]
     */
    public function update(array $options): array;
}