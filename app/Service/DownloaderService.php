<?php

namespace App\Service;

use GuzzleHttp\Client;

class DownloaderService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get(string $url): string
    {
        $response = $this->client->get($url);
        return $response->getBody()->getContents();
    }

}
