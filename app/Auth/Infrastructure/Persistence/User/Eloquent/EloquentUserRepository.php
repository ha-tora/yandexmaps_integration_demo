<?php

namespace App\Auth\Infrastructure\Persistence\User\Eloquent;

use App\Auth\Domain\Entities\User;
use App\Auth\Domain\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository implements UserRepository
{
    public function __construct(
        private EloquentUserModel $model,
        private EloquentUserMapper $mapper,
    ) {}

    public function getbyId(string $id): User|null
    {
        $user = $this->model->find($id);

        if (!$user) {
            return null;
        }

        return $this->mapper->toDomain($user);
    }

    public function getAuthorized(): User|null
    {
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return $this->mapper->toDomain($user);
    }

    public function getByEmail(string $email): User|null
    {
        $user = $this->model->where('email', $email)->first();

        if (!$user) {
            return null;
        }

        return $this->mapper->toDomain($user);
    }

    public function save(User $user): void
    {
        $this->mapper->toEloquent($user)->save();
    }

    public function authorize(string|User $user): bool
    {
        $user = $user instanceof User ? $user : $this->getbyId($user);

        if ($user) {
            Auth::onceUsingId($user->id);
        }
        
        return (bool)$user;
    }
}