<?php  
include('includes/bd.php');
//include('validacion.php');
include('usuario.php');
$conexion = new Conexion();

#FORMULARIO REGISTER
if(isset($_POST['register'])){

   $validar=0;
   $usuario=$_POST['user'];
   $clave=$_POST['password'];

    $persona =new Persona($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['direc'],$_POST['tel'],$_POST['nac']);
    $datos=$conexion-> consulta("usuario","*"," nom_usr='{$_POST['user']}'"); //CONSULTA POR SI EXISTE EL USUARIO
    $datosPer=$conexion-> consulta("persona", "*" ," ci = {$_POST['cedula']} "); //CONSULTA POR SI EXISTE LA CI DE PERSONA
    //echo count($datos), count($datos);
    
      //Verifico si viene un tipo de Usuario desde el Panel Admin
      if(isset($_POST['seleccionar'])){
         $tipo = $_POST['seleccionar'];
         $AutoLog=0;
      }else{//Si no Existe,se le pondra de Tipo (3 = Cliente)
         $tipo= 3;
         $AutoLog=1;
      }
    

    if(count($datos)==1 ){ //SI EXISTE usuario DEVUELVE EL VALOR (1)
      $error2="El nombre de usuario ingresado ya es utilizado.</br>Seleccione otro.";
         if($AutoLog==1){
            header("location: formulario.php?error2=$error2");  
         } else{
            header("location: Admin.php?error=$error2");  
         }

   } else if(count($datosPer)==1){ //SI EXISTE PERSONA EL VALOR (1)
      $error2="La Ci le pertenece a otra persona ya esta registrada.";
         if($AutoLog==1){
            header("location: formulario.php?error2=$error2");  
        } else{
            header("location: Admin.php?error=$error2");  
         }
  
   }
     if(count($datos)==1 && count($datosPer)==1 ){ //SI EXISTE DEVUELVE EL VALOR (1)
        $error2="El nombre de usuario ingresado ya existe";
         if($AutoLog==1){
            header("location: formulario.php?error2=$error2");  
          } else{
               header("location: Admin.php?error$error2");  
            }

     } else  
         if(count($datos)==0 && count($datosPer)==0){ //Si no existe PERSONA y USUARIO LO REGISTRO EN LA BD

            $datoP=$conexion->insertar("persona","ci,nombre,apellido,direccion,telefono,fec_nac", $persona->get_sql()); 
            $datoU=$conexion->insertar("usuario","nom_usr,pass,tipo,ci,estado","'{$_POST['user']}','{$_POST['password']}', {$tipo} ,{$_POST['cedula']},1"); 
            


            true == 1;
            false == 0;
     
         if($AutoLog==1){
         
            if($datoP==1){
               if($datoU==1){
                  
                  $datoUsr= $conexion->consulta("usuario","*"," nom_usr='$usuario' AND pass='$clave'");
                  //echo $datoUsr;
                     if(count($datoUsr)==1){
                        $datoC=$conexion->insertar("cliente","nom_cli","'{$_POST['user']}'");  //Se le insertara en la tabla cliente el nombre usuario si viene desde el registro
                        $carritoInsert=$conexion->insertar("carrito","nom_cli","'{$_POST['user']}'");
                        $pedInsert=$conexion->insertar("pedido","nom_cli","'{$_POST['user']}'");

                        $carritoCon=$conexion -> consulta('carrito','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito aCTIVO
                        $pedConst=$conexion -> consulta('pedido','*'," nom_cli='$nomUser' AND estado = 1"); //Carrito pedido
                        
                        if($carritoCon > 0 && $pedConst>0){
                           $CarritoEstaPedido= $conexion->insertar("esta","id_ped,id_cart","{$pedConst[0][0]},{$carritoCon[0][0]}");
            
                        }
                        
                        $validar=1;
                        
                     }  
  
               }else{
                     $error2="Error usuario";
                     header("location: formulario.php?error2=$error2");  
                  }
            } else{
                  $error2="Error persona";
                  header("location: formulario.php?error2=$error2");  
               }
         }
            else{
               if($tipo==1){
                  $datoC=$conexion->insertar("administrador","nom_admin","'{$_POST['user']}'");
               }else{
                  $datoC=$conexion->insertar("empleado","nom_emp","'{$_POST['user']}'");
               }
               //var_dump($datoC);
               $error="Persona {$_POST['nombre']}, fue ingresada correctamente. " ;
              // header("location: Admin.php?error=$error"); 

            }

     
}
      if($validar==1){ //Si se envio los datos se loguea automaticamente
         session_start();
         $_SESSION['usuario']=$usuario;
         
          //Lo logueo llevandolo a la pagina principal
           if(($datoUsr[0]['tipo'])==3){ //
            //echo "Log automatico";
            //  var_dump($datosC);
              header("location: ../index.php");
          
          }
         
       }  
}
      


?>