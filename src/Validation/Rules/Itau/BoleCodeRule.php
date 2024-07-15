<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEtapaProcessoEnum;

class BoleCodeRule implements ItauInterfaceRule
{

    public function rules(): array
    {
        return [
            'etapaProcesso' => [
                Rule::enum(BoleCodeEtapaProcessoEnum::class)
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public function messages(): array
    {
        return [
            'etapaProcesso.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é inválido. " .
                "São valores válidos: " . BoleCodeEtapaProcessoEnum::toStringQuoted()
        ];
    }
}
