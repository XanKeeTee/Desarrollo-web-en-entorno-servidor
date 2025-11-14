<?php
// --- PASO 1: Iniciar la sesión ---
session_start();

// --- PASO 2: Función de validación ---
/**
 * CAMBIO: La función ahora valida email y contraseña.
 * @param string $email El email de usuario.
 * @param string $pass La contraseña.
 * @return bool True si es válido, False si no.
 */
function validarCredenciales($email, $pass) {
    // CAMBIO: Valores locales actualizados para email
    $email_valido = "admin@email.com";
    $pass_valido = "1234";

    if ($email === $email_valido && $pass === $pass_valido) {
        return true;
    } else {
        return false;
    }
}

// --- PASO 3: Lógica de POST y creación de sesión/cookie ---
$mensaje_login = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // CAMBIO: Leemos $_POST['email'] y $_POST['password']
    $email_post = $_POST['email'];
    $contrasena_post = $_POST['password'];

    // Invocamos a la función de validación
    if (validarCredenciales($email_post, $contrasena_post)) {
        
        // --- ¡Validación correcta! ---
        
        // Establecemos la cookie (expira en 30 segundos)
        // CAMBIO: Almacenamos el email en la cookie
        setcookie("id_usuario", $email_post, time() + 30, "/");

        // Establecemos la variable de sesión
        // CAMBIO: Almacenamos el email en la sesión
        $_SESSION["id_usuario"] = $email_post;
        
        $mensaje_login = "¡Login correcto! Cookie y Sesión establecidas.";

    } else {
        // --- Validación incorrecta ---
        $mensaje_login = "Error: Email o contraseña incorrectos.";
        session_unset();
        session_destroy();
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando...</title>
    <!-- PASO 4: Refrescar la página cada 5 segundos -->
    <meta http-equiv="refresh" content="5">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .nota { background-color: #fffde7; border: 1px solid #e6db55; padding: 10px; border-radius: 5px; font-style: italic; }
        .error { color: red; font-weight: bold; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Estado de la Sesión y Cookie</h2>
        
        <!-- Mostramos el mensaje de login (si existe) -->
        <?php if (!empty($mensaje_login)): ?>
            <p class="<?php echo (strpos($mensaje_login, 'Error') !== false) ? 'error' : 'success'; ?>">
                <?php echo htmlspecialchars($mensaje_login); ?>
            </p>
        <?php endif; ?>

        <hr>

        <!-- PASO 5: Mostrar valores de Sesión y Cookie -->
        <!-- NOTA: Los nombres de las variables ('id_usuario') se mantienen, -->
        <!-- pero ahora contendrán el email. -->

        <h3>Valor de la Variable de SESIÓN:</h3>
        <?php
        if (isset($_SESSION["email_post"])) {
            echo "<p><strong>" . htmlspecialchars($_SESSION["email_post"]) . "</strong></p>";
        } else {
            echo "<p class='error'>No hay ninguna variable de sesión 'email_post' activa.</p>";
        }
        ?>

        <h3>Valor de la COOKIE:</h3>
        <?php
        if (isset($_COOKIE["email_post"])) {
            echo "<p><strong>" . htmlspecialchars($_COOKIE["email_post"]) . "</strong></p>";
        } else {
            echo "<p class='error'>No se encontró la cookie 'email_post'.</p>";
        }
        ?>

        <hr>
        
        <!-- PASO 6: Notas explicativas -->
        <div class="nota">
            <p>Esta página se refrescará automáticamente cada 5 segundos.</p>
            <p><strong>Nuevas credenciales para probar:</strong></p>
            <ul>
                <li>Email: <strong>admin@email.com</strong></li>
                <li>Contraseña: <strong>1234</strong></li>
            </ul>
            <p><strong>Comportamiento esperado:</strong></p>
            <ol>
                <li><strong>Al iniciar sesión (0s):</strong> Verás la SESIÓN (con el email), pero la COOKIE dirá "No encontrada".</li>
                <li><strong>Primer refresco (5s):</strong> Verás tanto la SESIÓN como la COOKIE (ambas con el email).</li>
                <li><strong>A los 30 segundos:</strong> La COOKIE expirará. La SESIÓN permanecerá activa.</li>
            </ol>
        </div>
        
        <p style="margin-top: 20px;"><a href="login.php">Volver al Login</a></p>

    </div>

</body>
</html>