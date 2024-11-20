<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones predefinidas</title>
</head>

<body>
    <!-- Ejercicio 1 -->
    <!-- <form action="" method="post">
        <input type="text" name="input1" />
        <input type="text" name="input2"/>
        <input type="submit" value="Enviar" />
    </form> -->
    <!-- <?php
            if (isset($_POST["input1"], $_POST["input2"]) && !empty($_POST["input1"]) && !empty($_POST["input2"])) {
                $input1 = $_POST["input1"];
                $input2 = $_POST["input2"];

                if (strcmp($input1, $input2) == 0) {
                    echo "Las cadenas son iguales";
                } else if (strcmp($input1, $input2) > 0) {
                    echo "El primer input es mayor que el segundo";
                } else {
                    echo "El segundo input es mayor que el primero";
                }
            }
            ?>  -->

    <!-- Ejercicio 2 -->
    <!-- <form action="" method="post">
        <input type="text" name="input1">
        <input type="submit" value="Enviar">
    </form> -->

    <!-- <?php
            if (isset($_POST["input1"]) && !empty($_POST["input1"])) {
                $input1 = $_POST["input1"];
                $cadenaMinusculas = strtolower($input1);
                echo $cadenaMinusculas;
            }
            ?> -->

    <!-- Ejercicio 3 -->
    <!-- <form action="" method="post">
        <input type="text" name="input1">
        <input type="submit" value="Enviar">
    </form> -->

    <!-- <?php
            if (isset($_POST["input1"]) && !empty($_POST["input1"])) {
                $input1 = $_POST["input1"];
                $cadenaMayusculas = strtoupper($input1);
                echo $cadenaMayusculas;
            }
            ?> -->

    <!-- Ejercicio 4 -->
    <!-- <form action="" method="post">
        <input type="text" name="frase">
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form> -->

    <!-- <?php
            if (isset($_POST["frase"], $_POST["palabra"]) && !empty($_POST["frase"]) && !empty($_POST["palabra"])) {
                $fraseInput = $_POST["frase"];
                $palabraInput = $_POST["palabra"];


                // HACIENDOLO CON POS
                $pos = strpos($fraseInput, $palabraInput);

                if ($pos === false) {
                    echo "La palabra '$palabraInput' no fue encontrada en la cadena '$fraseInput'";
                } else {
                    echo "La palabra '$palabraInput' fue encontrada en la cadena '$fraseInput'";
                    echo " y existe en la posición $pos";
                }

                // HACIENDOLO CON STR_CONTAINS
                // if (str_contains($fraseInput, $palabraInput)) {
                //     echo "La palabra '$palabraInput' fue encontrada en la cadena '$fraseInput'";
                // } else {
                //     echo "La palabra '$palabraInput' no fue encontrada en la cadena '$fraseInput'";
                // }
            } else {
                echo "No se han introducido valores en los inputs.";
            }
            ?> -->

    <!-- Ejercicio 5 -->
    <form action="" method="post">
        <input type="text" name="frase">
        <input type="text" name="palabra">
        <input type="submit" value="Enviar">
    </form>

    <?php
      if (isset($_POST["frase"], $_POST["palabra"]) && !empty($_POST["frase"]) && !empty($_POST["palabra"])) {
        $fraseInput = $_POST["frase"];
        $palabraInput = $_POST["palabra"];

        if(str_starts_with($fraseInput,$palabraInput)){
            echo "La frase '$fraseInput' empieza por la '$palabraInput'";
        }

        if(str_ends_with($fraseInput,$palabraInput)){
            echo "La frase '$fraseInput' termina por la '$palabraInput'";
        }

      }

    ?>
</body>
</html>