<?php 
  include ('validacion.php');
$id = $_GET['id'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 

    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Charruas- Producto</title>
    <link rel="stylesheet" href="../public/css/style_producto.css">
    <link rel="icon" href="../public/assets/img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">

  
</head>
<body>

<?php
    include('../src/includes/header.php');
?>
    <div id="producto_agregado" class="producto_agregado" style="display: none;">
        <i class="fa-solid fa-circle-check" id="icono_check"></i>  
        <h2 id="Agregado_texto">Artículo añadido correctamente a tu compra</h2>
    </div>
 
<?php

    $data = $conn->query("SELECT * FROM productos WHERE id_prod = '{$id}'")->fetchAll();
    session_start(); 
    
    $imagen_src = "";

    foreach($data as $row)
    {
        if(substr($row['imagen'], 0, 4) == "http")
        {
            $imagen_src = $row['imagen'];
        }else 
        {
            $imagen_src = "../public/assets/img/Vinos/" . $row['imagen'];
        }
        echo '
        <div class="contenedor_producto" id="contendor_producto">
        <div class="contenedor_imagen"><img class="img_prod" src="'. $imagen_src . '"></div>
        <div class="content_producto">
        <div class="titulo_producto" id="titulo_producto">
            <b>'.$row['nombre'].'</b>
        </div>
        <div class="contenedor_descripcion" id="descripcion">
        <p>'.$row['descripcion'].'</p>
        </div>
        </div>
        </div>
        ';

      
    }
?>
 

    <?php
    include('includes/footer.php');
?>

      <script src="../public/js/main.js"></script>



</body>
</html>