<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion 2</title>
</head>

<body>
    <?php
    // Declaramos variables
    $nombre = "";
    $apellidos = "";
    $telefono = "";
    $correo = "";
    $empleo = "";
    $url = "";
    $lenguajes = [];

    $errNombre = $errApellidos = $errTelefono = $errCorreo = $errEmpleo = $errLenguajes = $errURL = "";

    // Radio / Checkbox
    $estadoEmpleo = ["Sin empleo", "Media jornada", "Tiempo completo"];
    $listaLenguajes = ["Python", "Php", "Javascript", "Java", "C++"];

    // Expresiones regulares
    $patrones = [
        "nombre" => "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/",
        "apellidos" => "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/",
        "telefono" => "/^[0-9]{9}$/"
    ];

    // Función de saneamiento
    function sanearDatos($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }

    // Si se envía el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //  Validacion nombre
        if (empty($_POST["nombre"])) {
            $errNombre = "El nombre es obligatorio";
        } else {
            $nombre = $_POST["nombre"];
            sanearDatos($nombre);
            if (!preg_match($patrones["nombre"], $nombre)) {
                $errNombre = "Solo se admiten letras y espacios";
            }
        }

        // Validacion apellidos
        if (empty($_POST["apellidos"])) {
            $errApellidos = "Los apellidos son obligatorios";
        } else {
            $apellidos = $_POST["apellidos"];
            sanearDatos($apellidos);
            if (!preg_match($patrones["apellidos"], $apellidos)) {
                $errApellidos = "Solo se admiten letras y espacios";
            }
        }

        // Validacion correo
        if (empty($_POST["correo"])) {
            $errCorreo = "El correo es obligatorio";
        } else {
            $correo = $_POST["correo"];
            sanearDatos($correo);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errCorreo = "Formato de correo inválido";
            }
        }

        // Validacion teléfono
        if (empty($_POST["telefono"])) {
            $errTelefono = "El teléfono es obligatorio";
        } else {
            $telefono = $_POST["telefono"];
            sanearDatos($telefono);
            if (!preg_match($patrones["telefono"], $telefono)) {
                $errTelefono = "El teléfono debe tener 9 dígitos";
            }
        }

        // Validacion empleo (RADIO)
        if (empty($_POST["empleo"])) {
            $errEmpleo = "El estado actual de empleo es obligatorio";
        } else {
            $empleo = $_POST["empleo"];
            sanearDatos($empleo);
            if (!in_array($empleo, $estadoEmpleo)) {
                $errEmpleo = "No se ha encontrado el estado seleccionado";
            }
        }

        // Validacion de lenguajes (CHECKBOX)
        if (empty($_POST["lenguajes"])) {
            $errLenguajes = "Debe elegir como mínimo un lenguaje";
        } else {
            $lenguajes = $_POST["lenguajes"];
            foreach ($lenguajes as $leng) {
                sanearDatos($leng);
                if (!in_array($leng, $listaLenguajes)) {
                    $errLenguajes = "No se encontró este lenguaje en la lista";
                    break;
                }
            }
        }

        // Validacion URL
        if (empty($_POST["url"])) {
            $errURL = "La URL es obligatoria";
        } else {
            $url = $_POST["url"];
            sanearDatos($url);
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                $errURL = "La URL no es válida";
            }
        }

        if (empty($errNombre) && empty($errApellidos) && empty($errCorreo) && empty($errTelefono) && empty($errEmpleo) && empty($errLenguajes) && empty($errURL)) {
            echo "<h2>Datos válidos: </h2>";
            echo "Nombre: $nombre<br>";
            echo "Apellidos: $apellidos<br>";
            echo "Telefono: $telefono<br>";
            echo "Estado de empleo: $empleo<br>";
            echo "Lenguajes que domina: " . implode(", ", $lenguajes);
            echo "<p>URL del trabajo: <a href=\"$url\">$url</a></p>";
        }
    };


    ?>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" style="border:1px black solid; padding:10px;">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?=$nombre?>">
        <span style="color:red"><?= "<b><i>$errNombre</b></i>" ?></span><br><br>


        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?=$apellidos?>">
        <span style="color:red"><?="<b><i>$errApellidos</b></i>"; ?></span><br><br>

        <label for="correo">Correo: </label>
        <input type="email" name="correo" id="correo" value="<?=$correo?>">
        <span style="color:red"><?="<b><i>$errCorreo</i></b>"?></span><br><br>


        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" value="<?=$telefono?>">
        <span style="color:red"><?="<b><i>$errTelefono</i></b>" ?></span><br><br>


        <label for="empleo">Estado de empleo: </label><br>
        <input type="radio" name="empleo" id="empleo" value="Sin empleo" <?php if ($empleo == "Sin empleo") echo "checked"; ?>>
        <label for="sin_empleo">Sin empleo</label><br>
        <input type="radio" name="empleo" id="empleo" value="Media jornada" <?php if ($empleo == "Media jornada") echo "checked"; ?>>
        <label for="media_jornada">Media jornada</label><br>
        <input type="radio" name="empleo" id="empleo" value="Tiempo completo <?php if ($empleo == "Tiempo completo") echo "checked"; ?>">
        <label for="tiempo_completo">Tiempo completo</label><br>
        <span style="color:red"><?="<b><i>$errEmpleo</i></b>" ?></span><br><br>


        <label for="lenguajes">Lenguajes que domina:</label><br>
        <?php foreach ($listaLenguajes as $leng): ?>
            <input type="checkbox" name="lenguajes[]" id="<?= $leng ?>" value="<?= $leng ?>" <?php if (in_array($leng, $lenguajes)) echo "checked"; ?>>
            <label for="<?= $leng ?>"><?= $leng ?></label>
        <?php endforeach; ?>
        <span style="color:red"><?="<b><i>$errLenguajes</i></b>" ?></span><br><br>

        <label for="url">Introduce una URL de algún proyecto que hayas realizado anteriormente:</label>
        <input type="url" name="url" id="url" value="<?=$url?>"><br>
        <span style="color:red"><?="<b><i>$errURL</i></b>" ?></span><br><br>

        <br><br>
        <input type="submit" value="Enviar datos">

    </form>



</body>

</html>