<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 19 - Generador de Menús (Ponderado)</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Generador de Sugerencias de Menú (Ponderado)</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="num_menus" class="form-label">Número de menús a generar:</label>
                        <input type="number" class="form-control" name="num_menus" id="num_menus" min="1" required value="<?php echo isset($_POST['num_menus']) ? htmlspecialchars($_POST['num_menus']) : '1'; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Generar Sugerencias</button>
                </form>
            </div>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $menu = [
                'entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'],
                'primero' => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],
                'segundo' => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'],
                'postre' => ['Helado 3 sabores', 'Flan', 'Tarta de Queso']
            ];

            $imagenesPrimero = [
                'Gazpachuelo' => 'img/gazpachuelo.jpg',
                'Salmorejo' => 'img/salmorejo.jpg',
                'Ajo Blanco' => 'img/ajoblanco.jpg'
            ];

            $menuPonderado = [
                'entrante' => [$menu['entrante'][0], $menu['entrante'][1], $menu['entrante'][2], $menu['entrante'][2]],
                'primero' => [$menu['primero'][0], $menu['primero'][1], $menu['primero'][2], $menu['primero'][2]],
                'segundo' => [$menu['segundo'][0], $menu['segundo'][1], $menu['segundo'][2], $menu['segundo'][2]],
                'postre' => [$menu['postre'][0], $menu['postre'][1], $menu['postre'][2], $menu['postre'][2]]
            ];

            $numMenus = isset($_POST['num_menus']) ? (int)$_POST['num_menus'] : 0;

            if ($numMenus > 0) {
                echo '<div class="row">';
                for ($i = 1; $i <= $numMenus; $i++) {
                    $entranteSugerido = $menuPonderado['entrante'][array_rand($menuPonderado['entrante'])];
                    $primeroSugerido = $menuPonderado['primero'][array_rand($menuPonderado['primero'])];
                    $segundoSugerido = $menuPonderado['segundo'][array_rand($menuPonderado['segundo'])];
                    $postreSugerido = $menuPonderado['postre'][array_rand($menuPonderado['postre'])];

                    $imagenUrl = $imagenesPrimero[$primeroSugerido] ?? 'img/default.jpg';

                    echo '<div class="col-md-6 col-lg-4 mb-4">';
                    echo '  <div class="card h-100 shadow-sm">';
                    echo '      <img src="' . htmlspecialchars($imagenUrl) . '" class="card-img-top" alt="Imagen de ' . htmlspecialchars($primeroSugerido) . '" style="height: 200px; object-fit: cover;">';
                    echo '      <div class="card-header"><strong>Sugerencia de Menú #' . $i . '</strong></div>';
                    echo '      <div class="card-body">';
                    echo '          <p class="card-text"><strong>Entrante:</strong> ' . htmlspecialchars($entranteSugerido) . '</p>';
                    echo '          <p class="card-text"><strong>Primero:</strong> ' . htmlspecialchars($primeroSugerido) . '</p>';
                    echo '          <p class="card-text"><strong>Segundo:</strong> ' . htmlspecialchars($segundoSugerido) . '</p>';
                    echo '          <p class="card-text"><strong>Postre:</strong> ' . htmlspecialchars($postreSugerido) . '</p>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>