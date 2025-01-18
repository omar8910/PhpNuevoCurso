<?php
// src/Pagos/TransferenciaBancaria.php
namespace Pagos;
use Interfaz\PagoInterface;


class TransferenciaBancaria implements PagoInterface {
    public function procesarPago(float $cantidad): string{
        return "Pago de $cantidad procesado con tarjeta bancaria";
    }
}