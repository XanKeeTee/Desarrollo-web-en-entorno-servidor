<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><u>Ejercicio - 9</u></h1>
<!-- 9- En un programa PHP, valora a partir de los 3 lados de un triángulo si es
equilátero, isósceles y escaleno, y muestra esa valoración por pantalla. -->
<?php
    $lado1 = 5;
    $lado2 = 5;
    $lado3 = 5;

    if($lado1 == $lado2 && $lado2 == $lado3){
        echo "El triángulo es equilátero.";
    } elseif($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3){
        echo "El triángulo es isósceles.";
    } else {
        echo "El triángulo es escaleno.";
    }
?>
</body>
</html>