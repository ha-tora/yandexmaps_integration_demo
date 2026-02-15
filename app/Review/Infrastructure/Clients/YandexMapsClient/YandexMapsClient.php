<?php

namespace App\Review\Infrastructure\Clients\YandexMapsClient;

use Arr;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class YandexMapsClient
{
    private PendingRequest $client;

    private string $baseUrl = 'https://yandex.com/';

    public function __construct() {
        $this->client = Http::withOptions([
            'cookies' => new CookieJar(),
        ]);
    }

    public function get(string $uri, array $query = [], bool $jsonExpected = false)
    {
        $response = $this->fetch($uri, $query);

        if (isset($response->json()['csrfToken'])) {
            $query['csrfToken'] = $response->json()['csrfToken'];
            $response = $this->fetch($uri, $query);
        }

        return $jsonExpected ? $response->json() : $response->body();
    }

    private function fetch(string $uri, array $query = [])
    {
        $query = $query ? $this->signQueryParams($query) : null;

        $response = $this->client->get($this->baseUrl . $uri, $query);

        return $response->ok() ? $response : null;
    }

    private function signQueryParams(array $query)
    {
        $queryString = Arr::query(collect($query)->sortKeys()->toArray());

        if (!$queryString) {
            return [];
        }

        $query['s'] = $this->djb2_xor($queryString);

        return $query;
    }

    private function djb2_xor(string $e): int
    {
        $n = 5381;
        $l = strlen($e);

        for ($i = 0; $i < $l; $i++) {
            $n = (($n * 33) ^ ord($e[$i])) & 0xFFFFFFFF;
        }

        return $n >= 0
            ? $n
            : $n + 0x100000000;
    }
}