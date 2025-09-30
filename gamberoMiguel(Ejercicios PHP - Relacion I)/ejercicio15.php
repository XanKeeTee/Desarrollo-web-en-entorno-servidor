<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio  - 15</title>
</head>
<body>
    <h1><u>Ejercicio 15</u></h1>
    <!-- 15- Haz un programa php que te diga si un número entero y positivo es primo o no (Sin formulario)-->

    <?php
        $numero = 29;
        $esPrimo = true;

        if ($numero <= 1) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    $esPrimo = false;
                    break;
                }
            }
        }

        if ($esPrimo) {
            echo "<p>El número $numero es primo.</p>";
        } else {
            echo "<p>El número $numero no es primo.</p>";
        }
?>
</body>
</html>