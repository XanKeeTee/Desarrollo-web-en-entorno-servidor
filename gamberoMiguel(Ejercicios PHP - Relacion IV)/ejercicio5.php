<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Restaurante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Ejercicio 5</h1>
        <div class="card">
            <div class="card-body">
                <?php

                class Restaurante
                {
                    private string $nombre;
                    private string $tipoCocina;
                    private array $ratings;

                    public function __construct(string $nombre, string $tipoCocina)
                    {
                        $this->nombre = $nombre;
                        $this->tipoCocina = $tipoCocina;
                        $this->ratings = [];
                    }

                    public function __destruct() {}

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
                        return count($this->ratings);
                    }
                    public function calcularRatingMedio(): float
                    {
                        $numRatings = $this->obtenerNumeroRatings();
                        if ($numRatings > 0) {
                            return array_sum($this->ratings) / $numRatings;
                        }
                        return 0;
                    }
                    public function __toString(): string
                    {
                        $output = "<div class='border p-3 mb-3'>";
                        $output .= "<h4>{$this->nombre}</h4>";
                        $output .= "<p><strong>Tipo de cocina:</strong> {$this->tipoCocina}</p>";
                        $output .= "<p><strong>Valoraciones:</strong> " . ($this->obtenerNumeroRatings() > 0 ? implode(', ', $this->ratings) : "Sin valoraciones") . "</p>";
                        $output .= "<p><strong>Rating Medio:</strong> " . number_format($this->calcularRatingMedio(), 2) . " / 5</p>";
                        $output .= "</div>";
                        return $output;
                    }
                }

                $miRestaurante = new Restaurante("El buen yantar", "Cocina Mediterránea");

                $miRestaurante->anadirRating(5);
                $miRestaurante->anadirRating(4);
                $miRestaurante->anadirOtrosRatings([3, 5, 2, 7]);

                echo $miRestaurante;

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>