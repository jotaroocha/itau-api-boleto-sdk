<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums;

use Jotaroocha\ItauApiBoletoSdk\Traits\EnumHelperTrait;

enum CodigoTipoPessoaEnum: string
{

    use EnumHelperTrait;

    case Fisica = 'F';
    case Juridica = 'J';
}
