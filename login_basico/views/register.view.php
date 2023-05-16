<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f0c97317d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title> Register </title>
</head>
<body>
    <div class="container">
        <h1 class="title"> Registrate </h1>
        <hr class="border">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i>
                <input type="text" name="usuario" id="" class="usuario" placeholder="Usuario">
            </div>

            <div class="form-grup">
                <i class="icono izquierda fa fa-lock"></i>
                <input type="password" name="password" id="" class="password" placeholder="Contraseña">
            </div>            
            
            <div class="form-grup">
                <i class="icono izquierda fa fa-lock"></i>
                <input type="password" name="password2" id="" class="password_btn" placeholder="Repetir Contraseña">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>

            <?php if(!empty($err)): ?>
                <div class="err">
                    <ul>
                        <?php echo $err; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>

        <p class="texto-registrate">
            ¿Ya tienes cuenta? 
            <a href="login.php"> Iniciar Sesión </a>
        </p>
    </div> 
</body>
</html>