<?php

namespace App\Util;

class Calculator
{
    /**
     * Suma dos números
     *
     * @param int $a Primer número
     * @param int $b Segundo número
     * @return int
     */
    public static function sum(int $a, int $b): int
    {
        return $a + $b;
    }

    /**
     * Verifica si un número es par
     *
     * @param int $number Número a verificar
     * @return bool
     */
    public static function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }
}