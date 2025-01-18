<?php

// 1. Creamos la conexion a la BDD para realizar las consultas
$username = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=mistiendas;charset=utf8mb4"; //Nombre de la base de datos.

try {
    $PDO = new PDO($dsn, $username, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada con éxito";
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}



if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
    $sql = "SELECT tiendas.nombre AS tienda, stock.unidades
            FROM tiendas
            INNER JOIN stock ON tiendas.cod = stock.tienda
            WHERE stock.codigoProducto = :producto"; // Cambiamos stock.producto por stock.codigoProducto
    $stmt = $PDO->prepare($sql); // Preparamos la consulta para que se realice en modo seguro
    $stmt->bindParam(':producto', $producto); // Otra forma de hacerlo
    $stmt->execute();
    // $stmt->execute([':producto'=>$producto]); // Ejecutamos la consulta
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC); // Creamos un array asociativo con la respuesta a la consulta
    // var_dump($stock);

}

// 3. Voy a rellenar el formulario con los productos de mi base de datos
$sql = "select cod,nombre_corto from productos"; // Creamos la consulta como string en una variable.
$stmt = $PDO->query($sql); //Invocamos la consulta
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC); // El resultado de la consulta $stmt lo convertirá en un array asociativo.

?>

<!-- 2. Creamos el formulario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de productos</title>
</head>

<body>
    <h1>EJERCICIO: Conjunto de resultados en PDO</h1>
    <form method="POST">
        <label for="producto">Producto: </label>
        <select name="producto" id="producto" required>
            <?php foreach ($productos as $producto): ?>
                <option value="<?php echo $producto['cod']; ?>"><?php echo $producto['nombre_corto']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar Stock</button>

    </form>
    <!--4. Imprimimos el stock del producto por tienda -->
    <?php if (isset($stock)): ?>
        <h2> Stock del producto: </h2>
        <table border="1">
            <tr>
                <th>Tienda</th>
                <th>Stock</th>
            </tr>
            <?php foreach ($stock as $fila): ?>
                <tr>
                    <td><?php echo $fila['tienda'] ?></td>
                    <td><?php echo $fila['unidades'] ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>