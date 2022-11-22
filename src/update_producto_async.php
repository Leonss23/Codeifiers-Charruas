<?php
    include ('includes//bd.php');
    $conexion = new Conexion();
    session_start(); 
    $session = $_SESSION['usuario'];
    $conn = $conexion -> connexc();
    $id = $_POST['id'];
    $cantidad =  0;

    /*realizo una consulta para obtener la cantidad de productos que hayan en el id que recibi por post*/ 
    $data = $conn->query("SELECT * FROM producto")->fetchAll();
    
    foreach ($data as $row)
    {
        if(strcmp($row['id_prod'], $id)==0){$cantidad = $row['stock'];}
    }
    //+= $_POST['cantidad']
    
            $ver = $cantidad += $_POST['cantidad'];
            if($ver > 0){
                    /*realizo update*/
                $sql = "UPDATE producto SET stock=? WHERE id_prod=?";
                $valor = $conn->prepare($sql)->execute([$cantidad, $id]);
                $mensaje ="Se actualizo stock";
                header("Location: productos.php?mensaje={$mensaje}");
    //echo "UPDATE DATABASE realizado con exito. {$valor}";
    $sqlG = $conn->prepare("INSERT INTO gestiona (nom_emp,id_prod) VALUES (?,?)");
    $sqlG->execute([$session,$id]);

            }else{
                $sql = "UPDATE producto SET stock=0 WHERE id_prod=?";
                $valor = $conn->prepare($sql)->execute([$id]);

                $sqlG = $conn->prepare("INSERT INTO gestiona (nom_emp,id_prod) VALUES (?,?)");
                $sqlG->execute([$session,$id]);
            }
        
       //echo $cantidad += $_POST['cantidad'];
        

    


