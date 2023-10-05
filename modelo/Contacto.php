<?php
namespace dashboard\modelo;
use dashboard\modelo\ConexionBD;

class Contacto {
    private $nombre;
    private $mensaje;

    // Constructor
    public function __construct($nombre, $mensaje) {
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    // Métodos getters y setters para acceder a los atributos
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    // Método para insertar un mensaje de contacto en la base de datos
    public function registrarMensaje() {
        // Obtener la instancia de la conexión
        $conexionBD = new ConexionBD();
        $conexion = $conexionBD->obtenerConexion();

        // Consulta SQL para insertar un nuevo mensaje de contacto
        $sql = "INSERT INTO mensajes_contacto (nombre, mensaje) VALUES (:nombre, :mensaje)";

        // Preparar la consulta
        $stmt = $conexion->prepare($sql);

        if ($stmt) {
            // Enlazar parámetros
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':mensaje', $this->mensaje);

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

