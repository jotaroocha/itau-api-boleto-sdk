<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\TipoPessoaRule;

class TipoPessoa extends ItauAbstractDTO
{
    protected string $tipoPessoa; // codigo_tipo_pessoa
    protected ?string $cpf; // numero_cadastro_pessoa_fisica
    protected ?string $cnpj; // numero_cadastro_nacional_pessoa_juridica

    public function __construct(TipoPessoaEnum $tipoPessoa, string $cpf = null, string $cnpj = null)
    {
        $this->tipoPessoa = $tipoPessoa->value;
        $this->cpf = $cpf ? trim($cpf) : null;
        $this->cnpj = $cnpj ? trim($cnpj) : null;

        $this->setRegrasDeValidacao(TipoPessoaRule::rulesByParameters([
            'codigo_tipo_pessoa' => $this->tipoPessoa
        ]));

        $this->setMensagensDeValidacaoCustomizadas(TipoPessoaRule::messages());

        parent::__construct();
    }

    public function getChavesCustomizadas(): array
    {
        return [
            'tipoPessoa' => 'codigo_tipo_pessoa',
            'cpf' => 'numero_cadastro_pessoa_fisica',
            'cnpj' => 'numero_cadastro_nacional_pessoa_juridica'
        ];
    }
}
