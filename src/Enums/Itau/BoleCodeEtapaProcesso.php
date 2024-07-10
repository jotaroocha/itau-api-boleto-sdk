<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeEtapaProcesso: string
{

    use EnumHelperTrait;

    case Validacao = 'validacao';
    case Efetivacao = 'efetivacao';
}
