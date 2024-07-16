<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Jotaroocha\ItauApiBolecodeSdk\Contratos\HttpClientInterface;

class GuzzleHttpClient implements HttpClientInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $url, array $headers = []): array
    {
        $response = $this->client->request('GET', $url, ['headers' => $headers]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function post(string $url, array $body = [], array $headers = []): array
    {
        $response = $this->client->request('POST', $url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function put(string $url, array $body = [], array $headers = []): array
    {
        $response = $this->client->request('PUT', $url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function patch(string $url, array $body = [], array $headers = []): array
    {
        $response = $this->client->request('PATCH', $url, [
            'headers' => $headers,
            'json' => $body,
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @throws GuzzleException
     */
    public function delete(string $url, array $headers = []): array
    {
        $response = $this->client->request('DELETE', $url, [
            'headers' => $headers
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
