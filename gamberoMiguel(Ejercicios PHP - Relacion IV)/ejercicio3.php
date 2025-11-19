<?php
// Inicializamos las variables
$mensaje = "";
$numeroSecreto = null;
$juegoTerminado = false;

// Lógica del juego
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['adivinar'])) {
    // --- SEGUNDA CARGA O POSTERIORES (El usuario ha enviado un número) ---

    // Recuperamos el número secreto del campo oculto y el número del usuario
    $numeroSecreto = filter_input(INPUT_GET, 'numeroSecreto', FILTER_VALIDATE_INT);
    $numeroUsuario = filter_input(INPUT_GET, 'numero', FILTER_VALIDATE_INT);

    if ($numeroUsuario !== false && $numeroSecreto !== false) {
        if ($numeroUsuario > $numeroSecreto) {
            $mensaje = "El numero que has puesto es MAYOR al numero aleatorio";
        } elseif ($numeroUsuario < $numeroSecreto) {
            $mensaje = "El numero que has puesto es MENOR al numero aleatorio";
        } else {
            $mensaje = "¡ENHORABUENA! Has acertado el número secreto: " . $numeroSecreto;
            $juegoTerminado = true;
        }
    } else {
        $mensaje = "Por favor, introduce un número válido.";
    }
} else {
    $numeroSecreto = random_int(1, 100);
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 3 - Adivina el Número (sin sesiones)</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 3</h5>
            </div>
            <div class="card-body">
                <?php if (!$juegoTerminado) : ?>
                    <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mb-3">
                        <input type="hidden" name="numeroSecreto" value="<?php echo $numeroSecreto; ?>">

                        <label for="numero" class="form-label">Introduce un numero</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="numero" id="numero" required autofocus>
                            <button type="submit" name="adivinar" class="btn btn-primary">Adivinar</button>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($mensaje) : ?>
                    <div class="alert <?php echo $juegoTerminado ? 'alert-success' : 'alert-info'; ?> text-center" role="alert">
                        <?php echo htmlspecialchars($mensaje); ?>
                    </div>
                <?php endif; ?>

                <?php if ($juegoTerminado) : ?>
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary">Jugar de Nuevo</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

