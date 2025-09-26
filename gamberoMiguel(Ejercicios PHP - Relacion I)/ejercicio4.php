<!-- Ejercicio 4 - Miguel Angel Gambero-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1><u>Ejercicio - 4</u></h1>
<!-- 4 - En un programa PHP, declara un array constante en el que se almacenarán
los días de la semana. Muestra por pantalla:
● el primer dia de la semana
● todos los días secuencialmente
● lo mismo que el anterior, pero en formato de lista numerada -->

<?php
    $DIASSEMANA = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    printf ("El primer dia de la semana es el %s<br>",$DIASSEMANA[0]);

    foreach($DIASSEMANA as $DIA){
    echo "$DIA ";
};
?>
<ol>
    <?php  
        foreach($DIASSEMANA as $DIA){
            echo "<li>$DIA<br></li>";
        };
    ?>
</ol>
</body>
</html>