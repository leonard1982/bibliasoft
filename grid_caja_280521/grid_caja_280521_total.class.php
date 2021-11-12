<?php

class grid_caja_280521_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_fecha($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_ie($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_prefijo($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_banco($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_documento($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_detallle($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['contr_total_geral'] = "OK";
   } 

   //-----  fecha
   function quebra_fecha_fecha($fecha, $arg_sum_fecha) 
   {
      global $tot_fecha, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fecha . $arg_sum_fecha ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fecha . $arg_sum_fecha ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fecha[0] = NM_encode_input(sc_strip_script($fecha)) ; 
      $tot_fecha[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  fecha
   function quebra_fecha_sc_free_group_by($fecha, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_fecha[0] = NM_encode_input(sc_strip_script($fecha)) ; 
      $tot_fecha[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_fecha;
   } 

   //-----  detalle
   function quebra_detalle_sc_free_group_by($detalle, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_detalle = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_detalle[0] = sc_strip_script($detalle) ; 
      $tot_detalle[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_detalle[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_detalle;
   } 

   //-----  nota
   function quebra_nota_sc_free_group_by($nota, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_nota = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_nota[0] = sc_strip_script($nota) ; 
      $tot_nota[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_nota[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_nota;
   } 

   //-----  documento
   function quebra_documento_sc_free_group_by($documento, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_documento = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_documento[0] = sc_strip_script($documento) ; 
      $tot_documento[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_documento[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_documento;
   } 

   //-----  resolucion
   function quebra_resolucion_sc_free_group_by($resolucion, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_resolucion = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_resolucion[0] = NM_encode_input(sc_strip_script($resolucion)) ; 
      $tot_resolucion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_resolucion[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_resolucion;
   } 

   //-----  ie
   function quebra_ie_sc_free_group_by($ie, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_ie = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_ie[0] = sc_strip_script($ie) ; 
      $tot_ie[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_ie[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_ie;
   } 

   //-----  banco
   function quebra_banco_sc_free_group_by($banco, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_banco = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_banco[0] = NM_encode_input(sc_strip_script($banco)) ; 
      $tot_banco[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_banco[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_banco;
   } 

   //-----  cliente
   function quebra_cliente_sc_free_group_by($cliente, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_cliente = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where " . $Where_qb ; 
      } 
      else 
      { 
         $nm_comando .= " and " . $Where_qb ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_cliente[0] = NM_encode_input(sc_strip_script($cliente)) ; 
      $tot_cliente[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cliente[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_cliente;
   } 

   //-----  resolucion
   function quebra_resolucion_prefijo($resolucion, $arg_sum_resolucion) 
   {
      global $tot_resolucion, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_resolucion = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where resolucion" . $arg_sum_resolucion ; 
      } 
      else 
      { 
         $nm_comando .= " and resolucion" . $arg_sum_resolucion ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_resolucion[0] = NM_encode_input(sc_strip_script($resolucion)) ; 
      $tot_resolucion[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_resolucion[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  banco
   function quebra_banco_banco($banco, $arg_sum_banco) 
   {
      global $tot_banco, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_banco = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where banco" . $arg_sum_banco ; 
      } 
      else 
      { 
         $nm_comando .= " and banco" . $arg_sum_banco ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_banco[0] = NM_encode_input(sc_strip_script($banco)) ; 
      $tot_banco[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_banco[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  documento
   function quebra_documento_documento($documento, $arg_sum_documento) 
   {
      global $tot_documento, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_documento = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where documento" . $arg_sum_documento ; 
      } 
      else 
      { 
         $nm_comando .= " and documento" . $arg_sum_documento ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_documento[0] = sc_strip_script($documento) ; 
      $tot_documento[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_documento[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  detalle
   function quebra_detalle_detallle($detalle, $arg_sum_detalle) 
   {
      global $tot_detalle, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $tot_detalle = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(cantidad) from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'])) 
      { 
         $nm_comando .= " where detalle" . $arg_sum_detalle ; 
      } 
      else 
      { 
         $nm_comando .= " and detalle" . $arg_sum_detalle ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_detalle[0] = sc_strip_script($detalle) ; 
      $tot_detalle[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_detalle[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 


   //----- 
   function Calc_resumo_fecha($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fecha' => "fecha");
      $cmps_quebra_atual = array("fecha");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_fecha($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_fecha($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['fecha']['reg'] = "S";
      $format_dimensions['fecha']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'fecha', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_fecha($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_sc_free_group_by($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('fecha' => "fecha",'detalle' => "detalle",'nota' => "nota",'documento' => "documento",'resolucion' => "resolucion",'ie' => "ie",'banco' => "banco",'cliente' => "cliente");
      $cmps_quebra_atual = array();
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Gb_Free_cmp'] as $cmp => $resto)
      {
          $cmps_quebra_atual[] = $cmp;
      }
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_sc_free_group_by($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_sc_free_group_by($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['fecha']['reg'] = "S";
      $format_dimensions['fecha']['msk'] = "";
      $format_dimensions['detalle']['reg'] = "S";
      $format_dimensions['detalle']['msk'] = "";
      $format_dimensions['nota']['reg'] = "S";
      $format_dimensions['nota']['msk'] = "";
      $format_dimensions['documento']['reg'] = "S";
      $format_dimensions['documento']['msk'] = "";
      $format_dimensions['resolucion']['reg'] = "S";
      $format_dimensions['resolucion']['msk'] = "";
      $format_dimensions['ie']['reg'] = "S";
      $format_dimensions['ie']['msk'] = "";
      $format_dimensions['banco']['reg'] = "S";
      $format_dimensions['banco']['msk'] = "";
      $format_dimensions['cliente']['reg'] = "S";
      $format_dimensions['cliente']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'sc_free_group_by', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "detalle") {
              }
              if ($Cada_dim == "nota") {
              }
              if ($Cada_dim == "documento") {
              }
              if ($Cada_dim == "resolucion") {
                  $this->Lookup->lookup_sc_free_group_by_resolucion($$Cada_dim,  $resolucion);
              }
              if ($Cada_dim == "ie") {
              }
              if ($Cada_dim == "banco") {
                  $this->Lookup->lookup_sc_free_group_by_banco($$Cada_dim,  $banco);
              }
              if ($Cada_dim == "cliente") {
                  $this->Lookup->lookup_sc_free_group_by_cliente($$Cada_dim,  $cliente);
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_sc_free_group_by($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_prefijo($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('resolucion' => "resolucion");
      $cmps_quebra_atual = array("resolucion");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_prefijo($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_prefijo($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['resolucion']['reg'] = "S";
      $format_dimensions['resolucion']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'prefijo', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "resolucion") {
                  $this->Lookup->lookup_prefijo_resolucion($$Cada_dim,  $resolucion);
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_prefijo($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_banco($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('banco' => "banco");
      $cmps_quebra_atual = array("banco");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_banco($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_banco($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['banco']['reg'] = "S";
      $format_dimensions['banco']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'banco', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "banco") {
                  $this->Lookup->lookup_banco_banco($$Cada_dim,  $banco);
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_banco($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_documento($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('documento' => "documento");
      $cmps_quebra_atual = array("documento");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_documento($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_documento($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['documento']['reg'] = "S";
      $format_dimensions['documento']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'documento', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "documento") {
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_documento($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }

   //----- 
   function Calc_resumo_detallle($destino_resumo)
   {
      global $nm_lang, $id_tercero, $banco, $resolucion, $idrc, $idrp, $cliente;
      $this->nm_data = new nm_data("es");
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']);
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->detalle = $Busca_temp['detalle']; 
          $tmp_pos = strpos($this->detalle, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle))
          {
              $this->detalle = substr($this->detalle, 0, $tmp_pos);
          }
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->resolucion_2 = $Busca_temp['resolucion_input_2']; 
          $this->creado_inicio = $Busca_temp['creado_inicio']; 
          $tmp_pos = strpos($this->creado_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_inicio))
          {
              $this->creado_inicio = substr($this->creado_inicio, 0, $tmp_pos);
          }
          $this->creado_fin = $Busca_temp['creado_fin']; 
          $tmp_pos = strpos($this->creado_fin, "##@@");
          if ($tmp_pos !== false && !is_array($this->creado_fin))
          {
              $this->creado_fin = substr($this->creado_fin, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false && !is_array($this->ie))
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
      } 
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['where_pesq'];
      $ind_qb                = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['SC_Ind_Groupby'];
      $cmp_sql_def   = array('detalle' => "detalle");
      $cmps_quebra_atual = array("detalle");
      $ult_cmp_quebra_atual = $cmps_quebra_atual[(count($cmps_quebra_atual) - 1)];
      $arr_tots = "";
      $join     = "";
      $group    = "";
      $i_group  = 1;
      $cmps_gb  = "";
      $cmps_gb1 = "";
      $cmps_gb2 = "";
      $cmps_gbS = array();
      $ind_cmps = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      $all_group = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $group .= (empty($group)) ? $i_group : "," . $i_group;
              }
              elseif (!in_array($Str_arg_sql . trim($temp1[0]), $all_group))
              {
                  $group .= (empty($group)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
                  $all_group[] = $Str_arg_sql . trim($temp1[0]);
              }
              $cmps_gb1 .= (empty($cmps_gb1)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb1 .= " as a_cmp_" .  $ind_alias;
              $cmps_gb2 .= (empty($cmps_gb2)) ? $Str_arg_sql . trim($temp1[0]) : "," . $Str_arg_sql . trim($temp1[0]);
              $cmps_gb2 .= " as b_cmp_" .  $ind_alias;
              $join     .= empty($join) ? "" : " and ";
              $join     .= " SC_sel1.a_cmp_" .  $ind_alias . " =  SC_sel2.b_cmp_" .  $ind_alias;
              $ind_cmps++;
              $ind_alias++;
              $i_group++;
          }
      }
      $ind_cmps  = 2;
      $ind_alias = "1";
      $cmp_dim   = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $arr_tots .= "[\$" . $cmp_gb . "_orig]";
          $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $cmp_gb);
          if (!empty($Format_tst))
          {
              $Str_arg_sum = $this->Ini->Get_date_arg_sum($cmp_gb, $Format_tst, $cmp_sql_def[$cmp_gb], false, true);
              $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$cmp_gb] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$cmp_gb], $Format_tst);
          }
          else
          {
              $Str_arg_sql = "";
              $Str_arg_sum = $cmp_sql_def[$cmp_gb] . " *sc# SC." . $cmp_sql_def[$cmp_gb];
          }
          $cmp_dim[$cmp_gb] = $ind_cmps;
          $temp = explode(" and ", $Str_arg_sum);
          foreach ($temp as $cada_parte)
          {
              $temp1 = explode("*sc#", $cada_parte);
              $cmps_gb  .= (empty($cmps_gb)) ? "a_cmp_" .  $ind_alias : "," . "a_cmp_" .  $ind_alias;
              $cmps_gbS['a_cmp_' . $ind_alias] = $Str_arg_sql . trim($temp1[0]);
              $ind_cmps++;
              $ind_alias++;
          }
          $this->Res_Totaliza_detallle($ind_qb, $cmp_gb, $arr_tots, $group, $join, $cmps_gb, $cmps_gb1, $cmps_gb2, $cmps_gbS, $cmp_dim, $cmps_quebra_atual, $cmp_sql_def);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'] = array();
      foreach ($cmps_quebra_atual as $cmp_gb)
      {
          $Arr_tot_name = "array_total_" . $cmp_gb;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['arr_total'][$cmp_gb] = $this->$Arr_tot_name;
      }
   }

   function Res_Totaliza_detallle($ind_qb, $cmp_tot, $arr_tots, $group, $join, $cmps_quebras, $cmps_quebras1, $cmps_quebras2, $cmps_quebrasS, $Cmp_dim, $cmps_quebra_atual, $cmp_sql_def)
   {
      $sc_having = ((isset($parms_sub_sel['having']))) ? "  having " . $parms_sub_sel['having'] : "";
      $Tem_estat_manual = false;
      $where_ok = $this->sc_where_atual;
      $cmp_sql_tp_num = array('idcaja' => 'N','cantidad' => 'N','totaldia' => 'N','arqueo' => 'N','saldo' => 'N','resolucion' => 'N','idrc' => 'N','idrp' => 'N','banco' => 'N','cliente' => 'N','id_tercero' => 'N');
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " . $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      else 
      { 
         $cmd_simp = "select count(*), sum(cantidad)#@#cmps_quebras#@# from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp " . $where_ok;
         $comando  = "select count(*), sum(SC_metric1)#@#cmps_quebras#@# from (";
         $comando .= "select cantidad as SC_metric1, " . $cmps_quebras1 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp1 " . $where_ok . ") SC_sel1 INNER JOIN (";
         $comando .= "select " . $cmps_quebras2 . " from (SELECT      idcaja,     fecha,     jornada,     detalle,     nota,     cantidad,     documento,     cierredia,     totaldia,     arqueo,     saldo, resolucion, idrc, idrp,     if(cantidad<0,'Egreso','Ingreso') as ie,     creado as creado,     creado as creado_inicio,     creado as creado_fin,     banco,     coalesce(                      if             (                 idrp is not null or idrp > 0,                 (select rp.client from pagos rp where rp.idpago=idrp limit 1),                 if                 (                     idrc is not null or idrp > 0,                     (select rc.cliente from recibocaja rc where rc.idrecibo=idrc limit 1),                     if                     (                         nota='VENTA',                         (select v.idcli from facturaven v where v.resolucion=resolucion and v.numfacven=documento limit 1),                         if                         (                             nota='COMPRA',                             (select c.idprov from facturacom c where c.idfaccom=documento limit 1),                             if(id_tercero>0,id_tercero,1)                         )                     )                 )              )      ,usuario) as cliente,     doc,     id_tercero,     concat(c.tipodoc,'/',(select r.prefijo from resdian r where r.Idres=c.resolucion limit 1),'/',c.documento) as doc_pagado,     if(c.idrc>0,'Recibo Caja','Comprobante Egreso') as tipo FROM      caja c ) sc_sel_esp2 " .  $where_ok . " group by " . $group . $sc_having . ") SC_sel2 ";
         $comando .= " ON " . $join;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res']))
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['sql_tot_res'] = str_replace("#@#cmps_quebras#@#", "", $comando);
      }
      $comando  = str_replace("#@#cmps_quebras#@#", "," . $cmps_quebras, $comando);
      $comando .= " group by " . $cmps_quebras . " order by " .  $cmps_quebras;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_caja_280521']['Res_search_metric_use']))
      {
          $comando = $cmd_simp;
          $cmps_S  = "";
          foreach ($cmps_quebrasS as $alias => $sql)
          {
              $cmps_S .= empty($cmps_S) ? $sql : ", " . $sql;
          }
          $comando = str_replace("#@#cmps_quebras#@#", "," . $cmps_S, $comando);
          $order_group = "";
          foreach ($cmps_quebrasS as $alias => $cada_tst)
          {
              $cada_tst = trim($cada_tst);
              $pos = strpos(" " . $order_group, " " . $cada_tst);
              if ($pos === false)
              {
                  $order_group .= (!empty($order_group)) ? ", " . $cada_tst : $cada_tst;
              }
          }
          $comando .= " group by " . $order_group . " order by " .  $order_group;
      }
      $comando  = $this->Ajust_statistic($comando);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $format_dimensions = array();
      $format_dimensions['detalle']['reg'] = "S";
      $format_dimensions['detalle']['msk'] = "";
      while (!$rt->EOF)
      {
          $sql_where = "";
          foreach ($Cmp_dim as $Cada_dim => $Ind_sql)
          {
              $prep_look  = $Cada_dim . "_SC_look";
              $$prep_look = $rt->fields[$Ind_sql];
              $SC_prep = $this->Ini->Get_format_dimension($Ind_sql, 'detallle', $Cada_dim, $rt, $format_dimensions[$Cada_dim]['reg'], $format_dimensions[$Cada_dim]['msk']);
              $SC_orig = $Cada_dim . "_orig";
              $SC_graf = "val_grafico_" . $Cada_dim;
              $$Cada_dim = $SC_prep['fmt'];
              $$SC_orig = $SC_prep['orig'];
              if ($Cada_dim == "detalle") {
              }
              if (null === $$Cada_dim)
              {
                  $$Cada_dim = '';
              }
              if (null === $$SC_orig)
              {
                  $$SC_orig = '__SCNULL__';
              }
              $$SC_graf = $$Cada_dim;
              if ($Tem_estat_manual)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format($ind_qb, $Cada_dim);
                  if (!empty($Format_tst))
                  {
                      $val_sql  = $rt->fields[$Ind_sql];
                      if ($Format_tst == 'YYYYMMDDHHII')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3] . ":" . $rt->fields[$Ind_sql + 4];
                      }
                      if ($Format_tst == 'YYYYMMDDHH')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2] . " " . $rt->fields[$Ind_sql + 3];
                      }
                      if ($Format_tst == 'YYYYMMDD2')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1] . "-" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'YYYYMM')
                      {
                          $val_sql .= "-" . $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'YYYYHH' || $Format_tst == 'YYYYDD' || $Format_tst == 'YYYYDAYNAME' || $Format_tst == 'YYYYWEEK' || $Format_tst == 'YYYYBIMONTHLY' || $Format_tst == 'YYYYQUARTER' || $Format_tst == 'YYYYFOURMONTHS' || $Format_tst == 'YYYYSEMIANNUAL')
                      {
                          $val_sql .= $rt->fields[$Ind_sql + 1];
                      }
                      if ($Format_tst == 'HHIISS')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1] . ":" . $rt->fields[$Ind_sql + 2];
                      }
                      if ($Format_tst == 'HHII')
                      {
                          $val_sql  = $rt->fields[$Ind_sql] . ":" . $rt->fields[$Ind_sql + 1];
                      }
                      $Str_arg_sum = $this->Ini->Get_date_arg_sum($val_sql, $Format_tst, $cmp_sql_def[$Cada_dim], true);
                      $Str_arg_sql = ($Str_arg_sum == " is null") ? $cmp_sql_def[$Cada_dim] : $this->Ini->Get_sql_date_groupby($cmp_sql_def[$Cada_dim], $Format_tst);
                  }
                  elseif (isset($cmp_sql_tp_num[$Cada_dim]))
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $rt->fields[$Ind_sql];
                  }
                  else
                  {
                      $Str_arg_sql = $cmp_sql_def[$Cada_dim];
                      $Str_arg_sum = " = " . $this->Db->qstr($rt->fields[$Ind_sql]);
                  }
                  $sql_where .= (!empty($sql_where)) ? " and " : "";
                  $sql_where .= $Str_arg_sql . $Str_arg_sum;
              }
          }
          if ($Tem_estat_manual)
          {
              $where_ok = (empty($this->sc_where_atual)) ? " where " . $sql_where : $this->sc_where_atual . " and " . $sql_where;
              $vl_statistic = $this->Calc_statist_manual_detallle($where_ok);
              foreach ($vl_statistic as $ind => $val)
              {
                  $rt->fields[$ind] = $val;
              }
          }
          $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
          $rt->fields[1] = (strpos(strtolower($rt->fields[1]), "e")) ? (float)$rt->fields[1] : $rt->fields[1]; 
          $rt->fields[1] = (string)$rt->fields[1];
          if ($rt->fields[1] == "") 
          {
              $rt->fields[1] = 0;
          }
          if (substr($rt->fields[1], 0, 1) == ".") 
          {
              $rt->fields[1] = "0" . $rt->fields[1];
          }
          if (substr($rt->fields[1], 0, 2) == "-.") 
          {
              $rt->fields[1] = "-0" . substr($rt->fields[1], 1);
          }
          nmgp_Trunc_Num($rt->fields[1], 2);
          $str_tot = "array_total_" . $cmp_tot;
          if (!isset($this->$str_tot))
          {
              $this->$str_tot = array();
          }
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[0]";
          eval ('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[2]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[1] . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[1]";
          eval('$this->' . $str_tot . ' = ' . $rt->fields[0] . ';');
          $str_grf = "val_grafico_" . $cmp_tot;
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[3]";
          eval ('$this->' . $str_tot . ' = $' . $str_grf . ';');
          $str_tot = "array_total_" . $cmp_tot . $arr_tots . "[4]";
          $str_org = $cmp_tot . "_orig";
          eval ('$this->' . $str_tot . ' = $' . $str_org . ';');
          eval ('ksort($this->array_total_' . $cmp_tot . $arr_tots . ');');
          $rt->MoveNext();
      }
      $rt->Close();
   }
   function Ajust_statistic($comando)
   {
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_vfp) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_odbc))
      {
          $comando = str_replace(array('count(distinct ','varp(','stdevp(','variance(','stddev('), array('sum(','sum(','sum(','sum(','sum('), $comando);
      }
      if ($this->Ini->nm_tp_variance == "P")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_pop(','stddev_pop('), $comando);
          }
      }
      if ($this->Ini->nm_tp_variance == "A")
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
              $comando = str_replace(array('count(distinct ','varp(','stdevp('), array('count(','var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite) && $this->Ini->sqlite_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) && $this->Ini->Ibase_version == "old")
          {
              $comando = str_replace(array('variance(','stddev('), array('sum(','sum('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
                  $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $comando = str_replace(array('varp(','stdevp('), array('var(','stdev('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $comando = str_replace('stddev(', 'stdev(', $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $comando = str_replace(array('variance(','stddev('), array('variance_samp(','stddev_samp('), $comando);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $comando = str_replace(array('variance(','stddev('), array('var_samp(','stddev_samp('), $comando);
          }
      }
      return $comando;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
