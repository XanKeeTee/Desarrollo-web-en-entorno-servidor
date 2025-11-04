<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 ">Ejercicio 14</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method ="POST">
                    <div class="mb-3">
                        <label for="range4" class="form-label">Nota: </label>
                        <input type="range" class="form-range" min="0" max="10" value="5" id="range4" name="range4">
                        <output for="range4" id="rangeValue" aria-hidden="true"></output>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                        <div class="mt-3">
                            <?php
                                // Mostrar resultado solo si se ha enviado el formulario
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    // Convertir a entero de forma segura
                                    $nota = isset($_POST['range4']) ? intval($_POST['range4']) : null;
                                    if (is_int($nota) && $nota >= 0 && $nota <= 10) {
                                        switch ($nota) {
                                            case 9:
                                            case 10:
                                                echo "Sobresaliente";
                                                break;
                                            case 7:
                                            case 8:
                                                echo "Notable";
                                                break;
                                            case 6:
                                                echo "Bien";
                                                break;
                                            case 5:
                                                echo "Suficiente";
                                                break;
                                            case 0:
                                            case 1:
                                            case 2:
                                            case 3:
                                            case 4:
                                                echo "Suspenso";
                                                break;
                                        }
                                    } else {
                                        echo "La nota no es válida. Debe ser un número entero entre 0 y 10.";
                                    }
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const rangeInput = document.getElementById('range4');
        const rangeOutput = document.getElementById('rangeValue');

        rangeOutput.textContent = rangeInput.value;

        rangeInput.addEventListener('input', function() {
            rangeOutput.textContent = this.value;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>