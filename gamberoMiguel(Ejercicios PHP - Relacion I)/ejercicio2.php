<!-- Ejercicio 2 - Miguel Angel Gambero -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio - 2</title>
</head>
<body>
<!--2.Haz un programa PHP que muestre un valor de ejemplo de cada tipo de
dato escalar en php con echo utilizando la función var_dump(), y también
con printf formateado. Prueba todas las posibilidades tal y como vienen
descritas en: https://www.w3schools.com/php/func_string_printf.asp
● bool
● int
● float
● string-->

<h1><u>Ejercicio - 2</u></h1>

<?php
    $float = 12.6;
    $boolean = true;
    $int = 3;
    $string = "Hola Mundo!";

    var_dump($float,$boolean,$int,$string);
    printf("<br>Float: %f<br>Booleano: %b<br>Int: %d<br>String: %s",$float,$boolean,$int,$string);
?>
</body>
</html>