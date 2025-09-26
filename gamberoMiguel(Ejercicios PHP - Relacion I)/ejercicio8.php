<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
<h1><u>Ejercicio - 8</u></h1>
<!-- 8- Crea en un script PHP dos arrays asociativos paralelos, uno con la rúbrica de
4 calificaciones (inicial, primera, segunda y tercera) y otro con las notas
particulares de una persona. A continuación, computará la nota final de esa
persona, y muéstrala por pantalla. --> 

<?php
    $rubrica = [
        "inicial" => 0.1,
        "primera" => 0.25,
        "segunda" => 0.25,
        "tercera" => 0.4
    ];

    $notas = [
        "inicial" => 6,
        "primera" => 7,
        "segunda" => 8,
        "tercera" => 9
    ];

    $nota_final = ($rubrica["inicial"] * $notas["inicial"]) + 
                  ($rubrica["primera"] * $notas["primera"]) + 
                  ($rubrica["segunda"] * $notas["segunda"]) + 
                  ($rubrica["tercera"] * $notas["tercera"]);

    echo "La nota final es: ".$nota_final;
?>
</body>
</html>