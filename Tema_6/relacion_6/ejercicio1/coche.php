<?php 
class Coche
{
    public function __construct(
        private string $color = "Rojo",
        private string $marca = "Ferrari",
        private string $modelo = "Aventador",
        private int $velocidad = 300,
        private int $caballos = 500,
        private int $plazas = 2
    ) {}

    public function setColor($color){
        $this->color=$color;
    }

    public function getColor(){
        return $this->color;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function frenar()
    {
        return $this->velocidad--;
    }

    public function acelerar()
    {
        return $this->velocidad++;
    }

    public function __toString()
    {
        return  "<br>Marca: " . $this->marca .
            "<br>Modelo: " . $this->modelo .
            "<br>Color: " . $this->color .
            "<br>Velocidad: " . $this->velocidad .
            "<br>Caballos: " . $this->caballos .
            "<br>Plazas: " . $this->plazas;
    }
}
