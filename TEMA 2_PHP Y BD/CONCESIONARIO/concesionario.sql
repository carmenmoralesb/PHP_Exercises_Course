CREATE DATABASE CONCESIONARIO;
DROP DATABASE CONCESIONARIO;
CREATE DATABASE CONCESIONARIO;

use CONCESIONARIO;
-- para insertar registors con tilde
SET NAMES 'utf8';
SET CHARACTER SET utf8;

CREATE TABLE IF NOT EXISTS coche (
    id      INT(10) AUTO_INCREMENT PRIMARY KEY,
    modelo  VARCHAR(100) NOT NULL,
    marca   VARCHAR(50) NOT NULL,
    precio  INT(20) NOT NULL,
    stock   INT(20) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS  grupos (
    id         INT(10) AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(50) NOT NULL,
    ciudad     VARCHAR(100) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS vendedores (
    id         INT(10) AUTO_INCREMENT PRIMARY KEY,
    grupo_id   INT(10) NOT NULL,
    jefe       INT(10) ,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100),
    cargo VARCHAR(50),
    fecha DATE,
    sueldo FLOAT(20,2),
    comision FLOAT(10,2),
    FOREIGN KEY (grupo_id) REFERENCES grupos(id),
    FOREIGN KEY (jefe) REFERENCES vendedores(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS clientes (
    id              INT(10) AUTO_INCREMENT PRIMARY KEY,
    vendedor_id     INT(10) NOT NULL,
    nombre          VARCHAR(100) NOT NULL,
    ciudad          VARCHAR(150) NOT NULL,
    gastado         FLOAT (50,2),
    FOREIGN KEY (vendedor_id) REFERENCES vendedores(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS encargos (
    id              INT(10) AUTO_INCREMENT PRIMARY KEY,
    cliente_id      INT(10),
    coche_id        INT(10),
    cantidad        INT(20),
    fecha           DATE,
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (coche_id) REFERENCES coche(id)
) ENGINE = InnoDB;

INSERT INTO coche(modelo,marca,precio,stock) VALUES ('MX5','Mazda',32756,10);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Vitara','Suzuki',28690,6);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Mitsubishi Outlander','Mitsubishi',23300,10);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Lexus UX Híbrido','Lexus',29900,5);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Ferrari Spider','Ferrari',245000,5);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Porche Cayene','Porche',65000,4);
INSERT INTO coche(modelo,marca,precio,stock) VALUES ('Lambo Aventador','Lamborgini',170000,3);