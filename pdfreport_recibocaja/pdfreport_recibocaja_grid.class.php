<?php
class pdfreport_recibocaja_grid
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
   var $idrecibo = array();
   var $nurecibo = array();
   var $nufac = array();
   var $cliente = array();
   var $fecharecibo = array();
   var $monto = array();
   var $son = array();
   var $saldofac = array();
   var $formapago = array();
   var $numcheque = array();
   var $banco = array();
   var $numtarjeta = array();
   var $nombreobanco = array();
   var $obser = array();
   var $concepto = array();
   var $resolucion = array();
   var $rete = array();
   var $descu = array();
   var $porc_rete = array();
   var $val_ica = array();
   var $por_ica = array();
   var $por_retiva = array();
   var $val_retiva = array();
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
   $_SESSION['scriptcase']['pdfreport_recibocaja']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_recibocaja", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idrecibo[0] = $Busca_temp['idrecibo']; 
       $tmp_pos = strpos($this->idrecibo[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idrecibo[0]))
       {
           $this->idrecibo[0] = substr($this->idrecibo[0], 0, $tmp_pos);
       }
       $idrecibo_2 = $Busca_temp['idrecibo_input_2']; 
       $this->idrecibo_2 = $Busca_temp['idrecibo_input_2']; 
       $this->nurecibo[0] = $Busca_temp['nurecibo']; 
       $tmp_pos = strpos($this->nurecibo[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nurecibo[0]))
       {
           $this->nurecibo[0] = substr($this->nurecibo[0], 0, $tmp_pos);
       }
       $nurecibo_2 = $Busca_temp['nurecibo_input_2']; 
       $this->nurecibo_2 = $Busca_temp['nurecibo_input_2']; 
       $this->nufac[0] = $Busca_temp['nufac']; 
       $tmp_pos = strpos($this->nufac[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nufac[0]))
       {
           $this->nufac[0] = substr($this->nufac[0], 0, $tmp_pos);
       }
       $nufac_2 = $Busca_temp['nufac_input_2']; 
       $this->nufac_2 = $Busca_temp['nufac_input_2']; 
       $this->cliente[0] = $Busca_temp['cliente']; 
       $tmp_pos = strpos($this->cliente[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->cliente[0]))
       {
           $this->cliente[0] = substr($this->cliente[0], 0, $tmp_pos);
       }
       $cliente_2 = $Busca_temp['cliente_input_2']; 
       $this->cliente_2 = $Busca_temp['cliente_input_2']; 
       $this->obser[0] = $Busca_temp['obser']; 
       $tmp_pos = strpos($this->obser[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->obser[0]))
       {
           $this->obser[0] = substr($this->obser[0], 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
  $_SESSION['pdfreport_recibocaja']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_recibocaja']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_recibocaja']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_recibocaja']['telefono1']=$this->sc_temp_tele;
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'] = " where idrecibo=" . $_SESSION['par_numero'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, str_replace (convert(char(10),fecharecibo,102), '.', '-') + ' ' + convert(char(8),fecharecibo,20), monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, fecharecibo, monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, convert(char(23),fecharecibo,121), monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, fecharecibo, monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, EXTEND(fecharecibo, YEAR TO DAY), monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idrecibo, nurecibo, nufac, cliente, fecharecibo, monto, son, saldofac, formapago, numcheque, banco, numtarjeta, nombreobanco, obser, concepto, resolucion, rete, descu, porc_rete, val_ica, por_ica, por_retiva, val_retiva from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['order_grid'] = $nmgp_order_by;
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['idrecibo'] = "Idrecibo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['nurecibo'] = "Nurecibo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['nufac'] = "Nufac";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['cliente'] = "Cliente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['fecharecibo'] = "Fecharecibo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['monto'] = "Monto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['son'] = "Son";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['saldofac'] = "Saldofac";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['formapago'] = "Formapago";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['numcheque'] = "Numcheque";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['banco'] = "Banco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['numtarjeta'] = "Numtarjeta";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['nombreobanco'] = "Nombreobanco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['obser'] = "Obser";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['concepto'] = "Concepto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['resolucion'] = "Resolucion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['rete'] = "Rete";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['descu'] = "Descu";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['porc_rete'] = "Porc Rete";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['val_ica'] = "Val Ica";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['por_ica'] = "Por Ica";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['por_retiva'] = "Por Retiva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['val_retiva'] = "Val Retiva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos'] = "detallepagos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_banco'] = "Banco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_fechacob'] = "Fechacob";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_iddetall'] = "Iddetall";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_idfact'] = "Idfact";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_idfp'] = "Idfp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_idrc'] = "Idrc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_monto'] = "Monto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['labels']['detallepagos_numcheque'] = "Numcheque";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_recibocaja']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_recibocaja']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idrecibo[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idrecibo[$this->nm_grid_colunas] = (string)$this->idrecibo[$this->nm_grid_colunas];
          $this->nurecibo[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->nurecibo[$this->nm_grid_colunas] = (string)$this->nurecibo[$this->nm_grid_colunas];
          $this->nufac[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->nufac[$this->nm_grid_colunas] = (string)$this->nufac[$this->nm_grid_colunas];
          $this->cliente[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->cliente[$this->nm_grid_colunas] = (string)$this->cliente[$this->nm_grid_colunas];
          $this->fecharecibo[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->monto[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->monto[$this->nm_grid_colunas] =  str_replace(",", ".", $this->monto[$this->nm_grid_colunas]);
          $this->monto[$this->nm_grid_colunas] = (strpos(strtolower($this->monto[$this->nm_grid_colunas]), "e")) ? (float)$this->monto[$this->nm_grid_colunas] : $this->monto[$this->nm_grid_colunas]; 
          $this->monto[$this->nm_grid_colunas] = (string)$this->monto[$this->nm_grid_colunas];
          $this->son[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->saldofac[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->saldofac[$this->nm_grid_colunas] =  str_replace(",", ".", $this->saldofac[$this->nm_grid_colunas]);
          $this->saldofac[$this->nm_grid_colunas] = (strpos(strtolower($this->saldofac[$this->nm_grid_colunas]), "e")) ? (float)$this->saldofac[$this->nm_grid_colunas] : $this->saldofac[$this->nm_grid_colunas]; 
          $this->saldofac[$this->nm_grid_colunas] = (string)$this->saldofac[$this->nm_grid_colunas];
          $this->formapago[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->numcheque[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->banco[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->numtarjeta[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->nombreobanco[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->obser[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->concepto[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->resolucion[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->resolucion[$this->nm_grid_colunas] = (string)$this->resolucion[$this->nm_grid_colunas];
          $this->rete[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->rete[$this->nm_grid_colunas] =  str_replace(",", ".", $this->rete[$this->nm_grid_colunas]);
          $this->rete[$this->nm_grid_colunas] = (strpos(strtolower($this->rete[$this->nm_grid_colunas]), "e")) ? (float)$this->rete[$this->nm_grid_colunas] : $this->rete[$this->nm_grid_colunas]; 
          $this->rete[$this->nm_grid_colunas] = (string)$this->rete[$this->nm_grid_colunas];
          $this->descu[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->descu[$this->nm_grid_colunas] =  str_replace(",", ".", $this->descu[$this->nm_grid_colunas]);
          $this->descu[$this->nm_grid_colunas] = (strpos(strtolower($this->descu[$this->nm_grid_colunas]), "e")) ? (float)$this->descu[$this->nm_grid_colunas] : $this->descu[$this->nm_grid_colunas]; 
          $this->descu[$this->nm_grid_colunas] = (string)$this->descu[$this->nm_grid_colunas];
          $this->porc_rete[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->porc_rete[$this->nm_grid_colunas] = (strpos(strtolower($this->porc_rete[$this->nm_grid_colunas]), "e")) ? (float)$this->porc_rete[$this->nm_grid_colunas] : $this->porc_rete[$this->nm_grid_colunas]; 
          $this->porc_rete[$this->nm_grid_colunas] = (string)$this->porc_rete[$this->nm_grid_colunas];
          $this->val_ica[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->val_ica[$this->nm_grid_colunas] =  str_replace(",", ".", $this->val_ica[$this->nm_grid_colunas]);
          $this->val_ica[$this->nm_grid_colunas] = (strpos(strtolower($this->val_ica[$this->nm_grid_colunas]), "e")) ? (float)$this->val_ica[$this->nm_grid_colunas] : $this->val_ica[$this->nm_grid_colunas]; 
          $this->val_ica[$this->nm_grid_colunas] = (string)$this->val_ica[$this->nm_grid_colunas];
          $this->por_ica[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->por_ica[$this->nm_grid_colunas] = (strpos(strtolower($this->por_ica[$this->nm_grid_colunas]), "e")) ? (float)$this->por_ica[$this->nm_grid_colunas] : $this->por_ica[$this->nm_grid_colunas]; 
          $this->por_ica[$this->nm_grid_colunas] = (string)$this->por_ica[$this->nm_grid_colunas];
          $this->por_retiva[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->por_retiva[$this->nm_grid_colunas] = (strpos(strtolower($this->por_retiva[$this->nm_grid_colunas]), "e")) ? (float)$this->por_retiva[$this->nm_grid_colunas] : $this->por_retiva[$this->nm_grid_colunas]; 
          $this->por_retiva[$this->nm_grid_colunas] = (string)$this->por_retiva[$this->nm_grid_colunas];
          $this->val_retiva[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->val_retiva[$this->nm_grid_colunas] =  str_replace(",", ".", $this->val_retiva[$this->nm_grid_colunas]);
          $this->val_retiva[$this->nm_grid_colunas] = (strpos(strtolower($this->val_retiva[$this->nm_grid_colunas]), "e")) ? (float)$this->val_retiva[$this->nm_grid_colunas] : $this->val_retiva[$this->nm_grid_colunas]; 
          $this->val_retiva[$this->nm_grid_colunas] = (string)$this->val_retiva[$this->nm_grid_colunas];
          $this->detallepagos_banco[$this->nm_grid_colunas] = array();
          $this->detallepagos_fechacob[$this->nm_grid_colunas] = array();
          $this->detallepagos_iddetall[$this->nm_grid_colunas] = array();
          $this->detallepagos_idfact[$this->nm_grid_colunas] = array();
          $this->detallepagos_idfp[$this->nm_grid_colunas] = array();
          $this->detallepagos_idrc[$this->nm_grid_colunas] = array();
          $this->detallepagos_monto[$this->nm_grid_colunas] = array();
          $this->detallepagos_numcheque[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detallepagos($this->detallepagos[$this->nm_grid_colunas] , $this->idrecibo[$this->nm_grid_colunas], $array_detallepagos); 
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
          $_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'on';
  $this->fFormapago();
$this->rete[$this->nm_grid_colunas] =-$this->rete[$this->nm_grid_colunas] ;
$this->val_ica[$this->nm_grid_colunas] =-$this->val_ica[$this->nm_grid_colunas] ;
$this->val_retiva[$this->nm_grid_colunas] =-$this->val_retiva[$this->nm_grid_colunas] ;
$this->descu[$this->nm_grid_colunas] =-$this->descu[$this->nm_grid_colunas] ;
$_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'off';
          $this->idrecibo[$this->nm_grid_colunas] = sc_strip_script($this->idrecibo[$this->nm_grid_colunas]);
          if ($this->idrecibo[$this->nm_grid_colunas] === "") 
          { 
              $this->idrecibo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idrecibo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idrecibo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idrecibo[$this->nm_grid_colunas]);
          $this->nurecibo[$this->nm_grid_colunas] = sc_strip_script($this->nurecibo[$this->nm_grid_colunas]);
          if ($this->nurecibo[$this->nm_grid_colunas] === "") 
          { 
              $this->nurecibo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->nurecibo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->nurecibo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nurecibo[$this->nm_grid_colunas]);
          $this->nufac[$this->nm_grid_colunas] = sc_strip_script($this->nufac[$this->nm_grid_colunas]);
          if ($this->nufac[$this->nm_grid_colunas] === "") 
          { 
              $this->nufac[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->nufac[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->nufac[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nufac[$this->nm_grid_colunas]);
          $this->Lookup->lookup_cliente($this->cliente[$this->nm_grid_colunas] , $this->cliente[$this->nm_grid_colunas]) ; 
          $this->cliente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cliente[$this->nm_grid_colunas]);
          $this->fecharecibo[$this->nm_grid_colunas] = sc_strip_script($this->fecharecibo[$this->nm_grid_colunas]);
          if ($this->fecharecibo[$this->nm_grid_colunas] === "") 
          { 
              $this->fecharecibo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecharecibo_x =  $this->fecharecibo[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecharecibo_x, "YYYY-MM-DD");
               if (is_numeric($fecharecibo_x) && strlen($fecharecibo_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecharecibo[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecharecibo[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecharecibo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecharecibo[$this->nm_grid_colunas]);
          $this->monto[$this->nm_grid_colunas] = sc_strip_script($this->monto[$this->nm_grid_colunas]);
          if ($this->monto[$this->nm_grid_colunas] === "") 
          { 
              $this->monto[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->monto[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->monto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->monto[$this->nm_grid_colunas]);
          $this->son[$this->nm_grid_colunas] = sc_strip_script($this->son[$this->nm_grid_colunas]);
          if ($this->son[$this->nm_grid_colunas] === "") 
          { 
              $this->son[$this->nm_grid_colunas] = "" ;  
          } 
          $this->son[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->son[$this->nm_grid_colunas]);
          $this->saldofac[$this->nm_grid_colunas] = sc_strip_script($this->saldofac[$this->nm_grid_colunas]);
          if ($this->saldofac[$this->nm_grid_colunas] === "") 
          { 
              $this->saldofac[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->saldofac[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->saldofac[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->saldofac[$this->nm_grid_colunas]);
          $this->formapago[$this->nm_grid_colunas] = sc_strip_script($this->formapago[$this->nm_grid_colunas]);
          if ($this->formapago[$this->nm_grid_colunas] === "") 
          { 
              $this->formapago[$this->nm_grid_colunas] = "" ;  
          } 
          $this->formapago[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->formapago[$this->nm_grid_colunas]);
          $this->numcheque[$this->nm_grid_colunas] = sc_strip_script($this->numcheque[$this->nm_grid_colunas]);
          if ($this->numcheque[$this->nm_grid_colunas] === "") 
          { 
              $this->numcheque[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numcheque[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numcheque[$this->nm_grid_colunas]);
          $this->banco[$this->nm_grid_colunas] = sc_strip_script($this->banco[$this->nm_grid_colunas]);
          if ($this->banco[$this->nm_grid_colunas] === "") 
          { 
              $this->banco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->banco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->banco[$this->nm_grid_colunas]);
          $this->numtarjeta[$this->nm_grid_colunas] = sc_strip_script($this->numtarjeta[$this->nm_grid_colunas]);
          if ($this->numtarjeta[$this->nm_grid_colunas] === "") 
          { 
              $this->numtarjeta[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numtarjeta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numtarjeta[$this->nm_grid_colunas]);
          $this->nombreobanco[$this->nm_grid_colunas] = sc_strip_script($this->nombreobanco[$this->nm_grid_colunas]);
          if ($this->nombreobanco[$this->nm_grid_colunas] === "") 
          { 
              $this->nombreobanco[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombreobanco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombreobanco[$this->nm_grid_colunas]);
          $this->obser[$this->nm_grid_colunas] = sc_strip_script($this->obser[$this->nm_grid_colunas]);
          if ($this->obser[$this->nm_grid_colunas] === "") 
          { 
              $this->obser[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->obser[$this->nm_grid_colunas] !== "") 
          { 
              $this->obser[$this->nm_grid_colunas] = sc_strtoupper($this->obser[$this->nm_grid_colunas]); 
          } 
          $this->obser[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->obser[$this->nm_grid_colunas]);
          $this->concepto[$this->nm_grid_colunas] = sc_strip_script($this->concepto[$this->nm_grid_colunas]);
          if ($this->concepto[$this->nm_grid_colunas] === "") 
          { 
              $this->concepto[$this->nm_grid_colunas] = "" ;  
          } 
          $this->concepto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->concepto[$this->nm_grid_colunas]);
          $this->Lookup->lookup_resolucion($this->resolucion[$this->nm_grid_colunas] , $this->resolucion[$this->nm_grid_colunas]) ; 
          $this->resolucion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->resolucion[$this->nm_grid_colunas]);
          $this->rete[$this->nm_grid_colunas] = sc_strip_script($this->rete[$this->nm_grid_colunas]);
          if ($this->rete[$this->nm_grid_colunas] === "") 
          { 
              $this->rete[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->rete[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:13", "-") ; 
          } 
          $this->rete[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rete[$this->nm_grid_colunas]);
          $this->descu[$this->nm_grid_colunas] = sc_strip_script($this->descu[$this->nm_grid_colunas]);
          if ($this->descu[$this->nm_grid_colunas] === "") 
          { 
              $this->descu[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->descu[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->descu[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->descu[$this->nm_grid_colunas]);
          $this->porc_rete[$this->nm_grid_colunas] = sc_strip_script($this->porc_rete[$this->nm_grid_colunas]);
          if ($this->porc_rete[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_rete[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_rete[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->porc_rete[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_rete[$this->nm_grid_colunas]);
          $this->val_ica[$this->nm_grid_colunas] = sc_strip_script($this->val_ica[$this->nm_grid_colunas]);
          if ($this->val_ica[$this->nm_grid_colunas] === "") 
          { 
              $this->val_ica[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->val_ica[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $this->val_ica[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->val_ica[$this->nm_grid_colunas]);
          $this->por_ica[$this->nm_grid_colunas] = sc_strip_script($this->por_ica[$this->nm_grid_colunas]);
          if ($this->por_ica[$this->nm_grid_colunas] === "") 
          { 
              $this->por_ica[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->por_ica[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->por_ica[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->por_ica[$this->nm_grid_colunas]);
          $this->por_retiva[$this->nm_grid_colunas] = sc_strip_script($this->por_retiva[$this->nm_grid_colunas]);
          if ($this->por_retiva[$this->nm_grid_colunas] === "") 
          { 
              $this->por_retiva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->por_retiva[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->por_retiva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->por_retiva[$this->nm_grid_colunas]);
          $this->val_retiva[$this->nm_grid_colunas] = sc_strip_script($this->val_retiva[$this->nm_grid_colunas]);
          if ($this->val_retiva[$this->nm_grid_colunas] === "") 
          { 
              $this->val_retiva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->val_retiva[$this->nm_grid_colunas], ".", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $this->val_retiva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->val_retiva[$this->nm_grid_colunas]);
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
              nmgp_Form_Num_Val($this->detallepagos_monto[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
            $cell_titulo = array('posx' => 10, 'posy' => 7, 'data' => $this->SC_conv_utf8('RECIBO DE INGRESO'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => BU);
            $empresa_ = array('posx' => 10, 'posy' => 15, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_recibocaja']['empresa_nombre'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $nit_ = array('posx' => 10, 'posy' => 23, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_recibocaja']['nit'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $direccion_ = array('posx' => 10, 'posy' => 27, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_recibocaja']['direccion1'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $tel_ = array('posx' => 10, 'posy' => 31, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_recibocaja']['telefono1'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etinurecibo = array('posx' => 150, 'posy' => 15, 'data' => $this->SC_conv_utf8('RECIBO N°:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_nurecibo = array('posx' => 180, 'posy' => 14, 'data' => $this->nurecibo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_nufac = array('posx' => 185, 'posy' => 83, 'data' => $this->nufac[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etfech = array('posx' => 150, 'posy' => 25, 'data' => $this->SC_conv_utf8('FECHA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fecharecibo = array('posx' => 180, 'posy' => 25, 'data' => $this->fecharecibo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_cliente = array('posx' => 40, 'posy' => 46, 'data' => $this->cliente[$this->nm_grid_colunas], 'width'      => 160, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_monto = array('posx' => 40, 'posy' => 77, 'data' => $this->monto[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_formapago = array('posx' => 40, 'posy' => 64, 'data' => $this->rete[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numcheque = array('posx' => 70, 'posy' => 70, 'data' => $this->numcheque[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_banco = array('posx' => 100, 'posy' => 70, 'data' => $this->banco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numtarjeta = array('posx' => 40, 'posy' => 75, 'data' => $this->numtarjeta[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_obser = array('posx' => 50, 'posy' => 92, 'data' => $this->obser[$this->nm_grid_colunas], 'width'      => 140, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $LINEA = array('posx' => 10, 'posy' => 35, 'data' => $this->SC_conv_utf8('___________________________________________________________________________________________________'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $et_recibico_DE = array('posx' => 10, 'posy' => 45, 'data' => $this->SC_conv_utf8('RECIBIDO DE:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_concepto = array('posx' => 40, 'posy' => 83, 'data' => $this->concepto[$this->nm_grid_colunas], 'width'      => 100, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_eticoncepto = array('posx' => 10, 'posy' => 83, 'data' => $this->SC_conv_utf8('CONCEPTO:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etfacnumero = array('posx' => 145, 'posy' => 83, 'data' => $this->SC_conv_utf8('Número:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etobse = array('posx' => 10, 'posy' => 92, 'data' => $this->SC_conv_utf8('Observaciones:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_recibido = array('posx' => 157, 'posy' => 130, 'data' => $this->SC_conv_utf8('Recibido Por'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_linearecibido = array('posx' => 140, 'posy' => 125, 'data' => $this->SC_conv_utf8('_________________________'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numeros = array('posx' => 10, 'posy' => 77, 'data' => $this->SC_conv_utf8('Valor Recibido:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_forma_pago = array('posx' => 10, 'posy' => 64, 'data' => $this->SC_conv_utf8('Retención:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_31 = array('posx' => 165, 'posy' => 83, 'data' => $this->resolucion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_idfp = array('posx' => 10, 'posy' => 110, 'data' => $this->detallepagos_idfp[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_monto = array('posx' => 10, 'posy' => 110, 'data' => $this->detallepagos_monto[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'R', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_banco = array('posx' => 45, 'posy' => 110, 'data' => $this->detallepagos_banco[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_numcheque = array('posx' => 80, 'posy' => 110, 'data' => $this->detallepagos_numcheque[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detallepagos_fechacob = array('posx' => 125, 'posy' => 110, 'data' => $this->detallepagos_fechacob[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_41 = array('posx' => 10, 'posy' => 105, 'data' => $this->SC_conv_utf8('Forma de Pago'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_42 = array('posx' => 45, 'posy' => 105, 'data' => $this->SC_conv_utf8('Nom. banco'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_43 = array('posx' => 80, 'posy' => 105, 'data' => $this->SC_conv_utf8('Núm. Ch.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_44 = array('posx' => 125, 'posy' => 105, 'data' => $this->SC_conv_utf8('Fecha Ch.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_45 = array('posx' => 10, 'posy' => 105, 'data' => $this->SC_conv_utf8('Monto $     '), 'width'      => 0, 'align'      => 'R', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_desc = array('posx' => 100, 'posy' => 71, 'data' => $this->SC_conv_utf8('Descuento:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_descu = array('posx' => 135, 'posy' => 71, 'data' => $this->descu[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Saldoapagar = array('posx' => 40, 'posy' => 57, 'data' => $this->saldofac[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_49 = array('posx' => 10, 'posy' => 57, 'data' => $this->SC_conv_utf8('Valor a cancelar:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porcretencion = array('posx' => 74, 'posy' => 64, 'data' => $this->porc_rete[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_51 = array('posx' => 70, 'posy' => 64, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Val_ICA = array('posx' => 135, 'posy' => 64, 'data' => $this->val_ica[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porc_ica = array('posx' => 169, 'posy' => 64, 'data' => $this->por_ica[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_54 = array('posx' => 100, 'posy' => 64, 'data' => $this->SC_conv_utf8('Rete ICA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_55 = array('posx' => 165, 'posy' => 64, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_56 = array('posx' => 10, 'posy' => 71, 'data' => $this->SC_conv_utf8('Rete IVA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_reteiva = array('posx' => 40, 'posy' => 71, 'data' => $this->val_retiva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porreteiva = array('posx' => 74, 'posy' => 71, 'data' => $this->por_retiva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_59 = array('posx' => 70, 'posy' => 71, 'data' => $this->SC_conv_utf8('(%     )'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


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

            $this->Pdf->SetFont($cell_nurecibo['font_type'], $cell_nurecibo['font_style'], $cell_nurecibo['font_size']);
            $this->pdf_text_color($cell_nurecibo['data'], $cell_nurecibo['color_r'], $cell_nurecibo['color_g'], $cell_nurecibo['color_b']);
            if (!empty($cell_nurecibo['posx']) && !empty($cell_nurecibo['posy']))
            {
                $this->Pdf->SetXY($cell_nurecibo['posx'], $cell_nurecibo['posy']);
            }
            elseif (!empty($cell_nurecibo['posx']))
            {
                $this->Pdf->SetX($cell_nurecibo['posx']);
            }
            elseif (!empty($cell_nurecibo['posy']))
            {
                $this->Pdf->SetY($cell_nurecibo['posy']);
            }
            $this->Pdf->Cell($cell_nurecibo['width'], 0, $cell_nurecibo['data'], 0, 0, $cell_nurecibo['align']);

            $this->Pdf->SetFont($cell_nufac['font_type'], $cell_nufac['font_style'], $cell_nufac['font_size']);
            $this->pdf_text_color($cell_nufac['data'], $cell_nufac['color_r'], $cell_nufac['color_g'], $cell_nufac['color_b']);
            if (!empty($cell_nufac['posx']) && !empty($cell_nufac['posy']))
            {
                $this->Pdf->SetXY($cell_nufac['posx'], $cell_nufac['posy']);
            }
            elseif (!empty($cell_nufac['posx']))
            {
                $this->Pdf->SetX($cell_nufac['posx']);
            }
            elseif (!empty($cell_nufac['posy']))
            {
                $this->Pdf->SetY($cell_nufac['posy']);
            }
            $this->Pdf->Cell($cell_nufac['width'], 0, $cell_nufac['data'], 0, 0, $cell_nufac['align']);

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

            $this->Pdf->SetFont($cell_fecharecibo['font_type'], $cell_fecharecibo['font_style'], $cell_fecharecibo['font_size']);
            $this->pdf_text_color($cell_fecharecibo['data'], $cell_fecharecibo['color_r'], $cell_fecharecibo['color_g'], $cell_fecharecibo['color_b']);
            if (!empty($cell_fecharecibo['posx']) && !empty($cell_fecharecibo['posy']))
            {
                $this->Pdf->SetXY($cell_fecharecibo['posx'], $cell_fecharecibo['posy']);
            }
            elseif (!empty($cell_fecharecibo['posx']))
            {
                $this->Pdf->SetX($cell_fecharecibo['posx']);
            }
            elseif (!empty($cell_fecharecibo['posy']))
            {
                $this->Pdf->SetY($cell_fecharecibo['posy']);
            }
            $this->Pdf->Cell($cell_fecharecibo['width'], 0, $cell_fecharecibo['data'], 0, 0, $cell_fecharecibo['align']);

            $this->Pdf->SetFont($cell_cliente['font_type'], $cell_cliente['font_style'], $cell_cliente['font_size']);
            $this->pdf_text_color($cell_cliente['data'], $cell_cliente['color_r'], $cell_cliente['color_g'], $cell_cliente['color_b']);
            if (!empty($cell_cliente['posx']) && !empty($cell_cliente['posy']))
            {
                $this->Pdf->SetXY($cell_cliente['posx'], $cell_cliente['posy']);
            }
            elseif (!empty($cell_cliente['posx']))
            {
                $this->Pdf->SetX($cell_cliente['posx']);
            }
            elseif (!empty($cell_cliente['posy']))
            {
                $this->Pdf->SetY($cell_cliente['posy']);
            }
            $this->Pdf->Cell($cell_cliente['width'], 0, $cell_cliente['data'], 0, 0, $cell_cliente['align']);

            $this->Pdf->SetFont($cell_monto['font_type'], $cell_monto['font_style'], $cell_monto['font_size']);
            $this->pdf_text_color($cell_monto['data'], $cell_monto['color_r'], $cell_monto['color_g'], $cell_monto['color_b']);
            if (!empty($cell_monto['posx']) && !empty($cell_monto['posy']))
            {
                $this->Pdf->SetXY($cell_monto['posx'], $cell_monto['posy']);
            }
            elseif (!empty($cell_monto['posx']))
            {
                $this->Pdf->SetX($cell_monto['posx']);
            }
            elseif (!empty($cell_monto['posy']))
            {
                $this->Pdf->SetY($cell_monto['posy']);
            }
            $this->Pdf->Cell($cell_monto['width'], 0, $cell_monto['data'], 0, 0, $cell_monto['align']);

            $this->Pdf->SetFont($cell_formapago['font_type'], $cell_formapago['font_style'], $cell_formapago['font_size']);
            $this->pdf_text_color($cell_formapago['data'], $cell_formapago['color_r'], $cell_formapago['color_g'], $cell_formapago['color_b']);
            if (!empty($cell_formapago['posx']) && !empty($cell_formapago['posy']))
            {
                $this->Pdf->SetXY($cell_formapago['posx'], $cell_formapago['posy']);
            }
            elseif (!empty($cell_formapago['posx']))
            {
                $this->Pdf->SetX($cell_formapago['posx']);
            }
            elseif (!empty($cell_formapago['posy']))
            {
                $this->Pdf->SetY($cell_formapago['posy']);
            }
            $this->Pdf->Cell($cell_formapago['width'], 0, $cell_formapago['data'], 0, 0, $cell_formapago['align']);

            $this->Pdf->SetFont($cell_numcheque['font_type'], $cell_numcheque['font_style'], $cell_numcheque['font_size']);
            $this->pdf_text_color($cell_numcheque['data'], $cell_numcheque['color_r'], $cell_numcheque['color_g'], $cell_numcheque['color_b']);
            if (!empty($cell_numcheque['posx']) && !empty($cell_numcheque['posy']))
            {
                $this->Pdf->SetXY($cell_numcheque['posx'], $cell_numcheque['posy']);
            }
            elseif (!empty($cell_numcheque['posx']))
            {
                $this->Pdf->SetX($cell_numcheque['posx']);
            }
            elseif (!empty($cell_numcheque['posy']))
            {
                $this->Pdf->SetY($cell_numcheque['posy']);
            }
            $this->Pdf->Cell($cell_numcheque['width'], 0, $cell_numcheque['data'], 0, 0, $cell_numcheque['align']);

            $this->Pdf->SetFont($cell_banco['font_type'], $cell_banco['font_style'], $cell_banco['font_size']);
            $this->pdf_text_color($cell_banco['data'], $cell_banco['color_r'], $cell_banco['color_g'], $cell_banco['color_b']);
            if (!empty($cell_banco['posx']) && !empty($cell_banco['posy']))
            {
                $this->Pdf->SetXY($cell_banco['posx'], $cell_banco['posy']);
            }
            elseif (!empty($cell_banco['posx']))
            {
                $this->Pdf->SetX($cell_banco['posx']);
            }
            elseif (!empty($cell_banco['posy']))
            {
                $this->Pdf->SetY($cell_banco['posy']);
            }
            $this->Pdf->Cell($cell_banco['width'], 0, $cell_banco['data'], 0, 0, $cell_banco['align']);

            $this->Pdf->SetFont($cell_numtarjeta['font_type'], $cell_numtarjeta['font_style'], $cell_numtarjeta['font_size']);
            $this->pdf_text_color($cell_numtarjeta['data'], $cell_numtarjeta['color_r'], $cell_numtarjeta['color_g'], $cell_numtarjeta['color_b']);
            if (!empty($cell_numtarjeta['posx']) && !empty($cell_numtarjeta['posy']))
            {
                $this->Pdf->SetXY($cell_numtarjeta['posx'], $cell_numtarjeta['posy']);
            }
            elseif (!empty($cell_numtarjeta['posx']))
            {
                $this->Pdf->SetX($cell_numtarjeta['posx']);
            }
            elseif (!empty($cell_numtarjeta['posy']))
            {
                $this->Pdf->SetY($cell_numtarjeta['posy']);
            }
            $this->Pdf->Cell($cell_numtarjeta['width'], 0, $cell_numtarjeta['data'], 0, 0, $cell_numtarjeta['align']);


            $this->Pdf->SetFont($cell_obser['font_type'], $cell_obser['font_style'], $cell_obser['font_size']);
            $this->Pdf->SetTextColor($cell_obser['color_r'], $cell_obser['color_g'], $cell_obser['color_b']);
            if (!empty($cell_obser['posx']) && !empty($cell_obser['posy']))
            {
                $this->Pdf->SetXY($cell_obser['posx'], $cell_obser['posy']);
            }
            elseif (!empty($cell_obser['posx']))
            {
                $this->Pdf->SetX($cell_obser['posx']);
            }
            elseif (!empty($cell_obser['posy']))
            {
                $this->Pdf->SetY($cell_obser['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_obser['width'], 0, $cell_obser['data'], 0, 0, $cell_obser['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_obser['width'], 0, $atu_X, $atu_Y, $cell_obser['data'], 0, 0, false, true, $cell_obser['align']);
            }

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


            $this->Pdf->SetFont($cell_concepto['font_type'], $cell_concepto['font_style'], $cell_concepto['font_size']);
            $this->Pdf->SetTextColor($cell_concepto['color_r'], $cell_concepto['color_g'], $cell_concepto['color_b']);
            if (!empty($cell_concepto['posx']) && !empty($cell_concepto['posy']))
            {
                $this->Pdf->SetXY($cell_concepto['posx'], $cell_concepto['posy']);
            }
            elseif (!empty($cell_concepto['posx']))
            {
                $this->Pdf->SetX($cell_concepto['posx']);
            }
            elseif (!empty($cell_concepto['posy']))
            {
                $this->Pdf->SetY($cell_concepto['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_concepto['width'], 0, $cell_concepto['data'], 0, 0, $cell_concepto['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_concepto['width'], 0, $atu_X, $atu_Y, $cell_concepto['data'], 0, 0, false, true, $cell_concepto['align']);
            }

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

            $this->Pdf->SetFont($cell_31['font_type'], $cell_31['font_style'], $cell_31['font_size']);
            $this->pdf_text_color($cell_31['data'], $cell_31['color_r'], $cell_31['color_g'], $cell_31['color_b']);
            if (!empty($cell_31['posx']) && !empty($cell_31['posy']))
            {
                $this->Pdf->SetXY($cell_31['posx'], $cell_31['posy']);
            }
            elseif (!empty($cell_31['posx']))
            {
                $this->Pdf->SetX($cell_31['posx']);
            }
            elseif (!empty($cell_31['posy']))
            {
                $this->Pdf->SetY($cell_31['posy']);
            }
            $this->Pdf->Cell($cell_31['width'], 0, $cell_31['data'], 0, 0, $cell_31['align']);

            $this->Pdf->SetY(110);
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

            $this->Pdf->SetFont($cell_desc['font_type'], $cell_desc['font_style'], $cell_desc['font_size']);
            $this->pdf_text_color($cell_desc['data'], $cell_desc['color_r'], $cell_desc['color_g'], $cell_desc['color_b']);
            if (!empty($cell_desc['posx']) && !empty($cell_desc['posy']))
            {
                $this->Pdf->SetXY($cell_desc['posx'], $cell_desc['posy']);
            }
            elseif (!empty($cell_desc['posx']))
            {
                $this->Pdf->SetX($cell_desc['posx']);
            }
            elseif (!empty($cell_desc['posy']))
            {
                $this->Pdf->SetY($cell_desc['posy']);
            }
            $this->Pdf->Cell($cell_desc['width'], 0, $cell_desc['data'], 0, 0, $cell_desc['align']);

            $this->Pdf->SetFont($cell_descu['font_type'], $cell_descu['font_style'], $cell_descu['font_size']);
            $this->pdf_text_color($cell_descu['data'], $cell_descu['color_r'], $cell_descu['color_g'], $cell_descu['color_b']);
            if (!empty($cell_descu['posx']) && !empty($cell_descu['posy']))
            {
                $this->Pdf->SetXY($cell_descu['posx'], $cell_descu['posy']);
            }
            elseif (!empty($cell_descu['posx']))
            {
                $this->Pdf->SetX($cell_descu['posx']);
            }
            elseif (!empty($cell_descu['posy']))
            {
                $this->Pdf->SetY($cell_descu['posy']);
            }
            $this->Pdf->Cell($cell_descu['width'], 0, $cell_descu['data'], 0, 0, $cell_descu['align']);

            $this->Pdf->SetFont($cell_Saldoapagar['font_type'], $cell_Saldoapagar['font_style'], $cell_Saldoapagar['font_size']);
            $this->pdf_text_color($cell_Saldoapagar['data'], $cell_Saldoapagar['color_r'], $cell_Saldoapagar['color_g'], $cell_Saldoapagar['color_b']);
            if (!empty($cell_Saldoapagar['posx']) && !empty($cell_Saldoapagar['posy']))
            {
                $this->Pdf->SetXY($cell_Saldoapagar['posx'], $cell_Saldoapagar['posy']);
            }
            elseif (!empty($cell_Saldoapagar['posx']))
            {
                $this->Pdf->SetX($cell_Saldoapagar['posx']);
            }
            elseif (!empty($cell_Saldoapagar['posy']))
            {
                $this->Pdf->SetY($cell_Saldoapagar['posy']);
            }
            $this->Pdf->Cell($cell_Saldoapagar['width'], 0, $cell_Saldoapagar['data'], 0, 0, $cell_Saldoapagar['align']);

            $this->Pdf->SetFont($cell_49['font_type'], $cell_49['font_style'], $cell_49['font_size']);
            $this->pdf_text_color($cell_49['data'], $cell_49['color_r'], $cell_49['color_g'], $cell_49['color_b']);
            if (!empty($cell_49['posx']) && !empty($cell_49['posy']))
            {
                $this->Pdf->SetXY($cell_49['posx'], $cell_49['posy']);
            }
            elseif (!empty($cell_49['posx']))
            {
                $this->Pdf->SetX($cell_49['posx']);
            }
            elseif (!empty($cell_49['posy']))
            {
                $this->Pdf->SetY($cell_49['posy']);
            }
            $this->Pdf->Cell($cell_49['width'], 0, $cell_49['data'], 0, 0, $cell_49['align']);

            $this->Pdf->SetFont($cell_porcretencion['font_type'], $cell_porcretencion['font_style'], $cell_porcretencion['font_size']);
            $this->pdf_text_color($cell_porcretencion['data'], $cell_porcretencion['color_r'], $cell_porcretencion['color_g'], $cell_porcretencion['color_b']);
            if (!empty($cell_porcretencion['posx']) && !empty($cell_porcretencion['posy']))
            {
                $this->Pdf->SetXY($cell_porcretencion['posx'], $cell_porcretencion['posy']);
            }
            elseif (!empty($cell_porcretencion['posx']))
            {
                $this->Pdf->SetX($cell_porcretencion['posx']);
            }
            elseif (!empty($cell_porcretencion['posy']))
            {
                $this->Pdf->SetY($cell_porcretencion['posy']);
            }
            $this->Pdf->Cell($cell_porcretencion['width'], 0, $cell_porcretencion['data'], 0, 0, $cell_porcretencion['align']);

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

            $this->Pdf->SetFont($cell_Val_ICA['font_type'], $cell_Val_ICA['font_style'], $cell_Val_ICA['font_size']);
            $this->pdf_text_color($cell_Val_ICA['data'], $cell_Val_ICA['color_r'], $cell_Val_ICA['color_g'], $cell_Val_ICA['color_b']);
            if (!empty($cell_Val_ICA['posx']) && !empty($cell_Val_ICA['posy']))
            {
                $this->Pdf->SetXY($cell_Val_ICA['posx'], $cell_Val_ICA['posy']);
            }
            elseif (!empty($cell_Val_ICA['posx']))
            {
                $this->Pdf->SetX($cell_Val_ICA['posx']);
            }
            elseif (!empty($cell_Val_ICA['posy']))
            {
                $this->Pdf->SetY($cell_Val_ICA['posy']);
            }
            $this->Pdf->Cell($cell_Val_ICA['width'], 0, $cell_Val_ICA['data'], 0, 0, $cell_Val_ICA['align']);

            $this->Pdf->SetFont($cell_porc_ica['font_type'], $cell_porc_ica['font_style'], $cell_porc_ica['font_size']);
            $this->pdf_text_color($cell_porc_ica['data'], $cell_porc_ica['color_r'], $cell_porc_ica['color_g'], $cell_porc_ica['color_b']);
            if (!empty($cell_porc_ica['posx']) && !empty($cell_porc_ica['posy']))
            {
                $this->Pdf->SetXY($cell_porc_ica['posx'], $cell_porc_ica['posy']);
            }
            elseif (!empty($cell_porc_ica['posx']))
            {
                $this->Pdf->SetX($cell_porc_ica['posx']);
            }
            elseif (!empty($cell_porc_ica['posy']))
            {
                $this->Pdf->SetY($cell_porc_ica['posy']);
            }
            $this->Pdf->Cell($cell_porc_ica['width'], 0, $cell_porc_ica['data'], 0, 0, $cell_porc_ica['align']);

            $this->Pdf->SetFont($cell_54['font_type'], $cell_54['font_style'], $cell_54['font_size']);
            $this->pdf_text_color($cell_54['data'], $cell_54['color_r'], $cell_54['color_g'], $cell_54['color_b']);
            if (!empty($cell_54['posx']) && !empty($cell_54['posy']))
            {
                $this->Pdf->SetXY($cell_54['posx'], $cell_54['posy']);
            }
            elseif (!empty($cell_54['posx']))
            {
                $this->Pdf->SetX($cell_54['posx']);
            }
            elseif (!empty($cell_54['posy']))
            {
                $this->Pdf->SetY($cell_54['posy']);
            }
            $this->Pdf->Cell($cell_54['width'], 0, $cell_54['data'], 0, 0, $cell_54['align']);

            $this->Pdf->SetFont($cell_55['font_type'], $cell_55['font_style'], $cell_55['font_size']);
            $this->pdf_text_color($cell_55['data'], $cell_55['color_r'], $cell_55['color_g'], $cell_55['color_b']);
            if (!empty($cell_55['posx']) && !empty($cell_55['posy']))
            {
                $this->Pdf->SetXY($cell_55['posx'], $cell_55['posy']);
            }
            elseif (!empty($cell_55['posx']))
            {
                $this->Pdf->SetX($cell_55['posx']);
            }
            elseif (!empty($cell_55['posy']))
            {
                $this->Pdf->SetY($cell_55['posy']);
            }
            $this->Pdf->Cell($cell_55['width'], 0, $cell_55['data'], 0, 0, $cell_55['align']);

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

            $this->Pdf->SetFont($cell_reteiva['font_type'], $cell_reteiva['font_style'], $cell_reteiva['font_size']);
            $this->pdf_text_color($cell_reteiva['data'], $cell_reteiva['color_r'], $cell_reteiva['color_g'], $cell_reteiva['color_b']);
            if (!empty($cell_reteiva['posx']) && !empty($cell_reteiva['posy']))
            {
                $this->Pdf->SetXY($cell_reteiva['posx'], $cell_reteiva['posy']);
            }
            elseif (!empty($cell_reteiva['posx']))
            {
                $this->Pdf->SetX($cell_reteiva['posx']);
            }
            elseif (!empty($cell_reteiva['posy']))
            {
                $this->Pdf->SetY($cell_reteiva['posy']);
            }
            $this->Pdf->Cell($cell_reteiva['width'], 0, $cell_reteiva['data'], 0, 0, $cell_reteiva['align']);

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

            $this->Pdf->SetFont($cell_59['font_type'], $cell_59['font_style'], $cell_59['font_size']);
            $this->pdf_text_color($cell_59['data'], $cell_59['color_r'], $cell_59['color_g'], $cell_59['color_b']);
            if (!empty($cell_59['posx']) && !empty($cell_59['posy']))
            {
                $this->Pdf->SetXY($cell_59['posx'], $cell_59['posy']);
            }
            elseif (!empty($cell_59['posx']))
            {
                $this->Pdf->SetX($cell_59['posx']);
            }
            elseif (!empty($cell_59['posy']))
            {
                $this->Pdf->SetY($cell_59['posy']);
            }
            $this->Pdf->Cell($cell_59['width'], 0, $cell_59['data'], 0, 0, $cell_59['align']);

          

$this->Pdf->Output("Rec. Ingreso a caja No: ".$this->nurecibo[$this->nm_grid_colunas].' '.$this->cliente[$this->nm_grid_colunas].'.pdf', 'I');
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
$_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'on';
  
$cad=$this->formapago[$this->nm_grid_colunas] ; 
	$existe=strpos ($cad, 'MIXT');
	if($existe !== false)
		{
		$this->formapago[$this->nm_grid_colunas] ='FORMA DE PAGO MULTIPLE';
		}



$_SESSION['scriptcase']['pdfreport_recibocaja']['contr_erro'] = 'off';
}
}
?>
