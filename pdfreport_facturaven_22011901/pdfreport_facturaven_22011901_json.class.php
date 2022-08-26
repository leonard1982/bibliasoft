<?php

class pdfreport_facturaven_22011901_json
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'])
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['opcao'] = "";
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
                   nm_limpa_str_pdfreport_facturaven_22011901($cadapar[1]);
                   nm_protect_num_pdfreport_facturaven_22011901($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['pdfreport_facturaven_22011901']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($nit)) 
      {
          $_SESSION['nit'] = $nit;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["nit"]);
      }
      if (isset($par_numfacventa)) 
      {
          $_SESSION['par_numfacventa'] = $par_numfacventa;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["par_numfacventa"]);
      }
      if (isset($gconsolidaritems)) 
      {
          $_SESSION['gconsolidaritems'] = $gconsolidaritems;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["gconsolidaritems"]);
      }
      if (isset($gconsolidararticulos)) 
      {
          $_SESSION['gconsolidararticulos'] = $gconsolidararticulos;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["gconsolidararticulos"]);
      }
      if (isset($eliva)) 
      {
          $_SESSION['eliva'] = $eliva;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["eliva"]);
      }
      if (isset($subt)) 
      {
          $_SESSION['subt'] = $subt;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["subt"]);
      }
      if (isset($empresa)) 
      {
          $_SESSION['empresa'] = $empresa;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["empresa"]);
      }
      if (isset($direccion)) 
      {
          $_SESSION['direccion'] = $direccion;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["direccion"]);
      }
      if (isset($tele)) 
      {
          $_SESSION['tele'] = $tele;
          nm_limpa_str_pdfreport_facturaven_22011901($_SESSION["tele"]);
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "pdfreport_facturaven_22011901/pdfreport_facturaven_22011901_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_facturaven_22011901']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_return']);
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
      $this->Arq_zip      = $this->Arquivo . "_pdfreport_facturaven_22011901.zip";
      $this->Arquivo     .= "_pdfreport_facturaven_22011901";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "pdfreport_facturaven_22011901.json";
      $this->Tit_zip      = "pdfreport_facturaven_22011901.zip";
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
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->adicional3 = $Busca_temp['adicional3']; 
          $tmp_pos = strpos($this->adicional3, "##@@");
          if ($tmp_pos !== false && !is_array($this->adicional3))
          {
              $this->adicional3 = substr($this->adicional3, 0, $tmp_pos);
          }
          $this->adicional3_2 = $Busca_temp['adicional3_input_2']; 
          $this->idfacven = $Busca_temp['idfacven']; 
          $tmp_pos = strpos($this->idfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->idfacven))
          {
              $this->idfacven = substr($this->idfacven, 0, $tmp_pos);
          }
          $this->idfacven_2 = $Busca_temp['idfacven_input_2']; 
          $this->numfacven = $Busca_temp['numfacven']; 
          $tmp_pos = strpos($this->numfacven, "##@@");
          if ($tmp_pos !== false && !is_array($this->numfacven))
          {
              $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
          }
          $this->numfacven_2 = $Busca_temp['numfacven_input_2']; 
          $this->credito = $Busca_temp['credito']; 
          $tmp_pos = strpos($this->credito, "##@@");
          if ($tmp_pos !== false && !is_array($this->credito))
          {
              $this->credito = substr($this->credito, 0, $tmp_pos);
          }
          $this->credito_2 = $Busca_temp['credito_input_2']; 
          $this->fechaven = $Busca_temp['fechaven']; 
          $tmp_pos = strpos($this->fechaven, "##@@");
          if ($tmp_pos !== false && !is_array($this->fechaven))
          {
              $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
          }
          $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
      } 
      $this->nm_where_dinamico = "";
      $_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['gconsolidararticulos'])) {$_SESSION['gconsolidararticulos'] = "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($_SESSION['gconsolidaritems'])) {$_SESSION['gconsolidaritems'] = "";}
if (!isset($this->sc_temp_gconsolidaritems)) {$this->sc_temp_gconsolidaritems = (isset($_SESSION['gconsolidaritems'])) ? $_SESSION['gconsolidaritems'] : "";}
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  $this->sc_temp_gconsolidaritems = "";


if(!empty($this->sc_temp_par_numfacventa)){
	
	if($this->sc_temp_gconsolidararticulos=="S"){
	
		$this->sc_temp_gconsolidaritems = "   		
							 SELECT
							fl.idpro,
							sum(fl.cantidad) as cantidad,
							p.codigobar, 
							if(fl.obs <> '',fl.obs,p.nompro) as nompro, 
							fl.unidadmayor, 
							fl.factor,
							if(fl.unidadmayor='NO' and fl.factor>0, p.unimen, p.unimay) as unidad,
							((round(((fl.valorunit-fl.descuento)/(round((fl.adicional/100),2)+1)),2))) as valorunita,   
							(((round(((fl.valorunit-fl.descuento)/(round((fl.adicional/100),2)+1)),2)))*sum(fl.cantidad)) as parcial,
							fl.iva, 
							fl.adicional
							FROM 
							detalleventa fl
							left join productos p on  fl.idpro=p.idprod
							where
							fl.numfac='".$this->sc_temp_par_numfacventa."' and fl.cantidad > 0
							GROUP BY fl.idpro,fl.valorunit
							 ";

	}else{

		$this->sc_temp_gconsolidaritems = "   		
								SELECT
								fl.idpro,
								fl.cantidad as cantidad,
								p.codigobar, 
								if(fl.obs <> '',fl.obs,p.nompro) as nompro, 
								fl.unidadmayor, 
								fl.factor,
								if(fl.unidadmayor='NO' and fl.factor>0, p.unimen, p.unimay) as unidad,
								((round(((fl.valorunit-fl.descuento)/(round((fl.adicional/100),2)+1)),2))) as valorunita,   
								(((round(((fl.valorunit-fl.descuento)/(round((fl.adicional/100),2)+1)),2)))*fl.cantidad) as parcial,
								fl.iva, 
								fl.adicional
								FROM 
								detalleventa fl
								left join productos p on  fl.idpro=p.idprod
								where
								fl.numfac='".$this->sc_temp_par_numfacventa."' and fl.cantidad > 0";
	}
	

}

;

$_SESSION['pdfreport_facturaven_22011901']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_facturaven_22011901']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_facturaven_22011901']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_facturaven_22011901']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asentada from facturaven where idfacven=$this->sc_temp_par_numfacventa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
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
                        $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
;
if($this->des[0][0]==0)
	{
	echo 'FACTURA NO ESTÁ ASENTADA, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_gconsolidaritems)) {$_SESSION['gconsolidaritems'] = $this->sc_temp_gconsolidaritems;}
if (isset($this->sc_temp_gconsolidararticulos)) {$_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, convert(char(23),fechaven,121), convert(char(23),fechavenc,121), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, EXTEND(fechaven, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, LOTOFILE(logo, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_informix', 'client') as logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT idfacven, numfacven, credito, fechaven, fechavenc, idcli, subtotal, valoriva, total, pagada, asentada, observaciones, saldo, adicional, adicional2, adicional3, resolucion, dircliente, logo from (SELECT      idfacven,     numfacven,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     pagada,     asentada,     observaciones,     saldo,     adicional,     adicional2,     adicional3,      resolucion,     dircliente,  (select e.logo from datosemp e where e.nit='" . $_SESSION['nit'] . "') as logo FROM      facturaven WHERE idfacven=" . $_SESSION['par_numfacventa'] . ") nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['order_grid'];
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->idfacven = $rs->fields[0] ;  
         $this->idfacven = (string)$this->idfacven;
         $this->numfacven = $rs->fields[1] ;  
         $this->numfacven = (string)$this->numfacven;
         $this->credito = $rs->fields[2] ;  
         $this->credito = (string)$this->credito;
         $this->fechaven = $rs->fields[3] ;  
         $this->fechavenc = $rs->fields[4] ;  
         $this->idcli = $rs->fields[5] ;  
         $this->idcli = (string)$this->idcli;
         $this->subtotal = $rs->fields[6] ;  
         $this->subtotal =  str_replace(",", ".", $this->subtotal);
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;
         $this->valoriva = $rs->fields[7] ;  
         $this->valoriva =  str_replace(",", ".", $this->valoriva);
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;
         $this->total = $rs->fields[8] ;  
         $this->total =  str_replace(",", ".", $this->total);
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;
         $this->pagada = $rs->fields[9] ;  
         $this->asentada = $rs->fields[10] ;  
         $this->asentada = (string)$this->asentada;
         $this->observaciones = $rs->fields[11] ;  
         $this->saldo = $rs->fields[12] ;  
         $this->saldo =  str_replace(",", ".", $this->saldo);
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;
         $this->adicional = $rs->fields[13] ;  
         $this->adicional =  str_replace(",", ".", $this->adicional);
         $this->adicional = (string)$this->adicional;
         $this->adicional2 = $rs->fields[14] ;  
         $this->adicional2 =  str_replace(",", ".", $this->adicional2);
         $this->adicional2 = (string)$this->adicional2;
         $this->adicional3 = $rs->fields[15] ;  
         $this->adicional3 = (string)$this->adicional3;
         $this->resolucion = $rs->fields[16] ;  
         $this->resolucion = (string)$this->resolucion;
         $this->dircliente = $rs->fields[17] ;  
         $this->dircliente = (string)$this->dircliente;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $this->logo = "";  
              if (is_file($rs_grid->fields[18])) 
              { 
                  $this->logo = file_get_contents($rs_grid->fields[18]);  
              } 
          } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
         { 
             $this->logo = $this->Db->BlobDecode($rs->fields[18]) ;  
         } 
         elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
         { 
             $this->logo = $this->Db->BlobDecode($rs->fields[18]) ;  
         } 
         else
         { 
             $this->logo = $rs->fields[18] ;  
         } 
         //----- lookup - credito
         $this->look_credito = $this->credito; 
         $this->Lookup->lookup_credito($this->look_credito); 
         $this->look_credito = ($this->look_credito == "&nbsp;") ? "" : $this->look_credito; 
         //----- lookup - idcli
         $this->look_idcli = $this->idcli; 
         $this->Lookup->lookup_idcli($this->look_idcli, $this->idcli) ; 
         $this->look_idcli = ($this->look_idcli == "&nbsp;") ? "" : $this->look_idcli; 
         $this->logo = "";
         $this->sc_proc_grid = true; 
         //----- lookup - colores_iddet
         $this->Lookup->lookup_colores_iddet($this->colores_iddet, $this->idfacven, $this->array_colores_iddet); 
         $this->colores_iddet = str_replace("<br>", " ", $this->colores_iddet); 
         $this->colores_iddet = ($this->colores_iddet == "&nbsp;") ? "" : $this->colores_iddet; 
         //----- lookup - colores_iddet2
         $this->Lookup->lookup_colores_iddet2($this->colores_iddet2, $this->idfacven, $this->array_colores_iddet2); 
         $this->colores_iddet2 = str_replace("<br>", " ", $this->colores_iddet2); 
         $this->colores_iddet2 = ($this->colores_iddet2 == "&nbsp;") ? "" : $this->colores_iddet2; 
         //----- lookup - municipio
         $this->Lookup->lookup_municipio($this->municipio, $this->municipio, $this->array_municipio); 
         $this->municipio = str_replace("<br>", " ", $this->municipio); 
         $this->municipio = ($this->municipio == "&nbsp;") ? "" : $this->municipio; 
         //----- lookup - tallas_iddet
         $this->Lookup->lookup_tallas_iddet($this->tallas_iddet, $this->idfacven, $this->array_tallas_iddet); 
         $this->tallas_iddet = str_replace("<br>", " ", $this->tallas_iddet); 
         $this->tallas_iddet = ($this->tallas_iddet == "&nbsp;") ? "" : $this->tallas_iddet; 
         $_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'on';
if (!isset($_SESSION['subt'])) {$_SESSION['subt'] = "";}
if (!isset($this->sc_temp_subt)) {$this->sc_temp_subt = (isset($_SESSION['subt'])) ? $_SESSION['subt'] : "";}
if (!isset($_SESSION['eliva'])) {$_SESSION['eliva'] = "";}
if (!isset($this->sc_temp_eliva)) {$this->sc_temp_eliva = (isset($_SESSION['eliva'])) ? $_SESSION['eliva'] : "";}
  $this->trae_documento();
 
      $nm_select = "select idmuni, direc, telefono, obs  from direccion where iddireccion=$this->dircliente  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds = array();
     if ($this->dircliente !== "")
     { 
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
                        $this->ds[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds = false;
          $this->ds_erro = $this->Db->ErrorMsg();
      } 
     } 
;
if(!empty($this->ds[0][0]))
   {
	$this->direccion =$this->ds[0][1];
	$this->telefono =$this->ds[0][2];
	$this->municipio =$this->ds[0][0];
	if($this->ds[0][3]!='PRINCIPAL')
		{
		$this->nomsucursal ="SUCURSAL: ".$this->ds[0][3];
		}
	else
		{
		$this->nomsucursal ="";
		}
	}
$this->trae_resolucion();
$this->sc_temp_eliva=$this->suma_iva();
$this->sc_temp_subt=$this->total -$this->sc_temp_eliva;
$this->sc_temp_subt= number_format($this->sc_temp_subt,2,",",".");
$this->sc_temp_eliva=number_format($this->sc_temp_eliva,2,",",".");
if (isset($this->sc_temp_eliva)) {$_SESSION['eliva'] = $this->sc_temp_eliva;}
if (isset($this->sc_temp_subt)) {$_SESSION['subt'] = $this->sc_temp_subt;}
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['field_order'] as $Cada_col)
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['embutida'])
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
              require_once($this->Ini->path_aplicacao . "pdfreport_facturaven_22011901_res_json.class.php");
              $this->Res = new pdfreport_facturaven_22011901_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_res_grid'] = true;
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
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_res_file']['json'];
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- idfacven
   function NM_export_idfacven()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->idfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idfacven'])) ? $this->New_label['idfacven'] : "Idfacven"; 
         }
         else
         {
             $SC_Label = "idfacven"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->idfacven;
   }
   //----- numfacven
   function NM_export_numfacven()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->numfacven, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Numfacven"; 
         }
         else
         {
             $SC_Label = "numfacven"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numfacven;
   }
   //----- credito
   function NM_export_credito()
   {
         $this->look_credito = NM_charset_to_utf8($this->look_credito);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Credito"; 
         }
         else
         {
             $SC_Label = "credito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_credito;
   }
   //----- fechaven
   function NM_export_fechaven()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fechaven;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechaven, "YYYY-MM-DD  ");
                 $this->fechaven = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fechaven"; 
         }
         else
         {
             $SC_Label = "fechaven"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechaven;
   }
   //----- fechavenc
   function NM_export_fechavenc()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->fechavenc;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->fechavenc, "YYYY-MM-DD  ");
                 $this->fechavenc = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Fechavenc"; 
         }
         else
         {
             $SC_Label = "fechavenc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechavenc;
   }
   //----- idcli
   function NM_export_idcli()
   {
         nmgp_Form_Num_Val($this->look_idcli, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_idcli = NM_charset_to_utf8($this->look_idcli);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Idcli"; 
         }
         else
         {
             $SC_Label = "idcli"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->look_idcli;
   }
   //----- subtotal
   function NM_export_subtotal()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->subtotal, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
         }
         else
         {
             $SC_Label = "subtotal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->subtotal;
   }
   //----- valoriva
   function NM_export_valoriva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->valoriva, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
         }
         else
         {
             $SC_Label = "valoriva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->valoriva;
   }
   //----- total
   function NM_export_total()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
         }
         else
         {
             $SC_Label = "total"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->total;
   }
   //----- pagada
   function NM_export_pagada()
   {
         $this->pagada = NM_charset_to_utf8($this->pagada);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
         }
         else
         {
             $SC_Label = "pagada"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pagada;
   }
   //----- asentada
   function NM_export_asentada()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->asentada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
         }
         else
         {
             $SC_Label = "asentada"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->asentada;
   }
   //----- observaciones
   function NM_export_observaciones()
   {
         if ($this->Json_format)
         {
             if ($this->observaciones !== "&nbsp;") 
             { 
                 $this->observaciones =  sc_strtolower($this->observaciones); 
                 $this->observaciones = ucwords($this->observaciones); 
             } 
         }
         $this->observaciones = NM_charset_to_utf8($this->observaciones);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
         }
         else
         {
             $SC_Label = "observaciones"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->observaciones;
   }
   //----- saldo
   function NM_export_saldo()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->saldo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
         }
         else
         {
             $SC_Label = "saldo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->saldo;
   }
   //----- adicional
   function NM_export_adicional()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional'])) ? $this->New_label['adicional'] : "Adicional"; 
         }
         else
         {
             $SC_Label = "adicional"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional;
   }
   //----- adicional2
   function NM_export_adicional2()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional2, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional2'])) ? $this->New_label['adicional2'] : "Adicional 2"; 
         }
         else
         {
             $SC_Label = "adicional2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional2;
   }
   //----- adicional3
   function NM_export_adicional3()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->adicional3, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['adicional3'])) ? $this->New_label['adicional3'] : "Adicional 3"; 
         }
         else
         {
             $SC_Label = "adicional3"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->adicional3;
   }
   //----- resolucion
   function NM_export_resolucion()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->resolucion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['resolucion'])) ? $this->New_label['resolucion'] : "Resolucion"; 
         }
         else
         {
             $SC_Label = "resolucion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->resolucion;
   }
   //----- dircliente
   function NM_export_dircliente()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->dircliente, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['dircliente'])) ? $this->New_label['dircliente'] : "Dircliente"; 
         }
         else
         {
             $SC_Label = "dircliente"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->dircliente;
   }
   //----- logo
   function NM_export_logo()
   {
         $this->logo = NM_charset_to_utf8($this->logo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['logo'])) ? $this->New_label['logo'] : "Logo"; 
         }
         else
         {
             $SC_Label = "logo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->logo;
   }
   //----- colores
   function NM_export_colores()
   {
         $this->colores = NM_charset_to_utf8($this->colores);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['colores'])) ? $this->New_label['colores'] : "colores"; 
         }
         else
         {
             $SC_Label = "colores"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->colores;
   }
   //----- colores_iddet
   function NM_export_colores_iddet()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['colores_iddet'])) ? $this->New_label['colores_iddet'] : "Iddet"; 
         }
         else
         {
             $SC_Label = "colores_iddet"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->colores_iddet;
   }
   //----- colores_iddet2
   function NM_export_colores_iddet2()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['colores_iddet2'])) ? $this->New_label['colores_iddet2'] : "Iddet 2"; 
         }
         else
         {
             $SC_Label = "colores_iddet2"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->colores_iddet2;
   }
   //----- detalleventa
   function NM_export_detalleventa()
   {
         $this->detalleventa = NM_charset_to_utf8($this->detalleventa);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa'])) ? $this->New_label['detalleventa'] : "detalleventa"; 
         }
         else
         {
             $SC_Label = "detalleventa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa;
   }
   //----- detalleventa_cantidad
   function NM_export_detalleventa_cantidad()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_cantidad, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_cantidad'])) ? $this->New_label['detalleventa_cantidad'] : "Cantidad"; 
         }
         else
         {
             $SC_Label = "detalleventa_cantidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_cantidad;
   }
   //----- detalleventa_fl_adicional
   function NM_export_detalleventa_fl_adicional()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_fl_adicional, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_fl_adicional'])) ? $this->New_label['detalleventa_fl_adicional'] : "Adicional"; 
         }
         else
         {
             $SC_Label = "detalleventa_fl_adicional"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_fl_adicional;
   }
   //----- detalleventa_fl_factor
   function NM_export_detalleventa_fl_factor()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_fl_factor, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_fl_factor'])) ? $this->New_label['detalleventa_fl_factor'] : "Factor"; 
         }
         else
         {
             $SC_Label = "detalleventa_fl_factor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_fl_factor;
   }
   //----- detalleventa_fl_iva
   function NM_export_detalleventa_fl_iva()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_fl_iva, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_fl_iva'])) ? $this->New_label['detalleventa_fl_iva'] : "Iva"; 
         }
         else
         {
             $SC_Label = "detalleventa_fl_iva"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_fl_iva;
   }
   //----- detalleventa_fl_unidadmayor
   function NM_export_detalleventa_fl_unidadmayor()
   {
         $this->detalleventa_fl_unidadmayor = NM_charset_to_utf8($this->detalleventa_fl_unidadmayor);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_fl_unidadmayor'])) ? $this->New_label['detalleventa_fl_unidadmayor'] : "Unidadmayor"; 
         }
         else
         {
             $SC_Label = "detalleventa_fl_unidadmayor"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_fl_unidadmayor;
   }
   //----- detalleventa_idpro
   function NM_export_detalleventa_idpro()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_idpro, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_idpro'])) ? $this->New_label['detalleventa_idpro'] : "Idpro"; 
         }
         else
         {
             $SC_Label = "detalleventa_idpro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_idpro;
   }
   //----- detalleventa_p_codigobar
   function NM_export_detalleventa_p_codigobar()
   {
         $this->detalleventa_p_codigobar = NM_charset_to_utf8($this->detalleventa_p_codigobar);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_p_codigobar'])) ? $this->New_label['detalleventa_p_codigobar'] : "Codigobar"; 
         }
         else
         {
             $SC_Label = "detalleventa_p_codigobar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_p_codigobar;
   }
   //----- detalleventa_p_nompro
   function NM_export_detalleventa_p_nompro()
   {
         $this->detalleventa_p_nompro = NM_charset_to_utf8($this->detalleventa_p_nompro);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_p_nompro'])) ? $this->New_label['detalleventa_p_nompro'] : "Nompro"; 
         }
         else
         {
             $SC_Label = "detalleventa_p_nompro"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_p_nompro;
   }
   //----- detalleventa_parcial
   function NM_export_detalleventa_parcial()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_parcial, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_parcial'])) ? $this->New_label['detalleventa_parcial'] : "Parcial"; 
         }
         else
         {
             $SC_Label = "detalleventa_parcial"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_parcial;
   }
   //----- detalleventa_unidad
   function NM_export_detalleventa_unidad()
   {
         $this->detalleventa_unidad = NM_charset_to_utf8($this->detalleventa_unidad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_unidad'])) ? $this->New_label['detalleventa_unidad'] : "Unidad"; 
         }
         else
         {
             $SC_Label = "detalleventa_unidad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_unidad;
   }
   //----- detalleventa_valorunita
   function NM_export_detalleventa_valorunita()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->detalleventa_valorunita, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['detalleventa_valorunita'])) ? $this->New_label['detalleventa_valorunita'] : "Valorunita"; 
         }
         else
         {
             $SC_Label = "detalleventa_valorunita"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->detalleventa_valorunita;
   }
   //----- digito
   function NM_export_digito()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->digito, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['digito'])) ? $this->New_label['digito'] : "digito"; 
         }
         else
         {
             $SC_Label = "digito"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->digito;
   }
   //----- direccion
   function NM_export_direccion()
   {
         $this->direccion = NM_charset_to_utf8($this->direccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['direccion'])) ? $this->New_label['direccion'] : "direccion"; 
         }
         else
         {
             $SC_Label = "direccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->direccion;
   }
   //----- documento
   function NM_export_documento()
   {
         $this->documento = NM_charset_to_utf8($this->documento);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['documento'])) ? $this->New_label['documento'] : "documento"; 
         }
         else
         {
             $SC_Label = "documento"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->documento;
   }
   //----- empresa
   function NM_export_empresa()
   {
         $this->empresa = NM_charset_to_utf8($this->empresa);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['empresa'])) ? $this->New_label['empresa'] : "empresa"; 
         }
         else
         {
             $SC_Label = "empresa"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->empresa;
   }
   //----- etiqueta
   function NM_export_etiqueta()
   {
         $this->etiqueta = NM_charset_to_utf8($this->etiqueta);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['etiqueta'])) ? $this->New_label['etiqueta'] : "etiqueta"; 
         }
         else
         {
             $SC_Label = "etiqueta"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->etiqueta;
   }
   //----- fechares
   function NM_export_fechares()
   {
         $this->fechares = NM_charset_to_utf8($this->fechares);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['fechares'])) ? $this->New_label['fechares'] : "fechares"; 
         }
         else
         {
             $SC_Label = "fechares"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->fechares;
   }
   //----- ladireccion
   function NM_export_ladireccion()
   {
         $this->ladireccion = NM_charset_to_utf8($this->ladireccion);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['ladireccion'])) ? $this->New_label['ladireccion'] : "ladireccion"; 
         }
         else
         {
             $SC_Label = "ladireccion"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->ladireccion;
   }
   //----- municipio
   function NM_export_municipio()
   {
         $this->municipio = NM_charset_to_utf8($this->municipio);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['municipio'])) ? $this->New_label['municipio'] : "municipio"; 
         }
         else
         {
             $SC_Label = "municipio"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->municipio;
   }
   //----- nomsucursal
   function NM_export_nomsucursal()
   {
         $this->nomsucursal = NM_charset_to_utf8($this->nomsucursal);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['nomsucursal'])) ? $this->New_label['nomsucursal'] : "nomsucursal"; 
         }
         else
         {
             $SC_Label = "nomsucursal"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->nomsucursal;
   }
   //----- numnit
   function NM_export_numnit()
   {
         $this->numnit = NM_charset_to_utf8($this->numnit);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numnit'])) ? $this->New_label['numnit'] : "numnit"; 
         }
         else
         {
             $SC_Label = "numnit"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numnit;
   }
   //----- numtele
   function NM_export_numtele()
   {
         $this->numtele = NM_charset_to_utf8($this->numtele);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['numtele'])) ? $this->New_label['numtele'] : "numtele"; 
         }
         else
         {
             $SC_Label = "numtele"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->numtele;
   }
   //----- prefijo
   function NM_export_prefijo()
   {
         if ($this->Json_format)
         {
             if ($this->prefijo !== "&nbsp;") 
             { 
                 $this->prefijo = sc_strtoupper($this->prefijo); 
             } 
         }
         $this->prefijo = NM_charset_to_utf8($this->prefijo);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['prefijo'])) ? $this->New_label['prefijo'] : "prefijo"; 
         }
         else
         {
             $SC_Label = "prefijo"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->prefijo;
   }
   //----- rangofac
   function NM_export_rangofac()
   {
         $this->rangofac = NM_charset_to_utf8($this->rangofac);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['rangofac'])) ? $this->New_label['rangofac'] : "rangofac"; 
         }
         else
         {
             $SC_Label = "rangofac"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->rangofac;
   }
   //----- tallas
   function NM_export_tallas()
   {
         $this->tallas = NM_charset_to_utf8($this->tallas);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tallas'])) ? $this->New_label['tallas'] : "tallas"; 
         }
         else
         {
             $SC_Label = "tallas"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tallas;
   }
   //----- tallas_iddet
   function NM_export_tallas_iddet()
   {
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['tallas_iddet'])) ? $this->New_label['tallas_iddet'] : "Iddet"; 
         }
         else
         {
             $SC_Label = "tallas_iddet"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->tallas_iddet;
   }
   //----- telefono
   function NM_export_telefono()
   {
         $this->telefono = NM_charset_to_utf8($this->telefono);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['telefono'])) ? $this->New_label['telefono'] : "telefono"; 
         }
         else
         {
             $SC_Label = "telefono"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->telefono;
   }
   //----- npagina
   function NM_export_npagina()
   {
         $this->npagina = NM_charset_to_utf8($this->npagina);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['npagina'])) ? $this->New_label['npagina'] : "npagina"; 
         }
         else
         {
             $SC_Label = "npagina"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->npagina;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - facturaven :: JSON</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_facturaven_22011901_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_facturaven_22011901"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven_22011901']['json_return']); ?>"> 
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
function suma_iva()
{
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'on';
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
 
      $nm_select = "select cantidad, valorunit, iva from detalleventa where numfac= $this->sc_temp_par_numfacventa and cantidad>0"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
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
                        $this->dt[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt = false;
          $this->dt_erro = $this->Db->ErrorMsg();
      } 
;
if (isset($this->dt[0][0]))
	{
	$ca=0;
	$iv=0;
	$i=0;
	$to_iva=0;
	$aux_iv=0;
		  foreach($this->dt  as $ads)
			{
			$i=$i+1;
			$ca.=$ads[0];
			$iv.=$ads[2];
			$aux_iv=round($iv/$ca,2);
			$to_iva=$to_iva+round(($aux_iv*$ca),2);echo "El iva va en: ",$to_iva;
			$ca=0;
			$iv=0;
			}
	return $to_iva;		
	}
else
	{
	$to_iva=0;
	return $to_iva;
	}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'off';
}
function trae_documento()
{
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'on';
  
 
      $nm_select = "select documento, dv from terceros where idtercero=$this->idcli  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
     if ($this->idcli !== "")
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
                        $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->documento =$this->des[0][0];
$this->digito ="-".$this->des[0][1];
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'off';
}
function trae_resolucion()
{
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'on';
  
$this->etiqueta ="Descuento aplicado"; 
 
      $nm_select = "select resolucion, rangofac, fecha, prefijo from resdian where Idres=$this->resolucion  "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des = array();
     if ($this->resolucion !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->des[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des = false;
          $this->des_erro = $this->Db->ErrorMsg();
      } 
     } 
;
$this->resolucion =" Res.DIAN ".$this->des[0][0];
$this->rangofac ="Rango Autorizado: ".$this->des[0][1];
$this->fechares ="Vigencia ".$this->des[0][2];
$this->prefijo =$this->des[0][3];
$_SESSION['scriptcase']['pdfreport_facturaven_22011901']['contr_erro'] = 'off';
}
}

?>
