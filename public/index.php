<?php 
   // error_reporting(0);
    
    include ('../src/includes/bd.php');
    //include ('../src/validacion.php');
    
    $conexion = new Conexion();
  
    session_start(); 
    $session = $_SESSION['usuario'];
    if(isset($session)){
        $usuario=$conexion -> consulta('usuario','*'," nom_usr='$session'");
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   


    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
 
    <title>Charruas</title>
    <link rel="stylesheet" href="../public/css/style_market.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="icon" href="../public/assets/img/Logo/Logo Charruas.png" width="200" height="100">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body>
<?php 
include('../src/includes/header.php');
?>  

    <!--Contenedor de imagenes de carrusel-->
  <div class="publicidad"></div>

    <!--Titulo de los articulos-->
    <div class="titulo">
	<h1 class="title">OFERTAS</h1>
    </div>
    <div id="producto_agregado" class="producto_agregado" style="display: none;">

    <i class="fa-solid fa-circle-check" id="icono_check"></i>  

        <h2 id="Agregado_texto">Artículo añadido correctamente a tu compra</h2>
    
    </div>

    <!--dependencias de market (css y js)-->

    <!--productos-->
    <div id="contenedor_market">
        <section class="celda_market" id="content_oferta"> 
        </section>        
        
    </div>

        <!--Titulo de los articulos-->
        <div class="titulo">
	<h1 class="title">DESTACADOS</h1>
    </div>
    <div id="contenedor_market">
        <section class="celda_market" id="destacados_market">
       
        </section>
        
    </div>


    <div class="publicidad-footer">
        <div class="img-publicidad-footer">
            <img src="../public/assets/img/Publicidad/pagos-homefullx-1160x200.gif" alt="" srcset="">
        </div>
      
        <div class="pack-img-publicidad">

           
            <div class="content-img-publicidad" data-aos="fade-right" data-aos-duration="3000">
                <img src="../public/assets/img/Publicidad/wine-bottle-sketch-glass-wine-hand-drawn-sketch-vector-illustration_460848-13606.jpg" alt="">
            </div>
            <div class="publicidad_footer">
	           
               </div>
            <div class="content-img-publicidad" data-aos="fade-left" data-aos-duration="3000">
            <img src="../public/assets/img/Publicidad/red-wine-1004259_960_720.jpg" alt="" srcset="">
            </div>

            
        </div>
    </div>

<div class="subir_arriba_container" id="container_arrow_up" style="display: none;"
data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500"
>
    <i class="fa-solid fa-arrow-up"></i>
</div>

<?php
include('../src/includes/footer.php');
?>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
         AOS.init();
    </script>
        <script src="../public/js/main.js"></script>
        <script src="../public/js/añadir_producto.js"></script>
        <script src="../public/js/script_shop_loaded.js"></script>
     
</body>
</html>