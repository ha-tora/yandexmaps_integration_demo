<?php

namespace App\Option\Infrastructure\Persistence\Eloquent;

use App\Option\Domain\Repositories\OptionRepository;
use Arr;

class EloquentOptionRepository implements OptionRepository
{
    public function __construct(
        private EloquentOptionModel $model,
        private EloquentOptionMapper $mapper,
    ) {}

    public function get(): array
    {
        $options = $this->model->all();

        return $this->mapper->toDomainCollection($options);
    }

    public function getByKeys(array $keys): array
    {
        $options = $this->model->whereIn('key', $keys)->get();

        return $this->mapper->toDomainCollection($options);
    }

    public function save(array $options): bool
    {
        $this->mapper->toEloquentCollection($options)->each(function (EloquentOptionModel $option) {
            $this->model->updateOrCreate($option->key, $option->toArray());
        });

        return true;
    }
}