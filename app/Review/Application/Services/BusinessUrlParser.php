<?php

namespace App\Review\Application\Services;

interface BusinessUrlParser
{
    public function parse(string $url): string;
}