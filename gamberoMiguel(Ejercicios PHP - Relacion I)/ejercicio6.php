<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
<h1><u>Ejercicio - 6</u></h1>
<!-- 6- Declara en un programa PHP una clase fruta, con dos atributos: nombre y
color, y dos funciones, set_name() y get_name(). Declara e inicializa dos
nstancias: apple y banana, inicializa los nombres y muéstralos por pantalla -->

<?php
    class Fruta{
        public $nombre;
        public $color;

        function set_name($nombre){
            $this->nombre = $nombre;
        }

        function get_name(){
            return $this->nombre;
        }
    }

    $manzana = new Fruta();
    $manzana->set_name("Manzana");
    echo "El nombre de la fruta es: ".$manzana->get_name()."<br>";

    $platano = new Fruta();
    $platano->set_name("Plátano");
    echo "El nombre de la fruta es: ".$platano->get_name()."<br>";
?>
</body>
</html>