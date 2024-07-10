<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeTipoBoletoEnum: string
{

    use EnumHelperTrait;

    case AVista = 'a vista';
    case Proposta = 'proposta';
}
