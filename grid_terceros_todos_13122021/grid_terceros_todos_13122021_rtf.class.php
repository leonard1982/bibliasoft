<?php

class grid_terceros_todos_13122021_rtf
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
                   nm_limpa_str_grid_terceros_todos_13122021($cadapar[1]);
                   nm_protect_num_grid_terceros_todos_13122021($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_terceros_todos_13122021']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $gnube_activa;
          nm_limpa_str_grid_terceros_todos_13122021($_SESSION["gnube_activa"]);
      }
      if (isset($gnit)) 
      {
          $_SESSION['gnit'] = $gnit;
          nm_limpa_str_grid_terceros_todos_13122021($_SESSION["gnit"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_terceros_todos_13122021_total.class.php"); 
      $this->Tot      = new grid_terceros_todos_13122021_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_terceros_todos_13122021']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_terceros_todos_13122021";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_terceros_todos_13122021.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_terceros_todos_13122021']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->documento = $Busca_temp['documento']; 
          $tmp_pos = strpos($this->documento, "##@@");
          if ($tmp_pos !== false && !is_array($this->documento))
          {
              $this->documento = substr($this->documento, 0, $tmp_pos);
          }
          $this->documento_2 = $Busca_temp['documento_input_2']; 
          $this->nombres = $Busca_temp['nombres']; 
          $tmp_pos = strpos($this->nombres, "##@@");
          if ($tmp_pos !== false && !is_array($this->nombres))
          {
              $this->nombres = substr($this->nombres, 0, $tmp_pos);
          }
          $this->nombres_2 = $Busca_temp['nombres_input_2']; 
          $this->loatiende = $Busca_temp['loatiende']; 
          $tmp_pos = strpos($this->loatiende, "##@@");
          if ($tmp_pos !== false && !is_array($this->loatiende))
          {
              $this->loatiende = substr($this->loatiende, 0, $tmp_pos);
          }
          $this->estado = $Busca_temp['estado']; 
          $tmp_pos = strpos($this->estado, "##@@");
          if ($tmp_pos !== false && !is_array($this->estado))
          {
              $this->estado = substr($this->estado, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
if (!isset($_SESSION['gnit'])) {$_SESSION['gnit'] = "";}
if (!isset($this->sc_temp_gnit)) {$this->sc_temp_gnit = (isset($_SESSION['gnit'])) ? $_SESSION['gnit'] : "";}
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
 ?>
<style>
.dn-expand-button{
	color:white !important;
}
</style>
<?php

if($this->sc_temp_gnube_activa == "SI")
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "on";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "on";;
}
else
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "off";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "off";;
}

$vso   = "escritorio";

if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
{  
	$vso = "escritorio";
}
else
{
	$vso = "nube";
}

if($this->sc_temp_gnit=="88261176-7" and $vso=="nube")
{
	$this->NM_cmp_hidden["si_nomina"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "on"; }
}
else
{
	$this->NM_cmp_hidden["si_nomina"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['php_cmp_sel']["si_nomina"] = "off"; }
}
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
if (isset($this->sc_temp_gnit)) {$_SESSION['gnit'] = $this->sc_temp_gnit;}
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "Cédula/Nit"; 
          if ($Cada_col == "documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dv'])) ? $this->New_label['dv'] : "DV"; 
          if ($Cada_col == "dv" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombres'])) ? $this->New_label['nombres'] : "Nombres"; 
          if ($Cada_col == "nombres" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "Dirección"; 
          if ($Cada_col == "direccion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idmuni'])) ? $this->New_label['idmuni'] : "Ciudad"; 
          if ($Cada_col == "idmuni" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tel_cel'])) ? $this->New_label['tel_cel'] : "Tel. o celular"; 
          if ($Cada_col == "tel_cel" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "Cliente"; 
          if ($Cada_col == "cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['proveedor'])) ? $this->New_label['proveedor'] : "Proveedor"; 
          if ($Cada_col == "proveedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['empleado'])) ? $this->New_label['empleado'] : "Empleado"; 
          if ($Cada_col == "empleado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['si_nomina'])) ? $this->New_label['si_nomina'] : "Nómina"; 
          if ($Cada_col == "si_nomina" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idtercero'])) ? $this->New_label['idtercero'] : "Idtercero"; 
          if ($Cada_col == "idtercero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nacimiento'])) ? $this->New_label['nacimiento'] : "Fec. Nacimiento"; 
          if ($Cada_col == "nacimiento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sexo'])) ? $this->New_label['sexo'] : "Género"; 
          if ($Cada_col == "sexo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['urlmail'])) ? $this->New_label['urlmail'] : "E-mail"; 
          if ($Cada_col == "urlmail" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechault'])) ? $this->New_label['fechault'] : "Última comp."; 
          if ($Cada_col == "fechault" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['afiliacion'])) ? $this->New_label['afiliacion'] : "Cliente desde"; 
          if ($Cada_col == "afiliacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['regimen'])) ? $this->New_label['regimen'] : "Regimen"; 
          if ($Cada_col == "regimen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
          if ($Cada_col == "observaciones" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['loatiende'])) ? $this->New_label['loatiende'] : "Vendedor"; 
          if ($Cada_col == "loatiende" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['contacto'])) ? $this->New_label['contacto'] : "Contacto"; 
          if ($Cada_col == "contacto" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cupo'])) ? $this->New_label['cupo'] : "Cupo"; 
          if ($Cada_col == "cupo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['listaprecios'])) ? $this->New_label['listaprecios'] : "Listaprecios"; 
          if ($Cada_col == "listaprecios" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['con_actual'])) ? $this->New_label['con_actual'] : "Con Actual"; 
          if ($Cada_col == "con_actual" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['efec_retencion'])) ? $this->New_label['efec_retencion'] : "Efec Retencion"; 
          if ($Cada_col == "efec_retencion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['urlmail_1'])) ? $this->New_label['urlmail_1'] : "Urlmail"; 
          if ($Cada_col == "urlmail_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre1'])) ? $this->New_label['nombre1'] : "Nombre 1"; 
          if ($Cada_col == "nombre1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre2'])) ? $this->New_label['nombre2'] : "Nombre 2"; 
          if ($Cada_col == "nombre2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['apellido1'])) ? $this->New_label['apellido1'] : "Apellido 1"; 
          if ($Cada_col == "apellido1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['apellido2'])) ? $this->New_label['apellido2'] : "Apellido 2"; 
          if ($Cada_col == "apellido2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sucur_cliente'])) ? $this->New_label['sucur_cliente'] : "Sucur Cliente"; 
          if ($Cada_col == "sucur_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['representante'])) ? $this->New_label['representante'] : "Representante"; 
          if ($Cada_col == "representante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['es_restaurante'])) ? $this->New_label['es_restaurante'] : "Es Restaurante"; 
          if ($Cada_col == "es_restaurante" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dias_credito'])) ? $this->New_label['dias_credito'] : "Dias Credito"; 
          if ($Cada_col == "dias_credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dias_mora'])) ? $this->New_label['dias_mora'] : "Dias Mora"; 
          if ($Cada_col == "dias_mora" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['cupo_vendedor'])) ? $this->New_label['cupo_vendedor'] : "Cupo Vendedor"; 
          if ($Cada_col == "cupo_vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigo_ter'])) ? $this->New_label['codigo_ter'] : "Codigo Ter"; 
          if ($Cada_col == "codigo_ter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['es_cajero'])) ? $this->New_label['es_cajero'] : "Es Cajero"; 
          if ($Cada_col == "es_cajero" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['autorizado'])) ? $this->New_label['autorizado'] : "Autorizado"; 
          if ($Cada_col == "autorizado" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['zona_clientes'])) ? $this->New_label['zona_clientes'] : "Zona Clientes"; 
          if ($Cada_col == "zona_clientes" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['clasificacion_clientes'])) ? $this->New_label['clasificacion_clientes'] : "Clasificacion Clientes"; 
          if ($Cada_col == "clasificacion_clientes" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['disponible'])) ? $this->New_label['disponible'] : "Disponible"; 
          if ($Cada_col == "disponible" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_pedido_tmp'])) ? $this->New_label['id_pedido_tmp'] : "Id Pedido Tmp"; 
          if ($Cada_col == "id_pedido_tmp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['n_pedido_tmp'])) ? $this->New_label['n_pedido_tmp'] : "N Pedido Tmp"; 
          if ($Cada_col == "n_pedido_tmp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total_pedido_tmp'])) ? $this->New_label['total_pedido_tmp'] : "Total Pedido Tmp"; 
          if ($Cada_col == "total_pedido_tmp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['obs_pedido_tmp'])) ? $this->New_label['obs_pedido_tmp'] : "Obs Pedido Tmp"; 
          if ($Cada_col == "obs_pedido_tmp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vend_pedido_tmp'])) ? $this->New_label['vend_pedido_tmp'] : "Vend Pedido Tmp"; 
          if ($Cada_col == "vend_pedido_tmp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ciudad'])) ? $this->New_label['ciudad'] : "Ciudad"; 
          if ($Cada_col == "ciudad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigo_postal'])) ? $this->New_label['codigo_postal'] : "Codigo Postal"; 
          if ($Cada_col == "codigo_postal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lenguaje'])) ? $this->New_label['lenguaje'] : "Lenguaje"; 
          if ($Cada_col == "lenguaje" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nombre_comercil'])) ? $this->New_label['nombre_comercil'] : "Nombre Comercil"; 
          if ($Cada_col == "nombre_comercil" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['notificar'])) ? $this->New_label['notificar'] : "Notificar"; 
          if ($Cada_col == "notificar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_auxiliar_deudores'])) ? $this->New_label['puc_auxiliar_deudores'] : "Puc Auxiliar Deudores"; 
          if ($Cada_col == "puc_auxiliar_deudores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retefuente_ventas'])) ? $this->New_label['puc_retefuente_ventas'] : "Puc Retefuente Ventas"; 
          if ($Cada_col == "puc_retefuente_ventas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retefuente_servicios_clie'])) ? $this->New_label['puc_retefuente_servicios_clie'] : "Puc Retefuente Servicios Clie"; 
          if ($Cada_col == "puc_retefuente_servicios_clie" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_auxiliar_proveedores'])) ? $this->New_label['puc_auxiliar_proveedores'] : "Puc Auxiliar Proveedores"; 
          if ($Cada_col == "puc_auxiliar_proveedores" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retefuente_compras'])) ? $this->New_label['puc_retefuente_compras'] : "Puc Retefuente Compras"; 
          if ($Cada_col == "puc_retefuente_compras" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['puc_retefuente_servicios_prov'])) ? $this->New_label['puc_retefuente_servicios_prov'] : "Puc Retefuente Servicios Prov"; 
          if ($Cada_col == "puc_retefuente_servicios_prov" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nube'])) ? $this->New_label['nube'] : "Nube"; 
          if ($Cada_col == "nube" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tipo_documento'])) ? $this->New_label['tipo_documento'] : "Tipo Documento"; 
          if ($Cada_col == "tipo_documento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['facturas'])) ? $this->New_label['facturas'] : "Listar Cartera"; 
          if ($Cada_col == "facturas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_asigna_vendedor'])) ? $this->New_label['sc_asigna_vendedor'] : "Lo Atiende"; 
          if ($Cada_col == "sc_asigna_vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT documento, dv, nombres, direccion, idmuni, tel_cel, cliente, proveedor, empleado, si_nomina, idtercero, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, regimen, tipo, observaciones, loatiende, contacto, credito, cupo, listaprecios, con_actual, efec_retencion, urlmail as urlmail_1, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, tipo_documento, estado from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      if (!empty($this->Ini->nm_col_dinamica)) 
      {
          foreach ($this->Ini->nm_col_dinamica as $nm_cada_col => $nm_nova_col)
          {
              $nmgp_select = str_replace($nm_cada_col, $nm_nova_col, $nmgp_select); 
          }
      }
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
         $this->documento = $rs->fields[0] ;  
         $this->dv = $rs->fields[1] ;  
         $this->dv = (string)$this->dv;
         $this->nombres = $rs->fields[2] ;  
         $this->direccion = $rs->fields[3] ;  
         $this->idmuni = $rs->fields[4] ;  
         $this->idmuni = (string)$this->idmuni;
         $this->tel_cel = $rs->fields[5] ;  
         $this->cliente = $rs->fields[6] ;  
         $this->proveedor = $rs->fields[7] ;  
         $this->empleado = $rs->fields[8] ;  
         $this->si_nomina = $rs->fields[9] ;  
         $this->idtercero = $rs->fields[10] ;  
         $this->idtercero = (string)$this->idtercero;
         $this->nacimiento = $rs->fields[11] ;  
         $this->sexo = $rs->fields[12] ;  
         $this->urlmail = $rs->fields[13] ;  
         $this->fechault = $rs->fields[14] ;  
         $this->saldo = $rs->fields[15] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->afiliacion = $rs->fields[16] ;  
         $this->regimen = $rs->fields[17] ;  
         $this->tipo = $rs->fields[18] ;  
         $this->observaciones = $rs->fields[19] ;  
         $this->loatiende = $rs->fields[20] ;  
         $this->loatiende = (string)$this->loatiende;
         $this->contacto = $rs->fields[21] ;  
         $this->credito = $rs->fields[22] ;  
         $this->cupo = $rs->fields[23] ;  
         $this->cupo = (string)$this->cupo;
         $this->listaprecios = $rs->fields[24] ;  
         $this->listaprecios = (string)$this->listaprecios;
         $this->con_actual = $rs->fields[25] ;  
         $this->efec_retencion = $rs->fields[26] ;  
         $this->urlmail_1 = $rs->fields[27] ;  
         $this->nombre1 = $rs->fields[28] ;  
         $this->nombre2 = $rs->fields[29] ;  
         $this->apellido1 = $rs->fields[30] ;  
         $this->apellido2 = $rs->fields[31] ;  
         $this->sucur_cliente = $rs->fields[32] ;  
         $this->representante = $rs->fields[33] ;  
         $this->es_restaurante = $rs->fields[34] ;  
         $this->dias_credito = $rs->fields[35] ;  
         $this->dias_credito = (string)$this->dias_credito;
         $this->dias_mora = $rs->fields[36] ;  
         $this->dias_mora = (string)$this->dias_mora;
         $this->cupo_vendedor = $rs->fields[37] ;  
         $this->cupo_vendedor =  str_replace(",", ".", $this->cupo_vendedor);
         $this->cupo_vendedor = (string)$this->cupo_vendedor;
         $this->codigo_ter = $rs->fields[38] ;  
         $this->es_cajero = $rs->fields[39] ;  
         $this->autorizado = $rs->fields[40] ;  
         $this->zona_clientes = $rs->fields[41] ;  
         $this->zona_clientes = (string)$this->zona_clientes;
         $this->clasificacion_clientes = $rs->fields[42] ;  
         $this->clasificacion_clientes = (string)$this->clasificacion_clientes;
         $this->creado = $rs->fields[43] ;  
         $this->disponible = $rs->fields[44] ;  
         $this->id_pedido_tmp = $rs->fields[45] ;  
         $this->id_pedido_tmp = (string)$this->id_pedido_tmp;
         $this->n_pedido_tmp = $rs->fields[46] ;  
         $this->total_pedido_tmp = $rs->fields[47] ;  
         $this->total_pedido_tmp =  str_replace(",", ".", $this->total_pedido_tmp);
         $this->total_pedido_tmp = (string)$this->total_pedido_tmp;
         $this->obs_pedido_tmp = $rs->fields[48] ;  
         $this->vend_pedido_tmp = $rs->fields[49] ;  
         $this->ciudad = $rs->fields[50] ;  
         $this->codigo_postal = $rs->fields[51] ;  
         $this->lenguaje = $rs->fields[52] ;  
         $this->nombre_comercil = $rs->fields[53] ;  
         $this->notificar = $rs->fields[54] ;  
         $this->puc_auxiliar_deudores = $rs->fields[55] ;  
         $this->puc_retefuente_ventas = $rs->fields[56] ;  
         $this->puc_retefuente_servicios_clie = $rs->fields[57] ;  
         $this->puc_auxiliar_proveedores = $rs->fields[58] ;  
         $this->puc_retefuente_compras = $rs->fields[59] ;  
         $this->puc_retefuente_servicios_prov = $rs->fields[60] ;  
         $this->nube = $rs->fields[61] ;  
         $this->tipo_documento = $rs->fields[62] ;  
         $this->estado = $rs->fields[63] ;  
         //----- lookup - idmuni
         $this->look_idmuni = $this->idmuni; 
         $this->Lookup->lookup_idmuni($this->look_idmuni, $this->idmuni) ; 
         $this->look_idmuni = ($this->look_idmuni == "&nbsp;") ? "" : $this->look_idmuni; 
         //----- lookup - loatiende
         $this->look_loatiende = $this->loatiende; 
         $this->Lookup->lookup_loatiende($this->look_loatiende, $this->loatiende) ; 
         $this->look_loatiende = ($this->look_loatiende == "&nbsp;") ? "" : $this->look_loatiende; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'on';
 if($this->estado =="PENDIENTE")
{
	$this->NM_field_style["documento"] = "background-color:#33ff99;font-size:13px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$this->sc_asigna_vendedor   = "<select onchange='fAsignarVendedor(\"".$this->idtercero ."\",this.value);'>";
 
      $nm_select = "select idtercero,nombres from terceros where empleado='SI'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vVendedores = array();
      $this->vvendedores = array();
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
                        $this->vVendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vvendedores[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vVendedores = false;
          $this->vVendedores_erro = $this->Db->ErrorMsg();
          $this->vvendedores = false;
          $this->vvendedores_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vvendedores[0][0]))
{
	for($i=0;$i<count($this->vvendedores );$i++)
	{
		if($this->loatiende ==$this->vvendedores[$i][0])
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."' selected='selected'>".$this->vvendedores[$i][1]."</option>";
		}
		else
		{
			$this->sc_asigna_vendedor  .="<option value='".$this->vvendedores[$i][0]."'>".$this->vvendedores[$i][1]."</option>";
		}
	}
}
$this->sc_asigna_vendedor  .="</select>";
$_SESSION['scriptcase']['grid_terceros_todos_13122021']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
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
   //----- dv
   function NM_export_dv()
   {
             nmgp_Form_Num_Val($this->dv, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->dv = NM_charset_to_utf8($this->dv);
         $this->dv = str_replace('<', '&lt;', $this->dv);
         $this->dv = str_replace('>', '&gt;', $this->dv);
         $this->Texto_tag .= "<td>" . $this->dv . "</td>\r\n";
   }
   //----- nombres
   function NM_export_nombres()
   {
         $this->nombres = html_entity_decode($this->nombres, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombres = strip_tags($this->nombres);
         $this->nombres = NM_charset_to_utf8($this->nombres);
         $this->nombres = str_replace('<', '&lt;', $this->nombres);
         $this->nombres = str_replace('>', '&gt;', $this->nombres);
         $this->Texto_tag .= "<td>" . $this->nombres . "</td>\r\n";
   }
   //----- direccion
   function NM_export_direccion()
   {
             if ($this->direccion !== "&nbsp;") 
             { 
                 $this->direccion =  sc_strtolower($this->direccion); 
                 $this->direccion = ucwords($this->direccion); 
             } 
         $this->direccion = html_entity_decode($this->direccion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->direccion = strip_tags($this->direccion);
         $this->direccion = NM_charset_to_utf8($this->direccion);
         $this->direccion = str_replace('<', '&lt;', $this->direccion);
         $this->direccion = str_replace('>', '&gt;', $this->direccion);
         $this->Texto_tag .= "<td>" . $this->direccion . "</td>\r\n";
   }
   //----- idmuni
   function NM_export_idmuni()
   {
         nmgp_Form_Num_Val($this->look_idmuni, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idmuni = NM_charset_to_utf8($this->look_idmuni);
         $this->look_idmuni = str_replace('<', '&lt;', $this->look_idmuni);
         $this->look_idmuni = str_replace('>', '&gt;', $this->look_idmuni);
         $this->Texto_tag .= "<td>" . $this->look_idmuni . "</td>\r\n";
   }
   //----- tel_cel
   function NM_export_tel_cel()
   {
             if ($this->tel_cel !== "&nbsp;") 
             { 
                 $this->nm_gera_mask($this->tel_cel, "xxx xxx xx xx"); 
             } 
         $this->tel_cel = html_entity_decode($this->tel_cel, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tel_cel = strip_tags($this->tel_cel);
         $this->tel_cel = NM_charset_to_utf8($this->tel_cel);
         $this->tel_cel = str_replace('<', '&lt;', $this->tel_cel);
         $this->tel_cel = str_replace('>', '&gt;', $this->tel_cel);
         $this->Texto_tag .= "<td>" . $this->tel_cel . "</td>\r\n";
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
   //----- proveedor
   function NM_export_proveedor()
   {
         $this->proveedor = html_entity_decode($this->proveedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->proveedor = strip_tags($this->proveedor);
         $this->proveedor = NM_charset_to_utf8($this->proveedor);
         $this->proveedor = str_replace('<', '&lt;', $this->proveedor);
         $this->proveedor = str_replace('>', '&gt;', $this->proveedor);
         $this->Texto_tag .= "<td>" . $this->proveedor . "</td>\r\n";
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
   //----- si_nomina
   function NM_export_si_nomina()
   {
         $this->si_nomina = html_entity_decode($this->si_nomina, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->si_nomina = strip_tags($this->si_nomina);
         $this->si_nomina = NM_charset_to_utf8($this->si_nomina);
         $this->si_nomina = str_replace('<', '&lt;', $this->si_nomina);
         $this->si_nomina = str_replace('>', '&gt;', $this->si_nomina);
         $this->Texto_tag .= "<td>" . $this->si_nomina . "</td>\r\n";
   }
   //----- idtercero
   function NM_export_idtercero()
   {
             nmgp_Form_Num_Val($this->idtercero, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idtercero = NM_charset_to_utf8($this->idtercero);
         $this->idtercero = str_replace('<', '&lt;', $this->idtercero);
         $this->idtercero = str_replace('>', '&gt;', $this->idtercero);
         $this->Texto_tag .= "<td>" . $this->idtercero . "</td>\r\n";
   }
   //----- nacimiento
   function NM_export_nacimiento()
   {
             $conteudo_x =  $this->nacimiento;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->nacimiento, "YYYY-MM-DD  ");
                 $this->nacimiento = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->nacimiento = NM_charset_to_utf8($this->nacimiento);
         $this->nacimiento = str_replace('<', '&lt;', $this->nacimiento);
         $this->nacimiento = str_replace('>', '&gt;', $this->nacimiento);
         $this->Texto_tag .= "<td>" . $this->nacimiento . "</td>\r\n";
   }
   //----- sexo
   function NM_export_sexo()
   {
         $this->sexo = html_entity_decode($this->sexo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sexo = strip_tags($this->sexo);
         $this->sexo = NM_charset_to_utf8($this->sexo);
         $this->sexo = str_replace('<', '&lt;', $this->sexo);
         $this->sexo = str_replace('>', '&gt;', $this->sexo);
         $this->Texto_tag .= "<td>" . $this->sexo . "</td>\r\n";
   }
   //----- urlmail
   function NM_export_urlmail()
   {
         $this->urlmail = NM_charset_to_utf8($this->urlmail);
         $this->urlmail = str_replace('<', '&lt;', $this->urlmail);
         $this->urlmail = str_replace('>', '&gt;', $this->urlmail);
         $this->Texto_tag .= "<td>" . $this->urlmail . "</td>\r\n";
   }
   //----- fechault
   function NM_export_fechault()
   {
             $conteudo_x =  $this->fechault;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechault, "YYYY-MM-DD  ");
                 $this->fechault = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->fechault = NM_charset_to_utf8($this->fechault);
         $this->fechault = str_replace('<', '&lt;', $this->fechault);
         $this->fechault = str_replace('>', '&gt;', $this->fechault);
         $this->Texto_tag .= "<td>" . $this->fechault . "</td>\r\n";
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- afiliacion
   function NM_export_afiliacion()
   {
             $conteudo_x =  $this->afiliacion;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->afiliacion, "YYYY-MM-DD  ");
                 $this->afiliacion = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->afiliacion = NM_charset_to_utf8($this->afiliacion);
         $this->afiliacion = str_replace('<', '&lt;', $this->afiliacion);
         $this->afiliacion = str_replace('>', '&gt;', $this->afiliacion);
         $this->Texto_tag .= "<td>" . $this->afiliacion . "</td>\r\n";
   }
   //----- regimen
   function NM_export_regimen()
   {
         $this->regimen = html_entity_decode($this->regimen, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->regimen = strip_tags($this->regimen);
         $this->regimen = NM_charset_to_utf8($this->regimen);
         $this->regimen = str_replace('<', '&lt;', $this->regimen);
         $this->regimen = str_replace('>', '&gt;', $this->regimen);
         $this->Texto_tag .= "<td>" . $this->regimen . "</td>\r\n";
   }
   //----- tipo
   function NM_export_tipo()
   {
         $this->tipo = html_entity_decode($this->tipo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo = strip_tags($this->tipo);
         $this->tipo = NM_charset_to_utf8($this->tipo);
         $this->tipo = str_replace('<', '&lt;', $this->tipo);
         $this->tipo = str_replace('>', '&gt;', $this->tipo);
         $this->Texto_tag .= "<td>" . $this->tipo . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtoupper($this->observaciones); 
             } 
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- loatiende
   function NM_export_loatiende()
   {
         $this->look_loatiende = html_entity_decode($this->look_loatiende, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_loatiende = strip_tags($this->look_loatiende);
         $this->look_loatiende = NM_charset_to_utf8($this->look_loatiende);
         $this->look_loatiende = str_replace('<', '&lt;', $this->look_loatiende);
         $this->look_loatiende = str_replace('>', '&gt;', $this->look_loatiende);
         $this->Texto_tag .= "<td>" . $this->look_loatiende . "</td>\r\n";
   }
   //----- contacto
   function NM_export_contacto()
   {
         $this->contacto = html_entity_decode($this->contacto, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->contacto = strip_tags($this->contacto);
         $this->contacto = NM_charset_to_utf8($this->contacto);
         $this->contacto = str_replace('<', '&lt;', $this->contacto);
         $this->contacto = str_replace('>', '&gt;', $this->contacto);
         $this->Texto_tag .= "<td>" . $this->contacto . "</td>\r\n";
   }
   //----- credito
   function NM_export_credito()
   {
         $this->credito = html_entity_decode($this->credito, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->credito = strip_tags($this->credito);
         $this->credito = NM_charset_to_utf8($this->credito);
         $this->credito = str_replace('<', '&lt;', $this->credito);
         $this->credito = str_replace('>', '&gt;', $this->credito);
         $this->Texto_tag .= "<td>" . $this->credito . "</td>\r\n";
   }
   //----- cupo
   function NM_export_cupo()
   {
             nmgp_Form_Num_Val($this->cupo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->cupo = NM_charset_to_utf8($this->cupo);
         $this->cupo = str_replace('<', '&lt;', $this->cupo);
         $this->cupo = str_replace('>', '&gt;', $this->cupo);
         $this->Texto_tag .= "<td>" . $this->cupo . "</td>\r\n";
   }
   //----- listaprecios
   function NM_export_listaprecios()
   {
             nmgp_Form_Num_Val($this->listaprecios, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->listaprecios = NM_charset_to_utf8($this->listaprecios);
         $this->listaprecios = str_replace('<', '&lt;', $this->listaprecios);
         $this->listaprecios = str_replace('>', '&gt;', $this->listaprecios);
         $this->Texto_tag .= "<td>" . $this->listaprecios . "</td>\r\n";
   }
   //----- con_actual
   function NM_export_con_actual()
   {
             if (substr($this->con_actual, 10, 1) == "-") 
             { 
                 $this->con_actual = substr($this->con_actual, 0, 10) . " " . substr($this->con_actual, 11);
             } 
             if (substr($this->con_actual, 13, 1) == ".") 
             { 
                $this->con_actual = substr($this->con_actual, 0, 13) . ":" . substr($this->con_actual, 14, 2) . ":" . substr($this->con_actual, 17);
             } 
             $conteudo_x =  $this->con_actual;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->con_actual, "YYYY-MM-DD HH:II:SS  ");
                 $this->con_actual = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->con_actual = NM_charset_to_utf8($this->con_actual);
         $this->con_actual = str_replace('<', '&lt;', $this->con_actual);
         $this->con_actual = str_replace('>', '&gt;', $this->con_actual);
         $this->Texto_tag .= "<td>" . $this->con_actual . "</td>\r\n";
   }
   //----- efec_retencion
   function NM_export_efec_retencion()
   {
         $this->efec_retencion = html_entity_decode($this->efec_retencion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->efec_retencion = strip_tags($this->efec_retencion);
         $this->efec_retencion = NM_charset_to_utf8($this->efec_retencion);
         $this->efec_retencion = str_replace('<', '&lt;', $this->efec_retencion);
         $this->efec_retencion = str_replace('>', '&gt;', $this->efec_retencion);
         $this->Texto_tag .= "<td>" . $this->efec_retencion . "</td>\r\n";
   }
   //----- urlmail_1
   function NM_export_urlmail_1()
   {
         $this->urlmail_1 = html_entity_decode($this->urlmail_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->urlmail_1 = strip_tags($this->urlmail_1);
         $this->urlmail_1 = NM_charset_to_utf8($this->urlmail_1);
         $this->urlmail_1 = str_replace('<', '&lt;', $this->urlmail_1);
         $this->urlmail_1 = str_replace('>', '&gt;', $this->urlmail_1);
         $this->Texto_tag .= "<td>" . $this->urlmail_1 . "</td>\r\n";
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
   //----- sucur_cliente
   function NM_export_sucur_cliente()
   {
         $this->sucur_cliente = html_entity_decode($this->sucur_cliente, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sucur_cliente = strip_tags($this->sucur_cliente);
         $this->sucur_cliente = NM_charset_to_utf8($this->sucur_cliente);
         $this->sucur_cliente = str_replace('<', '&lt;', $this->sucur_cliente);
         $this->sucur_cliente = str_replace('>', '&gt;', $this->sucur_cliente);
         $this->Texto_tag .= "<td>" . $this->sucur_cliente . "</td>\r\n";
   }
   //----- representante
   function NM_export_representante()
   {
         $this->representante = html_entity_decode($this->representante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->representante = strip_tags($this->representante);
         $this->representante = NM_charset_to_utf8($this->representante);
         $this->representante = str_replace('<', '&lt;', $this->representante);
         $this->representante = str_replace('>', '&gt;', $this->representante);
         $this->Texto_tag .= "<td>" . $this->representante . "</td>\r\n";
   }
   //----- es_restaurante
   function NM_export_es_restaurante()
   {
         $this->es_restaurante = html_entity_decode($this->es_restaurante, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->es_restaurante = strip_tags($this->es_restaurante);
         $this->es_restaurante = NM_charset_to_utf8($this->es_restaurante);
         $this->es_restaurante = str_replace('<', '&lt;', $this->es_restaurante);
         $this->es_restaurante = str_replace('>', '&gt;', $this->es_restaurante);
         $this->Texto_tag .= "<td>" . $this->es_restaurante . "</td>\r\n";
   }
   //----- dias_credito
   function NM_export_dias_credito()
   {
             nmgp_Form_Num_Val($this->dias_credito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->dias_credito = NM_charset_to_utf8($this->dias_credito);
         $this->dias_credito = str_replace('<', '&lt;', $this->dias_credito);
         $this->dias_credito = str_replace('>', '&gt;', $this->dias_credito);
         $this->Texto_tag .= "<td>" . $this->dias_credito . "</td>\r\n";
   }
   //----- dias_mora
   function NM_export_dias_mora()
   {
             nmgp_Form_Num_Val($this->dias_mora, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->dias_mora = NM_charset_to_utf8($this->dias_mora);
         $this->dias_mora = str_replace('<', '&lt;', $this->dias_mora);
         $this->dias_mora = str_replace('>', '&gt;', $this->dias_mora);
         $this->Texto_tag .= "<td>" . $this->dias_mora . "</td>\r\n";
   }
   //----- cupo_vendedor
   function NM_export_cupo_vendedor()
   {
             nmgp_Form_Num_Val($this->cupo_vendedor, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->cupo_vendedor = NM_charset_to_utf8($this->cupo_vendedor);
         $this->cupo_vendedor = str_replace('<', '&lt;', $this->cupo_vendedor);
         $this->cupo_vendedor = str_replace('>', '&gt;', $this->cupo_vendedor);
         $this->Texto_tag .= "<td>" . $this->cupo_vendedor . "</td>\r\n";
   }
   //----- codigo_ter
   function NM_export_codigo_ter()
   {
         $this->codigo_ter = html_entity_decode($this->codigo_ter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigo_ter = strip_tags($this->codigo_ter);
         $this->codigo_ter = NM_charset_to_utf8($this->codigo_ter);
         $this->codigo_ter = str_replace('<', '&lt;', $this->codigo_ter);
         $this->codigo_ter = str_replace('>', '&gt;', $this->codigo_ter);
         $this->Texto_tag .= "<td>" . $this->codigo_ter . "</td>\r\n";
   }
   //----- es_cajero
   function NM_export_es_cajero()
   {
         $this->es_cajero = html_entity_decode($this->es_cajero, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->es_cajero = strip_tags($this->es_cajero);
         $this->es_cajero = NM_charset_to_utf8($this->es_cajero);
         $this->es_cajero = str_replace('<', '&lt;', $this->es_cajero);
         $this->es_cajero = str_replace('>', '&gt;', $this->es_cajero);
         $this->Texto_tag .= "<td>" . $this->es_cajero . "</td>\r\n";
   }
   //----- autorizado
   function NM_export_autorizado()
   {
         $this->autorizado = html_entity_decode($this->autorizado, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->autorizado = strip_tags($this->autorizado);
         $this->autorizado = NM_charset_to_utf8($this->autorizado);
         $this->autorizado = str_replace('<', '&lt;', $this->autorizado);
         $this->autorizado = str_replace('>', '&gt;', $this->autorizado);
         $this->Texto_tag .= "<td>" . $this->autorizado . "</td>\r\n";
   }
   //----- zona_clientes
   function NM_export_zona_clientes()
   {
             nmgp_Form_Num_Val($this->zona_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->zona_clientes = NM_charset_to_utf8($this->zona_clientes);
         $this->zona_clientes = str_replace('<', '&lt;', $this->zona_clientes);
         $this->zona_clientes = str_replace('>', '&gt;', $this->zona_clientes);
         $this->Texto_tag .= "<td>" . $this->zona_clientes . "</td>\r\n";
   }
   //----- clasificacion_clientes
   function NM_export_clasificacion_clientes()
   {
             nmgp_Form_Num_Val($this->clasificacion_clientes, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->clasificacion_clientes = NM_charset_to_utf8($this->clasificacion_clientes);
         $this->clasificacion_clientes = str_replace('<', '&lt;', $this->clasificacion_clientes);
         $this->clasificacion_clientes = str_replace('>', '&gt;', $this->clasificacion_clientes);
         $this->Texto_tag .= "<td>" . $this->clasificacion_clientes . "</td>\r\n";
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
   //----- disponible
   function NM_export_disponible()
   {
         $this->disponible = html_entity_decode($this->disponible, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->disponible = strip_tags($this->disponible);
         $this->disponible = NM_charset_to_utf8($this->disponible);
         $this->disponible = str_replace('<', '&lt;', $this->disponible);
         $this->disponible = str_replace('>', '&gt;', $this->disponible);
         $this->Texto_tag .= "<td>" . $this->disponible . "</td>\r\n";
   }
   //----- id_pedido_tmp
   function NM_export_id_pedido_tmp()
   {
             nmgp_Form_Num_Val($this->id_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->id_pedido_tmp = NM_charset_to_utf8($this->id_pedido_tmp);
         $this->id_pedido_tmp = str_replace('<', '&lt;', $this->id_pedido_tmp);
         $this->id_pedido_tmp = str_replace('>', '&gt;', $this->id_pedido_tmp);
         $this->Texto_tag .= "<td>" . $this->id_pedido_tmp . "</td>\r\n";
   }
   //----- n_pedido_tmp
   function NM_export_n_pedido_tmp()
   {
         $this->n_pedido_tmp = html_entity_decode($this->n_pedido_tmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->n_pedido_tmp = strip_tags($this->n_pedido_tmp);
         $this->n_pedido_tmp = NM_charset_to_utf8($this->n_pedido_tmp);
         $this->n_pedido_tmp = str_replace('<', '&lt;', $this->n_pedido_tmp);
         $this->n_pedido_tmp = str_replace('>', '&gt;', $this->n_pedido_tmp);
         $this->Texto_tag .= "<td>" . $this->n_pedido_tmp . "</td>\r\n";
   }
   //----- total_pedido_tmp
   function NM_export_total_pedido_tmp()
   {
             nmgp_Form_Num_Val($this->total_pedido_tmp, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total_pedido_tmp = NM_charset_to_utf8($this->total_pedido_tmp);
         $this->total_pedido_tmp = str_replace('<', '&lt;', $this->total_pedido_tmp);
         $this->total_pedido_tmp = str_replace('>', '&gt;', $this->total_pedido_tmp);
         $this->Texto_tag .= "<td>" . $this->total_pedido_tmp . "</td>\r\n";
   }
   //----- obs_pedido_tmp
   function NM_export_obs_pedido_tmp()
   {
         $this->obs_pedido_tmp = html_entity_decode($this->obs_pedido_tmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->obs_pedido_tmp = strip_tags($this->obs_pedido_tmp);
         $this->obs_pedido_tmp = NM_charset_to_utf8($this->obs_pedido_tmp);
         $this->obs_pedido_tmp = str_replace('<', '&lt;', $this->obs_pedido_tmp);
         $this->obs_pedido_tmp = str_replace('>', '&gt;', $this->obs_pedido_tmp);
         $this->Texto_tag .= "<td>" . $this->obs_pedido_tmp . "</td>\r\n";
   }
   //----- vend_pedido_tmp
   function NM_export_vend_pedido_tmp()
   {
         $this->vend_pedido_tmp = html_entity_decode($this->vend_pedido_tmp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->vend_pedido_tmp = strip_tags($this->vend_pedido_tmp);
         $this->vend_pedido_tmp = NM_charset_to_utf8($this->vend_pedido_tmp);
         $this->vend_pedido_tmp = str_replace('<', '&lt;', $this->vend_pedido_tmp);
         $this->vend_pedido_tmp = str_replace('>', '&gt;', $this->vend_pedido_tmp);
         $this->Texto_tag .= "<td>" . $this->vend_pedido_tmp . "</td>\r\n";
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
   //----- codigo_postal
   function NM_export_codigo_postal()
   {
         $this->codigo_postal = html_entity_decode($this->codigo_postal, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigo_postal = strip_tags($this->codigo_postal);
         $this->codigo_postal = NM_charset_to_utf8($this->codigo_postal);
         $this->codigo_postal = str_replace('<', '&lt;', $this->codigo_postal);
         $this->codigo_postal = str_replace('>', '&gt;', $this->codigo_postal);
         $this->Texto_tag .= "<td>" . $this->codigo_postal . "</td>\r\n";
   }
   //----- lenguaje
   function NM_export_lenguaje()
   {
         $this->lenguaje = html_entity_decode($this->lenguaje, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lenguaje = strip_tags($this->lenguaje);
         $this->lenguaje = NM_charset_to_utf8($this->lenguaje);
         $this->lenguaje = str_replace('<', '&lt;', $this->lenguaje);
         $this->lenguaje = str_replace('>', '&gt;', $this->lenguaje);
         $this->Texto_tag .= "<td>" . $this->lenguaje . "</td>\r\n";
   }
   //----- nombre_comercil
   function NM_export_nombre_comercil()
   {
         $this->nombre_comercil = html_entity_decode($this->nombre_comercil, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nombre_comercil = strip_tags($this->nombre_comercil);
         $this->nombre_comercil = NM_charset_to_utf8($this->nombre_comercil);
         $this->nombre_comercil = str_replace('<', '&lt;', $this->nombre_comercil);
         $this->nombre_comercil = str_replace('>', '&gt;', $this->nombre_comercil);
         $this->Texto_tag .= "<td>" . $this->nombre_comercil . "</td>\r\n";
   }
   //----- notificar
   function NM_export_notificar()
   {
         $this->notificar = html_entity_decode($this->notificar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->notificar = strip_tags($this->notificar);
         $this->notificar = NM_charset_to_utf8($this->notificar);
         $this->notificar = str_replace('<', '&lt;', $this->notificar);
         $this->notificar = str_replace('>', '&gt;', $this->notificar);
         $this->Texto_tag .= "<td>" . $this->notificar . "</td>\r\n";
   }
   //----- puc_auxiliar_deudores
   function NM_export_puc_auxiliar_deudores()
   {
             nmgp_Form_Num_Val($this->puc_auxiliar_deudores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_auxiliar_deudores = NM_charset_to_utf8($this->puc_auxiliar_deudores);
         $this->puc_auxiliar_deudores = str_replace('<', '&lt;', $this->puc_auxiliar_deudores);
         $this->puc_auxiliar_deudores = str_replace('>', '&gt;', $this->puc_auxiliar_deudores);
         $this->Texto_tag .= "<td>" . $this->puc_auxiliar_deudores . "</td>\r\n";
   }
   //----- puc_retefuente_ventas
   function NM_export_puc_retefuente_ventas()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_ventas, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_retefuente_ventas = NM_charset_to_utf8($this->puc_retefuente_ventas);
         $this->puc_retefuente_ventas = str_replace('<', '&lt;', $this->puc_retefuente_ventas);
         $this->puc_retefuente_ventas = str_replace('>', '&gt;', $this->puc_retefuente_ventas);
         $this->Texto_tag .= "<td>" . $this->puc_retefuente_ventas . "</td>\r\n";
   }
   //----- puc_retefuente_servicios_clie
   function NM_export_puc_retefuente_servicios_clie()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_clie, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_retefuente_servicios_clie = NM_charset_to_utf8($this->puc_retefuente_servicios_clie);
         $this->puc_retefuente_servicios_clie = str_replace('<', '&lt;', $this->puc_retefuente_servicios_clie);
         $this->puc_retefuente_servicios_clie = str_replace('>', '&gt;', $this->puc_retefuente_servicios_clie);
         $this->Texto_tag .= "<td>" . $this->puc_retefuente_servicios_clie . "</td>\r\n";
   }
   //----- puc_auxiliar_proveedores
   function NM_export_puc_auxiliar_proveedores()
   {
             nmgp_Form_Num_Val($this->puc_auxiliar_proveedores, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_auxiliar_proveedores = NM_charset_to_utf8($this->puc_auxiliar_proveedores);
         $this->puc_auxiliar_proveedores = str_replace('<', '&lt;', $this->puc_auxiliar_proveedores);
         $this->puc_auxiliar_proveedores = str_replace('>', '&gt;', $this->puc_auxiliar_proveedores);
         $this->Texto_tag .= "<td>" . $this->puc_auxiliar_proveedores . "</td>\r\n";
   }
   //----- puc_retefuente_compras
   function NM_export_puc_retefuente_compras()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_compras, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_retefuente_compras = NM_charset_to_utf8($this->puc_retefuente_compras);
         $this->puc_retefuente_compras = str_replace('<', '&lt;', $this->puc_retefuente_compras);
         $this->puc_retefuente_compras = str_replace('>', '&gt;', $this->puc_retefuente_compras);
         $this->Texto_tag .= "<td>" . $this->puc_retefuente_compras . "</td>\r\n";
   }
   //----- puc_retefuente_servicios_prov
   function NM_export_puc_retefuente_servicios_prov()
   {
             nmgp_Form_Num_Val($this->puc_retefuente_servicios_prov, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->puc_retefuente_servicios_prov = NM_charset_to_utf8($this->puc_retefuente_servicios_prov);
         $this->puc_retefuente_servicios_prov = str_replace('<', '&lt;', $this->puc_retefuente_servicios_prov);
         $this->puc_retefuente_servicios_prov = str_replace('>', '&gt;', $this->puc_retefuente_servicios_prov);
         $this->Texto_tag .= "<td>" . $this->puc_retefuente_servicios_prov . "</td>\r\n";
   }
   //----- nube
   function NM_export_nube()
   {
         $this->nube = html_entity_decode($this->nube, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nube = strip_tags($this->nube);
         $this->nube = NM_charset_to_utf8($this->nube);
         $this->nube = str_replace('<', '&lt;', $this->nube);
         $this->nube = str_replace('>', '&gt;', $this->nube);
         $this->Texto_tag .= "<td>" . $this->nube . "</td>\r\n";
   }
   //----- tipo_documento
   function NM_export_tipo_documento()
   {
         $this->tipo_documento = html_entity_decode($this->tipo_documento, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->tipo_documento = strip_tags($this->tipo_documento);
         $this->tipo_documento = NM_charset_to_utf8($this->tipo_documento);
         $this->tipo_documento = str_replace('<', '&lt;', $this->tipo_documento);
         $this->tipo_documento = str_replace('>', '&gt;', $this->tipo_documento);
         $this->Texto_tag .= "<td>" . $this->tipo_documento . "</td>\r\n";
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
   //----- facturas
   function NM_export_facturas()
   {
         $this->facturas = NM_charset_to_utf8($this->facturas);
         $this->facturas = str_replace('<', '&lt;', $this->facturas);
         $this->facturas = str_replace('>', '&gt;', $this->facturas);
         $this->Texto_tag .= "<td>" . $this->facturas . "</td>\r\n";
   }
   //----- sc_asigna_vendedor
   function NM_export_sc_asigna_vendedor()
   {
         $this->sc_asigna_vendedor = html_entity_decode($this->sc_asigna_vendedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_asigna_vendedor = strip_tags($this->sc_asigna_vendedor);
         $this->sc_asigna_vendedor = NM_charset_to_utf8($this->sc_asigna_vendedor);
         $this->sc_asigna_vendedor = str_replace('<', '&lt;', $this->sc_asigna_vendedor);
         $this->sc_asigna_vendedor = str_replace('>', '&gt;', $this->sc_asigna_vendedor);
         $this->Texto_tag .= "<td>" . $this->sc_asigna_vendedor . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_terceros_todos_13122021'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Terceros :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_terceros_todos_13122021_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_terceros_todos_13122021"> 
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
