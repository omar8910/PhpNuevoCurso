<?php
// Ejercicio 1;
// $pais = "España";
// $continente = "Europa";
// $habitantes = 46000000;

// echo "La variable 'pais' es del tipo: " . gettype($pais) . "<br>";
// echo "La variable 'continente' es del tipo: " . gettype($continente) . "<br>";
// echo "La variable 'habitantes' es del tipo: " . gettype($habitantes) . "<br>";

// Ejercicio 2;
// $radio = 5;
// $diametro = $radio * 2;

// $longitud = M_PI * $diametro;
// $superficie = 4 * M_PI * pow($radio, 2);
// $volumen = (4/3) * M_PI * pow($radio, 3);

// echo "La longitud de la esfera es:  " . round($longitud,2) . "<br>";
// // echo "La longitud de la esfera es:  " . printf("%f", $longitud) . "<br>";
// echo "La superficie de la esfera es: " . round($superficie,2) . "<br>";
// echo "El volumen de la esfera es: " . round($volumen,2) . "<br>";


// Ejercicio 3;
// Ecuacion segundo grado.

// $a = 4;
// $b = 4;
// $c = 1;

// if (isset($a, $b, $c)) {
//     // Calculos
//     $discriminante = ($b ** 2) - 4 * $a * $c;
//     $division = 2 * $a;
//     // Mostrar la ecuación de segundo grado
//     echo "Ecuación segundo grado = " . $a . "x2 + " . $b . "x + " . $c . " = 0 <br>";


//     // Si el resultado de dentro de la raíz cuadrada
//     if ($discriminante < 0) {
//         echo "El discriminante es negativo, por lo tanto la raiz cuadrada de un negativo es un numero imaginario (i)";
//     } elseif ($division == 0) {
//         echo "La división es 0, no se puede dividir por 0";
//     } else {
//         $x1 = (-$b + sqrt($discriminante)) / ($division);
//         $x2 = (-$b - sqrt($discriminante)) / ($division);

//         echo "Las posibles soluciones son: $x1 y $x2";
//     }
// }

// Ejercicio 4
// $euros= "2";

// if(isset($euros) && is_numeric($euros)){
//     $euros = intval($euros);
//     echo $dolares = $euros * 1.10;
// }else{
//     echo "No se introdujo un número valido";
// }

// echo gettype($dolares); // double es sinónimo de float.

//Ejercicio 5
// echo "Fecha de ayer: " . (date("d-m-Y", strtotime("-1 day")));
// echo "<br>";
// echo "Fecha de hoy: " . (date("d-m-Y", strtotime("now")));
// echo "<br>";
// echo "Fecha de mañana: ". (date("d-m-Y", strtotime("+1 day")));

// Ejercicio 6

// Primera forma con metodos de array
$cadena = "Hola";
// $cadenaArray = str_split($cadena);
// $cadenaArrayRevertida = array_reverse($cadenaArray);

// $cadena = implode("", $cadenaArrayRevertida);
// echo $cadena;

// Segunda forma con metodos de string.

// $cadenaInvetida = "";
// for($i= strlen($cadena)-1; $i>=0; $i--){ // strlen($cadena)-1 hace que empecemos por el ultimo indice, por lo tanto hacemos que "i" decrezca.
//     $cadenaInvetida .= $cadena[$i];
// }
// echo $cadenaInvetida;

// Ejercicio 7
// echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* <br>";
// echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*** <br>";
// echo "&nbsp;&nbsp;&nbsp;&nbsp;***** <br>";
// echo "&nbsp;&nbsp;******* <br>";
// echo "*********";

// Correctamente
// $niveles = 5;
// for($i=1; $i<=$niveles;$i++){
//     //espacios en blanco
//     for($j=$niveles-$i;$j>0;$j--){
//         echo"&nbsp;&nbsp;";
//     }

//     //asteriscos
//     for($k = 0; $k <(2*$i-1); $k++){
//         echo "*";
//     }

//     echo "<br>";
// }



// Ejercicio 8
// echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* <br>";
// echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;* <br>";
// echo "&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* <br>";
// echo "&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* <br>";
// echo "&nbsp;&nbsp;********";

// Hecho correctamente
// function ShowPyramid($height){
//     for($i=1;$i<=$height; $i++){
//         for($k=1; $k<=$height - $i; $k++){
//             echo "&nbsp;&nbsp;";
//         }

//         for($j=1;$j<=$i;$j++){
//             if($j == 1 || $j == $i || $i == $height){
//                 echo "*&nbsp;&nbsp;";
//             }else{
//                 echo "&nbsp;&nbsp;&nbsp;&nbsp;";
//             }
//         }
//         echo "<br>";
//     }
// }
// echo ShowPyramid(9);

// Ejercicio 9;
// $numeros = [
//     1 => ["One", "Uno"],
//     2 => ["Two","Dos"],
//     3 => ["Three", "Tres"],
//     4 => ["Four", "Cuatro"],
//     5 => ["Five", "Cinco"],
//     6 => ["Six", "Seis"],
//     7 => ["Seven", "Siete"],
//     8 => ["Eight", "Ocho"],
//     9 => ["Nine", "Nueve"],
//     10 => ["Ten", "Diez"]
// ];

// echo "<table>";
// echo "<tr><th>Inglés</th><th>Español</th></tr>";
// foreach ($numeros as $numero){
//     echo "<tr><td>$numero[0]</td><td>$numero[1]</td></tr>";
// }
// echo "</table>";

// Ejercicio 10;

// for($i=0; $i<=100; $i++){
//     if($i%2 == 0){
//         echo $i . "<br>";
//     }
// }

// Ejercicio 11
// for ($i=1; $i<=40;$i++){
//     echo $i*$i . "<br>";
// }

// $i= 0;
// while ($i<=40){
//     echo $i**2 . "<br>";
//     $i++;
// }

// Ejercicio 12

// $dado1 = rand(1, 6);
// $dado2 = rand(1, 6);

// if (isset($dado1) && !is_null($dado1) && isset($dado2) && !is_null($dado2)) {
//     echo "Dado 1: $dado1 <br>";
//     echo "Dado 2: $dado2 <br>";

//     if ($dado1 == $dado2) {
//         echo "Tenemos pareja! --> $dado1 = $dado2";
//     } else if ($dado1 > $dado2) {
//         echo "$dado1 es mayor";
//     } else if ($dado2 > $dado1) {
//         echo "$dado2 es mayor";
//     }
// }


// Ejercicio 13

// for($i=0; $i<=10; $i++){
//     echo "<table>";
//         echo "<tr><th>Tabla del $i</th></tr>";
//         for($j = 0; $j<=10;$j++){
//             echo "<tr>
//             <td>$i x $j = ". $i*$j . "</td>";
//             "</tr>";
//         }
//     echo "</table>";
// }

// Ejercicio 14

// echo "<table style='border: 1px solid black; border-collapse: collapse; width: 100%; margin: 20px auto; text-align: center;'>";
// echo "<tr>
// <th style='border: 1px solid black; padding: 2px;'>Decimal</th>
// <th style='border: 1px solid black; padding: 2px;'>Binario</th>
// <th style='border: 1px solid black; padding: 2px;'>Octal</th>
// <th style='border: 1px solid black; padding: 2px;'>Hexadecimal</th></tr>";


// for ($i = 1; $i <= 20; $i++) {
//     echo "<tr>";
//     echo "<td style='border: 1px solid black; padding: 5px;'>$i</td>";
//     echo "<td style='border: 1px solid black; padding: 5px;'>" . sprintf("%b", $i) . "</td>";
//     echo "<td style='border: 1px solid black; padding: 5px;'>" . sprintf("%o", $i) . "</td>";
//     echo "<td style='border: 1px solid black; padding: 5px;'>" . sprintf("%x", $i) . "</td>";

//     echo "</tr>";
// }

// echo "</table>";


// Ejercicio 15

// if(isset($_GET["numero1"], $_GET["numero2"])){
//     $numero1 = $_GET["numero1"];
//     $numero2 = $_GET["numero2"];

//     if($numero1<$numero2){
//         echo implode(", ", range($numero1+1,$numero2-1));

//     }else{
//         echo "El primer numero debe ser menor que el segundo";
//     }
// }else{
//     echo "No se han proporcionado números";
// }

// Ejercicio 16

if(isset($_GET["numero1"], $_GET["numero2"]) && (!empty($_GET["numero1"] && !empty($_GET["numero2"])))){
    $numero1 = $_GET["numero1"];
    $numero2 = $_GET["numero2"];

    if($numero1<$numero2){
        $numerosImpares = [];
        for($i= $numero1+1; $i< $numero2; $i++){
            if($i%2!=0){
                $numerosImpares[] = $i;
            }
        }
        echo implode(",", $numerosImpares);
    }else{
        echo "El primer numero debe ser menor que el segundo";
    }
}else{
    echo "No se han proporcionado números";
}
