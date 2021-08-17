-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-10-2018 a las 23:59:03
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
-- Estructura de tabla para la tabla `bodegas`
--

DELIMITER |

DROP TRIGGER IF EXISTS `d_obtener_nombreapp_insert` |

CREATE TRIGGER `d_obtener_nombreapp_insert` BEFORE INSERT ON `aplicaciones_permisos`
  FOR EACH ROW BEGIN 
    SET NEW.aplicacion = (select m.nombre from aplicaciones_menu m where m.item_menu=NEW.item_menu);
  END
|

DROP TRIGGER IF EXISTS `d_obtener_nombreapp_update` |

CREATE TRIGGER `d_obtener_nombreapp_update` BEFORE UPDATE ON `aplicaciones_permisos`
  FOR EACH ROW BEGIN 
    SET NEW.aplicacion = (select m.nombre from aplicaciones_menu m where m.item_menu=NEW.item_menu);
  END
|

DELIMITER ;
 
DELIMITER |

DROP TRIGGER IF EXISTS `dv_d_desc_insert` |

CREATE TRIGGER `dv_d_desc_insert` BEFORE INSERT ON `detalleventa`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dv_d_desc_update` |

CREATE TRIGGER `dv_d_desc_update` BEFORE UPDATE ON `detalleventa`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;



DELIMITER |

DROP TRIGGER IF EXISTS `dp_d_desc_insert` |

CREATE TRIGGER `dp_d_desc_insert` BEFORE INSERT ON `detallepedido`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dp_d_desc_update` |

CREATE TRIGGER `dp_d_desc_update` BEFORE UPDATE ON `detallepedido`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;



DELIMITER |

DROP TRIGGER IF EXISTS `dc_d_desc_insert` |

CREATE TRIGGER `dc_d_desc_insert` BEFORE INSERT ON `detallecompra`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dc_d_desc_update` |

CREATE TRIGGER `dc_d_desc_update` BEFORE UPDATE ON `detallecompra`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;




DELIMITER |

DROP TRIGGER IF EXISTS `dnm_d_desc_insert` |

CREATE TRIGGER `dnm_d_desc_insert` BEFORE INSERT ON `detallenotamov`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.producto);
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dnm_d_desc_update` |

CREATE TRIGGER `dnm_d_desc_update` BEFORE UPDATE ON `detallenotamov`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.producto);
  END
|


DELIMITER ;



DELIMITER |

DROP TRIGGER IF EXISTS `dpd_d_desc_insert` |

CREATE TRIGGER `dpd_d_desc_insert` BEFORE INSERT ON `detalleprod`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dpd_d_desc_update` |

CREATE TRIGGER `dpd_d_desc_update` BEFORE UPDATE ON `detalleprod`
  FOR EACH ROW BEGIN 
    SET NEW.descr = (select p.nompro from productos p where p.idprod=NEW.idpro);
  END
|


DELIMITER ;
  
DELIMITER |

DROP TRIGGER IF EXISTS `pself_d_insert` |

CREATE TRIGGER `pself_d_insert` AFTER INSERT ON `pedidos`
  FOR EACH ROW BEGIN 
  
	DECLARE NOMVENDEDOR VARCHAR(120);
	
	SET NOMVENDEDOR = (select nombres from terceros  where idtercero=New.vendedor);
	
    INSERT INTO pedidos_self (select p.* from pedidos p where p.idpedido=NEW.idpedido);
	
	if((select t.es_restaurante from terceros t where t.idtercero=New.idcli)='SI') then
	update terceros c set c.disponible='NO',c.id_pedido_tmp=New.idpedido,c.n_pedido_tmp=(concat((select r.prefijo from resdian r where r.Idres=New.prefijo_ped),'/',New.numpedido)),c.total_pedido_tmp=New.total,c.obs_pedido_tmp=New.observaciones,c.vend_pedido_tmp=NOMVENDEDOR  where c.idtercero=New.idcli;
	end if;
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `pself_d_update` |

CREATE TRIGGER `pself_d_update` AFTER UPDATE ON `pedidos`
  FOR EACH ROW BEGIN 
  
	DECLARE NOMVENDEDOR VARCHAR(120);
	
	SET NOMVENDEDOR = (select nombres from terceros  where idtercero=New.vendedor);

    UPDATE pedidos_self s inner join pedidos p on s.idpedido=p.idpedido 
    set 
    s.numfacven=p.numfacven, s.nremision=p.nremision, s.credito=p.credito, s.fechaven=p.fechaven, s.fechavenc=p.fechavenc, s.idcli=p.idcli, s.subtotal=p.subtotal, s.valoriva=p.valoriva, s.total=p.total, s.facturado=p.facturado, s.asentada=p.asentada, s.observaciones=p.observaciones, s.saldo=p.saldo, s.adicional=p.adicional, s.formapago=p.formapago, s.adicional2=p.adicional2, s.adicional3=p.adicional3, s.obspago=p.obspago, s.vendedor=p.vendedor, s.dircliente=p.dircliente, s.numpedido=p.numpedido, s.prefijo_ped=p.prefijo_ped, s.tipo_doc=p.tipo_doc, s.usuario=p.usuario, s.fechadocu=p.fechadocu, s.origen=p.origen, s.iddocumento=p.iddocumento, s.creado_en_movil=p.creado_en_movil,s.disponible_en_movil=p.disponible_en_movil;
	
	if((select p.idpedido from pedidos p where p.asentada='0' and p.idpedido=Old.idpedido) IS NOT NULL) THEN
			
		update terceros set disponible='NO',id_pedido_tmp=New.idpedido,n_pedido_tmp=(concat((select r.prefijo from resdian r where r.Idres=New.prefijo_ped),'/',New.numpedido)),total_pedido_tmp=New.total,obs_pedido_tmp=New.observaciones,vend_pedido_tmp=NOMVENDEDOR where idtercero=New.idcli;
	ELSE
		update terceros set disponible='SI',id_pedido_tmp='0',n_pedido_tmp=NULL,total_pedido_tmp='0',obs_pedido_tmp=NULL,vend_pedido_tmp=NULL where idtercero=New.idcli;		
	END IF;
  END
|


DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `de_pedidos` |

CREATE TRIGGER `de_pedidos` AFTER DELETE ON `pedidos`
  FOR EACH ROW BEGIN 
	
	update terceros set disponible='SI',id_pedido_tmp='0',n_pedido_tmp=NULL,total_pedido_tmp='0',obs_pedido_tmp=NULL,vend_pedido_tmp=NULL where idtercero=Old.idcli;		
	
  END
|


DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `du_pedidos` |

CREATE TRIGGER `du_pedidos` BEFORE UPDATE ON `pedidos`
  FOR EACH ROW BEGIN 
  
	IF (New.asentada=1) THEN
		set New.subtotal=(select sum((d.valorunit*d.cantidad)-d.descuento) from detallepedido d where d.idpedid=Old.idpedido);
		set New.valoriva=(select sum(d.iva) from detallepedido d where d.idpedid=Old.idpedido);
		set New.total=(select sum((d.valorunit*d.cantidad)-d.descuento) from detallepedido d where d.idpedid=Old.idpedido);
	ELSE
		set New.subtotal=(select sum((d.valorunit*d.cantidad)-d.descuento) from detallepedido d where d.idpedid=Old.idpedido);
		set New.valoriva=(select sum(d.iva) from detallepedido d where d.idpedid=Old.idpedido);
		set New.total=(select sum((d.valorunit*d.cantidad)-d.descuento) from detallepedido d where d.idpedid=Old.idpedido);
		set New.saldo=(select sum((d.valorunit*d.cantidad)-d.descuento) from detallepedido d where d.idpedid=Old.idpedido);
	END IF;
  END
|


DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `dpself_d_insert` |

CREATE TRIGGER `dpself_d_insert` AFTER INSERT ON `detallepedido`
  FOR EACH ROW BEGIN 
    INSERT INTO detallepedido_self (select d.* from detallepedido d where d.iddet=NEW.iddet);
	
	update pedidos set subtotal=(select sum(d.valorpar) from detallepedido d where d.idpedid=New.idpedid),valoriva=(select sum(d.iva) from detallepedido d where d.idpedid=New.idpedid),total=(select sum(d.valorpar) from detallepedido d where d.idpedid=New.idpedid), saldo=(select sum(d.valorpar) from detallepedido d where d.idpedid=New.idpedid) where idpedido=New.idpedid;
  END
|


DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `dpself_d_update` |

CREATE TRIGGER `dpself_d_update` AFTER UPDATE ON `detallepedido`
  FOR EACH ROW BEGIN 
    UPDATE detallepedido_self ds inner join detallepedido d on ds.iddet=d.iddet
    SET
    ds.idpedid=d.idpedid, ds.numfac=d.numfac, ds.remision=d.remision, ds.idpro=d.idpro, ds.unidadmayor=d.unidadmayor, ds.factor=d.factor, ds.idbod=d.idbod, ds.costop=d.costop, ds.cantidad=d.cantidad, ds.valorunit=d.valorunit, ds.valorpar=d.valorpar, ds.iva=d.iva, ds.descuento=d.descuento, ds.adicional=d.adicional, ds.adicional1=d.adicional1, ds.devuelto=d.devuelto, ds.colores=d.colores, ds.tallas=d.tallas, ds.sabor=d.sabor, ds.estado_comanda=d.estado_comanda, ds.usuario_comanda=d.usuario_comanda, ds.tercero_comanda=d.tercero_comanda, ds.hora_inicio=d.hora_inicio, ds.hora_final=d.hora_final, ds.observ=d.observ, ds.cerrado=d.cerrado, ds.obs=d.obs, ds.descr=d.descr;
	
	update pedidos set subtotal=(select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid),valoriva=(select sum(d.iva) from detallepedido d where d.idpedid=Old.idpedid),total=(select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid), saldo=(select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid) where idpedido=Old.idpedid;
  END
|

DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `de_detallepedido` |

CREATE TRIGGER `de_detallepedido` AFTER DELETE ON `detallepedido`
  FOR EACH ROW BEGIN 
	
	IF(EXISTS(select d.idpedid from detallepedido d where d.idpedid=Old.idpedid limit 1)) THEN
		update pedidos set subtotal=coalesce((select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid),'0'),valoriva=coalesce((select sum(d.iva) from detallepedido d where d.idpedid=Old.idpedid),'0'),total=coalesce((select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid),'0'), saldo=coalesce((select sum(d.valorpar) from detallepedido d where d.idpedid=Old.idpedid),'0') where idpedido=Old.idpedid;
	ELSE
		update pedidos set subtotal='0',valoriva='0',total='0', saldo='0' where idpedido=Old.idpedid;
	END IF;
  END
|

DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `inv_d_saldos_insert` |

CREATE TRIGGER `inv_d_saldos_insert` AFTER INSERT ON `inventario`
  FOR EACH ROW BEGIN 
  
	DECLARE VPERIODO INT DEFAULT 0;
	DECLARE VCANTIDAD DOUBLE DEFAULT 0;
	DECLARE VVENCE DATE;
	DECLARE VLOTE2 VARCHAR(20);
	DECLARE VPROD  INT;
	DECLARE VCODIGOBAR VARCHAR(20);
	DECLARE VIDBOD INT;
	DECLARE VIDINV INT DEFAULT 0;
	DECLARE VANIO INT DEFAULT 0;
	
	SET VPERIODO = MONTH(NOW());
	SET VANIO = YEAR(NOW());
	
	IF(EXISTS(SELECT id_prod FROM saldos WHERE id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO)) THEN
		
		IF (VPERIODO = 1) THEN
				UPDATE saldos set saldo_ene=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_ene=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_ene where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 2) THEN
				UPDATE saldos set saldo_feb=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_feb=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_feb where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 3) THEN
				UPDATE saldos set saldo_marz=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_marz=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_marz where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 4) THEN
				UPDATE saldos set saldo_abril=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_abril=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_abril where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 5) THEN
				UPDATE saldos set saldo_may=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_may=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_may where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 6) THEN
				UPDATE saldos set saldo_jun=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_jun=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_jun where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 7) THEN
				UPDATE saldos set saldo_julio=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_julio=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_julio where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 8) THEN
				UPDATE saldos set saldo_agos=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_agos=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_agos where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 9) THEN
				UPDATE saldos set saldo_sep=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_sep=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_sep where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 10) THEN
				UPDATE saldos set saldo_oct=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_oct=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_oct where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 11) THEN
				UPDATE saldos set saldo_nov=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_nov=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_nov where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 12) THEN
				UPDATE saldos set saldo_dic=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_dic=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_dic where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
	ELSE
	
		IF (VPERIODO = 1) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_ene,costo_ene,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_ene,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 2) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_feb,costo_feb,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_feb,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 3) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_marz,costo_marz,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_marz,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;	
		
		IF (VPERIODO = 4) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_abril,costo_abril,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_abril,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 5) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_may,costo_may,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_may,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 6) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_jun,costo_jun,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_jun,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 7) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_julio,costo_julio,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_julio,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 8) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_agos,costo_agos,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_agos,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 9) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_sep,costo_sep,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_sep,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 10) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_oct,costo_oct,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_oct,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 11) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_nov,costo_nov,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_nov,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 12) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_dic,costo_dic,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_dic,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
	END IF;
	
	SET VVENCE = NEW.fechavenc;
	SET VLOTE2 = NEW.lote2;
	SET VPROD  = NEW.idpro;
	SET VCODIGOBAR = NEW.codigobar;
	SET VIDBOD = NEW.idbod;
	
	
	IF(NEW.fechavenc is not null and NEW.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(NEW.fechavenc is null and NEW.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc is null and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento is null and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(NEW.fechavenc is not null and NEW.lote2 is null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2 is null and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote is null and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;

	
	SET VIDINV = VIDINV + 0;
	
	IF(VIDINV>0)THEN
	
		IF(NEW.fechavenc is not null and NEW.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=NEW.fechavenc and lote=NEW.lote2 and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
		IF(NEW.fechavenc is null and NEW.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento is null and lote=NEW.lote2 and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
		IF(NEW.fechavenc is not null and NEW.lote2 is null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=NEW.fechavenc and lote is null and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
	ELSE
		
		IF((VVENCE is not null or VLOTE2 is not null) and VIDBOD > 0) THEN 
		
			insert into vencimiento_lote(idproducto,fecha_vencimiento,lote,existencia,idbodega)values(VPROD,VVENCE,VLOTE2,VCANTIDAD,VIDBOD);
			
		END IF;
        
	END IF;
  END |
  

DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `inv_d_saldos_delete` |

CREATE TRIGGER `inv_d_saldos_delete` AFTER DELETE ON `inventario`
  FOR EACH ROW BEGIN 
  
	DECLARE VPERIODO INT;
	DECLARE VCANTIDAD DOUBLE DEFAULT 0;
	DECLARE VVENCE DATE;
	DECLARE VLOTE2 VARCHAR(20);
	DECLARE VPROD  INT;
	DECLARE VCODIGOBAR VARCHAR(20);
	DECLARE VIDBOD INT;
	DECLARE VIDINV INT DEFAULT 0;
	DECLARE VANIO INT DEFAULT 0;
	
	SET VPERIODO = MONTH(NOW());
	SET VANIO = YEAR(NOW());
	
	IF(EXISTS(SELECT id_prod FROM saldos WHERE id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO)) THEN
		
		IF (VPERIODO = 1) THEN
				UPDATE saldos set saldo_ene=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_ene=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_ene where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 2) THEN
				UPDATE saldos set saldo_feb=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_feb=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_feb where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 3) THEN
				UPDATE saldos set saldo_marz=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_marz=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_marz where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 4) THEN
				UPDATE saldos set saldo_abril=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_abril=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_abril where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 5) THEN
				UPDATE saldos set saldo_may=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_may=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_may where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 6) THEN
				UPDATE saldos set saldo_jun=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_jun=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_jun where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 7) THEN
				UPDATE saldos set saldo_julio=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_julio=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_julio where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 8) THEN
				UPDATE saldos set saldo_agos=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_agos=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_agos where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 9) THEN
				UPDATE saldos set saldo_sep=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_sep=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_sep where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 10) THEN
				UPDATE saldos set saldo_oct=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_oct=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_oct where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 11) THEN
				UPDATE saldos set saldo_nov=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_nov=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_nov where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 12) THEN
				UPDATE saldos set saldo_dic=(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),costo_dic=(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_dic where id_prod=OLD.idpro and id_bodega=OLD.idbod and anio=VANIO;
		END IF;
	ELSE
	
		IF (VPERIODO = 1) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_ene,costo_ene,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_ene,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 2) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_feb,costo_feb,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_feb,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 3) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_marz,costo_marz,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_marz,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;	
		
		IF (VPERIODO = 4) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_abril,costo_abril,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_abril,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 5) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_may,costo_may,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_may,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 6) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_jun,costo_jun,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_jun,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 7) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_julio,costo_julio,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_julio,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 8) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_agos,costo_agos,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_agos,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 9) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_sep,costo_sep,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_sep,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 10) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_oct,costo_oct,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_oct,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 11) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_nov,costo_nov,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_nov,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 12) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_dic,costo_dic,descr,anio)VALUES(OLD.idpro,OLD.idbod,(select sum(i.cantidad) from inventario i where i.idpro=OLD.idpro and i.idbod=OLD.idbod),(select p.costomen from productos p where p.idprod=OLD.idpro)*saldo_dic,(select p.nompro from productos p where p.idprod=OLD.idpro),VANIO);
		END IF;
		
	END IF;
	
	SET VVENCE = OLD.fechavenc;
	SET VLOTE2 = OLD.lote2;
	SET VPROD  = OLD.idpro;
	SET VCODIGOBAR = OLD.codigobar;
	SET VIDBOD = OLD.idbod;
	
	
	IF(OLD.fechavenc is not null and OLD.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(OLD.fechavenc is null and OLD.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc is null and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento is null and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(OLD.fechavenc is not null and OLD.lote2 is null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2 is null and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote is null and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	SET VIDINV = VIDINV + 0;
	
	IF(VIDINV>0)THEN
	
		IF(OLD.fechavenc is not null and OLD.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=OLD.fechavenc and lote=OLD.lote2 and idproducto=OLD.idpro and idbodega=OLD.idbod;
		END IF;
		
		IF(OLD.fechavenc is null and OLD.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento is null and lote=OLD.lote2 and idproducto=OLD.idpro and idbodega=OLD.idbod;
		END IF;
		
		IF(OLD.fechavenc is not null and OLD.lote2 is null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=OLD.fechavenc and lote is null and idproducto=OLD.idpro and idbodega=OLD.idbod;
		END IF;
        
	END IF;
    
  END |
  

DELIMITER ;


DELIMITER |

DROP TRIGGER IF EXISTS `inv_d_saldos_update` |

CREATE TRIGGER `inv_d_saldos_update` AFTER UPDATE ON `inventario`
  FOR EACH ROW BEGIN 
  
	DECLARE VPERIODO INT DEFAULT 0;
	DECLARE VCANTIDAD DOUBLE DEFAULT 0;
	DECLARE VVENCE DATE;
	DECLARE VLOTE2 VARCHAR(20);
	DECLARE VPROD  INT;
	DECLARE VCODIGOBAR VARCHAR(20);
	DECLARE VIDBOD INT;
	DECLARE VIDINV INT DEFAULT 0;
	DECLARE VANIO INT DEFAULT 0;
	
	SET VPERIODO = MONTH(NOW());
	SET VANIO = YEAR(NOW());
	
	IF(EXISTS(SELECT id_prod FROM saldos WHERE id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO)) THEN
		
		IF (VPERIODO = 1) THEN
				UPDATE saldos set saldo_ene=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_ene=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_ene where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 2) THEN
				UPDATE saldos set saldo_feb=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_feb=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_feb where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 3) THEN
				UPDATE saldos set saldo_marz=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_marz=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_marz where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 4) THEN
				UPDATE saldos set saldo_abril=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_abril=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_abril where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 5) THEN
				UPDATE saldos set saldo_may=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_may=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_may where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 6) THEN
				UPDATE saldos set saldo_jun=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_jun=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_jun where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 7) THEN
				UPDATE saldos set saldo_julio=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_julio=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_julio where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 8) THEN
				UPDATE saldos set saldo_agos=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_agos=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_agos where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 9) THEN
				UPDATE saldos set saldo_sep=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_sep=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_sep where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 10) THEN
				UPDATE saldos set saldo_oct=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_oct=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_oct where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 11) THEN
				UPDATE saldos set saldo_nov=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_nov=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_nov where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
		
		IF (VPERIODO = 12) THEN
				UPDATE saldos set saldo_dic=(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),costo_dic=(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_dic where id_prod=NEW.idpro and id_bodega=NEW.idbod and anio=VANIO;
		END IF;
	ELSE
	
		IF (VPERIODO = 1) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_ene,costo_ene,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_ene,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 2) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_feb,costo_feb,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_feb,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 3) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_marz,costo_marz,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_marz,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;	
		
		IF (VPERIODO = 4) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_abril,costo_abril,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_abril,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 5) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_may,costo_may,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_may,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 6) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_jun,costo_jun,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_jun,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 7) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_julio,costo_julio,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_julio,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 8) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_agos,costo_agos,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_agos,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 9) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_sep,costo_sep,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_sep,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 10) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_oct,costo_oct,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_oct,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 11) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_nov,costo_nov,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_nov,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
		IF (VPERIODO = 12) THEN
			INSERT INTO saldos (id_prod,id_bodega,saldo_dic,costo_dic,descr,anio)VALUES(NEW.idpro,NEW.idbod,(select sum(i.cantidad) from inventario i where i.idpro=NEW.idpro and i.idbod=NEW.idbod),(select p.costomen from productos p where p.idprod=NEW.idpro)*saldo_dic,(select p.nompro from productos p where p.idprod=NEW.idpro),VANIO);
		END IF;
		
	END IF;
	
	SET VVENCE = NEW.fechavenc;
	SET VLOTE2 = NEW.lote2;
	SET VPROD  = NEW.idpro;
	SET VCODIGOBAR = NEW.codigobar;
	SET VIDBOD = NEW.idbod;
	
	
	IF(NEW.fechavenc is not null and NEW.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(NEW.fechavenc is null and NEW.lote2 is not null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc is null and lote2=VLOTE2 and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento is null and lote=VLOTE2 and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;
	
	IF(NEW.fechavenc is not null and NEW.lote2 is null) THEN 
		
		SET VCANTIDAD = (select coalesce(sum(cantidad),0) from inventario where fechavenc=VVENCE and lote2 is null and idpro=VPROD and idbod=VIDBOD);
		SET VIDINV = (select coalesce(idvenclote) from vencimiento_lote where fecha_vencimiento=VVENCE and lote is null and idproducto=VPROD and idbodega=VIDBOD);
	
	END IF;

	
	SET VIDINV = VIDINV + 0;
	
	IF(VIDINV>0)THEN
	
		IF(NEW.fechavenc is not null and NEW.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=NEW.fechavenc and lote=NEW.lote2 and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
		IF(NEW.fechavenc is null and NEW.lote2 is not null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento is null and lote=NEW.lote2 and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
		IF(NEW.fechavenc is not null and NEW.lote2 is null) THEN 
			update vencimiento_lote set existencia=VCANTIDAD where fecha_vencimiento=NEW.fechavenc and lote is null and idproducto=NEW.idpro and idbodega=NEW.idbod;
		END IF;
		
	ELSE
		
		IF((VVENCE is not null or VLOTE2 is not null) and VIDBOD > 0) THEN 
		
			insert into vencimiento_lote(idproducto,fecha_vencimiento,lote,existencia,idbodega)values(VPROD,VVENCE,VLOTE2,VCANTIDAD,VIDBOD);
			
		END IF;
        
	END IF;
    
  END |
  

DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `d_colocar_lfs_en_inventario_i` |

CREATE TRIGGER `d_colocar_lfs_en_inventario_i` AFTER INSERT ON `detallenotamov`
  FOR EACH ROW BEGIN
  DECLARE LAFECHA DATE;
  DECLARE ELCOSTO DECIMAL (12,0) DEFAULT 0;
  DECLARE ELVPARCIAL DECIMAL (12,0) DEFAULT 0;
  DECLARE LABODEGA INT (10);
  DECLARE ELTIPO INT (1) DEFAULT 0;
  DECLARE ELDETALLE VARCHAR (255);
  DECLARE LAFVENC DATE;
  DECLARE ELLOTE VARCHAR (20);
  DECLARE ELSERIAL VARCHAR (20);
  DECLARE SIENTREBOD INT (2);
  DECLARE LABODORI INT (10);
   
  SET LAFECHA = (select m.fecha from movimiento m where m.idmov=NEW.idmovi);
 
  SET ELCOSTO = (SELECT p.costomen FROM productos p WHERE idprod=NEW.producto);
  
  SET ELVPARCIAL = (NEW.cantidad *(SELECT p.costomen FROM productos p WHERE idprod=NEW.producto));
  
  SET LABODEGA = (select m.idboddes from movimiento m where m.idmov=NEW.idmovi);
  
  SET ELTIPO = (SELECT IF (NEW.cantidad>0,1,2));
  
  SET ELDETALLE = (SELECT t.nombre FROM tipotransfe t where t.idtipo=(SELECT mo.idtipotran from movimiento mo WHERE mo.idmov=NEW.idmovi ));
  
  
  IF(NEW.fechavenc IS NOT NULL AND NEW.fechavenc<>'') THEN
  
  	SET LAFVENC=NEW.fechavenc;
 
  ELSE
  	SET LAFVENC = NULL;
  END IF;
  
  IF(NEW.lote IS NOT NULL AND NEW.lote<>'') THEN
  
  	SET ELLOTE=NEW.lote;
 
  ELSE
  	SET ELLOTE = NULL;
  END IF;
  
  IF(NEW.codigobar IS NOT NULL AND NEW.codigobar<>'') THEN
  
  	SET ELSERIAL=NEW.codigobar;
 
  ELSE
  	SET ELSERIAL = NULL;
  END IF;
  
  SET SIENTREBOD = (SELECT mo.idtipotran from movimiento mo WHERE mo.idmov=NEW.idmovi );
                
  IF (SIENTREBOD <> 2) THEN
	INSERT INTO `inventario` (fecha, cantidad, idpro, costo, valorparcial, idbod, tipo, detalle, idmov, fechavenc, colores, tallas, sabor, lote2, codigobar_2)
	VALUES (LAFECHA, NEW.cantidad, NEW.producto, ELCOSTO, ELVPARCIAL, LABODEGA, ELTIPO, ELDETALLE, NEW.idnota, LAFVENC, NEW.colores, NEW.tallas, NEW.sabor, ELLOTE, ELSERIAL); 
   
  ELSE
	SET LABODORI = (select m.idbodorig from movimiento m where m.idmov=NEW.idmovi);
  
	INSERT INTO `inventario` (fecha, cantidad, idpro, costo, valorparcial, idbod, tipo, detalle, idmov, fechavenc, colores, tallas, sabor, lote2, codigobar_2)
	VALUES (LAFECHA, NEW.cantidad, NEW.producto, ELCOSTO, ELVPARCIAL, LABODEGA, 1, 'Traslado', NEW.idnota, LAFVENC, NEW.colores, NEW.tallas, NEW.sabor, ELLOTE, ELSERIAL);
	
	INSERT INTO `inventario` (fecha, cantidad, idpro, costo, valorparcial, idbod, tipo, detalle, idmov, fechavenc, colores, tallas, sabor, lote2, codigobar_2)
	VALUES (LAFECHA, (NEW.cantidad*-1), NEW.producto, ELCOSTO, ELVPARCIAL, LABODORI, 2, 'Traslado', NEW.idnota, LAFVENC, NEW.colores, NEW.tallas, NEW.sabor, ELLOTE, ELSERIAL);
  END IF;
  END
|

DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dp_ifacturaven` |

CREATE TRIGGER `dp_ifacturaven` BEFORE INSERT ON `facturaven`
  FOR EACH ROW BEGIN
	#asignamos la fecha y hora de creado
	if(New.creado is null or New.creado='')then
		set New.creado = Now();
		set New.editado = Now();
	end if;
  END|

DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dp_ufacturaven` |

CREATE TRIGGER `dp_ufacturaven` BEFORE UPDATE ON `facturaven`
  FOR EACH ROW BEGIN
	
	DECLARE done INT DEFAULT FALSE;
	DECLARE a VARCHAR(200);
	DECLARE b VARCHAR(12);
	DECLARE c int;
	DECLARE d VARCHAR(16);
	DECLARE e FLOAT(12,2);
	DECLARE sicomprobante VARCHAR(2);
	DECLARE ncuenta varchar(20);
	DECLARE nconsecutivo int;
	DECLARE vsaldo int;
	
	DECLARE detalle CURSOR FOR select idpro from detalleventa where numfac=Old.idfacven;
	DECLARE cliente CURSOR FOR select concat(documento,' ',nombres) as cliente from terceros where idtercero=Old.idcli;
	DECLARE prefijo CURSOR FOR select prefijo from resdian where Idres=Old.resolucion;
	
	DECLARE detalle_comprobante CURSOR FOR select g.puc_ingresos,sum(d.valorpar) from detalleventa d inner join productos p on d.idpro=p.idprod inner join grupos_contables g on p.cod_cuenta=g.codigo where d.numfac=Old.idfacven;
	
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	
	SET sicomprobante = (select habilitar_comprobantes from configuraciones order by idconfiguraciones desc limit 1);
	
	#asignamos la fecha y hora de editado
	set New.editado = Now();
	
    if (New.asentada='1') THEN
		if(New.tipo='FV' or New.tipo='RS') THEN
		
		
			#si esta activado para generar comprobante lo generamos
			IF(sicomprobante='SI') THEN
				#si es factura y se esta asentado generamos el comprobante de contabilidad
				if(New.tipo='FV') THEN
					
					#se crea el master del comprobante
					if(NOT EXISTS(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven)) THEN
						insert into comprobantes set tipo=New.tipo, prefijo=(select r.prefijo from resdian r where r.Idres=New.resolucion), numero=New.numfacven, fecha=New.fechaven, observaciones=(select t.nombres from terceros t where t.idtercero=New.idcli), total_debito=New.total, total_credito=New.total, asentada=1, periodo=MONTH(New.fechaven), sucursal=1, importado='NO', usuario=New.vendedor;
					END IF;
					
					#si es a contado buscamos la cuenta puc del banco y creamos y creamos el debito de la cuenta T
					#2 de contado, 1 a crédito 
					if(Old.credito=2) THEN
						
						#creamos el detalle de los comprobantes de tipo debito(debe)
						IF(NOT EXISTS(select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select b.puc from bancos b where b.idcaja_vta=Old.banco) and dc.comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven))) THEN
							insert into comprobantes_detalle set comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven), plan_cuenta=(select b.puc from bancos b where b.idcaja_vta=Old.banco), valor=New.total, tipo='debito', tercero=New.idcli, observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres=New.resolucion),New.numfacven), trifa='0', valor_iva='0', base='0', centro_costo='1';
						END IF;
					END IF;
					
					#creamos a cuenta clientes si es de credito 
					#2 de contado, 1 a crédito 
					if(Old.credito=1) THEN
						
						#creamos el detalle de los comprobantes de tipo debito(debe)
						IF(NOT EXISTS(select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero=New.idcli) and dc.comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven))) THEN
							insert into comprobantes_detalle set comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven), plan_cuenta=(select t.puc_auxiliar_deudores from terceros t where t.idtercero=New.idcli), valor=New.total, tipo='debito', tercero=New.idcli, observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres=New.resolucion),New.numfacven), trifa='0', valor_iva='0', base='0', centro_costo='1';
						END IF;
					END IF;
				END IF;
			END IF;
		
			#2 de contado, 1 a crédito 
			if(Old.credito=1) THEN
			
				if(EXISTS(select numero from terceros_cuentas where tipo=Old.tipo and numero_documento=concat((select r.prefijo from resdian r where r.Idres=Old.resolucion),'/',Old.numfacven))) THEN
					update terceros_cuentas set tercero=New.idcli,numero_documento=concat((select r.prefijo from resdian r where r.Idres=New.resolucion),'/',New.numfacven),tipo=New.tipo, valor_total=(New.total*-1), saldo=(New.total*-1),usuario=New.vendedor where numero_documento=concat((select r.prefijo from resdian r where r.Idres=Old.resolucion),'/',Old.numfacven) and tipo=Old.tipo;
				ELSE
					#traemos el consecutivo
					set nconsecutivo = coalesce((select c.consecutivo+1 from consecutivos c where c.prefijo='00' and c.tipodoc='TI'),0);
					if(nconsecutivo=0)then
					
						set nconsecutivo = coalesce((select max(numero)+1 as consecutivo from terceros_cuentas where ie='INGRESO' and prefijo='00'),0);
						if(nconsecutivo=0)then
							set nconsecutivo = 1;
						else
							insert into consecutivos set tipodoc='TI',prefijo='00',consecutivo=nconsecutivo;
						end if;
					end if;
					#si tenemos guardado un consecutivo lo usamos
					if(New.cod_cuenta is not null or New.cod_cuenta<>'')then
						set nconsecutivo = SUBSTRING_INDEX(New.cod_cuenta, '/', -1);
					else
						#actualizamos el consecutivo
						update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TI';
					end if;
					insert into terceros_cuentas set prefijo='00', numero=nconsecutivo, fecha=New.fechaven, tercero=New.idcli, ie='INGRESO', tipo=New.tipo, numero_documento=concat((select r.prefijo from resdian r where r.Idres=New.resolucion),'/',New.numfacven), valor_total=(New.total*-1), saldo=(New.total*-1),usuario=New.vendedor,automatico='SI',cod_cuenta=concat(prefijo,'/',numero),asentada='SI';
					#traemos la cuenta relacionada con la factura y la actualizamos en la columna cod_cuenta de facturaven
					set ncuenta = (select t.cod_cuenta from terceros_cuentas t where t.tipo=New.tipo and t.numero_documento=concat((select r.prefijo from resdian r where r.Idres=New.resolucion),'/',New.numfacven));
					#si hay cuenta actualizamos
					if(ncuenta<>'' and (New.cod_cuenta is null or New.cod_cuenta='')) then
						set New.cod_cuenta = ncuenta;
					end if;
				END IF;
				
				if(New.cod_cuenta is not null or New.cod_cuenta<>'')then
					set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.cod_cuenta and ie='INGRESO');
					update terceros_cuentas set saldo=vsaldo,pagada=(if(saldo=0,'SI','NO')) where cod_cuenta=New.cod_cuenta and ie='INGRESO';
				end if;
			END IF;
		
			open detalle;
			open cliente;
			open prefijo;
			
			read_loop:LOOP
			
				FETCH cliente INTO a;
				FETCH prefijo INTO b;
				FETCH detalle INTO c;
				
				IF done THEN
				LEAVE read_loop;
				END IF;
				
				update productos set ultima_venta=Old.fechaven,n_ultventa=concat(b,'-',Old.numfacven,' ',a) where idprod=c;
			
			END LOOP;
			
			
			#revisamos nuevamente si esta habilitado en configuracion la generacion de comprobantes de contabilidad y si si lo generamos
			IF(sicomprobante='SI') THEN
				SET done = FALSE;
				
				open detalle_comprobante;
				
				read_loop:LOOP
				
					FETCH detalle_comprobante INTO d,e;
					
					IF done THEN
					LEAVE read_loop;
					END IF;
					
					#creamos el detalle de los comprobantes de tipo credito(haber)
					IF(NOT EXISTS(select dc.plan_cuenta from comprobantes_detalle dc where dc.plan_cuenta=d and dc.comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven))) THEN
						insert into comprobantes_detalle set comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven), plan_cuenta=d, valor=e, tipo='credito', tercero=New.idcli, observacion=concat('Factura de Venta No. ',(select r.prefijo from resdian r where r.Idres=New.resolucion),New.numfacven), tipo_documento='FV', numero_documento=concat((select r.prefijo from resdian r where r.Idres=New.resolucion),New.numfacven), trifa='0', valor_iva='0', base='0', centro_costo='1';
					END IF;
				END LOOP;
			END IF;
			
		END IF;
	END IF;
	
	if (New.asentada='0') THEN
	
		#revisamos nuevamente si esta habilitado en configuracion la generacion de comprobantes de contabilidad y si si lo borramos al desasentar
		IF(sicomprobante='SI') THEN
			#borramos el comprobante cuando desasentamos
			if(New.tipo='FV') THEN
				
				delete from comprobantes_detalle where comprobante=(select c.idcomprobante from comprobantes c where c.tipo=Old.tipo and c.prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and c.numero=Old.numfacven);
				delete from comprobantes where tipo=Old.tipo and prefijo=(select r.prefijo from resdian r where r.Idres=Old.resolucion) and numero=Old.numfacven;
			END IF;
		END IF;
		
		if(Old.credito=1) THEN
			delete from terceros_cuentas where tercero=Old.idcli and tipo=Old.tipo and numero_documento=concat((select r.prefijo from resdian r where r.Idres=Old.resolucion),'/',Old.numfacven) and prefijo='00' and automatico='SI';
			
			#traemos el consecutivo
			set nconsecutivo = coalesce((select c.consecutivo from consecutivos c where concat(c.prefijo,'/',c.consecutivo)=New.cod_cuenta and c.tipodoc='TI'),0);
			if(nconsecutivo<>0)then
				#actualizamos el consecutivo
				update consecutivos set consecutivo=(consecutivo-1) where prefijo='00' and tipodoc='TI';
				set New.cod_cuenta = null;
			end if;
		END IF;
		
	END IF;
  END|

DELIMITER ;



DELIMITER $$
DROP TRIGGER IF EXISTS `dp_ufacturacom` $$
CREATE TRIGGER `dp_ufacturacom` BEFORE UPDATE ON `facturacom` FOR EACH ROW BEGIN
	
	DECLARE done INT DEFAULT FALSE;
	DECLARE a VARCHAR(200);
	DECLARE b int;
	DECLARE ncuenta VARCHAR(20);
	DECLARE nconsecutivo int;
	DECLARE vsaldo int;
	
	DECLARE detalle CURSOR FOR select idpro from detallecompra where idfaccom=Old.idfaccom;
	DECLARE proveedor CURSOR FOR select concat(documento,' ',nombres) as proveedor from terceros where idtercero=Old.idprov;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	
	
    if (New.asentada='1') THEN
	
		if(New.formapago='CREDITO') THEN
		
			if(EXISTS(select numero from terceros_cuentas where tipo='FC' and numero_documento=concat('00/',Old.numfacom))) THEN
				update terceros_cuentas set tercero=New.idprov,numero_documento=concat('00/',New.numfacom),tipo='FC', valor_total=New.total, saldo=New.total,usuario=New.usuario where numero_documento=concat('00/',Old.numfacom) and tipo='FC';
			ELSE
			
				#traemos el consecutivo
				set nconsecutivo = coalesce((select max(numero)+1 as consecutivo from terceros_cuentas where ie='EGRESO' and prefijo='00'),0);
				if(nconsecutivo=0)then
					set nconsecutivo = coalesce((select c.consecutivo+1 from consecutivos c where c.prefijo='00' and c.tipodoc='TE' limit 1),0);					
					if(nconsecutivo=0)then
						set nconsecutivo = 1;
						insert into consecutivos set tipodoc='TE',prefijo='00',consecutivo=nconsecutivo;
					else
						update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TE';
					end if;
				else
					#si tenemos guardado un consecutivo lo usamos
					if(New.cod_cuenta is not null and New.cod_cuenta<>'')then
						set nconsecutivo = SUBSTRING_INDEX(New.cod_cuenta, '/', -1);
					else
						#actualizamos el consecutivo
						update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TE';
					end if;
				end if;
					
				insert into terceros_cuentas set prefijo='00', numero=nconsecutivo, fecha=New.fechacom, tercero=New.idprov, ie='EGRESO', tipo='FC', numero_documento=concat('00/',New.numfacom), valor_total=New.total, saldo=New.total,usuario=New.usuario,automatico='SI',cod_cuenta=concat(prefijo,'/',numero),asentada='SI';
				#insert into terceros_cuentas set prefijo='00', numero=nconsecutivo, fecha=New.fechacom, tercero=New.idprov, ie='EGRESO', tipo='FC', numero_documento=concat('00/',New.numfacom), valor_total=New.total, saldo=New.total,usuario=New.usuario,automatico='SI',cod_cuenta=concat(prefijo,'/',numero);
			END IF;
			
			#traemos la cuenta relacionada con la factura y la actualizamos en la columna cod_cuenta de facturacom
			set ncuenta = (select t.cod_cuenta from terceros_cuentas t where t.tipo='FC' and t.numero_documento=concat('00/',New.numfacom));
			#si hay cuenta actualizamos
			if(ncuenta<>'' and (New.cod_cuenta is null or New.cod_cuenta='')) then
				set New.cod_cuenta = ncuenta;
			end if;
			
			set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.cod_cuenta and c.ie='EGRESO');
			update terceros_cuentas set saldo=vsaldo where cod_cuenta=New.cod_cuenta and ie='EGRESO';
		END IF;
		
			open detalle;
			open proveedor;
			
			read_loop:LOOP
			
				FETCH proveedor INTO a;
				FETCH detalle INTO b;
				
				IF done THEN
				LEAVE read_loop;
				END IF;
				
				update productos set ultima_compra=Old.fechacom,n_ultcompra=concat(Old.numfacom,' ',a) where idprod=b;
			
			END LOOP;
			
	END IF;
	
	if (New.asentada='0') THEN
		
		#traemos el consecutivo
		set nconsecutivo = coalesce((select max(numero) as consecutivo from terceros_cuentas where ie='EGRESO' and prefijo='00'),0);
		if(nconsecutivo=0)then
			set nconsecutivo = coalesce((select c.consecutivo from consecutivos c where concat(c.prefijo,'/',c.consecutivo)=New.cod_cuenta and c.tipodoc='TE' limit 1),0);
			if(nconsecutivo>0)then
				#actualizamos el consecutivo
				update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
				set New.cod_cuenta = null;
			else
				set nconsecutivo = 1;
				insert into consecutivos set tipodoc='TE',prefijo='00',consecutivo=nconsecutivo;
			end if;
		else
			if(New.cod_cuenta=concat('00/',nconsecutivo))then
				update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
				set New.cod_cuenta = null;
			end if;
		end if;
		
		if(Old.formapago='CREDITO') THEN
			delete from terceros_cuentas where tercero=Old.idprov and tipo='FC' and numero_documento=concat('00/',Old.numfacom) and automatico='SI';
		END IF;
	END IF;
	
	if (New.asentada IS NULL) THEN
		
		#traemos el consecutivo
		set nconsecutivo = coalesce((select max(numero) as consecutivo from terceros_cuentas where ie='EGRESO' and prefijo='00' limit 1),0);
		if(nconsecutivo=0)then
			set nconsecutivo = coalesce((select c.consecutivo from consecutivos c where concat(c.prefijo,'/',c.consecutivo)=New.cod_cuenta and c.tipodoc='TE' limit 1),0);
			if(nconsecutivo>0)then
				#actualizamos el consecutivo
				update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
				set New.cod_cuenta = null;
			else
				set nconsecutivo = 1;
				insert into consecutivos set tipodoc='TE',prefijo='00',consecutivo=nconsecutivo;
			end if;
		else
			update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
		end if;
		
		if(Old.formapago='CREDITO') THEN
			delete from terceros_cuentas where tercero=Old.idprov and tipo='FC' and numero_documento=concat('00/',Old.numfacom) and automatico='SI';
		END IF;
		
		set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.cod_cuenta and c.ie='EGRESO');
		update terceros_cuentas set saldo=vsaldo where cod_cuenta=New.cod_cuenta and ie='EGRESO';
	END IF;
  END
$$
DELIMITER ;


DELIMITER $$
DROP TRIGGER IF EXISTS `dp_upagos` $$
CREATE TRIGGER `dp_upagos` BEFORE UPDATE ON `pagos` FOR EACH ROW BEGIN

	#variable para la suma del valor total de los recibos de caja hechos a una factura
	DECLARE vsaldo int;
	DECLARE nconsecutivo int;
	
    if (New.asent='SI') THEN
		#si tiene cuenta
		if(New.ncuenta_tercero<>'') THEN 
			#si la cuenta existe borra la existente inserta la nueva contrapartida actualizada y actualiza el saldo de la cuenta padre
			if(EXISTS(select numero from terceros_cuentas where tipo='CE' and numero_documento=concat('00/',Old.numpago))) THEN
				#delete from terceros_cuentas where tercero=Old.client and tipo='CE' and numero_documento=concat('00/',Old.numpago) and automatico='SI';
				update terceros_cuentas set fecha=New.fecpago, tercero=New.client,numero_documento=concat('00/',New.numpago), valor_total=(New.montocan*-1), saldo=0,usuario=New.usuario,cod_cuenta=New.ncuenta_tercero  where tipo='CE' and numero_documento=concat('00/',Old.numpago);
				set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.ncuenta_tercero and ie='EGRESO');
				update terceros_cuentas t set t.saldo=vsaldo,t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=New.ncuenta_tercero and t.ie='EGRESO';
				update terceros_cuentas t set t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=New.ncuenta_tercero and t.ie='EGRESO';
			ELSE
			#si la cuenta no existe inserta la contrapartida y actualiza el saldo de la cuenta padre
			
				#traemos el consecutivo
				set nconsecutivo = coalesce((select max(numero)+1 as consecutivo from terceros_cuentas where ie='EGRESO' and prefijo='00'),0);
				if(nconsecutivo=0)then
					set nconsecutivo = coalesce((select c.consecutivo+1 from consecutivos c where c.prefijo='00' and c.tipodoc='TE'),0);					
					if(nconsecutivo=0)then
						set nconsecutivo = 1;
						insert into consecutivos set tipodoc='TE',prefijo='00',consecutivo=nconsecutivo;
					else
						update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TE';
					end if;
				else
					#si tenemos guardado un consecutivo lo usamos
					if(New.cod_cuenta is not null and New.cod_cuenta<>'')then
						set nconsecutivo = SUBSTRING_INDEX(New.cod_cuenta, '/', -1);
					else
						#actualizamos el consecutivo
						update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TE';
					end if;
				end if;
				
				insert into terceros_cuentas set prefijo='00', numero=nconsecutivo, fecha=New.fecpago, tercero=New.client, ie='EGRESO', tipo='CE', numero_documento=concat('00/',New.numpago), valor_total=(New.montocan*-1), saldo=0,usuario=New.usuario,automatico='SI',cod_cuenta=New.ncuenta_tercero,asentada='SI';
				set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.ncuenta_tercero and ie='EGRESO');
				update terceros_cuentas t set t.saldo=vsaldo,t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=New.ncuenta_tercero and t.ie='EGRESO';
				update terceros_cuentas t set t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=New.ncuenta_tercero and t.ie='EGRESO';
			END IF;
		END IF;
	ELSE
		#traemos el consecutivo
		set nconsecutivo = coalesce((select max(numero) as consecutivo from terceros_cuentas where ie='EGRESO' and prefijo='00'),0);
		if(nconsecutivo=0)then
			set nconsecutivo = coalesce((select c.consecutivo from consecutivos c where concat(c.prefijo,'/',c.consecutivo)=New.cod_cuenta and c.tipodoc='TE'),0);
			if(nconsecutivo>0)then
				#actualizamos el consecutivo
				update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
				set New.cod_cuenta = null;
			else
				set nconsecutivo = 1;
				insert into consecutivos set tipodoc='TE',prefijo='00',consecutivo=nconsecutivo;
			end if;
		else
			if(New.cod_cuenta=concat('00/',nconsecutivo))then
				update consecutivos set consecutivo=(nconsecutivo-1) where prefijo='00' and tipodoc='TE';
				set New.cod_cuenta = null;
			end if;
		end if;
		
		delete from terceros_cuentas where tercero=Old.client and tipo='CE' and numero_documento=concat('00/',Old.numpago) and automatico='SI';
		set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=Old.ncuenta_tercero and c.ie='EGRESO');
		update terceros_cuentas t set t.saldo=vsaldo,t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=Old.ncuenta_tercero and t.ie='EGRESO';
		update terceros_cuentas t set t.pagada='NO' where t.cod_cuenta=Old.ncuenta_tercero and t.ie='EGRESO';
	END IF;
  END
$$
DELIMITER ;

DELIMITER |

DROP TRIGGER IF EXISTS `dp_irecibocaja` |

CREATE TRIGGER `dp_irecibocaja` BEFORE INSERT ON `recibocaja`
  FOR EACH ROW BEGIN
	#asignamos la fecha y hora de creado
	if(New.creado is null or New.creado='')then
		set New.creado = Now();
		set New.editado = Now();
	end if;
  END|

DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_urecibocaja` $$
CREATE TRIGGER `dp_urecibocaja` BEFORE UPDATE ON `recibocaja` FOR EACH ROW BEGIN

	#variable para la suma del valor total de los recibos de caja hechos a una factura
	DECLARE vsaldo int;
	DECLARE nconsecutivo int;
	DECLARE ncuenta varchar(20);
	DECLARE nconsecutivoinicial int;
	DECLARE vtipo varchar(2);
	DECLARE vcroco int;
	
	#si asienta
    if (New.asentado='SI') THEN
		
		#revisamos si es de credito o contado
		if(New.doc_cobrado is not null and New.doc_cobrado <> '')then
			set vtipo  = (select f.tipo from facturaven f inner join resdian r on f.resolucion=r.Idres where concat(f.tipo,'/',r.prefijo,'/',f.numfacven)=New.doc_cobrado);
			set vcroco = (select f.credito from facturaven f inner join resdian r on f.resolucion=r.Idres where concat(f.tipo,'/',r.prefijo,'/',f.numfacven)=New.doc_cobrado);
		end if;
		
		if((vtipo='RS' or vtipo='FV') and vcroco=1)then
		
			#si la cuenta existe borra la existente inserta la nueva contrapartida actualizada y actualiza el saldo de la cuenta padre
			if(EXISTS(select numero from terceros_cuentas where tipo='RC' and numero_documento=concat('00/',Old.nurecibo))) THEN
				#delete from terceros_cuentas where tercero=Old.cliente and tipo='RC' and numero_documento=concat('00/',Old.nurecibo) and automatico='SI';
				update terceros_cuentas set fecha=New.fecharecibo, tercero=New.cliente,numero_documento=concat('00/',New.nurecibo), valor_total=New.monto, saldo=0,usuario=New.usuario,cod_cuenta=New.ncuenta_tercero where tipo='RC' and numero_documento=concat('00/',Old.nurecibo);
				set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.ncuenta_tercero and ie='INGRESO');
				update terceros_cuentas set saldo=vsaldo,pagada=(if(saldo=0,'SI','NO')) where cod_cuenta=New.ncuenta_tercero and ie='INGRESO';
			ELSE
				
				#traemos el consecutivo
				set nconsecutivo = coalesce((select c.consecutivo+1 from consecutivos c where c.prefijo='00' and c.tipodoc='TI'),0);
				if(nconsecutivo=0)then
					set nconsecutivo = coalesce((select max(numero)+1 as consecutivo from terceros_cuentas where ie='INGRESO' and prefijo='00'),0);
					if(nconsecutivo=0)then
						set nconsecutivo = 1;
					else
						insert into consecutivos set tipodoc='TI',prefijo='00',consecutivo=nconsecutivo;
					end if;
				end if;
				#si tenemos guardado un consecutivo lo usamos
				if(New.cod_cuenta is not null or New.cod_cuenta<>'')then
					set nconsecutivoinicial = SUBSTRING_INDEX(New.cod_cuenta, '/', -1);
					if(nconsecutivoinicial<>nconsecutivo)then
						set nconsecutivo = nconsecutivoinicial;
					end if;
				else
					#actualizamos el consecutivo
					update consecutivos set consecutivo=nconsecutivo where prefijo='00' and tipodoc='TI';
				end if;
				#si la cuenta no existe inserta la contrapartida y actualiza el saldo de la cuenta padre
				insert into terceros_cuentas set prefijo='00', numero=nconsecutivo, fecha=New.fecharecibo, tercero=New.cliente, ie='INGRESO', tipo='RC', numero_documento=concat('00/',New.nurecibo), valor_total=New.monto, saldo=0,usuario=New.usuario,automatico='SI',cod_cuenta=New.ncuenta_tercero,asentada='SI';
				
				#traemos la cuenta relacionada con la factura y la actualizamos en la columna cod_cuenta de facturaven
				set ncuenta = (select concat(t.prefijo,'/',t.numero) from terceros_cuentas t where t.tipo='RC' and t.numero_documento=concat('00/',New.nurecibo) and ie='INGRESO');
				#si hay cuenta actualizamos
				if(ncuenta<>'' and (New.cod_cuenta is null or New.cod_cuenta='')) then
					set New.cod_cuenta = ncuenta;
				end if;
				
				#actualizamos el total
				set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.ncuenta_tercero and ie='INGRESO');
				update terceros_cuentas t set t.saldo=vsaldo,t.pagada=(if(t.saldo=0,'SI','NO')) where t.cod_cuenta=New.ncuenta_tercero and ie='INGRESO';
			END IF;
		end if;
		
	ELSE
		#si des-asienta actualiza el saldo de la cuenta del tercero y borra el recibo de caja
		
		delete from terceros_cuentas where tercero=New.cliente and tipo='RC' and numero_documento=concat('00/',New.nurecibo) and automatico='SI';
		set vsaldo = (select sum(c.valor_total) from terceros_cuentas c where c.cod_cuenta=New.ncuenta_tercero and ie='INGRESO');
		update terceros_cuentas t set t.saldo=vsaldo,t.pagada='NO' where t.cod_cuenta=New.ncuenta_tercero and ie='INGRESO';
		
		#traemos el consecutivo
		set nconsecutivo = coalesce((select c.consecutivo from consecutivos c where concat(c.prefijo,'/',c.consecutivo)=New.cod_cuenta and c.tipodoc='TI'),0);
		if(nconsecutivo<>0)then
			#actualizamos el consecutivo
			update consecutivos set consecutivo=(consecutivo-1) where prefijo='00' and tipodoc='TI';
			set New.cod_cuenta = null;
		end if;
		
	END IF;
  END
$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_iterceros_cuentas` $$
CREATE TRIGGER `dp_iterceros_cuentas` AFTER INSERT ON `terceros_cuentas` FOR EACH ROW BEGIN
	#para actualizar las cuentas por cobrar
	if(New.ie='INGRESO') then
		update terceros set saldo=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=New.tercero and c.ie='INGRESO'),0) where idtercero=New.tercero;
	else
	#para actualizar las cuentas por pagar
		update terceros set saldoapagar=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=New.tercero and c.ie='EGRESO'),0) where idtercero=New.tercero;
	end if;
END
$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_uterceros_cuentas` $$
CREATE TRIGGER `dp_uterceros_cuentas` AFTER UPDATE ON `terceros_cuentas` FOR EACH ROW BEGIN
	#para actualizar las cuentas por cobrar
	if(New.ie='INGRESO') then
		update terceros set saldo=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=New.tercero and c.ie='INGRESO'),0) where idtercero=New.tercero;
	else
	#para actualizar las cuentas por pagar
		update terceros set saldoapagar=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=New.tercero and c.ie='EGRESO'),0) where idtercero=New.tercero;
	end if;
END
$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_eterceros_cuentas` $$
CREATE TRIGGER `dp_eterceros_cuentas` BEFORE DELETE ON `terceros_cuentas` FOR EACH ROW BEGIN
	#para actualizar las cuentas por cobrar
	if(Old.ie='INGRESO') then
		update terceros set saldo=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=Old.tercero and c.ie='INGRESO'),0) where idtercero=Old.tercero;
	else
	#para actualizar las cuentas por pagar
		update terceros set saldoapagar=coalesce((select sum(c.valor_total) from terceros_cuentas c where c.tercero=Old.tercero and c.ie='EGRESO'),0) where idtercero=Old.tercero;
	end if;
END
$$
DELIMITER ;


DELIMITER $$
DROP TRIGGER IF EXISTS `dp_icaja` $$
CREATE TRIGGER `dp_icaja` AFTER INSERT ON `caja` FOR EACH ROW BEGIN
	update bancos set entrada=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco and c.cantidad>0),0),salida=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco and c.cantidad<0),0),saldo=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco),0) where idcaja_vta = New.banco;
END
$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_ecaja` $$
CREATE TRIGGER `dp_ecaja` AFTER DELETE ON `caja` FOR EACH ROW BEGIN
	
	if(Old.cantidad>0) THEN
    update bancos set entrada=(entrada-Old.cantidad),saldo=(entrada+salida) where idcaja_vta = Old.banco;	
	END IF;
	
	if(Old.cantidad<0) THEN
    update bancos set salida=(salida+(Old.cantidad*-1)),saldo=(entrada-salida) where idcaja_vta = Old.banco;	
	END IF;
END
$$
DELIMITER ;

DELIMITER $$
DROP TRIGGER IF EXISTS `dp_ucaja` $$
CREATE TRIGGER `dp_ucaja` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN
    update bancos set entrada=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco and c.cantidad>0),0),salida=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco and c.cantidad<0),0),saldo=coalesce((select sum(c.cantidad) from caja c where c.banco=New.banco),0) where idcaja_vta = New.banco;	
END
$$
DELIMITER ;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
