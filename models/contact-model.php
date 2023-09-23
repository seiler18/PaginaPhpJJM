<?php
include("../config/db-connect.php");

class Contact
{

    static public function newContact($nombre, $mensaje)
    {
        if (isset($nombre) && isset($mensaje)) {
            $db = new Connection();
            $con = $db->con();
            $sql = $con->prepare("INSERT INTO mensajes_contactos(nombre, mensaje) VALUES(?, ?)");
            $sql->execute([$nombre, $mensaje]);
            $exe = $sql->rowCount();
            
            if ($exe > 0) {
                $respuesta = "okInsert";
            } else {
                $respuesta = "errInsert";
            }
        } else {
            $respuesta = "errNullValues";
        }

        return  $respuesta;
    }

}
