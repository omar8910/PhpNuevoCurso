<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Ejercicio 6 -->

    <?php
    //Función de saneamiento
    function sanearDatos($data)
    {
        $data = trim($data); //Quitamos los espacio en blanco
        $data = stripslashes($data); // Elimina las barras invertidas
        $data = htmlspecialchars($data); // Convierte caracteres especiales en entidades HTML

        return $data; //Devolvemos el string "limpito"
    }

    // Array asociativo con expresiones regulares
    $patrones = [
        "nombre" => "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]*$/",
        "telefono" => "/^[0-9]{9}$/"
    ];


    //Declaración de variables
    $nombre = "";
    $correo = "";
    $telefono = "";

    $errNombre = "";
    $errCorreo = "";
    $errTelefono = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validamos el nombre.
        if (empty($_POST["nombre"])) {
            $errNombre = "<b><i>El nombre es obligatorio</i></b>";
        } else {
            $nombre = $_POST["nombre"];
            sanearDatos($nombre);
            if (!preg_match($patrones["nombre"], $nombre)) {
                $errNombre = "<b><i>El nombre solo puede contener letras y espacios</i></b>";
            }
        }

        // Validamos telefono
        if (empty($_POST["telefono"])) {
            $errTelefono = "<b><i>El telefono es obligatorio</i></b>";
        } else {
            $telefono = $_POST["telefono"];
            sanearDatos($telefono);
            if (!preg_match($patrones["telefono"], $telefono)) {
                $errTelefono = "<b><i>El telefono debe estar compuesto por 9 dígitos</i></b>";
            }
        }

        // Validamos correo
        if (empty($_POST["correo"])) {
            $errCorreo = "<b><i>El correo es obligatorio</i></b>";
        } else {
            $correo = $_POST["correo"];
            sanearDatos($correo);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $errCorreo = "<b><i>El formato del correo es incorrecto. Ej:ejemplo@gmail.com</i></b>";
            }
        }

        // Si las variables de error estan vacias significa que no hay errores, mostramos datos.
        if (empty($errNombre) && empty($errTelefono) && empty($errCorreo)) {
            echo "<h2>Datos ingresados: </h2>";
            echo "Nombre: $nombre <br>";
            echo "Teléfono: $telefono <br>";
            echo "Correo : $correo <br>";
        }
    }
    ?>

    <h2>Formulario y resultado en un único archivo (formulario) </h2>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $nombre?>"><br>
        <span style="color:red;"><?= $errNombre ?></span><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" id="telefono" value="<?= $telefono ?>"><br>
        <span style="color:red;"><?= $errTelefono ?></span><br>



        <label for="correo">Correo electrónico: </label>
        <input type="email" name="correo" id="correo" value="<?= $correo ?>"><br>
        <span style="color:red;"><?= $errCorreo ?></span><br>


        <input type="submit" value="Enviar datos">
    </form>





</body>

</html>