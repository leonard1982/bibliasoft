<?php

class grid_NC_ND_xml
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
   var $sum_total;
   var $sum_subtotal;
   var $sum_valoriva;
   var $sum_base_iva_19;
   var $sum_valor_iva_19;
   var $sum_base_iva_5;
   var $sum_valor_iva_5;
   var $sum_excento;

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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['opcao'] = "";
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
                   nm_limpa_str_grid_NC_ND($cadapar[1]);
                   nm_protect_num_grid_NC_ND($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_NC_ND']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gproveedor)) 
      {
          $_SESSION['gproveedor'] = $gproveedor;
          nm_limpa_str_grid_NC_ND($_SESSION["gproveedor"]);
      }
      if (isset($par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $par_numfacventa;
          nm_limpa_str_grid_NC_ND($_SESSION["par_numfacventa"]);
      }
      if (!isset($gIdfac) && isset($gidfac)) 
      {
         $gIdfac = $gidfac;
      }
      if (isset($gIdfac)) 
      {
          $_SESSION['gIdfac'] = $gIdfac;
          nm_limpa_str_grid_NC_ND($_SESSION["gIdfac"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "grid_NC_ND/grid_NC_ND_res_xml.class.php"))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_NC_ND_total.class.php"); 
      $this->Tot      = new grid_NC_ND_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][1];
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "fecha")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "vencimiento")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "credito")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "vendedor")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][9];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->sum_total = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][2];
              $this->sum_subtotal = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][3];
              $this->sum_valoriva = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][4];
              $this->sum_base_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][5];
              $this->sum_valor_iva_19 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][6];
              $this->sum_base_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][7];
              $this->sum_valor_iva_5 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][8];
              $this->sum_excento = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['tot_geral'][9];
          }
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_NC_ND']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_grid_NC_ND.zip";
      $this->Arquivo     .= "_grid_NC_ND";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_NC_ND.xml";
      $this->Tit_zip      = "grid_NC_ND.zip";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_NC_ND']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_NC_ND']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_NC_ND']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
          $this->resolucion = $Busca_temp['resolucion']; 
          $tmp_pos = strpos($this->resolucion, "##@@");
          if ($tmp_pos !== false && !is_array($this->resolucion))
          {
              $this->resolucion = substr($this->resolucion, 0, $tmp_pos);
          }
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->idcli = $Busca_temp['idcli']; 
          $tmp_pos = strpos($this->idcli, "##@@");
          if ($tmp_pos !== false && !is_array($this->idcli))
          {
              $this->idcli = substr($this->idcli, 0, $tmp_pos);
          }
          $this->vendedor = $Busca_temp['vendedor']; 
          $tmp_pos = strpos($this->vendedor, "##@@");
          if ($tmp_pos !== false && !is_array($this->vendedor))
          {
              $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
          }
          $this->observaciones = $Busca_temp['observaciones']; 
          $tmp_pos = strpos($this->observaciones, "##@@");
          if ($tmp_pos !== false && !is_array($this->observaciones))
          {
              $this->observaciones = substr($this->observaciones, 0, $tmp_pos);
          }
          $this->asentada = $Busca_temp['asentada']; 
          $tmp_pos = strpos($this->asentada, "##@@");
          if ($tmp_pos !== false && !is_array($this->asentada))
          {
              $this->asentada = substr($this->asentada, 0, $tmp_pos);
          }
          $this->pagada = $Busca_temp['pagada']; 
          $tmp_pos = strpos($this->pagada, "##@@");
          if ($tmp_pos !== false && !is_array($this->pagada))
          {
              $this->pagada = substr($this->pagada, 0, $tmp_pos);
          }
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'on';
if (!isset($_SESSION['gproveedor'])) {$_SESSION['gproveedor'] = "";}
if (!isset($this->sc_temp_gproveedor)) {$this->sc_temp_gproveedor = (isset($_SESSION['gproveedor'])) ? $_SESSION['gproveedor'] : "";}
  $vvalidar_correo_enlinea = "NO";

$vsql = "select validar_correo_enlinea from configuraciones  where idconfiguraciones=1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vVEmail = array();
      $this->vvemail = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vVEmail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vvemail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vVEmail = false;
          $this->vVEmail_erro = $this->Db->ErrorMsg();
          $this->vvemail = false;
          $this->vvemail_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vvemail[0][0]))
{
	$vvalidar_correo_enlinea = $this->vvemail[0][0];
}

?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery.blockUI.js'); ?>"></script>
<?php


$vsql = "SELECT proveedor, if(modo='PRUEBAS',servidor_prueba1,servidor1) as server1, if(modo='PRUEBAS',servidor_prueba2,servidor2) as server2, if(modo='PRUEBAS',token_prueba,tokenempresa) as tk_empresa, if(modo='PRUEBAS',password_prueba,tokenpassword) as tk_password, modo, enviar_dian, enviar_cliente FROM webservicefe where idwebservicefe='1'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vWS = array();
      $this->vws = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vWS[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vws[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vWS = false;
          $this->vWS_erro = $this->Db->ErrorMsg();
          $this->vws = false;
          $this->vws_erro = $this->Db->ErrorMsg();
      } 
;	
if(isset($this->vws[0][0]))
{
	$this->sc_temp_gproveedor = $this->vws[0][0];
}

?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery.blockUI.js'); ?>"></script>
<script>
	
	$(document).ajaxStart(function(){
	
		$.blockUI({ 
			message: 'Espere por favor...', 
			css: { 
				border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff'
			}
		});

	}).ajaxStop(function(){

			$.unblockUI();

	});
	
		
		function fEstadoFE(nfactura)
		{
			$.post("../cEstadoFacturaElectronica/index.php",{
			
				nfactura:nfactura
	
			},function(r){
				
				var obj = JSON.parse(r);
	
				switch(obj.codigo)
				{
					case 200:
						alert("Esta factura ya fue enviada satisfactoriamente.");
					break;
					case 101:
						alert("El token del emisor no es válido.");
					break;
					case 105:
						alert("Error al extraer los datos, verifique que la información enviada sea correcta.");
					break;
					case 102:
						alert("Error en validaciones.");
					break;
					case 103:
						alert("Ha ocurrido un error en la ejecución del servicio, por favor intente mas tarde.");
					break;
				}
			});
		}
	
		function fEnviarFE(idfacven)
		{
			$.post("../cEnviarFactura/index.php",{
			
				idfacven:idfacven
	
			},function(r){
				
				console.log(r);
				
				var obj = JSON.parse(r);
	
				$.post("../cGuardarRespuesta/index.php",{
	
					datos:obj.factura,
					idfacven:idfacven
	
				},function(r2){
				
					console.log("Log data fEnviarFE: ");
					console.log(r2);
				});
	
				alert(obj.codigo+' '+obj.mensaje);
			});
		}
	
		function fPDFFactura(documento)
		{
			console.log("fPDFFactura documento: ");
			console.log(documento);

			$.post("../blank_generar_pdf_fe/index.php",{

				documento:documento

			},function(r){

				console.log("Data fPDFFactura: ");
				console.log(r)
				var obj = JSON.parse(r);

				if(obj.pdfcreado=="NO")
				{
					alertify.alert('Mensaje', 'No se puede generar el pdf de una factura no enviada.', function(){ });
				}
				if(obj.pdfcreado=="SI")
				{
					window.open('../blank_generar_pdf_fe/'+documento+'.pdf','PDF','fullscreen=yes');
				}
			});
		}
	
		function fFoliosRestantes()
		{
			$.post("../cFoliosFE/index.php",{ok:""},function(r){

				var obj = JSON.parse(r);

				if(!$.isEmptyObject(obj.foliosRestantes))
				{
					alert("Folios Restantes: "+obj.foliosRestantes);
				}
			});
		}
</script>
<?php

;

;
;
;
;
;
;
;
;
;
;
;
;

switch($this->sc_temp_gproveedor)
{
	case 'THE FACTORY HKA':
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "on";;
	    $this->nmgp_botoes["btn_enviarfe"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "on";;
	    $this->nmgp_botoes["btn_reenviar"] = "off";;
	 	$this->NM_cmp_hidden["pdf2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["pdf2"] = "off"; }
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["enviar_propio"] = "off"; }
	break;
	
	case 'CADENA S. A.':
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "on";;
	    $this->nmgp_botoes["btn_enviarfe"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "on";;
	    $this->nmgp_botoes["btn_reenviar"] = "off";;
	 	$this->NM_cmp_hidden["pdf2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["pdf2"] = "off"; }
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["enviar_propio"] = "off"; }
	break;
	case 'DATAICO':
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "off";;
	    $this->nmgp_botoes["btn_reenviar"] = "on";;
	 	$this->NM_cmp_hidden["pdf2"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["pdf2"] = "on"; }
		$this->NM_cmp_hidden["enviar_propio"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["enviar_propio"] = "off"; }
	break;
		
	case 'FACILWEB':
		$this->nmgp_botoes["btn_enviar_hka_tech"] = "off";;
		$this->nmgp_botoes["btn_pdf"] = "off";;
	    $this->nmgp_botoes["btn_reenviar"] = "off";;
	 	$this->NM_cmp_hidden["pdf2"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["pdf2"] = "off"; }
		$this->nmgp_botoes["btn_enviarfe"] = "off";;
		$this->NM_cmp_hidden["enviar_propio"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['php_cmp_sel']["enviar_propio"] = "on"; }
	break;
}

?>
<script>

	
function fEnviarPropio(idfacven)
{
	if(confirm('¿Desea Enviar el documento?'))
	{
		$.blockUI({ 
			message: 'Espere por favor...', 
			css: { 
				border: 'none', 
				padding: '15px', 
				backgroundColor: '#000', 
				'-webkit-border-radius': '10px', 
				'-moz-border-radius': '10px', 
				opacity: .5, 
				color: '#fff'
			}
		});
		
		var vvalidar_correo_enlinea = "<?php echo $vvalidar_correo_enlinea; ?>";
		
		if(vvalidar_correo_enlinea=="SI")
		{
			$.post("../blank_correo_reenvio_validador/index.php",{

				idfacven:idfacven

			},function(r){

				console.log(r);
				var em = JSON.parse(r);
				
				var email    = em.email;
				var validado = em.validado;
				
				if(validado=="NO")
				{
					if(!$.isEmptyObject(email))
					{
						$.get("../valida_email.php",{

							email:email

						},function(r2){

							console.log(r2);
							var obj = JSON.parse(r2);

							if(obj.error=="")
							{
								$.post("../blank_envio_propio_nc/index.php",{

									idfacven:idfacven,
									reason:obj.reason,
									json_valida_email:obj.json

									},function(r3){

									$.unblockUI();
									console.log(r3);

									if(r3=="Documento enviado con éxito!!!")
									{
										nm_gp_submit_ajax ('igual', 'breload');
									}
									else
									{
										if(confirm(r3))
										{
										   nm_gp_submit_ajax ('igual', 'breload');
										}
										else
										{
										   nm_gp_submit_ajax ('igual', 'breload');
										}
									}
								});
							}
							else
							{
								if(confirm(obj.error))
								{
								   nm_gp_submit_ajax ('igual', 'breload');
								}
								else
								{
								   nm_gp_submit_ajax ('igual', 'breload');
								}
							}
						});
					}
					else
					{
						alert("El cliente no tiene correo electrónico.");
					}
				}
				else
				{
					if(!$.isEmptyObject(email))
					{
						$.post("../blank_envio_propio_nc/index.php",{

							idfacven:idfacven,
							reason:'accepted_email',
							json_valida_email:''

							},function(r3){

							$.unblockUI();
							console.log(r3);

							if(r3=="Documento enviado con éxito!!!")
							{
								nm_gp_submit_ajax ('igual', 'breload');
							}
							else
							{
								if(confirm(r3))
								{
								   nm_gp_submit_ajax ('igual', 'breload');
								}
								else
								{
								   nm_gp_submit_ajax ('igual', 'breload');
								}
							}
						});
					}
					else
					{
						alert("El cliente no tiene correo electrónico...");
					}
				}
			});
		}
		else
		{
			$.post("../blank_envio_propio_nc/index.php",{

				idfacven:idfacven

				},function(r){

				$.unblockUI();
				console.log(r);

				if(r=="Documento enviado con éxito!!!")
				{
					nm_gp_submit_ajax ('igual', 'breload');
				}
				else
				{
					if(confirm(r))
					{
					   nm_gp_submit_ajax ('igual', 'breload');
					}
					else
					{
					   nm_gp_submit_ajax ('igual', 'breload');
					}
				}
			});
		}
	}
}
	
function fReenviarPropio(idfacven)
{

	$.post("../blank_correo_reenvio/index.php",{

		idfacven:idfacven

	},function(r){

		console.log(r);
		var correo = "";
		
		if(correo = prompt("Correo Electrónico",r))
		{
			if(correo == null || correo == "")
			{
			   alert("Debe digitar un correo.");
			}
			else
			{
				$.blockUI({ 
					message: 'Espere por favor...', 
					css: { 
						border: 'none', 
						padding: '15px', 
						backgroundColor: '#000', 
						'-webkit-border-radius': '10px', 
						'-moz-border-radius': '10px', 
						opacity: .5, 
						color: '#fff'
					}
				});
				
				$.post("../blank_correo_reenvio2/index.php",{

					idfacven:idfacven,
					correo:correo

				},function(r2){

					$.unblockUI();
					
					console.log(r2);
					alert(r2);
				});
			}
		}

	});
}
</script>
<?php
if (isset($this->sc_temp_gproveedor)) {$_SESSION['gproveedor'] = $this->sc_temp_gproveedor;}
$_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'] .= ".xml";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT num, idcli, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), motivo, total, pagada, asentada, idfacven, numfacven, credito, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT num, idcli, fechaven, motivo, total, pagada, asentada, idfacven, numfacven, credito, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT num, idcli, convert(char(23),fechaven,121), motivo, total, pagada, asentada, idfacven, numfacven, credito, convert(char(23),fechavenc,121), subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT num, idcli, fechaven, motivo, total, pagada, asentada, idfacven, numfacven, credito, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT num, idcli, EXTEND(fechaven, YEAR TO DAY), motivo, total, pagada, asentada, idfacven, numfacven, credito, EXTEND(fechavenc, YEAR TO DAY), subtotal, valoriva, LOTOFILE(observaciones, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, LOTOFILE(enlacepdf, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT num, idcli, fechaven, motivo, total, pagada, asentada, idfacven, numfacven, credito, fechavenc, subtotal, valoriva, observaciones, saldo, adicional, adicional2, adicional3, vendedor, pedido, resolucion, base_iva_19, valor_iva_19, base_iva_5, valor_iva_5, excento, tipo, id_fact, cufe, enlacepdf, estado from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      vendedor,     pedido,      resolucion,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as base_iva_19,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='19'),0) as valor_iva_19,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as base_iva_5,     coalesce((select sum(v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='5'),0) as valor_iva_5,     coalesce((select sum(v.valorpar-v.iva) from detalleventa v where v.numfac=idfacven and v.adicional='0'),0) as excento, tipo, id_fact,    cufe,    enlacepdf,     id_trans_fe,     estado,     concat((select r.prefijo from resdian r where r.Idres=f.resolucion limit 1),'/',f.numfacven) as num,     if(f.mot_nc is not null, f.mot_nc, f.mot_nd) as motivo FROM      facturaven f WHERE     numfacven!=0 and (tipo='ND' or tipo='NC') ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['order_grid'];
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
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<grid_NC_ND>\r\n";
         }
         else
         {
             $this->xml_registro = "<grid_NC_ND";
         }
         $this->num = $rs->fields[0] ;  
         $this->idcli = $rs->fields[1] ;  
         $this->idcli = (string)$this->idcli;
         $this->fechaven = $rs->fields[2] ;  
         $this->motivo = $rs->fields[3] ;  
         $this->total = $rs->fields[4] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->pagada = $rs->fields[5] ;  
         $this->asentada = $rs->fields[6] ;  
         $this->asentada = (string)$this->asentada;
         $this->idfacven = $rs->fields[7] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->numfacven = $rs->fields[8] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->credito = $rs->fields[9] ;  
         $this->credito = (string)$this->credito;
         $this->fechavenc = $rs->fields[10] ;  
         $this->subtotal = $rs->fields[11] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[12] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (string)$this->valoriva;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->observaciones = "";  
              if (is_file($rs_grid->fields[13])) 
              { 
                  $this->observaciones = file_get_contents($rs_grid->fields[13]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->observaciones = $this->Db->BlobDecode($rs->fields[13]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->observaciones = $this->Db->BlobDecode($rs->fields[13]) ;  
         } 
         else
         { 
             $this->observaciones = $rs->fields[13] ;  
         } 
         $this->saldo = $rs->fields[14] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[15] ;  
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[16] ;  
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[17] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->vendedor = $rs->fields[18] ;  
         $this->vendedor = (string)$this->vendedor;
         $this->pedido = $rs->fields[19] ;  
         $this->pedido = (string)$this->pedido;
         $this->resolucion = $rs->fields[20] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->base_iva_19 = $rs->fields[21] ;  
         $this->base_iva_19 =  str_replace(",", ".", $this->base_iva_19);
         $this->base_iva_19 = (string)$this->base_iva_19;
         $this->valor_iva_19 = $rs->fields[22] ;  
         $this->valor_iva_19 =  str_replace(",", ".", $this->valor_iva_19);
         $this->valor_iva_19 = (string)$this->valor_iva_19;
         $this->base_iva_5 = $rs->fields[23] ;  
         $this->base_iva_5 =  str_replace(",", ".", $this->base_iva_5);
         $this->base_iva_5 = (string)$this->base_iva_5;
         $this->valor_iva_5 = $rs->fields[24] ;  
         $this->valor_iva_5 =  str_replace(",", ".", $this->valor_iva_5);
         $this->valor_iva_5 = (string)$this->valor_iva_5;
         $this->excento = $rs->fields[25] ;  
         $this->excento =  str_replace(",", ".", $this->excento);
         $this->excento = (string)$this->excento;
         $this->tipo = $rs->fields[26] ;  
         $this->id_fact = $rs->fields[27] ;  
         $this->id_fact = (string)$this->id_fact;
         $this->cufe = $rs->fields[28] ;  
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->enlacepdf = "";  
              if (is_file($rs_grid->fields[29])) 
              { 
                  $this->enlacepdf = file_get_contents($rs_grid->fields[29]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->enlacepdf = $this->Db->BlobDecode($rs->fields[29]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->enlacepdf = $this->Db->BlobDecode($rs->fields[29]) ;  
         } 
         else
         { 
             $this->enlacepdf = $rs->fields[29] ;  
         } 
         $this->estado = $rs->fields[30] ;  
         $this->Orig_num = $this->num;
         $this->Orig_idcli = $this->idcli;
         $this->Orig_fechaven = $this->fechaven;
         $this->Orig_motivo = $this->motivo;
         $this->Orig_total = $this->total;
         $this->Orig_pagada = $this->pagada;
         $this->Orig_asentada = $this->asentada;
         $this->Orig_idfacven = $this->idfacven;
         $this->Orig_numfacven = $this->numfacven;
         $this->Orig_credito = $this->credito;
         $this->Orig_fechavenc = $this->fechavenc;
         $this->Orig_subtotal = $this->subtotal;
         $this->Orig_valoriva = $this->valoriva;
         $this->Orig_observaciones = $this->observaciones;
         $this->Orig_saldo = $this->saldo;
         $this->Orig_adicional = $this->adicional;
         $this->Orig_adicional2 = $this->adicional2;
         $this->Orig_adicional3 = $this->adicional3;
         $this->Orig_vendedor = $this->vendedor;
         $this->Orig_pedido = $this->pedido;
         $this->Orig_resolucion = $this->resolucion;
         $this->Orig_base_iva_19 = $this->base_iva_19;
         $this->Orig_valor_iva_19 = $this->valor_iva_19;
         $this->Orig_base_iva_5 = $this->base_iva_5;
         $this->Orig_valor_iva_5 = $this->valor_iva_5;
         $this->Orig_excento = $this->excento;
         $this->Orig_tipo = $this->tipo;
         $this->Orig_id_fact = $this->id_fact;
         $this->Orig_cufe = $this->cufe;
         $this->Orig_enlacepdf = $this->enlacepdf;
         $this->Orig_estado = $this->estado;
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         //----- lookup - motivo
         $this->look_motivo = $this->motivo; 
         $this->Lookup->lookup_motivo($this->look_motivo, $this->motivo) ; 
         $this->look_motivo = ($this->look_motivo == "&nbsp;") ? "" : $this->look_motivo; 
         //----- lookup - asentada
         $this->look_asentada = $this->asentada; 
         $this->Lookup->lookup_asentada($this->look_asentada); 
         $this->look_asentada = ($this->look_asentada == "&nbsp;") ? "" : $this->look_asentada; 
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - vendedor
         $this->look_vendedor = $this->vendedor; 
         $this->Lookup->lookup_vendedor($this->look_vendedor, $this->vendedor) ; 
         $this->look_vendedor = ($this->look_vendedor == "&nbsp;") ? "" : $this->look_vendedor; 
         //----- lookup - resolucion
         $this->look_resolucion = $this->resolucion; 
         $this->Lookup->lookup_resolucion($this->look_resolucion, $this->resolucion) ; 
         $this->look_resolucion = ($this->look_resolucion == "&nbsp;") ? "" : $this->look_resolucion; 
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'on';
if (!isset($_SESSION['gproveedor'])) {$_SESSION['gproveedor'] = "";}
if (!isset($this->sc_temp_gproveedor)) {$this->sc_temp_gproveedor = (isset($_SESSION['gproveedor'])) ? $_SESSION['gproveedor'] : "";}
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
$vnfe   = "";
$vpj_fe = "";

 
      $nm_select = "select concat(r.prefijo,f.numfacven),r.prefijo_fe from facturaven f inner join resdian r on f.resolucion=r.Idres where idfacven='".$this->idfacven  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vNPJ = array();
      $this->vnpj = array();
     if ($this->idfacven !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vNPJ[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vnpj[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vNPJ = false;
          $this->vNPJ_erro = $this->Db->ErrorMsg();
          $this->vnpj = false;
          $this->vnpj_erro = $this->Db->ErrorMsg();
      } 
     } 
;

if(isset($this->vnpj[0][0]))
{
	$vnfe   = $this->vnpj[0][0];
	$vpj_fe = $this->vnpj[0][1];
	
	if($vpj_fe=="SI")
	{
		$this->estadofe  = "<img src='../_lib/img/scriptcase__NM__ico__NM__selection_replace_32.png' onclick='fEstadoFE(\"".$vnfe."\");' />";
		$this->enviarfe  = "<img src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' onclick='fEnviarFE(\"".$this->idfacven ."\");' />";
		
		$this->pdf  = "<button onclick='fPDFFactura(\"".$vnfe."\");return false;'>PDF</button>";
		
		$file = "../blank_generar_pdf_fe/".$vnfe.".pdf";

		if (file_exists($file))
		{
			$this->pdf  = "<a href='".$file."' target='_blank' >PDF</a>";
		}

	}	
	else
	{
		$this->pdf  = "";
		$this->estadofe  = "";
		$this->enviarfe  = "";
	}
}
else
{
	$this->pdf    = "";
	$vnfe   = "";
	$vpj_fe = "";
	$this->estadofe  = "";
	$this->enviarfe  = "";
}
	
$sql = "select asentada from facturaven where numfacven='".$this->numfacven ."'";

 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiAsentada = array();
      $this->vsiasentada = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiAsentada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiasentada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiAsentada = false;
          $this->vSiAsentada_erro = $this->Db->ErrorMsg();
          $this->vsiasentada = false;
          $this->vsiasentada_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsiasentada[0][0])){
	
	if($this->vsiasentada[0][0]==1){
	
		$this->print ="<a href='../pdfreport_facturaven' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
	
		$this->sc_temp_par_numfacventa = $this->numfacven ;
		
	}else{
		
		$this->print ="<img onclick='alert(\"No se puede imprimir una factura sin asentar!\")' src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' />";
	}
	
}
if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
	
	switch($this->sc_temp_gproveedor)
	{
		case 'CADENA S. A.':
			$enviar_tech  = "<a onclick='fEnviarTech(\"".$this->idfacven ."\");' rel='Firmar el documento electrónico'><img style='cursor:pointer;width:32px;' src='../_lib/img/grp__NM__ico__NM__ico_firmar.png' /></a>";
		break;
		
		case 'FACILWEB':
			
			if(!empty($this->cufe ))
			{
				$this->enviar_propio  = "<a href='".$this->enlacepdf ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png'   id=pdf_".$this->idfacven ."' name='pdf_".$this->idfacven ."' /></a>";
				$this->reenviar  = "<a style='cursor:pointer;' onclick='fReenviarPropio(\"".$this->idfacven ."\");' title='Reenviar Al Correo'><img src='../_lib/img/scriptcase__NM__ico__NM__mail_forward_all_32.png' /></a>";
			}
			else
			{
				$this->enviar_propio  = "<a onclick='fEnviarPropio(\"".$this->idfacven ."\");' rel='Enviar el documento electrónico'><img style='cursor:pointer;width:32px;' src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' /></a>";
			}
		break;
	}
	
}
if($this->pagada =="SI")
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->pagada =="SI" and $this->asentada ==1)
{
	
	?>
	<script>
	function fImprimir(idfactura,idresolucion)
	{
		$.post("../frm_pos_impresion/index.php",{

			idfactura: idfactura,
			pj:idresolucion

		},function(r3){

			console.log("Log impresion: ");
			console.log(r3);
		
			var obj = JSON.parse(r3);
		
			if($.isEmptyObject(obj.rutaimpresora))
			{
				alert("No hay impresora configurada.");
			}

		});
	}
	</script>
	<?php

	
	$this->imprmirtirilla  = "<a href='../frm_pos_impresion_html/index.php?idfactura=".$this->idfacven ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__icon-recibo-32.png' /></a>";
	
}
else
{
	$this->imprmirtirilla  ="";
	
}

if($this->tipo =='NC' or $this->tipo =='ND')
	{
	$this->total =$this->total *-1;
	 
      $nm_select = "select r.prefijo, f.numfacven from facturaven f inner join resdian r on f.resolucion=r.Idres where idfacven='".$this->id_fact  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vFact = array();
      $this->vfact = array();
     if ($this->id_fact !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vFact[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vfact[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vFact = false;
          $this->vFact_erro = $this->Db->ErrorMsg();
          $this->vfact = false;
          $this->vfact_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->vfact[0][0]))
		{
		$vIdFac=$this->id_fact ;
		
		$this->factura =$this->vfact[0][0].'-'.$this->vfact[0][1];
		$vLafac=$this->factura ;
		$this->factura ="<a href='../frm_pos_impresion_html/index.php?idfactura=$vIdFac' target='_blank'>$vLafac</a>";
		}
	else
		{
		
		}
	}
else
	{
	}

if($this->sc_temp_gproveedor=="DATAICO")
{
	if(!empty($this->cufe ))
	{
		$this->pdf2  = "<a href='".$this->enlacepdf ."' target='_blank'><img src='../_lib/img/grp__NM__ico__NM__ico_pdf_32x32.png' /></a>";
	}
	else
	{
		$this->pdf2  = "";
	}
}

if($this->estado =='200' or $this->estado =='201')
{
	$this->NM_field_style["numfacven"] = "background-color:#33ff99;font-size:12px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_gproveedor)) {$_SESSION['gproveedor'] = $this->sc_temp_gproveedor;}
$_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</grid_NC_ND>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "grid_NC_ND_res_xml.class.php");
              $this->Res = new grid_NC_ND_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_file']['xml'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_file']['xml']);
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
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_file']['view'];
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- num
   function NM_export_num()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->num))
         {
             $this->num = sc_convert_encoding($this->num, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['num'])) ? $this->New_label['num'] : "Número"; 
         }
         else
         {
             $SC_Label = "num"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->num) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->num) . "\"";
         }
   }
   //----- idcli
   function NM_export_idcli()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_idcli))
         {
             $this->look_idcli = sc_convert_encoding($this->look_idcli, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
         }
         else
         {
             $SC_Label = "idcli"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_idcli) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_idcli) . "\"";
         }
   }
   //----- factura
   function NM_export_factura()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->factura))
         {
             $this->factura = sc_convert_encoding($this->factura, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura Afectada"; 
         }
         else
         {
             $SC_Label = "factura"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->factura) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->factura) . "\"";
         }
   }
   //----- fechaven
   function NM_export_fechaven()
   {
             $conteudo_x =  $this->fechaven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaven, "YYYY-MM-DD  ");
                 $this->fechaven = $this->nm_data->FormataSaida("d/m/y");
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
         }
         else
         {
             $SC_Label = "fechaven"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechaven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechaven) . "\"";
         }
   }
   //----- motivo
   function NM_export_motivo()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_motivo))
         {
             $this->look_motivo = sc_convert_encoding($this->look_motivo, "UTF-8", $_SESSION['scriptcase']['charset']);
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
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_motivo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_motivo) . "\"";
         }
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->total) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->total) . "\"";
         }
   }
   //----- pagada
   function NM_export_pagada()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pagada))
         {
             $this->pagada = sc_convert_encoding($this->pagada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
         }
         else
         {
             $SC_Label = "pagada"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pagada) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pagada) . "\"";
         }
   }
   //----- asentada
   function NM_export_asentada()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_asentada))
         {
             $this->look_asentada = sc_convert_encoding($this->look_asentada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
         }
         else
         {
             $SC_Label = "asentada"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_asentada) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_asentada) . "\"";
         }
   }
   //----- pdf2
   function NM_export_pdf2()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->pdf2))
         {
             $this->pdf2 = sc_convert_encoding($this->pdf2, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['pdf2'])) ? $this->New_label['pdf2'] : "PDF"; 
         }
         else
         {
             $SC_Label = "pdf2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pdf2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pdf2) . "\"";
         }
   }
   //----- enviar_propio
   function NM_export_enviar_propio()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->enviar_propio))
         {
             $this->enviar_propio = sc_convert_encoding($this->enviar_propio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['enviar_propio'])) ? $this->New_label['enviar_propio'] : "Enviar"; 
         }
         else
         {
             $SC_Label = "enviar_propio"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->enviar_propio) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->enviar_propio) . "\"";
         }
   }
   //----- reenviar
   function NM_export_reenviar()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->reenviar))
         {
             $this->reenviar = sc_convert_encoding($this->reenviar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['reenviar'])) ? $this->New_label['reenviar'] : "Reenviar"; 
         }
         else
         {
             $SC_Label = "reenviar"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->reenviar) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->reenviar) . "\"";
         }
   }
   //----- idfacven
   function NM_export_idfacven()
   {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
         }
         else
         {
             $SC_Label = "idfacven"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->idfacven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->idfacven) . "\"";
         }
   }
   //----- numfacven
   function NM_export_numfacven()
   {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "#"; 
         }
         else
         {
             $SC_Label = "numfacven"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->numfacven) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->numfacven) . "\"";
         }
   }
   //----- credito
   function NM_export_credito()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_credito))
         {
             $this->look_credito = sc_convert_encoding($this->look_credito, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Crédito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_credito) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_credito) . "\"";
         }
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida("m/d/y");
             } 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
         }
         else
         {
             $SC_Label = "fechavenc"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->fechavenc) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->fechavenc) . "\"";
         }
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
         }
         else
         {
             $SC_Label = "subtotal"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->subtotal) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->subtotal) . "\"";
         }
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "IVA"; 
         }
         else
         {
             $SC_Label = "valoriva"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valoriva) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valoriva) . "\"";
         }
   }
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtolower($this->observaciones); 
                 $this->observaciones = ucfirst($this->observaciones); 
             } 
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
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
         }
         else
         {
             $SC_Label = "saldo"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->saldo) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->saldo) . "\"";
         }
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
         }
         else
         {
             $SC_Label = "adicional"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->adicional) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->adicional) . "\"";
         }
   }
   //----- adicional2
   function NM_export_adicional2()
   {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
         }
         else
         {
             $SC_Label = "adicional2"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->adicional2) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->adicional2) . "\"";
         }
   }
   //----- adicional3
   function NM_export_adicional3()
   {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
         }
         else
         {
             $SC_Label = "adicional3"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->adicional3) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->adicional3) . "\"";
         }
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_vendedor))
         {
             $this->look_vendedor = sc_convert_encoding($this->look_vendedor, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
         }
         else
         {
             $SC_Label = "vendedor"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_vendedor) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_vendedor) . "\"";
         }
   }
   //----- pedido
   function NM_export_pedido()
   {
             nmgp_Form_Num_Val($this->pedido, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['pedido'])) ? $this->New_label['pedido'] : "Pedido"; 
         }
         else
         {
             $SC_Label = "pedido"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->pedido) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->pedido) . "\"";
         }
   }
   //----- resolucion
   function NM_export_resolucion()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->look_resolucion))
         {
             $this->look_resolucion = sc_convert_encoding($this->look_resolucion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "Prefijo"; 
         }
         else
         {
             $SC_Label = "resolucion"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->look_resolucion) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->look_resolucion) . "\"";
         }
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base Iva 19"; 
         }
         else
         {
             $SC_Label = "base_iva_19"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->base_iva_19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->base_iva_19) . "\"";
         }
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "Valor Iva 19"; 
         }
         else
         {
             $SC_Label = "valor_iva_19"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_iva_19) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_iva_19) . "\"";
         }
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base Iva 5"; 
         }
         else
         {
             $SC_Label = "base_iva_5"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->base_iva_5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->base_iva_5) . "\"";
         }
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "Valor Iva 5"; 
         }
         else
         {
             $SC_Label = "valor_iva_5"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->valor_iva_5) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->valor_iva_5) . "\"";
         }
   }
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Excento"; 
         }
         else
         {
             $SC_Label = "excento"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->excento) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->excento) . "\"";
         }
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->imprimir))
         {
             $this->imprimir = sc_convert_encoding($this->imprimir, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "imprimir"; 
         }
         else
         {
             $SC_Label = "imprimir"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->imprimir) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->imprimir) . "\"";
         }
   }
   //----- print
   function NM_export_print()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->print))
         {
             $this->print = sc_convert_encoding($this->print, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Xml_tag_label)
         {
             $SC_Label = (isset($this->New_label['print'])) ? $this->New_label['print'] : "print"; 
         }
         else
         {
             $SC_Label = "print"; 
         }
         $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->print) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->print) . "\"";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Notas Crédito/Débito :: XML</TITLE>
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
<form name="Fdown" method="get" action="grid_NC_ND_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_NC_ND"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['xml_return']); ?>"> 
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
function fEnviarDataico($vparametros, $vcliente, $vencabezado, $vdetalle,$vretenciones)
								{
$_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'on';
  
									$documento = array();
									$items = array();
									$numbering = array();
									$notes = array();
									$retentions = array();

									$documento['actions']['send_dian']  = $vparametros["send_dian"];
									$documento['actions']['send_email'] = $vparametros["send_email"];
									$documento['credit_note']['reason'] = 'ANULACION';

									if($vparametros["modo"] == 1)
									{	
									  $documento['credit_note']['env'] = 'PRUEBAS';
									}
									else
									{
									  $documento['credit_note']['env'] = 'PRODUCCION';
									}	

									$documento['credit_note']['dataico_account_id'] = $vparametros["dataico_account_id"];
									$documento['credit_note']['invoice_id'] = $vparametros["uuid"];



									$documento['credit_note']['issue_date']   = $vencabezado["fecha"];   
									$documento['credit_note']['number']       = $vencabezado["numero"];  

									$documento['credit_note']['payment_means_type'] = $vencabezado["forma_pago"];

									$documento['credit_note']['payment_means'] = $vencabezado["medio_pago"];

									if(!empty($vencabezado["observacion"]))
									{
										$documento['credit_note']['notes'] = array($vencabezado["observacion"]);
									}

									$numbering['resolution_number'] = $vencabezado["resolucion"];  
									$numbering['prefix'] = $vencabezado["prefijo"];	

									for($i=0;$i<count($vdetalle);$i++)
									{
										if(isset($vdetalle[$i]["tax_amount"]))
										{
											$impuestos = array( 
												"tax_amount" =>  $vdetalle[$i]["tax_amount"],
												"tax_category" =>  $vdetalle[$i]["tax_category"],
											);
										}
										else
										{
											$impuestos = array( 
												"tax_rate" =>  $vdetalle[$i]["tax_rate"],
												"tax_category" =>  $vdetalle[$i]["tax_category"],
											);
										}
										
										if(isset($vdetalle[$i]["mandante_identification"]))
										{
											$item = array(
												'sku' =>  $vdetalle[$i]["codigo"],
												'quantity' => $vdetalle[$i]["cantidad"] ,
												'description' => $vdetalle[$i]["descripcion"],
												'price' => $vdetalle[$i]["precio"],
												'original_price' => $vdetalle[$i]["precio"],
												'mandante_identification' => $vdetalle[$i]["mandante_identification"],
												'mandante_identification_type' => $vdetalle[$i]["mandante_identification_type"],
 												'taxes' => array($impuestos)
												);
										}
										else
										{
											$item = array(
												'sku' =>  $vdetalle[$i]["codigo"],
												'quantity' => $vdetalle[$i]["cantidad"] ,
												'description' => $vdetalle[$i]["descripcion"],
												'price' => $vdetalle[$i]["precio"],
												'original_price' => $vdetalle[$i]["precio"],
												'taxes' => array($impuestos)
												);
										}
										
										$items[$i] = $item;
									}

									if(count($vretenciones)>0)
									{
										$documento['credit_note']['retentions'] = $vretenciones; 
									}

									$documento['credit_note']['numbering'] = $numbering;
									$documento['credit_note']['customer']  = $vcliente;
									$documento['credit_note']['items']     = $items;

									$documento = json_encode($documento, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

									$vcufe = "";
									$venlace_pdf = "";
									$venlace_xml = "";
									$vqr_code = "";
									$vfechavalidacion = date("Y-m-d H:i:s");
									$vuuid = "";
									
									$opciones = array(
									  'http'=>array(
										'method'=>"GET",
										'header'=>"auth-token:".$vparametros["dataico_auth"]
									  )
									);

									$contexto = stream_context_create($opciones);
									$vurl_consulta = $vparametros["url"];
									$vurl_consulta .= "?number=".$vencabezado["prefijo"].$vencabezado["numero"];
									

									
									$vvalidacion = false;
									$vretorno    = "";
									$headers = array('auth-token:'.$vparametros["dataico_auth"],'Content-Type: application/json');

									$ch = curl_init($vurl_consulta);
									curl_setopt($ch, CURLOPT_POST, false);
									curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									$json = curl_exec($ch);
									if($json === false)
									{
										   echo 'Hubo un error al enviar la petición, inténtelo nuevamente.<br>' . curl_error($ch);
									}
									else
									{
										$vretorno = json_decode($json);
										if(isset($vretorno->errors))
										{
											$vvalidacion = true;
										}
									}
									curl_close($ch);
									
									if(isset($vretorno->credit_note->dian_status))
									{

										if($vretorno->credit_note->dian_status=="DIAN_ACEPTADO")
										{

										}

										if($vretorno->credit_note->dian_status=="DIAN_NO_ENVIADO")
										{

										}

										if(isset($vretorno->credit_note->cufe))
										{
											if(!empty($vretorno->credit_note->cufe))
											{
												$vcufe   = $vretorno->credit_note->cufe;
											}
										}

										if(isset($vretorno->credit_note->pdf_url))
										{
											if(!empty($vretorno->credit_note->pdf_url))
											{
												$venlace_pdf = stripslashes($vretorno->credit_note->pdf_url);
											}
										}

										if(isset($vretorno->credit_note->xml_url))
										{
											if(!empty($vretorno->credit_note->xml_url))
											{
												$venlace_xml = stripslashes($vretorno->credit_note->xml_url);
											}
										}

										if(isset($vretorno->credit_note->qrcode))
										{
											if(!empty($vretorno->credit_note->qrcode))
											{
												$vqr_code = "data:image/png;base64,".base64_encode($vretorno->credit_note->qrcode);
											}
										}

										if(isset($vretorno->credit_note->issue_date))
										{
											if(!empty($vretorno->credit_note->issue_date))
											{
												$vfechavalidacion  = $vencabezado["fecha_pago"];
											}
										}

										if(isset($vretorno->credit_note->uuid))
										{
											if(!empty($vretorno->credit_note->uuid))
											{
												$vuuid = $vretorno->credit_note->uuid;
											}
										}
									}
									else
									{

										$parms = array('data'  => $documento);
										$parms = http_build_query($parms);

										$response = sc_webservice("curl", $vparametros["url"] , 80, "POST", $documento, array(CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER=>false, CURLOPT_HTTPHEADER => array(
												'Content-Type: application/json', 'auth-token: ' . $vparametros["dataico_auth"]  ),), 30);

										$vrespuesta = json_decode($response);

										if(isset($vrespuesta->uuid))
										{
											if(!empty($vrespuesta->uuid))
											{
												$vuuid = $vrespuesta->uuid;
											}
										}

										if(isset($vrespuesta->cufe))
										{
											if(!empty($vrespuesta->cufe))
											{
												$vcufe = $vrespuesta->cufe;
											}
										}

										if(!empty($vcufe))
										{
											if(isset($vrespuesta->dian_status))
											{
												echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'>ESTADO DIAN: ".$vrespuesta->dian_status."</div>";
											}

											if(isset($vrespuesta->qrcode))
											{
												if(!empty($vrespuesta->qrcode))
												{
													$vqr_code = "data:image/png;base64,".base64_encode($vrespuesta->qrcode);
												}
											}

											if(isset($vrespuesta->xml_url))
											{
												if(!empty($vrespuesta->xml_url))
												{
													echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'><a href='".stripslashes($vrespuesta->xml_url)."' target='_blank' style='color:white;'>Ver XML</a></div>";

													$venlace_xml = $vrespuesta->xml_url;
												}
											}

											if(isset($vrespuesta->pdf_url))
											{
												if(!empty($vrespuesta->pdf_url))
												{
													echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'><a href='".stripslashes($vrespuesta->pdf_url)."' target='_blank' style='color:white;'>Ver PDF</a></div>";

													$venlace_pdf = $vrespuesta->pdf_url;
												}
											}

										}
										else
										{

											if(isset($vrespuesta->errors))
											{
												for($i=0;$i<count($vrespuesta->errors);$i++)
												{
													echo "<div style='margin-bottom:10px;border-radius:8px;color:white;background:#5877b9;padding:8px;'>".$vrespuesta->errors[$i]->error."</div>";
												}
											}
										}
									}

									return json_encode(array(

										"cufe"=>$vcufe,
										"enlace_xml"=>$venlace_xml,
										"enlace_pdf"=>$venlace_pdf,
										"qr"=>$vqr_code,
										"fecha_validacion"=>$vfechavalidacion,
										"uuid" => $vuuid
									));
								
$_SESSION['scriptcase']['grid_NC_ND']['contr_erro'] = 'off';
}
}

?>
