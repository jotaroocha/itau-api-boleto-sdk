<?php


namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Exception;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class Pix implements \JsonSerializable
{
    public string $chave; // chave
    public mixed $idLocation; // id_location
    private PixTipoCobrancaEnum $tipoCobranca; // tipo_cobranca


    /**
     * @throws \Exception
     */
    public function validate()
    {

        $validator = v::key('chave', v::stringType()->notEmpty()->length(1, 80))
            ->key('idLocation', v::intType()->notEmpty());

        try {
            $validator->assert($this->jsonSerialize());
        } catch (ValidationException $e) {
            throw new ExcecaoApi('`' . __CLASS__ . "` -> Erro na validação dos dados: " .
                $e->getMessage(), $e->getCode());
        }


    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
