<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
</head>
<body>
 <!-- Importamos el archivo donde contenemos la lógica. -->
<?php 
require_once "./coche.php"; 
?>

<h1>Datos del coche</h1>
<?php
$coche = new Coche();
echo $coche;
?>

<h2> Cambiamos el color del coche y lo ponemos amarillo</h2>
<?php
$coche->setColor("Amarillo");
echo "El nuevo color de mi coche es: " . $coche->getColor();
?>

<h2>Mi coche va a acelerar 4 veces y a frenar una vez</h2>
<?php
$contador = 0;
while ($contador<=3){
    $coche->acelerar();
    $contador++;
}
$coche->frenar();
echo "Ésta es ahora la velocidad del coche: " . $coche->getVelocidad();
?>

<h2> Creamos un nuevo coche, su color será VERDE y el modelo GALLARDO</h2><br>
<h1>Datos del NUEVO coche</h1>
<?php
$coche2 = new Coche(color:"Verde", modelo:"Gallardo");
echo $coche2;
?>


</body>
</html>
