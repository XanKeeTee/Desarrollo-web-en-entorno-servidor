<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 11 - srdClass</h5>
            </div>
            <div class="card-body">
                <?php

                $moduloDWES = new stdClass();
                $moduloDWES->modulo = 'Desarrollo Web en Entorno Servidor';
                $moduloDWES->acronimo = 'DWES';
                $moduloDWES->curso = 2;
                $moduloDWES->descripcion = 'Fundamentos de PHP, servidor, sesiones, bases de datos y práctica.';
                $moduloDWES->teacher = 'Nombre del Profesor';

                echo '<h5>Objeto stdClass original</h5>';
                echo '<pre>';
                var_dump($moduloDWES);
                echo '</pre>';

                $arrayModulo = (array) $moduloDWES;
                echo '<h5>Convertido a array (casting con (array))</h5>';
                echo '<pre>';
                print_r($arrayModulo);
                echo '</pre>';

                $objFromArray = (object) $arrayModulo;
                echo '<h5>Array convertido de nuevo a objeto (casting con (object))</h5>';
                echo '<pre>';
                var_dump($objFromArray);
                echo '</pre>';

                // --- Serialización y deserialización ---
                // Serializar el objeto original
                $serializedObj = serialize($moduloDWES);
                echo '<h5>Objeto serializado (serialize)</h5>';
                echo '<pre>' . htmlspecialchars($serializedObj, ENT_QUOTES, 'UTF-8') . '</pre>';

                // Deserializar a objeto
                $unserializedObj = unserialize($serializedObj);
                echo '<h5>Objeto deserializado (unserialize)</h5>';
                echo '<pre>';
                var_dump($unserializedObj);
                echo '</pre>';

                // Serializar el array
                $serializedArr = serialize($arrayModulo);
                echo '<h5>Array serializado (serialize)</h5>';
                echo '<pre>' . htmlspecialchars($serializedArr, ENT_QUOTES, 'UTF-8') . '</pre>';

                // Deserializar a array (unserialize devuelve array u objeto según lo serializado)
                $unserializedArr = unserialize($serializedArr);
                echo '<h5>Array deserializado (unserialize)</h5>';
                echo '<pre>';
                var_dump($unserializedArr);
                echo '</pre>';
                ?>
            </div>
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>