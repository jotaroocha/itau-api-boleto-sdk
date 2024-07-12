<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BoletoIndividualRule;

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

        $this->setRegrasDeValidacao(BoletoIndividualRule::rules());
        $this->setMensagensDeValidacaoCustomizadas(BoletoIndividualRule::messages());
        $this->setChavesCustomizadas(
            [
                'nossoNumero' => 'numero_nosso_numero',
                'dataVencimento' => 'data_vencimento',
                'valorTitulo' => 'valor_titulo',
                'dataLimitePagamento' => 'data_limite_pagamento',
                'seuNumero' => 'texto_seu_numero',
                'usoBeneficiario' => 'texto_uso_beneficiario'
            ]
        );
        parent::__construct();
    }

//    /**
//     * @throws ExcecaoApi
//     * @throws Exception
//     */
//    private function validar(): void
//    {
//        try {
//            $translator = new ArrayLoader();
//            $validator = new Factory(new Translator($translator, 'pt_BR'));
//
//            $validator = $validator->make(
//                $this->jsonSerialize(),
//                BoletoIndividualRule::rules(),
//                BoletoIndividualRule::messages());
//
//            if ($validator->fails()) {
//                throw new InvalidArgumentException('Falha na validacao de campos ' . '`' .
//                    __CLASS__ . '`: ' . json_encode($validator->errors()->all()));
//            }
//
//        } catch (InvalidArgumentException $e) {
//            throw new ExcecaoApi($e->getMessage(), $e->getCode(), $e);
//
//        } catch (Exception $e) {
//            throw new Exception($e);
//        }
//    }
//
//    public function jsonSerialize(): array
//    {
//        return get_object_vars($this);
//    }
//
//    public function getArrayForApi(): array
//    {
//        $chavesCustomizadas = [
//            'nossoNumero' => 'numero_nosso_numero',
//            'dataVencimento' => 'data_vencimento',
//            'valorTitulo' => 'valor_titulo',
//            'dataLimitePagamento' => 'data_limite_pagamento',
//            'seuNumero' => 'texto_seu_numero',
//            'usoBeneficiario' => 'texto_uso_beneficiario',
//        ];
//
//        return Helper::getArrayModificadoByChavesCustomizadas($this->jsonSerialize(), $chavesCustomizadas);
//    }
}
