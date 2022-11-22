<?php
    include ('validacion.php');

$cod=$_GET['id'];

//echo $cod;

$sql=$conexion->actualizar("producto"," stock = 0 "," id_prod = {$cod}");

if($sql){

    Header("Location: productos.php");
}

?>
