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


*****CREACION DE USUARIOS*****
CREATE TABLE `usuario` (
`usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
`usu_cedula` varchar(10) NOT NULL,
`usu_nombres` varchar(50) NOT NULL,
`usu_apellidos` varchar(50) NOT NULL,
`usu_direccion` varchar(75) NOT NULL,
`usu_telefono` varchar(20) NOT NULL,
`usu_correo` varchar(20) NOT NULL,
`usu_password` varchar(255) NOT NULL,
`usu_fecha_nacimiento` date NOT NULL,
`usu_eliminado` varchar(10) NOT NULL DEFAULT 'N',
`usu_fecha_creacion` timestamp NULL DEFAULT NULL,
`usu_fecha_modificacion` timestamp NULL DEFAULT NULL,
`usu_rol` varchar(20) DEFAULT NULL,
PRIMARY KEY (`usu_codigo`),
UNIQUE KEY `usu_cedula` (`usu_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



********CREACION de pedido *************
CREATE TABLE `pedido` (
`ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
`ped_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
`ped_cod_user` int(11) NOT NULL,
`ped_estado` varchar(50) NOT NULL,
`usu_eliminado` boolean NOT NULL DEFAULT '0',
PRIMARY KEY (`ped_codigo`),
FOREIGN KEY (`ped_cod_user`)   
REFERENCES `usuario` (`usu_codigo`))
 ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;