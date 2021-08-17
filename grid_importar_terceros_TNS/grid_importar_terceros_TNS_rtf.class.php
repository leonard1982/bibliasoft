<?php

class grid_importar_terceros_TNS_rtf
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
                   nm_limpa_str_grid_importar_terceros_TNS($cadapar[1]);
                   nm_protect_num_grid_importar_terceros_TNS($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_importar_terceros_TNS']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_importar_terceros_TNS_total.class.php"); 
      $this->Tot      = new grid_importar_terceros_TNS_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_importar_terceros_TNS']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_importar_terceros_TNS";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_importar_terceros_TNS.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_importar_terceros_TNS']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->terid = $Busca_temp['terid']; 
          $tmp_pos = strpos($this->terid, "##@@");
          if ($tmp_pos !== false && !is_array($this->terid))
          {
              $this->terid = substr($this->terid, 0, $tmp_pos);
          }
          $this->terid_2 = $Busca_temp['terid_input_2']; 
          $this->nit = $Busca_temp['nit']; 
          $tmp_pos = strpos($this->nit, "##@@");
          if ($tmp_pos !== false && !is_array($this->nit))
          {
              $this->nit = substr($this->nit, 0, $tmp_pos);
          }
          $this->tipodociden = $Busca_temp['tipodociden']; 
          $tmp_pos = strpos($this->tipodociden, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipodociden))
          {
              $this->tipodociden = substr($this->tipodociden, 0, $tmp_pos);
          }
          $this->nittri = $Busca_temp['nittri']; 
          $tmp_pos = strpos($this->nittri, "##@@");
          if ($tmp_pos !== false && !is_array($this->nittri))
          {
              $this->nittri = substr($this->nittri, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nit'])) ? $this->New_label['nit'] : "CODIGO"; 
          if ($Cada_col == "nit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nittri'])) ? $this->New_label['nittri'] : "CC/NIT"; 
          if ($Cada_col == "nittri" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "NOMBRE"; 
          if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "CLIENTE"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['proveed'])) ? $this->New_label['proveed'] : "PROVEED"; 
          if ($Cada_col == "proveed" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "EMPLEADO"; 
          if ($Cada_col == "empleado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "OTRO"; 
          if ($Cada_col == "otro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_deudores'])) ? $this->New_label['puc_deudores'] : "PUC DEUDORES"; 
          if ($Cada_col == "puc_deudores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retcli'])) ? $this->New_label['puc_retcli'] : "PUC RETCLI"; 
          if ($Cada_col == "puc_retcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_proveedores'])) ? $this->New_label['puc_proveedores'] : "PUC PROVEEDORES"; 
          if ($Cada_col == "puc_proveedores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retpro'])) ? $this->New_label['puc_retpro'] : "PUC RETPRO"; 
          if ($Cada_col == "puc_retpro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inactivo'])) ? $this->New_label['inactivo'] : "INACTIVO"; 
          if ($Cada_col == "inactivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['estado'])) ? $this->New_label['estado'] : "ESTADO"; 
          if ($Cada_col == "estado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['terid'])) ? $this->New_label['terid'] : "TERID"; 
          if ($Cada_col == "terid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipodociden'])) ? $this->New_label['tipodociden'] : "TIPODOCIDEN"; 
          if ($Cada_col == "tipodociden" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudadrexp'])) ? $this->New_label['ciudadrexp'] : "CIUDADREXP"; 
          if ($Cada_col == "ciudadrexp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direcc1'])) ? $this->New_label['direcc1'] : "DIRECC1"; 
          if ($Cada_col == "direcc1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direcc2'])) ? $this->New_label['direcc2'] : "DIRECC2"; 
          if ($Cada_col == "direcc2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona1'])) ? $this->New_label['zona1'] : "ZONA1"; 
          if ($Cada_col == "zona1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona2'])) ? $this->New_label['zona2'] : "ZONA2"; 
          if ($Cada_col == "zona2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "CIUDAD"; 
          if ($Cada_col == "ciudad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telef1'])) ? $this->New_label['telef1'] : "TELEF1"; 
          if ($Cada_col == "telef1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telef2'])) ? $this->New_label['telef2'] : "TELEF2"; 
          if ($Cada_col == "telef2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['repleg'])) ? $this->New_label['repleg'] : "REPLEG"; 
          if ($Cada_col == "repleg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vended'])) ? $this->New_label['vended'] : "VENDED"; 
          if ($Cada_col == "vended" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cobra'])) ? $this->New_label['cobra'] : "COBRA"; 
          if ($Cada_col == "cobra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['observ'])) ? $this->New_label['observ'] : "OBSERV"; 
          if ($Cada_col == "observ" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "EMAIL"; 
          if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['beeper'])) ? $this->New_label['beeper'] : "BEEPER"; 
          if ($Cada_col == "beeper" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empbeeper'])) ? $this->New_label['empbeeper'] : "EMPBEEPER"; 
          if ($Cada_col == "empbeeper" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['celular'])) ? $this->New_label['celular'] : "CELULAR"; 
          if ($Cada_col == "celular" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empcelular'])) ? $this->New_label['empcelular'] : "EMPCELULAR"; 
          if ($Cada_col == "empcelular" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechcreac'])) ? $this->New_label['fechcreac'] : "FECHCREAC"; 
          if ($Cada_col == "fechcreac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechact'])) ? $this->New_label['fechact'] : "FECHACT"; 
          if ($Cada_col == "fechact" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechultcom'])) ? $this->New_label['fechultcom'] : "FECHULTCOM"; 
          if ($Cada_col == "fechultcom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vrultcom'])) ? $this->New_label['vrultcom'] : "VRULTCOM"; 
          if ($Cada_col == "vrultcom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nroultcom'])) ? $this->New_label['nroultcom'] : "NROULTCOM"; 
          if ($Cada_col == "nroultcom" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechultven'])) ? $this->New_label['fechultven'] : "FECHULTVEN"; 
          if ($Cada_col == "fechultven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vrultven'])) ? $this->New_label['vrultven'] : "VRULTVEN"; 
          if ($Cada_col == "vrultven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nroultven'])) ? $this->New_label['nroultven'] : "NROULTVEN"; 
          if ($Cada_col == "nroultven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['clasificaid'])) ? $this->New_label['clasificaid'] : "CLASIFICAID"; 
          if ($Cada_col == "clasificaid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['maxcredcxp'])) ? $this->New_label['maxcredcxp'] : "MAXCREDCXP"; 
          if ($Cada_col == "maxcredcxp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['maxcredcxc'])) ? $this->New_label['maxcredcxc'] : "MAXCREDCXC"; 
          if ($Cada_col == "maxcredcxc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porreten'])) ? $this->New_label['porreten'] : "PORRETEN"; 
          if ($Cada_col == "porreten" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctacli'])) ? $this->New_label['ctacli'] : "CTACLI"; 
          if ($Cada_col == "ctacli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctapro'])) ? $this->New_label['ctapro'] : "CTAPRO"; 
          if ($Cada_col == "ctapro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctaretcli'])) ? $this->New_label['ctaretcli'] : "CTARETCLI"; 
          if ($Cada_col == "ctaretcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctaretpro'])) ? $this->New_label['ctaretpro'] : "CTARETPRO"; 
          if ($Cada_col == "ctaretpro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctaretscli'])) ? $this->New_label['ctaretscli'] : "CTARETSCLI"; 
          if ($Cada_col == "ctaretscli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ctaretspro'])) ? $this->New_label['ctaretspro'] : "CTARETSPRO"; 
          if ($Cada_col == "ctaretspro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecnaci'])) ? $this->New_label['fecnaci'] : "FECNACI"; 
          if ($Cada_col == "fecnaci" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codrecip'])) ? $this->New_label['codrecip'] : "CODRECIP"; 
          if ($Cada_col == "codrecip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcrecip'])) ? $this->New_label['porcrecip'] : "PORCRECIP"; 
          if ($Cada_col == "porcrecip" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['conductor'])) ? $this->New_label['conductor'] : "CONDUCTOR"; 
          if ($Cada_col == "conductor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tomador'])) ? $this->New_label['tomador'] : "TOMADOR"; 
          if ($Cada_col == "tomador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['propietario'])) ? $this->New_label['propietario'] : "PROPIETARIO"; 
          if ($Cada_col == "propietario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inmpropietario'])) ? $this->New_label['inmpropietario'] : "INMPROPIETARIO"; 
          if ($Cada_col == "inmpropietario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['inminquilino'])) ? $this->New_label['inminquilino'] : "INMINQUILINO"; 
          if ($Cada_col == "inminquilino" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudaneid'])) ? $this->New_label['ciudaneid'] : "CIUDANEID"; 
          if ($Cada_col == "ciudaneid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudadexp'])) ? $this->New_label['ciudadexp'] : "CIUDADEXP"; 
          if ($Cada_col == "ciudadexp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fiador'])) ? $this->New_label['fiador'] : "FIADOR"; 
          if ($Cada_col == "fiador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nomregtri'])) ? $this->New_label['nomregtri'] : "NOMREGTRI"; 
          if ($Cada_col == "nomregtri" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarjetapuntos'])) ? $this->New_label['tarjetapuntos'] : "TARJETAPUNTOS"; 
          if ($Cada_col == "tarjetapuntos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcretven'])) ? $this->New_label['porcretven'] : "PORCRETVEN"; 
          if ($Cada_col == "porcretven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "NOMBRE1"; 
          if ($Cada_col == "nombre1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "NOMBRE2"; 
          if ($Cada_col == "nombre2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "APELLIDO1"; 
          if ($Cada_col == "apellido1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "APELLIDO2"; 
          if ($Cada_col == "apellido2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['motivodevid'])) ? $this->New_label['motivodevid'] : "MOTIVODEVID"; 
          if ($Cada_col == "motivodevid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechinactivo'])) ? $this->New_label['fechinactivo'] : "FECHINACTIVO"; 
          if ($Cada_col == "fechinactivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['maxcreddias'])) ? $this->New_label['maxcreddias'] : "MAXCREDDIAS"; 
          if ($Cada_col == "maxcreddias" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nittriofi'])) ? $this->New_label['nittriofi'] : "NITTRIOFI"; 
          if ($Cada_col == "nittriofi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['acteconomicaid'])) ? $this->New_label['acteconomicaid'] : "ACTECONOMICAID"; 
          if ($Cada_col == "acteconomicaid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mesa'])) ? $this->New_label['mesa'] : "MESA"; 
          if ($Cada_col == "mesa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mostrador'])) ? $this->New_label['mostrador'] : "MOSTRADOR"; 
          if ($Cada_col == "mostrador" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcrivac'])) ? $this->New_label['porcrivac'] : "PORCRIVAC"; 
          if ($Cada_col == "porcrivac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcrivav'])) ? $this->New_label['porcrivav'] : "PORCRIVAV"; 
          if ($Cada_col == "porcrivav" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcricac'])) ? $this->New_label['porcricac'] : "PORCRICAC"; 
          if ($Cada_col == "porcricac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcricav'])) ? $this->New_label['porcricav'] : "PORCRICAV"; 
          if ($Cada_col == "porcricav" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['natjuridica'])) ? $this->New_label['natjuridica'] : "NATJURIDICA"; 
          if ($Cada_col == "natjuridica" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['barrioinid'])) ? $this->New_label['barrioinid'] : "BARRIOINID"; 
          if ($Cada_col == "barrioinid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecafilia'])) ? $this->New_label['fecafilia'] : "FECAFILIA"; 
          if ($Cada_col == "fecafilia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcrcreev'])) ? $this->New_label['porcrcreev'] : "PORCRCREEV"; 
          if ($Cada_col == "porcrcreev" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porcrcreec'])) ? $this->New_label['porcrcreec'] : "PORCRCREEC"; 
          if ($Cada_col == "porcrcreec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipocreev'])) ? $this->New_label['tipocreev'] : "TIPOCREEV"; 
          if ($Cada_col == "tipocreev" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipocreec'])) ? $this->New_label['tipocreec'] : "TIPOCREEC"; 
          if ($Cada_col == "tipocreec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numcue'])) ? $this->New_label['numcue'] : "NUMCUE"; 
          if ($Cada_col == "numcue" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipcue'])) ? $this->New_label['tipcue'] : "TIPCUE"; 
          if ($Cada_col == "tipcue" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['actcomerid'])) ? $this->New_label['actcomerid'] : "ACTCOMERID"; 
          if ($Cada_col == "actcomerid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecultenvio'])) ? $this->New_label['fecultenvio'] : "FECULTENVIO"; 
          if ($Cada_col == "fecultenvio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['consecterws'])) ? $this->New_label['consecterws'] : "CONSECTERWS"; 
          if ($Cada_col == "consecterws" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['feclegal'])) ? $this->New_label['feclegal'] : "FECLEGAL"; 
          if ($Cada_col == "feclegal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['emailemp'])) ? $this->New_label['emailemp'] : "EMAILEMP"; 
          if ($Cada_col == "emailemp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pagweb'])) ? $this->New_label['pagweb'] : "PAGWEB"; 
          if ($Cada_col == "pagweb" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['eterritorial'])) ? $this->New_label['eterritorial'] : "ETERRITORIAL"; 
          if ($Cada_col == "eterritorial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['listaprecioid'])) ? $this->New_label['listaprecioid'] : "LISTAPRECIOID"; 
          if ($Cada_col == "listaprecioid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['extlocal'])) ? $this->New_label['extlocal'] : "EXTLOCAL"; 
          if ($Cada_col == "extlocal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pep'])) ? $this->New_label['pep'] : "PEP"; 
          if ($Cada_col == "pep" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nomempresa'])) ? $this->New_label['nomempresa'] : "NOMEMPRESA"; 
          if ($Cada_col == "nomempresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaexp'])) ? $this->New_label['fechaexp'] : "FECHAEXP"; 
          if ($Cada_col == "fechaexp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ocupid'])) ? $this->New_label['ocupid'] : "OCUPID"; 
          if ($Cada_col == "ocupid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT NIT, NITTRI, NOMBRE, CLIENTE, PROVEED, EMPLEADO, OTRO, PUC_DEUDORES, PUC_RETCLI, PUC_PROVEEDORES, PUC_RETPRO, INACTIVO, TERID, TIPODOCIDEN, CIUDADREXP, DIRECC1, DIRECC2, ZONA1, ZONA2, CIUDAD, TELEF1, TELEF2, REPLEG, VENDED, COBRA, OBSERV, EMAIL, BEEPER, EMPBEEPER, CELULAR, EMPCELULAR, FECHCREAC, FECHACT, FECHULTCOM, VRULTCOM, NROULTCOM, FECHULTVEN, VRULTVEN, NROULTVEN, CLASIFICAID, MAXCREDCXP, MAXCREDCXC, PORRETEN, CTACLI, CTAPRO, CTARETCLI, CTARETPRO, CTARETSCLI, CTARETSPRO, FECNACI, CODRECIP, PORCRECIP, CONDUCTOR, TOMADOR, PROPIETARIO, INMPROPIETARIO, INMINQUILINO, CIUDANEID, CIUDADEXP, FIADOR, NOMREGTRI, TARJETAPUNTOS, PORCRETVEN, NOMBRE1, NOMBRE2, APELLIDO1, APELLIDO2, MOTIVODEVID, FECHINACTIVO, MAXCREDDIAS, NITTRIOFI, ACTECONOMICAID, MESA, MOSTRADOR, PORCRIVAC, PORCRIVAV, PORCRICAC, PORCRICAV, NATJURIDICA, BARRIOINID, FECAFILIA, PORCRCREEV, PORCRCREEC, TIPOCREEV, TIPOCREEC, NUMCUE, TIPCUE, ACTCOMERID, FECULTENVIO, CONSECTERWS, FECLEGAL, EMAILEMP, PAGWEB, ETERRITORIAL, LISTAPRECIOID, EXTLOCAL, PEP, NOMEMPRESA, FECHAEXP, OCUPID from (SELECT      TERID,     NIT,     TIPODOCIDEN,     NITTRI,     CIUDADREXP,     NOMBRE,     DIRECC1,     DIRECC2,     ZONA1,     ZONA2,     CIUDAD,     TELEF1,     TELEF2,     REPLEG,     CLIENTE,     PROVEED,     VENDED,     COBRA,     OBSERV,     EMAIL,     BEEPER,     EMPBEEPER,     CELULAR,     EMPCELULAR,     FECHCREAC,     FECHACT,     FECHULTCOM,     VRULTCOM,     NROULTCOM,     FECHULTVEN,     VRULTVEN,     NROULTVEN,     CLASIFICAID,     MAXCREDCXP,     MAXCREDCXC,     PORRETEN,     CTACLI,     CTAPRO,     CTARETCLI,     CTARETPRO,     CTARETSCLI,     CTARETSPRO,     FECNACI,     CODRECIP,     PORCRECIP,     CONDUCTOR,     TOMADOR,     PROPIETARIO,     EMPLEADO,     INMPROPIETARIO,     INMINQUILINO,     CIUDANEID,     CIUDADEXP,     FIADOR,     INACTIVO,     NOMREGTRI,     TARJETAPUNTOS,     PORCRETVEN,     NOMBRE1,     NOMBRE2,     APELLIDO1,     APELLIDO2,     OTRO,     MOTIVODEVID,     FECHINACTIVO,     MAXCREDDIAS,     NITTRIOFI,     ACTECONOMICAID,     MESA,     MOSTRADOR,     PORCRIVAC,     PORCRIVAV,     PORCRICAC,     PORCRICAV,     NATJURIDICA,     BARRIOINID,     FECAFILIA,     PORCRCREEV,     PORCRCREEC,     TIPOCREEV,     TIPOCREEC,     NUMCUE,     TIPCUE,     ACTCOMERID,     FECULTENVIO,     CONSECTERWS,     FECLEGAL,     EMAILEMP,     PAGWEB,     ETERRITORIAL,     LISTAPRECIOID,     EXTLOCAL,     '' AS PEP,     '' AS  NOMEMPRESA,     '' AS FECHAEXP,     '' AS OCUPID,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTACLI) AS PUC_DEUDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETCLI) AS PUC_RETCLI,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTAPRO) AS PUC_PROVEEDORES,     (SELECT P.CODIGO FROM PLANCUENTAS P WHERE P.PUCID=CTARETPRO) AS PUC_RETPRO FROM      TERCEROS) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['order_grid'];
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
         $this->nit = $rs->fields[0] ;  
         $this->nittri = $rs->fields[1] ;  
         $this->nombre = $rs->fields[2] ;  
         $this->cliente = $rs->fields[3] ;  
         $this->proveed = $rs->fields[4] ;  
         $this->empleado = $rs->fields[5] ;  
         $this->otro = $rs->fields[6] ;  
         $this->puc_deudores = $rs->fields[7] ;  
         $this->puc_retcli = $rs->fields[8] ;  
         $this->puc_proveedores = $rs->fields[9] ;  
         $this->puc_retpro = $rs->fields[10] ;  
         $this->inactivo = $rs->fields[11] ;  
         $this->terid = $rs->fields[12] ;  
         $this->terid = (string)$this->terid;
         $this->tipodociden = $rs->fields[13] ;  
         $this->ciudadrexp = $rs->fields[14] ;  
         $this->direcc1 = $rs->fields[15] ;  
         $this->direcc2 = $rs->fields[16] ;  
         $this->zona1 = $rs->fields[17] ;  
         $this->zona1 = (string)$this->zona1;
         $this->zona2 = $rs->fields[18] ;  
         $this->zona2 = (string)$this->zona2;
         $this->ciudad = $rs->fields[19] ;  
         $this->telef1 = $rs->fields[20] ;  
         $this->telef2 = $rs->fields[21] ;  
         $this->repleg = $rs->fields[22] ;  
         $this->vended = $rs->fields[23] ;  
         $this->cobra = $rs->fields[24] ;  
         $this->observ = $rs->fields[25] ;  
         $this->email = $rs->fields[26] ;  
         $this->beeper = $rs->fields[27] ;  
         $this->empbeeper = $rs->fields[28] ;  
         $this->empbeeper = (string)$this->empbeeper;
         $this->celular = $rs->fields[29] ;  
         $this->empcelular = $rs->fields[30] ;  
         $this->empcelular = (string)$this->empcelular;
         $this->fechcreac = $rs->fields[31] ;  
         $this->fechact = $rs->fields[32] ;  
         $this->fechultcom = $rs->fields[33] ;  
         $this->vrultcom = $rs->fields[34] ;  
         $this->vrultcom =  str_replace(",", ".", $this->vrultcom);
         $this->vrultcom = (string)$this->vrultcom;
         $this->nroultcom = $rs->fields[35] ;  
         $this->fechultven = $rs->fields[36] ;  
         $this->vrultven = $rs->fields[37] ;  
         $this->vrultven =  str_replace(",", ".", $this->vrultven);
         $this->vrultven = (string)$this->vrultven;
         $this->nroultven = $rs->fields[38] ;  
         $this->clasificaid = $rs->fields[39] ;  
         $this->clasificaid = (string)$this->clasificaid;
         $this->maxcredcxp = $rs->fields[40] ;  
         $this->maxcredcxp =  str_replace(",", ".", $this->maxcredcxp);
         $this->maxcredcxp = (string)$this->maxcredcxp;
         $this->maxcredcxc = $rs->fields[41] ;  
         $this->maxcredcxc =  str_replace(",", ".", $this->maxcredcxc);
         $this->maxcredcxc = (string)$this->maxcredcxc;
         $this->porreten = $rs->fields[42] ;  
         $this->ctacli = $rs->fields[43] ;  
         $this->ctacli = (string)$this->ctacli;
         $this->ctapro = $rs->fields[44] ;  
         $this->ctapro = (string)$this->ctapro;
         $this->ctaretcli = $rs->fields[45] ;  
         $this->ctaretcli = (string)$this->ctaretcli;
         $this->ctaretpro = $rs->fields[46] ;  
         $this->ctaretpro = (string)$this->ctaretpro;
         $this->ctaretscli = $rs->fields[47] ;  
         $this->ctaretscli = (string)$this->ctaretscli;
         $this->ctaretspro = $rs->fields[48] ;  
         $this->ctaretspro = (string)$this->ctaretspro;
         $this->fecnaci = $rs->fields[49] ;  
         $this->codrecip = $rs->fields[50] ;  
         $this->porcrecip = $rs->fields[51] ;  
         $this->porcrecip =  str_replace(",", ".", $this->porcrecip);
         $this->porcrecip = (string)$this->porcrecip;
         $this->conductor = $rs->fields[52] ;  
         $this->tomador = $rs->fields[53] ;  
         $this->propietario = $rs->fields[54] ;  
         $this->inmpropietario = $rs->fields[55] ;  
         $this->inminquilino = $rs->fields[56] ;  
         $this->ciudaneid = $rs->fields[57] ;  
         $this->ciudaneid = (string)$this->ciudaneid;
         $this->ciudadexp = $rs->fields[58] ;  
         $this->ciudadexp = (string)$this->ciudadexp;
         $this->fiador = $rs->fields[59] ;  
         $this->nomregtri = $rs->fields[60] ;  
         $this->tarjetapuntos = $rs->fields[61] ;  
         $this->porcretven = $rs->fields[62] ;  
         $this->porcretven =  str_replace(",", ".", $this->porcretven);
         $this->porcretven = (string)$this->porcretven;
         $this->nombre1 = $rs->fields[63] ;  
         $this->nombre2 = $rs->fields[64] ;  
         $this->apellido1 = $rs->fields[65] ;  
         $this->apellido2 = $rs->fields[66] ;  
         $this->motivodevid = $rs->fields[67] ;  
         $this->motivodevid = (string)$this->motivodevid;
         $this->fechinactivo = $rs->fields[68] ;  
         $this->maxcreddias = $rs->fields[69] ;  
         $this->maxcreddias = (string)$this->maxcreddias;
         $this->nittriofi = $rs->fields[70] ;  
         $this->acteconomicaid = $rs->fields[71] ;  
         $this->acteconomicaid = (string)$this->acteconomicaid;
         $this->mesa = $rs->fields[72] ;  
         $this->mostrador = $rs->fields[73] ;  
         $this->porcrivac = $rs->fields[74] ;  
         $this->porcrivac =  str_replace(",", ".", $this->porcrivac);
         $this->porcrivac = (string)$this->porcrivac;
         $this->porcrivav = $rs->fields[75] ;  
         $this->porcrivav =  str_replace(",", ".", $this->porcrivav);
         $this->porcrivav = (string)$this->porcrivav;
         $this->porcricac = $rs->fields[76] ;  
         $this->porcricac = (string)$this->porcricac;
         $this->porcricav = $rs->fields[77] ;  
         $this->porcricav = (string)$this->porcricav;
         $this->natjuridica = $rs->fields[78] ;  
         $this->barrioinid = $rs->fields[79] ;  
         $this->barrioinid = (string)$this->barrioinid;
         $this->fecafilia = $rs->fields[80] ;  
         $this->porcrcreev = $rs->fields[81] ;  
         $this->porcrcreev =  str_replace(",", ".", $this->porcrcreev);
         $this->porcrcreev = (string)$this->porcrcreev;
         $this->porcrcreec = $rs->fields[82] ;  
         $this->porcrcreec =  str_replace(",", ".", $this->porcrcreec);
         $this->porcrcreec = (string)$this->porcrcreec;
         $this->tipocreev = $rs->fields[83] ;  
         $this->tipocreev = (string)$this->tipocreev;
         $this->tipocreec = $rs->fields[84] ;  
         $this->tipocreec = (string)$this->tipocreec;
         $this->numcue = $rs->fields[85] ;  
         $this->tipcue = $rs->fields[86] ;  
         $this->actcomerid = $rs->fields[87] ;  
         $this->actcomerid = (string)$this->actcomerid;
         $this->fecultenvio = $rs->fields[88] ;  
         $this->consecterws = $rs->fields[89] ;  
         $this->feclegal = $rs->fields[90] ;  
         $this->emailemp = $rs->fields[91] ;  
         $this->pagweb = $rs->fields[92] ;  
         $this->eterritorial = $rs->fields[93] ;  
         $this->listaprecioid = $rs->fields[94] ;  
         $this->listaprecioid = (string)$this->listaprecioid;
         $this->extlocal = $rs->fields[95] ;  
         $this->extlocal =  str_replace(",", ".", $this->extlocal);
         $this->extlocal = (string)$this->extlocal;
         $this->pep = $rs->fields[96] ;  
         $this->nomempresa = $rs->fields[97] ;  
         $this->fechaexp = $rs->fields[98] ;  
         $this->ocupid = $rs->fields[99] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_importar_terceros_TNS']['contr_erro'] = 'on';
 $buscadigito = strpos($this->nittri , "-");
$digito      = "";
$vnit        = $this->nittri ;
	
if ($buscadigito === false) {
		
} 
else 
{
	$cadena = trim($this->nittri );
	$digito = substr($cadena,-1);
	$vnit   = substr($cadena,0,-2);
}

 
      $nm_select = "select documento from terceros where documento='".$vnit."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExiste = array();
      $this->vsiexiste = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiExiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExiste = false;
          $this->vSiExiste_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vsiexiste = false;
          $this->vsiexiste_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vsiexiste[0][0]))
{
	
	$this->estado  = "Importado";
	$this->NM_field_style["estado"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
else
{
	$this->estado  = "";
}
$_SESSION['scriptcase']['grid_importar_terceros_TNS']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- nit
   function NM_export_nit()
   {
         $this->nit = html_entity_decode($this->nit, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nit = strip_tags($this->nit);
         $this->nit = NM_charset_to_utf8($this->nit);
         $this->nit = str_replace('<', '&lt;', $this->nit);
         $this->nit = str_replace('>', '&gt;', $this->nit);
         $this->Texto_tag .= "<td>" . $this->nit . "</td>\r\n";
   }
   //----- nittri
   function NM_export_nittri()
   {
         $this->nittri = html_entity_decode($this->nittri, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nittri = strip_tags($this->nittri);
         $this->nittri = NM_charset_to_utf8($this->nittri);
         $this->nittri = str_replace('<', '&lt;', $this->nittri);
         $this->nittri = str_replace('>', '&gt;', $this->nittri);
         $this->Texto_tag .= "<td>" . $this->nittri . "</td>\r\n";
   }
   //----- nombre
   function NM_export_nombre()
   {
         $this->nombre = html_entity_decode($this->nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre = strip_tags($this->nombre);
         $this->nombre = NM_charset_to_utf8($this->nombre);
         $this->nombre = str_replace('<', '&lt;', $this->nombre);
         $this->nombre = str_replace('>', '&gt;', $this->nombre);
         $this->Texto_tag .= "<td>" . $this->nombre . "</td>\r\n";
   }
   //----- cliente
   function NM_export_cliente()
   {
         $this->cliente = html_entity_decode($this->cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cliente = strip_tags($this->cliente);
         $this->cliente = NM_charset_to_utf8($this->cliente);
         $this->cliente = str_replace('<', '&lt;', $this->cliente);
         $this->cliente = str_replace('>', '&gt;', $this->cliente);
         $this->Texto_tag .= "<td>" . $this->cliente . "</td>\r\n";
   }
   //----- proveed
   function NM_export_proveed()
   {
         $this->proveed = html_entity_decode($this->proveed, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->proveed = strip_tags($this->proveed);
         $this->proveed = NM_charset_to_utf8($this->proveed);
         $this->proveed = str_replace('<', '&lt;', $this->proveed);
         $this->proveed = str_replace('>', '&gt;', $this->proveed);
         $this->Texto_tag .= "<td>" . $this->proveed . "</td>\r\n";
   }
   //----- empleado
   function NM_export_empleado()
   {
         $this->empleado = html_entity_decode($this->empleado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->empleado = strip_tags($this->empleado);
         $this->empleado = NM_charset_to_utf8($this->empleado);
         $this->empleado = str_replace('<', '&lt;', $this->empleado);
         $this->empleado = str_replace('>', '&gt;', $this->empleado);
         $this->Texto_tag .= "<td>" . $this->empleado . "</td>\r\n";
   }
   //----- otro
   function NM_export_otro()
   {
         $this->otro = html_entity_decode($this->otro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->otro = strip_tags($this->otro);
         $this->otro = NM_charset_to_utf8($this->otro);
         $this->otro = str_replace('<', '&lt;', $this->otro);
         $this->otro = str_replace('>', '&gt;', $this->otro);
         $this->Texto_tag .= "<td>" . $this->otro . "</td>\r\n";
   }
   //----- puc_deudores
   function NM_export_puc_deudores()
   {
         $this->puc_deudores = html_entity_decode($this->puc_deudores, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->puc_deudores = strip_tags($this->puc_deudores);
         $this->puc_deudores = NM_charset_to_utf8($this->puc_deudores);
         $this->puc_deudores = str_replace('<', '&lt;', $this->puc_deudores);
         $this->puc_deudores = str_replace('>', '&gt;', $this->puc_deudores);
         $this->Texto_tag .= "<td>" . $this->puc_deudores . "</td>\r\n";
   }
   //----- puc_retcli
   function NM_export_puc_retcli()
   {
         $this->puc_retcli = html_entity_decode($this->puc_retcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->puc_retcli = strip_tags($this->puc_retcli);
         $this->puc_retcli = NM_charset_to_utf8($this->puc_retcli);
         $this->puc_retcli = str_replace('<', '&lt;', $this->puc_retcli);
         $this->puc_retcli = str_replace('>', '&gt;', $this->puc_retcli);
         $this->Texto_tag .= "<td>" . $this->puc_retcli . "</td>\r\n";
   }
   //----- puc_proveedores
   function NM_export_puc_proveedores()
   {
         $this->puc_proveedores = html_entity_decode($this->puc_proveedores, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->puc_proveedores = strip_tags($this->puc_proveedores);
         $this->puc_proveedores = NM_charset_to_utf8($this->puc_proveedores);
         $this->puc_proveedores = str_replace('<', '&lt;', $this->puc_proveedores);
         $this->puc_proveedores = str_replace('>', '&gt;', $this->puc_proveedores);
         $this->Texto_tag .= "<td>" . $this->puc_proveedores . "</td>\r\n";
   }
   //----- puc_retpro
   function NM_export_puc_retpro()
   {
         $this->puc_retpro = html_entity_decode($this->puc_retpro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->puc_retpro = strip_tags($this->puc_retpro);
         $this->puc_retpro = NM_charset_to_utf8($this->puc_retpro);
         $this->puc_retpro = str_replace('<', '&lt;', $this->puc_retpro);
         $this->puc_retpro = str_replace('>', '&gt;', $this->puc_retpro);
         $this->Texto_tag .= "<td>" . $this->puc_retpro . "</td>\r\n";
   }
   //----- inactivo
   function NM_export_inactivo()
   {
         $this->inactivo = html_entity_decode($this->inactivo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->inactivo = strip_tags($this->inactivo);
         $this->inactivo = NM_charset_to_utf8($this->inactivo);
         $this->inactivo = str_replace('<', '&lt;', $this->inactivo);
         $this->inactivo = str_replace('>', '&gt;', $this->inactivo);
         $this->Texto_tag .= "<td>" . $this->inactivo . "</td>\r\n";
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
   //----- terid
   function NM_export_terid()
   {
             nmgp_Form_Num_Val($this->terid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->terid = NM_charset_to_utf8($this->terid);
         $this->terid = str_replace('<', '&lt;', $this->terid);
         $this->terid = str_replace('>', '&gt;', $this->terid);
         $this->Texto_tag .= "<td>" . $this->terid . "</td>\r\n";
   }
   //----- tipodociden
   function NM_export_tipodociden()
   {
         $this->tipodociden = html_entity_decode($this->tipodociden, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipodociden = strip_tags($this->tipodociden);
         $this->tipodociden = NM_charset_to_utf8($this->tipodociden);
         $this->tipodociden = str_replace('<', '&lt;', $this->tipodociden);
         $this->tipodociden = str_replace('>', '&gt;', $this->tipodociden);
         $this->Texto_tag .= "<td>" . $this->tipodociden . "</td>\r\n";
   }
   //----- ciudadrexp
   function NM_export_ciudadrexp()
   {
         $this->ciudadrexp = html_entity_decode($this->ciudadrexp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ciudadrexp = strip_tags($this->ciudadrexp);
         $this->ciudadrexp = NM_charset_to_utf8($this->ciudadrexp);
         $this->ciudadrexp = str_replace('<', '&lt;', $this->ciudadrexp);
         $this->ciudadrexp = str_replace('>', '&gt;', $this->ciudadrexp);
         $this->Texto_tag .= "<td>" . $this->ciudadrexp . "</td>\r\n";
   }
   //----- direcc1
   function NM_export_direcc1()
   {
         $this->direcc1 = html_entity_decode($this->direcc1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direcc1 = strip_tags($this->direcc1);
         $this->direcc1 = NM_charset_to_utf8($this->direcc1);
         $this->direcc1 = str_replace('<', '&lt;', $this->direcc1);
         $this->direcc1 = str_replace('>', '&gt;', $this->direcc1);
         $this->Texto_tag .= "<td>" . $this->direcc1 . "</td>\r\n";
   }
   //----- direcc2
   function NM_export_direcc2()
   {
         $this->direcc2 = html_entity_decode($this->direcc2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direcc2 = strip_tags($this->direcc2);
         $this->direcc2 = NM_charset_to_utf8($this->direcc2);
         $this->direcc2 = str_replace('<', '&lt;', $this->direcc2);
         $this->direcc2 = str_replace('>', '&gt;', $this->direcc2);
         $this->Texto_tag .= "<td>" . $this->direcc2 . "</td>\r\n";
   }
   //----- zona1
   function NM_export_zona1()
   {
             nmgp_Form_Num_Val($this->zona1, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->zona1 = NM_charset_to_utf8($this->zona1);
         $this->zona1 = str_replace('<', '&lt;', $this->zona1);
         $this->zona1 = str_replace('>', '&gt;', $this->zona1);
         $this->Texto_tag .= "<td>" . $this->zona1 . "</td>\r\n";
   }
   //----- zona2
   function NM_export_zona2()
   {
             nmgp_Form_Num_Val($this->zona2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->zona2 = NM_charset_to_utf8($this->zona2);
         $this->zona2 = str_replace('<', '&lt;', $this->zona2);
         $this->zona2 = str_replace('>', '&gt;', $this->zona2);
         $this->Texto_tag .= "<td>" . $this->zona2 . "</td>\r\n";
   }
   //----- ciudad
   function NM_export_ciudad()
   {
         $this->ciudad = html_entity_decode($this->ciudad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ciudad = strip_tags($this->ciudad);
         $this->ciudad = NM_charset_to_utf8($this->ciudad);
         $this->ciudad = str_replace('<', '&lt;', $this->ciudad);
         $this->ciudad = str_replace('>', '&gt;', $this->ciudad);
         $this->Texto_tag .= "<td>" . $this->ciudad . "</td>\r\n";
   }
   //----- telef1
   function NM_export_telef1()
   {
         $this->telef1 = html_entity_decode($this->telef1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telef1 = strip_tags($this->telef1);
         $this->telef1 = NM_charset_to_utf8($this->telef1);
         $this->telef1 = str_replace('<', '&lt;', $this->telef1);
         $this->telef1 = str_replace('>', '&gt;', $this->telef1);
         $this->Texto_tag .= "<td>" . $this->telef1 . "</td>\r\n";
   }
   //----- telef2
   function NM_export_telef2()
   {
         $this->telef2 = html_entity_decode($this->telef2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telef2 = strip_tags($this->telef2);
         $this->telef2 = NM_charset_to_utf8($this->telef2);
         $this->telef2 = str_replace('<', '&lt;', $this->telef2);
         $this->telef2 = str_replace('>', '&gt;', $this->telef2);
         $this->Texto_tag .= "<td>" . $this->telef2 . "</td>\r\n";
   }
   //----- repleg
   function NM_export_repleg()
   {
         $this->repleg = html_entity_decode($this->repleg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->repleg = strip_tags($this->repleg);
         $this->repleg = NM_charset_to_utf8($this->repleg);
         $this->repleg = str_replace('<', '&lt;', $this->repleg);
         $this->repleg = str_replace('>', '&gt;', $this->repleg);
         $this->Texto_tag .= "<td>" . $this->repleg . "</td>\r\n";
   }
   //----- vended
   function NM_export_vended()
   {
         $this->vended = html_entity_decode($this->vended, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vended = strip_tags($this->vended);
         $this->vended = NM_charset_to_utf8($this->vended);
         $this->vended = str_replace('<', '&lt;', $this->vended);
         $this->vended = str_replace('>', '&gt;', $this->vended);
         $this->Texto_tag .= "<td>" . $this->vended . "</td>\r\n";
   }
   //----- cobra
   function NM_export_cobra()
   {
         $this->cobra = html_entity_decode($this->cobra, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->cobra = strip_tags($this->cobra);
         $this->cobra = NM_charset_to_utf8($this->cobra);
         $this->cobra = str_replace('<', '&lt;', $this->cobra);
         $this->cobra = str_replace('>', '&gt;', $this->cobra);
         $this->Texto_tag .= "<td>" . $this->cobra . "</td>\r\n";
   }
   //----- observ
   function NM_export_observ()
   {
         $this->observ = html_entity_decode($this->observ, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observ = strip_tags($this->observ);
         $this->observ = NM_charset_to_utf8($this->observ);
         $this->observ = str_replace('<', '&lt;', $this->observ);
         $this->observ = str_replace('>', '&gt;', $this->observ);
         $this->Texto_tag .= "<td>" . $this->observ . "</td>\r\n";
   }
   //----- email
   function NM_export_email()
   {
         $this->email = html_entity_decode($this->email, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->email = strip_tags($this->email);
         $this->email = NM_charset_to_utf8($this->email);
         $this->email = str_replace('<', '&lt;', $this->email);
         $this->email = str_replace('>', '&gt;', $this->email);
         $this->Texto_tag .= "<td>" . $this->email . "</td>\r\n";
   }
   //----- beeper
   function NM_export_beeper()
   {
         $this->beeper = html_entity_decode($this->beeper, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->beeper = strip_tags($this->beeper);
         $this->beeper = NM_charset_to_utf8($this->beeper);
         $this->beeper = str_replace('<', '&lt;', $this->beeper);
         $this->beeper = str_replace('>', '&gt;', $this->beeper);
         $this->Texto_tag .= "<td>" . $this->beeper . "</td>\r\n";
   }
   //----- empbeeper
   function NM_export_empbeeper()
   {
             nmgp_Form_Num_Val($this->empbeeper, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->empbeeper = NM_charset_to_utf8($this->empbeeper);
         $this->empbeeper = str_replace('<', '&lt;', $this->empbeeper);
         $this->empbeeper = str_replace('>', '&gt;', $this->empbeeper);
         $this->Texto_tag .= "<td>" . $this->empbeeper . "</td>\r\n";
   }
   //----- celular
   function NM_export_celular()
   {
         $this->celular = html_entity_decode($this->celular, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->celular = strip_tags($this->celular);
         $this->celular = NM_charset_to_utf8($this->celular);
         $this->celular = str_replace('<', '&lt;', $this->celular);
         $this->celular = str_replace('>', '&gt;', $this->celular);
         $this->Texto_tag .= "<td>" . $this->celular . "</td>\r\n";
   }
   //----- empcelular
   function NM_export_empcelular()
   {
             nmgp_Form_Num_Val($this->empcelular, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->empcelular = NM_charset_to_utf8($this->empcelular);
         $this->empcelular = str_replace('<', '&lt;', $this->empcelular);
         $this->empcelular = str_replace('>', '&gt;', $this->empcelular);
         $this->Texto_tag .= "<td>" . $this->empcelular . "</td>\r\n";
   }
   //----- fechcreac
   function NM_export_fechcreac()
   {
             if (substr($this->fechcreac, 10, 1) == "-") 
             { 
                 $this->fechcreac = substr($this->fechcreac, 0, 10) . " " . substr($this->fechcreac, 11);
             } 
             if (substr($this->fechcreac, 13, 1) == ".") 
             { 
                $this->fechcreac = substr($this->fechcreac, 0, 13) . ":" . substr($this->fechcreac, 14, 2) . ":" . substr($this->fechcreac, 17);
             } 
             $conteudo_x =  $this->fechcreac;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechcreac, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechcreac = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechcreac = NM_charset_to_utf8($this->fechcreac);
         $this->fechcreac = str_replace('<', '&lt;', $this->fechcreac);
         $this->fechcreac = str_replace('>', '&gt;', $this->fechcreac);
         $this->Texto_tag .= "<td>" . $this->fechcreac . "</td>\r\n";
   }
   //----- fechact
   function NM_export_fechact()
   {
             if (substr($this->fechact, 10, 1) == "-") 
             { 
                 $this->fechact = substr($this->fechact, 0, 10) . " " . substr($this->fechact, 11);
             } 
             if (substr($this->fechact, 13, 1) == ".") 
             { 
                $this->fechact = substr($this->fechact, 0, 13) . ":" . substr($this->fechact, 14, 2) . ":" . substr($this->fechact, 17);
             } 
             $conteudo_x =  $this->fechact;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechact, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechact = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechact = NM_charset_to_utf8($this->fechact);
         $this->fechact = str_replace('<', '&lt;', $this->fechact);
         $this->fechact = str_replace('>', '&gt;', $this->fechact);
         $this->Texto_tag .= "<td>" . $this->fechact . "</td>\r\n";
   }
   //----- fechultcom
   function NM_export_fechultcom()
   {
             if (substr($this->fechultcom, 10, 1) == "-") 
             { 
                 $this->fechultcom = substr($this->fechultcom, 0, 10) . " " . substr($this->fechultcom, 11);
             } 
             if (substr($this->fechultcom, 13, 1) == ".") 
             { 
                $this->fechultcom = substr($this->fechultcom, 0, 13) . ":" . substr($this->fechultcom, 14, 2) . ":" . substr($this->fechultcom, 17);
             } 
             $conteudo_x =  $this->fechultcom;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechultcom, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechultcom = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechultcom = NM_charset_to_utf8($this->fechultcom);
         $this->fechultcom = str_replace('<', '&lt;', $this->fechultcom);
         $this->fechultcom = str_replace('>', '&gt;', $this->fechultcom);
         $this->Texto_tag .= "<td>" . $this->fechultcom . "</td>\r\n";
   }
   //----- vrultcom
   function NM_export_vrultcom()
   {
             nmgp_Form_Num_Val($this->vrultcom, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->vrultcom = NM_charset_to_utf8($this->vrultcom);
         $this->vrultcom = str_replace('<', '&lt;', $this->vrultcom);
         $this->vrultcom = str_replace('>', '&gt;', $this->vrultcom);
         $this->Texto_tag .= "<td>" . $this->vrultcom . "</td>\r\n";
   }
   //----- nroultcom
   function NM_export_nroultcom()
   {
         $this->nroultcom = html_entity_decode($this->nroultcom, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nroultcom = strip_tags($this->nroultcom);
         $this->nroultcom = NM_charset_to_utf8($this->nroultcom);
         $this->nroultcom = str_replace('<', '&lt;', $this->nroultcom);
         $this->nroultcom = str_replace('>', '&gt;', $this->nroultcom);
         $this->Texto_tag .= "<td>" . $this->nroultcom . "</td>\r\n";
   }
   //----- fechultven
   function NM_export_fechultven()
   {
             if (substr($this->fechultven, 10, 1) == "-") 
             { 
                 $this->fechultven = substr($this->fechultven, 0, 10) . " " . substr($this->fechultven, 11);
             } 
             if (substr($this->fechultven, 13, 1) == ".") 
             { 
                $this->fechultven = substr($this->fechultven, 0, 13) . ":" . substr($this->fechultven, 14, 2) . ":" . substr($this->fechultven, 17);
             } 
             $conteudo_x =  $this->fechultven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechultven, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechultven = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechultven = NM_charset_to_utf8($this->fechultven);
         $this->fechultven = str_replace('<', '&lt;', $this->fechultven);
         $this->fechultven = str_replace('>', '&gt;', $this->fechultven);
         $this->Texto_tag .= "<td>" . $this->fechultven . "</td>\r\n";
   }
   //----- vrultven
   function NM_export_vrultven()
   {
             nmgp_Form_Num_Val($this->vrultven, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->vrultven = NM_charset_to_utf8($this->vrultven);
         $this->vrultven = str_replace('<', '&lt;', $this->vrultven);
         $this->vrultven = str_replace('>', '&gt;', $this->vrultven);
         $this->Texto_tag .= "<td>" . $this->vrultven . "</td>\r\n";
   }
   //----- nroultven
   function NM_export_nroultven()
   {
         $this->nroultven = html_entity_decode($this->nroultven, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nroultven = strip_tags($this->nroultven);
         $this->nroultven = NM_charset_to_utf8($this->nroultven);
         $this->nroultven = str_replace('<', '&lt;', $this->nroultven);
         $this->nroultven = str_replace('>', '&gt;', $this->nroultven);
         $this->Texto_tag .= "<td>" . $this->nroultven . "</td>\r\n";
   }
   //----- clasificaid
   function NM_export_clasificaid()
   {
             nmgp_Form_Num_Val($this->clasificaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->clasificaid = NM_charset_to_utf8($this->clasificaid);
         $this->clasificaid = str_replace('<', '&lt;', $this->clasificaid);
         $this->clasificaid = str_replace('>', '&gt;', $this->clasificaid);
         $this->Texto_tag .= "<td>" . $this->clasificaid . "</td>\r\n";
   }
   //----- maxcredcxp
   function NM_export_maxcredcxp()
   {
             nmgp_Form_Num_Val($this->maxcredcxp, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->maxcredcxp = NM_charset_to_utf8($this->maxcredcxp);
         $this->maxcredcxp = str_replace('<', '&lt;', $this->maxcredcxp);
         $this->maxcredcxp = str_replace('>', '&gt;', $this->maxcredcxp);
         $this->Texto_tag .= "<td>" . $this->maxcredcxp . "</td>\r\n";
   }
   //----- maxcredcxc
   function NM_export_maxcredcxc()
   {
             nmgp_Form_Num_Val($this->maxcredcxc, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->maxcredcxc = NM_charset_to_utf8($this->maxcredcxc);
         $this->maxcredcxc = str_replace('<', '&lt;', $this->maxcredcxc);
         $this->maxcredcxc = str_replace('>', '&gt;', $this->maxcredcxc);
         $this->Texto_tag .= "<td>" . $this->maxcredcxc . "</td>\r\n";
   }
   //----- porreten
   function NM_export_porreten()
   {
         $this->porreten = html_entity_decode($this->porreten, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->porreten = strip_tags($this->porreten);
         $this->porreten = NM_charset_to_utf8($this->porreten);
         $this->porreten = str_replace('<', '&lt;', $this->porreten);
         $this->porreten = str_replace('>', '&gt;', $this->porreten);
         $this->Texto_tag .= "<td>" . $this->porreten . "</td>\r\n";
   }
   //----- ctacli
   function NM_export_ctacli()
   {
             nmgp_Form_Num_Val($this->ctacli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctacli = NM_charset_to_utf8($this->ctacli);
         $this->ctacli = str_replace('<', '&lt;', $this->ctacli);
         $this->ctacli = str_replace('>', '&gt;', $this->ctacli);
         $this->Texto_tag .= "<td>" . $this->ctacli . "</td>\r\n";
   }
   //----- ctapro
   function NM_export_ctapro()
   {
             nmgp_Form_Num_Val($this->ctapro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctapro = NM_charset_to_utf8($this->ctapro);
         $this->ctapro = str_replace('<', '&lt;', $this->ctapro);
         $this->ctapro = str_replace('>', '&gt;', $this->ctapro);
         $this->Texto_tag .= "<td>" . $this->ctapro . "</td>\r\n";
   }
   //----- ctaretcli
   function NM_export_ctaretcli()
   {
             nmgp_Form_Num_Val($this->ctaretcli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctaretcli = NM_charset_to_utf8($this->ctaretcli);
         $this->ctaretcli = str_replace('<', '&lt;', $this->ctaretcli);
         $this->ctaretcli = str_replace('>', '&gt;', $this->ctaretcli);
         $this->Texto_tag .= "<td>" . $this->ctaretcli . "</td>\r\n";
   }
   //----- ctaretpro
   function NM_export_ctaretpro()
   {
             nmgp_Form_Num_Val($this->ctaretpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctaretpro = NM_charset_to_utf8($this->ctaretpro);
         $this->ctaretpro = str_replace('<', '&lt;', $this->ctaretpro);
         $this->ctaretpro = str_replace('>', '&gt;', $this->ctaretpro);
         $this->Texto_tag .= "<td>" . $this->ctaretpro . "</td>\r\n";
   }
   //----- ctaretscli
   function NM_export_ctaretscli()
   {
             nmgp_Form_Num_Val($this->ctaretscli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctaretscli = NM_charset_to_utf8($this->ctaretscli);
         $this->ctaretscli = str_replace('<', '&lt;', $this->ctaretscli);
         $this->ctaretscli = str_replace('>', '&gt;', $this->ctaretscli);
         $this->Texto_tag .= "<td>" . $this->ctaretscli . "</td>\r\n";
   }
   //----- ctaretspro
   function NM_export_ctaretspro()
   {
             nmgp_Form_Num_Val($this->ctaretspro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ctaretspro = NM_charset_to_utf8($this->ctaretspro);
         $this->ctaretspro = str_replace('<', '&lt;', $this->ctaretspro);
         $this->ctaretspro = str_replace('>', '&gt;', $this->ctaretspro);
         $this->Texto_tag .= "<td>" . $this->ctaretspro . "</td>\r\n";
   }
   //----- fecnaci
   function NM_export_fecnaci()
   {
             if (substr($this->fecnaci, 10, 1) == "-") 
             { 
                 $this->fecnaci = substr($this->fecnaci, 0, 10) . " " . substr($this->fecnaci, 11);
             } 
             if (substr($this->fecnaci, 13, 1) == ".") 
             { 
                $this->fecnaci = substr($this->fecnaci, 0, 13) . ":" . substr($this->fecnaci, 14, 2) . ":" . substr($this->fecnaci, 17);
             } 
             $conteudo_x =  $this->fecnaci;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecnaci, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecnaci = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecnaci = NM_charset_to_utf8($this->fecnaci);
         $this->fecnaci = str_replace('<', '&lt;', $this->fecnaci);
         $this->fecnaci = str_replace('>', '&gt;', $this->fecnaci);
         $this->Texto_tag .= "<td>" . $this->fecnaci . "</td>\r\n";
   }
   //----- codrecip
   function NM_export_codrecip()
   {
         $this->codrecip = html_entity_decode($this->codrecip, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codrecip = strip_tags($this->codrecip);
         $this->codrecip = NM_charset_to_utf8($this->codrecip);
         $this->codrecip = str_replace('<', '&lt;', $this->codrecip);
         $this->codrecip = str_replace('>', '&gt;', $this->codrecip);
         $this->Texto_tag .= "<td>" . $this->codrecip . "</td>\r\n";
   }
   //----- porcrecip
   function NM_export_porcrecip()
   {
             nmgp_Form_Num_Val($this->porcrecip, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcrecip = NM_charset_to_utf8($this->porcrecip);
         $this->porcrecip = str_replace('<', '&lt;', $this->porcrecip);
         $this->porcrecip = str_replace('>', '&gt;', $this->porcrecip);
         $this->Texto_tag .= "<td>" . $this->porcrecip . "</td>\r\n";
   }
   //----- conductor
   function NM_export_conductor()
   {
         $this->conductor = html_entity_decode($this->conductor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->conductor = strip_tags($this->conductor);
         $this->conductor = NM_charset_to_utf8($this->conductor);
         $this->conductor = str_replace('<', '&lt;', $this->conductor);
         $this->conductor = str_replace('>', '&gt;', $this->conductor);
         $this->Texto_tag .= "<td>" . $this->conductor . "</td>\r\n";
   }
   //----- tomador
   function NM_export_tomador()
   {
         $this->tomador = html_entity_decode($this->tomador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tomador = strip_tags($this->tomador);
         $this->tomador = NM_charset_to_utf8($this->tomador);
         $this->tomador = str_replace('<', '&lt;', $this->tomador);
         $this->tomador = str_replace('>', '&gt;', $this->tomador);
         $this->Texto_tag .= "<td>" . $this->tomador . "</td>\r\n";
   }
   //----- propietario
   function NM_export_propietario()
   {
         $this->propietario = html_entity_decode($this->propietario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->propietario = strip_tags($this->propietario);
         $this->propietario = NM_charset_to_utf8($this->propietario);
         $this->propietario = str_replace('<', '&lt;', $this->propietario);
         $this->propietario = str_replace('>', '&gt;', $this->propietario);
         $this->Texto_tag .= "<td>" . $this->propietario . "</td>\r\n";
   }
   //----- inmpropietario
   function NM_export_inmpropietario()
   {
         $this->inmpropietario = html_entity_decode($this->inmpropietario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->inmpropietario = strip_tags($this->inmpropietario);
         $this->inmpropietario = NM_charset_to_utf8($this->inmpropietario);
         $this->inmpropietario = str_replace('<', '&lt;', $this->inmpropietario);
         $this->inmpropietario = str_replace('>', '&gt;', $this->inmpropietario);
         $this->Texto_tag .= "<td>" . $this->inmpropietario . "</td>\r\n";
   }
   //----- inminquilino
   function NM_export_inminquilino()
   {
         $this->inminquilino = html_entity_decode($this->inminquilino, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->inminquilino = strip_tags($this->inminquilino);
         $this->inminquilino = NM_charset_to_utf8($this->inminquilino);
         $this->inminquilino = str_replace('<', '&lt;', $this->inminquilino);
         $this->inminquilino = str_replace('>', '&gt;', $this->inminquilino);
         $this->Texto_tag .= "<td>" . $this->inminquilino . "</td>\r\n";
   }
   //----- ciudaneid
   function NM_export_ciudaneid()
   {
             nmgp_Form_Num_Val($this->ciudaneid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ciudaneid = NM_charset_to_utf8($this->ciudaneid);
         $this->ciudaneid = str_replace('<', '&lt;', $this->ciudaneid);
         $this->ciudaneid = str_replace('>', '&gt;', $this->ciudaneid);
         $this->Texto_tag .= "<td>" . $this->ciudaneid . "</td>\r\n";
   }
   //----- ciudadexp
   function NM_export_ciudadexp()
   {
             nmgp_Form_Num_Val($this->ciudadexp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ciudadexp = NM_charset_to_utf8($this->ciudadexp);
         $this->ciudadexp = str_replace('<', '&lt;', $this->ciudadexp);
         $this->ciudadexp = str_replace('>', '&gt;', $this->ciudadexp);
         $this->Texto_tag .= "<td>" . $this->ciudadexp . "</td>\r\n";
   }
   //----- fiador
   function NM_export_fiador()
   {
         $this->fiador = html_entity_decode($this->fiador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fiador = strip_tags($this->fiador);
         $this->fiador = NM_charset_to_utf8($this->fiador);
         $this->fiador = str_replace('<', '&lt;', $this->fiador);
         $this->fiador = str_replace('>', '&gt;', $this->fiador);
         $this->Texto_tag .= "<td>" . $this->fiador . "</td>\r\n";
   }
   //----- nomregtri
   function NM_export_nomregtri()
   {
         $this->nomregtri = html_entity_decode($this->nomregtri, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomregtri = strip_tags($this->nomregtri);
         $this->nomregtri = NM_charset_to_utf8($this->nomregtri);
         $this->nomregtri = str_replace('<', '&lt;', $this->nomregtri);
         $this->nomregtri = str_replace('>', '&gt;', $this->nomregtri);
         $this->Texto_tag .= "<td>" . $this->nomregtri . "</td>\r\n";
   }
   //----- tarjetapuntos
   function NM_export_tarjetapuntos()
   {
         $this->tarjetapuntos = html_entity_decode($this->tarjetapuntos, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tarjetapuntos = strip_tags($this->tarjetapuntos);
         $this->tarjetapuntos = NM_charset_to_utf8($this->tarjetapuntos);
         $this->tarjetapuntos = str_replace('<', '&lt;', $this->tarjetapuntos);
         $this->tarjetapuntos = str_replace('>', '&gt;', $this->tarjetapuntos);
         $this->Texto_tag .= "<td>" . $this->tarjetapuntos . "</td>\r\n";
   }
   //----- porcretven
   function NM_export_porcretven()
   {
             nmgp_Form_Num_Val($this->porcretven, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcretven = NM_charset_to_utf8($this->porcretven);
         $this->porcretven = str_replace('<', '&lt;', $this->porcretven);
         $this->porcretven = str_replace('>', '&gt;', $this->porcretven);
         $this->Texto_tag .= "<td>" . $this->porcretven . "</td>\r\n";
   }
   //----- nombre1
   function NM_export_nombre1()
   {
         $this->nombre1 = html_entity_decode($this->nombre1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre1 = strip_tags($this->nombre1);
         $this->nombre1 = NM_charset_to_utf8($this->nombre1);
         $this->nombre1 = str_replace('<', '&lt;', $this->nombre1);
         $this->nombre1 = str_replace('>', '&gt;', $this->nombre1);
         $this->Texto_tag .= "<td>" . $this->nombre1 . "</td>\r\n";
   }
   //----- nombre2
   function NM_export_nombre2()
   {
         $this->nombre2 = html_entity_decode($this->nombre2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre2 = strip_tags($this->nombre2);
         $this->nombre2 = NM_charset_to_utf8($this->nombre2);
         $this->nombre2 = str_replace('<', '&lt;', $this->nombre2);
         $this->nombre2 = str_replace('>', '&gt;', $this->nombre2);
         $this->Texto_tag .= "<td>" . $this->nombre2 . "</td>\r\n";
   }
   //----- apellido1
   function NM_export_apellido1()
   {
         $this->apellido1 = html_entity_decode($this->apellido1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->apellido1 = strip_tags($this->apellido1);
         $this->apellido1 = NM_charset_to_utf8($this->apellido1);
         $this->apellido1 = str_replace('<', '&lt;', $this->apellido1);
         $this->apellido1 = str_replace('>', '&gt;', $this->apellido1);
         $this->Texto_tag .= "<td>" . $this->apellido1 . "</td>\r\n";
   }
   //----- apellido2
   function NM_export_apellido2()
   {
         $this->apellido2 = html_entity_decode($this->apellido2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->apellido2 = strip_tags($this->apellido2);
         $this->apellido2 = NM_charset_to_utf8($this->apellido2);
         $this->apellido2 = str_replace('<', '&lt;', $this->apellido2);
         $this->apellido2 = str_replace('>', '&gt;', $this->apellido2);
         $this->Texto_tag .= "<td>" . $this->apellido2 . "</td>\r\n";
   }
   //----- motivodevid
   function NM_export_motivodevid()
   {
             nmgp_Form_Num_Val($this->motivodevid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->motivodevid = NM_charset_to_utf8($this->motivodevid);
         $this->motivodevid = str_replace('<', '&lt;', $this->motivodevid);
         $this->motivodevid = str_replace('>', '&gt;', $this->motivodevid);
         $this->Texto_tag .= "<td>" . $this->motivodevid . "</td>\r\n";
   }
   //----- fechinactivo
   function NM_export_fechinactivo()
   {
             if (substr($this->fechinactivo, 10, 1) == "-") 
             { 
                 $this->fechinactivo = substr($this->fechinactivo, 0, 10) . " " . substr($this->fechinactivo, 11);
             } 
             if (substr($this->fechinactivo, 13, 1) == ".") 
             { 
                $this->fechinactivo = substr($this->fechinactivo, 0, 13) . ":" . substr($this->fechinactivo, 14, 2) . ":" . substr($this->fechinactivo, 17);
             } 
             $conteudo_x =  $this->fechinactivo;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechinactivo, "YYYY-MM-DD HH:II:SS  ");
                 $this->fechinactivo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechinactivo = NM_charset_to_utf8($this->fechinactivo);
         $this->fechinactivo = str_replace('<', '&lt;', $this->fechinactivo);
         $this->fechinactivo = str_replace('>', '&gt;', $this->fechinactivo);
         $this->Texto_tag .= "<td>" . $this->fechinactivo . "</td>\r\n";
   }
   //----- maxcreddias
   function NM_export_maxcreddias()
   {
             nmgp_Form_Num_Val($this->maxcreddias, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->maxcreddias = NM_charset_to_utf8($this->maxcreddias);
         $this->maxcreddias = str_replace('<', '&lt;', $this->maxcreddias);
         $this->maxcreddias = str_replace('>', '&gt;', $this->maxcreddias);
         $this->Texto_tag .= "<td>" . $this->maxcreddias . "</td>\r\n";
   }
   //----- nittriofi
   function NM_export_nittriofi()
   {
         $this->nittriofi = html_entity_decode($this->nittriofi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nittriofi = strip_tags($this->nittriofi);
         $this->nittriofi = NM_charset_to_utf8($this->nittriofi);
         $this->nittriofi = str_replace('<', '&lt;', $this->nittriofi);
         $this->nittriofi = str_replace('>', '&gt;', $this->nittriofi);
         $this->Texto_tag .= "<td>" . $this->nittriofi . "</td>\r\n";
   }
   //----- acteconomicaid
   function NM_export_acteconomicaid()
   {
             nmgp_Form_Num_Val($this->acteconomicaid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->acteconomicaid = NM_charset_to_utf8($this->acteconomicaid);
         $this->acteconomicaid = str_replace('<', '&lt;', $this->acteconomicaid);
         $this->acteconomicaid = str_replace('>', '&gt;', $this->acteconomicaid);
         $this->Texto_tag .= "<td>" . $this->acteconomicaid . "</td>\r\n";
   }
   //----- mesa
   function NM_export_mesa()
   {
         $this->mesa = html_entity_decode($this->mesa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mesa = strip_tags($this->mesa);
         $this->mesa = NM_charset_to_utf8($this->mesa);
         $this->mesa = str_replace('<', '&lt;', $this->mesa);
         $this->mesa = str_replace('>', '&gt;', $this->mesa);
         $this->Texto_tag .= "<td>" . $this->mesa . "</td>\r\n";
   }
   //----- mostrador
   function NM_export_mostrador()
   {
         $this->mostrador = html_entity_decode($this->mostrador, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mostrador = strip_tags($this->mostrador);
         $this->mostrador = NM_charset_to_utf8($this->mostrador);
         $this->mostrador = str_replace('<', '&lt;', $this->mostrador);
         $this->mostrador = str_replace('>', '&gt;', $this->mostrador);
         $this->Texto_tag .= "<td>" . $this->mostrador . "</td>\r\n";
   }
   //----- porcrivac
   function NM_export_porcrivac()
   {
             nmgp_Form_Num_Val($this->porcrivac, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcrivac = NM_charset_to_utf8($this->porcrivac);
         $this->porcrivac = str_replace('<', '&lt;', $this->porcrivac);
         $this->porcrivac = str_replace('>', '&gt;', $this->porcrivac);
         $this->Texto_tag .= "<td>" . $this->porcrivac . "</td>\r\n";
   }
   //----- porcrivav
   function NM_export_porcrivav()
   {
             nmgp_Form_Num_Val($this->porcrivav, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "4", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcrivav = NM_charset_to_utf8($this->porcrivav);
         $this->porcrivav = str_replace('<', '&lt;', $this->porcrivav);
         $this->porcrivav = str_replace('>', '&gt;', $this->porcrivav);
         $this->Texto_tag .= "<td>" . $this->porcrivav . "</td>\r\n";
   }
   //----- porcricac
   function NM_export_porcricac()
   {
             nmgp_Form_Num_Val($this->porcricac, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->porcricac = NM_charset_to_utf8($this->porcricac);
         $this->porcricac = str_replace('<', '&lt;', $this->porcricac);
         $this->porcricac = str_replace('>', '&gt;', $this->porcricac);
         $this->Texto_tag .= "<td>" . $this->porcricac . "</td>\r\n";
   }
   //----- porcricav
   function NM_export_porcricav()
   {
             nmgp_Form_Num_Val($this->porcricav, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->porcricav = NM_charset_to_utf8($this->porcricav);
         $this->porcricav = str_replace('<', '&lt;', $this->porcricav);
         $this->porcricav = str_replace('>', '&gt;', $this->porcricav);
         $this->Texto_tag .= "<td>" . $this->porcricav . "</td>\r\n";
   }
   //----- natjuridica
   function NM_export_natjuridica()
   {
         $this->natjuridica = html_entity_decode($this->natjuridica, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->natjuridica = strip_tags($this->natjuridica);
         $this->natjuridica = NM_charset_to_utf8($this->natjuridica);
         $this->natjuridica = str_replace('<', '&lt;', $this->natjuridica);
         $this->natjuridica = str_replace('>', '&gt;', $this->natjuridica);
         $this->Texto_tag .= "<td>" . $this->natjuridica . "</td>\r\n";
   }
   //----- barrioinid
   function NM_export_barrioinid()
   {
             nmgp_Form_Num_Val($this->barrioinid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->barrioinid = NM_charset_to_utf8($this->barrioinid);
         $this->barrioinid = str_replace('<', '&lt;', $this->barrioinid);
         $this->barrioinid = str_replace('>', '&gt;', $this->barrioinid);
         $this->Texto_tag .= "<td>" . $this->barrioinid . "</td>\r\n";
   }
   //----- fecafilia
   function NM_export_fecafilia()
   {
             if (substr($this->fecafilia, 10, 1) == "-") 
             { 
                 $this->fecafilia = substr($this->fecafilia, 0, 10) . " " . substr($this->fecafilia, 11);
             } 
             if (substr($this->fecafilia, 13, 1) == ".") 
             { 
                $this->fecafilia = substr($this->fecafilia, 0, 13) . ":" . substr($this->fecafilia, 14, 2) . ":" . substr($this->fecafilia, 17);
             } 
             $conteudo_x =  $this->fecafilia;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecafilia, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecafilia = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecafilia = NM_charset_to_utf8($this->fecafilia);
         $this->fecafilia = str_replace('<', '&lt;', $this->fecafilia);
         $this->fecafilia = str_replace('>', '&gt;', $this->fecafilia);
         $this->Texto_tag .= "<td>" . $this->fecafilia . "</td>\r\n";
   }
   //----- porcrcreev
   function NM_export_porcrcreev()
   {
             nmgp_Form_Num_Val($this->porcrcreev, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcrcreev = NM_charset_to_utf8($this->porcrcreev);
         $this->porcrcreev = str_replace('<', '&lt;', $this->porcrcreev);
         $this->porcrcreev = str_replace('>', '&gt;', $this->porcrcreev);
         $this->Texto_tag .= "<td>" . $this->porcrcreev . "</td>\r\n";
   }
   //----- porcrcreec
   function NM_export_porcrcreec()
   {
             nmgp_Form_Num_Val($this->porcrcreec, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "3", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porcrcreec = NM_charset_to_utf8($this->porcrcreec);
         $this->porcrcreec = str_replace('<', '&lt;', $this->porcrcreec);
         $this->porcrcreec = str_replace('>', '&gt;', $this->porcrcreec);
         $this->Texto_tag .= "<td>" . $this->porcrcreec . "</td>\r\n";
   }
   //----- tipocreev
   function NM_export_tipocreev()
   {
             nmgp_Form_Num_Val($this->tipocreev, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tipocreev = NM_charset_to_utf8($this->tipocreev);
         $this->tipocreev = str_replace('<', '&lt;', $this->tipocreev);
         $this->tipocreev = str_replace('>', '&gt;', $this->tipocreev);
         $this->Texto_tag .= "<td>" . $this->tipocreev . "</td>\r\n";
   }
   //----- tipocreec
   function NM_export_tipocreec()
   {
             nmgp_Form_Num_Val($this->tipocreec, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->tipocreec = NM_charset_to_utf8($this->tipocreec);
         $this->tipocreec = str_replace('<', '&lt;', $this->tipocreec);
         $this->tipocreec = str_replace('>', '&gt;', $this->tipocreec);
         $this->Texto_tag .= "<td>" . $this->tipocreec . "</td>\r\n";
   }
   //----- numcue
   function NM_export_numcue()
   {
         $this->numcue = html_entity_decode($this->numcue, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->numcue = strip_tags($this->numcue);
         $this->numcue = NM_charset_to_utf8($this->numcue);
         $this->numcue = str_replace('<', '&lt;', $this->numcue);
         $this->numcue = str_replace('>', '&gt;', $this->numcue);
         $this->Texto_tag .= "<td>" . $this->numcue . "</td>\r\n";
   }
   //----- tipcue
   function NM_export_tipcue()
   {
         $this->tipcue = html_entity_decode($this->tipcue, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipcue = strip_tags($this->tipcue);
         $this->tipcue = NM_charset_to_utf8($this->tipcue);
         $this->tipcue = str_replace('<', '&lt;', $this->tipcue);
         $this->tipcue = str_replace('>', '&gt;', $this->tipcue);
         $this->Texto_tag .= "<td>" . $this->tipcue . "</td>\r\n";
   }
   //----- actcomerid
   function NM_export_actcomerid()
   {
             nmgp_Form_Num_Val($this->actcomerid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->actcomerid = NM_charset_to_utf8($this->actcomerid);
         $this->actcomerid = str_replace('<', '&lt;', $this->actcomerid);
         $this->actcomerid = str_replace('>', '&gt;', $this->actcomerid);
         $this->Texto_tag .= "<td>" . $this->actcomerid . "</td>\r\n";
   }
   //----- fecultenvio
   function NM_export_fecultenvio()
   {
             if (substr($this->fecultenvio, 10, 1) == "-") 
             { 
                 $this->fecultenvio = substr($this->fecultenvio, 0, 10) . " " . substr($this->fecultenvio, 11);
             } 
             if (substr($this->fecultenvio, 13, 1) == ".") 
             { 
                $this->fecultenvio = substr($this->fecultenvio, 0, 13) . ":" . substr($this->fecultenvio, 14, 2) . ":" . substr($this->fecultenvio, 17);
             } 
             $conteudo_x =  $this->fecultenvio;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecultenvio, "YYYY-MM-DD HH:II:SS  ");
                 $this->fecultenvio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fecultenvio = NM_charset_to_utf8($this->fecultenvio);
         $this->fecultenvio = str_replace('<', '&lt;', $this->fecultenvio);
         $this->fecultenvio = str_replace('>', '&gt;', $this->fecultenvio);
         $this->Texto_tag .= "<td>" . $this->fecultenvio . "</td>\r\n";
   }
   //----- consecterws
   function NM_export_consecterws()
   {
         $this->consecterws = html_entity_decode($this->consecterws, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->consecterws = strip_tags($this->consecterws);
         $this->consecterws = NM_charset_to_utf8($this->consecterws);
         $this->consecterws = str_replace('<', '&lt;', $this->consecterws);
         $this->consecterws = str_replace('>', '&gt;', $this->consecterws);
         $this->Texto_tag .= "<td>" . $this->consecterws . "</td>\r\n";
   }
   //----- feclegal
   function NM_export_feclegal()
   {
             if (substr($this->feclegal, 10, 1) == "-") 
             { 
                 $this->feclegal = substr($this->feclegal, 0, 10) . " " . substr($this->feclegal, 11);
             } 
             if (substr($this->feclegal, 13, 1) == ".") 
             { 
                $this->feclegal = substr($this->feclegal, 0, 13) . ":" . substr($this->feclegal, 14, 2) . ":" . substr($this->feclegal, 17);
             } 
             $conteudo_x =  $this->feclegal;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->feclegal, "YYYY-MM-DD HH:II:SS  ");
                 $this->feclegal = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->feclegal = NM_charset_to_utf8($this->feclegal);
         $this->feclegal = str_replace('<', '&lt;', $this->feclegal);
         $this->feclegal = str_replace('>', '&gt;', $this->feclegal);
         $this->Texto_tag .= "<td>" . $this->feclegal . "</td>\r\n";
   }
   //----- emailemp
   function NM_export_emailemp()
   {
         $this->emailemp = html_entity_decode($this->emailemp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->emailemp = strip_tags($this->emailemp);
         $this->emailemp = NM_charset_to_utf8($this->emailemp);
         $this->emailemp = str_replace('<', '&lt;', $this->emailemp);
         $this->emailemp = str_replace('>', '&gt;', $this->emailemp);
         $this->Texto_tag .= "<td>" . $this->emailemp . "</td>\r\n";
   }
   //----- pagweb
   function NM_export_pagweb()
   {
         $this->pagweb = html_entity_decode($this->pagweb, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pagweb = strip_tags($this->pagweb);
         $this->pagweb = NM_charset_to_utf8($this->pagweb);
         $this->pagweb = str_replace('<', '&lt;', $this->pagweb);
         $this->pagweb = str_replace('>', '&gt;', $this->pagweb);
         $this->Texto_tag .= "<td>" . $this->pagweb . "</td>\r\n";
   }
   //----- eterritorial
   function NM_export_eterritorial()
   {
         $this->eterritorial = html_entity_decode($this->eterritorial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->eterritorial = strip_tags($this->eterritorial);
         $this->eterritorial = NM_charset_to_utf8($this->eterritorial);
         $this->eterritorial = str_replace('<', '&lt;', $this->eterritorial);
         $this->eterritorial = str_replace('>', '&gt;', $this->eterritorial);
         $this->Texto_tag .= "<td>" . $this->eterritorial . "</td>\r\n";
   }
   //----- listaprecioid
   function NM_export_listaprecioid()
   {
             nmgp_Form_Num_Val($this->listaprecioid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->listaprecioid = NM_charset_to_utf8($this->listaprecioid);
         $this->listaprecioid = str_replace('<', '&lt;', $this->listaprecioid);
         $this->listaprecioid = str_replace('>', '&gt;', $this->listaprecioid);
         $this->Texto_tag .= "<td>" . $this->listaprecioid . "</td>\r\n";
   }
   //----- extlocal
   function NM_export_extlocal()
   {
             nmgp_Form_Num_Val($this->extlocal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->extlocal = NM_charset_to_utf8($this->extlocal);
         $this->extlocal = str_replace('<', '&lt;', $this->extlocal);
         $this->extlocal = str_replace('>', '&gt;', $this->extlocal);
         $this->Texto_tag .= "<td>" . $this->extlocal . "</td>\r\n";
   }
   //----- pep
   function NM_export_pep()
   {
         $this->pep = html_entity_decode($this->pep, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pep = strip_tags($this->pep);
         $this->pep = NM_charset_to_utf8($this->pep);
         $this->pep = str_replace('<', '&lt;', $this->pep);
         $this->pep = str_replace('>', '&gt;', $this->pep);
         $this->Texto_tag .= "<td>" . $this->pep . "</td>\r\n";
   }
   //----- nomempresa
   function NM_export_nomempresa()
   {
         $this->nomempresa = html_entity_decode($this->nomempresa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nomempresa = strip_tags($this->nomempresa);
         $this->nomempresa = NM_charset_to_utf8($this->nomempresa);
         $this->nomempresa = str_replace('<', '&lt;', $this->nomempresa);
         $this->nomempresa = str_replace('>', '&gt;', $this->nomempresa);
         $this->Texto_tag .= "<td>" . $this->nomempresa . "</td>\r\n";
   }
   //----- fechaexp
   function NM_export_fechaexp()
   {
             $conteudo_x =  $this->fechaexp;
             nm_conv_limpa_dado($conteudo_x, "");
             if (is_numeric($conteudo_x) && $conteudo_x > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaexp, "");
                 $this->fechaexp = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->fechaexp = NM_charset_to_utf8($this->fechaexp);
         $this->fechaexp = str_replace('<', '&lt;', $this->fechaexp);
         $this->fechaexp = str_replace('>', '&gt;', $this->fechaexp);
         $this->Texto_tag .= "<td>" . $this->fechaexp . "</td>\r\n";
   }
   //----- ocupid
   function NM_export_ocupid()
   {
             nmgp_Form_Num_Val($this->ocupid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->ocupid = NM_charset_to_utf8($this->ocupid);
         $this->ocupid = str_replace('<', '&lt;', $this->ocupid);
         $this->ocupid = str_replace('>', '&gt;', $this->ocupid);
         $this->Texto_tag .= "<td>" . $this->ocupid . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_importar_terceros_TNS'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Importar Terceros de TNS :: RTF</TITLE>
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
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="grid_importar_terceros_TNS_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_importar_terceros_TNS"> 
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
