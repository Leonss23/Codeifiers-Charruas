<?php 
require('includes/bd.php');
    $conexion = new Conexion();
$id=$_GET['id'];
$producto=$conexion -> consulta('producto','*'," id_prod='$id' ");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <h3>Actualizar datos de Producto</h3>
                
                    <form action="updateProducto.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo "{$producto[0][0]}";  ?>">
                                
                                
                                <p>ID:</p><input type="text" class="form-control mb-3" name="id_prod" placeholder="ID Producto" value="<?php echo $producto[0][0];  ?>"disabled>
                                <p>Nombre:</p> <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $producto[0][1];  ?>">
                                <p>Tipo:</p><input type="text" class="form-control mb-3" name="tipo" placeholder="Tipo" value="<?php echo $producto[0][4];  ?>">
                                <p>Precio:</p><input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?php echo $producto[0][2];  ?>">
                                <p>Descripcion:</p><input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $producto[0][5];  ?>">
                                <p>Fecha de Alta:</p><input type="text" class="form-control mb-3" name="fecha" placeholder="Fecha" value="<?php echo $producto[0]['fec_alta'];  ?>"disabled>
                                <p>Imagen:</p><input type="text" class="form-control mb-3" name="imagen" placeholder="Imagen" value="<?php echo $producto[0][3];  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>