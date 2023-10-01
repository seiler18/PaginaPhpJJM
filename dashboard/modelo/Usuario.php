<?php
namespace dashboard\modelo;
use dashboard\modelo\ConexionBD;
class Usuario {
    private $nombreUsuario;
    private $correo;
    private $contrasena;

    // Constructor
    public function __construct($nombreUsuario, $correo, $contrasena) {
        $this->nombreUsuario = $nombreUsuario;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }

    // Métodos getters y setters para acceder a los atributos
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    // Método para insertar un usuario en la base de datos
   public function registrarUsuario() {
    // Obtener la instancia de la conexión
    $conexionBD = new ConexionBD();
    $conexion = $conexionBD->obtenerConexion();

    // Consulta SQL para insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES (?, ?, ?)";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    
    if ($stmt) {
        // Enlazar parámetros
        $stmt->bind_param("sss", $this->nombreUsuario, $this->correo, $this->contrasena);
        
        // Ejecutar la consulta
        $resultado = $stmt->execute();
        
        if ($resultado) {
            // Cerrar la consulta
            $stmt->close();
            return true;
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        return false;
    }
}
}

?>