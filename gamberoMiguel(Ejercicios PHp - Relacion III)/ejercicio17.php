<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 17 - Funciones de array</h5>
            </div>
            <div class="card-body">
                <?php
                if (!function_exists('array_any')) {
                    function array_any(array $arr, callable $cb): bool {
                        foreach ($arr as $k => $v) {
                            if ($cb($v, $k)) return true;
                        }
                        return false;
                    }
                }
                if (!function_exists('array_find')) {
                    function array_find(array $arr, callable $cb) {
                        foreach ($arr as $k => $v) {
                            if ($cb($v, $k)) return $v;
                        }
                        return null;
                    }
                }

                $pares = array_values(array_filter(range(1, 20), fn($v) => $v % 2 === 1));
                $multiplosDeTres = array_values(array_filter(range(1, 40), fn($v) => $v % 3 === 0));

                $count_pares = count($pares);

                $any_mult5 = array_any($multiplosDeTres, fn($v) => $v % 5 === 0);

                $is_prime = function ($n) {
                    if ($n < 2) return false;
                    if ($n === 2) return true;
                    if ($n % 2 === 0) return false;
                    $r = (int)floor(sqrt($n));
                    for ($i = 3; $i <= $r; $i += 2) {
                        if ($n % $i === 0) return false;
                    }
                    return true;
                };

                $primes = array_values(array_filter($pares, fn($v) => $is_prime($v)));

                $first_double_digit_same = array_find($pares, fn($v) => $v >= 10 && $v <= 99 && intdiv($v, 10) === ($v % 10));

                $squares = array_map(fn($v) => $v * $v, $pares);

                $doubles = $pares;
                array_walk($doubles, function (&$v) { $v = $v * 2; });

                $intersection = array_values(array_intersect($pares, $multiplosDeTres));

                echo '<div class="alert alert-primary" role="alert"><strong>Números ("pares" contiene impares 1..20):</strong> ' . htmlspecialchars(implode(', ', $pares)) . '</div>';

                echo '<div class="alert alert-secondary" role="alert"><strong>Multiplos de 3 (1..40):</strong> ' . htmlspecialchars(implode(', ', $multiplosDeTres)) . '</div>';

                echo '<div class="alert alert-success" role="alert"><strong>Conteo en $pares:</strong> ' . $count_pares . '</div>';

                echo '<div class="alert alert-warning" role="alert"><strong>¿Algún múltiplo de 5 en multiplosDeTres?</strong> ' . ($any_mult5 ? 'Sí' : 'No') . '</div>';

                echo '<div class="alert alert-info" role="alert"><strong>Primos en $pares:</strong> ' . htmlspecialchars(implode(', ', $primes)) . '</div>';

                echo '<div class="alert alert-dark" role="alert"><strong>Primera ocurrencia de dos cifras idénticas en $pares:</strong> ' . ($first_double_digit_same !== null ? $first_double_digit_same : 'No encontrada') . '</div>';

                echo '<div class="alert alert-primary" role="alert"><strong>Cuadrados de $pares:</strong> ' . htmlspecialchars(implode(', ', $squares)) . '</div>';

                echo '<div class="alert alert-secondary" role="alert"><strong>Dobles de $pares (array_walk):</strong> ' . htmlspecialchars(implode(', ', $doubles)) . '</div>';

                echo '<div class="alert alert-success" role="alert"><strong>Intersección entre $pares y $multiplosDeTres:</strong> ' . (!empty($intersection) ? htmlspecialchars(implode(', ', $intersection)) : 'Ninguna') . '</div>';
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>