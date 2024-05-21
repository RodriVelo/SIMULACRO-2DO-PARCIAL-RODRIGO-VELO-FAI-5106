<?php

class Moto {
    private $codigo;
    private $precio;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo,$precio,$anioFabricacion,$descripcion,$porcentajeIncrementoAnual,$activa){
        $this->codigo=$codigo;
        $this->precio=$precio;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->porcentajeIncrementoAnual=$porcentajeIncrementoAnual;
        $this->activa=$activa;
    }
    

    public function getCodigo(){
        return $this->codigo;
    }


    public function setCodigo($codigo){
        $this->codigo = $codigo;

    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

    }

 
    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion= $anioFabricacion;

    }

 
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;

    }


    public function getPorcentajeIncrementoAnual(){
        return $this->porcentajeIncrementoAnual;
    }

 
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual){
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;

    }


    public function getActiva(){
        return $this->activa;
    }

 
    public function setActiva($activa){
        $this->activa = $activa;

    }

    public function darPrecioVenta(){
        $valor=-1;
        $anio=date("Y")-$this->getAnioFabricacion();
        if ($this->getActiva()==true){
            $valor=$this->getPrecio()+($this->getPrecio()*($anio*$this->getPorcentajeIncrementoAnual()));
        }
        return $valor;
    }

    public function __toString(){
        
        $cadena="CODIGO MOTO: ".$this->getCodigo()."\n";
        $cadena.="PRECIO: ".$this->getPrecio()."\n";
        $cadena.="AÑO FABRICACION: ".$this->getAnioFabricacion()."\n";
        $cadena.="DESCRIPCION: ".$this->getDescripcion()."\n";
        $cadena.="PORCENTAJE INCREMENTO ANUAL: %".$this->getPorcentajeIncrementoAnual()."\n";
        $cadena.="CONDICION: ".$this->getActiva()."\n";
        
        return $cadena;
    }
}