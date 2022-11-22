<?php
    include ('includes/bd.php');
    $conexion = new Conexion();
    session_start(); 
    $session = $_SESSION['usuario'];
    $conn = $conexion -> connexc();
    $cart=$conexion -> consulta('carrito','*',"nom_cli = '$session' AND estado = 1");
    $id = $_POST['id'];
    $cantidad = 0;

    /*realizo una consulta para obtener la cantidad de productos que hayan en el id que recibi por post*/ 
    $data = $conn->query("SELECT * FROM tiene_producto")->fetchAll();
    
    foreach ($data as $row)
    {
        if(strcmp($row['id_prod'], $id)==0){$cantidad = $row['cantidad'];}
    }

    $cantidad += $_POST['cantidad'];

    /*realizo update*/
    $sql = "UPDATE tiene_producto SET cantidad=? WHERE id_cart='{$cart[0][0]}' AND  id_prod=?";
    $valor = $conn->prepare($sql)->execute([$cantidad, $id]);

    echo "UPDATE DATABASE realizado con exito. {$valor}";