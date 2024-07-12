<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Auxiliares;

class Helper
{

    public static function validaCPF(string $cpf): bool
    {
        // Verificar se foi informado
        if (empty($cpf)) {
            return false;
        }

        // Verifica se o CPF possui 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Calcula o primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += intval($cpf[$i]) * (10 - $i);
        }
        $resto = ($soma % 11);
        $digito1 = ($resto < 2) ? 0 : (11 - $resto);

        // Calcula o segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += intval($cpf[$i]) * (11 - $i);
        }
        $resto = ($soma % 11);
        $digito2 = ($resto < 2) ? 0 : (11 - $resto);

        // Verifica se os dígitos verificadores são iguais aos informados
        if ($cpf[9] == $digito1 && $cpf[10] == $digito2) {
            return true;
        } else {
            return false;
        }
    }

    public static function validaCNPJ(string $cnpj): bool
    {
        // Verificar se foi informado
        if (empty($cnpj)) {
            return false;
        }

        // Verifica se o número de dígitos informados é igual a 14
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Verifica se todos os dígitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        // Cálculo do primeiro dígito verificador
        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i])
            ;

        if ($cnpj[12] != (($n %= 11) < 2 ? 0 : 11 - $n)) {
            return false;
        }

        // Cálculo do segundo dígito verificador
        for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i++])
            ;

        if ($cnpj[13] != (($n %= 11) < 2 ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }

    public static function getArrayModificadoByChavesCustomizadas(array $arrayOriginal,
                                                                  array $arrayDeChavesCustomizadas): array
    {
        // Modificar as chaves do array
        $chavesCustomizadas = array_map(function ($key) use ($arrayDeChavesCustomizadas) {
            return $arrayDeChavesCustomizadas[$key] ?? $key; // Usar a chave original se não houver mapeamento
        }, array_keys($arrayOriginal));

        // Combinar as novas chaves com os valores e retornar
        return array_combine($chavesCustomizadas, $arrayOriginal);
    }

}
