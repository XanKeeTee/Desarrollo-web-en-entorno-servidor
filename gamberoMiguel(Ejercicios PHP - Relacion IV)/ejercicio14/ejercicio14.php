<?php
session_start();

// Si el carrito no existe en la sesión, lo inicializamos como un array vacío.
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si se envía el formulario, añadimos el nuevo artículo al carrito en la sesión.
if (isset($_POST['submit'])) {
    $nuevoArticulo = [
        'codigo' => trim($_POST['codigo'] ?? ''),
        'nombre' => trim($_POST['nombre'] ?? ''),
        'unidades' => (int)($_POST['unidades'] ?? 0),
    ];
    $_SESSION['carrito'][] = $nuevoArticulo;
}

// Codificamos el carrito de la sesión a JSON y lo guardamos en una cookie.
// La cookie se actualizará en cada recarga de la página.
$jsonCarrito = json_encode($_SESSION['carrito'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
setcookie('carrito', $jsonCarrito, 0, "/"); // 0 = expira al cerrar el navegador.
?>
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
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 14 - Tienda Online</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <h6 class="mb-3">Añadir Artículo al Carrito</h6>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Introduce el codigo del articulo:</label>
                        <input class="form-control" name="codigo" id="codigo" required value="COD-<?php echo count($_SESSION['carrito']) + 1; ?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Introduce el nombre del articulo:</label>
                        <input class="form-control" name="nombre" id="nombre" required></input>
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Introduce la cantidad del articulo:</label>
                        <input type="number" class="form-control" name="unidades" id="unidades" required min="1" value="1"></input>
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">Añadir</button>
                </form>

                <?php if (!empty($_SESSION['carrito'])) : ?>
                    <hr>
                    <h6 class="mt-4">Contenido del Carrito Actual</h6>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Unidades</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['carrito'] as $item) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['codigo']); ?></td>
                                    <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($item['unidades']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h6 class="mt-4">Carrito en formato JSON (guardado en la cookie)</h6>
                    <pre class="bg-light p-3 rounded"><code><?php echo htmlspecialchars($jsonCarrito); ?></code></pre>
                    <a href="./action.php" class="btn btn-primary mt-3">Ver Contenido de la Cookie en otra página</a>
                <?php endif; ?>
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