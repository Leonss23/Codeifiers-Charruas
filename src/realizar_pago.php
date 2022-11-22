<?php

//Cuenta paypal: sb-omem615277760@personal.example.com
//Contraseña: codeifiers

    error_reporting(0);
    include ('includes/bd.php');
    $conexion = new Conexion();
    $conn = $conexion -> connexc();
 session_start(); 
 $nomUser=$_SESSION['usuario'];

    session_start(); 
    $nomUser=$_SESSION['usuario'];

    if(isset($nomUser)){
        $usuario=$conexion -> consulta('usuario','*'," nom_usr='$nomUser'");
        $persona=$conexion -> consulta('persona','*'," ci='{$usuario[0][3]}'");
   
    $nombre= ucfirst(utf8_decode($persona[0][1]));
    $apellido= ucfirst(utf8_decode($persona[0][2]));
    $cart_cant=$conexion -> consulta('productos_carrito','COUNT(id_prod) Cantidad',""); //Carrito aCTIVO

    }
               
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>    
    <title>Charrúa - Carrito</title>

    <link rel="icon" href="../img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <link rel="stylesheet" href="../public/css/cart.css">
</head>
<body>
<?php 
include('includes/header.php');
?>
    <!--Titulo de los articulos-->
    <div class="titulo">
	<h1 class="title">Detalles del Pago
    </h1>

    </div>
    <div class='realizar_pago' id='container_carrito'>
        <?php
        
        $cart = $conn->query("SELECT * FROM productos_carrito WHERE Cliente = '$nomUser'")->fetchAll();
        //Carrito aCTIVO
     
                $totalprice = 0; // cree una variable para guardar el precio total, cada vez que se carga un producto al carrito, agregas el precio total de cada producto a esta variable, ya esta capo q tanto drama.
               echo "
            
               <div class='container_cart_pago' id='container_cart'>
                   <table class='table' >
                                          
                        <thead class='table caption-top' >
                                                      
                           <tr>
                               <th>Producto</th>
                                  <th></th>
                                  <th>SubTotal</th>     
                                                                                
                           </tr>
                        </thead>
                        <tbody  id='content_cart' style='color:black'>
               ";
                foreach($cart as $row){
                    $totalprice += $row["Precio"];
                 if(substr($row['Imagen'], 0, 4) == "http")
                 {
                     $imagen_src = $row['Imagen'];
                 }else 
                 {
                     $imagen_src = "../img/Vinos/" . $row['Imagen'];
                 }
                 //echo $precio_total[0];
                 //echo "{$precio_total[0]['Precio']}";
     
                echo "
     
                <tr>
                 <th><div class='imagen_vino''><img class='img_prod' src='". $imagen_src . "'></div></th>
                 <th>".$row['Nombre']."</th>
                <th>$".$row['Precio']."</th>
                  </tr>
        
                  ";
           
     
             }
             $dolar= 42;
             $total = $totalprice/$dolar;
            
             echo "
             </tbody>
             <tbody>
            <tr style='background: #8080801f; height: 8vw;'>
            <th>TOTAL:<th>
            
            <th>$".$totalprice."<th>
            </tr>
             </tbody>
                  
     
             </table>
         
         </div>
     
     
             ";
            
        ?>
   
        
         <script src="https://www.paypal.com/sdk/js?client-id=AZ4io7vie-biTXKJG9BhTzEhrUCp3pZapVTmKuEoAtfIsvB2KZJkraI8KqpvNp1z7ySm2X3NPf2PbXY_&currency=MXN"></script>

        <script>
paypal.Buttons({
    style:{
    color: 'blue',
    shape: 'pill',
    label: 'pay'
},
    // Agregar transaccion
    createOrder: function(data, actions) {
    return actions.order.create({
    purchase_units: [{
        amount: {
            value: <?php echo "$totalprice"; ?>  //Valor a pagar php echo "$totalprice"; ?>
        }
    }]
    });
    },
        
                onApprove: function(data, actions) { //Capturo el pedido
                actions.order.capture().then(function(detalles) {
                    //console.log(<?php echo "{$row['id_prod']}"; ?>,"</br>");
                    
    fetch('pagar.php',
    {
      method: 'POST',
      body: data
    })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error";
      }
    })
    .then(function (texto) {
      console.log(texto);      
    
    })
    .catch(function (err) {
      console.log(err);
    });


                });
            },
            onCancel: function(data) { //Si cancela el pedido
                //console.log(`Orden cancelada`,data);
                    }

}).render('#paypal-button-container');
        </script>

    </div>
    <div id="container_button_pay">
        <div id="paypal-button-container"></div>
        </div>
       


    <?php
include('includes/footer.php');
?>
        <script src="../public/js/main.js"></script>
        <script src="../public/js/añadir_producto.js"></script>

       
</body>
</html>