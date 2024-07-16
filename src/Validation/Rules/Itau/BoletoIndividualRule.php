<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauInterfaceRule;

class BoletoIndividualRule implements ItauInterfaceRule
{

    public function rules(): array
    {
        return [
            'nossoNumero' => [
                'max:80'
            ],
            'dataVencimento' => [
                'date'
            ],
            'valorTitulo' => [
                'regex:/^\d{1,15}(\.\d{1,2})?$/'
            ],
            'dataLimitePagamento' => [
                'date', 'date_format:Y-m-d'
            ],
            'seuNumero' => [
                'max:10'
            ],
            'usoBeneficiario' => [
                'max:25'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nossoNumero.max' => "O campo `:attribute` nao pode ser maior que 80 caracteres.",

            'dataVencimento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",
            'dataVencimento.date_format' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

            'valorTitulo.regex' => "O campo `:attribute` deve conter ate 15 dígitos inteiros e 2 casas decimais.",

            'dataLimitePagamento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

            'seuNumero.max' => "O campo `:attribute` nao pode ser maior que 10 caracteres.",

            'usoBeneficiario.max' => "O campo `:attribute` nao pode ser maior que 25 caracteres."
        ];
    }

}
