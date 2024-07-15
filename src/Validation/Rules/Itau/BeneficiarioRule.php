<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

class BeneficiarioRule implements ItauInterfaceRule
{

    public function rules(): array
    {
        return [
            'id' => [
                'string', 'regex:/^\d{4}\d{7}\d{1}$/'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'id.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
            'id.regex' => "O campo `:attribute` está num formato inválido. Deve seguir o formado: " .
                " Agência (4 dígitos) + Conta (7 dígitos) + DAC (1 dígito)"
        ];
    }
}
