<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\PessoaRule;

/* 'pessoa' */

class Pessoa extends ItauAbstractDTO
{
    protected string $nome; // nome_pessoa
    protected string $nomeFantasia; // nome_fantasia
    protected TipoPessoa $tipoPessoa; // tipo_pessoa

    public function __construct(string $nome, TipoPessoa $tipoPessoa, string $nomeFantasia = null)
    {
        $this->nome = $nome;
        $this->tipoPessoa = $tipoPessoa;
        $this->nomeFantasia = $nomeFantasia ? trim($nomeFantasia) : null;

        $this->setRule(new PessoaRule());

        parent::__construct();
    }

    public function getChavesCustomizadas(): array
    {
        return [
            'nome' => 'nome_pessoa',
            'nomeFantasia' => 'nome_fantasia',
            'tipoPessoa' => 'tipo_pessoa',
        ];
    }
}
