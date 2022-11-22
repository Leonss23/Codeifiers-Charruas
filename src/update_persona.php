<?php
 include ('validacion.php');

$cod=$_POST['id'];

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$tel=$_POST['telefono'];
$direc=$_POST['direccion'];
$pass_previus=$_POST['pass_previus'];
$pass_after=$_POST['pass_after'];

        if(isset($_POST['SubmitPass']))
        {
            if($pass_after=="" || $pass_previus==""){
                $error = "La contraeña no puede ser nula";
                Header("location:  actualizar.php?error=$error&cod=$cod");
            }else
            if(isset($pass_after))
            {
                if($usuario[0]['pass'] == $pass_previus)
                {
                    $sql = $conexion-> actualizar("usuarios"," pass= '{$pass_after}' "," nom_usr = '{$nomUser}'");
                    $mensaje = "La contraseña fue actualizada";
                    Header("Location: Account.php?msg=" . $mensaje);
                }else{
                    $error = "La contraseña no coincide";
                    Header("location:  actualizar.php?error=$error&cod=$cod");
                }
            }
        }else{

            if($nombre == "" || $apellido == "" || $tel == "")
            {
                $error = "Los campos no deben de estar vacios!";
                Header("location:  actualizar.php?error=$error&cod=$cod");
                }else{
                    
                    $sql = $conexion-> actualizar("persona","  nombre = '{$nombre}', apellido = '{$apellido}', direccion = '{$direc}', telefono = {$tel} "," ci = {$cod} ");
                    $usuario=$conexion -> consulta('usuario','*'," nom_usr='$session'");
                    if($usuario[0][2]==1){
                        $mensaje = "Los datos de '" .$nombre. "' fueron actualizados.";
                        Header("Location: Admin.php?msg=" . $mensaje);
                    }else{
                        $mensaje = "Los datos fueron actualizados";
                        Header("Location: Account.php?msg=" . $mensaje);
                    }
                }
            }  
        ?>

             
            
                
        