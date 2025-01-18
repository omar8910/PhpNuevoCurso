<?php
// src/Interfaces/PagoInterface.php
namespace Interfaz;

interface PagoInterface {
    public function procesarPago(float $cantidad): string;
}