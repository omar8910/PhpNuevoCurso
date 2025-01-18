<?php
session_start();

if (!isset($_COOKIE["visita"])) {
    $mensajeBienvenida = "Bienvenido, esta es tu primera visita!<br>";
    setcookie("visita", $mensajeBienvenida, time() + 3600); // Esta cookie expira en 1 horas
    echo $_COOKIE["visita"];


} else {
    $mensajeBienvenida = "Bienvenido de nuevo. <br>";
    setcookie("visita", $mensajeBienvenida, time() + 3600); // Esta cookie expira en 1 horas
    echo $_COOKIE["visita"];

}


if(!$_SESSION["visita"]){
    $_SESSION["visita"] = 0;
}else{
    $_SESSION["visita"] = $_SESSION["visita"];
}
echo "Esta es tu visita número: " . $_SESSION["visita"]++;


