<?php
namespace dashboard\modelo;

class ConexionBD {
    private $conexion;

    // Constructor: establece la conexión a la base de datos
    public function __construct() {
        try {
            // Cambiar a PDO para establecer la conexión
            $dsn = "mysql:host=localhost;dbname=prueba;charset=utf8";
            $usuario = "root";
            $contrasena = "";

            $this->conexion = new \PDO($dsn, $usuario, $contrasena);
            $this->conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
           //lugar para registrar errores
            throw $e;
        }
    }

    // Método para obtener la conexión a la base de datos
    public function obtenerConexion() {
        return $this->conexion;
    }
}
?>


