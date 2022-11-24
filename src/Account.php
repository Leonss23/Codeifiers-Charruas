<!--PHP-->
<?php 
 error_reporting(0);
    include ('validacion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="../public/css/User.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/footer.css">

    
</head>
<body>
    <?php 
        include('includes/header.php');
    ?>

 
    <div class="container2 mt-5">

                        
                        <div class="col-md-3"> <!--Da el tamaño a las columnas-->
        <div class="col-md-8 table-responsive-sm">
            <?php
                 if(isset($_GET['msg']))
                 {
                    echo '
                        <div class="mensaje">
                            <strong class="error">
                                '.$_GET['msg'].' </strong>
                        </div>';
                               
                }
            ?>
    <div class="container-info">
    <h3>C.I/DNI: <?php echo "<b>{$id}<b>";?></h3>
        <h3>Nombre: <?php echo "<b>{$nombre}<b>";?></h3>
        <h3>Apellido: <?php echo "<b>{$apellido}<b>";?></h3>
        <h3>Telefono: <?php echo "<b>{$tel}<b>";?></h3>
        <h3>Nombre de Usuario: <?php echo "<b>{$Nom_usuario}<b>";?></h3>
        <?php
         echo "<a href='actualizar.php?id={$id}' class='btn btn-info' title='EDITAR'><i class='fa-solid fa-pen-to-square'></i></a>";
        ?>
        
    </div>

        </div>
    </div>
    
    </div>
    <?php 
        include('includes/footer.php');
    ?>
    <script src="../public/js/main.js"></script>
</body>
</html>