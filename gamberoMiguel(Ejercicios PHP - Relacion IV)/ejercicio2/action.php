<?php
session_start();

function incrementarA(&$num) {
    $num++;
}

function decrementarA(&$num) {
    $num--;
}

function incrementarB(&$num) {
    $num++;
}

function decrementarB(&$num) {
    $num--;
}

function resetearA(&$num){
    $num = 0;
}

function resetearB(&$num){
    $num = 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['incrementarA'])) {
        incrementarA($_SESSION['num1']);
    } elseif (isset($_POST['decrementarA'])) {
        decrementarA($_SESSION['num1']);
    } elseif (isset($_POST['incrementarB'])) {
        incrementarB($_SESSION['num2']);
    } elseif (isset($_POST['decrementarB'])) {
        decrementarB($_SESSION['num2']);
    } elseif (isset($_POST['resetearA'])){
        resetearA($_SESSION['num1']);
    }elseif (isset($_POST['resetearB'])){
        resetearA($_SESSION['num2']);
    }elseif (isset($_POST['destruir'])){
        $_SESSION = array();
        session_destroy();
    }
}

header('Location: ejercicio2.php');
exit();