<?php

$errores = '';
$enviado = '';


if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    } else {
        $errores .= 'Por favor ingrese un nombre <br />';
    }

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
        
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Por favor ingrese un correo valido <br />';
        }

    } else { 
        $errores .= 'Por favor ingrese un correo <br />';
    }

    if (!empty($mensaje)) {
        $mensaje = htmlspecialchars($mensaje); // saca los caracteres especiales
        $mensaje = trim($mensaje); // elimina los espaciados
        $mensaje = stripcslashes($mensaje); 
    } else {
        $errores .= 'Por favor ingrese un mensaje. <br />'; 
        // errores va a ser igual al contenido que ya tenga mas el texto que se agrega (.=)
    }

    if(!$errores) {
        $enviar_a = 'info@matiasnzamora.com.ar';
        $asunto= 'Correo enviado desde Formulario Simple';
        $mensaje_preparado = "De $nombre \n ";
        $mensaje_preparado .= "Correo: $correo \n";
        $mensaje_preparado .= "Mensaje:" . $mensaje;

        // mail($enviar_a, $asunto, $mensaje_preparado);
        // funcion para mandar el email.

        $enviado = 'true' ;
    }
}

require('index.view.php');








?>