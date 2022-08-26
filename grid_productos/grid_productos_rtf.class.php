<?php

class grid_productos_rtf
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
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_productos_total.class.php"); 
      $this->Tot      = new grid_productos_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by")
          {
              $this->sum_existencia_menor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][2];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_existencia_menor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][2];
          }
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_productos']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_productos";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_productos.rtf";
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
          $this->ubicacion = $Busca_temp['ubicacion']; 
          $tmp_pos = strpos($this->ubicacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->ubicacion))
          {
              $this->ubicacion = substr($this->ubicacion, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'on';
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
if (!isset($_SESSION['gusuario_logueo'])) {$_SESSION['gusuario_logueo'] = "";}
if (!isset($this->sc_temp_gusuario_logueo)) {$this->sc_temp_gusuario_logueo = (isset($_SESSION['gusuario_logueo'])) ? $_SESSION['gusuario_logueo'] : "";}
 ?>
<style>
body
{
	
	
	
	
	
	
	
	
	
	
	
	
}
</style>
<?php
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


$vsql = "select ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota from configuraciones where idconfiguraciones=1";
 
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
	
	if($this->vconfig[0][7]=="SI")
	{
		$this->NM_cmp_hidden["btn_stock"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["btn_stock"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "off"; }
	}
	
	if($this->vconfig[0][8]=="SI")
	{
		$this->NM_cmp_hidden["ubicacion"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["ubicacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "off"; }
	}
	
	if($this->vconfig[0][9]=="SI")
	{
		$this->NM_cmp_hidden["costomen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["costomen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "off"; }
	}
	
	if($this->vconfig[0][10]=="SI")
	{
		$this->NM_cmp_hidden["idpro1"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idpro1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "off"; }
	}
	
	if($this->vconfig[0][11]=="SI")
	{
		$this->NM_cmp_hidden["combo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["combo"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["combo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["combo"] = "off"; }
	}
	
	if($this->vconfig[0][12]=="SI")
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "off"; }
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : "Grupo"; 
          if ($Cada_col == "idgrup" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
          if ($Cada_col == "codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Producto"; 
          if ($Cada_col == "nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
          if ($Cada_col == "imagen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['existencia_menor'])) ? $this->New_label['existencia_menor'] : "Existencia"; 
          if ($Cada_col == "existencia_menor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unimen'])) ? $this->New_label['unimen'] : "Unidad"; 
          if ($Cada_col == "unimen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : "Precio"; 
          if ($Cada_col == "preciomen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idiva'])) ? $this->New_label['idiva'] : "Impuesto(%)"; 
          if ($Cada_col == "idiva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['btn_stock'])) ? $this->New_label['btn_stock'] : "Stock"; 
          if ($Cada_col == "btn_stock" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "Ubicacion"; 
          if ($Cada_col == "ubicacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['costomen'])) ? $this->New_label['costomen'] : "Costo"; 
          if ($Cada_col == "costomen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : "Proveedor"; 
          if ($Cada_col == "idpro1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['combo'])) ? $this->New_label['combo'] : "Combo"; 
          if ($Cada_col == "combo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['agregarnotainv'])) ? $this->New_label['agregarnotainv'] : "Nota"; 
          if ($Cada_col == "agregarnotainv" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idprod'])) ? $this->New_label['idprod'] : "Producto"; 
          if ($Cada_col == "idprod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['unimay'])) ? $this->New_label['unimay'] : "Unidad"; 
          if ($Cada_col == "unimay" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['recmayamen'])) ? $this->New_label['recmayamen'] : "Factor"; 
          if ($Cada_col == "recmayamen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciofull'])) ? $this->New_label['preciofull'] : "Precio"; 
          if ($Cada_col == "preciofull" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['stockmay'])) ? $this->New_label['stockmay'] : "Stock Mayor"; 
          if ($Cada_col == "stockmay" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['stockmen'])) ? $this->New_label['stockmen'] : "Existencia"; 
          if ($Cada_col == "stockmen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idpro2'])) ? $this->New_label['idpro2'] : "Proveedor 2"; 
          if ($Cada_col == "idpro2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "Descuento"; 
          if ($Cada_col == "otro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['otro2'])) ? $this->New_label['otro2'] : "%  Desc."; 
          if ($Cada_col == "otro2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; 
          if ($Cada_col == "escombo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen2'])) ? $this->New_label['preciomen2'] : "$ Menudeo Especial"; 
          if ($Cada_col == "preciomen2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomen3'])) ? $this->New_label['preciomen3'] : "$ Menudeo Mayor"; 
          if ($Cada_col == "preciomen3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['precio2'])) ? $this->New_label['precio2'] : "$ Mayor Especial"; 
          if ($Cada_col == "precio2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['preciomay'])) ? $this->New_label['preciomay'] : "$ Mayor"; 
          if ($Cada_col == "preciomay" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, escombo, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
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
         $this->idprod = $rs->fields[11] ;  
         $this->idprod = (string)$this->idprod;
         $this->unimay = $rs->fields[12] ;  
         $this->recmayamen = $rs->fields[13] ;  
         $this->recmayamen =  str_replace(",", ".", $this->recmayamen);
         $this->recmayamen = (string)$this->recmayamen;
         $this->preciofull = $rs->fields[14] ;  
         $this->preciofull =  str_replace(",", ".", $this->preciofull);
         $this->preciofull = (string)$this->preciofull;
         $this->stockmay = $rs->fields[15] ;  
         $this->stockmay =  str_replace(",", ".", $this->stockmay);
         $this->stockmay = (string)$this->stockmay;
         $this->stockmen = $rs->fields[16] ;  
         $this->stockmen = (string)$this->stockmen;
         $this->idpro2 = $rs->fields[17] ;  
         $this->idpro2 = (string)$this->idpro2;
         $this->otro = $rs->fields[18] ;  
         $this->otro = (string)$this->otro;
         $this->otro2 = $rs->fields[19] ;  
         $this->otro2 = (string)$this->otro2;
         $this->escombo = $rs->fields[20] ;  
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
	$this->NM_field_style["combo"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
         $this->look_idgrup = str_replace('<', '&lt;', $this->look_idgrup);
         $this->look_idgrup = str_replace('>', '&gt;', $this->look_idgrup);
         $this->Texto_tag .= "<td>" . $this->look_idgrup . "</td>\r\n";
   }
   //----- codigobar
   function NM_export_codigobar()
   {
         $this->codigobar = html_entity_decode($this->codigobar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->codigobar = strip_tags($this->codigobar);
         $this->codigobar = NM_charset_to_utf8($this->codigobar);
         $this->codigobar = str_replace('<', '&lt;', $this->codigobar);
         $this->codigobar = str_replace('>', '&gt;', $this->codigobar);
         $this->Texto_tag .= "<td>" . $this->codigobar . "</td>\r\n";
   }
   //----- nompro
   function NM_export_nompro()
   {
         $this->nompro = html_entity_decode($this->nompro, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nompro = strip_tags($this->nompro);
         $this->nompro = NM_charset_to_utf8($this->nompro);
         $this->nompro = str_replace('<', '&lt;', $this->nompro);
         $this->nompro = str_replace('>', '&gt;', $this->nompro);
         $this->Texto_tag .= "<td>" . $this->nompro . "</td>\r\n";
   }
   //----- imagen
   function NM_export_imagen()
   {
         $this->imagen = NM_charset_to_utf8($this->imagen);
         $this->imagen = str_replace('<', '&lt;', $this->imagen);
         $this->imagen = str_replace('>', '&gt;', $this->imagen);
         $this->Texto_tag .= "<td>" . $this->imagen . "</td>\r\n";
   }
   //----- existencia_menor
   function NM_export_existencia_menor()
   {
             nmgp_Form_Num_Val($this->existencia_menor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->existencia_menor = NM_charset_to_utf8($this->existencia_menor);
         $this->existencia_menor = str_replace('<', '&lt;', $this->existencia_menor);
         $this->existencia_menor = str_replace('>', '&gt;', $this->existencia_menor);
         $this->Texto_tag .= "<td>" . $this->existencia_menor . "</td>\r\n";
   }
   //----- unimen
   function NM_export_unimen()
   {
         $this->unimen = html_entity_decode($this->unimen, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unimen = strip_tags($this->unimen);
         $this->unimen = NM_charset_to_utf8($this->unimen);
         $this->unimen = str_replace('<', '&lt;', $this->unimen);
         $this->unimen = str_replace('>', '&gt;', $this->unimen);
         $this->Texto_tag .= "<td>" . $this->unimen . "</td>\r\n";
   }
   //----- preciomen
   function NM_export_preciomen()
   {
             nmgp_Form_Num_Val($this->preciomen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciomen = NM_charset_to_utf8($this->preciomen);
         $this->preciomen = str_replace('<', '&lt;', $this->preciomen);
         $this->preciomen = str_replace('>', '&gt;', $this->preciomen);
         $this->Texto_tag .= "<td>" . $this->preciomen . "</td>\r\n";
   }
   //----- idiva
   function NM_export_idiva()
   {
         nmgp_Form_Num_Val($this->look_idiva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idiva = NM_charset_to_utf8($this->look_idiva);
         $this->look_idiva = str_replace('<', '&lt;', $this->look_idiva);
         $this->look_idiva = str_replace('>', '&gt;', $this->look_idiva);
         $this->Texto_tag .= "<td>" . $this->look_idiva . "</td>\r\n";
   }
   //----- btn_stock
   function NM_export_btn_stock()
   {
         $this->btn_stock = NM_charset_to_utf8($this->btn_stock);
         $this->btn_stock = str_replace('<', '&lt;', $this->btn_stock);
         $this->btn_stock = str_replace('>', '&gt;', $this->btn_stock);
         $this->Texto_tag .= "<td>" . $this->btn_stock . "</td>\r\n";
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
   //----- costomen
   function NM_export_costomen()
   {
             nmgp_Form_Num_Val($this->costomen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->costomen = NM_charset_to_utf8($this->costomen);
         $this->costomen = str_replace('<', '&lt;', $this->costomen);
         $this->costomen = str_replace('>', '&gt;', $this->costomen);
         $this->Texto_tag .= "<td>" . $this->costomen . "</td>\r\n";
   }
   //----- idpro1
   function NM_export_idpro1()
   {
         $this->look_idpro1 = html_entity_decode($this->look_idpro1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idpro1 = strip_tags($this->look_idpro1);
         $this->look_idpro1 = NM_charset_to_utf8($this->look_idpro1);
         $this->look_idpro1 = str_replace('<', '&lt;', $this->look_idpro1);
         $this->look_idpro1 = str_replace('>', '&gt;', $this->look_idpro1);
         $this->Texto_tag .= "<td>" . $this->look_idpro1 . "</td>\r\n";
   }
   //----- combo
   function NM_export_combo()
   {
         $this->combo = NM_charset_to_utf8($this->combo);
         $this->combo = str_replace('<', '&lt;', $this->combo);
         $this->combo = str_replace('>', '&gt;', $this->combo);
         $this->Texto_tag .= "<td>" . $this->combo . "</td>\r\n";
   }
   //----- agregarnotainv
   function NM_export_agregarnotainv()
   {
         $this->agregarnotainv = NM_charset_to_utf8($this->agregarnotainv);
         $this->agregarnotainv = str_replace('<', '&lt;', $this->agregarnotainv);
         $this->agregarnotainv = str_replace('>', '&gt;', $this->agregarnotainv);
         $this->Texto_tag .= "<td>" . $this->agregarnotainv . "</td>\r\n";
   }
   //----- idprod
   function NM_export_idprod()
   {
             nmgp_Form_Num_Val($this->idprod, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idprod = NM_charset_to_utf8($this->idprod);
         $this->idprod = str_replace('<', '&lt;', $this->idprod);
         $this->idprod = str_replace('>', '&gt;', $this->idprod);
         $this->Texto_tag .= "<td>" . $this->idprod . "</td>\r\n";
   }
   //----- unimay
   function NM_export_unimay()
   {
         $this->unimay = html_entity_decode($this->unimay, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->unimay = strip_tags($this->unimay);
         $this->unimay = NM_charset_to_utf8($this->unimay);
         $this->unimay = str_replace('<', '&lt;', $this->unimay);
         $this->unimay = str_replace('>', '&gt;', $this->unimay);
         $this->Texto_tag .= "<td>" . $this->unimay . "</td>\r\n";
   }
   //----- recmayamen
   function NM_export_recmayamen()
   {
             nmgp_Form_Num_Val($this->recmayamen, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->recmayamen = NM_charset_to_utf8($this->recmayamen);
         $this->recmayamen = str_replace('<', '&lt;', $this->recmayamen);
         $this->recmayamen = str_replace('>', '&gt;', $this->recmayamen);
         $this->Texto_tag .= "<td>" . $this->recmayamen . "</td>\r\n";
   }
   //----- preciofull
   function NM_export_preciofull()
   {
             nmgp_Form_Num_Val($this->preciofull, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->preciofull = NM_charset_to_utf8($this->preciofull);
         $this->preciofull = str_replace('<', '&lt;', $this->preciofull);
         $this->preciofull = str_replace('>', '&gt;', $this->preciofull);
         $this->Texto_tag .= "<td>" . $this->preciofull . "</td>\r\n";
   }
   //----- stockmay
   function NM_export_stockmay()
   {
             nmgp_Form_Num_Val($this->stockmay, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->stockmay = NM_charset_to_utf8($this->stockmay);
         $this->stockmay = str_replace('<', '&lt;', $this->stockmay);
         $this->stockmay = str_replace('>', '&gt;', $this->stockmay);
         $this->Texto_tag .= "<td>" . $this->stockmay . "</td>\r\n";
   }
   //----- stockmen
   function NM_export_stockmen()
   {
             nmgp_Form_Num_Val($this->stockmen, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->stockmen = NM_charset_to_utf8($this->stockmen);
         $this->stockmen = str_replace('<', '&lt;', $this->stockmen);
         $this->stockmen = str_replace('>', '&gt;', $this->stockmen);
         $this->Texto_tag .= "<td>" . $this->stockmen . "</td>\r\n";
   }
   //----- idpro2
   function NM_export_idpro2()
   {
             nmgp_Form_Num_Val($this->idpro2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idpro2 = NM_charset_to_utf8($this->idpro2);
         $this->idpro2 = str_replace('<', '&lt;', $this->idpro2);
         $this->idpro2 = str_replace('>', '&gt;', $this->idpro2);
         $this->Texto_tag .= "<td>" . $this->idpro2 . "</td>\r\n";
   }
   //----- otro
   function NM_export_otro()
   {
         $this->look_otro = NM_charset_to_utf8($this->look_otro);
         $this->look_otro = str_replace('<', '&lt;', $this->look_otro);
         $this->look_otro = str_replace('>', '&gt;', $this->look_otro);
         $this->Texto_tag .= "<td>" . $this->look_otro . "</td>\r\n";
   }
   //----- otro2
   function NM_export_otro2()
   {
             nmgp_Form_Num_Val($this->otro2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->otro2 = NM_charset_to_utf8($this->otro2);
         $this->otro2 = str_replace('<', '&lt;', $this->otro2);
         $this->otro2 = str_replace('>', '&gt;', $this->otro2);
         $this->Texto_tag .= "<td>" . $this->otro2 . "</td>\r\n";
   }
   //----- escombo
   function NM_export_escombo()
   {
         $this->escombo = html_entity_decode($this->escombo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->escombo = strip_tags($this->escombo);
         $this->escombo = NM_charset_to_utf8($this->escombo);
         $this->escombo = str_replace('<', '&lt;', $this->escombo);
         $this->escombo = str_replace('>', '&gt;', $this->escombo);
         $this->Texto_tag .= "<td>" . $this->escombo . "</td>\r\n";
   }
   //----- preciomen2
   function NM_export_preciomen2()
   {
             nmgp_Form_Num_Val($this->preciomen2, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->preciomen2 = NM_charset_to_utf8($this->preciomen2);
         $this->preciomen2 = str_replace('<', '&lt;', $this->preciomen2);
         $this->preciomen2 = str_replace('>', '&gt;', $this->preciomen2);
         $this->Texto_tag .= "<td>" . $this->preciomen2 . "</td>\r\n";
   }
   //----- preciomen3
   function NM_export_preciomen3()
   {
             nmgp_Form_Num_Val($this->preciomen3, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->preciomen3 = NM_charset_to_utf8($this->preciomen3);
         $this->preciomen3 = str_replace('<', '&lt;', $this->preciomen3);
         $this->preciomen3 = str_replace('>', '&gt;', $this->preciomen3);
         $this->Texto_tag .= "<td>" . $this->preciomen3 . "</td>\r\n";
   }
   //----- precio2
   function NM_export_precio2()
   {
             nmgp_Form_Num_Val($this->precio2, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->precio2 = NM_charset_to_utf8($this->precio2);
         $this->precio2 = str_replace('<', '&lt;', $this->precio2);
         $this->precio2 = str_replace('>', '&gt;', $this->precio2);
         $this->Texto_tag .= "<td>" . $this->precio2 . "</td>\r\n";
   }
   //----- preciomay
   function NM_export_preciomay()
   {
             nmgp_Form_Num_Val($this->preciomay, ",", ",", "0", "S", "2", "$", "V:3:3", "-"); 
         $this->preciomay = NM_charset_to_utf8($this->preciomay);
         $this->preciomay = str_replace('<', '&lt;', $this->preciomay);
         $this->preciomay = str_replace('>', '&gt;', $this->preciomay);
         $this->Texto_tag .= "<td>" . $this->preciomay . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de productos :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_productos_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_productos"> 
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
