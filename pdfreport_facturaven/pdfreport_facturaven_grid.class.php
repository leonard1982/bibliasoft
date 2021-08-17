<?php
class pdfreport_facturaven_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $array_colores_iddet = array();
   var $array_colores_iddet2 = array();
   var $array_municipio = array();
   var $array_tallas_iddet = array();
   var $colores = array();
   var $colores_iddet = array();
   var $colores_iddet2 = array();
   var $detalleventa = array();
   var $detalleventa_cantidad = array();
   var $detalleventa_fl_adicional = array();
   var $detalleventa_fl_factor = array();
   var $detalleventa_fl_iva = array();
   var $detalleventa_fl_unidadmayor = array();
   var $detalleventa_idpro = array();
   var $detalleventa_p_codigobar = array();
   var $detalleventa_p_nompro = array();
   var $detalleventa_parcial = array();
   var $detalleventa_unidad = array();
   var $detalleventa_valorunita = array();
   var $digito = array();
   var $direccion = array();
   var $documento = array();
   var $empresa = array();
   var $etiqueta = array();
   var $fechares = array();
   var $ladireccion = array();
   var $municipio = array();
   var $nomsucursal = array();
   var $numnit = array();
   var $numtele = array();
   var $prefijo = array();
   var $rangofac = array();
   var $tallas = array();
   var $tallas_iddet = array();
   var $telefono = array();
   var $npagina = array();
   var $reg = array();
   var $idfacven = array();
   var $numfacven = array();
   var $credito = array();
   var $fechaven = array();
   var $fechavenc = array();
   var $idcli = array();
   var $subtotal = array();
   var $valoriva = array();
   var $total = array();
   var $pagada = array();
   var $asentada = array();
   var $observaciones = array();
   var $saldo = array();
   var $adicional = array();
   var $adicional2 = array();
   var $adicional3 = array();
   var $resolucion = array();
   var $dircliente = array();
   var $logo = array();
   var $look_credito = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "LETTER";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['pdfreport_facturaven']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("pdfreport_facturaven", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idfacven[0] = $Busca_temp['idfacven']; 
       $tmp_pos = strpos($this->idfacven[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idfacven[0]))
       {
           $this->idfacven[0] = substr($this->idfacven[0], 0, $tmp_pos);
       }
       $idfacven_2 = $Busca_temp['idfacven_input_2']; 
       $this->idfacven_2 = $Busca_temp['idfacven_input_2']; 
       $this->numfacven[0] = $Busca_temp['numfacven']; 
       $tmp_pos = strpos($this->numfacven[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->numfacven[0]))
       {
           $this->numfacven[0] = substr($this->numfacven[0], 0, $tmp_pos);
       }
       $numfacven_2 = $Busca_temp['numfacven_input_2']; 
       $this->numfacven_2 = $Busca_temp['numfacven_input_2']; 
       $this->credito[0] = $Busca_temp['credito']; 
       $tmp_pos = strpos($this->credito[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->credito[0]))
       {
           $this->credito[0] = substr($this->credito[0], 0, $tmp_pos);
       }
       $credito_2 = $Busca_temp['credito_input_2']; 
       $this->credito_2 = $Busca_temp['credito_input_2']; 
       $this->fechaven[0] = $Busca_temp['fechaven']; 
       $tmp_pos = strpos($this->fechaven[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fechaven[0]))
       {
           $this->fechaven[0] = substr($this->fechaven[0], 0, $tmp_pos);
       }
       $fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->adicional3[0] = $Busca_temp['adicional3']; 
       $tmp_pos = strpos($this->adicional3[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->adicional3[0]))
       {
           $this->adicional3[0] = substr($this->adicional3[0], 0, $tmp_pos);
       }
       $adicional3_2 = $Busca_temp['adicional3_input_2']; 
       $this->adicional3_2 = $Busca_temp['adicional3_input_2']; 
   } 
   else 
   { 
       $this->fechaven_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'on';
if (!isset($_SESSION['RESP'])) {$_SESSION['RESP'] = "";}
if (!isset($this->sc_temp_RESP)) {$this->sc_temp_RESP = (isset($_SESSION['RESP'])) ? $_SESSION['RESP'] : "";}
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['gconsolidararticulos'])) {$_SESSION['gconsolidararticulos'] = "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($_SESSION['glineasporfactura'])) {$_SESSION['glineasporfactura'] = "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($_SESSION['gconsolidaritems'])) {$_SESSION['gconsolidaritems'] = "";}
if (!isset($this->sc_temp_gconsolidaritems)) {$this->sc_temp_gconsolidaritems = (isset($_SESSION['gconsolidaritems'])) ? $_SESSION['gconsolidaritems'] : "";}
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
  $this->sc_temp_gconsolidaritems = "";
$this->sc_temp_glineasporfactura=$this->sc_temp_glineasporfactura;


if(!empty($this->sc_temp_par_numfacventa)){
	
	if($this->sc_temp_gconsolidararticulos=="S"){
	
		$this->sc_temp_gconsolidaritems = "   		
							 SELECT
							fl.idpro,
							sum(fl.cantidad) as cantidad,
							p.codigobar, 
							if(fl.obs <> '',concat('<b>',p.nompro,'</b>: ',fl.obs),p.nompro) as nompro, 
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

$_SESSION['pdfreport_facturaven']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_facturaven']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_facturaven']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_facturaven']['telefono1']=$this->sc_temp_tele;
$this->sc_temp_RESP='NO RESPONSABLE';
 
      $nm_select = "select razonsoc, dv, naturaleza, regimen, nom_depto, ciudad, telefono from datosemp where nit=$this->sc_temp_nit"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt[$this->nm_grid_colunas] = array();
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
                        $this->dt[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt[$this->nm_grid_colunas] = false;
          $this->dt_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dt[$this->nm_grid_colunas][0][0]))
	{
	$_SESSION['pdfreport_facturaven']['empresa_nombre'] = $this->dt[$this->nm_grid_colunas][0][0];
	$_SESSION['pdfreport_facturaven']['nit']=$_SESSION['pdfreport_facturaven']['nit'].'-'.$this->dt[$this->nm_grid_colunas][0][1];
	$_SESSION['pdfreport_facturaven']['direccion1']= $_SESSION['pdfreport_facturaven']['direccion1'];
	$_SESSION['pdfreport_facturaven']['muni'] = $this->dt[$this->nm_grid_colunas][0][5].' - '.$this->dt[$this->nm_grid_colunas][0][4].' COL.';
	$_SESSION['pdfreport_facturaven']['telefono1'] = $this->dt[$this->nm_grid_colunas][0][6];
	$this->reg[$this->nm_grid_colunas]  = $this->dt[$this->nm_grid_colunas][0][3];
	if($this->reg[$this->nm_grid_colunas] ==0)
		{
		$this->sc_temp_RESP='NO RESPONSABLE DE IVA';
		}
	else
		{
		$this->sc_temp_RESP='RESPONSABLE DE IVA';
		}
	}
else
	{
	
	}
 
      $nm_select = "select asentada from facturaven where idfacven=$this->sc_temp_par_numfacventa"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des[$this->nm_grid_colunas] = array();
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
                        $this->des[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des[$this->nm_grid_colunas] = false;
          $this->des_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if($this->des[$this->nm_grid_colunas][0][0]==0)
	{
	echo 'FACTURA NO ESTÁ ASENTADA, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_par_numfacventa)) {$_SESSION['par_numfacventa'] = $this->sc_temp_par_numfacventa;}
if (isset($this->sc_temp_gconsolidaritems)) {$_SESSION['gconsolidaritems'] = $this->sc_temp_gconsolidaritems;}
if (isset($this->sc_temp_glineasporfactura)) {$_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gconsolidararticulos)) {$_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
if (isset($this->sc_temp_RESP)) {$_SESSION['RESP'] = $this->sc_temp_RESP;}
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq'];  
//----- 
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
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     $this->Pdf->setCellMargins($left = 0, $top = 0, $right = 0, $bottom = 0);
     $this->Pdf->SetAutoPageBreak(false);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 9, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 9);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['idfacven'] = "Idfacven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['numfacven'] = "Numfacven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['credito'] = "Credito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['fechaven'] = "Fechaven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['fechavenc'] = "Fechavenc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['idcli'] = "Idcli";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['subtotal'] = "Subtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['valoriva'] = "Valoriva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['pagada'] = "Pagada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['asentada'] = "Asentada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['saldo'] = "Saldo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['adicional'] = "Adicional";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['adicional2'] = "Adicional 2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['adicional3'] = "Adicional 3";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['resolucion'] = "Resolucion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['dircliente'] = "Dircliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['logo'] = "Logo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['colores'] = "colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['colores_iddet'] = "Iddet";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['colores_iddet2'] = "Iddet 2";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa'] = "detalleventa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_fl_adicional'] = "Adicional";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_fl_factor'] = "Factor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_fl_iva'] = "Iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_fl_unidadmayor'] = "Unidadmayor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_idpro'] = "Idpro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_p_codigobar'] = "Codigobar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_p_nompro'] = "Nompro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_parcial'] = "Parcial";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_unidad'] = "Unidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['detalleventa_valorunita'] = "Valorunita";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['digito'] = "digito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['direccion'] = "direccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['documento'] = "documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['empresa'] = "empresa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['etiqueta'] = "etiqueta";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['fechares'] = "fechares";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['ladireccion'] = "ladireccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['municipio'] = "municipio";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['nomsucursal'] = "nomsucursal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['numnit'] = "numnit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['numtele'] = "numtele";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['prefijo'] = "prefijo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['rangofac'] = "rangofac";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['tallas'] = "tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['tallas_iddet'] = "Iddet";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['telefono'] = "telefono";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['npagina'] = "npagina";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['labels']['reg'] = "reg";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_facturaven']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->SetTextColor(0, 0, 0);
       $this->Pdf->Text(10, 10, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_facturaven']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idfacven[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idfacven[$this->nm_grid_colunas] = (string)$this->idfacven[$this->nm_grid_colunas];
          $this->numfacven[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->numfacven[$this->nm_grid_colunas] = (string)$this->numfacven[$this->nm_grid_colunas];
          $this->credito[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->credito[$this->nm_grid_colunas] = (string)$this->credito[$this->nm_grid_colunas];
          $this->fechaven[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->fechavenc[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->idcli[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->idcli[$this->nm_grid_colunas] = (string)$this->idcli[$this->nm_grid_colunas];
          $this->subtotal[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->subtotal[$this->nm_grid_colunas] =  str_replace(",", ".", $this->subtotal[$this->nm_grid_colunas]);
          $this->subtotal[$this->nm_grid_colunas] = (strpos(strtolower($this->subtotal[$this->nm_grid_colunas]), "e")) ? (float)$this->subtotal[$this->nm_grid_colunas] : $this->subtotal[$this->nm_grid_colunas]; 
          $this->subtotal[$this->nm_grid_colunas] = (string)$this->subtotal[$this->nm_grid_colunas];
          $this->valoriva[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->valoriva[$this->nm_grid_colunas] =  str_replace(",", ".", $this->valoriva[$this->nm_grid_colunas]);
          $this->valoriva[$this->nm_grid_colunas] = (strpos(strtolower($this->valoriva[$this->nm_grid_colunas]), "e")) ? (float)$this->valoriva[$this->nm_grid_colunas] : $this->valoriva[$this->nm_grid_colunas]; 
          $this->valoriva[$this->nm_grid_colunas] = (string)$this->valoriva[$this->nm_grid_colunas];
          $this->total[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->total[$this->nm_grid_colunas] =  str_replace(",", ".", $this->total[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = (strpos(strtolower($this->total[$this->nm_grid_colunas]), "e")) ? (float)$this->total[$this->nm_grid_colunas] : $this->total[$this->nm_grid_colunas]; 
          $this->total[$this->nm_grid_colunas] = (string)$this->total[$this->nm_grid_colunas];
          $this->pagada[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->asentada[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->asentada[$this->nm_grid_colunas] = (string)$this->asentada[$this->nm_grid_colunas];
          $this->observaciones[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->saldo[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->saldo[$this->nm_grid_colunas] =  str_replace(",", ".", $this->saldo[$this->nm_grid_colunas]);
          $this->saldo[$this->nm_grid_colunas] = (strpos(strtolower($this->saldo[$this->nm_grid_colunas]), "e")) ? (float)$this->saldo[$this->nm_grid_colunas] : $this->saldo[$this->nm_grid_colunas]; 
          $this->saldo[$this->nm_grid_colunas] = (string)$this->saldo[$this->nm_grid_colunas];
          $this->adicional[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->adicional[$this->nm_grid_colunas] =  str_replace(",", ".", $this->adicional[$this->nm_grid_colunas]);
          $this->adicional[$this->nm_grid_colunas] = (string)$this->adicional[$this->nm_grid_colunas];
          $this->adicional2[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->adicional2[$this->nm_grid_colunas] =  str_replace(",", ".", $this->adicional2[$this->nm_grid_colunas]);
          $this->adicional2[$this->nm_grid_colunas] = (string)$this->adicional2[$this->nm_grid_colunas];
          $this->adicional3[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->adicional3[$this->nm_grid_colunas] = (string)$this->adicional3[$this->nm_grid_colunas];
          $this->resolucion[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->resolucion[$this->nm_grid_colunas] = (string)$this->resolucion[$this->nm_grid_colunas];
          $this->dircliente[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->dircliente[$this->nm_grid_colunas] = (string)$this->dircliente[$this->nm_grid_colunas];
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       { 
           $this->logo[$this->nm_grid_colunas] = "";  
           if (is_file($this->rs_grid->fields[18])) 
           { 
               $this->logo[$this->nm_grid_colunas] = file_get_contents($this->rs_grid->fields[18]);  
           } 
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
       { 
           $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[18]) ;  
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
       { 
           $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[18]) ;  
       } 
       else
       { 
           $this->logo[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
       } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              if (!empty($this->logo[$this->nm_grid_colunas]))
              { 
                  $this->logo[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->logo[$this->nm_grid_colunas], false, true, "BLOB");
              }
          }
          $this->colores_iddet[$this->nm_grid_colunas] = array();
          $this->colores_iddet2[$this->nm_grid_colunas] = array();
          $this->detalleventa_cantidad[$this->nm_grid_colunas] = array();
          $this->detalleventa_fl_adicional[$this->nm_grid_colunas] = array();
          $this->detalleventa_fl_factor[$this->nm_grid_colunas] = array();
          $this->detalleventa_fl_iva[$this->nm_grid_colunas] = array();
          $this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas] = array();
          $this->detalleventa_idpro[$this->nm_grid_colunas] = array();
          $this->detalleventa_p_codigobar[$this->nm_grid_colunas] = array();
          $this->detalleventa_p_nompro[$this->nm_grid_colunas] = array();
          $this->detalleventa_parcial[$this->nm_grid_colunas] = array();
          $this->detalleventa_unidad[$this->nm_grid_colunas] = array();
          $this->detalleventa_valorunita[$this->nm_grid_colunas] = array();
          $this->tallas_iddet[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_colores($this->colores[$this->nm_grid_colunas] , $this->idfacven[$this->nm_grid_colunas], $array_colores); 
          $NM_ind = 0;
          $this->colores = array();
          foreach ($array_colores as $cada_subselect) 
          {
              $this->colores[$this->nm_grid_colunas][$NM_ind] = "";
              $this->colores_iddet[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->colores_iddet2[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $NM_ind++;
          }
          $this->Lookup->lookup_detalleventa($this->detalleventa[$this->nm_grid_colunas] , $_SESSION['gconsolidaritems'], $array_detalleventa); 
          $NM_ind = 0;
          $this->detalleventa = array();
          foreach ($array_detalleventa as $cada_subselect) 
          {
              $this->detalleventa[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->detalleventa_unidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[8];
              $this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[9];
              $this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[10];
              $NM_ind++;
          }
          $this->Lookup->lookup_tallas($this->tallas[$this->nm_grid_colunas] , $this->idfacven[$this->nm_grid_colunas], $array_tallas); 
          $NM_ind = 0;
          $this->tallas = array();
          foreach ($array_tallas as $cada_subselect) 
          {
              $this->tallas[$this->nm_grid_colunas][$NM_ind] = "";
              $this->tallas_iddet[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $NM_ind++;
          }
          $this->look_credito[$this->nm_grid_colunas] = $this->credito[$this->nm_grid_colunas]; 
   $this->Lookup->lookup_credito($this->look_credito[$this->nm_grid_colunas]); 
          $this->digito[$this->nm_grid_colunas] = "";
          $this->direccion[$this->nm_grid_colunas] = "";
          $this->documento[$this->nm_grid_colunas] = "";
          $this->empresa[$this->nm_grid_colunas] = "";
          $this->etiqueta[$this->nm_grid_colunas] = "";
          $this->fechares[$this->nm_grid_colunas] = "";
          $this->ladireccion[$this->nm_grid_colunas] = "";
          $this->municipio[$this->nm_grid_colunas] = "";
          $this->nomsucursal[$this->nm_grid_colunas] = "";
          $this->numnit[$this->nm_grid_colunas] = "";
          $this->numtele[$this->nm_grid_colunas] = "";
          $this->prefijo[$this->nm_grid_colunas] = "";
          $this->rangofac[$this->nm_grid_colunas] = "";
          $this->telefono[$this->nm_grid_colunas] = "";
          $this->npagina[$this->nm_grid_colunas] = "";
          $this->reg[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_municipio($this->municipio[$this->nm_grid_colunas], $this->municipio[$this->nm_grid_colunas], $this->array_municipio); 
          $_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'on';
if (!isset($_SESSION['subt'])) {$_SESSION['subt'] = "";}
if (!isset($this->sc_temp_subt)) {$this->sc_temp_subt = (isset($_SESSION['subt'])) ? $_SESSION['subt'] : "";}
if (!isset($_SESSION['eliva'])) {$_SESSION['eliva'] = "";}
if (!isset($this->sc_temp_eliva)) {$this->sc_temp_eliva = (isset($_SESSION['eliva'])) ? $_SESSION['eliva'] : "";}
  $this->trae_documento();
 
      $nm_select = "select idmuni, direc, telefono, obs  from direccion where iddireccion=" . $this->dircliente[$this->nm_grid_colunas]  . " "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds[$this->nm_grid_colunas] = array();
     if ($this->dircliente[$this->nm_grid_colunas] !== "")
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
                        $this->ds[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds[$this->nm_grid_colunas] = false;
          $this->ds_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
     } 
;
if(!empty($this->ds[$this->nm_grid_colunas][0][0]))
   {
	$this->direccion[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][1];
	$this->telefono[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][2];
	$this->municipio[$this->nm_grid_colunas] =$this->ds[$this->nm_grid_colunas][0][0];
	if($this->ds[$this->nm_grid_colunas][0][3]!='PRINCIPAL')
		{
		$this->nomsucursal[$this->nm_grid_colunas] ="SUCURSAL: ".$this->ds[$this->nm_grid_colunas][0][3];
		}
	else
		{
		$this->nomsucursal[$this->nm_grid_colunas] ="";
		}
	}
$this->trae_resolucion();
$this->sc_temp_eliva=$this->suma_iva();
$this->sc_temp_subt=$this->total[$this->nm_grid_colunas] -$this->sc_temp_eliva;
$this->sc_temp_subt= number_format($this->sc_temp_subt,2,",",".");
$this->sc_temp_eliva=number_format($this->sc_temp_eliva,2,",",".");
if (isset($this->sc_temp_eliva)) {$_SESSION['eliva'] = $this->sc_temp_eliva;}
if (isset($this->sc_temp_subt)) {$_SESSION['subt'] = $this->sc_temp_subt;}
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'off';
          $this->idfacven[$this->nm_grid_colunas] = sc_strip_script($this->idfacven[$this->nm_grid_colunas]);
          if ($this->idfacven[$this->nm_grid_colunas] === "") 
          { 
              $this->idfacven[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idfacven[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idfacven[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idfacven[$this->nm_grid_colunas]);
          $this->numfacven[$this->nm_grid_colunas] = sc_strip_script($this->numfacven[$this->nm_grid_colunas]);
          if ($this->numfacven[$this->nm_grid_colunas] === "") 
          { 
              $this->numfacven[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numfacven[$this->nm_grid_colunas], "", "", "0", "S", "2", "", "N:4", "-") ; 
          } 
          $this->numfacven[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numfacven[$this->nm_grid_colunas]);
          $this->credito[$this->nm_grid_colunas] = trim(sc_strip_script($this->look_credito[$this->nm_grid_colunas])); 
          if ($this->credito[$this->nm_grid_colunas] === "") 
          { 
              $this->credito[$this->nm_grid_colunas] = "" ;  
          } 
          $this->credito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->credito[$this->nm_grid_colunas]);
          $this->fechaven[$this->nm_grid_colunas] = sc_strip_script($this->fechaven[$this->nm_grid_colunas]);
          if ($this->fechaven[$this->nm_grid_colunas] === "") 
          { 
              $this->fechaven[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechaven_x =  $this->fechaven[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechaven_x, "YYYY-MM-DD");
               if (is_numeric($fechaven_x) && strlen($fechaven_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechaven[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechaven[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechaven[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechaven[$this->nm_grid_colunas]);
          $this->fechavenc[$this->nm_grid_colunas] = sc_strip_script($this->fechavenc[$this->nm_grid_colunas]);
          if ($this->fechavenc[$this->nm_grid_colunas] === "") 
          { 
              $this->fechavenc[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fechavenc_x =  $this->fechavenc[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fechavenc_x, "YYYY-MM-DD");
               if (is_numeric($fechavenc_x) && strlen($fechavenc_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fechavenc[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fechavenc[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fechavenc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechavenc[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idcli($this->idcli[$this->nm_grid_colunas] , $this->idcli[$this->nm_grid_colunas]) ; 
          $this->idcli[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idcli[$this->nm_grid_colunas]);
          $this->subtotal[$this->nm_grid_colunas] = sc_strip_script($this->subtotal[$this->nm_grid_colunas]);
          if ($this->subtotal[$this->nm_grid_colunas] === "") 
          { 
              $this->subtotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->subtotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->subtotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->subtotal[$this->nm_grid_colunas]);
          $this->valoriva[$this->nm_grid_colunas] = sc_strip_script($this->valoriva[$this->nm_grid_colunas]);
          if ($this->valoriva[$this->nm_grid_colunas] === "") 
          { 
              $this->valoriva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->valoriva[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->valoriva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->valoriva[$this->nm_grid_colunas]);
          $this->total[$this->nm_grid_colunas] = sc_strip_script($this->total[$this->nm_grid_colunas]);
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->total[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          $this->pagada[$this->nm_grid_colunas] = sc_strip_script($this->pagada[$this->nm_grid_colunas]);
          if ($this->pagada[$this->nm_grid_colunas] === "") 
          { 
              $this->pagada[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pagada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pagada[$this->nm_grid_colunas]);
          $this->asentada[$this->nm_grid_colunas] = sc_strip_script($this->asentada[$this->nm_grid_colunas]);
          if ($this->asentada[$this->nm_grid_colunas] === "") 
          { 
              $this->asentada[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->asentada[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->asentada[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->asentada[$this->nm_grid_colunas]);
          $this->observaciones[$this->nm_grid_colunas] = sc_strip_script($this->observaciones[$this->nm_grid_colunas]);
          if ($this->observaciones[$this->nm_grid_colunas] === "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->observaciones[$this->nm_grid_colunas] !== "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = sc_strtolower($this->observaciones[$this->nm_grid_colunas]); 
              $nm_temp  = explode(" ", $this->observaciones[$this->nm_grid_colunas]); 
              $this->observaciones[$this->nm_grid_colunas] = ""; 
              foreach ($nm_temp as $nm_cada_w) 
              { 
                 $Tmp   = sc_strtoupper(substr($nm_cada_w, 0, 1)); 
                 $this->observaciones[$this->nm_grid_colunas] .= $Tmp . substr($nm_cada_w, 1) . " "; 
              } 
              $this->observaciones[$this->nm_grid_colunas] = trim($this->observaciones[$this->nm_grid_colunas]); 
          } 
          if ($this->observaciones[$this->nm_grid_colunas] !== "")
          { 
              $this->observaciones[$this->nm_grid_colunas] = nl2br($this->observaciones[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->observaciones[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->observaciones[$this->nm_grid_colunas]); 
              } 
              $this->observaciones[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->observaciones[$this->nm_grid_colunas])) 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 50) 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 50, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->observaciones[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->observaciones[$this->nm_grid_colunas]);
          $this->saldo[$this->nm_grid_colunas] = sc_strip_script($this->saldo[$this->nm_grid_colunas]);
          if ($this->saldo[$this->nm_grid_colunas] === "") 
          { 
              $this->saldo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->saldo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->saldo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->saldo[$this->nm_grid_colunas]);
          $this->adicional[$this->nm_grid_colunas] = sc_strip_script($this->adicional[$this->nm_grid_colunas]);
          if ($this->adicional[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->adicional[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional[$this->nm_grid_colunas]);
          $this->adicional2[$this->nm_grid_colunas] = sc_strip_script($this->adicional2[$this->nm_grid_colunas]);
          if ($this->adicional2[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional2[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional2[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->adicional2[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional2[$this->nm_grid_colunas]);
          $this->adicional3[$this->nm_grid_colunas] = sc_strip_script($this->adicional3[$this->nm_grid_colunas]);
          if ($this->adicional3[$this->nm_grid_colunas] === "") 
          { 
              $this->adicional3[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->adicional3[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->adicional3[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->adicional3[$this->nm_grid_colunas]);
          $this->resolucion[$this->nm_grid_colunas] = sc_strip_script($this->resolucion[$this->nm_grid_colunas]);
          if ($this->resolucion[$this->nm_grid_colunas] === "") 
          { 
              $this->resolucion[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->resolucion[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->resolucion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->resolucion[$this->nm_grid_colunas]);
          $this->dircliente[$this->nm_grid_colunas] = sc_strip_script($this->dircliente[$this->nm_grid_colunas]);
          if ($this->dircliente[$this->nm_grid_colunas] === "") 
          { 
              $this->dircliente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->dircliente[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->dircliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dircliente[$this->nm_grid_colunas]);
          $this->logo[$this->nm_grid_colunas] = $this->logo[$this->nm_grid_colunas]; 
          if (empty($this->logo[$this->nm_grid_colunas]) || $this->logo[$this->nm_grid_colunas] == "none" || $this->logo[$this->nm_grid_colunas] == "*nm*") 
          { 
              $this->logo[$this->nm_grid_colunas] = "" ;  
              $out_logo = "" ; 
          } 
          else   
          { 
              $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . ".jpg";   
              $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
              $_SESSION['scriptcase']['sc_num_img']++ ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
              { 
                  $nm_tmp = nm_conv_img_access(substr($this->logo[$this->nm_grid_colunas], 0, 12));
                  if (substr($nm_tmp, 0, 4) == "*nm*") 
                  { 
                      $this->logo[$this->nm_grid_colunas] = nm_conv_img_access($this->logo[$this->nm_grid_colunas]);
                  } 
              } 
              if (substr($this->logo[$this->nm_grid_colunas], 0, 4) == "*nm*") 
              { 
                  $this->logo[$this->nm_grid_colunas] = substr($this->logo[$this->nm_grid_colunas], 4) ; 
                  $this->logo[$this->nm_grid_colunas] = base64_decode($this->logo[$this->nm_grid_colunas]) ; 
              } 
              $img_pos_bm = strpos($this->logo[$this->nm_grid_colunas], "BM") ; 
              if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
              { 
                  $this->logo[$this->nm_grid_colunas] = substr($this->logo[$this->nm_grid_colunas], $img_pos_bm) ; 
              } 
              fwrite($arq_logo, $this->logo[$this->nm_grid_colunas]) ;  
              fclose($arq_logo) ;  
              $SC_tp_img = $this->SC_type_img($this->Ini->root . $out_logo);
              if ($SC_tp_img != ".jpg") 
              { 
                  $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $_SESSION['scriptcase']['sc_num_img'] . session_id() . $SC_tp_img ;   
                  $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
                  fwrite($arq_logo, $this->logo[$this->nm_grid_colunas]) ;  
                  fclose($arq_logo) ;  
              }
              $this->logo[$this->nm_grid_colunas] = $this->NM_raiz_img . $out_logo; 
          } 
          if ($this->digito[$this->nm_grid_colunas] === "") 
          { 
              $this->digito[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->digito[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->digito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->digito[$this->nm_grid_colunas]);
          if ($this->direccion[$this->nm_grid_colunas] === "") 
          { 
              $this->direccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->direccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->direccion[$this->nm_grid_colunas]);
          if ($this->documento[$this->nm_grid_colunas] === "") 
          { 
              $this->documento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->documento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->documento[$this->nm_grid_colunas]);
          if ($this->empresa[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa[$this->nm_grid_colunas]);
          if ($this->etiqueta[$this->nm_grid_colunas] === "") 
          { 
              $this->etiqueta[$this->nm_grid_colunas] = "" ;  
          } 
          $this->etiqueta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->etiqueta[$this->nm_grid_colunas]);
          if ($this->fechares[$this->nm_grid_colunas] === "") 
          { 
              $this->fechares[$this->nm_grid_colunas] = "" ;  
          } 
          $this->fechares[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fechares[$this->nm_grid_colunas]);
          if ($this->ladireccion[$this->nm_grid_colunas] === "") 
          { 
              $this->ladireccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ladireccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ladireccion[$this->nm_grid_colunas]);
          $this->Lookup->lookup_municipio($this->municipio[$this->nm_grid_colunas], $this->municipio[$this->nm_grid_colunas], $this->array_municipio); 
          $this->municipio[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->municipio[$this->nm_grid_colunas]);
          if ($this->nomsucursal[$this->nm_grid_colunas] === "") 
          { 
              $this->nomsucursal[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nomsucursal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nomsucursal[$this->nm_grid_colunas]);
          if ($this->numnit[$this->nm_grid_colunas] === "") 
          { 
              $this->numnit[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numnit[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numnit[$this->nm_grid_colunas]);
          if ($this->numtele[$this->nm_grid_colunas] === "") 
          { 
              $this->numtele[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numtele[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numtele[$this->nm_grid_colunas]);
          if ($this->prefijo[$this->nm_grid_colunas] === "") 
          { 
              $this->prefijo[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->prefijo[$this->nm_grid_colunas] !== "") 
          { 
              $this->prefijo[$this->nm_grid_colunas] = sc_strtoupper($this->prefijo[$this->nm_grid_colunas]); 
          } 
          $this->prefijo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->prefijo[$this->nm_grid_colunas]);
          if ($this->rangofac[$this->nm_grid_colunas] === "") 
          { 
              $this->rangofac[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rangofac[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rangofac[$this->nm_grid_colunas]);
          if ($this->telefono[$this->nm_grid_colunas] === "") 
          { 
              $this->telefono[$this->nm_grid_colunas] = "" ;  
          } 
          $this->telefono[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->telefono[$this->nm_grid_colunas]);
          if ($this->npagina[$this->nm_grid_colunas] === "") 
          { 
              $this->npagina[$this->nm_grid_colunas] = "" ;  
          } 
          $this->npagina[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->npagina[$this->nm_grid_colunas]);
          if ($this->reg[$this->nm_grid_colunas] === "") 
          { 
              $this->reg[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->reg[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->reg[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->reg[$this->nm_grid_colunas]);
          foreach ($this->colores_iddet[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_colores_iddet($this->colores_iddet[$this->nm_grid_colunas][$NM_ind] , $this->idfacven[$this->nm_grid_colunas][$NM_ind], $array_colores_iddet) ; 
              $this->colores_iddet[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->colores_iddet[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->colores_iddet2[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_colores_iddet2($this->colores_iddet2[$this->nm_grid_colunas][$NM_ind] , $this->idfacven[$this->nm_grid_colunas][$NM_ind], $array_colores_iddet2) ; 
              $this->colores_iddet2[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->colores_iddet2[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_fl_adicional[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_fl_factor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_fl_factor[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_fl_iva[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_fl_iva[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_fl_unidadmayor[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_idpro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_idpro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_p_codigobar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_p_nompro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_parcial[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_unidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_unidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_unidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalleventa_unidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_unidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalleventa_valorunita[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->tallas_iddet[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_tallas_iddet($this->tallas_iddet[$this->nm_grid_colunas][$NM_ind] , $this->idfacven[$this->nm_grid_colunas][$NM_ind], $array_tallas_iddet) ; 
              $this->tallas_iddet[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->tallas_iddet[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_numfacven = array('posx' => 185, 'posy' => 13, 'data' => $this->numfacven[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_credito = array('posx' => 170, 'posy' => 70, 'data' => $this->credito[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechaven = array('posx' => 34, 'posy' => 70, 'data' => $this->fechaven[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechavenc = array('posx' => 110, 'posy' => 70, 'data' => $this->fechavenc[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idcli = array('posx' => 17, 'posy' => 52, 'data' => $this->idcli[$this->nm_grid_colunas], 'width'      => 120, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_subtotal = array('posx' => 10, 'posy' => 227, 'data' => $this->SC_conv_utf8('' . $_SESSION['subt'] . ''), 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_valoriva = array('posx' => 10, 'posy' => 234, 'data' => $this->SC_conv_utf8('' . $_SESSION['eliva'] . ''), 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => 10, 'posy' => 241, 'data' => $this->total[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_npagina = array('posx' => 180, 'posy' => 270, 'data' => '', 'width'      => 100, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_documento = array('posx' => 157, 'posy' => 51, 'data' => $this->SC_conv_utf8('' . $this->documento[$this->nm_grid_colunas] . '' . $this->digito[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_direccion = array('posx' => 10, 'posy' => 59, 'data' => $this->direccion[$this->nm_grid_colunas], 'width'      => 125, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefono = array('posx' => 25, 'posy' => 66., 'data' => $this->telefono[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_municipio = array('posx' => 155, 'posy' => 66, 'data' => $this->municipio[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalleventa_cantidad = array('posx' => 142, 'posy' => 84, 'data' => $this->detalleventa_cantidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalleventa_p_nompro = array('posx' => 43, 'posy' => 84, 'data' => $this->detalleventa_p_nompro[$this->nm_grid_colunas], 'width'      => 85, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalleventa_valorunita = array('posx' => 158, 'posy' => 84, 'data' => $this->detalleventa_valorunita[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalleventa_parcial = array('posx' => 10, 'posy' => 84, 'data' => $this->detalleventa_parcial[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa = array('posx' => '0', 'posy' => 20, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_facturaven']['empresa_nombre'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_numnit = array('posx' => '0', 'posy' => 24, 'data' => $this->SC_conv_utf8('Nit: ' . $_SESSION['pdfreport_facturaven']['nit'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_ladireccion = array('posx' => '0', 'posy' => 31, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_facturaven']['direccion1'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_numtele = array('posx' => '0', 'posy' => 34, 'data' => $this->SC_conv_utf8('Telefonos: ' . $_SESSION['tele'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_resolucion = array('posx' => 10, 'posy' => 45, 'data' => $this->SC_conv_utf8('' . $_SESSION['gReso'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_prefijo = array('posx' => 170, 'posy' => 13, 'data' => $this->prefijo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalleventa_fl_adicional = array('posx' => 129, 'posy' => 84, 'data' => $this->detalleventa_fl_adicional[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_50 = array('posx' => 132, 'posy' => 78, 'data' => $this->SC_conv_utf8('%'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_51 = array('posx' => 126, 'posy' => 78, 'data' => $this->SC_conv_utf8('T. IVA'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 6, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalleventa_unidad = array('posx' => 22, 'posy' => 84, 'data' => $this->detalleventa_unidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '255', 'color_g'    => '255', 'color_b'    => '255', 'font_style' => $this->default_style);
            $cell_detalleventa_p_codigobar = array('posx' => 10, 'posy' => 84, 'data' => $this->detalleventa_p_codigobar[$this->nm_grid_colunas], 'width'      => 40, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nomsucursal = array('posx' => 157, 'posy' => 59, 'data' => $this->nomsucursal[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cucuta = array('posx' => '0', 'posy' => 38, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_facturaven']['muni'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nota = array('posx' => 130, 'posy' => 270, 'data' => $this->SC_conv_utf8('HECHO EN FACILWEB'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_logo = array('posx' => 10, 'posy' => 8, 'data' => $this->logo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fecha_impresion = array('posx' => 10, 'posy' => 270, 'data' => '', 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_reg = array('posx' => '0', 'posy' => 28, 'data' => $this->SC_conv_utf8('' . $_SESSION['RESP'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_88 = array('posx' => 130, 'posy' => 12, 'data' => $this->SC_conv_utf8('FACTURA DE VENTA'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_89 = array('posx' => 130, 'posy' => 15, 'data' => $this->SC_conv_utf8('POR COMPUTADOR'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
if (!isset($this->sc_temp_gregimen)) {$this->sc_temp_gregimen = (isset($_SESSION['gregimen'])) ? $_SESSION['gregimen'] : "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($this->sc_temp_glimitedeitems)) {$this->sc_temp_glimitedeitems = (isset($_SESSION['glimitedeitems'])) ? $_SESSION['glimitedeitems'] : "";}
if (!isset($this->sc_temp_gtotalpaginas)) {$this->sc_temp_gtotalpaginas = (isset($_SESSION['gtotalpaginas'])) ? $_SESSION['gtotalpaginas'] : "";}
if (!isset($this->sc_temp_gcontadorpaginas)) {$this->sc_temp_gcontadorpaginas = (isset($_SESSION['gcontadorpaginas'])) ? $_SESSION['gcontadorpaginas'] : "";}
if (!isset($this->sc_temp_gcontadorfactura2)) {$this->sc_temp_gcontadorfactura2 = (isset($_SESSION['gcontadorfactura2'])) ? $_SESSION['gcontadorfactura2'] : "";}
if (!isset($this->sc_temp_gcontadorfactura)) {$this->sc_temp_gcontadorfactura = (isset($_SESSION['gcontadorfactura'])) ? $_SESSION['gcontadorfactura'] : "";}
$this->sc_temp_gcontadorfactura =1;
$this->sc_temp_gcontadorfactura2=1;
$this->sc_temp_gcontadorpaginas =1;
$this->sc_temp_gtotalpaginas    =1;
$this->sc_temp_glimitedeitems   = $this->sc_temp_glineasporfactura;
$contadoritems = 0;

if($this->sc_temp_gregimen=="Regimen Simplificado")
{
	$this->Pdf->Image('../_lib/img/Factura_sinlogo_SIMPLIFICADO.png',1,1,216, 279, 'png');
}
else
{
	$this->Pdf->Image("../_lib/img/usr__NM__bg__NM__Factura_sinlogo.png", 1, 1, 216, 279, 'png', '', '', false, 300, '', false, false, 0);
}

$cell_fecha_impresion = array('posx' => 10, 'posy' => 270, 'data' => 'Fecha de impresión: '.date("d-m-Y H:i:s"), 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


			
			foreach ($this->detalleventa[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
				
				if($this->sc_temp_gcontadorfactura2>$this->sc_temp_glimitedeitems){
					
						$this->sc_temp_gtotalpaginas++;
					
						$this->sc_temp_gcontadorfactura2=1;
				}
				
				$this->sc_temp_gcontadorfactura2++;
				$contadoritems++;
			}
			
			$cell_npagina2 = array(
				
								'posx' => 180, 
								'posy' => 270, 
								'data' => 'Pagina: '.$this->sc_temp_gcontadorpaginas.' de '.$this->sc_temp_gtotalpaginas, 
								'width'      => 100, 
								'align'      => 'L', 
								'font_type'  => $this->default_font, 
								'font_size'  => 9, 
								'color_r'    => '0', 
								'color_g'    => '0', 
								'color_b'    => '0', 
								'font_style' => $this->default_style
							);

            $this->Pdf->SetFont($cell_empresa['font_type'], $cell_empresa['font_style'], $cell_empresa['font_size']);
            $this->pdf_text_color($cell_empresa['data'], $cell_empresa['color_r'], $cell_empresa['color_g'], $cell_empresa['color_b']);
            if (!empty($cell_empresa['posx']) && !empty($cell_empresa['posy']))
            {
                $this->Pdf->SetXY($cell_empresa['posx'], $cell_empresa['posy']);
            }
            elseif (!empty($cell_empresa['posx']))
            {
                $this->Pdf->SetX($cell_empresa['posx']);
            }
            elseif (!empty($cell_empresa['posy']))
            {
                $this->Pdf->SetY($cell_empresa['posy']);
            }
            $this->Pdf->Cell($cell_empresa['width'], 0, $cell_empresa['data'], 0, 0, $cell_empresa['align']);

            $this->Pdf->SetFont($cell_numnit['font_type'], $cell_numnit['font_style'], $cell_numnit['font_size']);
            $this->pdf_text_color($cell_numnit['data'], $cell_numnit['color_r'], $cell_numnit['color_g'], $cell_numnit['color_b']);
            if (!empty($cell_numnit['posx']) && !empty($cell_numnit['posy']))
            {
                $this->Pdf->SetXY($cell_numnit['posx'], $cell_numnit['posy']);
            }
            elseif (!empty($cell_numnit['posx']))
            {
                $this->Pdf->SetX($cell_numnit['posx']);
            }
            elseif (!empty($cell_numnit['posy']))
            {
                $this->Pdf->SetY($cell_numnit['posy']);
            }
            $this->Pdf->Cell($cell_numnit['width'], 0, $cell_numnit['data'], 0, 0, $cell_numnit['align']);

            $this->Pdf->SetFont($cell_numfacven['font_type'], $cell_numfacven['font_style'], $cell_numfacven['font_size']);
            $this->pdf_text_color($cell_numfacven['data'], $cell_numfacven['color_r'], $cell_numfacven['color_g'], $cell_numfacven['color_b']);
            if (!empty($cell_numfacven['posx']) && !empty($cell_numfacven['posy']))
            {
                $this->Pdf->SetXY($cell_numfacven['posx'], $cell_numfacven['posy']);
            }
            elseif (!empty($cell_numfacven['posx']))
            {
                $this->Pdf->SetX($cell_numfacven['posx']);
            }
            elseif (!empty($cell_numfacven['posy']))
            {
                $this->Pdf->SetY($cell_numfacven['posy']);
            }
            $this->Pdf->Cell($cell_numfacven['width'], 0, $cell_numfacven['data'], 0, 0, $cell_numfacven['align']);

            $this->Pdf->SetFont($cell_credito['font_type'], $cell_credito['font_style'], $cell_credito['font_size']);
            $this->pdf_text_color($cell_credito['data'], $cell_credito['color_r'], $cell_credito['color_g'], $cell_credito['color_b']);
            if (!empty($cell_credito['posx']) && !empty($cell_credito['posy']))
            {
                $this->Pdf->SetXY($cell_credito['posx'], $cell_credito['posy']);
            }
            elseif (!empty($cell_credito['posx']))
            {
                $this->Pdf->SetX($cell_credito['posx']);
            }
            elseif (!empty($cell_credito['posy']))
            {
                $this->Pdf->SetY($cell_credito['posy']);
            }
            $this->Pdf->Cell($cell_credito['width'], 0, $cell_credito['data'], 0, 0, $cell_credito['align']);

            $this->Pdf->SetFont($cell_fechaven['font_type'], $cell_fechaven['font_style'], $cell_fechaven['font_size']);
            $this->pdf_text_color($cell_fechaven['data'], $cell_fechaven['color_r'], $cell_fechaven['color_g'], $cell_fechaven['color_b']);
            if (!empty($cell_fechaven['posx']) && !empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetXY($cell_fechaven['posx'], $cell_fechaven['posy']);
            }
            elseif (!empty($cell_fechaven['posx']))
            {
                $this->Pdf->SetX($cell_fechaven['posx']);
            }
            elseif (!empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetY($cell_fechaven['posy']);
            }
            $this->Pdf->Cell($cell_fechaven['width'], 0, $cell_fechaven['data'], 0, 0, $cell_fechaven['align']);

            $this->Pdf->SetFont($cell_fechavenc['font_type'], $cell_fechavenc['font_style'], $cell_fechavenc['font_size']);
            $this->pdf_text_color($cell_fechavenc['data'], $cell_fechavenc['color_r'], $cell_fechavenc['color_g'], $cell_fechavenc['color_b']);
            if (!empty($cell_fechavenc['posx']) && !empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetXY($cell_fechavenc['posx'], $cell_fechavenc['posy']);
            }
            elseif (!empty($cell_fechavenc['posx']))
            {
                $this->Pdf->SetX($cell_fechavenc['posx']);
            }
            elseif (!empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetY($cell_fechavenc['posy']);
            }
            $this->Pdf->Cell($cell_fechavenc['width'], 0, $cell_fechavenc['data'], 0, 0, $cell_fechavenc['align']);

            $this->Pdf->SetFont($cell_idcli['font_type'], $cell_idcli['font_style'], $cell_idcli['font_size']);
            $this->pdf_text_color($cell_idcli['data'], $cell_idcli['color_r'], $cell_idcli['color_g'], $cell_idcli['color_b']);
            if (!empty($cell_idcli['posx']) && !empty($cell_idcli['posy']))
            {
                $this->Pdf->SetXY($cell_idcli['posx'], $cell_idcli['posy']);
            }
            elseif (!empty($cell_idcli['posx']))
            {
                $this->Pdf->SetX($cell_idcli['posx']);
            }
            elseif (!empty($cell_idcli['posy']))
            {
                $this->Pdf->SetY($cell_idcli['posy']);
            }
            $this->Pdf->Cell($cell_idcli['width'], 0, $cell_idcli['data'], 0, 0, $cell_idcli['align']);

            $this->Pdf->SetFont($cell_reg['font_type'], $cell_reg['font_style'], $cell_reg['font_size']);
            $this->pdf_text_color($cell_reg['data'], $cell_reg['color_r'], $cell_reg['color_g'], $cell_reg['color_b']);
            if (!empty($cell_reg['posx']) && !empty($cell_reg['posy']))
            {
                $this->Pdf->SetXY($cell_reg['posx'], $cell_reg['posy']);
            }
            elseif (!empty($cell_reg['posx']))
            {
                $this->Pdf->SetX($cell_reg['posx']);
            }
            elseif (!empty($cell_reg['posy']))
            {
                $this->Pdf->SetY($cell_reg['posy']);
            }
            $this->Pdf->Cell($cell_reg['width'], 0, $cell_reg['data'], 0, 0, $cell_reg['align']);

            $this->Pdf->SetFont($cell_88['font_type'], $cell_88['font_style'], $cell_88['font_size']);
            $this->pdf_text_color($cell_88['data'], $cell_88['color_r'], $cell_88['color_g'], $cell_88['color_b']);
            if (!empty($cell_88['posx']) && !empty($cell_88['posy']))
            {
                $this->Pdf->SetXY($cell_88['posx'], $cell_88['posy']);
            }
            elseif (!empty($cell_88['posx']))
            {
                $this->Pdf->SetX($cell_88['posx']);
            }
            elseif (!empty($cell_88['posy']))
            {
                $this->Pdf->SetY($cell_88['posy']);
            }
            $this->Pdf->Cell($cell_88['width'], 0, $cell_88['data'], 0, 0, $cell_88['align']);

            $this->Pdf->SetFont($cell_89['font_type'], $cell_89['font_style'], $cell_89['font_size']);
            $this->pdf_text_color($cell_89['data'], $cell_89['color_r'], $cell_89['color_g'], $cell_89['color_b']);
            if (!empty($cell_89['posx']) && !empty($cell_89['posy']))
            {
                $this->Pdf->SetXY($cell_89['posx'], $cell_89['posy']);
            }
            elseif (!empty($cell_89['posx']))
            {
                $this->Pdf->SetX($cell_89['posx']);
            }
            elseif (!empty($cell_89['posy']))
            {
                $this->Pdf->SetY($cell_89['posy']);
            }
            $this->Pdf->Cell($cell_89['width'], 0, $cell_89['data'], 0, 0, $cell_89['align']);

			if($this->sc_temp_gtotalpaginas==1)
			{

            $this->Pdf->SetFont($cell_subtotal['font_type'], $cell_subtotal['font_style'], $cell_subtotal['font_size']);
            $this->pdf_text_color($cell_subtotal['data'], $cell_subtotal['color_r'], $cell_subtotal['color_g'], $cell_subtotal['color_b']);
            if (!empty($cell_subtotal['posx']) && !empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetXY($cell_subtotal['posx'], $cell_subtotal['posy']);
            }
            elseif (!empty($cell_subtotal['posx']))
            {
                $this->Pdf->SetX($cell_subtotal['posx']);
            }
            elseif (!empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetY($cell_subtotal['posy']);
            }
            $this->Pdf->Cell($cell_subtotal['width'], 0, $cell_subtotal['data'], 0, 0, $cell_subtotal['align']);

            $this->Pdf->SetFont($cell_valoriva['font_type'], $cell_valoriva['font_style'], $cell_valoriva['font_size']);
            $this->pdf_text_color($cell_valoriva['data'], $cell_valoriva['color_r'], $cell_valoriva['color_g'], $cell_valoriva['color_b']);
            if (!empty($cell_valoriva['posx']) && !empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetXY($cell_valoriva['posx'], $cell_valoriva['posy']);
            }
            elseif (!empty($cell_valoriva['posx']))
            {
                $this->Pdf->SetX($cell_valoriva['posx']);
            }
            elseif (!empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetY($cell_valoriva['posy']);
            }
            $this->Pdf->Cell($cell_valoriva['width'], 0, $cell_valoriva['data'], 0, 0, $cell_valoriva['align']);

            $this->Pdf->SetFont($cell_total['font_type'], $cell_total['font_style'], $cell_total['font_size']);
            $this->pdf_text_color($cell_total['data'], $cell_total['color_r'], $cell_total['color_g'], $cell_total['color_b']);
            if (!empty($cell_total['posx']) && !empty($cell_total['posy']))
            {
                $this->Pdf->SetXY($cell_total['posx'], $cell_total['posy']);
            }
            elseif (!empty($cell_total['posx']))
            {
                $this->Pdf->SetX($cell_total['posx']);
            }
            elseif (!empty($cell_total['posy']))
            {
                $this->Pdf->SetY($cell_total['posy']);
            }
            $this->Pdf->Cell($cell_total['width'], 0, $cell_total['data'], 0, 0, $cell_total['align']);

				
				$cell_npagina2 = array(

									'posx' => 180, 
									'posy' => 270, 
									'data' => 'Pagina: '.$this->sc_temp_gcontadorpaginas.' de 1', 
									'width'      => 100, 
									'align'      => 'L', 
									'font_type'  => $this->default_font, 
									'font_size'  => 9, 
									'color_r'    => '0', 
									'color_g'    => '0', 
									'color_b'    => '0', 
									'font_style' => $this->default_style
								);
			}

            $this->Pdf->SetFont($cell_npagina2['font_type'], $cell_npagina2['font_style'], $cell_npagina2['font_size']);
            $this->pdf_text_color($cell_npagina2['data'], $cell_npagina2['color_r'], $cell_npagina2['color_g'], $cell_npagina2['color_b']);
            if (!empty($cell_npagina2['posx']) && !empty($cell_npagina2['posy']))
            {
                $this->Pdf->SetXY($cell_npagina2['posx'], $cell_npagina2['posy']);
            }
            elseif (!empty($cell_npagina2['posx']))
            {
                $this->Pdf->SetX($cell_npagina2['posx']);
            }
            elseif (!empty($cell_npagina2['posy']))
            {
                $this->Pdf->SetY($cell_npagina2['posy']);
            }
            $this->Pdf->Cell($cell_npagina2['width'], 0, $cell_npagina2['data'], 0, 0, $cell_npagina2['align']);

            $this->Pdf->SetFont($cell_fecha_impresion['font_type'], $cell_fecha_impresion['font_style'], $cell_fecha_impresion['font_size']);
            $this->pdf_text_color($cell_fecha_impresion['data'], $cell_fecha_impresion['color_r'], $cell_fecha_impresion['color_g'], $cell_fecha_impresion['color_b']);
            if (!empty($cell_fecha_impresion['posx']) && !empty($cell_fecha_impresion['posy']))
            {
                $this->Pdf->SetXY($cell_fecha_impresion['posx'], $cell_fecha_impresion['posy']);
            }
            elseif (!empty($cell_fecha_impresion['posx']))
            {
                $this->Pdf->SetX($cell_fecha_impresion['posx']);
            }
            elseif (!empty($cell_fecha_impresion['posy']))
            {
                $this->Pdf->SetY($cell_fecha_impresion['posy']);
            }
            $this->Pdf->Cell($cell_fecha_impresion['width'], 0, $cell_fecha_impresion['data'], 0, 0, $cell_fecha_impresion['align']);

            $this->Pdf->SetFont($cell_documento['font_type'], $cell_documento['font_style'], $cell_documento['font_size']);
            $this->pdf_text_color($cell_documento['data'], $cell_documento['color_r'], $cell_documento['color_g'], $cell_documento['color_b']);
            if (!empty($cell_documento['posx']) && !empty($cell_documento['posy']))
            {
                $this->Pdf->SetXY($cell_documento['posx'], $cell_documento['posy']);
            }
            elseif (!empty($cell_documento['posx']))
            {
                $this->Pdf->SetX($cell_documento['posx']);
            }
            elseif (!empty($cell_documento['posy']))
            {
                $this->Pdf->SetY($cell_documento['posy']);
            }
            $this->Pdf->Cell($cell_documento['width'], 0, $cell_documento['data'], 0, 0, $cell_documento['align']);

            $this->Pdf->SetFont($cell_direccion['font_type'], $cell_direccion['font_style'], $cell_direccion['font_size']);
            $this->pdf_text_color($cell_direccion['data'], $cell_direccion['color_r'], $cell_direccion['color_g'], $cell_direccion['color_b']);
            if (!empty($cell_direccion['posx']) && !empty($cell_direccion['posy']))
            {
                $this->Pdf->SetXY($cell_direccion['posx'], $cell_direccion['posy']);
            }
            elseif (!empty($cell_direccion['posx']))
            {
                $this->Pdf->SetX($cell_direccion['posx']);
            }
            elseif (!empty($cell_direccion['posy']))
            {
                $this->Pdf->SetY($cell_direccion['posy']);
            }
            $this->Pdf->Cell($cell_direccion['width'], 0, $cell_direccion['data'], 0, 0, $cell_direccion['align']);

            $this->Pdf->SetFont($cell_telefono['font_type'], $cell_telefono['font_style'], $cell_telefono['font_size']);
            $this->pdf_text_color($cell_telefono['data'], $cell_telefono['color_r'], $cell_telefono['color_g'], $cell_telefono['color_b']);
            if (!empty($cell_telefono['posx']) && !empty($cell_telefono['posy']))
            {
                $this->Pdf->SetXY($cell_telefono['posx'], $cell_telefono['posy']);
            }
            elseif (!empty($cell_telefono['posx']))
            {
                $this->Pdf->SetX($cell_telefono['posx']);
            }
            elseif (!empty($cell_telefono['posy']))
            {
                $this->Pdf->SetY($cell_telefono['posy']);
            }
            $this->Pdf->Cell($cell_telefono['width'], 0, $cell_telefono['data'], 0, 0, $cell_telefono['align']);

            $this->Pdf->SetFont($cell_email['font_type'], $cell_email['font_style'], $cell_email['font_size']);
            $this->pdf_text_color($cell_email['data'], $cell_email['color_r'], $cell_email['color_g'], $cell_email['color_b']);
            if (!empty($cell_email['posx']) && !empty($cell_email['posy']))
            {
                $this->Pdf->SetXY($cell_email['posx'], $cell_email['posy']);
            }
            elseif (!empty($cell_email['posx']))
            {
                $this->Pdf->SetX($cell_email['posx']);
            }
            elseif (!empty($cell_email['posy']))
            {
                $this->Pdf->SetY($cell_email['posy']);
            }
            $this->Pdf->Cell($cell_email['width'], 0, $cell_email['data'], 0, 0, $cell_email['align']);

            $this->Pdf->SetFont($cell_ctas_banco['font_type'], $cell_ctas_banco['font_style'], $cell_ctas_banco['font_size']);
            $this->pdf_text_color($cell_ctas_banco['data'], $cell_ctas_banco['color_r'], $cell_ctas_banco['color_g'], $cell_ctas_banco['color_b']);
            if (!empty($cell_ctas_banco['posx']) && !empty($cell_ctas_banco['posy']))
            {
                $this->Pdf->SetXY($cell_ctas_banco['posx'], $cell_ctas_banco['posy']);
            }
            elseif (!empty($cell_ctas_banco['posx']))
            {
                $this->Pdf->SetX($cell_ctas_banco['posx']);
            }
            elseif (!empty($cell_ctas_banco['posy']))
            {
                $this->Pdf->SetY($cell_ctas_banco['posy']);
            }
            $this->Pdf->Cell($cell_ctas_banco['width'], 0, $cell_ctas_banco['data'], 0, 0, $cell_ctas_banco['align']);

            $this->Pdf->SetFont($cell_davivienda['font_type'], $cell_davivienda['font_style'], $cell_davivienda['font_size']);
            $this->pdf_text_color($cell_davivienda['data'], $cell_davivienda['color_r'], $cell_davivienda['color_g'], $cell_davivienda['color_b']);
            if (!empty($cell_davivienda['posx']) && !empty($cell_davivienda['posy']))
            {
                $this->Pdf->SetXY($cell_davivienda['posx'], $cell_davivienda['posy']);
            }
            elseif (!empty($cell_davivienda['posx']))
            {
                $this->Pdf->SetX($cell_davivienda['posx']);
            }
            elseif (!empty($cell_davivienda['posy']))
            {
                $this->Pdf->SetY($cell_davivienda['posy']);
            }
            $this->Pdf->Cell($cell_davivienda['width'], 0, $cell_davivienda['data'], 0, 0, $cell_davivienda['align']);

            $this->Pdf->SetFont($cell_bancolombia['font_type'], $cell_bancolombia['font_style'], $cell_bancolombia['font_size']);
            $this->pdf_text_color($cell_bancolombia['data'], $cell_bancolombia['color_r'], $cell_bancolombia['color_g'], $cell_bancolombia['color_b']);
            if (!empty($cell_bancolombia['posx']) && !empty($cell_bancolombia['posy']))
            {
                $this->Pdf->SetXY($cell_bancolombia['posx'], $cell_bancolombia['posy']);
            }
            elseif (!empty($cell_bancolombia['posx']))
            {
                $this->Pdf->SetX($cell_bancolombia['posx']);
            }
            elseif (!empty($cell_bancolombia['posy']))
            {
                $this->Pdf->SetY($cell_bancolombia['posy']);
            }
            $this->Pdf->Cell($cell_bancolombia['width'], 0, $cell_bancolombia['data'], 0, 0, $cell_bancolombia['align']);

            $this->Pdf->SetFont($cell_cucuta['font_type'], $cell_cucuta['font_style'], $cell_cucuta['font_size']);
            $this->pdf_text_color($cell_cucuta['data'], $cell_cucuta['color_r'], $cell_cucuta['color_g'], $cell_cucuta['color_b']);
            if (!empty($cell_cucuta['posx']) && !empty($cell_cucuta['posy']))
            {
                $this->Pdf->SetXY($cell_cucuta['posx'], $cell_cucuta['posy']);
            }
            elseif (!empty($cell_cucuta['posx']))
            {
                $this->Pdf->SetX($cell_cucuta['posx']);
            }
            elseif (!empty($cell_cucuta['posy']))
            {
                $this->Pdf->SetY($cell_cucuta['posy']);
            }
            $this->Pdf->Cell($cell_cucuta['width'], 0, $cell_cucuta['data'], 0, 0, $cell_cucuta['align']);

            $this->Pdf->SetFont($cell_nota['font_type'], $cell_nota['font_style'], $cell_nota['font_size']);
            $this->pdf_text_color($cell_nota['data'], $cell_nota['color_r'], $cell_nota['color_g'], $cell_nota['color_b']);
            if (!empty($cell_nota['posx']) && !empty($cell_nota['posy']))
            {
                $this->Pdf->SetXY($cell_nota['posx'], $cell_nota['posy']);
            }
            elseif (!empty($cell_nota['posx']))
            {
                $this->Pdf->SetX($cell_nota['posx']);
            }
            elseif (!empty($cell_nota['posy']))
            {
                $this->Pdf->SetY($cell_nota['posy']);
            }
            $this->Pdf->Cell($cell_nota['width'], 0, $cell_nota['data'], 0, 0, $cell_nota['align']);

            $this->Pdf->SetFont($cell_municipio['font_type'], $cell_municipio['font_style'], $cell_municipio['font_size']);
            $this->pdf_text_color($cell_municipio['data'], $cell_municipio['color_r'], $cell_municipio['color_g'], $cell_municipio['color_b']);
            if (!empty($cell_municipio['posx']) && !empty($cell_municipio['posy']))
            {
                $this->Pdf->SetXY($cell_municipio['posx'], $cell_municipio['posy']);
            }
            elseif (!empty($cell_municipio['posx']))
            {
                $this->Pdf->SetX($cell_municipio['posx']);
            }
            elseif (!empty($cell_municipio['posy']))
            {
                $this->Pdf->SetY($cell_municipio['posy']);
            }
            $this->Pdf->Cell($cell_municipio['width'], 0, $cell_municipio['data'], 0, 0, $cell_municipio['align']);

            $this->Pdf->SetFont($cell_ladireccion['font_type'], $cell_ladireccion['font_style'], $cell_ladireccion['font_size']);
            $this->pdf_text_color($cell_ladireccion['data'], $cell_ladireccion['color_r'], $cell_ladireccion['color_g'], $cell_ladireccion['color_b']);
            if (!empty($cell_ladireccion['posx']) && !empty($cell_ladireccion['posy']))
            {
                $this->Pdf->SetXY($cell_ladireccion['posx'], $cell_ladireccion['posy']);
            }
            elseif (!empty($cell_ladireccion['posx']))
            {
                $this->Pdf->SetX($cell_ladireccion['posx']);
            }
            elseif (!empty($cell_ladireccion['posy']))
            {
                $this->Pdf->SetY($cell_ladireccion['posy']);
            }
            $this->Pdf->Cell($cell_ladireccion['width'], 0, $cell_ladireccion['data'], 0, 0, $cell_ladireccion['align']);

            $this->Pdf->SetFont($cell_numtele['font_type'], $cell_numtele['font_style'], $cell_numtele['font_size']);
            $this->pdf_text_color($cell_numtele['data'], $cell_numtele['color_r'], $cell_numtele['color_g'], $cell_numtele['color_b']);
            if (!empty($cell_numtele['posx']) && !empty($cell_numtele['posy']))
            {
                $this->Pdf->SetXY($cell_numtele['posx'], $cell_numtele['posy']);
            }
            elseif (!empty($cell_numtele['posx']))
            {
                $this->Pdf->SetX($cell_numtele['posx']);
            }
            elseif (!empty($cell_numtele['posy']))
            {
                $this->Pdf->SetY($cell_numtele['posy']);
            }
            $this->Pdf->Cell($cell_numtele['width'], 0, $cell_numtele['data'], 0, 0, $cell_numtele['align']);

            $this->Pdf->SetFont($cell_resolucion['font_type'], $cell_resolucion['font_style'], $cell_resolucion['font_size']);
            $this->pdf_text_color($cell_resolucion['data'], $cell_resolucion['color_r'], $cell_resolucion['color_g'], $cell_resolucion['color_b']);
            if (!empty($cell_resolucion['posx']) && !empty($cell_resolucion['posy']))
            {
                $this->Pdf->SetXY($cell_resolucion['posx'], $cell_resolucion['posy']);
            }
            elseif (!empty($cell_resolucion['posx']))
            {
                $this->Pdf->SetX($cell_resolucion['posx']);
            }
            elseif (!empty($cell_resolucion['posy']))
            {
                $this->Pdf->SetY($cell_resolucion['posy']);
            }
            $this->Pdf->Cell($cell_resolucion['width'], 0, $cell_resolucion['data'], 0, 0, $cell_resolucion['align']);

            $this->Pdf->SetFont($cell_rangofac['font_type'], $cell_rangofac['font_style'], $cell_rangofac['font_size']);
            $this->pdf_text_color($cell_rangofac['data'], $cell_rangofac['color_r'], $cell_rangofac['color_g'], $cell_rangofac['color_b']);
            if (!empty($cell_rangofac['posx']) && !empty($cell_rangofac['posy']))
            {
                $this->Pdf->SetXY($cell_rangofac['posx'], $cell_rangofac['posy']);
            }
            elseif (!empty($cell_rangofac['posx']))
            {
                $this->Pdf->SetX($cell_rangofac['posx']);
            }
            elseif (!empty($cell_rangofac['posy']))
            {
                $this->Pdf->SetY($cell_rangofac['posy']);
            }
            $this->Pdf->Cell($cell_rangofac['width'], 0, $cell_rangofac['data'], 0, 0, $cell_rangofac['align']);

            $this->Pdf->SetFont($cell_fechares['font_type'], $cell_fechares['font_style'], $cell_fechares['font_size']);
            $this->pdf_text_color($cell_fechares['data'], $cell_fechares['color_r'], $cell_fechares['color_g'], $cell_fechares['color_b']);
            if (!empty($cell_fechares['posx']) && !empty($cell_fechares['posy']))
            {
                $this->Pdf->SetXY($cell_fechares['posx'], $cell_fechares['posy']);
            }
            elseif (!empty($cell_fechares['posx']))
            {
                $this->Pdf->SetX($cell_fechares['posx']);
            }
            elseif (!empty($cell_fechares['posy']))
            {
                $this->Pdf->SetY($cell_fechares['posy']);
            }
            $this->Pdf->Cell($cell_fechares['width'], 0, $cell_fechares['data'], 0, 0, $cell_fechares['align']);

            $this->Pdf->SetFont($cell_prefijo['font_type'], $cell_prefijo['font_style'], $cell_prefijo['font_size']);
            $this->pdf_text_color($cell_prefijo['data'], $cell_prefijo['color_r'], $cell_prefijo['color_g'], $cell_prefijo['color_b']);
            if (!empty($cell_prefijo['posx']) && !empty($cell_prefijo['posy']))
            {
                $this->Pdf->SetXY($cell_prefijo['posx'], $cell_prefijo['posy']);
            }
            elseif (!empty($cell_prefijo['posx']))
            {
                $this->Pdf->SetX($cell_prefijo['posx']);
            }
            elseif (!empty($cell_prefijo['posy']))
            {
                $this->Pdf->SetY($cell_prefijo['posy']);
            }
            $this->Pdf->Cell($cell_prefijo['width'], 0, $cell_prefijo['data'], 0, 0, $cell_prefijo['align']);

            $this->Pdf->SetFont($cell_digito['font_type'], $cell_digito['font_style'], $cell_digito['font_size']);
            $this->pdf_text_color($cell_digito['data'], $cell_digito['color_r'], $cell_digito['color_g'], $cell_digito['color_b']);
            if (!empty($cell_digito['posx']) && !empty($cell_digito['posy']))
            {
                $this->Pdf->SetXY($cell_digito['posx'], $cell_digito['posy']);
            }
            elseif (!empty($cell_digito['posx']))
            {
                $this->Pdf->SetX($cell_digito['posx']);
            }
            elseif (!empty($cell_digito['posy']))
            {
                $this->Pdf->SetY($cell_digito['posy']);
            }
            $this->Pdf->Cell($cell_digito['width'], 0, $cell_digito['data'], 0, 0, $cell_digito['align']);

            $this->Pdf->SetFont($cell_nomsucursal['font_type'], $cell_nomsucursal['font_style'], $cell_nomsucursal['font_size']);
            $this->pdf_text_color($cell_nomsucursal['data'], $cell_nomsucursal['color_r'], $cell_nomsucursal['color_g'], $cell_nomsucursal['color_b']);
            if (!empty($cell_nomsucursal['posx']) && !empty($cell_nomsucursal['posy']))
            {
                $this->Pdf->SetXY($cell_nomsucursal['posx'], $cell_nomsucursal['posy']);
            }
            elseif (!empty($cell_nomsucursal['posx']))
            {
                $this->Pdf->SetX($cell_nomsucursal['posx']);
            }
            elseif (!empty($cell_nomsucursal['posy']))
            {
                $this->Pdf->SetY($cell_nomsucursal['posy']);
            }
            $this->Pdf->Cell($cell_nomsucursal['width'], 0, $cell_nomsucursal['data'], 0, 0, $cell_nomsucursal['align']);

            $this->Pdf->SetFont($cell_50['font_type'], $cell_50['font_style'], $cell_50['font_size']);
            $this->pdf_text_color($cell_50['data'], $cell_50['color_r'], $cell_50['color_g'], $cell_50['color_b']);
            if (!empty($cell_50['posx']) && !empty($cell_50['posy']))
            {
                $this->Pdf->SetXY($cell_50['posx'], $cell_50['posy']);
            }
            elseif (!empty($cell_50['posx']))
            {
                $this->Pdf->SetX($cell_50['posx']);
            }
            elseif (!empty($cell_50['posy']))
            {
                $this->Pdf->SetY($cell_50['posy']);
            }
            $this->Pdf->Cell($cell_50['width'], 0, $cell_50['data'], 0, 0, $cell_50['align']);

            $this->Pdf->SetFont($cell_51['font_type'], $cell_51['font_style'], $cell_51['font_size']);
            $this->pdf_text_color($cell_51['data'], $cell_51['color_r'], $cell_51['color_g'], $cell_51['color_b']);
            if (!empty($cell_51['posx']) && !empty($cell_51['posy']))
            {
                $this->Pdf->SetXY($cell_51['posx'], $cell_51['posy']);
            }
            elseif (!empty($cell_51['posx']))
            {
                $this->Pdf->SetX($cell_51['posx']);
            }
            elseif (!empty($cell_51['posy']))
            {
                $this->Pdf->SetY($cell_51['posy']);
            }
            $this->Pdf->Cell($cell_51['width'], 0, $cell_51['data'], 0, 0, $cell_51['align']);

            if (isset($cell_logo['data']) && !empty($cell_logo['data']) && is_file($cell_logo['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_logo['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_logo['data'], $cell_logo['posx'], $cell_logo['posy'], 0, 0);
                }
            }

            $this->Pdf->SetY(84);
			
			$v_i = 0;
            foreach ($this->detalleventa[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
				
				$vnombres = $this->detalleventa_p_nompro[$this->nm_grid_colunas];
				$vnombre  = $vnombres[$v_i];
                $this->Pdf->SetFont($cell_detalleventa_p_codigobar['font_type'], $cell_detalleventa_p_codigobar['font_style'], $cell_detalleventa_p_codigobar['font_size']);
                if (!empty($cell_detalleventa_p_codigobar['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_p_codigobar['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detalleventa_p_codigobar['color_r'], $cell_detalleventa_p_codigobar['color_g'], $cell_detalleventa_p_codigobar['color_b']);
                $this->Pdf->writeHTMLCell($cell_detalleventa_p_codigobar['width'], 0, $atu_X, $atu_Y, $this->detalleventa_p_codigobar[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detalleventa_p_codigobar['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detalleventa_cantidad['font_type'], $cell_detalleventa_cantidad['font_style'], $cell_detalleventa_cantidad['font_size']);
                if (!empty($cell_detalleventa_cantidad['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_cantidad['posx']);
                }
                $this->pdf_text_color($this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind], $cell_detalleventa_cantidad['color_r'], $cell_detalleventa_cantidad['color_g'], $cell_detalleventa_cantidad['color_b']);
                $this->Pdf->Cell($cell_detalleventa_cantidad['width'], 0, $this->detalleventa_cantidad[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalleventa_cantidad['align']);
                $this->Pdf->SetFont($cell_detalleventa_p_nompro['font_type'], $cell_detalleventa_p_nompro['font_style'], $cell_detalleventa_p_nompro['font_size']);
                if (!empty($cell_detalleventa_p_nompro['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_p_nompro['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detalleventa_p_nompro['color_r'], $cell_detalleventa_p_nompro['color_g'], $cell_detalleventa_p_nompro['color_b']);
                $this->Pdf->writeHTMLCell($cell_detalleventa_p_nompro['width'], 0, $atu_X, $atu_Y, $this->detalleventa_p_nompro[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detalleventa_p_nompro['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detalleventa_valorunita['font_type'], $cell_detalleventa_valorunita['font_style'], $cell_detalleventa_valorunita['font_size']);
                if (!empty($cell_detalleventa_valorunita['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_valorunita['posx']);
                }
                $this->pdf_text_color($this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind], $cell_detalleventa_valorunita['color_r'], $cell_detalleventa_valorunita['color_g'], $cell_detalleventa_valorunita['color_b']);
                $this->Pdf->Cell($cell_detalleventa_valorunita['width'], 0, $this->detalleventa_valorunita[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalleventa_valorunita['align']);
                $this->Pdf->SetFont($cell_detalleventa_parcial['font_type'], $cell_detalleventa_parcial['font_style'], $cell_detalleventa_parcial['font_size']);
                if (!empty($cell_detalleventa_parcial['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_parcial['posx']);
                }
                $this->pdf_text_color($this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind], $cell_detalleventa_parcial['color_r'], $cell_detalleventa_parcial['color_g'], $cell_detalleventa_parcial['color_b']);
                $this->Pdf->Cell($cell_detalleventa_parcial['width'], 0, $this->detalleventa_parcial[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalleventa_parcial['align']);
                $this->Pdf->SetFont($cell_detalleventa_fl_adicional['font_type'], $cell_detalleventa_fl_adicional['font_style'], $cell_detalleventa_fl_adicional['font_size']);
                if (!empty($cell_detalleventa_fl_adicional['posx']))
                {
                    $this->Pdf->SetX($cell_detalleventa_fl_adicional['posx']);
                }
                $this->pdf_text_color($this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind], $cell_detalleventa_fl_adicional['color_r'], $cell_detalleventa_fl_adicional['color_g'], $cell_detalleventa_fl_adicional['color_b']);
                $this->Pdf->Cell($cell_detalleventa_fl_adicional['width'], 0, $this->detalleventa_fl_adicional[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalleventa_fl_adicional['align']);

				
				$vlinean = 3.5;
				if(strlen($vnombre)>=40)
				{
					$vlinean = 7;
				}
				if(strlen($vnombre)>=80)
				{
					$vlinean = 10.5;
				}
				if(strlen($vnombre)>=120)
				{
					$vlinean = 14;
				}
				if(strlen($vnombre)>=160)
				{
					$vlinean = 17.5;
				}
				if(strlen($vnombre)>=200)
				{
					$vlinean = 21;
				}
				if(strlen($vnombre)>=240)
				{
					$vlinean = 24.5;
				}
				if(strlen($vnombre)>=280)
				{
					$vlinean = 28;
				}
				if(strlen($vnombre)>=320)
				{
					$vlinean = 31.5;
				}
				
				$this->Pdf->Ln($vlinean);
				
				$v_i++;
				
				if($this->sc_temp_gcontadorfactura==$this->sc_temp_glimitedeitems  and $contadoritems > $this->sc_temp_glimitedeitems){
					
						$this->sc_temp_gcontadorpaginas++;
					
						$cell_npagina3 = array(
							
											'posx' => 180, 
											'posy' => 270, 
											'data' => 'Pagina: '.$this->sc_temp_gcontadorpaginas.' de '.$this->sc_temp_gtotalpaginas, 
											'width'      => 100, 
											'align'      => 'L', 
											'font_type'  => $this->default_font, 
											'font_size'  => 9, 
											'color_r'    => '0', 
											'color_g'    => '0', 
											'color_b'    => '0', 
											'font_style' => $this->default_style
										 );
					
						$this->Pdf->AddPage();

            $this->Pdf->SetFont($cell_empresa['font_type'], $cell_empresa['font_style'], $cell_empresa['font_size']);
            $this->pdf_text_color($cell_empresa['data'], $cell_empresa['color_r'], $cell_empresa['color_g'], $cell_empresa['color_b']);
            if (!empty($cell_empresa['posx']) && !empty($cell_empresa['posy']))
            {
                $this->Pdf->SetXY($cell_empresa['posx'], $cell_empresa['posy']);
            }
            elseif (!empty($cell_empresa['posx']))
            {
                $this->Pdf->SetX($cell_empresa['posx']);
            }
            elseif (!empty($cell_empresa['posy']))
            {
                $this->Pdf->SetY($cell_empresa['posy']);
            }
            $this->Pdf->Cell($cell_empresa['width'], 0, $cell_empresa['data'], 0, 0, $cell_empresa['align']);

            $this->Pdf->SetFont($cell_numnit['font_type'], $cell_numnit['font_style'], $cell_numnit['font_size']);
            $this->pdf_text_color($cell_numnit['data'], $cell_numnit['color_r'], $cell_numnit['color_g'], $cell_numnit['color_b']);
            if (!empty($cell_numnit['posx']) && !empty($cell_numnit['posy']))
            {
                $this->Pdf->SetXY($cell_numnit['posx'], $cell_numnit['posy']);
            }
            elseif (!empty($cell_numnit['posx']))
            {
                $this->Pdf->SetX($cell_numnit['posx']);
            }
            elseif (!empty($cell_numnit['posy']))
            {
                $this->Pdf->SetY($cell_numnit['posy']);
            }
            $this->Pdf->Cell($cell_numnit['width'], 0, $cell_numnit['data'], 0, 0, $cell_numnit['align']);

            $this->Pdf->SetFont($cell_numfacven['font_type'], $cell_numfacven['font_style'], $cell_numfacven['font_size']);
            $this->pdf_text_color($cell_numfacven['data'], $cell_numfacven['color_r'], $cell_numfacven['color_g'], $cell_numfacven['color_b']);
            if (!empty($cell_numfacven['posx']) && !empty($cell_numfacven['posy']))
            {
                $this->Pdf->SetXY($cell_numfacven['posx'], $cell_numfacven['posy']);
            }
            elseif (!empty($cell_numfacven['posx']))
            {
                $this->Pdf->SetX($cell_numfacven['posx']);
            }
            elseif (!empty($cell_numfacven['posy']))
            {
                $this->Pdf->SetY($cell_numfacven['posy']);
            }
            $this->Pdf->Cell($cell_numfacven['width'], 0, $cell_numfacven['data'], 0, 0, $cell_numfacven['align']);

            $this->Pdf->SetFont($cell_credito['font_type'], $cell_credito['font_style'], $cell_credito['font_size']);
            $this->pdf_text_color($cell_credito['data'], $cell_credito['color_r'], $cell_credito['color_g'], $cell_credito['color_b']);
            if (!empty($cell_credito['posx']) && !empty($cell_credito['posy']))
            {
                $this->Pdf->SetXY($cell_credito['posx'], $cell_credito['posy']);
            }
            elseif (!empty($cell_credito['posx']))
            {
                $this->Pdf->SetX($cell_credito['posx']);
            }
            elseif (!empty($cell_credito['posy']))
            {
                $this->Pdf->SetY($cell_credito['posy']);
            }
            $this->Pdf->Cell($cell_credito['width'], 0, $cell_credito['data'], 0, 0, $cell_credito['align']);

            $this->Pdf->SetFont($cell_fechaven['font_type'], $cell_fechaven['font_style'], $cell_fechaven['font_size']);
            $this->pdf_text_color($cell_fechaven['data'], $cell_fechaven['color_r'], $cell_fechaven['color_g'], $cell_fechaven['color_b']);
            if (!empty($cell_fechaven['posx']) && !empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetXY($cell_fechaven['posx'], $cell_fechaven['posy']);
            }
            elseif (!empty($cell_fechaven['posx']))
            {
                $this->Pdf->SetX($cell_fechaven['posx']);
            }
            elseif (!empty($cell_fechaven['posy']))
            {
                $this->Pdf->SetY($cell_fechaven['posy']);
            }
            $this->Pdf->Cell($cell_fechaven['width'], 0, $cell_fechaven['data'], 0, 0, $cell_fechaven['align']);

            $this->Pdf->SetFont($cell_fechavenc['font_type'], $cell_fechavenc['font_style'], $cell_fechavenc['font_size']);
            $this->pdf_text_color($cell_fechavenc['data'], $cell_fechavenc['color_r'], $cell_fechavenc['color_g'], $cell_fechavenc['color_b']);
            if (!empty($cell_fechavenc['posx']) && !empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetXY($cell_fechavenc['posx'], $cell_fechavenc['posy']);
            }
            elseif (!empty($cell_fechavenc['posx']))
            {
                $this->Pdf->SetX($cell_fechavenc['posx']);
            }
            elseif (!empty($cell_fechavenc['posy']))
            {
                $this->Pdf->SetY($cell_fechavenc['posy']);
            }
            $this->Pdf->Cell($cell_fechavenc['width'], 0, $cell_fechavenc['data'], 0, 0, $cell_fechavenc['align']);

            $this->Pdf->SetFont($cell_idcli['font_type'], $cell_idcli['font_style'], $cell_idcli['font_size']);
            $this->pdf_text_color($cell_idcli['data'], $cell_idcli['color_r'], $cell_idcli['color_g'], $cell_idcli['color_b']);
            if (!empty($cell_idcli['posx']) && !empty($cell_idcli['posy']))
            {
                $this->Pdf->SetXY($cell_idcli['posx'], $cell_idcli['posy']);
            }
            elseif (!empty($cell_idcli['posx']))
            {
                $this->Pdf->SetX($cell_idcli['posx']);
            }
            elseif (!empty($cell_idcli['posy']))
            {
                $this->Pdf->SetY($cell_idcli['posy']);
            }
            $this->Pdf->Cell($cell_idcli['width'], 0, $cell_idcli['data'], 0, 0, $cell_idcli['align']);

            $this->Pdf->SetFont($cell_reg['font_type'], $cell_reg['font_style'], $cell_reg['font_size']);
            $this->pdf_text_color($cell_reg['data'], $cell_reg['color_r'], $cell_reg['color_g'], $cell_reg['color_b']);
            if (!empty($cell_reg['posx']) && !empty($cell_reg['posy']))
            {
                $this->Pdf->SetXY($cell_reg['posx'], $cell_reg['posy']);
            }
            elseif (!empty($cell_reg['posx']))
            {
                $this->Pdf->SetX($cell_reg['posx']);
            }
            elseif (!empty($cell_reg['posy']))
            {
                $this->Pdf->SetY($cell_reg['posy']);
            }
            $this->Pdf->Cell($cell_reg['width'], 0, $cell_reg['data'], 0, 0, $cell_reg['align']);

            $this->Pdf->SetFont($cell_88['font_type'], $cell_88['font_style'], $cell_88['font_size']);
            $this->pdf_text_color($cell_88['data'], $cell_88['color_r'], $cell_88['color_g'], $cell_88['color_b']);
            if (!empty($cell_88['posx']) && !empty($cell_88['posy']))
            {
                $this->Pdf->SetXY($cell_88['posx'], $cell_88['posy']);
            }
            elseif (!empty($cell_88['posx']))
            {
                $this->Pdf->SetX($cell_88['posx']);
            }
            elseif (!empty($cell_88['posy']))
            {
                $this->Pdf->SetY($cell_88['posy']);
            }
            $this->Pdf->Cell($cell_88['width'], 0, $cell_88['data'], 0, 0, $cell_88['align']);

            $this->Pdf->SetFont($cell_89['font_type'], $cell_89['font_style'], $cell_89['font_size']);
            $this->pdf_text_color($cell_89['data'], $cell_89['color_r'], $cell_89['color_g'], $cell_89['color_b']);
            if (!empty($cell_89['posx']) && !empty($cell_89['posy']))
            {
                $this->Pdf->SetXY($cell_89['posx'], $cell_89['posy']);
            }
            elseif (!empty($cell_89['posx']))
            {
                $this->Pdf->SetX($cell_89['posx']);
            }
            elseif (!empty($cell_89['posy']))
            {
                $this->Pdf->SetY($cell_89['posy']);
            }
            $this->Pdf->Cell($cell_89['width'], 0, $cell_89['data'], 0, 0, $cell_89['align']);

						if($this->sc_temp_gtotalpaginas==$this->sc_temp_gcontadorpaginas)
						{

            $this->Pdf->SetFont($cell_subtotal['font_type'], $cell_subtotal['font_style'], $cell_subtotal['font_size']);
            $this->pdf_text_color($cell_subtotal['data'], $cell_subtotal['color_r'], $cell_subtotal['color_g'], $cell_subtotal['color_b']);
            if (!empty($cell_subtotal['posx']) && !empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetXY($cell_subtotal['posx'], $cell_subtotal['posy']);
            }
            elseif (!empty($cell_subtotal['posx']))
            {
                $this->Pdf->SetX($cell_subtotal['posx']);
            }
            elseif (!empty($cell_subtotal['posy']))
            {
                $this->Pdf->SetY($cell_subtotal['posy']);
            }
            $this->Pdf->Cell($cell_subtotal['width'], 0, $cell_subtotal['data'], 0, 0, $cell_subtotal['align']);

            $this->Pdf->SetFont($cell_valoriva['font_type'], $cell_valoriva['font_style'], $cell_valoriva['font_size']);
            $this->pdf_text_color($cell_valoriva['data'], $cell_valoriva['color_r'], $cell_valoriva['color_g'], $cell_valoriva['color_b']);
            if (!empty($cell_valoriva['posx']) && !empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetXY($cell_valoriva['posx'], $cell_valoriva['posy']);
            }
            elseif (!empty($cell_valoriva['posx']))
            {
                $this->Pdf->SetX($cell_valoriva['posx']);
            }
            elseif (!empty($cell_valoriva['posy']))
            {
                $this->Pdf->SetY($cell_valoriva['posy']);
            }
            $this->Pdf->Cell($cell_valoriva['width'], 0, $cell_valoriva['data'], 0, 0, $cell_valoriva['align']);

            $this->Pdf->SetFont($cell_total['font_type'], $cell_total['font_style'], $cell_total['font_size']);
            $this->pdf_text_color($cell_total['data'], $cell_total['color_r'], $cell_total['color_g'], $cell_total['color_b']);
            if (!empty($cell_total['posx']) && !empty($cell_total['posy']))
            {
                $this->Pdf->SetXY($cell_total['posx'], $cell_total['posy']);
            }
            elseif (!empty($cell_total['posx']))
            {
                $this->Pdf->SetX($cell_total['posx']);
            }
            elseif (!empty($cell_total['posy']))
            {
                $this->Pdf->SetY($cell_total['posy']);
            }
            $this->Pdf->Cell($cell_total['width'], 0, $cell_total['data'], 0, 0, $cell_total['align']);

						}

            $this->Pdf->SetFont($cell_npagina['font_type'], $cell_npagina['font_style'], $cell_npagina['font_size']);
            $this->pdf_text_color($cell_npagina['data'], $cell_npagina['color_r'], $cell_npagina['color_g'], $cell_npagina['color_b']);
            if (!empty($cell_npagina['posx']) && !empty($cell_npagina['posy']))
            {
                $this->Pdf->SetXY($cell_npagina['posx'], $cell_npagina['posy']);
            }
            elseif (!empty($cell_npagina['posx']))
            {
                $this->Pdf->SetX($cell_npagina['posx']);
            }
            elseif (!empty($cell_npagina['posy']))
            {
                $this->Pdf->SetY($cell_npagina['posy']);
            }
            $this->Pdf->Cell($cell_npagina['width'], 0, $cell_npagina['data'], 0, 0, $cell_npagina['align']);

            $this->Pdf->SetFont($cell_documento['font_type'], $cell_documento['font_style'], $cell_documento['font_size']);
            $this->pdf_text_color($cell_documento['data'], $cell_documento['color_r'], $cell_documento['color_g'], $cell_documento['color_b']);
            if (!empty($cell_documento['posx']) && !empty($cell_documento['posy']))
            {
                $this->Pdf->SetXY($cell_documento['posx'], $cell_documento['posy']);
            }
            elseif (!empty($cell_documento['posx']))
            {
                $this->Pdf->SetX($cell_documento['posx']);
            }
            elseif (!empty($cell_documento['posy']))
            {
                $this->Pdf->SetY($cell_documento['posy']);
            }
            $this->Pdf->Cell($cell_documento['width'], 0, $cell_documento['data'], 0, 0, $cell_documento['align']);

            $this->Pdf->SetFont($cell_direccion['font_type'], $cell_direccion['font_style'], $cell_direccion['font_size']);
            $this->pdf_text_color($cell_direccion['data'], $cell_direccion['color_r'], $cell_direccion['color_g'], $cell_direccion['color_b']);
            if (!empty($cell_direccion['posx']) && !empty($cell_direccion['posy']))
            {
                $this->Pdf->SetXY($cell_direccion['posx'], $cell_direccion['posy']);
            }
            elseif (!empty($cell_direccion['posx']))
            {
                $this->Pdf->SetX($cell_direccion['posx']);
            }
            elseif (!empty($cell_direccion['posy']))
            {
                $this->Pdf->SetY($cell_direccion['posy']);
            }
            $this->Pdf->Cell($cell_direccion['width'], 0, $cell_direccion['data'], 0, 0, $cell_direccion['align']);

            $this->Pdf->SetFont($cell_telefono['font_type'], $cell_telefono['font_style'], $cell_telefono['font_size']);
            $this->pdf_text_color($cell_telefono['data'], $cell_telefono['color_r'], $cell_telefono['color_g'], $cell_telefono['color_b']);
            if (!empty($cell_telefono['posx']) && !empty($cell_telefono['posy']))
            {
                $this->Pdf->SetXY($cell_telefono['posx'], $cell_telefono['posy']);
            }
            elseif (!empty($cell_telefono['posx']))
            {
                $this->Pdf->SetX($cell_telefono['posx']);
            }
            elseif (!empty($cell_telefono['posy']))
            {
                $this->Pdf->SetY($cell_telefono['posy']);
            }
            $this->Pdf->Cell($cell_telefono['width'], 0, $cell_telefono['data'], 0, 0, $cell_telefono['align']);

            $this->Pdf->SetFont($cell_email['font_type'], $cell_email['font_style'], $cell_email['font_size']);
            $this->pdf_text_color($cell_email['data'], $cell_email['color_r'], $cell_email['color_g'], $cell_email['color_b']);
            if (!empty($cell_email['posx']) && !empty($cell_email['posy']))
            {
                $this->Pdf->SetXY($cell_email['posx'], $cell_email['posy']);
            }
            elseif (!empty($cell_email['posx']))
            {
                $this->Pdf->SetX($cell_email['posx']);
            }
            elseif (!empty($cell_email['posy']))
            {
                $this->Pdf->SetY($cell_email['posy']);
            }
            $this->Pdf->Cell($cell_email['width'], 0, $cell_email['data'], 0, 0, $cell_email['align']);

            $this->Pdf->SetFont($cell_ctas_banco['font_type'], $cell_ctas_banco['font_style'], $cell_ctas_banco['font_size']);
            $this->pdf_text_color($cell_ctas_banco['data'], $cell_ctas_banco['color_r'], $cell_ctas_banco['color_g'], $cell_ctas_banco['color_b']);
            if (!empty($cell_ctas_banco['posx']) && !empty($cell_ctas_banco['posy']))
            {
                $this->Pdf->SetXY($cell_ctas_banco['posx'], $cell_ctas_banco['posy']);
            }
            elseif (!empty($cell_ctas_banco['posx']))
            {
                $this->Pdf->SetX($cell_ctas_banco['posx']);
            }
            elseif (!empty($cell_ctas_banco['posy']))
            {
                $this->Pdf->SetY($cell_ctas_banco['posy']);
            }
            $this->Pdf->Cell($cell_ctas_banco['width'], 0, $cell_ctas_banco['data'], 0, 0, $cell_ctas_banco['align']);

            $this->Pdf->SetFont($cell_davivienda['font_type'], $cell_davivienda['font_style'], $cell_davivienda['font_size']);
            $this->pdf_text_color($cell_davivienda['data'], $cell_davivienda['color_r'], $cell_davivienda['color_g'], $cell_davivienda['color_b']);
            if (!empty($cell_davivienda['posx']) && !empty($cell_davivienda['posy']))
            {
                $this->Pdf->SetXY($cell_davivienda['posx'], $cell_davivienda['posy']);
            }
            elseif (!empty($cell_davivienda['posx']))
            {
                $this->Pdf->SetX($cell_davivienda['posx']);
            }
            elseif (!empty($cell_davivienda['posy']))
            {
                $this->Pdf->SetY($cell_davivienda['posy']);
            }
            $this->Pdf->Cell($cell_davivienda['width'], 0, $cell_davivienda['data'], 0, 0, $cell_davivienda['align']);

            $this->Pdf->SetFont($cell_bancolombia['font_type'], $cell_bancolombia['font_style'], $cell_bancolombia['font_size']);
            $this->pdf_text_color($cell_bancolombia['data'], $cell_bancolombia['color_r'], $cell_bancolombia['color_g'], $cell_bancolombia['color_b']);
            if (!empty($cell_bancolombia['posx']) && !empty($cell_bancolombia['posy']))
            {
                $this->Pdf->SetXY($cell_bancolombia['posx'], $cell_bancolombia['posy']);
            }
            elseif (!empty($cell_bancolombia['posx']))
            {
                $this->Pdf->SetX($cell_bancolombia['posx']);
            }
            elseif (!empty($cell_bancolombia['posy']))
            {
                $this->Pdf->SetY($cell_bancolombia['posy']);
            }
            $this->Pdf->Cell($cell_bancolombia['width'], 0, $cell_bancolombia['data'], 0, 0, $cell_bancolombia['align']);

            $this->Pdf->SetFont($cell_cucuta['font_type'], $cell_cucuta['font_style'], $cell_cucuta['font_size']);
            $this->pdf_text_color($cell_cucuta['data'], $cell_cucuta['color_r'], $cell_cucuta['color_g'], $cell_cucuta['color_b']);
            if (!empty($cell_cucuta['posx']) && !empty($cell_cucuta['posy']))
            {
                $this->Pdf->SetXY($cell_cucuta['posx'], $cell_cucuta['posy']);
            }
            elseif (!empty($cell_cucuta['posx']))
            {
                $this->Pdf->SetX($cell_cucuta['posx']);
            }
            elseif (!empty($cell_cucuta['posy']))
            {
                $this->Pdf->SetY($cell_cucuta['posy']);
            }
            $this->Pdf->Cell($cell_cucuta['width'], 0, $cell_cucuta['data'], 0, 0, $cell_cucuta['align']);

            $this->Pdf->SetFont($cell_nota['font_type'], $cell_nota['font_style'], $cell_nota['font_size']);
            $this->pdf_text_color($cell_nota['data'], $cell_nota['color_r'], $cell_nota['color_g'], $cell_nota['color_b']);
            if (!empty($cell_nota['posx']) && !empty($cell_nota['posy']))
            {
                $this->Pdf->SetXY($cell_nota['posx'], $cell_nota['posy']);
            }
            elseif (!empty($cell_nota['posx']))
            {
                $this->Pdf->SetX($cell_nota['posx']);
            }
            elseif (!empty($cell_nota['posy']))
            {
                $this->Pdf->SetY($cell_nota['posy']);
            }
            $this->Pdf->Cell($cell_nota['width'], 0, $cell_nota['data'], 0, 0, $cell_nota['align']);

            $this->Pdf->SetFont($cell_municipio['font_type'], $cell_municipio['font_style'], $cell_municipio['font_size']);
            $this->pdf_text_color($cell_municipio['data'], $cell_municipio['color_r'], $cell_municipio['color_g'], $cell_municipio['color_b']);
            if (!empty($cell_municipio['posx']) && !empty($cell_municipio['posy']))
            {
                $this->Pdf->SetXY($cell_municipio['posx'], $cell_municipio['posy']);
            }
            elseif (!empty($cell_municipio['posx']))
            {
                $this->Pdf->SetX($cell_municipio['posx']);
            }
            elseif (!empty($cell_municipio['posy']))
            {
                $this->Pdf->SetY($cell_municipio['posy']);
            }
            $this->Pdf->Cell($cell_municipio['width'], 0, $cell_municipio['data'], 0, 0, $cell_municipio['align']);

            $this->Pdf->SetFont($cell_ladireccion['font_type'], $cell_ladireccion['font_style'], $cell_ladireccion['font_size']);
            $this->pdf_text_color($cell_ladireccion['data'], $cell_ladireccion['color_r'], $cell_ladireccion['color_g'], $cell_ladireccion['color_b']);
            if (!empty($cell_ladireccion['posx']) && !empty($cell_ladireccion['posy']))
            {
                $this->Pdf->SetXY($cell_ladireccion['posx'], $cell_ladireccion['posy']);
            }
            elseif (!empty($cell_ladireccion['posx']))
            {
                $this->Pdf->SetX($cell_ladireccion['posx']);
            }
            elseif (!empty($cell_ladireccion['posy']))
            {
                $this->Pdf->SetY($cell_ladireccion['posy']);
            }
            $this->Pdf->Cell($cell_ladireccion['width'], 0, $cell_ladireccion['data'], 0, 0, $cell_ladireccion['align']);

            $this->Pdf->SetFont($cell_numtele['font_type'], $cell_numtele['font_style'], $cell_numtele['font_size']);
            $this->pdf_text_color($cell_numtele['data'], $cell_numtele['color_r'], $cell_numtele['color_g'], $cell_numtele['color_b']);
            if (!empty($cell_numtele['posx']) && !empty($cell_numtele['posy']))
            {
                $this->Pdf->SetXY($cell_numtele['posx'], $cell_numtele['posy']);
            }
            elseif (!empty($cell_numtele['posx']))
            {
                $this->Pdf->SetX($cell_numtele['posx']);
            }
            elseif (!empty($cell_numtele['posy']))
            {
                $this->Pdf->SetY($cell_numtele['posy']);
            }
            $this->Pdf->Cell($cell_numtele['width'], 0, $cell_numtele['data'], 0, 0, $cell_numtele['align']);

            $this->Pdf->SetFont($cell_resolucion['font_type'], $cell_resolucion['font_style'], $cell_resolucion['font_size']);
            $this->pdf_text_color($cell_resolucion['data'], $cell_resolucion['color_r'], $cell_resolucion['color_g'], $cell_resolucion['color_b']);
            if (!empty($cell_resolucion['posx']) && !empty($cell_resolucion['posy']))
            {
                $this->Pdf->SetXY($cell_resolucion['posx'], $cell_resolucion['posy']);
            }
            elseif (!empty($cell_resolucion['posx']))
            {
                $this->Pdf->SetX($cell_resolucion['posx']);
            }
            elseif (!empty($cell_resolucion['posy']))
            {
                $this->Pdf->SetY($cell_resolucion['posy']);
            }
            $this->Pdf->Cell($cell_resolucion['width'], 0, $cell_resolucion['data'], 0, 0, $cell_resolucion['align']);

            $this->Pdf->SetFont($cell_rangofac['font_type'], $cell_rangofac['font_style'], $cell_rangofac['font_size']);
            $this->pdf_text_color($cell_rangofac['data'], $cell_rangofac['color_r'], $cell_rangofac['color_g'], $cell_rangofac['color_b']);
            if (!empty($cell_rangofac['posx']) && !empty($cell_rangofac['posy']))
            {
                $this->Pdf->SetXY($cell_rangofac['posx'], $cell_rangofac['posy']);
            }
            elseif (!empty($cell_rangofac['posx']))
            {
                $this->Pdf->SetX($cell_rangofac['posx']);
            }
            elseif (!empty($cell_rangofac['posy']))
            {
                $this->Pdf->SetY($cell_rangofac['posy']);
            }
            $this->Pdf->Cell($cell_rangofac['width'], 0, $cell_rangofac['data'], 0, 0, $cell_rangofac['align']);

            $this->Pdf->SetFont($cell_fechares['font_type'], $cell_fechares['font_style'], $cell_fechares['font_size']);
            $this->pdf_text_color($cell_fechares['data'], $cell_fechares['color_r'], $cell_fechares['color_g'], $cell_fechares['color_b']);
            if (!empty($cell_fechares['posx']) && !empty($cell_fechares['posy']))
            {
                $this->Pdf->SetXY($cell_fechares['posx'], $cell_fechares['posy']);
            }
            elseif (!empty($cell_fechares['posx']))
            {
                $this->Pdf->SetX($cell_fechares['posx']);
            }
            elseif (!empty($cell_fechares['posy']))
            {
                $this->Pdf->SetY($cell_fechares['posy']);
            }
            $this->Pdf->Cell($cell_fechares['width'], 0, $cell_fechares['data'], 0, 0, $cell_fechares['align']);

            $this->Pdf->SetFont($cell_prefijo['font_type'], $cell_prefijo['font_style'], $cell_prefijo['font_size']);
            $this->pdf_text_color($cell_prefijo['data'], $cell_prefijo['color_r'], $cell_prefijo['color_g'], $cell_prefijo['color_b']);
            if (!empty($cell_prefijo['posx']) && !empty($cell_prefijo['posy']))
            {
                $this->Pdf->SetXY($cell_prefijo['posx'], $cell_prefijo['posy']);
            }
            elseif (!empty($cell_prefijo['posx']))
            {
                $this->Pdf->SetX($cell_prefijo['posx']);
            }
            elseif (!empty($cell_prefijo['posy']))
            {
                $this->Pdf->SetY($cell_prefijo['posy']);
            }
            $this->Pdf->Cell($cell_prefijo['width'], 0, $cell_prefijo['data'], 0, 0, $cell_prefijo['align']);

            $this->Pdf->SetFont($cell_digito['font_type'], $cell_digito['font_style'], $cell_digito['font_size']);
            $this->pdf_text_color($cell_digito['data'], $cell_digito['color_r'], $cell_digito['color_g'], $cell_digito['color_b']);
            if (!empty($cell_digito['posx']) && !empty($cell_digito['posy']))
            {
                $this->Pdf->SetXY($cell_digito['posx'], $cell_digito['posy']);
            }
            elseif (!empty($cell_digito['posx']))
            {
                $this->Pdf->SetX($cell_digito['posx']);
            }
            elseif (!empty($cell_digito['posy']))
            {
                $this->Pdf->SetY($cell_digito['posy']);
            }
            $this->Pdf->Cell($cell_digito['width'], 0, $cell_digito['data'], 0, 0, $cell_digito['align']);

            $this->Pdf->SetFont($cell_nomsucursal['font_type'], $cell_nomsucursal['font_style'], $cell_nomsucursal['font_size']);
            $this->pdf_text_color($cell_nomsucursal['data'], $cell_nomsucursal['color_r'], $cell_nomsucursal['color_g'], $cell_nomsucursal['color_b']);
            if (!empty($cell_nomsucursal['posx']) && !empty($cell_nomsucursal['posy']))
            {
                $this->Pdf->SetXY($cell_nomsucursal['posx'], $cell_nomsucursal['posy']);
            }
            elseif (!empty($cell_nomsucursal['posx']))
            {
                $this->Pdf->SetX($cell_nomsucursal['posx']);
            }
            elseif (!empty($cell_nomsucursal['posy']))
            {
                $this->Pdf->SetY($cell_nomsucursal['posy']);
            }
            $this->Pdf->Cell($cell_nomsucursal['width'], 0, $cell_nomsucursal['data'], 0, 0, $cell_nomsucursal['align']);

            $this->Pdf->SetFont($cell_50['font_type'], $cell_50['font_style'], $cell_50['font_size']);
            $this->pdf_text_color($cell_50['data'], $cell_50['color_r'], $cell_50['color_g'], $cell_50['color_b']);
            if (!empty($cell_50['posx']) && !empty($cell_50['posy']))
            {
                $this->Pdf->SetXY($cell_50['posx'], $cell_50['posy']);
            }
            elseif (!empty($cell_50['posx']))
            {
                $this->Pdf->SetX($cell_50['posx']);
            }
            elseif (!empty($cell_50['posy']))
            {
                $this->Pdf->SetY($cell_50['posy']);
            }
            $this->Pdf->Cell($cell_50['width'], 0, $cell_50['data'], 0, 0, $cell_50['align']);

            $this->Pdf->SetFont($cell_51['font_type'], $cell_51['font_style'], $cell_51['font_size']);
            $this->pdf_text_color($cell_51['data'], $cell_51['color_r'], $cell_51['color_g'], $cell_51['color_b']);
            if (!empty($cell_51['posx']) && !empty($cell_51['posy']))
            {
                $this->Pdf->SetXY($cell_51['posx'], $cell_51['posy']);
            }
            elseif (!empty($cell_51['posx']))
            {
                $this->Pdf->SetX($cell_51['posx']);
            }
            elseif (!empty($cell_51['posy']))
            {
                $this->Pdf->SetY($cell_51['posy']);
            }
            $this->Pdf->Cell($cell_51['width'], 0, $cell_51['data'], 0, 0, $cell_51['align']);

            if (isset($cell_logo['data']) && !empty($cell_logo['data']) && is_file($cell_logo['data']))
            {
                $Finfo_img = finfo_open(FILEINFO_MIME_TYPE);
                $Tipo_img  = finfo_file($Finfo_img, $cell_logo['data']);
                finfo_close($Finfo_img);
                if (substr($Tipo_img, 0, 5) == "image")
                {
                    $this->Pdf->Image($cell_logo['data'], $cell_logo['posx'], $cell_logo['posy'], 0, 0);
                }
            }

            $this->Pdf->SetFont($cell_npagina3['font_type'], $cell_npagina3['font_style'], $cell_npagina3['font_size']);
            $this->pdf_text_color($cell_npagina3['data'], $cell_npagina3['color_r'], $cell_npagina3['color_g'], $cell_npagina3['color_b']);
            if (!empty($cell_npagina3['posx']) && !empty($cell_npagina3['posy']))
            {
                $this->Pdf->SetXY($cell_npagina3['posx'], $cell_npagina3['posy']);
            }
            elseif (!empty($cell_npagina3['posx']))
            {
                $this->Pdf->SetX($cell_npagina3['posx']);
            }
            elseif (!empty($cell_npagina3['posy']))
            {
                $this->Pdf->SetY($cell_npagina3['posy']);
            }
            $this->Pdf->Cell($cell_npagina3['width'], 0, $cell_npagina3['data'], 0, 0, $cell_npagina3['align']);

            $this->Pdf->SetFont($cell_fecha_impresion['font_type'], $cell_fecha_impresion['font_style'], $cell_fecha_impresion['font_size']);
            $this->pdf_text_color($cell_fecha_impresion['data'], $cell_fecha_impresion['color_r'], $cell_fecha_impresion['color_g'], $cell_fecha_impresion['color_b']);
            if (!empty($cell_fecha_impresion['posx']) && !empty($cell_fecha_impresion['posy']))
            {
                $this->Pdf->SetXY($cell_fecha_impresion['posx'], $cell_fecha_impresion['posy']);
            }
            elseif (!empty($cell_fecha_impresion['posx']))
            {
                $this->Pdf->SetX($cell_fecha_impresion['posx']);
            }
            elseif (!empty($cell_fecha_impresion['posy']))
            {
                $this->Pdf->SetY($cell_fecha_impresion['posy']);
            }
            $this->Pdf->Cell($cell_fecha_impresion['width'], 0, $cell_fecha_impresion['data'], 0, 0, $cell_fecha_impresion['align']);

            			$this->Pdf->SetY(84);
						if($this->sc_temp_gregimen=="Regimen Simplificado")
						{
							$this->Pdf->Image('../_lib/img/Factura_sinlogo_SIMPLIFICADO.png',1,1,216, 279, 'png');
						}
						else
						{
							$this->Pdf->Image("../_lib/img/usr__NM__bg__NM__Factura_sinlogo.png", 1, 1, 216, 279, 'png', '', '', false, 300, '', false, false, 0);
						}
						$this->sc_temp_gcontadorfactura=1;
				}
				
				$this->sc_temp_gcontadorfactura++;
				
            }
if (isset($this->sc_temp_gcontadorfactura)) { $_SESSION['gcontadorfactura'] = $this->sc_temp_gcontadorfactura;}
if (isset($this->sc_temp_gcontadorfactura2)) { $_SESSION['gcontadorfactura2'] = $this->sc_temp_gcontadorfactura2;}
if (isset($this->sc_temp_gcontadorpaginas)) { $_SESSION['gcontadorpaginas'] = $this->sc_temp_gcontadorpaginas;}
if (isset($this->sc_temp_gtotalpaginas)) { $_SESSION['gtotalpaginas'] = $this->sc_temp_gtotalpaginas;}
if (isset($this->sc_temp_glimitedeitems)) { $_SESSION['glimitedeitems'] = $this->sc_temp_glimitedeitems;}
if (isset($this->sc_temp_glineasporfactura)) { $_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gregimen)) { $_SESSION['gregimen'] = $this->sc_temp_gregimen;}
          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
    function SC_type_img($img_file)
    {
        $type_img = getimagesize($img_file);
        if (!$type_img)
        {
            return (".jpg");
        }
        switch ($type_img[2])
        {
           case 1:  return ".gif";   break;
           case 2:  return ".jpg";   break;
           case 3:  return ".png";   break;
           case 4:  return ".swf";   break;
           case 5:  return ".psd";   break;
           case 6:  return ".bmp";   break;
           case 7:  return ".tiff";  break;
           case 8:  return ".tiff";  break;
           case 9:  return ".jpc";   break;
           case 10: return ".jp2";   break;
           case 11: return ".jpx";   break;
           case 12: return ".jb2";   break;
           case 13: return ".swc";   break;
           case 14: return ".ief";   break;
           case 15: return ".wbmp";  break;
           case 16: return ".xbm";   break;
           default: return ".jpg";   break;
        }
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
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'on';
if (!isset($_SESSION['par_numfacventa'])) {$_SESSION['par_numfacventa'] = "";}
if (!isset($this->sc_temp_par_numfacventa)) {$this->sc_temp_par_numfacventa = (isset($_SESSION['par_numfacventa'])) ? $_SESSION['par_numfacventa'] : "";}
  
 
      $nm_select = "select cantidad, valorunit, iva from detalleventa where numfac= $this->sc_temp_par_numfacventa and cantidad>0"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt[$this->nm_grid_colunas] = array();
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
                        $this->dt[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt[$this->nm_grid_colunas] = false;
          $this->dt_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if (isset($this->dt[$this->nm_grid_colunas][0][0]))
	{
	$ca=0;
	$iv=0;
	$i=0;
	$to_iva=0;
	$aux_iv=0;
		  foreach($this->dt[$this->nm_grid_colunas]  as $ads)
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
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'off';
}
function trae_documento()
{
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'on';
  
 
      $nm_select = "select documento, dv from terceros where idtercero=" . $this->idcli[$this->nm_grid_colunas]  . " "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des[$this->nm_grid_colunas] = array();
     if ($this->idcli[$this->nm_grid_colunas] !== "")
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
                        $this->des[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des[$this->nm_grid_colunas] = false;
          $this->des_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
     } 
;
$this->documento[$this->nm_grid_colunas] =$this->des[$this->nm_grid_colunas][0][0];
$this->digito[$this->nm_grid_colunas] ="-".$this->des[$this->nm_grid_colunas][0][1];
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'off';
}
function trae_resolucion()
{
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'on';
if (!isset($_SESSION['gReso'])) {$_SESSION['gReso'] = "";}
if (!isset($this->sc_temp_gReso)) {$this->sc_temp_gReso = (isset($_SESSION['gReso'])) ? $_SESSION['gReso'] : "";}
  
$this->etiqueta[$this->nm_grid_colunas] ="Descuento aplicado"; 
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select resolucion, rangofac, fecha, prefijo, str_replace (convert(char(10),fec_vencimiento,102), '.', '-') + ' ' + convert(char(8),fec_vencimiento,20) from resdian where Idres=" . $this->resolucion[$this->nm_grid_colunas]  . " "; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select resolucion, rangofac, fecha, prefijo, convert(char(23),fec_vencimiento,121) from resdian where Idres=" . $this->resolucion[$this->nm_grid_colunas]  . " "; 
      }
      else
      { 
          $nm_select = "select resolucion, rangofac, fecha, prefijo, fec_vencimiento from resdian where Idres=" . $this->resolucion[$this->nm_grid_colunas]  . " "; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des[$this->nm_grid_colunas] = array();
     if ($this->resolucion[$this->nm_grid_colunas] !== "")
     { 
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->des[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->des[$this->nm_grid_colunas] = false;
          $this->des_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
     } 
;
$this->resolucion[$this->nm_grid_colunas] =" Res.DIAN ".$this->des[$this->nm_grid_colunas][0][0];
$this->rangofac[$this->nm_grid_colunas] ="Rango Autorizado: ".$this->des[$this->nm_grid_colunas][0][1];
$this->fechares[$this->nm_grid_colunas] ="Vigencia ".$this->des[$this->nm_grid_colunas][0][2];

$this->sc_temp_gReso=$this->resolucion[$this->nm_grid_colunas] .' '.$this->rangofac[$this->nm_grid_colunas] .' '.$this->fechares[$this->nm_grid_colunas] ="Vigencia ".$this->des[$this->nm_grid_colunas][0][2].' al '.$this->des[$this->nm_grid_colunas][0][4];

if($this->des[$this->nm_grid_colunas][0][3]=="'" or $this->des[$this->nm_grid_colunas][0][3]=='.' or $this->des[$this->nm_grid_colunas][0][3]=="´")
	{
	$this->prefijo[$this->nm_grid_colunas] ='';
	}
else
	{
	$this->prefijo[$this->nm_grid_colunas] =$this->des[$this->nm_grid_colunas][0][3];
	}
if (isset($this->sc_temp_gReso)) {$_SESSION['gReso'] = $this->sc_temp_gReso;}
$_SESSION['scriptcase']['pdfreport_facturaven']['contr_erro'] = 'off';
}
}
?>
