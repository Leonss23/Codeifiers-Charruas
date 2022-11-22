<?php 
    include ('validacion.php');
       /// include ('../Conexion/bd.php');
   //$conexion = new Conexion();
   // $conn = $conexion -> connexc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Administrador</title>
    <link rel="icon" href="../public/assets/img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/Panel-Admin.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="../public/js/search_persona.js"></script>
 
</head>

<body >
<?php 
    include('includes/headerAdmin.php');
?>
<div class="contenido" id="content"> <!--Lista de Usuarios--> 
<div class="container mt-5" id="Usuarios" > <!--Separa de los borde-->
                    <div class="row"><!--Divide en 2 partes-->
                        
                        <div class="col-md-3" > <!--Da el tamaño a las columnas-->
                            <h2>Nueva Persona</h2>
                            <?php 
                               if(isset($_GET['error'])){
                                echo '
                                   <div class="alert alert-danger d-flex align-items-center" charruase="alert">
                                   <strong class="error">
                                   '.$_GET['error'].' </strong>
                                  
                                   </div>';
                           
                               }
                               if(isset($_GET['msg']))
                               {
                                  echo '
                                      <div class="mensaje">
                                          <strong class="error">
                                              '.$_GET['msg'].' </strong>
                                      </div>';
                                             
                              }
                               ?>
                                <form action="insertar.php" method="POST" data-aos="zoom-in-right" data-aos-duration="2000">
                                    <input type="text" class="form-control mb-3" name="cedula" placeholder="Cedula" minlength="7" maxlength="8" required value="56987432">

                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" required value="orlando">
                                    <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido" required value="lopez">
                                    <input type="text" class="form-control mb-3" name="tel" placeholder="Telefono" minlength="8" maxlength="9" required value="099568954">
                                    <input type="date" class="form-control mb-3" name="nac" placeholder="Fecha de Nacimiento" required >
                                    <input type="text" class="form-control mb-3" name="direc" placeholder="Direccion" value="">
                                    <input type="text" class="form-control mb-3" name="user" placeholder="Usuario" required value="prueba9">
                                    <input type="text" class="form-control mb-3" name="password" placeholder="Contraseña" required value="1212">
                                    <div style="display: flex; justify-content: space-between;">
                                    <input type="text" class="form-control mb-3" name="tipo" placeholder="Tipo: " disabled style="width:100px;"> 
                                    <select name="seleccionar" id="" style="height:40px;">
                                    <option value="1">1-Administrador</option>
                                    <option value="2" selected>2-Empleado</option>
                                    </select>  
                                    </div> 

                                    <input type="submit" name="register" class="btn btn-primary">
                                </form>
                        </div>
                        
                        <div class="col-md-8" >
                            <table class="table" style="text-align: center;">

                                <thead class="table caption-top" >
                                    <input id="search_personas" type="search" class="form-control mb-3 search" placeholder="Buscar Personas">

                                    <tr>
                                        <th>CI/DNI</th> 
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
                                        <th>Celular</th>
                                        <th>Cargo</th>
                                        <th>Estado</th>
                                        <th></th>
                                        <th></th>      
                                        
                                    
                                   
                                    </tr>
                                </thead>

                            <tbody id="cuerpo_tabla_persona"   data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="600"
     data-aos-duration="1000">

                                

                                        <?php
                                          $persona=$conexion->consulta("persona","*","");
                                        //$contador=0;
                                        foreach($persona as $p)
                                        {
                                          echo '<tr data-aos="fade-up"
                                          data-aos-anchor-placement="center-bottom">';
                                          echo "<th>".$p['ci']."</th>";
                                          echo "<th>".$p['nombre']."</th>";
                                          echo "<th>".$p['apellido']."</th>";
                                          echo "<th>".$p['direccion']."</th>";
                                          echo "<th>".$p['telefono']."</th>";
                                   
                                        
                        
                                $usuario=$conexion->consulta("usuarios","*"," ci = '{$p[0]}'");
                               
                                //Muestro el tipo de usuario que son
                                
                                if($usuario[0]['tipo']==1){
                                    $tipo = "Admin";
                                }else if($usuario[0]['tipo']==2){
                                    $tipo = "Empleado";
                                }else{
                                    $tipo = "Cliente";
                                }
                                   //Muestro Si el usuario está Activo o Inactivo
                                   
                                
                                if($usuario[0]['estado']==1){
                                    $estado= "<p class='estadoA'>Activo</p>";
                                }else if($usuario[0]['estado']==0){
                                    $estado = "<p class='estadoB'>Inactivo</p>";
                                }
                               echo "<th> {$tipo} </th>";                         
                               echo "<th> {$estado} </th>";
                    
                        echo "
                        <th title='Editar'> <a href='actualizar.php?id=$p[0]' class='btn btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>                                    
                        <th title='Inhabilitar'><a href='delete.php?id=$p[0]' class='btn btn-danger' name='eliminar'><i class='fa-solid fa-triangle-exclamation'></i></a></th>   
                        <th title='Activar'><a href='active.php?id=$p[0]' class='btn btn-success' name='activar'><i class='fa-regular fa-circle-check'></i></a></th>           
                                                        
                    
                        ";
                    echo '</tr>';
                    

                            
                    }
                                        ?>
                                          
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
</div>

            <div id="new-user">
                <div id="container_new_user">
                <i class="fa-solid fa-xmark" id="close_cart" onclick="hidden_container_new_user()"></i>
                <form action="new_user.php" method="POST">
                    <p>Persona:</p>
                    <?php 
                               if(isset($_GET['error2'])){
                                echo '
                                   <div class="alert alert-danger d-flex align-items-center" charruase="alert">
                                   <strong class="error">
                                   '.$_GET['error2'].' </strong>
                                  
                                   </div>';
                           
                               }
                               ?>
                    <select name="SelectPersona" id="" style="height:40px;">
                        <?php
                            foreach($persona as $per){

                                 echo "
                                     <option name='UserCI' value='{$per['ci']}'>{$per['ci']} - {$per['nombre']} </option>
                                ";
                                                     
                                    
                            }
                            ?>
                    </select> 
                    <input type="text" class="form-control mb-3" name="user" id="usuario_new_user" placeholder="Usuario" required >
                    <input type="hidden" class="form-control mb-3" name="password" placeholder="Contraseña" value="123456">
                        <div style="display: flex; " >
                            <input type="text" class="form-control mb-3" name="tipo" placeholder="Tipo: " disabled style="width:100px;"> 
                                <select name="seleccionar" id="seleccionar">
                                    <option value="3">Cliente</option>
                                </select>  
                        </div> 
                        <input type="submit" name="register_user" class="btn btn-primary">
                </form>
                </div>

            </div>

   
                            

                                    <script src="../public/js/main.js"></script>
                                    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                                    <script>
                                        AOS.init();
                                    </script>
            
                </body>
                </html>