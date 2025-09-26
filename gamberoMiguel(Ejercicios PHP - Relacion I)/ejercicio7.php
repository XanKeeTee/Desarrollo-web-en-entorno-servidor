<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
<h1><u>Ejercicio - 7</u></h1>

<!-- 7-Calcula la nota final de una persona a partir de la media de dos notas
numéricas iniciales, y descontando 0.25 por cada falta sin justificar. Muestra el
resultado por pantalla, indicando si la persona aprueba o suspende.-->


<?php
    $nota1 = 7;
    $nota2 = 6;
    $faltas = 3;

    $media = ($nota1 + $nota2) / 2;
    $descuento = $faltas * 0.25;
    $nota_final = $media - $descuento;

    echo "La nota final es: ".$nota_final."<br>";

    if($nota_final >= 5){
        echo "La persona aprueba.";
    } else {
        echo "La persona suspende.";
    }
?>

</body>
</html>