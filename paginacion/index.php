<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=paginacion','root','');
} catch(PDOExecpion $e) {
    echo "ERROR:" . $e->getMessage();
    die();
}

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postporpage = 5;

$inicio = ($pagina > 1 ) ? ($pagina * $postporpage - $postporpage) : 0 ;

$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $postporpage");

$articulos->execute();
$articulos = $articulos->fetchAll();

// print_r($articulos);

if(!$articulos){
    header('Location:index.php');
} 


$totalArt = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArt = $totalArt->fetch()['total'];

// echo $totalArt;


$numeroPages = ceil($totalArt / $postporpage);

// echo $numeroPages;

require 'index.view.php';

?>