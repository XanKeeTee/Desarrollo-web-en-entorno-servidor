<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Calculadora - Ejercicio 1</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>
    <body class="bg-light">
        <?php
        // Inicializar variables para mostrar en el formulario
        $errors = [];
        $resultado = null;
        $num1_value = '';
        $num2_value = '';
        $operador_value = '+';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recoger valores crudos
            $num1_raw = isset($_POST['num1']) ? trim($_POST['num1']) : '';
            $num2_raw = isset($_POST['num2']) ? trim($_POST['num2']) : '';
            $operador_value = isset($_POST['operador']) ? $_POST['operador'] : '+';

            $num1_value = $num1_raw;
            $num2_value = $num2_raw;

            // Validaciones en servidor
            if ($num1_raw === '' || $num2_raw === '') {
                $errors[] = 'Por favor, completa todos los campos.';
            }
            if ($num1_raw !== '' && !is_numeric($num1_raw)) {
                $errors[] = 'Número 1 debe ser numérico.';
            }
            if ($num2_raw !== '' && !is_numeric($num2_raw)) {
                $errors[] = 'Número 2 debe ser numérico.';
            }

            // Si no hay errores de formato, convertir y operar
            if (empty($errors)) {
                $num1 = (float) $num1_raw;
                $num2 = (float) $num2_raw;

                switch ($operador_value) {
                    case '+':
                        $resultado = $num1 + $num2;
                        break;
                    case '-':
                        $resultado = $num1 - $num2;
                        break;
                    case '*':
                        $resultado = $num1 * $num2;
                        break;
                    case '/':
                        if ($num2 == 0) {
                            $errors[] = 'Error: División por cero no permitida.';
                        } else {
                            $resultado = $num1 / $num2;
                        }
                        break;
                    case '%':
                        if ($num2 == 0) {
                            $errors[] = 'Error: Módulo por cero no permitido.';
                        } else {
                            // Usar fmod para números no enteros
                            $resultado = fmod($num1, $num2);
                        }
                        break;
                    default:
                        $errors[] = 'Operador no válido.';
                }
            }
        }
        ?>

        <div class="container">
                        <div class="card shadow mx-auto w-100" style="max-width:640px;border-radius:.75rem;">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Calculadora simple</h5>
                                <small>Ejercicio 1</small>
                            </div>

                            <div class="card-body p-3">
                                        <form action="" method="post" class="row g-3" id="calculadoraForm">
                                            <div class="col-12">
                                                <input class="form-control form-control-lg" type="text" name="num1" id="num1" placeholder="Número 1" value="<?php echo htmlspecialchars($num1_value); ?>" />
                                            </div>

                                                                            <div class="col-12 d-flex justify-content-center">
                                                                                <div class="btn-group" role="group" aria-label="Operadores">
                                                                    <input type="radio" class="btn-check" name="operador" id="op-add" value="+" autocomplete="off" <?php echo $operador_value === '+' ? 'checked' : ''; ?> >
                                                                    <label class="btn btn-outline-primary px-3" for="op-add">+</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-sub" value="-" autocomplete="off" <?php echo $operador_value === '-' ? 'checked' : ''; ?> >
                                                                    <label class="btn btn-outline-primary px-3" for="op-sub">-</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-mul" value="*" autocomplete="off" <?php echo $operador_value === '*' ? 'checked' : ''; ?> >
                                                                    <label class="btn btn-outline-primary px-3" for="op-mul">×</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-div" value="/" autocomplete="off" <?php echo $operador_value === '/' ? 'checked' : ''; ?> >
                                                                    <label class="btn btn-outline-primary px-3" for="op-div">÷</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-mod" value="%" autocomplete="off" <?php echo $operador_value === '%' ? 'checked' : ''; ?> >
                                                                    <label class="btn btn-outline-primary px-3" for="op-mod">%</label>
                                                                </div>
                                                            </div>

                                            <div class="col-12">
                                                <input class="form-control form-control-lg" type="text" name="num2" id="num2" placeholder="Número 2" value="<?php echo htmlspecialchars($num2_value); ?>" />
                                            </div>

                                                            <div class="col-12 text-center mt-2">
                                                                <button type="submit" class="btn btn-primary btn-lg w-100 w-sm-auto">Calcular</button>
                                                            </div>
                                                            <div id="mensajeError" class="col-12 text-danger" style="display: none;"></div>
                                        </form>

                    <?php
                    // Mostrar errores y resultado calculado por el bloque PHP arriba
                    if (!empty($errors)) {
                        echo '<div class="alert alert-danger mt-3" role="alert"><ul class="mb-0">';
                        foreach ($errors as $e) {
                            echo '<li>'.htmlspecialchars($e).'</li>';
                        }
                        echo '</ul></div>';
                    } elseif ($resultado !== null) {
                        $expr = htmlspecialchars($num1_value).' '.htmlspecialchars($operador_value).' '.htmlspecialchars($num2_value);
                        echo '<div class="alert alert-success mt-3" role="alert">Resultado: '. $expr .' = '. htmlspecialchars($resultado) .'</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    </body>
</html>