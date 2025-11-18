<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 8 - Mayúsculas y Minúsculas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Versión 1: Mayúsculas y/o Minúsculas (Checkboxes)</h5>
            </div>
            <div class="card-body">
                <form method="POST" id="formCheckboxes">
                    <div class="mb-3">
                        <label for="texto1" class="form-label">Introduce un texto:</label>
                        <textarea class="form-control" name="texto1" id="texto1" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="opciones1[]" value="mayus" id="mayus1">
                            <label class="form-check-label" for="mayus1">Convertir a Mayúsculas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="opciones1[]" value="minus" id="minus1">
                            <label class="form-check-label" for="minus1">Convertir a Minúsculas</label>
                        </div>
                        <div id="errorCheckboxes" class="text-danger mt-2 small"></div>
                    </div>
                    <button type="submit" name="submit1" class="btn btn-primary">Transformar</button>
                </form>

                <?php
                if (isset($_POST['submit1'])) {
                    $texto = htmlspecialchars($_POST['texto1']);
                    $opciones = $_POST['opciones1'] ?? [];
                    echo '<div class="alert alert-info mt-3">';
                    echo '<h6 class="alert-heading">Texto Original:</h6><p>' . $texto . '</p><hr>';
                    if (in_array('mayus', $opciones)) {
                        echo '<h6>En Mayúsculas:</h6><p>' . strtoupper($texto) . '</p>';
                    }
                    if (in_array('minus', $opciones)) {
                        echo '<h6>En Minúsculas:</h6><p>' . strtolower($texto) . '</p>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Versión 2: Mayúsculas o Minúsculas (Radio Buttons)</h5>
            </div>
            <div class="card-body">
                <form method="POST" id="formRadios">
                    <div class="mb-3">
                        <label for="texto2" class="form-label">Introduce un texto:</label>
                        <textarea class="form-control" name="texto2" id="texto2" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcion2" value="mayus" id="mayus2">
                            <label class="form-check-label" for="mayus2">Convertir a Mayúsculas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="opcion2" value="minus" id="minus2">
                            <label class="form-check-label" for="minus2">Convertir a Minúsculas</label>
                        </div>
                        <div id="errorRadios" class="text-danger mt-2 small"></div>
                    </div>
                    <button type="submit" name="submit2" class="btn btn-secondary">Transformar</button>
                </form>

                <?php
                if (isset($_POST['submit2'])) {
                    $texto = htmlspecialchars($_POST['texto2']);
                    $opcion = $_POST['opcion2'] ?? '';
                    echo '<div class="alert alert-info mt-3">';
                    echo '<h6 class="alert-heading">Texto Original:</h6><p>' . $texto . '</p><hr>';
                    if ($opcion === 'mayus') {
                        echo '<h6>Resultado:</h6><p>' . strtoupper($texto) . '</p>';
                    } elseif ($opcion === 'minus') {
                        echo '<h6>Resultado:</h6><p>' . strtolower($texto) . '</p>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formCheckboxes = document.getElementById('formCheckboxes');
            const errorCheckboxes = document.getElementById('errorCheckboxes');

            formCheckboxes.addEventListener('submit', function(e) {
                const checkboxes = formCheckboxes.querySelectorAll('input[type="checkbox"]:checked');
                if (checkboxes.length === 0) {
                    e.preventDefault();
                    errorCheckboxes.textContent = 'Por favor, selecciona al menos una opción.';
                } else {
                    errorCheckboxes.textContent = '';
                }
            });

            const formRadios = document.getElementById('formRadios');
            const errorRadios = document.getElementById('errorRadios');

            formRadios.addEventListener('submit', function(e) {
                const radio = formRadios.querySelector('input[type="radio"]:checked');
                if (!radio) {
                    e.preventDefault();
                    errorRadios.textContent = 'Por favor, selecciona una opción.';
                } else {
                    errorRadios.textContent = '';
                }
            });
        });
    </script>
</body>

</html>