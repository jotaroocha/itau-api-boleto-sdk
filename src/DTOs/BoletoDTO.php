<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs;

use Jotaroocha\ItauApiBoletoSdk\Enums\BoletoEtapaProcessoEnum;
use JsonSerializable;

class BoletoDTO implements JsonSerializable
{
    private string $id_boleto;
    private BoletoEtapaProcessoEnum $etapa_processo_boleto;
    private string $codigo_canal_operacao;
    private BeneficiarioDTO $beneficiario;


    public function jsonSerialize(): mixed
    {
        // TODO: Implement jsonSerialize() method.
    }
}
