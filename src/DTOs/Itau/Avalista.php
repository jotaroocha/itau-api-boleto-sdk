<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\AvalistaRule;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\PagadorRule;

/* 'sacador_avalista' */

class Avalista extends ItauAbstractDTO
{
    protected Pessoa $pessoa; // pessoa
    protected Endereco $endereco; // endereco

    public function __construct(Pessoa $pessoa, Endereco $endereco)
    {
        $this->pessoa = $pessoa;
        $this->endereco = $endereco;

        $this->setRule(new AvalistaRule());

        parent::__construct();
    }


    public function getChavesCustomizadas(): array
    {
        return [
            'pessoa' => 'pessoa',
            'endereco' => 'endereco'
        ];
    }
}
