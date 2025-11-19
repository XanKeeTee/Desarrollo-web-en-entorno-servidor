<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 14 - Funciones anónimas</h5>
            </div>
            <div class="card-body">
                <p>Introduce un radio (real positivo) y se calculará la longitud, el área y el volumen.</p>
                <form method="POST">
                    <div class="mb-3">
                        <label for="radio" class="form-label">Radio</label>
                        <input type="number" step="any" min="0" class="form-control" id="radio" name="radio" required value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>

                <div class="mt-4">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['radio'])) {
                        $r = filter_var($_POST['radio'], FILTER_VALIDATE_FLOAT);
                        if ($r === false || $r <= 0) {
                            echo '<div class="alert alert-danger" role="alert">Valor de radio no válido. Introduce un número real positivo.</div>';
                        } else {
                            $circunferencia = function ($n) { return 2 * pi() * $n; };
                            $circulo = function ($n) { return pi() * ($n ** 2); };
                            $esfera = function ($n) { return (4 / 3) * pi() * ($n ** 3); };

                            $long = $circunferencia($r);
                            $area = $circulo($r);
                            $vol = $esfera($r);

                            echo '<div class="alert alert-primary" role="alert">';
                            echo '<strong>Longitud (circunferencia):</strong> ' . htmlspecialchars(number_format($long, 6)) . ' unidades';
                            echo '</div>';

                            echo '<div class="alert alert-success" role="alert">';
                            echo '<strong>Área (círculo):</strong> ' . htmlspecialchars(number_format($area, 6)) . ' unidades²';
                            echo '</div>';

                            echo '<div class="alert alert-info" role="alert">';
                            echo '<strong>Volumen (esfera):</strong> ' . htmlspecialchars(number_format($vol, 6)) . ' unidades³';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>