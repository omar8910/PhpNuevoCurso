<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PedidosOnline.com</title>
</head>

<body>
    <?php
    include_once("./metodos.php");

    // 2. Compruebo que el formulario se ha enviado y que lleva usuario y contraseña
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['usuario']) && isset($_POST['contraseña'])) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];


        // 3. Controlo errores     
        try {
            // 4. Comrpuebo que el usuario y la contraseña están en la base de datos
            if (login($usuario, $contraseña)) {
                mostrarPedidos($usuario);
            } else {
                echo "Error: Usuario o contraseña incorrectos. <br>";
                echo "<a href='./index.php'>Volver al login</a>";
            }
            // 5. Controlo errores
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
    ?>
        <!-- 6. Cargo el formulario autoprocesado. Se llama en action a él mismo-->
        <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <h1>INICIO DE SESION</h1>
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