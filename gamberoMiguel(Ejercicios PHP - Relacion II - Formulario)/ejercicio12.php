<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 ">Ejercicio 12</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method ="POST">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Inicial</label>
                        <input type="number" class="form-control" name="inicial" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Primera</label>
                        <input type="number" class="form-control" name="primera" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Segunda</label>
                        <input type="number" class="form-control" name="segunda" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tercera</label>
                        <input type="number" class="form-control" name="tercera" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        <?php
                            $rubrica = [
                                "inicial" => 0.1,
                                "primera" => 0.25,
                                "segunda" => 0.25,
                                "tercera" => 0.4
                            ];

                            $notas = [
                                "inicial" => isset($_POST['inicial']) ? $_POST['inicial'] : '',
                                "primera" => isset($_POST['primera']) ? $_POST['primera'] : '',
                                "segunda" => isset($_POST['segunda']) ? $_POST['segunda'] : '',
                                "tercera" => isset($_POST['tercera']) ? $_POST['tercera'] : ''
                            ];



                            $nota_final = ($rubrica["inicial"] * $notas["inicial"]) + 
                                        ($rubrica["primera"] * $notas["primera"]) + 
                                        ($rubrica["segunda"] * $notas["segunda"]) + 
                                        ($rubrica["tercera"] * $notas["tercera"]);

                            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
                            $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
                        ?>
                        <div class="mt-3">
                            <div><?php echo "Usuario: $nombre con correo $correo";?></div>
                            <div>La nota final es: <?php echo htmlspecialchars($nota_final); ?></div>
                            <?php
                                if($nota_final >= 5){
                                    echo "La persona aprueba.";
                                } else {
                                    echo "La persona suspende.";
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>