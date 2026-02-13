<?php

namespace App\Option\Infrastructure\Persistence\Eloquent;

use App\Option\Domain\Entities\Option;
use App\Shared\Infrastructure\Persistence\Eloquent\EloquentMapper;

/**
 * @extends EloquentMapper<EloquentOptionModel, Option>
 */
class EloquentOptionMapper extends EloquentMapper
{
    public function toDomain($eloquentModel): Option
    {
        return new Option(
            $eloquentModel->key,
            $eloquentModel->value,
            $eloquentModel->title,
            $eloquentModel->description,
            $eloquentModel->validation_rules,
        );
    }

    public function toEloquent($entity)
    {
        return new EloquentOptionModel([
            'key' => $entity->key,
            'value' => $entity->value,
            'title' => $entity->title,
            'description' => $entity->description,
            'validation_rules' => $entity->validationRules
        ]);
    }
}