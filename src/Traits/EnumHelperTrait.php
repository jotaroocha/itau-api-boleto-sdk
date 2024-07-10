<?php

namespace Jotaroocha\ItauApiBolecodeSdk\Traits;

use Exception;


trait EnumHelperTrait
{
    /**
     * Trait criada e utilizada para facilitar a utilização dos Enums nas Migrations do Laravel
     * @throws Exception
     */
    public static function toArray(): array
    {
        try {
            $cases = static::cases();
            $values = [];
            foreach ($cases as $case) {
                $values[] = $case->value;
            }
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        } finally {
            return $values;
        }
    }

    /**
     * @throws Exception
     */
    public static function toStringQuoted(): string
    {
        try {
            $cases = static::cases();
            $string = '';
            foreach ($cases as $case) {
                $string .= "'" . $case->value . "'  ";
            }
        } catch (\Throwable $e) {
            throw new Exception($e->getMessage());
        } finally {
            return $string;
        }
    }

}
