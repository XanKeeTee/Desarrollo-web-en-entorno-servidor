<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>
<body>
    <h1><u>Ejercicio 17</u></h1>
    <!-- 17- Haz un script en PHP que calcule la división de dos números naturales
    utilizando el algoritmo de Euclides para la división-->
    <?php
        function euclidesDivision($dividendo, $divisor) {
            if ($divisor == 0) {
                return "Error: División por cero no está definida.";
            }

            $cociente = 0;
            $resto = $dividendo;

            while ($resto >= $divisor) {
                $resto -= $divisor;
                $cociente++;
            }

            return [
                'cociente' => $cociente,
                'resto' => $resto
            ];
        }

        // Ejemplo de uso
        $dividendo = 20;
        $divisor = 3;
        $resultado = euclidesDivision($dividendo, $divisor);

        if (is_array($resultado)) {
            echo "<p>División de $dividendo entre $divisor:</p>";
            echo "<p>Cociente: " . $resultado['cociente'] . "</p>";
            echo "<p>Resto: " . $resultado['resto'] . "</p>";
        } else {
            echo "<p>$resultado</p>";
        }
    ?>
</body>
</html>