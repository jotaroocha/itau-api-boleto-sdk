<?php

namespace Jotaroocha\ItauApiBolecodeSdk\DTOs\Itau;

use Exception;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use InvalidArgumentException;
use Jotaroocha\ItauApiBolecodeSdk\Auxiliares\Helper;
use Jotaroocha\ItauApiBolecodeSdk\Excecoes\ExcecaoApi;
use JsonSerializable;

abstract class
ItauAbstractDTO implements JsonSerializable
{

    protected array $regrasDeValidacao = [];
    protected array $mensagensDeValidacaoCustomizadas = [];

    /**
     * @throws ExcecaoApi
     * @throws Exception
     */
    public function __construct()
    {
        /* Construtor deve ser implementado nas classes concretas
         * -------------------------------------------------------------------------------------------------------
         * Classes concretas devem realizar os seguintes passos:
         *
         * 1 → Implementar a inicialização dos atributos, conforme atributos documentos na API;
         *
         * 2 → Setar os atributos: 'regrasDeValidacao', 'mensagensDeValidacaoCustomizadas' e 'chavesCustomizadas':
         *
         *    2.1 ⇾ 'regrasDeValidacao' e 'mensagensDeValidacaoCustomizadas' devem ser uma classe de
         *              'Validation\Itau\Rules' que implementa 'ItauAbstractRules';
         *
         *    2.2 ⇾ 'chavesCustomizadas' → Deve ser um Array mapeando [['atributoDaClasse' =>
         *              'atributoNaDocumentaçãoDaApi'], []];
         *
         * 3 → Chamar o 'construtor parente' para continuar o fluxo do construtor, realizando as assim as validações;
         * ________________________________________________________________________________________________________ */

        try {
            $this->validar();
            $this->unsetUnnecessaryElements();
        } catch (ExcecaoApi $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode());
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function setRegrasDeValidacao(array $regrasDeValidacao): void
    {
        $this->regrasDeValidacao = $regrasDeValidacao;
    }

    public function setMensagensDeValidacaoCustomizadas(array $mensagensDeValidacaoCustomizadas): void
    {
        $this->mensagensDeValidacaoCustomizadas = $mensagensDeValidacaoCustomizadas;
    }

    abstract public function getChavesCustomizadas(): array;

    public function unsetUnnecessaryElements(): void
    {
        $this->setRegrasDeValidacao([]);
        $this->setMensagensDeValidacaoCustomizadas([]);
    }

    /**
     * @throws ExcecaoApi
     * @throws Exception
     */
    protected function validar(): void
    {
        try {
            if (empty($this->regrasDeValidacao)) {
                throw ExcecaoApi::regrasDeValidacaoEmpty();
            }

            if (empty($this->mensagensDeValidacaoCustomizadas)) {
                throw ExcecaoApi::mensagensDeValidacaoCustomizadasEmpty();
            }

            $translator = new ArrayLoader();
            $validator = new Factory(new Translator($translator, 'pt_BR'));

            $validator = $validator->make(
                $this->jsonSerialize(),
                $this->regrasDeValidacao,
                $this->mensagensDeValidacaoCustomizadas);

            if ($validator->fails()) {
                throw new InvalidArgumentException('Falha na validacao de campos ' . '`' .
                    get_called_class() . '`: ' . json_encode($validator->errors()->all()));
            }
        } catch (InvalidArgumentException|ExcecaoApi $e) {
            throw new ExcecaoApi($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function jsonSerialize(bool $chavesCustomizadas = false): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (!is_object($value)) {
                $array[$key] = $value;
            } else {
                $array[$key] = $this->converterObjetoParaArray($value, $chavesCustomizadas);
            }
        }
        return $array;
    }

    private function converterObjetoParaArray($objeto, bool $chavesCustomizadas = false): array
    {
        if (!$objeto instanceof JsonSerializable) {
            return (array)$objeto;
        }

        if ($chavesCustomizadas) {
            return Helper::getArrayModificadoByChavesCustomizadas($objeto->jsonSerialize(),
                $objeto->getChavesCustomizadas());
        }

        return $objeto->jsonSerialize();
    }

    /**
     * @throws Exception
     */
    public function getArrayForApi(): array
    {
        try {

            $arrayModificado = Helper::getArrayModificadoByChavesCustomizadas(
                $this->jsonSerialize(true), $this->getChavesCustomizadas());

            $arrayModificado = Helper::removerChaves($arrayModificado,
                ['mensagensDeValidacaoCustomizadas', 'regrasDeValidacao']);

            return Helper::removerValoresNulosVazios($arrayModificado);

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
