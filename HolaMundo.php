<?php

// VARIABLE DE VARIABLES:

// Variables:
// $mensaje_es="Hola";
// $mensaje_en="Hello";
// // -------------------
// $idioma = "es";
// $mensaje = "mensaje_" . $idioma;
// print $$mensaje; // Imprime Hola
// // -------------------
// echo "<br>";
// $idioma = "en";
// $mensaje = "mensaje_" . $idioma;
// // -------------------
// print $$mensaje; // Imprime Hello
// print $mensaje; // Imprime mensaje_es


// AMBITO DE LAS VARIABLES:

// $a = 1;
// function prueba()
// {
//  // Dentro de la función no se tiene acceso a la variable $a anterior
//  global $a; // Se declara como global para poder acceder a ella, pero no es recomendable.
//  $b = $a; 
//  echo "<br>" . $b; 
//  // Por tanto, la variable $a usada en la asignación anterior es una variable nueva
//  // que no tiene valor asignado (su valor es null)
// }

// prueba();


// CLASES Y OBJETOS

// class Number{
//     private int|float $number;

//     public function setNumber(int|float $number): void{
//         $this->number = $number;
//     }

//     public function getNumber(): int|float{
//         return $this->number;
//     }
// }

// $objectNumber = new Number;
// $objectNumber->setNumber(45);
// echo "numero: " . $objectNumber->getNumber();

// CONSTANTES

// define("TITULO", "Don Quijote de la Mancha");
// if ( defined( "TITULO")) {
// echo " El título del libro es :  ". TITULO;
// } else{
//     echo "El libro no está definido";
// }

// CONSTANTES PREDEFINIDAS (CONSTANTES MAGICAS)
// echo __LINE__ . " Version de PHP: " . PHP_VERSION . "<br>";
// echo "Estoy en la línea: " . __LINE__;


// Operadores de ejecucion.
// $listado_archivos = `dir`; // Listado de todos los archivos del directorio actual
// echo "<pre>$listado_archivos<pre>"; // Se muestra en pantalla
// De comparación.
// De incremento/decremento
// // De coalescencia nulo.
//     echo "<br>";
//     $variable = "Ana";
//     echo $variable ?? "No existe"; // Es una funcion ternaria, funciona como si fuera un if.
//Nave espacial
//Nullsafe (ejercicio)

class Session
{
    public Usuario $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }
}

class Usuario
{
    public string $nombre;
    private Estudios $estudios;

    public function __construct(Estudios $estudios)
    {
        $this->estudios = $estudios;
    }


    public function getEstudios()
    {
        return $this->estudios;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
}

class Estudios
{
    public string $titulo;
    public string|null $universidad;

    public function __construct(?string $universidad, string $titulo){
        $this->universidad = $universidad;
        $this->titulo = $titulo;
     }
}


$estudios = new Estudios(null,"Ingenieria Química");
$usuario = new Usuario($estudios);
$session = new Session($usuario);

$universidad = $session?->usuario?->getEstudios()?->universidad;
echo $universidad;