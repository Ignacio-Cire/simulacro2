<?php



class Cliente {//nombre, apellido,dado de baja,tipo y el númer de doc
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDni;
    private $nroDni;
    public function __construct($nom,$ap,$dadoBaja,$tipo,$dni){
        $this-> nombre=$nom;
        $this-> apellido=$ap;
        $this-> dadoDeBaja=$dadoBaja;
        $this-> tipoDni=$tipo;
        $this-> nroDni=$dni;
    }
    // METODOS GET
    public function getNomb(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDadoBaja(){
        return $this->dadoDeBaja;
    }
    public function get_tipo_dni(){
        return $this->tipoDni;
    }
    public function get_nro_dni(){
        return $this->nroDni;
    }

    // METODOS SET
    public function setNomb($nom){
        $this->nombre=$nom;
    }
    public function setApellido($ap){
        $this->apellido=$ap;
    }
    public function setDadoBaja($dadoBaja){
        $this->dadoDeBaja=$dadoBaja;
    }
    public function set_tipo_dni($tipo){
        $this->tipoDni=$tipo;
    }
    public function set_nro_dni($dni){
        $this->nroDni=$dni;
    }

   
    // Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.

    public function registroCompra(){
        $dadoBaja=$this->getDadoBaja();
        $rta=false;
        if ($dadoBaja) {
            $rta=true;
        }
        return $rta;

    }





    public function __toString(){
        $nom=$this->getNomb();
        $ap=$this->getApellido();
        $dadoDeBaja = $this->getDadoBaja() ? "Sí" : "No"; // expresión ternaria
        $tipo_dni=$this->get_tipo_dni();
        $nro_dni=$this->get_nro_dni();
        $rta="Nombre: " . $nom . "\n";
        $rta.="Apellido: " . $ap . "\n";
        $rta.="Dado de baja: " . $dadoDeBaja . "\n";
        $rta.="Tipo de documento: " . $tipo_dni . "\n";
        $rta.="Numero de documento: " . $nro_dni . "\n";
        return $rta;
        
    }
    

}
