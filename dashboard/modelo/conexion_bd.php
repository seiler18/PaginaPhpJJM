<?php
$conexion = new mysqli("localhost", "root","", "prueba");
$conexion->set_charset("utf8");
// Verificar la conexión
if ($conexion->connect_error) {
    $respuesta = array("conectado" => false);
} else {
    $respuesta = array("conectado" => true);
}

header('Content-Type: application/json');
echo json_encode($respuesta);
?>