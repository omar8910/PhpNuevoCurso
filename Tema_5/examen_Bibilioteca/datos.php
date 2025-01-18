<?php
// Array usuarios
$usuarios = [
    "Omar" => [
        "contraseña" => "omar1234",
        "nombre" => "Omar",
        "apellido1" => "Qneiby",
        "apellido2" => "AlSarsour",
        "edad" => 23,
        "fecha_alta" => "2001/08/17"
    ],
    "Ana" => [
        "contraseña" => "ana5678",
        "nombre" => "Ana",
        "apellido1" => "García",
        "apellido2" => "López",
        "edad" => 30,
        "fecha_alta" => "2015/05/10"
    ],
    "Luis" => [
        "contraseña" => "luis91011",
        "nombre" => "Luis",
        "apellido1" => "Martínez",
        "apellido2" => "Pérez",
        "edad" => 28,
        "fecha_alta" => "2018/11/23"
    ]

];

//  Array libros
$libros = [
    9834751203126 => [
        "num_unidades" => 23,
        "titulo" => "La peste negra",
        "editorial" => "Santillana",
        "anio_edi" => 2011,
        "autores" => [
            "nombre" => "Pepe",
            "apellido1" => "Sánchez",
            "apellido2" => "Santier"
        ]
    ],
    9783161484100 => [
        "num_unidades" => 15,
        "titulo" => "El Quijote",
        "editorial" => "Anaya",
        "anio_edi" => 2005,
        "autores" => [
            "nombre" => "Miguel",
            "apellido1" => "de Cervantes",
            "apellido2" => "Saavedra"
        ]
    ],
    9781234567897 => [
        "num_unidades" => 30,
        "titulo" => "Cien años de soledad",
        "editorial" => "Penguin Random House",
        "anio_edi" => 2014,
        "autores" => [
            "nombre" => "Gabriel",
            "apellido1" => "García",
            "apellido2" => "Márquez"
        ]
    ],
    9789876543210 => [
        "num_unidades" => 20,
        "titulo" => "1984",
        "editorial" => "Debolsillo",
        "anio_edi" => 2016,
        "autores" => [
            "nombre" => "George",
            "apellido1" => "Orwell",
            "apellido2" => ""
        ]
    ]
];

// Array prestamos
$prestamos = [
    "prestamo_1" => [
        "ISBN" =>  9834751203126,
        "usuario" => "Omar",
        "fecha_ini" => "2024/11/25",
        "fecha_fin" => "2024/11/28"
    ],

    "prestamo_2" => [
        "ISBN" =>  9789876543210,
        "usuario" => "Ana",
        "fecha_ini" => "2024/09/25",
        "fecha_fin" => "2024/09/28"
    ]
];

// Función de login($usu,$pw)
function login($usu,$pw){
    global $usuarios;
    if(empty($usu)){
        throw new Exception("ERROR DEL SISTEMA: El usuario no puede estar vacío");
    }else if(empty($pw)){
        throw new Exception("ERROR DEL SISTEMA: La contraseña no puede estar vacía");
    }

  return isset($usuarios[$usu]) && $usuarios[$usu]["contraseña"] == $pw;
}


// Funcion escribeUsuario($usu)
function escribeUsuario($usu){
    global $usuarios;
    if(!array_key_exists($usu,$usuarios)){
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }else{
        $datosUsuario = $usuarios[$usu];
        setlocale(LC_TIME, 'es_ES.UTF-8'); // Localizacion en español
        $fechaAlta = strftime("%e de %B de %Y", strtotime($datosUsuario['fecha_alta']));
        echo "<ul>";
        echo "<li>{$datosUsuario['apellido2']} {$datosUsuario['apellido1']}, {$datosUsuario['nombre']} ({$datosUsuario['edad']} años) <br> </li>";
        echo "<li>Está con nosotros desde el: $fechaAlta</li>";
        echo "</ul>";
    }
}

// Funcion escribePrestamos($usu)
function escribePrestamos($usu){
    global $usuarios,$libros,$prestamos;
    if(!isset($usuarios[$usu])){
        throw new Exception("ERROR DEL SISTEMA: El usuario no existe");
    }else{
        echo "<table>";
            echo "<tr>";
                echo "<th>Prestamos realizados por {$usuarios[$usu]['nombre']}</th>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>ISBN</th>";
                echo "<th>Título</th>";
                echo "<th>Fecha de inicio</th>";
                echo "<th>Fecha de fin</th>";
                echo "<th>Retrasado</th>";
            echo "</tr>";
            foreach($prestamos as $prestamo => $datos){
                $fechaInicio = date("d-m-Y", strtotime($datos['fecha_ini']));
                $fechaFin = date("d-m-Y", strtotime($datos['fecha_fin']));
                $retrasado = (strtotime($datos['fecha_fin']) < time()) ? 'SI' : 'NO';

                if($datos["usuario"] == $usu){
                    echo "<tr>";
                    echo "<td>{$datos['ISBN']}</td>";
                    echo "<td>{$libros[$datos['ISBN']]['titulo']}</td>";
                    echo "<td>$fechaInicio</td>";
                    echo "<td>$fechaFin</td>";
                    echo "<td>$retrasado</td>";
                    echo "</tr>";
                }
            }

        echo "</table>";
    }


}

