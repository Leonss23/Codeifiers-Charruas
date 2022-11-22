<?php  
include('includes/bd.php');
$conexion = new Conexion();
$validar=0;

if(isset($_POST['login'])){ //Verifica el boton que presiono
    
    //Traigo a User y Pass por metodo POST
    $usuario=$_POST['user'];
    $clave=$_POST['password'];
    $validar=0;

    $datoUsr= $conexion->consulta("usuario","*"," nom_usr='$usuario' AND pass='$clave'");
    //echo $datoUsr;
    if($datoUsr){
        $validar=1;

    }else{
  
        $error="Datos incorrectos";
        header("location: formulario.php?error=$error");
    }
    
}    

if($validar==1){ //Si se envio los datos se loguea automaticamente
 
    
    if(($datoUsr[0][4])==0) //Verifico su estado de actividad
    {
        $error="Su usuario se encuentra incactivo";
        header("location: formulario.php?error=" . $error);
    }
    
    else{
        session_start();
        $_SESSION['usuario']=$usuario;

         //Verifico los ROLES
         if(($datoUsr[0][2])==1){ //administrador
            $usr="Admin";
            header("location: Admin.php"); 
        }else
        if(($datoUsr[0][2])==2){ //Empleado
            $usr="Empleado";
       header("location: productos.php");
        }else
        if(($datoUsr[0][2])==3){ //cliente
            $usr="Cliente";
        header("location: ../index.php");
        }
    }


 } 
