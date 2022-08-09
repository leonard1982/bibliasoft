<?php

class grid_NC_ND_rtf
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
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_NC_ND']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_NC_ND";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_NC_ND.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['num'])) ? $this->New_label['num'] : "Número"; 
          if ($Cada_col == "num" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
          if ($Cada_col == "idcli" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['factura'])) ? $this->New_label['factura'] : "Factura Afectada"; 
          if ($Cada_col == "factura" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
          if ($Cada_col == "fechaven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['motivo'])) ? $this->New_label['motivo'] : "Motivo"; 
          if ($Cada_col == "motivo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
          if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['pdf2'])) ? $this->New_label['pdf2'] : "PDF"; 
          if ($Cada_col == "pdf2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['enviar_propio'])) ? $this->New_label['enviar_propio'] : "Enviar"; 
          if ($Cada_col == "enviar_propio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['reenviar'])) ? $this->New_label['reenviar'] : "Reenviar"; 
          if ($Cada_col == "reenviar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
          if ($Cada_col == "idfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "#"; 
          if ($Cada_col == "numfacven" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Crédito"; 
          if ($Cada_col == "credito" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
          if ($Cada_col == "fechavenc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "SubTotal"; 
          if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "IVA"; 
          if ($Cada_col == "valoriva" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
          if ($Cada_col == "saldo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
          if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
          if ($Cada_col == "adicional2" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
          if ($Cada_col == "adicional3" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
          if ($Cada_col == "vendedor" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pedido'])) ? $this->New_label['pedido'] : "Pedido"; 
          if ($Cada_col == "pedido" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "Prefijo"; 
          if ($Cada_col == "resolucion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_19'])) ? $this->New_label['base_iva_19'] : "Base Iva 19"; 
          if ($Cada_col == "base_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_19'])) ? $this->New_label['valor_iva_19'] : "Valor Iva 19"; 
          if ($Cada_col == "valor_iva_19" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['base_iva_5'])) ? $this->New_label['base_iva_5'] : "Base Iva 5"; 
          if ($Cada_col == "base_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['valor_iva_5'])) ? $this->New_label['valor_iva_5'] : "Valor Iva 5"; 
          if ($Cada_col == "valor_iva_5" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['excento'])) ? $this->New_label['excento'] : "Excento"; 
          if ($Cada_col == "excento" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "imprimir"; 
          if ($Cada_col == "imprimir" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['print'])) ? $this->New_label['print'] : "print"; 
          if ($Cada_col == "print" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
				$this->reenviar  = "<a style='cursor:pointer;' onclick='fReenviarPropio(\"".$this->idfacven ."\");' title='Reenviar Al Correo'><img src='../_lib/img/grp__NM__ico__NM__ico_enviando_32x32.png' /></a>";
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
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
         $this->num = html_entity_decode($this->num, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->num = strip_tags($this->num);
         $this->num = NM_charset_to_utf8($this->num);
         $this->num = str_replace('<', '&lt;', $this->num);
         $this->num = str_replace('>', '&gt;', $this->num);
         $this->Texto_tag .= "<td>" . $this->num . "</td>\r\n";
   }
   //----- idcli
   function NM_export_idcli()
   {
         $this->look_idcli = html_entity_decode($this->look_idcli, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_idcli = strip_tags($this->look_idcli);
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         $this->look_idcli = str_replace('<', '&lt;', $this->look_idcli);
         $this->look_idcli = str_replace('>', '&gt;', $this->look_idcli);
         $this->Texto_tag .= "<td>" . $this->look_idcli . "</td>\r\n";
   }
   //----- factura
   function NM_export_factura()
   {
         $this->factura = html_entity_decode($this->factura, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->factura = strip_tags($this->factura);
         $this->factura = NM_charset_to_utf8($this->factura);
         $this->factura = str_replace('<', '&lt;', $this->factura);
         $this->factura = str_replace('>', '&gt;', $this->factura);
         $this->Texto_tag .= "<td>" . $this->factura . "</td>\r\n";
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
         $this->fechaven = NM_charset_to_utf8($this->fechaven);
         $this->fechaven = str_replace('<', '&lt;', $this->fechaven);
         $this->fechaven = str_replace('>', '&gt;', $this->fechaven);
         $this->Texto_tag .= "<td>" . $this->fechaven . "</td>\r\n";
   }
   //----- motivo
   function NM_export_motivo()
   {
         $this->look_motivo = html_entity_decode($this->look_motivo, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_motivo = strip_tags($this->look_motivo);
         $this->look_motivo = NM_charset_to_utf8($this->look_motivo);
         $this->look_motivo = str_replace('<', '&lt;', $this->look_motivo);
         $this->look_motivo = str_replace('>', '&gt;', $this->look_motivo);
         $this->Texto_tag .= "<td>" . $this->look_motivo . "</td>\r\n";
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->total = NM_charset_to_utf8($this->total);
         $this->total = str_replace('<', '&lt;', $this->total);
         $this->total = str_replace('>', '&gt;', $this->total);
         $this->Texto_tag .= "<td>" . $this->total . "</td>\r\n";
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
         $this->look_asentada = NM_charset_to_utf8($this->look_asentada);
         $this->look_asentada = str_replace('<', '&lt;', $this->look_asentada);
         $this->look_asentada = str_replace('>', '&gt;', $this->look_asentada);
         $this->Texto_tag .= "<td>" . $this->look_asentada . "</td>\r\n";
   }
   //----- pdf2
   function NM_export_pdf2()
   {
         $this->pdf2 = html_entity_decode($this->pdf2, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pdf2 = strip_tags($this->pdf2);
         $this->pdf2 = NM_charset_to_utf8($this->pdf2);
         $this->pdf2 = str_replace('<', '&lt;', $this->pdf2);
         $this->pdf2 = str_replace('>', '&gt;', $this->pdf2);
         $this->Texto_tag .= "<td>" . $this->pdf2 . "</td>\r\n";
   }
   //----- enviar_propio
   function NM_export_enviar_propio()
   {
         $this->enviar_propio = html_entity_decode($this->enviar_propio, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->enviar_propio = strip_tags($this->enviar_propio);
         $this->enviar_propio = NM_charset_to_utf8($this->enviar_propio);
         $this->enviar_propio = str_replace('<', '&lt;', $this->enviar_propio);
         $this->enviar_propio = str_replace('>', '&gt;', $this->enviar_propio);
         $this->Texto_tag .= "<td>" . $this->enviar_propio . "</td>\r\n";
   }
   //----- reenviar
   function NM_export_reenviar()
   {
         $this->reenviar = html_entity_decode($this->reenviar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->reenviar = strip_tags($this->reenviar);
         $this->reenviar = NM_charset_to_utf8($this->reenviar);
         $this->reenviar = str_replace('<', '&lt;', $this->reenviar);
         $this->reenviar = str_replace('>', '&gt;', $this->reenviar);
         $this->Texto_tag .= "<td>" . $this->reenviar . "</td>\r\n";
   }
   //----- idfacven
   function NM_export_idfacven()
   {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->idfacven = NM_charset_to_utf8($this->idfacven);
         $this->idfacven = str_replace('<', '&lt;', $this->idfacven);
         $this->idfacven = str_replace('>', '&gt;', $this->idfacven);
         $this->Texto_tag .= "<td>" . $this->idfacven . "</td>\r\n";
   }
   //----- numfacven
   function NM_export_numfacven()
   {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->numfacven = NM_charset_to_utf8($this->numfacven);
         $this->numfacven = str_replace('<', '&lt;', $this->numfacven);
         $this->numfacven = str_replace('>', '&gt;', $this->numfacven);
         $this->Texto_tag .= "<td>" . $this->numfacven . "</td>\r\n";
   }
   //----- credito
   function NM_export_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         $this->look_credito = str_replace('<', '&lt;', $this->look_credito);
         $this->look_credito = str_replace('>', '&gt;', $this->look_credito);
         $this->Texto_tag .= "<td>" . $this->look_credito . "</td>\r\n";
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
         $this->fechavenc = NM_charset_to_utf8($this->fechavenc);
         $this->fechavenc = str_replace('<', '&lt;', $this->fechavenc);
         $this->fechavenc = str_replace('>', '&gt;', $this->fechavenc);
         $this->Texto_tag .= "<td>" . $this->fechavenc . "</td>\r\n";
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->subtotal = NM_charset_to_utf8($this->subtotal);
         $this->subtotal = str_replace('<', '&lt;', $this->subtotal);
         $this->subtotal = str_replace('>', '&gt;', $this->subtotal);
         $this->Texto_tag .= "<td>" . $this->subtotal . "</td>\r\n";
   }
   //----- valoriva
   function NM_export_valoriva()
   {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valoriva = NM_charset_to_utf8($this->valoriva);
         $this->valoriva = str_replace('<', '&lt;', $this->valoriva);
         $this->valoriva = str_replace('>', '&gt;', $this->valoriva);
         $this->Texto_tag .= "<td>" . $this->valoriva . "</td>\r\n";
   }
   //----- observaciones
   function NM_export_observaciones()
   {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones = sc_strtolower($this->observaciones); 
                 $this->observaciones = ucfirst($this->observaciones); 
             } 
         $this->observaciones = html_entity_decode($this->observaciones, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->observaciones = strip_tags($this->observaciones);
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         $this->observaciones = str_replace('<', '&lt;', $this->observaciones);
         $this->observaciones = str_replace('>', '&gt;', $this->observaciones);
         $this->Texto_tag .= "<td>" . $this->observaciones . "</td>\r\n";
   }
   //----- saldo
   function NM_export_saldo()
   {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->saldo = NM_charset_to_utf8($this->saldo);
         $this->saldo = str_replace('<', '&lt;', $this->saldo);
         $this->saldo = str_replace('>', '&gt;', $this->saldo);
         $this->Texto_tag .= "<td>" . $this->saldo . "</td>\r\n";
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional = NM_charset_to_utf8($this->adicional);
         $this->adicional = str_replace('<', '&lt;', $this->adicional);
         $this->adicional = str_replace('>', '&gt;', $this->adicional);
         $this->Texto_tag .= "<td>" . $this->adicional . "</td>\r\n";
   }
   //----- adicional2
   function NM_export_adicional2()
   {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional2 = NM_charset_to_utf8($this->adicional2);
         $this->adicional2 = str_replace('<', '&lt;', $this->adicional2);
         $this->adicional2 = str_replace('>', '&gt;', $this->adicional2);
         $this->Texto_tag .= "<td>" . $this->adicional2 . "</td>\r\n";
   }
   //----- adicional3
   function NM_export_adicional3()
   {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->adicional3 = NM_charset_to_utf8($this->adicional3);
         $this->adicional3 = str_replace('<', '&lt;', $this->adicional3);
         $this->adicional3 = str_replace('>', '&gt;', $this->adicional3);
         $this->Texto_tag .= "<td>" . $this->adicional3 . "</td>\r\n";
   }
   //----- vendedor
   function NM_export_vendedor()
   {
         $this->look_vendedor = html_entity_decode($this->look_vendedor, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_vendedor = strip_tags($this->look_vendedor);
         $this->look_vendedor = NM_charset_to_utf8($this->look_vendedor);
         $this->look_vendedor = str_replace('<', '&lt;', $this->look_vendedor);
         $this->look_vendedor = str_replace('>', '&gt;', $this->look_vendedor);
         $this->Texto_tag .= "<td>" . $this->look_vendedor . "</td>\r\n";
   }
   //----- pedido
   function NM_export_pedido()
   {
             nmgp_Form_Num_Val($this->pedido, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pedido = NM_charset_to_utf8($this->pedido);
         $this->pedido = str_replace('<', '&lt;', $this->pedido);
         $this->pedido = str_replace('>', '&gt;', $this->pedido);
         $this->Texto_tag .= "<td>" . $this->pedido . "</td>\r\n";
   }
   //----- resolucion
   function NM_export_resolucion()
   {
         $this->look_resolucion = html_entity_decode($this->look_resolucion, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_resolucion = strip_tags($this->look_resolucion);
         $this->look_resolucion = NM_charset_to_utf8($this->look_resolucion);
         $this->look_resolucion = str_replace('<', '&lt;', $this->look_resolucion);
         $this->look_resolucion = str_replace('>', '&gt;', $this->look_resolucion);
         $this->Texto_tag .= "<td>" . $this->look_resolucion . "</td>\r\n";
   }
   //----- base_iva_19
   function NM_export_base_iva_19()
   {
             nmgp_Form_Num_Val($this->base_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base_iva_19 = NM_charset_to_utf8($this->base_iva_19);
         $this->base_iva_19 = str_replace('<', '&lt;', $this->base_iva_19);
         $this->base_iva_19 = str_replace('>', '&gt;', $this->base_iva_19);
         $this->Texto_tag .= "<td>" . $this->base_iva_19 . "</td>\r\n";
   }
   //----- valor_iva_19
   function NM_export_valor_iva_19()
   {
             nmgp_Form_Num_Val($this->valor_iva_19, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_iva_19 = NM_charset_to_utf8($this->valor_iva_19);
         $this->valor_iva_19 = str_replace('<', '&lt;', $this->valor_iva_19);
         $this->valor_iva_19 = str_replace('>', '&gt;', $this->valor_iva_19);
         $this->Texto_tag .= "<td>" . $this->valor_iva_19 . "</td>\r\n";
   }
   //----- base_iva_5
   function NM_export_base_iva_5()
   {
             nmgp_Form_Num_Val($this->base_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->base_iva_5 = NM_charset_to_utf8($this->base_iva_5);
         $this->base_iva_5 = str_replace('<', '&lt;', $this->base_iva_5);
         $this->base_iva_5 = str_replace('>', '&gt;', $this->base_iva_5);
         $this->Texto_tag .= "<td>" . $this->base_iva_5 . "</td>\r\n";
   }
   //----- valor_iva_5
   function NM_export_valor_iva_5()
   {
             nmgp_Form_Num_Val($this->valor_iva_5, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->valor_iva_5 = NM_charset_to_utf8($this->valor_iva_5);
         $this->valor_iva_5 = str_replace('<', '&lt;', $this->valor_iva_5);
         $this->valor_iva_5 = str_replace('>', '&gt;', $this->valor_iva_5);
         $this->Texto_tag .= "<td>" . $this->valor_iva_5 . "</td>\r\n";
   }
   //----- excento
   function NM_export_excento()
   {
             nmgp_Form_Num_Val($this->excento, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->excento = NM_charset_to_utf8($this->excento);
         $this->excento = str_replace('<', '&lt;', $this->excento);
         $this->excento = str_replace('>', '&gt;', $this->excento);
         $this->Texto_tag .= "<td>" . $this->excento . "</td>\r\n";
   }
   //----- imprimir
   function NM_export_imprimir()
   {
         $this->imprimir = NM_charset_to_utf8($this->imprimir);
         $this->imprimir = str_replace('<', '&lt;', $this->imprimir);
         $this->imprimir = str_replace('>', '&gt;', $this->imprimir);
         $this->Texto_tag .= "<td>" . $this->imprimir . "</td>\r\n";
   }
   //----- print
   function NM_export_print()
   {
         $this->print = html_entity_decode($this->print, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->print = strip_tags($this->print);
         $this->print = NM_charset_to_utf8($this->print);
         $this->print = str_replace('<', '&lt;', $this->print);
         $this->print = str_replace('>', '&gt;', $this->print);
         $this->Texto_tag .= "<td>" . $this->print . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_NC_ND'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Notas Crédito/Débito :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_NC_ND_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_NC_ND"> 
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
