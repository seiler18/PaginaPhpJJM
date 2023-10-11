<?php
require_once './modelo/Conexion_bd.php';

$conexionExitosa = false;

try {
    $conexionBD = new \dashboard\modelo\ConexionBD();
    $conexionExitosa = true; // La conexión se estableció correctamente
} catch (\PDOException $e) {
   
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Para que soporte cualquier caracter de idiomas -->
    <meta charset="UTF-8">
    <!-- Para cambiar la relacion de aspecto -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">                                
    <title>Página web JJM </title>
    <!-- Mi estilo para css :  -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Mi icono para mostrar en ventana :  -->
    <link rel="shortcut icon" type="image/png" href="./assets/img/html5.png">
    <!-- Mi Google Fonts:  -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- Con esto ocupo boostrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
     crossorigin="anonymous"></script>
    
</head>


<body>
     <!-- Barra de navegación  -->
     <nav class="navegacion navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">
          <img src="./assets/img/elfaro.png" alt="Logo" width="150" height="40">
      </a>
      <!-- Botón de hamburguesa para dispositivos móviles -->
      <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Contenedor para alinear la lista de navegación -->
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav"> <!-- Aplicamos la clase ml-auto para alinear a la derecha -->
              <li class="nav-item">
                <a class="nav-link" href="./index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./Ngeneral.php">Noticias Generales</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="./Ndeporte.php">Noticias de Deportes</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="./Neconomia.php">Noticias de Negocios</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#Contacto">Contáctanos</a>
              </li>
          </ul>
      </div>
  </nav>
    
    <!-- Barra de navegación  -->
    <!-- Banner  -->
    
    <div class="banner">
        <img src="./assets/img/elfaro.png" id="Inicio" alt="Banner del faro">
    </div>
    <div id="fecha-hora-banner" class="fecha-hora-banner"></div>
<!-- Mostrar un mensaje al usuario sobre el estado de la conexión si fue exitosa o no -->
<?php if ($conexionExitosa) { ?>
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert" id="conexion-success">
        <strong>Conexión exitosa a la base de datos.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } else { ?>
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" id="conexion-error">
        <strong>Error al conectar a la base de datos.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

<main>
    <!-- SECCION DE MIS NOTICIAS -->
    <section id="Negocios" class="Negocios container">
      <h1>Sección de Negocios & Economia</h1>
      <div id="Neconomia-container">
          <div class="table-responsive">
              <table class="table table-striped" description="tabla noticias">
                <thead class="thead-dark">
                  <tr>
                    <th><h2>Noticias de Negocios</h2></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- ACA ESTARAN LAS NOTICIAS DINAMICAMENTE QUE SE CARGAN
                  CON JS,AJAX PARA ESTE CASO LOS TENGO EN UN JSON , PERO PODRIA CARGARLOS CON UNA API SI ASI QUISIERA-->
                </tbody>
              </table>
        </div>
        </section>

        <section id="Registrarse" class="container">
          <h1>Regístrate en nuestra página</h1>
          <div class="formulario-container">
      
              <form action="" method="POST" id="formulario-registro">
                  <div class="form-group">
                      <label for="nombreUsuario">Nombre de usuario:</label>
                      <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" >
                  </div>
      
                  <div class="form-group">
                      <label for="correo">Correo electrónico:</label>
                      <input type="email" class="form-control" id="correo" name="correo" >
                  </div>
      
                  <div class="form-group">
                      <label for="contrasena">Contraseña:</label>
                      <input type="password" class="form-control" id="contrasena" name="contrasena" >
                  </div>
      
                  <button type="submit" name="registro" class="btn btn-primary">Registrarse</button>
              </form>
          </div>
      </section>


    <section id="Contacto" class="container">
        <h1>Contáctanos</h1>
        <div class="formulario-container">
            <form id="formulario-contacto" onsubmit="enviarFormulario(event)">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
    
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
    
                <input type="submit" value="Enviar">
            </form>
        </div>

    </section>
</main>


<footer class="site-footer navbar-dark bg-dark">
  <!-- Contenedor para alinear el contenido del footer -->
  <div class="footer-content">
    <p class="navbar-text">
        &copy; 2023 Jesus Seiler - Jaime Llanca -
        Mauricio Morel . Hecha para la presentación de HTML5,CSS,JS,Bootstrap,Ajax.
        <img src="./assets/img/html5.png" alt="img html5" class="html5-icon">
    </p>
    <div class="links">
      <a href="./index.php">Inicio</a>
        <a href="./Ngeneral.php">Generales</a>
        <a href="./Ndeporte.php">Deportes</a>
    </div>
</div>
</footer>

  <!--Ajax-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <!--jQuery 3.3.1 -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!--Popper JS 1.14.3-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>

  <!--Bootstrap JS 4.2.1-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <!-- mi script -->
  <script src="./assets/js/script.js"></script>

</body>
</html>
