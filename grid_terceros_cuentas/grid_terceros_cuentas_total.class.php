<?php

class grid_terceros_cuentas_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function grid_terceros_cuentas_total($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("es");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_terceros_cuentas']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->prefijo = $Busca_temp['prefijo']; 
          $tmp_pos = strpos($this->prefijo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
          }
          $this->numero = $Busca_temp['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false)
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false)
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->tercero = $Busca_temp['tercero']; 
          $tmp_pos = strpos($this->tercero, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tercero = substr($this->tercero, 0, $tmp_pos);
          }
          $this->ie = $Busca_temp['ie']; 
          $tmp_pos = strpos($this->ie, "##@@");
          if ($tmp_pos !== false)
          {
              $this->ie = substr($this->ie, 0, $tmp_pos);
          }
          $this->tipo = $Busca_temp['tipo']; 
          $tmp_pos = strpos($this->tipo, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tipo = substr($this->tipo, 0, $tmp_pos);
          }
          $this->numero_documento = $Busca_temp['numero_documento']; 
          $tmp_pos = strpos($this->numero_documento, "##@@");
          if ($tmp_pos !== false)
          {
              $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
          }
          $this->usuario = $Busca_temp['usuario']; 
          $tmp_pos = strpos($this->usuario, "##@@");
          if ($tmp_pos !== false)
          {
              $this->usuario = substr($this->usuario, 0, $tmp_pos);
          }
          $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
          $tmp_pos = strpos($this->tipo_tercero, "##@@");
          if ($tmp_pos !== false)
          {
              $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false)
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral()
   {
      global $nada, $nm_lang , $tercero, $usuario;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['tot_geral'] = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->fields[1] = str_replace(",", ".", $rt->fields[1]);
      $rt->fields[1] = (string)$rt->fields[1]; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['tot_geral'][2] = $rt->fields[1]; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['contr_total_geral'] = "OK";
   } 

   //-----  ie
   function quebra_ie_INGRESO_EGRESO($ie, $arg_sum_ie) 
   {
      global $tot_ie , $tercero, $usuario;  
      $tot_ie = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
      { 
         $nm_comando .= " where ie" . $arg_sum_ie ; 
      } 
      else 
      { 
         $nm_comando .= " and ie" . $arg_sum_ie ; 
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
   } 

   //-----  tercero
   function quebra_tercero_TERCERO($tercero, $arg_sum_tercero) 
   {
      global $tot_tercero , $tercero, $usuario;  
      $tot_tercero = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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

   //-----  tercero
   function quebra_tercero_IE_TERCERO($tercero, $arg_sum_tercero) 
   {
      global $tot_tercero , $tercero, $usuario;  
      $tot_tercero = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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

   //-----  ie
   function quebra_ie_IE_TERCERO($tercero, $ie, $arg_sum_tercero, $arg_sum_ie) 
   {
      global $tot_ie , $tercero, $usuario;  
      $tot_ie = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
      { 
         $nm_comando .= " where tercero" . $arg_sum_tercero . " and ie" . $arg_sum_ie ; 
      } 
      else 
      { 
         $nm_comando .= " and tercero" . $arg_sum_tercero . " and ie" . $arg_sum_ie ; 
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
   } 

   //-----  usuario
   function quebra_usuario_USUARIO_ASESOR($usuario, $arg_sum_usuario) 
   {
      global $tot_usuario , $tercero, $usuario;  
      $tot_usuario = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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
      global $tot_cod_cuenta , $tercero, $usuario;  
      $tot_cod_cuenta = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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
      global $tot_tercero , $tercero, $usuario;  
      $tot_tercero = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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
      global $tot_cod_cuenta , $tercero, $usuario;  
      $tot_cod_cuenta = array() ;  
      $nm_comando = "select count(*), sum(valor_total) as sum_valor_total from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq']; 
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'])) 
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


   //----- 
   function resumo_INGRESO_EGRESO($destino_resumo, &$array_total_ie)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by ie asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, ie from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by ie " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, ie from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by ie  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $ie      = $registro[2];
         $ie_orig = $registro[2];
         $this->Lookup->lookup_ie($registro[2]); 
         $conteudo = $registro[2];
         $ie = $conteudo;
         if (null === $ie)
         {
             $ie = '';
         }
         if (null === $ie_orig)
         {
             $ie_orig = '';
         }
         $val_grafico_ie = $ie;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($ie_orig))
         {
            //-----  ie
            if (!isset($array_total_ie[$ie_orig]))
            {
               $array_total_ie[$ie_orig][0] = $registro[0];
               $array_total_ie[$ie_orig][1] = $registro[1];
               $array_total_ie[$ie_orig][2] = sc_strip_script($val_grafico_ie);
               $array_total_ie[$ie_orig][3] = $ie_orig;
            }
            else
            {
               $array_total_ie[$ie_orig][0] += $registro[0];
               $array_total_ie[$ie_orig][1] += $registro[1];
            }
         } // isset
      }
   }

   //----- 
   function resumo_TERCERO($destino_resumo, &$array_total_tercero)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by tercero asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by tercero " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by tercero  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $tercero      = $registro[2];
         $tercero_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_tercero($conteudo , $tercero_orig) ; 
         $tercero = $conteudo;
         if (null === $tercero)
         {
             $tercero = '';
         }
         if (null === $tercero_orig)
         {
             $tercero_orig = '';
         }
         $val_grafico_tercero = $tercero;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $tercero_orig = NM_encode_input(sc_strip_script($tercero_orig));
         if (isset($tercero_orig))
         {
            //-----  tercero
            if (!isset($array_total_tercero[$tercero_orig]))
            {
               $array_total_tercero[$tercero_orig][0] = $registro[0];
               $array_total_tercero[$tercero_orig][1] = $registro[1];
               $array_total_tercero[$tercero_orig][2] = NM_encode_input(sc_strip_script($val_grafico_tercero));
               $array_total_tercero[$tercero_orig][3] = $tercero_orig;
            }
            else
            {
               $array_total_tercero[$tercero_orig][0] += $registro[0];
               $array_total_tercero[$tercero_orig][1] += $registro[1];
            }
         } // isset
      }
   }

   //----- 
   function resumo_IE_TERCERO($destino_resumo, &$array_total_tercero, &$array_total_ie)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by tercero asc, ie asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero, ie from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by tercero, ie " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero, ie from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by tercero, ie  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $tercero      = $registro[2];
         $tercero_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_tercero($conteudo , $tercero_orig) ; 
         $tercero = $conteudo;
         if (null === $tercero)
         {
             $tercero = '';
         }
         if (null === $tercero_orig)
         {
             $tercero_orig = '';
         }
         $val_grafico_tercero = $tercero;
         $ie      = $registro[3];
         $ie_orig = $registro[3];
         $this->Lookup->lookup_ie($registro[3]); 
         $conteudo = $registro[3];
         $ie = $conteudo;
         if (null === $ie)
         {
             $ie = '';
         }
         if (null === $ie_orig)
         {
             $ie_orig = '';
         }
         $val_grafico_ie = $ie;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $tercero_orig = NM_encode_input(sc_strip_script($tercero_orig));
         if (isset($tercero_orig))
         {
            //-----  tercero
            if (!isset($array_total_tercero[$tercero_orig]))
            {
               $array_total_tercero[$tercero_orig][0] = $registro[0];
               $array_total_tercero[$tercero_orig][1] = $registro[1];
               $array_total_tercero[$tercero_orig][2] = NM_encode_input(sc_strip_script($val_grafico_tercero));
               $array_total_tercero[$tercero_orig][3] = $tercero_orig;
            }
            else
            {
               $array_total_tercero[$tercero_orig][0] += $registro[0];
               $array_total_tercero[$tercero_orig][1] += $registro[1];
            }
            if (isset($ie_orig))
            {
               //-----  ie
               if (!isset($array_total_ie[$tercero_orig][$ie_orig]))
               {
                  $array_total_ie[$tercero_orig][$ie_orig][0] = $registro[0];
                  $array_total_ie[$tercero_orig][$ie_orig][1] = $registro[1];
                  $array_total_ie[$tercero_orig][$ie_orig][2] = sc_strip_script($val_grafico_ie);
                  $array_total_ie[$tercero_orig][$ie_orig][3] = $ie_orig;
               }
               else
               {
                  $array_total_ie[$tercero_orig][$ie_orig][0] += $registro[0];
                  $array_total_ie[$tercero_orig][$ie_orig][1] += $registro[1];
               }
            } // isset
         } // isset
      }
   }

   //----- 
   function resumo_USUARIO_ASESOR($destino_resumo, &$array_total_usuario)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by usuario asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, usuario from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by usuario " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, usuario from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by usuario  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $usuario      = $registro[2];
         $usuario_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_usuario($conteudo , $usuario_orig) ; 
         $usuario = $conteudo;
         if (null === $usuario)
         {
             $usuario = '';
         }
         if (null === $usuario_orig)
         {
             $usuario_orig = '';
         }
         $val_grafico_usuario = $usuario;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($usuario_orig))
         {
            //-----  usuario
            if (!isset($array_total_usuario[$usuario_orig]))
            {
               $array_total_usuario[$usuario_orig][0] = $registro[0];
               $array_total_usuario[$usuario_orig][1] = $registro[1];
               $array_total_usuario[$usuario_orig][2] = sc_strip_script($val_grafico_usuario);
               $array_total_usuario[$usuario_orig][3] = $usuario_orig;
            }
            else
            {
               $array_total_usuario[$usuario_orig][0] += $registro[0];
               $array_total_usuario[$usuario_orig][1] += $registro[1];
            }
         } // isset
      }
   }

   //----- 
   function resumo_cuenta($destino_resumo, &$array_total_cod_cuenta)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by cod_cuenta asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, cod_cuenta from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by cod_cuenta " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, cod_cuenta from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by cod_cuenta  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $cod_cuenta      = $registro[2];
         $cod_cuenta_orig = $registro[2];
         $conteudo = $registro[2];
         $cod_cuenta = $conteudo;
         if (null === $cod_cuenta)
         {
             $cod_cuenta = '';
         }
         if (null === $cod_cuenta_orig)
         {
             $cod_cuenta_orig = '';
         }
         $val_grafico_cod_cuenta = $cod_cuenta;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         if (isset($cod_cuenta_orig))
         {
            //-----  cod_cuenta
            if (!isset($array_total_cod_cuenta[$cod_cuenta_orig]))
            {
               $array_total_cod_cuenta[$cod_cuenta_orig][0] = $registro[0];
               $array_total_cod_cuenta[$cod_cuenta_orig][1] = $registro[1];
               $array_total_cod_cuenta[$cod_cuenta_orig][2] = sc_strip_script($val_grafico_cod_cuenta);
               $array_total_cod_cuenta[$cod_cuenta_orig][3] = $cod_cuenta_orig;
            }
            else
            {
               $array_total_cod_cuenta[$cod_cuenta_orig][0] += $registro[0];
               $array_total_cod_cuenta[$cod_cuenta_orig][1] += $registro[1];
            }
         } // isset
      }
   }

   //----- 
   function resumo_tercero_cuenta($destino_resumo, &$array_total_tercero, &$array_total_cod_cuenta)
   {
      global $nada, $nm_lang, $tercero, $usuario;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca']))
   { 
      $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['campos_busca'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->numero = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero = substr($this->numero, 0, $tmp_pos);
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false)
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->tercero = $Busca_temp['tercero']; 
       $tmp_pos = strpos($this->tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tercero = substr($this->tercero, 0, $tmp_pos);
       }
       $this->ie = $Busca_temp['ie']; 
       $tmp_pos = strpos($this->ie, "##@@");
       if ($tmp_pos !== false)
       {
           $this->ie = substr($this->ie, 0, $tmp_pos);
       }
       $this->tipo = $Busca_temp['tipo']; 
       $tmp_pos = strpos($this->tipo, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo = substr($this->tipo, 0, $tmp_pos);
       }
       $this->numero_documento = $Busca_temp['numero_documento']; 
       $tmp_pos = strpos($this->numero_documento, "##@@");
       if ($tmp_pos !== false)
       {
           $this->numero_documento = substr($this->numero_documento, 0, $tmp_pos);
       }
       $this->usuario = $Busca_temp['usuario']; 
       $tmp_pos = strpos($this->usuario, "##@@");
       if ($tmp_pos !== false)
       {
           $this->usuario = substr($this->usuario, 0, $tmp_pos);
       }
       $this->tipo_tercero = $Busca_temp['tipo_tercero']; 
       $tmp_pos = strpos($this->tipo_tercero, "##@@");
       if ($tmp_pos !== false)
       {
           $this->tipo_tercero = substr($this->tipo_tercero, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false)
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
   } 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas']['where_pesq_filtro'];
   $nmgp_order_by = " order by tercero asc, cod_cuenta asc"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero, cod_cuenta from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " .  $this->sc_where_atual . " group by tercero, cod_cuenta " . $nmgp_order_by;
      } 
      else 
      { 
         $comando  = "select count(*), sum(valor_total) as sum_valor_total, tercero, cod_cuenta from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada FROM      terceros_cuentas ) nm_sel_esp " . $this->sc_where_atual . " group by tercero, cod_cuenta  " . $nmgp_order_by;
      } 
      if ($destino_resumo != "gra") 
      {
          $comando = str_replace("avg(", "sum(", $comando); 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($comando))
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit;
      }
      $array_db_total = $this->get_array($rt);
      $rt->Close();
      foreach ($array_db_total as $registro)
      {
         $tercero      = $registro[2];
         $tercero_orig = $registro[2];
         $conteudo = $registro[2];
         $this->Lookup->lookup_tercero($conteudo , $tercero_orig) ; 
         $tercero = $conteudo;
         if (null === $tercero)
         {
             $tercero = '';
         }
         if (null === $tercero_orig)
         {
             $tercero_orig = '';
         }
         $val_grafico_tercero = $tercero;
         $cod_cuenta      = $registro[3];
         $cod_cuenta_orig = $registro[3];
         $conteudo = $registro[3];
         $cod_cuenta = $conteudo;
         if (null === $cod_cuenta)
         {
             $cod_cuenta = '';
         }
         if (null === $cod_cuenta_orig)
         {
             $cod_cuenta_orig = '';
         }
         $val_grafico_cod_cuenta = $cod_cuenta;
         $registro[1] = str_replace(",", ".", $registro[1]);
         $registro[1] = (strpos(strtolower($registro[1]), "e")) ? (float)$registro[1] : $registro[1]; 
         $registro[1] = (string)$registro[1];
         if ($registro[1] == "") 
         {
             $registro[1] = 0;
         }
         $tercero_orig = NM_encode_input(sc_strip_script($tercero_orig));
         if (isset($tercero_orig))
         {
            //-----  tercero
            if (!isset($array_total_tercero[$tercero_orig]))
            {
               $array_total_tercero[$tercero_orig][0] = $registro[0];
               $array_total_tercero[$tercero_orig][1] = $registro[1];
               $array_total_tercero[$tercero_orig][2] = NM_encode_input(sc_strip_script($val_grafico_tercero));
               $array_total_tercero[$tercero_orig][3] = $tercero_orig;
            }
            else
            {
               $array_total_tercero[$tercero_orig][0] += $registro[0];
               $array_total_tercero[$tercero_orig][1] += $registro[1];
            }
            if (isset($cod_cuenta_orig))
            {
               //-----  cod_cuenta
               if (!isset($array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig]))
               {
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][0] = $registro[0];
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][1] = $registro[1];
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][2] = sc_strip_script($val_grafico_cod_cuenta);
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][3] = $cod_cuenta_orig;
               }
               else
               {
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][0] += $registro[0];
                  $array_total_cod_cuenta[$tercero_orig][$cod_cuenta_orig][1] += $registro[1];
               }
            } // isset
         } // isset
      }
   }
   //-----
   function get_array($rs)
   {
       if ('ado_mssql' != $this->Ini->nm_tpbanco)
       {
           return $rs->GetArray();
       }

       $array_db_total = array();
       while (!$rs->EOF)
       {
           $arr_row = array();
           foreach ($rs->fields as $k => $v)
           {
               $arr_row[$k] = $v . '';
           }
           $array_db_total[] = $arr_row;
           $rs->MoveNext();
       }
       return $array_db_total;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }

   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
}

?>
