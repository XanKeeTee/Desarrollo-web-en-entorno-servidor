<!-- Ejercicio 1 - Miguel Angel Gambero -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
<!-- 1- Haz un programa en PHP que muestre el mensaje “Hello world” de diferentes formas: -->
    <h1><u>Ejercicio 1</u></h1>

<!-- Como texto plano html -->
    <?php
    echo "Hello World";
    ?>

<!-- Como un encabezado de nivel 2 html -->
    <h2>
        <?php
            echo "Hello World";
        ?>
    </h2>


<!-- Como un párrafo con estilo: color, tipografía, alineación, etc. -->
    <p style = "color: red; font-size:20px;text-align:center">
        <?php
            echo "Hello World";
        ?>
    </p>

<!-- Con un salto de línea entre hello y world -->
    <p>
    <?php
        echo "<br>Hello</br>World"
    ?>
    </p>


<!--Investiga en la siguiente dirección como mostrar la fecha y la hora del sistema en el momento de la ejecución: -->
    <p>
    <?php
        date_default_timezone_set('Europe/Madrid');
        echo date('d-m-Y H:i:s');
    ?>
    </p>


<!-- Añádele la información sobre la instalación php (phpversion() y phpinfo()-->
    <?php 
        echo phpversion();
        echo phpinfo();
    ?>

</body>
</html>