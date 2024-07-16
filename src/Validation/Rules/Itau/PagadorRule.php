<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauInterfaceRule;

class PagadorRule implements ItauInterfaceRule
{
    public function rules(): array
    {
        return [
            'email' => [
                'email:rfc,dns'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'email.email' => "O campo `:attribute` deve receber um valor no formato de email. Ex: fulano@exemplo.com.br"
        ];
    }
}
