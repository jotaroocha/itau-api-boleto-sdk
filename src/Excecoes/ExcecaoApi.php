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

}
