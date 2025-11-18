<?php
    require("ejercicio4.php");
    $num1 = '';
    $num2 = '';
    $error = '';
    $resultados = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = isset($_POST['num1']) ? $_POST['num1'] : '';
        $num2 = isset($_POST['num2']) ? $_POST['num2'] : '';

        // Validación simple
        if (!is_numeric($num1) || !is_numeric($num2)) {
            $error = 'Por favor, introduce dos números válidos.';
        } else {
            $num1_int = (int)$num1;
            $num2_int = (int)$num2;

            // MCD
            $resultados['mcd_iterativo'] = mcdIterativo($num1_int, $num2_int);
            $resultados['mcd_recursivo'] = mcdRecursivo($num1_int, $num2_int);

            // División Iterativa
            $div_it = divisionIterativa($num1_int, $num2_int);
            if (isset($div_it['error'])) {
                $resultados['div_iterativa'] = $div_it['error'];
            } else {
                $resultados['div_iterativa'] = "Cociente: {$div_it['cociente']}, Resto: {$div_it['resto']}";
            }

            // División Recursiva
            $div_rec = divisionRecursiva($num1_int, $num2_int);
            if (isset($div_rec['error'])) {
                $resultados['div_recursiva'] = $div_rec['error'];
            } else {
                $resultados['div_recursiva'] = "Cociente: {$div_rec['cociente']}, Resto: {$div_rec['resto']}";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCD y División - Ejercicio 3</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    />
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow mx-auto" style="max-width: 500px;">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Cálculo de MCD y División</h5>
                <small>Ejercicio 3</small>
            </div>
            <div class="card-body">
                <form action="" method="post" class="row g-3">
                    <div class="col-12">
                        <label for="num1" class="form-label">Número 1</label>
                        <input class="form-control" type="number" name="num1" id="num1" value="<?php echo htmlspecialchars($num1); ?>" required />
                    </div>
                    <div class="col-12">
                        <label for="num2" class="form-label">Número 2</label>
                        <input class="form-control" type="number" name="num2" id="num2" value="<?php echo htmlspecialchars($num2); ?>" required />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">Calcular</button>
                    </div>
                </form>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <?php echo htmlspecialchars($errores); ?>
                    </div>
                <?php elseif (!empty($resultados)): ?>
                    <div class="alert alert-success mt-4" role="alert">
                        <h6 class="alert-heading">Resultados:</h6>
                        <hr>
                        <p class="mb-1"><strong>MCD (Iterativo):</strong> <?php echo $resultados['mcd_iterativo']; ?></p>
                        <p class="mb-1"><strong>MCD (Recursivo):</strong> <?php echo $resultados['mcd_recursivo']; ?></p>
                        <p class="mb-1"><strong>División (Iterativa):</strong> <?php echo $resultados['div_iterativa']; ?></p>
                        <p class="mb-0"><strong>División (Recursiva):</strong> <?php echo $resultados['div_recursiva']; ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>