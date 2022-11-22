<?php
   
    error_reporting(0);
    include ('../src/includes/bd.php');
    //include('validacion.php');

    $conexion = new Conexion();
    $conn = $conexion -> connexc();
    $data = $conn->query("SELECT * FROM producto  ORDER BY id_prod  ASC LIMIT 4")->fetchAll();
    session_start(); 
    if(isset($_SESSION['usuario'])){
        $session = $_SESSION['usuario'];
        $usuario=$conexion -> consulta('usuarios','*'," nom_usr='$session'");
    }

    $imagen_src = "";
    //echo "<script>console.log('Hola');</script>";
    foreach($data as $row)
    {
        if(substr($row['imagen'], 0, 4) == "http")
        {
            $imagen_src = $row['imagen'];
        }else 
        {
            $imagen_src = "../public/assets/img/Vinos/" . $row['imagen'];
        }

            echo "
            <form id='formulario_producto'>
            <input type='hidden' id='tipo_user' value='".$usuario[0]['tipo']."'>
            <div class='ver_producto' title='Ver ". $row['nombre'] ."'>
            <a href='../src/ver_producto.php?id=".$row['id_prod']."'>
            <i class='fa-solid fa-eye'></i>
            </a>
            </div>
            
        <div class='imagen_vino''><img class='img_prod' src='". $imagen_src . "'></div>
        <p>" . $row['nombre'] . "</p> 
        <p class='price-product'>$" . $row['precio']. "</p>
        <div class='inputs'>
        <input type='number' class='cant_cart' id='cant_prod".$row['id_prod']."' value='1' min='1'>
        <input type='button' class='add_button' 
        onclick='".(isset($session) && $usuario[0]['tipo']==3 ? "cargar_producto({$row['id_prod']});"
                : "session();")."' value='AGREGAR'>
        </div>

        </form>";
     

    }

        
    
    

?>