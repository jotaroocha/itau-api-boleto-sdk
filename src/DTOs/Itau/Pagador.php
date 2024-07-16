<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauAbstractDTO;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\PagadorRule;

class Pagador extends ItauAbstractDTO
{
    protected ?string $email; // texto_endereco_email
    protected Pessoa $pessoa; // pessoa
    protected Endereco $endereco; // endereco

    public function __construct(?string $email, Pessoa $pessoa, Endereco $endereco)
    {
        $this->email = $email ? trim($email) : null; // Obrigatório caso seja informado 'email' no campo dado_boleto
        // > forma_envio TODO --> VERIFICAR COMO SERÁ VALIDADO ISTO

        $this->pessoa = $pessoa;
        $this->endereco = $endereco;

        $this->setRule(new PagadorRule());

        parent::__construct();
    }


    public function getChavesCustomizadas(): array
    {
        return [
            'email' => 'texto_endereco_email',
            'pessoa' => 'pessoa',
            'endereco' => 'endereco'
        ];
    }
}
