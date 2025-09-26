<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><u>Ejercicio - 5</u></h1>
<!-- 5- Crea un array asociativo constante, en el que utilices como clave el día de la
semana, y como valor, la temperatura máxima de ese día en formato real. A
continuación, muestra:
● la temperatura del primer dia de la semana
● la temperatura de todos los días, secuencialmente
● lo mismo que el anterior, pero en formato de lista numerada-->

<?php
    $temperaturas =[
        "Lunes" => 27,
        "Martes" => 26,
        "Miercoles" => 24,
        "Jueves" => 24,
        "Viernes" => 24,
        "Sabado" => 26,
        "Domingo" => 27
    ];
    echo "La temperatura del primer dia de la semana(Lunes) es: ".$temperaturas["Lunes"]."°C<br>";
    echo "La temperatura de todos los días, secuencialmente:<br>";
    foreach($temperaturas as $dia => $temp){
        echo "El dia ".$dia." tiene una temperatura de ".$temp."°C<br>";
    }
    echo "<br>La temperatura de todos los días en formato de lista numerada:<br><ol>";
    foreach($temperaturas as $dia => $temp){
        echo "<li>El dia ".$dia." tiene una temperatura de ".$temp."°C</li>";
    }
    echo "</ol>";
?>
</body>
</html>