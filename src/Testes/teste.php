<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Testes;

/* Arquivo será utilizado apenas para realização de testes não automatizados */

use DateTime;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\BoletoIndividual;
use Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau\Pix;
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
    $boletoIndividual = new BoletoIndividual(
        nossoNumero: '789456',
        dataVencimento: new DateTime('25-07-2024'),
        valorTitulo: 100,
        dataLimitePagamento: new DateTime('25-07-2024'),
        seuNumero: ' ',
        usoBeneficiario: "   "
    );

    echo json_encode($boletoIndividual->jsonSerialize());
} catch (ExcecaoApi $e) {
    echo $e->getMessage();
} catch (\Exception $e) {
    echo $e->getMessage();
}



