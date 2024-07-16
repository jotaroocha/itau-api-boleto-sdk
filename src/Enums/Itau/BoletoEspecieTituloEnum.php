<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Enums\Itau;

use Jotaroocha\ItauApiBolecodeSdk\Traits\EnumHelperTrait;

enum BoletoEspecieTituloEnum: string
{

    use EnumHelperTrait;

    case DM = '01';
    case NP = '02';
    case NS = '03';
    case ME = '04';
    case RC = '05';
    case CT = '06';
    case DS = '08';
    case LC = '09';
    case DD = '15';
    case EC = '16';
    case FS = '17';
    case BDP = '18';
    case BDA = '33';
    case CBI = '88';
    case CC = '89';
    case CCB = '90';
    case CD = '91';
    case CH = '92';
    case CM = '93';
    case CPS = '94';
    case DMI = '95';
    case DSI = '96';
    case RA = '97';
    case TA = '98';
    case DV = '99';

    public function descricao(): string
    {
        return match ($this) {
            self::DM => 'Duplicata de Venda Mercantil',
            self::NP => 'Nota Promissoria',
            self::NS => 'Nota de Seguro',
            self::ME => 'Mensalidade Escolar',
            self::RC => 'Recibo',
            self::CT => 'Contrato',
            self::DS => 'Duplicata de Prestacao de Serviços Original',
            self::LC => 'Letra de Cambio',
            self::DD => 'Documento de Divida',
            self::EC => 'Encargos Condominais',
            self::FS => 'Fatura de Servico',
            self::BDP => 'Boleto Proposta',
            self::BDA => 'Boleto Deposito Aporte (procure seu gerente para uso dessa especie)',
            self::CBI => 'Cedula de Crédito Bancario por Indicacao',
            self::CC => 'Contrato de Cambio',
            self::CCB => 'Cedula de Credito Bancario',
            self::CD => 'Confissao de Divida',
            self::CH => 'Cheque',
            self::CM => 'Contrato de Mutuo',
            self::CPS => 'Conta de Prestacao de Services',
            self::DMI => 'Duplicata de Venda Mercantil por Indicacao',
            self::DSI => 'Duplicata de Prestação de Serviços - Original Por Indicacao',
            self::RA => 'Recibo de Aluguel (PJ)',
            self::TA => 'Termo de acordo. Ex: acao trabalhista',
            self::DV => 'Diversos'
        };
    }
}
