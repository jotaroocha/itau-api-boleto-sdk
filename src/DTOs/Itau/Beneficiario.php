<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BeneficiarioRule;

class Beneficiario extends ItauAbstractDTO
{
    protected string $id; // id_beneficiario

    public function __construct(string $agencia, string $conta, string $dac)
    {
        $this->id = $agencia . $conta . $dac;

        $this->setRule(new BeneficiarioRule());

        parent::__construct();
    }

    public function getChavesCustomizadas(): array
    {
        return [
            'id' => 'id_beneficiario'
        ];
    }
}
