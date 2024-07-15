<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoEspecieTituloEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoFormaEnvioEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoInstrumentoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoBoletoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoCarteiraEnum;

class BoletoRule implements ItauInterfaceRule
{

    public function rules(): array
    {
        return [
            'instrumentoCobranca' => [
                Rule::enum(BoletoInstrumentoCobrancaEnum::class)
            ],
            'tipoBoleto' => [
                Rule::enum(BoletoTipoBoletoEnum::class)
            ],
            'tipoCarteira' => [
                Rule::enum(BoletoTipoCarteiraEnum::class)
            ],
            'formaEnvio' => [
                Rule::enum(BoletoFormaEnvioEnum::class)
            ],
            'assuntoEmail' => [
                'max:50'
            ],
            'mensagemEmail' => [
                'max:200'
            ],
            'especieTitulo' => [
                Rule::enum(BoletoEspecieTituloEnum::class)
            ],
            'valorAbatimento' => [
                'regex:/^\d{1,15}(\.\d{1,2})?$/'
            ],
            'dataEmissao' => [
                'date', 'date_format:Y-m-d'
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public function messages(): array
    {
        return [
            'instrumentoCobranca.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é " .
                "inválido. São valores válidos: " . BoletoInstrumentoCobrancaEnum::toStringQuoted(),

            'tipoBoleto.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é " .
                "inválido. São valores válidos: " . BoletoTipoBoletoEnum::toStringQuoted(),

            'tipoCarteira.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é " .
                "inválido. São valores válidos: " . BoletoTipoCarteiraEnum::toStringQuoted(),

            'formaEnvio.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é " .
                "inválido. São valores válidos: " . BoletoFormaEnvioEnum::toStringQuoted(),

            'assuntoEmail.max' => "O campo `:attribute` não pode ser maior que 50 caracteres.",
            'mensagemEmail.max' => "O campo `:attribute` não pode ser maior que 200 caracteres.",

            'especieTitulo.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é " .
                "inválido. São valores válidos: " . BoletoEspecieTituloEnum::toStringQuoted(),

            'valorAbatimento.regex' => "O campo `:attribute` está num formato inválido.",

            'dataEmissao.date' => "O campo `:attribute` deve receber um valor no formato de data. " .
                "Ex: 2024-07-15 (AAAA-MM-DD).",
            'dataEmissao.date_format' => "O campo `:attribute` deve receber um valor no formato de data. " .
                "Ex: 2024-07-15 (AAAA-MM-DD)."
        ];
    }
}
