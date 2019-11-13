/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.31-MariaDB : Database - dbquickimage
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbquickimage` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbquickimage`;

/*Table structure for table `tblcategoria` */

DROP TABLE IF EXISTS `tblcategoria`;

CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblcategoria` */

LOCK TABLES `tblcategoria` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbldescargas` */

DROP TABLE IF EXISTS `tbldescargas`;

CREATE TABLE `tbldescargas` (
  `idDescarga` int(11) NOT NULL AUTO_INCREMENT,
  `PNG` varchar(50) DEFAULT NULL,
  `JPG` varchar(50) DEFAULT NULL,
  `fk_Imagen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDescarga`),
  KEY `fk_DescargarImagenes` (`fk_Imagen`),
  CONSTRAINT `fk_DescargarImagenes` FOREIGN KEY (`fk_Imagen`) REFERENCES `tblimagenes` (`idImagen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbldescargas` */

LOCK TABLES `tbldescargas` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblimagenes` */

DROP TABLE IF EXISTS `tblimagenes`;

CREATE TABLE `tblimagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `fk_Categoria` int(11) DEFAULT NULL,
  `fk_Usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImagen`),
  KEY `fk_ImagenesCategoria` (`fk_Categoria`),
  KEY `fk_ImagenesUsuario` (`fk_Usuario`),
  CONSTRAINT `fk_ImagenesCategoria` FOREIGN KEY (`fk_Categoria`) REFERENCES `tblcategoria` (`idCategoria`),
  CONSTRAINT `fk_ImagenesUsuario` FOREIGN KEY (`fk_Usuario`) REFERENCES `tblusuarios` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblimagenes` */

LOCK TABLES `tblimagenes` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblroles` */

DROP TABLE IF EXISTS `tblroles`;

CREATE TABLE `tblroles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `wasdsadsa` (`Nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `tblroles` */

LOCK TABLES `tblroles` WRITE;

insert  into `tblroles`(`idRol`,`Nombre`) values (57,'Administrador'),(56,'Usuario');

UNLOCK TABLES;

/*Table structure for table `tblusuarios` */

DROP TABLE IF EXISTS `tblusuarios`;

CREATE TABLE `tblusuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombre` varchar(40) DEFAULT NULL,
  `vchAppeliidoP` varchar(30) DEFAULT NULL,
  `vchApellidoM` varchar(30) DEFAULT NULL,
  `vchCorreo` varchar(100) DEFAULT NULL,
  `vchUsuario` varchar(20) DEFAULT NULL,
  `vchContrasena` varchar(32) DEFAULT NULL,
  `imgPerfil` varchar(60) DEFAULT NULL,
  `fk_Rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_RolUsuario` (`fk_Rol`),
  CONSTRAINT `fk_RolUsuario` FOREIGN KEY (`fk_Rol`) REFERENCES `tblroles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblusuarios` */

LOCK TABLES `tblusuarios` WRITE;

insert  into `tblusuarios`(`idUsuario`,`vchNombre`,`vchAppeliidoP`,`vchApellidoM`,`vchCorreo`,`vchUsuario`,`vchContrasena`,`imgPerfil`,`fk_Rol`) values (2,'Antonio de Jesus','Hernandez','Liborio','paydom_@hotmail.com','liborio','123','1',57),(3,'Jesus','Sanchez','Angeles','JSanchez_@hotmail.com','sanchez','123','1',56),(5,'nombre','apellidoPaterno','apellidoMaterno','correo','usuario','contraseña','ftPerfil',57);

UNLOCK TABLES;

/* Procedure structure for procedure `SP_Categoria` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Categoria` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Categoria`(
    IN tipo VARCHAR(7),
    IN claveCategoria INT,
    IN nombre VARCHAR(51))
BEGIN
	  IF tipo = 'insert' THEN
		INSERT INTO tblcategoria(Nombre)VALUES (nombre);
	  END IF;	
	  IF tipo = 'delete' THEN
		DELETE FROM tblcategoria WHERE idCategoria=claveCategoria;
	  END IF;
	  IF tipo = 'update' THEN
		UPDATE tblcategoria SET Nombre = nombre WHERE idCategoria=claveCategoria;
	  END IF;
	  IF tipo = 'showData' THEN
		SELECT * FROM tblcategoria;
	  END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Descargas` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Descargas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Descargas`(
    IN tipo VARCHAR(7),
    IN claveDescarga INT,
    IN png VARCHAR(51),
    IN jpg VARCHAR(51),
    IN fkImagen int)
BEGIN
	  IF tipo = 'insert' THEN
		INSERT INTO tbldescargas(PNG,JPG,fk_Imagen) values(png,jpg,fkImagen);
	  END IF;	
	  IF tipo = 'delete' THEN
		DELETE FROM tbldescargas WHERE idDescarga=claveDescarga;
	  END IF;
	  IF tipo = 'update' THEN
		UPDATE tbldescargas SET PNG=png, JPG=jpg, fk_Imagen=fkIImagen WHERE idDescarga=claveDescarga;
	  END IF;
	  IF tipo = 'showData' THEN
		SELECT * FROM tbldescargas;
	  END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Imagenes` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Imagenes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Imagenes`(
    IN tipo VARCHAR(7),
    IN claveImagen INT,
    IN nombre VARCHAR(51),
    IN descripcion VARCHAR(51),
    IN fkCategoria int,
    in fkUsuario int )
BEGIN
	  IF tipo = 'insert' THEN
		INSERT INTO tblimagenes(nombre,Descripcion,fk_Categoria,fk_Usuario) values(nombre, descripcion, fkCategoria, fkUsuario);
	  END IF;	
	  IF tipo = 'delete' THEN
		DELETE FROM tblimagenes WHERE idImagen=claveImagen;
	  END IF;
	  IF tipo = 'update' THEN
		UPDATE tblimagenes SET nombre=nombre,Descripcion=descripcion,fk_Categoria=fkCategoria,fk_Usuario=fkUsuario WHERE idImagen=claveImagen;
	  END IF;
	  IF tipo = 'showData' THEN
		SELECT * FROM tblimagenes;
	  END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Roles` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Roles` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`antonio`@`%` PROCEDURE `SP_Roles`(in tipo varchar(11),IN codigo int,in nombre varchar(15))
BEGIN
	if tipo = 'insert' then
		INSERT INTO `dbquickimage`.`tblroles`(`Nombre`)VALUES (nombre);
	end if;
	if tipo = 'update' then
		UPDATE `dbquickimage`.`tblroles` SET  `Nombre` = nombre WHERE `idRol` = codigo;
	end if;
	IF tipo = 'delete' THEN
		delete from tblroles where idRol=codigo;
	END IF;
	IF tipo = 'select' THEN
		select * from tblroles;
	END IF;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_Usuarios` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_Usuarios` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Usuarios`(
    in tipo varchar(8), 
    in IdUsuario int, 
    in nombre varchar(40),
    IN apellidoPaterno VARCHAR(30),
    IN apellidoMaterno VARCHAR(30),
    in correo varchar(100),
    in usuario varchar(20),
    in contraseña varchar(32),
    in ftPerfil varchar(60),
    in fkRol int
    )
BEGIN
	if tipo = 'insert' then
		INSERT INTO `dbquickimage`.`tblusuarios`
		    (`vchNombre`,
		     `vchAppeliidoP`,
		     `vchApellidoM`,
		     `vchCorreo`,
		     `vchUsuario`,
		     `vchContraseña`,
		     `imgPerfil`,
		     `fk_Rol`)
		VALUES (nombre,
			apellidoPaterno,
			apellidoMaterno,
			correo,
			usuario,
			contraseña,
			ftPerfil,
			fkRol);
	end if;
	if tipo = 'update' then
		UPDATE `dbquickimage`.`tblusuarios`
		SET `vchNombre` = nombre,
		    `vchAppeliidoP` = apellidoPaterno,
		    `vchApellidoM` = apellidoMaterno,
		    `vchCorreo` = correo,
		    `vchUsuario` = usuario,
		    `vchContraseña` = contraseña,
		    `imgPerfil` = ftPerfil,
		    `fk_Rol` = fkRol
		WHERE `idUsuario` = IdUsuario;
	end if;
	if tipo = 'delete' then
		DELETE
		FROM `dbquickimage`.`tblusuarios`
		WHERE `idUsuario` = IdUsuario;
	end if;
	IF tipo = 'showData' THEN
		SELECT 
		  tblusuarios.idUsuario AS 'ID',
		  CONCAT(tblusuarios.vchNombre,' ',tblusuarios.vchAppeliidoP ,' ',tblusuarios.vchApellidoM ) AS 'NOMBRE',
		  tblusuarios.vchCorreo AS 'CORREO',
		  tblusuarios.vchUsuario AS 'USUARIO',
		  tblusuarios.vchContraseña AS 'CONTRASEÑA',
		  tblusuarios.imgPerfil AS 'fotoPerfil',
		  tblroles.Nombre AS 'ROL'
		FROM tblusuarios, tblroles
		WHERE idRol = fk_Rol;
	END IF;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
