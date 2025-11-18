<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
    function esPrimo($num)
    {
        $esPrimo = true;
        if ($num <= 1) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    $esPrimo = false;
                    break;
                }
            }
            return $esPrimo;
        }
    }
}

function calcularFactoriarl($numero, $factorial)
{
    $salida = "";

    if ($numero < 0) {
        $salida .= "El número debe ser un entero positivo.";
    } elseif ($numero == 0) {
        $salida .= "El factorial de 0 es 1.";
    } else {
        $salida .= "Cálculo del factorial de " . $numero . ":<br>";
        for ($i = 1; $i <= $numero; $i++) {
            $factorial *= $i;
            $salida .= ($i == 1) ? $i : " x " . $i;
        }
        $salida .= " = " . $factorial;
    }
    return $salida;
}

function mcdIterativo($a, $b)
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return abs($a);
}

function mcdRecursivo($a, $b)
{
    if ($b == 0) {
        return abs($a);
    }
    return mcdRecursivo($b, $a % $b);
}

function divisionIterativa($dividendo, $divisor){
    if ($divisor == 0) return ['error' => 'División por cero.'];
    if ($dividendo < 0 || $divisor < 0) return ['error' => 'Solo números positivos.'];

    $cociente = 0;
    $resto = $dividendo;
    while ($resto >= $divisor) {
        $resto -= $divisor;
        $cociente++;
    }
    return ['cociente' => $cociente, 'resto' => $resto];
}

function divisionRecursiva($dividendo, $divisor){
    if ($divisor == 0) return ['error' => 'División por cero.'];
    if ($dividendo < 0 || $divisor < 0) return ['error' => 'Solo números positivos.'];

    if ($dividendo < $divisor) {
        return ['cociente' => 0, 'resto' => $dividendo];
    }

    $res = divisionRecursiva($dividendo - $divisor, $divisor);
    return ['cociente' => $res['cociente'] + 1, 'resto' => $res['resto']];
}
