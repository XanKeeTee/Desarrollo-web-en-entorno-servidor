<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio - 14</title>
</head>
<body>
    <h1><u>Ejercicio 14</u></h1>
    <!-- 14- Haz un programa PHP que calcule la suma de los n primeros números
    naturales-->
    <?php
        $n = 10;
        $suma = 0;

        for ($i = 1; $i <= $n; $i++) {
            $suma += $i;
        }

        echo "<p>La suma de los primeros $n números naturales es: $suma</p>";
    ?>
</body>
</html>