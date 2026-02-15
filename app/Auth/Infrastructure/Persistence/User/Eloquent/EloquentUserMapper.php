<?php

namespace App\Auth\Infrastructure\Persistence\User\Eloquent;

use App\Auth\Domain\Entities\User;
use App\Shared\Infrastructure\Persistence\Eloquent\EloquentMapper;

class EloquentUserMapper extends EloquentMapper
{
    /**
     * @param EloquentUserModel $model
     * @return User
     */
    public function toDomain($model): User
    {
        return new User(
            id: $model->id,
            name: $model->name,
            email: $model->email,
            password: $model->password
        );
    }

    /**
     * @param User $entity
     * @return EloquentUserModel
     */
    public function toEloquent($entity)
    {
        return new EloquentUserModel([
            'id' => $entity->id,
            'name' => $entity->name,
            'email' => $entity->email,
            'password' => $entity->password,
        ]);
    }
}