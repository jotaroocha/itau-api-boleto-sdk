<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Contratos;

interface InterfaceClienteBancario
{
    /* Lista de funções a ser implementadas pelos Clientes Bancários (Itau) */

    public function gerarBoleto(array $boletoDados);

    public function cancelarBoleto(string $boletoId);


}

