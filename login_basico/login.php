<?php session_start();

if(isset($_SEESSION['usuario'])){
    header('Location:index.php');
}

$err = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var (strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    } catch (PDOExeption $e) { 
        echo "Error: " . $e->getMessage();
    }
    $statement = $conexion->prepare('
        SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
    );
    $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $password
    ));
    $resultado = $statement->fetch();
    // var_dump($resultado);

    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        // echo 'datos correctos';
    } else {
        $err .= '<li> Datos incorrectos </li>';
    }

}










require './views/login.view.php';
?>