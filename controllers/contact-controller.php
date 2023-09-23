<?php
include("../models/contact-model.php");

$op = $_POST["operation"];

switch ($op) {
    case "enviarMensaje":
        $nombre = $_POST["nombre"];
        $mensaje = $_POST["mensaje"];

        // Validación de campos
        if (empty($nombre) || empty($mensaje)) {
            echo "error"; // Devuelve un mensaje de error si algún campo está vacío
        } else {
            $response = Contact::newContact($nombre,$mensaje);
            echo $response;
        }
        break;
}

