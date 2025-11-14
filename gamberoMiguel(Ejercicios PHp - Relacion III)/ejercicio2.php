<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = 5;
        $factorial = 1;

        function calcularFactoriarl($numero,$factorial){
            $salida = "";
            
            if($numero < 0){
                $salida .= "El número debe ser un entero positivo.";
            } elseif($numero == 0){
                $salida .= "El factorial de 0 es 1.";
            } else {
                $salida .= "Cálculo del factorial de ".$numero.":<br>";
                for($i = 1; $i <= $numero; $i++){
                    $factorial *= $i;
                    $salida .= ($i == 1) ? $i : " x ".$i;
            }
                $salida .= " = ".$factorial;
            }
            return $salida;
        }
        echo calcularFactoriarl($numero,$factorial);
    ?>
</body>
</html>