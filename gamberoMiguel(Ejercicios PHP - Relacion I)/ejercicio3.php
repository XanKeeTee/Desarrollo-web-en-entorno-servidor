<!-- Ejercicio 3 - Miguel Angel Gambero -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><u>Ejercicio - 3</u></h1>

    <!-- 3- Investiga qué y cuales son las superglobals en php
(https://www.php.net/manual/es/language.variables.superglobals.php), y haz
un programa que muestre, en forma de lista no numerada, para $_SERVER:
    ‘DOCUMENT-ROOT’
    ‘PHP-SELF’
    ‘SERVER-NAME’
    'SERVER_SOFTWARE'
    'SERVER_PROTOCOL'
    'HTTP_HOST'
    'HTTP_USER_AGENT'
    'REMOTE_ADDR'
    'REMOTE_PORT'
    'SCRIPT_FILENAME'
    'REQUEST_URI'
Prueba un volcado con var_dump($_SERVER) y también con
print_r($_SERVER). ¿Cuál es la diferencia? -->

    <ul>
        <li>DOCUMENT-ROOT: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
        <li>PHP-SELF: <?php echo $_SERVER['PHP_SELF']; ?></li>
        <li>SERVER-NAME: <?php echo $_SERVER['SERVER_NAME']; ?></li>
        <li>SERVER_SOFTWARE: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
        <li>SERVER_PROTOCOL: <?php echo $_SERVER['SERVER_PROTOCOL']; ?></li>
        <li>HTTP_HOST: <?php echo $_SERVER['HTTP_HOST']; ?></li>
        <li>HTTP_USER_AGENT: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
        <li>REMOTE_ADDR: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
        <li>REMOTE_PORT: <?php echo $_SERVER['REMOTE_PORT']; ?></li>
        <li>SCRIPT_FILENAME: <?php echo $_SERVER['SCRIPT_FILENAME']; ?></li>
        <li>REQUEST_URI: <?php echo $_SERVER['REQUEST_URI']; ?></li>
    </ul>

    <h2>Var Dump</h2>
    <?php var_dump($_SERVER); ?>

    <h2>Print R</h2>
    <pre><?php print_r($_SERVER); ?></pre>

    <p>La diferencia entre var_dump y print_r es que var_dump proporciona información más detallada sobre las variables, incluyendo su tipo y tamaño, mientras que print_r está más enfocado en mostrar la estructura de arrays y objetos de una manera legible.</p>    
</body>

</html>