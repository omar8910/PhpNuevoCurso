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

// class Session
// {
//     public Usuario $usuario;

//     public function __construct(Usuario $usuario)
//     {
//         $this->usuario = $usuario;
//     }
// }

// class Usuario
// {
//     public string $nombre;
//     private Estudios $estudios;

//     public function __construct(Estudios $estudios)
//     {
//         $this->estudios = $estudios;
//     }


//     public function getEstudios()
//     {
//         return $this->estudios;
//     }

//     public function setNombre(string $nombre)
//     {
//         $this->nombre = $nombre;
//     }
// }

// class Estudios
// {
//     public string $titulo;
//     public string|null $universidad;

//     public function __construct(?string $universidad, string $titulo){
//         $this->universidad = $universidad;
//         $this->titulo = $titulo;
//      }
// }


// $estudios = new Estudios(null,"Ingenieria Química");
// $usuario = new Usuario($estudios);
// $session = new Session($usuario);

// $universidad = $session?->usuario?->getEstudios()?->universidad;
// echo $universidad;

//Arrays
// Declaro Arrays de la nueva forma
// $a = ["a" => "apple", "b" => "banana"];
// $b = ["a" => "pear", "b" => "strawberry", "c" => "cherry"];

// // Sumo los arrays a+b y lo imprimo por la pantalla
// $c = $a + $b;
// print_r($c);
// echo "<br>";
// var_dump($c);

// // Para imprimir el vlaor de manzana
// echo "<br>";
// echo $b["a"];

// Estructuras de Control con formulario:

?>

<!-- <form method="post" action="">
    <label for="dia">¿Qué dia es hoy?: </label>
    <input type="text" id="dia" name="dia">
    <input type="submit" value="Enviar">
</form> -->

<?php
// $dia = null;
// if (isset($_POST['dia']) && !empty($_POST['dia'])) {
//     $dia = (int)htmlspecialchars($_POST['dia']);
// }

// if ($dia !== null) {
//     echo match ($dia) {
//         1 => "Hoy es lunes",
//         2 => "Hoy es martes",
//         3 => "Hoy es miércoles",
//         4 => "Hoy es jueves",
//         5 => "Hoy es viernes",
//         6 => "Hoy es sábado",
//         7 => "Hoy es domingo",
//         default => "Ese día de la semana no existe",
//     };
// }else{
//      echo "Ese dia de la semana no existe";
//  }
?>

<!-- <form method="post" action="">
    <label for="numero">Introduce un numero: </label>
    <input type="text" id="numero" name="numero">
    <input type="submit" value="Enviar">
</form> -->

<?php
// $numero_secreto = 10;
// if (isset($_POST["numero"]) && !is_null($_POST["numero"])) {
//     for ($i = 0; $i <= 10; $i++) {
//         if (intval($_POST["numero"]) === $numero_secreto) {
//             echo "Has adivinado el número: $numero_secreto";
//             break;
//         }else{
//             echo "Número incorrecto";
//             break;
//         }
//     }
// } else {
//     echo "No se ha introducido ningún numero";
// }
?>


<?php



try {
    $numero = 4;
    $divisor = 0;
    if ($divisor == 0) {
        throw new Exception("Divisón por cero");
    } else {
        $divison = $numero / $divisor;
        echo $divison;
    }
} catch (Exception $e) {
    echo "Se ha producido el siguiente error: " . $e->getMessage();
}
?>