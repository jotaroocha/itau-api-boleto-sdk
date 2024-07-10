<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Api;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;

abstract class ClienteBase
{
    private Client $client;
    private string $basUri;

    public function __construct(string $basUri)
    {
        $this->client = new Client();
        $this->basUri = $basUri;
    }

    /**
     * @throws ExcecaoApi
     */
    protected
    function request($metodo, $uri, $opcoes = [])
    {
        try {
            $response = $this->client->request($metodo, $this->basUri . $uri, $opcoes);
            return json_decode($response->getBody()->getContents(), true);

        } catch (Exception|GuzzleException $e) {

            // TODO --> APOS CRIAR A EXCEPTION PERSONALIZADA, COLOCAR AQUI
            throw new ExcecaoApi($e);
        }
    }

    abstract public function gerarBoleto($dados);

    abstract public function cancelarBoleto($id);

}
