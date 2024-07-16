<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauAbstractDTO;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\AvalistaRule;

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
