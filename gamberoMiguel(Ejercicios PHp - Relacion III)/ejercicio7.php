<!doctype html>
<html lang="es">
<head>
    <title>Ejercicio 7 - Funciones de Fecha y Hora (Simplificado)</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 7 - Práctica con Fechas</h5>
            </div>
            <div class="card-body">
                <?php
                date_default_timezone_set('Europe/Madrid');

                function getDiaSemanaEspanol($numeroDia) {
                    $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                    return $dias[$numeroDia];
                }

                function getMesEspanol($numeroMes) {
                    $meses = [
                        1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
                        5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
                        9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
                    ];
                    return $meses[$numeroMes];
                }

                $timestamp_actual = time();
                $fecha_actual = date('d-m-Y H:i:s', $timestamp_actual);

                $diaNumero = date('w', $timestamp_actual);
                $mesNumero = date('n', $timestamp_actual);
                $dia_actual = date('d', $timestamp_actual);
                $ano_actual = date('Y', $timestamp_actual);

                $diaEspanol = getDiaSemanaEspanol($diaNumero);
                $mesEspanol = getMesEspanol($mesNumero);
                $fechaLargaEspanol = "$diaEspanol, $dia_actual de $mesEspanol de $ano_actual";
                ?>

                <h6 class="text-muted">Fecha Actual</h6>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Fecha y Hora:</strong> <?php echo $fecha_actual; ?></li>
                    <li class="list-group-item"><strong>Fecha en formato largo (Español):</strong> <?php echo $fechaLargaEspanol; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>