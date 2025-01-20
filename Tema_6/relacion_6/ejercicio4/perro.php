<?php
class Perro
{
    public function __construct(
        private int $tamanio,
        private string $raza,
        private string $color,
        private string $nombre
    ) {}

    // Getters

    public function getTamanio()
    {
        return $this->tamanio;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    // Setters

    public function setTamanio($tamanio)
    {
        $this->tamanio = $tamanio;

        return $this;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }



    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }


    public function setNombre($nombre)
    {
        if (is_string($nombre) && strlen($nombre) <= 21) {
            $this->nombre = $nombre;
            return true;
        }
        return false;
       
    }

    public function speak()
    {
        echo "Woof Woof! Me llamo $this->nombre y soy un perro $this->raza <br>";
    }


    public function mostrar_propiedades()
    {
        return "El tamaño del perro es: $this->tamanio kg, <br>
        Su color: $this->color, <br>
        Su raza: $this->raza, <br>
        Su nombre: $this->nombre
        ";
    }

    public function __toString()
    {
        return $this->mostrar_propiedades();
    }
}
