<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Contratos;

interface BancoServiceInterface
{
    public function gerarBoleto(array $data): array;

    public function cancelarBoleto(string $boletoId): array;

    public function getBoleto(string $boletoId): array;

}
