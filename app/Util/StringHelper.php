<?php

namespace App\Util;

class StringHelper
{
    /**
     * Cuenta el número de vocales en una cadena
     *
     * @param string $text Texto a analizar
     * @return int
     */
    public static function countVowels(string $text): int
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $count = 0;
        
        foreach (str_split(strtolower($text)) as $char) {
            if (in_array($char, $vowels)) {
                $count++;
            }
        }
        
        return $count;
    }

    /**
     * Verifica si una cadena está en mayúsculas
     *
     * @param string $text Texto a verificar
     * @return bool
     */
    public static function isUpperCase(string $text): bool
    {
        return $text === strtoupper($text);
    }
}