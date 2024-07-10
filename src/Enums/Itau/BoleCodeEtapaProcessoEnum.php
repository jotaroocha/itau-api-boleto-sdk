<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoleCodeEtapaProcessoEnum: string
{

    use EnumHelperTrait;

    case Validacao = 'validacao';
    case Efetivacao = 'efetivacao';
}
