<?php
include('includes/bd.php');
$conexion = new Conexion();

$cod=$_GET['id'];

    $sql=$conexion->actualizar("usuario"," estado = 0 "," ci = {$cod}");
    if($sql){
 
        Header("Location: Admin.php");
    }



?>