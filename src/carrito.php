<?php
    //error_reporting(0);

   
    include ('validacion.php');
    $conexion = new Conexion();

    session_start(); 
    $nomUser=$_SESSION['usuario'];

    if(isset($nomUser)){
        $usuario=$conexion -> consulta('usuario','*'," nom_usr='$nomUser'");
        $persona=$conexion -> consulta('persona','*'," ci='{$usuario[0][3]}'");
   
    $nombre= ucfirst(utf8_decode($persona[0][1]));
    $apellido= ucfirst(utf8_decode($persona[0][2]));
    $cart_cant=$conexion -> consulta('productos_carrito','COUNT(id_prod) Cantidad',"Cliente = '{$nomUser}'"); //Carrito aCTIVO

    }
               
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AZ4io7vie-biTXKJG9BhTzEhrUCp3pZapVTmKuEoAtfIsvB2KZJkraI8KqpvNp1z7ySm2X3NPf2PbXY_&currency=USD"></script>
    
    <title>Charrúa - Carrito</title>

    <link rel="icon" href="../public/assets/img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/cart.css">
</head>
<body>
<?php 
include('../src/includes/header.php');
?>
    <!--Titulo de los articulos-->
    <div class="titulo">
	<h1 class="title">Su pedido&nbsp/
        <h2 id="cantidad_carrito"><?php echo "{$cart_cant[0][0]}";?></h2>
    </h1>

    </div>
    <div class='container_carrito' id='container_carrito'>
    </div>
       

    
<div class="historial" id="historial">
    <div class="titulo_historial">
	    <h1 class="title">Su historial</h1>
    </div>
    <table class="table" >
                                   
    <thead class="table caption-top" >
                                           
        <tr>
             <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th></th> 
        </tr>
    </thead>
        <tbody style="color:black">
             <tr>
                                                  
                <?php
                $cart=$conexion -> consulta('pedidos_cliente','*',"Cliente = '$nomUser'");
                foreach($cart as $row){
                    $totalprice += $row["Precio"];
                 if(substr($row['Imagen'], 0, 4) == "http")
                 {
                     $imagen_src = $row['Imagen'];
                 }else 
                 {
                     $imagen_src = "../public/assets/img/Vinos/" . $row['Imagen'];
                 }
                 //echo $precio_total[0];
                // echo $precio_total['precio_total'];

                echo "<tbody style='color:black'>";
                echo "<tr>";
                 echo '<th>'.$row['Producto'].'</th>';
                 echo '<th>'.$row['Cantidad'].'</th>';
                 echo '<th>'.$row['Fecha'].'</th>';
                  echo"</tr>";
                  echo "</tbody>";

             }
                ?>                
            </tr>
        </tbody>
    </table>

    <div class='boton_pago'>
        <a href='realizar_pago.php'>Realizar Pago</a>
     </div>
</div>

    <?php
include('../src/includes/footer.php');
?>
        <script src="../public/js/main.js"></script>
        <script src="../public/js/script_shop_loaded.js"></script>
        <script src="../public/js/añadir_producto.js"></script>
        <!--<script src="../market_struct/metodo_pago.js"></script> -->

      
       
</body>
</html>
<script>
    

</script>