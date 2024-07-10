<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Auxiliares;

class Configuracao
{
    public static function get(string $key): ?string
    {
        /* Adicionar aqui novas URIs para cada novo Cliente de integração */
        $config = [
            'itau.base_uri' => 'https://api.itau.br'
        ];

        return $config[$key] ?? null;
    }
}
