<?php

class Alumno{

    public $matricula;
    public $nombre;
    public $apellido;
    public $edad;
    public $sexo;
    public $direccion;
    public $ciudad;
    public $telefono;
    public $cp;
    public $correo;
    public $foto;
    public $contra;
    public $contraDash;
    public $comment;


    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>