<?php

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

    // Método para insertar un mensaje de contacto en la base de datos (si es necesario)
    public function registrarMensaje() {
        // Aquí iría la lógica para insertar este mensaje de contacto en la base de datos
    }
}

?>
