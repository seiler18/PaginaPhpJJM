<?php
namespace dashboard\modelo;

class ConexionBD {
    private $conexion;

    // Constructor: establece la conexión a la base de datos
    public function __construct() {
        $this->conexion = new \mysqli("localhost","root","","prueba");

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        } else {
            echo "Conexión exitosa a la base de datos.";
        }

        $this->conexion->set_charset("utf8");
    }

    // Método para obtener la conexión a la base de datos
    public function obtenerConexion() {
        return $this->conexion;
    }

    // Destructor: cierra la conexión cuando el objeto es destruido
    public function __destruct() {
        $this->conexion->close();
    }
}

// Crear una instancia de la clase de conexión
$conexionBD = new ConexionBD();
?>
