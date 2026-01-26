-- SCRIPT DE CREACIÓN DE LA BASE DE DATOS 'tetuan_league'
CREATE database IF NOT EXISTS tetuan_league;
--  SCRIPTS DE CREACION DE TABLA
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol ENUM('admin', 'periodista', 'default') NOT NULL,
    email VARCHAR(100),
    usser VARCHAR(50),
    passwd VARCHAR(255),
    bloqueado BOOLEAN,
    partidos INT,
    goles INT,
    asistencias INT,
    faltas INT,
    intentos INT, 
    edad INT,
    nombre VARCHAR(50),
    ape1 VARCHAR(50),
    ape2 VARCHAR(50)
);

-- Tabla Noticia
CREATE TABLE IF NOT EXISTS noticias (
    id_noticia INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(70),
    contenido TEXT,
    fecha DATETIME,
    visible BOOLEAN
);

-- SCRIPT DE INSERCION
INSERT INTO `usuarios` 
(`rol`, `email`, `usser`, `passwd`, `bloqueado`, `partidos`, `goles`, `asistencias`, `faltas`, `intentos`, `edad`, `nombre`, `ape1`, `ape2`) 
VALUES
('admin', 'root@gmail.com', 'root', '$2y$10$OyC0auWAWwnMmc1JrV7zAu1kHSpV9k5K7WlmAnExPbWPxvtd.aB9i', 0, NULL, NULL, NULL, NULL, 0, 35, 'Administrador', 'Sistema', ''),
('periodista', 'ana@gmail.com', 'ana', '$2y$10$8WDUXpO7graD1lJe0i/SSOVY0M80jmHtQkFB0RTDv8DJQbo7K7VWe', 0, 6, 4, 2, 7, 0, 28, 'Ana', 'García', 'López'),
('default', 'juan@gmail.com', 'juan', '$2y$10$gX1KzAg6GFhGIk8BbQ54BOB6Gf07rNt.XTZrwNa0OTPtgb2teE.Pi ', 0, 6, 0, 5, 2, 1, 32, 'Juan', 'Pérez', 'Martín'),
('default', 'maria@gmail.com', 'maria', '$2y$10$g5pavdOt4y8aNU8BZRRdauDMmsK0cJ6oXt1QWLWW7Ond6aSqWLCNu', 0, 6, 2, 3, 8, 0, 25, 'María', 'Sánchez', 'Ruiz'),
('default', 'carlos@gmail.com', 'carlos', '$2y$10$dLmzihMogthObOu76ZvRpuB1jQ0.l58yyH3NOjugC092dJRIdBVia', 1, 6, 4, 1, 0, 3, 41, 'Carlos', 'Fernández', 'Gómez'),
('default', 'laura@gmail.com', 'laura', '$2y$10$1XmjQobUWz2nNu7/JYdSueYCV6cj4VaT8rTOv.iShqs1Ue3nM36S', 0, 6, 0, 1, 4, 0, 29, 'Laura', 'Díaz', 'Navarro');

INSERT INTO `noticias`
(`titulo`, `autor`, `contenido`, `fecha`, `visible`)
VALUES
('pepe la lia', 'pepe', 'pepe la ha liado esta mañana', NOW(), true);