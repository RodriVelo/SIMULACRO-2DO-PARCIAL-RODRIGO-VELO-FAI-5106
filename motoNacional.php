<?php

class MotoNacional extends Moto{
    private $descuentoNacional;
    public function __construct($codigo,$precio,$anioFabricacion,$descripcion,$porcentajeIncrementoAnual,$activa,$descuentoNacional){
        parent::__construct($codigo,$precio,$anioFabricacion,$descripcion,$porcentajeIncrementoAnual,$activa);
        $this->descuentoNacional=$descuentoNacional;
    }
    

    public function getDescuentoNacional(){
        return $this->descuentoNacional;
    }

    public function setDescuentoNacional($descuentoNacional){
        $this->descuentoNacional = $descuentoNacional;

    }

    public function darPrecioVenta(){
        $venta= parent::darPrecioVenta();
        $cuenta=$venta-(($venta*$this->getDescuentoNacional())/100);

        return $cuenta;
    }

    public function __toString(){
        $cadena= "\n".parent::__toString()."\n";
        $cadena.="DESCUENTO NACIONAL: %".$this->getDescuentoNacional();
        return $cadena;
    }
}