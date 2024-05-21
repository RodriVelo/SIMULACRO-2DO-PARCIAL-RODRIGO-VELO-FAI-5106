<?php

include 'cliente.php';
include 'empresa.php';
include 'moto.php';
include 'motoImportada.php';
include 'motoNacional.php';
include 'venta.php';

function mostrarArrayInformarImportadas($ventasImp){
    $cadena="";
    foreach ($ventasImp as $venta){
    echo $cadena.="\n".$venta;
    }
}

$objCliente1= new Cliente("LIONEL","MESSI",true,"DNI",42123321);
$objCliente2= new Cliente("EQUI","FERNANDEZ",false,"DNI",42133100);

$objMoto1= new MotoNacional(11,2230000,2022,"Banelli Imperiale 40",85,true,10);
$objMoto2= new MotoNacional(12,584000,2021,"Zanella Zr 150 Ohe",70,true,10);
$objMoto3= new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250",55,false,0);
$objMoto4= new MotoImportada(14,12499900,2020,"Pitbike Enduro Motocross Apollo Aiii 190cc Plr",100,true,"Francia",6244400);

$objEmpresa= new Empresa("Alta Gama","Av.Argentina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3,$objMoto4],[]);

$objEmpresa->registrarVenta([11,12,13,14],$objCliente2);
$objEmpresa->registrarVenta([13,14],$objCliente2);
$objEmpresa->registrarVenta([14,2],$objCliente2);

echo $objEmpresa;

echo "---------INFORME VENTAS IMPORTADAS-----------\n";
$ventasImp=mostrarArrayInformarImportadas($objEmpresa->informarVentasImportadas());
echo "---------INFORME VENTAS NACIONALES-----------\n";
echo "$".$objEmpresa->informarSumaVentasNacionales();
