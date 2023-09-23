<?php
include("../models/user-model.php");

$op = $_POST["operation"];

switch ($op) {
    case "createUser":
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validación de campos
        if (empty($name) || empty($email) || empty($password)) {
            echo "error"; // Devuelve un mensaje de error si algún campo está vacío
        } else {
            $response = User::newUser($name, $email, $password);
            echo $response;
        }
        break;
}

