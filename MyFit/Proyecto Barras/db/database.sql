DROP DATABASE IF EXISTS gym;
CREATE DATABASE gym;
USE gym;

CREATE TABLE materiales(
idMaterial INT AUTO_INCREMENT PRIMARY KEY,
nombreMaterial VARCHAR(45) NOT NULL,
cantidadMaterial FLOAT(8,1) NOT NULL
);

INSERT INTO materiales(nombreMaterial, cantidadMaterial) VALUES('Barra de hierro', 0);

CREATE TABLE equipo(
idEquipo INT AUTO_INCREMENT PRIMARY KEY,
nombreEquipo VARCHAR(45) NOT NULL,
material INT,
longitudBarra float (5,2),

cantidadEquipo INT(6),

peso INT (3)
);

INSERT INTO equipo(nombreEquipo, material, longitudBarra, cantidadEquipo, peso) VALUES ('Barra chica', 1, 1,0, 10);

INSERT INTO equipo(nombreEquipo, material, longitudBarra, cantidadEquipo, peso) VALUES ('Barra mediana', 1, 1.5,0,15);

INSERT INTO equipo(nombreEquipo, material, longitudBarra, cantidadEquipo, peso) VALUES ('Barra grande', 1, 2,0, 20);

INSERT INTO equipo(nombreEquipo, peso, cantidadEquipo) VALUES ('Disco5', 5, 0);

INSERT INTO equipo(nombreEquipo, peso, cantidadEquipo) VALUES ('Disco10', 10, 0);

INSERT INTO equipo(nombreEquipo, cantidadEquipo) VALUES ('Mariposa', 0);

CREATE TABLE kits(
idKit INT AUTO_INCREMENT PRIMARY KEY,

nombreKit VARCHAR(45) NOT NULL,

cantidadKit INT,
equipo1 VARCHAR(45),

cantidad1 INT,

equipo2 VARCHAR(45),

cantidad2 INT,

equipo3 VARCHAR(45),

cantidad3 INT,

equipo4 VARCHAR(45),

cantidad4 INT,

equipo5 VARCHAR(45),

cantidad5 INT,

equipo6 VARCHAR(45),

cantidad6 INT

);

INSERT INTO kits(nombreKit, cantidadKit, equipo1, cantidad1, equipo2, cantidad2) VALUES ('Kit pesado',0, 'Disco10', 2, 'Barra grande',1);

INSERT INTO kits(nombreKit, cantidadKit, equipo1, cantidad1, equipo2, cantidad2) VALUES ('Kit mediano',0, 'Disco5', 2, 'Barra mediana',1);

INSERT INTO kits (nombreKit, cantidadKit, equipo1, cantidad1, equipo2, cantidad2, equipo3, cantidad3, equipo4, cantidad4)
VALUES ('Kit completo',0, 'Disco10', 2, 'Barra grande', 1, 'Barra chica', 1, 'Mariposa', 2);
