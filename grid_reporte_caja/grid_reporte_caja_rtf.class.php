<?php

class grid_reporte_caja_rtf
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
                   nm_limpa_str_grid_reporte_caja($cadapar[1]);
                   nm_protect_num_grid_reporte_caja($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_reporte_caja']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($elbanco)) 
      {
          $_SESSION['elbanco'] = $elbanco;
          nm_limpa_str_grid_reporte_caja($_SESSION["elbanco"]);
      }
      if (isset($lafecha)) 
      {
          $_SESSION['lafecha'] = $lafecha;
          nm_limpa_str_grid_reporte_caja($_SESSION["lafecha"]);
      }
      if (isset($gcorreo_receptor)) 
      {
          $_SESSION['gcorreo_receptor'] = $gcorreo_receptor;
          nm_limpa_str_grid_reporte_caja($_SESSION["gcorreo_receptor"]);
      }
      if (isset($gcorreo_asunto)) 
      {
          $_SESSION['gcorreo_asunto'] = $gcorreo_asunto;
          nm_limpa_str_grid_reporte_caja($_SESSION["gcorreo_asunto"]);
      }
      if (isset($gcorreo_mensaje)) 
      {
          $_SESSION['gcorreo_mensaje'] = $gcorreo_mensaje;
          nm_limpa_str_grid_reporte_caja($_SESSION["gcorreo_mensaje"]);
      }
      if (isset($elprefijo)) 
      {
          $_SESSION['elprefijo'] = $elprefijo;
          nm_limpa_str_grid_reporte_caja($_SESSION["elprefijo"]);
      }
      if (isset($gidtercero)) 
      {
          $_SESSION['gidtercero'] = $gidtercero;
          nm_limpa_str_grid_reporte_caja($_SESSION["gidtercero"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_reporte_caja_total.class.php"); 
      $this->Tot      = new grid_reporte_caja_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_caja']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_reporte_caja";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_reporte_caja.rtf";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'];
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
          $this->banco = $Busca_temp['banco']; 
          $tmp_pos = strpos($this->banco, "##@@");
          if ($tmp_pos !== false && !is_array($this->banco))
          {
              $this->banco = substr($this->banco, 0, $tmp_pos);
          }
          $this->prefijo = $Busca_temp['prefijo']; 
          $tmp_pos = strpos($this->prefijo, "##@@");
          if ($tmp_pos !== false && !is_array($this->prefijo))
          {
              $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
          }
          $this->correo_receptor = $Busca_temp['correo_receptor']; 
          $tmp_pos = strpos($this->correo_receptor, "##@@");
          if ($tmp_pos !== false && !is_array($this->correo_receptor))
          {
              $this->correo_receptor = substr($this->correo_receptor, 0, $tmp_pos);
          }
          $this->asunto = $Busca_temp['asunto']; 
          $tmp_pos = strpos($this->asunto, "##@@");
          if ($tmp_pos !== false && !is_array($this->asunto))
          {
              $this->asunto = substr($this->asunto, 0, $tmp_pos);
          }
          $this->mensaje = $Busca_temp['mensaje']; 
          $tmp_pos = strpos($this->mensaje, "##@@");
          if ($tmp_pos !== false && !is_array($this->mensaje))
          {
              $this->mensaje = substr($this->mensaje, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['nom_docu'])) ? $this->New_label['nom_docu'] : "Nom_docu"; 
          if ($Cada_col == "nom_docu" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['nom_empresa'])) ? $this->New_label['nom_empresa'] : "nom_empresa"; 
          if ($Cada_col == "nom_empresa" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['correo'])) ? $this->New_label['correo'] : "correo"; 
          if ($Cada_col == "correo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "telefono"; 
          if ($Cada_col == "telefono" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et1'])) ? $this->New_label['et1'] : "et1"; 
          if ($Cada_col == "et1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et2'])) ? $this->New_label['et2'] : "et2"; 
          if ($Cada_col == "et2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "documento"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et3'])) ? $this->New_label['et3'] : "et3"; 
          if ($Cada_col == "et3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['rango'])) ? $this->New_label['rango'] : "rango"; 
          if ($Cada_col == "rango" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et4'])) ? $this->New_label['et4'] : "et4"; 
          if ($Cada_col == "et4" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cant_fact'])) ? $this->New_label['cant_fact'] : "cant_fact"; 
          if ($Cada_col == "cant_fact" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et5'])) ? $this->New_label['et5'] : "et5"; 
          if ($Cada_col == "et5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et6'])) ? $this->New_label['et6'] : "et6"; 
          if ($Cada_col == "et6" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et7'])) ? $this->New_label['et7'] : "et7"; 
          if ($Cada_col == "et7" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et8'])) ? $this->New_label['et8'] : "et8"; 
          if ($Cada_col == "et8" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et9'])) ? $this->New_label['et9'] : "et9"; 
          if ($Cada_col == "et9" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['can_efec'])) ? $this->New_label['can_efec'] : "can_efec"; 
          if ($Cada_col == "can_efec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_efec'])) ? $this->New_label['med_efec'] : "med_efec"; 
          if ($Cada_col == "med_efec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_efec'])) ? $this->New_label['porc_efec'] : "porc_efec"; 
          if ($Cada_col == "porc_efec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tot_efec'])) ? $this->New_label['tot_efec'] : "tot_efec"; 
          if ($Cada_col == "tot_efec" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_tarj'])) ? $this->New_label['c_tarj'] : "c_tarj"; 
          if ($Cada_col == "c_tarj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_tarj'])) ? $this->New_label['med_tarj'] : "med_tarj"; 
          if ($Cada_col == "med_tarj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_tarj'])) ? $this->New_label['porc_tarj'] : "porc_tarj"; 
          if ($Cada_col == "porc_tarj" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tarjeta'])) ? $this->New_label['tarjeta'] : "tarjeta"; 
          if ($Cada_col == "tarjeta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_cheq'])) ? $this->New_label['c_cheq'] : "c_cheq"; 
          if ($Cada_col == "c_cheq" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_cheq'])) ? $this->New_label['med_cheq'] : "med_cheq"; 
          if ($Cada_col == "med_cheq" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_cheq'])) ? $this->New_label['porc_cheq'] : "porc_cheq"; 
          if ($Cada_col == "porc_cheq" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cheque'])) ? $this->New_label['cheque'] : "cheque"; 
          if ($Cada_col == "cheque" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_tra'])) ? $this->New_label['c_tra'] : "c_tra"; 
          if ($Cada_col == "c_tra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_tran'])) ? $this->New_label['med_tran'] : "med_tran"; 
          if ($Cada_col == "med_tran" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_tran'])) ? $this->New_label['porc_tran'] : "porc_tran"; 
          if ($Cada_col == "porc_tran" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['trans'])) ? $this->New_label['trans'] : "trans"; 
          if ($Cada_col == "trans" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['c_credito'])) ? $this->New_label['c_credito'] : "c_credito"; 
          if ($Cada_col == "c_credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['med_cred'])) ? $this->New_label['med_cred'] : "med_cred"; 
          if ($Cada_col == "med_cred" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['porc_credito'])) ? $this->New_label['porc_credito'] : "porc_credito"; 
          if ($Cada_col == "porc_credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "credito"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et10'])) ? $this->New_label['et10'] : "et10"; 
          if ($Cada_col == "et10" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total_vtas'])) ? $this->New_label['total_vtas'] : "total_vtas"; 
          if ($Cada_col == "total_vtas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_iva'])) ? $this->New_label['et_iva'] : "et_iva"; 
          if ($Cada_col == "et_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_base'])) ? $this->New_label['et_base'] : "et_base"; 
          if ($Cada_col == "et_base" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_val_iva'])) ? $this->New_label['et_val_iva'] : "et_val_iva"; 
          if ($Cada_col == "et_val_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etiva_19'])) ? $this->New_label['etiva_19'] : "etiva_19"; 
          if ($Cada_col == "etiva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base19'])) ? $this->New_label['base19'] : "base19"; 
          if ($Cada_col == "base19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva_19'])) ? $this->New_label['iva_19'] : "iva_19"; 
          if ($Cada_col == "iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etiva_5'])) ? $this->New_label['etiva_5'] : "etiva_5"; 
          if ($Cada_col == "etiva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base5'])) ? $this->New_label['base5'] : "base5"; 
          if ($Cada_col == "base5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva_5'])) ? $this->New_label['iva_5'] : "iva_5"; 
          if ($Cada_col == "iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['etexc_0'])) ? $this->New_label['etexc_0'] : "etexc_0"; 
          if ($Cada_col == "etexc_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base0'])) ? $this->New_label['base0'] : "base0"; 
          if ($Cada_col == "base0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iva_0'])) ? $this->New_label['iva_0'] : "iva_0"; 
          if ($Cada_col == "iva_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_tot'])) ? $this->New_label['et_tot'] : "et_tot"; 
          if ($Cada_col == "et_tot" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tot_base'])) ? $this->New_label['tot_base'] : "tot_base"; 
          if ($Cada_col == "tot_base" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tot_iva'])) ? $this->New_label['tot_iva'] : "tot_iva"; 
          if ($Cada_col == "tot_iva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et20'])) ? $this->New_label['et20'] : "et20"; 
          if ($Cada_col == "et20" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_vac'])) ? $this->New_label['et_vac'] : "et_vac"; 
          if ($Cada_col == "et_vac" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_imb'])) ? $this->New_label['et_imb'] : "et_imb"; 
          if ($Cada_col == "et_imb" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imp_bol'])) ? $this->New_label['imp_bol'] : "imp_bol"; 
          if ($Cada_col == "imp_bol" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_ic'])) ? $this->New_label['et_ic'] : "et_ic"; 
          if ($Cada_col == "et_ic" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imp_consumo'])) ? $this->New_label['imp_consumo'] : "imp_consumo"; 
          if ($Cada_col == "imp_consumo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_ic_dev'])) ? $this->New_label['et_ic_dev'] : "et_ic_dev"; 
          if ($Cada_col == "et_ic_dev" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imp_consumo_dev'])) ? $this->New_label['imp_consumo_dev'] : "imp_consumo_dev"; 
          if ($Cada_col == "imp_consumo_dev" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_tot_inc'])) ? $this->New_label['et_tot_inc'] : "et_tot_inc"; 
          if ($Cada_col == "et_tot_inc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tot_inc'])) ? $this->New_label['tot_inc'] : "tot_inc"; 
          if ($Cada_col == "tot_inc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_vn'])) ? $this->New_label['et_vn'] : "et_vn"; 
          if ($Cada_col == "et_vn" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['venta_netas'])) ? $this->New_label['venta_netas'] : "venta_netas"; 
          if ($Cada_col == "venta_netas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_reg'])) ? $this->New_label['et_reg'] : "et_reg"; 
          if ($Cada_col == "et_reg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vent_reg'])) ? $this->New_label['vent_reg'] : "vent_reg"; 
          if ($Cada_col == "vent_reg" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fac_anuladas'])) ? $this->New_label['fac_anuladas'] : "fac_anuladas"; 
          if ($Cada_col == "fac_anuladas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['f_anul'])) ? $this->New_label['f_anul'] : "f_anul"; 
          if ($Cada_col == "f_anul" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_obs'])) ? $this->New_label['et_obs'] : "et_obs"; 
          if ($Cada_col == "et_obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs'])) ? $this->New_label['obs'] : "obs"; 
          if ($Cada_col == "obs" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_fech_imp'])) ? $this->New_label['et_fech_imp'] : "et_fech_imp"; 
          if ($Cada_col == "et_fech_imp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fecha_imp'])) ? $this->New_label['fecha_imp'] : "fecha_imp"; 
          if ($Cada_col == "fecha_imp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_ubic'])) ? $this->New_label['et_ubic'] : "et_ubic"; 
          if ($Cada_col == "et_ubic" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "ubicacion"; 
          if ($Cada_col == "ubicacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_equipo'])) ? $this->New_label['et_equipo'] : "et_equipo"; 
          if ($Cada_col == "et_equipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nom_equipo'])) ? $this->New_label['nom_equipo'] : "nom_equipo"; 
          if ($Cada_col == "nom_equipo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_serial'])) ? $this->New_label['et_serial'] : "et_serial"; 
          if ($Cada_col == "et_serial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['serial'])) ? $this->New_label['serial'] : "serial"; 
          if ($Cada_col == "serial" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['et_fin2'])) ? $this->New_label['et_fin2'] : "et_fin2"; 
          if ($Cada_col == "et_fin2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT convert(char(23),fecha,121) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['order_grid'];
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
         $this->fecha = $rs->fields[0] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_reporte_caja']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
if (!isset($_SESSION['elprefijo'])) {$_SESSION['elprefijo'] = "";}
if (!isset($this->sc_temp_elprefijo)) {$this->sc_temp_elprefijo = (isset($_SESSION['elprefijo'])) ? $_SESSION['elprefijo'] : "";}
if (!isset($_SESSION['lafecha'])) {$_SESSION['lafecha'] = "";}
if (!isset($this->sc_temp_lafecha)) {$this->sc_temp_lafecha = (isset($_SESSION['lafecha'])) ? $_SESSION['lafecha'] : "";}
if (!isset($_SESSION['elbanco'])) {$_SESSION['elbanco'] = "";}
if (!isset($this->sc_temp_elbanco)) {$this->sc_temp_elbanco = (isset($_SESSION['elbanco'])) ? $_SESSION['elbanco'] : "";}
 $this->tot_efec =0.00;
$this->tarjeta =0.00;
$this->cheque =0.00;
$this->credito =0.00;
$this->trans  = 0.00;
$this->can_efec =0;
$this->c_tarj =0;
$this->c_cheq =0;
$this->c_credito =0;
$this->c_tra  = 0;
$this->porc_credito =0;
$this->iva_19 =0.00;
$this->iva_5 =0.00;
$this->iva_0 =0.00;
$this->tot_iva =0.00;
$this->base19 =0.00;
$this->base5 =0.00;
$this->base0 =0.00;
$this->tot_base =0.00;
$this->imp_bol  = 0.00;

$vImBolsa = 0;
$vIdPr_impb = 0;
$i=0;
$j=0;
$x=0;
$vNdoc='';
$vNres='';
$vIdfv='';
$vLis='';
$vIdrc='';
$vElUsuario = $this->sc_temp_gidtercero;
$vD = date("d/m/Y"); 
$vH = date("H");
$vM = date("i");
$vS = date("s");
$this->fecha_imp  = $vD.' - '.$vH.':'.$vM.':'.$vS;

 
      $nm_select = "SELECT ubicacion, n_equipo, serial FROM usuarios where tercero = $vElUsuario"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dse[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dse = false;
          $this->dse_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dse[0][0]))
	{
	$this->ubicacion  = $this->dse[0][0];
	$this->nom_equipo  = $this->dse[0][1];
	$this->serial  = $this->dse[0][2];
	}

$sql_impb = "Select idprod from productos where tipo_producto = 'IM'";
 
      $nm_select = $sql_impb; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_pr = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_pr[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_pr = false;
          $this->ds_pr_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->ds_pr[0][0]))
	{
	$vIdPr_impb = $this->ds_pr[0][0];
	}
else
	{
	$vIdPr_impb = 0;
	}

$this->nom_docu  = 'COMPROBANTE DE INFORME DIARIO </br>';
$this->et10  = 'TOTAL FORMAS DE PAGO: ';
$this->et_iva   = '--IVA--';
$this->et_base  = '--VAL. BASE--';
$this->et_val_iva  = '--VAL. IVA--';
$this->etiva_19  = 'IVA 19%:';
$this->etiva_5  = 'IVA 5%:';
$this->etexc_0  = 'EXC o 0%:';
$this->et_tot  = 'TOTALES: ';
$this->et20  = '*** IMPUESTO BOLSAS (INC) ***';
$this->et_imb  = 'TOT IMP BOLSA';
$this->et_ic  = 'TOT INC VENTAS:';
$this->et_ic_dev  = 'TOT INC DEVOLUCIONES:';
$this->et_tot_inc  = 'TOTAL INC:';
$this->et_vn  = 'VENTAS NETAS:';
$this->et_reg  = 'VENTASA REGISTRADAS:';
$this->fac_anuladas  = 'FACTURAS ANULADAS:';
$this->obs  = 'N/A';
$this->et_obs  = 'OBSERVACIONES:';
$this->et_fech_imp  = 'FECHA DE IMPRESIÓN:';
$this->et_equipo  = 'NOM. EQUIPO:';
$this->et_serial  = 'SERIAL:';
$this->et_fin2  = 'Hecho en Facilweb</br>'.'facilweb@solucionesnavarro.com';
$this->et_ubic  = 'UBICACIÓN:';

 
      $nm_select = "SELECT razonsoc, nit, dv, direccion, telefono, correo, ciudad, nom_depto from datosemp Order By iddatos ASC Limit 1 "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dEmp = array();
      $this->demp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dEmp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->demp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dEmp = false;
          $this->dEmp_erro = $this->Db->ErrorMsg();
          $this->demp = false;
          $this->demp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->demp[0][0]))
	{
	$this->fecha  ='Fecha del comprobante: '.$this->fecha ;
	$this->nom_empresa  = 'Empresa: '.$this->demp[0][0]. ' Nit: '.$this->demp[0][1].'-'.$this->demp[0][2];
	$this->direccion  = 'Dirección: '.$this->demp[0][3].', '.$this->demp[0][6].' / '.$this->demp[0][7];
	$this->correo  = 'Correo electrónico: '.$this->demp[0][5];
	$this->telefono  = 'Teléfono: '.$this->demp[0][4];
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->total =$this->ds_fv[0][0];
	$this->et5 ='Total Facturado: ';
	}
else
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->total =$this->ds_fv[0][0];
	$this->et5 ='Total Facturado: ';
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select resolucion, prefijo, fecha, str_replace (convert(char(10),fec_vencimiento,102), '.', '-') + ' ' + convert(char(8),fec_vencimiento,20), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select resolucion, prefijo, fecha, convert(char(23),fec_vencimiento,121), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      else
      { 
          $nm_select = "select resolucion, prefijo, fecha, fec_vencimiento, primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dReso = array();
      $this->dreso = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dReso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dreso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dReso = false;
          $this->dReso_erro = $this->Db->ErrorMsg();
          $this->dreso = false;
          $this->dreso_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dreso[0][0]))
		{
		$res  = $this->dreso[0][0].' de '.$this->dreso[0][6].' del '.$this->dreso[0][1].$this->dreso[0][4].' a la '.$this->dreso[0][1].$this->dreso[0][5].' de fecha: '.$this->dreso[0][2];
		$this->et1  = 'Resolución DIAN #: ';
		}
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and tipo = 'FV' ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	}
$this->cant_fact =$this->ds_cont[0][0];
$this->et4  = '# de Facturas emitidas:';

if($this->sc_temp_elprefijo<>'' or $this->sc_temp_elprefijo<>NULL or $this->sc_temp_elprefijo>0)
	{
	 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
	if (isset($this->ds_ca2[0][0]))
	{
	$vIdres=$this->ds_ca2[0][1];
	 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
	$this->rango .=$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
	}

	 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->ds_ca3[0][0]))
		{
		$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
		}
	$this->et3  = "Rango Facurado desde:";
	}
else
	{
	 
      $nm_select = "SELECT COUNT(DISTINCT resolucion) AS cantidad FROM facturaven WHERE banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->da_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da_fv = false;
          $this->da_fv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->da_fv[0][0]))
		{
		if($this->da_fv[0][0]>1)
			{
			$this->rango ="RANGO: Varios";
			}
		else
			{
			 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
			if (isset($this->ds_ca2[0][0]))
			{
			$vIdres=$this->ds_ca2[0][1];
			 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
			$this->rango .=$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
			}

			 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;

			if (isset($this->ds_ca3[0][0]))
				{
				$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
				}
			}
		}
	$this->et3  = "Rango Facturado desde:";
	
	}
$this->et6  = 'CANTIDAD';
$this->et7  = 'FORMA PAGO';
$this->et8  = '%';
$this->et9  = 'VALOR';


if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}

if(isset($this->ds_cont2[0][1]))
	{
	$this->credito =$this->ds_cont2[0][1];
	$this->c_credito  = $this->ds_cont2[0][0];
	}




if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}

else
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}
$tt=0;
if(isset($this->ds_idf[0][0]))
	{ 
	foreach($this->ds_idf  as $ads_idf)
		{
		$i=$i+1;
		$vNdoc=$ads_idf[0];
		$vNres=$ads_idf[1];
		$vIdrc=$ads_idf[3];
		 
      $nm_select = "select idfacven from facturaven where numfacven='$vNdoc' and resolucion=$vNres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_fv[0][0]))
			{
			if($vIdPr_impb>0)
				{
				$sql_bolsa = "Select sum(valorpar) from detalleventa where idpro = $vIdPr_impb and numfac = '".$this->ds_fv[0][0]."'";
				 
      $nm_select = $sql_bolsa; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->imb = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->imb[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->imb = false;
          $this->imb_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->imb[0][0]))
					{
					$vImBolsa = $vImBolsa + floatval($this->imb[0][0]);
					}
				}
			
			$vIdfv=$this->ds_fv[0][0];
			 
      $nm_select = "select idfp, monto from detallepagos where idfact=$vIdfv"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dp = false;
          $this->ds_dp_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_dp[0][0]))
				{
				$vLis = '';
				foreach($this->ds_dp  as $ads_dp)
					{
					$j=$j+1;
					$vLis.=$ads_dp[0];
					switch ($vLis)
						{
						case 1:
						$this->tot_efec =floatval($this->tot_efec )+floatval($ads_dp[1]); 
						$this->can_efec  = $this->can_efec +1;
						break;

						case 2:
						$this->tarjeta =floatval($this->tarjeta )+floatval($ads_dp[1]);
						$this->c_tarj  = $this->c_tarj +1;
						break;

						case 3:
						$this->cheque =floatval($this->cheque )+floatval($ads_dp[1]);
						$this->c_cheq  = $this->c_cheq +1;
						break;
							
						case 7:
						$this->trans  = floatval($this->trans )+floatval($ads_dp[1]);
						$this->c_tra  = $this->c_tra +1;
						break;

						$vLisi='';
						}
					}
				}
			else
				{
				if($vIdrc>0)
					{
					 
      $nm_select = "select idfp, monto from detallepagos where idrc=$vIdrc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dpi = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dpi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dpi = false;
          $this->ds_dpi_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($this->ds_dpi[0][0]))
						{
						$vLisi='';
						foreach($this->ds_dpi  as $ads_dpi)
							{
							$x=$x+1;
							$vLisi.=$ads_dpi[0];
							switch ($vLisi)
								{
								case 1:
								$this->tot_efec =floatval($this->tot_efec )+floatval($ads_dpi[1]);
								$this->can_efec  = $this->can_efec +1;
								break;

								case 2:
								$this->tarjeta =floatval($this->tarjeta )+floatval($ads_dpi[1]);
								$this->c_tarj  = $this->c_tarj +1;
								break;

								case 3:
								$this->cheque =floatval($this->cheque )+floatval($ads_dpi[1]);
								$this->c_cheq  = $this->c_cheq +1;
								break;
								
								case 7:
								$this->trans  = floatval($this->trans )+floatval($ads_dp[1]);
								$this->c_tra  = $this->c_tra +1;
								break;
								
								}
							$vLisi='';
							}
						$x=0;
						}
					else
						{
						$this->tot_efec =floatval($this->tot_efec )+floatval($this->ds_idf[0][2]);
						$this->can_efec  = floatval($this->cant_fact ) - (floatval($this->c_credito )+floatval($this->c_tarj )+floatval($this->c_cheq )+ floatval($this->c_tra ));
						}
					}
				else
					{
					$tt=$tt+1;
					$this->tot_efec =floatval($this->tot_efec )+floatval($ads_idf[2]);
					$this->can_efec  = floatval($this->cant_fact ) - (floatval($this->c_credito )+floatval($this->c_tarj )+floatval($this->c_cheq )+floatval($this->c_tra ));
					}
				
				}
			$vIdfv='';
			$j=0;
			$vLis='';
			$vLisi='';
			$x=0;
			}
		$vNdoc='';
		$vNres='';
		$vIdrc='';
		}
	}
$this->total_vtas =floatval($this->credito )+floatval($this->tot_efec )+floatval($this->cheque )+floatval($this->tarjeta )+floatval($this->trans );
$this->porc_efec  = round(($this->can_efec /$this->cant_fact ),2)*100;
$this->porc_tarj  = round(($this->c_tarj /$this->cant_fact ),2)*100;
$this->porc_cheq  = round(($this->c_cheq /$this->cant_fact ),2)*100;
$this->porc_tran  = round(($this->c_tra /$this->cant_fact ),2)*100;
$this->porc_credito  = round(($this->c_credito /$this->cant_fact ),2)*100;
$this->med_efec  = 'EN EFECTIVO:';
$this->med_tarj  = 'CON TARJETA:';
$this->med_cheq  = 'CON CHEQUES:';
$this->med_tran  = 'CON TRANSFERENCIA:';
$this->med_cred  = 'A CREDITO:';

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}

$k=0;
$ads_facv='';
$vBase=0;
$vTasaRet=0;
$vTasaIca=0;
$vTasaRiva=0;
if(isset($this->ds_fav[0][0]))
	{
	foreach($this->ds_fav  as $ads_facv)
		{
		$k=$k+1;
		$vBase=$ads_facv[0]-$ads_facv[1];
		
		
			{
			 
      $nm_select = "select iva, adicional, valorpar from detalleventa where numfac=$ads_facv[7]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_df = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_df[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_df = false;
          $this->dt_df_erro = $this->Db->ErrorMsg();
      } 
;
			$y=0;$prueba =$ads_facv[7];
			if(isset($this->dt_df[0][0]))
				{
				$vTiva='';
				foreach($this->dt_df  as $ads_df)
					{
					$y=$y+1;
					$vTiva=$ads_df[1];
					$this->tot_iva =$ads_df[0]+$this->tot_iva ;
					$this->tot_base =($ads_df[2]-$ads_df[0])+$this->tot_base ;
					switch($vTiva)
						{
						case 19:
						$this->iva_19 =$ads_df[0]+$this->iva_19 ;
						$this->base19 =($ads_df[2]-$ads_df[0])+$this->base19 ;
						break;
						
						case 5:
						$this->iva_5 =$ads_df[0]+$this->iva_5 ;
						$this->base5 =($ads_df[2]-$ads_df[0])+$this->base5 ;
						break;
						
						case 0:
						$this->iva_0 =$ads_df[0]+$this->iva_0 ;
						$this->base0 =$ads_df[2]+$this->base0 ;
						break;
						
						case 8:
						$this->imp_consumo =$ads_df[0]+$this->imp_consumo ;
						break;
						}
					$vTiva='';
					}
				$y=0;
				}
			}
		
		$vBase=0;
		$vTasaRet=0;
		$vTasaIca=0;
		$vTasaRiva=0;
		}
	}


if($vImBolsa>0)
	{
	$this->base0  = $this->base0  - $vImBolsa;
	$this->imp_bol  = $vImBolsa;
	$this->imp_consumo_dev  = 0;
	}
else
	{
	$this->imp_consumo =0;
	$this->imp_consumo_dev  = 0;
	}
$this->tot_inc  = $this->imp_consumo  - $this->imp_consumo_dev  + $this->imp_bol ;
$this->venta_netas   = $this->total ;
$this->vent_reg  = $this->total ;
$this->tot_iva =$this->tot_iva -$this->imp_consumo ;
if (isset($this->sc_temp_elbanco)) {$_SESSION['elbanco'] = $this->sc_temp_elbanco;}
if (isset($this->sc_temp_lafecha)) {$_SESSION['lafecha'] = $this->sc_temp_lafecha;}
if (isset($this->sc_temp_elprefijo)) {$_SESSION['elprefijo'] = $this->sc_temp_elprefijo;}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_reporte_caja']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- nom_docu
   function NM_export_nom_docu()
   {
         $this->nom_docu = html_entity_decode($this->nom_docu, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nom_docu = strip_tags($this->nom_docu);
         $this->nom_docu = NM_charset_to_utf8($this->nom_docu);
         $this->nom_docu = str_replace('<', '&lt;', $this->nom_docu);
         $this->nom_docu = str_replace('>', '&gt;', $this->nom_docu);
         $this->Texto_tag .= "<td>" . $this->nom_docu . "</td>\r\n";
   }
   //----- fecha
   function NM_export_fecha()
   {
             $conteudo_x =  $this->fecha;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fecha, "YYYY-MM-DD  ");
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fecha = NM_charset_to_utf8($this->fecha);
         $this->fecha = str_replace('<', '&lt;', $this->fecha);
         $this->fecha = str_replace('>', '&gt;', $this->fecha);
         $this->Texto_tag .= "<td>" . $this->fecha . "</td>\r\n";
   }
   //----- nom_empresa
   function NM_export_nom_empresa()
   {
         $this->nom_empresa = html_entity_decode($this->nom_empresa, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nom_empresa = strip_tags($this->nom_empresa);
         $this->nom_empresa = NM_charset_to_utf8($this->nom_empresa);
         $this->nom_empresa = str_replace('<', '&lt;', $this->nom_empresa);
         $this->nom_empresa = str_replace('>', '&gt;', $this->nom_empresa);
         $this->Texto_tag .= "<td>" . $this->nom_empresa . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = html_entity_decode($this->direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion = strip_tags($this->direccion);
         $this->direccion = NM_charset_to_utf8($this->direccion);
         $this->direccion = str_replace('<', '&lt;', $this->direccion);
         $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->Texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
   }
   //----- correo
   function NM_export_correo()
   {
         $this->correo = html_entity_decode($this->correo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->correo = strip_tags($this->correo);
         $this->correo = NM_charset_to_utf8($this->correo);
         $this->correo = str_replace('<', '&lt;', $this->correo);
         $this->correo = str_replace('>', '&gt;', $this->correo);
         $this->Texto_tag .= "<td>" . $this->correo . "</td>\r\n";
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = html_entity_decode($this->telefono, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->telefono = strip_tags($this->telefono);
         $this->telefono = NM_charset_to_utf8($this->telefono);
         $this->telefono = str_replace('<', '&lt;', $this->telefono);
         $this->telefono = str_replace('>', '&gt;', $this->telefono);
         $this->Texto_tag .= "<td>" . $this->telefono . "</td>\r\n";
   }
   //----- et1
   function NM_export_et1()
   {
         $this->et1 = html_entity_decode($this->et1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et1 = strip_tags($this->et1);
         $this->et1 = NM_charset_to_utf8($this->et1);
         $this->et1 = str_replace('<', '&lt;', $this->et1);
         $this->et1 = str_replace('>', '&gt;', $this->et1);
         $this->Texto_tag .= "<td>" . $this->et1 . "</td>\r\n";
   }
   //----- et2
   function NM_export_et2()
   {
         $this->et2 = html_entity_decode($this->et2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et2 = strip_tags($this->et2);
         $this->et2 = NM_charset_to_utf8($this->et2);
         $this->et2 = str_replace('<', '&lt;', $this->et2);
         $this->et2 = str_replace('>', '&gt;', $this->et2);
         $this->Texto_tag .= "<td>" . $this->et2 . "</td>\r\n";
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = html_entity_decode($this->documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->documento = strip_tags($this->documento);
         $this->documento = NM_charset_to_utf8($this->documento);
         $this->documento = str_replace('<', '&lt;', $this->documento);
         $this->documento = str_replace('>', '&gt;', $this->documento);
         $this->Texto_tag .= "<td>" . $this->documento . "</td>\r\n";
   }
   //----- et3
   function NM_export_et3()
   {
         $this->et3 = html_entity_decode($this->et3, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et3 = strip_tags($this->et3);
         $this->et3 = NM_charset_to_utf8($this->et3);
         $this->et3 = str_replace('<', '&lt;', $this->et3);
         $this->et3 = str_replace('>', '&gt;', $this->et3);
         $this->Texto_tag .= "<td>" . $this->et3 . "</td>\r\n";
   }
   //----- rango
   function NM_export_rango()
   {
             nmgp_Form_Num_Val($this->rango, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->rango = NM_charset_to_utf8($this->rango);
         $this->rango = str_replace('<', '&lt;', $this->rango);
         $this->rango = str_replace('>', '&gt;', $this->rango);
         $this->Texto_tag .= "<td>" . $this->rango . "</td>\r\n";
   }
   //----- et4
   function NM_export_et4()
   {
         $this->et4 = html_entity_decode($this->et4, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et4 = strip_tags($this->et4);
         $this->et4 = NM_charset_to_utf8($this->et4);
         $this->et4 = str_replace('<', '&lt;', $this->et4);
         $this->et4 = str_replace('>', '&gt;', $this->et4);
         $this->Texto_tag .= "<td>" . $this->et4 . "</td>\r\n";
   }
   //----- cant_fact
   function NM_export_cant_fact()
   {
             nmgp_Form_Num_Val($this->cant_fact, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cant_fact = NM_charset_to_utf8($this->cant_fact);
         $this->cant_fact = str_replace('<', '&lt;', $this->cant_fact);
         $this->cant_fact = str_replace('>', '&gt;', $this->cant_fact);
         $this->Texto_tag .= "<td>" . $this->cant_fact . "</td>\r\n";
   }
   //----- et5
   function NM_export_et5()
   {
         $this->et5 = html_entity_decode($this->et5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et5 = strip_tags($this->et5);
         $this->et5 = NM_charset_to_utf8($this->et5);
         $this->et5 = str_replace('<', '&lt;', $this->et5);
         $this->et5 = str_replace('>', '&gt;', $this->et5);
         $this->Texto_tag .= "<td>" . $this->et5 . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
   }
   //----- et6
   function NM_export_et6()
   {
         $this->et6 = html_entity_decode($this->et6, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et6 = strip_tags($this->et6);
         $this->et6 = NM_charset_to_utf8($this->et6);
         $this->et6 = str_replace('<', '&lt;', $this->et6);
         $this->et6 = str_replace('>', '&gt;', $this->et6);
         $this->Texto_tag .= "<td>" . $this->et6 . "</td>\r\n";
   }
   //----- et7
   function NM_export_et7()
   {
         $this->et7 = html_entity_decode($this->et7, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et7 = strip_tags($this->et7);
         $this->et7 = NM_charset_to_utf8($this->et7);
         $this->et7 = str_replace('<', '&lt;', $this->et7);
         $this->et7 = str_replace('>', '&gt;', $this->et7);
         $this->Texto_tag .= "<td>" . $this->et7 . "</td>\r\n";
   }
   //----- et8
   function NM_export_et8()
   {
         $this->et8 = html_entity_decode($this->et8, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et8 = strip_tags($this->et8);
         $this->et8 = NM_charset_to_utf8($this->et8);
         $this->et8 = str_replace('<', '&lt;', $this->et8);
         $this->et8 = str_replace('>', '&gt;', $this->et8);
         $this->Texto_tag .= "<td>" . $this->et8 . "</td>\r\n";
   }
   //----- et9
   function NM_export_et9()
   {
         $this->et9 = html_entity_decode($this->et9, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et9 = strip_tags($this->et9);
         $this->et9 = NM_charset_to_utf8($this->et9);
         $this->et9 = str_replace('<', '&lt;', $this->et9);
         $this->et9 = str_replace('>', '&gt;', $this->et9);
         $this->Texto_tag .= "<td>" . $this->et9 . "</td>\r\n";
   }
   //----- can_efec
   function NM_export_can_efec()
   {
             nmgp_Form_Num_Val($this->can_efec, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->can_efec = NM_charset_to_utf8($this->can_efec);
         $this->can_efec = str_replace('<', '&lt;', $this->can_efec);
         $this->can_efec = str_replace('>', '&gt;', $this->can_efec);
         $this->Texto_tag .= "<td>" . $this->can_efec . "</td>\r\n";
   }
   //----- med_efec
   function NM_export_med_efec()
   {
         $this->med_efec = html_entity_decode($this->med_efec, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_efec = strip_tags($this->med_efec);
         $this->med_efec = NM_charset_to_utf8($this->med_efec);
         $this->med_efec = str_replace('<', '&lt;', $this->med_efec);
         $this->med_efec = str_replace('>', '&gt;', $this->med_efec);
         $this->Texto_tag .= "<td>" . $this->med_efec . "</td>\r\n";
   }
   //----- porc_efec
   function NM_export_porc_efec()
   {
             nmgp_Form_Num_Val($this->porc_efec, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porc_efec = NM_charset_to_utf8($this->porc_efec);
         $this->porc_efec = str_replace('<', '&lt;', $this->porc_efec);
         $this->porc_efec = str_replace('>', '&gt;', $this->porc_efec);
         $this->Texto_tag .= "<td>" . $this->porc_efec . "</td>\r\n";
   }
   //----- tot_efec
   function NM_export_tot_efec()
   {
             nmgp_Form_Num_Val($this->tot_efec, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tot_efec = NM_charset_to_utf8($this->tot_efec);
         $this->tot_efec = str_replace('<', '&lt;', $this->tot_efec);
         $this->tot_efec = str_replace('>', '&gt;', $this->tot_efec);
         $this->Texto_tag .= "<td>" . $this->tot_efec . "</td>\r\n";
   }
   //----- c_tarj
   function NM_export_c_tarj()
   {
             nmgp_Form_Num_Val($this->c_tarj, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_tarj = NM_charset_to_utf8($this->c_tarj);
         $this->c_tarj = str_replace('<', '&lt;', $this->c_tarj);
         $this->c_tarj = str_replace('>', '&gt;', $this->c_tarj);
         $this->Texto_tag .= "<td>" . $this->c_tarj . "</td>\r\n";
   }
   //----- med_tarj
   function NM_export_med_tarj()
   {
         $this->med_tarj = html_entity_decode($this->med_tarj, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_tarj = strip_tags($this->med_tarj);
         $this->med_tarj = NM_charset_to_utf8($this->med_tarj);
         $this->med_tarj = str_replace('<', '&lt;', $this->med_tarj);
         $this->med_tarj = str_replace('>', '&gt;', $this->med_tarj);
         $this->Texto_tag .= "<td>" . $this->med_tarj . "</td>\r\n";
   }
   //----- porc_tarj
   function NM_export_porc_tarj()
   {
             nmgp_Form_Num_Val($this->porc_tarj, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porc_tarj = NM_charset_to_utf8($this->porc_tarj);
         $this->porc_tarj = str_replace('<', '&lt;', $this->porc_tarj);
         $this->porc_tarj = str_replace('>', '&gt;', $this->porc_tarj);
         $this->Texto_tag .= "<td>" . $this->porc_tarj . "</td>\r\n";
   }
   //----- tarjeta
   function NM_export_tarjeta()
   {
             nmgp_Form_Num_Val($this->tarjeta, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tarjeta = NM_charset_to_utf8($this->tarjeta);
         $this->tarjeta = str_replace('<', '&lt;', $this->tarjeta);
         $this->tarjeta = str_replace('>', '&gt;', $this->tarjeta);
         $this->Texto_tag .= "<td>" . $this->tarjeta . "</td>\r\n";
   }
   //----- c_cheq
   function NM_export_c_cheq()
   {
             nmgp_Form_Num_Val($this->c_cheq, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_cheq = NM_charset_to_utf8($this->c_cheq);
         $this->c_cheq = str_replace('<', '&lt;', $this->c_cheq);
         $this->c_cheq = str_replace('>', '&gt;', $this->c_cheq);
         $this->Texto_tag .= "<td>" . $this->c_cheq . "</td>\r\n";
   }
   //----- med_cheq
   function NM_export_med_cheq()
   {
         $this->med_cheq = html_entity_decode($this->med_cheq, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_cheq = strip_tags($this->med_cheq);
         $this->med_cheq = NM_charset_to_utf8($this->med_cheq);
         $this->med_cheq = str_replace('<', '&lt;', $this->med_cheq);
         $this->med_cheq = str_replace('>', '&gt;', $this->med_cheq);
         $this->Texto_tag .= "<td>" . $this->med_cheq . "</td>\r\n";
   }
   //----- porc_cheq
   function NM_export_porc_cheq()
   {
             nmgp_Form_Num_Val($this->porc_cheq, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porc_cheq = NM_charset_to_utf8($this->porc_cheq);
         $this->porc_cheq = str_replace('<', '&lt;', $this->porc_cheq);
         $this->porc_cheq = str_replace('>', '&gt;', $this->porc_cheq);
         $this->Texto_tag .= "<td>" . $this->porc_cheq . "</td>\r\n";
   }
   //----- cheque
   function NM_export_cheque()
   {
             nmgp_Form_Num_Val($this->cheque, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->cheque = NM_charset_to_utf8($this->cheque);
         $this->cheque = str_replace('<', '&lt;', $this->cheque);
         $this->cheque = str_replace('>', '&gt;', $this->cheque);
         $this->Texto_tag .= "<td>" . $this->cheque . "</td>\r\n";
   }
   //----- c_tra
   function NM_export_c_tra()
   {
             nmgp_Form_Num_Val($this->c_tra, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_tra = NM_charset_to_utf8($this->c_tra);
         $this->c_tra = str_replace('<', '&lt;', $this->c_tra);
         $this->c_tra = str_replace('>', '&gt;', $this->c_tra);
         $this->Texto_tag .= "<td>" . $this->c_tra . "</td>\r\n";
   }
   //----- med_tran
   function NM_export_med_tran()
   {
         $this->med_tran = html_entity_decode($this->med_tran, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_tran = strip_tags($this->med_tran);
         $this->med_tran = NM_charset_to_utf8($this->med_tran);
         $this->med_tran = str_replace('<', '&lt;', $this->med_tran);
         $this->med_tran = str_replace('>', '&gt;', $this->med_tran);
         $this->Texto_tag .= "<td>" . $this->med_tran . "</td>\r\n";
   }
   //----- porc_tran
   function NM_export_porc_tran()
   {
             nmgp_Form_Num_Val($this->porc_tran, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porc_tran = NM_charset_to_utf8($this->porc_tran);
         $this->porc_tran = str_replace('<', '&lt;', $this->porc_tran);
         $this->porc_tran = str_replace('>', '&gt;', $this->porc_tran);
         $this->Texto_tag .= "<td>" . $this->porc_tran . "</td>\r\n";
   }
   //----- trans
   function NM_export_trans()
   {
             nmgp_Form_Num_Val($this->trans, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->trans = NM_charset_to_utf8($this->trans);
         $this->trans = str_replace('<', '&lt;', $this->trans);
         $this->trans = str_replace('>', '&gt;', $this->trans);
         $this->Texto_tag .= "<td>" . $this->trans . "</td>\r\n";
   }
   //----- c_credito
   function NM_export_c_credito()
   {
             nmgp_Form_Num_Val($this->c_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->c_credito = NM_charset_to_utf8($this->c_credito);
         $this->c_credito = str_replace('<', '&lt;', $this->c_credito);
         $this->c_credito = str_replace('>', '&gt;', $this->c_credito);
         $this->Texto_tag .= "<td>" . $this->c_credito . "</td>\r\n";
   }
   //----- med_cred
   function NM_export_med_cred()
   {
         $this->med_cred = html_entity_decode($this->med_cred, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->med_cred = strip_tags($this->med_cred);
         $this->med_cred = NM_charset_to_utf8($this->med_cred);
         $this->med_cred = str_replace('<', '&lt;', $this->med_cred);
         $this->med_cred = str_replace('>', '&gt;', $this->med_cred);
         $this->Texto_tag .= "<td>" . $this->med_cred . "</td>\r\n";
   }
   //----- porc_credito
   function NM_export_porc_credito()
   {
             nmgp_Form_Num_Val($this->porc_credito, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->porc_credito = NM_charset_to_utf8($this->porc_credito);
         $this->porc_credito = str_replace('<', '&lt;', $this->porc_credito);
         $this->porc_credito = str_replace('>', '&gt;', $this->porc_credito);
         $this->Texto_tag .= "<td>" . $this->porc_credito . "</td>\r\n";
   }
   //----- credito
   function NM_export_credito()
   {
             nmgp_Form_Num_Val($this->credito, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->credito = NM_charset_to_utf8($this->credito);
         $this->credito = str_replace('<', '&lt;', $this->credito);
         $this->credito = str_replace('>', '&gt;', $this->credito);
         $this->Texto_tag .= "<td>" . $this->credito . "</td>\r\n";
   }
   //----- et10
   function NM_export_et10()
   {
         $this->et10 = html_entity_decode($this->et10, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et10 = strip_tags($this->et10);
         $this->et10 = NM_charset_to_utf8($this->et10);
         $this->et10 = str_replace('<', '&lt;', $this->et10);
         $this->et10 = str_replace('>', '&gt;', $this->et10);
         $this->Texto_tag .= "<td>" . $this->et10 . "</td>\r\n";
   }
   //----- total_vtas
   function NM_export_total_vtas()
   {
             nmgp_Form_Num_Val($this->total_vtas, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total_vtas = NM_charset_to_utf8($this->total_vtas);
         $this->total_vtas = str_replace('<', '&lt;', $this->total_vtas);
         $this->total_vtas = str_replace('>', '&gt;', $this->total_vtas);
         $this->Texto_tag .= "<td>" . $this->total_vtas . "</td>\r\n";
   }
   //----- et_iva
   function NM_export_et_iva()
   {
         $this->et_iva = html_entity_decode($this->et_iva, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_iva = strip_tags($this->et_iva);
         $this->et_iva = NM_charset_to_utf8($this->et_iva);
         $this->et_iva = str_replace('<', '&lt;', $this->et_iva);
         $this->et_iva = str_replace('>', '&gt;', $this->et_iva);
         $this->Texto_tag .= "<td>" . $this->et_iva . "</td>\r\n";
   }
   //----- et_base
   function NM_export_et_base()
   {
         $this->et_base = html_entity_decode($this->et_base, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_base = strip_tags($this->et_base);
         $this->et_base = NM_charset_to_utf8($this->et_base);
         $this->et_base = str_replace('<', '&lt;', $this->et_base);
         $this->et_base = str_replace('>', '&gt;', $this->et_base);
         $this->Texto_tag .= "<td>" . $this->et_base . "</td>\r\n";
   }
   //----- et_val_iva
   function NM_export_et_val_iva()
   {
         $this->et_val_iva = html_entity_decode($this->et_val_iva, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_val_iva = strip_tags($this->et_val_iva);
         $this->et_val_iva = NM_charset_to_utf8($this->et_val_iva);
         $this->et_val_iva = str_replace('<', '&lt;', $this->et_val_iva);
         $this->et_val_iva = str_replace('>', '&gt;', $this->et_val_iva);
         $this->Texto_tag .= "<td>" . $this->et_val_iva . "</td>\r\n";
   }
   //----- etiva_19
   function NM_export_etiva_19()
   {
         $this->etiva_19 = html_entity_decode($this->etiva_19, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etiva_19 = strip_tags($this->etiva_19);
         $this->etiva_19 = NM_charset_to_utf8($this->etiva_19);
         $this->etiva_19 = str_replace('<', '&lt;', $this->etiva_19);
         $this->etiva_19 = str_replace('>', '&gt;', $this->etiva_19);
         $this->Texto_tag .= "<td>" . $this->etiva_19 . "</td>\r\n";
   }
   //----- base19
   function NM_export_base19()
   {
             nmgp_Form_Num_Val($this->base19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base19 = NM_charset_to_utf8($this->base19);
         $this->base19 = str_replace('<', '&lt;', $this->base19);
         $this->base19 = str_replace('>', '&gt;', $this->base19);
         $this->Texto_tag .= "<td>" . $this->base19 . "</td>\r\n";
   }
   //----- iva_19
   function NM_export_iva_19()
   {
             nmgp_Form_Num_Val($this->iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->iva_19 = NM_charset_to_utf8($this->iva_19);
         $this->iva_19 = str_replace('<', '&lt;', $this->iva_19);
         $this->iva_19 = str_replace('>', '&gt;', $this->iva_19);
         $this->Texto_tag .= "<td>" . $this->iva_19 . "</td>\r\n";
   }
   //----- etiva_5
   function NM_export_etiva_5()
   {
         $this->etiva_5 = html_entity_decode($this->etiva_5, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etiva_5 = strip_tags($this->etiva_5);
         $this->etiva_5 = NM_charset_to_utf8($this->etiva_5);
         $this->etiva_5 = str_replace('<', '&lt;', $this->etiva_5);
         $this->etiva_5 = str_replace('>', '&gt;', $this->etiva_5);
         $this->Texto_tag .= "<td>" . $this->etiva_5 . "</td>\r\n";
   }
   //----- base5
   function NM_export_base5()
   {
             nmgp_Form_Num_Val($this->base5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base5 = NM_charset_to_utf8($this->base5);
         $this->base5 = str_replace('<', '&lt;', $this->base5);
         $this->base5 = str_replace('>', '&gt;', $this->base5);
         $this->Texto_tag .= "<td>" . $this->base5 . "</td>\r\n";
   }
   //----- iva_5
   function NM_export_iva_5()
   {
             nmgp_Form_Num_Val($this->iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->iva_5 = NM_charset_to_utf8($this->iva_5);
         $this->iva_5 = str_replace('<', '&lt;', $this->iva_5);
         $this->iva_5 = str_replace('>', '&gt;', $this->iva_5);
         $this->Texto_tag .= "<td>" . $this->iva_5 . "</td>\r\n";
   }
   //----- etexc_0
   function NM_export_etexc_0()
   {
         $this->etexc_0 = html_entity_decode($this->etexc_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->etexc_0 = strip_tags($this->etexc_0);
         $this->etexc_0 = NM_charset_to_utf8($this->etexc_0);
         $this->etexc_0 = str_replace('<', '&lt;', $this->etexc_0);
         $this->etexc_0 = str_replace('>', '&gt;', $this->etexc_0);
         $this->Texto_tag .= "<td>" . $this->etexc_0 . "</td>\r\n";
   }
   //----- base0
   function NM_export_base0()
   {
             nmgp_Form_Num_Val($this->base0, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base0 = NM_charset_to_utf8($this->base0);
         $this->base0 = str_replace('<', '&lt;', $this->base0);
         $this->base0 = str_replace('>', '&gt;', $this->base0);
         $this->Texto_tag .= "<td>" . $this->base0 . "</td>\r\n";
   }
   //----- iva_0
   function NM_export_iva_0()
   {
             nmgp_Form_Num_Val($this->iva_0, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->iva_0 = NM_charset_to_utf8($this->iva_0);
         $this->iva_0 = str_replace('<', '&lt;', $this->iva_0);
         $this->iva_0 = str_replace('>', '&gt;', $this->iva_0);
         $this->Texto_tag .= "<td>" . $this->iva_0 . "</td>\r\n";
   }
   //----- et_tot
   function NM_export_et_tot()
   {
         $this->et_tot = html_entity_decode($this->et_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_tot = strip_tags($this->et_tot);
         $this->et_tot = NM_charset_to_utf8($this->et_tot);
         $this->et_tot = str_replace('<', '&lt;', $this->et_tot);
         $this->et_tot = str_replace('>', '&gt;', $this->et_tot);
         $this->Texto_tag .= "<td>" . $this->et_tot . "</td>\r\n";
   }
   //----- tot_base
   function NM_export_tot_base()
   {
             nmgp_Form_Num_Val($this->tot_base, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tot_base = NM_charset_to_utf8($this->tot_base);
         $this->tot_base = str_replace('<', '&lt;', $this->tot_base);
         $this->tot_base = str_replace('>', '&gt;', $this->tot_base);
         $this->Texto_tag .= "<td>" . $this->tot_base . "</td>\r\n";
   }
   //----- tot_iva
   function NM_export_tot_iva()
   {
             nmgp_Form_Num_Val($this->tot_iva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tot_iva = NM_charset_to_utf8($this->tot_iva);
         $this->tot_iva = str_replace('<', '&lt;', $this->tot_iva);
         $this->tot_iva = str_replace('>', '&gt;', $this->tot_iva);
         $this->Texto_tag .= "<td>" . $this->tot_iva . "</td>\r\n";
   }
   //----- et20
   function NM_export_et20()
   {
         $this->et20 = html_entity_decode($this->et20, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et20 = strip_tags($this->et20);
         $this->et20 = NM_charset_to_utf8($this->et20);
         $this->et20 = str_replace('<', '&lt;', $this->et20);
         $this->et20 = str_replace('>', '&gt;', $this->et20);
         $this->Texto_tag .= "<td>" . $this->et20 . "</td>\r\n";
   }
   //----- et_vac
   function NM_export_et_vac()
   {
         $this->et_vac = html_entity_decode($this->et_vac, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_vac = strip_tags($this->et_vac);
         $this->et_vac = NM_charset_to_utf8($this->et_vac);
         $this->et_vac = str_replace('<', '&lt;', $this->et_vac);
         $this->et_vac = str_replace('>', '&gt;', $this->et_vac);
         $this->Texto_tag .= "<td>" . $this->et_vac . "</td>\r\n";
   }
   //----- et_imb
   function NM_export_et_imb()
   {
         $this->et_imb = html_entity_decode($this->et_imb, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_imb = strip_tags($this->et_imb);
         $this->et_imb = NM_charset_to_utf8($this->et_imb);
         $this->et_imb = str_replace('<', '&lt;', $this->et_imb);
         $this->et_imb = str_replace('>', '&gt;', $this->et_imb);
         $this->Texto_tag .= "<td>" . $this->et_imb . "</td>\r\n";
   }
   //----- imp_bol
   function NM_export_imp_bol()
   {
             nmgp_Form_Num_Val($this->imp_bol, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->imp_bol = NM_charset_to_utf8($this->imp_bol);
         $this->imp_bol = str_replace('<', '&lt;', $this->imp_bol);
         $this->imp_bol = str_replace('>', '&gt;', $this->imp_bol);
         $this->Texto_tag .= "<td>" . $this->imp_bol . "</td>\r\n";
   }
   //----- et_ic
   function NM_export_et_ic()
   {
         $this->et_ic = html_entity_decode($this->et_ic, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_ic = strip_tags($this->et_ic);
         $this->et_ic = NM_charset_to_utf8($this->et_ic);
         $this->et_ic = str_replace('<', '&lt;', $this->et_ic);
         $this->et_ic = str_replace('>', '&gt;', $this->et_ic);
         $this->Texto_tag .= "<td>" . $this->et_ic . "</td>\r\n";
   }
   //----- imp_consumo
   function NM_export_imp_consumo()
   {
             nmgp_Form_Num_Val($this->imp_consumo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->imp_consumo = NM_charset_to_utf8($this->imp_consumo);
         $this->imp_consumo = str_replace('<', '&lt;', $this->imp_consumo);
         $this->imp_consumo = str_replace('>', '&gt;', $this->imp_consumo);
         $this->Texto_tag .= "<td>" . $this->imp_consumo . "</td>\r\n";
   }
   //----- et_ic_dev
   function NM_export_et_ic_dev()
   {
         $this->et_ic_dev = html_entity_decode($this->et_ic_dev, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_ic_dev = strip_tags($this->et_ic_dev);
         $this->et_ic_dev = NM_charset_to_utf8($this->et_ic_dev);
         $this->et_ic_dev = str_replace('<', '&lt;', $this->et_ic_dev);
         $this->et_ic_dev = str_replace('>', '&gt;', $this->et_ic_dev);
         $this->Texto_tag .= "<td>" . $this->et_ic_dev . "</td>\r\n";
   }
   //----- imp_consumo_dev
   function NM_export_imp_consumo_dev()
   {
             nmgp_Form_Num_Val($this->imp_consumo_dev, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->imp_consumo_dev = NM_charset_to_utf8($this->imp_consumo_dev);
         $this->imp_consumo_dev = str_replace('<', '&lt;', $this->imp_consumo_dev);
         $this->imp_consumo_dev = str_replace('>', '&gt;', $this->imp_consumo_dev);
         $this->Texto_tag .= "<td>" . $this->imp_consumo_dev . "</td>\r\n";
   }
   //----- et_tot_inc
   function NM_export_et_tot_inc()
   {
         $this->et_tot_inc = html_entity_decode($this->et_tot_inc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_tot_inc = strip_tags($this->et_tot_inc);
         $this->et_tot_inc = NM_charset_to_utf8($this->et_tot_inc);
         $this->et_tot_inc = str_replace('<', '&lt;', $this->et_tot_inc);
         $this->et_tot_inc = str_replace('>', '&gt;', $this->et_tot_inc);
         $this->Texto_tag .= "<td>" . $this->et_tot_inc . "</td>\r\n";
   }
   //----- tot_inc
   function NM_export_tot_inc()
   {
             nmgp_Form_Num_Val($this->tot_inc, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->tot_inc = NM_charset_to_utf8($this->tot_inc);
         $this->tot_inc = str_replace('<', '&lt;', $this->tot_inc);
         $this->tot_inc = str_replace('>', '&gt;', $this->tot_inc);
         $this->Texto_tag .= "<td>" . $this->tot_inc . "</td>\r\n";
   }
   //----- et_vn
   function NM_export_et_vn()
   {
         $this->et_vn = html_entity_decode($this->et_vn, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_vn = strip_tags($this->et_vn);
         $this->et_vn = NM_charset_to_utf8($this->et_vn);
         $this->et_vn = str_replace('<', '&lt;', $this->et_vn);
         $this->et_vn = str_replace('>', '&gt;', $this->et_vn);
         $this->Texto_tag .= "<td>" . $this->et_vn . "</td>\r\n";
   }
   //----- venta_netas
   function NM_export_venta_netas()
   {
             nmgp_Form_Num_Val($this->venta_netas, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->venta_netas = NM_charset_to_utf8($this->venta_netas);
         $this->venta_netas = str_replace('<', '&lt;', $this->venta_netas);
         $this->venta_netas = str_replace('>', '&gt;', $this->venta_netas);
         $this->Texto_tag .= "<td>" . $this->venta_netas . "</td>\r\n";
   }
   //----- et_reg
   function NM_export_et_reg()
   {
         $this->et_reg = html_entity_decode($this->et_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_reg = strip_tags($this->et_reg);
         $this->et_reg = NM_charset_to_utf8($this->et_reg);
         $this->et_reg = str_replace('<', '&lt;', $this->et_reg);
         $this->et_reg = str_replace('>', '&gt;', $this->et_reg);
         $this->Texto_tag .= "<td>" . $this->et_reg . "</td>\r\n";
   }
   //----- vent_reg
   function NM_export_vent_reg()
   {
             nmgp_Form_Num_Val($this->vent_reg, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->vent_reg = NM_charset_to_utf8($this->vent_reg);
         $this->vent_reg = str_replace('<', '&lt;', $this->vent_reg);
         $this->vent_reg = str_replace('>', '&gt;', $this->vent_reg);
         $this->Texto_tag .= "<td>" . $this->vent_reg . "</td>\r\n";
   }
   //----- fac_anuladas
   function NM_export_fac_anuladas()
   {
         $this->fac_anuladas = html_entity_decode($this->fac_anuladas, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fac_anuladas = strip_tags($this->fac_anuladas);
         $this->fac_anuladas = NM_charset_to_utf8($this->fac_anuladas);
         $this->fac_anuladas = str_replace('<', '&lt;', $this->fac_anuladas);
         $this->fac_anuladas = str_replace('>', '&gt;', $this->fac_anuladas);
         $this->Texto_tag .= "<td>" . $this->fac_anuladas . "</td>\r\n";
   }
   //----- f_anul
   function NM_export_f_anul()
   {
         $this->f_anul = html_entity_decode($this->f_anul, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->f_anul = strip_tags($this->f_anul);
         $this->f_anul = NM_charset_to_utf8($this->f_anul);
         $this->f_anul = str_replace('<', '&lt;', $this->f_anul);
         $this->f_anul = str_replace('>', '&gt;', $this->f_anul);
         $this->Texto_tag .= "<td>" . $this->f_anul . "</td>\r\n";
   }
   //----- et_obs
   function NM_export_et_obs()
   {
         $this->et_obs = html_entity_decode($this->et_obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_obs = strip_tags($this->et_obs);
         $this->et_obs = NM_charset_to_utf8($this->et_obs);
         $this->et_obs = str_replace('<', '&lt;', $this->et_obs);
         $this->et_obs = str_replace('>', '&gt;', $this->et_obs);
         $this->Texto_tag .= "<td>" . $this->et_obs . "</td>\r\n";
   }
   //----- obs
   function NM_export_obs()
   {
         $this->obs = html_entity_decode($this->obs, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs = strip_tags($this->obs);
         $this->obs = NM_charset_to_utf8($this->obs);
         $this->obs = str_replace('<', '&lt;', $this->obs);
         $this->obs = str_replace('>', '&gt;', $this->obs);
         $this->Texto_tag .= "<td>" . $this->obs . "</td>\r\n";
   }
   //----- et_fech_imp
   function NM_export_et_fech_imp()
   {
         $this->et_fech_imp = html_entity_decode($this->et_fech_imp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_fech_imp = strip_tags($this->et_fech_imp);
         $this->et_fech_imp = NM_charset_to_utf8($this->et_fech_imp);
         $this->et_fech_imp = str_replace('<', '&lt;', $this->et_fech_imp);
         $this->et_fech_imp = str_replace('>', '&gt;', $this->et_fech_imp);
         $this->Texto_tag .= "<td>" . $this->et_fech_imp . "</td>\r\n";
   }
   //----- fecha_imp
   function NM_export_fecha_imp()
   {
         $this->fecha_imp = html_entity_decode($this->fecha_imp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->fecha_imp = strip_tags($this->fecha_imp);
         $this->fecha_imp = NM_charset_to_utf8($this->fecha_imp);
         $this->fecha_imp = str_replace('<', '&lt;', $this->fecha_imp);
         $this->fecha_imp = str_replace('>', '&gt;', $this->fecha_imp);
         $this->Texto_tag .= "<td>" . $this->fecha_imp . "</td>\r\n";
   }
   //----- et_ubic
   function NM_export_et_ubic()
   {
         $this->et_ubic = html_entity_decode($this->et_ubic, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_ubic = strip_tags($this->et_ubic);
         $this->et_ubic = NM_charset_to_utf8($this->et_ubic);
         $this->et_ubic = str_replace('<', '&lt;', $this->et_ubic);
         $this->et_ubic = str_replace('>', '&gt;', $this->et_ubic);
         $this->Texto_tag .= "<td>" . $this->et_ubic . "</td>\r\n";
   }
   //----- ubicacion
   function NM_export_ubicacion()
   {
         $this->ubicacion = html_entity_decode($this->ubicacion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ubicacion = strip_tags($this->ubicacion);
         $this->ubicacion = NM_charset_to_utf8($this->ubicacion);
         $this->ubicacion = str_replace('<', '&lt;', $this->ubicacion);
         $this->ubicacion = str_replace('>', '&gt;', $this->ubicacion);
         $this->Texto_tag .= "<td>" . $this->ubicacion . "</td>\r\n";
   }
   //----- et_equipo
   function NM_export_et_equipo()
   {
         $this->et_equipo = html_entity_decode($this->et_equipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_equipo = strip_tags($this->et_equipo);
         $this->et_equipo = NM_charset_to_utf8($this->et_equipo);
         $this->et_equipo = str_replace('<', '&lt;', $this->et_equipo);
         $this->et_equipo = str_replace('>', '&gt;', $this->et_equipo);
         $this->Texto_tag .= "<td>" . $this->et_equipo . "</td>\r\n";
   }
   //----- nom_equipo
   function NM_export_nom_equipo()
   {
         $this->nom_equipo = html_entity_decode($this->nom_equipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nom_equipo = strip_tags($this->nom_equipo);
         $this->nom_equipo = NM_charset_to_utf8($this->nom_equipo);
         $this->nom_equipo = str_replace('<', '&lt;', $this->nom_equipo);
         $this->nom_equipo = str_replace('>', '&gt;', $this->nom_equipo);
         $this->Texto_tag .= "<td>" . $this->nom_equipo . "</td>\r\n";
   }
   //----- et_serial
   function NM_export_et_serial()
   {
         $this->et_serial = html_entity_decode($this->et_serial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_serial = strip_tags($this->et_serial);
         $this->et_serial = NM_charset_to_utf8($this->et_serial);
         $this->et_serial = str_replace('<', '&lt;', $this->et_serial);
         $this->et_serial = str_replace('>', '&gt;', $this->et_serial);
         $this->Texto_tag .= "<td>" . $this->et_serial . "</td>\r\n";
   }
   //----- serial
   function NM_export_serial()
   {
         $this->serial = html_entity_decode($this->serial, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->serial = strip_tags($this->serial);
         $this->serial = NM_charset_to_utf8($this->serial);
         $this->serial = str_replace('<', '&lt;', $this->serial);
         $this->serial = str_replace('>', '&gt;', $this->serial);
         $this->Texto_tag .= "<td>" . $this->serial . "</td>\r\n";
   }
   //----- et_fin2
   function NM_export_et_fin2()
   {
         $this->et_fin2 = html_entity_decode($this->et_fin2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->et_fin2 = strip_tags($this->et_fin2);
         $this->et_fin2 = NM_charset_to_utf8($this->et_fin2);
         $this->et_fin2 = str_replace('<', '&lt;', $this->et_fin2);
         $this->et_fin2 = str_replace('>', '&gt;', $this->et_fin2);
         $this->Texto_tag .= "<td>" . $this->et_fin2 . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte POS Fiscal :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_reporte_caja_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_reporte_caja"> 
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
