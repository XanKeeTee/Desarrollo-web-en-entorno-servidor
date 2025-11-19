<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Ejercicio 13 - Manipulación de cadenas</h5>
            </div>
            <div class="card-body">
                <p>Pide una cadena por formulario y muestra varios resultados usando funciones de strings de PHP.</p>
                <form method="POST">
                    <div class="mb-3">
                        <label for="texto" class="form-label">Cadena de texto</label>
                        <input type="text" class="form-control" id="texto" name="texto" placeholder="Introduce una cadena" required value="<?php echo isset($_POST['texto']) ? htmlspecialchars($_POST['texto']) : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Procesar</button>
                </form>

                <div class="mt-4">
                    <?php
                    if (
                        $_SERVER['REQUEST_METHOD'] === 'POST' &&
                        isset($_POST['texto'])
                    ) {
                        $original = (string) $_POST['texto'];

                        
                        function mb_strrev($str) {
                            $arr = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
                            return implode('', array_reverse($arr));
                        }

                        
                        $reversed = mb_strrev($original);
                        $filtered = mb_strtolower(preg_replace('/[^\p{L}\p{N}]+/u', '', $original));
                        $filtered_reversed = mb_strrev($filtered);
                        $is_palindrome = ($filtered !== '' && $filtered === $filtered_reversed);

                        
                        $words = preg_split('/\s+/u', trim($original));
                        $words_reversed = implode(' ', array_reverse($words));

                        
                        $upper = mb_strtoupper($original);
                        $lower = mb_strtolower($original);

                        
                        $char_count = mb_strlen($original);
                        $word_count = 0;
                        if (strlen(trim($original)) > 0) {
                            $filtered_words = preg_split('/\s+/u', trim($original));
                            $word_count = count($filtered_words);
                        }

                        
                        $salt = substr(str_replace('+', '.', base64_encode(random_bytes(16))), 0, 22);
                        $crypt_hash = crypt($original, '$2y$10$' . $salt);
                        $md5_hash = md5($original);
                        $sha1_hash = sha1($original);

                        
                        echo '<div class="alert alert-primary" role="alert">';
                        echo '<strong>Cadena al revés:</strong> ' . htmlspecialchars($reversed) . '<br>';
                        echo '<em>¿Palíndroma?</em> ' . ($is_palindrome ? '<span class="badge bg-success">Sí</span>' : '<span class="badge bg-danger">No</span>');
                        echo '</div>';

                        // 2
                        echo '<div class="alert alert-secondary" role="alert">';
                        echo '<strong>Palabras en orden inverso:</strong> ' . htmlspecialchars($words_reversed);
                        echo '</div>';

                        // 3
                        echo '<div class="alert alert-success" role="alert">';
                        echo '<strong>Mayúsculas:</strong> ' . htmlspecialchars($upper) . '<br>';
                        echo '<strong>Minúsculas:</strong> ' . htmlspecialchars($lower);
                        echo '</div>';

                        // 4
                        echo '<div class="alert alert-warning" role="alert">';
                        echo '<strong>Recuento:</strong> ' . $char_count . ' caracteres (incluye espacios)';
                        echo ' — ' . $word_count . ' palabras';
                        echo '</div>';

                        // 5
                        echo '<div class="alert alert-info" role="alert">';
                        echo '<strong>crypt:</strong> ' . htmlspecialchars($crypt_hash) . '<br>';
                        echo '<strong>md5:</strong> ' . htmlspecialchars($md5_hash) . '<br>';
                        echo '<strong>sha1:</strong> ' . htmlspecialchars($sha1_hash);
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>