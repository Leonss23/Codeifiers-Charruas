<?php 
    include ('validacion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Administrador</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="icon" href="../img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/Panel-Admin.css">

 
 
</head>

<body >
<?php 
include('includes/headerAdmin.php');
?>

  <div class="contenido"> <!--Lista de Productos-->
    <div id="mensaje" class="mensaje"  style="display: none;">
 
    <h2 id="Agregado_texto">Artículo añadido correctamente a tu compra</h2>
    </div>
<div class="container mt-5"> <!--Separa de los borde-->
                    <div class="row"><!--Divide en 2 partes-->
                        <?php
                        if(isset($session) && $usuario[0][2]==1){
                            
                       echo' <div class="col-md-3">'; //Da el tamaño a las columnas
                           echo " <h2>Nuevo Producto</h2>";
                            
                               if(isset($_GET['mensaje'])){
                                echo '
                                   <div class="alert alert-danger d-flex align-items-center" charruase="alert">
                                   <strong class="error">
                                   '.$_GET['mensaje'].' </strong>
                                  
                                   </div>';
                           
                               }
                               
                               echo '
                                <form action="insertar_producto.php" method="post" enctype="multipart/form-data" data-aos="zoom-in-right" data-aos-duration="2000">
                                    
                                    
                                    
                                    <input type="text" class="form-control mb-3" name="nombre_Producto" placeholder="Nombre de Producto" required>
                                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" required>

                                    <input type="file" class="form-control mb-3" name="archivoSubido" id="archivoSubido" placeholder="imagen" accept="image/png, image/jpeg">

                                    <div style="display: flex; justify-content: space-between;">
                                    <input type="text" class="form-control mb-3" name="tipo" placeholder="Tipo" disabled style="width:100px;" required>
                                    <select name="seleccionar" id="selecionar_producto" required>
                                        <option value="blanco">Blanco</option>
                                        <option value="rosado">Rosado</option>
                                        <option value="tinto">Tinto</option>
                                        <option value="espumoso">Espumoso</option>
                                        <option value="generoso">Generoso</option>
                                   </select>
                                   
                                    </div>
                                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" required>
                                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Cantidad" required>
                                    
                                    
                                    <a href="productos.php"><input type="submit" class="btn btn-primary" name="submit" id="CargarProductos"></a>
                                </form>
                            </div>
                            ';
                            }
                            ?>
                         
                        <?php
                        if($usuario[0][2]==2){
                            echo '<div class="col-md-8" style="height: 100vh;">';
                        }else{
                            echo '<div class="col-md-8" style="height: 40vh;">';
                        }
                        ?>
                        

                            <table class="table" style="text-align: center;">
                                <thead class="table caption-top" >

                                    <input id="search_products" type="search" class="form-control mb-3 search" placeholder="Buscar Producto">
                                    
                                        

                                    </form>

                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Tipo</th>
                                        <th style="width: 10vw;">Fecha Alta</th>
                                        <th>Stock</th>
                                        <th></th>
                                        <th></th>      
                                        
                                    
                                   
                                    </tr>
                                </thead>

                                <tbody id="cuerpo_tabla_productos"  data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="600"
     data-aos-duration="1000">
                                
                                        <?php
            //_productos
            if(isset($_GET['mensaje'])){
                echo '
                   <div class="alert alert-danger d-flex align-items-center" charruase="alert">
                   <strong class="error">
                   '.$_GET['mensaje'].' </strong>
                  
                   </div>';
           
               }
                                                      
                                 foreach($producto as $p){
                                   
                                        echo '<tr>';
                                        echo  "<th><img class='img_prod' src='" . $p['imagen'] . "'></th>";
                                        echo "<th>".$p['nombre']."</th>";
                                        echo "<th>".$p['precio']."</th>";
                                        echo "<th>".$p['tipo']."</th>";
                                        echo "<th>".$p['fec_alta']."</th>";
                                        if($usuario[0][2]==2){
                                            if($p['stock'] < 10){
                                                echo '<th> <input type="number" id="cantidad'.$p['id_prod'].'" value="'.$p['stock'].'" 
                                                style="width: 100%; height: 10vh; border: 0;  text-align: center; font-size:15px; color: red; background: transparent;"  disabled>
                                            </th>
                                        ';
                                        echo '<th id="agregar_stock"> <input type="hidden" class="cantidad_update" id="cantidad_update'.$p['id_prod'].'"  
                                         placeholder="Agregar stock" >
                                        </th>';
                                            }else{
                                                echo '<th> <input type="number" id="cantidad'.$p['id_prod'].'" value="'.$p['stock'].'" 
                                                style="width: 100%; height: 10vh; border: 0;  text-align: center; font-size:15px; background: transparent;"  disabled>
                                            </th>
                                        ';
                                        echo '<th id="agregar_stock"> <input type="hidden" class="cantidad_update" id="cantidad_update'.$p['id_prod'].'"  
                                        placeholder="Agregar stock" >
                                        </th>';
                                            }
                                           
                                        }else{
                                            echo "<th>".$p['stock']."</th>";
                                        }
                                        
                                        
                                     if($usuario[0][2]==1){ //Si es admin le muestro lo siguiente
                                     echo "
                                        <th title='Editar'> <a href='actualizarProducto.php?id={$p[0]}' class='btn btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>
                                        <th title='Inhabilitar'><a href='deleteProducto.php?id={$p[0]}' class='btn btn-danger'><i class='fa-regular fa-trash-can'></i></a></th>                                        
                                    ";
                                    echo '</tr>';
                                     }else if($usuario[0][2]==2){ //Si es empleado solo vera..
                                        echo"
                                        <th title='Editar' class='btn btn-info'   onclick='habilitar_update({$p['id_prod']});'><i class='fa-solid fa-pen-to-square'></i></th>
                                        <th title='Actualizar' class='btn btn-info'   onclick='update_producto({$p['id_prod']});'><i class='fa-solid fa-download'></i></i></th>
                                        ";
                                     }
                                    }
//actualizarProducto.php?id={$p[0]}
                                        
                               
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                    
            </div>
            </div>
            <script src="../public/js/actualizar_stock.js"></script>
            <script src="../public/js/search.js"></script>
            <script src="../public/js/main.js"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
                                    <script>
                                        AOS.init();
                                    </script>
            
        
</body>
</html>