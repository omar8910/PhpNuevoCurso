<!-- <?php
function factorial($valor){
    if($valor <=1){
        return 1;
    }else{
        echo "<br> $valor ";
        return $valor * factorial($valor-1);
    }
}



?> -->


<!-- <?php
        // EJERCICIO CADENAS

        // function comprobarCadena( $arg){
        //     if(is_string($arg) && !empty($arg)){
        //         return strtoupper($arg);
        //     }elseif(is_string($arg) && empty($arg)){
        //         return "Este es el relleno porque estaba vacía";
        //     }else{
        //         return "$arg no es un string";
        //     }
        // }

        // echo comprobarCadena(2);
        ?> -->


<!-- EJERCICIO POTENCIAS -->
<!-- <form method="post" action="">
    <label for="base">Base:</label>
    <input type="text" name="base" id="base">

    <label for="exponente">Exponente:</label>
    <input type="text" name="exponente" id="exponente">

    <input type="submit" value="Calcular">
</form> -->
<!-- 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["base"], $_POST["exponente"])) {
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        echo calcularPotencias($base, $exponente);
    }
}

function calcularPotencias($base, $exponente = 2)
{
    if (empty($base)) {
        return "La base no puede estar vacía";
    } else {
        return $base ** $exponente;
    }
}
?> -->

<?php
// // EJERCICIO FECHA
// function fechaHoy(){
//     date_default_timezone_set("Europe/Madrid");
//     setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain', 'Spanish');
//     echo strftime('%A, %e de %B de %Y');

// }

// fechaHoy();


// // EJERCICIO MCD
// function mcd($num1, $num2){
//     $numero1 = $num1;
//     $numero2 = $num2;
//     if($num1 == 0 || $num2 == 0){
//         return "No se puede calcular el MCD de 0";
//     }else{
//         while($num1 != $num2){
//             if($num1 > $num2){
//                 $num1 = $num1 - $num2;
//             }else{
//                 $num2 = $num2 - $num1;
//             }
//         }
//         return "El máximo común divisor de $numero1 y $numero2 es: $num1";
//     }
// }

// echo mcd(6, 12);


// EJERCICIO PRIMO
// function esPrimo($numero){
//     if($numero == 1){
//         return "1 no es un número primo";
//     }else{
//         for($i = 2; $i<$numero; $i++){
//             if($numero%$i ==0){
//                 return "$numero no es un número primo";
//             }else{
//                 return "$numero es número primo";
//             }
//         }
//     }
// }

// echo esPrimo(78);
?>

<!-- EJERCICIO MATRICULA -->
<!-- <form method="POST" action=" ">
    <label> INTRODUCE LA MATRÍCULA: </label>
    <input type="text" id="matricula" name="matricula">
    <input type="submit" value="enviar">
</form>

<?php
function comprobarMatricula($matricula)
{
    // Expresión regular para verificar el formato: 4 números (0000-9999) seguidos de 3 letras (AAA-ZZZ)
    $patron = '/^[0-9]{4}[A-Z]{3}$/';
    // Comprobar si la matrícula cumple con el patrón
    if (preg_match($patron, $matricula)) { // preg_match devuelve 1 si se cumple el patrón, 0 si no.
        return "La matrícula $matricula es válida.";
    } else {
        return "La matrícula $matricula no es válida.";
    }
}

if (!empty($_POST['matricula'])) {
    $mat = htmlspecialchars($_POST['matricula']);
    echo comprobarMatricula($mat);
}


?> -->

<!-- EJERCICIO PASSWORD -->
<!-- <form method="POST" action=" ">
    <label> INTRODUCE LA CONTRASEÑA: </label>
    <input type="text" id="password" name="password">
    <input type="submit" value="enviar">
</form> -->

<!-- <?php
        function validarPassword($password)
        {
            // Mido el tamaño de la cadena
            $longitud = strlen($password);

            // Comprobaciones de la contraseña
            if ($longitud < 6 || $longitud > 11) {
                return "La contraseña debe tener entre 6 y 15 caracteres";
            }

            if (!preg_match('/\d/', $password)) {
                return "La contraseña debe tener al menos un número";
            }

            if (!preg_match('/[A-Z]/', $password)) {
                return "La contraseña debe tener al menos una letra mayúscula";
            }

            if (!preg_match('/[a-z]/', $password)) {
                return "La contraseña debe tener al menos una letra minúscula";
            }

            if (!preg_match('/\W/', $password)) {
                return "La contraseña debe tener cualquier carácter que no sea alfanumérico";
            }

            // Si pasa todas las comprobaciones
            return "La contraseña es válida";
        }



        if (!empty($_POST['password']) & isset($_POST['password'])) {
            $mat = htmlspecialchars($_POST['password']);
            echo validarPassword($pass);
        }


        ?>  -->

<!-- EJERCICIO FACTORIAL NEGATIVO -->
<!-- <?php
    function factorialNegativo($valor){
        if($valor < 0){
            throw new InvalidArgumentException("<br> El numero no puede ser negativo");
        }

        if($valor <=1){
            return 1;
        }else{
            echo "<br> $valor";
            return $valor * factorialNegativo($valor-1);
        }
    }
    try{
        $valor = -5;
        echo"<br> El factorial de -5 es: " . factorialNegativo($valor);
    }catch(InvalidArgumentException $e){
        echo "Error: " . $e->getMessage();
    }
?> -->

<!-- EJERCICIO DUPLICAR -->

<form method="POST" action=" ">
    <label> INTRODUCE LA CADENA: </label>
    <input type="text" id="cadena" name="cadena">
    <input type="submit" value="enviar">
</form>

<?php
    function comprobarCadena($cadena){
        $resultado = "";
        for($i = 0; $i<strlen($cadena); $i++){  
            $resultado .= $cadena[$i] . $cadena [$i];
        }
        echo "<br>";
        echo "<br> La cadena que has introducido es: $cadena";
        echo "<br> La cadena duplicada es: $resultado";
    }
    
    if(!empty($_POST["cadena"])){
        $mat = htmlspecialchars($_POST['cadena']);
        echo comprobarCadena($mat);
    }
?>