<?php

namespace App\Auth\Domain\Repositories;

use App\Auth\Domain\Entities\Token;
use App\Auth\Domain\Entities\User;
use stdClass;

interface TokenRepository
{
    public function decode(string $token): stdClass;
    
    public function create(User $user): Token;
}