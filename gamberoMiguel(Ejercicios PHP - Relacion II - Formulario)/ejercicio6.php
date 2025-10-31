<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- 6- Crea una tabla de datos, simulando un listado de personas (nombre,
    apellido, correo, teléfono, etc…) en PHP con formateo de Bootstrap 5.
    Experimenta con varios de ellos y quédate con el que prefieras.-->
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Listado de Personas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            class Persona {
                                public $nombre;
                                public $apellido;
                                public $correo;
                                public $numero;
                                
                                function __construct($nombre, $apellido, $correo, $numero) {
                                    $this->nombre = $nombre;
                                    $this->apellido = $apellido;
                                    $this->correo = $correo;
                                    $this->numero = $numero;
                                }
                            }

                            // Crear array de personas con datos de ejemplo
                            $listaPersonas = [
                                new Persona("Miguel", "Gambero", "miguel@gmail.com", "666 66 66 66"),
                                new Persona("Ana", "García", "ana@gmail.com", "777 77 77 77"),
                                new Persona("Juan", "López", "juan@gmail.com", "888 88 88 88")
                            ];

                            // Mostrar cada persona en una fila de la tabla
                            foreach ($listaPersonas as $persona) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($persona->nombre) . "</td>";
                                echo "<td>" . htmlspecialchars($persona->apellido) . "</td>";
                                echo "<td>" . htmlspecialchars($persona->correo) . "</td>";
                                echo "<td>" . htmlspecialchars($persona->numero) . "</td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>