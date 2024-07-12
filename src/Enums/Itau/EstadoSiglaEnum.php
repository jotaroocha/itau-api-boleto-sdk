<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum EstadoSiglaEnum: string
{
    use EnumHelperTrait;

    case Rondonia = 'RO';
    case Acre = 'AC';
    case Amazonas = 'AM';
    case Roraima = 'RR';
    case Para = 'PA';
    case Amapa = 'AP';
    case Tocantins = 'TO';
    case Maranhao = 'MA';
    case Piaui = 'PI';
    case Ceara = 'CE';
    case RioGrandeDoNorte = 'RN';
    case Paraiba = 'PB';
    case Pernambuco = 'PE';
    case Alagoas = 'AL';
    case Sergipe = 'SE';
    case Bahia = 'BA';
    case MinasGerais = 'MG';
    case EspiritoSanto = 'ES';
    case RioDeJaneiro = 'RJ';
    case SaoPaulo = 'SP';
    case Parana = 'PR';
    case SantaCatarina = 'SC';
    case RioGrandeDoSul = 'RS';
    case MatoGrossoDoSul = 'MS';
    case MatoGrosso = 'MT';
    case Goias = 'GO';
    case DistritoFederal = 'DF';
}
