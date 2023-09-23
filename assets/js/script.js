function mostrarFechaYHora() {
  const elementoFechaHora = document.getElementById("fecha-hora-banner");

  function actualizarFechaYHora() {
    const fechaHoraActual = new Date();
    const opciones = {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
      hour12: false, // Formato de 24 horas
    };
    const fechaHoraFormateada = fechaHoraActual.toLocaleDateString(
      "es-ES",
      opciones
    );
    elementoFechaHora.textContent = fechaHoraFormateada;
  }

  // Actualizar la fecha y hora cada segundo
  setInterval(actualizarFechaYHora, 1000);
}

// Llama la función cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", mostrarFechaYHora);

// --------------------------APARTADO DE AJAX-------------------------------
$(document).ready(function () {
  // obteniendo paginas
  var paginaActual = window.location.pathname
    .split("/")
    .pop()
    .split(".")
    .shift();

  // definiendo paginas
  var archivosJSON = {
    Ngeneral: "generales.json",
    Neconomia: "economia.json",
    Ndeporte: "deportes.json",
    index: "index.json",
  };

  // verificacion
  if (archivosJSON.hasOwnProperty(paginaActual)) {
    var archivoJSON = archivosJSON[paginaActual];

    // Realiza una petición AJAX para cargar el contenido del archivo JSON
    $.ajax({
      url: "assets/noticias/" + archivoJSON,
      dataType: "json",
      success: function (data) {
        var noticias = data.noticias;
        var tablaNoticias = $("#" + paginaActual + "-container").find("tbody");

        noticias.forEach(function (noticia) {
          var titulo = noticia.titulo;
          var contenido = noticia.contenido;
          var visitas = noticia.visitas;
          var imagen = noticia.imagen;

          var filaNoticia = "<tr>";
          filaNoticia += "<td><h3>" + titulo + "</h3></td>";
          filaNoticia += "</tr>";
          filaNoticia += "<tr>";
          filaNoticia += "<td>" + contenido + "</td>";
          filaNoticia += "</tr>";
          filaNoticia += "<tr>";
          filaNoticia +=
            '<td><img src="' +
            imagen +
            '" alt="Imagen de la noticia" class="img-fluid"></td>';
          filaNoticia += "</tr>";
          filaNoticia += "<tr>";
          filaNoticia += "<td><b>Visitas:</b> " + visitas + "</td>";
          filaNoticia += "</tr>";

          tablaNoticias.append(filaNoticia);
        });
      },
      error: function () {
        console.log("Error al cargar las noticias.");
      },
    });
  } else {
    console.log("Página no encontrada en la lista de archivos JSON.");
  }
});



// CREAR NUEVO USUARIO CON JS , AJAX Y PHP-----------------------------------------------------------------------------------------
$(document).ready(function () {
  // get form
  const formNewUser = $("#formulario-registro");

  $(formNewUser).submit(function (e) {
    // prevent default submiting form
    e.preventDefault();

    // get values from form
    var name = $("#nombreUsuario").val();
    var email = $("#correo").val();
    var password = $("#contrasena").val();

    // create object with values
    var datos = {
      name: name,
      email: email,
      password: password,
      operation: "createUser",
    };

    // check if values are not empty
    if (name == "" || email == "" || password == "") {
      alert("Por favor llene todos los campos");
    }

    $.ajax({
      type: "POST",
      url: "./controllers/user-controller.php",
      data: datos,
      success: function (response) {
        if (response == "okInsert") {
          $(formNewUser).append("<div id='usuario-enviado'></div>");
          $("#usuario-enviado")
            .html("<h2>Usuario creado con éxito.</h2>")
            .append("<p>Nombre: " + name + "</p>")
            .hide()
            .fadeIn(1500, function () {
              $("#usuario-enviado");
            });

          setTimeout(function () {
            $("#usuario-enviado").fadeOut(1500, function () {
              $("#usuario-enviado").remove();
            });
          }, 5000);

          // reset form
          $(formNewUser).trigger("reset");
        }
      },
    });
  });
});
// CREAR NUEVO USUARIO CON JS , AJAX Y PHP-----------------------------------------------------------------------------------------

$(document).ready(function () {
  // get form
  const formNewContact = $("#formulario-contacto");

  $(formNewContact).submit(function (e) {
    // prevent default submiting form
    e.preventDefault();

    // get values from form
    var nombre = $("#nombre").val();
    var mensaje = $("#mensaje").val();

    // create object with values
    var datos = {
      nombre: nombre,
      mensaje: mensaje,
      operation: "enviarMensaje",
    };

    // check if values are not empty
    if (nombre == "" || mensaje == "") {
      alert("Por favor llene todos los campos");
    }

    $.ajax({
      type: "POST",
      url: "./controllers/contact-controller.php",
      data: datos,
      success: function (response) {
        if (response == "okInsert") {
          $(formNewContact).append("<div id='mensaje-enviado'></div>");
          $("#mensaje-enviado")
            .html("<h2>Mensaje enviado con exito</h2>")
            .hide()
            .fadeIn(1500, function () {
              $("#mensaje-enviado");
            });

          setTimeout(function () {
            $("#mensaje-enviado").fadeOut(1500, function () {
              $("#mensaje-enviado").remove();
            });
          }, 5000);

          // reset form
          $(formNewContact).trigger("reset");
        }
      },
    });
  });
});




// AGREGAR NOTICIA CON JS , AJAX Y PHP---------------------------------------------------------------------------------------------
function agregarNoticia(event) {
  event.preventDefault();

  // Obtener datos del formulario
  var categoria = document.getElementById("categoria").value;
  var titulo = document.getElementById("titulo").value;
  var contenido = document.getElementById("contenido").value;
  var imagen = document.getElementById("imagen").value;

  // Crear un objeto con los datos de la nueva noticia
  var nuevaNoticia = {
    titulo: titulo,
    contenido: contenido,
    imagen: imagen,
    visitas: 0, // Inicialmente, puedes establecer las visitas en 0
  };

  // Cargar el archivo JSON existente
  $.ajax({
    url: "assets/noticias/" + categoria + ".json",
    dataType: "json",
    success: function (data) {
      // Obtener la lista de noticias existentes
      var noticias = data.noticias;

      // Agregar la nueva noticia a la lista
      noticias.push(nuevaNoticia);

      // Mostrar la nueva noticia en la página
      mostrarNuevaNoticia(nuevaNoticia);

      // Mostrar un mensaje de confirmación al usuario
      alert("Noticia agregada con éxito.");
    },
    error: function () {
      console.log("Error al cargar el archivo JSON de " + categoria);
    },
  });

  function mostrarNuevaNoticia(nuevaNoticia) {
    //   Esta seria una funcion a futuro para mostrar la noticia y pushearla en el json
  }
}

// AGREGAR NOTICIA CON JS , AJAX Y PHP---------------------------------------------------------------------------------------------
