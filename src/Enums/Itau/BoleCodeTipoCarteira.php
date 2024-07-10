<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeTipoCarteira: string
{

    use EnumHelperTrait;

    case Carteira_109 = '109';
}
