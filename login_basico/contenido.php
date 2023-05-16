<?php session_start();

if(isset($_SESSION['usuario'])) {
    require 'views/contenido.view.php';
} else {
    header('Location: Login.php');
}



// require 'views/contenido.view.php';
?>