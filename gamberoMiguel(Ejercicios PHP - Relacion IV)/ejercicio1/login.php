<?php 
session_start();    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Básico con Bootstrap</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <style>
        /* Damos un alto mínimo a la pantalla y usamos flex para centrar */
        body {
            background-color: #f8f9fa; /* Un fondo gris claro */
        }
        .login-container {
            min-height: 100vh;
        }
    </style>
</head>
<body>

    <div class="container d-flex align-items-center justify-content-center login-container">
        
        <div class="col-lg-4 col-md-6 col-sm-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                    
                    <form action="proceso.php" method="POST" onsubmit="return validarFormulario()">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="tu@email.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Tu contraseña">
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Recordarme</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none"><small>¿Olvidaste tu contraseña?</small></a>
                    </div>
                    <div id="error" class="error"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validarFormulario() {
            // Obtenemos los valores de los campos
            var idUsuario = document.getElementById('email').value;
            var contrasena = document.getElementById('password').value;
            var errorDiv = document.getElementById('error');

            // Validación simple: no deben estar vacíos
            if (idUsuario.trim() === "" || contrasena.trim() === "") {
                errorDiv.textContent = "Ambos campos (ID y Contraseña) son obligatorios.";
                return false; // Detiene el envío del formulario
            }

            // Si todo está bien
            errorDiv.textContent = "";
            return true; // Permite el envío del formulario
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>