<?php

class grid_casos_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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
                   nm_limpa_str_grid_casos($cadapar[1]);
                   nm_protect_num_grid_casos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_casos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gprefijo)) 
      {
          $_SESSION['gprefijo'] = $gprefijo;
          nm_limpa_str_grid_casos($_SESSION["gprefijo"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_casos_total.class.php"); 
      $this->Tot      = new grid_casos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_casos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_casos";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_casos.rtf";
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
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_casos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_casos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_casos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['campos_busca'];
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
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->codigo_cliente = $Busca_temp['codigo_cliente']; 
          $tmp_pos = strpos($this->codigo_cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigo_cliente))
          {
              $this->codigo_cliente = substr($this->codigo_cliente, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false && !is_array($this->estado))
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
          $this->prioridad = $Busca_temp['prioridad']; 
          $tmp_pos = strpos($this->prioridad, "##@@");
          if ($tmp_pos !== false && !is_array($this->prioridad))
          {
              $this->prioridad = substr($this->prioridad, 0, $tmp_pos);
          }
          $this->tipo_caso = $Busca_temp['tipo_caso']; 
          $tmp_pos = strpos($this->tipo_caso, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo_caso))
          {
              $this->tipo_caso = substr($this->tipo_caso, 0, $tmp_pos);
          }
          $this->medio = $Busca_temp['medio']; 
          $tmp_pos = strpos($this->medio, "##@@");
          if ($tmp_pos !== false && !is_array($this->medio))
          {
              $this->medio = substr($this->medio, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asignado_tercero = $Busca_temp['asignado_tercero']; 
          $tmp_pos = strpos($this->asignado_tercero, "##@@");
          if ($tmp_pos !== false && !is_array($this->asignado_tercero))
          {
              $this->asignado_tercero = substr($this->asignado_tercero, 0, $tmp_pos);
          }
          $this->fecha_asignacion = $Busca_temp['fecha_asignacion']; 
          $tmp_pos = strpos($this->fecha_asignacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_asignacion))
          {
              $this->fecha_asignacion = substr($this->fecha_asignacion, 0, $tmp_pos);
          }
          $this->fecha_asignacion_2 = $Busca_temp['fecha_asignacion_input_2']; 
          $this->fecha_cierre = $Busca_temp['fecha_cierre']; 
          $tmp_pos = strpos($this->fecha_cierre, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha_cierre))
          {
              $this->fecha_cierre = substr($this->fecha_cierre, 0, $tmp_pos);
          }
          $this->fecha_cierre_2 = $Busca_temp['fecha_cierre_input_2']; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['zona'])) ? $this->New_label['zona'] : "Zona"; 
          if ($Cada_col == "zona" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "No Caso"; 
          if ($Cada_col == "numero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "Fecha"; 
          if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigo_cliente'])) ? $this->New_label['codigo_cliente'] : "No Cliente"; 
          if ($Cada_col == "codigo_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "Estado"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['prioridad'])) ? $this->New_label['prioridad'] : "Prioridad"; 
          if ($Cada_col == "prioridad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor'])) ? $this->New_label['valor'] : "Valor"; 
          if ($Cada_col == "valor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura"; 
          if ($Cada_col == "factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : ""; 
          if ($Cada_col == "notificar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : ""; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_caso'])) ? $this->New_label['id_caso'] : "Id Caso"; 
          if ($Cada_col == "id_caso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_caso'])) ? $this->New_label['tipo_caso'] : "Tipo Caso"; 
          if ($Cada_col == "tipo_caso" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['medio'])) ? $this->New_label['medio'] : "Medio"; 
          if ($Cada_col == "medio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asignado_tercero'])) ? $this->New_label['asignado_tercero'] : "Asignado a:"; 
          if ($Cada_col == "asignado_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_asignacion'])) ? $this->New_label['fecha_asignacion'] : "Fecha Asignacion"; 
          if ($Cada_col == "fecha_asignacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_cierre'])) ? $this->New_label['fecha_cierre'] : "Fecha Cierre"; 
          if ($Cada_col == "fecha_cierre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cedula_tercero'])) ? $this->New_label['cedula_tercero'] : "Cedula Tercero"; 
          if ($Cada_col == "cedula_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT zona, numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, str_replace (convert(char(10),fecha_asignacion,102), '.', '-') + ' ' + convert(char(8),fecha_asignacion,20), str_replace (convert(char(10),fecha_cierre,102), '.', '-') + ' ' + convert(char(8),fecha_cierre,20), cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT zona, numero, fecha, codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, fecha_asignacion, fecha_cierre, cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT zona, numero, convert(char(23),fecha,121), codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, convert(char(23),fecha_asignacion,121), convert(char(23),fecha_cierre,121), cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT zona, numero, fecha, codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, fecha_asignacion, fecha_cierre, cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT zona, numero, EXTEND(fecha, YEAR TO FRACTION), codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, EXTEND(fecha_asignacion, YEAR TO FRACTION), EXTEND(fecha_cierre, YEAR TO FRACTION), cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT zona, numero, fecha, codigo_cliente, estado, prioridad, valor, observaciones, factura, id_caso, tipo_caso, medio, asignado_tercero, fecha_asignacion, fecha_cierre, cedula_tercero, notificado from (SELECT      id_caso,     fecha,     numero,     codigo_cliente,     estado,     prioridad,     tipo_caso,     medio,     observaciones,     asignado_tercero,     fecha_asignacion,     fecha_cierre,     valor,     cedula_tercero,     notificado,     (select zc.nombre from terceros_contratos tc inner join zona_clientes zc on tc.zona=zc.codigo where tc.numero_contrato=c.codigo_cliente) as zona,     factura FROM      casos c ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['order_grid'];
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
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->zona = $rs->fields[0] ;  
         $this->numero = $rs->fields[1] ;  
         $this->numero = (string)$this->numero;
         $this->fecha = $rs->fields[2] ;  
         $this->codigo_cliente = $rs->fields[3] ;  
         $this->estado = $rs->fields[4] ;  
         $this->prioridad = $rs->fields[5] ;  
         $this->valor = $rs->fields[6] ;  
         $this->valor =  str_replace(",", ".", $this->valor);
         $this->valor = (strpos(strtolower($this->valor), "e")) ? (float)$this->valor : $this->valor; 
         $this->valor = (string)$this->valor;
         $this->observaciones = $rs->fields[7] ;  
         $this->factura = $rs->fields[8] ;  
         $this->factura = (string)$this->factura;
         $this->id_caso = $rs->fields[9] ;  
         $this->id_caso = (string)$this->id_caso;
         $this->tipo_caso = $rs->fields[10] ;  
         $this->medio = $rs->fields[11] ;  
         $this->asignado_tercero = $rs->fields[12] ;  
         $this->fecha_asignacion = $rs->fields[13] ;  
         $this->fecha_cierre = $rs->fields[14] ;  
         $this->cedula_tercero = $rs->fields[15] ;  
         $this->notificado = $rs->fields[16] ;  
         //----- lookup - factura
         $this->look_factura = $this->factura; 
         $this->Lookup->lookup_factura($this->look_factura, $this->factura) ; 
         $this->look_factura = ($this->look_factura == "&nbsp;") ? "" : $this->look_factura; 
         //----- lookup - asignado_tercero
         $this->look_asignado_tercero = $this->asignado_tercero; 
         $this->Lookup->lookup_asignado_tercero($this->look_asignado_tercero, $this->asignado_tercero) ; 
         $this->look_asignado_tercero = ($this->look_asignado_tercero == "&nbsp;") ? "" : $this->look_asignado_tercero; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_casos']['contr_erro'] = 'on';
  
      $nm_select = "select color from casos_estado where descripcion='".$this->estado  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vColor = array();
      $this->vcolor = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vColor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcolor[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vColor = false;
          $this->vColor_erro = $this->Db->ErrorMsg();
          $this->vcolor = false;
          $this->vcolor_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vcolor[0][0]))
{
	$vcol = $this->vcolor[0][0];
	$this->NM_field_color["estado"] = $vcol;
	
	$this->estado  = "<div style='background:".$vcol.";margin:0px;width:90%;height:100%;padding:5px;'><b><label style='color:#ffffff;'>".$this->estado ."</label></b></div>";
}

if($this->notificado =='SI')
{
	$this->NM_field_style["notificado"] = "background-color:#33ff99;font-size:14px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

 
      $nm_select = "select color from casos_prioridad where descripcion='".$this->prioridad  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vColor2 = array();
      $this->vcolor2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vColor2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vcolor2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vColor2 = false;
          $this->vColor2_erro = $this->Db->ErrorMsg();
          $this->vcolor2 = false;
          $this->vcolor2_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vcolor2[0][0]))
{
	$vcol2 = $this->vcolor2[0][0];
	$this->NM_field_color["prioridad"] = $vcol2;
}
$_SESSION['scriptcase']['grid_casos']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- zona
   function NM_export_zona()
   {
         $this->zona = html_entity_decode($this->zona, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->zona = strip_tags($this->zona);
         $this->zona = NM_charset_to_utf8($this->zona);
         $this->zona = str_replace('<', '&lt;', $this->zona);
         $this->zona = str_replace('>', '&gt;', $this->zona);
         $this->Texto_tag .= "<td>" . $this->zona . "</td>\r\n";
   }
   //----- numero
   function NM_export_numero()
   {
             nmgp_Form_Num_Val($this->numero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numero = NM_charset_to_utf8($this->numero);
         $this->numero = str_replace('<', '&lt;', $this->numero);
         $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->Texto_tag .= "<td>" . $this->numero . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
             if (substr($this->fecha, 10, 1) == "-") 
             { 
                 $this->fecha = substr($this->fecha, 0, 10) . " " . substr($this->fecha, 11);
             } 
             if (substr($this->fecha, 13, 1) == ".") 
             { 
                $this->fecha = substr($this->fecha, 0, 13) . ":" . substr($this->fecha, 14, 2) . ":" . substr($this->fecha, 17);
             } 
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- codigo_cliente
   function NM_export_codigo_cliente()
   {
         $this->codigo_cliente = html_entity_decode($this->codigo_cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigo_cliente = strip_tags($this->codigo_cliente);
         $this->codigo_cliente = NM_charset_to_utf8($this->codigo_cliente);
         $this->codigo_cliente = str_replace('<', '&lt;', $this->codigo_cliente);
         $this->codigo_cliente = str_replace('>', '&gt;', $this->codigo_cliente);
         $this->Texto_tag .= "<td>" . $this->codigo_cliente . "</td>\r\n";
   }
   //----- estado
   function NM_export_estado()
   {
         $this->estado = html_entity_decode($this->estado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->estado = strip_tags($this->estado);
         $this->estado = NM_charset_to_utf8($this->estado);
         $this->estado = str_replace('<', '&lt;', $this->estado);
         $this->estado = str_replace('>', '&gt;', $this->estado);
         $this->Texto_tag .= "<td>" . $this->estado . "</td>\r\n";
   }
   //----- prioridad
   function NM_export_prioridad()
   {
         $this->prioridad = html_entity_decode($this->prioridad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prioridad = strip_tags($this->prioridad);
         $this->prioridad = NM_charset_to_utf8($this->prioridad);
         $this->prioridad = str_replace('<', '&lt;', $this->prioridad);
         $this->prioridad = str_replace('>', '&gt;', $this->prioridad);
         $this->Texto_tag .= "<td>" . $this->prioridad . "</td>\r\n";
   }
   //----- valor
   function NM_export_valor()
   {
             nmgp_Form_Num_Val($this->valor, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->valor = NM_charset_to_utf8($this->valor);
         $this->valor = str_replace('<', '&lt;', $this->valor);
         $this->valor = str_replace('>', '&gt;', $this->valor);
         $this->Texto_tag .= "<td>" . $this->valor . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- factura
   function NM_export_factura()
   {
         nmgp_Form_Num_Val($this->look_factura, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_factura = NM_charset_to_utf8($this->look_factura);
         $this->look_factura = str_replace('<', '&lt;', $this->look_factura);
         $this->look_factura = str_replace('>', '&gt;', $this->look_factura);
         $this->Texto_tag .= "<td>" . $this->look_factura . "</td>\r\n";
   }
   //----- notificar
   function NM_export_notificar()
   {
         $this->notificar = NM_charset_to_utf8($this->notificar);
         $this->notificar = str_replace('<', '&lt;', $this->notificar);
         $this->notificar = str_replace('>', '&gt;', $this->notificar);
         $this->Texto_tag .= "<td>" . $this->notificar . "</td>\r\n";
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         $this->imprimir = NM_charset_to_utf8($this->imprimir);
         $this->imprimir = str_replace('<', '&lt;', $this->imprimir);
         $this->imprimir = str_replace('>', '&gt;', $this->imprimir);
         $this->Texto_tag .= "<td>" . $this->imprimir . "</td>\r\n";
   }
   //----- id_caso
   function NM_export_id_caso()
   {
             nmgp_Form_Num_Val($this->id_caso, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_caso = NM_charset_to_utf8($this->id_caso);
         $this->id_caso = str_replace('<', '&lt;', $this->id_caso);
         $this->id_caso = str_replace('>', '&gt;', $this->id_caso);
         $this->Texto_tag .= "<td>" . $this->id_caso . "</td>\r\n";
   }
   //----- tipo_caso
   function NM_export_tipo_caso()
   {
         $this->tipo_caso = html_entity_decode($this->tipo_caso, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_caso = strip_tags($this->tipo_caso);
         $this->tipo_caso = NM_charset_to_utf8($this->tipo_caso);
         $this->tipo_caso = str_replace('<', '&lt;', $this->tipo_caso);
         $this->tipo_caso = str_replace('>', '&gt;', $this->tipo_caso);
         $this->Texto_tag .= "<td>" . $this->tipo_caso . "</td>\r\n";
   }
   //----- medio
   function NM_export_medio()
   {
         $this->medio = html_entity_decode($this->medio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->medio = strip_tags($this->medio);
         $this->medio = NM_charset_to_utf8($this->medio);
         $this->medio = str_replace('<', '&lt;', $this->medio);
         $this->medio = str_replace('>', '&gt;', $this->medio);
         $this->Texto_tag .= "<td>" . $this->medio . "</td>\r\n";
   }
   //----- asignado_tercero
   function NM_export_asignado_tercero()
   {
         $this->look_asignado_tercero = html_entity_decode($this->look_asignado_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_asignado_tercero = strip_tags($this->look_asignado_tercero);
         $this->look_asignado_tercero = NM_charset_to_utf8($this->look_asignado_tercero);
         $this->look_asignado_tercero = str_replace('<', '&lt;', $this->look_asignado_tercero);
         $this->look_asignado_tercero = str_replace('>', '&gt;', $this->look_asignado_tercero);
         $this->Texto_tag .= "<td>" . $this->look_asignado_tercero . "</td>\r\n";
   }
   //----- fecha_asignacion
   function NM_export_fecha_asignacion()
   {
             if (substr($this->fecha_asignacion, 10, 1) == "-") 
             { 
                 $this->fecha_asignacion = substr($this->fecha_asignacion, 0, 10) . " " . substr($this->fecha_asignacion, 11);
             } 
             if (substr($this->fecha_asignacion, 13, 1) == ".") 
             { 
                $this->fecha_asignacion = substr($this->fecha_asignacion, 0, 13) . ":" . substr($this->fecha_asignacion, 14, 2) . ":" . substr($this->fecha_asignacion, 17);
             } 
             $conteudo_x =  $this->fecha_asignacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_asignacion, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_asignacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_asignacion = NM_charset_to_utf8($this->fecha_asignacion);
         $this->fecha_asignacion = str_replace('<', '&lt;', $this->fecha_asignacion);
         $this->fecha_asignacion = str_replace('>', '&gt;', $this->fecha_asignacion);
         $this->Texto_tag .= "<td>" . $this->fecha_asignacion . "</td>\r\n";
   }
   //----- fecha_cierre
   function NM_export_fecha_cierre()
   {
             if (substr($this->fecha_cierre, 10, 1) == "-") 
             { 
                 $this->fecha_cierre = substr($this->fecha_cierre, 0, 10) . " " . substr($this->fecha_cierre, 11);
             } 
             if (substr($this->fecha_cierre, 13, 1) == ".") 
             { 
                $this->fecha_cierre = substr($this->fecha_cierre, 0, 13) . ":" . substr($this->fecha_cierre, 14, 2) . ":" . substr($this->fecha_cierre, 17);
             } 
             $conteudo_x =  $this->fecha_cierre;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_cierre, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecha_cierre = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecha_cierre = NM_charset_to_utf8($this->fecha_cierre);
         $this->fecha_cierre = str_replace('<', '&lt;', $this->fecha_cierre);
         $this->fecha_cierre = str_replace('>', '&gt;', $this->fecha_cierre);
         $this->Texto_tag .= "<td>" . $this->fecha_cierre . "</td>\r\n";
   }
   //----- cedula_tercero
   function NM_export_cedula_tercero()
   {
         $this->cedula_tercero = html_entity_decode($this->cedula_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cedula_tercero = strip_tags($this->cedula_tercero);
         $this->cedula_tercero = NM_charset_to_utf8($this->cedula_tercero);
         $this->cedula_tercero = str_replace('<', '&lt;', $this->cedula_tercero);
         $this->cedula_tercero = str_replace('>', '&gt;', $this->cedula_tercero);
         $this->Texto_tag .= "<td>" . $this->cedula_tercero . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_casos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista Casos :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_casos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_casos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
