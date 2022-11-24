<?php
    include ('validacion.php');

session_start(); 
$session = $_SESSION['usuario'];

if(isset($session)){


    	// verifica que se recibieron datos
	if(isset($_POST['submit'])) {
		//carpeta donde se sube la imagen en el servidor.
		$carpeta_destino = "../public/assets/img/Vinos/";
	
		//tamaño máximo en byte permitido para los archivos subidos
		$max = 1024*1024;
	
		//extensiones de archivos validas
		$extensiones = ['image/jpg','image/jpeg','image/png'];
	
		//ruta del archivo que sube el usuario
		//basename:	Dada una cadena que contiene una ruta a un archivo o directorio,
		//			esta función devolverá el último componente de nombre.
		$archivo_destino = $carpeta_destino . basename($_FILES["archivoSubido"]["name"]);
	
		//strtolower: Devuelve un string con todos los caracteres alfabéticos convertidos a minúsculas.
		$tipo_archivo = strtolower(pathinfo($archivo_destino,PATHINFO_EXTENSION));
	
		//controla que el archivo no superere el tamaño admitido
		if($_FILES['archivoSubido']['size']<$max){

			//la extensión del archivo está en el arreglo de extensiones
			//in_array: Comprueba si un valor existe en un array
            //echo $_FILES['archivoSubido']['type'];
            //echo "<br>Prueba<br>";
			if ( in_array($_FILES['archivoSubido']['type'], $extensiones)){
		
				if (move_uploaded_file($_FILES["archivoSubido"]["tmp_name"], $archivo_destino)) {
                    $nombreP= $_POST['nombre_Producto'];
                    $precio= $_POST['precio'];
                    $tipo=$_POST['tipo'];
                    $descripcion=$_POST['descripcion'];
                    $cant=$_POST['cantidad'];
					//htmlspecialchars: Convierte caracteres especiales en entidades HTML
					$mensaje= "La imagen ". htmlspecialchars( basename( $archivo_destino)). " fue subida.<br>";
                    
					//echo "<img src={$archivo_destino}>";
                    $img=  htmlspecialchars( basename( $archivo_destino));
                    $sql = $conexion -> insertar("producto","nombre,precio,imagen,tipo,descripcion,nom_admin,stock"
                    ,"'{$nombreP}',{$precio},'{$img}','{$tipo}','{$descripcion}','{$session}',{$cant}");
                    header("Location: productos.php?mensaje=" . $mensaje);
                   
				}else
					$mensaje=  "Error al subir el archivo.";
                     header("Location: productos.php?mensaje=" . $mensaje);
		  } else {
			$mensaje= "<br>El archivo es {$_FILES['archivoSubido']['type']}, no se permite este tipo de archivo ";
            header("Location: productos.php?mensaje=" . $mensaje);
			foreach($extensiones as $tmp)
				 $tmp." ";
               
		  }
		} else 
			
			$mensaje=  "El archivo ocupa {$_FILES['archivoSubido']['size']}byte pero se permite maximo {$max}byte.";	  
            header("Location: productos.php?mensaje=" . $mensaje);
	}else
		$mensaje ="Error...".$_POST["submit"];
        header("Location: productos.php?mensaje=" . $mensaje);

}




?>