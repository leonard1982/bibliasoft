<?php
class pdfreport_compregreso_grid
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
   var $array_detallepagos_idfp = array();
   var $detallepagos = array();
   var $detallepagos_banco = array();
   var $detallepagos_fechacob = array();
   var $detallepagos_iddetall = array();
   var $detallepagos_idfact = array();
   var $detallepagos_idfp = array();
   var $detallepagos_idrc = array();
   var $detallepagos_monto = array();
   var $detallepagos_numcheque = array();
   var $idpago = array();
   var $numpago = array();
   var $client = array();
   var $fecpago = array();
   var $montocan = array();
   var $ret = array();
   var $descuent = array();
   var $docapagar = array();
   var $iddocapagar = array();
   var $saldodocumento = array();
   var $conc = array();
   var $obs = array();
   var $asent = array();
   var $porc_ret = array();
   var $val_ica = array();
   var $porc_ica = array();
   var $porc_reteiva = array();
   var $val_reteiva = array();
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
   $this->default_font = 'Helvetica';
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
   $_SESSION['scriptcase']['pdfreport_compregreso']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_compregreso", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idpago[0] = $Busca_temp['idpago']; 
       $tmp_pos = strpos($this->idpago[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idpago[0]))
       {
           $this->idpago[0] = substr($this->idpago[0], 0, $tmp_pos);
       }
       $idpago_2 = $Busca_temp['idpago_input_2']; 
       $this->idpago_2 = $Busca_temp['idpago_input_2']; 
       $this->numpago[0] = $Busca_temp['numpago']; 
       $tmp_pos = strpos($this->numpago[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->numpago[0]))
       {
           $this->numpago[0] = substr($this->numpago[0], 0, $tmp_pos);
       }
       $numpago_2 = $Busca_temp['numpago_input_2']; 
       $this->numpago_2 = $Busca_temp['numpago_input_2']; 
       $this->client[0] = $Busca_temp['client']; 
       $tmp_pos = strpos($this->client[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->client[0]))
       {
           $this->client[0] = substr($this->client[0], 0, $tmp_pos);
       }
       $client_2 = $Busca_temp['client_input_2']; 
       $this->client_2 = $Busca_temp['client_input_2']; 
       $this->fecpago[0] = $Busca_temp['fecpago']; 
       $tmp_pos = strpos($this->fecpago[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecpago[0]))
       {
           $this->fecpago[0] = substr($this->fecpago[0], 0, $tmp_pos);
       }
       $fecpago_2 = $Busca_temp['fecpago_input_2']; 
       $this->fecpago_2 = $Busca_temp['fecpago_input_2']; 
       $this->porc_ret[0] = $Busca_temp['porc_ret']; 
       $tmp_pos = strpos($this->porc_ret[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->porc_ret[0]))
       {
           $this->porc_ret[0] = substr($this->porc_ret[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecpago_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
if (!isset($_SESSION['par_comegreso'])) {$_SESSION['par_comegreso'] = "";}
if (!isset($this->sc_temp_par_comegreso)) {$this->sc_temp_par_comegreso = (isset($_SESSION['par_comegreso'])) ? $_SESSION['par_comegreso'] : "";}
  $_SESSION['pdfreport_compregreso']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_compregreso']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_compregreso']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_compregreso']['telefono1']=$this->sc_temp_tele;
 
      $nm_select = "select asent from pagos where idpago=$this->sc_temp_par_comegreso"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->des[$this->nm_grid_colunas] = array();
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
;
if($this->des[$this->nm_grid_colunas][0][0]=='NO')
	{
	echo 'COMPROBANTE NO ESTÁ ASENTADO, NO SE PUEDE IMPRIMIR';
	echo '<br>';
	echo 'Por favor corregir';
	exit;
	}
if (isset($this->sc_temp_par_comegreso)) {$_SESSION['par_comegreso'] = $this->sc_temp_par_comegreso;}
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'] = " where idpago=" . $_SESSION['par_comegreso'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idpago, numpago, client, str_replace (convert(char(10),fecpago,102), '.', '-') + ' ' + convert(char(8),fecpago,20), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idpago, numpago, client, convert(char(23),fecpago,121), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idpago, numpago, client, EXTEND(fecpago, YEAR TO DAY), montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idpago, numpago, client, fecpago, montocan, ret, descuent, docapagar, iddocapagar, saldodocumento, conc, obs, asent, porc_ret, val_ica, porc_ica, porc_reteiva, val_reteiva from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['order_grid'] = $nmgp_order_by;
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
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['idpago'] = "Idpago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['numpago'] = "Numpago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['client'] = "Client";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['fecpago'] = "Fecpago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['montocan'] = "Montocan";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['ret'] = "Ret";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['descuent'] = "Descuent";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['docapagar'] = "Docapagar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['iddocapagar'] = "Iddocapagar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['saldodocumento'] = "Saldodocumento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['conc'] = "Conc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['obs'] = "Obs";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['asent'] = "Asent";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['porc_ret'] = "Porc Ret";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['val_ica'] = "Val Ica";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['porc_ica'] = "Porc Ica";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['porc_reteiva'] = "Porc Reteiva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['val_reteiva'] = "Val Reteiva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos'] = "detallepagos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_banco'] = "Banco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_fechacob'] = "Fechacob";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_iddetall'] = "Iddetall";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_idfact'] = "Idfact";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_idfp'] = "Idfp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_idrc'] = "Idrc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_monto'] = "Monto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['labels']['detallepagos_numcheque'] = "Numcheque";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_compregreso']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_compregreso']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idpago[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idpago[$this->nm_grid_colunas] = (string)$this->idpago[$this->nm_grid_colunas];
          $this->numpago[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->numpago[$this->nm_grid_colunas] = (string)$this->numpago[$this->nm_grid_colunas];
          $this->client[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->client[$this->nm_grid_colunas] = (string)$this->client[$this->nm_grid_colunas];
          $this->fecpago[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->montocan[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->montocan[$this->nm_grid_colunas] =  str_replace(",", ".", $this->montocan[$this->nm_grid_colunas]);
          $this->montocan[$this->nm_grid_colunas] = (strpos(strtolower($this->montocan[$this->nm_grid_colunas]), "e")) ? (float)$this->montocan[$this->nm_grid_colunas] : $this->montocan[$this->nm_grid_colunas]; 
          $this->montocan[$this->nm_grid_colunas] = (string)$this->montocan[$this->nm_grid_colunas];
          $this->ret[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->ret[$this->nm_grid_colunas] =  str_replace(",", ".", $this->ret[$this->nm_grid_colunas]);
          $this->ret[$this->nm_grid_colunas] = (strpos(strtolower($this->ret[$this->nm_grid_colunas]), "e")) ? (float)$this->ret[$this->nm_grid_colunas] : $this->ret[$this->nm_grid_colunas]; 
          $this->ret[$this->nm_grid_colunas] = (string)$this->ret[$this->nm_grid_colunas];
          $this->descuent[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->descuent[$this->nm_grid_colunas] =  str_replace(",", ".", $this->descuent[$this->nm_grid_colunas]);
          $this->descuent[$this->nm_grid_colunas] = (strpos(strtolower($this->descuent[$this->nm_grid_colunas]), "e")) ? (float)$this->descuent[$this->nm_grid_colunas] : $this->descuent[$this->nm_grid_colunas]; 
          $this->descuent[$this->nm_grid_colunas] = (string)$this->descuent[$this->nm_grid_colunas];
          $this->docapagar[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->iddocapagar[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->iddocapagar[$this->nm_grid_colunas] = (string)$this->iddocapagar[$this->nm_grid_colunas];
          $this->saldodocumento[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->saldodocumento[$this->nm_grid_colunas] =  str_replace(",", ".", $this->saldodocumento[$this->nm_grid_colunas]);
          $this->saldodocumento[$this->nm_grid_colunas] = (strpos(strtolower($this->saldodocumento[$this->nm_grid_colunas]), "e")) ? (float)$this->saldodocumento[$this->nm_grid_colunas] : $this->saldodocumento[$this->nm_grid_colunas]; 
          $this->saldodocumento[$this->nm_grid_colunas] = (string)$this->saldodocumento[$this->nm_grid_colunas];
          $this->conc[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->obs[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->asent[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->porc_ret[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->porc_ret[$this->nm_grid_colunas] = (strpos(strtolower($this->porc_ret[$this->nm_grid_colunas]), "e")) ? (float)$this->porc_ret[$this->nm_grid_colunas] : $this->porc_ret[$this->nm_grid_colunas]; 
          $this->porc_ret[$this->nm_grid_colunas] = (string)$this->porc_ret[$this->nm_grid_colunas];
          $this->val_ica[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->val_ica[$this->nm_grid_colunas] =  str_replace(",", ".", $this->val_ica[$this->nm_grid_colunas]);
          $this->val_ica[$this->nm_grid_colunas] = (strpos(strtolower($this->val_ica[$this->nm_grid_colunas]), "e")) ? (float)$this->val_ica[$this->nm_grid_colunas] : $this->val_ica[$this->nm_grid_colunas]; 
          $this->val_ica[$this->nm_grid_colunas] = (string)$this->val_ica[$this->nm_grid_colunas];
          $this->porc_ica[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->porc_ica[$this->nm_grid_colunas] = (strpos(strtolower($this->porc_ica[$this->nm_grid_colunas]), "e")) ? (float)$this->porc_ica[$this->nm_grid_colunas] : $this->porc_ica[$this->nm_grid_colunas]; 
          $this->porc_ica[$this->nm_grid_colunas] = (string)$this->porc_ica[$this->nm_grid_colunas];
          $this->porc_reteiva[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->porc_reteiva[$this->nm_grid_colunas] = (strpos(strtolower($this->porc_reteiva[$this->nm_grid_colunas]), "e")) ? (float)$this->porc_reteiva[$this->nm_grid_colunas] : $this->porc_reteiva[$this->nm_grid_colunas]; 
          $this->porc_reteiva[$this->nm_grid_colunas] = (string)$this->porc_reteiva[$this->nm_grid_colunas];
          $this->val_reteiva[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->val_reteiva[$this->nm_grid_colunas] =  str_replace(",", ".", $this->val_reteiva[$this->nm_grid_colunas]);
          $this->val_reteiva[$this->nm_grid_colunas] = (strpos(strtolower($this->val_reteiva[$this->nm_grid_colunas]), "e")) ? (float)$this->val_reteiva[$this->nm_grid_colunas] : $this->val_reteiva[$this->nm_grid_colunas]; 
          $this->val_reteiva[$this->nm_grid_colunas] = (string)$this->val_reteiva[$this->nm_grid_colunas];
          $this->detallepagos_banco[$this->nm_grid_colunas] = array();
          $this->detallepagos_fechacob[$this->nm_grid_colunas] = array();
          $this->detallepagos_iddetall[$this->nm_grid_colunas] = array();
          $this->detallepagos_idfact[$this->nm_grid_colunas] = array();
          $this->detallepagos_idfp[$this->nm_grid_colunas] = array();
          $this->detallepagos_idrc[$this->nm_grid_colunas] = array();
          $this->detallepagos_monto[$this->nm_grid_colunas] = array();
          $this->detallepagos_numcheque[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detallepagos($this->detallepagos[$this->nm_grid_colunas] , $this->idpago[$this->nm_grid_colunas], $array_detallepagos); 
          $NM_ind = 0;
          $this->detallepagos = array();
          foreach ($array_detallepagos as $cada_subselect) 
          {
              $this->detallepagos[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $NM_ind++;
          }
          $_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
  $this->ret[$this->nm_grid_colunas] =-$this->ret[$this->nm_grid_colunas] ;
$this->descuent[$this->nm_grid_colunas] =-$this->descuent[$this->nm_grid_colunas] ;
$this->val_ica[$this->nm_grid_colunas] =-$this->val_ica[$this->nm_grid_colunas] ;
$this->val_reteiva[$this->nm_grid_colunas] =-$this->val_reteiva[$this->nm_grid_colunas] ;


$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off';
          $this->idpago[$this->nm_grid_colunas] = sc_strip_script($this->idpago[$this->nm_grid_colunas]);
          if ($this->idpago[$this->nm_grid_colunas] === "") 
          { 
              $this->idpago[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idpago[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idpago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idpago[$this->nm_grid_colunas]);
          $this->numpago[$this->nm_grid_colunas] = sc_strip_script($this->numpago[$this->nm_grid_colunas]);
          if ($this->numpago[$this->nm_grid_colunas] === "") 
          { 
              $this->numpago[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numpago[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numpago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numpago[$this->nm_grid_colunas]);
          $this->Lookup->lookup_client($this->client[$this->nm_grid_colunas] , $this->client[$this->nm_grid_colunas]) ; 
          $this->client[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->client[$this->nm_grid_colunas]);
          $this->fecpago[$this->nm_grid_colunas] = sc_strip_script($this->fecpago[$this->nm_grid_colunas]);
          if ($this->fecpago[$this->nm_grid_colunas] === "") 
          { 
              $this->fecpago[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecpago_x =  $this->fecpago[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecpago_x, "YYYY-MM-DD");
               if (is_numeric($fecpago_x) && strlen($fecpago_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecpago[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecpago[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecpago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecpago[$this->nm_grid_colunas]);
          $this->montocan[$this->nm_grid_colunas] = sc_strip_script($this->montocan[$this->nm_grid_colunas]);
          if ($this->montocan[$this->nm_grid_colunas] === "") 
          { 
              $this->montocan[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->montocan[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->montocan[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->montocan[$this->nm_grid_colunas]);
          $this->ret[$this->nm_grid_colunas] = sc_strip_script($this->ret[$this->nm_grid_colunas]);
          if ($this->ret[$this->nm_grid_colunas] === "") 
          { 
              $this->ret[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ret[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:2", "-") ; 
          } 
          $this->ret[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ret[$this->nm_grid_colunas]);
          $this->descuent[$this->nm_grid_colunas] = sc_strip_script($this->descuent[$this->nm_grid_colunas]);
          if ($this->descuent[$this->nm_grid_colunas] === "") 
          { 
              $this->descuent[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->descuent[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:2", "-") ; 
          } 
          $this->descuent[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->descuent[$this->nm_grid_colunas]);
          $this->docapagar[$this->nm_grid_colunas] = sc_strip_script($this->docapagar[$this->nm_grid_colunas]);
          if ($this->docapagar[$this->nm_grid_colunas] === "") 
          { 
              $this->docapagar[$this->nm_grid_colunas] = "" ;  
          } 
          $this->docapagar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->docapagar[$this->nm_grid_colunas]);
          $this->iddocapagar[$this->nm_grid_colunas] = sc_strip_script($this->iddocapagar[$this->nm_grid_colunas]);
          if ($this->iddocapagar[$this->nm_grid_colunas] === "") 
          { 
              $this->iddocapagar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->iddocapagar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->iddocapagar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->iddocapagar[$this->nm_grid_colunas]);
          $this->saldodocumento[$this->nm_grid_colunas] = sc_strip_script($this->saldodocumento[$this->nm_grid_colunas]);
          if ($this->saldodocumento[$this->nm_grid_colunas] === "") 
          { 
              $this->saldodocumento[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->saldodocumento[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->saldodocumento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->saldodocumento[$this->nm_grid_colunas]);
          $this->conc[$this->nm_grid_colunas] = sc_strip_script($this->conc[$this->nm_grid_colunas]);
          if ($this->conc[$this->nm_grid_colunas] === "") 
          { 
              $this->conc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->conc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->conc[$this->nm_grid_colunas]);
          $this->obs[$this->nm_grid_colunas] = sc_strip_script($this->obs[$this->nm_grid_colunas]);
          if ($this->obs[$this->nm_grid_colunas] === "") 
          { 
              $this->obs[$this->nm_grid_colunas] = "" ;  
          } 
          $this->obs[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->obs[$this->nm_grid_colunas]);
          $this->asent[$this->nm_grid_colunas] = sc_strip_script($this->asent[$this->nm_grid_colunas]);
          if ($this->asent[$this->nm_grid_colunas] === "") 
          { 
              $this->asent[$this->nm_grid_colunas] = "" ;  
          } 
          $this->asent[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->asent[$this->nm_grid_colunas]);
          $this->porc_ret[$this->nm_grid_colunas] = sc_strip_script($this->porc_ret[$this->nm_grid_colunas]);
          if ($this->porc_ret[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_ret[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_ret[$this->nm_grid_colunas], ".", ",", "2", "S", "2", "", "N:2", "-") ; 
          } 
          $this->porc_ret[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_ret[$this->nm_grid_colunas]);
          $this->val_ica[$this->nm_grid_colunas] = sc_strip_script($this->val_ica[$this->nm_grid_colunas]);
          if ($this->val_ica[$this->nm_grid_colunas] === "") 
          { 
              $this->val_ica[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->val_ica[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:2", "-") ; 
          } 
          $this->val_ica[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->val_ica[$this->nm_grid_colunas]);
          $this->porc_ica[$this->nm_grid_colunas] = sc_strip_script($this->porc_ica[$this->nm_grid_colunas]);
          if ($this->porc_ica[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_ica[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_ica[$this->nm_grid_colunas], ".", ",", "2", "S", "2", "", "N:2", "-") ; 
          } 
          $this->porc_ica[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_ica[$this->nm_grid_colunas]);
          $this->porc_reteiva[$this->nm_grid_colunas] = sc_strip_script($this->porc_reteiva[$this->nm_grid_colunas]);
          if ($this->porc_reteiva[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_reteiva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_reteiva[$this->nm_grid_colunas], ".", ",", "2", "S", "2", "", "N:2", "-") ; 
          } 
          $this->porc_reteiva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_reteiva[$this->nm_grid_colunas]);
          $this->val_reteiva[$this->nm_grid_colunas] = sc_strip_script($this->val_reteiva[$this->nm_grid_colunas]);
          if ($this->val_reteiva[$this->nm_grid_colunas] === "") 
          { 
              $this->val_reteiva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->val_reteiva[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:2", "-") ; 
          } 
          $this->val_reteiva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->val_reteiva[$this->nm_grid_colunas]);
          foreach ($this->detallepagos_banco[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_fechacob[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
               $detallepagos_fechacob_x =  $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind];
               nm_conv_limpa_dado($detallepagos_fechacob_x, "YYYY-MM-DD");
               if (is_numeric($detallepagos_fechacob_x) && strlen($detallepagos_fechacob_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind], "YYYY-MM-DD");
                   $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
              $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_iddetall[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_iddetall[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_idfact[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_idfact[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_idfp[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detallepagos_idfp($this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind] , $this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind], $array_detallepagos_idfp) ; 
              $this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_idrc[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_idrc[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_monto[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detallepagos_numcheque[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_titulo = array('posx' => 10, 'posy' => 7, 'data' => $this->SC_conv_utf8('COMPROBANTE DE EGRESO'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => BU);
            $empresa_ = array('posx' => 10, 'posy' => 15, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_compregreso']['empresa_nombre'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $nit_ = array('posx' => 10, 'posy' => 23, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_compregreso']['nit'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $direccion_ = array('posx' => 10, 'posy' => 27, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_compregreso']['direccion1'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $tel_ = array('posx' => 10, 'posy' => 31, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_compregreso']['telefono1'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etinurecibo = array('posx' => 150, 'posy' => 15, 'data' => $this->SC_conv_utf8('CE N°:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etfech = array('posx' => 150, 'posy' => 25, 'data' => $this->SC_conv_utf8('FECHA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LINEA = array('posx' => 10, 'posy' => 35, 'data' => $this->SC_conv_utf8('___________________________________________________________________________________________________'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $et_recibico_DE = array('posx' => 10, 'posy' => 45, 'data' => $this->SC_conv_utf8('Pagado a:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_eticoncepto = array('posx' => 10, 'posy' => 84, 'data' => $this->SC_conv_utf8('Cancepto:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etfacnumero = array('posx' => 145, 'posy' => 84, 'data' => $this->SC_conv_utf8('Doc. Número:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etobse = array('posx' => 10, 'posy' => 97, 'data' => $this->SC_conv_utf8('Observaciones:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_recibido = array('posx' => 157, 'posy' => 135, 'data' => $this->SC_conv_utf8('Recibido Por'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_linearecibido = array('posx' => 140, 'posy' => 130, 'data' => $this->SC_conv_utf8('_________________________'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_lasuma = array('posx' => 10, 'posy' => 62, 'data' => $this->SC_conv_utf8('Retención:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numeros = array('posx' => 10, 'posy' => 75, 'data' => $this->SC_conv_utf8('Valor Pagado:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_forma_pago = array('posx' => 100, 'posy' => 67, 'data' => $this->SC_conv_utf8('Descuento:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_idfp = array('posx' => 10, 'posy' => 115, 'data' => $this->detallepagos_idfp[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_monto = array('posx' => 10, 'posy' => 115, 'data' => $this->detallepagos_monto[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_banco = array('posx' => 45, 'posy' => 115, 'data' => $this->detallepagos_banco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_numcheque = array('posx' => 80, 'posy' => 115, 'data' => $this->detallepagos_numcheque[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_fechacob = array('posx' => 125, 'posy' => 115, 'data' => $this->detallepagos_fechacob[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_41 = array('posx' => 10, 'posy' => 110, 'data' => $this->SC_conv_utf8('Forma de Pago'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_42 = array('posx' => 45, 'posy' => 110, 'data' => $this->SC_conv_utf8('Nom. banco'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_43 = array('posx' => 80, 'posy' => 110, 'data' => $this->SC_conv_utf8('Núm. Ch.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_44 = array('posx' => 125, 'posy' => 110, 'data' => $this->SC_conv_utf8('Fecha Ch.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_45 = array('posx' => 10, 'posy' => 110, 'data' => $this->SC_conv_utf8('Monto $     '), 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_NUMERO_CE = array('posx' => 182, 'posy' => 15, 'data' => $this->numpago[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_PROVEEDOR = array('posx' => 35, 'posy' => 45, 'data' => $this->client[$this->nm_grid_colunas], 'width'      => 160, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_FECHA = array('posx' => 175, 'posy' => 25, 'data' => $this->fecpago[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_DOCUMENTO = array('posx' => 175, 'posy' => 85, 'data' => $this->docapagar[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_MONTO = array('posx' => 44, 'posy' => 75, 'data' => $this->montocan[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_RETENCION = array('posx' => 44, 'posy' => 62, 'data' => $this->ret[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_DESCUENTO = array('posx' => 135, 'posy' => 67, 'data' => $this->descuent[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CONCEPTO = array('posx' => 44, 'posy' => 84, 'data' => $this->conc[$this->nm_grid_colunas], 'width'      => 90, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_OBS = array('posx' => 10, 'posy' => 102, 'data' => $this->obs[$this->nm_grid_colunas], 'width'      => 190, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_saldocumento = array('posx' => 44, 'posy' => 55, 'data' => $this->saldodocumento[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_56 = array('posx' => 10, 'posy' => 55, 'data' => $this->SC_conv_utf8('Valor a Cancelar:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porcret = array('posx' => 80, 'posy' => 62, 'data' => $this->porc_ret[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_58 = array('posx' => 75, 'posy' => 62, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_valica = array('posx' => 135, 'posy' => 62, 'data' => $this->val_ica[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_60 = array('posx' => 100, 'posy' => 62, 'data' => $this->SC_conv_utf8('Rete ICA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porcica = array('posx' => 171, 'posy' => 62, 'data' => $this->porc_ica[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_62 = array('posx' => 166, 'posy' => 62, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_valretiva = array('posx' => 44, 'posy' => 67, 'data' => $this->val_reteiva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_64 = array('posx' => 10, 'posy' => 67, 'data' => $this->SC_conv_utf8('Rete IVA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porreteiva = array('posx' => 80, 'posy' => 67, 'data' => $this->porc_reteiva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_66 = array('posx' => 75, 'posy' => 67, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_titulo['font_type'], $cell_titulo['font_style'], $cell_titulo['font_size']);
            $this->pdf_text_color($cell_titulo['data'], $cell_titulo['color_r'], $cell_titulo['color_g'], $cell_titulo['color_b']);
            if (!empty($cell_titulo['posx']) && !empty($cell_titulo['posy']))
            {
                $this->Pdf->SetXY($cell_titulo['posx'], $cell_titulo['posy']);
            }
            elseif (!empty($cell_titulo['posx']))
            {
                $this->Pdf->SetX($cell_titulo['posx']);
            }
            elseif (!empty($cell_titulo['posy']))
            {
                $this->Pdf->SetY($cell_titulo['posy']);
            }
            $this->Pdf->Cell($cell_titulo['width'], 0, $cell_titulo['data'], 0, 0, $cell_titulo['align']);

            $this->Pdf->SetFont($empresa_['font_type'], $empresa_['font_style'], $empresa_['font_size']);
            $this->pdf_text_color($empresa_['data'], $empresa_['color_r'], $empresa_['color_g'], $empresa_['color_b']);
            if (!empty($empresa_['posx']) && !empty($empresa_['posy']))
            {
                $this->Pdf->SetXY($empresa_['posx'], $empresa_['posy']);
            }
            elseif (!empty($empresa_['posx']))
            {
                $this->Pdf->SetX($empresa_['posx']);
            }
            elseif (!empty($empresa_['posy']))
            {
                $this->Pdf->SetY($empresa_['posy']);
            }
            $this->Pdf->Cell($empresa_['width'], 0, $empresa_['data'], 0, 0, $empresa_['align']);

            $this->Pdf->SetFont($nit_['font_type'], $nit_['font_style'], $nit_['font_size']);
            $this->pdf_text_color($nit_['data'], $nit_['color_r'], $nit_['color_g'], $nit_['color_b']);
            if (!empty($nit_['posx']) && !empty($nit_['posy']))
            {
                $this->Pdf->SetXY($nit_['posx'], $nit_['posy']);
            }
            elseif (!empty($nit_['posx']))
            {
                $this->Pdf->SetX($nit_['posx']);
            }
            elseif (!empty($nit_['posy']))
            {
                $this->Pdf->SetY($nit_['posy']);
            }
            $this->Pdf->Cell($nit_['width'], 0, $nit_['data'], 0, 0, $nit_['align']);

            $this->Pdf->SetFont($direccion_['font_type'], $direccion_['font_style'], $direccion_['font_size']);
            $this->pdf_text_color($direccion_['data'], $direccion_['color_r'], $direccion_['color_g'], $direccion_['color_b']);
            if (!empty($direccion_['posx']) && !empty($direccion_['posy']))
            {
                $this->Pdf->SetXY($direccion_['posx'], $direccion_['posy']);
            }
            elseif (!empty($direccion_['posx']))
            {
                $this->Pdf->SetX($direccion_['posx']);
            }
            elseif (!empty($direccion_['posy']))
            {
                $this->Pdf->SetY($direccion_['posy']);
            }
            $this->Pdf->Cell($direccion_['width'], 0, $direccion_['data'], 0, 0, $direccion_['align']);

            $this->Pdf->SetFont($tel_['font_type'], $tel_['font_style'], $tel_['font_size']);
            $this->pdf_text_color($tel_['data'], $tel_['color_r'], $tel_['color_g'], $tel_['color_b']);
            if (!empty($tel_['posx']) && !empty($tel_['posy']))
            {
                $this->Pdf->SetXY($tel_['posx'], $tel_['posy']);
            }
            elseif (!empty($tel_['posx']))
            {
                $this->Pdf->SetX($tel_['posx']);
            }
            elseif (!empty($tel_['posy']))
            {
                $this->Pdf->SetY($tel_['posy']);
            }
            $this->Pdf->Cell($tel_['width'], 0, $tel_['data'], 0, 0, $tel_['align']);

            $this->Pdf->SetFont($cell_etinurecibo['font_type'], $cell_etinurecibo['font_style'], $cell_etinurecibo['font_size']);
            $this->pdf_text_color($cell_etinurecibo['data'], $cell_etinurecibo['color_r'], $cell_etinurecibo['color_g'], $cell_etinurecibo['color_b']);
            if (!empty($cell_etinurecibo['posx']) && !empty($cell_etinurecibo['posy']))
            {
                $this->Pdf->SetXY($cell_etinurecibo['posx'], $cell_etinurecibo['posy']);
            }
            elseif (!empty($cell_etinurecibo['posx']))
            {
                $this->Pdf->SetX($cell_etinurecibo['posx']);
            }
            elseif (!empty($cell_etinurecibo['posy']))
            {
                $this->Pdf->SetY($cell_etinurecibo['posy']);
            }
            $this->Pdf->Cell($cell_etinurecibo['width'], 0, $cell_etinurecibo['data'], 0, 0, $cell_etinurecibo['align']);

            $this->Pdf->SetFont($cell_etfech['font_type'], $cell_etfech['font_style'], $cell_etfech['font_size']);
            $this->pdf_text_color($cell_etfech['data'], $cell_etfech['color_r'], $cell_etfech['color_g'], $cell_etfech['color_b']);
            if (!empty($cell_etfech['posx']) && !empty($cell_etfech['posy']))
            {
                $this->Pdf->SetXY($cell_etfech['posx'], $cell_etfech['posy']);
            }
            elseif (!empty($cell_etfech['posx']))
            {
                $this->Pdf->SetX($cell_etfech['posx']);
            }
            elseif (!empty($cell_etfech['posy']))
            {
                $this->Pdf->SetY($cell_etfech['posy']);
            }
            $this->Pdf->Cell($cell_etfech['width'], 0, $cell_etfech['data'], 0, 0, $cell_etfech['align']);

            $this->Pdf->SetFont($LINEA['font_type'], $LINEA['font_style'], $LINEA['font_size']);
            $this->pdf_text_color($LINEA['data'], $LINEA['color_r'], $LINEA['color_g'], $LINEA['color_b']);
            if (!empty($LINEA['posx']) && !empty($LINEA['posy']))
            {
                $this->Pdf->SetXY($LINEA['posx'], $LINEA['posy']);
            }
            elseif (!empty($LINEA['posx']))
            {
                $this->Pdf->SetX($LINEA['posx']);
            }
            elseif (!empty($LINEA['posy']))
            {
                $this->Pdf->SetY($LINEA['posy']);
            }
            $this->Pdf->Cell($LINEA['width'], 0, $LINEA['data'], 0, 0, $LINEA['align']);

            $this->Pdf->SetFont($et_recibico_DE['font_type'], $et_recibico_DE['font_style'], $et_recibico_DE['font_size']);
            $this->pdf_text_color($et_recibico_DE['data'], $et_recibico_DE['color_r'], $et_recibico_DE['color_g'], $et_recibico_DE['color_b']);
            if (!empty($et_recibico_DE['posx']) && !empty($et_recibico_DE['posy']))
            {
                $this->Pdf->SetXY($et_recibico_DE['posx'], $et_recibico_DE['posy']);
            }
            elseif (!empty($et_recibico_DE['posx']))
            {
                $this->Pdf->SetX($et_recibico_DE['posx']);
            }
            elseif (!empty($et_recibico_DE['posy']))
            {
                $this->Pdf->SetY($et_recibico_DE['posy']);
            }
            $this->Pdf->Cell($et_recibico_DE['width'], 0, $et_recibico_DE['data'], 0, 0, $et_recibico_DE['align']);

            $this->Pdf->SetFont($cell_eticoncepto['font_type'], $cell_eticoncepto['font_style'], $cell_eticoncepto['font_size']);
            $this->pdf_text_color($cell_eticoncepto['data'], $cell_eticoncepto['color_r'], $cell_eticoncepto['color_g'], $cell_eticoncepto['color_b']);
            if (!empty($cell_eticoncepto['posx']) && !empty($cell_eticoncepto['posy']))
            {
                $this->Pdf->SetXY($cell_eticoncepto['posx'], $cell_eticoncepto['posy']);
            }
            elseif (!empty($cell_eticoncepto['posx']))
            {
                $this->Pdf->SetX($cell_eticoncepto['posx']);
            }
            elseif (!empty($cell_eticoncepto['posy']))
            {
                $this->Pdf->SetY($cell_eticoncepto['posy']);
            }
            $this->Pdf->Cell($cell_eticoncepto['width'], 0, $cell_eticoncepto['data'], 0, 0, $cell_eticoncepto['align']);

            $this->Pdf->SetFont($cell_etfacnumero['font_type'], $cell_etfacnumero['font_style'], $cell_etfacnumero['font_size']);
            $this->pdf_text_color($cell_etfacnumero['data'], $cell_etfacnumero['color_r'], $cell_etfacnumero['color_g'], $cell_etfacnumero['color_b']);
            if (!empty($cell_etfacnumero['posx']) && !empty($cell_etfacnumero['posy']))
            {
                $this->Pdf->SetXY($cell_etfacnumero['posx'], $cell_etfacnumero['posy']);
            }
            elseif (!empty($cell_etfacnumero['posx']))
            {
                $this->Pdf->SetX($cell_etfacnumero['posx']);
            }
            elseif (!empty($cell_etfacnumero['posy']))
            {
                $this->Pdf->SetY($cell_etfacnumero['posy']);
            }
            $this->Pdf->Cell($cell_etfacnumero['width'], 0, $cell_etfacnumero['data'], 0, 0, $cell_etfacnumero['align']);

            $this->Pdf->SetFont($cell_etobse['font_type'], $cell_etobse['font_style'], $cell_etobse['font_size']);
            $this->pdf_text_color($cell_etobse['data'], $cell_etobse['color_r'], $cell_etobse['color_g'], $cell_etobse['color_b']);
            if (!empty($cell_etobse['posx']) && !empty($cell_etobse['posy']))
            {
                $this->Pdf->SetXY($cell_etobse['posx'], $cell_etobse['posy']);
            }
            elseif (!empty($cell_etobse['posx']))
            {
                $this->Pdf->SetX($cell_etobse['posx']);
            }
            elseif (!empty($cell_etobse['posy']))
            {
                $this->Pdf->SetY($cell_etobse['posy']);
            }
            $this->Pdf->Cell($cell_etobse['width'], 0, $cell_etobse['data'], 0, 0, $cell_etobse['align']);

            $this->Pdf->SetFont($cell_recibido['font_type'], $cell_recibido['font_style'], $cell_recibido['font_size']);
            $this->pdf_text_color($cell_recibido['data'], $cell_recibido['color_r'], $cell_recibido['color_g'], $cell_recibido['color_b']);
            if (!empty($cell_recibido['posx']) && !empty($cell_recibido['posy']))
            {
                $this->Pdf->SetXY($cell_recibido['posx'], $cell_recibido['posy']);
            }
            elseif (!empty($cell_recibido['posx']))
            {
                $this->Pdf->SetX($cell_recibido['posx']);
            }
            elseif (!empty($cell_recibido['posy']))
            {
                $this->Pdf->SetY($cell_recibido['posy']);
            }
            $this->Pdf->Cell($cell_recibido['width'], 0, $cell_recibido['data'], 0, 0, $cell_recibido['align']);

            $this->Pdf->SetFont($cell_linearecibido['font_type'], $cell_linearecibido['font_style'], $cell_linearecibido['font_size']);
            $this->pdf_text_color($cell_linearecibido['data'], $cell_linearecibido['color_r'], $cell_linearecibido['color_g'], $cell_linearecibido['color_b']);
            if (!empty($cell_linearecibido['posx']) && !empty($cell_linearecibido['posy']))
            {
                $this->Pdf->SetXY($cell_linearecibido['posx'], $cell_linearecibido['posy']);
            }
            elseif (!empty($cell_linearecibido['posx']))
            {
                $this->Pdf->SetX($cell_linearecibido['posx']);
            }
            elseif (!empty($cell_linearecibido['posy']))
            {
                $this->Pdf->SetY($cell_linearecibido['posy']);
            }
            $this->Pdf->Cell($cell_linearecibido['width'], 0, $cell_linearecibido['data'], 0, 0, $cell_linearecibido['align']);

            $this->Pdf->SetFont($cell_lasuma['font_type'], $cell_lasuma['font_style'], $cell_lasuma['font_size']);
            $this->pdf_text_color($cell_lasuma['data'], $cell_lasuma['color_r'], $cell_lasuma['color_g'], $cell_lasuma['color_b']);
            if (!empty($cell_lasuma['posx']) && !empty($cell_lasuma['posy']))
            {
                $this->Pdf->SetXY($cell_lasuma['posx'], $cell_lasuma['posy']);
            }
            elseif (!empty($cell_lasuma['posx']))
            {
                $this->Pdf->SetX($cell_lasuma['posx']);
            }
            elseif (!empty($cell_lasuma['posy']))
            {
                $this->Pdf->SetY($cell_lasuma['posy']);
            }
            $this->Pdf->Cell($cell_lasuma['width'], 0, $cell_lasuma['data'], 0, 0, $cell_lasuma['align']);

            $this->Pdf->SetFont($cell_numeros['font_type'], $cell_numeros['font_style'], $cell_numeros['font_size']);
            $this->pdf_text_color($cell_numeros['data'], $cell_numeros['color_r'], $cell_numeros['color_g'], $cell_numeros['color_b']);
            if (!empty($cell_numeros['posx']) && !empty($cell_numeros['posy']))
            {
                $this->Pdf->SetXY($cell_numeros['posx'], $cell_numeros['posy']);
            }
            elseif (!empty($cell_numeros['posx']))
            {
                $this->Pdf->SetX($cell_numeros['posx']);
            }
            elseif (!empty($cell_numeros['posy']))
            {
                $this->Pdf->SetY($cell_numeros['posy']);
            }
            $this->Pdf->Cell($cell_numeros['width'], 0, $cell_numeros['data'], 0, 0, $cell_numeros['align']);

            $this->Pdf->SetFont($cell_forma_pago['font_type'], $cell_forma_pago['font_style'], $cell_forma_pago['font_size']);
            $this->pdf_text_color($cell_forma_pago['data'], $cell_forma_pago['color_r'], $cell_forma_pago['color_g'], $cell_forma_pago['color_b']);
            if (!empty($cell_forma_pago['posx']) && !empty($cell_forma_pago['posy']))
            {
                $this->Pdf->SetXY($cell_forma_pago['posx'], $cell_forma_pago['posy']);
            }
            elseif (!empty($cell_forma_pago['posx']))
            {
                $this->Pdf->SetX($cell_forma_pago['posx']);
            }
            elseif (!empty($cell_forma_pago['posy']))
            {
                $this->Pdf->SetY($cell_forma_pago['posy']);
            }
            $this->Pdf->Cell($cell_forma_pago['width'], 0, $cell_forma_pago['data'], 0, 0, $cell_forma_pago['align']);

            $this->Pdf->SetY(115);
            foreach ($this->detallepagos[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detallepagos_idfp['font_type'], $cell_detallepagos_idfp['font_style'], $cell_detallepagos_idfp['font_size']);
                if (!empty($cell_detallepagos_idfp['posx']))
                {
                    $this->Pdf->SetX($cell_detallepagos_idfp['posx']);
                }
                $this->pdf_text_color($this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind], $cell_detallepagos_idfp['color_r'], $cell_detallepagos_idfp['color_g'], $cell_detallepagos_idfp['color_b']);
                $this->Pdf->Cell($cell_detallepagos_idfp['width'], 0, $this->detallepagos_idfp[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepagos_idfp['align']);
                $this->Pdf->SetFont($cell_detallepagos_monto['font_type'], $cell_detallepagos_monto['font_style'], $cell_detallepagos_monto['font_size']);
                if (!empty($cell_detallepagos_monto['posx']))
                {
                    $this->Pdf->SetX($cell_detallepagos_monto['posx']);
                }
                $this->pdf_text_color($this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind], $cell_detallepagos_monto['color_r'], $cell_detallepagos_monto['color_g'], $cell_detallepagos_monto['color_b']);
                $this->Pdf->Cell($cell_detallepagos_monto['width'], 0, $this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepagos_monto['align']);
                $this->Pdf->SetFont($cell_detallepagos_banco['font_type'], $cell_detallepagos_banco['font_style'], $cell_detallepagos_banco['font_size']);
                if (!empty($cell_detallepagos_banco['posx']))
                {
                    $this->Pdf->SetX($cell_detallepagos_banco['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detallepagos_banco['color_r'], $cell_detallepagos_banco['color_g'], $cell_detallepagos_banco['color_b']);
                $this->Pdf->writeHTMLCell($cell_detallepagos_banco['width'], 0, $atu_X, $atu_Y, $this->detallepagos_banco[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detallepagos_banco['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detallepagos_numcheque['font_type'], $cell_detallepagos_numcheque['font_style'], $cell_detallepagos_numcheque['font_size']);
                if (!empty($cell_detallepagos_numcheque['posx']))
                {
                    $this->Pdf->SetX($cell_detallepagos_numcheque['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detallepagos_numcheque['color_r'], $cell_detallepagos_numcheque['color_g'], $cell_detallepagos_numcheque['color_b']);
                $this->Pdf->writeHTMLCell($cell_detallepagos_numcheque['width'], 0, $atu_X, $atu_Y, $this->detallepagos_numcheque[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detallepagos_numcheque['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detallepagos_fechacob['font_type'], $cell_detallepagos_fechacob['font_style'], $cell_detallepagos_fechacob['font_size']);
                if (!empty($cell_detallepagos_fechacob['posx']))
                {
                    $this->Pdf->SetX($cell_detallepagos_fechacob['posx']);
                }
                $this->pdf_text_color($this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind], $cell_detallepagos_fechacob['color_r'], $cell_detallepagos_fechacob['color_g'], $cell_detallepagos_fechacob['color_b']);
                $this->Pdf->Cell($cell_detallepagos_fechacob['width'], 0, $this->detallepagos_fechacob[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detallepagos_fechacob['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 3.5;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_41['font_type'], $cell_41['font_style'], $cell_41['font_size']);
            $this->pdf_text_color($cell_41['data'], $cell_41['color_r'], $cell_41['color_g'], $cell_41['color_b']);
            if (!empty($cell_41['posx']) && !empty($cell_41['posy']))
            {
                $this->Pdf->SetXY($cell_41['posx'], $cell_41['posy']);
            }
            elseif (!empty($cell_41['posx']))
            {
                $this->Pdf->SetX($cell_41['posx']);
            }
            elseif (!empty($cell_41['posy']))
            {
                $this->Pdf->SetY($cell_41['posy']);
            }
            $this->Pdf->Cell($cell_41['width'], 0, $cell_41['data'], 0, 0, $cell_41['align']);

            $this->Pdf->SetFont($cell_42['font_type'], $cell_42['font_style'], $cell_42['font_size']);
            $this->pdf_text_color($cell_42['data'], $cell_42['color_r'], $cell_42['color_g'], $cell_42['color_b']);
            if (!empty($cell_42['posx']) && !empty($cell_42['posy']))
            {
                $this->Pdf->SetXY($cell_42['posx'], $cell_42['posy']);
            }
            elseif (!empty($cell_42['posx']))
            {
                $this->Pdf->SetX($cell_42['posx']);
            }
            elseif (!empty($cell_42['posy']))
            {
                $this->Pdf->SetY($cell_42['posy']);
            }
            $this->Pdf->Cell($cell_42['width'], 0, $cell_42['data'], 0, 0, $cell_42['align']);

            $this->Pdf->SetFont($cell_43['font_type'], $cell_43['font_style'], $cell_43['font_size']);
            $this->pdf_text_color($cell_43['data'], $cell_43['color_r'], $cell_43['color_g'], $cell_43['color_b']);
            if (!empty($cell_43['posx']) && !empty($cell_43['posy']))
            {
                $this->Pdf->SetXY($cell_43['posx'], $cell_43['posy']);
            }
            elseif (!empty($cell_43['posx']))
            {
                $this->Pdf->SetX($cell_43['posx']);
            }
            elseif (!empty($cell_43['posy']))
            {
                $this->Pdf->SetY($cell_43['posy']);
            }
            $this->Pdf->Cell($cell_43['width'], 0, $cell_43['data'], 0, 0, $cell_43['align']);

            $this->Pdf->SetFont($cell_44['font_type'], $cell_44['font_style'], $cell_44['font_size']);
            $this->pdf_text_color($cell_44['data'], $cell_44['color_r'], $cell_44['color_g'], $cell_44['color_b']);
            if (!empty($cell_44['posx']) && !empty($cell_44['posy']))
            {
                $this->Pdf->SetXY($cell_44['posx'], $cell_44['posy']);
            }
            elseif (!empty($cell_44['posx']))
            {
                $this->Pdf->SetX($cell_44['posx']);
            }
            elseif (!empty($cell_44['posy']))
            {
                $this->Pdf->SetY($cell_44['posy']);
            }
            $this->Pdf->Cell($cell_44['width'], 0, $cell_44['data'], 0, 0, $cell_44['align']);

            $this->Pdf->SetFont($cell_45['font_type'], $cell_45['font_style'], $cell_45['font_size']);
            $this->pdf_text_color($cell_45['data'], $cell_45['color_r'], $cell_45['color_g'], $cell_45['color_b']);
            if (!empty($cell_45['posx']) && !empty($cell_45['posy']))
            {
                $this->Pdf->SetXY($cell_45['posx'], $cell_45['posy']);
            }
            elseif (!empty($cell_45['posx']))
            {
                $this->Pdf->SetX($cell_45['posx']);
            }
            elseif (!empty($cell_45['posy']))
            {
                $this->Pdf->SetY($cell_45['posy']);
            }
            $this->Pdf->Cell($cell_45['width'], 0, $cell_45['data'], 0, 0, $cell_45['align']);

            $this->Pdf->SetFont($cell_NUMERO_CE['font_type'], $cell_NUMERO_CE['font_style'], $cell_NUMERO_CE['font_size']);
            $this->pdf_text_color($cell_NUMERO_CE['data'], $cell_NUMERO_CE['color_r'], $cell_NUMERO_CE['color_g'], $cell_NUMERO_CE['color_b']);
            if (!empty($cell_NUMERO_CE['posx']) && !empty($cell_NUMERO_CE['posy']))
            {
                $this->Pdf->SetXY($cell_NUMERO_CE['posx'], $cell_NUMERO_CE['posy']);
            }
            elseif (!empty($cell_NUMERO_CE['posx']))
            {
                $this->Pdf->SetX($cell_NUMERO_CE['posx']);
            }
            elseif (!empty($cell_NUMERO_CE['posy']))
            {
                $this->Pdf->SetY($cell_NUMERO_CE['posy']);
            }
            $this->Pdf->Cell($cell_NUMERO_CE['width'], 0, $cell_NUMERO_CE['data'], 0, 0, $cell_NUMERO_CE['align']);


            $this->Pdf->SetFont($cell_PROVEEDOR['font_type'], $cell_PROVEEDOR['font_style'], $cell_PROVEEDOR['font_size']);
            $this->Pdf->SetTextColor($cell_PROVEEDOR['color_r'], $cell_PROVEEDOR['color_g'], $cell_PROVEEDOR['color_b']);
            if (!empty($cell_PROVEEDOR['posx']) && !empty($cell_PROVEEDOR['posy']))
            {
                $this->Pdf->SetXY($cell_PROVEEDOR['posx'], $cell_PROVEEDOR['posy']);
            }
            elseif (!empty($cell_PROVEEDOR['posx']))
            {
                $this->Pdf->SetX($cell_PROVEEDOR['posx']);
            }
            elseif (!empty($cell_PROVEEDOR['posy']))
            {
                $this->Pdf->SetY($cell_PROVEEDOR['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_PROVEEDOR['width'], 0, $cell_PROVEEDOR['data'], 0, 0, $cell_PROVEEDOR['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_PROVEEDOR['width'], 0, $atu_X, $atu_Y, $cell_PROVEEDOR['data'], 0, 0, false, true, $cell_PROVEEDOR['align']);
            }

            $this->Pdf->SetFont($cell_FECHA['font_type'], $cell_FECHA['font_style'], $cell_FECHA['font_size']);
            $this->pdf_text_color($cell_FECHA['data'], $cell_FECHA['color_r'], $cell_FECHA['color_g'], $cell_FECHA['color_b']);
            if (!empty($cell_FECHA['posx']) && !empty($cell_FECHA['posy']))
            {
                $this->Pdf->SetXY($cell_FECHA['posx'], $cell_FECHA['posy']);
            }
            elseif (!empty($cell_FECHA['posx']))
            {
                $this->Pdf->SetX($cell_FECHA['posx']);
            }
            elseif (!empty($cell_FECHA['posy']))
            {
                $this->Pdf->SetY($cell_FECHA['posy']);
            }
            $this->Pdf->Cell($cell_FECHA['width'], 0, $cell_FECHA['data'], 0, 0, $cell_FECHA['align']);

            $this->Pdf->SetFont($cell_DOCUMENTO['font_type'], $cell_DOCUMENTO['font_style'], $cell_DOCUMENTO['font_size']);
            $this->pdf_text_color($cell_DOCUMENTO['data'], $cell_DOCUMENTO['color_r'], $cell_DOCUMENTO['color_g'], $cell_DOCUMENTO['color_b']);
            if (!empty($cell_DOCUMENTO['posx']) && !empty($cell_DOCUMENTO['posy']))
            {
                $this->Pdf->SetXY($cell_DOCUMENTO['posx'], $cell_DOCUMENTO['posy']);
            }
            elseif (!empty($cell_DOCUMENTO['posx']))
            {
                $this->Pdf->SetX($cell_DOCUMENTO['posx']);
            }
            elseif (!empty($cell_DOCUMENTO['posy']))
            {
                $this->Pdf->SetY($cell_DOCUMENTO['posy']);
            }
            $this->Pdf->Cell($cell_DOCUMENTO['width'], 0, $cell_DOCUMENTO['data'], 0, 0, $cell_DOCUMENTO['align']);

            $this->Pdf->SetFont($cell_MONTO['font_type'], $cell_MONTO['font_style'], $cell_MONTO['font_size']);
            $this->pdf_text_color($cell_MONTO['data'], $cell_MONTO['color_r'], $cell_MONTO['color_g'], $cell_MONTO['color_b']);
            if (!empty($cell_MONTO['posx']) && !empty($cell_MONTO['posy']))
            {
                $this->Pdf->SetXY($cell_MONTO['posx'], $cell_MONTO['posy']);
            }
            elseif (!empty($cell_MONTO['posx']))
            {
                $this->Pdf->SetX($cell_MONTO['posx']);
            }
            elseif (!empty($cell_MONTO['posy']))
            {
                $this->Pdf->SetY($cell_MONTO['posy']);
            }
            $this->Pdf->Cell($cell_MONTO['width'], 0, $cell_MONTO['data'], 0, 0, $cell_MONTO['align']);

            $this->Pdf->SetFont($cell_RETENCION['font_type'], $cell_RETENCION['font_style'], $cell_RETENCION['font_size']);
            $this->pdf_text_color($cell_RETENCION['data'], $cell_RETENCION['color_r'], $cell_RETENCION['color_g'], $cell_RETENCION['color_b']);
            if (!empty($cell_RETENCION['posx']) && !empty($cell_RETENCION['posy']))
            {
                $this->Pdf->SetXY($cell_RETENCION['posx'], $cell_RETENCION['posy']);
            }
            elseif (!empty($cell_RETENCION['posx']))
            {
                $this->Pdf->SetX($cell_RETENCION['posx']);
            }
            elseif (!empty($cell_RETENCION['posy']))
            {
                $this->Pdf->SetY($cell_RETENCION['posy']);
            }
            $this->Pdf->Cell($cell_RETENCION['width'], 0, $cell_RETENCION['data'], 0, 0, $cell_RETENCION['align']);

            $this->Pdf->SetFont($cell_DESCUENTO['font_type'], $cell_DESCUENTO['font_style'], $cell_DESCUENTO['font_size']);
            $this->pdf_text_color($cell_DESCUENTO['data'], $cell_DESCUENTO['color_r'], $cell_DESCUENTO['color_g'], $cell_DESCUENTO['color_b']);
            if (!empty($cell_DESCUENTO['posx']) && !empty($cell_DESCUENTO['posy']))
            {
                $this->Pdf->SetXY($cell_DESCUENTO['posx'], $cell_DESCUENTO['posy']);
            }
            elseif (!empty($cell_DESCUENTO['posx']))
            {
                $this->Pdf->SetX($cell_DESCUENTO['posx']);
            }
            elseif (!empty($cell_DESCUENTO['posy']))
            {
                $this->Pdf->SetY($cell_DESCUENTO['posy']);
            }
            $this->Pdf->Cell($cell_DESCUENTO['width'], 0, $cell_DESCUENTO['data'], 0, 0, $cell_DESCUENTO['align']);


            $this->Pdf->SetFont($cell_CONCEPTO['font_type'], $cell_CONCEPTO['font_style'], $cell_CONCEPTO['font_size']);
            $this->Pdf->SetTextColor($cell_CONCEPTO['color_r'], $cell_CONCEPTO['color_g'], $cell_CONCEPTO['color_b']);
            if (!empty($cell_CONCEPTO['posx']) && !empty($cell_CONCEPTO['posy']))
            {
                $this->Pdf->SetXY($cell_CONCEPTO['posx'], $cell_CONCEPTO['posy']);
            }
            elseif (!empty($cell_CONCEPTO['posx']))
            {
                $this->Pdf->SetX($cell_CONCEPTO['posx']);
            }
            elseif (!empty($cell_CONCEPTO['posy']))
            {
                $this->Pdf->SetY($cell_CONCEPTO['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_CONCEPTO['width'], 0, $cell_CONCEPTO['data'], 0, 0, $cell_CONCEPTO['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_CONCEPTO['width'], 0, $atu_X, $atu_Y, $cell_CONCEPTO['data'], 0, 0, false, true, $cell_CONCEPTO['align']);
            }

            $this->Pdf->SetFont($cell_OBS['font_type'], $cell_OBS['font_style'], $cell_OBS['font_size']);
            $this->Pdf->SetTextColor($cell_OBS['color_r'], $cell_OBS['color_g'], $cell_OBS['color_b']);
            if (!empty($cell_OBS['posx']) && !empty($cell_OBS['posy']))
            {
                $this->Pdf->SetXY($cell_OBS['posx'], $cell_OBS['posy']);
            }
            elseif (!empty($cell_OBS['posx']))
            {
                $this->Pdf->SetX($cell_OBS['posx']);
            }
            elseif (!empty($cell_OBS['posy']))
            {
                $this->Pdf->SetY($cell_OBS['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_OBS['width'], 0, $cell_OBS['data'], 0, 0, $cell_OBS['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_OBS['width'], 0, $atu_X, $atu_Y, $cell_OBS['data'], 0, 0, false, true, $cell_OBS['align']);
            }

            $this->Pdf->SetFont($cell_saldocumento['font_type'], $cell_saldocumento['font_style'], $cell_saldocumento['font_size']);
            $this->pdf_text_color($cell_saldocumento['data'], $cell_saldocumento['color_r'], $cell_saldocumento['color_g'], $cell_saldocumento['color_b']);
            if (!empty($cell_saldocumento['posx']) && !empty($cell_saldocumento['posy']))
            {
                $this->Pdf->SetXY($cell_saldocumento['posx'], $cell_saldocumento['posy']);
            }
            elseif (!empty($cell_saldocumento['posx']))
            {
                $this->Pdf->SetX($cell_saldocumento['posx']);
            }
            elseif (!empty($cell_saldocumento['posy']))
            {
                $this->Pdf->SetY($cell_saldocumento['posy']);
            }
            $this->Pdf->Cell($cell_saldocumento['width'], 0, $cell_saldocumento['data'], 0, 0, $cell_saldocumento['align']);

            $this->Pdf->SetFont($cell_56['font_type'], $cell_56['font_style'], $cell_56['font_size']);
            $this->pdf_text_color($cell_56['data'], $cell_56['color_r'], $cell_56['color_g'], $cell_56['color_b']);
            if (!empty($cell_56['posx']) && !empty($cell_56['posy']))
            {
                $this->Pdf->SetXY($cell_56['posx'], $cell_56['posy']);
            }
            elseif (!empty($cell_56['posx']))
            {
                $this->Pdf->SetX($cell_56['posx']);
            }
            elseif (!empty($cell_56['posy']))
            {
                $this->Pdf->SetY($cell_56['posy']);
            }
            $this->Pdf->Cell($cell_56['width'], 0, $cell_56['data'], 0, 0, $cell_56['align']);

            $this->Pdf->SetFont($cell_porcret['font_type'], $cell_porcret['font_style'], $cell_porcret['font_size']);
            $this->pdf_text_color($cell_porcret['data'], $cell_porcret['color_r'], $cell_porcret['color_g'], $cell_porcret['color_b']);
            if (!empty($cell_porcret['posx']) && !empty($cell_porcret['posy']))
            {
                $this->Pdf->SetXY($cell_porcret['posx'], $cell_porcret['posy']);
            }
            elseif (!empty($cell_porcret['posx']))
            {
                $this->Pdf->SetX($cell_porcret['posx']);
            }
            elseif (!empty($cell_porcret['posy']))
            {
                $this->Pdf->SetY($cell_porcret['posy']);
            }
            $this->Pdf->Cell($cell_porcret['width'], 0, $cell_porcret['data'], 0, 0, $cell_porcret['align']);

            $this->Pdf->SetFont($cell_58['font_type'], $cell_58['font_style'], $cell_58['font_size']);
            $this->pdf_text_color($cell_58['data'], $cell_58['color_r'], $cell_58['color_g'], $cell_58['color_b']);
            if (!empty($cell_58['posx']) && !empty($cell_58['posy']))
            {
                $this->Pdf->SetXY($cell_58['posx'], $cell_58['posy']);
            }
            elseif (!empty($cell_58['posx']))
            {
                $this->Pdf->SetX($cell_58['posx']);
            }
            elseif (!empty($cell_58['posy']))
            {
                $this->Pdf->SetY($cell_58['posy']);
            }
            $this->Pdf->Cell($cell_58['width'], 0, $cell_58['data'], 0, 0, $cell_58['align']);

            $this->Pdf->SetFont($cell_valica['font_type'], $cell_valica['font_style'], $cell_valica['font_size']);
            $this->pdf_text_color($cell_valica['data'], $cell_valica['color_r'], $cell_valica['color_g'], $cell_valica['color_b']);
            if (!empty($cell_valica['posx']) && !empty($cell_valica['posy']))
            {
                $this->Pdf->SetXY($cell_valica['posx'], $cell_valica['posy']);
            }
            elseif (!empty($cell_valica['posx']))
            {
                $this->Pdf->SetX($cell_valica['posx']);
            }
            elseif (!empty($cell_valica['posy']))
            {
                $this->Pdf->SetY($cell_valica['posy']);
            }
            $this->Pdf->Cell($cell_valica['width'], 0, $cell_valica['data'], 0, 0, $cell_valica['align']);

            $this->Pdf->SetFont($cell_60['font_type'], $cell_60['font_style'], $cell_60['font_size']);
            $this->pdf_text_color($cell_60['data'], $cell_60['color_r'], $cell_60['color_g'], $cell_60['color_b']);
            if (!empty($cell_60['posx']) && !empty($cell_60['posy']))
            {
                $this->Pdf->SetXY($cell_60['posx'], $cell_60['posy']);
            }
            elseif (!empty($cell_60['posx']))
            {
                $this->Pdf->SetX($cell_60['posx']);
            }
            elseif (!empty($cell_60['posy']))
            {
                $this->Pdf->SetY($cell_60['posy']);
            }
            $this->Pdf->Cell($cell_60['width'], 0, $cell_60['data'], 0, 0, $cell_60['align']);

            $this->Pdf->SetFont($cell_porcica['font_type'], $cell_porcica['font_style'], $cell_porcica['font_size']);
            $this->pdf_text_color($cell_porcica['data'], $cell_porcica['color_r'], $cell_porcica['color_g'], $cell_porcica['color_b']);
            if (!empty($cell_porcica['posx']) && !empty($cell_porcica['posy']))
            {
                $this->Pdf->SetXY($cell_porcica['posx'], $cell_porcica['posy']);
            }
            elseif (!empty($cell_porcica['posx']))
            {
                $this->Pdf->SetX($cell_porcica['posx']);
            }
            elseif (!empty($cell_porcica['posy']))
            {
                $this->Pdf->SetY($cell_porcica['posy']);
            }
            $this->Pdf->Cell($cell_porcica['width'], 0, $cell_porcica['data'], 0, 0, $cell_porcica['align']);

            $this->Pdf->SetFont($cell_62['font_type'], $cell_62['font_style'], $cell_62['font_size']);
            $this->pdf_text_color($cell_62['data'], $cell_62['color_r'], $cell_62['color_g'], $cell_62['color_b']);
            if (!empty($cell_62['posx']) && !empty($cell_62['posy']))
            {
                $this->Pdf->SetXY($cell_62['posx'], $cell_62['posy']);
            }
            elseif (!empty($cell_62['posx']))
            {
                $this->Pdf->SetX($cell_62['posx']);
            }
            elseif (!empty($cell_62['posy']))
            {
                $this->Pdf->SetY($cell_62['posy']);
            }
            $this->Pdf->Cell($cell_62['width'], 0, $cell_62['data'], 0, 0, $cell_62['align']);

            $this->Pdf->SetFont($cell_valretiva['font_type'], $cell_valretiva['font_style'], $cell_valretiva['font_size']);
            $this->pdf_text_color($cell_valretiva['data'], $cell_valretiva['color_r'], $cell_valretiva['color_g'], $cell_valretiva['color_b']);
            if (!empty($cell_valretiva['posx']) && !empty($cell_valretiva['posy']))
            {
                $this->Pdf->SetXY($cell_valretiva['posx'], $cell_valretiva['posy']);
            }
            elseif (!empty($cell_valretiva['posx']))
            {
                $this->Pdf->SetX($cell_valretiva['posx']);
            }
            elseif (!empty($cell_valretiva['posy']))
            {
                $this->Pdf->SetY($cell_valretiva['posy']);
            }
            $this->Pdf->Cell($cell_valretiva['width'], 0, $cell_valretiva['data'], 0, 0, $cell_valretiva['align']);

            $this->Pdf->SetFont($cell_64['font_type'], $cell_64['font_style'], $cell_64['font_size']);
            $this->pdf_text_color($cell_64['data'], $cell_64['color_r'], $cell_64['color_g'], $cell_64['color_b']);
            if (!empty($cell_64['posx']) && !empty($cell_64['posy']))
            {
                $this->Pdf->SetXY($cell_64['posx'], $cell_64['posy']);
            }
            elseif (!empty($cell_64['posx']))
            {
                $this->Pdf->SetX($cell_64['posx']);
            }
            elseif (!empty($cell_64['posy']))
            {
                $this->Pdf->SetY($cell_64['posy']);
            }
            $this->Pdf->Cell($cell_64['width'], 0, $cell_64['data'], 0, 0, $cell_64['align']);

            $this->Pdf->SetFont($cell_porreteiva['font_type'], $cell_porreteiva['font_style'], $cell_porreteiva['font_size']);
            $this->pdf_text_color($cell_porreteiva['data'], $cell_porreteiva['color_r'], $cell_porreteiva['color_g'], $cell_porreteiva['color_b']);
            if (!empty($cell_porreteiva['posx']) && !empty($cell_porreteiva['posy']))
            {
                $this->Pdf->SetXY($cell_porreteiva['posx'], $cell_porreteiva['posy']);
            }
            elseif (!empty($cell_porreteiva['posx']))
            {
                $this->Pdf->SetX($cell_porreteiva['posx']);
            }
            elseif (!empty($cell_porreteiva['posy']))
            {
                $this->Pdf->SetY($cell_porreteiva['posy']);
            }
            $this->Pdf->Cell($cell_porreteiva['width'], 0, $cell_porreteiva['data'], 0, 0, $cell_porreteiva['align']);

            $this->Pdf->SetFont($cell_66['font_type'], $cell_66['font_style'], $cell_66['font_size']);
            $this->pdf_text_color($cell_66['data'], $cell_66['color_r'], $cell_66['color_g'], $cell_66['color_b']);
            if (!empty($cell_66['posx']) && !empty($cell_66['posy']))
            {
                $this->Pdf->SetXY($cell_66['posx'], $cell_66['posy']);
            }
            elseif (!empty($cell_66['posx']))
            {
                $this->Pdf->SetX($cell_66['posx']);
            }
            elseif (!empty($cell_66['posy']))
            {
                $this->Pdf->SetY($cell_66['posy']);
            }
            $this->Pdf->Cell($cell_66['width'], 0, $cell_66['data'], 0, 0, $cell_66['align']);

          
$this->Pdf->Output("CE No: ".$this->numpago[$this->nm_grid_colunas].'.pdf', 'I');
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
function fFormapago()
{
$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'on';
  
$cad=$formapago ; 
	$existe=strpos ($cad, 'MIXT');
	if($existe !== false)
		{
		$formapago ='FORMA DE PAGO MULTIPLE';
		}



$_SESSION['scriptcase']['pdfreport_compregreso']['contr_erro'] = 'off';
}
}
?>
