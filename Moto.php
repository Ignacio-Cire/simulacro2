<?php

/*Conocemos que una importante empresa de la región que vende motos, desea implementar una aplicación que le
permita gestionar la información de los clientes, de las motos y de las ventas realizadas.**/

class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($cod, $cos, $anoFabr, $desc, $porcIncrAnual, $act) {
        $this->codigo = $cod;
        $this->costo = $cos;
        $this->anioFabricacion = $anoFabr;
        $this->descripcion = $desc;
        $this->porcentajeIncrementoAnual = $porcIncrAnual;
        $this->activa = $act;//moto disponible para la venta (true)
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getanioFabricacion() {
        return $this->anioFabricacion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }

    public function getActiva() {
        return $this->activa;
    }


    //METODOS SET 
   
    public function setCodigo($cod) {
        $this->codigo = $cod;
    }

    public function setCosto($cos) {
        $this->costo = $cos;
    }

    public function setanioFabricacion($anoFabr) {
        $this->anioFabricacion = $anoFabr;
    }

    public function setDescripcion($desc) {
        $this->descripcion = $desc;
    }

    public function setPorcentajeIncrementoAnual($porcIncrAnual) {
        $this->porcentajeIncrementoAnual = $porcIncrAnual;
    }

    public function setActiva($act) {
        $this->activa = $act;
    }

  /*
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto. */

    public function darPrecioVenta(){
        $_venta = -1; // Inicializamos el valor de venta, si la moto no está disponible para la venta retorna -1
        $_compra = $this->getCosto(); // Obtenemos el precio de compra de la moto
        $activa = $this->getActiva(); // Verificamos si la moto está activa para la venta (true o false)
        
        if ($activa) {
            $anioFab = $this->getAnioFabricacion(); // Obtenemos el año de fabricación de la moto
            $anio_actual = date("Y"); // Obtenemos el año actual
            $anio = $anio_actual - $anioFab; // Calculamos los años transcurridos desde el año de fabricación hasta el año actual
            $por_inc_anual = $this->getPorcentajeIncrementoAnual(); // Obtenemos el porcentaje de incremento anual
            
            // Calculamos el valor de venta final
            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
        }
        
        return $_venta; // Retornamos el valor de venta (double)
    }

  
    
    

//  SE MUESTRAN SOLO LOS ATRIBUTOS.
    public function __toString() {
        $info = "Código: " . $this->getCodigo() . "\n";
        $info .= "Costo: " . $this->getCosto() . "\n";
        $info .= "Año de Fabricación: " . $this->getanioFabricacion() . "\n";
        $info .= "Descripción: " . $this->getDescripcion() . "\n";
        $info .= "Porcentaje de Incremento Anual: " . $this->getPorcentajeIncrementoAnual() . "\n";
        $info .= "Activa: " . ($this->getActiva() ? "Sí" : "No") . "\n";
        return $info;
    }   
}