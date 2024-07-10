<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;

class BoletoIndividual
{
    private string $nossoNumero; // numero_nosso_numero
    private DateTime $dataVencimento; // data_vencimento    (AAAA-MM-DD)
    private float $valorTitulo; // valor_titulo
    private DateTime $dataLimitePagamento; // data_limite_pagamento    (AAAA-MM-DD)
    private string $seuNumero; // texto_seu_numero
    private string $usoBeneficiario; // texto_uso_beneficiario

}
