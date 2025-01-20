<?php
class Producto
{
    const IVA = 0.20;
    const DESCUENTO_MAXIMO = 0.30;

    public function __construct(
        private string $nombre,
        private float $precio,
        private int $stock
    ) {
        if ($precio <= 0) {
            throw new InvalidArgumentException("El precio debe ser mayor a 0");
        }
        if($stock < 0){
            throw new InvalidArgumentException("El stock no puede ser negativo");
        }
    }

    public function getPrecio(){
        return $this->precio;
    }


    public function setPrecio(float $precio): void {
        if($precio<=0){
            throw new InvalidArgumentException("El precio debe ser mayor a 0");
        }else{
            $this->precio = $precio;
        }
    }

    public static function calcularPrecioConIva(float $precio): float{
        return $precio * (1+self::IVA);
    }

    public function aplicarDescuento(int $porcentaje):void {
        if($porcentaje > self::DESCUENTO_MAXIMO){
            throw new InvalidArgumentException("El descuento no puede exceder el 30%");
        }else{
            $this->precio -= $this->precio *($porcentaje);
        }
    }
}

// Ejemplo de uso
try{
 $producto = new Producto("Portatil", 1000, 10);
 echo "Precio original con IVA: ". Producto::calcularPrecioConIva($producto->getPrecio()) . "<br/>";

}catch(Exception $e){
    echo "Error: " . $e->getMessage();
}