<?php
session_start();

if (!isset($_SESSION['numeroAleatorio'])) {
    $_SESSION['numeroAleatorio'] = random_int(1, 100);
}
if (!isset($_SESSION['resultado'])) {
    $_SESSION['resultado'] = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroUsuario = $_POST['numero'];
    $numeroAleatorio = $_SESSION['numeroAleatorio'];
    
    if($numeroUsuario !== false){
        if($numeroUsuario>$numeroAleatorio){
            $_SESSION['resultado'] = "El numero que has puesto es MAYOR al numero aleatorio";
        }elseif ($numeroUsuario<$numeroAleatorio){
            $_SESSION['resultado'] = "El numero que has puesto es MENOR al numero aleatorio";
        }elseif($numeroUsuario=$numeroAleatorio){
            $_SESSION['resultado'] = "ENHORABUENA!! Lo has adivinado";
        }
    }else{
        $_SESSION['resultado'] = "ERROR: Numero no introducido";
    }
}
$resultado = $_SESSION['resultado'] ?? '';
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
                <h5 class="mb-0">Ejercicio 4</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form method="POST">
                        <label for="texto" class="form-label">Introduce un numero</label>
                        <input class="form-control" name="numero" id="numero" rows="3"></input>
                        <button type="submit" class="btn btn-primary center">Adivinar</button>
                    </form>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo htmlspecialchars($resultado) ?>  
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>