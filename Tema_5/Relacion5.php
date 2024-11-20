<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario inicial</title>
</head>

<body>
    <!-- Ejercicio 1 -->
    <!-- <form action="./alumnoaniadido.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br /><br />
        

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos"><br /><br />

        <label for="fecha_nac">Fecha nacimiento:</label>
        <input type="date" name="fecha_nac"><br /><br />

        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo"><br /><br />

        <label for="lenguajes">¿Qué lenguajes de programación conoces?</label>
        <input type="checkbox" name="lenguajes[]" value="c++" checked>C++
        <input type="checkbox" name="lenguajes[]" value="javascript">JavaScript
        <input type="checkbox" name="lenguajes[]" value="php">PHP
        <input type="checkbox" name="lenguajes[]" value="python">Python
        <br /><br />

        <label for="pregunta">¿Sabes crear páginas web estáticas?</label>
        <input type="radio" name="pregunta" value="si" checked>Si
        <input type="radio" name="pregunta" value="no">No
        <br/><br />

        <label for="comentario">Comentarios:</label>
        <textarea name="comentario" rows="10" cols="50"></textarea>
        <br/><br />


        <label for="password">Contraseña:</label>
        <input type="password" name="password">
        <br/><br />

        <label for="password_repeat">Repetir contraseña:</label>
        <input type="password" name="password_repeat">
        <br/><br />

        <input type="submit" value="Enviar">
    </form> -->


    <!-- Ejercicio 2-->
    <!-- <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST["usuario"] ?? '';
                $password = $_POST["password"] ?? '';

                if ($usuario === "usuario" && $password === "1234") {
                    header("location: ./login.php");
                } else {
                    echo "No coinciden los parámetros";
                }
            }

            ?> -->
    <!-- <form action="" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id=""><br />

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id=""><br />

        <input type="submit" value="Enviar">
    </form> -->


    <!-- Ejercicio 3 -->
    <!-- <form method="post" action="spam.php">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="telefono">Teléfono: </label>
        <input type="tel" name="telefono" id="telefono" required><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <input type="submit" value="Enviar formulario">
    </form> -->


    <!-- Ejercicio 4 -->
    <?php
    // Funcion crear array
    function crearArrayAlumnos()
    {
        $alumnos = [
            "Marta" => [8, 7],
            "Luis" => [5],
            "Lorena" => [6, 9],
            "Omar" => [10, 9]
        ];
        return $alumnos;
    }

    // La guardamos en una variable
    $arrayAlumnos = crearArrayAlumnos();

    // Funcion para añadir un nuevo alumno
    function aniadirAlumno($nombre, $notas, &$arrayAlumnos)
    {
        $notasSinEspacios = trim($notas); // Quitamos los espacios o caracteres al principio y al final
        $arrayNotas = explode(",", $notasSinEspacios); // Convertimos el string en array

        if (array_key_exists($nombre, $arrayAlumnos)) {
            echo "El alumno ya existe en el sistema"; // Ya existe en el ArrayAlumnos
        } else {
            $arrayAlumnos[$nombre] = $arrayNotas; // Añade al arrayAlumnos el nombre y su respectiva nota
            echo "Alumno añadido correctamente";
        }
    }

    // Procesar el formulario si se envía
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $notas = $_POST["notas"];
        $arrayAlumnos = json_decode($_POST["arrayAlumnos"], true); // Decodificar el array de alumnos, lo recibimos del JSON y lo convertimos array de nuevo.

        aniadirAlumno($nombre, $notas, $arrayAlumnos);
    }

    // Funcion mostrar array
    function mostrarArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    // Funcion para convertir a string un array
    function convertirString($array)
    {
        return implode(", ", $array);
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Añadir Alumno</title>
    </head>

    <body>
        <form method="POST" action="">
            <label for="nombre">Nombre del alumno: </label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="notas">Notas del alumno: </label>
            <input type="text" name="notas" id="notas">

            <!-- Para pasar el array como array y no como cadena de texto, necesitamos el json_encode() -->
            <input type="hidden" name="arrayAlumnos" value='<?php echo json_encode($arrayAlumnos); ?>'>


            <input type="submit" value="Añadir alumno">
        </form>

        <?php
        // Mostrar el array de alumnos
        // mostrarArray($arrayAlumnos);
        echo "<br>";

        // Tabla
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Alumno</th>";
        echo "<th>Notas</th>";
        echo "</tr>";

        $totalNotas = 0;
        $totalAlumnos = 0;

        foreach ($arrayAlumnos as $alumno => $notas) {
            // Calculamos la media sumando las notas del array con array_sum y las dividimos segun el numero de notas adquiridas count(notas)
            $media = array_sum($notas) / count($notas);
            // Sumamos todas las notas que hay.
            $totalNotas += array_sum($notas);
            // Sumamos el numero de notas que hay.
            $totalAlumnos += count($notas);
            $notasString = convertirString($notas);
            echo "<tr>";
            sort($notas);
            echo "<td>$alumno</td>";
            echo "<td>" . $notasString . "</td>";
            echo "<td>" . number_format($media, 2) . "</td>";
            echo "</tr>";
        }

        // Calculamos la media total
        $mediaTotal = $totalNotas / $totalAlumnos;

        // Y añadimos una fila más a la tabla
        echo "<tr>";
        echo "<td colspan='2'>Media Total</td>";
        echo "<td>" . number_format($mediaTotal, 2) . "</td>";
        echo "</tr>";
        echo "</table>";
        ?>
    </body>

    </html>
</body>

</html>