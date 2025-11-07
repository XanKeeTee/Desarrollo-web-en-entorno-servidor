<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 ">Ejercicio 15</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" id="formulario">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Numero</label>
                                <input type="number" class="form-control" name="numero" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                            <?php
                            $numero = isset($_POST['numero']) ? $_POST['numero'] : '';
                            ?>
                            <div class="mt-3">
                                <?php
                                    $numBinario = decbin($numero);
                                    echo "El número decimal $numero en binario es: $numBinario";
                                endif?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>