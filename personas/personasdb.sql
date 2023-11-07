CREATE DATABASE personasdb;

USE personasdb;
CREATE TABLE tabla_personas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    localizacion VARCHAR(255) NOT NULL
);

INSERT INTO tabla_personas (nombre, apellido, localizacion) VALUES
('Pablo', 'Martínez', 'Madrid'),
('David', 'Fernandez', 'Granada')

