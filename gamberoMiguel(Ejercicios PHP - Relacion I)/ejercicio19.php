<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>
<body>
    <h1><u>Ejercicio 19</u></h1>
    <!-- 19- Haz un script PHP en el que conviertas en binario un número natural
    decimal -->
    <h3>Convierte un número natural decimal en binario</h3>
    <?php
        $numDecimal = 45; 
        $numBinario = decbin($numDecimal);
        echo "El número decimal $numDecimal en binario es: $numBinario";
    ?>
</body>
</html>