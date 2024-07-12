<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

class PessoaRule implements ItauInterfaceRule
{

    public static function rules(): array
    {
        return [
            'nome' => [
                'max:50'
            ],
            'nomeFantasia' => [
                'max:50'
            ]
        ];
    }

    public static function messages(): array
    {
        return [
            'nome.max' => "O campo `:attribute` nao pode ser maior que 50 caracteres.",
            'nomeFantasia.max' => "O campo `:attribute` nao pode ser maior que 50 caracteres."
        ];
    }
}
