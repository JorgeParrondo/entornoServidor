--El nombre de la base de datos es tetuan_league, para que la web detecte el usuario
-- hay que crear la bbdd en el php myAdmin de cada usuario
--  SCRIPTS DE CREACION DE TABLA
CREATE TABLE usuarios (
    email VARCHAR(100),
    user VARCHAR(50),
    passwd VARCHAR(255),
    bloqueado BOOLEAN,
    intentos INT, 
    edad INT,
    nombre VARCHAR(50),
    ape1 VARCHAR(50),
    ape2 VARCHAR(50)
);

-- Tabla Noticia
CREATE TABLE noticias (
    msg TEXT,
    fecha DATETIME,
    autor VARCHAR(50)
);
--SCRIPTS DE INSERCION
INSERT INTO `usuarios`
(`email`, `user`, `passwd`, `bloqueado`, `intentos`, `edad`, `nombre`, `ape1`, `ape2`)
VALUES
('root@gmail.com', 'root', 'root', 0, 0, 35, 'Administrador', 'Sistema', ''),
('ana@gmail.com', 'ana', 'ana123', 0, 0, 28, 'Ana', 'García', 'López'),
('juan@gmail.com', 'juan', 'juan123', 0, 1, 32, 'Juan', 'Pérez', 'Martín'),
('maria@gmail.com', 'maria', 'maria123', 0, 0, 25, 'María', 'Sánchez', 'Ruiz'),
('carlos@gmail.com', 'carlos', 'carlos123', 1, 3, 41, 'Carlos', 'Fernández', 'Gómez'),
('laura@gmail.com', 'laura', 'laura123', 0, 0, 29, 'Laura', 'Díaz', 'Navarro');
