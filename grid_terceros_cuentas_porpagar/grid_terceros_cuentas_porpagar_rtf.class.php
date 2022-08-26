<?php

class grid_terceros_cuentas_porpagar_rtf
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
                   nm_limpa_str_grid_terceros_cuentas_porpagar($cadapar[1]);
                   nm_protect_num_grid_terceros_cuentas_porpagar($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_terceros_cuentas_porpagar']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_terceros_cuentas_porpagar_total.class.php"); 
      $this->Tot      = new grid_terceros_cuentas_porpagar_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "TERCERO")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "USUARIO_ASESOR")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "cuenta")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "tercero_cuenta")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "fechaycuenta")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "concepto")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_valor_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_terceros_cuentas_porpagar";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_terceros_cuentas_porpagar.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_cuentas_porpagar']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['campos_busca'];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['prefijo'])) ? $this->New_label['prefijo'] : "PJ"; 
          if ($Cada_col == "prefijo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero'])) ? $this->New_label['numero'] : "Numero"; 
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
          $SC_Label = (isset($this->New_label['tercero'])) ? $this->New_label['tercero'] : "Tercero"; 
          if ($Cada_col == "tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo'])) ? $this->New_label['tipo'] : "Tipo"; 
          if ($Cada_col == "tipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numero_documento'])) ? $this->New_label['numero_documento'] : "Documento"; 
          if ($Cada_col == "numero_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_total'])) ? $this->New_label['valor_total'] : "Valor"; 
          if ($Cada_col == "valor_total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['usuario'])) ? $this->New_label['usuario'] : "Usuario"; 
          if ($Cada_col == "usuario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cuenta"; 
          if ($Cada_col == "cod_cuenta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
          if ($Cada_col == "pagada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
          if ($Cada_col == "asentada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idtercero_cuenta'])) ? $this->New_label['idtercero_cuenta'] : "Idtercero Cuenta"; 
          if ($Cada_col == "idtercero_cuenta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ie'])) ? $this->New_label['ie'] : "IE"; 
          if ($Cada_col == "ie" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['abonos'])) ? $this->New_label['abonos'] : "Abonos"; 
          if ($Cada_col == "abonos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ultimo_abono'])) ? $this->New_label['ultimo_abono'] : "Ultimo Abono"; 
          if ($Cada_col == "ultimo_abono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_uabono'])) ? $this->New_label['fecha_uabono'] : "Fecha Uabono"; 
          if ($Cada_col == "fecha_uabono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['creado'])) ? $this->New_label['creado'] : "Creado"; 
          if ($Cada_col == "creado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['editado'])) ? $this->New_label['editado'] : "Editado"; 
          if ($Cada_col == "editado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['automatico'])) ? $this->New_label['automatico'] : "Automatico"; 
          if ($Cada_col == "automatico" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_tercero'])) ? $this->New_label['tipo_tercero'] : "Tipo Tercero"; 
          if ($Cada_col == "tipo_tercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['concepto'])) ? $this->New_label['concepto'] : "Concepto"; 
          if ($Cada_col == "concepto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT prefijo, numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, str_replace (convert(char(10),fecha_uabono,102), '.', '-') + ' ' + convert(char(8),fecha_uabono,20), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT prefijo, numero, convert(char(23),fecha,121), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, convert(char(23),fecha_uabono,121), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), TO_DATE(TO_CHAR(editado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT prefijo, numero, EXTEND(fecha, YEAR TO DAY), tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, EXTEND(fecha_uabono, YEAR TO DAY), creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT prefijo, numero, fecha, tercero, tipo, numero_documento, valor_total, saldo, usuario, cod_cuenta, pagada, asentada, idtercero_cuenta, ie, observaciones, abonos, ultimo_abono, fecha_uabono, creado, editado, automatico, tipo_tercero, concepto from (SELECT      idtercero_cuenta,     prefijo,     numero,     fecha,     tercero,     ie,     tipo,     numero_documento,     valor_total,     saldo,     observaciones,     abonos,     usuario,     ultimo_abono,     fecha_uabono,     creado,     editado,     automatico,     (select if(t.cliente='SI','CLIENTES',if(t.proveedor='SI','PROVEEDORES','OTROS')) from terceros t where t.idtercero=tercero) as tipo_tercero,     cod_cuenta,     pagada,     concepto,     asentada FROM      terceros_cuentas WHERE ie='EGRESO' ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['order_grid'];
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
         $this->prefijo = $rs->fields[0] ;  
         $this->numero = $rs->fields[1] ;  
         $this->numero = (string)$this->numero;
         $this->fecha = $rs->fields[2] ;  
         $this->tercero = $rs->fields[3] ;  
         $this->tercero = (string)$this->tercero;
         $this->tipo = $rs->fields[4] ;  
         $this->numero_documento = $rs->fields[5] ;  
         $this->valor_total = $rs->fields[6] ;  
         $this->valor_total =  str_replace(",", ".", $this->valor_total);
         $this->valor_total = (strpos(strtolower($this->valor_total), "e")) ? (float)$this->valor_total : $this->valor_total; 
         $this->valor_total = (string)$this->valor_total;
         $this->saldo = $rs->fields[7] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;
         $this->usuario = $rs->fields[8] ;  
         $this->cod_cuenta = $rs->fields[9] ;  
         $this->pagada = $rs->fields[10] ;  
         $this->asentada = $rs->fields[11] ;  
         $this->idtercero_cuenta = $rs->fields[12] ;  
         $this->idtercero_cuenta = (string)$this->idtercero_cuenta;
         $this->ie = $rs->fields[13] ;  
         $this->observaciones = $rs->fields[14] ;  
         $this->abonos = $rs->fields[15] ;  
         $this->abonos = (string)$this->abonos;
         $this->ultimo_abono = $rs->fields[16] ;  
         $this->fecha_uabono = $rs->fields[17] ;  
         $this->creado = $rs->fields[18] ;  
         $this->editado = $rs->fields[19] ;  
         $this->automatico = $rs->fields[20] ;  
         $this->tipo_tercero = $rs->fields[21] ;  
         $this->concepto = $rs->fields[22] ;  
         $this->concepto = (string)$this->concepto;
         //----- lookup - tercero
         $this->look_tercero = $this->tercero; 
         $this->Lookup->lookup_tercero($this->look_tercero, $this->tercero) ; 
         $this->look_tercero = ($this->look_tercero == "&nbsp;") ? "" : $this->look_tercero; 
         //----- lookup - tipo
         $this->look_tipo = $this->tipo; 
         $this->Lookup->lookup_tipo($this->look_tipo, $this->tipo) ; 
         $this->look_tipo = ($this->look_tipo == "&nbsp;") ? "" : $this->look_tipo; 
         //----- lookup - usuario
         $this->look_usuario = $this->usuario; 
         $this->Lookup->lookup_usuario($this->look_usuario, $this->usuario) ; 
         $this->look_usuario = ($this->look_usuario == "&nbsp;") ? "" : $this->look_usuario; 
         //----- lookup - ie
         $this->look_ie = $this->ie; 
         $this->Lookup->lookup_ie($this->look_ie); 
         $this->look_ie = ($this->look_ie == "&nbsp;") ? "" : $this->look_ie; 
         //----- lookup - concepto
         $this->look_concepto = $this->concepto; 
         $this->Lookup->lookup_concepto($this->look_concepto, $this->concepto) ; 
         $this->look_concepto = ($this->look_concepto == "&nbsp;") ? "" : $this->look_concepto; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['contr_erro'] = 'on';
  
      $nm_select = "select np from conceptos_documentos where codigo='".$this->tipo  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNP = array();
      $this->vnp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNP[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNP = false;
          $this->vNP_erro = $this->Db->ErrorMsg();
          $this->vnp = false;
          $this->vnp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vnp[0][0]))
{
	$vt = $this->vnp[0][0];
	if($vt=='-')
	{
		$this->pagada  = "";
	}
	else
	{
		if($this->pagada =='SI')
		{
			$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
		if($this->pagada =='NO')
		{
			$this->NM_field_style["pagada"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		}
	}
}

if($this->asentada =='SI')
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->asentada =='NO')
{
	$this->NM_field_style["asentada"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_terceros_cuentas_porpagar']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- prefijo
   function NM_export_prefijo()
   {
         $this->prefijo = html_entity_decode($this->prefijo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->prefijo = strip_tags($this->prefijo);
         $this->prefijo = NM_charset_to_utf8($this->prefijo);
         $this->prefijo = str_replace('<', '&lt;', $this->prefijo);
         $this->prefijo = str_replace('>', '&gt;', $this->prefijo);
         $this->Texto_tag .= "<td>" . $this->prefijo . "</td>\r\n";
   }
   //----- numero
   function NM_export_numero()
   {
         $this->numero = html_entity_decode($this->numero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero = strip_tags($this->numero);
         $this->numero = NM_charset_to_utf8($this->numero);
         $this->numero = str_replace('<', '&lt;', $this->numero);
         $this->numero = str_replace('>', '&gt;', $this->numero);
         $this->Texto_tag .= "<td>" . $this->numero . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
                 $this->fecha = $this->nm_data->FormataSaida("d/m/y");
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- tercero
   function NM_export_tercero()
   {
         nmgp_Form_Num_Val($this->look_tercero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_tercero = NM_charset_to_utf8($this->look_tercero);
         $this->look_tercero = str_replace('<', '&lt;', $this->look_tercero);
         $this->look_tercero = str_replace('>', '&gt;', $this->look_tercero);
         $this->Texto_tag .= "<td>" . $this->look_tercero . "</td>\r\n";
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->look_tipo = html_entity_decode($this->look_tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_tipo = strip_tags($this->look_tipo);
         $this->look_tipo = NM_charset_to_utf8($this->look_tipo);
         $this->look_tipo = str_replace('<', '&lt;', $this->look_tipo);
         $this->look_tipo = str_replace('>', '&gt;', $this->look_tipo);
         $this->Texto_tag .= "<td>" . $this->look_tipo . "</td>\r\n";
   }
   //----- numero_documento
   function NM_export_numero_documento()
   {
         $this->numero_documento = html_entity_decode($this->numero_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numero_documento = strip_tags($this->numero_documento);
         $this->numero_documento = NM_charset_to_utf8($this->numero_documento);
         $this->numero_documento = str_replace('<', '&lt;', $this->numero_documento);
         $this->numero_documento = str_replace('>', '&gt;', $this->numero_documento);
         $this->Texto_tag .= "<td>" . $this->numero_documento . "</td>\r\n";
   }
   //----- valor_total
   function NM_export_valor_total()
   {
             nmgp_Form_Num_Val($this->valor_total, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->valor_total = NM_charset_to_utf8($this->valor_total);
         $this->valor_total = str_replace('<', '&lt;', $this->valor_total);
         $this->valor_total = str_replace('>', '&gt;', $this->valor_total);
         $this->Texto_tag .= "<td>" . $this->valor_total . "</td>\r\n";
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- usuario
   function NM_export_usuario()
   {
         $this->look_usuario = html_entity_decode($this->look_usuario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_usuario = strip_tags($this->look_usuario);
         $this->look_usuario = NM_charset_to_utf8($this->look_usuario);
         $this->look_usuario = str_replace('<', '&lt;', $this->look_usuario);
         $this->look_usuario = str_replace('>', '&gt;', $this->look_usuario);
         $this->Texto_tag .= "<td>" . $this->look_usuario . "</td>\r\n";
   }
   //----- cod_cuenta
   function NM_export_cod_cuenta()
   {
         $this->cod_cuenta = html_entity_decode($this->cod_cuenta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cod_cuenta = strip_tags($this->cod_cuenta);
         $this->cod_cuenta = NM_charset_to_utf8($this->cod_cuenta);
         $this->cod_cuenta = str_replace('<', '&lt;', $this->cod_cuenta);
         $this->cod_cuenta = str_replace('>', '&gt;', $this->cod_cuenta);
         $this->Texto_tag .= "<td>" . $this->cod_cuenta . "</td>\r\n";
   }
   //----- pagada
   function NM_export_pagada()
   {
         $this->pagada = html_entity_decode($this->pagada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagada = strip_tags($this->pagada);
         $this->pagada = NM_charset_to_utf8($this->pagada);
         $this->pagada = str_replace('<', '&lt;', $this->pagada);
         $this->pagada = str_replace('>', '&gt;', $this->pagada);
         $this->Texto_tag .= "<td>" . $this->pagada . "</td>\r\n";
   }
   //----- asentada
   function NM_export_asentada()
   {
         $this->asentada = html_entity_decode($this->asentada, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->asentada = strip_tags($this->asentada);
         $this->asentada = NM_charset_to_utf8($this->asentada);
         $this->asentada = str_replace('<', '&lt;', $this->asentada);
         $this->asentada = str_replace('>', '&gt;', $this->asentada);
         $this->Texto_tag .= "<td>" . $this->asentada . "</td>\r\n";
   }
   //----- idtercero_cuenta
   function NM_export_idtercero_cuenta()
   {
             nmgp_Form_Num_Val($this->idtercero_cuenta, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idtercero_cuenta = NM_charset_to_utf8($this->idtercero_cuenta);
         $this->idtercero_cuenta = str_replace('<', '&lt;', $this->idtercero_cuenta);
         $this->idtercero_cuenta = str_replace('>', '&gt;', $this->idtercero_cuenta);
         $this->Texto_tag .= "<td>" . $this->idtercero_cuenta . "</td>\r\n";
   }
   //----- ie
   function NM_export_ie()
   {
         $this->look_ie = html_entity_decode($this->look_ie, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_ie = strip_tags($this->look_ie);
         $this->look_ie = NM_charset_to_utf8($this->look_ie);
         $this->look_ie = str_replace('<', '&lt;', $this->look_ie);
         $this->look_ie = str_replace('>', '&gt;', $this->look_ie);
         $this->Texto_tag .= "<td>" . $this->look_ie . "</td>\r\n";
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
   //----- abonos
   function NM_export_abonos()
   {
             nmgp_Form_Num_Val($this->abonos, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->abonos = NM_charset_to_utf8($this->abonos);
         $this->abonos = str_replace('<', '&lt;', $this->abonos);
         $this->abonos = str_replace('>', '&gt;', $this->abonos);
         $this->Texto_tag .= "<td>" . $this->abonos . "</td>\r\n";
   }
   //----- ultimo_abono
   function NM_export_ultimo_abono()
   {
         $this->ultimo_abono = html_entity_decode($this->ultimo_abono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ultimo_abono = strip_tags($this->ultimo_abono);
         $this->ultimo_abono = NM_charset_to_utf8($this->ultimo_abono);
         $this->ultimo_abono = str_replace('<', '&lt;', $this->ultimo_abono);
         $this->ultimo_abono = str_replace('>', '&gt;', $this->ultimo_abono);
         $this->Texto_tag .= "<td>" . $this->ultimo_abono . "</td>\r\n";
   }
   //----- fecha_uabono
   function NM_export_fecha_uabono()
   {
             $conteudo_x =  $this->fecha_uabono;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha_uabono, "YYYY-MM-DD  ");
                 $this->fecha_uabono = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha_uabono = NM_charset_to_utf8($this->fecha_uabono);
         $this->fecha_uabono = str_replace('<', '&lt;', $this->fecha_uabono);
         $this->fecha_uabono = str_replace('>', '&gt;', $this->fecha_uabono);
         $this->Texto_tag .= "<td>" . $this->fecha_uabono . "</td>\r\n";
   }
   //----- creado
   function NM_export_creado()
   {
             if (substr($this->creado, 10, 1) == "-") 
             { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
             } 
             if (substr($this->creado, 13, 1) == ".") 
             { 
                $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
             } 
             $conteudo_x =  $this->creado;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->creado, "YYYY-MM-DD HH:II:SS  ");
                 $this->creado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->creado = NM_charset_to_utf8($this->creado);
         $this->creado = str_replace('<', '&lt;', $this->creado);
         $this->creado = str_replace('>', '&gt;', $this->creado);
         $this->Texto_tag .= "<td>" . $this->creado . "</td>\r\n";
   }
   //----- editado
   function NM_export_editado()
   {
             if (substr($this->editado, 10, 1) == "-") 
             { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
             } 
             if (substr($this->editado, 13, 1) == ".") 
             { 
                $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
             } 
             $conteudo_x =  $this->editado;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->editado, "YYYY-MM-DD HH:II:SS  ");
                 $this->editado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->editado = NM_charset_to_utf8($this->editado);
         $this->editado = str_replace('<', '&lt;', $this->editado);
         $this->editado = str_replace('>', '&gt;', $this->editado);
         $this->Texto_tag .= "<td>" . $this->editado . "</td>\r\n";
   }
   //----- automatico
   function NM_export_automatico()
   {
         $this->automatico = html_entity_decode($this->automatico, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->automatico = strip_tags($this->automatico);
         $this->automatico = NM_charset_to_utf8($this->automatico);
         $this->automatico = str_replace('<', '&lt;', $this->automatico);
         $this->automatico = str_replace('>', '&gt;', $this->automatico);
         $this->Texto_tag .= "<td>" . $this->automatico . "</td>\r\n";
   }
   //----- tipo_tercero
   function NM_export_tipo_tercero()
   {
         $this->tipo_tercero = html_entity_decode($this->tipo_tercero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_tercero = strip_tags($this->tipo_tercero);
         $this->tipo_tercero = NM_charset_to_utf8($this->tipo_tercero);
         $this->tipo_tercero = str_replace('<', '&lt;', $this->tipo_tercero);
         $this->tipo_tercero = str_replace('>', '&gt;', $this->tipo_tercero);
         $this->Texto_tag .= "<td>" . $this->tipo_tercero . "</td>\r\n";
   }
   //----- concepto
   function NM_export_concepto()
   {
         nmgp_Form_Num_Val($this->look_concepto, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_concepto = NM_charset_to_utf8($this->look_concepto);
         $this->look_concepto = str_replace('<', '&lt;', $this->look_concepto);
         $this->look_concepto = str_replace('>', '&gt;', $this->look_concepto);
         $this->Texto_tag .= "<td>" . $this->look_concepto . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_cuentas_porpagar'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Documentos Tesorería :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_terceros_cuentas_porpagar_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_terceros_cuentas_porpagar"> 
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
