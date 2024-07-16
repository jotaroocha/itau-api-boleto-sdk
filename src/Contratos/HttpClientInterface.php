<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Contratos;

interface HttpClientInterface
{
    public function get(string $url, array $headers = []): array;

    public function post(string $url, array $body = [], array $headers = []): array;

    public function put(string $url, array $body = [], array $headers = []): array;

    public function patch(string $url, array $body = [], array $headers = []): array;

    public function delete(string $url, array $headers = []): array;

}
