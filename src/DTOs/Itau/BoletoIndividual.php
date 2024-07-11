<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use Exception;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use InvalidArgumentException;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BoletoIndividualRule;
use Jotaroocha\ItauApiBolecodeSdk\Auxiliares\Helper;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use JsonSerializable;

class BoletoIndividual implements JsonSerializable
{
    private string $nossoNumero; // numero_nosso_numero
    private string $dataVencimento; // data_vencimento (AAAA-MM-DD)
    private string $valorTitulo; // valor_titulo
    private ?string $dataLimitePagamento; // data_limite_pagamento (AAAA-MM-DD)
    private ?string $seuNumero; // texto_seu_numero
    private ?string $usoBeneficiario; // texto_uso_beneficiario


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
        $this->seuNumero = trim($seuNumero);
        $this->usoBeneficiario = trim($usoBeneficiario);

        $this->validar();
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function getArrayForApi(): array
    {
        $chavesCustomizadas = [
            'nossoNumero' => 'numero_nosso_numero',
            'dataVencimento' => 'data_vencimento',
            'valorTitulo' => 'valor_titulo',
            'dataLimitePagamento' => 'data_limite_pagamento',
            'seuNumero' => 'texto_seu_numero',
            'usoBeneficiario' => 'texto_uso_beneficiario',
        ];

        return Helper::getArrayModificadoByChavesCustomizadas($this->jsonSerialize(), $chavesCustomizadas);
    }

    /**
     * @throws ExcecaoApi
     * @throws Exception
     */
    private function validar(): void
    {
        try {
            $translator = new ArrayLoader();
            $validator = new Factory(new Translator($translator, 'pt_BR'));

            $validator = $validator->make(
                $this->jsonSerialize(),
                BoletoIndividualRule::rules(),
                BoletoIndividualRule::messages());

            if ($validator->fails()) {
                throw new InvalidArgumentException('Falha na validacao de campos ' . '`' .
                    __CLASS__ . '`: ' . json_encode($validator->errors()->all()));
            }

        } catch (InvalidArgumentException $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode(), $e);

        } catch (Exception $e) {
            throw new Exception($e);
        }

    }
}
