<?php

namespace App\Review\Infrastructure\Services;

use App\Review\Application\Services\BusinessUrlParser;

class YandexMapsBusinessUrlParser implements BusinessUrlParser
{
    public function parse(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH) ?? null;

        return explode('/', $path)[4];
    }
}