<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\CustomValidations;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Jotaroocha\ItauApiBolecodeSdk\Auxiliares\Helper;

class ValidaPessoaFisicaJuridica implements ValidationRule
{
    protected string $codigo_tipo_pessoa;

    public function __construct(string $codigo_tipo_pessoa)
    {
        $this->codigo_tipo_pessoa = $codigo_tipo_pessoa;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            return;
        }

        if (!(strlen((string)$value) === 11 or strlen((string)$value) === 14)) {
            $fail('O :attribute deve conter exatamente 11 ou 14 digitos, a depender ' .
                'do tipo do `codigo_tipo_pessoa` informado.');
        }

        if (strlen((string)$value) === 11) {
            if (!($this->codigo_tipo_pessoa === 'F')) {
                $fail('O :attribute informado e invalido para o `codigo_tipo_pessoa`.');
            }

            if (Helper::validaCPF($value) === false) {
                $fail('O :attribute informado nao e valido.');
            }
        }

        if (strlen((string)$value) === 14) {
            if (!($this->codigo_tipo_pessoa === 'J')) {
                $fail('O :attribute informado e invalido para o `codigo_tipo_pessoa`.');
            }

            if (Helper::validaCNPJ($value) === false) {
                $fail('O :attribute informado nao e valido.');
            }
        }
    }
}


