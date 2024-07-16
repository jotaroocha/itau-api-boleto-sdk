<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauInterfaceRule;

class PessoaRule implements ItauInterfaceRule
{

    public function rules(): array
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

    public function messages(): array
    {
        return [
            'nome.max' => "O campo `:attribute` nao pode ser maior que 50 caracteres.",
            'nomeFantasia.max' => "O campo `:attribute` nao pode ser maior que 50 caracteres."
        ];
    }
}
