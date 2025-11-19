<?php
session_start();

if (!isset($_SESSION['num1'])) {
    $_SESSION['num1'] = 0;
}
if (!isset($_SESSION['num2'])) {
    $_SESSION['num2'] = 0;
}
$num1 = $_SESSION['num1'];
$num2 = $_SESSION['num2'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 2</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="alert alert-success text-center" role="alert">
                        <strong>El numero 1: </strong><?php echo htmlspecialchars($num1) ?> <strong class="ms-5">El numero 2: </strong><?php echo htmlspecialchars($num2) ?>
                    </div>
                    <form method="POST" action="action.php">
                        <div class="text-center">
                            <button type="submit" name="incrementarA" class="btn btn-primary">Incrementar A</button>
                            <button type="submit" name="decrementarA" class="btn btn-primary">Decrementar A</button>
                            <button type="submit" name="incrementarB" class="btn btn-primary">Incrementar B</button>
                            <button type="submit" name="decrementarB" class="btn btn-primary">Decrementar B</button>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" name="resetearA" class="btn btn-primary">Resetear A</button>
                            <button type="submit" name="resetearB" class="btn btn-primary">Resetear B</button>
                            <button type="submit" name="destruir" class="btn btn-primary">Destruir</button>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>