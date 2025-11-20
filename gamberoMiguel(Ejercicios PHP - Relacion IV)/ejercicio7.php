<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7 - Banderas de Franjas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .bandera {
            border: 1px solid #ccc;
            height: 120px;
            width: 200px;
            display: flex;
        }

        .bandera-h {
            flex-direction: column;
        }

        .bandera-v {
            flex-direction: row;
        }

        .franja {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            font-weight: bold;
            text-shadow: 0 0 2px white, 0 0 2px white, 0 0 2px white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Ejercicio 7</h1>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Clase Bandera de Franjas</h5>
            </div>
            <div class="card-body">
                <?php

                class BanderaFranjas
                {
                    public function __construct(
                        private string $orientacion,
                        private array $colores,
                        private string $adscripcion = "sin adscripción"
                    ) {
                        if ($this->orientacion !== 'horizontal' && $this->orientacion !== 'vertical') {
                            $this->orientacion = 'horizontal';
                        }
                    }

                    public function __destruct()
                    {
                    }

                    public function mostrar(): void
                    {
                        $orientacionClase = $this->orientacion === 'horizontal' ? 'bandera-h' : 'bandera-v';
                        echo "<h5>{$this->adscripcion}</h5>";
                        echo "<div class='bandera $orientacionClase mb-3'>";
                        foreach ($this->colores as $color) {
                            echo "<div class='franja' style='background-color: {$color};'></div>";
                        }
                        echo "</div>";
                    }

                    public function sonIdenticas(BanderaFranjas $otraBandera): bool
                    {
                        return $this->orientacion === $otraBandera->orientacion && $this->colores === $otraBandera->colores;
                    }

                    public function mismasFranjasDiferenteOrientacion(BanderaFranjas $otraBandera): bool
                    {
                        return $this->orientacion !== $otraBandera->orientacion && $this->colores === $otraBandera->colores;
                    }

                    public function invertirColores(): void
                    {
                        $this->colores = array_reverse($this->colores);
                    }

                    public function invertirOrientacion(): void
                    {
                        $this->orientacion = ($this->orientacion === 'horizontal') ? 'vertical' : 'horizontal';
                    }
                }

                echo "<h6>Banderas Originales:</h6>";
                $banderaEspana = new BanderaFranjas('horizontal', ['red', 'yellow', 'red'], 'España');
                $banderaFrancia = new BanderaFranjas('vertical', ['blue', 'white', 'red'], 'Francia');
                $banderaFranciaCopia = new BanderaFranjas('vertical', ['blue', 'white', 'red'], 'Copia de Francia');

                $banderaEspana->mostrar();
                $banderaFrancia->mostrar();

                echo "<hr><h6>Resultados de las comparaciones:</h6>";
                if ($banderaFrancia->sonIdenticas($banderaFranciaCopia)) {
                    echo "<p class='text-success'>La bandera de Francia y su copia son idénticas.</p>";
                } else {
                    echo "<p class='text-danger'>Error: La bandera de Francia y su copia deberían ser idénticas.</p>";
                }

                if ($banderaEspana->sonIdenticas($banderaFrancia)) {
                    echo "<p class='text-danger'>Error: La bandera de España y Francia no deberían ser idénticas.</p>";
                } else {
                    echo "<p class='text-success'>La bandera de España y Francia no son idénticas.</p>";
                }

                echo "<hr><h6>Pruebas de inversión:</h6>";
                echo "<p>Invirtiendo colores y orientación de la bandera de España...</p>";
                $banderaEspana->invertirColores();
                $banderaEspana->invertirOrientacion();
                $banderaEspana->mostrar();

                $banderaFranciaInvertida = new BanderaFranjas('horizontal', ['blue', 'white', 'red'], 'Francia Horizontal');
                echo "<hr><h6>Comparación de franjas con diferente orientación:</h6>";
                $banderaFranciaInvertida->mostrar();
                if ($banderaFrancia->mismasFranjasDiferenteOrientacion($banderaFranciaInvertida)) {
                    echo "<p class='text-success'>La bandera de Francia y su versión horizontal tienen las mismas franjas.</p>";
                } else {
                    echo "<p class='text-danger'>Error en la lógica de comparación de franjas.</p>";
                }

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>