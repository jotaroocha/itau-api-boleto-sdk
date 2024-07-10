<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Jotaroocha\ItauApiBolecodeSdk\Auxiliares\Helper;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use JsonSerializable;

class BoletoIndividual implements JsonSerializable
{
    private string $nossoNumero; // numero_nosso_numero
    private string $dataVencimento; // data_vencimento (AAAA-MM-DD)
    private string $valorTitulo; // valor_titulo
    private string $dataLimitePagamento; // data_limite_pagamento (AAAA-MM-DD)
    private string $seuNumero; // texto_seu_numero
    private string $usoBeneficiario; // texto_uso_beneficiario


    /**
     * @throws ExcecaoApi
     */
    public function __construct(
        string   $nossoNumero,
        DateTime $dataVencimento,
        float    $valorTitulo,
        DateTime $dataLimitePagamento = null,
        string   $seuNumero = null,
        string   $usoBeneficiario = null
    )
    {
        $this->nossoNumero = $nossoNumero;
        $this->dataVencimento = $dataVencimento->format('Y-m-d');
        $this->valorTitulo = number_format($valorTitulo, 2, '.', '');
        $this->dataLimitePagamento = $dataLimitePagamento->format('Y-m-d');
        $this->seuNumero = $seuNumero;
        $this->usoBeneficiario = $usoBeneficiario;

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
            $validator = Validator::make($this->jsonSerialize(),
                rules: [
                    'nossoNumero' => [
                        'required', 'string', 'max:80'
                    ],
                    'dataVencimento' => [
                        'required', 'date', 'date_format:Y-m-d'
                    ],
                    'valorTitulo' => [
                        'required', 'string', 'regex:/^\d{1,15}(\.\d{1,2})?$/'
                    ],
                    'dataLimitePagamento' => [
                        'sometimes', 'required', 'date', 'date_format:Y-m-d'
                    ],
                    'seuNumero' => [
                        'sometimes', 'required', 'string', 'max:10'
                    ],
                    'usoBeneficiario' => [
                        'sometimes', 'required', 'string', 'max:25'
                    ]
                ],
                messages: [
                    'nossoNumero.required' => "O campo `:attribute` deve ser informado.",
                    'nossoNumero.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
                    'nossoNumero.max' => "O campo `:attribute` não pode ser maior que 80 caracteres.",

                    'dataVencimento.required' => "O campo `:attribute` deve ser informado.",
                    'dataVencimento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",
                    'dataVencimento.date_format' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

                    'valorTitulo.required' => "O campo `:attribute` deve ser informado.",
                    'valorTitulo.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
                    'valorTitulo.regex' => "O campo `:attribute` deve conter até 15 dígitos inteiros e 2 casas decimais.",

                    'dataLimitePagamento.required' => "O campo :attribute não pode estar em branco.",
                    'dataLimitePagamento.date' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",
                    'dataLimitePagamento.date_format' => "O campo `:attribute` deve receber um valor no formato de data. (AAAA-MM-DD)",

                    'seuNumero.required' => "O campo :attribute não pode estar em branco.",
                    'seuNumero.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
                    'seuNumero.max' => "O campo `:attribute` não pode ser maior que 10 caracteres.",

                    'usoBeneficiario.required' => "O campo :attribute não pode estar em branco.",
                    'usoBeneficiario.string' => "O campo `:attribute` deve conter apenas caracteres alfanuméricos.",
                    'usoBeneficiario.max' => "O campo `:attribute` não pode ser maior que 25 caracteres."
                ]);


            if ($validator->fails()) {
                throw new InvalidArgumentException('Falha na validacao de ' . '`' . __CLASS__
                    . '`: ' . $validator->errors());
            }

        } catch (InvalidArgumentException $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode());

        } catch (Exception $e) {
            throw new Exception($e);
        }

    }
}
