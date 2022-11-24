
<header>
 
        <div class="container">
    <?php
    if(basename($_SERVER['PHP_SELF'])!='index.php'){
        echo '
        <div class="img-logo">
        <img class="logo" src="../public/assets/img/Logo/Logo Letras Charrua Blanco.png" alt="charruas" width="300" height="80">
        </div>
        <div class="img-logo-mobile">
        <img class="logo-mobile" src="../public/assets/img/Logo/Logo_Charruas_Contorno.png" alt="charruas">
        </div>
        ';
    }else{
        echo '
        <div class="img-logo">
        <img class="logo" src="assets/img/Logo/Logo Letras Charrua Blanco.png" alt="charruas" width="300" height="80">
        </div>
        <div class="img-logo-mobile">
        <img class="logo-mobile" src="assets/img/Logo/Logo_Charruas_Contorno.png" alt="charruas">
        </div>
        ';
    }
    
    ?>

           <i class="fa-solid fa-bars" id="menu_despl"></i>
           <div class="portrait_menu">

          
          <nav class="nav">
                <ul id="menu">
                <?php 
                    if(basename($_SERVER['PHP_SELF'])!='index.php'){
                        echo '
                        <li><a href="../index.php">INICIO</a> </li>

                        ';
                    }
                    ?>
                    <li><a href="#">INSTITUCIONAL</a> </li>
                    <li><a href="#">QUIENES SOMOS</a> </li>
                    <?php 
                    if(basename($_SERVER['PHP_SELF'])!='Catalogo.php'){
                        if(basename($_SERVER['PHP_SELF'])=='index.php'){
                        echo '
                        <li><a href="../src/Catalogo.php">CATALOGO</a> </li>

                        ';}else{
                            echo '
                            <li><a href="Catalogo.php">CATALOGO</a> </li>
    
                            ';
                        }
                    }
                    ?>
                    <li><a href="#contacto" id="id_footer">CONTACTO</a> </li>  
                    <?php
                        if(basename($_SERVER['PHP_SELF'])=='Catalogo.php'){
                            echo '
                            <input type="text" class="form-control mb-3" name="buscar_producto" id="buscar_producto" placeholder="Buscar Producto">

                            ';
                                    }                   
                    ?>       
                    <?php                
                        if(isset($_SESSION['usuario']) && $usuario[0][2]==1){
                            //SOLO ES ADMIN
                            if(basename($_SERVER['PHP_SELF'])!='index.php'){
                            echo "&nbsp;&nbsp;<li><a href='Admin.php'>PANEL ADMIN</a> </li>";
                            }else{
                                echo "&nbsp;&nbsp;<li><a href='../src/Admin.php'>PANEL ADMIN</a> </li>";
                            }
                        }else if(isset($_SESSION['usuario']) && $usuario[0][2]==2){
                             //SOLO ES EMPLEADO
                             if(basename($_SERVER['PHP_SELF'])!='index.php'){
                             echo "&nbsp;&nbsp;<li><a href='productos.php'>GESTIONAR PORDUCTOS</a> </li>";
                             }else{
                                echo "&nbsp;&nbsp;<li><a href='../src/productos.php'>GESTIONAR PORDUCTOS</a> </li>";

                             }
                        }

                    ?>
                    
                </ul>
             
                        <?php
                        if(isset($_SESSION['usuario'])){
                            if(basename($_SERVER['PHP_SELF'])!='index.php'){
                                            
                                                echo "
                                                    <div class='cuenta'> 
                                                        <div class='logout'>
                                                            <div class='red-circle circle'> </div>
                                                                <a href='cerrar-sesion.php'>Salir</a>
                                                        </div>
                                    
                                                    </div>
                                                ";
                            }else{
                                echo "
                                <div class='cuenta'> 
                                    <div class='logout'>
                                        <div class='red-circle circle'> </div>
                                            <a href='../src/cerrar-sesion.php'>Salir</a>
                                    </div>
                
                                </div>
                            "; 
                            }                   
                        }
                                            
                        ?>
             
            </nav>
            <?php
                           
            ?>
            </div>
            <div class="userPC">
            
            <!--Funciones de PHP con tema de logueo y tipo de cliente-->
            <?php            
             
                if(isset($_SESSION['usuario'])){
                    if($usuario[0][2]==3 || $usuario[0][2]==2 || $usuario[0][2]==1){ 
                        //Cambio el icono por icono log*/
                        if(basename($_SERVER['PHP_SELF'])=='index.php'){
                       echo "<div class='iconos'>
                                <a href='../src/Account.php' title='Mi Cuenta'>
                                <i class='fa-solid fa-user-check' title='Mi Cuenta'></i> 
                                </a>
                                </div>
                            
                            
                            ";

                    }else{
                        echo "<div class='iconos'>
                        <a href='Account.php' title='Mi Cuenta'>
                        <i class='fa-solid fa-user-check' title='Mi Cuenta'></i> 
                        </a>
                        </div>
                    
                    
                    ";
                    }
                       

                        
                    }
                }else{ //Si no existe Inicio de Sesion, le muestra para iniciarla
                    if(basename($_SERVER['PHP_SELF'])=='index.php'){
                        echo "<a href='../src/formulario.php'><i class='fa-solid fa-user' title='Ir al formulario'></i></a>
                        ";
                    }else{
                        echo "<a href='../src/formulario.php'><i class='fa-solid fa-user' title='Ir al formulario'></i></a>
                        ";
                    }
                    }
            ?>
		
    <?php
                        if(isset($_SESSION['usuario']) && $usuario[0][2]==3){//Muestro el carrito
                            $cart=$conexion -> consulta('productos_carrito','COUNT(id_prod) Cantidad'," Cliente = '{$_SESSION['usuario']}'"); //Carrito aCTIVO
                               
                            if(basename($_SERVER['PHP_SELF'])!='carrito.php'){
                             
                                if(basename($_SERVER['PHP_SELF'])=='index.php'){ 
                                    echo "
                                    <!--Muestro opcion de carrito-->
                                    <a href='../src/carrito.php'>
                                    <div class='carrito'>
                                        <i class='fa-solid fa-bag-shopping' title='Ver Carrito'></i>
                                        <p class='cantidad' id='cantidad_carrito'>".$cart[0][0]."</p>
                                    </div> 
                                    </a>
                                    
                                    ";
                                }else{

                                    echo "
                                    <!--Muestro opcion de carrito-->
                                    <a href='carrito.php'>
                                    <div class='carrito'>
                                        <i class='fa-solid fa-bag-shopping' title='Ver Carrito'></i>
                                        <p class='cantidad' id='cantidad_carrito'>".$cart[0][0]."</p>
                                    </div> 
                                    </a>
                                    
                                    "; 
                                }
                        }
                         }
    ?>
          
    
            </div>
    
          
                       
                    
                        </div>

        </div>


    </header>
 
