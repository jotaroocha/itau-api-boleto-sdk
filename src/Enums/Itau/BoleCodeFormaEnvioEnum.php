<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeFormaEnvioEnum: string
{

    use EnumHelperTrait;

    case Impressao = 'impressao';
    case Email = 'email';
}
