<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeEtapaProcessoEnum: string
{

    use EnumHelperTrait;

    case Simulacao = 'simulacao';
    case Efetivacao = 'efetivacao';
}
