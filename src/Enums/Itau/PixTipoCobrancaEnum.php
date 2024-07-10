<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum PixTipoCobrancaEnum: string
{

    use EnumHelperTrait;

    case Cob = 'cob';

    public function descricao(): string
    {
        return match ($this) {
            self::Cob => 'Cobrança pix imediata'
        };
    }
}
