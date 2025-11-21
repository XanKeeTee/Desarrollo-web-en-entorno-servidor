<?php
declare(strict_types=1);


require_once __DIR__ . '/Matematicas.php';
require_once __DIR__ . '/Geometria.php';

use App\Utilidades\Matematicas;
use App\Utilidades\Geometria;

$suma = Matematicas::sumar(10, 5);
$radio = 10;
$area = Geometria::areaCirculo($radio);

?>
<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 16 - Namespaces y Require</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 16 - Namespaces y Require</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <p>Se han cargado dos clases (<code>Matematicas</code> y <code>Geometria</code>) desde archivos separados usando <code>require_once</code>.</p>
                    <p>Ambas clases están organizadas bajo el namespace <code>App\Utilidades</code> para evitar conflictos y se importan con la sentencia <code>use</code>.</p>
                </div>

                <h6>Resultados de las operaciones:</h6>
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>Suma (Matematicas::sumar(10, 5)):</strong> <?php echo htmlspecialchars((string)$suma); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Área del círculo (Geometria::areaCirculo(<?php echo $radio; ?>)):</strong> <?php echo htmlspecialchars((string)$area); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Constante PI de Geometria:</strong> <?php echo htmlspecialchars((string)Geometria::PI); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>