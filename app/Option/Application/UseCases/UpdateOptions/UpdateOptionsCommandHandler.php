<?php

namespace App\Option\Application\UseCases\UpdateOptions;

use App\Option\Domain\Entities\Option;
use App\Option\Domain\Repositories\OptionRepository;
use Arr;

class UpdateOptionsCommandHandler
{
    public function __construct(
        private OptionRepository $optionRepository,
    ) {}

    public function handle(UpdateOptionsCommand $command): bool
    {
        $keys = Arr::pluck($command->options, 'key');

        $values = Arr::pluck($command->options, 'value', 'key');

        $options = $this->optionRepository->getByKeys($keys);

        $options = Arr::map($options, function (Option $option) use ($values) {
            $option->value = $values[$option->key];
        });

        return $this->optionRepository->save($options);
    }
}