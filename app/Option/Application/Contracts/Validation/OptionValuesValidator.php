<?php

namespace App\Option\Application\Contracts\Validation;

use App\Option\Domain\Entities\Option;

interface OptionValuesValidator
{
    /**
     * @param Option[] $options
     * @return void
     */
    public function validate(array $options): void;
}