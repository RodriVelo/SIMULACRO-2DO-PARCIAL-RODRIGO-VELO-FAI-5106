<?php

class Cliente{
    private $nombre;
    private $apellido;
    private $condicion;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre,$apellido,$condicion,$tipoDoc,$numDoc){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->condicion=$condicion;
        $this->tipoDoc=$tipoDoc;
        $this->numDoc=$numDoc;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getCondicion()
    {
        return $this->condicion;
    }

    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;
    }

    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;
    }
     
    public function getNumDoc()
    {
        return $this->numDoc;
    }

    public function setNumDoc($numDoc)
    {
        $this->numDoc = $numDoc;
    }

    public function __toString()
    {
        $cadena = "NOMBRE: ".$this->getNombre()."\n";
        $cadena.= "APELLIDO: ".$this->getApellido()."\n";
        $cadena.= "CONDICION: ".$this->getCondicion()."\n";
        $cadena.= "TIPO DOCUMENTO: ".$this->getTipoDoc()."\n";
        $cadena.="DOCUMENTO: ".$this->getNumDoc()."\n";
        return $cadena;
    }
}