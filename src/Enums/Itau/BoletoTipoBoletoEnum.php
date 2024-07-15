<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoletoTipoBoletoEnum: string
{

    use EnumHelperTrait;

    case AVista = 'a vista';
    case Proposta = 'proposta';
}
