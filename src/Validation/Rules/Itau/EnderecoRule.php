<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\EstadoSiglaEnum;

class EnderecoRule implements ItauInterfaceRule
{
    public static function rules(): array
    {
        return [
            'logradouro' => [
                'max:45'
            ],
            'bairro' => [
                'max:15'
            ],
            'cidade' => [
                'max:20'
            ],
            'uf' => [
                Rule::enum(EstadoSiglaEnum::class)
            ],
            'cep' => [
                'size:8'
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public static function messages(): array
    {
        return [
            'logradouro.max' => "O campo `:attribute` nao pode ser maior que 45 caracteres.",
            'bairro.max' => "O campo `:attribute` nao pode ser maior que 15 caracteres.",
            'cidade.max' => "O campo `:attribute` nao pode ser maior que 20 caracteres.",
            'uf.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` e invalido." .
                " Sao valores validos: " . EstadoSiglaEnum::toStringQuoted(),
            'cep.size' => "O campo `:attribute` deve conter exatamente 8 digitos."
        ];
    }

}
