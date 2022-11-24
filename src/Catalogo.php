<!--PHP-->
<?php 
 error_reporting(0);
    include ('includes/bd.php');
    
    $conexion = new Conexion();
    $producto=$conexion -> consulta('producto','*',"");
    session_start(); 
   
    $nomUser=$_SESSION['usuario'];
    if(isset($nomUser)){
        $usuario=$conexion -> consulta('usuario','*'," nom_usr='$nomUser'");
        $persona=$conexion -> consulta('persona','*'," ci='{$usuario[0][3]}'");
   
    $nombre= ucfirst(utf8_decode($persona[0][1]));
    $apellido= ucfirst(utf8_decode($persona[0][2]));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Charrúa - Catalogo</title>

    <link rel="stylesheet" href="../public/css/style_market.css">
    <link rel="icon" href="../public/assets/img/Logo/Logo Charruas.png" width="200" height="100">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/User.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
</head>
<body>

<?php
    include('includes/header.php');
?>
    <!--Titulo de los articulos-->
    <div class="titulo_catalogo" data-aos="fade-down">
	<h1 class="title">CATALOGO</h1>
    </div>
    <div id="producto_agregado" class="producto_agregado" style="display: none;">

    <i class="fa-solid fa-circle-check" id="icono_check"></i>  

        <h2 id="Agregado_texto">Artículo añadido correctamente a tu compra</h2>
    
    </div>

    <!--productos-->

    <div id="contenedor_market">
        <section class="celda_market" id="content_catalogo"> 
        </section>
        
    </div>
 
<!--Pie de pagina-->
<div class="subir_arriba_container" id="container_arrow_up" style="display: none;"
data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500"
>
    <i class="fa-solid fa-arrow-up"></i>
</div>
<?php
include('includes/footer.php');
?>
       
    <script src="../public/js/main.js"></script>
    <script src="../public/js/script_shop_loaded.js"></script>
    <script src="../public/js/añadir_producto.js"></script>
    <script src="../public/js/search_producto.js"></script>
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
         AOS.init();
    </script>
</body>
</html>