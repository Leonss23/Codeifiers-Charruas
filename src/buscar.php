<?php 
  error_reporting(0);
  include ('validacion.php');
  $busqueda_producto =$_POST['busqueda_producto'];
  $busqueda_persona= $_POST['busqueda_persona'];
  

  if(isset($busqueda_producto))
  {
    //todo el codigo para buscar productos
 
      $producto = $conexion -> consulta("producto","*"," tipo LIKE '%{$busqueda_producto}%' or nombre LIKE '%{$busqueda_producto}%'
      or precio LIKE '%{$busqueda_producto}%' or id_prod LIKE '%{$busqueda_producto}%' or fec_alta LIKE '%{$busqueda_producto}%' or stock LIKE '%{$busqueda_producto}%'");

      foreach($producto as $p)
      {
        echo '<tr>';
        echo  "<th><img class='img_prod' src='" . $p['imagen'] . "' style='width: 5vw; height: 10vh; object-fit: fill;'></th>";
        echo "<th>".$p['nombre']."</th>";
        echo "<th>".$p['precio']."</th>";
        echo "<th>".$p['tipo']."</th>";
        echo "<th>".$p['fec_alta']."</th>";
        echo "<th>".$p['stock']."</th>";
        echo "<th title='Editar'> <a href='actualizarProducto.php?id={$p[0]}' class='btn btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th><th title='Inhabilitar'><a href='deleteProducto.php?id={$p[0]}' class='btn btn-danger'><i class='fa-regular fa-trash-can'></i></a></th>                                        ";
        echo '</tr>';
      }
    
  }else 
    if(isset($busqueda_persona))
  {

      $sql = $conexion -> consulta("persona","*","  nombre LIKE '%{$busqueda_persona}%'
      or ci LIKE '%{$busqueda_persona}%' or apellido LIKE '%{$busqueda_persona}%' or fec_nac LIKE '%{$busqueda_persona}%'");

      foreach($sql as $p)
      {
        echo '<tr>';
        echo "<th>".$p['ci']."</th>";
        echo "<th>".$p['nombre']."</th>";
        echo "<th>".$p['apellido']."</th>";
        echo "<th>".$p['direccion']."</th>";
        echo "<th>".$p['telefono']."</th>";
 
         
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
      
   
        echo "<th>".$tipo."</th>";
        echo "<th>".$estado."</th>";
        echo "
        <th title='Editar'> <a href='actualizar.php?id=$p[0]' class='btn btn-info'><i class='fa-solid fa-pen-to-square'></i></a></th>                                    
        <th title='Inhabilitar'><a href='delete.php?id=$p[0]' class='btn btn-danger' name='eliminar'><i class='fa-solid fa-triangle-exclamation'></i></a></th>   
        <th title='Activar'><a href='active.php?id=$p[0]' class='btn btn-success' name='activar'><i class='fa-regular fa-circle-check'></i></a></th>                                   
    
        ";
        echo '</tr>';
      
      
    }

      
    
  }

?>
