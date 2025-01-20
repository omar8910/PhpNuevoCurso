<?php

require_once './estaticos.php';

// Por ser estáticas no necesito crearme un objeto, en su lugar:
Configuracion::setColor("blue");
Configuracion::setEntorno("localhost");
Configuracion::setNewsletter(true);

// Podemos mostrar las propiedades a las que acabamos de dar valor
echo Configuracion::$color . '<br/>'; // mostramos la propiedad estática
echo Configuracion::$entorno . '<br/>';
echo Configuracion::$newsletter . '<br/>';

// En cualquier momento puedo crear objetos de esta clase
$configuracion = new Configuracion();
$configuracion::$color = "rojo";
$configuracion::$entorno = "localhost";

// Accedo a las propiedades y las muestro
echo $configuracion::$color;

