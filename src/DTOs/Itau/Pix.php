<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;

class Pix
{
    private string $chave; // chave
    private int $idLocation; // id_location
    private PixTipoCobrancaEnum $tipoCobranca; // tipo_cobranca

}
