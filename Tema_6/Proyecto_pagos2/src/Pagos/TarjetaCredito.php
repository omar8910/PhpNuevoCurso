<?php
namespace Pagos;

use Interfaces\PagoInterface;

class TarjetaCredito implements PagoInterface {
    public function procesarPago(float $cantidad): string {
        return "Pago de $cantidad procesado con tarjeta bancaria";
    }
}