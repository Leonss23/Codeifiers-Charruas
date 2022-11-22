

<header>
        <i class="fa-solid fa-bars" id="menu_despl"></i>
        <div class="portrait_menu">
            <div class="container-header">


            <div class="content-categ">
            <a href="../index.php">
            <div class="categoria" id="categoria">
            <p style="display: flex; flex-direction: column; align-content: center; justify-content: center; align-items: center;">
                <img src="../public/assets/img/Logo/Logo Charruas.png" style="width: 30px; height: 30px;">
            Ir al inicio </p>
            </div>
            </a>
            <?php
            if(isset($session)){
    
                $nomUser=$_SESSION['usuario'];
            
                $usuario=$conexion -> consulta('usuarios','*'," nom_usr='$nomUser'");
                $producto=$conexion -> consulta('productos','*',"");
                $personaLog=$conexion -> consulta('persona',"*"," ci='{$usuario[0][3]}'");
                   $persona=$conexion -> consulta('persona','*',"");
                   $nombre= utf8_decode($personaLog[0][1]);
                   $apellido= utf8_decode($personaLog[0][2]);

            if(isset($session) && $usuario[0][2]==1){
                if(basename($_SERVER['PHP_SELF'])=='Admin.php'){

                    echo '
                    <div class="categoria" id="categoria" onclick="show_container_new_user()">
               
                    <p>
                    <i class="fa-solid fa-user-plus" ></i>
                    Usuario  </p> 
                    
                </div>
                    <div class="categoria" id="categoria">
                    <a href="productos.php">
                        <p>
                            <i class="fa-solid fa-wine-bottle" id="productos" ></i>
                        Productos  </p> 
                        </a>
                    </div>
                    ';
                }else{
                    echo '
                    <div class="categoria" id="categoria">
                    <a href="Admin.php">
                        <p>
                            <i class="fa-solid fa-users"  id="users" ></i>
                        Personas </p>
                        </a>
                    </div> ';
                }
                
     

            }
            }else{
                $error="No existe Inicio de Sesion";
                header("location: formulario.php?error=$error");
                die();
            }
                ?>

                <div class="categoria" id="categoria">
                    <p  onclick="usuarios()">
                        <i class="fa-solid fa-chart-line"></i>
                    Estadisticas </p>
                </div>
            </div>
            
            </div>
           
                <div class="account">
                    <nav class="nav">
                        <ul id="menu">
                        
                            <li><h2 class="title"> <?php echo "{$nombre} {$apellido}"; ?> <i class="fa-solid fa-angle-down" style="font-size: 17px; margin-left: 10px;"></i></h2>
                                <ul>
                                    <li id="ir_account"><a href="Account.php"><i class="fa-solid fa-circle-user"></i>Mi Cuenta</a></li>
                                    <li id="cerrar_sesion"><a href="cerrar-sesion.php"><i class="fa-solid fa-power-off"></i>Salir</a></li>
                                </ul>
                            </li>
                    
                        </ul>
                    </nav>
                    
                    
                </div>
                </div>
            </div>
            
        </header>