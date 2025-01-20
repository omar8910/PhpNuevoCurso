<?php
// Trait Operaciones

trait Operaciones
{
    // Método para depositar
    public function depositar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("La cantidad a depositar debe ser positiva");
        } else {
            $this->saldo += $monto;
        }
    }
    // Metodo para retirar
    public function retirar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("La cantidad a retirar debe ser positiva");
        } elseif ($monto > $this->saldo) {
            throw new InvalidArgumentException("Saldo insuficiente");
        } else {
            $this->saldo -= $monto;
        }
    }
}

// Clase CuentaBancaria
class CuentaBancaria
{
    use Operaciones;
    const MONEDA = "USD";

    public function __construct(
        private $titular,
        private $saldo = null

    ) {}

    public function transferir($monto, CuentaBancaria $cuenta)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("La cantidad a retirar debe ser positiva");
        } else {
            $this->retirar($monto);
            $cuenta->depositar($monto);
        }
    }

    public function obtenerSaldo()
    {
        return $this->saldo . " " . self::MONEDA;
    }
}

//Clase TarjetaCredito;

class TarjetaCredito
{
    use Operaciones;
    const MONEDA = "USD";

    public function __construct(
        private $limiteCredito,
        private $saldo = null,
    ) {}

    // Sobrescribir método retirar para incluir la lógica de límite de crédito
    public function retirar($monto)
    {
        if ($monto <= 0) {
            throw new InvalidArgumentException("La cantidad debe ser positivo.");
        }
        if ($this->saldo - $monto < -$this->limiteCredito) {
            throw new Exception("Límite de crédito excedido.");
        }
        $this->saldo -= $monto;
    }

    public function obtenerSaldo()
    {
        return $this->saldo . " " . self::MONEDA;
    }
}
try {
    // Crear cuentas
    $cuenta1 = new CuentaBancaria("Juan");
    $cuenta2 = new CuentaBancaria("Ana");

    // Depositar en cuentas
    $cuenta1->depositar(500);
    echo "Saldo Cuenta 1: " . $cuenta1->obtenerSaldo() . "<br>";

    $cuenta2->depositar(300);
    echo "Saldo Cuenta 2: " . $cuenta2->obtenerSaldo() . "<br>";

    // Transferir entre cuentas
    $cuenta1->transferir(145, $cuenta2);
    echo "<pre>";
    echo "Saldo después de transferencia:" . "<br>";
    echo "Saldo Cuenta 1: " . $cuenta1->obtenerSaldo() . "<br>";
    echo "Saldo Cuenta 2: " . $cuenta2->obtenerSaldo() . "<br>";
    echo "</pre>";

    // Crear tarjeta de crédito
    $tarjeta = new TarjetaCredito(1000); // Límite de crédito de 1000
    $tarjeta->depositar(100);
    echo "Saldo Tarjeta: " . $tarjeta->obtenerSaldo() . "<br>";

    // Intentar retirar más del límite
    $tarjeta->retirar(1101); // Excede el límite de crédito
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
