<?php

class grid_kardex_fv_tns_10062020_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $Csv_label;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Csv_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
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
                   nm_limpa_str_grid_kardex_fv_tns_10062020($cadapar[1]);
                   nm_protect_num_grid_kardex_fv_tns_10062020($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_kardex_fv_tns_10062020']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gprefijos)) 
      {
          $_SESSION['gprefijos'] = $gprefijos;
          nm_limpa_str_grid_kardex_fv_tns_10062020($_SESSION["gprefijos"]);
      }
      if (isset($gautotercero)) 
      {
          $_SESSION['gautotercero'] = $gautotercero;
          nm_limpa_str_grid_kardex_fv_tns_10062020($_SESSION["gautotercero"]);
      }
      if (isset($gfacturaonline)) 
      {
          $_SESSION['gfacturaonline'] = $gfacturaonline;
          nm_limpa_str_grid_kardex_fv_tns_10062020($_SESSION["gfacturaonline"]);
      }
      if (isset($gservidorfacturas)) 
      {
          $_SESSION['gservidorfacturas'] = $gservidorfacturas;
          nm_limpa_str_grid_kardex_fv_tns_10062020($_SESSION["gservidorfacturas"]);
      }
      if (isset($gidempresa)) 
      {
          $_SESSION['gidempresa'] = $gidempresa;
          nm_limpa_str_grid_kardex_fv_tns_10062020($_SESSION["gidempresa"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_kardex_fv_tns_10062020_total.class.php"); 
      $this->Tot      = new grid_kardex_fv_tns_10062020_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['tot_geral'][1];
      }
      $this->Csv_password = "";
      $this->Arquivo   = "sc_csv";
      $this->Arquivo  .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip   = $this->Arquivo . "_grid_kardex_fv_tns_10062020.zip";
      $this->Arquivo  .= "_grid_kardex_fv_tns_10062020";
      $this->Arquivo  .= ".csv";
      $this->Tit_doc   = "grid_kardex_fv_tns_10062020.csv";
      $this->Tit_zip   = "grid_kardex_fv_tns_10062020.zip";
      $this->Label_CSV = "N";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
      $this->Tem_csv_res = false;
      if (isset($_REQUEST['nm_delim_line']) && !empty($_REQUEST['nm_delim_line']))
      {
          $this->Delim_line = str_replace(array(1,2,3), array("\r\n","\r","\n"), $_REQUEST['nm_delim_line']);
      }
      if (isset($_REQUEST['nm_delim_col']) && !empty($_REQUEST['nm_delim_col']))
      {
          $this->Delim_col = str_replace(array(1,2,3,4,5), array(";",",","\	","#",""), $_REQUEST['nm_delim_col']);
      }
      if (isset($_REQUEST['nm_delim_dados']) && !empty($_REQUEST['nm_delim_dados']))
      {
          $this->Delim_dados = str_replace(array(1,2,3,4), array('"',"'","","|"), $_REQUEST['nm_delim_dados']);
      }
      if (isset($_REQUEST['nm_label_csv']) && !empty($_REQUEST['nm_label_csv']))
      {
          $this->Label_CSV = $_REQUEST['nm_label_csv'];
      }
          $this->Tem_csv_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_csv_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_csv_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['SC_Gb_Free_cmp']))
          {
              $this->Tem_csv_res  = false;
          }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_kardex_fv_tns_10062020']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_return']);
          if ($this->Tem_csv_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_kardex_fv_tns_10062020']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_kardex_fv_tns_10062020']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_kardex_fv_tns_10062020']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->codcomp = $Busca_temp['codcomp']; 
          $tmp_pos = strpos($this->codcomp, "##@@");
          if ($tmp_pos !== false && !is_array($this->codcomp))
          {
              $this->codcomp = substr($this->codcomp, 0, $tmp_pos);
          }
          $this->codprefijo = $Busca_temp['codprefijo']; 
          $tmp_pos = strpos($this->codprefijo, "##@@");
          if ($tmp_pos !== false && !is_array($this->codprefijo))
          {
              $this->codprefijo = substr($this->codprefijo, 0, $tmp_pos);
          }
          $this->numero = $Busca_temp['numero']; 
          $tmp_pos = strpos($this->numero, "##@@");
          if ($tmp_pos !== false && !is_array($this->numero))
          {
              $this->numero = substr($this->numero, 0, $tmp_pos);
          }
          $this->periodo = $Busca_temp['periodo']; 
          $tmp_pos = strpos($this->periodo, "##@@");
          if ($tmp_pos !== false && !is_array($this->periodo))
          {
              $this->periodo = substr($this->periodo, 0, $tmp_pos);
          }
          $this->fecha = $Busca_temp['fecha']; 
          $tmp_pos = strpos($this->fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->fecha))
          {
              $this->fecha = substr($this->fecha, 0, $tmp_pos);
          }
          $this->fecha_2 = $Busca_temp['fecha_input_2']; 
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['grid_kardex_fv_tns_10062020']['contr_erro'] = 'on';
 ?>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js/bootstrap/css', 'bootstrap.min.css'); ?>">
<script src="<?php echo sc_url_library('prj', 'js/bootstrap/js', 'bootstrap.min.js'); ?>"></script>

<script src="<?php echo sc_url_library('prj', 'js', 'jquery-ui.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery.blockUI.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'alertify.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/alertify.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/semantic.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'css/themes/bootstrap.min.css'); ?>">

<script>
	
$(document).ready(function(){
  
    
});
	
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

	function fEnviarFE(kardexid,cufe)
	{
		if($.isEmptyObject(cufe))
		{
			alertify.confirm('Confirme', '¿Desea enviar el documento?'
				,function(){ 
					
					function checkConnection() 
					{
						$.ajax({
							url: 'https://www.solucionesnavarro.net/fe/procesos.php',
							async: false,
							data: {'tag' : 'connection'}
						})
						.fail(function() { alert('No hay conexion a internet, intentelo nuevamente!!!'); })
						.done(function() { 
							
							$.post("../cEnviarFactura/index.php",{
								
								kardexid:kardexid

							},function(r){

								console.log(r);
								alertify.alert('Información',r, function(){ 
									
									var indicio = $("#SC_fast_search_top").val();
									if(!$.isEmptyObject(indicio))
									{
									   $("#SC_fast_search_top").val(indicio);
										nm_gp_submit_qsearch('top');
									}
									else
									{
										sc_btn_btn_recargar();
									}

								});
							});
						});
					}
					checkConnection();
				}		
				,function(){ 

				}
			);
		}
		else
		{
			alertify.confirm('Información', 'El documento ya fue enviado, ¿Desea consultar su estado?'
			,function()
			 { 
				fConsultarEstado(kardexid); 
			 }
			,function()
			 { 

			 });
		}
	}

	function fConsultarEstado(kardexid)
	{
		function checkConnection() {
			$.ajax({
				url: 'https://www.solucionesnavarro.net/fe/procesos.php',
				async: false,
				data: {'tag' : 'connection'}
			})
			.fail(function() { alert('No hay conexion a internet, intentelo nuevamente!!!'); })
			.done(function() { 

				$.post("../cConsultarEstado/index.php",{

					kardexid:kardexid

				},function(r){

					console.log(r);
					alertify.alert('Información',r, function(){ window.location='../grid_kardex_fv_tns/'; });

				});
			})
		}

		checkConnection();
	}

	function fPDFFactura(documento,tipo)
	{
		function checkConnection() {
			$.ajax({
				url: 'https://www.solucionesnavarro.net/fe/procesos.php',
				async: false,
				data: {'tag' : 'connection'}
			})
			.fail(function() { alert('No hay conexion a internet, intentelo nuevamente!!!'); })
			.done(function() { 

				console.log("fPDFFactura documento: ");
				console.log(documento);

				$.post("../blank_generar_pdf_fe/index.php",{

					documento:documento,
					tipo:tipo,
					codcomp:'FV'

				},function(r){

					console.log("Data fPDFFactura: ");
					console.log(r)

					if($.isEmptyObject(r))
					{
						if(tipo=='pdf')
						{
							window.open('../blank_generar_pdf_fe/'+documento+'.pdf','PDF','fullscreen=yes');
						}
						else
						{
							window.open('../blank_generar_pdf_fe/'+documento+'.xml','XML','fullscreen=yes');
						}   
					}
					else
					{
						alertify.alert('Información',r, function(){ });
					}
				});
			})
		}

		checkConnection();
	}

	function fFoliosRestantes()
	{
		$.post("../cFoliosFE/index.php",{ok:""},function(r){

			var obj = JSON.parse(r);

			if(!$.isEmptyObject(obj.foliosRestantes))
			{
				alertify.alert('Información',"Folios Restantes: "+obj.foliosRestantes, function(){ });
			}
		});
	}
</script>
<style>
	input{
		
		height:50px;
	}
</style>
<?php

$_SESSION['scriptcase']['grid_kardex_fv_tns_10062020']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'] .= ".csv";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Csv_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      if ($this->Label_CSV == "S")
      { 
          $this->NM_prim_col  = 0;
          $this->csv_registro = "";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['field_order'] as $Cada_col)
          { 
              $SC_Label = (isset($this->New_label['num'])) ? $this->New_label['num'] : "# TNS"; 
              if ($Cada_col == "num" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['enviar'])) ? $this->New_label['enviar'] : "ENVIAR"; 
              if ($Cada_col == "enviar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['fecha'])) ? $this->New_label['fecha'] : "FECHA"; 
              if ($Cada_col == "fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['numfe'])) ? $this->New_label['numfe'] : "DOC"; 
              if ($Cada_col == "numfe" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['nombre'])) ? $this->New_label['nombre'] : "NOMBRE"; 
              if ($Cada_col == "nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['email'])) ? $this->New_label['email'] : "EMAIL"; 
              if ($Cada_col == "email" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['ico_cliente'])) ? $this->New_label['ico_cliente'] : ""; 
              if ($Cada_col == "ico_cliente" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "TOTAL"; 
              if ($Cada_col == "total" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['detalle'])) ? $this->New_label['detalle'] : "DETALLE"; 
              if ($Cada_col == "detalle" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['pdf'])) ? $this->New_label['pdf'] : "PDF"; 
              if ($Cada_col == "pdf" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['avisos'])) ? $this->New_label['avisos'] : "XML"; 
              if ($Cada_col == "avisos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['adjuntos'])) ? $this->New_label['adjuntos'] : ""; 
              if ($Cada_col == "adjuntos" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : ""; 
              if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['kardexid'])) ? $this->New_label['kardexid'] : "ID"; 
              if ($Cada_col == "kardexid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
          } 
          $this->csv_registro .= $this->Delim_line;
          fwrite($csv_f, $this->csv_registro);
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      KARDEXID,     CODCOMP,     CODPREFIJO,     NUMERO,     FECHA,     FECASENTAD,     OBSERV,     PERIODO,     CENID,     AREADID,     SUCID,     CLIENTE,     VENDEDOR,     FORMAPAGO,     PLAZODIAS,     BCOID,     TIPODOC,     DOCUMENTO,     CONCEPTO,     FECVENCE,     RETIVA,     RETICA,     RETFTE,     AJUSTEBASE,     AJUSTEIVA,     AJUSTEIVAEXC,     AJUSTENETO,     VRBASE,     VRIVA,     VRICONSUMO,     VRRFTE,     VRRICA,     VRRIVA,     TOTAL,     DOCUID,     FPCONTADO,     FPCREDITO,     DESPACHAR_A,     USUARIO,     HORA,     FACTORCONV,     NROFACPROV,     VEHICULOID,     FECANULADO,     DESXCAMBIO,     DEVOLXCAMBIO,     TIPOICA2ID,     MONEDA,     NROCONTROL,     PRONTOPAGO,     MOTIVODEVID,     IMPRESA,     HORACREA,     PUNXVEN,     EXPORTACION,     ANTICIPO,     IMPORTADO,     HORACOMANDA,     FECEMI,     ANTICIPOADIC,     RECIBOID,     IMPNOTENT,     MOTIVOCIERRE,     CONTRATO,     VRIVAEXC,     PROPINA,     CONTRATOINMID,     CANTCLIENTES,     PERIODOFACT,     ANOFACT,     CONTRATOID,     APARTADO,     FECHAENT,     HORAENT,     ASENTANDO,     RETCREE,     VRRCREE,     TIPOCREEID,     NROCOMVEN,     NROFACTEQ,     PORCUTIAIU,     COMEXP,     FECRECLAMO,     MOTRECLAMO,     CHEQUEADO,     FACTREMPOST,     CAMBIODESPACHAR_A,     FECHACORTE,     '' AS DESCUENTO_TOTAL,     (SELECT T.NITTRI FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NIT_TERCERO,     (SELECT T.NOMBRE FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NOMBRE,     (SELECT P.PREIMP FROM PREFIJO P WHERE P.CODPREFIJO=K.CODPREFIJO) AS PJFE,     (CODCOMP||'/'||CODPREFIJO||'/'||NUMERO) AS NDOC,     K.SN_CONSECUTIVO,     (K.CODPREFIJO||''||CAST(K.NUMERO AS INT)) AS NUM FROM      KARDEX K WHERE      CODCOMP IN ('FV') AND FECASENTAD IS NOT NULL AND FECANULADO IS NULL AND CODPREFIJO IN(" . $_SESSION['gprefijos'] . ") ) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT NUM, FECHA, NOMBRE, TOTAL, KARDEXID, CODCOMP, CODPREFIJO, NUMERO, PERIODO, FORMAPAGO, FECVENCE, HORACREA, NIT_TERCERO, CLIENTE, NDOC from (SELECT      KARDEXID,     CODCOMP,     CODPREFIJO,     NUMERO,     FECHA,     FECASENTAD,     OBSERV,     PERIODO,     CENID,     AREADID,     SUCID,     CLIENTE,     VENDEDOR,     FORMAPAGO,     PLAZODIAS,     BCOID,     TIPODOC,     DOCUMENTO,     CONCEPTO,     FECVENCE,     RETIVA,     RETICA,     RETFTE,     AJUSTEBASE,     AJUSTEIVA,     AJUSTEIVAEXC,     AJUSTENETO,     VRBASE,     VRIVA,     VRICONSUMO,     VRRFTE,     VRRICA,     VRRIVA,     TOTAL,     DOCUID,     FPCONTADO,     FPCREDITO,     DESPACHAR_A,     USUARIO,     HORA,     FACTORCONV,     NROFACPROV,     VEHICULOID,     FECANULADO,     DESXCAMBIO,     DEVOLXCAMBIO,     TIPOICA2ID,     MONEDA,     NROCONTROL,     PRONTOPAGO,     MOTIVODEVID,     IMPRESA,     HORACREA,     PUNXVEN,     EXPORTACION,     ANTICIPO,     IMPORTADO,     HORACOMANDA,     FECEMI,     ANTICIPOADIC,     RECIBOID,     IMPNOTENT,     MOTIVOCIERRE,     CONTRATO,     VRIVAEXC,     PROPINA,     CONTRATOINMID,     CANTCLIENTES,     PERIODOFACT,     ANOFACT,     CONTRATOID,     APARTADO,     FECHAENT,     HORAENT,     ASENTANDO,     RETCREE,     VRRCREE,     TIPOCREEID,     NROCOMVEN,     NROFACTEQ,     PORCUTIAIU,     COMEXP,     FECRECLAMO,     MOTRECLAMO,     CHEQUEADO,     FACTREMPOST,     CAMBIODESPACHAR_A,     FECHACORTE,     '' AS DESCUENTO_TOTAL,     (SELECT T.NITTRI FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NIT_TERCERO,     (SELECT T.NOMBRE FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NOMBRE,     (SELECT P.PREIMP FROM PREFIJO P WHERE P.CODPREFIJO=K.CODPREFIJO) AS PJFE,     (CODCOMP||'/'||CODPREFIJO||'/'||NUMERO) AS NDOC,     K.SN_CONSECUTIVO,     (K.CODPREFIJO||''||CAST(K.NUMERO AS INT)) AS NUM FROM      KARDEX K WHERE      CODCOMP IN ('FV') AND FECASENTAD IS NOT NULL AND FECANULADO IS NULL AND CODPREFIJO IN(" . $_SESSION['gprefijos'] . ") ) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT NUM, FECHA, NOMBRE, TOTAL, KARDEXID, CODCOMP, CODPREFIJO, NUMERO, PERIODO, FORMAPAGO, FECVENCE, HORACREA, NIT_TERCERO, CLIENTE, NDOC from (SELECT      KARDEXID,     CODCOMP,     CODPREFIJO,     NUMERO,     FECHA,     FECASENTAD,     OBSERV,     PERIODO,     CENID,     AREADID,     SUCID,     CLIENTE,     VENDEDOR,     FORMAPAGO,     PLAZODIAS,     BCOID,     TIPODOC,     DOCUMENTO,     CONCEPTO,     FECVENCE,     RETIVA,     RETICA,     RETFTE,     AJUSTEBASE,     AJUSTEIVA,     AJUSTEIVAEXC,     AJUSTENETO,     VRBASE,     VRIVA,     VRICONSUMO,     VRRFTE,     VRRICA,     VRRIVA,     TOTAL,     DOCUID,     FPCONTADO,     FPCREDITO,     DESPACHAR_A,     USUARIO,     HORA,     FACTORCONV,     NROFACPROV,     VEHICULOID,     FECANULADO,     DESXCAMBIO,     DEVOLXCAMBIO,     TIPOICA2ID,     MONEDA,     NROCONTROL,     PRONTOPAGO,     MOTIVODEVID,     IMPRESA,     HORACREA,     PUNXVEN,     EXPORTACION,     ANTICIPO,     IMPORTADO,     HORACOMANDA,     FECEMI,     ANTICIPOADIC,     RECIBOID,     IMPNOTENT,     MOTIVOCIERRE,     CONTRATO,     VRIVAEXC,     PROPINA,     CONTRATOINMID,     CANTCLIENTES,     PERIODOFACT,     ANOFACT,     CONTRATOID,     APARTADO,     FECHAENT,     HORAENT,     ASENTANDO,     RETCREE,     VRRCREE,     TIPOCREEID,     NROCOMVEN,     NROFACTEQ,     PORCUTIAIU,     COMEXP,     FECRECLAMO,     MOTRECLAMO,     CHEQUEADO,     FACTREMPOST,     CAMBIODESPACHAR_A,     FECHACORTE,     '' AS DESCUENTO_TOTAL,     (SELECT T.NITTRI FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NIT_TERCERO,     (SELECT T.NOMBRE FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NOMBRE,     (SELECT P.PREIMP FROM PREFIJO P WHERE P.CODPREFIJO=K.CODPREFIJO) AS PJFE,     (CODCOMP||'/'||CODPREFIJO||'/'||NUMERO) AS NDOC,     K.SN_CONSECUTIVO,     (K.CODPREFIJO||''||CAST(K.NUMERO AS INT)) AS NUM FROM      KARDEX K WHERE      CODCOMP IN ('FV') AND FECASENTAD IS NOT NULL AND FECANULADO IS NULL AND CODPREFIJO IN(" . $_SESSION['gprefijos'] . ") ) nm_sel_esp"; 
      } 
      else 
      { 
          $nmgp_select = "SELECT NUM, FECHA, NOMBRE, TOTAL, KARDEXID, CODCOMP, CODPREFIJO, NUMERO, PERIODO, FORMAPAGO, FECVENCE, HORACREA, NIT_TERCERO, CLIENTE, NDOC from (SELECT      KARDEXID,     CODCOMP,     CODPREFIJO,     NUMERO,     FECHA,     FECASENTAD,     OBSERV,     PERIODO,     CENID,     AREADID,     SUCID,     CLIENTE,     VENDEDOR,     FORMAPAGO,     PLAZODIAS,     BCOID,     TIPODOC,     DOCUMENTO,     CONCEPTO,     FECVENCE,     RETIVA,     RETICA,     RETFTE,     AJUSTEBASE,     AJUSTEIVA,     AJUSTEIVAEXC,     AJUSTENETO,     VRBASE,     VRIVA,     VRICONSUMO,     VRRFTE,     VRRICA,     VRRIVA,     TOTAL,     DOCUID,     FPCONTADO,     FPCREDITO,     DESPACHAR_A,     USUARIO,     HORA,     FACTORCONV,     NROFACPROV,     VEHICULOID,     FECANULADO,     DESXCAMBIO,     DEVOLXCAMBIO,     TIPOICA2ID,     MONEDA,     NROCONTROL,     PRONTOPAGO,     MOTIVODEVID,     IMPRESA,     HORACREA,     PUNXVEN,     EXPORTACION,     ANTICIPO,     IMPORTADO,     HORACOMANDA,     FECEMI,     ANTICIPOADIC,     RECIBOID,     IMPNOTENT,     MOTIVOCIERRE,     CONTRATO,     VRIVAEXC,     PROPINA,     CONTRATOINMID,     CANTCLIENTES,     PERIODOFACT,     ANOFACT,     CONTRATOID,     APARTADO,     FECHAENT,     HORAENT,     ASENTANDO,     RETCREE,     VRRCREE,     TIPOCREEID,     NROCOMVEN,     NROFACTEQ,     PORCUTIAIU,     COMEXP,     FECRECLAMO,     MOTRECLAMO,     CHEQUEADO,     FACTREMPOST,     CAMBIODESPACHAR_A,     FECHACORTE,     '' AS DESCUENTO_TOTAL,     (SELECT T.NITTRI FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NIT_TERCERO,     (SELECT T.NOMBRE FROM TERCEROS T WHERE T.TERID=K.CLIENTE) AS NOMBRE,     (SELECT P.PREIMP FROM PREFIJO P WHERE P.CODPREFIJO=K.CODPREFIJO) AS PJFE,     (CODCOMP||'/'||CODPREFIJO||'/'||NUMERO) AS NDOC,     K.SN_CONSECUTIVO,     (K.CODPREFIJO||''||CAST(K.NUMERO AS INT)) AS NUM FROM      KARDEX K WHERE      CODCOMP IN ('FV') AND FECASENTAD IS NOT NULL AND FECANULADO IS NULL AND CODPREFIJO IN(" . $_SESSION['gprefijos'] . ") ) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['order_grid'];
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
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->num = $rs->fields[0] ;  
         $this->fecha = $rs->fields[1] ;  
         $this->nombre = $rs->fields[2] ;  
         $this->total = $rs->fields[3] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (string)$this->total;
         $this->kardexid = $rs->fields[4] ;  
         $this->kardexid = (string)$this->kardexid;
         $this->codcomp = $rs->fields[5] ;  
         $this->codprefijo = $rs->fields[6] ;  
         $this->numero = $rs->fields[7] ;  
         $this->periodo = $rs->fields[8] ;  
         $this->formapago = $rs->fields[9] ;  
         $this->fecvence = $rs->fields[10] ;  
         $this->horacrea = $rs->fields[11] ;  
         $this->nit_tercero = $rs->fields[12] ;  
         $this->cliente = $rs->fields[13] ;  
         $this->cliente = (string)$this->cliente;
         $this->ndoc = $rs->fields[14] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_kardex_fv_tns_10062020']['contr_erro'] = 'on';
if (!isset($_SESSION['gservidorfacturas'])) {$_SESSION['gservidorfacturas'] = "";}
if (!isset($this->sc_temp_gservidorfacturas)) {$this->sc_temp_gservidorfacturas = (isset($_SESSION['gservidorfacturas'])) ? $_SESSION['gservidorfacturas'] : "";}
if (!isset($_SESSION['gfacturaonline'])) {$_SESSION['gfacturaonline'] = "";}
if (!isset($this->sc_temp_gfacturaonline)) {$this->sc_temp_gfacturaonline = (isset($_SESSION['gfacturaonline'])) ? $_SESSION['gfacturaonline'] : "";}
if (!isset($_SESSION['gidempresa'])) {$_SESSION['gidempresa'] = "";}
if (!isset($this->sc_temp_gidempresa)) {$this->sc_temp_gidempresa = (isset($_SESSION['gidempresa'])) ? $_SESSION['gidempresa'] : "";}
if (!isset($_SESSION['gautotercero'])) {$_SESSION['gautotercero'] = "";}
if (!isset($this->sc_temp_gautotercero)) {$this->sc_temp_gautotercero = (isset($_SESSION['gautotercero'])) ? $_SESSION['gautotercero'] : "";}
 ;
;
;
;
;
;

$this->numero  = intval($this->numero );

$vfecha  = $this->fecha ;
$vfecha  = substr($vfecha, 0, 9);
$vfecha  = date_create($vfecha);
$vfecha  = date_format($vfecha,'Y-m-d');

$vsql = "update cloud_kardex set fecha_factura='".$vfecha."' where tipo='FV' and prefijo='".$this->codprefijo ."' and numero='".$this->numero ."'and fecha_factura='0000-00-00'";

     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;


$vcufe = "";

$this->ico_cliente  = "<img src='../_lib/img/scriptcase__NM__ico__NM__user_information_32.png' style='width:30px;'/>";


$vdoc = $this->nit_tercero ;
$vsql = "select documento from cloud_terceros where documento='".$vdoc."'";
 
      $nm_select = $vsql; 
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
	$this->NM_field_style["ico_cliente"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
else
{
	if($this->sc_temp_gautotercero=='SI')
	{
		
		$vdoc = $this->nit_tercero ;
		$vnom = $this->nombre ;
		$vsql = "insert into cloud_terceros set documento='".$vdoc."',nombres='".$vnom."',id_empresa='".$this->sc_temp_gidempresa."',cod_postal='540001',cod_regimen='49',detalle_tributario='ZY',responsabilidades_fiscales='R-99-PN',cod_departamento='54'";

		
     $nm_select = $vsql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Ini->nm_db_conn_mysql->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Ini->nm_db_conn_mysql->ErrorMsg());
             exit;
         }
         $rf->Close();
      ;
	}
}

$vsql = "select if((select w.modo from cloud_webservicefe w where w.id_empresa='".$this->sc_temp_gidempresa."')='DESARROLLO',prefijo_prueba,prefijo) as prefijo from cloud_prefijos where tipo='FV' and cod_prefijo='".$this->codprefijo ."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vPJFE = array();
      $this->vpjfe = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vPJFE[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vpjfe[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vPJFE = false;
          $this->vPJFE_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vpjfe = false;
          $this->vpjfe_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vpjfe[0][0]))
{
	$this->pj_fe  = $this->vpjfe[0][0];
}
else
{
	$this->pj_fe  = "";
}

$vsql = "select cufe,enlace_pdf from cloud_kardex where tipo='FV' and prefijo='".$this->codprefijo ."' and numero='".$this->numero ."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEnviada = array();
      $this->vsienviada = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEnviada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsienviada[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEnviada = false;
          $this->vSiEnviada_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vsienviada = false;
          $this->vsienviada_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;

if(isset($this->vsienviada[0][0]))
{
	$vcufe = $this->vsienviada[0][0];
		
	if(!empty($vcufe))
	{
		$vsql_si_nc = "select concat(tipo,'/',prefijo,'/',numero) as numero from cloud_kardex where fac_devuelta='".$this->codcomp ."/".$this->codprefijo ."/".$this->numero ."'";
		
		$this->vSiNC = "";
		 
      $nm_select = $vsql_si_nc; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiNC = array();
      $this->vsinc = array();
      if ($SCrx = $this->Ini->nm_db_conn_mysql->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiNC[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsinc[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiNC = false;
          $this->vSiNC_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
          $this->vsinc = false;
          $this->vsinc_erro = $this->Ini->nm_db_conn_mysql->ErrorMsg();
      } 
;
		if(isset($this->vsinc[0][0]))
		{
			$this->NM_field_style["numfe"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
			$this->numero_dv  = $this->vsinc[0][0];
		}
		else
		{
			$this->numero_dv  = "";
		}
		
		$this->NM_field_style["codcomp"] = "background-color:#ff9900;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		$this->NM_field_style["enviar"] = "background-color:#ff9900;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
		
		$this->qr  = $this->vsienviada[0][0];
		
		$vnfe = $this->pj_fe .$this->numero ;
		$venlace_pdf = $this->vsienviada[0][1];
		
		if($this->sc_temp_gfacturaonline=="SI" and !empty($this->sc_temp_gservidorfacturas))
		{
			$this->pdf  = "<a href='".$this->sc_temp_gservidorfacturas."?idempresa=".$this->sc_temp_gidempresa."&id=".$this->kardexid ."' target='_blank' ><img src='../_lib/img/grp__NM__ico__NM__fwc_ico_pdf.png' style='width:30px;cursor:pointer;' /></a>";
		}
		else
		{
			$this->pdf  = "<img src='../_lib/img/grp__NM__ico__NM__fwc_ico_pdf.png' style='width:30px;cursor:pointer;' onclick='fPDFFactura(\"".$vnfe."\",\"pdf\");return false;' />";
		}
		
		$this->avisos  = "<img src='../_lib/img/scriptcase__NM__ico__NM__code_line_32.png' style='width:30px;cursor:pointer;' onclick='fPDFFactura(\"".$vnfe."\",\"xml\");return false;'/>";
		
		$file = "../blank_generar_pdf_fe/".$vnfe.".pdf";

		if (file_exists($file))
		{
			$this->pdf  = "<a href='".$file."' target='_blank' ><img src='../_lib/img/grp__NM__ico__NM__fwc_ico_pdf.png' style='width:30px;'/></a>";
		}
		
		$file = "../blank_generar_pdf_fe/".$vnfe.".xml";

		if (file_exists($file))
		{
			$vruta_file = $_SERVER["DOCUMENT_ROOT"].'/xmls/'.$vnfe.'.xml';
			if(!file_exists($vruta_file))
			{
				copy($file,$vruta_file);
			}
			
			$this->avisos  = "<a href='".$file."' target='_blank' ><img src='../_lib/img/scriptcase__NM__ico__NM__code_line_32.png' style='width:30px;'/></a>";
		}
		
		$this->enviar  = "<img style='cursor:pointer;' src='../_lib/img/scriptcase__NM__ico__NM__mail_information_32.png' onclick='fEnviarFE(\"".$this->kardexid ."\",\"".$vcufe."\");' />";
		
	}
	else
	{
		$this->enviar  = "<img style='cursor:pointer;' src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' onclick='fEnviarFE(\"".$this->kardexid ."\",\"".$vcufe."\");' />";
		
		$vnfe = $this->pj_fe .$this->numero ;
		
		if($this->sc_temp_gfacturaonline=="SI" and !empty($this->sc_temp_gservidorfacturas))
		{
			$this->pdf  = "<a href='".$this->sc_temp_gservidorfacturas."?idempresa=".$this->sc_temp_gidempresa."&id=".$this->kardexid ."' target='_blank' ><img src='../_lib/img/grp__NM__ico__NM__fwc_ico_pdf.png' style='width:30px;cursor:pointer;' /></a>";
		}
		else
		{
			$this->pdf  = "<img src='../_lib/img/grp__NM__ico__NM__fwc_ico_pdf.png' style='width:30px;cursor:pointer;' onclick='fPDFFactura(\"".$vnfe."\",\"pdf\");return false;' />";
		}
		
		$this->avisos  = "<img src='../_lib/img/scriptcase__NM__ico__NM__code_line_32.png' style='width:30px;cursor:pointer;' onclick='fPDFFactura(\"".$vnfe."\",\"xml\");return false;'/>";
	}
}
else
{
	$this->enviar  = "<img style='cursor:pointer;' src='../_lib/img/scriptcase__NM__ico__NM__server_mail_download_32.png' onclick='fEnviarFE(\"".$this->kardexid ."\",\"".$vcufe."\");' />";
	
	$vnfe    = $this->pj_fe .$this->numero ;
	$this->pdf     = "";
	$this->avisos  = "";
	
}

$this->numfe  = $this->pj_fe ."/".$this->numero ;

$vsql = "select email from terceros where nit='".$this->nit_tercero ."' or nittri='".$this->nit_tercero ."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vEmail = array();
      $this->vemail = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vEmail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vemail[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vEmail = false;
          $this->vEmail_erro = $this->Db->ErrorMsg();
          $this->vemail = false;
          $this->vemail_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vemail[0][0]))
{
	$this->email  = $this->vemail[0][0];
}
else
{
	$this->email  = "";
}
if (isset($this->sc_temp_gautotercero)) {$_SESSION['gautotercero'] = $this->sc_temp_gautotercero;}
if (isset($this->sc_temp_gidempresa)) {$_SESSION['gidempresa'] = $this->sc_temp_gidempresa;}
if (isset($this->sc_temp_gfacturaonline)) {$_SESSION['gfacturaonline'] = $this->sc_temp_gfacturaonline;}
if (isset($this->sc_temp_gservidorfacturas)) {$_SESSION['gservidorfacturas'] = $this->sc_temp_gservidorfacturas;}
$_SESSION['scriptcase']['grid_kardex_fv_tns_10062020']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);
      if ($this->Tem_csv_res)
      { 
          if (!$this->Ini->sc_export_ajax) {
              $this->PB_dif = intval ($this->PB_dif / 2);
              $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
              $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
              $this->pb->addSteps($this->PB_dif);
          }
          require_once($this->Ini->path_aplicacao . "grid_kardex_fv_tns_10062020_res_csv.class.php");
          $this->Res = new grid_kardex_fv_tns_10062020_res_csv();
          $this->prep_modulos("Res");
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_res_grid'] = true;
          $this->Res->monta_csv();
      } 
      if (!$this->Ini->sc_export_ajax) {
          $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->addSteps($this->PB_dif);
      }
      if ($this->Csv_password != "" || $this->Tem_csv_res)
      { 
          $str_zip    = "";
          $Parm_pass  = ($this->Csv_password != "") ? " -p" : "";
          $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input  = (FALSE !== strpos($this->Csv_f, ' ')) ? " \"" . $this->Csv_f . "\"" :  $this->Csv_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
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
                $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
              $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
          if ($this->Tem_csv_res)
          { 
              $str_zip    = "";
              $Arq_res    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_res_file'];
              $Arq_input  = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_res_file']);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- num
   function NM_export_num()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->num);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- enviar
   function NM_export_enviar()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->enviar);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
                 $this->fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa"));
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->fecha);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- numfe
   function NM_export_numfe()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->numfe);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- nombre
   function NM_export_nombre()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->nombre);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- email
   function NM_export_email()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->email);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- ico_cliente
   function NM_export_ico_cliente()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->ico_cliente);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- total
   function NM_export_total()
   {
             nmgp_Form_Num_Val($this->total, ",", ",", "0", "S", "2", "$", "V:1:4", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->total);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- detalle
   function NM_export_detalle()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->detalle);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- pdf
   function NM_export_pdf()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->pdf);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- avisos
   function NM_export_avisos()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->avisos);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- adjuntos
   function NM_export_adjuntos()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->adjuntos);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->sc_field_0);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- kardexid
   function NM_export_kardexid()
   {
             nmgp_Form_Num_Val($this->kardexid, "", "", "0", "S", "2", "", "N:1", "-") ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->kardexid);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Facturas TNS :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
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
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fdown" method="get" action="grid_kardex_fv_tns_10062020_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_kardex_fv_tns_10062020"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_kardex_fv_tns_10062020']['csv_return']); ?>"> 
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
