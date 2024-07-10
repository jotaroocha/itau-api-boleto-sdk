<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Servicos;

use Jotaroocha\ItauApiBolecodeSdk\Api\ClienteBase;
use Jotaroocha\ItauApiBoletoSdk\Modelos\Boleto;

class ServicoBoleto
{
    private ClienteBase $cliente;

    public function __construct(ClienteBase $cliente)
    {
        $this->cliente = $cliente;
    }

    public function gerarBoleto(Boleto $boleto): void
    {
        $dados = [
            'valor' => $boleto->getTotal(),
            'descricao' => '',
            'beneficiario' => '',
            'pagador' => ''
        ];

        $this->cliente->gerarBoleto($dados);
    }

    public function cancelar(string $id): void
    {
        $this->cliente->cancelarBoleto($id);
    }


}
