<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;

class PixRule implements ItauInterfaceRule
{


    public function rules(): array
    {
        return [
            'chave' => [
                'string',
                'regex:/^(\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}|\d{14}|[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|[a-zA-Z0-9\-]+|\+\d{1,3}\d{1,14}|\d{11})$/'
            ],
            'idLocation' => [
                'nullable', 'string'
            ],
            'tipoCobranca' => [
                Rule::enum(PixTipoCobrancaEnum::class)
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public function messages(): array
    {
        return [
            'chave.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'chave.regex' => "O campo `:attribute` está num formato inválido. Descrição: " .
                "Chave DICT do recebedor (CNPJ, email, chave aleatória ou telefone)",

            'idLocation.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",

            'tipoCobranca.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é inválido. "
                . "São valores válidos: " . PixTipoCobrancaEnum::toStringQuoted()
        ];
    }
}
