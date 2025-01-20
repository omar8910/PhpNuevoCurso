<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perros</title>
</head>

<body>
    <!-- Importamos el perro.php -->
    <?php
    try {
        if (!file_exists('perro.php')) {
            throw new Exception("El archivo perro.php no existe");
        }
        require_once "./perro.php";

    } catch (Exception $e) {
        die($e->getMessage());
    }

    $labrador = new Perro(tamanio: 20, raza: "Labrador", color: "Marrón", nombre: "Pelusa");
    $labrador->speak();
    echo $labrador . "<br/><br>";

    $caniche = new Perro(tamanio: 7, raza: "Caniche", color: "Blanco", nombre: "Petit");
    $caniche->speak();
    echo $caniche;

    // Probamos cambiar una propiedad con validacion (nombre);
    $perroCambiado = $labrador->setNombre("Optimus");
    echo "<br>";
    echo "<br>";
    echo $perroCambiado ? 'Nombre cambiado con éxito' : "Nombre no cambiado";
    echo "<br>";
    echo $labrador;

    // Probamos ahora la validacion si funciona.
    $perroCambiado2 = $caniche->setNombre("EsteNombreEsSuperOmegaLargoYTieneMuchosCaracteres");
    echo "<br>";
    echo "<br>";
    echo $perroCambiado2 ? 'Nombre cambiado con éxito' : "Nombre no cambiado";
    echo "<br>";
    echo $caniche;
        
    ?>


</body>

</html>