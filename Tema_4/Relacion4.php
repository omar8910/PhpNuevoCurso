<html>

    <title>Relacion 3</title>

    <body>


    <!-- <?php

        function CheckTextbox($textbox): bool{
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($textbox) && !empty($textbox) && $textbox !== "") {
                return true;
            }else{
                return false;
            }
        }

        /*
            1. Escribe un script que almacene un array de 8 números enteros:

                a.      recorrerá el array y lo mostrará

                b.       lo ordenará y lo mostrará

                c.       mostrará su longitud

                d.       buscará un elemento dentro del array

                e.      buscará un elemento dentro del array, pero por el parámetro que llegue a la URL

            Para mostrar los elementos del array en cada uno de los apartados se creará una función llamada mostrarArray().
        */


        $array1 = [2,10,5,20,7,30,9,40];

        function ShowArray($array){
            echo "[";
            foreach ($array as $key => $value) {
                echo $value .",";
            }
            echo "]";
        }
        
        echo "<h3>Ejercicio 1</h3>";

        ShowArray($array1);
        echo "<br>";
        
        sort($array1);
        ShowArray($array1);
        echo "<br>";

        echo count($array1) . " elementos en el array";
        echo "<br>";

        echo in_array(2, $array1) ? "2 está en el array" : "2 no está en el array";
        echo "<br>";

        echo in_array($_GET["num1"], $array1) ? $_GET["num1"] . " está en el array" : $_GET["num1"] . " no está en el array";

        echo "<br><hr>";


        /*
            2. Crea un script que añada valores a un array mientras que su longitud sea menor que 120.

            Después mostrará la información del array por pantalla
        */

        

        $array2 = [];
        $counter = 1;
        while(count($array2) < 120){
            array_push($array2, $counter++);
        }


        echo "<h3>Ejercicio 2</h3>";

        ShowArray($array2);

        echo "<br><hr>";

        /*
            3. Escribe un script que rellene un array con valores aleatorios (0,1) y lo muestre. 
            A continuación, calcularemos su complementario y también la mostraremos.
        */

        

        $array3 = [];
        
        while(count($array3) < 10){
            array_push($array3, rand(0,1));
        }

        $array3complement = [];
        foreach ($array3 as $value) {
            if($value == 1) array_push($array3complement, 0);
            else array_push($array3complement, 1);
        }

        echo "<h3>Ejercicio 3</h3>";

        ShowArray($array3);
        echo "<br>";
        ShowArray($array3complement);

        echo "<br><hr>";


        /*
            4. Escriba un script PHP que:

            Guarde en un array 20 valores aleatorios entre 0 y 100.
            En un segundo array, llamado cuadrados, deberá almacenar los cuadrados de los valores que hay en el primer array.
            En un tercer array, llamado cubo, se deben almacenar los cubos de los valores que hay en el primer array.
            Por último, se mostrará el contenido de los tres arrays dispuesto en tres columnas paralelas.
        */

        

        $array4 = [];
        
        while(count($array4) < 20){
            array_push($array4, rand(0,100));
        }

        $array4square = [];
        foreach ($array4 as $value) {
            array_push($array4square, $value ** 2);
        }

        $array4cube = [];
        foreach ($array4 as $value) {
            array_push($array4cube, $value ** 3);
        }

        echo "<h3>Ejercicio 4</h3>";


        for ($i = 0; $i < 20; $i++) { 
            echo $array4[$i] . " - " . $array4square[$i] . " - " . $array4cube[$i] . "<br>";
        }

        echo "<br><hr>";

        /*
            5. Escriba un programa que:

                Muestre un grupo de entre 20 y 30 animales al azar.
                Se usará un array para almacenar el código de los animales. El número de elementos del array será el determinado aleatoriamente entre 20 y 30. Tenga en cuenta que los animales son caracteres con rango Unicode: 128000 a 128060. Por ejemplo, podría mostrar el siguiente resultado:

                A continuación, mostrará un animal al azar de los que están incluidos en el grupo anterior y lo eliminará del array. Por ejemplo:              
                                
                Por último, mostrará de nuevo el grupo inicial, pero habiendo eliminado del grupo los animales que coincidan con el animal suelto (al menos habrá uno). También mostrará un mensaje con el número total de animales que quedan.  En el ejemplo anterior quedarían 21 animales. 
                Notas:

                uso de las funciones  rand(), array_rand(), unset.
                Crea las funciones que consideres oportunas.
        */

        

        $array5 = [];
        $maxSize = rand(20, 30);

        while(count($array5) < $maxSize){
            $random = rand(128000, 128060);
            $emoji = mb_chr($random, 'UTF-8');
            array_push($array5, $emoji);
        }
        

        echo "<h3>Ejercicio 5</h3>";

        ShowArray($array5);
        echo "<br>";
        echo "Longitud del array: " . count($array5);
        echo "<br>";

        $randomAnimal = $array5[rand(0, count($array5) -1)];
        echo "Animal a eliminar: " . $randomAnimal;
        echo "<br>";

        foreach ($array5 as $key => $value) {
            if($value == $randomAnimal){
                unset($array5[$key]);
            }
        }

        ShowArray($array5);
        echo "<br>";
        echo "Longitud del array: " . count($array5);

        echo "<br><hr>";

        /*
            6. Escriba un script que cree un array con 15 números aleatorios y los muestre en pantalla. 

            A continuación, rotará los elementos de ese array una posición. 
            Es decir, el elemento de la posición 0 debe pasar a la posición 1, el de al 1 a la 2, …, 
            el elemento de la última posición pasará a la posición 0. 

            Por último, mostrará el nuevo contenido del array.
        */

        

        $array6 = [];
        
        while(count($array6) < 15){
            array_push($array6, rand(0,20));
        }

        

        echo "<h3>Ejercicio 6</h3>";

        ShowArray($array6);
        echo "<br>";

        for ($i = 0; $i < count($array6) - 1; $i++) {
            $num = array_shift($array6);
            array_push($array6, $num);
        }

        ShowArray($array6);

        echo "<br><hr>";

        /*
            7. Usar foreach para mostrar todos los valores del array $_SERVER en una tabla con dos columnas. 

            La primera columna debe contener el nombre de la variable, y la segunda su valor
        */

        
        

        echo "<h3>Ejercicio 7</h3>";

        echo "<table border=1>";

        foreach ($_SERVER as $key => $value) {
            echo "<tr>";

            echo "<td>" . $key . "</td>";
            echo "<td>" . $value . "</td>";

            echo "</tr>";
        }

        echo "</table>";

        echo "<br><hr>";


        /*
            8. Supongamos que guardamos en una array los datos de los profesores de este centro educativo.

            Cada elemento de este array a su vez será otro array asociativo que nos permitirá almacenar su número de registro personal, 
            su nombre, su apellido/s, su teléfono, y su fecha de nacimiento.

            Se desea:

            a) Crear un array con al menos los datos de 3 profesores

            b) Crear una función que nos permita mostrar el número de registro personal de cada uno de los profesores

            c) Modifica la función anterior y conviértela en una función anónima (usa array_map()).

            d) Crea una función anónima que nos permita mostrar los profesores que han nacido a partir de 1990. 
            ( Usa strtotime() y array_filter()

            NOTA: Ejemplo de uso de funciones anónimas , arrays , array_map() y array_filter().
        */

        
        $array8 = [
            ["id" => 1, "nombre" => "Pepe", "Apellidos" => "García García", "telefono" => "682839240", "fechanacimiento" => "1/1/1980"],
            ["id" => 2, "nombre" => "Paco", "Apellidos" => "Gomez Hernández", "telefono" => "611090987", "fechanacimiento" => "7/12/1991"],
            ["id" => 3, "nombre" => "Juan", "Apellidos" => "Ruiz Hidalgo", "telefono" => "601232343", "fechanacimiento" => "5/2/2000"],
        ];
        
        function ShowIDs($array){
            echo "Números de registro personal: ";
            foreach($array as $value){
                echo $value["id"] . " ";
            }
        }

        function ShowIDs2($professor){
            return $professor["id"];
        }


        $arrayMap = array_map("ShowIDs2", $array8);

        echo "<h3>Ejercicio 8</h3>";

        ShowIDs($array8);
        echo "<br>";

        ShowArray($arrayMap);
        echo "<br>";

        print_r(array_filter($array8, fn($x) => strtotime($x["fechanacimiento"]) >= strtotime("1/1/1990")));

        echo "<br><hr>";

        /*
            9. Escribe un programa que guarde en un array los nombres de las provincias de Andalucia.

            Usa la función unset() para borrar el elemento que desees de ese array. 
            Deberás pasarle a la función como parámetro el índice del elemento a borrar. 

            Por ejemplo, puedes borrar la de índice 2. Nota: Si no pones el índice en la función unset() se 
            borrarán todos los elementos del array
        */
 
        $array9 = ["Granada", "Málaga", "Cádiz", "Jaén", "Sevilla", "Huelva", "Córdoba", "Almería"];

        echo "<h3>Ejercicio 9</h3>";

        ShowArray($array9);
        echo "<br>";

        unset($array9[2]);

        ShowArray($array9);

        echo "<br><hr>";


        /*
            10. Crea un array asociativo (o diccionario) con el censo de población de: España, Portugal, Francia, Italia y Grecia. 
        */
 
        $array10 = ["España" => 48797875, "Portugal" => 10639726, "Francia" => 68401997, "Italia" => 	58997201, "Grecia" => 58997201];

        echo "<h3>Ejercicio 10</h3>";

        print_r($array10);

        echo "<br><hr>";



        /*
            11. Guarda en un array tus 10 películas favoritas.
            Imprime en párrafos con el siguiente formato que incluye la posición de la película: ‘Película 4: Los Vengadores’
            Vuelve a mostrar las películas pero en lugar de párrafos usa una tabla.
            Añade un poco de CSS para mejorar el diseño. Cada título debe tener un color aleatorio. 
        */
 
        $array11 = ["Shrek", "Los Vengadores", "Matrix", "Gladiator", "John Wick"];

        echo "<h3>Ejercicio 11</h3>";

        foreach($array11 as $key => $value){
            echo "Película " . $key+1 . ": " . $value . "<br>";
        }

        echo "<table border=1>";

        foreach ($array11 as $key => $value) {
            echo "<tr>";

            echo "<td>" . "Película " . $key+1 . "</td>";
            echo "<td>" . $value . "</td>";

            echo "</tr>";
        }

        echo "</table>";

        echo "<br><hr>";


        /*
            12. Utiliza arrays y funciones para escribir el código fuente, en lenguaje PHP, 
            que presente en el navegador del cliente esta página:
        */
 
        $array12 = [
            ["Asignatura" => "Matemáticas", "Trimestre 1" => 3, "Trimestre 2" => 10, "Trimestre 3" => 7],
            ["Asignatura" => "Lengua", "Trimestre 1" => 8, "Trimestre 2" => 5, "Trimestre 3" => 3],
            ["Asignatura" => "Física", "Trimestre 1" => 7, "Trimestre 2" => 2, "Trimestre 3" => 1],
            ["Asignatura" => "Latín", "Trimestre 1" => 4, "Trimestre 2" => 7, "Trimestre 3" => 8],
            ["Asignatura" => "Inglés", "Trimestre 1" => 6, "Trimestre 2" => 2, "Trimestre 3" => 3],
        ];

        echo "<h3>Ejercicio 12</h3>";

        // echo "<body style='background-color:lightblue'>";
        echo "<h1>Boletin Notas<h1>";

        echo "<table border=1>";

        $totalAverage = 0;

        echo "<tr>
            <th>Asignatura</th><th>Trimestre 1</th><th>Trimestre 2</th><th>Trimestre 3</th><th>Media</th>
        </tr>";

        foreach ($array12 as $subject) {
            echo "<tr>";
            foreach($subject as $field){
                echo "<td>" . $field . "</td>";
            }
            $average = round(($subject['Trimestre 1'] + $subject['Trimestre 2'] + $subject['Trimestre 3']) / 3, 1);
            $totalAverage += $average;
            echo "<td>" . $average . "</td>"; 
            echo "</tr>";
        }

        echo "</table>";

        echo "<h3>La media total es " . round($totalAverage/count($array12), 1) . "</h3>";

        echo "<br><hr>";


        /*
            13. Para realizar el siguiente ejercicio nos basaremos en un juego de cartas de la baraja española llamado Brisca.

            a)    Reparte tres cartas a un jugador.

            Asegúrate de que no se repite ninguna carta, igual que si la hubieras cogido de una baraja real.
            Muestra las cartas que ha recibido el jugador. Se adjunta una carpeta con imágenes de cartas para que 
            puedas usarlas en la presentación.
            b)    Supongamos que la partida ha finalizado y el jugador quiere saber los puntos que tiene en su baza. 
            Para realizar este ejercicio supondremos que el jugador tiene 10 cartas en su baza

            Muestra las cartas de la baza de este jugador ( tienes que extraerlas al azar de la baraja y verificar que no están repetidas)
            Utiliza un array asociativo para obtener los puntos a partir del nombre de la figura de la carta.
            Suma los puntos de cada una de las cartas de su baza.
            Muestra el resultado
            Recomendaciones:

            Usa un array para guardar los palos de la baraja.
            Utiliza un array para guardar los nombres de las cartas: Sota, Caballo, As,…
        */
 
        $palos = ["bastos", "oros", "espadas", "copas"];
        $deck = [];
        foreach($palos as $palo){
            for($i = 1; $i < 13; $i++){
                array_push($deck, [$palo,$i]);
            }
        }

        function GetCard(&$deck){
            $random = rand(0, count($deck));
            $card = $deck[$random];
            unset($deck[$random]);
            return $card;
        }


        echo "<h3>Ejercicio 13</h3>";
        echo count($deck);
        echo "<br>";

        $card = GetCard($deck);
        echo $card[0] . $card[1];
        echo "<br>";

        // echo '<img src="data:image/jpeg;base64,';

        echo count($deck);
        echo "<br>";

        echo "<br><hr>";





        /*
            14. Enunciado: Dado un array de números enteros, 
            se debe verificar si un número específico está presente en el array y, además, 
            contar cuántos elementos hay en dicho array. Debes utilizar las funciones in_array() 
            para realizar la búsqueda y count() para contar el número de elementos. 
            El programa debe devolver si el número existe o no, y la cantidad total de elementos.

            Ejemplo: El array contiene los números [10, 20, 30, 40, 50]. 
            Se debe comprobar si el número 30 está presente y cuántos elementos hay en total en el array.
        */


        $arrayNum = [2,10,5,20,7,30,9,40];

        echo "<h3>Ejercicio 14</h3>";

        var_dump($arrayNum);
        echo "<br>";
        echo in_array(10, $arrayNum) ? "10 está en el array" : "10 no está";
        echo "<br>";
        echo in_array(1, $arrayNum) ? "1 está en el array" : "1 no está";
        echo "<br>";
        echo "El tamaño del array es de " . count($arrayNum);

        echo "<br><hr>";


        /*
            15. Enunciado: Tienes un array de frutas en desorden y tu tarea es ordenarlas alfabéticamente 
            usando la función sort(). Después de ordenar el array, 
            debes eliminar un elemento específico, por ejemplo, "naranja", utilizando la función unset(). 
            Finalmente, muestra el array resultante después de realizar ambas operaciones.

            Ejemplo: El array contiene las frutas [manzana, naranja, plátano, pera]. 
            Primero debes ordenarlas y luego eliminar "naranja".
        */

        $arrayFruit = ["manzana", "plátano", "cereza", "naranja", "pera"];

        echo "<h3>Ejercicio 15</h3>";

        print_r($arrayFruit);
        echo "<br>";
        sort($arrayFruit);
        print_r($arrayFruit);
        echo "<br>";
        unset($arrayFruit[array_search("naranja", $arrayFruit)]);
        print_r($arrayFruit);

        echo "<br><hr>";

        /*
            16. Simula el comportamiento de una pila utilizando arrays en PHP. 
            Primero, inserta un nuevo elemento al final del array usando array_push(). 
            Luego, extrae el último elemento de la pila con array_pop(). 
            Finalmente, voltea el array usando array_reverse() para mostrar los elementos en orden inverso al original.

            Ejemplo: Considera un array de frutas ["manzana", "naranja", "pera"]. 
            Debes insertar "plátano", luego extraer la última fruta y finalmente voltear el array restante.
        */

        echo "<h3>Ejercicio 16</h3>";

        print_r($arrayFruit);
        echo "<br>";
        array_push($arrayFruit, "Mango");
        array_push($arrayFruit, "Papaya");
        print_r($arrayFruit);
        echo "<br>";

        array_pop($arrayFruit);
        print_r($arrayFruit);
        echo "<br>";

        print_r(array_reverse($arrayFruit));
        
        echo "<br><hr>";


        /*
            17. Se te proporciona un array multidimensional que contiene información sobre 
            diferentes productos en una tienda. Cada producto tiene el nombre, precio, y cantidad en stock. 
            Tu tarea es realizar las siguientes operaciones:

            Ordena el array de productos primero por precio en orden ascendente y luego por cantidad en stock en 
            orden descendente. Para esto, utiliza las funciones usort() y una función de comparación personalizada.
            Después de la ordenación, verifica si un producto específico, por ejemplo "Televisor", existe en la 
            lista usando in_array() o array_search().
            Finalmente, calcula el valor total de todos los productos en stock (precio * cantidad) y muestra el total.
        */

        function CompareProducts($a, $b)
        {
            if ($a["nombre"] == $b["nombre"]) {
                return $b["stock"] - $a["stock"];
            }
            return ($a["nombre"] < $b["nombre"]) ? -1 : 1;
        }

        $productos = [
            ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
            ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
            ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
            ["nombre" => "Smartphone", "precio" => 99, "stock" => 2000],
            ["nombre" => "Smartphone", "precio" => 199, "stock" => 2],
            ["nombre" => "Abrelatas", "precio" => 1, "stock" => 10],
        ];


        echo "<h3>Ejercicio 17</h3>";

        print_r($productos);
        echo "<br><br>";

        usort($productos, "CompareProducts");

        print_r($productos);
        echo "<br><br>";

        foreach ($productos as $value) {
            if(in_array("Televisor", $value)){
                echo "Hay televisor";
            }
        }

        echo "<br>";
        foreach ($productos as $value) {
            echo $value["nombre"] . " - Precio total: " . $value["precio"] * $value["stock"] . " ----- ";
        }


    ?> -->

    </body>
</html>

<?php
$empleados = [
    101 => ['Nombre' => 'Juan', 'Salario' => 55000],
    102 => ['Nombre' => 'Pedro', 'Salario' => 35000],
    103 => ['Nombre' => 'Luis', 'Salario' => 22000],
    95 => ['Nombre' => 'Reina', 'Salario' => 12000],
    97 => ['Nombre' => 'Raúl', 'Salario' => 60000],
];

function aumentarSalario($empleado){
    if ($empleado['Salario'] < 50000) 
        $empleado['Salario'] *= 1.10; 
    return $empleado;
}

function mostrarSalario($empleados){
    foreach ($empleados as $id => $empleado) {
        echo "<br> El id {$id} del empleado {$empleado['Nombre']} gana {$empleado['Salario']} euros.";
    }
}

mostrarSalario($empleados);

// 1. Aumento del salario en un 10% salvo aquellos que ganan más de 50000
echo "<h1> Aumento el salario un 10% </h1>";
$empleados = array_map('aumentarSalario', $empleados);
mostrarSalario($empleados);

// 2. Ordeno por ID
echo "<h1> Los ordeno </h1>";
ksort($empleados);
mostrarSalario($empleados);

// 3. 3 empleados con salario más alto usando arsort
echo "<h1> Muestro los 3 salarios más altos </h1>";

// Extraer los salarios en un array separado
$salarios = array_column($empleados, 'Salario', 'Nombre');

// Ordenar el array de salarios en orden descendente
arsort($salarios);

// Obtener los nombres de los tres empleados con los salarios más altos
$top3Nombres = array_slice(array_keys($salarios), 0, 3);

// Filtrar los empleados originales para obtener los detalles de los tres empleados con los salarios más altos
$top3Empleados = array_filter($empleados, function($empleado) use ($top3Nombres) {
    return in_array($empleado['Nombre'], $top3Nombres);
});

// Mostrar los tres empleados con los salarios más altos
mostrarSalario($top3Empleados);
?>