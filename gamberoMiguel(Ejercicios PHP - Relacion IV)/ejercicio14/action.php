<!doctype html>
<html lang="en">

<head>
    <title>Destino Carrito</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Ejercicio 14 - Carrito Recuperado (Paso 2)</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_COOKIE['carrito'])) {
                    $jsonCarrito = $_COOKIE['carrito'];

                    $carritoArray = json_decode($jsonCarrito, true);

                    $carritoObjeto = json_decode($jsonCarrito);

                    echo '<h6>Contenido de la Cookie (JSON crudo)</h6>';
                    echo '<pre class="bg-light p-3 rounded"><code>' . htmlspecialchars($jsonCarrito) . '</code></pre>';

                    echo '<hr>';

                    echo '<h6>JSON decodificado como Array Asociativo</h6>';
                    echo '<pre class="bg-light p-3 rounded">';
                    print_r($carritoArray);
                    echo '</pre>';

                    echo '<hr>';

                    echo '<h6>JSON decodificado como Objeto stdClass</h6>';
                    echo '<pre class="bg-light p-3 rounded">';
                    print_r($carritoObjeto);
                    echo '</pre>';

                    // Ejemplo de cómo acceder a los datos del objeto
                    if (!empty($carritoObjeto)) {
                        echo '<div class="alert alert-info mt-3">Ejemplo de acceso a datos del primer artículo (como objeto):<br>';
                        echo '<strong>Nombre:</strong> ' . htmlspecialchars($carritoObjeto[0]->nombre) . '<br>';
                        echo '<strong>Unidades:</strong> ' . htmlspecialchars($carritoObjeto[0]->unidades);
                        echo '</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">No se encontró la cookie "carrito". Por favor, vuelve a la página anterior y añade al menos un artículo.</div>';
                }
                ?>
                <a href="ejercicio14.php" class="btn btn-secondary mt-3">Volver a la tienda</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>