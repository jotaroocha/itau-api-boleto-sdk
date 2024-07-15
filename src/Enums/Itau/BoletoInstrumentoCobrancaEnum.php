<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoletoInstrumentoCobrancaEnum: string
{

    use EnumHelperTrait;

    case Boleto = 'boleto';
    case BoletoPix = 'boleto_pix';
}
