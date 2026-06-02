DROP DATABASE IF EXISTS catalogo;
CREATE DATABASE catalogo CHARSET utf8mb4;
USE catalogo;

CREATE TABLE usuario (
  id int(11) NOT NULL auto_increment,
  nombre varchar(100) NOT NULL,
  apellido1 varchar(100) NOT NULL,
  apellido2 varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  login varchar(50) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE fabricante (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
);

CREATE TABLE producto (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  precio DOUBLE NOT NULL,
  descripcion TEXT,
  imagen VARCHAR(255),
  id_fabricante INT UNSIGNED NOT NULL,
  FOREIGN KEY (id_fabricante) REFERENCES fabricante(id)
);