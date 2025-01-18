<?php
// src/Pagos/PayPal.php
namespace Pagos;

use Interfaces\PagoInterface;

class PayPal implements PagoInterface{
    public function procesarPago(float $monto): string {
        return "Pago de $monto procesado con PayPal.";
    }
}