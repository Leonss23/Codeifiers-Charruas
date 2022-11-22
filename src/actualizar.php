<?php 
 include ('validacion.php');
    if(isset($session)){
        if(isset($_GET['cod'])){
            $id= $_GET['cod'];
        }else{
        $id=$_GET['id'];
        }
        $persona=$conexion -> consulta('persona','*',"ci= {$id}");
        $usuario=$conexion -> consulta('usuario','*'," nom_usr='{$session}'");

    }else{
        $error="No existe Inicio de Sesion";
        header("location: formulario.php?error=$error");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <style>
            body{
                user-select: none;
            }
            p#change_password{
                color: black;
            }
            p#change_password:hover{
                cursor: pointer;
                text-decoration: underline;
            }

        </style>
                        
    </head>
    <body>

                <?php
                //Si es Admin le habilito todos los datos
                if($usuario[0][2]==1){
                    echo "
                    <div class='container mt-5'>
                    <h3>Actualizar Datos</h3>
                    ";
                    if(isset($_GET['error'])){
                        echo '
                           <div class="mensaje">
                           <strong class="error">
                           '.$_GET['error'].' </strong>
                           
                           </div>';
                   
                       }
                echo "
                   <form action='update_persona.php' method='POST'>
                    
                                <input type='hidden' name='id' value='{$persona[0][0]}'>
                                
                                <p>Usuario:</p><input type='text' class='form-control mb-3' name='user' placeholder='Usuario' value='{$persona[0][0]}'>
                                <p>Nombre:</p> <input type='text' class='form-control mb-3' name='nombre' placeholder='Nombres' value='{$persona[0][1]}'>
                                <p>Apellido:</p><input type='text' class='form-control mb-3' name='apellido' placeholder='Apellidos' value='{$persona[0][2]}'>
                                <p>Telefono:</p><input type='text' class='form-control mb-3' name='telefono' placeholder='Telefono' value='{$persona[0][4]}'>
                                <p>Direccion:</p><input type='text' class='form-control mb-3' name='direccion' placeholder='Direccion' value='{$persona[0][3]}'>
                               
                            <input type='submit'class='btn btn-primary btn-block' value='Actualizar' >

                    </form>
                </div>
                    ";
                }else{
                    echo "
                    <div class='container mt-5'>
                    <h3 id='titulo'>Actualizar Datos</h3>
                ";
                if(isset($_GET['error'])){
                    echo '
                       <div class="mensaje">
                       <strong class="error">
                       '.$_GET['error'].' </strong>
                       
                       </div>';
               
                   }
                echo"
                    <form action='update_persona.php' method='POST'>
                    
                                <input type='hidden' name='id' value='{$persona[0][0]}'>
                                <div id='todo'>
                                <p>Usuario:</p><input type='text' class='form-control mb-3' name='user' placeholder='Usuario' value='{$persona[0][0]}' disabled>
                                <p>Nombre:</p> <input type='text' class='form-control mb-3' name='nombre' placeholder='Nombres' value='{$persona[0][1]}'>
                                <p>Apellido:</p><input type='text' class='form-control mb-3' name='apellido' placeholder='Apellidos' value='{$persona[0][2]}'>
                                <p>Telefono:</p><input type='text' class='form-control mb-3' name='telefono' placeholder='Telefono' value='{$persona[0][4]}'>
                                <p>Direccion:</p><input type='text' class='form-control mb-3' name='direccion' placeholder='Direccion' value='{$persona[0][3]}'>
                                
                                <p id='change_password'>Cambiar Contraseña</p>
                                </div>
                                <p id='pass_previus' style='display: none;'>Contraseña anterior:</p><input type='text' class='form-control mb-3' id='pass_previus_input' name='pass_previus' placeholder='Contraseña anterior' style='display:none;'>
                                <p id='pass_after' style='display: none;'>Contraseña Nueva:</p><input type='text' class='form-control mb-3' id='pass_after_input' name='pass_after' placeholder='Contraseña Nueva' style='display:none;'>

                                <input type='submit' id='SubmitDatos'  class='btn btn-primary btn-block' value='Actualizar' style='margin-top: 5vh;'>
                                <input type='submit' id='SubmitPass' class='btn btn-primary btn-block'  name='SubmitPass' value='Actualizar' style='display: none;'>

                    </form>
                </div>
                    ";
                }
            
                ?>

    </body>
</html>

<script>
//Actualizar.php (Cambiar contraseña)


let change_pass=document.getElementById("change_password")
//console.log(change_pass);
function change_password(){
    let pass_prev = document.getElementById("pass_previus");
    pass_prev.style.display="block";
    let pass_prev_input = document.getElementById("pass_previus_input");
    pass_prev_input.style.display="block";

    let pass_aft = document.getElementById("pass_after");
    pass_aft.style.display="block";
    let pass_aft_input = document.getElementById("pass_after_input");
    pass_aft_input.style.display="block";

    let div_datos = document.getElementById("todo");
    div_datos.style.display="none";

    let titulo =document.getElementById("titulo");
    titulo.innerHTML="Cambiar contraseña";

    let buttonD= document.getElementById("SubmitDatos");
    buttonD.style.display="none"; 
    let buttonP= document.getElementById("SubmitPass");
    buttonP.style.display="block"; 

}
change_pass.addEventListener("click", change_password);


</script>