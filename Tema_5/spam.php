<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje SPAM</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"] ?? "No tiene nombre";
        $telefono = $_POST["telefono"] ?? "No tiene teléfono";
        $email = $_POST["email"] ?? "No tiene email";
    }

    ?>
    “¡Buenos días,<?= $nombre ?>!

    Te voy a enviar spam a <?= $email ?> y te llamaré de madrugada a <?= $telefono ?>.

    Enviado desde un iPhone”
</body>

</html>