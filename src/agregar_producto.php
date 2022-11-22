<?php
    include ('includes/bd.php');
    $conexion = new Conexion();
    session_start(); 
    $session = $_SESSION['usuario'];
    $conn = $conexion -> connexc();
    $id = $_POST['id'];
   
    $cart=$conexion -> consulta('carrito','*',"nom_cli = '$session' AND estado = 1");
    $prod=$conexion -> consulta('tiene_producto','id_prod,cantidad',"id_cart = {$cart[0][0]} AND id_prod = {$_POST['id']}");
    //var_dump($prod);
    if($prod[0]['id_prod'] == $id){    //SI tiene producto de misma id, sumo la cantidad

    $suma = $_POST['cantidad'] + $prod[0]['cantidad'];
 
     $sql = "UPDATE tiene_producto SET cantidad=? WHERE id_cart='{$cart[0][0]}' AND  id_prod=?";
     $valor = $conn->prepare($sql)->execute([$suma, $id]);

    // echo "UPDATE DATABASE realizado con exito. {$valor}";
}else{   /*Agreggo producto a BD si no lo tiene*/
    $cantidad = $_POST['cantidad'];
     $sql = $conn->prepare("INSERT INTO tiene_producto (id_cart, id_prod, cantidad) VALUES (?,?,?)");
     $sql->execute(["{$cart[0][0]}",$id,$cantidad]);

     $sql2 = $conn->prepare("INSERT INTO esta (id_cart, id_prod) VALUES (?,?)");
     $sql2->execute(["{$cart[0][0]}",$id]);
    //echo "INSERT con exito";

}
    
 

 