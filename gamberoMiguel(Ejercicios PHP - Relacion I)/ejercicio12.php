<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>
    <h1><u>Ejercicio - 12</u></h1>
<!-- 12 - Realiza un programa php que, a partir de una nota numérica entera entre
1 y 10 devuelva:
    ● Sobresaliente si es 9 ó 10
    ● Notable si es 7 u 8
    ● Bien si es un 6
    ● Suficiente si es un 5
    ● Suspenso, si es 1,2,3 ó 4

Utiliza la bifurcación múltiple o switch y comprueba que la nota esté en el
rango adecuado de valores permitidos (sea entera y entre 1 y 10) -->

<?php
    $nota = 1;

    if(is_int($nota) && $nota >= 1 && $nota <= 10){
        switch($nota){
            case 9:
            case 10:
                echo "Sobresaliente";
                break;
            case 7:
            case 8:
                echo "Notable";
                break;
            case 6:
                echo "Bien";
                break;
            case 5:
                echo "Suficiente";
                break;
            case 1:
            case 2:
            case 3:
            case 4:
                echo "Suspenso";
                break;
        }
    } else {
        echo "La nota no es válida. Debe ser un número entero entre 1 y 10.";
    }
</body>
</html>