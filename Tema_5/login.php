<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesion</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['usuario'], $_POST['password']) && !empty($_POST['password']) && !empty($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            echo "Usuario : {$_POST['usuario']} <br>";
            echo "Password : {$_POST['password']} <br>";
        }else{
            echo "Los datos enviados no coinciden";
        }
    }else{
        echo "No se enviaron parámetros";
    }




    ?>
    <a href="Relacion5.php"><button type="button">VOLVER</button></a>
</body>

</html>