<?php
class MotoImportada extends Moto {
    private $pais;
    private $importeImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $pais, $importeImportacion) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->pais = $pais;
        $this->importeImportacion = $importeImportacion;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getImporteImportacion() {
        return $this->importeImportacion;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function setImporteImportacion($importeImportacion) {
        $this->importeImportacion = $importeImportacion;
    }

    public function __toString() {
        $info = parent::__toString();
        $info .= "País de Origen: " . $this->getPais() . "\n";
        $info .= "Importe de Importación: " . $this->getImporteImportacion() . "\n";
        return $info;
    }



    /*Para el caso de las motos importadas, al valor calculado se debe sumar el
        impuesto que pagó la empresa por su importación.**/

        public function darPrecioVenta(){
            $precioInicial=parent::darPrecioVenta();
            $importeImportacion=getImporteImportacion();
            
            if ($precioInicial>0) {
                $precioInicial += $importeImportacion;
            }
            return $precioInicial;
        



        }

}