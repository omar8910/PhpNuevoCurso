<?php
class Estudiante{
    private array $notas = [];
    // Atributos estáticos
    private static $contadorEstudiantes = 0;
    private static $sumaTotalPromedios = 0;

    public function __construct(
        private string $nombre,
        private int $edad,
    )
    {
        if($edad<18){
            throw new InvalidArgumentException("La edad no puede ser menor de 18");
        }
        // else{ // Se puede omitir esto ya que gracias a php8 hace la asignacion automaticamente si cumple la condicion
        //     $this->edad = $edad;
        // }
        self::$contadorEstudiantes++;
    }

    // Método para obtener nombre del alumno
    public function getNombre(){
        return $this->nombre;
    }

    // Método para agregar una nota;
    public function agregarNota($nota){
        if(!is_numeric($nota) || $nota < 0 || $nota > 10){
            throw new Exception("Debe ser numérico y estar comprendido entre el 0 y el 10");
        }else{
            array_push($this->notas,$nota);
            // $this->notas[] = $nota;
        }
    }

    // Método para calcularPromedio()
    public function calcularPromedio(){
        if(empty($this->notas)){
            throw new Exception("No se puede calcular el promedio sin notas");
        }else{
            $promedio = array_sum($this->notas) / count($this->notas);
            return $promedio;
        }
    }

    // Método estatico para calcular el promedio de un grupo de estudiantes()
    public static function calcularPromedioGrupo(array $estudiantes){
        if(empty($estudiantes)){
            throw new Exception("No se puede calcular el promedio de un grupo vacío");
        }else{
            $sumaPromedios = 0;
            foreach($estudiantes as $estudiante){
                if(!$estudiante instanceof Estudiante){
                    throw new Exception("Todos los alumnos deben ser instancias de la clase Estudiante");
                }else{
                    $sumaPromedios += $estudiante->calcularPromedio();
                }
            }
            return $sumaPromedios / count($estudiantes);
        }
    }


    // Método para contadorAlumnos()
    public static function contadorAlumnos(){
        return self::$contadorEstudiantes;
    }
}

//Ejemplo de uso

try{
    // Primer estudiante
    $estudiante1 = new Estudiante("Omar", 23);
    $estudiante1->agregarNota(10);
    $estudiante1->agregarNota(5);

    // Segundo estudiante
    $estudiante2 = new Estudiante("Alex", 20);
    $estudiante2->agregarNota(6);
    $estudiante2->agregarNota(7);

    // Promedios alumno
    echo "Promedio de {$estudiante1->getNombre()}: " . $estudiante1->calcularPromedio() . "<br/>";
    echo "Promedio de {$estudiante2->getNombre()}: " . $estudiante2->calcularPromedio() . "<br/>";

    // Promedio grupo
    $promedioGrupo = Estudiante::calcularPromedioGrupo([$estudiante1,$estudiante2]);
    echo "El promedio del grupo es: $promedioGrupo <br/>";

    // Total de alumnos
    echo "Total de estudiantes: " . Estudiante::contadorAlumnos() . "<br/>";

}catch(Exception $e){
    echo "Error: " . $e->getMessage() . "<br/>";
}


















?>