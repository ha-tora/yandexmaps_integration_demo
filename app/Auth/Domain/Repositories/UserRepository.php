<?php

namespace App\Auth\Domain\Repositories;

use App\Auth\Domain\Entities\User;

interface UserRepository
{
    public function save(User $user): void;

    public function getbyId(string $id): User|null;

    public function getByEmail(string $email): User|null;

    public function getAuthorized(): User|null;

    public function authorize(User|string $user): bool;
}