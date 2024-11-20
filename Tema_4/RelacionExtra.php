<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion Extra</title>
</head>

<body>
    <form method="POST" action="">
        <label for="fecha"> Fecha nacimiento: </label>
        <input type="date" name="fecha" id="fecha"/>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>

<?php
function decirHoroscopo($fecha){
if($fecha < date("Y-m-23")){
    echo "Hola";
}else{
    echo "Adios";
}

// switch($fecha)
}


if(isset($_POST["fecha"]) && !is_null($_POST["fecha"])){
    $fecha = $_POST["fecha"];
    // echo($fecha);
    decirHoroscopo($fecha);
}



?>