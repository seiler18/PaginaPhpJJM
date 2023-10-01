<?php
namespace dashboard\controlador;
use dashboard\modelo\Usuario;
class UsuarioController {
    // Método para registrar un nuevo usuario
    public function registrarUsuario($nombreUsuario, $correo, $contrasena) {
        // Crear una instancia de la clase Usuario
        $usuario = new Usuario($nombreUsuario, $correo, $contrasena);
        
        // Establecer los datos del usuario
        $usuario->setNombreUsuario($nombreUsuario);
        $usuario->setCorreo($correo);
        $usuario->setContrasena($contrasena);
        
        // Llamar al método para guardar el usuario en la base de datos
        $resultado = $usuario->registrarUsuario();
        
        // Verificar si el usuario se registró con éxito
        if ($resultado) {
            // Mostrar un mensaje de éxito en la misma página
            echo '<div class="alert alert-success">Registro exitoso.</div>';
        } else {
            // Mostrar un mensaje de error en la misma página
            echo '<div class="alert alert-danger">Error en el registro. Inténtalo de nuevo.</div>';
        }
    }
    
    // Otros métodos para acciones relacionadas con usuarios
}
?>
