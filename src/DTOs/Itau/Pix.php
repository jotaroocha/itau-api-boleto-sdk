<?php


namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Exception;
use Jotaroocha\ItauApiBolecodeSdk\Enums\Itau\PixTipoCobrancaEnum;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use Jotaroocha\ItauApiBolecodeSdk\Validation\Rules\Itau\PixRule;

class Pix extends ItauAbstractDTO
{
    protected string $chave; // chave
    protected ?string $idLocation; // id_location
    protected string $tipoCobranca; // tipo_cobranca

    public function __construct(string $chave, PixTipoCobrancaEnum $tipoCobranca, string $idLocation = null)
    {
        $this->chave = trim($chave);
        $this->tipoCobranca = $tipoCobranca->value;
        $this->idLocation = $idLocation ? trim($idLocation) : null;

        $this->setRule(new PixRule());

        parent::__construct();
    }

    public function getChavesCustomizadas(): array
    {
        return [
            'chave' => 'chave',
            'idLocation' => 'id_location',
            'tipoCobranca' => 'tipo_cobranca'
        ];
    }
}
