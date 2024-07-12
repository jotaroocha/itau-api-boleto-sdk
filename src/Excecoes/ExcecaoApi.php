<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Excecoes;

use Exception;
use Throwable;

class ExcecaoApi extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function regrasDeValidacaoEmpty(): static
    {
        return new static("As regras de validação estão vazias. " .
            "Por favor, defina as regras de validação.", 0);
    }

    public static function mensagensDeValidacaoCustomizadasEmpty(): static
    {
        return new static("As mensagens de validação customizadas estão vazias. " .
            "Por favor, defina as mensagens de validação customizadas.", 0);
    }

    public static function chavesCustomizadasEmpty(): static
    {
        return new static("As chaves customizadas estão vazias. " .
            "Por favor, defina as chaves customizadas.", 0);
    }

}
