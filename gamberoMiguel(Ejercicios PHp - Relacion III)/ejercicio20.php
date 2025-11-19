<?php
session_start();

$errors = [];
$input = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Usar filter_input para validar y sanear
    $input['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($input['name'])) {
        $errors['name'] = 'El nombre es obligatorio.';
    }

    $input['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'El formato del correo electrónico no es válido.';
    }

    $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, [
        "options" => ["min_range" => 18, "max_range" => 120]
    ]);
    if ($input['age'] === false) {
        $errors['age'] = 'La edad debe ser un número entre 18 y 120.';
    }

    // 2. Usar preg_match para validar patrones complejos (expresiones regulares)
    $input['phone'] = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone_pattern = '/^(\+34|0034)?[6789]\d{8}$/';
    if (!empty($input['phone']) && !preg_match($phone_pattern, $input['phone'])) {
        $errors['phone'] = 'El formato del teléfono no es válido (ej: +34612345678).';
    }

    if (empty($errors)) {
        $_SESSION['success_message'] = "¡Formulario enviado y validado con éxito!";
        $_SESSION['submitted_data'] = $input;
        header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']));
        exit();
    }
}

$success_message = $_SESSION['success_message'] ?? null;
$submitted_data = $_SESSION['submitted_data'] ?? null;
unset($_SESSION['success_message'], $_SESSION['submitted_data']);

?>
<!doctype html>
<html lang="es">

<head>
    <title>Ejercicio 20 - Controles de Seguridad</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 20 - Controles de Seguridad en Formularios</h5>
            </div>
            <div class="card-body">
                <p>Formulario que aplica <code>htmlspecialchars</code>, la extensión <code>Filter</code> y <code>preg_match</code> para seguridad.</p>

                <?php if ($success_message) : ?>
                    <div class="alert alert-success">
                        <h6><?php echo $success_message; ?></h6>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Nombre:</strong> <?php echo htmlspecialchars($submitted_data['name']); ?></li>
                            <li><strong>Email:</strong> <?php echo htmlspecialchars($submitted_data['email']); ?></li>
                            <li><strong>Edad:</strong> <?php echo htmlspecialchars($submitted_data['age']); ?></li>
                            <li><strong>Teléfono:</strong> <?php echo htmlspecialchars($submitted_data['phone'] ?: 'No proporcionado'); ?></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Usamos htmlspecialchars en el action para prevenir ataques XSS -->
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo htmlspecialchars($input['name'] ?? ''); ?>" required>
                        <div class="invalid-feedback"><?php echo $errors['name'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo htmlspecialchars($input['email'] ?? ''); ?>" required>
                        <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Edad</label>
                        <input type="number" class="form-control <?php echo isset($errors['age']) ? 'is-invalid' : ''; ?>" id="age" name="age" value="<?php echo htmlspecialchars($input['age'] ?? ''); ?>" required>
                        <div class="invalid-feedback"><?php echo $errors['age'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono (Opcional)</label>
                        <input type="tel" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?php echo htmlspecialchars($input['phone'] ?? ''); ?>" placeholder="+34612345678">
                        <div class="invalid-feedback"><?php echo $errors['phone'] ?? ''; ?></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>