<?php

namespace App\Shared\Infrastructure\Services\Uuid;

use App\Shared\Application\Contracts\Uuid;

class SymfonyUuid implements Uuid
{
    public function get(): string
    {
        return \Symfony\Component\Uid\Uuid::v7()->toString();
    }
}