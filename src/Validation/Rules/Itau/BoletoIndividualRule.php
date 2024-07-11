<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

class BoletoIndividualRule
{

    public static function rules(): array
    {
        return [
            'nossoNumero' => [
                'string', 'max:80'
            ],
            'dataVencimento' => [
                'date', 'date_format:Y-m-d'
            ],
            'valorTitulo' => [
                'string', 'regex:/^\d{1,15}(\.\d{1,2})?$/'
            ],
            'dataLimitePagamento' => [
                'date', 'date_format:Y-m-d'
            ],
            'seuNumero' => [
                'string', 'max:10'
            ],
            'usoBeneficiario' => [
                'string', 'max:25'
            ]
        ];
    }

    public static function messages(): array
    {
        return [
            'nossoNumero.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'nossoNumero.max' => "O campo `:attribute` não pode ser maior que 80 caracteres.",

            'dataVencimento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",
            'dataVencimento.date_format' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

            'valorTitulo.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'valorTitulo.regex' => "O campo `:attribute` deve conter até 15 dígitos inteiros e 2 casas decimais.",

            'dataLimitePagamento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",
            'dataLimitePagamento.date_format' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

            'seuNumero.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'seuNumero.max' => "O campo `:attribute` não pode ser maior que 10 caracteres.",

            'usoBeneficiario.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'usoBeneficiario.max' => "O campo `:attribute` não pode ser maior que 25 caracteres."
        ];
    }

}
