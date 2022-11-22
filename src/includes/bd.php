<?php

class Conexion{
    private $conexion;
    private $conect;
    private $user;
    private $clave;
    private $bd;

    //https://www.php.net/manual/es/book.mysqli.php

    public function __construct(){ //Orientada a mysqli 
         
        $this-> conect= "localhost";
        $this->user = "equipo03";
        $this->clave = "3quip0_III";
        $this->bd = "dbemt3grp03";
    
    }

    public function connexc() //Orientada a mysqli 
    {
        $host = "localhost";
        $username = "equipo03";
        $password = "3quip0_III";
        $db_name = "dbemt3grp03";

        try 
        {
            $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "<script>console.log('Conectado con la base de datos con exito');</script>";
            return $conn;
        } catch(PDOException $e) 
        {
            $err = $e->getMessage();
            //echo "<script>console.error('Fallo la conexion con la base de datos.');</script>";
        }
    }


    /*Con las funciones trabajo de una forma simplificada a las horas de realizar las consultas
     para no escribir tantas consultas y poder resumirlo en una funcion generica
    */

    public function consulta($tabla,$campos,$condicion){
        $this->conexion = mysqli_connect($this->conect,$this->user, $this->clave,$this->bd); //Conecto a la base de datos
        //Conexion,   User,    Password,   Base de Datos
             if (!$this->conexion) { //Verifico si no hay una conexion a la BD
             die("No hay conexion a Base de Datos: " . mysqli_connect_error()); //Muestra el error
             }else{ //Si existe la conexion...
                
                if(strlen($condicion)>0){ // Si hay una condicion
                    $condicion= ' WHERE '.$condicion; 
                }

                $sql= "SELECT {$campos} FROM {$tabla} {$condicion} ";
                //echo "<br>SQL: ".$sql."<br>";
                $resultado= $this->conexion->query($sql); //Ejecuta la sentencia sql
                $row=array(); //Creo un arreglo
               while($temp=mysqli_fetch_array($resultado)){ //Recorro los datos recibidos y los guardo en el array $row
              array_push($row,$temp); //Cada dato lo agrego al final
               }
                 //echo"ok";
 
             }
 
 mysqli_close($this->conexion); //Cierro la condicion
    return $row; //Devuelvo los datos cargados
    
    }

   public function insertar($tabla,$campos,$datos){
        $this->conexion = mysqli_connect($this->conect,$this->user, $this->clave,$this->bd);
	$row=0;
        if (!$this->conexion) {
            die("No hay conexion a Base de Datos: " . mysqli_connect_error());
            }else{
           
                $sql= "INSERT INTO {$tabla} ({$campos}) VALUES ({$datos}); "; 
				//echo "SQL: ".$sql."<br>";
				$row=$this->conexion->query($sql); //Ejecuto la consulta
                echo $row;
            }
            mysqli_close($this->conexion);
            return $row;
    }

    public function actualizar($tabla,$campo,$condicion){
        $this->conexion = mysqli_connect($this->conect,$this->user, $this->clave,$this->bd);
        //Conexion,   User,    Password,   Base de Datos
             if (!$this->conexion) { //Verifico si no hay una conexion a la BD
             die("No hay conexion a Base de Datos: " . mysqli_connect_error());
             }else{ //Si existe la conexion...
                
                if(strlen($condicion)>0){ // Si hay una condicion
                    $condicion= ' WHERE ' .$condicion; 
                }
      
                $sql= "UPDATE {$tabla} SET {$campo} {$condicion};";
                //echo "<br>SQL: ".$sql."<br>";
                $row=$this->conexion->query($sql);
                 //echo"ok";
 
             }
 
 mysqli_close($this->conexion);
    return $row;
    


}

public function delete($tabla,$clave){
    $this->conexion = mysqli_connect($this->conect,$this->user, $this->clave,$this->bd);
    //Conexion,   User,    Password,   Base de Datos
         if (!$this->conexion) { //Verifico si no hay una conexion a la BD
         die("No hay conexion a Base de Datos: " . mysqli_connect_error());
         }else{ //Si existe la conexion...
         
            $sql= "DELETE FROM {$tabla} WHERE 'ci' = $clave;";
            //echo "<br>SQL: ".$sql."<br>";
            $row=!$this->conexion->query($sql);
             //echo"ok";

         }

mysqli_close($this->conexion);
return $row;



}
}
