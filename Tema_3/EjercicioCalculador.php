<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Tema 3</title>
</head>

<body>

    <!-- Calculador 1 -->
    <?php
    // Función para sumar dos números
    function sumar($num1, $num2)
    {
        return $num1 + $num2;
    }

    // Función para restar dos números
    function restar($num1, $num2)
    {
        return $num1 - $num2;
    }

    // Función para multiplicar dos números
    function multiplicar($num1, $num2)
    {
        return $num1 * $num2;
    }

    // Función para dividir dos números
    function dividir($num1, $num2)
    {
        if ($num2 != 0) {
            return $num1 / $num2;
        } else {
            return "Error: División por cero";
        }
    }

    // Función que recibe dos números y el nombre de la operación a realizar
    function calculador($num1, $num2, $operacion)
    {
        switch ($operacion) {
            case '+':
                return sumar($num1, $num2);
            case '-':
                return restar($num1, $num2);
            case '*':
                return multiplicar($num1, $num2);
            case '/':
                return dividir($num1, $num2);
            default:
                return "Operación no válida";
        }
    }

    // Verificamos que los valores de los números y la operación estén presentes
    //http://localhost/dashboard/Tema3/calculador.php?num1=10&num2=5&operacion=dividir
    if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
        // Convertimos los parámetros a números
        $num1 = intval($_GET['num1']);
        $num2 = intval($_GET['num2']);
        $operacion = $_GET["operacion"];
        /*$num1 = filter_var($_GET['num1'], FILTER_VALIDATE_FLOAT);
            $num2 = filter_var($_GET['num2'], FILTER_VALIDATE_FLOAT);*/
        $operacion = urlencode(($operacion));
        if ($operacion != "+") {
            $operacion = urldecode($_GET['operacion']);
        }
        var_dump($operacion);

        // Verificamos que los valores sean números válidos
        if ($num1 !== false && $num2 !== false) {
            // Llamamos a la función calculador con los parámetros
            $resultado = calculador($num1, $num2, $operacion);
            echo "El resultado de la operación es: $resultado";
        } else {
            echo "Error: Los valores proporcionados no son números válidos.";
        }
    } else {
        echo "Error: Faltan parámetros en la URL.";
    }
    ?>


    <!-- Calculador 2 (con URLENCODE) -->
    <?php
    // // Definir las operaciones como short closures
    // $sumar = fn($a, $b) => $a + $b; 
    // $restar = fn($a, $b) => $a - $b;
    // $multiplicar = fn($a, $b) => $a * $b;
    // $dividir = fn($a, $b) => ($b != 0) ? $a / $b : "Error: División por cero";

    // // Función calculadora usando funciones variables
    // function calculador($num1, $num2, $operacion)
    // {
    //     global $$operacion; // Referencia a la función variable a través de la variable dinámica
    //     if (isset($$operacion)) {
    //         return $$operacion($num1, $num2);
    //     } else {
    //         return "Error: Operación no válida.";
    //     }
    // }

    // // Recoger los valores desde la URL
    // if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operacion'])) {
    //     $num1 = urlencode($_GET['num1']);
    //     $num2 = urlencode($_GET['num2']);
    //     $operacion = urlencode($_GET['operacion']);
    //     var_dump($operacion);

    //     // Comprobar que los números son válidos
    //     if (is_numeric($num1) && is_numeric($num2)) {
    //         // Llamar a la función calculadora
    //         echo "Resultado: " . calculador($num1, $num2, $operacion);
    //     } else {
    //         echo "Error: Ambos valores deben ser numéricos.";
    //     }
    // }
    ?>
</body>

</html>