<?php

class MotoNacional extends Moto {
    private $porcentajeDescuento; //(por defecto el valor del descuento es del 15%)

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa,   $porcentajeDescuento) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function getPorcentajeDescuento() {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento) {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }


        /*darPrecioVenta para que en el caso de las motos nacionales aplique el porcentaje de descuento
    sobre el valor calculado inicialmente**/
    

        public function darPrecioVenta(){
            $precioInicial=parent:: darPrecioVenta();
            $porcDescuento=$this->getPorcentajeDescuento();

            // Si el precio inicial es válido (mayor que 0), aplicamos el descuento
            if ($precioInicial > 0) {
                // Calculamos el monto del descuento
                $descuento = $precioInicial * ($porcDescuento / 100);

                // Aplicamos el descuento al precio inicial
                $precioFinal = $precioInicial - $descuento;

                return $precioFinal;
            }

            // Si la moto no está disponible para la venta, retornamos el precio inicial (-1)
            return $precioInicial;
        }




   




    public function __toString() {
        $info = parent::__toString();
        $info .= "Porcentaje de Descuento: " . $this->getPorcentajeDescuento() . "%\n";
        return $info;
    }


}