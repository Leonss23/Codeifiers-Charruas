<?php
    include ('includes/bd.php');
    $conexion = new Conexion();
    session_start(); 

if(isset($_SESSION['usuario'])){

    $nomUser=$_SESSION['usuario'];
    
    if($usuario[0][2]==1){
        header("location: Admin.php");
    }else{
        header("location: Account.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://kit.fontawesome.com/775c1cb76a.js" crossorigin="anonymous"></script>
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../public/css/login.css">
</head>
<body onload="mostrar()">
<div class="container all">


<div class="container-form log-in">
    <form class="formulario" action="validar_log.php" method="POST">
          
    <h2 class="create-account">Iniciar Sesion</h2>
    <?php
    if(isset($_GET['error'])){
     echo '
        <div class="mensaje">
        <strong class="error">
        '.$_GET['error'].' </strong>
        
        </div>';

    }
?>
    <input type="text" name="user" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1-15}" required>
    <div class="pass">
    <input type="password" name="password" id="password1" placeholder="Contraseña" required>  
    <i id="ojo" class="fa-solid fa-eye" title="Ver Contraseña"></i>

   <!-- <i id="ojo2" class="fa-solid fa-eye-slash" title="Ocultar Contraseña" style="visibility: hidden;  "></i> -->
  
</div>
   
    <input name="login" type="submit" value="Iniciar Sesion">
    </form>
    
</div>
    
<div class="container-form sign-up">
    <form class="formulario" action="insertar.php" method="post">  
    <h2 class="create-account">Registrarme</h2>
    <?php
    if(isset($_GET['error2'])){
     echo '
        <div class="mensaje">
        <strong class="error">
        '.$_GET['error2'].' </strong> 
        </div>';
        
    }
  
?>
    <input type="number" name="cedula" id="cedula" placeholder="Cedula uruguaya" require minlength="7" maxlength="8" required>

    <input type="text" name="nombre" placeholder="Nombre" required >
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="number" name="tel" placeholder="Telefono/Celular" required minlength="8" maxlength="9">
    <input type="text" name="direc" placeholder="Direccion" >
    <input type="date" name="nac" placeholder="Fecha de Nacimiento" title="Ej: 1997-04-23" required> 
    <input type="text" name="user" placeholder="Usuario" required>
    <input type="password" name="password" id="password" placeholder="Contraseña" required>

    <input name="register" type="submit" value="Enviar"> 

    </form>
</div>
    
</div>
<script src="../public/js/main.js"></script>
</body>
</html>

