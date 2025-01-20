<?php

// Trait Validaciones
trait Validaciones
{
    // Método para validar un email
    public function validarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("El correo electrónico introducido no es válido.");
        }
    }

    // Método para validar una contraseña
    public function validarContrasena($contrasena)
    {
        if (strlen($contrasena) > Usuario::LONGITUD_MAXIMA_CONTRASENA) {
            throw new Exception("La contraseña no puede ser mayor que 8 dígitos");
        } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{1,}$/', $contrasena)) {
            throw new Exception("La contraseña debe contener al menos una letra y un número.");
        }
    }
}




class Usuario
{
    // Utilizamos los métodos del trait Validaciones
    use Validaciones;

    // Constante
    const LONGITUD_MAXIMA_CONTRASENA = 8;

    // Constructor
    public function __construct(
        private string $nombre,
        private string $email,
        private string $contrasena
    ) {
        $this->validarEmail($email);
        $this->validarContrasena($contrasena);
        $this->contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
    }
    
    // Método para cambiar contraseña
    public function cambiarContrasena($nuevaContrasena){
        $this->validarContrasena($nuevaContrasena);
        $this->contrasena = password_hash($nuevaContrasena, PASSWORD_BCRYPT);
    }

    // Método para autenticar un usuario
    public function autenticar($email,$contrasena){
        if($this->email !== $email){
            throw new Exception("Correo electrónico no encontrado");
        }elseif(!password_verify($contrasena, $this->contrasena)){
            throw new Exception("Contraseña incorrecta");
        }else{
            return true; // Si todo es correcto devolverá true
        }
    }
}

// Ejemplo de uso
try {
    $usuario = new Usuario("Juan Pérez", "juan.perez@example.com", "Omar123");

    echo "Usuario creado correctamente." . "<br>";

    // Intentar cambiar la contraseña
    $usuario->cambiarContrasena("Nueva123");
    echo "Contraseña cambiada exitosamente." . "<br>";

    // Autenticación
    if ($usuario->autenticar("juan.perez@example.com", "Nueva123")) {
        echo "Autenticación exitosa." . "<br>";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}



