<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>
<body>
    <h1><u>Ejercicio 18</u></h1>
    <!-- 18- Haz un programa en PHP que calcule el máximo común divisor de dos
    números naturales utilizando el algoritmo de Euclides-->    
    <h3>Máximo Común Divisor (MCD) usando el Algoritmo de Euclides</h3>
    <?php
        function mcd($a, $b) {
            while ($b != 0) {
                $temp = $b;
                $b = $a % $b;
                $a = $temp;
            }
            return $a;
        }

        $num1 = 48;
        $num2 = 18;

        $resultado = mcd($num1, $num2);
        echo "El máximo común divisor de $num1 y $num2 es: " . $resultado;
    ?>
</body>
</html>