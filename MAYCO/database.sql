DROP DATABASE IF EXISTS MAYCO;
CREATE DATABASE MAYCO;
USE MAYCO;
CREATE TABLE conductores (

idConductor INT AUTO_INCREMENT PRIMARY KEY,

nombreConductor VARCHAR(45),

dni INT,

edad INT,

mail VARCHAR(45),

domicilio VARCHAR(45),

sueldo FLOAT(8,2)

);



CREATE TABLE productos(

idProducto INT AUTO_INCREMENT PRIMARY KEY,

nombreProducto VARCHAR(45),

precio FLOAT(8,2)

);



CREATE TABLE envios(

idEnvio INT AUTO_INCREMENT PRIMARY KEY,

idConductor INT,

idProducto INT,

destino VARCHAR(255),

estadoEnvio VARCHAR(45),

conflicto VARCHAR(255),

fechaPedido DATE,

fechaEntrega DATE,

feedback VARCHAR(255),

FOREIGN KEY(idConductor) REFERENCES conductores(idConductor),

FOREIGN KEY(idProducto) REFERENCES productos(idProducto)
);



CREATE TABLE devoluciones(

idDevoluciones INT AUTO_INCREMENT PRIMARY KEY,

idEnvio INT,

razon VARCHAR(45),

estadoPago VARCHAR(45),

FOREIGN KEY(idEnvio) REFERENCES envios(idEnvio)

);
