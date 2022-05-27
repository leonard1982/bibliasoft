-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3311
-- Tiempo de generación: 11-09-2021 a las 21:58:02
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciones`
--

CREATE TABLE `actualizaciones` (
  `id_actualizacion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL COMMENT 'fecha de la actualizacion',
  `tipo` set('VERSION','PARCHE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PARCHE',
  `consecutivo` int(11) NOT NULL DEFAULT '0' COMMENT 'cada actualizacion y parche tiene un consecutivo del 1 al ##### y todo se aplica de manera sincrona',
  `enlace_zip` text COLLATE utf8_unicode_ci COMMENT 'el enlace donde esta el zip de la actualizacion si aplica',
  `enlace_zip_reversa` text COLLATE utf8_unicode_ci COMMENT 'tiene la ruta donde se guardó la copia de seguridad de aplicaciones cuando se actualizó',
  `enlace_sql` text COLLATE utf8_unicode_ci COMMENT 'el enlace donde esta el archivo .sql si aplica',
  `enlace_sql_reversa` text COLLATE utf8_unicode_ci COMMENT 'el archivo sql para reversar los cambios en la base de datos si aplica',
  `aplicaciones` text COLLATE utf8_unicode_ci COMMENT 'lista de aplicaciones que traiga el zip que se van a reemplazar separadas por comas',
  `usuario_aplica` int(11) NOT NULL DEFAULT '0' COMMENT 'el usuario de facilweb que aplica las actualizaciones',
  `aplicada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `reversada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `notas` text COLLATE utf8_unicode_ci COMMENT 'notas de funciones que mejora o corrige',
  `prioridad` set('ALTA','MEDIA','BAJA','OPCIONAL') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'MEDIA',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `cod_actualizacion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activa` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'si esta activa la puede ver el cliente',
  `archivo_zip` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `archivo_zip_reversa` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `archivo_sql` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `archivo_sql_reversa` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_menu`
--

CREATE TABLE `aplicaciones_menu` (
  `idaplicacion` int(11) NOT NULL,
  `item_menu` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id del item del menu donde se aloja la aplicacion',
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre de la aplicacion como aparece en scriptcase',
  `descripcion` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT 'la descripcion de la aplicacion para mostrar al usuario',
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre de la imagen que se usa en el menu',
  `modulo` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'TODOS' COMMENT 'el nombre del modulo donde se ejecuta',
  `verificacion` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'este campo se usa de manera temporal en el form de asignacion de permisos ',
  `usuario_tmp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_permisos`
--

CREATE TABLE `aplicaciones_permisos` (
  `idpermisos` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'usuario al que se le aplican los permisos',
  `item_menu` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id del item del menu donde se aloja la aplicacion',
  `aplicacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre de la aplicacion como esta en scriptcase a la que se le va dar permisos al usuario',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora de creacion del registro',
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'ultima fecha y hora de edicion del registro',
  `usuario_crea` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'usuario que crea el registro',
  `usuario_edita` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'usuario que edita el registro',
  `crear` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si el usuario puede crear un registro en la aplicacion a la cual se le da permisos',
  `editar` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si el usuario puede editar un registro de la aplicacion a la cual se le da permisos',
  `eliminar` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si el usuario puede eliminar un registro de la aplicacion a la cual se le da permisos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_permisos_usuario`
--

CREATE TABLE `aplicaciones_permisos_usuario` (
  `id_apu` int(11) NOT NULL,
  `usuario` int(11) DEFAULT '0',
  `item_menu` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `id_asiento` int(11) NOT NULL,
  `tipo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuenta` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipocd` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` decimal(15,0) NOT NULL DEFAULT '0',
  `observaciones` text COLLATE utf8_unicode_ci,
  `iddoc` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `idcaja_vta` int(2) NOT NULL,
  `codigo_banco` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código para banco',
  `descripcion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre o descripción de la caja o banco',
  `comportamiento` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'campo para saber si es caja o no',
  `cajero` int(11) DEFAULT NULL COMMENT 'cajero que está utilizando la caja',
  `fech_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora de inicio o de salida',
  `entrada` decimal(12,2) NOT NULL DEFAULT '0.00',
  `salida` decimal(12,2) NOT NULL DEFAULT '0.00',
  `estado` set('ABIERTA','CERRADA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CERRADA',
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'para el saldo entre entradas y salidas',
  `puc` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta contable del puc',
  `numero_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el numero de la cuenta si es una cuenta de banco'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `idbarrio` int(11) NOT NULL,
  `codigo` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_zona` varchar(6) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT 'código de la zona al que pertenece el barrio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `idbodega` int(2) NOT NULL,
  `bodega` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `idcaja` bigint(12) NOT NULL,
  `fecha` date DEFAULT NULL,
  `jornada` set('AM','PM','TODO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `detalle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '''BASE'',''R. CAJA'',''FAC. CONTADO'',''PAGO FAC'',''OTROS PAGOS'',''CUADRE'',''PED. CONTADO''',
  `nota` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'anotación del detalle del movimiento',
  `cantidad` decimal(15,2) DEFAULT '0.00',
  `documento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'se coloca el número del documento que se cobra o paga',
  `cierredia` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `totaldia` decimal(12,2) DEFAULT NULL,
  `arqueo` decimal(12,2) DEFAULT NULL,
  `saldo` decimal(12,2) DEFAULT NULL,
  `resolucion` int(2) DEFAULT NULL,
  `idrc` bigint(20) DEFAULT NULL COMMENT 'id recibo de caja',
  `idrp` bigint(20) DEFAULT NULL COMMENT 'id del comprobante de egreso',
  `idpedido` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL COMMENT 'hora de apertura o cierre modificable por el usuario',
  `idapertura` int(11) DEFAULT NULL COMMENT 'idcaja del registro de apertura de caja',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora inmodificable para log de creacion de registro',
  `banco` int(2) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'id del ususario de la caja o banco',
  `tipodoc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tipo de documento que esta enviando la informacion o esta insertando el registro en caja',
  `doc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo/numero del documento que inserta el registro en caja',
  `id_tercero` int(11) NOT NULL DEFAULT '0' COMMENT 'el tercero que que pagó al que se le pagó'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_flujos`
--

CREATE TABLE `caja_flujos` (
  `idcaja_flujo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si es base de caja, cierre de caja, compra contado,venta contado, recibo de caja, comprobante de egreso, pedido restaurante',
  `documento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo y numero del documento correspondiente',
  `valor` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'el valor pagado o recibido',
  `banco` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el banco que afecta',
  `tercero` varchar(140) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tercero de la transaccion',
  `usuario` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre del tercero del usuario del sistema',
  `ie` char(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si fue una entrada o salida',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_ventas`
--

CREATE TABLE `caja_ventas` (
  `idcaja_ventas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla requerida por ahora para la actualizacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `recurrence` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `period` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `id_api` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_event_google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recur_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reminder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `recurrence` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `period` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `id_api` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_event_google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recur_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reminder` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id_caso` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL COMMENT 'fecha y hora de inicio del caso',
  `numero` bigint(20) NOT NULL DEFAULT '0' COMMENT 'consecutivo del caso o ticket',
  `codigo_cliente` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del contrato',
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción del estado',
  `prioridad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descricpión de la prioridad se trae de la tabla casos prioridad',
  `tipo_caso` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción del tipo de caso',
  `medio` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción Medio por el cual el usuario solicita la apertura del caso',
  `observaciones` text COLLATE utf8_unicode_ci,
  `asignado_tercero` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cédula del técnico',
  `fecha_asignacion` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL COMMENT 'fecha y hora del ccierre del caso',
  `valor` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor a cobrar al cliente cuando se requiera',
  `cedula_tercero` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cédula del terccero titular del contrato',
  `notificado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `hora` time DEFAULT NULL,
  `hora_asignacion` time DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  `factura` bigint(20) DEFAULT NULL COMMENT 'id de la factura con la que se cobró el servicio '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_estado`
--

CREATE TABLE `casos_estado` (
  `id_estado` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_medio`
--

CREATE TABLE `casos_medio` (
  `id_medio` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_notificaciones`
--

CREATE TABLE `casos_notificaciones` (
  `id_casos_notificacion` int(11) NOT NULL,
  `caso` int(11) NOT NULL DEFAULT '0',
  `fecha_y_hora` datetime DEFAULT NULL,
  `medio` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_novedades`
--

CREATE TABLE `casos_novedades` (
  `id_novedades` int(11) NOT NULL,
  `id_caso` int(11) NOT NULL DEFAULT '0',
  `id_producto` int(10) NOT NULL DEFAULT '0',
  `fecha` datetime DEFAULT NULL COMMENT 'fecha y hora en que se hace la novedad',
  `descripcion` text COLLATE utf8_unicode_ci,
  `cantidad` decimal(12,2) NOT NULL DEFAULT '0.00',
  `valor` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor a cobrar del ítem',
  `valor_imp` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'valor del iva',
  `tarifa_imp` int(11) NOT NULL DEFAULT '0',
  `codigo_imp` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01' COMMENT '01 IVA, 02 IC',
  `desc_imp` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IVA' COMMENT 'descripción del impuesto',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción del producto',
  `cod_producto` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_prioridad`
--

CREATE TABLE `casos_prioridad` (
  `id_prioridad` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos_tipo`
--

CREATE TABLE `casos_tipo` (
  `id_tipo` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciiu_tercero`
--

CREATE TABLE `ciiu_tercero` (
  `id_ciiu_ter` int(11) NOT NULL,
  `id_tercero` bigint(10) DEFAULT '0',
  `codigo_ciiu` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código actividad',
  `descripcion_ciiu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción de la actividad ciiu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_clientes`
--

CREATE TABLE `clasificacion_clientes` (
  `idclasificacion_cliente` int(11) NOT NULL,
  `codigo` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_ciiu`
--

CREATE TABLE `codigos_ciiu` (
  `id_ciiu` int(11) NOT NULL,
  `codigo_ciiu` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción de la Actividad económica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de códigos CIUU 2019';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_postal`
--

CREATE TABLE `codigo_postal` (
  `id_cod_postal` int(11) NOT NULL,
  `idmuni` int(11) NOT NULL DEFAULT '0' COMMENT 'Id del municipio al que pertenece el código',
  `codigo_postal` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código postal 6 dígitos',
  `limite_norte` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limite_sur` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limite_este` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limite_oeste` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barrios_contenidos` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'barrios que cubre el código'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='código postal de Colombia 2019';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `idcolores` int(3) NOT NULL,
  `codigo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paleta` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colorxproducto`
--

CREATE TABLE `colorxproducto` (
  `idcolorproducto` int(11) NOT NULL,
  `idpr` int(10) NOT NULL DEFAULT '0' COMMENT 'id producto',
  `idcol` int(3) DEFAULT '0' COMMENT 'id del color'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `idcomprobante` int(11) NOT NULL,
  `tipo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tipo de comprobante si es FV=factura de venta, FC=factura de compra, RC= recibo de caja, CE= comprobante de egreso, CC= comprobante de contabilidad',
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo del comprobante',
  `numero` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el numero del comprobante',
  `fecha` date DEFAULT NULL COMMENT 'la fecha del comprobante',
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `total_debito` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'el total debitado del comprobante',
  `total_credito` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'el total credito del comprobante',
  `asentada` int(11) NOT NULL DEFAULT '0' COMMENT '1 asentada , 0 no asentada',
  `periodo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el perido en que se hace el comprobante',
  `sucursal` int(11) NOT NULL DEFAULT '0' COMMENT 'la sucursal para un posible futuro',
  `importado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fué importado desde un archivo o bd',
  `usuario` int(11) NOT NULL DEFAULT '0' COMMENT 'el usuario que crea el comprobante',
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes_detalle`
--

CREATE TABLE `comprobantes_detalle` (
  `iddetalle_comprobante` int(11) NOT NULL,
  `comprobante` int(11) NOT NULL DEFAULT '0',
  `plan_cuenta` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tipo` set('debito','credito') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tercero` int(11) NOT NULL DEFAULT '0',
  `observacion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si es FV,FC,CE,RC,CC',
  `numero_documento` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trifa` int(2) NOT NULL DEFAULT '0',
  `valor_iva` decimal(12,2) NOT NULL DEFAULT '0.00',
  `base` decimal(12,2) NOT NULL DEFAULT '0.00',
  `centro_costo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos_documentos`
--

CREATE TABLE `conceptos_documentos` (
  `id_concepto` int(11) NOT NULL,
  `concepto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NP` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `contra_partida` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo del documento que hace la contra partida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `idconfiguraciones` int(11) NOT NULL,
  `lineasporfactura` int(2) DEFAULT '38',
  `consolidararticulos` set('S','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `serial` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `ultima_edicion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` set('N','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `espaciado` float NOT NULL DEFAULT '3.5',
  `nombre_pc` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_impre` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruta_bd_tns` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Guarta la ruta de la BD de tns si existe',
  `ip` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Dirección IP',
  `refresh_grid_doc` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Para asignar tiempo en segundos para refrescar la grid documentos (para restaurante)',
  `modificainvpedido` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `caja_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para llamar a caja desde un pedido o factura del movil',
  `integrar_tns` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si el producto va a manejar código contable de TNS',
  `essociedad` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si empresa es sociedad debe efectuar autoretención antiguo CREE',
  `grancontr` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si es gran contribuyente debe hacer auto retención en la fuente',
  `apertura_caja` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Maneja apertura y cierre de caja',
  `control_diasmora` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si se va a controlar cartera con días de mora',
  `control_costo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si va a controlar ventas con el cmpo de costo',
  `activar_console_log` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para activar el console log de javascript en la consola del navegador',
  `pago_automatico` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'pregunta si se hará comprobante de egreso automáticamente \nen compras de contado',
  `tipodoc_pordefecto_pos` set('FV','RS') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'tipo de documento por defecto en pos FV=FACTURA DE VENTA, RS=REMISION DE SALIDA',
  `nube_pedidos` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si se activa esta opcion podrá subir terceros, productos, pedido y las tablas relacionadas',
  `nube_inventario` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'activa la opcion de subir el inventario a la nube',
  `nube_cartera` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para subir la cartera a la nube',
  `nube_tesoreria` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'subir la tesoreria a la nube para que el gerencial consulte',
  `nube_agenda` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para subir la agenda a la nube',
  `nube_compras` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'compras a la nube',
  `nube_codigo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo para enlazarse a la nube',
  `token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'token unico por empresa',
  `password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'password que valida el acceso a la nube',
  `codproducto_en_facventa` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'mostrar el codigo del producto en lugar del codigo de barras en el formato de la factura de venta',
  `habilitar_comprobantes` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'habilita la generacion de comprobantes de contabilidad automáticos desde facturacion, compras y manuales',
  `noborrar_tmp_enpos` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `desactivar_control_sesion` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `dia_limite_pago` int(11) NOT NULL DEFAULT '5',
  `licencia_activa` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `fecha_activacion` datetime DEFAULT NULL,
  `cod_cliente` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'es el Nit del cliente sin dígito de verificación o el código establecido por facilweb en la nube',
  `valor_propina_sugerida` int(11) NOT NULL DEFAULT '0',
  `validar_correo_enlinea` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'Valida en línea el correo de factura electrónica',
  `ver_xml_fe` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'activa una columna en la lista de ventas donde se puede descargar el xml de envío',
  `columna_imprimir_ticket` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'Para ver la columna de imprimir el ticket pos',
  `columna_imprimir_a4` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Para ver la columna donde uno ve la vista preliminar en formato A4',
  `columna_whatsapp` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Para ver la columna de compartir enlace de pdf de factura electrónica de desarrollo propio al whatsapp',
  `columna_npedido` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Para que se pueda activar la columna de número de pedido de donde viene la factura',
  `columna_reg_pdf_propio` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Columna que da la opción de regenerar el PDF del documento electrónico si este ya ha sido enviado. Útil para cuando se ha enviado un documento electrónico y faltó algo por parametrizar en el PDF, por ejemplo el logo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones_print_pos`
--

CREATE TABLE `configuraciones_print_pos` (
  `idconfprintpos` int(11) NOT NULL,
  `texto_tamanio` decimal(3,0) NOT NULL DEFAULT '12' COMMENT 'el tamanio del texto del formato de impresion del pos',
  `texto_fuente` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Courier' COMMENT 'la fuente del texto',
  `logo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'si va a llevar logo si o no',
  `texto_cabecera` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_pie` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porcentajeopx` set('%','PX') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PX' COMMENT 'si el tamanio del texto es en porcentaje o pixeles',
  `archo_ticket` decimal(3,0) NOT NULL DEFAULT '270' COMMENT 'ancho del ticket de impresion',
  `ticket_pjopx` set('%','PX') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PX' COMMENT 'si el ancho es en porcentaje o pixeles',
  `predeterminada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si la configuracion es predeterminada',
  `tipo_vista` set('PRELIMINAR','HTML','PDF') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PRELIMINAR' COMMENT 'el tipo de vista al imprimir',
  `tipo_doc` set('PEDIDO','FACTURA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FACTURA' COMMENT 'para seleccionar donde se va aplicar el formato',
  `impresion_directa` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO',
  `tipo_impresora` set('termica','matricial') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'termica',
  `nombre_impresora` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivos`
--

CREATE TABLE `consecutivos` (
  `id_consecutivo` int(11) NOT NULL,
  `tipodoc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consecutivo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contable_puc`
--

CREATE TABLE `contable_puc` (
  `id_puc` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombres` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `pais` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clasificacion` int(11) NOT NULL DEFAULT '0',
  `inactivo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `ultimo_contacto` datetime DEFAULT NULL,
  `numero_contactos` int(11) NOT NULL DEFAULT '0',
  `asesor` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_clientes`
--

CREATE TABLE `contacto_clientes` (
  `id_contato_cliente` int(11) NOT NULL,
  `tercero` int(11) NOT NULL DEFAULT '0',
  `contacto` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_correos`
--

CREATE TABLE `contacto_correos` (
  `id_contacto_correo` int(11) NOT NULL,
  `correo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_cotizaciones`
--

CREATE TABLE `contacto_cotizaciones` (
  `id_contacto_cotizaciones` int(11) NOT NULL,
  `contacto` int(11) DEFAULT '0',
  `archivo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_telefonos`
--

CREATE TABLE `contacto_telefonos` (
  `id_contato_telefono` int(11) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copias_diarias`
--

CREATE TABLE `copias_diarias` (
  `id_copia_diaria` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_y_hora` datetime DEFAULT NULL,
  `usuario` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ruta` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos_validos`
--

CREATE TABLE `correos_validos` (
  `id` int(11) NOT NULL,
  `idtercero` int(11) NOT NULL DEFAULT '0',
  `correo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `valido` set('SI','NO','NN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NN',
  `json` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_costos`
--

CREATE TABLE `c_costos` (
  `id_centrocostos` int(2) NOT NULL,
  `codigo` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del centro de costos',
  `descripcion` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del centro de costos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosemp`
--

CREATE TABLE `datosemp` (
  `iddatos` int(1) NOT NULL,
  `razonsoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dv` int(1) DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naturaleza` int(1) NOT NULL DEFAULT '1' COMMENT '1 natural y2 jurídica',
  `regimen` int(1) NOT NULL DEFAULT '0' COMMENT '0 simplificado',
  `telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` longblob,
  `nombre_archivo` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tamanio` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detalle_trib` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'códigos de los detalles tributarios',
  `codigos_ciiu` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'códigos de la actividad económica CIIU',
  `responsab_trib` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Códigos de las responsabilidades tributarias',
  `tipo_documento` set('11','12','13','21','22','31','41','42','43') COLLATE utf8_unicode_ci NOT NULL DEFAULT '13' COMMENT 'tipo de identificación',
  `nombre_comercial` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre comercial',
  `nompais` varchar(60) COLLATE utf8_unicode_ci DEFAULT 'COLOMBIA' COMMENT 'País',
  `nom_depto` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Departamento',
  `municipio` int(4) DEFAULT NULL COMMENT 'id del municipio',
  `ciudad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre de la ciudad',
  `codigo_postal` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código postal de 6 dígitos',
  `sucursal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de sucursal',
  `codigo_te` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código tipo de establecimiento',
  `ruta_logo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='datos par configuración de informes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddep` int(3) NOT NULL,
  `departamento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_iso3166` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de departamento según ISO',
  `codigo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código departamento según DANE 2018'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga_pdfs_fe`
--

CREATE TABLE `descarga_pdfs_fe` (
  `id_descarga` int(11) NOT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL DEFAULT '0',
  `periodo` int(11) NOT NULL DEFAULT '0',
  `anio` int(11) NOT NULL DEFAULT '0',
  `zona` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecombos`
--

CREATE TABLE `detallecombos` (
  `iddetallecombo` int(11) NOT NULL COMMENT 'El id autoincremental de la tabla',
  `idcombo` int(11) NOT NULL DEFAULT '0' COMMENT 'El id del producto que es tomado como combo',
  `idproducto` int(11) NOT NULL DEFAULT '0',
  `cantidad` decimal(10,3) NOT NULL DEFAULT '1.000' COMMENT 'La cantidad de la participacion del producto en el combo',
  `precio` decimal(10,0) NOT NULL DEFAULT '0' COMMENT 'El precio al que se va a vender el producto en el combo',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Para controles futuros',
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Para controles futuros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `iddet` bigint(20) NOT NULL,
  `idfaccom` bigint(20) NOT NULL DEFAULT '0',
  `idpro` int(10) DEFAULT NULL,
  `idbod` int(2) DEFAULT NULL,
  `cantidad` decimal(12,2) DEFAULT NULL,
  `valorunit` decimal(12,2) DEFAULT NULL,
  `valorpar` decimal(12,2) DEFAULT NULL,
  `iva` decimal(12,2) DEFAULT NULL,
  `descuento` decimal(8,2) DEFAULT NULL,
  `tasaiva` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `tasadesc` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `vencimiento` date DEFAULT NULL COMMENT 'fecha de vencimiento de un articulo o lote',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lote al que pertenece un articulo',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca campo para guardar la descripción del producto',
  `fecha_fab` date DEFAULT NULL,
  `serial_codbarra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porc_desc` decimal(4,1) NOT NULL DEFAULT '0.0' COMMENT '% de descuento por unidad',
  `unidad_c` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Guarda la unidad que se tiene en el momento de la compra. ej: CUÑETE, GALON, CAJA, etc',
  `num_ndevolucion` bigint(20) NOT NULL DEFAULT '0' COMMENT 'es el número de la nota de devolución'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompraself`
--

CREATE TABLE `detallecompraself` (
  `iddet` bigint(20) NOT NULL,
  `idfaccom` bigint(20) NOT NULL DEFAULT '0',
  `idpro` int(10) DEFAULT NULL,
  `idbod` int(2) DEFAULT NULL,
  `cantidad` decimal(12,2) DEFAULT NULL,
  `valorunit` decimal(12,0) DEFAULT NULL,
  `valorpar` decimal(12,0) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT NULL,
  `tasaiva` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `tasadesc` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) DEFAULT NULL COMMENT 'id del color',
  `tallas` int(2) DEFAULT NULL COMMENT 'id de la talla',
  `sabor` int(2) DEFAULT NULL COMMENT 'Guarda el ID Talla pero para manejar sabor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallekardexcombos`
--

CREATE TABLE `detallekardexcombos` (
  `iddetallekardexcombos` int(11) NOT NULL,
  `tipodocumento` set('PEDIDO','FACTURA','REMISION') COLLATE utf8_unicode_ci DEFAULT NULL,
  `iddocumento` int(11) DEFAULT NULL,
  `idcombo` int(11) NOT NULL DEFAULT '0',
  `idproducto` int(11) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,2) NOT NULL DEFAULT '0.00',
  `precio` decimal(12,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenotamov`
--

CREATE TABLE `detallenotamov` (
  `idnota` bigint(12) NOT NULL,
  `idmovi` bigint(12) NOT NULL DEFAULT '0',
  `producto` int(10) NOT NULL DEFAULT '0',
  `destino` int(2) NOT NULL DEFAULT '2',
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `presentacion` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad de presentación',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca campo para guardar la descripción del producto',
  `fechavenc` date DEFAULT NULL COMMENT 'fecha de vencimiento',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lote',
  `codigobar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de barras o serial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='detalle de mercancía trasladada de producción a área ventas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenota_convertir`
--

CREATE TABLE `detallenota_convertir` (
  `id_detnc` bigint(12) NOT NULL,
  `id_mov` bigint(12) NOT NULL DEFAULT '0',
  `id_prod` int(10) NOT NULL DEFAULT '0' COMMENT 'id del producto',
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `origen` int(2) NOT NULL DEFAULT '0',
  `destino` int(2) NOT NULL DEFAULT '0',
  `cantidad` decimal(10,2) NOT NULL DEFAULT '0.00',
  `escala` decimal(10,2) NOT NULL DEFAULT '0.00',
  `costo` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'costo unitario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla para detalle de conversión de productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepagos`
--

CREATE TABLE `detallepagos` (
  `iddetall` int(11) NOT NULL,
  `idfact` bigint(20) DEFAULT NULL COMMENT 'id de la factura de venta',
  `idrc` bigint(20) DEFAULT NULL COMMENT 'id del recibo de caja',
  `idfp` int(11) NOT NULL DEFAULT '0' COMMENT 'id de la forma de pago',
  `monto` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'el monto ingresado en esa forma de pago',
  `banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Banco de donde es el cheque',
  `numcheque` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'número del cheque',
  `fechacob` date DEFAULT NULL COMMENT 'fecha del cheque',
  `id_pago` bigint(20) DEFAULT '0' COMMENT 'id cuando el detalle es de pago de factura de compra',
  `idbanco_caja` int(11) NOT NULL DEFAULT '0' COMMENT 'id del banco donde ban a ir los valores'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `iddet` bigint(20) NOT NULL,
  `idpedid` bigint(20) NOT NULL DEFAULT '0' COMMENT 'id del pedido',
  `numfac` bigint(20) DEFAULT NULL,
  `remision` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,2) DEFAULT NULL,
  `valorunit` decimal(12,0) DEFAULT NULL,
  `valorpar` decimal(12,0) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT NULL,
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `estado_comanda` set('1','2','3','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT 'controla los 3 estados',
  `usuario_comanda` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del usuario',
  `tercero_comanda` bigint(10) DEFAULT NULL COMMENT 'id del tercero',
  `hora_inicio` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Hora y fecha de inicio',
  `hora_final` timestamp NULL DEFAULT NULL COMMENT 'Hora y fecha de fin',
  `observ` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observación sobre el producto, para manejo en restaurante',
  `cerrado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `obs` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo para colocar la descripción ampliada del detalle del ítem de venta ',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca la descripción del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido_self`
--

CREATE TABLE `detallepedido_self` (
  `iddet` bigint(20) NOT NULL,
  `idpedid` bigint(20) NOT NULL COMMENT 'id del pedido',
  `numfac` bigint(20) DEFAULT NULL,
  `remision` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,2) DEFAULT NULL,
  `valorunit` decimal(12,0) DEFAULT NULL,
  `valorpar` decimal(12,0) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT NULL,
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL COMMENT 'id del color',
  `tallas` int(2) NOT NULL COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `estado_comanda` set('1','2','3','') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT 'controla los 3 estados',
  `usuario_comanda` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre del usuario',
  `tercero_comanda` bigint(10) DEFAULT NULL COMMENT 'id del tercero',
  `hora_inicio` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Hora y fecha de inicio',
  `hora_final` timestamp NULL DEFAULT NULL COMMENT 'Hora y fecha de fin',
  `observ` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observación sobre el producto, para manejo en restaurante',
  `cerrado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `obs` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo para colocar la descripción ampliada del detalle del ítem de venta ',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca la descripción del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprod`
--

CREATE TABLE `detalleprod` (
  `iddet` bigint(20) NOT NULL,
  `numproducc` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,2) DEFAULT NULL,
  `valorunit` decimal(12,0) DEFAULT NULL,
  `valorpar` decimal(12,0) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT NULL,
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca campo para guardar la descripción del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `iddet` bigint(20) NOT NULL,
  `numfac` bigint(20) DEFAULT NULL COMMENT 'maneja el id de la factura de venta',
  `remision` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,3) DEFAULT NULL,
  `valorunit` decimal(12,2) DEFAULT NULL,
  `valorpar` decimal(12,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT '0',
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `numdevo` int(11) DEFAULT '0' COMMENT 'Guarda el núnero de devolución',
  `iddeta` bigint(20) DEFAULT '0' COMMENT 'Guarda el IDDET con el que se relaciona el registro de devolución',
  `obs` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo para colocar la descripción ampliada del detalle del ítem de venta',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca campo para guardar la descripción del producto',
  `vencimiento` date DEFAULT NULL COMMENT 'fecha de vencimiento de un articulo o lote',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lote al que pertenece un articulo ',
  `fecha_fab` date DEFAULT NULL,
  `serial_codbarra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_doc` set('FV','NC','ND') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'A que tipo de transacción pertenece el detalle ',
  `tipo_tran` set('DESC','DEV','INC','VENTA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VENTA' COMMENT 'Indica si es una venta, si es descuento, si es devolución, si es incremento',
  `id_nota` bigint(20) DEFAULT '0' COMMENT 'guarda el id de la nota crédito o débito',
  `tbase` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'total base de la linea',
  `tneto` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'el neto sin descuento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventaself`
--

CREATE TABLE `detalleventaself` (
  `iddet` bigint(20) NOT NULL,
  `numfac` bigint(20) DEFAULT NULL COMMENT 'maneja el id de la factura de venta',
  `remision` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,3) DEFAULT NULL,
  `valorunit` decimal(12,2) DEFAULT NULL,
  `valorpar` decimal(12,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT NULL,
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `iddev` int(11) NOT NULL,
  `procesado` int(1) NOT NULL DEFAULT '0',
  `numerodev` int(11) NOT NULL DEFAULT '0' COMMENT 'número de la devolcuión'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_comprobantes`
--

CREATE TABLE `detalle_comprobantes` (
  `iddetalle_comprobante` int(11) NOT NULL,
  `comprobante` int(11) NOT NULL DEFAULT '0',
  `plan_cuenta` int(11) NOT NULL DEFAULT '0',
  `valor` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tipo` set('debito','credito') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tercero` int(11) NOT NULL DEFAULT '0',
  `observacion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si es FV,FC,CE,RC,CC',
  `numero_documento` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trifa` int(2) NOT NULL DEFAULT '0',
  `valor_iva` decimal(12,2) NOT NULL DEFAULT '0.00',
  `base` decimal(12,2) NOT NULL DEFAULT '0.00',
  `centro_costo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tributario`
--

CREATE TABLE `detalle_tributario` (
  `id_detalle_trib` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SE \nCOLOCA POR SI A FUTURO SE MANEJA CÓDIGO',
  `descripcion_dt` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'DESCRIPCIÓN DEL DETALLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_trib_x_tercero`
--

CREATE TABLE `det_trib_x_tercero` (
  `id_dt_ter` int(11) NOT NULL,
  `id_tercero` bigint(10) NOT NULL DEFAULT '0' COMMENT 'Id del tercero, viene de la tabla terceros',
  `cod_det_trib` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del detalle tributario, viene de la tabla detalle_tributario',
  `decripcion_dt` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción del Det Trib, viene de la tabla detalle_tributario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Detalle tributario del tercero';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devcompra`
--

CREATE TABLE `devcompra` (
  `iddevc` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `numfaccom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idinven` int(12) NOT NULL DEFAULT '0',
  `idpro` int(10) NOT NULL DEFAULT '0',
  `cantidad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Registra el evento de devolución en compras';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devventa`
--

CREATE TABLE `devventa` (
  `iddevol` int(11) NOT NULL,
  `numerodev` int(10) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL COMMENT 'fecha de la devolución',
  `numfacven` bigint(20) NOT NULL DEFAULT '0' COMMENT 'ID de la factura',
  `idinven` int(12) NOT NULL DEFAULT '0' COMMENT 'id del inventario',
  `idpro` int(10) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `unimay` set('NO','SI') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fac` decimal(10,2) DEFAULT NULL,
  `vunit` int(11) DEFAULT NULL COMMENT 'Maneja el total',
  `vparc` int(11) NOT NULL DEFAULT '0' COMMENT 'Maneja valor antes de IVA',
  `viva` int(11) NOT NULL DEFAULT '0' COMMENT 'Maneja el IVA',
  `vdesc` int(11) NOT NULL DEFAULT '0' COMMENT 'Maneja el descuento',
  `idbod` int(11) DEFAULT NULL,
  `costopro` decimal(12,0) DEFAULT NULL COMMENT 'costo de producto a la hora de la venta',
  `observa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Motivo de la devolución',
  `resolucion` int(2) DEFAULT NULL,
  `fechafactura` date DEFAULT NULL COMMENT 'fecha de la factura',
  `colores` int(3) DEFAULT NULL,
  `tallas` int(2) DEFAULT NULL,
  `sabor` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Devoluciones en ventas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `iddireccion` int(11) NOT NULL,
  `idter` bigint(10) NOT NULL DEFAULT '0',
  `iddepar` int(3) NOT NULL DEFAULT '0',
  `idmuni` int(4) NOT NULL DEFAULT '0',
  `direc` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obs` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'observación de la dirección',
  `telefono` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'es el mismo municipio, se coloca el nombre y no el iD',
  `codigo_postal` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'es el código postal 6 dígitos',
  `lenguaje` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lenguaje del destinatario',
  `correo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo_notificafe` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_notificafe` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escalas_productos`
--

CREATE TABLE `escalas_productos` (
  `id_escala` int(11) NOT NULL,
  `id_producto` int(10) NOT NULL DEFAULT '1' COMMENT 'id_del producto',
  `factor` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT 'es el recmaymen de producto',
  `stock_unidad` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'existencia expresado en la unidad',
  `precio_full` decimal(10,0) NOT NULL DEFAULT '0' COMMENT 'precio lista máximo',
  `precio_medio` decimal(10,0) NOT NULL DEFAULT '0' COMMENT 'precio lista intermedia',
  `precio_minimo` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'precio lista mínimo',
  `descripcion_prod` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción o código del producto',
  `representacion_factor` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'representación fraccionaria de la escala o descripción de la unidad utilizada',
  `factor_base` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'factor de la unidad en que se basarán los demás factores',
  `unidad_base` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'WSD' COMMENT 'Unidad de la medida base, ejemplo Cuñete, Galón, etc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de escala de productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `idetiqueta` int(11) NOT NULL,
  `idfamilia` int(11) NOT NULL DEFAULT '0',
  `codigo` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size_letra_descripcion` int(11) NOT NULL DEFAULT '12',
  `tipo_letra` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Arial',
  `columnas` int(11) NOT NULL DEFAULT '1',
  `tipo_codigo` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'TIPE_CODE_39',
  `tipo_imagen` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PNG',
  `altura` int(11) NOT NULL DEFAULT '40',
  `anchura` int(11) NOT NULL DEFAULT '80',
  `precio` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ver_codigo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI',
  `ver_descripcion` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI',
  `titulo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personalizado1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personalizado2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personalizado3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `espaciado` decimal(12,2) NOT NULL DEFAULT '0.00',
  `ancho_descripcion` int(11) NOT NULL DEFAULT '100',
  `size_letra_codigo` int(11) NOT NULL DEFAULT '10',
  `size_letra_precio` int(11) NOT NULL DEFAULT '12',
  `size_letra_perso1` int(11) NOT NULL DEFAULT '10',
  `size_letra_perso2` int(11) NOT NULL DEFAULT '10',
  `size_letra_perso3` int(11) NOT NULL DEFAULT '12',
  `posicion_codigo` int(11) NOT NULL DEFAULT '1',
  `posicion_descripcion` int(11) NOT NULL DEFAULT '2',
  `posicion_precio` int(11) NOT NULL DEFAULT '3',
  `posicion_perso1` int(11) NOT NULL DEFAULT '4',
  `posicion_perso2` int(11) NOT NULL DEFAULT '5',
  `posicion_perso3` int(11) NOT NULL DEFAULT '6',
  `alineacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'center',
  `nombre_configuracion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `copias` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'titulo del evento',
  `descripcion` text COLLATE utf8_unicode_ci COMMENT 'descripcion del evento',
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'resaltado del evento',
  `textColor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'color del texto del evento',
  `start` datetime DEFAULT NULL COMMENT 'fecha y hora inicio',
  `end` datetime DEFAULT NULL COMMENT 'fecha y hora fin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacom`
--

CREATE TABLE `facturacom` (
  `idfaccom` bigint(20) NOT NULL,
  `numfacom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `formapago` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechacom` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL COMMENT 'fecha de vencimiento en compra',
  `idprov` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `pagada` set('SI','NO','AB') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL,
  `control` int(1) NOT NULL DEFAULT '0' COMMENT 'campo de control para manejo de asentada y tercero',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,0) NOT NULL DEFAULT '0',
  `anulada` set('ANULADA','DEVUELTA') COLLATE utf8_unicode_ci DEFAULT NULL,
  `es_remision` set('SI','NO','ND') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Cuando entrada es po resmisión o Nota de entrega',
  `id_pedidocom` int(11) NOT NULL DEFAULT '0' COMMENT 'cuando se factura un pedido hecho',
  `retencion` decimal(10,3) NOT NULL DEFAULT '0.000' COMMENT 'porcentaje de retención a realizar al proveedor',
  `reteica` decimal(10,3) NOT NULL DEFAULT '0.000' COMMENT '% de retención ica',
  `reteiva` decimal(10,3) NOT NULL DEFAULT '0.000' COMMENT '% de retención del IVA',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'id de usuario que hace la factura',
  `banco` int(11) NOT NULL DEFAULT '1' COMMENT 'Banco sugerido de la factura de compra',
  `num_ndevolucion` bigint(20) NOT NULL DEFAULT '0' COMMENT 'paraa controlar el número de la nota de devolución en compra',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'relaciona las facturas de compra de credito con el documento de tesoreria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaven`
--

CREATE TABLE `facturaven` (
  `idfacven` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL,
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `pagada` set('SI','NO','AB') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `pedido` bigint(20) DEFAULT NULL COMMENT 'el # del pedido',
  `resolucion` int(2) DEFAULT NULL COMMENT 'id de la resolución',
  `dircliente` int(11) NOT NULL DEFAULT '0' COMMENT 'dirección del cliente',
  `imconsumo` decimal(10,3) NOT NULL DEFAULT '0.000',
  `retefuente` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteiva` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteica` decimal(10,3) NOT NULL DEFAULT '0.000',
  `cree` decimal(10,3) NOT NULL DEFAULT '0.000',
  `espos` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si es o no facrura POS',
  `cufe` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlacepdf` text COLLATE utf8_unicode_ci,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avisos` text COLLATE utf8_unicode_ci,
  `dias_decredito` int(3) NOT NULL DEFAULT '0' COMMENT 'se coloca el número de días que va a tener el crédito',
  `banco` int(11) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja donde se hace la factura',
  `tipo` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'Tipo de documento generado en la tabla FV=FACTURA VENTA,NC=NOTA CREDITO,ND=NOTA DEBITO,RS=REMISION DE SALIDA',
  `id_fact` bigint(20) NOT NULL DEFAULT '0' COMMENT 'factura que afecta cuando es una Nota débito o crédito',
  `enviada_a_tns` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si ya fue enviada a tns',
  `fecha_a_tns` timestamp NULL DEFAULT NULL COMMENT 'la fecha de envio de la factura a tns',
  `factura_tns` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para guardar el numero de la factura de tns y no el kardexid porque puede cambiar',
  `creado_en_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fue creado en el movil el registro',
  `disponible_en_movil` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si fue creado en el movil y ''SI'' esta disponible se puede editar desde el formulario del facilweb de escritorio sino solo se puede editar desde el movil',
  `mot_nc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo NC',
  `mot_nd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo ND',
  `creado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al crear el registro',
  `editado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al editar el registro',
  `usuario_crea` int(11) NOT NULL DEFAULT '1' COMMENT 'usuario que crear el registro',
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qr_base64` longtext COLLATE utf8_unicode_ci,
  `fecha_validacion` datetime DEFAULT NULL,
  `id_trans_fe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id de la transacción de la factura electrónica',
  `porcentaje_propina_sugerida` int(11) NOT NULL DEFAULT '0',
  `valor_propina` decimal(15,2) NOT NULL DEFAULT '0.00',
  `aplica_propina` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `proveedor` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Aplica para desarrollo propio\r\n\r\n1. Venta nacional\r\n2. Exportacion\r\n3. Contingencia\r\n4. Venta AIU',
  `note_aiu` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Asunto de factura AIU',
  `porcentaje_admon` int(11) NOT NULL DEFAULT '0' COMMENT 'Porcentaje de administración en aiu propio',
  `porcentaje_imprevisto` int(11) NOT NULL DEFAULT '0' COMMENT 'Porcentaje en imprevistos propio',
  `porcentaje_utilidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Porcentaje utilidad aiu propio',
  `monto_admon` decimal(15,0) NOT NULL DEFAULT '0' COMMENT 'Monto administracion propio',
  `monto_imprevisto` decimal(15,0) NOT NULL DEFAULT '0' COMMENT 'monto imprevisto propio',
  `monto_utilidad` decimal(15,0) NOT NULL DEFAULT '0' COMMENT 'monto utilidad propio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaven_automaticas`
--

CREATE TABLE `facturaven_automaticas` (
  `idfacven` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL,
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `pagada` set('SI','NO','AB') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `pedido` bigint(20) DEFAULT NULL COMMENT 'el # del pedido',
  `resolucion` int(2) DEFAULT NULL COMMENT 'id de la resolución',
  `dircliente` int(11) NOT NULL DEFAULT '0' COMMENT 'dirección del cliente',
  `imconsumo` decimal(10,3) NOT NULL DEFAULT '0.000',
  `retefuente` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteiva` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteica` decimal(10,3) NOT NULL DEFAULT '0.000',
  `cree` decimal(10,3) NOT NULL DEFAULT '0.000',
  `espos` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si es o no facrura POS',
  `cufe` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlacepdf` text COLLATE utf8_unicode_ci,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avisos` text COLLATE utf8_unicode_ci,
  `dias_decredito` int(3) NOT NULL DEFAULT '0' COMMENT 'se coloca el número de días que va a tener el crédito',
  `banco` int(11) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja donde se hace la factura',
  `tipo` set('FV','NC','ND','RS') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'Tipo de documento generado en la tabla FV=FACTURA VENTA,NC=NOTA CREDITO,ND=NOTA DEBITO,RS=REMISION DE SALIDA',
  `id_fact` bigint(20) NOT NULL DEFAULT '0' COMMENT 'factura que afecta cuando es una Nota débito o crédito',
  `enviada_a_tns` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si ya fue enviada a tns',
  `fecha_a_tns` timestamp NULL DEFAULT NULL COMMENT 'la fecha de envio de la factura a tns',
  `factura_tns` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para guardar el numero de la factura de tns y no el kardexid porque puede cambiar',
  `creado_en_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fue creado en el movil el registro',
  `disponible_en_movil` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si fue creado en el movil y ''SI'' esta disponible se puede editar desde el formulario del facilweb de escritorio sino solo se puede editar desde el movil',
  `mot_nc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo NC',
  `mot_nd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo ND',
  `creado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al crear el registro',
  `editado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al editar el registro',
  `usuario_crea` int(11) NOT NULL DEFAULT '1' COMMENT 'usuario que crear el registro',
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qr_base64` longtext COLLATE utf8_unicode_ci,
  `fecha_validacion` datetime DEFAULT NULL,
  `id_trans_fe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id de la transacción de la factura electrónica'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaven_automaticas_detalleventa`
--

CREATE TABLE `facturaven_automaticas_detalleventa` (
  `iddet` bigint(20) NOT NULL,
  `numfac` bigint(20) DEFAULT NULL COMMENT 'maneja el id de la factura de venta',
  `remision` bigint(20) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `unidadmayor` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'guarda el factor de unidad mayor/menor',
  `idbod` int(2) DEFAULT NULL,
  `costop` decimal(12,0) NOT NULL DEFAULT '0',
  `cantidad` decimal(12,3) DEFAULT NULL,
  `valorunit` decimal(12,2) DEFAULT NULL,
  `valorpar` decimal(12,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `descuento` decimal(6,0) DEFAULT '0',
  `adicional` int(11) DEFAULT NULL COMMENT 'guarda la tasa del IVA',
  `adicional1` int(11) DEFAULT NULL COMMENT 'guarda la tasa de dcto',
  `devuelto` int(11) DEFAULT NULL COMMENT ' cantidad en devolución',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `numdevo` int(11) DEFAULT '0' COMMENT 'Guarda el núnero de devolución',
  `iddeta` bigint(20) DEFAULT '0' COMMENT 'Guarda el IDDET con el que se relaciona el registro de devolución',
  `obs` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Campo para colocar la descripción ampliada del detalle del ítem de venta',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Se coloca campo para guardar la descripción del producto',
  `vencimiento` date DEFAULT NULL COMMENT 'fecha de vencimiento de un articulo o lote',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lote al que pertenece un articulo ',
  `fecha_fab` date DEFAULT NULL,
  `serial_codbarra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_doc` set('FV','NC','ND') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'A que tipo de transacción pertenece el detalle ',
  `tipo_tran` set('DESC','DEV','INC','VENTA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VENTA' COMMENT 'Indica si es una venta, si es descuento, si es devolución, si es incremento',
  `id_nota` bigint(20) DEFAULT '0' COMMENT 'guarda el id de la nota crédito o débito',
  `tbase` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'total base de la linea',
  `tneto` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'el neto sin descuento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaven_contratos`
--

CREATE TABLE `facturaven_contratos` (
  `idfacven` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL,
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `pagada` set('SI','NO','AB') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `pedido` bigint(20) DEFAULT NULL COMMENT 'el # del pedido',
  `resolucion` int(2) DEFAULT NULL COMMENT 'id de la resolución',
  `dircliente` int(11) DEFAULT '0' COMMENT 'dirección del cliente',
  `imconsumo` decimal(10,3) NOT NULL DEFAULT '0.000',
  `retefuente` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteiva` decimal(10,3) NOT NULL DEFAULT '0.000',
  `reteica` decimal(10,3) NOT NULL DEFAULT '0.000',
  `cree` decimal(10,3) NOT NULL DEFAULT '0.000',
  `espos` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si es o no facrura POS',
  `cufe` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlacepdf` text COLLATE utf8_unicode_ci,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avisos` text COLLATE utf8_unicode_ci,
  `dias_decredito` int(3) NOT NULL DEFAULT '0' COMMENT 'se coloca el número de días que va a tener el crédito',
  `banco` int(11) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja donde se hace la factura',
  `tipo` set('FV','NC','ND','RS') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FV' COMMENT 'Tipo de documento generado en la tabla FV=FACTURA VENTA,NC=NOTA CREDITO,ND=NOTA DEBITO,RS=REMISION DE SALIDA',
  `id_fact` bigint(20) NOT NULL DEFAULT '0' COMMENT 'factura que afecta cuando es una Nota débito o crédito',
  `enviada_a_tns` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si ya fue enviada a tns',
  `fecha_a_tns` timestamp NULL DEFAULT NULL COMMENT 'la fecha de envio de la factura a tns',
  `factura_tns` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para guardar el numero de la factura de tns y no el kardexid porque puede cambiar',
  `creado_en_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fue creado en el movil el registro',
  `disponible_en_movil` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si fue creado en el movil y ''SI'' esta disponible se puede editar desde el formulario del facilweb de escritorio sino solo se puede editar desde el movil',
  `mot_nc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo NC',
  `mot_nd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de motivo ND',
  `creado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al crear el registro',
  `editado` datetime DEFAULT NULL COMMENT 'fecha y hora automatica al editar el registro',
  `usuario_crea` int(11) NOT NULL DEFAULT '1' COMMENT 'usuario que crear el registro',
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qr_base64` longtext COLLATE utf8_unicode_ci,
  `fecha_validacion` datetime DEFAULT NULL,
  `id_trans_fe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id de la transacción de la factura electrónica',
  `direccion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numcontrato` bigint(20) NOT NULL DEFAULT '0' COMMENT 'el número del contrato',
  `codigo_mun` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '172',
  `codigo_dep` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '54',
  `enviada` set('SI','NO','PT','PR') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'PT es pendiente, PR es en proceso de envío',
  `periodo` int(2) NOT NULL DEFAULT '0',
  `anio` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idres_nota` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la resolución para NC',
  `numero_nota` bigint(20) NOT NULL DEFAULT '0',
  `fecha_nota` datetime DEFAULT NULL,
  `cude_nota` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_nota` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aviso_nota` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fe_tns`
--

CREATE TABLE `fe_tns` (
  `idfe_tns` int(11) NOT NULL,
  `prefijo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo de la factura de tns de facturacion electronica',
  `numero` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el numero de la factura tomado de tns',
  `acuse_comentario` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acuse_estatus` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'indica el estado de realizacion del acuse de recibo. == acuse de recibido no realizado, 1 = acuese de recibido realizado',
  `acuse_respuesta` int(11) NOT NULL DEFAULT '0' COMMENT 'indica el estado de realizacion del acuse de recibo. 0= a la espera, 1 = aceptada, 2 = rechazada, 3 = en verificacion',
  `codigo` int(11) NOT NULL DEFAULT '0' COMMENT 'Indica el estado de la operacion retornado por el servicio - vea los codigos de los errores en el manual',
  `cufe` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Codigo Unico de Factura Electronica correspondiente al document',
  `estatus_documento` int(11) NOT NULL DEFAULT '0' COMMENT 'Corresponde al parametro codigo obtenido en la respuesta cuando para el documento consultado se consumio el metodo ENVIAR',
  `fecha_documento` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'fecha y hora del documento recibida del webservice',
  `mensaje` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'este mensaje esta asociado al codigo, util para identificacion de errores',
  `mensaje_documento` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Corresponde al parametro mensaje obtenido en la respuesta cuando para el docmento consultado se consumio el metodo ENVIAR',
  `resultado` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Resultado del consumo del metodo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formadepago`
--

CREATE TABLE `formadepago` (
  `idforma` int(11) NOT NULL,
  `codigof` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatosimpresion`
--

CREATE TABLE `formatosimpresion` (
  `idformatoimpresion` int(11) NOT NULL,
  `formato` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre de la aplicacion de scriptcase que tiene el formato ejemplo: "blank_pos"',
  `nombre_formato` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipodocumento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tipo de documento que va a usar el formato ejemplo: PEDIDO, FACTURA, REMISION, COTIZACION'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatosimpresion_prefijos`
--

CREATE TABLE `formatosimpresion_prefijos` (
  `idformatoimpresion_prefijo` int(11) NOT NULL,
  `prefijo` int(11) NOT NULL DEFAULT '1' COMMENT 'el id de la tabla resdian',
  `tipodocumento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tipo de documento que puede ser: PEDIDO, COTIZACION, FACTURA, REMISION ',
  `idformato` int(11) NOT NULL DEFAULT '0' COMMENT 'el id de la tabla formatosimpresion donde están la listas de aplicaciones blank o pdf de formatos predeterminados de impresion',
  `encabezado_pos` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si es pos se puede añadir informacion en el encabezado',
  `pie_pos` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'si es pos se puede añadir informacion en el pie de pagina'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_archivos`
--

CREATE TABLE `gestor_archivos` (
  `id_gestor` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `nombre` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `peso` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_unicode_ci,
  `cctercero` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipodoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(10) NOT NULL,
  `nomgrupo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigogru` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo de grupo',
  `imagen` longblob COMMENT 'imágen del grupo',
  `mostrar` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'valida si se muestra en el móvil',
  `comanda` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI UTILIZA COMANDA',
  `ruta_impresora` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ruta de la impresora para la comanda ya que no solo va ha salir en pantalla sino en impresora',
  `presupuesto_venta` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_contables`
--

CREATE TABLE `grupos_contables` (
  `id_grupo_contable` int(11) NOT NULL,
  `codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del grupo contable',
  `descripcion` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del grupo contable',
  `puc_inventario` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_devolucion_compra` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_ingresos` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_devolucion_ventas` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_costo_ventas` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales_archivos`
--

CREATE TABLE `historiales_archivos` (
  `id_historial_archivo` int(11) NOT NULL,
  `archivo` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_historial` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales_crm`
--

CREATE TABLE `historiales_crm` (
  `id_historial_crm` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8_unicode_ci,
  `asesor` int(11) NOT NULL DEFAULT '0',
  `motivo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `atendido` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_contacto_tercero` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDIENTE' COMMENT 'el estado que recibe la tarea: PENDIENTE, PROCESO, FINALIZADO, RECHAZADO, ESPERA '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE `impuestos` (
  `id` int(11) NOT NULL,
  `id_doc` bigint(20) NOT NULL DEFAULT '0' COMMENT 'id de la factura',
  `tipo_doc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'FV o FC',
  `id_terc` int(10) NOT NULL DEFAULT '1' COMMENT 'id del tercero',
  `fecha_doc` date DEFAULT NULL,
  `base_doc` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor antes de iva de la venta o la compra',
  `total_doc` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor de la venta o la compra',
  `por_autor` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT '% auto retención',
  `val_auto` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'valor en pesos auto retención',
  `por_rete` decimal(9,3) NOT NULL DEFAULT '0.000',
  `val_rete` decimal(9,3) NOT NULL DEFAULT '0.000',
  `por_ica` decimal(9,3) NOT NULL DEFAULT '0.000',
  `val_ica` decimal(9,3) NOT NULL DEFAULT '0.000',
  `por_reteiva` decimal(9,3) NOT NULL DEFAULT '0.000',
  `val_reteiva` decimal(9,3) NOT NULL DEFAULT '0.000',
  `periodo` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00' COMMENT 'periodo de la presentación del impuesto',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int(1) NOT NULL DEFAULT '0' COMMENT 'estado 0 es pendiente y 1 culminado',
  `feha_modifi` timestamp NULL DEFAULT NULL COMMENT 'fecha y hora de últim modificación'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idinv` int(12) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` decimal(12,3) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `costo` decimal(12,0) NOT NULL DEFAULT '0',
  `valorparcial` decimal(12,0) NOT NULL DEFAULT '0',
  `idbod` int(10) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT 'tipo de movieiento ''ENT'' o ''SAL''',
  `detalle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idmov` bigint(12) DEFAULT NULL COMMENT 'transferencia entre almacenes obodegas',
  `idfaccom` bigint(20) DEFAULT NULL,
  `nufacvta` bigint(20) DEFAULT NULL COMMENT 'maneja el id de la factura de venta',
  `remision` bigint(20) DEFAULT NULL,
  `nupro` bigint(20) DEFAULT NULL COMMENT 'guarda el numero de traslado a producción',
  `iddetalle` int(12) NOT NULL DEFAULT '0' COMMENT 'id detalle venta',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '# del lote',
  `fechafab` date DEFAULT NULL COMMENT 'fecha fabricación',
  `fechavenc` date DEFAULT NULL COMMENT 'fecha vencimiento',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `numdev` int(11) DEFAULT '0' COMMENT 'Guarda el núnero de devolución',
  `imptns` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Para validar si inventario se importo desde TNS',
  `idped` bigint(20) NOT NULL DEFAULT '0',
  `codigobar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lote2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para manejo del lote del producto ej.: drogueria ',
  `idcombo` int(10) NOT NULL DEFAULT '0' COMMENT 'para el control de los combos y el inventario',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `existencia` decimal(12,3) NOT NULL DEFAULT '0.000' COMMENT 'Se coloca la existencia del producto que queda en bodega despues de la transacción',
  `codigobar_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'El serial o el código de barras único',
  `cant_umen` decimal(14,2) NOT NULL DEFAULT '0.00' COMMENT 'cantidad expresada en unidad menor',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'el factor en el que se expresa existencia y cant_umen',
  `unidad_base` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad en base para el factor',
  `unid_transac` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad en la que se registra campo cantidad',
  `valorpar_combo` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioself`
--

CREATE TABLE `inventarioself` (
  `idinv` int(12) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` decimal(12,3) DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `costo` decimal(12,0) NOT NULL DEFAULT '0',
  `valorparcial` decimal(12,0) NOT NULL DEFAULT '0',
  `idbod` int(10) DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL COMMENT 'tipo de movieiento ''ENT'' o ''SAL''',
  `detalle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idmov` bigint(12) DEFAULT NULL COMMENT 'transferencia entre almacenes obodegas',
  `idfaccom` bigint(20) DEFAULT NULL,
  `nufacvta` bigint(20) DEFAULT NULL COMMENT 'maneja el id de la factura de venta',
  `remision` bigint(20) DEFAULT NULL,
  `nupro` bigint(20) DEFAULT NULL COMMENT 'guarda el numero de traslado a producción',
  `iddetalle` int(12) NOT NULL DEFAULT '0' COMMENT 'id detalle venta',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '# del lote',
  `fechafab` date DEFAULT NULL COMMENT 'fecha fabricación',
  `fechavenc` date DEFAULT NULL COMMENT 'fecha vencimiento',
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `numdev` int(11) DEFAULT '0' COMMENT 'Guarda el núnero de devolución',
  `existencia` decimal(12,3) NOT NULL DEFAULT '0.000' COMMENT 'Guarda la existencia que hay en el momento de hacer el inventario',
  `lote2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Lote del producto',
  `codigobar_2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código de barra o serila único',
  `cant_umen` decimal(14,2) NOT NULL DEFAULT '0.00',
  `factor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `unidad_base` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unid_transac` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valorpar_combo` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE `iva` (
  `idiva` int(2) NOT NULL,
  `trifa` int(2) NOT NULL DEFAULT '0',
  `tipo_impuesto` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IVA',
  `codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Para el codigo del iva al importar de tns',
  `puc` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'la cuenta puc del iva que debe ser igual a la de tns',
  `puc_dv_ventas` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puc_compras` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puc_dv_compras` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguas`
--

CREATE TABLE `lenguas` (
  `id_lenguaje` int(11) NOT NULL,
  `lenguaje` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Leguaje del destinatario de la factura';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `id_linea` int(11) NOT NULL,
  `cod_linea` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de la linea',
  `nombre_linea` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción de la línea',
  `presupuesto_venta` float(15,2) NOT NULL DEFAULT '0.00' COMMENT 'presupuesto de venta por linea',
  `tienda` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idlog` int(11) NOT NULL,
  `fechayhora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora de la accion',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'usuario tercero que lleva acabo una acción en el programa',
  `accion` set('AGREGAR','EDITAR','ELIMINAR','CONSULTAR','OTRO','ABRIR','INTENTAR','SALIR','INGRESAR','CARGAR','COBRAR','PAGAR') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'accion que lleva acabo: AGREGAR, EDITAR, ELMIINAR,CONSULTAR',
  `observaciones` text COLLATE utf8_unicode_ci COMMENT 'la observacion del programador de esa aplicacion donde se inserta el log o bien el sql que se usó'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_movil`
--

CREATE TABLE `log_movil` (
  `idlog_movil` int(11) NOT NULL,
  `funcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'funcion de que ejecuta el movil en el codigo',
  `log` longtext COLLATE utf8_unicode_ci COMMENT 'descripcion del log del log php y javascript',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora de creacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `cod_marca` varchar(4) COLLATE utf8_unicode_ci NOT NULL COMMENT 'código de la marca',
  `nombre_marca` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'descripción o nombre de la marca'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_de_pago`
--

CREATE TABLE `medios_de_pago` (
  `id_mp` int(11) NOT NULL,
  `codigo_mp` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_mp` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de medios de pago a la factura';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda_pago`
--

CREATE TABLE `moneda_pago` (
  `id_moneda` int(11) NOT NULL,
  `codigo_moneda` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de la moneda según país',
  `descripcion_moneda` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'País + Código moneda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='moneda de la transacción';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_notas_credito`
--

CREATE TABLE `motivo_notas_credito` (
  `id_motivo_nc` int(11) NOT NULL,
  `cod_motivo_nc` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motivo_desc` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'motivo de la nota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Motivo de la generación de la Nota Crédito';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_notas_debito`
--

CREATE TABLE `motivo_notas_debito` (
  `id_motivo_nd` int(11) NOT NULL,
  `cod_motivo_nd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motivo_desc` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'motivo de la nota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla Motivo de la generación de la Nota débito';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `idmov` bigint(12) NOT NULL,
  `idtipotran` int(2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idpro` int(10) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `idbodorig` int(2) DEFAULT NULL COMMENT 'bodega origen',
  `idboddes` int(2) DEFAULT NULL COMMENT 'bodega destino',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colores` int(3) NOT NULL DEFAULT '0' COMMENT 'id del color',
  `tallas` int(2) NOT NULL DEFAULT '0' COMMENT 'id de la talla',
  `sabor` int(2) NOT NULL DEFAULT '0' COMMENT 'Guarda el ID Talla pero para manejar sabor',
  `numeronota` int(11) NOT NULL DEFAULT '0',
  `prefijonota` int(2) NOT NULL DEFAULT '1' COMMENT 'id del prefijo',
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lote del articulo',
  `vence` date DEFAULT NULL COMMENT 'fecha en que vence el articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='traslado entre almacen y/o bodegas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipalities`
--

CREATE TABLE `municipalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` char(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codefacturador` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idmun` int(4) NOT NULL,
  `municipio` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iddepar` int(3) NOT NULL DEFAULT '0',
  `codigo_dep` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del departamento',
  `codigo_mu` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código municipio según DANE 2018'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpago` bigint(20) NOT NULL,
  `numpago` bigint(20) NOT NULL DEFAULT '0',
  `client` bigint(10) NOT NULL DEFAULT '1',
  `fecpago` date DEFAULT NULL,
  `montocan` decimal(12,2) NOT NULL DEFAULT '0.00',
  `ret` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Retecnción hecha al documento a pagar',
  `descuent` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor descuento aplicado',
  `docapagar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'número del documento a cancelar',
  `iddocapagar` bigint(20) DEFAULT NULL COMMENT 'para seleccionar el documento a pagar',
  `saldodocumento` decimal(12,2) DEFAULT '0.00' COMMENT 'saldo del documento en el momento que se va a pagar',
  `conc` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'concepto del pago',
  `obs` text COLLATE utf8_unicode_ci COMMENT 'Observación a pago',
  `asent` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'controla si recibo está asentado',
  `porc_ret` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT '% de la retención',
  `val_ica` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor del reteica',
  `porc_ica` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT '% o tasa del rete ica',
  `porc_reteiva` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT '% o tasa de rete iva',
  `val_reteiva` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor reteiva',
  `banco` int(2) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'id del usuario que hace el recibo de pago',
  `id_concepto` int(11) DEFAULT '0' COMMENT 'id del concepto del ingreso o cobro',
  `ncuenta_tercero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'prefijo y numero de la cuenta del proveedor que se paga. ej.: 00/12',
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo y numero de terceros cuentas en la historia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='para hacer pagos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_conceptos`
--

CREATE TABLE `pagos_conceptos` (
  `idpagos_conceptos` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo alfa numerico del concepto para organizar y reportear',
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion del concepto',
  `tipodoc` set('CE','RC') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para saber si es CE comprobante de egreso o RC recibo de caja '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tablas para los conceptos de pagos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_master`
--

CREATE TABLE `pagos_master` (
  `id_pago` int(11) NOT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo del documento',
  `numero` int(11) NOT NULL DEFAULT '0' COMMENT 'el numero del documento',
  `fecha` date DEFAULT NULL COMMENT 'la fecha del documento',
  `concepto` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'la observacion del comprobante',
  `pagado_a` varchar(14) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'el id del proveedor a quien se paga',
  `pagador` varchar(14) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'la persona que paga al proveedor',
  `total` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'el total del comprobante de egreso',
  `descuento` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'los descuentos aplicados',
  `neto` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'el neto pagado',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'el tercero relacionado al usuario logueado',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de creacion del registro',
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'ultima fecha de edicion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='esta tabla reemplaza como master a la tabla pagos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_soporte`
--

CREATE TABLE `pagos_soporte` (
  `idpagos_soporte` int(11) NOT NULL COMMENT 'tabla para los soportes de pagos por ejemplo un comprobante ya firmado',
  `soporte` longblob COMMENT 'el soporte en formato imagen o pdf',
  `nombre_archivo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre del archivo',
  `tamanio_archivo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el tamanio del archivo',
  `idpago` int(11) DEFAULT NULL COMMENT 'el id del pago al que se le relaciona el soporte',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'cuando fue subido el soporte',
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'si la linea de soporte se actualizo',
  `tipodoc` set('CE','RC') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para saber si es CE comprobante de egreso o RC recibo de caja '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `codigop` int(11) NOT NULL,
  `nompais` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL,
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `facturado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `dircliente` int(11) NOT NULL DEFAULT '0',
  `numpedido` bigint(20) NOT NULL DEFAULT '0' COMMENT 'número del pedido',
  `prefijo_ped` int(2) NOT NULL DEFAULT '1',
  `tipo_doc` set('PV','PC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PV' COMMENT 'me dice que clae de pedido es i de compra (PC) o de venta (PV)',
  `usuario` int(11) DEFAULT NULL COMMENT 'usuario que hace el documento',
  `fechadocu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora en que se hace el documento',
  `origen` int(11) DEFAULT NULL COMMENT '1 FC, 2 FV, 3 PC, 4 PV',
  `iddocumento` bigint(20) NOT NULL DEFAULT '0' COMMENT 'el id del documento desde donde se copia',
  `creado_en_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fue creado en el movil el registro',
  `disponible_en_movil` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si fue creado en el movil y ''SI'' esta disponible se puede editar desde el formulario del facilweb de escritorio sino solo se puede editar desde el movil',
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del prefijo para usar con el movil',
  `cod_cliente` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para guardar la cc o nit del cliente para uso movil',
  `descargado_nube` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'se crea el campo descargado_nube en la tabla pedidos y pedidos_self para marcar un pedido en la nube si ya fue descargado',
  `cod_vendedor` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del vendedor al crear el pedido en la nube',
  `porcentaje_propina_sugerida` int(11) NOT NULL DEFAULT '0',
  `valor_propina` decimal(15,2) NOT NULL DEFAULT '0.00',
  `aplica_propina` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_self`
--

CREATE TABLE `pedidos_self` (
  `idpedido` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL,
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `facturado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `dircliente` int(11) NOT NULL DEFAULT '0',
  `numpedido` bigint(20) NOT NULL DEFAULT '0' COMMENT 'número del pedido',
  `prefijo_ped` int(2) NOT NULL DEFAULT '1',
  `tipo_doc` set('PV','PC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PV' COMMENT 'me dice que clae de pedido es i de compra (PC) o de venta (PV)',
  `usuario` int(11) NOT NULL DEFAULT '1' COMMENT 'usuario que hace el documento',
  `fechadocu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha y hora en que se hace el documento',
  `origen` int(11) DEFAULT NULL COMMENT '1 FC, 2 FV, 3 PC, 4 PV',
  `iddocumento` bigint(20) NOT NULL DEFAULT '0' COMMENT 'el id del documento desde donde se copia',
  `creado_en_movil` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si fue creado en el movil el registro',
  `disponible_en_movil` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si fue creado en el movil y ''SI'' esta disponible se puede editar desde el formulario del facilweb de escritorio sino solo se puede editar desde el movil',
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del prefijo para usar con el movil',
  `cod_cliente` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para guardar la cc o nit del cliente para uso movil',
  `descargado_nube` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'se crea el campo descargado_nube en la tabla pedidos y pedidos_self para marcar un pedido en la nube si ya fue descargado',
  `cod_vendedor` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del vendedor al crear el pedido en la nube',
  `porcentaje_propina_sugerida` int(11) NOT NULL DEFAULT '0',
  `valor_propina` decimal(15,2) NOT NULL DEFAULT '0.00',
  `aplica_propina` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT '1',
  `terceros_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `terceros_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `productos_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `productos_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `grupos_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `grupos_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `usuarios_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `usuarios_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `compras_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `compras_frm` char(1) COLLATE utf8_unicode_ci DEFAULT 'N',
  `ventas_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `ventas_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `cartera_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `cartera_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `caja_lista` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `caja_frm` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `mantenimiento` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `empresa` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `inventario` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'para permisos de agregar o quitar inventario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_aplicaciones_menu`
--

CREATE TABLE `permisos_aplicaciones_menu` (
  `id_permisos_aplicacion_menu` int(11) NOT NULL,
  `id_menu` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_menu_movil`
--

CREATE TABLE `permisos_menu_movil` (
  `id_permisos_menu_movil` int(11) NOT NULL,
  `usuario` int(11) NOT NULL DEFAULT '0',
  `id_menu` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plancuentas`
--

CREATE TABLE `plancuentas` (
  `id_plancuenta` int(11) NOT NULL,
  `codigo` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'codigo del plan de cuentas',
  `nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripcion de la cuenta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `id_presupuesto` int(11) NOT NULL,
  `fecha` date DEFAULT NULL COMMENT 'la fecha de la creación del presupuesto',
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción del enfoque del presupuesto',
  `id_usuario` int(11) NOT NULL DEFAULT '0' COMMENT 'el id del tercero que está ligado al usuario del sistema que crea el presupuesto',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `activo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_categorias`
--

CREATE TABLE `presupuesto_categorias` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='por ejemplo: alimentación, entretenimiento, alojamiento, movilidad, entre otros';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_detalles`
--

CREATE TABLE `presupuesto_detalles` (
  `id_presupuesto_detalle` int(11) NOT NULL,
  `id_presupuesto` int(11) NOT NULL DEFAULT '0',
  `id_categoria` int(11) NOT NULL DEFAULT '0' COMMENT 'el id de la categoría del detalle del presupuesto, ejemplo: servicios públicos, alimentación, entretenimiento, arriendo',
  `presupuesto` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'el importe o valor del presupuesto',
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'una descripción, por ejemplo: recibo del internet',
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_movimientos`
--

CREATE TABLE `presupuesto_movimientos` (
  `id_presupuesto_movimiento` int(11) NOT NULL,
  `id_presupuesto` int(11) NOT NULL DEFAULT '0',
  `id_detalle_presupuesto` int(11) NOT NULL DEFAULT '0' COMMENT 'el id del detalle del presupuesto que se creó',
  `fecha` date DEFAULT NULL COMMENT 'la fecha en que se está llevando a cabo el movimiento',
  `gastado` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'el importe o valor gastado del presupuesto en ese movimiento',
  `id_banco` int(11) NOT NULL DEFAULT '0' COMMENT 'el id del banco desde donde estamos gastando al presupuesto',
  `tipo_doc` set('FC','CE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FC' COMMENT 'el tipo de documento que afectó el presupuesto sea un FC compra o un CE comprobante de egreso',
  `id_documento` int(11) NOT NULL DEFAULT '0' COMMENT 'el id del documento que afectó el presupuesto sea un FC compra o un CE comprobante de egreso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `idmat` int(11) NOT NULL,
  `numero` bigint(20) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `observ` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtotal` decimal(12,2) NOT NULL DEFAULT '0.00',
  `asentada` int(1) NOT NULL DEFAULT '0' COMMENT '0 es no asentada y 1 es asentada',
  `id_bodega` int(2) NOT NULL DEFAULT '1' COMMENT 'id del área de producción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Manejo de materia prima a producción';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idprod` int(10) NOT NULL,
  `codigobar` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigoprod` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nompro` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unidmaymen` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'MANEJA UNIDAD MAYOR',
  `unimay` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad mayor (caja, m2, etc)',
  `unimen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'unidad menor (mts, cm, ud, etc)',
  `costomay` bigint(10) DEFAULT '0',
  `costomen` decimal(12,2) DEFAULT '0.00',
  `recmayamen` decimal(10,2) DEFAULT '0.00' COMMENT 'factor multiplicador',
  `preciomen` decimal(10,0) DEFAULT '0' COMMENT 'precio menudeo',
  `preciomen2` decimal(10,0) DEFAULT '0' COMMENT 'precio men intermedio',
  `preciomen3` decimal(10,0) DEFAULT '0' COMMENT 'precio men mínimo',
  `precio2` decimal(10,0) DEFAULT '0' COMMENT 'precio intermedio',
  `preciomay` decimal(10,0) DEFAULT '0' COMMENT 'precio al mayor',
  `preciofull` decimal(10,0) DEFAULT '0' COMMENT 'precio full',
  `stockmay` decimal(10,2) DEFAULT '0.00',
  `stockmen` decimal(10,3) DEFAULT '0.000',
  `idgrup` int(10) DEFAULT NULL,
  `idpro1` bigint(10) DEFAULT NULL,
  `idpro2` bigint(10) DEFAULT NULL,
  `idiva` int(2) DEFAULT NULL,
  `otro` int(11) DEFAULT NULL COMMENT '1 si tiene descuento',
  `otro2` int(11) DEFAULT NULL COMMENT 'Descuento',
  `colores` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI MANEJA COLOR O NO',
  `tallas` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si maneja talla o no ',
  `sabores` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI maneja Sabor, NO, No maneja sabor',
  `imagenprod` longblob COMMENT 'imágen del producto',
  `imconsumo` int(2) NOT NULL DEFAULT '1' COMMENT 'id impuesto al consumo',
  `escombo` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si es un articulo combo que anida otros para conformar un combo',
  `idcombo` int(11) DEFAULT NULL COMMENT 'Si es un articulo perteneciente a un combo lleva el id del articulo padre(combo) en este campo',
  `precio_editable` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si el precio va hacer editable desde ventas',
  `cod_cuenta` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código para enlazar con TNS con codigo contable',
  `fecha_vencimiento` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si producto manejará fecha de vencimiento',
  `fecha_fab` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT 'NO' COMMENT 'si producto manejará fecha de fabricación',
  `lote` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI PRODUCTO MANEJARÁ LOTE',
  `serial_codbarras` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI PRODUCTO MANEJARÁ COD BARRAS O SERIAL',
  `maneja_tcs_lfs` set('CTS','LFS','NA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NA' COMMENT 'ccampo para controlar en formulario si maneja TCS o LFS',
  `control_costo` set('UC','CP','PC','NA') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NA' COMMENT 'Último Costo, Costo Promedio, PorCentaje y No Aplica',
  `por_preciominimo` decimal(4,2) NOT NULL DEFAULT '0.00' COMMENT '% precio mínimo cuando control es por porcentaje',
  `id_marca` int(11) DEFAULT '1' COMMENT 'id de la marca',
  `id_linea` int(11) DEFAULT '1' COMMENT 'id de la linea',
  `ultima_compra` date DEFAULT NULL,
  `n_ultcompra` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ultima_venta` date DEFAULT NULL,
  `n_ultventa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigobar2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigobar3` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nube` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para saber si esta en la nube o no',
  `existencia` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'se debe colocar la existencia representada en la unidad menor',
  `multiple_escala` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para validar si el producto maneja más de una escala',
  `en_base_a` set('UMAY','UMEN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UMAY' COMMENT 'EN BASE A QUE UNIDAD SE DESARROLLAN LOS DEMÁS FACTORES O ESCALAS',
  `activo` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'SI EL PRODUCTO ESTÁ ACTIVO',
  `tipo_producto` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tipo producto',
  `costo_prom` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Costo promedio del producto',
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_galerias`
--

CREATE TABLE `productos_galerias` (
  `idproducto_galeria` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL DEFAULT '0',
  `imagen` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programar_descuentos_generales`
--

CREATE TABLE `programar_descuentos_generales` (
  `id_programar` int(11) NOT NULL,
  `desde` datetime DEFAULT NULL,
  `hasta` datetime DEFAULT NULL,
  `porcentaje` decimal(4,1) NOT NULL DEFAULT '0.0',
  `usuario` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI',
  `creado` datetime DEFAULT NULL,
  `cajas_afectadas` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibocaja`
--

CREATE TABLE `recibocaja` (
  `idrecibo` bigint(20) NOT NULL,
  `nurecibo` bigint(20) NOT NULL DEFAULT '0',
  `nufac` bigint(20) DEFAULT NULL,
  `cliente` bigint(10) NOT NULL DEFAULT '1',
  `fecharecibo` date DEFAULT NULL,
  `monto` decimal(12,2) DEFAULT NULL,
  `son` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'valor en letras (PARA MARCAR LOS RECIBOS DE CAJA TEMPORALES DEL POS)',
  `saldofac` decimal(12,2) DEFAULT NULL,
  `formapago` set('EFECTIVO','CHEQUE','TARJETA DÉBITO','TARJETA CRÉDITO','BONOS','MIXTO','OTROS') COLLATE utf8_unicode_ci DEFAULT NULL,
  `numcheque` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'número cheque',
  `banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'banco del cheque',
  `numtarjeta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'número tarjeta',
  `nombreobanco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'banco o marca tarjeta (visa, master, etc)',
  `obser` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `concepto` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolucion` int(2) DEFAULT NULL,
  `rete` decimal(12,2) DEFAULT '0.00' COMMENT 'retención que me efectúan',
  `descu` decimal(12,2) DEFAULT '0.00' COMMENT 'Descuento que hago a la factura',
  `asentado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'Asentado del RC',
  `porc_rete` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'porcentaje de retención que me van a efectuar',
  `val_ica` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor del ICA que me practican',
  `por_ica` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'porcentaje de tasa ICA que me aplican',
  `por_retiva` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'Tasa aplicada rete IVA',
  `val_retiva` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Valor en $ del ReteIva',
  `banco_id` int(2) NOT NULL DEFAULT '1' COMMENT 'id del banco o caja',
  `usuario` int(11) NOT NULL DEFAULT '0' COMMENT 'id del usuario que hace el recibo de cobro',
  `id_concepto` int(11) DEFAULT NULL COMMENT 'id del concepto del ingreso',
  `ncuenta_tercero` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'prefijo y numero de la cuenta del tercero que se paga. ej.: 00/12',
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el prefijo y numero de terceros cuentas en la historia',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `doc_cobrado` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL DEFAULT '0',
  `id_cliente` int(11) NOT NULL DEFAULT '1',
  `asentado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `base` decimal(15,2) NOT NULL DEFAULT '0.00',
  `iva` decimal(15,2) NOT NULL DEFAULT '0.00',
  `monto_a_pagar` decimal(15,2) NOT NULL DEFAULT '0.00',
  `concepto` int(11) NOT NULL DEFAULT '0',
  `observaciones` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `creado` datetime DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `descuentos` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_detalle`
--

CREATE TABLE `recibos_detalle` (
  `id_recibo_detalle` int(11) NOT NULL,
  `documento` int(11) NOT NULL DEFAULT '0',
  `detalle` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_a_pagar` decimal(15,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(15,2) NOT NULL DEFAULT '0.00',
  `id_recibo` int(11) NOT NULL DEFAULT '0',
  `concepto` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_formapago`
--

CREATE TABLE `recibos_formapago` (
  `id_recibos_formapago` int(11) NOT NULL,
  `id_formapago` int(11) NOT NULL DEFAULT '0',
  `monto` decimal(15,2) NOT NULL DEFAULT '0.00',
  `nombre_banco` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_cheque` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_cheque` date DEFAULT NULL,
  `id_banco_caja` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `id_recibo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_ingcaja_detalle`
--

CREATE TABLE `recibos_ingcaja_detalle` (
  `id_detalle` bigint(30) NOT NULL,
  `id_recibo` bigint(20) NOT NULL DEFAULT '0',
  `factura` bigint(20) NOT NULL DEFAULT '0' COMMENT 'id de la factura a cancelar',
  `valor_factura` decimal(12,2) NOT NULL DEFAULT '0.00',
  `valor_pagado` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor que está pagando',
  `saldo_factura` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'saldo que queda cuando se hace abono'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='detalle del recibo de ingreso a caja';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_ing_caja`
--

CREATE TABLE `recibos_ing_caja` (
  `id_recibo` bigint(20) NOT NULL,
  `numero_rc` bigint(20) NOT NULL DEFAULT '0',
  `fecha_rc` date DEFAULT NULL,
  `contrato` bigint(20) NOT NULL DEFAULT '0' COMMENT 'número del contrato',
  `tercero` varchar(14) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'cédula del titular',
  `monto_rc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `id_banco` int(2) NOT NULL DEFAULT '1',
  `asentado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nueva tabla para recibos de caja';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remisiones`
--

CREATE TABLE `remisiones` (
  `idfacven` bigint(20) NOT NULL,
  `numfacven` bigint(20) DEFAULT NULL COMMENT 'se coloca el id de la factura venta',
  `nremision` bigint(20) DEFAULT NULL,
  `credito` int(1) NOT NULL DEFAULT '2' COMMENT '2 de contado, 1 a crédito',
  `fechaven` date DEFAULT NULL,
  `fechavenc` date DEFAULT NULL,
  `idcli` bigint(10) DEFAULT NULL,
  `subtotal` decimal(12,2) DEFAULT NULL,
  `valoriva` decimal(10,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `pagada` set('SI','NO','AB') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `asentada` int(1) DEFAULT NULL COMMENT '0 es No y 1 es SÍ',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00',
  `adicional` int(11) NOT NULL DEFAULT '0' COMMENT 'descuento',
  `formapago` set('EFECTIVO','TARJETA','CHEQUE','MULTIPLE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `adicional2` int(11) NOT NULL DEFAULT '0' COMMENT '$ pago',
  `adicional3` int(11) NOT NULL DEFAULT '0' COMMENT '$ vueltos',
  `obspago` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendedor` bigint(10) DEFAULT NULL,
  `pedido` bigint(20) DEFAULT NULL COMMENT 'ID del pedido',
  `resolucion` int(2) DEFAULT NULL COMMENT 'id de la resolución, para manejo de prefijo',
  `dirdelcliente` int(11) NOT NULL DEFAULT '0' COMMENT 'dirección del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resdian`
--

CREATE TABLE `resdian` (
  `Idres` int(2) NOT NULL,
  `resolucion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangofac` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primerfactura` bigint(20) DEFAULT '1' COMMENT 'Primer factura en el sistema',
  `nombre_pc` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_impre` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fec_vencimiento` date DEFAULT NULL COMMENT 'Fecha de vencimiento de la resolución',
  `prefijo_fe` set('FE','FC','FP','NF') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NF' COMMENT 'FE FACTURA ELECTRÓNICA, FC FACTURA POR COMPUTADOR, FP FACTURA POS, \nNF NO FACTURA',
  `pref_factura` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si se va a usar en las facturas',
  `pref_ncr` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si se va a utilizar en las notas de crédito',
  `pref_ndb` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Si se va a utilizar en las notas de Débito',
  `ultima_fac` bigint(20) NOT NULL DEFAULT '0',
  `vigencia` int(2) NOT NULL DEFAULT '0' COMMENT 'en meses',
  `tipo` set('AUTORIZACION','HABILITACION') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tipo de resolución',
  `activa` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI',
  `desde` int(11) NOT NULL DEFAULT '1',
  `contador_pruebas` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_encabezado` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texto_pie_pagina` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsabilidades_tributarias`
--

CREATE TABLE `responsabilidades_tributarias` (
  `id_resp_trib` int(11) NOT NULL,
  `codigo` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de la DIAN',
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción de la responsabilidad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tipo de Obligaciones. tabla de resp. fiscales para thefac';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resp_trib_x_tercero`
--

CREATE TABLE `resp_trib_x_tercero` (
  `id_resp_tr_ter` int(11) NOT NULL,
  `id_tercero` bigint(10) NOT NULL DEFAULT '1' COMMENT 'Id del tercero, viene de la tabla terceros',
  `codigo_rt` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de responsabilidad_tributaria',
  `decripcion_rt` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descripción, viene de tabla responsabilidad_tributaria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Responsab. trib del tercero';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruteros`
--

CREATE TABLE `ruteros` (
  `id_rutero` int(11) NOT NULL,
  `dia_semana` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `asesor_zona` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_cliente` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barrio` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `razon_social` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saborxproducto`
--

CREATE TABLE `saborxproducto` (
  `idsaborproducto` int(11) NOT NULL,
  `idpr` int(10) NOT NULL DEFAULT '0' COMMENT 'id producto',
  `idsa` int(2) NOT NULL DEFAULT '0' COMMENT 'id sabor "tabla talla idtallas"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldos`
--

CREATE TABLE `saldos` (
  `id_saldo` bigint(20) NOT NULL,
  `id_prod` int(10) NOT NULL DEFAULT '0',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_bodega` int(2) NOT NULL DEFAULT '1',
  `saldo_ene` decimal(10,3) DEFAULT '0.000',
  `costo_ene` bigint(10) DEFAULT '0',
  `saldo_feb` decimal(10,3) DEFAULT '0.000',
  `costo_feb` bigint(10) DEFAULT '0',
  `saldo_marz` decimal(10,3) DEFAULT '0.000',
  `costo_marz` bigint(10) DEFAULT '0',
  `saldo_abril` decimal(10,3) DEFAULT '0.000',
  `costo_abril` bigint(10) DEFAULT '0',
  `saldo_may` decimal(10,3) DEFAULT '0.000',
  `costo_may` bigint(10) DEFAULT '0',
  `saldo_jun` decimal(10,3) DEFAULT '0.000',
  `costo_jun` bigint(10) DEFAULT '0',
  `saldo_julio` decimal(10,3) DEFAULT '0.000',
  `costo_julio` bigint(10) DEFAULT '0',
  `saldo_agos` decimal(10,3) DEFAULT '0.000',
  `costo_agos` bigint(10) DEFAULT '0',
  `saldo_sep` decimal(10,3) DEFAULT '0.000',
  `costo_sep` bigint(10) DEFAULT '0',
  `saldo_oct` decimal(10,3) DEFAULT '0.000',
  `costo_oct` bigint(10) DEFAULT '0',
  `saldo_nov` decimal(10,3) DEFAULT '0.000',
  `costo_nov` bigint(10) DEFAULT '0',
  `saldo_dic` decimal(10,3) DEFAULT '0.000',
  `costo_dic` bigint(10) DEFAULT '0',
  `ult_actualza` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `anio` year(4) DEFAULT NULL COMMENT 'el anio de los saldos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id_sucursal` int(11) NOT NULL,
  `codigo_suc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacion_suc` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'PRINCIPAL O SECURDARIA',
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'la ip de la sucursal principal si la bd es secundaria',
  `puerto` int(4) NOT NULL DEFAULT '3311' COMMENT 'el puerto de mysql',
  `nombre_empresa` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre de la empresa que tiene la sucursal principal',
  `codigo_suc_principal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de sucursales de la empresa';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `ccnit` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'sin dígito de verificación',
  `url_pagos` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monto_arriendo` decimal(15,2) NOT NULL DEFAULT '0.00',
  `fecha_inicio` date DEFAULT NULL,
  `public_key` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modo_pruebas` int(11) NOT NULL DEFAULT '1',
  `modo_externo` int(11) NOT NULL DEFAULT '1',
  `auto_click` int(11) NOT NULL DEFAULT '0',
  `url_respuesta` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_confirmacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_aceptado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_rechazado` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_pendiente` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_aviso` int(11) NOT NULL DEFAULT '5',
  `dia_corte` int(11) NOT NULL DEFAULT '10',
  `webservice` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'direccion del servidor mysql donde se van a verificar los pagos hechos',
  `fecha_instalacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion_pagos`
--

CREATE TABLE `suscripcion_pagos` (
  `id_suscripcion_pago` int(11) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `periodo_pagado` int(11) NOT NULL DEFAULT '0',
  `valor` decimal(15,0) NOT NULL DEFAULT '0',
  `anio` int(11) NOT NULL DEFAULT '0',
  `inicial` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `idtallas` int(2) NOT NULL,
  `tamaño` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tallasabor` set('T','S') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'T' COMMENT 'T es talla, S es Sabor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallaxproducto`
--

CREATE TABLE `tallaxproducto` (
  `idtallaproducto` int(11) NOT NULL,
  `idpr` int(10) NOT NULL DEFAULT '0' COMMENT 'id producto',
  `idta` int(2) NOT NULL DEFAULT '0' COMMENT 'id talla'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `asesor` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDIENTE' COMMENT 'el estado que recibe la tarea: PENDIENTE, PROCESO, FINALIZADO, RECHAZADO, ESPERA',
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  `realizada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `idtercero` bigint(10) NOT NULL,
  `documento` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel_cel` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `sexo` set('F','M','O') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'O',
  `urlmail` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechault` date DEFAULT NULL COMMENT 'fecha de última compra del cliente',
  `saldo` bigint(20) NOT NULL DEFAULT '0',
  `afiliacion` date DEFAULT NULL,
  `idmuni` int(4) DEFAULT NULL,
  `observaciones` text COLLATE utf8_unicode_ci,
  `credito` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `cupo` bigint(12) NOT NULL DEFAULT '0' COMMENT 'cupo como cliente',
  `listaprecios` int(1) NOT NULL DEFAULT '1' COMMENT 'Precio 1 Full, 2 o 3 Mínimo',
  `loatiende` bigint(10) DEFAULT NULL COMMENT 'id del vendedor',
  `con_actual` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `efec_retencion` set('S','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `regimen` set('SIM','COMUN') COLLATE utf8_unicode_ci DEFAULT '',
  `tipo` set('NAT','JUR') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NAT',
  `cliente` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `empleado` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `proveedor` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `contacto` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefonos_prov` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creditoprov` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dias` int(3) DEFAULT NULL,
  `fechultcomp` date DEFAULT NULL,
  `saldoapagar` bigint(20) DEFAULT NULL,
  `autoretenedor` set('SI','NO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` set('11','12','13','21','22','31','41','42','43') COLLATE utf8_unicode_ci NOT NULL DEFAULT '13',
  `dv` int(1) DEFAULT NULL,
  `nombre1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sucur_cliente` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI TIENE SUCURSALES',
  `representante` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'representante legal',
  `imagenter` longblob COMMENT 'imágen del tercero',
  `es_restaurante` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'SI ES MESA O NO',
  `dias_credito` int(3) DEFAULT NULL COMMENT 'días de crédito al cliente',
  `dias_mora` int(3) DEFAULT NULL COMMENT 'días de mora antes de cobrar intereses',
  `cupo_vendedor` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'cupo asigando al vendedor en ventas a crédito',
  `codigo_ter` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código para enlazar con el campo NIT de TNS',
  `es_cajero` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si el tercero es cajero',
  `autorizado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'Para autorizar venta si tiene cartera en mora',
  `zona_clientes` int(11) NOT NULL DEFAULT '0',
  `clasificacion_clientes` int(11) NOT NULL DEFAULT '0',
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disponible` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'para saber si esta disponible la mesa para restaurante o para cualquier otra aplicacion que se necesite, por defecto es SI y funciona con trigger en facturaven',
  `id_pedido_tmp` int(11) NOT NULL DEFAULT '0' COMMENT 'el id del pedido activo temporal donde este la mesa o tercero (La idea es que al listar las mesas no se hagan subconsultas)',
  `n_pedido_tmp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el numero del pedido con prefjo para mostrarlo en la lista de mesas si lo hay',
  `total_pedido_tmp` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'El total del pedido temporal para no hacer subconsultas',
  `obs_pedido_tmp` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Las observaciones del pedido temporal para no hacer subconsultas',
  `vend_pedido_tmp` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'El nombre del vendedor ya que tambien se muestra en la lista de mesas para no hacer subconsultas',
  `ciudad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'es el mismo municipio, se coloca el nombre y no el iD',
  `codigo_postal` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'es el código postal 6 dígitos',
  `lenguaje` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lenguaje del destinatario',
  `nombre_comercil` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nombre comercial ej: Soluciones Tecnológicas Navarro',
  `notificar` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'Si notifica o envía la factura por correo, whatsapp, etc',
  `puc_auxiliar_deudores` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_retefuente_ventas` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_retefuente_servicios_clie` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_auxiliar_proveedores` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_retefuente_compras` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `puc_retefuente_servicios_prov` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'cuenta auxiliar del plan de cuentas',
  `nube` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'para saber si esta en la nube',
  `latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'PARA COLOCAR EL ESTADO DEL TERCERO',
  `es_tecnico` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `codigo_tercero` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porcentaje_propina_sugerida` int(11) NOT NULL DEFAULT '0',
  `correo_notificafe` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular_notificafe` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contratos`
--

CREATE TABLE `terceros_contratos` (
  `id_ter_cont` int(11) NOT NULL,
  `numero_contrato` bigint(20) NOT NULL DEFAULT '0' COMMENT 'número del contrato y a su vez, código del tercero para el contrato',
  `cliente` varchar(14) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'cédula del tercero',
  `fecha_contrato` date DEFAULT NULL COMMENT 'fecha de firma del contrato',
  `fecha_inicio` date DEFAULT NULL COMMENT 'fecha a partir de cuandpo se inicia el contrato',
  `fecha_corte` date DEFAULT NULL COMMENT 'fecha de cfuando se realice corte de srvicio',
  `creado` datetime DEFAULT NULL COMMENT 'cuando se creó el contrato en el sistema',
  `editado` datetime DEFAULT NULL COMMENT 'cuando se hizo la última modificación',
  `usuario_crea` bigint(10) NOT NULL DEFAULT '0' COMMENT 'id del usuario que creó el contrato',
  `usuario_edita` bigint(10) NOT NULL DEFAULT '0' COMMENT 'id del usuario que editó ultima vez',
  `estado` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Suspendido, desconectado, etc',
  `activo` set('NO','SI') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'si esta activo o inactivo el contrato',
  `zona` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'zona donde se presta el servicio',
  `barrio` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del barrio donde se presta el servicio',
  `direccion` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'dirección donde está el servicio',
  `telefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000' COMMENT 'telefono o celular',
  `motivo` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'motivo novedad del contrarto x ejemplo no pago',
  `fecha_limitepago` date DEFAULT NULL COMMENT 'fecha límite del pago para orden de corte',
  `fecha_ultimopago` date DEFAULT NULL COMMENT 'fecha del último pago o abono hecho por el cliente',
  `valorpagado` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor del último pago',
  `saldoanterior` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'saldo antes del último pago',
  `saldoactual` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'saldo despúes del último pago',
  `mesultimafactura` set('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ENERO' COMMENT 'mes de la última factura',
  `observaciones` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_ultimafactura` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor del último cobro o factura',
  `mensualidad` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'valor de la mensulaidad vigente',
  `precinto` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000' COMMENT 'precinto asignado al usuario',
  `correo` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'y@yo.com' COMMENT 'correo para enviar la factura',
  `fecha_factura` date DEFAULT NULL COMMENT 'fecha de la última factura',
  `estrato` set('1','2','3','4','5','6','C') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `codigo_cli` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '000000000' COMMENT 'Código cliente o del contrato del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contratos_detalle`
--

CREATE TABLE `terceros_contratos_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL DEFAULT '0',
  `id_producto` int(10) NOT NULL DEFAULT '0',
  `valor_mensualidad` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'mensualidad del contrarto a cobrar',
  `cantidad` decimal(12,3) NOT NULL DEFAULT '1.000',
  `valorunit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `valor_imp` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'valor_iva',
  `tarifa_imp` int(11) NOT NULL DEFAULT '0',
  `codigo_imp` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01' COMMENT '01 IVA, 02 IC',
  `desc_imp` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'IVA' COMMENT 'descripci´pn del impuesto',
  `descr` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descr_producto',
  `cod_producto` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'código del producto',
  `rec_terc` varchar(14) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'nit o cédula del tercero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contratos_estado`
--

CREATE TABLE `terceros_contratos_estado` (
  `id_estado` int(2) NOT NULL,
  `codigo_estado` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000' COMMENT 'código del estado',
  `descripcion` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'descripción del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contratos_factura`
--

CREATE TABLE `terceros_contratos_factura` (
  `id` bigint(20) NOT NULL,
  `id_contrato` int(11) NOT NULL DEFAULT '0',
  `factura` bigint(20) NOT NULL DEFAULT '0',
  `fecha_factura` date DEFAULT NULL,
  `valor_facura` decimal(12,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'saldo de la factura',
  `deperiodo` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'Si la factura es del plan de internet o no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla que muestra las facturas de un contrato';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contratos_motivoscorte`
--

CREATE TABLE `terceros_contratos_motivoscorte` (
  `id_motivo` int(2) NOT NULL,
  `codigo_motivo` varchar(4) COLLATE utf8_unicode_ci DEFAULT '00' COMMENT 'código del motivo',
  `descripcion_motivo` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción del motivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='motivos por el cual se hace corte del servicio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_contrato_dispositivo`
--

CREATE TABLE `terceros_contrato_dispositivo` (
  `id` int(11) NOT NULL,
  `contrato` bigint(20) DEFAULT '0' COMMENT 'número del contrato al que está asignado el dispositivo',
  `codigo` varchar(20) COLLATE utf8_unicode_ci DEFAULT '000000' COMMENT 'codigo del dispositivo asignado',
  `observacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'anotación sobre el dispositivo',
  `precinto` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000',
  `color_precinto` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#0000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de dispositivo asignado al contrato';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_cuentas`
--

CREATE TABLE `terceros_cuentas` (
  `idtercero_cuenta` int(11) NOT NULL,
  `prefijo` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '00',
  `numero` bigint(10) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `tercero` int(11) NOT NULL DEFAULT '0',
  `ie` set('INGRESO','EGRESO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero_documento` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(15,2) NOT NULL DEFAULT '0.00',
  `observaciones` longtext COLLATE utf8_unicode_ci,
  `abonos` int(11) NOT NULL DEFAULT '0',
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ultimo_abono` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_uabono` date DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `automatico` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si se generó desde una factura de venta, compra, remision, comprobante de egreso o recibo de caja',
  `cod_cuenta` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo que es el prefijo +''/''+ el numero de cuenta con el cual se agrupan las cuentas con sus pagos',
  `pagada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT 'si la cuenta ya fue pagada totalmente',
  `concepto` int(11) NOT NULL DEFAULT '0',
  `tipo_cuenta_origen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para filtrar el tipo al hacer contra partida',
  `banco` int(11) NOT NULL DEFAULT '0',
  `asentada` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `id_recibo` int(11) NOT NULL DEFAULT '0',
  `id_recibo_detalle` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros_dispositivos`
--

CREATE TABLE `terceros_dispositivos` (
  `id_dispositivo` int(11) NOT NULL,
  `codigo_dispositivo` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT 'código de identificación del dispositivo',
  `nombre` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nombre o descripcion',
  `serial` varchar(40) COLLATE utf8_unicode_ci DEFAULT '000000' COMMENT 'serial o MAC del dispositivo',
  `marca` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'marca del dispositivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoautoretencion`
--

CREATE TABLE `tipoautoretencion` (
  `id_autoret` int(11) NOT NULL,
  `codigo` varchar(8) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `porcntajeauto` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'porcentaje de autoretención',
  `actividad` varchar(120) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `idtipodocumento` int(11) NOT NULL,
  `tipo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ie` set('INGRESO','EGRESO') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoica`
--

CREATE TABLE `tipoica` (
  `id_ica` int(11) NOT NULL,
  `codigo` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `actividad` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porcica` decimal(9,3) NOT NULL DEFAULT '0.000' COMMENT 'porcentaje del ICA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporetefuente`
--

CREATE TABLE `tiporetefuente` (
  `id_tiporetefuente` int(11) NOT NULL,
  `codigo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `porrete` decimal(9,3) NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_establecimientos`
--

CREATE TABLE `tipos_establecimientos` (
  `id_tipo` int(11) NOT NULL,
  `codigo_te` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_te` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tipo de establecimiento donde se realiza la transacción';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransfe`
--

CREATE TABLE `tipotransfe` (
  `idtipo` int(2) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tipo de Inventario (inicial, ajuste, etc)';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_operacion`
--

CREATE TABLE `tipo_operacion` (
  `id_to` int(11) NOT NULL,
  `codigo_to` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código del tipo de operación',
  `descripcion_to` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción de la operación'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla que describe el tipo de transacción facturada';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `codigo_tp` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código de tipo producto',
  `descripcion_tp` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id_um` int(11) NOT NULL,
  `codigo_um` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'código',
  `descripcion_um` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'descripción de la unidad de medida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla para unidades de medidas estandard';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correo` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tercero` int(11) NOT NULL DEFAULT '1' COMMENT 'TERCERO RELACIONADO (VENDEDOR O CAJERO)',
  `resolucion` int(11) NOT NULL DEFAULT '0' COMMENT 'RESOLUCION POR DEFECTO',
  `grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'SI ES ADMIN O ALGUN OTRO GRUPO',
  `activo` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S' COMMENT 'S O N',
  `ultima_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grupocomanda` int(11) DEFAULT NULL,
  `nombre_pc` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_impre` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sesion_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Para validar la sesion de un usuario y no se pueda loguear dos veces',
  `acceso_inventario` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT ' acceso a aplicacion movil de inventario',
  `acceso_gerencial` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT ' acceso a aplicacion movil de gerencial',
  `acceso_restaurante` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT ' acceso a aplicacion movil de restaurante',
  `sesion_id_movil` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'para validar las sesiones moviles',
  `banco_movil` int(11) NOT NULL DEFAULT '1' COMMENT 'el banco o caja donde van a ir los valores si el usuario es movil',
  `ubicacion` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'VENTAS' COMMENT 'área donde está ubicado el PC',
  `n_equipo` varchar(30) COLLATE utf8_unicode_ci DEFAULT 'PC',
  `serial` varchar(30) COLLATE utf8_unicode_ci DEFAULT '0000000000',
  `idbod` int(11) NOT NULL DEFAULT '0' COMMENT 'id de la bodega',
  `ocultar_bod` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SI' COMMENT 'PARA SABER SI OCULTA BODEGA EN FACTURA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_grupos`
--

CREATE TABLE `usuarios_grupos` (
  `idusuarios_grupos` int(11) NOT NULL,
  `descripcion` varchar(60) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vencimiento_lote`
--

CREATE TABLE `vencimiento_lote` (
  `idvenclote` bigint(20) NOT NULL,
  `idproducto` int(10) NOT NULL DEFAULT '0' COMMENT 'id del producto',
  `fecha_vencimiento` date DEFAULT NULL,
  `fecha_fab` date DEFAULT NULL,
  `lote` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serial_codbarra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existencia` decimal(10,3) NOT NULL DEFAULT '0.000',
  `idbodega` int(11) NOT NULL DEFAULT '1' COMMENT 'el id de la bodega'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `version`
--

CREATE TABLE `version` (
  `idversion` int(11) NOT NULL,
  `version` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visitas` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha que se creará automaticamente',
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el usuario que crea la visita',
  `codigo_cliente` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo (cc/nit) del cliente',
  `nombre_cliente` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el nombre del cliente',
  `latitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_empresa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo de la empresa asignado por proveedor de facilweb',
  `concepto` int(11) NOT NULL DEFAULT '0' COMMENT 'el concepto de la visita',
  `observacion` longtext COLLATE utf8_unicode_ci COMMENT 'si hay observacion de la visita',
  `fecha_hora_salida` timestamp NULL DEFAULT NULL COMMENT 'fecha y hora de salida al terminar la salida debe hacerse en el lugar',
  `latitude_salida` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'latitude cuando termina la visita',
  `longitude_salida` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'longitude cuando termina la visita',
  `actualizado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_conceptos`
--

CREATE TABLE `visita_conceptos` (
  `id_visita_concepto` int(11) NOT NULL,
  `codigo` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo para poder ordenar el reporte',
  `descripcion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'la descripcion del concepto',
  `codigo_empresa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'el codigo de la empresa que solo funcionará en la nube'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webservicefe`
--

CREATE TABLE `webservicefe` (
  `idwebservicefe` int(11) NOT NULL,
  `proveedor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor1` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor2` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokenempresa` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokenpassword` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servidor_prueba1` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor_prueba2` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_prueba` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_prueba` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `modo` set('PRUEBAS','PRODUCCION') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PRUEBAS',
  `enviar_dian` int(11) NOT NULL DEFAULT '0' COMMENT '1 sí, 0 no',
  `enviar_cliente` int(11) NOT NULL DEFAULT '0' COMMENT '1 sí, 0 no',
  `servidor3` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor_prueba3` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_api_pdfs` varchar(300) DEFAULT NULL,
  `url_api_sendmail` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webservicefe_proveedores`
--

CREATE TABLE `webservicefe_proveedores` (
  `idwebservicefe_proveedor` int(11) NOT NULL,
  `proveedor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokenempresa` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tokenpassword` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor_prueba1` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor_prueba2` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_prueba` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_prueba` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor3` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servidor_prueba3` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_api_pdfs` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_api_sendmail` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_clientes`
--

CREATE TABLE `zona_clientes` (
  `idzona_cliente` int(11) NOT NULL,
  `codigo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_mun` varchar(3) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT 'código del municipiom l que pertenece la zona',
  `codigo_dep` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '54',
  `resolucion` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_postal`
--

CREATE TABLE `zona_postal` (
  `idzona` int(4) NOT NULL,
  `idmuni` int(4) NOT NULL DEFAULT '0' COMMENT 'id del municipio',
  `zona` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Código de la zona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  ADD PRIMARY KEY (`id_actualizacion`);

--
-- Indices de la tabla `aplicaciones_menu`
--
ALTER TABLE `aplicaciones_menu`
  ADD PRIMARY KEY (`idaplicacion`);

--
-- Indices de la tabla `aplicaciones_permisos`
--
ALTER TABLE `aplicaciones_permisos`
  ADD PRIMARY KEY (`idpermisos`);

--
-- Indices de la tabla `aplicaciones_permisos_usuario`
--
ALTER TABLE `aplicaciones_permisos_usuario`
  ADD PRIMARY KEY (`id_apu`);

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`id_asiento`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`idcaja_vta`),
  ADD KEY `numero_caja` (`codigo_banco`);

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`idbarrio`);

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`idbodega`),
  ADD KEY `idbodega` (`idbodega`,`bodega`),
  ADD KEY `bodega` (`bodega`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`idcaja`),
  ADD KEY `fecha` (`fecha`),
  ADD KEY `detalle` (`detalle`),
  ADD KEY `documento` (`documento`),
  ADD KEY `totaldia` (`totaldia`),
  ADD KEY `saldo` (`saldo`),
  ADD KEY `jornada` (`jornada`),
  ADD KEY `resolucion` (`resolucion`),
  ADD KEY `idrc` (`idrc`);

--
-- Indices de la tabla `caja_flujos`
--
ALTER TABLE `caja_flujos`
  ADD PRIMARY KEY (`idcaja_flujo`);

--
-- Indices de la tabla `caja_ventas`
--
ALTER TABLE `caja_ventas`
  ADD PRIMARY KEY (`idcaja_ventas`);

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id_caso`);

--
-- Indices de la tabla `casos_estado`
--
ALTER TABLE `casos_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `casos_medio`
--
ALTER TABLE `casos_medio`
  ADD PRIMARY KEY (`id_medio`);

--
-- Indices de la tabla `casos_notificaciones`
--
ALTER TABLE `casos_notificaciones`
  ADD PRIMARY KEY (`id_casos_notificacion`);

--
-- Indices de la tabla `casos_novedades`
--
ALTER TABLE `casos_novedades`
  ADD PRIMARY KEY (`id_novedades`);

--
-- Indices de la tabla `casos_prioridad`
--
ALTER TABLE `casos_prioridad`
  ADD PRIMARY KEY (`id_prioridad`);

--
-- Indices de la tabla `casos_tipo`
--
ALTER TABLE `casos_tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `ciiu_tercero`
--
ALTER TABLE `ciiu_tercero`
  ADD PRIMARY KEY (`id_ciiu_ter`);

--
-- Indices de la tabla `clasificacion_clientes`
--
ALTER TABLE `clasificacion_clientes`
  ADD PRIMARY KEY (`idclasificacion_cliente`) USING BTREE;

--
-- Indices de la tabla `codigos_ciiu`
--
ALTER TABLE `codigos_ciiu`
  ADD PRIMARY KEY (`id_ciiu`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`idcolores`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `color` (`color`);

--
-- Indices de la tabla `colorxproducto`
--
ALTER TABLE `colorxproducto`
  ADD PRIMARY KEY (`idcolorproducto`),
  ADD UNIQUE KEY `idpr_2` (`idpr`,`idcol`),
  ADD KEY `idpr` (`idpr`),
  ADD KEY `idcol` (`idcol`) USING BTREE;

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`idcomprobante`);

--
-- Indices de la tabla `comprobantes_detalle`
--
ALTER TABLE `comprobantes_detalle`
  ADD PRIMARY KEY (`iddetalle_comprobante`);

--
-- Indices de la tabla `conceptos_documentos`
--
ALTER TABLE `conceptos_documentos`
  ADD PRIMARY KEY (`id_concepto`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`idconfiguraciones`),
  ADD KEY `nombre_pc` (`nombre_pc`),
  ADD KEY `nombre_impre` (`nombre_impre`);

--
-- Indices de la tabla `configuraciones_print_pos`
--
ALTER TABLE `configuraciones_print_pos`
  ADD PRIMARY KEY (`idconfprintpos`);

--
-- Indices de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  ADD PRIMARY KEY (`id_consecutivo`);

--
-- Indices de la tabla `contable_puc`
--
ALTER TABLE `contable_puc`
  ADD PRIMARY KEY (`id_puc`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `contacto_clientes`
--
ALTER TABLE `contacto_clientes`
  ADD PRIMARY KEY (`id_contato_cliente`);

--
-- Indices de la tabla `contacto_correos`
--
ALTER TABLE `contacto_correos`
  ADD PRIMARY KEY (`id_contacto_correo`);

--
-- Indices de la tabla `contacto_cotizaciones`
--
ALTER TABLE `contacto_cotizaciones`
  ADD PRIMARY KEY (`id_contacto_cotizaciones`);

--
-- Indices de la tabla `contacto_telefonos`
--
ALTER TABLE `contacto_telefonos`
  ADD PRIMARY KEY (`id_contato_telefono`);

--
-- Indices de la tabla `copias_diarias`
--
ALTER TABLE `copias_diarias`
  ADD PRIMARY KEY (`id_copia_diaria`);

--
-- Indices de la tabla `correos_validos`
--
ALTER TABLE `correos_validos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `c_costos`
--
ALTER TABLE `c_costos`
  ADD PRIMARY KEY (`id_centrocostos`);

--
-- Indices de la tabla `datosemp`
--
ALTER TABLE `datosemp`
  ADD PRIMARY KEY (`iddatos`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddep`),
  ADD KEY `cod_iso3166` (`cod_iso3166`);

--
-- Indices de la tabla `descarga_pdfs_fe`
--
ALTER TABLE `descarga_pdfs_fe`
  ADD PRIMARY KEY (`id_descarga`);

--
-- Indices de la tabla `detallecombos`
--
ALTER TABLE `detallecombos`
  ADD PRIMARY KEY (`iddetallecombo`) USING BTREE,
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idcombo` (`idcombo`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `idfaccom` (`idfaccom`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`);

--
-- Indices de la tabla `detallecompraself`
--
ALTER TABLE `detallecompraself`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `idfaccom` (`idfaccom`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`);

--
-- Indices de la tabla `detallekardexcombos`
--
ALTER TABLE `detallekardexcombos`
  ADD PRIMARY KEY (`iddetallekardexcombos`);

--
-- Indices de la tabla `detallenotamov`
--
ALTER TABLE `detallenotamov`
  ADD PRIMARY KEY (`idnota`),
  ADD KEY `idmovi` (`idmovi`),
  ADD KEY `producto` (`producto`),
  ADD KEY `destino` (`destino`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`);

--
-- Indices de la tabla `detallenota_convertir`
--
ALTER TABLE `detallenota_convertir`
  ADD PRIMARY KEY (`id_detnc`);

--
-- Indices de la tabla `detallepagos`
--
ALTER TABLE `detallepagos`
  ADD PRIMARY KEY (`iddetall`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `numfac` (`numfac`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `remision` (`remision`),
  ADD KEY `idpedid` (`idpedid`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `estado_comanda` (`estado_comanda`);

--
-- Indices de la tabla `detallepedido_self`
--
ALTER TABLE `detallepedido_self`
  ADD KEY `iddet` (`iddet`),
  ADD KEY `numfac` (`numfac`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `remision` (`remision`),
  ADD KEY `idpedid` (`idpedid`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `estado_comanda` (`estado_comanda`);

--
-- Indices de la tabla `detalleprod`
--
ALTER TABLE `detalleprod`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `numfac` (`numproducc`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `numfac` (`numfac`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `remision` (`remision`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `numdevo` (`numdevo`),
  ADD KEY `iddeta` (`iddeta`);

--
-- Indices de la tabla `detalleventaself`
--
ALTER TABLE `detalleventaself`
  ADD PRIMARY KEY (`iddev`),
  ADD KEY `numfac` (`numfac`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `remision` (`remision`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `iddet` (`iddet`) USING BTREE,
  ADD KEY `idmasterdev` (`numerodev`);

--
-- Indices de la tabla `detalle_comprobantes`
--
ALTER TABLE `detalle_comprobantes`
  ADD PRIMARY KEY (`iddetalle_comprobante`);

--
-- Indices de la tabla `detalle_tributario`
--
ALTER TABLE `detalle_tributario`
  ADD PRIMARY KEY (`id_detalle_trib`);

--
-- Indices de la tabla `det_trib_x_tercero`
--
ALTER TABLE `det_trib_x_tercero`
  ADD PRIMARY KEY (`id_dt_ter`);

--
-- Indices de la tabla `devcompra`
--
ALTER TABLE `devcompra`
  ADD PRIMARY KEY (`iddevc`),
  ADD KEY `numfaccom` (`numfaccom`,`idinven`,`idpro`);

--
-- Indices de la tabla `devventa`
--
ALTER TABLE `devventa`
  ADD PRIMARY KEY (`iddevol`),
  ADD KEY `numfacven` (`numfacven`,`idinven`,`idpro`),
  ADD KEY `numerodev` (`numerodev`),
  ADD KEY `resolucion` (`resolucion`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`iddireccion`),
  ADD KEY `idter` (`idter`),
  ADD KEY `iddepar` (`iddepar`),
  ADD KEY `idmuni` (`idmuni`);

--
-- Indices de la tabla `escalas_productos`
--
ALTER TABLE `escalas_productos`
  ADD PRIMARY KEY (`id_escala`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`idetiqueta`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacom`
--
ALTER TABLE `facturacom`
  ADD PRIMARY KEY (`idfaccom`),
  ADD KEY `numfacven` (`numfacom`,`idprov`),
  ADD KEY `idprov` (`idprov`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `es_remision` (`es_remision`);

--
-- Indices de la tabla `facturaven`
--
ALTER TABLE `facturaven`
  ADD PRIMARY KEY (`idfacven`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `dircliente` (`dircliente`),
  ADD KEY `imconsumo` (`imconsumo`),
  ADD KEY `retefuente` (`retefuente`),
  ADD KEY `reteiva` (`reteiva`),
  ADD KEY `reteica` (`reteica`),
  ADD KEY `cree` (`cree`),
  ADD KEY `espos` (`espos`),
  ADD KEY `dias_decredito` (`dias_decredito`);

--
-- Indices de la tabla `facturaven_automaticas`
--
ALTER TABLE `facturaven_automaticas`
  ADD PRIMARY KEY (`idfacven`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `dircliente` (`dircliente`),
  ADD KEY `imconsumo` (`imconsumo`),
  ADD KEY `retefuente` (`retefuente`),
  ADD KEY `reteiva` (`reteiva`),
  ADD KEY `reteica` (`reteica`),
  ADD KEY `cree` (`cree`),
  ADD KEY `espos` (`espos`),
  ADD KEY `dias_decredito` (`dias_decredito`);

--
-- Indices de la tabla `facturaven_automaticas_detalleventa`
--
ALTER TABLE `facturaven_automaticas_detalleventa`
  ADD PRIMARY KEY (`iddet`),
  ADD KEY `numfac` (`numfac`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `costop` (`costop`),
  ADD KEY `remision` (`remision`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `numdevo` (`numdevo`),
  ADD KEY `iddeta` (`iddeta`);

--
-- Indices de la tabla `facturaven_contratos`
--
ALTER TABLE `facturaven_contratos`
  ADD PRIMARY KEY (`idfacven`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `dircliente` (`dircliente`),
  ADD KEY `imconsumo` (`imconsumo`),
  ADD KEY `retefuente` (`retefuente`),
  ADD KEY `reteiva` (`reteiva`),
  ADD KEY `reteica` (`reteica`),
  ADD KEY `cree` (`cree`),
  ADD KEY `espos` (`espos`),
  ADD KEY `dias_decredito` (`dias_decredito`);

--
-- Indices de la tabla `fe_tns`
--
ALTER TABLE `fe_tns`
  ADD PRIMARY KEY (`idfe_tns`);

--
-- Indices de la tabla `formadepago`
--
ALTER TABLE `formadepago`
  ADD PRIMARY KEY (`idforma`);

--
-- Indices de la tabla `formatosimpresion`
--
ALTER TABLE `formatosimpresion`
  ADD PRIMARY KEY (`idformatoimpresion`);

--
-- Indices de la tabla `formatosimpresion_prefijos`
--
ALTER TABLE `formatosimpresion_prefijos`
  ADD PRIMARY KEY (`idformatoimpresion_prefijo`) USING BTREE;

--
-- Indices de la tabla `gestor_archivos`
--
ALTER TABLE `gestor_archivos`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`),
  ADD KEY `mostrar` (`mostrar`),
  ADD KEY `comanda` (`comanda`);

--
-- Indices de la tabla `grupos_contables`
--
ALTER TABLE `grupos_contables`
  ADD PRIMARY KEY (`id_grupo_contable`);

--
-- Indices de la tabla `historiales_archivos`
--
ALTER TABLE `historiales_archivos`
  ADD PRIMARY KEY (`id_historial_archivo`);

--
-- Indices de la tabla `historiales_crm`
--
ALTER TABLE `historiales_crm`
  ADD PRIMARY KEY (`id_historial_crm`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idinv`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idbod` (`idbod`),
  ADD KEY `idtransfe` (`idmov`),
  ADD KEY `idfaccom` (`idfaccom`),
  ADD KEY `nufacvta` (`nufacvta`),
  ADD KEY `fechafab` (`fechafab`),
  ADD KEY `fechavenc` (`fechavenc`),
  ADD KEY `remision` (`remision`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `iddev` (`numdev`),
  ADD KEY `idped` (`idped`);

--
-- Indices de la tabla `inventarioself`
--
ALTER TABLE `inventarioself`
  ADD PRIMARY KEY (`idinv`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`idiva`);

--
-- Indices de la tabla `lenguas`
--
ALTER TABLE `lenguas`
  ADD PRIMARY KEY (`id_lenguaje`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idlog`);

--
-- Indices de la tabla `log_movil`
--
ALTER TABLE `log_movil`
  ADD PRIMARY KEY (`idlog_movil`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indices de la tabla `moneda_pago`
--
ALTER TABLE `moneda_pago`
  ADD PRIMARY KEY (`id_moneda`);

--
-- Indices de la tabla `motivo_notas_credito`
--
ALTER TABLE `motivo_notas_credito`
  ADD PRIMARY KEY (`id_motivo_nc`);

--
-- Indices de la tabla `motivo_notas_debito`
--
ALTER TABLE `motivo_notas_debito`
  ADD PRIMARY KEY (`id_motivo_nd`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmov`),
  ADD KEY `idbodorig` (`idbodorig`),
  ADD KEY `idboddes` (`idboddes`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `idtipotran` (`idtipotran`),
  ADD KEY `observaciones` (`observaciones`),
  ADD KEY `colores` (`colores`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `sabor` (`sabor`),
  ADD KEY `numeronota` (`numeronota`),
  ADD KEY `prefijonota` (`prefijonota`);

--
-- Indices de la tabla `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idmun`),
  ADD KEY `iddepar` (`iddepar`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`);

--
-- Indices de la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  ADD PRIMARY KEY (`idpagos_conceptos`);

--
-- Indices de la tabla `pagos_master`
--
ALTER TABLE `pagos_master`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pagos_soporte`
--
ALTER TABLE `pagos_soporte`
  ADD PRIMARY KEY (`idpagos_soporte`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`codigop`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`),
  ADD KEY `dircliente` (`dircliente`),
  ADD KEY `prefijo_ped` (`prefijo_ped`),
  ADD KEY `numpedido` (`numpedido`) USING BTREE,
  ADD KEY `tipo_doc` (`tipo_doc`);

--
-- Indices de la tabla `pedidos_self`
--
ALTER TABLE `pedidos_self`
  ADD KEY `idpedido` (`idpedido`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`),
  ADD KEY `dircliente` (`dircliente`),
  ADD KEY `prefijo_ped` (`prefijo_ped`),
  ADD KEY `numpedido` (`numpedido`) USING BTREE,
  ADD KEY `tipo_doc` (`tipo_doc`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos`);

--
-- Indices de la tabla `permisos_aplicaciones_menu`
--
ALTER TABLE `permisos_aplicaciones_menu`
  ADD PRIMARY KEY (`id_permisos_aplicacion_menu`);

--
-- Indices de la tabla `permisos_menu_movil`
--
ALTER TABLE `permisos_menu_movil`
  ADD PRIMARY KEY (`id_permisos_menu_movil`);

--
-- Indices de la tabla `plancuentas`
--
ALTER TABLE `plancuentas`
  ADD PRIMARY KEY (`id_plancuenta`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`id_presupuesto`);

--
-- Indices de la tabla `presupuesto_categorias`
--
ALTER TABLE `presupuesto_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `presupuesto_detalles`
--
ALTER TABLE `presupuesto_detalles`
  ADD PRIMARY KEY (`id_presupuesto_detalle`);

--
-- Indices de la tabla `presupuesto_movimientos`
--
ALTER TABLE `presupuesto_movimientos`
  ADD PRIMARY KEY (`id_presupuesto_movimiento`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`idmat`),
  ADD KEY `fecha` (`fecha`),
  ADD KEY `numero` (`numero`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idprod`),
  ADD UNIQUE KEY `codigobar` (`codigobar`),
  ADD KEY `idgrup` (`idgrup`),
  ADD KEY `idpro1` (`idpro1`),
  ADD KEY `idpro2` (`idpro2`),
  ADD KEY `idiva` (`idiva`),
  ADD KEY `codigobar_2` (`codigobar`,`nompro`),
  ADD KEY `nompro` (`nompro`),
  ADD KEY `tallas` (`tallas`),
  ADD KEY `colores` (`colores`),
  ADD KEY `sabores` (`sabores`),
  ADD KEY `imconsumo` (`imconsumo`),
  ADD KEY `idcombo` (`idcombo`),
  ADD KEY `fecha_vencimiento` (`fecha_vencimiento`),
  ADD KEY `fecha_fab` (`fecha_fab`),
  ADD KEY `lote` (`lote`),
  ADD KEY `serial_codbarras` (`serial_codbarras`);

--
-- Indices de la tabla `productos_galerias`
--
ALTER TABLE `productos_galerias`
  ADD PRIMARY KEY (`idproducto_galeria`);

--
-- Indices de la tabla `programar_descuentos_generales`
--
ALTER TABLE `programar_descuentos_generales`
  ADD PRIMARY KEY (`id_programar`);

--
-- Indices de la tabla `recibocaja`
--
ALTER TABLE `recibocaja`
  ADD PRIMARY KEY (`idrecibo`),
  ADD KEY `nurecibo` (`nurecibo`),
  ADD KEY `nufac` (`nufac`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `resolucion` (`resolucion`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indices de la tabla `recibos_detalle`
--
ALTER TABLE `recibos_detalle`
  ADD PRIMARY KEY (`id_recibo_detalle`);

--
-- Indices de la tabla `recibos_formapago`
--
ALTER TABLE `recibos_formapago`
  ADD PRIMARY KEY (`id_recibos_formapago`);

--
-- Indices de la tabla `recibos_ingcaja_detalle`
--
ALTER TABLE `recibos_ingcaja_detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `recibos_ing_caja`
--
ALTER TABLE `recibos_ing_caja`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indices de la tabla `remisiones`
--
ALTER TABLE `remisiones`
  ADD PRIMARY KEY (`idfacven`),
  ADD KEY `numfacven` (`numfacven`,`idcli`),
  ADD KEY `formapago` (`formapago`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `nremision` (`nremision`);

--
-- Indices de la tabla `resdian`
--
ALTER TABLE `resdian`
  ADD PRIMARY KEY (`Idres`),
  ADD KEY `nombre_pc` (`nombre_pc`),
  ADD KEY `nombre_impre` (`nombre_impre`),
  ADD KEY `fec_vencimiento` (`fec_vencimiento`);

--
-- Indices de la tabla `responsabilidades_tributarias`
--
ALTER TABLE `responsabilidades_tributarias`
  ADD PRIMARY KEY (`id_resp_trib`);

--
-- Indices de la tabla `resp_trib_x_tercero`
--
ALTER TABLE `resp_trib_x_tercero`
  ADD PRIMARY KEY (`id_resp_tr_ter`);

--
-- Indices de la tabla `ruteros`
--
ALTER TABLE `ruteros`
  ADD PRIMARY KEY (`id_rutero`);

--
-- Indices de la tabla `saborxproducto`
--
ALTER TABLE `saborxproducto`
  ADD PRIMARY KEY (`idsaborproducto`),
  ADD UNIQUE KEY `idpr_2` (`idpr`,`idsa`),
  ADD KEY `idpr` (`idpr`),
  ADD KEY `idsa` (`idsa`) USING BTREE;

--
-- Indices de la tabla `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- Indices de la tabla `suscripcion_pagos`
--
ALTER TABLE `suscripcion_pagos`
  ADD PRIMARY KEY (`id_suscripcion_pago`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`idtallas`),
  ADD KEY `tamaño` (`tamaño`);

--
-- Indices de la tabla `tallaxproducto`
--
ALTER TABLE `tallaxproducto`
  ADD PRIMARY KEY (`idtallaproducto`),
  ADD UNIQUE KEY `idpr_2` (`idpr`,`idta`),
  ADD KEY `idpr` (`idpr`),
  ADD KEY `idta` (`idta`) USING BTREE;

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`idtercero`),
  ADD UNIQUE KEY `documento` (`documento`),
  ADD UNIQUE KEY `idcliente` (`idtercero`),
  ADD KEY `idmuni` (`idmuni`),
  ADD KEY `nombres` (`nombres`),
  ADD KEY `regimen` (`regimen`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `proveedor` (`proveedor`),
  ADD KEY `empleado` (`empleado`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `autoretenedor` (`autoretenedor`),
  ADD KEY `creditoprov` (`creditoprov`),
  ADD KEY `loatiende` (`loatiende`),
  ADD KEY `tipo_documento` (`tipo_documento`),
  ADD KEY `es_restaurante` (`es_restaurante`),
  ADD KEY `cupo_vendedor` (`cupo_vendedor`);

--
-- Indices de la tabla `terceros_contratos`
--
ALTER TABLE `terceros_contratos`
  ADD PRIMARY KEY (`id_ter_cont`);

--
-- Indices de la tabla `terceros_contratos_detalle`
--
ALTER TABLE `terceros_contratos_detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `terceros_contratos_estado`
--
ALTER TABLE `terceros_contratos_estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `terceros_contratos_factura`
--
ALTER TABLE `terceros_contratos_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `terceros_contratos_motivoscorte`
--
ALTER TABLE `terceros_contratos_motivoscorte`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Indices de la tabla `terceros_contrato_dispositivo`
--
ALTER TABLE `terceros_contrato_dispositivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `terceros_cuentas`
--
ALTER TABLE `terceros_cuentas`
  ADD PRIMARY KEY (`idtercero_cuenta`);

--
-- Indices de la tabla `terceros_dispositivos`
--
ALTER TABLE `terceros_dispositivos`
  ADD PRIMARY KEY (`id_dispositivo`);

--
-- Indices de la tabla `tipoautoretencion`
--
ALTER TABLE `tipoautoretencion`
  ADD PRIMARY KEY (`id_autoret`);

--
-- Indices de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`idtipodocumento`);

--
-- Indices de la tabla `tipoica`
--
ALTER TABLE `tipoica`
  ADD PRIMARY KEY (`id_ica`);

--
-- Indices de la tabla `tiporetefuente`
--
ALTER TABLE `tiporetefuente`
  ADD PRIMARY KEY (`id_tiporetefuente`);

--
-- Indices de la tabla `tipos_establecimientos`
--
ALTER TABLE `tipos_establecimientos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipotransfe`
--
ALTER TABLE `tipotransfe`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  ADD PRIMARY KEY (`id_to`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD UNIQUE KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id_um`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `grupocomanda` (`grupocomanda`),
  ADD KEY `nombre_pc` (`nombre_pc`),
  ADD KEY `nombre_impre` (`nombre_impre`);

--
-- Indices de la tabla `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  ADD PRIMARY KEY (`idusuarios_grupos`);

--
-- Indices de la tabla `vencimiento_lote`
--
ALTER TABLE `vencimiento_lote`
  ADD PRIMARY KEY (`idvenclote`);

--
-- Indices de la tabla `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`idversion`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`);

--
-- Indices de la tabla `visita_conceptos`
--
ALTER TABLE `visita_conceptos`
  ADD PRIMARY KEY (`id_visita_concepto`);

--
-- Indices de la tabla `webservicefe`
--
ALTER TABLE `webservicefe`
  ADD PRIMARY KEY (`idwebservicefe`);

--
-- Indices de la tabla `webservicefe_proveedores`
--
ALTER TABLE `webservicefe_proveedores`
  ADD PRIMARY KEY (`idwebservicefe_proveedor`);

--
-- Indices de la tabla `zona_clientes`
--
ALTER TABLE `zona_clientes`
  ADD PRIMARY KEY (`idzona_cliente`);

--
-- Indices de la tabla `zona_postal`
--
ALTER TABLE `zona_postal`
  ADD PRIMARY KEY (`idzona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicaciones_menu`
--
ALTER TABLE `aplicaciones_menu`
  MODIFY `idaplicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aplicaciones_permisos`
--
ALTER TABLE `aplicaciones_permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aplicaciones_permisos_usuario`
--
ALTER TABLE `aplicaciones_permisos_usuario`
  MODIFY `id_apu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `idcaja_vta` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `idbarrio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `idbodega` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `idcaja` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja_flujos`
--
ALTER TABLE `caja_flujos`
  MODIFY `idcaja_flujo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caja_ventas`
--
ALTER TABLE `caja_ventas`
  MODIFY `idcaja_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_estado`
--
ALTER TABLE `casos_estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_medio`
--
ALTER TABLE `casos_medio`
  MODIFY `id_medio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_notificaciones`
--
ALTER TABLE `casos_notificaciones`
  MODIFY `id_casos_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_novedades`
--
ALTER TABLE `casos_novedades`
  MODIFY `id_novedades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_prioridad`
--
ALTER TABLE `casos_prioridad`
  MODIFY `id_prioridad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos_tipo`
--
ALTER TABLE `casos_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciiu_tercero`
--
ALTER TABLE `ciiu_tercero`
  MODIFY `id_ciiu_ter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificacion_clientes`
--
ALTER TABLE `clasificacion_clientes`
  MODIFY `idclasificacion_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `codigos_ciiu`
--
ALTER TABLE `codigos_ciiu`
  MODIFY `id_ciiu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `idcolores` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colorxproducto`
--
ALTER TABLE `colorxproducto`
  MODIFY `idcolorproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `idcomprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobantes_detalle`
--
ALTER TABLE `comprobantes_detalle`
  MODIFY `iddetalle_comprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conceptos_documentos`
--
ALTER TABLE `conceptos_documentos`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuraciones_print_pos`
--
ALTER TABLE `configuraciones_print_pos`
  MODIFY `idconfprintpos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  MODIFY `id_consecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contable_puc`
--
ALTER TABLE `contable_puc`
  MODIFY `id_puc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto_clientes`
--
ALTER TABLE `contacto_clientes`
  MODIFY `id_contato_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto_correos`
--
ALTER TABLE `contacto_correos`
  MODIFY `id_contacto_correo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto_cotizaciones`
--
ALTER TABLE `contacto_cotizaciones`
  MODIFY `id_contacto_cotizaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto_telefonos`
--
ALTER TABLE `contacto_telefonos`
  MODIFY `id_contato_telefono` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `copias_diarias`
--
ALTER TABLE `copias_diarias`
  MODIFY `id_copia_diaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correos_validos`
--
ALTER TABLE `correos_validos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_costos`
--
ALTER TABLE `c_costos`
  MODIFY `id_centrocostos` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datosemp`
--
ALTER TABLE `datosemp`
  MODIFY `iddatos` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddep` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descarga_pdfs_fe`
--
ALTER TABLE `descarga_pdfs_fe`
  MODIFY `id_descarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecombos`
--
ALTER TABLE `detallecombos`
  MODIFY `iddetallecombo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'El id autoincremental de la tabla';

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompraself`
--
ALTER TABLE `detallecompraself`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallekardexcombos`
--
ALTER TABLE `detallekardexcombos`
  MODIFY `iddetallekardexcombos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallenotamov`
--
ALTER TABLE `detallenotamov`
  MODIFY `idnota` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallenota_convertir`
--
ALTER TABLE `detallenota_convertir`
  MODIFY `id_detnc` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepagos`
--
ALTER TABLE `detallepagos`
  MODIFY `iddetall` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleprod`
--
ALTER TABLE `detalleprod`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleventaself`
--
ALTER TABLE `detalleventaself`
  MODIFY `iddev` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_comprobantes`
--
ALTER TABLE `detalle_comprobantes`
  MODIFY `iddetalle_comprobante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_tributario`
--
ALTER TABLE `detalle_tributario`
  MODIFY `id_detalle_trib` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `det_trib_x_tercero`
--
ALTER TABLE `det_trib_x_tercero`
  MODIFY `id_dt_ter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devcompra`
--
ALTER TABLE `devcompra`
  MODIFY `iddevc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devventa`
--
ALTER TABLE `devventa`
  MODIFY `iddevol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `iddireccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escalas_productos`
--
ALTER TABLE `escalas_productos`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `idetiqueta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturacom`
--
ALTER TABLE `facturacom`
  MODIFY `idfaccom` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaven`
--
ALTER TABLE `facturaven`
  MODIFY `idfacven` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaven_automaticas`
--
ALTER TABLE `facturaven_automaticas`
  MODIFY `idfacven` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaven_automaticas_detalleventa`
--
ALTER TABLE `facturaven_automaticas_detalleventa`
  MODIFY `iddet` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturaven_contratos`
--
ALTER TABLE `facturaven_contratos`
  MODIFY `idfacven` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fe_tns`
--
ALTER TABLE `fe_tns`
  MODIFY `idfe_tns` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formadepago`
--
ALTER TABLE `formadepago`
  MODIFY `idforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formatosimpresion`
--
ALTER TABLE `formatosimpresion`
  MODIFY `idformatoimpresion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formatosimpresion_prefijos`
--
ALTER TABLE `formatosimpresion_prefijos`
  MODIFY `idformatoimpresion_prefijo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gestor_archivos`
--
ALTER TABLE `gestor_archivos`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idgrupo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos_contables`
--
ALTER TABLE `grupos_contables`
  MODIFY `id_grupo_contable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiales_archivos`
--
ALTER TABLE `historiales_archivos`
  MODIFY `id_historial_archivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historiales_crm`
--
ALTER TABLE `historiales_crm`
  MODIFY `id_historial_crm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idinv` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventarioself`
--
ALTER TABLE `inventarioself`
  MODIFY `idinv` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `idiva` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lenguas`
--
ALTER TABLE `lenguas`
  MODIFY `id_lenguaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `idlog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_movil`
--
ALTER TABLE `log_movil`
  MODIFY `idlog_movil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medios_de_pago`
--
ALTER TABLE `medios_de_pago`
  MODIFY `id_mp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `moneda_pago`
--
ALTER TABLE `moneda_pago`
  MODIFY `id_moneda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motivo_notas_credito`
--
ALTER TABLE `motivo_notas_credito`
  MODIFY `id_motivo_nc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `motivo_notas_debito`
--
ALTER TABLE `motivo_notas_debito`
  MODIFY `id_motivo_nd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmov` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idmun` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpago` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_conceptos`
--
ALTER TABLE `pagos_conceptos`
  MODIFY `idpagos_conceptos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_master`
--
ALTER TABLE `pagos_master`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_soporte`
--
ALTER TABLE `pagos_soporte`
  MODIFY `idpagos_soporte` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tabla para los soportes de pagos por ejemplo un comprobante ya firmado';

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `codigop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos_aplicaciones_menu`
--
ALTER TABLE `permisos_aplicaciones_menu`
  MODIFY `id_permisos_aplicacion_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos_menu_movil`
--
ALTER TABLE `permisos_menu_movil`
  MODIFY `id_permisos_menu_movil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plancuentas`
--
ALTER TABLE `plancuentas`
  MODIFY `id_plancuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `id_presupuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto_categorias`
--
ALTER TABLE `presupuesto_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto_detalles`
--
ALTER TABLE `presupuesto_detalles`
  MODIFY `id_presupuesto_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presupuesto_movimientos`
--
ALTER TABLE `presupuesto_movimientos`
  MODIFY `id_presupuesto_movimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `idmat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idprod` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos_galerias`
--
ALTER TABLE `productos_galerias`
  MODIFY `idproducto_galeria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programar_descuentos_generales`
--
ALTER TABLE `programar_descuentos_generales`
  MODIFY `id_programar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibocaja`
--
ALTER TABLE `recibocaja`
  MODIFY `idrecibo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos_detalle`
--
ALTER TABLE `recibos_detalle`
  MODIFY `id_recibo_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos_formapago`
--
ALTER TABLE `recibos_formapago`
  MODIFY `id_recibos_formapago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos_ingcaja_detalle`
--
ALTER TABLE `recibos_ingcaja_detalle`
  MODIFY `id_detalle` bigint(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos_ing_caja`
--
ALTER TABLE `recibos_ing_caja`
  MODIFY `id_recibo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `remisiones`
--
ALTER TABLE `remisiones`
  MODIFY `idfacven` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resdian`
--
ALTER TABLE `resdian`
  MODIFY `Idres` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsabilidades_tributarias`
--
ALTER TABLE `responsabilidades_tributarias`
  MODIFY `id_resp_trib` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resp_trib_x_tercero`
--
ALTER TABLE `resp_trib_x_tercero`
  MODIFY `id_resp_tr_ter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruteros`
--
ALTER TABLE `ruteros`
  MODIFY `id_rutero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saborxproducto`
--
ALTER TABLE `saborxproducto`
  MODIFY `idsaborproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id_saldo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscripcion_pagos`
--
ALTER TABLE `suscripcion_pagos`
  MODIFY `id_suscripcion_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `idtallas` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallaxproducto`
--
ALTER TABLE `tallaxproducto`
  MODIFY `idtallaproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `idtercero` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contratos`
--
ALTER TABLE `terceros_contratos`
  MODIFY `id_ter_cont` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contratos_detalle`
--
ALTER TABLE `terceros_contratos_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contratos_estado`
--
ALTER TABLE `terceros_contratos_estado`
  MODIFY `id_estado` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contratos_factura`
--
ALTER TABLE `terceros_contratos_factura`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contratos_motivoscorte`
--
ALTER TABLE `terceros_contratos_motivoscorte`
  MODIFY `id_motivo` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_contrato_dispositivo`
--
ALTER TABLE `terceros_contrato_dispositivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_cuentas`
--
ALTER TABLE `terceros_cuentas`
  MODIFY `idtercero_cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terceros_dispositivos`
--
ALTER TABLE `terceros_dispositivos`
  MODIFY `id_dispositivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoautoretencion`
--
ALTER TABLE `tipoautoretencion`
  MODIFY `id_autoret` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `idtipodocumento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoica`
--
ALTER TABLE `tipoica`
  MODIFY `id_ica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiporetefuente`
--
ALTER TABLE `tiporetefuente`
  MODIFY `id_tiporetefuente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_establecimientos`
--
ALTER TABLE `tipos_establecimientos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipotransfe`
--
ALTER TABLE `tipotransfe`
  MODIFY `idtipo` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_operacion`
--
ALTER TABLE `tipo_operacion`
  MODIFY `id_to` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id_um` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  MODIFY `idusuarios_grupos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vencimiento_lote`
--
ALTER TABLE `vencimiento_lote`
  MODIFY `idvenclote` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `version`
--
ALTER TABLE `version`
  MODIFY `idversion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visita_conceptos`
--
ALTER TABLE `visita_conceptos`
  MODIFY `id_visita_concepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webservicefe`
--
ALTER TABLE `webservicefe`
  MODIFY `idwebservicefe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webservicefe_proveedores`
--
ALTER TABLE `webservicefe_proveedores`
  MODIFY `idwebservicefe_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zona_clientes`
--
ALTER TABLE `zona_clientes`
  MODIFY `idzona_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zona_postal`
--
ALTER TABLE `zona_postal`
  MODIFY `idzona` int(4) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `productos` ADD `ubicacion` VARCHAR(120) NULL DEFAULT NULL AFTER `imagen`;

ALTER TABLE `configuraciones` ADD `ver_grupo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `columna_reg_pdf_propio`, ADD `ver_codigo` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_grupo`, ADD `ver_imagen` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_codigo`, ADD `ver_existencia` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_imagen`, ADD `ver_unidad` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_existencia`, ADD `ver_precio` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_unidad`, ADD `ver_impuesto` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_precio`, ADD `ver_stock` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_impuesto`, ADD `ver_ubicacion` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_stock`, ADD `ver_costo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_ubicacion`, ADD `ver_proveedor` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_costo`, ADD `ver_combo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_proveedor`;  

ALTER TABLE `configuraciones` ADD `ver_agregar_nota` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_combo`;

ALTER TABLE `configuraciones` ADD `ver_busqueda_refinada` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_agregar_nota`;

ALTER TABLE `configuraciones` ADD `cal_valores_decimales` INT NOT NULL DEFAULT '2' COMMENT 'Inicialmente para factura electrónica y luego irlo incluyendo en el resto de operaciones' AFTER `ver_busqueda_refinada`, ADD `cal_cantidades_decimales` INT NOT NULL DEFAULT '2' COMMENT 'Inicialmente para factura electrónica y luego irlo incluyendo en el resto de operaciones' AFTER `cal_valores_decimales`;

ALTER TABLE `facturaven` ADD `orden_compra` VARCHAR(50) NULL DEFAULT NULL AFTER `monto_utilidad`, ADD `orden_fecha` DATE NULL DEFAULT NULL AFTER `orden_compra`;



ALTER TABLE `webservicefe` ADD `envio_credenciales` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Activa la opción de enviar credenciales de acceso al clientes de factura electrónica antes de recibir la factura o documento. Aplica para desarrollo propio.' AFTER `url_api_sendmail`, ADD `plantillas_correo` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Activa la opción de usar plantillas de correo electrónica de factura electrónica en desarrollo propio.' AFTER `envio_credenciales`, ADD `copia_factura_a` VARCHAR(120) NULL DEFAULT NULL COMMENT 'correo para enviar copia de factura electrónica al enviar el documento electrónico. Aplica para desarrollo propio.' AFTER `plantillas_correo`;

ALTER TABLE `webservicefe` ADD `plantilla_pordefecto` INT NOT NULL DEFAULT '0' COMMENT 'El id del registro de la tabla donde está la plantilla a usar en el correo de factura electrónica de desarrollo propio.' AFTER `copia_factura_a`;

CREATE TABLE `plantillas_correo_propio` ( `id` INT NOT NULL AUTO_INCREMENT , `contenido` TEXT NULL DEFAULT NULL , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `plantillas_correo_propio` ADD `descripcion` VARCHAR(50) NULL DEFAULT NULL AFTER `actualizado`;

ALTER TABLE `plantillas_correo_propio` ADD `html_header` TEXT NULL DEFAULT NULL AFTER `descripcion`, ADD `html_body` TEXT NULL DEFAULT NULL AFTER `html_header`, ADD `html_buttons` TEXT NULL DEFAULT NULL AFTER `html_body`, ADD `html_footer` TEXT NULL DEFAULT NULL AFTER `html_buttons`;

ALTER TABLE `configuraciones` ADD `validar_codbarras` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Valida el código de barras al leerlo en venta rápida y permite seleccionar posteriormente el precio y digitar la cantidad' AFTER `cal_cantidades_decimales`;

ALTER TABLE `webservicefe` ADD `proveedor_anterior` VARCHAR(100) NULL DEFAULT NULL AFTER `plantilla_pordefecto`, ADD `servidor_anterior1` VARCHAR(300) NULL DEFAULT NULL AFTER `proveedor_anterior`, ADD `servidor_anterior2` VARCHAR(300) NULL DEFAULT NULL AFTER `servidor_anterior1`, ADD `servidor_anterior3` VARCHAR(300) NULL DEFAULT NULL AFTER `servidor_anterior2`, ADD `token_anterior` VARCHAR(150) NULL DEFAULT NULL AFTER `servidor_anterior3`, ADD `password_anterior` VARCHAR(150) NULL DEFAULT NULL AFTER `token_anterior`;

ALTER TABLE `facturaven_contratos` ADD `proveedor` VARCHAR(40) NULL DEFAULT NULL AFTER `aviso_nota`, ADD `token` VARCHAR(150) NULL DEFAULT NULL AFTER `proveedor`, ADD `password` VARCHAR(150) NULL DEFAULT NULL AFTER `token`, ADD `servidor` VARCHAR(300) NULL DEFAULT NULL AFTER `password`;


CREATE TABLE `facturaven_clasificacion` ( `id` INT NOT NULL AUTO_INCREMENT , `descripcion` VARCHAR(60) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `facturaven` ADD `id_clasificacion` INT NOT NULL DEFAULT '1' AFTER `orden_fecha`;

ALTER TABLE `facturaven_automaticas` ADD `id_clasificacion` INT NOT NULL DEFAULT '1' AFTER `id_trans_fe`;


ALTER TABLE `terceros` ADD `archivo_cedula` VARCHAR(300) NULL DEFAULT NULL AFTER `celular_notificafe`, ADD `archivo_rut` VARCHAR(300) NULL DEFAULT NULL AFTER `archivo_cedula`, ADD `archivo_nit` VARCHAR(300) NULL DEFAULT NULL AFTER `archivo_rut`, ADD `archivo_pago` VARCHAR(300) NULL DEFAULT NULL AFTER `archivo_nit`;

ALTER TABLE `terceros` ADD `id_plan` INT NOT NULL DEFAULT '0' AFTER `archivo_pago`, ADD `valor_plan` DECIMAL(12.2) NOT NULL DEFAULT '0' AFTER `id_plan`, ADD `fecha_registro_fe` DATETIME NULL DEFAULT NULL AFTER `valor_plan`;

ALTER TABLE `productos` ADD `para_registro_fe` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Para uso netamente de soluciones navarro' AFTER `ubicacion`;

ALTER TABLE `terceros` ADD `nombre_contador` VARCHAR(120) NULL DEFAULT NULL AFTER `fecha_registro_fe`;



CREATE TABLE `facturaven_soporte_pago` ( `id` INT NOT NULL AUTO_INCREMENT , `archivo` VARCHAR(300) NULL DEFAULT NULL , `fechayhora` DATETIME NULL DEFAULT NULL , `id_venta` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'Para subir archivos de pago de suscripciones';

ALTER TABLE `facturaven` ADD `fecha_pago` DATETIME NULL DEFAULT NULL AFTER `id_clasificacion`;




CREATE TABLE `token_sms` ( `id` INT NOT NULL , `codigo` INT NOT NULL DEFAULT '0' , `creado` DATETIME NOT NULL , `activo` SET('SI','NO') NOT NULL DEFAULT 'SI' , `id_tercero` INT NOT NULL DEFAULT '0' ) ENGINE = InnoDB;

ALTER TABLE `token_sms` ADD `celular` INT NOT NULL DEFAULT '0' AFTER `id_tercero`;

ALTER TABLE `token_sms` CHANGE `celular` `celular` VARCHAR(20) NOT NULL DEFAULT '0';

ALTER TABLE `token_sms` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);

ALTER TABLE `terceros` ADD `estado` VARCHAR(30) NULL DEFAULT NULL AFTER `nombre_contador`;

ALTER TABLE `terceros` CHANGE `estado` `estado` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'PENDIENTE, ASIGNADO, PRODUCCION, SUSPENDIDO, INACTIVO';


ALTER TABLE `terceros` CHANGE `empleado` `empleado` SET('SI','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'NO', CHANGE `proveedor` `proveedor` SET('SI','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'NO', CHANGE `creditoprov` `creditoprov` SET('SI','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'NO', CHANGE `autoretenedor` `autoretenedor` SET('SI','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'NO';
ALTER TABLE `terceros` ADD `si_nomina` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `estado`, ADD `si_factura_electronica` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `si_nomina`, ADD `nombre_empresa_bd` VARCHAR(200) NULL DEFAULT NULL AFTER `si_factura_electronica`;

ALTER TABLE `terceros` ADD `n_trabajadores` INT NOT NULL DEFAULT '0' AFTER `nombre_empresa_bd`;

ALTER TABLE `asientos` CHANGE `valor` `valor` DECIMAL(15,2) NOT NULL DEFAULT '0.00';

ALTER TABLE `facturaven` CHANGE `observaciones` `observaciones` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

ALTER TABLE `detalleventa` CHANGE `obs` `obs` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL COMMENT 'Campo para colocar la descripción ampliada del detalle del ítem de venta';

CREATE TABLE `mensajes_masivos` ( `id` INT NOT NULL AUTO_INCREMENT , `creado` DATETIME NULL DEFAULT NULL COMMENT 'fecha de creacion del registro' , `inicio` DATE NULL DEFAULT NULL COMMENT 'para un futuro donde se envían automaticamente desde un script' , `fin` DATE NULL DEFAULT NULL COMMENT 'para un futuro donde se envían automaticamente desde un script' , `mensaje` TEXT NULL DEFAULT NULL COMMENT 'El mensaje que se va ha enviar al correo' , `activo` SET('SI','NO') NULL DEFAULT 'SI' , `descripcion` VARCHAR(200) NULL DEFAULT NULL COMMENT 'Para clasificar el mensaje con un título en el software' , `asunto` VARCHAR(200) NULL DEFAULT NULL COMMENT 'El asunto que va a ir en el correo' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `mensajes_masivos` ADD `imagen` VARCHAR(300) NULL DEFAULT NULL AFTER `asunto`;

CREATE TABLE `mensajes_masivos_envios` ( `id` INT NOT NULL AUTO_INCREMENT , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , `u_envio` DATETIME NULL DEFAULT NULL , `n_envios` INT NOT NULL DEFAULT '0' , `id_mensaje` INT NOT NULL DEFAULT '0' , `clasificaciones_destino` VARCHAR(300) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `servidor_smtp` ( `id` INT NOT NULL AUTO_INCREMENT , `servidor` VARCHAR(120) NULL DEFAULT NULL , `puerto` INT NOT NULL DEFAULT '0' , `usuario` VARCHAR(120) NULL DEFAULT NULL , `password` VARCHAR(120) NULL DEFAULT NULL , `correo_remitente` VARCHAR(120) NOT NULL , `tls_ssl` SET('TLS','SSL','NO') NOT NULL DEFAULT 'NO' , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , `activo` SET('SI','NO') NOT NULL DEFAULT 'SI' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `terceros_historial` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` DATETIME NULL DEFAULT NULL COMMENT 'La fecha y hora en que se crea el registro' , `id_tercero` INT NOT NULL DEFAULT '0' COMMENT 'El id del tercero que se atiende' , `notas` TEXT NULL DEFAULT NULL COMMENT 'la accion, notas, solicitud, aclaracion o detalle que se deja de la atencion del cliente o por hacer' , `fecha_limite` DATETIME NULL DEFAULT NULL COMMENT 'La fecha limite para llevar acabo la tarea' , `id_estado` INT NOT NULL DEFAULT '0' COMMENT 'el id del estado es que esta la solicitud' , `id_usuario` INT NOT NULL DEFAULT '0' COMMENT 'el id del usuario que esta gestionando el registro' , `actualizado` DATETIME NULL DEFAULT NULL COMMENT 'ultima fecha y hora en que se hizo cambios al registro' , `asignado_a` INT NOT NULL DEFAULT '0' COMMENT 'id del usuario al que se le asigna la tarea' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;
CREATE TABLE `terceros_historial_estados` ( `id` INT NOT NULL AUTO_INCREMENT , `estado` VARCHAR(120) NULL DEFAULT NULL , `color` VARCHAR(20) NULL DEFAULT NULL , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;
CREATE TABLE `terceros_historial_log` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` DATETIME NULL DEFAULT NULL COMMENT 'La fecha y hora en que se crea el registro' , `id_tercero` INT NOT NULL DEFAULT '0' COMMENT 'El id del tercero que se atiende' , `notas` TEXT NULL DEFAULT NULL COMMENT 'la accion, notas, solicitud, aclaracion o detalle que se deja de la atencion del cliente o por hacer' , `fecha_limite` DATETIME NULL DEFAULT NULL COMMENT 'La fecha limite para llevar acabo la tarea' , `id_estado` INT NOT NULL DEFAULT '0' COMMENT 'el id del estado es que esta la solicitud' , `id_usuario` INT NOT NULL DEFAULT '0' COMMENT 'el id del usuario que esta gestionando el registro' , `actualizado` DATETIME NULL DEFAULT NULL COMMENT 'ultima fecha y hora en que se hizo cambios al registro' , `asignado_a` INT NOT NULL DEFAULT '0' COMMENT 'id del usuario al que se le asigna la tarea' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;



CREATE TABLE `prefijos` ( `id_prefijo` INT(2) NOT NULL AUTO_INCREMENT , `elprefijo` VARCHAR(4) NOT NULL DEFAULT '00' , `comentario` VARCHAR(120) NULL DEFAULT NULL , PRIMARY KEY (`id_prefijo`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'PARA PREFIJOS'; 

ALTER TABLE `facturacom` ADD `prefijo_com` VARCHAR(4) NOT NULL DEFAULT '00' COMMENT 'prefijo de la transacción' AFTER `cod_cuenta`, ADD `numero_com` BIGINT NOT NULL DEFAULT '0' COMMENT 'consecutivo de la transacción' AFTER `prefijo_com`, ADD `tipo_com` SET('FC','RE','NC','ND') NOT NULL DEFAULT 'FC' COMMENT 'tipo de trasacción:\r\nFC compra, RE remisión, NC Nota crédito, ND débito' AFTER `numero_com`; 

ALTER TABLE `facturacom` ADD `id_comafec` BIGINT NULL DEFAULT '0' COMMENT 'cuando se hace Notas C o D' AFTER `tipo_com`; 

ALTER TABLE `facturacom` CHANGE `tipo_com` `tipo_com` SET('FC','RE','NC','ND','AF') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'FC' COMMENT 'tipo de trasacción:\r\nFC compra, RE remisión, NC Nota crédito, ND débito,\r\nAF auto factura';

CREATE TABLE `planes` ( `id` INT NOT NULL AUTO_INCREMENT , `folios` INT NOT NULL DEFAULT '0' , `valor_plan` DECIMAL(15,2) NOT NULL DEFAULT '0' , `limite_folios_pos` INT NOT NULL DEFAULT '0' , `limite_folios_inventario` INT NOT NULL DEFAULT '0' , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , `activo` SET('SI','NO') NOT NULL DEFAULT 'SI' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `plan` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` DATETIME NULL DEFAULT NULL , `usuario` VARCHAR(30) NULL DEFAULT NULL , `tercero` INT NOT NULL DEFAULT '1' , `folios` INT NOT NULL DEFAULT '0' , `inicio` DATE NULL DEFAULT NULL , `fin` DATE NULL DEFAULT NULL , `estado` SET('PRUEBAS','PRODUCCION') NOT NULL DEFAULT 'PRUEBAS' , `correo` VARCHAR(120) NULL DEFAULT NULL , `celular` VARCHAR(30) NULL DEFAULT NULL , `id_plan` INT NOT NULL DEFAULT '0' , `incluye_nomina` SET('SI','NO') NOT NULL DEFAULT 'NO' , `activo` SET('SI','NO') NOT NULL DEFAULT 'SI' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `folios` ( `id` INT NOT NULL AUTO_INCREMENT , `fecha` DATETIME NULL DEFAULT NULL COMMENT 'el día y la hora en que se consumió el folio' , `tipo_documento` VARCHAR(2) NULL DEFAULT NULL , `documento` VARCHAR(30) NULL DEFAULT NULL COMMENT 'prefijo + numero' , `usuario` VARCHAR(30) NULL DEFAULT NULL , `tercero_usuario` INT NOT NULL DEFAULT '0' COMMENT 'El id tercero que está relacionado con el usuario' , `prueba` SET('SI','NO') NOT NULL DEFAULT 'NO' , `proveedor` VARCHAR(100) NULL DEFAULT NULL COMMENT 'el nombre del proveedor de la tabla webservice' , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'aquí va el contador de consumo de documentos fe y no fe';



CREATE TABLE `puc_auxiliares` ( `id` INT NOT NULL AUTO_INCREMENT , `id_puc` INT NOT NULL DEFAULT '0' , `codigo` VARCHAR(5) NULL DEFAULT NULL , `nombre` VARCHAR(120) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `puc` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo` VARCHAR(20) NULL DEFAULT NULL , `nombre` VARCHAR(120) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `conceptos_dian` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo` VARCHAR(10) NULL DEFAULT NULL , `descripcion` TEXT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `contabilidad` (
  `id` int(11) NOT NULL,
  `tipodoc` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'FC=FACTURA COMPRA,CO=CONSUMO,FV=FACTURA VENTA, CI=COMPROBANTE DE INGRESO, CE=COMPROBANTE DE EGRESO, NC=NOTA CREDITO,NB=NOTA DÉBITO, NCC=NOTA CRÉDITO COMPRA, NDC=NOTA DÉBITO COMPRA',
  `prefijo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) NOT NULL DEFAULT '0',
  `notas` text COLLATE utf8_unicode_ci,
  `fecha` date DEFAULT NULL,
  `asentada` timestamp NULL DEFAULT NULL,
  `total_debito` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_credito` decimal(15,2) NOT NULL DEFAULT '0.00',
  `periodo` int(11) NOT NULL DEFAULT '0',
  `usuario` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'NOMBRE DEL USUARIO EN FACILWEB',
  `tercero` int(11) NOT NULL DEFAULT '0' COMMENT 'TERCERO DEL USUARIO',
  `creado` timestamp NULL DEFAULT NULL,
  `actualizado` timestamp NULL DEFAULT NULL,
  `importado` set('SI','NO') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO' COMMENT ' SI FUE IMPORTADO DESDE EXCEL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `contabilidad`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `contabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `contabilidad_detalle` ( `id` INT NOT NULL AUTO_INCREMENT , `id_contabilidad` INT NOT NULL DEFAULT '0' , `id_puc` INT NOT NULL DEFAULT '0' , `valor` DECIMAL(15,2) NOT NULL DEFAULT '0' , `tipo` SET('C','D') NOT NULL DEFAULT 'C' , `id_tercero` INT NOT NULL DEFAULT '0' , `notas` TEXT NULL DEFAULT NULL , `ndocumento` VARCHAR(20) NULL DEFAULT NULL COMMENT 'ES EL TIPODOCUMENTO+PREFIJO+NUMERO EJEMPLO: FVFE0001(FV+FE+0001)' , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE bancos ADD id_puc_auxiliar INT(5) NOT NULL DEFAULT '0' AFTER numero_cuenta;

ALTER TABLE iva ADD id_pucaux_compras INT(5) NOT NULL DEFAULT '0' AFTER puc_dv_compras, ADD id_pucaux_ventas INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_compras, ADD id_pucaux_nc INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_ventas, ADD id_pucaux_nd INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_nc, ADD id_pucaux_exec INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_nd;

ALTER TABLE terceros ADD id_pucaux_cliente INT(5) NOT NULL DEFAULT '0' AFTER n_trabajadores, ADD id_pucaux_retteventas INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_cliente, ADD id_pucaux_retteservicios INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_retteventas, ADD id_pucaux_proveedor INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_retteservicios, ADD id_pucaux_rettecompras INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_proveedor, ADD id_pucaux_rettesercomp INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_rettecompras;

ALTER TABLE productos ADD id_pucaux_inventario INT(5) NOT NULL DEFAULT '0' AFTER para_registro_fe, ADD id_pucaux_ncc INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_inventario, ADD id_pucaux_ndc INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_ncc, ADD id_pucaux_ingresos INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_ndc, ADD id_pucaux_nc INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_ingresos, ADD id_pucaux_nd INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_nc, ADD id_pucaux_costoventas INT(5) NOT NULL DEFAULT '0' AFTER id_pucaux_nd;



CREATE TABLE licencias_planes ( id BIGINT NOT NULL AUTO_INCREMENT , codigo VARCHAR(6) NOT NULL DEFAULT '000000' , descripcion VARCHAR(120) NULL , porc_gan_lic_1nivel DECIMAL(4,2) NOT NULL DEFAULT '0' COMMENT 'porcentaje de ganancia licencias desde un primer nivel' , porc_gan_lic_2nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_1nivel DECIMAL(4,2) NOT NULL DEFAULT '0' COMMENT 'porcentaje de ganancia de documentos desde un primer nivel' , por_gan_doc_2nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_3nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_4nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , creado TIMESTAMP NULL , actualizado TIMESTAMP NULL , usuario VARCHAR(30) NULL DEFAULT NULL , tercero INT NOT NULL DEFAULT '0' , PRIMARY KEY (id)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'Tabla para licencias y planes de facturación';

ALTER TABLE usuarios ADD nivel INT(2) NOT NULL DEFAULT '1' COMMENT 'Nivel del usuario' AFTER ocultar_bod;

CREATE TABLE payu ( id BIGINT NOT NULL AUTO_INCREMENT , id_usuario INT NOT NULL DEFAULT '0' , usuario VARCHAR(30) NULL DEFAULT NULL , apikey VARCHAR(60) NULL DEFAULT NULL , merchantid VARCHAR(30) NULL DEFAULT NULL , accountid VARCHAR(30) NULL DEFAULT NULL , apilogin VARCHAR(30) NULL DEFAULT NULL , correo_remite VARCHAR(120) NULL DEFAULT NULL , responseUrl TEXT NULL DEFAULT NULL , confirmationUrl TEXT NULL DEFAULT NULL , PRIMARY KEY (id)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `usuarios` ADD `posicion` VARCHAR(60) NULL DEFAULT '0' AFTER `nivel`, ADD `id_licencia` INT NOT NULL DEFAULT '0' AFTER `posicion`;

ALTER TABLE `usuarios` CHANGE `nivel` `nivel` INT(2) NOT NULL DEFAULT '0' COMMENT 'Nivel del usuario';

ALTER TABLE `configuraciones` ADD `minutos_inactividad` INT NOT NULL DEFAULT '60' COMMENT 'minutos que transcurren para cerrar sesión por inactividad (por defecto se cierra a la hora)' AFTER `validar_codbarras`;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
