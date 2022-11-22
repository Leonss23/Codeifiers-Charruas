<?php
    error_reporting(0);
    include ('includes/bd.php');
    $conexion = new Conexion();
    $conn = $conexion -> connexc();
  
    if(isset($_POST['busqueda_producto'])){
        $busqueda_producto = $_POST['busqueda_producto'];

        $data = $conexion -> consulta("producto","*"," tipo LIKE '%{$busqueda_producto}%' or nombre LIKE '%{$busqueda_producto}%'
        or precio LIKE '%{$busqueda_producto}%' ");
    
        
        $imagen_src = "";
        if(isset($busqueda_producto))
        {
        foreach($data as $row)
        {
            if(substr($row['imagen'], 0, 4) == "http")
            {
                $imagen_src = $row['imagen'];
            }else 
            {
                $imagen_src = "../img/Vinos/" . $row['imagen'];
            }
    
                echo "
                <form id='formulario_producto'>
               
                <div class='ver_producto' title='Ver ". $row['nombre'] ."'>
                <a href='ver_producto.php?id=".$row['id_prod']."'>
                <i class='fa-solid fa-eye'></i>
                </a>
                </div>
                
            <div class='imagen_vino''><img class='img_prod' src='". $imagen_src . "'></div>
            <p>" . $row['nombre'] . "</p> 
            <p class='price-product'>$" . $row['precio']. "</p>
            <div class='inputs'>
            <input type='number' class='cant_cart' id='cant_prod".$row['id_prod']."' value='1' min='1'>
            <input type='button' class='add_button' onclick='".(isset($session) ? "cargar_producto({$row['id_prod']});"
                :  "session();")."'  value='AGREGAR'> 
            </div>
    
            </form>";
        }
    
        
    
        }

    }else{
    $data = $conn->query("SELECT * FROM producto WHERE stock > 0")->fetchAll();
    session_start(); 
    
    if(isset($_SESSION['usuario'])){
        $session = $_SESSION['usuario'];
        $usuario=$conexion -> consulta('usuarios','*'," nom_usr='$session'");
    }

 
    $imagen_src = "";

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
            <form id='formulario_producto' data-aos='fade-up'>
           <input type='hidden' id='tipo_user' value='".$usuario[0]['tipo']."'>
            <div class='ver_producto' title='Ver ". $row['nombre'] ."'>
            <a href='ver_producto.php?id=".$row['id_prod']."'>
            <i class='fa-solid fa-eye'></i>
            </a>
            </div>
            
        <div class='imagen_vino''><img class='img_prod' src='". $imagen_src . "'></div>
        <p>" . $row['nombre'] . "</p> 
        <p class='price-product'>$" . $row['precio']. "</p>
        <div class='inputs'>
        <input type='number' class='cant_cart' id='cant_prod".$row['id_prod']."' value='1' min='1'>
        <input type='button' class='add_button' 
        onclick='".(isset($session)  && $usuario[0]['tipo']==3  ? "cargar_producto({$row['id_prod']});"
                : "session();")."' value='AGREGAR'>
        </div>

        </form>";
     

    }

    }
    
?>

