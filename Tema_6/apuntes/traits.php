<?php

trait UtilFecha {
    private $fecha;
    
    public function setFecha(): void {
        $this->fecha = new DateTime();
    }

    public function getFecha() {
        return $this->fecha->format("d/m/Y"); // Devuelve la fecha formateada según el formato dado
    }
}

trait UtilImpuesto {
    private float $iva;

    public function getIva(): float {
        return 0.21;
    }
}

class Factura {
    use UtilFecha, UtilImpuesto;

    function __construct() {
        $this->setFecha();
    }
}

$factura = new Factura();
echo $factura->getFecha() . "<br/>";
echo $factura->getIva();

/* Cada trait se trata como un método que se añade a la clase Factura. 
A partir de ese momento, la clase Factura podrá usar ese rasgo y sus propiedades 
como si estuvieran definidas en la propia clase */
