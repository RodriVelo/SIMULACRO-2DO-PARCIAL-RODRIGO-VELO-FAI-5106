<?php


class Venta{
    private $numero;
    private $fecha;
    private $referenciaAlCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numero,$fecha,$referenciaAlCliente,$arrayMotos,$precioFinal)
    {
        $this->numero=$numero;
        $this->fecha=$fecha;
        $this->referenciaAlCliente=$referenciaAlCliente;
        $this->arrayMotos=$arrayMotos;
        $this->precioFinal=$precioFinal;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getReferenciaAlCliente()
    {
        return $this->referenciaAlCliente;
    }

    public function setReferenciaAlCliente($referenciaAlCliente)
    {
        $this->referenciaAlCliente = $referenciaAlCliente;
    }

    public function getArrayMotos()
    {
        return $this->arrayMotos;
    }

    public function setArrayMotos($arrayMotos)
    {
        $this->arrayMotos = $arrayMotos;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }

    public function mostrarArregloMoto(){
        $array= $this->getArrayMotos();
        $cadena="";
        for ($i=0;$i<count($array);$i++){
            $cadena .=$array[$i]."\n";
        }
        return $cadena;
    }

    public function incorporarMoto($objMoto){
        $arrayM=$this->getArrayMotos();

        if ($objMoto->getActiva()==true){
            $arrayM[]=$objMoto;
            $this->setArrayMotos($arrayM);
            $valor=$objMoto->darPrecioVenta();
            $precioFinal=$this->getPrecioFinal()+$valor;
            $this->setPrecioFinal($precioFinal);
        }
    }

    
    public function retornarTotalVentaNacional(){
        $arrayMotos=$this->getArrayMotos();
        $totalNacional = 0;
        foreach ($arrayMotos as $moto) {
            if ($moto instanceof MotoNacional) {
                $totalNacional = $totalNacional + $moto->darPrecioVenta();
            }
        }
        return $totalNacional;
    }

    public function retornarMotosImportadas(){
        $motosImportadas = [];
        $arrayMotos=$this->getArrayMotos();
        foreach ($arrayMotos as $moto) {
            if ($moto instanceof MotoImportada) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }
    
    public function __toString()
    {
        $cadena = "NUMERO VENTA: ".$this->getNumero()."\n";
        $cadena .="FECHA: ".$this->getFecha()."\n";
        $cadena .="REFERENCIA AL CLIENTE: ".$this->getReferenciaAlCliente()."\n";
        $cadena .="ARREGLOS MOTOS: ".$this->mostrarArregloMoto()."\n";
        $cadena .="PRECIO FINAL: $".$this->getPrecioFinal()."\n";

        return $cadena;
    }


}