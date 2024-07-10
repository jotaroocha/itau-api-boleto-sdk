<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs;

use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Jotaroocha\ItauApiBoletoSdk\Excecoes\ExcecaoApi;

class BeneficiarioDTO
{

    public function __construct(
        protected string        $id_beneficiario,
        protected string        $nome_cobranca,
        protected TipoPessoaDTO $tipo_pessoa
    )
    {
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    /**
     * @throws ExcecaoApi
     * @throws Exception
     */
    public function validate()
    {
        try {
            $validator = Validator::make(data: $this->jsonSerialize(),
                rules: [
                    'id_beneficiario' => 'required|string',
                ]
            );

        } catch (InvalidArgumentException $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }


}
