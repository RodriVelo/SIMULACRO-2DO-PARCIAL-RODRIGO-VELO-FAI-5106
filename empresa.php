<?php 

class Empresa{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentasRealizadas; 

    public function __construct($denominacion,$direccion,$arrayClientes,$arrayMotos,$arrayVentasRealizadas){
        $this->denominacion=$denominacion;
        $this->direccion=$direccion;
        $this->arrayClientes=$arrayClientes;
        $this->arrayMotos=$arrayMotos;
        $this->arrayVentasRealizadas=$arrayVentasRealizadas;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getArrayClientes(){
        return $this->arrayClientes;
    }
    public function setArrayClientes($arrayClientes){
        $this->arrayClientes = $arrayClientes;
    }
    public function getArrayMotos() {
        return $this->arrayMotos;
    }
    public function setArrayMotos($arrayMotos){
        $this->arrayMotos = $arrayMotos;

    }
    public function getArrayVentasRealizadas(){
        return $this->arrayVentasRealizadas;
    }
    public function setArrayVentasRealizadas($arrayVentasRealizadas) {
        $this->arrayVentasRealizadas = $arrayVentasRealizadas;

    }

    public function mostrarArrayMoto(){
        $array= $this->getArrayMotos();
        $cadena="";
        for ($i=0;$i<count($array);$i++){
            $cadena .=$array[$i]."\n";
        }
        return $cadena;
    }

    public function mostrarArrayClientes(){
        $array= $this->getArrayClientes();
        $cadena="";
        for ($i=0;$i<count($array);$i++){
            $cadena .=$array[$i]."\n";
        }
        return $cadena;
    }
    
    public function mostrarArrayVentasRealizadas(){
        $array= $this->getArrayVentasRealizadas();
        $cadena="";
        for ($i=0;$i<count($array);$i++){
            $cadena .=$array[$i]."\n";
        }
        return $cadena;
    }


    public function retornarMoto($codigoMoto){
        $i=0;
        $banderita = false;
        $moto= null;
        $arrayM= $this->getArrayMotos();
        while ($i<(count($arrayM)) && $banderita==false){
            if ($arrayM[$i]->getCodigo() == $codigoMoto){
                $banderita= true;
                $moto= $arrayM[$i];
            }
            $i++;
        }
        return $moto;
    }

    public function registrarVenta($colCodigosMoto,$objCliente){
        $precioFinally=0;
        if ($objCliente->getCondicion()==true){
        $arrayMotos=[];
        $precioFinal=0;
        $arrayVentas= $this->getArrayVentasRealizadas();
        $numeroVenta=count($arrayVentas)+1;
        $venta= new Venta($numeroVenta,date("Y-m-d"),$objCliente,$arrayMotos,$precioFinal);
        foreach ($colCodigosMoto as $codigo){
            $moto= $this->retornarMoto($codigo);
            if (($moto <> null) ){
                $venta->incorporarMoto($moto);         
            }
        } 
        $arrayVentas[]=$venta;   
        $this->setArrayVentasRealizadas($arrayVentas);
        $precioFinally= $venta->getPrecioFinal();
        }

        return $precioFinally;
       
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $array=[];
        $arrayVentasRealizadas=$this->getArrayVentasRealizadas();
        foreach ($arrayVentasRealizadas as $venta){
            $objClienteVenta= $venta->getReferenciaAlCliente();
            if (($objClienteVenta->getNumDoc()==$numDoc) && ($objClienteVenta->getTipoDoc()==$tipo)){
                $array[]=$venta;
            }
        }
        return $array;
    }

    public function informarSumaVentasNacionales(){
        $sumaVentasNacionales = 0;
        $ventasRealizadas=$this->arrayVentasRealizadas;

        foreach ($ventasRealizadas as $venta) {
            $sumaVentasNacionales =$sumaVentasNacionales + $venta->retornarTotalVentaNacional();
        }

        return $sumaVentasNacionales;
    }

    public function informarVentasImportadas(){
        $ventasImportadas = [];
        $ventasRealizadas=$this->arrayVentasRealizadas;

        foreach ($ventasRealizadas as $venta) {
            $motosImportadas = $venta->retornarMotosImportadas();
            if (count($motosImportadas)>0){
                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }

    public function __toString(){
        $cadena= "\n \n-----------EMPRESA: ".$this->getDenominacion()."-----------\n";
        $cadena .= "DIRECCION: ".$this->getDireccion()."\n";
        $cadena .="--------------------\n";
        $cadena .= "|| ARRAY CLIENTES: \n".$this->mostrarArrayClientes()."\n";
        $cadena .="--------------------\n";
        $cadena .= "|| ARRAY MOTOS: \n".$this->mostrarArrayMoto()."\n";
        $cadena .="--------------------\n";
        $cadena .= "|| ARRAY VENTAS REALIZADAS: ".$this->mostrarArrayVentasRealizadas()."\n";
        $cadena .="--------------------\n";

        return $cadena;
    }
}
