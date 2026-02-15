<?php

namespace App\Option\Infrastructure\Validation;

use App\Option\Application\Contracts\Validation\OptionValuesValidator;
use App\Option\Domain\Entities\Option;
use App\Option\Domain\Exceptions\InvalidOptionValueException;
use Arr;
use Illuminate\Support\Facades\Validator;

class LaravelOptionValueValidator implements OptionValuesValidator
{
    public function validate(array $options): void
    {
        $validator = Validator::make([], []);

        Arr::map($options, function (Option $option) use ($validator) {
            $entityValidator = Validator::make(
                data: ['value' => $option->value], 
                rules: ['value' => json_decode($option->validationRules, true)],
            );

            if ($entityValidator->fails()) {
                foreach ($entityValidator->errors()->all() as $message) {
                    $validator->errors()->add($option->key, $message);
                }
            }
        });
        
        if ($validator->errors()->any()) {
            throw new InvalidOptionValueException($validator->errors()->toArray());
        }
    }
}