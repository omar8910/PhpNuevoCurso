<?php
// main.php
require_once 'vendor/autoload.php';

use Pagos\TarjetaCredito;
use Pagos\Paypal;
use Pagos\TransferenciaBancaria;



// Instanciar los métodos de pago
// $tarjeta = new TarjetaCredito();
// $paypal = new PayPal();
$transferencia = new TransferenciaBancaria();

// Procesar pagos
echo $tarjeta->procesarPago(150.75) . PHP_EOL;
echo $paypal->procesarPago(200.00) . PHP_EOL;
echo $transferencia->procesarPago(300.50) . PHP_EOL;