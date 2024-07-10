<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEtapaProcessoEnum;


class BoleCode
{
    /*  Cada atributo está comentado com o nome correspondente usado na API do Itaú */
    private BoleCodeEtapaProcessoEnum $etapaProcesso; // etapa_processo_boleto
    private Beneficiario $beneficiario; // beneficiario
    private Boleto $boleto; // dado_boleto
    private Pix $pix; // dados_qrcode
}
