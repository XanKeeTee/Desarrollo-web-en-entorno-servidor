<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 ">Ejercicio 15</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" id="formulario">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Dividendo</label>
                                <input type="number" class="form-control" name="dividendo" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Divisor</label>
                                <input type="number" class="form-control" name="divisor" required>
                            </div>
                            <div class="mb-3">
                                    <input class="form-check-input" type="checkbox" name="cociente" value="1" id="check-cociente">
                                    <label class="form-check-label" for="check-cociente">
                                        Calcular Cociente
                                    </label>
                            </div>
                            <div class="mb-3">
                                <input class="form-check-input" type="checkbox" name="resto" value="1" id="check-resto">
                                <label class="form-check-label" for="check-resto">
                                    Calcular Resto
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                            <?php
                            $dividendo = isset($_POST['dividendo']) ? $_POST['dividendo'] : '';
                            $divisor = isset($_POST['divisor']) ? $_POST['divisor'] : '';
                            
                            $quiereResto = isset($_POST['resto']);
                            $quiereCociente = isset($_POST['cociente']);
                            ?>
                            <?php
                                if (!$quiereResto && !$quiereCociente) {
                                    echo '<div class="alert alert-warning">No has seleccionado ninguna operación (Cociente o Resto).</div>';
                                }

                                if ($quiereCociente) {
                                    $cociente = intdiv($dividendo, $divisor);
                                    echo  "<p>El <b>cociente</b> de $dividendo / $divisor es: <b>$cociente</b></p>";
                                }

                                if ($quiereResto) {
                                    $resto = $dividendo % $divisor;
                                    echo "<p>El <b>resto</b> de $dividendo / $divisor es: <b>$resto</b></p>";
                                }
                            ?>
                            <?php endif ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>