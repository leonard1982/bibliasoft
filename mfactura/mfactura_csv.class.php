<?php

class mfactura_csv
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
                   nm_limpa_str_mfactura($cadapar[1]);
                   nm_protect_num_mfactura($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['mfactura']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($gidfacven)) 
      {
          $_SESSION['gidfacven'] = $gidfacven;
          nm_limpa_str_mfactura($_SESSION["gidfacven"]);
      }
      if (isset($gruta_logo)) 
      {
          $_SESSION['gruta_logo'] = $gruta_logo;
          nm_limpa_str_mfactura($_SESSION["gruta_logo"]);
      }
      if (isset($gruta_qr)) 
      {
          $_SESSION['gruta_qr'] = $gruta_qr;
          nm_limpa_str_mfactura($_SESSION["gruta_qr"]);
      }
      if (isset($gbd_seleccionada)) 
      {
          $_SESSION['gbd_seleccionada'] = $gbd_seleccionada;
          nm_limpa_str_mfactura($_SESSION["gbd_seleccionada"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "mfactura_total.class.php"); 
      $this->Tot      = new mfactura_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['tot_geral'][1];
      }
      $this->Csv_password = "";
      $this->Arquivo   = "sc_csv";
      $this->Arquivo  .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip   = $this->Arquivo . "_mfactura.zip";
      $this->Arquivo  .= "_mfactura";
      $this->Arquivo  .= ".csv";
      $this->Tit_doc   = "mfactura.csv";
      $this->Tit_zip   = "mfactura.zip";
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_csv_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['SC_Gb_Free_cmp']))
          {
              $this->Tem_csv_res  = false;
          }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['mfactura']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_return']);
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['mfactura']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['mfactura']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['mfactura']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['mfactura']['contr_erro'] = 'on';
if (!isset($_SESSION['gruta_qr'])) {$_SESSION['gruta_qr'] = "";}
if (!isset($this->sc_temp_gruta_qr)) {$this->sc_temp_gruta_qr = (isset($_SESSION['gruta_qr'])) ? $_SESSION['gruta_qr'] : "";}
if (!isset($_SESSION['gidfacven'])) {$_SESSION['gidfacven'] = "";}
if (!isset($this->sc_temp_gidfacven)) {$this->sc_temp_gidfacven = (isset($_SESSION['gidfacven'])) ? $_SESSION['gidfacven'] : "";}
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
if (!isset($_SESSION['gruta_logo'])) {$_SESSION['gruta_logo'] = "";}
if (!isset($this->sc_temp_gruta_logo)) {$this->sc_temp_gruta_logo = (isset($_SESSION['gruta_logo'])) ? $_SESSION['gruta_logo'] : "";}
 ?>
<style>
.scGridHeader{
	
	display:none !important;
}
#sc_grid_body{
	padding:0px !important;
}
</style>
<?php

$vsql = "select if(de.ruta_logo is not null and de.ruta_logo<>'',de.ruta_logo,'') from datosemp de where de.iddatos='1'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vRutaL = array();
      $this->vrutal = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vRutaL[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vrutal[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vRutaL = false;
          $this->vRutaL_erro = $this->Db->ErrorMsg();
          $this->vrutal = false;
          $this->vrutal_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vrutal[0][0]))
{
	if(!empty($this->vrutal[0][0]))
	{
		$this->sc_temp_gruta_logo = "<img src='../_lib/file/img/logos/".$this->sc_temp_gbd_seleccionada."/".$this->vrutal[0][0]."' />";
	}
}

$vsql = "select concat(r.prefijo,'-',f.numfacven) as numero,f.qr_base64 from facturaven f inner join resdian r on f.resolucion=r.Idres where f.idfacven='".$this->sc_temp_gidfacven."'";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vqq = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vqq[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vqq = false;
          $this->vqq_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vqq[0][0]))
{
	sc_include_library ("prj", "factura", "php/qr/qrlib.php", true, true);

	$vnfactura= $this->vqq[0][0];
	$vruta    = getcwd();
	if (!file_exists($vruta.'/qr'))
	{
		chdir('../');
		$vruta = getcwd();
	}
	$vrutaqr  = $vruta.'/qr/'.$vnfactura.'.png';
	$vrutaqr2 = $vruta.'/qr';
	$vqr      = $this->vqq[0][1];
	
	if(file_exists($vrutaqr2))
	{
		QRcode::png($vqr,$vrutaqr,QR_ECLEVEL_H,12,5);

		$path = $vrutaqr;

		$type = pathinfo($path, PATHINFO_EXTENSION);

		if(file_exists($vrutaqr))
		{
			$data = file_get_contents($path);

			$base64 = 'data:image/' .$type.';base64,'.base64_encode($data);
			$vqr    = $base64;
			
			$this->sc_temp_gruta_qr = "<img src='../qr/".$vnfactura.".png' />";
		}
	}
	else
	{
		if(!file_exists($vrutaqr2))
		{
			mkdir($vrutaqr2, 0777, true);
		}
	}

	chdir('mfactura');
}
if (isset($this->sc_temp_gruta_logo)) {$_SESSION['gruta_logo'] = $this->sc_temp_gruta_logo;}
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
if (isset($this->sc_temp_gidfacven)) {$_SESSION['gidfacven'] = $this->sc_temp_gidfacven;}
if (isset($this->sc_temp_gruta_qr)) {$_SESSION['gruta_qr'] = $this->sc_temp_gruta_qr;}
$_SESSION['scriptcase']['mfactura']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'] .= ".csv";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_name']);
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
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['field_order'] as $Cada_col)
          { 
              $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
              if ($Cada_col == "codigobar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Descripción"; 
              if ($Cada_col == "nompro" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['cantidad'])) ? $this->New_label['cantidad'] : "Cantidad"; 
              if ($Cada_col == "cantidad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['bodega'])) ? $this->New_label['bodega'] : "Bodega"; 
              if ($Cada_col == "bodega" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valorunit'])) ? $this->New_label['valorunit'] : "V/Unitario"; 
              if ($Cada_col == "valorunit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "IVA"; 
              if ($Cada_col == "adicional" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['valorpar'])) ? $this->New_label['valorpar'] : "Total Línea"; 
              if ($Cada_col == "valorpar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $nmgp_select_count = "SELECT count(*) AS countTest from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), num, nombres, direccion, tel_cel, urlmail, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, fechaven, num, nombres, direccion, tel_cel, urlmail, fechavenc, formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, convert(char(23),fechaven,121), num, nombres, direccion, tel_cel, urlmail, convert(char(23),fechavenc,121), formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, fechaven, num, nombres, direccion, tel_cel, urlmail, fechavenc, formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, EXTEND(fechaven, YEAR TO DAY), num, nombres, direccion, tel_cel, urlmail, EXTEND(fechavenc, YEAR TO DAY), formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT codigobar, nompro, cantidad, bodega, valorunit, adicional, valorpar, fechaven, num, nombres, direccion, tel_cel, urlmail, fechavenc, formapago, cufe, validacion, faeleventa, fe, razonemp, nitemp, diremp, telemp, correemp, regimen from (select  f.idfacven, f.fechaven, concat(r.prefijo,'/',f.numfacven) as num, t.documento, t.nombres, t.direccion, t.tel_cel, t.urlmail, p.codigobar, p.nompro, d.cantidad, d.valorunit, d.valorpar, b.bodega, d.adicional, f.fechavenc, if(f.credito=2,'CONTADO','CREDITO') as formapago, if(f.cufe is not null and trim(f.cufe)<>'',concat('CUFE: ',f.cufe),'') as cufe, if(f.cufe is not null and trim(f.cufe)<>'',f.fecha_validacion,'') as validacion, if(f.cufe is not null and trim(f.cufe)<>'','Representación Gráfica de Factura Electrónica de Venta','') as faeleventa, if(f.cufe is not null and trim(f.cufe)<>'','FACTURA ELECTRÓNICA DE VENTA','FACTURA DE VENTA') as fe, (select de.razonsoc from datosemp de where de.iddatos='1') as razonemp, (select if(de.dv is not null and de.dv<>'',concat(de.nit,'-',de.dv),de.nit) as nit from datosemp de where de.iddatos='1') as nitemp, (select concat(de.direccion,' - ',de.ciudad) from datosemp de where de.iddatos='1') as diremp, (select de.telefono from datosemp de where de.iddatos='1') as telemp, (select de.correo from datosemp de where de.iddatos='1') as correemp,  (select if(de.regimen=0,'No Responsable de IVA','Responsable de IVA') from datosemp de where de.iddatos='1') as regimen, d.iva as impuesto from facturaven f  inner join detalleventa d on d.numfac=f.idfacven inner join terceros t on f.idcli=t.idtercero inner join resdian r on f.resolucion=r.Idres inner join productos p on d.idpro=p.idprod inner join bodegas b on d.idbod=b.idbodega where f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['order_grid'];
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
         $this->codigobar = $rs->fields[0] ;  
         $this->nompro = $rs->fields[1] ;  
         $this->cantidad = $rs->fields[2] ;  
         $this->cantidad =  str_replace(",", ".", $this->cantidad);
         $this->cantidad = (string)$this->cantidad;
         $this->bodega = $rs->fields[3] ;  
         $this->valorunit = $rs->fields[4] ;  
         $this->valorunit =  str_replace(",", ".", $this->valorunit);
         $this->valorunit = (string)$this->valorunit;
         $this->adicional = $rs->fields[5] ;  
         $this->adicional =  str_replace(",", ".", $this->adicional);
         $this->adicional = (string)$this->adicional;
         $this->valorpar = $rs->fields[6] ;  
         $this->valorpar =  str_replace(",", ".", $this->valorpar);
         $this->valorpar = (string)$this->valorpar;
         $this->fechaven = $rs->fields[7] ;  
         $this->num = $rs->fields[8] ;  
         $this->nombres = $rs->fields[9] ;  
         $this->direccion = $rs->fields[10] ;  
         $this->tel_cel = $rs->fields[11] ;  
         $this->urlmail = $rs->fields[12] ;  
         $this->fechavenc = $rs->fields[13] ;  
         $this->formapago = $rs->fields[14] ;  
         $this->cufe = $rs->fields[15] ;  
         $this->validacion = $rs->fields[16] ;  
         $this->faeleventa = $rs->fields[17] ;  
         $this->fe = $rs->fields[18] ;  
         $this->razonemp = $rs->fields[19] ;  
         $this->nitemp = $rs->fields[20] ;  
         $this->diremp = $rs->fields[21] ;  
         $this->telemp = $rs->fields[22] ;  
         $this->correemp = $rs->fields[23] ;  
         $this->regimen = $rs->fields[24] ;  
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['field_order'] as $Cada_col)
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
          require_once($this->Ini->path_aplicacao . "mfactura_res_csv.class.php");
          $this->Res = new mfactura_res_csv();
          $this->prep_modulos("Res");
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_res_grid'] = true;
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
              $Arq_res    = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_res_file'];
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
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_res_file']);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- codigobar
   function NM_export_codigobar()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->codigobar);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- nompro
   function NM_export_nompro()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->nompro);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- cantidad
   function NM_export_cantidad()
   {
             nmgp_Form_Num_Val($this->cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->cantidad);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- bodega
   function NM_export_bodega()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->bodega);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valorunit
   function NM_export_valorunit()
   {
             nmgp_Form_Num_Val($this->valorunit, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valorunit);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- adicional
   function NM_export_adicional()
   {
             nmgp_Form_Num_Val($this->adicional, ",", ",", "0", "S", "2", "%", "V:3:3", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->adicional);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- valorpar
   function NM_export_valorpar()
   {
             nmgp_Form_Num_Val($this->valorpar, ",", ",", "0", "S", "2", "$", "V:3:12", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->valorpar);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['mfactura'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Factura :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="mfactura_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="mfactura"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['mfactura']['csv_return']); ?>"> 
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
