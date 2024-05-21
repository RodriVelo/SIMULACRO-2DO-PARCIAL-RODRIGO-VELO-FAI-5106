<?php

class MotoImportada extends Moto { 
    private $pais;
    private $impuestoImp;
    public function __construct($codigo,$precio,$anioFabricacion,$descripcion,$porcentajeIncrementoAnual,$activa,$pais,$impuestoImp){
        parent::__construct($codigo,$precio,$anioFabricacion,$descripcion,$porcentajeIncrementoAnual,$activa);
        $this->pais=$pais;
        $this->impuestoImp=$impuestoImp;
    }
    

    public function getPais(){
        return $this->pais;
    }

    public function setPais($pais){
        $this->pais = $pais;

    }

  
    public function getImpuestoImp(){
        return $this->impuestoImp;
    }


    public function setImpuestoImp($impuestoImp){
        $this->impuestoImp = $impuestoImp;

    }

    public function darPrecioVenta(){
        $venta= parent::darPrecioVenta();
        $cuenta=$venta+$this->getImpuestoImp();
        
        return $cuenta;
    }
    public function __toString(){
        $cadena="\n".parent::__toString()."\n";
        $cadena.="PAIS: ".$this->getPais()."\n";
        $cadena.="IMPUESTO IMPORTACION: %".$this->getImpuestoImp()."\n";

        return $cadena;
    }
}