<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;

class TipoPessoa
{
    private TipoPessoaEnum $tipoPessoa; // codigo_tipo_pessoa
    private string $cpf; // numero_cadastro_pessoa_fisica
    private string $cnpj; // numero_cadastro_nacional_pessoa_juridica

}
