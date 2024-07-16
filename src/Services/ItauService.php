<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Services;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Jotaroocha\ItauApiBolecodeSdk\Contratos\BancoServiceInterface;
use Jotaroocha\ItauApiBolecodeSdk\Contratos\HttpClientInterface;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\BoleCode;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ItauServiceException;
use Jotaroocha\ItauApiBolecodeSdk\Http\GuzzleHttpClient;

class ItauService implements BancoServiceInterface
{

    private HttpClientInterface $httpClient;
    private string $apiUrl;

    public function __construct()
    {
        $this->httpClient = new GuzzleHttpClient();
        $this->apiUrl = "https://sandbox.devportal.itau.com.br/itau-ep9-gtw-pix-recebimentos-conciliacoes-v2-ext/v2";
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function gerarBoleCode(BoleCode $boleCode): array
    {
        return $this->gerarBoleto($boleCode->getArrayForApi());
    }

    /**
     * @throws ItauServiceException
     * @throws Exception
     */
    public function gerarBoleto(array $data): array
    {
        try {
            $url = $this->apiUrl . '/boletos_pix';
            return $this->httpClient->post($url, $data, $this->getHeaders());

        } catch (GuzzleException $e) {
            if ($e->getCode() === 500) {
                throw ItauServiceException::serverError($e->getMessage());
            }
            throw new Exception($e);
        }

    }

    /**
     * @throws GuzzleException
     */
    public function cancelarBoleto(string $boletoId): array
    {
        $url = $this->apiUrl . '/boletos/' . $boletoId;
        return $this->httpClient->post($url, $this->getHeaders());
    }

    /**
     * @throws GuzzleException
     */
    public function getBoleto(string $boletoId): array
    {
        $url = $this->apiUrl . '/boletos/' . $boletoId;
        return $this->httpClient->get($url, $this->getHeaders());
    }

    public function getHeaders(): array
    {
        return [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzYTA3ZDgzNi1iMTRjLTMyZGQtODkyMy0xYzQwZDZjNzllMTYiLCJleHAiOjE3MjExNTM2ODEsImlhdCI6MTcyMTE1MzM4MSwic291cmNlIjoic3RzLXNhbmRib3giLCJlbnYiOiJQIiwiZmxvdyI6IkNDIiwic2NvcGUiOiJjYXNobWFuYWdlbWVudC1jb25zdWx0YWJvbGV0b3MtdjEtYXdzLXNjb3BlIiwidXNlcm5hbWUiOiJqb2FvQGJvbHRlY2guY29tLmJyIiwib3JnYW5pemF0aW9uTmFtZSI6IkF1dG8gQ2FkYXN0cm8ifQ.Gh1rVsFrzHbDXJCv9a8WEdp3GaweVUYH5Un9LhMm6Sw',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'x-itau-correlationID' => uniqid()
        ];
    }
}
