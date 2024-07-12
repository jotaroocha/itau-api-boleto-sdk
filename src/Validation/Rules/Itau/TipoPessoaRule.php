<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\CustomValidations\ValidaPessoaFisicaJuridica;

class TipoPessoaRule implements ItauInterfaceRule
{


    public static function rules(): array
    {
        return [];
    }

    public static function rulesByParameters(array $params): array
    {
        return [
            'tipoPessoa' => [
                Rule::enum(TipoPessoaEnum::class)
            ],
            'cpf' => [
                'required_without:cnpj',
                'prohibits:cnpj',
                new ValidaPessoaFisicaJuridica($params['codigo_tipo_pessoa'])
            ],
            'cnpj' => [
                'required_without:cpf',
                'prohibits:cpf',
                new ValidaPessoaFisicaJuridica($params['codigo_tipo_pessoa'])
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public static function messages(): array
    {
        return [
            'tipoPessoa.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é inválido. " .
                "São valores válidos: " . TipoPessoaEnum::toStringQuoted(),

            'cpf.required_without' => "O campo `:attribute` deve ser informado quando o campo `cnpj` estiver vazio",
            'cpf.prohibits' => "O campo `:attribute` nao pode estar presente caso o campo `cnpj` tenha sido preenchido.",

            'cnpj.required_without' => "O campo `:attribute` deve ser informado quando o campo `cpf` estiver vazio",
            'cnpj.prohibits' => "O campo `:attribute` nao pode estar presente caso o campo `cpf` tenha sido preenchido."
        ];
    }
}
