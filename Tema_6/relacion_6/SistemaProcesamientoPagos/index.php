<?php

require_once "./src/Interfaces/PagoInterface.php";
require_once "./src/Pagos/Paypal.php";
require_once "./src/Pagos/TarjetaCredito.php";
require_once "./src/Pagos/TransferenciaBancaria.php";

use App\Pagos\Paypal;
use App\Pagos\TarjetaCredito;
use App\Pagos\TransferenciaBancaria;

$tarjeta = new TarjetaCredito();
$paypal = new Paypal();
$transferencia = new TransferenciaBancaria();

echo $tarjeta->procesarPago(150.75) . "<br/>";
echo $paypal->procesarPago(200.25) . "<br/>";
echo $transferencia->procesarPago(300.50) . "<br/>";

