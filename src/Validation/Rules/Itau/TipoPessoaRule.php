<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau;

use Exception;
use Illuminate\Validation\Rule;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\CustomValidations\ValidaPessoaFisicaJuridica;

class TipoPessoaRule implements ItauInterfaceRule
{


    protected string $codigoTipoPessoa;

    public function __construct(string $codigoTipoPessoa)
    {
        $this->codigoTipoPessoa = $codigoTipoPessoa;
    }

    public function rules(): array
    {
        return [
            'tipoPessoa' => [
                Rule::enum(TipoPessoaEnum::class)
            ],
            'cpf' => [
                'required_without:cnpj',
                'prohibits:cnpj',
                new ValidaPessoaFisicaJuridica($this->codigoTipoPessoa)
            ],
            'cnpj' => [
                'required_without:cpf',
                'prohibits:cpf',
                new ValidaPessoaFisicaJuridica($this->codigoTipoPessoa)
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public function messages(): array
    {
        return [
            'tipoPessoa.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` e invalido. " .
                "Sao valores validos: " . TipoPessoaEnum::toStringQuoted(),

            'cpf.required_without' => "O campo `:attribute` deve ser informado quando o campo `cnpj` estiver vazio",
            'cpf.prohibits' => "O campo `:attribute` nao pode estar presente caso o campo `cnpj` tenha sido preenchido.",

            'cnpj.required_without' => "O campo `:attribute` deve ser informado quando o campo `cpf` estiver vazio",
            'cnpj.prohibits' => "O campo `:attribute` nao pode estar presente caso o campo `cpf` tenha sido preenchido."
        ];
    }
}
