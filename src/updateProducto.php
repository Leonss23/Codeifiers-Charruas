<?php
    include ('validacion.php');

$cod=$_POST['id'];
$nombre=$_POST['nombre'];
$tipo=$_POST['tipo'];
$precio=$_POST['precio'];
$desc=$_POST['descripcion'];
$img=$_POST['imagen'];
var_dump($cod);
$sql = $conexion-> actualizar("producto"," nombre = '{$nombre}', precio = {$precio}, imagen = '{$img}', tipo = '{$tipo}', descripcion = '{$desc}' "," id_prod = {$cod} ");

    if($sql){
        Header("Location: productos.php");
    }
?>