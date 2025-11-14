<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- 1- Haz una función PHP esPrimo($num) que devuelva un booleano que indique
    si el número pasado como parámetro es primo o no. Haz un programa que
    pida un número natural, e incluyendo esta función, la utilice para mostrar
    todos los números primos entre 1 y el introducido. Todo en el mismo archivo
    php-->

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado de Personas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method ="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Numero</label>
                        <input type="number" class="form-control" name="numero" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="mb-3">
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                                $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
                                function esPrimo($num){
                                    $esPrimo = true;
                                    if ($num <= 1) {
                                        $esPrimo = false;
                                    } else {
                                        for ($i = 2; $i <= sqrt($num); $i++) {
                                            if ($num % $i == 0) {
                                                $esPrimo = false;
                                                break;
                                            }
                                        }
                                    return $esPrimo;
                                    }
                                }

                                if(esPrimo($numero)){
                                    echo "El numero es primo";
                                }else{
                                    echo "El numero no es primo";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</body>
</html>