<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEtapaProcessoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BoleCodeRule;


class BoleCode extends ItauAbstractDTO
{
    /*  Cada atributo está comentado com o nome correspondente usado na API do Itaú */
    protected string $etapaProcesso; // etapa_processo_boleto
    protected Beneficiario $beneficiario; // beneficiario
    protected Boleto $boleto; // dado_boleto
    protected ?Pix $pix; // dados_qrcode

    public function __construct(BoleCodeEtapaProcessoEnum $etapaProcesso,
                                Beneficiario              $beneficiario,
                                Boleto                    $boleto,
                                Pix                       $pix = null)
    {
        $this->etapaProcesso = $etapaProcesso->value;
        $this->beneficiario = $beneficiario;
        $this->boleto = $boleto;
        $this->pix = $pix;

        $this->setRule(new BoleCodeRule());

        parent::__construct();
    }


    public
    function getChavesCustomizadas(): array
    {
        return [
            'etapaProcesso' => 'etapa_processo_boleto',
            'beneficiario' => 'beneficiario',
            'boleto' => 'dado_boleto',
            'pix' => 'dados_qrcode',
        ];
    }
}
