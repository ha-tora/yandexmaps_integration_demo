<?php

namespace App\Option\Application\Read\GetAllOptions;

use App\Option\Domain\Repositories\OptionRepository;

class GetAllOptionsQueryHandler
{
    public function __construct(
        private OptionRepository $optionRepository,
    ) {}

    public function handle(GetAllOptionsQuery $query): array
    {
        $options = $this->optionRepository->get();

        return $options;
    }
}