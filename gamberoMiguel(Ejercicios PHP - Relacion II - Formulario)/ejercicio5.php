<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- 5- Haz lo propio con el ejercicio 5 de la relación anterior, y el formato tabla.
    Añade posteriormente, y solo a modo de prueba, algunos components como
    buttons, spinners, lists, etc.-->

    <?php
    $temperaturas =[
        "Lunes" => 27,
        "Martes" => 26,
        "Miercoles" => 24,
        "Jueves" => 24,
        "Viernes" => 24,
        "Sabado" => 26,
        "Domingo" => 27
    ];
    echo "La temperatura del primer dia de la semana(Lunes) es: ".$temperaturas["Lunes"]."°C<br>";
    echo "La temperatura de todos los días, secuencialmente:<br>";
    foreach($temperaturas as $dia => $temp){
        echo "El dia ".$dia." tiene una temperatura de ".$temp."°C<br>";
    }
    ?>
        <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado de temperaturas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                        <?php
                        echo "<br>La temperatura de todos los días en formato de lista numerada:<br><ol class=\"list-group list-group-numbered\">";
                        foreach($temperaturas as $dia => $temp){
                            echo "<li class=\"list-group-item\">El dia ".$dia." tiene una temperatura de ".$temp."°C</li>";
                        }
                        echo "</ol>";
                        ?>
                </div>
            </div>
        </div>
    </div>
>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>