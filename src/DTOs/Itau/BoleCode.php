<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Enums\BoletoEtapaProcessoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeFormaEnvio;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeTipoBoleto;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeTipoCarteira;

class BoleCode

{

    /*  Cada atributo está comentado com o nome correspondente usado na API da rede */
    private BoletoEtapaProcessoEnum $etapaProcesso; // etapa_processo_boleto
    private string $descricaoCobranca; // descricao_instrumento_cobranca
    private BoleCodeTipoBoleto $tipoBoleto; // tipo_boleto
    private BoleCodeTipoCarteira $tipoCarteira; //codigo_carteira
    private BoleCodeFormaEnvio $formaEnvio; //forma_envio
    private string $assuntoEmail; // assunto_email
    private string $mensagemEmail; // mensagem_email
    private string $especieTitulo; // codigo_especie


}
