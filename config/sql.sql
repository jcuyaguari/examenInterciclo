nombre de la tabla: examen

*****CREACION DE PRODUCTOS*****
CREATE TABLE `examen`.`productos` (
  `pro_codigo` int(8) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(250) NOT NULL,
  `pro_tipo` varchar(250) NOT NULL,
  `pro_precio` double(4,2) NOT NULL,
  `pro_stock` int(8) NOT NULL,
  `pro_imagen` blob NOT NULL,
  `pro_eliminado` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`pro_codigo`),
  UNIQUE KEY(`pro_nombre`))
  ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



*****CREACION DE LOCALES*****
CREATE TABLE IF NOT EXISTS `Local` (
  `loc_id` int(11) NOT NULL AUTO_INCREMENT,
  `loc_nombre` VARCHAR(50) NOT NULL,
  `loc_direccion` VARCHAR(50) NOT NULL,
  `loc_telefono` VARCHAR(50) NOT NULL,
  `loc_descripcion` VARCHAR(100) NOT NULL,
  `loc_eliminado` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`loc_id`),
  UNIQUE KEY `loc_nombre` (`loc_nombre`))
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
