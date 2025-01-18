<?php

// Creamos las variables
$usuarios = [];
$productos = [];
$pedidos = [];

// Funcion rellenaUsuarios()
/* Meterá los usuarios con los datos en el array usuarios automáticamente nada más al ejecutarse el código*/
function rellenaUsuarios()
{
    global $usuarios;
    $usuarios =  [
        "11859264G" => [
            "contraseña" => "omar123",
            "nombre" => "Omar Qneiby AlSarsour",
            "edad" => 23,
            "tarjeta" => [
                "numero" => 4188202112056005,
                "CVV" => 123
            ]
        ],

        "17926598Y" => [
            "contraseña" => "alex456",
            "nombre" => "Alejandro Gámez Rueda",
            "edad" => 24,
            "tarjeta" => [
                "numero" => 5299313223167116,
                "CVV" => 456
            ]
        ],

        "28037609F" => [
            "contraseña" => "maria789",
            "nombre" => "María Cañete Reyes",
            "edad" => 24,
            "tarjeta" => [
                "numero" => 6300424334278227,
                "CVV" => 789
            ]
        ],
    ];
}
rellenaUsuarios();

// Funcion rellenaProductos($numProductos);
/* Esta función recibirá un numero, con dicho número lo que hará es crear productos con unidades y precios en el rango 
    mostrado, para cada nombre del producto tendrá un identificador único por incremento.
*/
function rellenaProductos($numProductos)
{
    global $productos;
    $contador = 0;
    while ($contador < $numProductos) {
        array_push(
            $productos,
            [
                "unidades" => rand(10, 20),
                "nombreProducto" => "nombreProducto" . str_pad($contador + 1, 3, '0', STR_PAD_LEFT),
                "precio" => rand(1, 50)
            ]
        );
        $contador++;
    }
}

rellenaProductos(5);


// Funcion rellenaPedidos()
function rellenaPedidos()
{
    global $usuarios, $productos, $pedidos;
    foreach ($usuarios as $usuario => $datos) {
        for ($i = 0; $i < 3; $i++) {
            $indiceProducto = rand(0, count($productos) - 1);
            $producto = $productos[$indiceProducto];
            $cantidad = rand(1, $producto['unidades']);

            array_push(
                $pedidos,
                [
                    "DNI" => $usuario,
                    "idProducto" => $indiceProducto,
                    "cantidad" => $cantidad,
                    "precioLinea" => $cantidad * $producto['precio'],
                ]
            );
        }
    }
}


rellenaPedidos();

// Muestra los pedidos del usuario en una tabla con el idProduto, cantidad y precioLinea
function mostrarPedidos($dniUsuario)
{
$totalPedido = 0;
global $pedidos;

    echo "Pedidos para el DNI: $dniUsuario";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID Producto</th>";
    echo "<th>Cantidad</th>";
    echo "<th>Precio Linea (€)</th>";
    echo "</tr>";

    foreach ($pedidos as $pedido) {
        $totalPedido += $pedido['precioLinea'];
        if ($pedido['DNI'] === $dniUsuario) {
            echo "<tr>";
            echo "<td>{$pedido['idProducto']}</td>";
            echo "<td>{$pedido['cantidad']}</td>";
            echo "<td>{$pedido['precioLinea']}</td>";
            echo "</tr>";
        }
    }
    echo "<tr>";
    echo "<td colspan='3'>Total Pedido: $totalPedido</td>";
    echo "<tr>";
    echo "</table>";

    echo "<a href='./index.php'>Volver al login</a>";
}


// Funcion de incio de sesion
function login($usu, $pw)
{
    global $usuarios;
    if (empty($usu)) {
        throw new Exception("ERROR DEL SISTEMA: El usuario no puede estar vacío");
    } else if (empty($pw)) {
        throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía");
    }
    // var_dump($usuarios[$usu]);

    return isset($usuarios[$usu]) && $usuarios[$usu]["contraseña"] == $pw;
}
