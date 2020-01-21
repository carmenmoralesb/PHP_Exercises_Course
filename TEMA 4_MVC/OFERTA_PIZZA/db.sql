use ofertas;
CREATE TABLE IF NOT EXISTS oferta (
    id int(11) NOT NULL AUTO_INCREMENT,
    titulo varchar(200) NOT NULL,
    imagen varchar(100) NOT NULL,
    descripcion varchar(200) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;