<?php
include_once 'Moto.php';
include_once 'MotoNacional.php';
include_once 'Motoimportada.php';
include_once 'Venta.php';
include_once 'Empresa.php';
include_once 'Cliente.php';

/**Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.  private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDni;
    private $nroDni;*/

$objCliente1= new Cliente('davo', 'xeneize',false, 'documento', 45887547);
$objCliente2= new Cliente('fran', 'ramirez',false, 'documento', 42565478);

/**Cree 4 objetos Motos con la información visualizada en las siguientes tablas: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo entre otros. */

$objMoto1=new Moto (11, 2230000, 2022, 'Benelli Imperiale 400',85, true, 10);
$objMoto2=new Moto (12, 584000, 2021, 'Zanella Zr 150Ohc',70, true, 10);
$objMoto3=new Moto (13, 999900, 2023, 'Zanella Patagonian Eagle 250',55, false, null);
$objMoto4=new Moto (14, 12499900, 2020, 'Pitbike Enduro Motocross Apollo Aiii 190cc Plr',100, true, 'Francia', 6244400);


/**Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14] , colección de clientes
= [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[]. */

$colMoto= [$objMoto1,$objMoto2, $objMoto3, $objMoto4];
$colCliente= [$objCliente1, $objCliente2];
$colVentasRealizdas=[];

$objEmpresa=new Empresa ('alta gama', 'av Argentina 123',$colCliente, $colMoto, $colVentasRealizdas);


/**Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el $objCliente es una
referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos
de motos es la siguiente [11,12,13,14]. Visualizar el resultado obtenido. */
$colCodigosMoto=[11,12,13,14];


$ventaRegistrada = $objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);

echo "La venta registrada 1 es: ".  $ventaRegistrada . ("\n");


/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [13,14]. Visualizar el resultado obtenido. */

$otraColCodigosMoto=[13,14];

$otraVenta= $objEmpresa->registrarVenta($otraColCodigosMoto, $objCliente2);

echo 'La otra venta registrada es : ' . $otraVenta. ("\n");



/**Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es
una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de
códigos de motos es la siguiente [14,2]. Visualizar el resultado obtenido. */


$codigosMotos=[14,2];

$otraVentaMas= $objEmpresa->registrarVenta($codigosMotos, $objCliente2);

echo 'La otra venta registrada es : ' . $otraVentaMas. ("\n");



// Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.

$infoVentasImport = $objEmpresa->informarVentasImportadas();

$leerColeccion= $objEmpresa->leerColeccion($infoVentasImport);

echo 'Ventas importadas: ' . $leerColeccion ."\n";

// Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido

$infoVentasNacionales=$objEmpresa->informarSumaVentasNacionales();

echo 'Ventas nacionales: '. $infoVentasNacionales. "\n";

// Realizar un echo de la variable Empresa creada en 2.

echo 'Empresa: ' . $objEmpresa. "\n";









