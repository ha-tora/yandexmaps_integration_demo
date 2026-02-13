<?php

namespace App\Option\Application\Read\GetOptionsByKeys;

use App\Option\Domain\Repositories\OptionRepository;

class GetOptionsByKeysQueryHandler
{
    public function __construct(
        private OptionRepository $optionRepository
    ) {}

    public function handle(GetOptionsByKeysQuery $query): array
    {
        $options = $this->optionRepository->getByKeys($query->keys);

        return $options;
    }
}