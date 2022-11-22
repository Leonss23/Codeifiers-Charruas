<?php
    //error_reporting(0);
    include ('validacion.php');
    $conexion = new Conexion();

    session_start(); 
    $nomUser=$_SESSION['usuario'];

    if(isset($nomUser)){
    $cart=$conexion -> consulta('carrito','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito aCTIVO
    $pedido=$conexion -> consulta('pedido','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito pedido
    
        if(isset($cart) && isset($pedido)){
                //var_dump("Id cart:", {$cart[0]['id_cart']});
    //var_dump($pedido[0]['id_ped']);
    
           $carrito=$conexion->actualizar("carrito","estado=0"," nom_cli='{$nomUser}' AND id_cart = {$cart[0]['id_cart']}");
         $ped=$conexion->actualizar("pedido","estado=0"," nom_cli='{$nomUser}' AND id_ped = {$pedido[0]['id_ped']}");

        if($carrito > 0 && $ped>0){
            
             $carritoInsert=$conexion->insertar("carrito","nom_cli,estado","'{$nomUser}',1");
            $pedInsert=$conexion->insertar("pedido","nom_cli","'{$nomUser}'");
            
            $carritoCon=$conexion -> consulta('carrito','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito aCTIVO
            $pedConst=$conexion -> consulta('pedido','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito pedido
            if($carritoCon > 0 && $pedConst>0){
            $CarritoEstaPedido= $conexion->insertar("esta","id_ped,id_cart","{$pedConst[0][0]},{$carritoCon[0][0]}");

            }

    
            
        }
        }


    }
               
?>