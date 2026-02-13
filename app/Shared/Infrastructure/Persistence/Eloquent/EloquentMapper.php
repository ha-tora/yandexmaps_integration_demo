<?php

namespace App\Shared\Infrastructure\Persistence\Eloquent;

use Arr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use TModel;

/**
 * @template TModel of Model
 * @template TEntity
 */
abstract class EloquentMapper
{
    /**
     * @param TModel $model
     * @return TEntity
     */
    abstract public function toDomain($model);

    /**
     * @param Collection<TModel> $eloquentCollection
     * @return array
     */
    public function toDomainCollection(Collection $eloquentCollection): array
    {
        return Arr::map($eloquentCollection->all(), function (Model $model) {
            return $this->toDomain($model);
        });
    }

    /**
     * @param TEntity $entity
     * @return TModel
     */
    abstract public function toEloquent($entity);

    /**
     * @param array $entityCollection
     * @return Collection<TModel>
     */
    public function toEloquentCollection(array $entityCollection): Collection
    {
        return new Collection(Arr::map($entityCollection, function ($entity) {
            return $this->toEloquent($entity);
        }));
    }
}