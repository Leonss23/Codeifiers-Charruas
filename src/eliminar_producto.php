<?php

    include ('includes/bd.php');
    $conexion = new Conexion();
    session_start(); 
    $session = $_SESSION['usuario'];
    $conn = $conexion -> connexc();
    $cart=$conexion -> consulta('carrito','*',"nom_cli = '$session' AND estado = 1");
    $id = $_POST['id'];
   

    /*realizo una consulta para obtener la cantidad de productos que hayan en el id que recibi por post*/ 
    $data = $conn->query("SELECT * FROM tiene_producto")->fetchAll();


    $sql = $conn->prepare("DELETE FROM tiene_producto WHERE id_cart = ? AND id_prod = ?");
    $sql->execute(["{$cart[0][0]}",$id]);
   // echo "Eliminado con exito. {$sql}";
?>