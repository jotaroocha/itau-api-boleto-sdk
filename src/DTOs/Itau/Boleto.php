<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use DateTime;
use InvalidArgumentException;
use Jotaroocha\ItauApiBolecodeSdk\Contratos\ItauAbstractDTO;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoEspecieTituloEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoFormaEnvioEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoInstrumentoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoBoletoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoCarteiraEnum;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\BoletoRule;

/* 'dados_boleto' */

class Boleto extends ItauAbstractDTO
{
    /*  Cada atributo está comentado com o nome correspondente usado na API do Itaú */
    protected string $instrumentoCobranca; // descricao_instrumento_cobranca
    protected string $tipoBoleto; // tipo_boleto
    protected string $tipoCarteira; // codigo_carteira
    protected ?string $formaEnvio; // forma_envio
    protected ?string $assuntoEmail; // assunto_email
    protected ?string $mensagemEmail; // mensagem_email
    protected string $especieTitulo; // codigo_especie
    protected ?string $valorAbatimento; // valor_abatimento
    protected ?string $dataEmissao; //data_emissao (AAAA-MM-DD)
    protected Pagador $pagador; // pagador
    protected ?Avalista $avalista; // sacador_avalista

    /**
     * @var BoletoIndividual[]
     */
    protected array $boletosIndividuais; // [dados_individuais_boleto]

    /* TODO --> IMPLEMENTAR OS DADOS OPCIONAIS POSTERIORMENTE
    private Juros $juros;
    private Multa $multa;
    private Desconto $desconto;
    private RecebimentoDivergente $recebimentoDivergente;
    private Protesto $protesto;
    private Negativacao $negativacao;
    private InstrucaoCobranca $instrucaoCobranca; */

    public function __construct(BoletoInstrumentoCobrancaEnum $instrumentoCobranca,
                                BoletoTipoBoletoEnum          $tipoBoleto,
                                BoletoTipoCarteiraEnum        $tipoCarteira,
                                BoletoEspecieTituloEnum       $especieTitulo,
                                Pagador                       $pagador,
                                array                         $boletosIndividuais,
                                BoletoFormaEnvioEnum          $formaEnvio = null,
                                string                        $assuntoEmail = null,
                                string                        $mensagemEmail = null,
                                float                         $valorAbatimento = null,
                                DateTime                      $dataEmissao = null,
                                Avalista                      $avalista = null
    )
    {
        $this->instrumentoCobranca = $instrumentoCobranca->value;
        $this->tipoBoleto = $tipoBoleto->value;
        $this->tipoCarteira = $tipoCarteira->value;
        $this->especieTitulo = $especieTitulo->value;
        $this->pagador = $pagador;
        $this->boletosIndividuais = $boletosIndividuais;
        $this->formaEnvio = $formaEnvio?->value;
        $this->assuntoEmail = $assuntoEmail ? trim($assuntoEmail) : null;
        $this->mensagemEmail = $mensagemEmail ? trim($mensagemEmail) : null;
        $this->valorAbatimento = $valorAbatimento ?
            number_format($valorAbatimento, 2, '.', '') : null;
        $this->dataEmissao = $dataEmissao?->format('Y-m-d');
        $this->avalista = $avalista;

        $this->setRule(new BoletoRule());

        $this->boletosIndividuaisInstanceOfValidate();

        parent::__construct();
    }


    public
    function getChavesCustomizadas(): array
    {
        return [
            'instrumentoCobranca' => 'descricao_instrumento_cobranca',
            'tipoBoleto' => 'tipo_boleto',
            'tipoCarteira' => 'tipo_carteira',
            'formaEnvio' => 'forma_envio',
            'assuntoEmail' => 'assunto_email',
            'mensagemEmail' => 'mensagem_email',
            'especieTitulo' => 'codigo_especie',
            'valorAbatimento' => 'valor_abatimento',
            'dataEmissao' => 'data_emissao',
            'pagador' => 'pagador',
            'avalista' => 'sacador_avalista',
            'boletosIndividuais' => 'dados_individuais_boleto',
        ];
    }

    private function boletosIndividuaisInstanceOfValidate(): void
    {
        foreach ($this->boletosIndividuais as $boletoIndividual) {
            if (!($boletoIndividual instanceof BoletoIndividual)) {
                throw new InvalidArgumentException(__CLASS__ . ": " .
                    "BoletoIndividual não é uma instancia BoletoIndividual");
            }
        }
    }
}
