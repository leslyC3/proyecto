CREATE DATABASE PastelesDB;
USE PastelesDB;
CREATE TABLE Pastel (
    id_Pastel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
	descripcion TEXT,
    fecha_vencimiento DECIMAL(10, 2),
    Precio DECIMAL(10, 2)
);
CREATE TABLE ingrediente (
    id_ingrediente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
     fecha_ingreso DECIMAL (10, 2),
    fecha_vencimiento DECIMAL(10, 2)
);

CREATE TABLE pastel_ingrediente(
    id_pastel_ingrediente INT AUTO_INCREMENT PRIMARY KEY
);
SELECT * FROM Pasteles;
