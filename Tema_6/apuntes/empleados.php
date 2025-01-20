<?php
// Crear una clase Empleado que tenga nombre y apellido.

class Empleado{
    private string|null $nombre;
    private string|null  $apellidos;

    public function __construct($nombre = null, $apellidos = null)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    public function setNombre($nombre){
        $this->nombre =  $nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function __toString()
    {
        return "<br> Empleado: ". $this->nombre . " " . $this->apellidos;
    }
}

$emp = new Empleado(); // Esta vacío
// echo $emp; Al no setearle ningun nombre ni apellido nos mostrará el valor por defecto que le hemos proporcionado.
$emp->setNombre("Omar");
$emp->setApellidos("Qneiby AlSarsour");
echo $emp;

$emp2 = new Empleado("María", "Cañete Reyes");
echo $emp2;


?>