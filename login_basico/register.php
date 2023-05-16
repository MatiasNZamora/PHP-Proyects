<?php session_start();

if(isset($_SEESSION['usuario'])){
    header('Location:index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password']; 
    $password2 = $_POST['password2']; 


    $err = '';

//  genero las conexion 
    if (empty($usuario) or empty($password) or empty($password2)) {
        $err .= '<li> Por favor rellena todos los datos correctamente ! </li>';
    } else {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
        } catch (PDOExeption $e){
            echo "Error: " . $e->getMessage();
        }
        $statement = $conexion -> prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1 ');
        $statement->execute(array(':usuario' => $usuario)); 
        $resultado = $statement->fetch();

        if($resultado != false) {
            $err .= '<li> El usuario ya existe </li>';
        }

        // HASHEAR LA CONTRASEÑA PARA PROTEJERLA
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);
        
        if($password != $password2) {
            $err .= '<li> Las contraseñas no coinciden </li>';
        }
        // echo "$usuario . $password . $password2";
    }

    if($err == ''){
        $statement = $conexion-> prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement-> execute(array(':usuario'=> $usuario, ':pass'=> $password));
        header('Location: login.php');
    }





}

require 'views/register.view.php';
?>