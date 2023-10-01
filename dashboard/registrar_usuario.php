<?php
use dashboard\controlador\UsuarioController;

if (isset($_POST['registro'])) {
    $nombreUsuario = $_POST['nombreUsuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Crear una instancia del controlador
    $usuarioController = new UsuarioController();

    // Llamar al método para registrar el usuario
    $resultado = $usuarioController->registrarUsuario($nombreUsuario, $correo, $contrasena);

    // Verificar si el usuario se registró con éxito
    if ($resultado) {
        // Mostrar un mensaje de éxito en la misma página o redirigir a otra página
        echo '<div class="alert alert-success">Registro exitoso.</div>';
        // También puedes redirigir al usuario a una página de inicio de sesión, por ejemplo:
        // header('Location: login.php');
    } else {
        // Mostrar un mensaje de error en la misma página
        echo '<div class="alert alert-danger">Error en el registro. Inténtalo de nuevo.</div>';
    }
}
?>
