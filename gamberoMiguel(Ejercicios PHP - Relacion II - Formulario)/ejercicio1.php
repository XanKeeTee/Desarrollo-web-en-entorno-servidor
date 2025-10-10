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
        <!-- Usamos solo utilidades de Bootstrap; no CSS personalizado -->
    </head>
    <body class="bg-light">
        <div class="container">
                        <div class="card shadow mx-auto w-100" style="max-width:640px;border-radius:.75rem;">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Calculadora simple</h5>
                                <small>Ejercicio 1</small>
                            </div>

                            <div class="card-body p-3">
                                        <form action="" method="post" class="row g-3">
                                            <div class="col-12">
                                                <input class="form-control form-control-lg" type="number" name="num1" required step="any" placeholder="Número 1" />
                                            </div>

                                                                            <div class="col-12 d-flex justify-content-center">
                                                                                <div class="btn-group" role="group" aria-label="Operadores">
                                                                    <input type="radio" class="btn-check" name="operador" id="op-add" value="+" autocomplete="off" checked>
                                                                    <label class="btn btn-outline-primary px-3" for="op-add">+</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-sub" value="-" autocomplete="off">
                                                                    <label class="btn btn-outline-primary px-3" for="op-sub">-</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-mul" value="*" autocomplete="off">
                                                                    <label class="btn btn-outline-primary px-3" for="op-mul">×</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-div" value="/" autocomplete="off">
                                                                    <label class="btn btn-outline-primary px-3" for="op-div">÷</label>

                                                                    <input type="radio" class="btn-check" name="operador" id="op-mod" value="%" autocomplete="off">
                                                                    <label class="btn btn-outline-primary px-3" for="op-mod">%</label>
                                                                </div>
                                                            </div>

                                            <div class="col-12">
                                                <input class="form-control form-control-lg" type="number" name="num2" required step="any" placeholder="Número 2" />
                                            </div>

                                                            <div class="col-12 text-center mt-2">
                                                                <button type="submit" class="btn btn-primary btn-lg w-100 w-sm-auto">Calcular</button>
                                                            </div>
                                        </form>

                    <?php
                    if (
                        $_SERVER['REQUEST_METHOD'] === 'POST' &&
                        isset($_POST['num1'], $_POST['num2'], $_POST['operador'])
                    ) {
                        $num1 = (float) $_POST['num1'];
                        $num2 = (float) $_POST['num2'];
                        $operador = $_POST['operador'];
                        $error = null;
                        $resultado = null;

                        switch ($operador) {
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
                                    $error = 'Error: División por cero no permitida.';
                                } else {
                                    $resultado = $num1 / $num2;
                                }
                                break;
                            case '%':
                                if ($num2 == 0) {
                                    $error = 'Error: Módulo por cero no permitido.';
                                } else {
                                    $resultado = $num1 % $num2;
                                }
                                break;
                            default:
                                $error = 'Operador no válido.';
                        }

                        if ($error) {
                            echo '<div class="alert alert-danger mt-3" role="alert">'.htmlspecialchars($error).'</div>';
                        } else {
                            $expr = htmlspecialchars($num1).' '.htmlspecialchars($operador).' '.htmlspecialchars($num2);
                            echo '<div class="alert alert-success mt-3" role="alert">'
                                .'<div class="result-box">Resultado: '. $expr .' = '. htmlspecialchars($resultado) .'</div>'
                                .'</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    </body>
</html>