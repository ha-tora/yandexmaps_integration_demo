<?php

namespace App\Review\Infrastructure\Clients\YandexMapsClient;

use Arr;
use PHPHtmlParser\Dom;

class YandexMapsHtmlParser
{
    public function __construct(
        private Dom $dom,
    ) {}

    public function parse($html, array $needle)
    {
        $this->dom->loadStr($html);

        return Arr::map($needle, function ($selector) {
            return $this->dom->find($selector)[0]?->innerHtml;
        });
    }
}