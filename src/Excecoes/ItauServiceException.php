<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Excecoes;

use Exception;
use Throwable;

class ItauServiceException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function serverError(string $msg): static
    {
        return new static($msg, 500);
    }

}
