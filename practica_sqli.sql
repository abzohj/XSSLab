CREATE DATABASE IF NOT EXISTS practica_sqli;
USE practica_sqli;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- Tabla de aficiones
CREATE TABLE aficiones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    aficion VARCHAR(255),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Datos de prueba
INSERT INTO usuarios (usuario, password) VALUES
('admin', 'admin123'),
('alvaro', 'pass123'),
('test', 'test');

INSERT INTO aficiones (usuario_id, aficion) VALUES
(1, 'hacking'),
(2, 'futbol'),
(3, 'musica');
