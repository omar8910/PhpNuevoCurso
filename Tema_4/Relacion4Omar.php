<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion Arrays</title>
</head>

<body>
    <?php
    // Ejercicio 1
    echo "<h2>Ejercicio 1</h2>";
    $arrayNumeros = [1, 2, 3, 5, 4, 6, 8, 7];

    function mostrarArray($array)
    {
        // $resultado = "";
        // for($i=0; $i<count($array); $i++){
        //   $resultado .= $array[$i] . " ";
        // }
        // return $resultado;

        echo "[";
        foreach ($array as $key => $value) {
            echo $value . ",";
        }
        echo "]";
    }

    // echo mostrarArray($arrayNumeros);

    // a) Mostrar array
    mostrarArray($arrayNumeros);
    echo "<br>";
    echo "<br>";


    // b) Ordenar array
    sort($arrayNumeros);
    mostrarArray($arrayNumeros);
    echo "<br>";
    echo "<br>";


    // c) Mostrar longitud;
    echo count($arrayNumeros);
    echo "<br>";
    echo "<br>";


    // d)Buscar un elemento en array;
    $valor = 2;
    echo in_array($valor, $arrayNumeros) ? "$valor existe en el array" : "$valor no se encuentra en el array";
    echo "<br>";

    // e)Buscara un elemento en el array pero por URL;
    if (isset($_GET["num1"])) {
        $valor = $_GET["num1"];
    }
    echo in_array($valor, $arrayNumeros) ? "$valor pasado por URL existe en el array" : "$valor pasado por URL no existe en el array";
    echo "<br><hr>";



    // Ejercicio 2
    echo "<h2>Ejercicio 2</h2>";
    $arrayLongitud = [];
    $contador = 0;
    while (count($arrayLongitud) < 120) {
        // $arrayLongitud[$contador] = $contador++; // Posible forma
        array_push($arrayLongitud, $contador++);
    }
    mostrarArray($arrayLongitud);
    echo "<br><hr>";

    // Ejercicio 3
    echo "<h2>Ejercicio 3</h2>";
    $arrayAleatorios = [];
    $arrayComplementario = [];

    for ($i = count($arrayAleatorios); $i < 10; $i++) {
        array_push($arrayAleatorios, rand(0, 1));
    }

    foreach ($arrayAleatorios as $numeroDeArrayAleatorio) {
        if ($numeroDeArrayAleatorio == 1) {
            array_push($arrayComplementario, 0);
        } else {
            array_push($arrayComplementario, 1);
        }
    }

    echo "Array original: ";
    mostrarArray($arrayAleatorios);
    echo "<br>";
    echo "Array complementario: ";
    mostrarArray($arrayComplementario);
    echo "<br><hr>";

    // Ejercicio 4
    echo "<h2>Ejercicio 4</h2>";

    //a Almacena 20 valores aleatorios en un array entre 0 y 100.
    $arrayValoresAleatorios = [];
    echo "Array original: ";
    while (count($arrayValoresAleatorios) < 21) {
        array_push($arrayValoresAleatorios, rand(0, 100));
    };
    mostrarArray($arrayValoresAleatorios);
    echo "<br>";

    //b Guarda los cuadrados en otro array de los valores del primero
    $arrayCuadrados = [];
    echo "Array cuadrados: ";
    foreach ($arrayValoresAleatorios as $clave => $valor) {
        array_push($arrayCuadrados, pow($valor, 2));
    };
    mostrarArray($arrayCuadrados);
    echo "<br>";

    //c Guarda los cubos en otro array de los valores del primero.
    $arrayCubos = [];
    echo "Array cubos: ";
    foreach ($arrayValoresAleatorios as $clave => $valor) {
        array_push($arrayCubos, pow($valor, 3));
    };
    mostrarArray($arrayCubos);
    echo "<br>";

    //d
    echo "<table border='1' style='text-align:center;'>";
    echo "<tr>";
    echo "<th>Valores aleatorios</th>";
    echo "<th>Cuadrados de los valores</th>";
    echo "<th>Cubos de los valores</th>";
    echo "</tr>";

    foreach ($arrayValoresAleatorios as $clave => $valor) {
        echo "<tr>";
        echo "<td>$valor</td>";
        echo "<td>" . pow($valor, 2) . "</td>";
        echo "<td>" . pow($valor, 3) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    //Ejercicio 5
    echo "<h2>Ejercicio 5</h2>";
    $arrayAnimales = [];

    while (count($arrayAnimales) < rand(20, 30)) {
        $randomEmoji = rand(128000, 128060);
        $emoji = mb_chr($randomEmoji, 'UTF-8'); // Esto convierte el unicode en un caracter
        array_push($arrayAnimales, $emoji);
    }

    mostrarArray($arrayAnimales);
    echo count($arrayAnimales);

    $animalRandom = $arrayAnimales[rand(0, count($arrayAnimales) - 1)];
    echo "<br>";
    echo "Animal que se va a borrar: $animalRandom";

    foreach ($arrayAnimales as $clave => $valor) {
        if ($valor == $animalRandom) {
            unset($arrayAnimales[$clave]);
        };
    };

    echo "<br>";
    mostrarArray($arrayAnimales);
    echo count($arrayAnimales);

    echo "<br>";
    echo "<hr>";


    // Ejercicio 6
    echo "<h2>Ejercicio 6</h2>";

    $arrayNumerosAleatorios = [];
    while (count($arrayNumerosAleatorios) < 16) {
        array_push($arrayNumerosAleatorios, rand(1, 15));
    }

    mostrarArray($arrayNumerosAleatorios);
    echo "<br>";

    $numeroExpulsado = array_pop($arrayNumerosAleatorios);
    echo $numeroExpulsado;

    array_unshift($arrayNumerosAleatorios, $numeroExpulsado); // Añade el valor al principio

    // for ($i = 0; $i < count($arrayNumerosAleatorios) - 1; $i++) {
    //     $numeroEliminado = array_shift($arrayNumerosAleatorios); //Elimina el primer numero de un array
    //     array_push($arrayNumerosAleatorios, $numeroEliminado);
    // }

    mostrarArray($arrayNumerosAleatorios);
    echo "<br>";
    echo "<hr>";

    // Ejercicio 7
    echo "<h2>Ejercicio 7</h2>";

    echo "<table border=1px style='text-align:justify';>";
    echo "<tr style='text-align:center';>";
    echo "<th>Variable</th>";
    echo "<th>Valor</th>";

    echo "</tr>";
    foreach ($_SERVER as $clave => $valor) {
        echo "<tr>";
        echo "<td>$clave</td>";
        echo "<td>$valor</td>";

        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<hr>";


    // Ejercicio 8
    echo "<h2>Ejercicio 8</h2>";

    //a) Crea un array con al menos lo datos de 3 profesores (nombre, apellidos, telefono, fecha de nacimiento)
    $arrayProfesores = [
        ["id" => 1, "nombre" => "Omar", "apellidos" => "Qneiby AlSarsour", "telefono" => 654738192, "fecha_nac" => "2001/08/17"],
        ["id" => 2, "nombre" => "Alex", "apellidos" => "Gámez Rueda", "telefono" => 654738192, "fecha_nac" => "2001/01/10"],
        ["id" => 3, "nombre" => "Juan", "apellidos" => "Porta Girón", "telefono" => 654738192, "fecha_nac" => "1989/10/10"]
    ];

    //b) Crear una función que nos permita mostrar el número de registro personal de cada uno de los profesores
    function mostrarRegistro($array)
    {
        foreach ($array as $clave => $valor) {
            echo "El id del profesor {$valor['nombre']} es {$valor['id']} <br>";
        }
    }

    mostrarRegistro($arrayProfesores);

    //c) Modifica la función anterior y conviértela en una función anónima (usa array_map()).

    function mostrarRegistro2($profesor)
    {
        return $profesor["id"];
    }

    $arrayRegistro2 = array_map("mostrarRegistro2", $arrayProfesores);
    foreach ($arrayRegistro2 as $registro) {
        echo $registro . " ";
    }


    //d)Crea una función anónima que nos permita mostrar los profesores que han nacido a partir de 1990. ( Usa strtotime() y array_filter()
    print_r(array_filter($arrayProfesores, fn($profesor) => strtotime($profesor["fecha_nac"]) >= strtotime("1/1/1990")));
    echo "<br><hr>";

    // Ejercicio 9
    echo "<h2>Ejercicio 9</h2>";

    $arrayProvincias = [];

    function guardarProvincias($provincia)
    {
        global $arrayProvincias;

        if (is_string($provincia)) {
            array_push($arrayProvincias, $provincia);
            echo "Provincia añadida correctamente <br>";
        } else {
            echo "No se ha encontrado una provincia válida";
        }
    }

    guardarProvincias("Málaga");
    guardarProvincias("Sevilla");

    print_r($arrayProvincias);
    unset($arrayProvincias[1]);
    print_r($arrayProvincias);

    echo "<br><hr>";

    // Ejercicio 10
    echo "<h2>Ejercicio 10</h2>";

    $arrayPoblacion = [
        "España" => 47000000,
        "Francia" => 35000000,
        "Italia" =>     58997201,
        "Grecia" => 58997201
    ];

    foreach ($arrayPoblacion as $provincia => $habitantes) {
        echo "La provincia $provincia tiene $habitantes habitantes <br>";
    };

    echo "<br><hr>";


    // Ejercicio 11
    echo "<h2>Ejercicio 11</h2>";
    $arrayPeliculas = ["Destino Final", "Corredor del Laberinto", "Ready or Not", "Snoppie"];

    // foreach($arrayPeliculas as $key => $pelicula){
    //     $contador = $key+1;
    //     echo "Pelicula $contador: $pelicula <br>";
    // }

    echo "<table border=1 style='text-align:center'>";
    echo "<tr>";
    echo "<th>Número de pelicula</th>";
    echo "<th>Película</th>";
    echo "</tr>";
    foreach ($arrayPeliculas as $key => $pelicula) {
        $colorAleatorio = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        $contador = $key + 1;
        echo "<tr>";
        echo "<td>Pelicula $contador</td>";
        echo "<td style='color:$colorAleatorio';>$pelicula</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br><hr>";


    // Boletin de Notas
    $arrayAsignaturas = [
        ["Asignatura" => "Matemáticas", "Trimestre_1" => 3, "Trimestre_2" => 10, "Trimestre_3" => 7],
        ["Asignatura" => "Lengua", "Trimestre_1" => 8, "Trimestre_2" => 5, "Trimestre_3" => 3],
        ["Asignatura" => "Latín", "Trimestre_1" => 7, "Trimestre_2" => 2, "Trimestre_3" => 1],
        ["Asignatura" => "Física", "Trimestre_1" => 4, "Trimestre_2" => 7, "Trimestre_3" => 8],
        ["Asignatura" => "Inglés", "Trimestre_1" => 6, "Trimestre_2" => 2, "Trimestre_3" => 3],
    ];
    $mediaTotal = 0;
    echo "<br>";


    echo "<hr>";
    echo "<h2>Boletin de Notas</h1>";
    echo "<hr>";

    echo "<table border=1>";
    echo "<tr>";
    echo "<th>Asignatura</th>";
    echo "<th>Trimestre 1</th>";
    echo "<th>Trimestre 2</th>";
    echo "<th>Trimestre 3</th>";
    echo "<th>Media</th>";
    echo "</tr>";
    foreach ($arrayAsignaturas as $asignatura) {
        echo "<tr>";
        echo "<td>{$asignatura['Asignatura']}</td>";
        echo "<td>{$asignatura['Trimestre_1']}</td>";
        echo "<td>{$asignatura['Trimestre_2']}</td>";
        echo "<td>{$asignatura['Trimestre_3']}</td>";
        echo "<td>";
        $media = round(($asignatura["Trimestre_1"] + $asignatura["Trimestre_2"] + $asignatura['Trimestre_3']) / 3, 2);
        $mediaTotal += $media;
        echo $media;
        echo "</td>";

        echo "</tr>";
    }
    echo "</table>";

    echo "<br>";
    echo "La media total es: " . round($mediaTotal / count($arrayAsignaturas), 2);

    echo "<br><hr>";

    // Ejercicio 14
    echo "<h2>Ejercicio 14</h2>";

    $arrayNumeros = [10, 20, 30, 40, 50];

    function numeroEnArray($arrayNumeros, $numero)
    {
        if (in_array($numero, $arrayNumeros)) {
            echo "El número $numero se encuentra en el array de números <br>";
            echo "Cantidad total de elementos: " . count($arrayNumeros);
        } else {
            echo "El número $numero no se encuentra en el array de números <br>";
        }
    }

    numeroEnArray($arrayNumeros, 40);

    //Ejercicio 15
    echo "<h2>Ejercicio 15</h2>";

    $arrayFrutas = ["manzana", "naranja", "plátano", "pera", "aguacate"];
    sort($arrayFrutas);
    print_r($arrayFrutas);
    echo "<br>";

    // Otra opcion : 
    // unset($arrayFruit[array_search("naranja", $arrayFruit)]);

    // Como no sabriamos cual es el indice, pues buscamos el string fruta y unseteamos el indice para dicho string.
    foreach ($arrayFrutas as $key => $fruta) {
        if ($fruta == "naranja") {
            unset($arrayFrutas[$key]);
        }
    }
    print_r($arrayFrutas);
    echo "<br><hr>";

    //Ejercicio 16
    echo "<h2>Ejercicio 16</h2>";
    $arrayFrutas2 =  ["manzana", "naranja", "pera"];
    echo "Array frutas: ";
    print_r($arrayFrutas2);
    echo "<br>";

    //Inserta platano en el array
    echo "Array frutas con platano: ";
    array_push($arrayFrutas2, "platano");
    print_r($arrayFrutas2);
    echo "<br>";

    //Sacar el último elemento del array
    echo "Array frutas sin ultimo elemento: ";
    array_pop($arrayFrutas2);
    print_r($arrayFrutas2);
    echo "<br>";

    //Darle la vuelta al aray (reverse)
    echo "Array frutas volteado: ";
    $arrayInverso = array_reverse($arrayFrutas2);
    print_r($arrayInverso);
    echo "<br>";

    //Ejercicio 17
    echo "<h2>Ejercicio 17</h2>";

    $arrayProductos = [
        ["nombre" => "Televisor", "precio" => 400, "stock" => 10],
        ["nombre" => "Televisor Sony", "precio" => 350, "stock" => 15],
        ["nombre" => "Televisor Xiaomi", "precio" => 475, "stock" => 25],
        ["nombre" => "Portátil", "precio" => 800, "stock" => 5],
        ["nombre" => "Smartphone", "precio" => 300, "stock" => 20],
    ];

    // Funcion personalizada que compara precios.
    function comparacionAscendiente($a, $b)
    {
        return $a["precio"] <=> $b["precio"];
    }

    // Alfabéticamente
    echo "Ordenado alfabéticamente: ";
    sort($arrayProductos);
    echo "<pre>";
    print_R($arrayProductos);
    echo "</pre>";
    echo "<br><br>";

    // Ordenado por precio utilizando usort. Usort necesita una funcion de ordenacion personalizada
    echo "Ordenado por precio: ";
    usort($arrayProductos, "comparacionAscendiente");
    echo "<pre>";
    print_R($arrayProductos);
    echo "</pre>";

    //Comprobamos si existe un producto en específico.
    function comprobarProducto($array, $producto)
    {
        $encontrado = false;
        foreach ($array as $fila) {
            if (in_array($producto, $fila)) {
                $encontrado = true;
                break;
            }
        }
        if ($encontrado) {
            echo "El producto $producto se encuentra en el array";
        } else {
            echo "El producto $producto no se encuentra en el array";
        }
    }

    function calcularValorTotal($array)
    {
        $valorTotal = 0;
        foreach ($array as $fila) {
            $valorDeItem = $fila["precio"] * $fila["stock"];
            echo "{$fila['nombre']}: " . $valorDeItem . "<br>";
            $valorTotal += $valorDeItem;
        }
        return $valorTotal;
    }


    comprobarProducto($arrayProductos, "Smartphone");
    echo "<br>";
    echo "Valor total: " . calcularValorTotal($arrayProductos);

    echo "<br><hr>";

    // Ejercicio 18
    echo "<h2>Ejercicio 18</h2>";

    $empleados = [
        101 => ["nombre" => "Juan", "salario" => 45000],
        103 => ["nombre" => "Luis", "salario" => 50000],
        104 => ["nombre" => "Marta", "salario" => 60000],
        102 => ["nombre" => "Ana", "salario" => 55000]
    ];

    // Aumentamos un 10% el salario de los empleados que cobren <= 50.000
    function aumentarSalario($empleado)
    {
        if ($empleado["salario"] <= 50000) {
            $empleado["salario"] += $empleado["salario"] * 0.10;
        }
        return $empleado;
    }

    $empleadosSalarioActualizado = array_map("aumentarSalario", $empleados); // Con el array_map ya hace un foreach

    echo "<pre>";
    echo "Array con salario aumentado: <br>";
    print_r($empleadosSalarioActualizado);
    echo "</pre>";

    // Ordenamos en orden ascedente por IDS con ksort();
    ksort($empleadosSalarioActualizado);
    echo "<pre>";
    echo "Array ordenado por IDS: <br>";
    print_r($empleadosSalarioActualizado);
    echo "</pre>";

    // Ordenar por salario usando arsort
    $salarios = array_column($empleadosSalarioActualizado, 'salario', 'nombre');
    arsort($salarios);
    
    
    // Crear un array ordenado de empleados basado en los salarios ordenados
    $empleadosOrdenados = [];
    foreach ($salarios as $nombre => $salario) {
       foreach($empleadosSalarioActualizado as $id => $empleado){
            if($empleado["nombre"] == $nombre){
                $empleadosOrdenados["$id"] = $empleado;
            }
       }
    }

    print_r($empleadosOrdenados);

    // Obtener los tres empleados con los salarios más altos
    $top3Empleados = array_slice($empleadosOrdenados, 0, 3, true);

    echo "<pre>";
    echo "Array con los 3 empleados con los salarios más altos: <br>";
    print_r($top3Empleados);
    echo "</pre>";




















    ?>
</body>

</html>