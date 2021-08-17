-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-10-2018 a las 17:30:31
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facilweb`
--
DROP DATABASE IF EXISTS `facilweb`;
CREATE DATABASE IF NOT EXISTS `facilweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `facilweb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `nombre_empresa` varchar(200) NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  `creada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`idempresa`, `nombre`, `nombre_empresa`, `observaciones`, `creada`, `actualizada`) VALUES
(1, 'inventario_facturacion', 'EMPRESA PREDETERMINADA', 'EMPRESA PREDETERMINADA', '2018-10-03 02:29:07', '2018-10-03 02:42:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idempresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  

CREATE TABLE `terminos` (
  `idterminos` int(11) NOT NULL,
  `terminos_licencia` text COMMENT 'los terminos actuales de licencia',
  `serial_licencia` text COMMENT 'el serial de licencia del cliente',
  `fecha_emision` date DEFAULT NULL COMMENT 'la fecha en que se emitió el serial de licencia del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `terminos`
  ADD PRIMARY KEY (`idterminos`);

ALTER TABLE `terminos`
  MODIFY `idterminos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
INSERT INTO `terminos` (`idterminos`, `terminos_licencia`, `serial_licencia`, `fecha_emision`) VALUES
(1, 'Términos y condiciones de uso de Facilweb (Sistema de facturación e Inventarios)\r\n\r\nQue al instalar el software el cliente acepta los presentes términos y condiciones, y todos los que se deriven del mismo conforme a la ley; y declara haberlos leído y entendido en su totalidad.\r\n\r\nQue el uso del software Facilweb es de manera voluntaria y espontanea\r\n\r\nQue la propiedad intelectual de la herramienta informática Facilweb es de Soluciones Navarro y Edgar A. Solano E., que al instalar la herramienta de software Facilweb, solo adquiere el derecho de uso de la misma conforme a la ley y los presentes términos.\r\n\r\nQue el usuario final es el único responsable de la utilización debida o indebida del software y será responsable ante la ley del uso final que este le de.\r\n\r\nQue Soluciones Navarro, se reserva el derecho de pedir la desinstalación del software Facilweb y su uso, si se detecta que están siendo vulnerados los derechos de propiedad intelectual y buen nombre, tanto de la herramienta como de la empresa dueña de los mismos.\r\n\r\nQue Soluciones Navarro, podrá iniciar los procesos judiciales que la ley le permita, y podrá solicitar las indemnizaciones a que haya lugar.\r\n\r\nQue Soluciones Navarro, no tendrá ninguna responsabilidad por perdidas y daños (ni sobre la información, ni económicas) que el usuario pueda tener al usar la herramienta Informática Facilweb, entendiéndose que Soluciones Navarro, no puede controlar los equipos y las formas como se maneje la herramienta.\r\n\r\nQue la presente herramienta está desarrollada en PHP y la base de datos en Mysql, que son software de Libre uso y cuyas marcas son de sus respectivos dueños, y Soluciones Navarro no puede responder por fallas, bugs y demás que presenten estos en el transcurso del tiempo.\r\n\r\nQue cuando el usuario acepta los presentes términos, se extiende a la aceptación de los términos de uso de PHP y Mysql, los cuales se encuentra en sus respectivas plataformas y urls a disposición del público. \r\nPara conocer más de los términos y licencia GNU GLP de Mysql puede acceder a https://es.wikibooks.org/wiki/MySQL/Introduccón/Licencias_de_MySQL.\r\nPara conocer sobre la licencia de PHP se puede consultar en: http://php.net/license/3_01.txt y en https://es.wikipedia.org/wiki/Licencia_PHP\r\n\r\nQue los íconos utilizados dentro de la herramienta Facilweb se obtuvieron de https://iconos8.es/icon/new-icons/all y de https://icon-icons.com/ de quienes son todos los créditos sobre los mismos.\r\n\r\nQue el usuario puede utilizar la herramienta sin obligarse a tener un contrato con Soluciones Navarro.\r\nQue la instalación de la herramienta sin contrato de soporte, no obliga a Soluciones Navarro a hacer ajustes al software ni a entregar actualizaciones del mismo.\r\n\r\nQue todo soporte técnico y de asesoría sobre la instalación y uso de la herramienta tendrán un costo, para lo cual el usuario deberá suscribir un contrato con Soluciones Navarro. Que al adquirir los servicios descritos, el usuario tendrá derecho a la actualización gratuita de la herramienta (nuevas versiones) por el tiempo indicado en el contrato, a solicitar corrección de fallas o Bugs (dichas correcciones se harán en tiempos prudenciales).\r\n		\r\nQue ningún usuario está autorizado para comercializar (salvo que se exprese lo contrario por escrito), hacer explotación comercial del software, ingeniería inversa, cobros por soporte y otros que apliquen con forme a la legislación nacional e internacional sobre propiedad intelectual y derechos de autor.', NULL, NULL);

ALTER TABLE `empresas` ADD `copiada_como` VARCHAR(200) NULL DEFAULT NULL COMMENT 'base de datos de donde hereda la informacion' AFTER `actualizada`, ADD `sinmovimiento` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'si se trae o no los movimientos' AFTER `copiada_como`;

ALTER TABLE `empresas` ADD `tipo_negocio` SET('GENERAL','FERRETERIA','ELECTRICO','RESTAURANTE','ZAPATERIA','BOUTIQUE','LAVAUTOS','DROGUERIA') NOT NULL DEFAULT 'GENERAL' COMMENT 'tipo de opciones para activar caracteristicas especiales del software segun el negocio' AFTER `sinmovimiento`;
ALTER TABLE `empresas` ADD `predeterminada` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `tipo_negocio`;

ALTER TABLE `empresas` ADD `password` VARCHAR(30) NULL DEFAULT NULL AFTER `predeterminada`;




CREATE TABLE `facilweb`.`generales` ( `id_general` INT NOT NULL AUTO_INCREMENT , `modo` SET('NUBE','ESCRITORIO') NOT NULL DEFAULT 'NUBE' , PRIMARY KEY (`id_general`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `generales` CHANGE `modo` `modo` SET('NUBE','ESCRITORIO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ESCRITORIO';
INSERT INTO `generales` (`id_general`, `modo`) VALUES (1, 'ESCRITORIO');

ALTER TABLE `empresas` ADD `nit` VARCHAR(14) NULL DEFAULT NULL AFTER `password`;

ALTER TABLE `empresas` ADD `correo` VARCHAR(200) NULL DEFAULT NULL AFTER `nit`;

ALTER TABLE `empresas` ADD `comentario` VARCHAR(500) NULL DEFAULT NULL AFTER `correo`;

ALTER TABLE `empresas` ADD `celular` VARCHAR(20) NULL DEFAULT NULL AFTER `comentario`;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
