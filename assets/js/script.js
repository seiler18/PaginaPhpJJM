function mostrarFechaYHora() {
    const elementoFechaHora = document.getElementById("fecha-hora-banner");
    
    function actualizarFechaYHora() {
        const fechaHoraActual = new Date();
        const opciones = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false // Formato de 24 horas
        };
        const fechaHoraFormateada = fechaHoraActual.toLocaleDateString('es-ES', opciones);
        elementoFechaHora.textContent = fechaHoraFormateada;
    }
    
    // Actualizar la fecha y hora cada segundo
    setInterval(actualizarFechaYHora, 1000);
}

// Llama la función cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", mostrarFechaYHora);


function enviarFormulario(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    
    // Obtener los valores del formulario
    const nombre = document.getElementById("nombre").value;
    const mensaje = document.getElementById("mensaje").value;
    
    // Restablecer el formulario después de mostrar el mensaje (opcional)
    document.getElementById("formulario-contacto").reset();
    
    // Mostrar el mensaje de envío con detalles usando un alert
    const mensajeConfirmacion = `Formulario enviado con éxito.\nDetalles:\nNombre: ${nombre}\nMensaje: ${mensaje}`;
    alert(mensajeConfirmacion);
    console.log(mensajeConfirmacion);
}



// --------------------------APARTADO DE AJAX-------------------------------
$(document).ready(function() {
    // obteniendo paginas
    let paginaActual = window.location.pathname.split('/').pop().split('.').shift();

    // definiendo paginas
    let archivosJSON = {
        'Ngeneral': 'generales.json',
        'Neconomia': 'economia.json',
        'Ndeporte': 'deportes.json',
        'index': 'index.json'

    };

    // verificacion
    if (archivosJSON.hasOwnProperty(paginaActual)) {
        let archivoJSON = archivosJSON[paginaActual];

        // Realiza una petición AJAX para cargar el contenido del archivo JSON
        $.ajax({
            url: 'assets/noticias/' + archivoJSON,
            dataType: 'json',
            success: function(data) {
                let noticias = data.noticias;
                let tablaNoticias = $('#' + paginaActual + '-container').find('tbody');

                noticias.forEach(function(noticia) {
                    let titulo = noticia.titulo;
                    let contenido = noticia.contenido;
                    let visitas = noticia.visitas;
                    let imagen = noticia.imagen;

                    let filaNoticia = '<tr>';
                    filaNoticia += '<td><h3>' + titulo + '</h3></td>';
                    filaNoticia += '</tr>';
                    filaNoticia += '<tr>';
                    filaNoticia += '<td>' + contenido + '</td>';
                    filaNoticia += '</tr>';
                    filaNoticia += '<tr>';
                    filaNoticia += '<td><img src="' + imagen + '" alt="Imagen de la noticia" class="img-fluid"></td>';
                    filaNoticia += '</tr>';
                    filaNoticia += '<tr>';
                    filaNoticia += '<td><b>Visitas:</b> ' + visitas + '</td>';
                    filaNoticia += '</tr>';

                    tablaNoticias.append(filaNoticia);
                });
            },
            error: function() {
                console.log('Error al cargar las noticias.');
            }
        });
    } else {
        console.log('Página no encontrada en la lista de archivos JSON.');
    }
});


function agregarNoticia(event) {
    event.preventDefault();

    // Obtener datos del formulario
    let categoria = document.getElementById('categoria').value;
    let titulo = document.getElementById('titulo').value;
    let contenido = document.getElementById('contenido').value;
    let imagen = document.getElementById('imagen').value; // Aquí deberías manejar la imagen adecuadamente

    // Crear un objeto con los datos de la nueva noticia
    let nuevaNoticia = {
        titulo: titulo,
        contenido: contenido,
        imagen: imagen,
        visitas: 0 // Inicialmente, puedes establecer las visitas en 0
    };

    // Cargar el archivo JSON existente
    $.ajax({
        url: 'assets/noticias/' + categoria + '.json',
        dataType: 'json',
        success: function(data) {
            // Obtener la lista de noticias existentes
            let noticias = data.noticias;

            // Agregar la nueva noticia a la lista
            noticias.push(nuevaNoticia);

            // Mostrar la nueva noticia en la página (puedes hacerlo aquí o redirigir a la página de noticias)
            mostrarNuevaNoticia(nuevaNoticia);

            // Mostrar un mensaje de confirmación al usuario
            alert('Noticia agregada con éxito.');
        },
        error: function() {
            console.log('Error al cargar el archivo JSON de ' + categoria);
        }
    });

    function mostrarNuevaNoticia(nuevaNoticia) {
    //   Esta seria una funcion a futuro para mostrar la noticia y pushearla en el json ,pero para ello necesitamos trabajar con backend como php por ejemplo.
    }
}

// Función para registrar un nuevo usuario
function registrarUsuario(event) {
    event.preventDefault();

    // Obtener datos del formulario de registro
    let nombreUsuario = document.getElementById('nombreUsuario').value;
    let correoUsuario = document.getElementById('correoElectronico').value;
    let contraseñaUsuario = document.getElementById('contrasena').value;

    // Validar los datos del formulario
    if (nombreUsuario === '' || correoUsuario === '' || contraseñaUsuario === '') {
        alert('Por favor, complete todos los campos.');
        return;
    }

    // Crear un objeto con los datos del nuevo usuario
    let nuevoUsuario = {
        nombre: nombreUsuario,
        correo: correoUsuario,
        contraseña: contraseñaUsuario
    };

    // Aquí puedes enviar los datos del nuevo usuario al servidor o almacenarlos en tu base de datos
    // Puedes usar AJAX para enviar los datos al servidor, pero esto requerirá una implementación en el backend (por ejemplo, con PHP)
    // Por ahora, simularemos el registro mostrando un mensaje de éxito
    alert('Usuario registrado con éxito.');
    console.log('Nuevo usuario:', nuevoUsuario);
}

// Agregar un evento de escucha al formulario de registro
document.getElementById('formulario-registro').addEventListener('submit', registrarUsuario);

$(document).ready(function() {
    var successAlert = $("#conexion-success");
    if (successAlert.length > 0) {
        setTimeout(function() {
            successAlert.fadeOut();
        }, 3000); // 5000 milisegundos (5 segundos)
    }

    // Ocultar la alerta de error después de 5 segundos
    var errorAlert = $("#conexion-error");
    if (errorAlert.length > 0) {
        setTimeout(function() {
            errorAlert.fadeOut();
        }, 3000); // 5000 milisegundos (5 segundos)
    }
});

  
