<?php
    //error_reporting(0);

use function PHPSTORM_META\type;

    include ('../src/validacion.php');
    $conexion = new Conexion();

    session_start(); 
    $nomUser=$_SESSION['usuario'];

    if(isset($nomUser)){
    $cart=$conexion -> consulta('carrito','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito aCTIVO
    $pedido=$conexion -> consulta('pedido','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito pedido
    
       


        }


    
               
?>