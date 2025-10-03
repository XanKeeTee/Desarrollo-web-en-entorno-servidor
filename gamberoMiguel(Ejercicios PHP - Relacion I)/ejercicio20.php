<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 20</title>
</head>
<body>
    <h1><u>Ejercicio 20</u></h1>
    <!-- 20- Mejora el ejercicio anterior para que se pueda convertir a binario, octal o  hexadecimal-->
    <h3>Convierte un número natural decimal en binario, octal o hexadecimal</h3>
    <?php
        $numDecimal = 45; 
        $numBinario = decbin($numDecimal);
        $numOctal = decoct($numDecimal);
        $numHexadecimal = dechex($numDecimal);
        echo "El número decimal $numDecimal en binario es: $numBinario<br>";
        echo "El número decimal $numDecimal en octal es: $numOctal<br>";
        echo "El número decimal $numDecimal en hexadecimal es: $numHexadecimal<br>";
    ?>
</body>
</html>