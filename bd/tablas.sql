CREATE TABLE Usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    correo VARCHAR(255) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Despliegues (
    id_despliegue INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nombre_proyecto VARCHAR(100) NOT NULL,
    url_repositorio VARCHAR(255) NOT NULL,
    ruta_vps VARCHAR(255) NOT NULL,
    puerto INT,
    estado BOOLEAN DEFAULT 1,
    url_publica VARCHAR(255),
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);