<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoletoFormaEnvioEnum: string
{

    use EnumHelperTrait;

    case Impressao = 'impressao';
    case Email = 'email';
}
