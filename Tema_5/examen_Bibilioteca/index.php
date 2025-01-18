<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
<?php

// 1. Incluyo datos.php
include_once './datos.php';

// 2. Compruebo que el formulario se ha enviado y que lleva usuario y contraseña
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['usuario']) && isset($_GET['contraseña'])) {
    $usuario = $_GET['usuario'];
    $contraseña = $_GET['contraseña'];
    
// 3. Controlo errores     
    try {
// 4. Comrpuebo que el usuario y la contraseña están en la base de datos
        if (login($usuario, $contraseña)) {
            escribeUsuario($usuario);
            escribePrestamos($usuario);
        } else {
            echo "Error: Usuario o contraseña incorrectos.";
        }
// 5. Controlo errores
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
?>
<!-- 6. Cargo el formulario autoprocesado. Se llama en action a él mismo-->
    <form method="get" action="<?= htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <h1>IES Francisco Ayala</h1>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
<?php
}
?>
</body>
</html>