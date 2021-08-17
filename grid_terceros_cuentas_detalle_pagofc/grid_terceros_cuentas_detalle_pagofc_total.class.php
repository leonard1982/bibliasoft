<?php

class grid_terceros_cuentas_detalle_pagofc_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cuentas_detalle_pagofc']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cuentas_detalle_pagofc']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->prefijo = $Busca_temp['prefijo']; 
          $tmp_pos = strpos($this->prefijo, "##@@");
          if ($tmp_pos !== false && !is_array($this->prefijo))
          {
              $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
          }
          $this->numero = $Busca_temp['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero))
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->tercero = $Busca_temp['tercero']; 
          $tmp_pos = strpos($this->tercero, "##@@");
          if ($tmp_pos !== false && !is_array($this->tercero))
          {
              $this->tercero = substr($this->tercero, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo))
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->concepto = $Busca_temp['concepto']; 
          $tmp_pos = strpos($this->concepto, "##@@");
          if ($tmp_pos !== false && !is_array($this->concepto))
          {
              $this->concepto = substr($this->concepto, 0, $tmp_pos);
          }
          $concepto_2 = $Busca_temp['concepto_input_2']; 
          $this->concepto_2 = $Busca_temp['concepto_input_2']; 
          $this->numero_documento = $Busca_temp['numero_documento']; 
          $tmp_pos = strpos($this->numero_documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero_documento))
          {
              $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
          }
          $this->usuario = $Busca_temp['usuario']; 
          $tmp_pos = strpos($this->usuario, "##@@");
          if ($tmp_pos !== false && !is_array($this->usuario))
          {
              $this->usuario = substr($this->usuario, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_TERCERO($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_USUARIO_ASESOR($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_cuenta($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_tercero_cuenta($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_fechaycuenta($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral_concepto($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //---- 
   function quebra_geral__NM_SC_($res_limit=false)
   {
      global $nada, $nm_lang , $tercero, $tipo, $usuario, $concepto;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['contr_total_geral'] = "OK";
   } 

   //-----  tercero
   function quebra_tercero_TERCERO($tercero, $arg_sum_tercero) 
   {
      global $tot_tercero, $tercero, $tipo, $usuario, $concepto;
      $tot_tercero = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where tercero" . $arg_sum_tercero ; 
      } 
      else 
      { 
         $nm_comando .= " and tercero" . $arg_sum_tercero ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_tercero[0] = NM_encode_input(sc_strip_script($tercero)) ; 
      $tot_tercero[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tercero[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  prefijo
   function quebra_prefijo_sc_free_group_by($prefijo, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_prefijo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_prefijo[0] = sc_strip_script($prefijo) ; 
      $tot_prefijo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_prefijo[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_prefijo;
   } 

   //-----  fecha
   function quebra_fecha_sc_free_group_by($fecha, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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

   //-----  tercero
   function quebra_tercero_sc_free_group_by($tercero, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_tercero = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_tercero[0] = NM_encode_input(sc_strip_script($tercero)) ; 
      $tot_tercero[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tercero[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_tercero;
   } 

   //-----  tipo
   function quebra_tipo_sc_free_group_by($tipo, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_tipo = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_tipo[0] = sc_strip_script($tipo) ; 
      $tot_tipo[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tipo[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_tipo;
   } 

   //-----  observaciones
   function quebra_observaciones_sc_free_group_by($observaciones, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_observaciones = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_observaciones[0] = sc_strip_script($observaciones) ; 
      $tot_observaciones[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_observaciones[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_observaciones;
   } 

   //-----  usuario
   function quebra_usuario_sc_free_group_by($usuario, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_usuario = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_usuario[0] = sc_strip_script($usuario) ; 
      $tot_usuario[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_usuario[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_usuario;
   } 

   //-----  cod_cuenta
   function quebra_cod_cuenta_sc_free_group_by($cod_cuenta, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_cod_cuenta = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_cod_cuenta[0] = sc_strip_script($cod_cuenta) ; 
      $tot_cod_cuenta[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cod_cuenta[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_cod_cuenta;
   } 

   //-----  pagada
   function quebra_pagada_sc_free_group_by($pagada, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_pagada = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_pagada[0] = sc_strip_script($pagada) ; 
      $tot_pagada[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_pagada[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_pagada;
   } 

   //-----  concepto
   function quebra_concepto_sc_free_group_by($concepto, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $tercero, $tipo, $usuario, $concepto;
      $tot_concepto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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
      $tot_concepto[0] = NM_encode_input(sc_strip_script($concepto)) ; 
      $tot_concepto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_concepto[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_concepto;
   } 

   //-----  usuario
   function quebra_usuario_USUARIO_ASESOR($usuario, $arg_sum_usuario) 
   {
      global $tot_usuario, $tercero, $tipo, $usuario, $concepto;
      $tot_usuario = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where usuario" . $arg_sum_usuario ; 
      } 
      else 
      { 
         $nm_comando .= " and usuario" . $arg_sum_usuario ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_usuario[0] = sc_strip_script($usuario) ; 
      $tot_usuario[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_usuario[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  cod_cuenta
   function quebra_cod_cuenta_cuenta($cod_cuenta, $arg_sum_cod_cuenta) 
   {
      global $tot_cod_cuenta, $tercero, $tipo, $usuario, $concepto;
      $tot_cod_cuenta = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      else 
      { 
         $nm_comando .= " and cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_cod_cuenta[0] = sc_strip_script($cod_cuenta) ; 
      $tot_cod_cuenta[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cod_cuenta[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  tercero
   function quebra_tercero_tercero_cuenta($tercero, $arg_sum_tercero) 
   {
      global $tot_tercero, $tercero, $tipo, $usuario, $concepto;
      $tot_tercero = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where tercero" . $arg_sum_tercero ; 
      } 
      else 
      { 
         $nm_comando .= " and tercero" . $arg_sum_tercero ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_tercero[0] = NM_encode_input(sc_strip_script($tercero)) ; 
      $tot_tercero[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_tercero[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  cod_cuenta
   function quebra_cod_cuenta_tercero_cuenta($tercero, $cod_cuenta, $arg_sum_tercero, $arg_sum_cod_cuenta) 
   {
      global $tot_cod_cuenta, $tercero, $tipo, $usuario, $concepto;
      $tot_cod_cuenta = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where tercero" . $arg_sum_tercero . " and cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      else 
      { 
         $nm_comando .= " and tercero" . $arg_sum_tercero . " and cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_cod_cuenta[0] = sc_strip_script($cod_cuenta) ; 
      $tot_cod_cuenta[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cod_cuenta[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  fecha
   function quebra_fecha_fechaycuenta($fecha, $arg_sum_fecha) 
   {
      global $tot_fecha, $tercero, $tipo, $usuario, $concepto;
      $tot_fecha = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
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

   //-----  cod_cuenta
   function quebra_cod_cuenta_fechaycuenta($fecha, $cod_cuenta, $arg_sum_fecha, $arg_sum_cod_cuenta) 
   {
      global $tot_cod_cuenta, $tercero, $tipo, $usuario, $concepto;
      $tot_cod_cuenta = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where " .  $this->Sc_groupby_fecha . $arg_sum_fecha . " and cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      else 
      { 
         $nm_comando .= " and " .  $this->Sc_groupby_fecha . $arg_sum_fecha . " and cod_cuenta" . $arg_sum_cod_cuenta ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_cod_cuenta[0] = sc_strip_script($cod_cuenta) ; 
      $tot_cod_cuenta[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cod_cuenta[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
   } 

   //-----  concepto
   function quebra_concepto_concepto($concepto, $arg_sum_concepto) 
   {
      global $tot_concepto, $tercero, $tipo, $usuario, $concepto;
      $tot_concepto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(valor_total) from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' and cod_cuenta='" . $_SESSION['gncuenta'] . "' ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_detalle_pagofc']['where_pesq'])) 
      { 
         $nm_comando .= " where concepto" . $arg_sum_concepto ; 
      } 
      else 
      { 
         $nm_comando .= " and concepto" . $arg_sum_concepto ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      $tot_concepto[0] = NM_encode_input(sc_strip_script($concepto)) ; 
      $tot_concepto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_concepto[2] = (string)$rt->fields[1]; 
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
