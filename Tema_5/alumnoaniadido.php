<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos personales</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD" == "POST"]) {
        $nombre = $_POST["nombre"] ?? '';
        echo "Nombre: " . $_POST["nombre"] . "<br/>";
        echo "Apellidos: " . $_POST["apellidos"] . "<br/>";
        echo "Fecha nacimiento: " . $_POST["fecha_nac"] . "<br/>";
        echo "Correo electrónico: " . $_POST["correo"] . "<br/>";

        echo "Lenguajes seleccionados: ";
        foreach ($_POST["lenguajes"] as $lenguaje) {
            echo $lenguaje . ", ";
        }
        echo "<br>";

        echo "Pregunta: " . $_POST["pregunta"] . "<br/>";
        echo "Comentario: " . $_POST["comentario"] . "<br/>";
        echo "Contraseña: " . $_POST["password"] . "<br/>";
        echo "Contraseña repetida: " . $_POST["password_repeat"] . "<br/>";
    }

    ?>
    <a href="Relacion5.php"><button type="button">VOLVER</button></a>

</body>

</html>