<?php
include ('validacion.php');

if(isset($_POST['register_user'])){

    //var_dump($_POST);
    $datos=$conexion-> consulta("usuario","*"," nom_usr='{$_POST['user']}'"); 
    if(count($datos)==1 ){ //SI EXISTE usuario DEVUELVE EL VALOR (1)
        $error2="El nombre de usuario ingresado ya es utilizado.</br>Seleccione otro.";
        header("Location: Admin.php?error2=".$error2);
    }else{
        $datoU=$conexion->insertar("usuario","nom_usr,pass,tipo,ci,estado",
        "'{$_POST['user']}',' {$_POST['password']} ', 3 , {$_POST['SelectPersona']}, 1 "); 
        $datoC=$conexion->insertar("cliente","nom_cli","'{$_POST['user']}'");  //Se le insertara en la tabla cliente el nombre usuario si viene desde el registro
        
        $carritoInsert=$conexion->insertar("carrito","nom_cli","'{$_POST['user']}'");
        $pedInsert=$conexion->insertar("pedido","nom_cli","'{$_POST['user']}'");
        

        $carritoCon=$conexion -> consulta('carrito','*'," nom_cli='{$_POST['user']}' AND estado = 1"); //Carrito aCTIVO
        $pedConst=$conexion -> consulta('pedido','*'," nom_cli='{$_POST['user']}' AND estado = 1"); //Carrito pedido
        
        if($carritoCon > 0 && $pedConst>0){
           $CarritoEstaPedido= $conexion->insertar("esta","id_ped,id_cart","{$pedConst[0][0]},{$carritoCon[0][0]}");     
           $error2= "Ingresaste a {$_POST['user']}, como un CLIENTE";
           header("Location: Admin.php?error2=".$error2);
        }

    }

}

?>