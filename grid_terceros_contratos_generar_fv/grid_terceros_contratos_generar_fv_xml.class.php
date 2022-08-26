<?php

class grid_terceros_contratos_generar_fv_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;
   var $sum_mensualidad;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_terceros_contratos_generar_fv($cadapar[1]);
                   nm_protect_num_grid_terceros_contratos_generar_fv($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_terceros_contratos_generar_fv']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gmensaje)) 
      {
          $_SESSION['gmensaje'] = $gmensaje;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gmensaje"]);
      }
      if (isset($ganio)) 
      {
          $_SESSION['ganio'] = $ganio;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["ganio"]);
      }
      if (isset($gperiodo)) 
      {
          $_SESSION['gperiodo'] = $gperiodo;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gperiodo"]);
      }
      if (isset($gprefijo)) 
      {
          $_SESSION['gprefijo'] = $gprefijo;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gprefijo"]);
      }
      if (isset($gcodzona)) 
      {
          $_SESSION['gcodzona'] = $gcodzona;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gcodzona"]);
      }
      if (isset($gfecha_documento)) 
      {
          $_SESSION['gfecha_documento'] = $gfecha_documento;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gfecha_documento"]);
      }
      if (isset($gdia)) 
      {
          $_SESSION['gdia'] = $gdia;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gdia"]);
      }
      if (isset($gresolucion)) 
      {
          $_SESSION['gresolucion'] = $gresolucion;
          nm_limpa_str_grid_terceros_contratos_generar_fv($_SESSION["gresolucion"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = false;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_terceros_contratos_generar_fv/grid_terceros_contratos_generar_fv_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_terceros_contratos_generar_fv_total.class.php"); 
      $this->Tot      = new grid_terceros_contratos_generar_fv_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_mensualidad = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['tot_geral'][2];
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_contratos_generar_fv']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("es");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_terceros_contratos_generar_fv.zip";
      $this->Arquivo     .= "_grid_terceros_contratos_generar_fv";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_terceros_contratos_generar_fv.xml";
      $this->Tit_zip      = "grid_terceros_contratos_generar_fv.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_contratos_generar_fv']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_contratos_generar_fv']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_contratos_generar_fv']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['campos_busca']))
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, str_replace (convert(char(10),fecha_inicio,102), '.', '-') + ' ' + convert(char(8),fecha_inicio,20), zona, barrio2, estado, mensualidad, str_replace (convert(char(10),fecha_factura,102), '.', '-') + ' ' + convert(char(8),fecha_factura,20), id_ter_cont, str_replace (convert(char(10),fecha_contrato,102), '.', '-') + ' ' + convert(char(8),fecha_contrato,20), str_replace (convert(char(10),fecha_corte,102), '.', '-') + ' ' + convert(char(8),fecha_corte,20), activo, barrio, direccion, telefono, motivo, str_replace (convert(char(10),fecha_limitepago,102), '.', '-') + ' ' + convert(char(8),fecha_limitepago,20), str_replace (convert(char(10),fecha_ultimopago,102), '.', '-') + ' ' + convert(char(8),fecha_ultimopago,20), valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, fecha_inicio, zona, barrio2, estado, mensualidad, fecha_factura, id_ter_cont, fecha_contrato, fecha_corte, activo, barrio, direccion, telefono, motivo, fecha_limitepago, fecha_ultimopago, valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, convert(char(23),fecha_inicio,121), zona, barrio2, estado, mensualidad, convert(char(23),fecha_factura,121), id_ter_cont, convert(char(23),fecha_contrato,121), convert(char(23),fecha_corte,121), activo, barrio, direccion, telefono, motivo, convert(char(23),fecha_limitepago,121), convert(char(23),fecha_ultimopago,121), valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, fecha_inicio, zona, barrio2, estado, mensualidad, fecha_factura, id_ter_cont, fecha_contrato, fecha_corte, activo, barrio, direccion, telefono, motivo, fecha_limitepago, fecha_ultimopago, valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, EXTEND(fecha_inicio, YEAR TO DAY), zona, barrio2, estado, mensualidad, EXTEND(fecha_factura, YEAR TO DAY), id_ter_cont, EXTEND(fecha_contrato, YEAR TO DAY), EXTEND(fecha_corte, YEAR TO DAY), activo, barrio, direccion, telefono, motivo, EXTEND(fecha_limitepago, YEAR TO DAY), EXTEND(fecha_ultimopago, YEAR TO DAY), valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT numero_contrato, cliente, fecha_inicio, zona, barrio2, estado, mensualidad, fecha_factura, id_ter_cont, fecha_contrato, fecha_corte, activo, barrio, direccion, telefono, motivo, fecha_limitepago, fecha_ultimopago, valorpagado, saldoanterior, saldoactual, mesultimafactura, observaciones, valor_ultimafactura, precinto, correo, anio, periodo from (SELECT      id_ter_cont,     numero_contrato,     cliente,     fecha_contrato,     fecha_inicio,     fecha_corte,     creado,     editado,     usuario_crea,     usuario_edita,     estado,     activo,     zona,     barrio,     direccion,     telefono,     motivo,     fecha_limitepago,     fecha_ultimopago,     valorpagado,     saldoanterior,     saldoactual,     mesultimafactura,     observaciones,     valor_ultimafactura,     mensualidad,     precinto,     correo,     fecha_factura,     YEAR(fecha_contrato) as anio,     month(fecha_contrato) as periodo,     (select b.descripcion from barrios b where b.idbarrio=barrio) as barrio2 FROM      terceros_contratos WHERE activo='SI' ORDER BY      (select b.descripcion from barrios b where b.idbarrio=barrio) ASC) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_terceros_contratos_generar_fv>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_terceros_contratos_generar_fv";
         }
         $this->numero_contrato = $rs->fields[0] ;  
         $this->numero_contrato = (string)$this->numero_contrato;
         $this->cliente = $rs->fields[1] ;  
         $this->fecha_inicio = $rs->fields[2] ;  
         $this->zona = $rs->fields[3] ;  
         $this->barrio2 = $rs->fields[4] ;  
         $this->estado = $rs->fields[5] ;  
         $this->mensualidad = $rs->fields[6] ;  
         $this->mensualidad =  str_replace(",", ".", $this->mensualidad);
         $this->mensualidad = (string)$this->mensualidad;
         $this->fecha_factura = $rs->fields[7] ;  
         $this->id_ter_cont = $rs->fields[8] ;  
         $this->id_ter_cont = (string)$this->id_ter_cont;
         $this->fecha_contrato = $rs->fields[9] ;  
         $this->fecha_corte = $rs->fields[10] ;  
         $this->activo = $rs->fields[11] ;  
         $this->barrio = $rs->fields[12] ;  
         $this->direccion = $rs->fields[13] ;  
         $this->telefono = $rs->fields[14] ;  
         $this->motivo = $rs->fields[15] ;  
         $this->fecha_limitepago = $rs->fields[16] ;  
         $this->fecha_ultimopago = $rs->fields[17] ;  
         $this->valorpagado = $rs->fields[18] ;  
         $this->valorpagado =  str_replace(",", ".", $this->valorpagado);
         $this->valorpagado = (string)$this->valorpagado;
         $this->saldoanterior = $rs->fields[19] ;  
         $this->saldoanterior =  str_replace(",", ".", $this->saldoanterior);
         $this->saldoanterior = (string)$this->saldoanterior;
         $this->saldoactual = $rs->fields[20] ;  
         $this->saldoactual =  str_replace(",", ".", $this->saldoactual);
         $this->saldoactual = (string)$this->saldoactual;
         $this->mesultimafactura = $rs->fields[21] ;  
         $this->observaciones = $rs->fields[22] ;  
         $this->valor_ultimafactura = $rs->fields[23] ;  
         $this->valor_ultimafactura =  str_replace(",", ".", $this->valor_ultimafactura);
         $this->valor_ultimafactura = (string)$this->valor_ultimafactura;
         $this->precinto = $rs->fields[24] ;  
         $this->correo = $rs->fields[25] ;  
         $this->anio = $rs->fields[26] ;  
         $this->anio = (string)$this->anio;
         $this->periodo = $rs->fields[27] ;  
         $this->periodo = (string)$this->periodo;
         //----- lookup - cliente
         $this->look_cliente = $this->cliente; 
         $this->Lookup->lookup_cliente($this->look_cliente, $this->cliente) ; 
         $this->look_cliente = ($this->look_cliente == "&nbsp;") ? "" : $this->look_cliente; 
         //----- lookup - zona
         $this->look_zona = $this->zona; 
         $this->Lookup->lookup_zona($this->look_zona, $this->zona) ; 
         $this->look_zona = ($this->look_zona == "&nbsp;") ? "" : $this->look_zona; 
         //----- lookup - estado
         $this->look_estado = $this->estado; 
         $this->Lookup->lookup_estado($this->look_estado, $this->estado) ; 
         $this->look_estado = ($this->look_estado == "&nbsp;") ? "" : $this->look_estado; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_terceros_contratos_generar_fv']['contr_erro'] = 'on';
 if($this->fecha_factura >0)
{
	$this->NM_field_style["fecha_factura"] = "background-color:#6633ff;font-size:13;color:#ffffff;font-family:arial;font-weight:bold;";
}
$_SESSION['scriptcase']['grid_terceros_contratos_generar_fv']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_terceros_contratos_generar_fv>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_terceros_contratos_generar_fv_res_xml.class.php");
              $this->Res = new grid_terceros_contratos_generar_fv_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                      {
                          chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                      }
                      else
                      {
                          chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                      }
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      if (!empty($str_zip)) {
                          exec($str_zip);
                      }
                      // ----- ZIP log
                      $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                      if ($fp)
                      {
                          @fwrite($fp, $str_zip . "\r\n\r\n");
                          @fclose($fp);
                      }
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- numero_contrato
   function NM_export_numero_contrato()
   {
             nmgp_Form_Num_Val($this->numero_contrato, "", "", "0", "S", "2", "", "N:4", "-") ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['numero_contrato'])) ? $this->New_label['numero_contrato'] : "Contrato"; 
         }
         else
         {
             $SC_Label = "numero_contrato"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->numero_contrato) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->numero_contrato) . "\"";
         }
   }
   //----- cliente
   function NM_export_cliente()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_cliente))
         {
             $this->look_cliente = sc_convert_encoding($this->look_cliente, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "cliente"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_cliente) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_cliente) . "\"";
         }
   }
   //----- fecha_inicio
   function NM_export_fecha_inicio()
   {
             $conteudo_x =  $this->fecha_inicio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_inicio, "YYYY-MM-DD  ");
                 $this->fecha_inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_inicio'])) ? $this->New_label['fecha_inicio'] : "Fecha Inicio"; 
         }
         else
         {
             $SC_Label = "fecha_inicio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_inicio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_inicio) . "\"";
         }
   }
   //----- zona
   function NM_export_zona()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_zona))
         {
             $this->look_zona = sc_convert_encoding($this->look_zona, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['zona'])) ? $this->New_label['zona'] : "Zona"; 
         }
         else
         {
             $SC_Label = "zona"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_zona) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_zona) . "\"";
         }
   }
   //----- barrio2
   function NM_export_barrio2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->barrio2))
         {
             $this->barrio2 = sc_convert_encoding($this->barrio2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['barrio2'])) ? $this->New_label['barrio2'] : "Barrio"; 
         }
         else
         {
             $SC_Label = "barrio2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->barrio2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->barrio2) . "\"";
         }
   }
   //----- estado
   function NM_export_estado()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_estado))
         {
             $this->look_estado = sc_convert_encoding($this->look_estado, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
         }
         else
         {
             $SC_Label = "estado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_estado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_estado) . "\"";
         }
   }
   //----- mensualidad
   function NM_export_mensualidad()
   {
             nmgp_Form_Num_Val($this->mensualidad, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['mensualidad'])) ? $this->New_label['mensualidad'] : "Mensualidad"; 
         }
         else
         {
             $SC_Label = "mensualidad"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->mensualidad) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->mensualidad) . "\"";
         }
   }
   //----- detalle
   function NM_export_detalle()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->detalle))
         {
             $this->detalle = sc_convert_encoding($this->detalle, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "Detalle"; 
         }
         else
         {
             $SC_Label = "detalle"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->detalle) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->detalle) . "\"";
         }
   }
   //----- novedades
   function NM_export_novedades()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->novedades))
         {
             $this->novedades = sc_convert_encoding($this->novedades, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['novedades'])) ? $this->New_label['novedades'] : "Novedades"; 
         }
         else
         {
             $SC_Label = "novedades"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->novedades) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->novedades) . "\"";
         }
   }
   //----- fecha_factura
   function NM_export_fecha_factura()
   {
             $conteudo_x =  $this->fecha_factura;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_factura, "YYYY-MM-DD  ");
                 $this->fecha_factura = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_factura'])) ? $this->New_label['fecha_factura'] : "U.Factura"; 
         }
         else
         {
             $SC_Label = "fecha_factura"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_factura) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_factura) . "\"";
         }
   }
   //----- id_ter_cont
   function NM_export_id_ter_cont()
   {
             nmgp_Form_Num_Val($this->id_ter_cont, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['id_ter_cont'])) ? $this->New_label['id_ter_cont'] : "Id Ter Cont"; 
         }
         else
         {
             $SC_Label = "id_ter_cont"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->id_ter_cont) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->id_ter_cont) . "\"";
         }
   }
   //----- fecha_contrato
   function NM_export_fecha_contrato()
   {
             $conteudo_x =  $this->fecha_contrato;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_contrato, "YYYY-MM-DD  ");
                 $this->fecha_contrato = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_contrato'])) ? $this->New_label['fecha_contrato'] : "Fecha Contrato"; 
         }
         else
         {
             $SC_Label = "fecha_contrato"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_contrato) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_contrato) . "\"";
         }
   }
   //----- fecha_corte
   function NM_export_fecha_corte()
   {
             $conteudo_x =  $this->fecha_corte;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_corte, "YYYY-MM-DD  ");
                 $this->fecha_corte = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_corte'])) ? $this->New_label['fecha_corte'] : "Fecha Corte"; 
         }
         else
         {
             $SC_Label = "fecha_corte"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_corte) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_corte) . "\"";
         }
   }
   //----- activo
   function NM_export_activo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->activo))
         {
             $this->activo = sc_convert_encoding($this->activo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['activo'])) ? $this->New_label['activo'] : "Activo"; 
         }
         else
         {
             $SC_Label = "activo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->activo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->activo) . "\"";
         }
   }
   //----- barrio
   function NM_export_barrio()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->barrio))
         {
             $this->barrio = sc_convert_encoding($this->barrio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['barrio'])) ? $this->New_label['barrio'] : "Barrio"; 
         }
         else
         {
             $SC_Label = "barrio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->barrio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->barrio) . "\"";
         }
   }
   //----- direccion
   function NM_export_direccion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->direccion))
         {
             $this->direccion = sc_convert_encoding($this->direccion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Direccion"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->direccion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->direccion) . "\"";
         }
   }
   //----- telefono
   function NM_export_telefono()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->telefono))
         {
             $this->telefono = sc_convert_encoding($this->telefono, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "Telefono"; 
         }
         else
         {
             $SC_Label = "telefono"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->telefono) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->telefono) . "\"";
         }
   }
   //----- motivo
   function NM_export_motivo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->motivo))
         {
             $this->motivo = sc_convert_encoding($this->motivo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['motivo'])) ? $this->New_label['motivo'] : "Motivo"; 
         }
         else
         {
             $SC_Label = "motivo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->motivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->motivo) . "\"";
         }
   }
   //----- fecha_limitepago
   function NM_export_fecha_limitepago()
   {
             $conteudo_x =  $this->fecha_limitepago;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_limitepago, "YYYY-MM-DD  ");
                 $this->fecha_limitepago = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_limitepago'])) ? $this->New_label['fecha_limitepago'] : "Fecha Limitepago"; 
         }
         else
         {
             $SC_Label = "fecha_limitepago"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_limitepago) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_limitepago) . "\"";
         }
   }
   //----- fecha_ultimopago
   function NM_export_fecha_ultimopago()
   {
             $conteudo_x =  $this->fecha_ultimopago;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_ultimopago, "YYYY-MM-DD  ");
                 $this->fecha_ultimopago = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fecha_ultimopago'])) ? $this->New_label['fecha_ultimopago'] : "Fecha Ultimopago"; 
         }
         else
         {
             $SC_Label = "fecha_ultimopago"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fecha_ultimopago) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fecha_ultimopago) . "\"";
         }
   }
   //----- valorpagado
   function NM_export_valorpagado()
   {
             nmgp_Form_Num_Val($this->valorpagado, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valorpagado'])) ? $this->New_label['valorpagado'] : "Valorpagado"; 
         }
         else
         {
             $SC_Label = "valorpagado"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valorpagado) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valorpagado) . "\"";
         }
   }
   //----- saldoanterior
   function NM_export_saldoanterior()
   {
             nmgp_Form_Num_Val($this->saldoanterior, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['saldoanterior'])) ? $this->New_label['saldoanterior'] : "Saldoanterior"; 
         }
         else
         {
             $SC_Label = "saldoanterior"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->saldoanterior) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->saldoanterior) . "\"";
         }
   }
   //----- saldoactual
   function NM_export_saldoactual()
   {
             nmgp_Form_Num_Val($this->saldoactual, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['saldoactual'])) ? $this->New_label['saldoactual'] : "Saldoactual"; 
         }
         else
         {
             $SC_Label = "saldoactual"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->saldoactual) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->saldoactual) . "\"";
         }
   }
   //----- mesultimafactura
   function NM_export_mesultimafactura()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->mesultimafactura))
         {
             $this->mesultimafactura = sc_convert_encoding($this->mesultimafactura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['mesultimafactura'])) ? $this->New_label['mesultimafactura'] : "Mesultimafactura"; 
         }
         else
         {
             $SC_Label = "mesultimafactura"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->mesultimafactura) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->mesultimafactura) . "\"";
         }
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->observaciones))
         {
             $this->observaciones = sc_convert_encoding($this->observaciones, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
         }
         else
         {
             $SC_Label = "observaciones"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->observaciones) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->observaciones) . "\"";
         }
   }
   //----- valor_ultimafactura
   function NM_export_valor_ultimafactura()
   {
             nmgp_Form_Num_Val($this->valor_ultimafactura, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_ultimafactura'])) ? $this->New_label['valor_ultimafactura'] : "Valor Ultimafactura"; 
         }
         else
         {
             $SC_Label = "valor_ultimafactura"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_ultimafactura) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_ultimafactura) . "\"";
         }
   }
   //----- precinto
   function NM_export_precinto()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->precinto))
         {
             $this->precinto = sc_convert_encoding($this->precinto, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['precinto'])) ? $this->New_label['precinto'] : "Precinto"; 
         }
         else
         {
             $SC_Label = "precinto"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->precinto) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->precinto) . "\"";
         }
   }
   //----- correo
   function NM_export_correo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->correo))
         {
             $this->correo = sc_convert_encoding($this->correo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['correo'])) ? $this->New_label['correo'] : "Correo"; 
         }
         else
         {
             $SC_Label = "correo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->correo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->correo) . "\"";
         }
   }
   //----- anio
   function NM_export_anio()
   {
             nmgp_Form_Num_Val($this->anio, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['anio'])) ? $this->New_label['anio'] : "Anio"; 
         }
         else
         {
             $SC_Label = "anio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->anio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->anio) . "\"";
         }
   }
   //----- periodo
   function NM_export_periodo()
   {
             nmgp_Form_Num_Val($this->periodo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['periodo'])) ? $this->New_label['periodo'] : "Periodo"; 
         }
         else
         {
             $SC_Label = "periodo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->periodo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->periodo) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuvwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Generar Factura a Contratos :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_terceros_contratos_generar_fv_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_terceros_contratos_generar_fv"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_contratos_generar_fv']['xml_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
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
