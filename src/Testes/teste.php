<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Testes;

/* Arquivo será utilizado apenas para realização de testes não automatizados */

use DateTime;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Avalista;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Boleto;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\BoletoIndividual;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Endereco;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pagador;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pessoa;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pix;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\TipoPessoa;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoEspecieTituloEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoFormaEnvioEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoInstrumentoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoBoletoEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\BoletoTipoCarteiraEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\EstadoSiglaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\TipoPessoaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;

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
        logradouro: "Rua dos Abacates",
        bairro: "Uberaba",
        cidade: "Curitiba",
        uf: EstadoSiglaEnum::Parana,
        cep: "80440020"
    );
//    echo(true);


    $boletoIndividual = new BoletoIndividual(
        nossoNumero: '789456',
        dataVencimento: new DateTime('25-07-2024'),
        valorTitulo: 19999999.20,
        dataLimitePagamento: new DateTime('25-07-2024'),
        seuNumero: 'awdoka',
        usoBeneficiario: 'awodkapo',
    );

    $tipoPessoa = new TipoPessoa(
        tipoPessoa: TipoPessoaEnum::Juridica,
        cnpj: "76707686000117");

    $pessoa = new Pessoa(
        nome: "Joao Rocha",
        tipoPessoa: $tipoPessoa,
        nomeFantasia: "Teste"
    );

    $pagador = new Pagador(
        email: 'joao@gmail.com',
        pessoa: $pessoa,
        endereco: $endereco
    );

    $avalista = new Avalista(
        $pessoa, $endereco
    );

    $pix = new Pix(
        chave: 'teste@teste.com',
        tipoCobranca: PixTipoCobrancaEnum::Cob,
        idLocation: null
    );

    $boleto = new Boleto(
        instrumentoCobranca: BoletoInstrumentoCobrancaEnum::BoletoPix,
        tipoBoleto: BoletoTipoBoletoEnum::AVista,
        tipoCarteira: BoletoTipoCarteiraEnum::Carteira_109,
        especieTitulo: BoletoEspecieTituloEnum::DM,
        pagador: $pagador,
        boletosIndividuais: [$boletoIndividual, $boletoIndividual],
        formaEnvio: BoletoFormaEnvioEnum::Email,
        assuntoEmail: "Boleto tal",
        mensagemEmail: "Boletasso",
        valorAbatimento: 159.99,
        dataEmissao: new DateTime('15-07-2024'),
        avalista: $avalista
    );

    echo json_encode($pix->getArrayForApi());

} catch (ExcecaoApi $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}



