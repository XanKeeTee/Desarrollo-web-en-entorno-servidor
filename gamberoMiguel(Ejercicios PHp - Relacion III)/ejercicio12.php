<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Ejercicio 12 - Invertir</h5>
            </div>
            <div class="card-body">
                <?php
                function bubbleSort(array &$arr): void{
                    $n = count($arr);
                    for ($i = 0; $i < $n - 1; $i++) {
                        for ($j = 0; $j < $n - $i - 1; $j++) {
                            if ($arr[$j] > $arr[$j + 1]) {
                                $temp = $arr[$j];
                                $arr[$j] = $arr[$j + 1];
                                $arr[$j + 1] = $temp;
                            }
                        }
                    }
                }
                $datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruíz','Díaz'];
                bubbleSort($datos);
                echo '<p>Salida de datos: ',${$datos},'</p>';
                ?>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>