<?php
namespace dashboard\modelo;
use dashboard\modelo\ConexionBD;

class Usuario {
    private $nombreUsuario;
    private $correoElectronico;
    private $contrasena;

    // Constructor
    public function __construct($nombreUsuario, $correoElectronico, $contrasena) {
        $this->nombreUsuario = $nombreUsuario;
        $this->correoElectronico = $correoElectronico;
        $this->contrasena = $contrasena;
    }

    // Métodos getters y setters para acceder a los atributos
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getCorreoElectronico() {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
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
        $sql = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena) VALUES (:nombreUsuario, :correoElectronico, :contrasena)";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Enlazar parámetros
            $stmt->bindParam(':nombreUsuario', $this->nombreUsuario);
            $stmt->bindParam(':correoElectronico', $this->correoElectronico);
            $stmt->bindParam(':contrasena', $this->contrasena);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Cerrar la consulta
                $stmt->closeCursor();
                return true;
            } else {
                echo "Error en la consulta: " . implode(", ", $stmt->errorInfo());
            }
        } else {
            echo "Error en la preparación de la consulta: " . implode(", ", $conexion->errorInfo());
        }

        return false;
    }
}
?>
