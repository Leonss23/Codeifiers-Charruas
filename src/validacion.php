<?php 
error_reporting(0);
    include ('includes/bd.php');

    $conexion = new Conexion();
    $conn = $conexion -> connexc();
session_start(); 
$session = $_SESSION['usuario'];


if(isset($session)){ //Si existe inicio de sesion
    
    $nomUser=$_SESSION['usuario'];
    $usuario=$conexion -> consulta('usuarios','*'," nom_usr='$nomUser'");
    $producto=$conexion -> consulta('productos','*',"");
    $personaLog=$conexion -> consulta('persona',"*"," ci='{$usuario[0][3]}'");

    if(basename($_SERVER['PHP_SELF']) == 'Admin.php'){
        if($usuario[0]['tipo']==3){
            header("location: ../Usuario/Account.php");
        }else if($usuario[0]['tipo']==2){
            header("location: productos.php");
        }
    }


    $nombre= ucfirst(utf8_decode($personaLog[0][1]));
    $apellido= ucfirst(utf8_decode($personaLog[0][2]));
    $Nom_usuario= ucfirst(utf8_decode($usuario[0][0]));
    $id= ucfirst(utf8_decode($personaLog[0][0]));
    $nac= ucfirst(utf8_decode($personaLog[0][5]));
    $tel= ucfirst(utf8_decode($personaLog[0][4]));
    
}else{
    if(basename($_SERVER['PHP_SELF'])!='index.php' && basename($_SERVER['PHP_SELF'])!='Catalogo.php' && basename($_SERVER['PHP_SELF'])!='producto.php'){
        $error="Inicie sesion para acceder al sitio.";
        header("location: ../formulario.php?error=$error");
        die();
    }

}

?>