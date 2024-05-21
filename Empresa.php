<?php

class Empresa {
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;
    

    public function __construct($den, $dir, $cli, $mot, $vtas) {
        $this->denominacion = $den;
        $this->direccion = $dir;
        $this->colClientes = $cli;
        $this->colMotos = $mot;
        $this->colVentas = $vtas;
      
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColClientes() {
        return $this->colClientes;
    }

    public function getColMotos() {
        return $this->colMotos;
    }

    public function getColVentas() {
        return $this->colVentas;
    }
    


// METODOS SET
    public function setDenominacion($den) {
        $this->denominacion = $den;
    }

    public function setDireccion($dir) {
        $this->direccion = $dir;
    }

    public function setColClientes($cli) {
        $this->colClientes = $cli;
    }

    public function setColMotos($mot) {
        $this->colMotos = $mot;
    }

    public function setColVentas($vtas) {
        $this->colVentas = $vtas;
    }
   

    public function retornarMoto($codigoMoto) {
        $arrayMotos = $this->getColMotos(); // Colección de motos de la empresa
        $objMoto = null; // Inicialmente nulo
        $n = count($arrayMotos); // Número de motos en la colección
        $i = 0; // Índice inicial
        
        while ($i < $n && $objMoto == null) {
            if ($arrayMotos[$i]->getCodigo() == $codigoMoto) {
                $objMoto = $arrayMotos[$i]; // Asignar la moto encontrada
            }
            $i++; // Incrementar el índice
        }
        
        return $objMoto; // Retornar la moto encontrada o null si no se encontró
    }
    
   
    
    
       
        
         
     /*Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección, se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia Venta que debe ser creada. 
    Recordar que no todos los clientes ni todas las motos, están disponibles para registrar una venta en un momento determinado. El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.**/


    public function registrarVenta($colCodigosMoto, $objCliente){
        $importeFinal = 0;
        if (!$objCliente->getDadoBaja()){
            $motosAVender = [];
            $copiaColVentas = $this->getColVentas();//las motos se agregan a esta coleccion
            $idVenta = count($copiaColVentas)+1;
            $nuevaVenta = new Venta($idVenta, date("m/d/y"), $objCliente, $motosAVender,0);
            $colMotos = $this->getColMotos();

            foreach ($colCodigosMoto as $unCodigoMoto){
                $unObjMoto = $this->retornarMoto($unCodigoMoto);
                if($unObjMoto!=null){
                    $nuevaVenta->incorporarMoto($unObjMoto);
                }
            }
            if (count($nuevaVenta->getArraysMotos()) > 0){
                array_push($copiaColVentas, $nuevaVenta);
                $this->setColVentas($copiaColVentas);
                $importeFinal = $importeFinal + $nuevaVenta->getPrecioFinal();
            }
        }else{
            $importeFinal = -1;
        }
        return $importeFinal;
    }



        


    public function retornarVentasXCliente($tipo,$numDoc){
        $ColVentasCliente=[];//coleccion vacia que almacena clientes que debe retornar
        
        // Obtener la colección de ventas de la empresa
        $todasLasVentas = $this->getColVentas();
        $n = count($todasLasVentas); // Cantidad de ventas


        // Recorrer todas las ventas
        foreach ($todasLasVentas as $venta) {
            // Obtener el cliente asociado a la venta
            $clienteVenta = $venta->getObjCliente();
            // Verificar si el cliente de la venta coincide con el tipo y número de documento proporcionados por parametro
            if (($clienteVenta->getTipoDocumento() == $tipo) && ($clienteVenta->getNumeroDocumento() == $numDoc)) {
                // Si coincide, agregar la venta a la colección de ventas del cliente
                array_push($ColVentasCliente,$venta);
            }
        }

        // Retornar la colección de ventas del cliente
        return $ColVentasCliente;
    }



    /**Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la
    empresa y retorna el importe total de ventas Nacionales realizadas por la empresa. */
    public function informarSumaVentasNacionales(){
        $colVenta=$this->getColVentas();
        $importeTotal=0;//acumulador de importes total
        foreach ($colVenta as $venta) {
          $importeTotal += $venta->retornarTotalVentaNacional();
           
        }
        return $importeTotal;

    }


    

        /**Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada. (*IMPORTANTE: invocar a los métodos implementados en la clase venta cuando crea necesario) */

    public function informarVentasImportadas(){
        $colVenta=$this->getColVentas();
        $colVentasMotosImportadas=[];

        foreach ($colVenta as $objVenta) {
            $otraColeccion = $objVenta->retornarMotosImportadas(); // Obtener la colección de motos importadas de esta venta
            $n=count($otraColeccion);
            if ($otraColeccion > 0) {

                foreach ($otraColeccion as $objMotoImportada) {
                    array_push($colVentasMotosImportadas, $objMotoImportada);
                }
            
            }
           
        }
        return $colVentasMotosImportadas;

    }





    public function leerColeccion($coleccion){
        $cartel="";
        foreach ($coleccion as $objColeccion) {
            $cartel.= $objColeccion. ("\n");
        }
        return $cartel;

    }






    public function __toString() {
        $clientes=$this->getColClientes();
        $motos=$this->getColMotos();
        $ventas=$this->getColVentas();

        $info = "Denominación: " . $this->getDenominacion() . "\n";
        $info .= "Dirección: " . $this->getDireccion() . "\n";
        $info .= "Clientes: " . $this->leerColeccion($clientes). "\n";
        $info .= " motos: " . $this->leerColeccion($motos). "\n";
        $info .= "ventas: " . $this->leerColeccion($ventas). "\n";
        
        return $info;
    }


}
