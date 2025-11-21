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
                <h5 class="mb-0">Ejercicio 13 - JSON</h5>
            </div>
            <div class="card-body">
                <?php

                $socios = [
                    [
                        'nombre' => 'Ana',
                        'apellidos' => 'García Pérez',
                        'edad' => 28,
                    ],
                    [
                        'nombre' => 'Luis',
                        'apellidos' => 'Martínez López',
                        'edad' => 34,
                    ],
                    [
                        'nombre' => 'María',
                        'apellidos' => 'Sánchez Ruiz',
                        'edad' => 22,
                    ],
                ];

                echo '<h6>Array asociativo original</h6>';
                echo '<pre>';
                print_r($socios);
                echo '</pre>';

                $jsonSocios = json_encode($socios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                echo '<h6>Array convertido a JSON (json_encode)</h6>';
                echo '<pre>' . htmlspecialchars($jsonSocios, ENT_QUOTES, 'UTF-8') . '</pre>';

                $decodedAssoc = json_decode($jsonSocios, true);
                echo '<h6>JSON decodificado a array asociativo (json_decode(..., true))</h6>';
                echo '<pre>';
                print_r($decodedAssoc);
                echo '</pre>';

                $decodedObj = json_decode($jsonSocios);
                echo '<h6>JSON decodificado a objeto stdClass (json_decode)</h6>';
                echo '<pre>';
                var_dump($decodedObj);
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