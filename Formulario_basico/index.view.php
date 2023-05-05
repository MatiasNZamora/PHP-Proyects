<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Formulario Contacto Simple </title>
</head>
<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ; ?>">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>" >

            <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo:" value="<?php if(!$enviado && isset($correo)) echo $correo ?>" >

            <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Escribe tu mensaje: " ><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

            <?php if (!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores; ?>
                </div>
            <?php elseif($enviado): ?>
                <div class="alert success">
                    <p> Enviado Correctamente </p>
                </div>
            <?php endif ?>

            <input type="submit" class="btn btn-primary" name="submit" value="Enviar Correo"/>
        </form>
    </div>
</body>
</html>