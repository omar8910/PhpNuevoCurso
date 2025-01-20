<?php
class Persona
{
    public function __construct( // Nueva forma de hacer el constructor directamente

        private string $dni,
        private string $nombre,
        private string $apellido
    ) {}

    // Getters
    public function getDni()
    {
        return $this->dni;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    // Setters
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->nombre = $apellido;
    }

    // toString
    public function __toString()
    {
        return "<br> Persona: " . $this->nombre . " " . $this->apellido;
    }
}

// Una clase Cliente que herede de la clase persona
class Cliente extends Persona
{
    public function __construct($dni, $nombre, $apellido, private int $saldo)
    {
        parent::__construct($dni, $nombre, $apellido);
    }
    /*Como los métodos/getters/setters que hay en la clase padre la hereda el hijo, 
    no tendremos que definirlas de nuevo, solo las nuevas
    */
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }

    public function getSaldo(){
        return $this->saldo;
    }
    
    public function __toString(){
        return "<br> Cliente: " . $this->getNombre() . " " . $this->getApellido(). ", con saldo: ". $this->saldo;
    }
}

$persona1 = new Persona("11859264G", "Omar", "Qneiby AlSarsour");
echo $persona1;

$cliente = new Cliente("11859264G", "Omar", "Qneiby AlSarsour", 10000);
echo $cliente;

// Creamos una funcion externa para cambiar el nombre;
function cambiarNombre(Persona $persona, string $nombreNuevo){
    $persona->setNombre($nombreNuevo);
}

echo "<br><br>Nombre cambiado realizado";
cambiarNombre($persona1, "Mohamed");
echo $persona1;

// Podemos argumentos con nombre en caso de que no nos acordemos del orden.
$cliente2 = new Cliente(saldo:20000, apellido:"Gámez Rueda", nombre:"Alex", dni:"Ni idea");
echo $cliente2;