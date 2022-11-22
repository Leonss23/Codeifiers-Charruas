<?php
 class Persona{
    private $ci;
    private $nombre;
    private $apellido;
    private $direc;
    private $tel;
    private $nac;

    public function __construct ($c, $n, $a, $d, $t, $f){
       $this -> ci=$c;
        $this -> nombre=$n;
        $this -> apellido=$a;
        $this -> direc=$d;
        $this -> tel=$t;
        $this -> nac=$f;
 
    }
 public function get_sql(){
    return $this->ci.", '".$this->nombre."', '".$this->apellido."', '".$this->direc."', '".$this->tel."', '".$this->nac."'";
 }

}
?>