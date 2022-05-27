ALTER TABLE `productos` ADD `ubicacion` VARCHAR(120) NULL DEFAULT NULL AFTER `imagen`;
ALTER TABLE `configuraciones` ADD `ver_grupo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `columna_reg_pdf_propio`, ADD `ver_codigo` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_grupo`, ADD `ver_imagen` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_codigo`, ADD `ver_existencia` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_imagen`, ADD `ver_unidad` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_existencia`, ADD `ver_precio` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_unidad`, ADD `ver_impuesto` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_precio`, ADD `ver_stock` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_impuesto`, ADD `ver_ubicacion` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_stock`, ADD `ver_costo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_ubicacion`, ADD `ver_proveedor` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_costo`, ADD `ver_combo` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_proveedor`;
ALTER TABLE `configuraciones` ADD `ver_agregar_nota` SET('SI','NO') NOT NULL DEFAULT 'SI' AFTER `ver_combo`;
ALTER TABLE `configuraciones` ADD `ver_busqueda_refinada` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `ver_agregar_nota`;
ALTER TABLE `configuraciones` ADD `cal_valores_decimales` INT NOT NULL DEFAULT '2' COMMENT 'Inicialmente para factura electrónica y luego irlo incluyendo en el resto de operaciones' AFTER `ver_busqueda_refinada`, ADD `cal_cantidades_decimales` INT NOT NULL DEFAULT '2' COMMENT 'Inicialmente para factura electrónica y luego irlo incluyendo en el resto de operaciones' AFTER `cal_valores_decimales`;

ALTER TABLE `facturaven` ADD `tipo_documento` VARCHAR(5) NOT NULL DEFAULT '1' COMMENT 'Aplica para desarrollo propio\r\n\r\n1. Venta nacional\r\n2. Exportacion\r\n3. Contingencia\r\n4. Venta AIU' AFTER `servidor`, ADD `note_aiu` VARCHAR(200) NULL DEFAULT NULL COMMENT 'Asunto de factura AIU' AFTER `tipo_documento`, ADD `porcentaje_admon` INT NOT NULL DEFAULT '0' COMMENT 'Porcentaje de administración en aiu propio' AFTER `note_aiu`, ADD `porcentaje_imprevisto` INT NOT NULL DEFAULT '0' COMMENT 'Porcentaje en imprevistos propio' AFTER `porcentaje_admon`, ADD `porcentaje_utilidad` INT NOT NULL DEFAULT '0' COMMENT 'Porcentaje utilidad aiu propio' AFTER `porcentaje_imprevisto`, ADD `monto_admon` DECIMAL(15.2) NOT NULL DEFAULT '0' COMMENT 'Monto administracion propio' AFTER `porcentaje_utilidad`, ADD `monto_imprevisto` DECIMAL(15.2) NOT NULL DEFAULT '0' COMMENT 'monto imprevisto propio' AFTER `monto_admon`, ADD `monto_utilidad` DECIMAL(15.2) NOT NULL DEFAULT '0' COMMENT 'monto utilidad propio' AFTER `monto_imprevisto`;
ALTER TABLE `facturaven` ADD `orden_compra` VARCHAR(50) NULL DEFAULT NULL AFTER `monto_utilidad`, ADD `orden_fecha` DATE NULL DEFAULT NULL AFTER `orden_compra`;

INSERT IGNORE `usuarios` (`idusuarios`,`creacion`, `usuario`, `password`, `nombre`, `correo`, `telefono`, `tercero`, `resolucion`, `grupo`, `activo`, `ultima_actualizacion`, `grupocomanda`, `nombre_pc`, `nombre_impre`, `sesion_id`, `acceso_inventario`, `acceso_gerencial`, `acceso_restaurante`, `sesion_id_movil`, `banco_movil`, `ubicacion`, `n_equipo`, `serial`, `idbod`, `ocultar_bod`) VALUES
(999,NOW(), 'facilweb', 'facilweb', 'FACILWEB', 'correo@dominio.com', '', 1, 1, 1, 'S', NOW(), NULL, NULL, NULL, NULL, 'NO', 'NO', 'NO', NULL, 1, 'VENTAS', 'PC', '0000000000', 0, 'SI');


ALTER TABLE `usuarios` CHANGE `grupocomanda` `grupocomanda` INT(11) NULL DEFAULT '0';
UPDATE `usuarios` SET `banco_movil` = '1' WHERE `usuarios`.`idusuarios` = 1;
UPDATE `usuarios` SET `sesion_id_movil` = NULL;


ALTER TABLE `webservicefe` ADD `envio_credenciales` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Activa la opción de enviar credenciales de acceso al clientes de factura electrónica antes de recibir la factura o documento. Aplica para desarrollo propio.' AFTER `url_api_sendmail`, ADD `plantillas_correo` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Activa la opción de usar plantillas de correo electrónica de factura electrónica en desarrollo propio.' AFTER `envio_credenciales`, ADD `copia_factura_a` VARCHAR(120) NULL DEFAULT NULL COMMENT 'correo para enviar copia de factura electrónica al enviar el documento electrónico. Aplica para desarrollo propio.' AFTER `plantillas_correo`;

ALTER TABLE `webservicefe` ADD `plantilla_pordefecto` INT NOT NULL DEFAULT '0' COMMENT 'El id del registro de la tabla donde está la plantilla a usar en el correo de factura electrónica de desarrollo propio.' AFTER `copia_factura_a`;

CREATE TABLE `plantillas_correo_propio` ( `id` INT NOT NULL AUTO_INCREMENT , `contenido` TEXT NULL DEFAULT NULL , `creado` DATETIME NULL DEFAULT NULL , `actualizado` DATETIME NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `plantillas_correo_propio` ADD `descripcion` VARCHAR(50) NULL DEFAULT NULL AFTER `actualizado`;

ALTER TABLE `plantillas_correo_propio` ADD `html_header` TEXT NULL DEFAULT NULL AFTER `descripcion`, ADD `html_body` TEXT NULL DEFAULT NULL AFTER `html_header`, ADD `html_buttons` TEXT NULL DEFAULT NULL AFTER `html_body`, ADD `html_footer` TEXT NULL DEFAULT NULL AFTER `html_buttons`;

INSERT IGNORE `plantillas_correo_propio` (`id`, `contenido`, `creado`, `actualizado`, `descripcion`, `html_header`, `html_body`, `html_buttons`, `html_footer`) VALUES
(1, NULL, '2021-09-24 18:13:33', '2021-09-27 20:15:10', 'Moderna', '<div style=\"border-radius: 5px; border: solid 1px gray; padding: 20px;\">\n<p>Señor(es), <strong>vNombreCliente</strong> identificado con CC/NIT <strong>vNit</strong></p>\n<p style=\"margin-bottom: 5px !important; margin-top: 5px !important;\">Le informamos ha recibido un documento electrónico de <strong>vNombreEmisor</strong>.</p>\n</div>', '<table style=\"width: 100%; text-align: center;\">\n<thead>\n<tr style=\"height: 18px;\">\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Número de documento</th>\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Fecha</th>\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Valor</th>\n</tr>\n</thead>\n<tbody>\n<tr style=\"height: 63px;\">\n<td style=\"height: 63px;\"><br />\n<p>vNumeroDocumento</p>\n</td>\n<td style=\"height: 63px;\"><br />\n<p>vFechaDocumento</p>\n</td>\n<td style=\"height: 63px;\"><br />\n<p>vTotalDocumento</p>\n</td>\n</tr>\n</tbody>\n</table>\n<p style=\"margin-bottom: 10px !important; padding-bottom: 10px !important; text-align: justify;\">Adjunto en este correo encontrará el <span style=\"color: red !important;\">PDF</span> y <span style=\"color: #0880e8 !important;\">XML</span> de su documento. Si requiere consultar el documento en línea haga clic en el siguiente enlace.</p>', '<table style=\"width: 100%; border-collapse: collapse;\" border=\"0\">\n<tbody>\n<tr>\n<td style=\"width: 257.172px;\">\n<p style=\"margin-bottom: 10px !important; padding-bottom: 10px !important; text-align: center;\"><a style=\"font-weight: bold; text-decoration: none; border: 2px solid #0880e8; padding: 10px 32px; color: #0880e8; border-radius: 50px; background: #fff; margin-bottom: 10px !important; text-align: center;\" href=\"vUrlPdfFactura\">Ver factura</a></p>\n</td>\n<td style=\"width: 540.828px; text-align: center;\"><a style=\"font-weight: bold; text-decoration: none; border: 2px solid #0880e8; padding: 10px 32px; color: #0880e8; border-radius: 50px; background: #fff; text-align: center;\" href=\"vUrlAceptarRechazar\">Aceptar y/o Rechazar documento</a></td>\n</tr>\n</tbody>\n</table>', '<p>Antes de imprimir este correo, valore si realmente es necesario. El medioambiente es cosa de todos.</p>\n<p style=\"text-align: justify;\">---------------------------------------------------------------------------------------------------------------------------<br />Por favor, no responda directamente a este correo. La cuenta de correo <strong>vCorreoEmisor</strong> tiene propósito exclusivamente informativo y no puede ser empleada como destino en comunicaciones.</p>\n<p style=\"text-align: justify;\"><br />Aviso de confidencialidad: Esta comunicación y los documentos que en su caso lleve anexos, son para uso exclusivo del destinatario arriba indicado y contienen información privilegiada y confidencial. Si Usted no es el destinatario original, queda informado de que, la divulgación, distribución o reproducción o cualquier otro uso tanto de la comunicación como de su contenido, sin la autorización del remitente, está terminantemente prohibida. En caso de haber recibido esta comunicación por error, notifíqueselo inmediatamente al remitente, absténgase de leerlo, copiarlo, remitirlo o entregarlo a un tercero y proceda a su destrucción. Las comunicaciones por medio de Internet no permiten asegurar ni garantizar su integridad y seguridad, o su correcta recepción, por lo que el emisor no asume responsabilidad alguna por tales circunstancias.</p>\n<p>---------------------------------------------------------------------------------------------------------------------------</p>');

ALTER TABLE `configuraciones` ADD `validar_codbarras` SET('SI','NO') NOT NULL DEFAULT 'NO' COMMENT 'Valida el código de barras al leerlo en venta rápida y permite seleccionar posteriormente el precio y digitar la cantidad' AFTER `cal_cantidades_decimales`;


ALTER TABLE `webservicefe` ADD `proveedor_anterior` VARCHAR(100) NULL DEFAULT NULL AFTER `plantilla_pordefecto`, ADD `servidor_anterior1` VARCHAR(300) NULL DEFAULT NULL AFTER `proveedor_anterior`, ADD `servidor_anterior2` VARCHAR(300) NULL DEFAULT NULL AFTER `servidor_anterior1`, ADD `servidor_anterior3` VARCHAR(300) NULL DEFAULT NULL AFTER `servidor_anterior2`, ADD `token_anterior` VARCHAR(150) NULL DEFAULT NULL AFTER `servidor_anterior3`, ADD `password_anterior` VARCHAR(150) NULL DEFAULT NULL AFTER `token_anterior`;

ALTER TABLE `facturaven_contratos` ADD `proveedor` VARCHAR(40) NULL DEFAULT NULL AFTER `aviso_nota`, ADD `token` VARCHAR(150) NULL DEFAULT NULL AFTER `proveedor`, ADD `password` VARCHAR(150) NULL DEFAULT NULL AFTER `token`, ADD `servidor` VARCHAR(300) NULL DEFAULT NULL AFTER `password`;

UPDATE `webservicefe_proveedores` SET `servidor1` = 'https://www.apifacilweb.com/public/api/ubl2.1/invoice' WHERE `webservicefe_proveedores`.`idwebservicefe_proveedor` = 4;

ALTER TABLE facilweb.empresas ADD `codempresa` VARCHAR(30) NULL DEFAULT NULL AFTER `celular`, ADD `nomina` SET('SI','NO') NOT NULL DEFAULT 'NO' AFTER `codempresa`;

ALTER TABLE facilweb.empresas ADD `nombre_empresa_nomina` VARCHAR(200) NULL DEFAULT NULL AFTER `nomina`;


CREATE TABLE `facturaven_clasificacion` ( `id` INT NOT NULL AUTO_INCREMENT , `descripcion` VARCHAR(60) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

INSERT INTO `facturaven_clasificacion` (`id`, `descripcion`) VALUES (1, 'Sin Clasificacion');

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

INSERT IGNORE `plantillas_correo_propio` (`id`, `contenido`, `creado`, `actualizado`, `descripcion`, `html_header`, `html_body`, `html_buttons`, `html_footer`) VALUES
(1, NULL, '2021-09-24 18:13:33', '2021-09-27 20:15:10', 'Moderna', '<div style=\"border-radius: 5px; border: solid 1px gray; padding: 20px;\">\n<p>Señor(es), <strong>vNombreCliente</strong> identificado con CC/NIT <strong>vNit</strong></p>\n<p style=\"margin-bottom: 5px !important; margin-top: 5px !important;\">Le informamos ha recibido un documento electrónico de <strong>vNombreEmisor</strong>.</p>\n</div>', '<table style=\"width: 100%; text-align: center;\">\n<thead>\n<tr style=\"height: 18px;\">\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Número de documento</th>\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Fecha</th>\n<th style=\"border: 1px solid #dddddd; padding: 8px; border-radius: 5px; height: 18px;\">Valor</th>\n</tr>\n</thead>\n<tbody>\n<tr style=\"height: 63px;\">\n<td style=\"height: 63px;\"><br />\n<p>vNumeroDocumento</p>\n</td>\n<td style=\"height: 63px;\"><br />\n<p>vFechaDocumento</p>\n</td>\n<td style=\"height: 63px;\"><br />\n<p>vTotalDocumento</p>\n</td>\n</tr>\n</tbody>\n</table>\n<p style=\"margin-bottom: 10px !important; padding-bottom: 10px !important; text-align: justify;\">Adjunto en este correo encontrará el <span style=\"color: red !important;\">PDF</span> y <span style=\"color: #0880e8 !important;\">XML</span> de su documento. Si requiere consultar el documento en línea haga clic en el siguiente enlace.</p>', '<table style=\"width: 100%; border-collapse: collapse;\" border=\"0\">\n<tbody>\n<tr>\n<td style=\"width: 257.172px;\">\n<p style=\"margin-bottom: 10px !important; padding-bottom: 10px !important; text-align: center;\"><a style=\"font-weight: bold; text-decoration: none; border: 2px solid #0880e8; padding: 10px 32px; color: #0880e8; border-radius: 50px; background: #fff; margin-bottom: 10px !important; text-align: center;\" href=\"vUrlPdfFactura\">Ver factura</a></p>\n</td>\n<td style=\"width: 540.828px; text-align: center;\"><a style=\"font-weight: bold; text-decoration: none; border: 2px solid #0880e8; padding: 10px 32px; color: #0880e8; border-radius: 50px; background: #fff; text-align: center;\" href=\"vUrlAceptarRechazar\">Aceptar y/o Rechazar documento</a></td>\n</tr>\n</tbody>\n</table>', '<p>Antes de imprimir este correo, valore si realmente es necesario. El medioambiente es cosa de todos.</p>\n<p style=\"text-align: justify;\">---------------------------------------------------------------------------------------------------------------------------<br />Por favor, no responda directamente a este correo. La cuenta de correo <strong>vCorreoEmisor</strong> tiene propósito exclusivamente informativo y no puede ser empleada como destino en comunicaciones.</p>\n<p style=\"text-align: justify;\"><br />Aviso de confidencialidad: Esta comunicación y los documentos que en su caso lleve anexos, son para uso exclusivo del destinatario arriba indicado y contienen información privilegiada y confidencial. Si Usted no es el destinatario original, queda informado de que, la divulgación, distribución o reproducción o cualquier otro uso tanto de la comunicación como de su contenido, sin la autorización del remitente, está terminantemente prohibida. En caso de haber recibido esta comunicación por error, notifíqueselo inmediatamente al remitente, absténgase de leerlo, copiarlo, remitirlo o entregarlo a un tercero y proceda a su destrucción. Las comunicaciones por medio de Internet no permiten asegurar ni garantizar su integridad y seguridad, o su correcta recepción, por lo que el emisor no asume responsabilidad alguna por tales circunstancias.</p>\n<p>---------------------------------------------------------------------------------------------------------------------------</p>');


CREATE TABLE licencias_planes ( id BIGINT NOT NULL AUTO_INCREMENT , codigo VARCHAR(6) NOT NULL DEFAULT '000000' , descripcion VARCHAR(120) NULL , porc_gan_lic_1nivel DECIMAL(4,2) NOT NULL DEFAULT '0' COMMENT 'porcentaje de ganancia licencias desde un primer nivel' , porc_gan_lic_2nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_1nivel DECIMAL(4,2) NOT NULL DEFAULT '0' COMMENT 'porcentaje de ganancia de documentos desde un primer nivel' , por_gan_doc_2nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_3nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , por_gan_doc_4nivel DECIMAL(4,2) NOT NULL DEFAULT '0' , creado TIMESTAMP NULL , actualizado TIMESTAMP NULL , usuario VARCHAR(30) NULL DEFAULT NULL , tercero INT NOT NULL DEFAULT '0' , PRIMARY KEY (id)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci COMMENT = 'Tabla para licencias y planes de facturación';

ALTER TABLE usuarios ADD nivel INT(2) NOT NULL DEFAULT '1' COMMENT 'Nivel del usuario' AFTER ocultar_bod;

CREATE TABLE payu ( id BIGINT NOT NULL AUTO_INCREMENT , id_usuario INT NOT NULL DEFAULT '0' , usuario VARCHAR(30) NULL DEFAULT NULL , apikey VARCHAR(60) NULL DEFAULT NULL , merchantid VARCHAR(30) NULL DEFAULT NULL , accountid VARCHAR(30) NULL DEFAULT NULL , apilogin VARCHAR(30) NULL DEFAULT NULL , correo_remite VARCHAR(120) NULL DEFAULT NULL , responseUrl TEXT NULL DEFAULT NULL , confirmationUrl TEXT NULL DEFAULT NULL , PRIMARY KEY (id)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

ALTER TABLE `usuarios` ADD `posicion` VARCHAR(60) NULL DEFAULT '0' AFTER `nivel`, ADD `id_licencia` INT NOT NULL DEFAULT '0' AFTER `posicion`;

ALTER TABLE `usuarios` CHANGE `nivel` `nivel` INT(2) NOT NULL DEFAULT '0' COMMENT 'Nivel del usuario';



