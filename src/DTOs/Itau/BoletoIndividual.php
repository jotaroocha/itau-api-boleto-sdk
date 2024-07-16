<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauAbstractDTO;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BoletoIndividualRule;


/* 'dados_individuais_boleto' */

class BoletoIndividual extends ItauAbstractDTO
{
    protected string $nossoNumero; // numero_nosso_numero
    protected string $dataVencimento; // data_vencimento (AAAA-MM-DD)
    protected string $valorTitulo; // valor_titulo
    protected ?string $dataLimitePagamento; // data_limite_pagamento (AAAA-MM-DD)
    protected ?string $seuNumero; // texto_seu_numero
    protected ?string $usoBeneficiario; // texto_uso_beneficiario


    /**
     * @throws ExcecaoApi
     */
    public function __construct(
        string    $nossoNumero,
        DateTime  $dataVencimento,
        float     $valorTitulo,
        ?DateTime $dataLimitePagamento = null,
        ?string   $seuNumero = null,
        ?string   $usoBeneficiario = null
    )
    {
        $this->nossoNumero = trim($nossoNumero);
        $this->dataVencimento = $dataVencimento->format('Y-m-d');
        $this->valorTitulo = number_format($valorTitulo, 2, '.', '');
        $this->dataLimitePagamento = $dataLimitePagamento?->format('Y-m-d');
        $this->seuNumero = $seuNumero ? trim($seuNumero) : null;
        $this->usoBeneficiario = $usoBeneficiario ? trim($usoBeneficiario) : null;

        $this->setRule(new BoletoIndividualRule());

        parent::__construct();

    }

    public function getChavesCustomizadas(): array
    {
        return [
            'nossoNumero' => 'numero_nosso_numero',
            'dataVencimento' => 'data_vencimento',
            'valorTitulo' => 'valor_titulo',
            'dataLimitePagamento' => 'data_limite_pagamento',
            'seuNumero' => 'texto_seu_numero',
            'usoBeneficiario' => 'texto_uso_beneficiario'
        ];
    }
}
