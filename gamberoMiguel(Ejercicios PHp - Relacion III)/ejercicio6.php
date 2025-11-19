<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 6 - Simulación de Dados</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 6 - Simulación de Lanzamiento de Dados</h5>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="num_tiradas" class="form-label">Número de Tiradas</label>
                        <input type="number" class="form-control" name="num_tiradas" id="num_tiradas" min="1" required value="<?php echo isset($_POST['num_tiradas']) ? htmlspecialchars($_POST['num_tiradas']) : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simular Lanzamientos</button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $numTiradas = isset($_POST['num_tiradas']) ? (int)$_POST['num_tiradas'] : 0;

                    if ($numTiradas > 0) {
                        $frecuenciasNormal = array_fill(1, 6, 0);
                        $frecuenciasTrucado = array_fill(1, 6, 0);

                        for ($i = 0; $i < $numTiradas; $i++) {
                            $lanzamiento = random_int(1, 6);
                            $frecuenciasNormal[$lanzamiento]++;
                        }

                        $dadoTrucadoPonderado = [1, 2, 3, 4, 5, 6, 6, 6];
                        for ($i = 0; $i < $numTiradas; $i++) {
                            $indiceAleatorio = random_int(0, 7); 
                            $lanzamiento = $dadoTrucadoPonderado[$indiceAleatorio];
                            $frecuenciasTrucado[$lanzamiento]++;
                        }

                        echo '<div class="mt-4">';
                        echo '<h4>Resultados para ' . number_format($numTiradas) . ' tiradas:</h4>';
                        echo '<div class="row mt-3">';

                        echo '<div class="col-md-6">';
                        echo '<h5>Dado Normal (Equiprobable)</h5>';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="table-light"><tr><th>Cara</th><th>Frecuencia</th></tr></thead>';
                        echo '<tbody>';
                        for ($cara = 1; $cara <= 6; $cara++) {
                            echo '<tr><td>' . $cara . '</td><td>' . number_format($frecuenciasNormal[$cara]) . '</td></tr>';
                        }
                        echo '</tbody></table>';
                        echo '</div>';

                        // Tabla para el dado trucado
                        echo '<div class="col-md-6">';
                        echo '<h5>Dado Trucado (6 es 3x más probable)</h5>';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="table-light"><tr><th>Cara</th><th>Frecuencia</th></tr></thead>';
                        echo '<tbody>';
                        for ($cara = 1; $cara <= 6; $cara++) {
                            echo '<tr><td>' . $cara . '</td><td>' . number_format($frecuenciasTrucado[$cara]) . '</td></tr>';
                        }
                        echo '</tbody></table>';
                        echo '</div>';

                        echo '</div>';
                        echo '</div>'; 
                    } else {
                        echo '<div class="alert alert-warning mt-3">Por favor, introduce un número de tiradas válido (mayor que cero).</div>';
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>