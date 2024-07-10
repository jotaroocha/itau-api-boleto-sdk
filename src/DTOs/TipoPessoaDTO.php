<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use InvalidArgumentException;
use Jotaroocha\ItauApiBoletoSdk\Enums\CodigoTipoPessoaEnum;
use Jotaroocha\ItauApiBoletoSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBoletoSdk\Validation\Rules\ValidaPessoaFisicaJuridica;
use JsonSerializable;

class TipoPessoaDTO implements JsonSerializable
{

    public function __construct(
        protected CodigoTipoPessoaEnum $codigo_tipo_pessoa,
        protected string               $numero_cadastro_pessoa_fisica = '',
        protected string               $numero_cadastro_nacional_pessoa_juridica = ''
    )
    {
    }


    /**
     * @throws Exception
     */
    public function validateAndReturnJsonSerialize(): array
    {
        $this->validate();
        return $this->jsonSerialize();
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @throws Exception
     */
    public function validate(): void
    {
        try {
            $validator = Validator::make(data: $this->jsonSerialize(),
                rules: [
                    'codigo_tipo_pessoa' => [
                        'required', Rule::enum(CodigoTipoPessoaEnum::class)
                    ],
                    'numero_cadastro_pessoa_fisica' => [
                        'required_without:numero_cadastro_nacional_pessoa_juridica',
                        new ValidaPessoaFisicaJuridica($this->codigo_tipo_pessoa->value)
                    ],
                    'numero_cadastro_nacional_pessoa_juridica' => [
                        'required_without:numero_cadastro_pessoa_fisica',
                        new ValidaPessoaFisicaJuridica($this->codigo_tipo_pessoa->value)
                    ]
                ],
                messages: [
                    'codigo_tipo_pessoa.required' => "O campo `:attribute` deve ser informado.",
                    'codigo_tipo_pessoa.Illuminate\Validation\Rules\Enum' => "O valor informado no campo `:attribute` é "
                        . "inválido. São valores válidos: " . CodigoTipoPessoaEnum::toStringQuoted(),

                    'numero_cadastro_pessoa_fisica.required_without' => "O campo `:attribute` deve ser informado quando "
                        . "o campo `numero_cadastro_pessoa_juridica`",
                    'numero_cadastro_pessoa_juridica.'
                ]);

            if ($validator->fails()) {
                throw new InvalidArgumentException('Falha na validação de ' .
                    '`' . __CLASS__ . '`: ' . $validator->errors());
            }

        } catch (InvalidArgumentException $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode(), $e);

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
