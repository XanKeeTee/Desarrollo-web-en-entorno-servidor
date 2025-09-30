<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 y 11</title>
</head>
<body>
    <h1><u>Ejercicio - 10</u></h1>
<!-- 10- Haz un programa PHP que resuelva una ecuación de segundo grado
siempre que los resultados sean reales-->
<?php
    $a = 1;
    $b = -3;
    $c = 2;

    $discriminante = ($b * $b) - (4 * $a * $c);

    if($discriminante > 0){
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        echo "La ecuación tiene dos soluciones reales: x1 = ".$x1." y x2 = ".$x2;
    } elseif($discriminante == 0){
        $x = -$b / (2 * $a);
        echo "La ecuación tiene una solución real: x = ".$x;
    } else {
        echo "La ecuación no tiene soluciones reales.";
    }
?>
    <h1><u>Ejercicio - 11</u></h1>
    <!-- 11- Mejora el intento anterior para que si alguno de los coeficientes a, b o c
fuera 0, el programa gestione el cálculo de resultados de manera más
adecuada:
        ● Si a=0, la ecuación no es de segundo grado, solo hay una raíz:
        x =-c/b
        ● Si b=0, las raíces se calculan de manera más sencilla:
        x1=-sqrt(-c/a) y x2=sqrt(-c/a)
        ● Si c=0, las raíces son, sacando factor común: x(ax+b)=0:
        x1=0 y x2=-b/a -->

<?php
    $a = 1;
    $b = -3;    
    $c = 2;
    if($a == 0){
        if($b != 0){
            $x = -$c / $b;
            echo "La ecuación no es de segundo grado. La solución es: x = ".$x;
        } else {
            echo "No es una ecuación válida.";
        }
    } elseif($b == 0){
        if($c <= 0){
            $x1 = -sqrt(-$c / $a);
            $x2 = sqrt(-$c / $a);
            echo "La ecuación tiene dos soluciones reales: x1 = ".$x1." y x2 = ".$x2;
        } else {
            echo "La ecuación no tiene soluciones reales.";
        }
    } elseif($c == 0){
        $x1 = 0;
        $x2 = -$b / $a;
        echo "La ecuación tiene dos soluciones: x1 = ".$x1." y x2 = ".$x2;
    } else {
        $discriminante = ($b * $b) - (4 * $a * $c);
        if($discriminante > 0){
            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
            echo "La ecuación tiene dos soluciones reales: x1 = ".$x1." y x2 = ".$x2;
        } elseif($discriminante == 0){
            $x = -$b / (2 * $a);
            echo "La ecuación tiene una solución real: x = ".$x;
        } else {
            echo "La ecuación no tiene soluciones reales.";
        }
    }
?>


</body>
</html>