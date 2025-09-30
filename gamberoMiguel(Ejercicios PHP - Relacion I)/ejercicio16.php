<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
    <h1></h1><u>Ejercicio 16</u></h1>
    <!-- 16- Haz un programa que muestre todos los divisores de un número entero y
    positivo. Irá mostrando cada número que se prueba y si resulta ser divisor,
    aparecerá marcado visiblemente, por ejemplo con otro color.Divisores de 10:
    1 2 3 4 5 6 7 8 9 10 -->

    <?php
        $numero = 28; // Número entero y positivo
        echo "<h2>Divisores de $numero:</h2>";
        echo "<div style='font-size: 20px;'>";

        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                // Si es divisor, lo mostramos en negrita y color rojo
                echo "<span style='color: red; font-weight: bold;'>$i</span> ";
            } else {
                // Si no es divisor, lo mostramos normalmente
                echo "<span>$i</span> ";
            }
        }

        echo "</div>";
    ?>
</body>
</html>