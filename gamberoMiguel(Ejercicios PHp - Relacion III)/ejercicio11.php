<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 11 - Intercambio y Inversión</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 11 - Función Swap e Invertir Array</h5>
            </div>
            <div class="card-body">
                <?php
                function swap(&$n1, &$n2)
                {
                    $temp = $n1;
                    $n1 = $n2;
                    $n2 = $temp;
                }

                function invertirArray(&$array)
                {
                    $longitud = count($array);
                    for ($i = 0; $i < $longitud / 2; $i++) {
                        swap($array[$i], $array[$longitud - 1 - $i]);
                    }
                }

                $miArray = [1, 2, 3, 4, 5];
                echo '<p>Array original: <code>[' . implode(', ', $miArray) . ']</code></p>';
                
                invertirArray($miArray);
                echo '<p>Array después de invertirArray(): <code>[' . implode(', ', $miArray) . ']</code></p>';
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>