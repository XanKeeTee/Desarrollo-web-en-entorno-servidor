<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio - 13</title>
</head>
<body>
    <h1><u>Ejercicio - 13</u></h1>

    <!-- 13- Haz un script PHP que calcule el factorial de un número natural (entero y
positivo). Haz que se muestren los cálculos que se van haciendo-->

<?php
    $numero = 5;
    $factorial = 1;

    if($numero < 0){
        echo "El número debe ser un entero positivo.";
    } elseif($numero == 0){
        echo "El factorial de 0 es 1.";
    } else {
        echo "Cálculo del factorial de ".$numero.":<br>";
        for($i = 1; $i <= $numero; $i++){
            $factorial *= $i;
            if($i == 1){
                echo $i;
            } else {
                echo " x ".$i;
            }
        }
        echo " = ".$factorial;
    }
?>
</body>
</html>