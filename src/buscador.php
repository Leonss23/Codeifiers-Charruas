<?php 
include("includes/bd.php");



$buscardor=mysqli_query($conexion,"SELECT * FROM producto WHERE tipo LIKE LOWER('%".$_POST["buscar"]."%') OR descripcion LIKE LOWER ('%".$_POST["buscar"]."%') "); 
$numero = mysqli_num_rows($buscardor); ?>

<h5 class="card-tittle">Resultados encontrados (<?php echo $numero; ?>):</h5>    
                                  
                                        

<?php while($resultado = mysqli_fetch_assoc($buscardor)){ ?>

<article class="articulos">
 <?php


    ?>

        <?php
        $placeholder_num = 0;
        for ($z = 1; $z <= $placeholder_num; $z++) {
            echo '
            <article clas="articulos">
            <div class="productos">
            <div class="img-product"><img class="img-product" src="https://www.pngkey.com/png/detail/233-2332677_image-500580-placeholder-transparent.png" alt="placeholder img"></div>
            <div class="container-name-product"><h3 class="name-product">Placeholder </h3>' . $z . ' </div>    
            <div class="precios"><p class="price-product"></p></div>
            <div class="inputs">
      
               
            </div>
           
        </div>
        </form>
        </article>
 
      
        ';
        }
        /*?id=<?php echo $row['id_prod']*/

            echo "<form action='carrito.php' method='POST'>";
            echo " <div class='productos'>";
            echo "<div class='img-product'><img class='img-product' src='" .$resultado["imagen"] . "'> </div>"; //Imagen del producto
            echo "<div class='container-name-product'>"; //Contenedor del nombre
            echo "<h3 class='name-product' >" .$resultado["nombre"];  //Nombre
            echo "<div class='container-tipo' style='padding-top: 1em;'><p class='tipo'>Vino ".$resultado["tipo"]."</p> </div>"; //Tipo de vino
            echo "<div class='precios'>"."</h3><p class='price-product'>$" . $resultado["precio"] . "</div>"; //Precio del vino
            echo " <div class='inputs'>
                <input type='number' name='cantidad' id='cantidad' value='1'>
           
                
               
		    </div>"; //Contenedor con los botones
            echo "</div>";
            echo "</form>";
       
         
        }

        

        ?>
         
 </article>

