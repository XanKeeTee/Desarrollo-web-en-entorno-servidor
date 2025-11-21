<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6 - Restaurante Mejorado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio6</h5>
            </div>
            <div class="card-body">
                <?php

                class Restaurante
                {
                    private static int $numeroRest = 0;
                    private array $ratings;

                    public function __construct(
                        private string $nombre,
                        private string $tipoCocina
                    ) {
                        $this->ratings = [];
                        self::$numeroRest++;
                    }

                    public function __destruct(){}

                    public function getNombre():string
                    {
                        return $this->nombre;
                    }

                    public function getTipoCocina(): string
                    {
                        return $this->tipoCocina;
                    }

                    public function getRatings(): array
                    {
                        return $this->ratings;
                    }
                    public function setNombre(string $nombre): void
                    {
                        $this->nombre = $nombre;
                    }

                    public function setTipoCocina(string $tipoCocina): void
                    {
                        $this->tipoCocina = $tipoCocina;
                    }

                    public function setRatings(array $ratings): void
                    {
                        $this->ratings = [];
                        $this->anadirOtrosRatings($ratings);
                    }

                    public function anadirRating(int $rating): void
                    {
                        if ($rating >= 1 && $rating <= 5) {
                            $this->ratings[] = $rating;
                        }
                    }

                    public function anadirOtrosRatings(array $nuevosRatings): void
                    {
                        foreach ($nuevosRatings as $rating) {
                            $this->anadirRating($rating);
                        }
                    }

                    public function obtenerNumeroRatings(): int
                    {
                        return count($this->getRatings());
                    }

                    public function calcularRatingMedio(): float
                    {
                        $numRatings = $this->obtenerNumeroRatings();
                        if ($numRatings > 0) {
                            return array_sum($this->getRatings()) / $numRatings;
                        }
                        return 0;
                    }

                    public static function totalRests(): int
                    {
                        return self::$numeroRest;
                    }

                    public function __toString(): string
                    {
                        $output = "<div class='border p-3 mb-3 rounded shadow-sm'>";
                        $output .= "<h4>{$this->getNombre()}</h4>";
                        $output .= "<p><strong>Tipo de cocina:</strong> {$this->getTipoCocina()}</p>";
                        $output .= "<p><strong>Valoraciones:</strong> " . ($this->obtenerNumeroRatings() > 0 ? implode(', ', $this->getRatings()) : "Sin valoraciones") . "</p>";
                        $output .= "<p><strong>Rating Medio:</strong> " . number_format($this->calcularRatingMedio(), 2) . " / 5</p>";
                        $output .= "</div>";
                        return $output;
                    }
                }

                $restaurante1 = new Restaurante("El buen yantar", "Cocina Mediterránea");
                $restaurante1->anadirOtrosRatings([5, 4, 3, 5, 2, 7]); 
                echo $restaurante1;

                $restaurante2 = new Restaurante("La Trattoria", "Italiana");
                $restaurante2->setRatings([5, 5, 4]);
                $restaurante2->setNombre("Trattoria della Nonna");
                echo $restaurante2;

                echo "<div class='alert alert-info'>Total de restaurantes creados: <strong>" . Restaurante::totalRests() . "</strong></div>";

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>