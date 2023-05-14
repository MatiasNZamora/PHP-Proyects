<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Articulos</h1>
        <section class="articulos">
            <ul>
                <?php foreach ($articulos as $articulo) : ?>
                    <li> <?php echo $articulo['id'] . '.- ' . $articulo['articulo'] ?> </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="paginacion">
            <ul>
                <!-- establecemos cuando el boton anterior estara habilitado -->
                <?php if($pagina == 1): ?>
                    <li class="disable"> &laquo; </li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?>"> &laquo; </a></li>
                <?php endif ?>
                <?php 
                    for($i = 1; $i < $numeroPages; $i++) {
                        if($pagina == $i){
                            echo "<li class='active'> <a href='?pagina=$i'> $i </a></li>";
                        } else {
                            echo "<li> <a href='?pagina=$i'>$i</a></li>";
                        }
                    };
                ?>
                <!-- Establecemos cuando estara habilitado el boton siguiente -->
                <?php if($pagina == $numeroPages): ?>
                    <li class="disable"> &raquo; </li>
                <?php else: ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?>"> &raquo; </a></li>
                <?php endif ?>
            </ul>
        </section>
    </div>
</body>
</html>