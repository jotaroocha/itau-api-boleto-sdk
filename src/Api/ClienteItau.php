<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Api;

use GuzzleHttp\Client;
use Jotaroocha\ItauApiBolecodeSdk\Auxiliares\Configuracao;
use Jotaroocha\ItauApiBolecodeSdk\Modelos\Boleto;

class ClienteItau extends ClienteBase
{

    public function __construct(Client $client, string $basUri)
    {
        parent::__construct(Configuracao::get('itau.base_uri'));
    }

    public function gerarBoleto($dados): Boleto
    {
        // Implementação específica para gerar boleto no Itaú

        $response = $this->request('POST', '/boletos', [
            'json' => $dados
        ]);

        return new Boleto($response);
    }

    public function cancelarBoleto($id)
    {
        // Implementação específica para cancelar boleto no Itaú

        $response = $this->request('DELETE', '/boletos/{$id}');

        return $response['message'];
    }
}
