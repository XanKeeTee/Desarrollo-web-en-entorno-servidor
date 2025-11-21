<?php
declare(strict_types=1);

namespace App\Utilidades;

class Geometria
{
    public const PI = 3.14159;

    public static function areaCirculo(float $radio): float
    {
        return self::PI * $radio * $radio;
    }
}
?>