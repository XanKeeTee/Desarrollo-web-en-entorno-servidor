<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <!-- 1- Haz una función PHP esPrimo($num) que devuelva un booleano que indique
    si el número pasado como parámetro es primo o no. Haz un programa que
    pida un número natural, e incluyendo esta función, la utilice para mostrar
    todos los números primos entre 1 y el introducido. Todo en el mismo archivo
    php-->

    <form action="" method="post" id ="esPrimo">
        <input type="text" name="num1" id="num1" placeholder="Numero">
        <button type="submit">Enviar</button>
    </form>

    <?php
        $num1 = isset($_POST['num1']) ? trim($_POST['num1']) : '';

        if ($num1<=0){
            echo "El numero " + $num1 + " es negativo o cero";
        }
    ?>    
</body>
</html>