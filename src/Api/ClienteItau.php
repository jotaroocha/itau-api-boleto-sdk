<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Api;

use Exception;
use GuzzleHttp\Client;
use Jotaroocha\ItauApiBoletoSdk\Auxiliares\Configuracao;
use Jotaroocha\ItauApiBoletoSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBoletoSdk\Modelos\Boleto;

class ClienteItau extends ClienteBase
{

    public function __construct(Client $client, string $basUri)
    {
        parent::__construct(Configuracao::get('itau.base_uri'));
    }


    /**
     * @throws ExcecaoApi
     */
    public function gerarBoleto($dados): Boleto
    {
        // Implementação específica para gerar boleto no Itaú

        $response = $this->request('POST', '/boletos', [
            'json' => $dados
        ]);

        return new Boleto($response);
    }


    /**
     * @throws ExcecaoApi
     */
    public function cancelarBoleto($id)
    {
        // Implementação específica para cancelar boleto no Itaú

        $response = $this->request('DELETE', '/boletos/{$id}');

        return $response['message'];
    }
}
