<?php
include("../config/db-connect.php");

class User
{

    static public function newUser($name, $email, $password)
    {
        if (isset($name) && isset($email) && isset($password)) {
            $db = new Connection();
            $con = $db->con();
            $sql = $con->prepare("INSERT INTO usuarios(nombre_usuario, correo, contrasena) VALUES(?, ?, ?)");
            $sql->execute([$name, $email, $password]);
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
