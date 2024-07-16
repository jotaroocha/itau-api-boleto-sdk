<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Testes;

/* Arquivo será utilizado apenas para realização de testes não automatizados */

use DateTime;
use GuzzleHttp\Exception\GuzzleException;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Avalista;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Beneficiario;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\BoleCode;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Boleto;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\BoletoIndividual;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Endereco;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pagador;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pessoa;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pix;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\TipoPessoa;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoleCodeEtapaProcessoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoEspecieTituloEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoFormaEnvioEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoInstrumentoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoBoletoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoCarteiraEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\EstadoSiglaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBolecodeSdk\Http\GuzzleHttpClient;
use Jotaroocha\ItauApiBolecodeSdk\Services\ItauService;

// Incluir o autoload do Composer
require_once __DIR__ . '/../../vendor/autoload.php';


//$pix = new Pix();
//$pix->chave = "teste";
//$pix->idLocation = 1;
//
//
////echo json_encode($pix->jsonSerialize());
//
//
//try {
//    $pix->validate();
//} catch (\Exception $e) {
//    echo $e->getMessage();
//}

try {

    $endereco = new Endereco(
        logradouro: "Avenida Vicente Machado",
        bairro: "Batel",
        cidade: "Curitiba",
        uf: EstadoSiglaEnum::Parana,
        cep: "80440020"
    );

    $boletoIndividual = new BoletoIndividual(
        nossoNumero: '789456',
        dataVencimento: new DateTime('25-07-2024'),
        valorTitulo: 19999999.20,
        dataLimitePagamento: new DateTime('25-07-2024'),
        seuNumero: '1748595325'
    );

    $tipoPessoa = new TipoPessoa(
        tipoPessoa: TipoPessoaEnum::Fisica,
        cpf: "04721151110");

    $pessoa = new Pessoa(
        nome: "Joao Rocha",
        tipoPessoa: $tipoPessoa,
        nomeFantasia: "Teste"
    );

    $pagador = new Pagador(
        email: 'joao@boltech.com.br',
        pessoa: $pessoa,
        endereco: $endereco
    );

    $pix = new Pix(
        chave: 'pix@boltech.com.br',
        tipoCobranca: PixTipoCobrancaEnum::Cob
    );

    $beneficiario = new Beneficiario(
        agencia: '1282',
        conta: '0001216',
        dac: '7'
    );

    $boleto = new Boleto(
        instrumentoCobranca: BoletoInstrumentoCobrancaEnum::BoletoPix,
        tipoBoleto: BoletoTipoBoletoEnum::AVista,
        tipoCarteira: BoletoTipoCarteiraEnum::Carteira_109,
        especieTitulo: BoletoEspecieTituloEnum::DM,
        pagador: $pagador,
        boletosIndividuais: [$boletoIndividual],
        formaEnvio: BoletoFormaEnvioEnum::Impressao,
        valorAbatimento: 159.99,
        dataEmissao: new DateTime('15-07-2024')
    );

    $boleCode = new BoleCode(
        etapaProcesso: BoleCodeEtapaProcessoEnum::Simulacao,
        beneficiario: $beneficiario,
        boleto: $boleto,
        pix: $pix
    );

    $itauService = new ItauService();

    try {
        $response = $itauService->gerarBoleCode($boleCode);
        $teste = $response;
    } catch (GuzzleException $e) {
        echo $e->getMessage();

    }

//    echo json_encode($response, true);

//
//    echo json_encode($boleCode->getArrayForApi());

} catch (ExcecaoApi $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}


