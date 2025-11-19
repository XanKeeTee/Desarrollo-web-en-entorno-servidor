<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 15 - Arrow functions y switch vs match</h5>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label for="radio" class="form-label">Radio</label>
                        <input type="number" step="any" min="0" class="form-control" id="radio" name="radio" required value="<?php echo isset($_POST['radio']) ? htmlspecialchars($_POST['radio']) : '' ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="op" class="form-label">Operación</label>
                        <select class="form-select" id="op" name="op">
                            <option value="todas">Todas</option>
                            <option value="circ">Longitud (circunferencia)</option>
                            <option value="area">Área (círculo)</option>
                            <option value="vol">Volumen (esfera)</option>
                        </select>
                    </div>
                    <div class="col-md-4 align-self-end">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </form>

                <div class="mt-4">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['radio'])) {
                        $r = filter_var($_POST['radio'], FILTER_VALIDATE_FLOAT);
                        $op = isset($_POST['op']) ? (string)$_POST['op'] : 'todas';
                        if ($r === false || $r <= 0) {
                            echo '<div class="alert alert-danger" role="alert">Introduce un radio válido (real positivo).</div>';
                        } else {
                            $circunferencia = fn($n) => 2 * pi() * $n;
                            $circulo = fn($n) => pi() * ($n ** 2);
                            $esfera = fn($n) => (4 / 3) * pi() * ($n ** 3);

                            $results = [];
                            if ($op === 'todas' || $op === 'circ') {
                                $results['circ'] = $circunferencia($r);
                            }
                            if ($op === 'todas' || $op === 'area') {
                                $results['area'] = $circulo($r);
                            }
                            if ($op === 'todas' || $op === 'vol') {
                                $results['vol'] = $esfera($r);
                            }

                            foreach ($results as $k => $v) {
                                if ($k === 'circ') {
                                    echo '<div class="alert alert-primary" role="alert">';
                                    echo '<strong>Longitud (circunferencia):</strong> ' . htmlspecialchars(number_format($v, 6));
                                    echo '</div>';
                                }
                                if ($k === 'area') {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo '<strong>Área (círculo):</strong> ' . htmlspecialchars(number_format($v, 6));
                                    echo '</div>';
                                }
                                if ($k === 'vol') {
                                    echo '<div class="alert alert-info" role="alert">';
                                    echo '<strong>Volumen (esfera):</strong> ' . htmlspecialchars(number_format($v, 6));
                                    echo '</div>';
                                }
                            }

                            $switch_msg = '';
                            switch ($op) {
                                case 'circ':
                                    $switch_msg = 'Switch: has elegido calcular la longitud.';
                                    break;
                                case 'area':
                                    $switch_msg = 'Switch: has elegido calcular el área.';
                                    break;
                                case 'vol':
                                    $switch_msg = 'Switch: has elegido calcular el volumen.';
                                    break;
                                default:
                                    $switch_msg = 'Switch: has elegido calcular todo.';
                            }

                            $match_msg = match($op) {
                                'circ' => 'Match: longitud seleccionada.',
                                'area' => 'Match: área seleccionada.',
                                'vol'  => 'Match: volumen seleccionado.',
                                default => 'Match: todas las operaciones.',
                            };

                            echo '<div class="alert alert-secondary" role="alert">' . htmlspecialchars($switch_msg) . '</div>';
                            echo '<div class="alert alert-dark" role="alert">' . htmlspecialchars($match_msg) . '</div>';
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