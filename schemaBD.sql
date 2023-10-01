CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
);

CREATE TABLE articulos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    contenido TEXT NOT NULL,
    fecha_publicacion DATE NOT NULL,
    autor_id INT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES usuarios(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE contactos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_envio DATETIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
