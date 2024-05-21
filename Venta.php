<?php
/*1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
arraysMotosos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporararraysMotoso($objarraysMotoso) que recibe por parámetro un objeto Motoso y lo
incorpora a la colección de Motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una arraysMotoso a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la arraysMotoso donde crea necesario.**/

class Venta {
    private $numero;
    private $fecha;
    private $objCliente;
    private $arraysMotos;
    private $precioFinal;
    

    public function __construct($nro, $fecha,Cliente $objCliente, $arraysMotos, $preFin) {
        $this->numero = $nro;
        $this->fecha = $fecha;
        $this->ObjCliente = $objCliente;
        $this->arraysMotosos = $arraysMotos;
        $this->precioFinal = $preFin;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getObjCliente() {
        return $this->objCliente;
    }

    public function getArraysMotos() {
        return $this->arraysMotos;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }
   

    // Metodos set

    public function setNumero($nro) {
        $this->numero = $nro;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setObCliente($cli) {
        $this->cliente = $cli;
    }

    public function setArraysMotos($arraysMotos) {
        $this->arraysMotos = $arraysMotos;
    }

    public function setPrecioFinal($preFin) {
        $this->precioFinal = $preFin;
    }
   
    /*Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.Utilizar el método que calcula el precio de venta de la moto donde crea necesario.**/

    public function incorporarMoto($objMoto){
        $precioMotoVenta= $objMoto->darPrecioVenta();//obtenemos el precio final
        $arrayMotos=$this->getArraysMotos();//accedo a la coleccion de motos
        if ($arrayMotos==null) {
            $arrayMotos=[];
        }
        if ($objMoto->getActiva()) {
            array_push($arrayMotos,$objMoto);//agrego el objeto moto a la coleccion
            $this->setArraysMotos($arrayMotos);//cambia el valor del arrays
            $this->setPrecioFinal($precioMotoVenta);//cambia el precio de venta
        }
        return $arrayMotos;

    }






    /*Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta.**/

    public function retornarTotalVentaNacional(){
        $colMoto= $this->getArraysMotos();
        $totalPrecioNacional=0; //acumulador de precio

        foreach ($colMoto as $moto) {
            if ($moto instanceof MotoNacional) {
                $totalPrecioNacional +=$moto->darPrecioVenta();//invocacion al modulo de la clase moto
            }
        }

        return $totalPrecioNacional;
    }


    


    /**Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la
    venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía. */

    public function retornarMotosImportadas(){
        $colMoto= $this->getArraysMotos();
        $colMotoImportada=[];

        foreach ($colMoto as $moto) {
            if ($moto instanceof MotoImportada) {
                array_push($colMotoImportada,$moto);
                
            }
        }

        return $colMotoImportada;
    }



    
    public function leerColeccion($coleccion){
        $cartel="";
        foreach ($coleccion as $objColeccion) {
            $cartel.= $objColeccion. ("\n");
        }
        return $cartel;

    }


    



    public function __toString() {
        $coleccionMoto=$this->getArraysMotos();
        $cliente=$this->getObjCliente() ;
        $rta = "Número de Venta: " . $this->getNumero() . "\n";
        $rta .= "Fecha: " . $this->getFecha() . "\n";
        $rta .= "Cliente: " .$cliente . "\n";
        $rta .= " motos:" . $this->leerColeccion($coleccionMoto) . "\n";
        $rta .= ":\n";
        $rta .= "Precio Final: " . $this->getPrecioFinal() . "\n";
        return $rta;
    }
}

