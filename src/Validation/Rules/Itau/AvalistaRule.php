<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauInterfaceRule;

class AvalistaRule implements ItauInterfaceRule
{

    public function rules(): array
    {
        return [
            'validacoes' => 'adicionar aqui validações necessárias'
        ];
    }

    public function messages(): array
    {
        return [
            'mensagensDeValidacao' => 'adicionar aqui mensagens customizada de validação'
        ];
    }
}
