<?php

include ("../db.php");


if(isset($_GET['cod'])){

$id = $_GET['cod'];
$query = "DELETE FROM articulo WHERE cod = '$id' ";
$result = mysqli_query($bdconex, $query);


if(!$result){
    die("Eliminación fallida");
}

$_SESSION['mensaje'] = 'Articulo "'.$id.'" eliminado exitosamente';
$_SESSION['color_mensaje'] = 'danger';
$_SESSION['icono_mensaje']='eraser';
header("Location: ../productos.php");

}
?>