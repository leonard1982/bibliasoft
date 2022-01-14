<?php

class grid_terceros_contratos_generar_fv_total
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
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_terceros_contratos_generar_fv']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_terceros_contratos_generar_fv']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->zona = $Busca_temp['zona']; 
          $tmp_pos = strpos($this->zona, "##@@");
          if ($tmp_pos !== false && !is_array($this->zona))
          {
              $this->zona = substr($this->zona, 0, $tmp_pos);
          }
          $this->fecha_documento = $Busca_temp['fecha_documento']; 
          $tmp_pos = strpos($this->fecha_documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_documento))
          {
              $this->fecha_documento = substr($this->fecha_documento, 0, $tmp_pos);
          }
          $this->fecha_inicio = $Busca_temp['fecha_inicio']; 
          $tmp_pos = strpos($this->fecha_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_inicio))
          {
              $this->fecha_inicio = substr($this->fecha_inicio, 0, $tmp_pos);
          }
          $fecha_inicio_2 = $Busca_temp['fecha_inicio_input_2']; 
          $this->fecha_inicio_2 = $Busca_temp['fecha_inicio_input_2']; 
          $this->numero_contrato = $Busca_temp['numero_contrato']; 
          $tmp_pos = strpos($this->numero_contrato, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero_contrato))
          {
              $this->numero_contrato = substr($this->numero_contrato, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false && !is_array($this->estado))
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_group_by($res_limit=false)
   {
      global $nada, $nm_lang , $cliente, $zona;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['contr_total_geral'] = "OK";
   } 

   //-----  cliente
   function quebra_cliente_sc_free_group_by($cliente, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_cliente = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_cliente[0] = sc_strip_script($cliente) ; 
      $tot_cliente[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_cliente[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_cliente;
   } 

   //-----  fecha_contrato
   function quebra_fecha_contrato_sc_free_group_by($fecha_contrato, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_fecha_contrato = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_fecha_contrato[0] = NM_encode_input(sc_strip_script($fecha_contrato)) ; 
      $tot_fecha_contrato[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha_contrato[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_fecha_contrato;
   } 

   //-----  fecha_inicio
   function quebra_fecha_inicio_sc_free_group_by($fecha_inicio, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_fecha_inicio = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_fecha_inicio[0] = NM_encode_input(sc_strip_script($fecha_inicio)) ; 
      $tot_fecha_inicio[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_fecha_inicio[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_fecha_inicio;
   } 

   //-----  estado
   function quebra_estado_sc_free_group_by($estado, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_estado = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_estado[0] = sc_strip_script($estado) ; 
      $tot_estado[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_estado[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_estado;
   } 

   //-----  zona
   function quebra_zona_sc_free_group_by($zona, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_zona = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_zona[0] = sc_strip_script($zona) ; 
      $tot_zona[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_zona[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_zona;
   } 

   //-----  barrio
   function quebra_barrio_sc_free_group_by($barrio, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_barrio = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_barrio[0] = sc_strip_script($barrio) ; 
      $tot_barrio[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_barrio[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_barrio;
   } 

   //-----  precinto
   function quebra_precinto_sc_free_group_by($precinto, $Where_qb, $Cmp_Name) 
   {
      $Var_name_gb = "SC_tot_" . $Cmp_Name;
      global $$Var_name_gb, $cliente, $zona;
      $tot_precinto = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*), sum(mensualidad) from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq']; 
      } 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
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
      $tot_precinto[0] = sc_strip_script($precinto) ; 
      $tot_precinto[1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $tot_precinto[2] = (string)$rt->fields[1]; 
      $rt->Close(); 
      $$Var_name_gb = $tot_precinto;
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
