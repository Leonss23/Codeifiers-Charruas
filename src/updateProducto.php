<?php
    include ('validacion.php');

$cod=$_POST['id'];
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$desc=$_POST['descripcion'];

$sql = $conexion-> actualizar("producto"," nombre = '{$nombre}', precio = {$precio}, tipo = '{$tipo}', descripcion = '{$desc}' "," id_prod = {$cod} ");

    if($sql){
        Header("Location: productos.php");
    }
?>