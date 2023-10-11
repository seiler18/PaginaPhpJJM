<?php
require_once './dashboard/controlador/UsuarioController.php';
require_once './dashboard/modelo/Usuario.php';


if (isset($_POST['registro'])) {
    $nombreUsuario = $_POST['nombreUsuario'];
    $correo = $_POST['correoElectronico'];
    $contrasena = $_POST['contrasena'];

    // Crear una instancia del controlador
    $usuarioController = new \dashboard\controlador\UsuarioController();

    // Llamar al método para registrar el usuario
    $resultado = $usuarioController->registrarUsuario($nombreUsuario, $correo, $contrasena);

    // Verificar si el usuario se registró con éxito
    if ($resultado) {
        // Mostrar un mensaje de éxito en la misma página o redirigir a otra página
        echo '<div class="alert alert-success">Registro exitoso.</div>';
    } else {
        // Mostrar un mensaje de error en la misma página
        echo '<div class="alert alert-danger">Error en el registro. Inténtalo de nuevo.</div>';
    }
}
?>


