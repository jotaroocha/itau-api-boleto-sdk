<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum TipoPessoaEnum: string
{

    use EnumHelperTrait;

    case Fisica = 'F';
    case Juridica = 'J';
}
