<?php
    include ('includes/bd.php');
    $conexion = new Conexion();
    $conn = $conexion -> connexc();
 session_start(); 
 $nomUser=$_SESSION['usuario'];
   $cart = $conn->query("SELECT * FROM productos_carrito WHERE Cliente = '$nomUser'")->fetchAll();
   //Carrito aCTIVO

           $totalprice = 0; // cree una variable para guardar el precio total, cada vez que se carga un producto al carrito, agregas el precio total de cada producto a esta variable, ya esta capo q tanto drama.
          echo "
       
          <div class='container_cart' id='container_cart'>
              <table class='table' >
                                     
                   <thead class='table caption-top' >
                                                 
                      <tr>
                          <th>Producto</th>
                             <th></th>
                             <th>Cantidad</th>
                             <th>Precio</th>
                             <th></th>
      
                           <th></th> 
                                             
                                                                           
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
            <th>
            <div class='content_cart_cant'>

            <!--Quitar un producto-->
      
            <div class='circle_content_cart' onclick='restar_producto({$row['id_prod']});'>
            <i class='fa-solid fa-minus'></i>
            </div>
      
             <input type='number' class='cant_cart2' id='cart_cant_prod".$row['id_prod']."'  value='".$row['Cantidad']."' min='1' disabled>
      
             <!--Añadir un producto-->
             
             <div class='circle_content_cart' onclick='agregar_producto({$row['id_prod']});'>
              <i class='fa-regular fa-plus'></i><br> 
              </div>
              </div>
            </th>
           <th>$".$row['Precio']."</th>
           <th><i class='fa-solid fa-xmark' onclick='eliminar({$row['id_prod']});'></i></th>
           
             </tr>
   
             ";
      

        }
        echo "
        </tbody>
             

        </table>
        
    </div>


    </div>

        ";

?>
