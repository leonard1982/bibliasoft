<?php

class grid_productos_json
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

   function __construct()
   {
      $this->nm_data = new nm_data("es");
   }

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "";
      }
   }

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
                   nm_limpa_str_grid_productos($cadapar[1]);
                   nm_protect_num_grid_productos($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_productos']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gnit)) 
      {
          $_SESSION['gnit'] = $gnit;
          nm_limpa_str_grid_productos($_SESSION["gnit"]);
      }
      if (isset($gusuario_logueo)) 
      {
          $_SESSION['gusuario_logueo'] = $gusuario_logueo;
          nm_limpa_str_grid_productos($_SESSION["gusuario_logueo"]);
      }
      if (isset($gnube_activa)) 
      {
          $_SESSION['gnube_activa'] = $gnube_activa;
          nm_limpa_str_grid_productos($_SESSION["gnube_activa"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->Json_use_label = false;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_productos/grid_productos_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_productos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_return']);
          if ($this->Tem_json_res) {
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
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_grid_productos.zip";
      $this->Arquivo     .= "_grid_productos";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "grid_productos.json";
      $this->Tit_zip      = "grid_productos.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
   {
      global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->codigobar = $Busca_temp['codigobar']; 
          $tmp_pos = strpos($this->codigobar, "##@@");
          if ($tmp_pos !== false && !is_array($this->codigobar))
          {
              $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
          }
          $this->nompro = $Busca_temp['nompro']; 
          $tmp_pos = strpos($this->nompro, "##@@");
          if ($tmp_pos !== false && !is_array($this->nompro))
          {
              $this->nompro = substr($this->nompro, 0, $tmp_pos);
          }
          $this->idgrup = $Busca_temp['idgrup']; 
          $tmp_pos = strpos($this->idgrup, "##@@");
          if ($tmp_pos !== false && !is_array($this->idgrup))
          {
              $this->idgrup = substr($this->idgrup, 0, $tmp_pos);
          }
          $this->idpro1 = $Busca_temp['idpro1']; 
          $tmp_pos = strpos($this->idpro1, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro1))
          {
              $this->idpro1 = substr($this->idpro1, 0, $tmp_pos);
          }
          $this->idpro2 = $Busca_temp['idpro2']; 
          $tmp_pos = strpos($this->idpro2, "##@@");
          if ($tmp_pos !== false && !is_array($this->idpro2))
          {
              $this->idpro2 = substr($this->idpro2, 0, $tmp_pos);
          }
          $this->idiva = $Busca_temp['idiva']; 
          $tmp_pos = strpos($this->idiva, "##@@");
          if ($tmp_pos !== false && !is_array($this->idiva))
          {
              $this->idiva = substr($this->idiva, 0, $tmp_pos);
          }
          $this->escombo = $Busca_temp['escombo']; 
          $tmp_pos = strpos($this->escombo, "##@@");
          if ($tmp_pos !== false && !is_array($this->escombo))
          {
              $this->escombo = substr($this->escombo, 0, $tmp_pos);
          }
          $this->stockmen = $Busca_temp['stockmen']; 
          $tmp_pos = strpos($this->stockmen, "##@@");
          if ($tmp_pos !== false && !is_array($this->stockmen))
          {
              $this->stockmen = substr($this->stockmen, 0, $tmp_pos);
          }
          $this->stockmen_2 = $Busca_temp['stockmen_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'on';
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
if (!isset($_SESSION['gusuario_logueo'])) {$_SESSION['gusuario_logueo'] = "";}
if (!isset($this->sc_temp_gusuario_logueo)) {$this->sc_temp_gusuario_logueo = (isset($_SESSION['gusuario_logueo'])) ? $_SESSION['gusuario_logueo'] : "";}
 $vsql = "select ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo from configuraciones where idconfiguraciones=1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vConfig = array();
      $this->vconfig = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vConfig[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vconfig[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vConfig = false;
          $this->vConfig_erro = $this->Db->ErrorMsg();
          $this->vconfig = false;
          $this->vconfig_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vconfig[0][0]))
{
	if($this->vconfig[0][0]=="SI")
	{
		$this->NM_cmp_hidden["idgrup"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idgrup"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idgrup"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idgrup"] = "off"; }
	}
	
	if($this->vconfig[0][1]=="SI")
	{
		$this->NM_cmp_hidden["codigobar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["codigobar"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["codigobar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["codigobar"] = "off"; }
	}
	
	if($this->vconfig[0][2]=="SI")
	{
		$this->NM_cmp_hidden["imagen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["imagen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["imagen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["imagen"] = "off"; }
	}
	
	if($this->vconfig[0][3]=="SI")
	{
		$this->NM_cmp_hidden["existencia_menor"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["existencia_menor"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["existencia_menor"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["existencia_menor"] = "off"; }
	}
	
	if($this->vconfig[0][4]=="SI")
	{
		$this->NM_cmp_hidden["unimen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["unimen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["unimen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["unimen"] = "off"; }
	}
	
	if($this->vconfig[0][5]=="SI")
	{
		$this->NM_cmp_hidden["preciomen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["preciomen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["preciomen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["preciomen"] = "off"; }
	}
	
	if($this->vconfig[0][6]=="SI")
	{
		$this->NM_cmp_hidden["idiva"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idiva"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idiva"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idiva"] = "off"; }
	}
	
	if($this->vconfig[0][6]=="SI")
	{
		$this->NM_cmp_hidden["btn_stock"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["btn_stock"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "off"; }
	}
	
	if($this->vconfig[0][7]=="SI")
	{
		$this->NM_cmp_hidden["ubicacion"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["ubicacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "off"; }
	}
	
	if($this->vconfig[0][8]=="SI")
	{
		$this->NM_cmp_hidden["costomen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["costomen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "off"; }
	}
	
	if($this->vconfig[0][9]=="SI")
	{
		$this->NM_cmp_hidden["idpro1"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idpro1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "off"; }
	}
	
	if($this->vconfig[0][10]=="SI")
	{
		$this->NM_cmp_hidden["escombo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["escombo"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["escombo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["escombo"] = "off"; }
	}
}


$this->NM_cmp_hidden["agregarnotainv"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "off"; }
 
      $nm_select = "select grupo from usuarios where usuario='".$this->sc_temp_gusuario_logueo."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExiste = array();
      $this->vsiexiste = array();
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
          $this->vSiExiste_erro = $this->Db->ErrorMsg();
          $this->vsiexiste = false;
          $this->vsiexiste_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsiexiste[0][0]))
{
	if($this->vsiexiste[0][0]==1)
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "on"; }
	}
}

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
if (isset($this->sc_temp_gusuario_logueo)) {$_SESSION['gusuario_logueo'] = $this->sc_temp_gusuario_logueo;}
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
$_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['order_grid'];
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->idgrup = $rs->fields[0] ;  
         $this->idgrup = (string)$this->idgrup;
         $this->codigobar = $rs->fields[1] ;  
         $this->nompro = $rs->fields[2] ;  
         $this->imagen = $rs->fields[3] ;  
         $this->existencia_menor = $rs->fields[4] ;  
         $this->existencia_menor = (string)$this->existencia_menor;
         $this->unimen = $rs->fields[5] ;  
         $this->preciomen = $rs->fields[6] ;  
         $this->preciomen =  str_replace(",", ".", $this->preciomen);
         $this->preciomen = (string)$this->preciomen;
         $this->idiva = $rs->fields[7] ;  
         $this->idiva = (string)$this->idiva;
         $this->ubicacion = $rs->fields[8] ;  
         $this->costomen = $rs->fields[9] ;  
         $this->costomen =  str_replace(",", ".", $this->costomen);
         $this->costomen = (string)$this->costomen;
         $this->idpro1 = $rs->fields[10] ;  
         $this->idpro1 = (string)$this->idpro1;
         $this->escombo = $rs->fields[11] ;  
         $this->idprod = $rs->fields[12] ;  
         $this->idprod = (string)$this->idprod;
         $this->unimay = $rs->fields[13] ;  
         $this->recmayamen = $rs->fields[14] ;  
         $this->recmayamen =  str_replace(",", ".", $this->recmayamen);
         $this->recmayamen = (string)$this->recmayamen;
         $this->preciofull = $rs->fields[15] ;  
         $this->preciofull =  str_replace(",", ".", $this->preciofull);
         $this->preciofull = (string)$this->preciofull;
         $this->stockmay = $rs->fields[16] ;  
         $this->stockmay =  str_replace(",", ".", $this->stockmay);
         $this->stockmay = (string)$this->stockmay;
         $this->stockmen = $rs->fields[17] ;  
         $this->stockmen = (string)$this->stockmen;
         $this->idpro2 = $rs->fields[18] ;  
         $this->idpro2 = (string)$this->idpro2;
         $this->otro = $rs->fields[19] ;  
         $this->otro = (string)$this->otro;
         $this->otro2 = $rs->fields[20] ;  
         $this->otro2 = (string)$this->otro2;
         $this->preciomen2 = $rs->fields[21] ;  
         $this->preciomen2 =  str_replace(",", ".", $this->preciomen2);
         $this->preciomen2 = (string)$this->preciomen2;
         $this->preciomen3 = $rs->fields[22] ;  
         $this->preciomen3 =  str_replace(",", ".", $this->preciomen3);
         $this->preciomen3 = (string)$this->preciomen3;
         $this->precio2 = $rs->fields[23] ;  
         $this->precio2 =  str_replace(",", ".", $this->precio2);
         $this->precio2 = (string)$this->precio2;
         $this->preciomay = $rs->fields[24] ;  
         $this->preciomay =  str_replace(",", ".", $this->preciomay);
         $this->preciomay = (string)$this->preciomay;
         $this->unidmaymen = $rs->fields[25] ;  
         //----- lookup - idgrup
         $this->look_idgrup = $this->idgrup; 
         $this->Lookup->lookup_idgrup($this->look_idgrup, $this->idgrup) ; 
         $this->look_idgrup = ($this->look_idgrup == "&nbsp;") ? "" : $this->look_idgrup; 
         //----- lookup - idiva
         $this->look_idiva = $this->idiva; 
         $this->Lookup->lookup_idiva($this->look_idiva, $this->idiva) ; 
         $this->look_idiva = ($this->look_idiva == "&nbsp;") ? "" : $this->look_idiva; 
         //----- lookup - idpro1
         $this->look_idpro1 = $this->idpro1; 
         $this->Lookup->lookup_idpro1($this->look_idpro1) ; 
         $this->look_idpro1 = ($this->look_idpro1 == "&nbsp;") ? "" : $this->look_idpro1; 
         //----- lookup - otro
         $this->look_otro = $this->otro; 
         $this->Lookup->lookup_otro($this->look_otro); 
         $this->look_otro = ($this->look_otro == "&nbsp;") ? "" : $this->look_otro; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'on';
 if($this->escombo =="SI")
{
	$this->NM_field_style["escombo"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if ($this->otro ==1)
	{
	$this->NM_field_style["otro"] = "background-color:#33ff00;";
	$this->NM_field_style["otro2"] = "background-color:#33ff00;";
	}

if($this->unidmaymen =="SI")
{
}
else
{
	$this->stockmen  = 0;
}
if($this->unimen >0)
	{
	 
      $nm_select = "select descripcion_um from unidades_medida where codigo_um = '".$this->unimen  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->das = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->das[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->das = false;
          $this->das_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->das[0][0]))
		{
		$this->unimen  = $this->das[0][0];
		}
	else
		{
		$this->unimen  = 'Unidad';
		}
	}
$_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "grid_productos_res_json.class.php");
              $this->Res = new grid_productos_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idgrup
   function NM_export_idgrup()
   {
         nmgp_Form_Num_Val($this->look_idgrup, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idgrup = NM_charset_to_utf8($this->look_idgrup);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : "Grupo"; 
         }
         else
         {
             $SC_Label = "idgrup"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idgrup;
   }
   //----- codigobar
   function NM_export_codigobar()
   {
         $this->codigobar = NM_charset_to_utf8($this->codigobar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
         }
         else
         {
             $SC_Label = "codigobar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->codigobar;
   }
   //----- nompro
   function NM_export_nompro()
   {
         $this->nompro = NM_charset_to_utf8($this->nompro);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Producto"; 
         }
         else
         {
             $SC_Label = "nompro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nompro;
   }
   //----- imagen
   function NM_export_imagen()
   {
         $this->imagen = NM_charset_to_utf8($this->imagen);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
         }
         else
         {
             $SC_Label = "imagen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->imagen;
   }
   //----- existencia_menor
   function NM_export_existencia_menor()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->existencia_menor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['existencia_menor'])) ? $this->New_label['existencia_menor'] : "Existencia"; 
         }
         else
         {
             $SC_Label = "existencia_menor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->existencia_menor;
   }
   //----- unimen
   function NM_export_unimen()
   {
         $this->unimen = NM_charset_to_utf8($this->unimen);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['unimen'])) ? $this->New_label['unimen'] : "Unidad"; 
         }
         else
         {
             $SC_Label = "unimen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->unimen;
   }
   //----- preciomen
   function NM_export_preciomen()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->preciomen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : "Precio"; 
         }
         else
         {
             $SC_Label = "preciomen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->preciomen;
   }
   //----- idiva
   function NM_export_idiva()
   {
         nmgp_Form_Num_Val($this->look_idiva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idiva = NM_charset_to_utf8($this->look_idiva);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idiva'])) ? $this->New_label['idiva'] : "Impuesto(%)"; 
         }
         else
         {
             $SC_Label = "idiva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idiva;
   }
   //----- btn_stock
   function NM_export_btn_stock()
   {
         $this->btn_stock = NM_charset_to_utf8($this->btn_stock);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['btn_stock'])) ? $this->New_label['btn_stock'] : "Stock"; 
         }
         else
         {
             $SC_Label = "btn_stock"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->btn_stock;
   }
   //----- ubicacion
   function NM_export_ubicacion()
   {
         $this->ubicacion = NM_charset_to_utf8($this->ubicacion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "Ubicacion"; 
         }
         else
         {
             $SC_Label = "ubicacion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ubicacion;
   }
   //----- costomen
   function NM_export_costomen()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->costomen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['costomen'])) ? $this->New_label['costomen'] : "Costo"; 
         }
         else
         {
             $SC_Label = "costomen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->costomen;
   }
   //----- idpro1
   function NM_export_idpro1()
   {
         $this->look_idpro1 = NM_charset_to_utf8($this->look_idpro1);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : "Proveedor"; 
         }
         else
         {
             $SC_Label = "idpro1"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idpro1;
   }
   //----- escombo
   function NM_export_escombo()
   {
         $this->escombo = NM_charset_to_utf8($this->escombo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; 
         }
         else
         {
             $SC_Label = "escombo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->escombo;
   }
   //----- agregarnotainv
   function NM_export_agregarnotainv()
   {
         $this->agregarnotainv = NM_charset_to_utf8($this->agregarnotainv);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['agregarnotainv'])) ? $this->New_label['agregarnotainv'] : "Nota"; 
         }
         else
         {
             $SC_Label = "agregarnotainv"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->agregarnotainv;
   }
   //----- idprod
   function NM_export_idprod()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idprod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idprod'])) ? $this->New_label['idprod'] : "Producto"; 
         }
         else
         {
             $SC_Label = "idprod"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idprod;
   }
   //----- unimay
   function NM_export_unimay()
   {
         $this->unimay = NM_charset_to_utf8($this->unimay);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['unimay'])) ? $this->New_label['unimay'] : "Unidad"; 
         }
         else
         {
             $SC_Label = "unimay"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->unimay;
   }
   //----- recmayamen
   function NM_export_recmayamen()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->recmayamen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['recmayamen'])) ? $this->New_label['recmayamen'] : "Factor"; 
         }
         else
         {
             $SC_Label = "recmayamen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->recmayamen;
   }
   //----- preciofull
   function NM_export_preciofull()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->preciofull, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['preciofull'])) ? $this->New_label['preciofull'] : "Precio"; 
         }
         else
         {
             $SC_Label = "preciofull"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->preciofull;
   }
   //----- stockmay
   function NM_export_stockmay()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->stockmay, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['stockmay'])) ? $this->New_label['stockmay'] : "Stock Mayor"; 
         }
         else
         {
             $SC_Label = "stockmay"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->stockmay;
   }
   //----- stockmen
   function NM_export_stockmen()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->stockmen, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['stockmen'])) ? $this->New_label['stockmen'] : "Existencia"; 
         }
         else
         {
             $SC_Label = "stockmen"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->stockmen;
   }
   //----- idpro2
   function NM_export_idpro2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idpro2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idpro2'])) ? $this->New_label['idpro2'] : "Proveedor 2"; 
         }
         else
         {
             $SC_Label = "idpro2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idpro2;
   }
   //----- otro
   function NM_export_otro()
   {
         $this->look_otro = NM_charset_to_utf8($this->look_otro);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "Descuento"; 
         }
         else
         {
             $SC_Label = "otro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_otro;
   }
   //----- otro2
   function NM_export_otro2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->otro2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['otro2'])) ? $this->New_label['otro2'] : "%  Desc."; 
         }
         else
         {
             $SC_Label = "otro2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->otro2;
   }
   //----- preciomen2
   function NM_export_preciomen2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->preciomen2, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['preciomen2'])) ? $this->New_label['preciomen2'] : "$ Menudeo Especial"; 
         }
         else
         {
             $SC_Label = "preciomen2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->preciomen2;
   }
   //----- preciomen3
   function NM_export_preciomen3()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->preciomen3, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['preciomen3'])) ? $this->New_label['preciomen3'] : "$ Menudeo Mayor"; 
         }
         else
         {
             $SC_Label = "preciomen3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->preciomen3;
   }
   //----- precio2
   function NM_export_precio2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->precio2, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['precio2'])) ? $this->New_label['precio2'] : "$ Mayor Especial"; 
         }
         else
         {
             $SC_Label = "precio2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->precio2;
   }
   //----- preciomay
   function NM_export_preciomay()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->preciomay, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['preciomay'])) ? $this->New_label['preciomay'] : "$ Mayor"; 
         }
         else
         {
             $SC_Label = "preciomay"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->preciomay;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de productos :: JSON</TITLE>
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
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
<form name="Fdown" method="get" action="grid_productos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_productos"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['json_return']); ?>"> 
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
