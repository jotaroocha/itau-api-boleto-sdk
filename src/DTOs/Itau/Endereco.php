<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\EstadoSiglaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\EnderecoRule;


/* 'endereco' */

class Endereco extends ItauAbstractDTO
{
    protected string $logradouro; // nome_logradouro
    protected string $bairro; // nome_bairro
    protected string $cidade; // nome_cidade
    protected string $uf; // sigla_UF
    protected string $cep; // numero_CEP

    public function __construct(string          $logradouro,
                                string          $bairro,
                                string          $cidade,
                                EstadoSiglaEnum $uf,
                                string          $cep)
    {
        $this->logradouro = trim($logradouro);
        $this->bairro = trim($bairro);
        $this->cidade = trim($cidade);
        $this->uf = $uf->value;
        $this->cep = trim($cep);

        $this->setRule(new EnderecoRule());
        
        parent::__construct();
    }

    public function getChavesCustomizadas(): array
    {
        return [
            'logradouro' => 'nome_logradouro',
            'bairro' => 'nome_bairro',
            'cidade' => 'nome_cidade',
            'uf' => 'sigla_UF',
            'cep' => 'numero_CEP'
        ];
    }
}
