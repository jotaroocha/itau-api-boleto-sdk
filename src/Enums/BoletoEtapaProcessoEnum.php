<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums;

use Jotaroocha\ItauApiBoletoSdk\Traits\EnumHelperTrait;

enum BoletoEtapaProcessoEnum: string
{

    use EnumHelperTrait;

    case Validacao = 'validacao';
    case Efetivacao = 'efetivacao';
}
