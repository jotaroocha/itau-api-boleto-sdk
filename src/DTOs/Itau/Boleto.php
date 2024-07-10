<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEspecieTituloEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEtapaProcessoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeFormaEnvioEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeTipoBoletoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeTipoCarteiraEnum;

class Boleto
{
    /*  Cada atributo está comentado com o nome correspondente usado na API do Itaú */
    private string $descricaoCobranca; // descricao_instrumento_cobranca
    private BoleCodeTipoBoletoEnum $tipoBoleto; // tipo_boleto
    private BoleCodeTipoCarteiraEnum $tipoCarteira; // codigo_carteira
    private BoleCodeFormaEnvioEnum $formaEnvio; // forma_envio
    private string $assuntoEmail; // assunto_email
    private string $mensagemEmail; // mensagem_email
    private BoleCodeEspecieTituloEnum $especieTitulo; // codigo_especie
    private float $valorAbatimento; // valor_abatimento
    private DateTime $dataEmissao; //data_emissao (AAAA-MM-DD)
    private Pagador $pagador; // pagador
    private Avalista $avalista; // sacador_avalista

    /**
     * @var BoletoIndividual[]
     */
    private array $boletosIndividuais;

    /* TODO --> IMPLEMENTAR OS DADOS OPCIONAIS POSTERIORMENTE  */
//    private Juros $juros;
//    private Multa $multa;
//    private Desconto $desconto;
//    private RecebimentoDivergente $recebimentoDivergente;
//    private Protesto $protesto;
//    private Negativacao $negativacao;
//    private InstrucaoCobranca $instrucaoCobranca;


}
