<?php
class pdfreport_caja_1_grid
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
   var $cheques = array();
   var $efectivo = array();
   var $facturado = array();
   var $rango = array();
   var $tarjeta = array();
   var $prueba = array();
   var $nfac = array();
   var $totventa = array();
   var $credito = array();
   var $retefuente = array();
   var $reteica = array();
   var $reteiva = array();
   var $cree = array();
   var $tot_rete = array();
   var $ajuste = array();
   var $iva_19 = array();
   var $iva_5 = array();
   var $iva_0 = array();
   var $tot_iva = array();
   var $tot_base = array();
   var $base19 = array();
   var $base5 = array();
   var $base0 = array();
   var $imp_consumo = array();
   var $tot_impoconsumo = array();
   var $imp_bolsa = array();
   var $descuentos = array();
   var $c_efec = array();
   var $c_tarj = array();
   var $c_cheq = array();
   var $c_credito = array();
   var $porc_ef = array();
   var $porc_tarj = array();
   var $porc_cheq = array();
   var $porc_credito = array();
   var $depto = array();
   var $empresa = array();
   var $resolu = array();
   var $dire_ = array();
   var $correo_ = array();
   var $fecha = array();
   var $cantidad = array();
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
   $this->default_font = 'Courier';
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
   $_SESSION['scriptcase']['pdfreport_caja_1']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_caja_1", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->fecha[0] = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha[0]))
       {
           $this->fecha[0] = substr($this->fecha[0], 0, $tmp_pos);
       }
       $fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->cheques[0] = $Busca_temp['cheques']; 
       $tmp_pos = strpos($this->cheques[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->cheques[0]))
       {
           $this->cheques[0] = substr($this->cheques[0], 0, $tmp_pos);
       }
       $this->iva_0[0] = $Busca_temp['iva_0']; 
       $tmp_pos = strpos($this->iva_0[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->iva_0[0]))
       {
           $this->iva_0[0] = substr($this->iva_0[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'on';
 

$_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT convert(char(23),fecha,121), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY), cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT fecha, cantidad from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['order_grid'] = $nmgp_order_by;
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
     $this->Pdf->setCellMargins($left = '', $top = '', $right = '', $bottom = 0.5);
     $this->Pdf->SetAutoPageBreak(true, 0.5);
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
 function Pdf_image()
 {
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['cheques'] = "cheques";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['efectivo'] = "efectivo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['facturado'] = "facturado";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['rango'] = "rango";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['tarjeta'] = "tarjeta";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['prueba'] = "prueba";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['nfac'] = "nfac";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['totventa'] = "totventa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['credito'] = "credito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['retefuente'] = "retefuente";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['reteica'] = "reteica";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['reteiva'] = "reteiva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['cree'] = "cree";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['tot_rete'] = "tot_rete";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['ajuste'] = "ajuste";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['iva_19'] = "iva_19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['iva_5'] = "iva_5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['iva_0'] = "iva_0";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['tot_iva'] = "tot_iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['tot_base'] = "tot_base";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['base19'] = "base19";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['base5'] = "base5";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['base0'] = "base0";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['imp_consumo'] = "imp_consumo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['tot_impoconsumo'] = "tot_impoconsumo";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['imp_bolsa'] = "imp_bolsa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['descuentos'] = "descuentos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['c_efec'] = "c_efec";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['c_tarj'] = "c_tarj";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['c_cheq'] = "c_cheq";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['c_credito'] = "c_credito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['porc_ef'] = "porc_ef";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['porc_tarj'] = "porc_tarj";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['porc_cheq'] = "porc_cheq";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['porc_credito'] = "porc_credito";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['depto'] = "depto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['empresa'] = "empresa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['resolu'] = "resolu";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['dire_'] = "dire_";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['labels']['correo_'] = "correo_";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_caja_1']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_caja_1']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->fecha[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->cantidad[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->cantidad[$this->nm_grid_colunas] = (strpos(strtolower($this->cantidad[$this->nm_grid_colunas]), "e")) ? (float)$this->cantidad[$this->nm_grid_colunas] : $this->cantidad[$this->nm_grid_colunas]; 
          $this->cantidad[$this->nm_grid_colunas] = (string)$this->cantidad[$this->nm_grid_colunas];
          $this->cheques[$this->nm_grid_colunas] = "";
          $this->efectivo[$this->nm_grid_colunas] = "";
          $this->facturado[$this->nm_grid_colunas] = "";
          $this->rango[$this->nm_grid_colunas] = "";
          $this->tarjeta[$this->nm_grid_colunas] = "";
          $this->prueba[$this->nm_grid_colunas] = "";
          $this->nfac[$this->nm_grid_colunas] = "";
          $this->totventa[$this->nm_grid_colunas] = "";
          $this->credito[$this->nm_grid_colunas] = "";
          $this->retefuente[$this->nm_grid_colunas] = "";
          $this->reteica[$this->nm_grid_colunas] = "";
          $this->reteiva[$this->nm_grid_colunas] = "";
          $this->cree[$this->nm_grid_colunas] = "";
          $this->tot_rete[$this->nm_grid_colunas] = "";
          $this->ajuste[$this->nm_grid_colunas] = "";
          $this->iva_19[$this->nm_grid_colunas] = "";
          $this->iva_5[$this->nm_grid_colunas] = "";
          $this->iva_0[$this->nm_grid_colunas] = "";
          $this->tot_iva[$this->nm_grid_colunas] = "";
          $this->tot_base[$this->nm_grid_colunas] = "";
          $this->base19[$this->nm_grid_colunas] = "";
          $this->base5[$this->nm_grid_colunas] = "";
          $this->base0[$this->nm_grid_colunas] = "";
          $this->imp_consumo[$this->nm_grid_colunas] = "";
          $this->tot_impoconsumo[$this->nm_grid_colunas] = "";
          $this->imp_bolsa[$this->nm_grid_colunas] = "";
          $this->descuentos[$this->nm_grid_colunas] = "";
          $this->c_efec[$this->nm_grid_colunas] = "";
          $this->c_tarj[$this->nm_grid_colunas] = "";
          $this->c_cheq[$this->nm_grid_colunas] = "";
          $this->c_credito[$this->nm_grid_colunas] = "";
          $this->porc_ef[$this->nm_grid_colunas] = "";
          $this->porc_tarj[$this->nm_grid_colunas] = "";
          $this->porc_cheq[$this->nm_grid_colunas] = "";
          $this->porc_credito[$this->nm_grid_colunas] = "";
          $this->depto[$this->nm_grid_colunas] = "";
          $this->empresa[$this->nm_grid_colunas] = "";
          $this->resolu[$this->nm_grid_colunas] = "";
          $this->dire_[$this->nm_grid_colunas] = "";
          $this->correo_[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'on';
if (!isset($_SESSION['elprefijo'])) {$_SESSION['elprefijo'] = "";}
if (!isset($this->sc_temp_elprefijo)) {$this->sc_temp_elprefijo = (isset($_SESSION['elprefijo'])) ? $_SESSION['elprefijo'] : "";}
if (!isset($_SESSION['lafecha'])) {$_SESSION['lafecha'] = "";}
if (!isset($this->sc_temp_lafecha)) {$this->sc_temp_lafecha = (isset($_SESSION['lafecha'])) ? $_SESSION['lafecha'] : "";}
if (!isset($_SESSION['elbanco'])) {$_SESSION['elbanco'] = "";}
if (!isset($this->sc_temp_elbanco)) {$this->sc_temp_elbanco = (isset($_SESSION['elbanco'])) ? $_SESSION['elbanco'] : "";}
 $this->cheques[$this->nm_grid_colunas] =0.00;
$this->efectivo[$this->nm_grid_colunas] =0.00;
$this->tarjeta[$this->nm_grid_colunas] =0.00;
$this->credito[$this->nm_grid_colunas] =0.00;
$this->retefuente[$this->nm_grid_colunas] =0.00;
$this->reteica[$this->nm_grid_colunas] =0.00;
$this->reteiva[$this->nm_grid_colunas] =0.00;
$this->cree[$this->nm_grid_colunas] =0.00;
$this->tot_rete[$this->nm_grid_colunas] =0.00;
$this->ajuste[$this->nm_grid_colunas] =0.00;
$this->iva_19[$this->nm_grid_colunas] =0.00;
$this->iva_5[$this->nm_grid_colunas] =0.00;
$this->iva_0[$this->nm_grid_colunas] =0.00;
$this->tot_iva[$this->nm_grid_colunas] =0.00;
$this->base19[$this->nm_grid_colunas] =0.00;
$this->base5[$this->nm_grid_colunas] =0.00;
$this->base0[$this->nm_grid_colunas] =0.00;
$this->tot_base[$this->nm_grid_colunas] =0.00;
$this->imp_consumo[$this->nm_grid_colunas] ='';
$this->imp_bolsa[$this->nm_grid_colunas] =0.00;
$this->nfac[$this->nm_grid_colunas] =0;
$this->c_efec[$this->nm_grid_colunas]  = 0;
$this->c_tarj[$this->nm_grid_colunas]  = 0;
$this->c_cheq[$this->nm_grid_colunas]  = 0;
$this->c_credito[$this->nm_grid_colunas]  = 0;
$this->porc_ef[$this->nm_grid_colunas]  = 0.00;
$this->porc_tarj[$this->nm_grid_colunas]  = 0.00;
$this->porc_cheq[$this->nm_grid_colunas]  = 0.00;
$this->porc_credito[$this->nm_grid_colunas]  = 0.00;
$this->depto[$this->nm_grid_colunas]  = 'DEPARTAMENTO: Sin departamento';


$i=0;
$j=0;
$x=0;
$vNdoc='';
$vNres='';
$vIdfv='';
$vLis='';
$vIdrc='';

 
      $nm_select = "SELECT razonsoc, nit, dv, direccion, telefono, correo, ciudad, nom_depto from datosemp Order By iddatos ASC Limit 1 "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dEmp[$this->nm_grid_colunas] = array();
      $this->demp[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dEmp[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->demp[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dEmp[$this->nm_grid_colunas] = false;
          $this->dEmp_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
          $this->demp[$this->nm_grid_colunas] = false;
          $this->demp_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
if(isset($this->demp[$this->nm_grid_colunas][0][0]))
	{
	$this->empresa[$this->nm_grid_colunas] =$this->demp[$this->nm_grid_colunas][0][0].' '.'Nit: '.$this->demp[$this->nm_grid_colunas][0][1].'-'.$this->demp[$this->nm_grid_colunas][0][2];
	$this->dire_[$this->nm_grid_colunas] =$this->demp[$this->nm_grid_colunas][0][3].' - '.'Tel: '.$this->demp[$this->nm_grid_colunas][0][4].' - '.$this->demp[$this->nm_grid_colunas][0][6].', '.$this->demp[$this->nm_grid_colunas][0][7];
	$this->correo_[$this->nm_grid_colunas] =$this->demp[$this->nm_grid_colunas][0][5];
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv[$this->nm_grid_colunas] = array();
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
                        $this->ds_fv[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv[$this->nm_grid_colunas] = false;
          $this->ds_fv_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	$this->facturado[$this->nm_grid_colunas] =$this->ds_fv[$this->nm_grid_colunas][0][0];
	}

else
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv[$this->nm_grid_colunas] = array();
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
                        $this->ds_fv[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv[$this->nm_grid_colunas] = false;
          $this->ds_fv_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	$this->facturado[$this->nm_grid_colunas] =$this->ds_fv[$this->nm_grid_colunas][0][0];
	
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "select resolucion, prefijo, fecha, str_replace (convert(char(10),fec_vencimiento,102), '.', '-') + ' ' + convert(char(8),fec_vencimiento,20), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "select resolucion, prefijo, fecha, convert(char(23),fec_vencimiento,121), primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      else
      { 
          $nm_select = "select resolucion, prefijo, fecha, fec_vencimiento, primerfactura, ultima_fac, tipo from resdian where Idres=$this->sc_temp_elprefijo"; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dReso[$this->nm_grid_colunas] = array();
      $this->dreso[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dReso[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dreso[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dReso[$this->nm_grid_colunas] = false;
          $this->dReso_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
          $this->dreso[$this->nm_grid_colunas] = false;
          $this->dreso_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dreso[$this->nm_grid_colunas][0][0]))
		{
		$this->resolu[$this->nm_grid_colunas]  = 'Resolución DIAN: '.$this->dreso[$this->nm_grid_colunas][0][0].' de '.$this->dreso[$this->nm_grid_colunas][0][6].' del '.$this->dreso[$this->nm_grid_colunas][0][1].$this->dreso[$this->nm_grid_colunas][0][4].' a la '.$this->dreso[$this->nm_grid_colunas][0][1].$this->dreso[$this->nm_grid_colunas][0][5].' de fecha: '.$this->dreso[$this->nm_grid_colunas][0][2];
		}
	}




if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and tipo = 'FV' ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont[$this->nm_grid_colunas] = array();
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
                        $this->ds_cont[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont[$this->nm_grid_colunas] = false;
          $this->ds_cont_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont[$this->nm_grid_colunas] = array();
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
                        $this->ds_cont[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont[$this->nm_grid_colunas] = false;
          $this->ds_cont_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	
	}
$this->nfac[$this->nm_grid_colunas] =$this->ds_cont[$this->nm_grid_colunas][0][0];

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2[$this->nm_grid_colunas] = false;
          $this->ds_cont2_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_cont2[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2[$this->nm_grid_colunas] = false;
          $this->ds_cont2_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}

if(isset($this->ds_cont2[$this->nm_grid_colunas][0][1]))
	{
	$this->credito[$this->nm_grid_colunas] =$this->ds_cont2[$this->nm_grid_colunas][0][1];
	$this->c_credito[$this->nm_grid_colunas]  = $this->ds_cont2[$this->nm_grid_colunas][0][0];
	}

if($this->sc_temp_elprefijo<>'' or $this->sc_temp_elprefijo<>NULL or $this->sc_temp_elprefijo>0)
	{
	 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2[$this->nm_grid_colunas] = false;
          $this->ds_ca2_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	
	if (isset($this->ds_ca2[$this->nm_grid_colunas][0][0]))
	{
	$vIdres=$this->ds_ca2[$this->nm_grid_colunas][0][1];
	 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res[$this->nm_grid_colunas] = false;
          $this->dt_res_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	$this->rango[$this->nm_grid_colunas] .="Facurado desde ".$this->dt_res[$this->nm_grid_colunas][0][0]. " ".$this->ds_ca2[$this->nm_grid_colunas][0][0];
	}

	 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3[$this->nm_grid_colunas] = false;
          $this->ds_ca3_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

	if (isset($this->ds_ca3[$this->nm_grid_colunas][0][0]))
		{
		$this->rango[$this->nm_grid_colunas] .=" hasta ".$this->dt_res[$this->nm_grid_colunas][0][0]." ".$this->ds_ca3[$this->nm_grid_colunas][0][0];
		}
	}
else
	{
	 
      $nm_select = "SELECT COUNT(DISTINCT resolucion) AS cantidad FROM facturaven WHERE banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da_fv[$this->nm_grid_colunas] = array();
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
                        $this->da_fv[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da_fv[$this->nm_grid_colunas] = false;
          $this->da_fv_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->da_fv[$this->nm_grid_colunas][0][0]))
		{
		if($this->da_fv[$this->nm_grid_colunas][0][0]>1)
			{
			$this->rango[$this->nm_grid_colunas] ="RANGO: Varios";
			}
		else
			{
			 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2[$this->nm_grid_colunas] = false;
          $this->ds_ca2_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	
			if (isset($this->ds_ca2[$this->nm_grid_colunas][0][0]))
			{
			$vIdres=$this->ds_ca2[$this->nm_grid_colunas][0][1];
			 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res[$this->nm_grid_colunas] = false;
          $this->dt_res_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
			$this->rango[$this->nm_grid_colunas] .="Facurado desde ".$this->dt_res[$this->nm_grid_colunas][0][0]. " ".$this->ds_ca2[$this->nm_grid_colunas][0][0];
			}

			 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3[$this->nm_grid_colunas] = false;
          $this->ds_ca3_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;

			if (isset($this->ds_ca3[$this->nm_grid_colunas][0][0]))
				{
				$this->rango[$this->nm_grid_colunas] .=" hasta ".$this->dt_res[$this->nm_grid_colunas][0][0]." ".$this->ds_ca3[$this->nm_grid_colunas][0][0];
				}
			}
		}
	
	}

if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf[$this->nm_grid_colunas] = array();
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
                        $this->ds_idf[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf[$this->nm_grid_colunas] = false;
          $this->ds_idf_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}

else
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf[$this->nm_grid_colunas] = array();
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
                        $this->ds_idf[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf[$this->nm_grid_colunas] = false;
          $this->ds_idf_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}

if(isset($this->ds_idf[$this->nm_grid_colunas][0][0]))
	{ 
	foreach($this->ds_idf[$this->nm_grid_colunas]  as $ads_idf)
		{
		$i=$i+1;
		$vNdoc=$ads_idf[0];
		$vNres=$ads_idf[1];
		$vIdrc=$ads_idf[3];
		 
      $nm_select = "select idfacven from facturaven where numfacven='$vNdoc' and resolucion=$vNres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv[$this->nm_grid_colunas] = array();
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
                        $this->ds_fv[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv[$this->nm_grid_colunas] = false;
          $this->ds_fv_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_fv[$this->nm_grid_colunas][0][0]))
			{
			$vIdfv=$this->ds_fv[$this->nm_grid_colunas][0][0];
			 
      $nm_select = "select idfp, monto from detallepagos where idfact=$vIdfv"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dp[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dp[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dp[$this->nm_grid_colunas] = false;
          $this->ds_dp_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_dp[$this->nm_grid_colunas][0][0]))
				{
				foreach($this->ds_dp[$this->nm_grid_colunas]  as $ads_dp)
					{
					$j=$j+1;
					$vLis.=$ads_dp[0];
					switch ($vLis)
						{
						case 1:
						$this->efectivo[$this->nm_grid_colunas] =$this->efectivo[$this->nm_grid_colunas] +$ads_dp[1];
						$this->c_efec[$this->nm_grid_colunas]  = $this->c_efec[$this->nm_grid_colunas] +1;
						break;

						case 2:
						$this->tarjeta[$this->nm_grid_colunas] =$this->tarjeta[$this->nm_grid_colunas] +$ads_dp[1];
						$this->c_tarj[$this->nm_grid_colunas]  = $this->c_tarj[$this->nm_grid_colunas] +1;
						break;

						case 3:
						$this->cheques[$this->nm_grid_colunas] =$this->cheques[$this->nm_grid_colunas] +$ads_dp[1];
						$this->c_cheq[$this->nm_grid_colunas]  = $this->c_cheq[$this->nm_grid_colunas] +1;
						break;

						$vLisi='';
						}
					}
				}
			else
				{
				if($vIdrc>0)
					{
					 
      $nm_select = "select idfp, monto from detallepagos where idrc=$vIdrc"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dpi[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_dpi[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dpi[$this->nm_grid_colunas] = false;
          $this->ds_dpi_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
					if(isset($this->ds_dpi[$this->nm_grid_colunas][0][0]))
						{
						$vLisi='';
						foreach($this->ds_dpi[$this->nm_grid_colunas]  as $ads_dpi)
							{
							$x=$x+1;
							$vLisi.=$ads_dpi[0];
							switch ($vLisi)
								{
								case 1:
								$this->efectivo[$this->nm_grid_colunas] =$this->efectivo[$this->nm_grid_colunas] +$ads_dpi[1];
								$this->c_efec[$this->nm_grid_colunas]  = $this->c_efec[$this->nm_grid_colunas] +1;
								break;

								case 2:
								$this->tarjeta[$this->nm_grid_colunas] =$this->tarjeta[$this->nm_grid_colunas] +$ads_dpi[1];
								$this->c_tarj[$this->nm_grid_colunas]  = $this->c_tarj[$this->nm_grid_colunas] +1;
								break;

								case 3:
								$this->cheques[$this->nm_grid_colunas] =$this->cheques[$this->nm_grid_colunas] +$ads_dpi[1];
								$this->c_cheq[$this->nm_grid_colunas]  = $this->c_cheq[$this->nm_grid_colunas] +1;
								break;

								
								}
							$vLisi='';
							}
						$x=0;
						}
					else
						{
						$this->efectivo[$this->nm_grid_colunas] =$this->efectivo[$this->nm_grid_colunas] +$this->ds_idf[$this->nm_grid_colunas][0][2];
						$this->c_efec[$this->nm_grid_colunas]  = $this->nfac[$this->nm_grid_colunas]  - $this->c_credito[$this->nm_grid_colunas] ;
						}
					}
				else
					{
					$this->efectivo[$this->nm_grid_colunas] =$this->efectivo[$this->nm_grid_colunas] +$ads_idf[2];
					$this->c_efec[$this->nm_grid_colunas]  = $this->nfac[$this->nm_grid_colunas]  - $this->c_credito[$this->nm_grid_colunas] ;
					}
				
				}
			$vIdfv='';
			$j=0;
			$vLis='';
			$vLisi='';
			$x=0;
			}
		$vNdoc='';
		$vNres='';
		$vIdrc='';
		}
	}
$this->totventa[$this->nm_grid_colunas] =$this->credito[$this->nm_grid_colunas] +$this->efectivo[$this->nm_grid_colunas] +$this->cheques[$this->nm_grid_colunas] +$this->tarjeta[$this->nm_grid_colunas] ;
$this->porc_ef[$this->nm_grid_colunas]  = round(($this->c_efec[$this->nm_grid_colunas] /$this->nfac[$this->nm_grid_colunas] ),2)*100;
$this->porc_tarj[$this->nm_grid_colunas]  = round(($this->c_tarj[$this->nm_grid_colunas] /$this->nfac[$this->nm_grid_colunas] ),2)*100;
$this->porc_cheq[$this->nm_grid_colunas]  = round(($this->c_cheq[$this->nm_grid_colunas] /$this->nfac[$this->nm_grid_colunas] ),2)*100;
$this->porc_credito[$this->nm_grid_colunas]  = round(($this->c_credito[$this->nm_grid_colunas] /$this->nfac[$this->nm_grid_colunas] ),2)*100;


if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav[$this->nm_grid_colunas] = false;
          $this->ds_fav_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav[$this->nm_grid_colunas] = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 $SCrx->fields[0] = str_replace(',', '.', $SCrx->fields[0]);
                 $SCrx->fields[1] = str_replace(',', '.', $SCrx->fields[1]);
                 $SCrx->fields[2] = str_replace(',', '.', $SCrx->fields[2]);
                 $SCrx->fields[3] = str_replace(',', '.', $SCrx->fields[3]);
                 $SCrx->fields[4] = str_replace(',', '.', $SCrx->fields[4]);
                 $SCrx->fields[5] = str_replace(',', '.', $SCrx->fields[5]);
                 $SCrx->fields[6] = str_replace(',', '.', $SCrx->fields[6]);
                 $SCrx->fields[7] = str_replace(',', '.', $SCrx->fields[7]);
                 $SCrx->fields[0] = (strpos(strtolower($SCrx->fields[0]), "e")) ? (float)$SCrx->fields[0] : $SCrx->fields[0];
                 $SCrx->fields[0] = (string)$SCrx->fields[0];
                 $SCrx->fields[1] = (strpos(strtolower($SCrx->fields[1]), "e")) ? (float)$SCrx->fields[1] : $SCrx->fields[1];
                 $SCrx->fields[1] = (string)$SCrx->fields[1];
                 $SCrx->fields[2] = (strpos(strtolower($SCrx->fields[2]), "e")) ? (float)$SCrx->fields[2] : $SCrx->fields[2];
                 $SCrx->fields[2] = (string)$SCrx->fields[2];
                 $SCrx->fields[3] = (strpos(strtolower($SCrx->fields[3]), "e")) ? (float)$SCrx->fields[3] : $SCrx->fields[3];
                 $SCrx->fields[3] = (string)$SCrx->fields[3];
                 $SCrx->fields[4] = (strpos(strtolower($SCrx->fields[4]), "e")) ? (float)$SCrx->fields[4] : $SCrx->fields[4];
                 $SCrx->fields[4] = (string)$SCrx->fields[4];
                 $SCrx->fields[5] = (strpos(strtolower($SCrx->fields[5]), "e")) ? (float)$SCrx->fields[5] : $SCrx->fields[5];
                 $SCrx->fields[5] = (string)$SCrx->fields[5];
                 $SCrx->fields[6] = (strpos(strtolower($SCrx->fields[6]), "e")) ? (float)$SCrx->fields[6] : $SCrx->fields[6];
                 $SCrx->fields[6] = (string)$SCrx->fields[6];
                 $SCrx->fields[7] = (strpos(strtolower($SCrx->fields[7]), "e")) ? (float)$SCrx->fields[7] : $SCrx->fields[7];
                 $SCrx->fields[7] = (string)$SCrx->fields[7];
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_fav[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav[$this->nm_grid_colunas] = false;
          $this->ds_fav_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
	}

$k=0;
$ads_facv='';
$vBase=0;
$vTasaRet=0;
$vTasaIca=0;
$vTasaRiva=0;
if(isset($this->ds_fav[$this->nm_grid_colunas][0][0]))
	{
	foreach($this->ds_fav[$this->nm_grid_colunas]  as $ads_facv)
		{
		$k=$k+1;
		$vBase=$ads_facv[0]-$ads_facv[1];
		if($ads_facv[3]>0)
			{
			$vTasaRet=round(($ads_facv[3]/100), 3);
			$this->retefuente[$this->nm_grid_colunas] =round(($vBase*$vTasaRet), 2)+$this->retefuente[$this->nm_grid_colunas] ;
			}
		if($ads_facv[5]>0)
			{
			$vTasaIca=$ads_facv[5];
			$this->reteica[$this->nm_grid_colunas] =round((($vBase*$vTasaIca)/1000), 2)+$this->reteica[$this->nm_grid_colunas] ;
			}
		if($ads_facv[4]>0)
			{
			$vTasaRiva=round(($ads_facv[4]/100), 3);
			$this->reteiva[$this->nm_grid_colunas] =round(($ads_facv[1]*$vTasaIva), 0)+$this->reteiva[$this->nm_grid_colunas] ;
			}
		if($ads_facv[6]>0)
			{
			$vTcree=round(($ads_facv[6]/100), 3);
			$this->cree[$this->nm_grid_colunas] =round(($vBase*$vTcree), 0)+$this->cree[$this->nm_grid_colunas] ;
			}
		
		if($ads_facv[1]>0)
			{
			 
      $nm_select = "select iva, adicional, valorpar from detalleventa where numfac=$ads_facv[7]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_df[$this->nm_grid_colunas] = array();
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
                        $this->dt_df[$this->nm_grid_colunas][$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_df[$this->nm_grid_colunas] = false;
          $this->dt_df_erro[$this->nm_grid_colunas] = $this->Db->ErrorMsg();
      } 
;
			$y=0;$this->prueba[$this->nm_grid_colunas] =$ads_facv[7];
			if(isset($this->dt_df[$this->nm_grid_colunas][0][0]))
				{
				$vTiva='';
				foreach($this->dt_df[$this->nm_grid_colunas]  as $ads_df)
					{
					$y=$y+1;
					$vTiva=$ads_df[1];
					$this->tot_iva[$this->nm_grid_colunas] =$ads_df[0]+$this->tot_iva[$this->nm_grid_colunas] ;
					$this->tot_base[$this->nm_grid_colunas] =($ads_df[2]-$ads_df[0])+$this->tot_base[$this->nm_grid_colunas] ;
					switch($vTiva)
						{
						case 19:
						$this->iva_19[$this->nm_grid_colunas] =$ads_df[0]+$this->iva_19[$this->nm_grid_colunas] ;
						$this->base19[$this->nm_grid_colunas] =($ads_df[2]-$ads_df[0])+$this->base19[$this->nm_grid_colunas] ;
						break;
						
						case 5:
						$this->iva_5[$this->nm_grid_colunas] =$ads_df[0]+$this->iva_5[$this->nm_grid_colunas] ;
						$this->base5[$this->nm_grid_colunas] =($ads_df[2]-$ads_df[0])+$this->base5[$this->nm_grid_colunas] ;
						break;
						
						case 0:
						$this->iva_0[$this->nm_grid_colunas] =$ads_df[0]+$this->iva_0[$this->nm_grid_colunas] ;
						$this->base0[$this->nm_grid_colunas] =$ads_df[2]+$this->base0[$this->nm_grid_colunas] ;
						break;
						
						case 8:
						$this->imp_consumo[$this->nm_grid_colunas] =$ads_df[0]+$this->imp_consumo[$this->nm_grid_colunas] ;
						break;
						}
					$vTiva='';
					}
				$y=0;
				}
			}
		
		$vBase=0;
		$vTasaRet=0;
		$vTasaIca=0;
		$vTasaRiva=0;
		}
	}

$this->ajuste[$this->nm_grid_colunas] =round(($this->retefuente[$this->nm_grid_colunas] +$this->reteica[$this->nm_grid_colunas] +$this->reteiva[$this->nm_grid_colunas] ),0)-($this->retefuente[$this->nm_grid_colunas] +$this->reteica[$this->nm_grid_colunas] +$this->reteiva[$this->nm_grid_colunas] );
$this->tot_rete[$this->nm_grid_colunas] =$this->retefuente[$this->nm_grid_colunas] +$this->reteica[$this->nm_grid_colunas] +$this->reteiva[$this->nm_grid_colunas] +$this->ajuste[$this->nm_grid_colunas] ;
if($this->imp_consumo[$this->nm_grid_colunas] >0)
	{
	$this->imp_consumo[$this->nm_grid_colunas] =$this->imp_consumo[$this->nm_grid_colunas] ;
	}
else
	{
	$this->imp_consumo[$this->nm_grid_colunas] ='';
	}
if (isset($this->sc_temp_elbanco)) {$_SESSION['elbanco'] = $this->sc_temp_elbanco;}
if (isset($this->sc_temp_lafecha)) {$_SESSION['lafecha'] = $this->sc_temp_lafecha;}
if (isset($this->sc_temp_elprefijo)) {$_SESSION['elprefijo'] = $this->sc_temp_elprefijo;}
$_SESSION['scriptcase']['pdfreport_caja_1']['contr_erro'] = 'off';
          $this->fecha[$this->nm_grid_colunas] = sc_strip_script($this->fecha[$this->nm_grid_colunas]);
          if ($this->fecha[$this->nm_grid_colunas] === "") 
          { 
              $this->fecha[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $fecha_x =  $this->fecha[$this->nm_grid_colunas];
               nm_conv_limpa_dado($fecha_x, "YYYY-MM-DD");
               if (is_numeric($fecha_x) && strlen($fecha_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->fecha[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->fecha[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->fecha[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->fecha[$this->nm_grid_colunas]);
          $this->cantidad[$this->nm_grid_colunas] = sc_strip_script($this->cantidad[$this->nm_grid_colunas]);
          if ($this->cantidad[$this->nm_grid_colunas] === "") 
          { 
              $this->cantidad[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cantidad[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->cantidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cantidad[$this->nm_grid_colunas]);
          if ($this->cheques[$this->nm_grid_colunas] === "") 
          { 
              $this->cheques[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cheques[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->cheques[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cheques[$this->nm_grid_colunas]);
          if ($this->efectivo[$this->nm_grid_colunas] === "") 
          { 
              $this->efectivo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->efectivo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->efectivo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->efectivo[$this->nm_grid_colunas]);
          if ($this->facturado[$this->nm_grid_colunas] === "") 
          { 
              $this->facturado[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->facturado[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->facturado[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->facturado[$this->nm_grid_colunas]);
          if ($this->rango[$this->nm_grid_colunas] === "") 
          { 
              $this->rango[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rango[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rango[$this->nm_grid_colunas]);
          if ($this->tarjeta[$this->nm_grid_colunas] === "") 
          { 
              $this->tarjeta[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tarjeta[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tarjeta[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tarjeta[$this->nm_grid_colunas]);
          if ($this->prueba[$this->nm_grid_colunas] === "") 
          { 
              $this->prueba[$this->nm_grid_colunas] = "" ;  
          } 
          $this->prueba[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->prueba[$this->nm_grid_colunas]);
          if ($this->nfac[$this->nm_grid_colunas] === "") 
          { 
              $this->nfac[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nfac[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nfac[$this->nm_grid_colunas]);
          if ($this->totventa[$this->nm_grid_colunas] === "") 
          { 
              $this->totventa[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->totventa[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "N", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->totventa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->totventa[$this->nm_grid_colunas]);
          if ($this->credito[$this->nm_grid_colunas] === "") 
          { 
              $this->credito[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->credito[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->credito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->credito[$this->nm_grid_colunas]);
          if ($this->retefuente[$this->nm_grid_colunas] === "") 
          { 
              $this->retefuente[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->retefuente[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->retefuente[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->retefuente[$this->nm_grid_colunas]);
          if ($this->reteica[$this->nm_grid_colunas] === "") 
          { 
              $this->reteica[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->reteica[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "N", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->reteica[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->reteica[$this->nm_grid_colunas]);
          if ($this->reteiva[$this->nm_grid_colunas] === "") 
          { 
              $this->reteiva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->reteiva[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->reteiva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->reteiva[$this->nm_grid_colunas]);
          if ($this->cree[$this->nm_grid_colunas] === "") 
          { 
              $this->cree[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cree[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->cree[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cree[$this->nm_grid_colunas]);
          if ($this->tot_rete[$this->nm_grid_colunas] === "") 
          { 
              $this->tot_rete[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tot_rete[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tot_rete[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tot_rete[$this->nm_grid_colunas]);
          if ($this->ajuste[$this->nm_grid_colunas] === "") 
          { 
              $this->ajuste[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->ajuste[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->ajuste[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ajuste[$this->nm_grid_colunas]);
          if ($this->iva_19[$this->nm_grid_colunas] === "") 
          { 
              $this->iva_19[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->iva_19[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->iva_19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->iva_19[$this->nm_grid_colunas]);
          if ($this->iva_5[$this->nm_grid_colunas] === "") 
          { 
              $this->iva_5[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->iva_5[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->iva_5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->iva_5[$this->nm_grid_colunas]);
          if ($this->iva_0[$this->nm_grid_colunas] === "") 
          { 
              $this->iva_0[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->iva_0[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->iva_0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->iva_0[$this->nm_grid_colunas]);
          if ($this->tot_iva[$this->nm_grid_colunas] === "") 
          { 
              $this->tot_iva[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tot_iva[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tot_iva[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tot_iva[$this->nm_grid_colunas]);
          if ($this->tot_base[$this->nm_grid_colunas] === "") 
          { 
              $this->tot_base[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tot_base[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tot_base[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tot_base[$this->nm_grid_colunas]);
          if ($this->base19[$this->nm_grid_colunas] === "") 
          { 
              $this->base19[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->base19[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->base19[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->base19[$this->nm_grid_colunas]);
          if ($this->base5[$this->nm_grid_colunas] === "") 
          { 
              $this->base5[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->base5[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->base5[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->base5[$this->nm_grid_colunas]);
          if ($this->base0[$this->nm_grid_colunas] === "") 
          { 
              $this->base0[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->base0[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->base0[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->base0[$this->nm_grid_colunas]);
          if ($this->imp_consumo[$this->nm_grid_colunas] === "") 
          { 
              $this->imp_consumo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->imp_consumo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->imp_consumo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->imp_consumo[$this->nm_grid_colunas]);
          if ($this->tot_impoconsumo[$this->nm_grid_colunas] === "") 
          { 
              $this->tot_impoconsumo[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tot_impoconsumo[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->tot_impoconsumo[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tot_impoconsumo[$this->nm_grid_colunas]);
          if ($this->imp_bolsa[$this->nm_grid_colunas] === "") 
          { 
              $this->imp_bolsa[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->imp_bolsa[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->imp_bolsa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->imp_bolsa[$this->nm_grid_colunas]);
          if ($this->descuentos[$this->nm_grid_colunas] === "") 
          { 
              $this->descuentos[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->descuentos[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->descuentos[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->descuentos[$this->nm_grid_colunas]);
          if ($this->c_efec[$this->nm_grid_colunas] === "") 
          { 
              $this->c_efec[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->c_efec[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->c_efec[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_efec[$this->nm_grid_colunas]);
          if ($this->c_tarj[$this->nm_grid_colunas] === "") 
          { 
              $this->c_tarj[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->c_tarj[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->c_tarj[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_tarj[$this->nm_grid_colunas]);
          if ($this->c_cheq[$this->nm_grid_colunas] === "") 
          { 
              $this->c_cheq[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->c_cheq[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->c_cheq[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_cheq[$this->nm_grid_colunas]);
          if ($this->c_credito[$this->nm_grid_colunas] === "") 
          { 
              $this->c_credito[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->c_credito[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->c_credito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->c_credito[$this->nm_grid_colunas]);
          if ($this->porc_ef[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_ef[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_ef[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->porc_ef[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_ef[$this->nm_grid_colunas]);
          if ($this->porc_tarj[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_tarj[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_tarj[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->porc_tarj[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_tarj[$this->nm_grid_colunas]);
          if ($this->porc_cheq[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_cheq[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_cheq[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->porc_cheq[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_cheq[$this->nm_grid_colunas]);
          if ($this->porc_credito[$this->nm_grid_colunas] === "") 
          { 
              $this->porc_credito[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->porc_credito[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->porc_credito[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->porc_credito[$this->nm_grid_colunas]);
          if ($this->depto[$this->nm_grid_colunas] === "") 
          { 
              $this->depto[$this->nm_grid_colunas] = "" ;  
          } 
          $this->depto[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->depto[$this->nm_grid_colunas]);
          if ($this->empresa[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa[$this->nm_grid_colunas]);
          if ($this->resolu[$this->nm_grid_colunas] === "") 
          { 
              $this->resolu[$this->nm_grid_colunas] = "" ;  
          } 
          $this->resolu[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->resolu[$this->nm_grid_colunas]);
          if ($this->dire_[$this->nm_grid_colunas] === "") 
          { 
              $this->dire_[$this->nm_grid_colunas] = "" ;  
          } 
          $this->dire_[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->dire_[$this->nm_grid_colunas]);
          if ($this->correo_[$this->nm_grid_colunas] === "") 
          { 
              $this->correo_[$this->nm_grid_colunas] = "" ;  
          } 
          $this->correo_[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->correo_[$this->nm_grid_colunas]);
            $cell_22 = array('posx' => 80, 'posy' => 60, 'data' => $this->fecha[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_facturado = array('posx' => 80, 'posy' => 110, 'data' => $this->facturado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_rango = array('posx' => 10, 'posy' => 70, 'data' => $this->rango[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_efectivo = array('posx' => 80, 'posy' => 130, 'data' => $this->efectivo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tarjeta = array('posx' => 80, 'posy' => 140, 'data' => $this->tarjeta[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cheques = array('posx' => 80, 'posy' => 150, 'data' => $this->cheques[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_fac = array('posx' => 10, 'posy' => 110, 'data' => $this->SC_conv_utf8('TOTAL FACTURADO: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_for_pag = array('posx' => 10, 'posy' => 120, 'data' => $this->SC_conv_utf8('--DETALLE FORMAS DE PAGO--'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_efec = array('posx' => 25, 'posy' => 130, 'data' => $this->SC_conv_utf8('EN EFECTIVO:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tarj = array('posx' => 25, 'posy' => 140, 'data' => $this->SC_conv_utf8('CON TARJETA:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_che = array('posx' => 25, 'posy' => 150, 'data' => $this->SC_conv_utf8('CHEQUE:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_tot_fp = array('posx' => 10, 'posy' => 170, 'data' => $this->SC_conv_utf8('TOTAL FORMAS DE PAGO:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tot_fp = array('posx' => 80, 'posy' => 170, 'data' => $this->totventa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_fech = array('posx' => 10, 'posy' => 60, 'data' => $this->SC_conv_utf8('FECHA DEL COMPROBANTE:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_38 = array('posx' => 10, 'posy' => 50, 'data' => $this->SC_conv_utf8('COMPROBANTE INFORME DIARIO'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_39 = array('posx' => 10, 'posy' => 90, 'data' => $this->SC_conv_utf8('NÚMERO DE FACTURAS:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_40 = array('posx' => 65, 'posy' => 165, 'data' => $this->SC_conv_utf8('----------------------'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nfac = array('posx' => 80, 'posy' => 90, 'data' => $this->nfac[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_credito = array('posx' => 80, 'posy' => 160, 'data' => $this->credito[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_45 = array('posx' => 25, 'posy' => 160, 'data' => $this->SC_conv_utf8('A CREDITO:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_iva = array('posx' => 10, 'posy' => 190, 'data' => $this->SC_conv_utf8('--IVA--'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_iva_19 = array('posx' => 130, 'posy' => 195, 'data' => $this->iva_19[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_iva_5 = array('posx' => 130, 'posy' => 200, 'data' => $this->iva_5[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_iva_0 = array('posx' => 130, 'posy' => 205, 'data' => $this->iva_0[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tot_iva = array('posx' => 130, 'posy' => 215, 'data' => $this->tot_iva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_65 = array('posx' => 132, 'posy' => 190, 'data' => $this->SC_conv_utf8('--VAL IVA--'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_66 = array('posx' => 82, 'posy' => 190, 'data' => $this->SC_conv_utf8('--VAL BASE--'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_67 = array('posx' => 10, 'posy' => 195, 'data' => $this->SC_conv_utf8('IVA 19%:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_68 = array('posx' => 10, 'posy' => 200, 'data' => $this->SC_conv_utf8('IVA 5%:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_69 = array('posx' => 10, 'posy' => 205, 'data' => $this->SC_conv_utf8('EXC ó 0:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_70 = array('posx' => 10, 'posy' => 215, 'data' => $this->SC_conv_utf8('TOTALES:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_71 = array('posx' => 65, 'posy' => 210, 'data' => $this->SC_conv_utf8('-----------------------------------------'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_base19 = array('posx' => 80, 'posy' => 195, 'data' => $this->base19[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_base5 = array('posx' => 80, 'posy' => 200, 'data' => $this->base5[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_base0 = array('posx' => 80, 'posy' => 205, 'data' => $this->base0[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tot_base = array('posx' => 80, 'posy' => 215, 'data' => $this->tot_base[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_imp_consumo = array('posx' => 80, 'posy' => 230, 'data' => $this->imp_consumo[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_etq_impoconsumo = array('posx' => 10, 'posy' => 225, 'data' => $this->SC_conv_utf8('+++IMPTO CONSUMO+++'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_imp_bolsa = array('posx' => 80, 'posy' => 240, 'data' => $this->imp_bolsa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_imp_bolsa = array('posx' => 10, 'posy' => 235, 'data' => $this->SC_conv_utf8('**IMPUESTO BOLSAS (INC)**'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_81 = array('posx' => 10, 'posy' => 240, 'data' => $this->SC_conv_utf8('TOT INC VENTAS'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_82 = array('posx' => 10, 'posy' => 245, 'data' => $this->SC_conv_utf8('TOT INC DEVOLUCIONES:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_83 = array('posx' => 80, 'posy' => 245, 'data' => $this->imp_bolsa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_84 = array('posx' => 65, 'posy' => 250, 'data' => $this->SC_conv_utf8('----------------------'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_85 = array('posx' => 80, 'posy' => 255, 'data' => $this->imp_bolsa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_86 = array('posx' => 10, 'posy' => 255, 'data' => $this->SC_conv_utf8('TOTAL INC:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_c_efec = array('posx' => 10, 'posy' => 130, 'data' => $this->c_efec[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_c_tarj = array('posx' => 10, 'posy' => 140, 'data' => $this->c_tarj[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_c_cheq = array('posx' => 10, 'posy' => 150, 'data' => $this->c_cheq[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_c_credito = array('posx' => 10, 'posy' => 160, 'data' => $this->c_credito[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porc_ef = array('posx' => 65, 'posy' => 130, 'data' => $this->porc_ef[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porc_tarj = array('posx' => 65, 'posy' => 140, 'data' => $this->porc_tarj[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porc_cheq = array('posx' => 65, 'posy' => 150, 'data' => $this->porc_cheq[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porc_credito = array('posx' => 65, 'posy' => 160, 'data' => $this->porc_credito[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_tf = array('posx' => 10, 'posy' => 125, 'data' => $this->SC_conv_utf8('CANT'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_porciento = array('posx' => 67, 'posy' => 125, 'data' => $this->SC_conv_utf8(' %'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_depto = array('posx' => 10, 'posy' => 185, 'data' => $this->depto[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_113 = array('posx' => 10, 'posy' => 180, 'data' => $this->SC_conv_utf8('*** I V A ***'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_114 = array('posx' => 10, 'posy' => 230, 'data' => $this->depto[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa = array('posx' => 10, 'posy' => 10, 'data' => $this->empresa[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_resolu = array('posx' => 10, 'posy' => 40, 'data' => $this->resolu[$this->nm_grid_colunas], 'width'      => 200, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_dire_ = array('posx' => 10, 'posy' => 20, 'data' => $this->dire_[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_correo_ = array('posx' => 10, 'posy' => 30, 'data' => $this->correo_[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
          
            $cell_87 = array('posx' => 80, 'posy' => 20, 'data' => $this->facturado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_88 = array('posx' => 80, 'posy' => 30, 'data' => $this->facturado[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_89 = array('posx' => 10, 'posy' => 20, 'data' => $this->SC_conv_utf8('VENTAS NETAS'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_90 = array('posx' => 10, 'posy' => 30, 'data' => $this->SC_conv_utf8('TOTAL REGISTRADO'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_91 = array('posx' => 65, 'posy' => 25, 'data' => $this->SC_conv_utf8('====================='), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_92 = array('posx' => 65, 'posy' => 35, 'data' => $this->SC_conv_utf8('====================='), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_93 = array('posx' => 10, 'posy' => 45, 'data' => $this->SC_conv_utf8('FACTURAS ANULADAS:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_94 = array('posx' => 10, 'posy' => 65, 'data' => $this->SC_conv_utf8('OBSERVACIONES:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_95 = array('posx' => 10, 'posy' => 85, 'data' => $this->SC_conv_utf8('FECHA IMPRESIÓN: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_96 = array('posx' => 80, 'posy' => 85, 'data' => '', 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_98 = array('posx' => 10, 'posy' => 95, 'data' => $this->SC_conv_utf8('UBICACIÓN:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_99 = array('posx' => 40, 'posy' => 95, 'data' => $this->SC_conv_utf8('VENTAS MOSTR.'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_100 = array('posx' => 80, 'posy' => 95, 'data' => $this->SC_conv_utf8('EQUIPO:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_101 = array('posx' => 100, 'posy' => 95, 'data' => $this->SC_conv_utf8('PC_CAJA'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_97 = array('posx' => 10, 'posy' => 110, 'data' => $this->SC_conv_utf8('FACILWEB - www.solucionesnavarro.com'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_119 = array('posx' => 140, 'posy' => 95, 'data' => $this->SC_conv_utf8('SERIAL:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_120 = array('posx' => 160, 'posy' => 95, 'data' => $this->SC_conv_utf8('3949E3F97947'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_22['font_type'], $cell_22['font_style'], $cell_22['font_size']);
            $this->pdf_text_color($cell_22['data'], $cell_22['color_r'], $cell_22['color_g'], $cell_22['color_b']);
            if (!empty($cell_22['posx']) && !empty($cell_22['posy']))
            {
                $this->Pdf->SetXY($cell_22['posx'], $cell_22['posy']);
            }
            elseif (!empty($cell_22['posx']))
            {
                $this->Pdf->SetX($cell_22['posx']);
            }
            elseif (!empty($cell_22['posy']))
            {
                $this->Pdf->SetY($cell_22['posy']);
            }
            $this->Pdf->Cell($cell_22['width'], 0, $cell_22['data'], 0, 0, $cell_22['align']);

            $this->Pdf->SetFont($cell_facturado['font_type'], $cell_facturado['font_style'], $cell_facturado['font_size']);
            $this->pdf_text_color($cell_facturado['data'], $cell_facturado['color_r'], $cell_facturado['color_g'], $cell_facturado['color_b']);
            if (!empty($cell_facturado['posx']) && !empty($cell_facturado['posy']))
            {
                $this->Pdf->SetXY($cell_facturado['posx'], $cell_facturado['posy']);
            }
            elseif (!empty($cell_facturado['posx']))
            {
                $this->Pdf->SetX($cell_facturado['posx']);
            }
            elseif (!empty($cell_facturado['posy']))
            {
                $this->Pdf->SetY($cell_facturado['posy']);
            }
            $this->Pdf->Cell($cell_facturado['width'], 0, $cell_facturado['data'], 0, 0, $cell_facturado['align']);

            $this->Pdf->SetFont($cell_rango['font_type'], $cell_rango['font_style'], $cell_rango['font_size']);
            $this->pdf_text_color($cell_rango['data'], $cell_rango['color_r'], $cell_rango['color_g'], $cell_rango['color_b']);
            if (!empty($cell_rango['posx']) && !empty($cell_rango['posy']))
            {
                $this->Pdf->SetXY($cell_rango['posx'], $cell_rango['posy']);
            }
            elseif (!empty($cell_rango['posx']))
            {
                $this->Pdf->SetX($cell_rango['posx']);
            }
            elseif (!empty($cell_rango['posy']))
            {
                $this->Pdf->SetY($cell_rango['posy']);
            }
            $this->Pdf->Cell($cell_rango['width'], 0, $cell_rango['data'], 0, 0, $cell_rango['align']);

            $this->Pdf->SetFont($cell_efectivo['font_type'], $cell_efectivo['font_style'], $cell_efectivo['font_size']);
            $this->pdf_text_color($cell_efectivo['data'], $cell_efectivo['color_r'], $cell_efectivo['color_g'], $cell_efectivo['color_b']);
            if (!empty($cell_efectivo['posx']) && !empty($cell_efectivo['posy']))
            {
                $this->Pdf->SetXY($cell_efectivo['posx'], $cell_efectivo['posy']);
            }
            elseif (!empty($cell_efectivo['posx']))
            {
                $this->Pdf->SetX($cell_efectivo['posx']);
            }
            elseif (!empty($cell_efectivo['posy']))
            {
                $this->Pdf->SetY($cell_efectivo['posy']);
            }
            $this->Pdf->Cell($cell_efectivo['width'], 0, $cell_efectivo['data'], 0, 0, $cell_efectivo['align']);

            $this->Pdf->SetFont($cell_tarjeta['font_type'], $cell_tarjeta['font_style'], $cell_tarjeta['font_size']);
            $this->pdf_text_color($cell_tarjeta['data'], $cell_tarjeta['color_r'], $cell_tarjeta['color_g'], $cell_tarjeta['color_b']);
            if (!empty($cell_tarjeta['posx']) && !empty($cell_tarjeta['posy']))
            {
                $this->Pdf->SetXY($cell_tarjeta['posx'], $cell_tarjeta['posy']);
            }
            elseif (!empty($cell_tarjeta['posx']))
            {
                $this->Pdf->SetX($cell_tarjeta['posx']);
            }
            elseif (!empty($cell_tarjeta['posy']))
            {
                $this->Pdf->SetY($cell_tarjeta['posy']);
            }
            $this->Pdf->Cell($cell_tarjeta['width'], 0, $cell_tarjeta['data'], 0, 0, $cell_tarjeta['align']);

            $this->Pdf->SetFont($cell_cheques['font_type'], $cell_cheques['font_style'], $cell_cheques['font_size']);
            $this->pdf_text_color($cell_cheques['data'], $cell_cheques['color_r'], $cell_cheques['color_g'], $cell_cheques['color_b']);
            if (!empty($cell_cheques['posx']) && !empty($cell_cheques['posy']))
            {
                $this->Pdf->SetXY($cell_cheques['posx'], $cell_cheques['posy']);
            }
            elseif (!empty($cell_cheques['posx']))
            {
                $this->Pdf->SetX($cell_cheques['posx']);
            }
            elseif (!empty($cell_cheques['posy']))
            {
                $this->Pdf->SetY($cell_cheques['posy']);
            }
            $this->Pdf->Cell($cell_cheques['width'], 0, $cell_cheques['data'], 0, 0, $cell_cheques['align']);

            $this->Pdf->SetFont($cell_et_fac['font_type'], $cell_et_fac['font_style'], $cell_et_fac['font_size']);
            $this->pdf_text_color($cell_et_fac['data'], $cell_et_fac['color_r'], $cell_et_fac['color_g'], $cell_et_fac['color_b']);
            if (!empty($cell_et_fac['posx']) && !empty($cell_et_fac['posy']))
            {
                $this->Pdf->SetXY($cell_et_fac['posx'], $cell_et_fac['posy']);
            }
            elseif (!empty($cell_et_fac['posx']))
            {
                $this->Pdf->SetX($cell_et_fac['posx']);
            }
            elseif (!empty($cell_et_fac['posy']))
            {
                $this->Pdf->SetY($cell_et_fac['posy']);
            }
            $this->Pdf->Cell($cell_et_fac['width'], 0, $cell_et_fac['data'], 0, 0, $cell_et_fac['align']);

            $this->Pdf->SetFont($cell_for_pag['font_type'], $cell_for_pag['font_style'], $cell_for_pag['font_size']);
            $this->pdf_text_color($cell_for_pag['data'], $cell_for_pag['color_r'], $cell_for_pag['color_g'], $cell_for_pag['color_b']);
            if (!empty($cell_for_pag['posx']) && !empty($cell_for_pag['posy']))
            {
                $this->Pdf->SetXY($cell_for_pag['posx'], $cell_for_pag['posy']);
            }
            elseif (!empty($cell_for_pag['posx']))
            {
                $this->Pdf->SetX($cell_for_pag['posx']);
            }
            elseif (!empty($cell_for_pag['posy']))
            {
                $this->Pdf->SetY($cell_for_pag['posy']);
            }
            $this->Pdf->Cell($cell_for_pag['width'], 0, $cell_for_pag['data'], 0, 0, $cell_for_pag['align']);

            $this->Pdf->SetFont($cell_efec['font_type'], $cell_efec['font_style'], $cell_efec['font_size']);
            $this->pdf_text_color($cell_efec['data'], $cell_efec['color_r'], $cell_efec['color_g'], $cell_efec['color_b']);
            if (!empty($cell_efec['posx']) && !empty($cell_efec['posy']))
            {
                $this->Pdf->SetXY($cell_efec['posx'], $cell_efec['posy']);
            }
            elseif (!empty($cell_efec['posx']))
            {
                $this->Pdf->SetX($cell_efec['posx']);
            }
            elseif (!empty($cell_efec['posy']))
            {
                $this->Pdf->SetY($cell_efec['posy']);
            }
            $this->Pdf->Cell($cell_efec['width'], 0, $cell_efec['data'], 0, 0, $cell_efec['align']);

            $this->Pdf->SetFont($cell_tarj['font_type'], $cell_tarj['font_style'], $cell_tarj['font_size']);
            $this->pdf_text_color($cell_tarj['data'], $cell_tarj['color_r'], $cell_tarj['color_g'], $cell_tarj['color_b']);
            if (!empty($cell_tarj['posx']) && !empty($cell_tarj['posy']))
            {
                $this->Pdf->SetXY($cell_tarj['posx'], $cell_tarj['posy']);
            }
            elseif (!empty($cell_tarj['posx']))
            {
                $this->Pdf->SetX($cell_tarj['posx']);
            }
            elseif (!empty($cell_tarj['posy']))
            {
                $this->Pdf->SetY($cell_tarj['posy']);
            }
            $this->Pdf->Cell($cell_tarj['width'], 0, $cell_tarj['data'], 0, 0, $cell_tarj['align']);

            $this->Pdf->SetFont($cell_che['font_type'], $cell_che['font_style'], $cell_che['font_size']);
            $this->pdf_text_color($cell_che['data'], $cell_che['color_r'], $cell_che['color_g'], $cell_che['color_b']);
            if (!empty($cell_che['posx']) && !empty($cell_che['posy']))
            {
                $this->Pdf->SetXY($cell_che['posx'], $cell_che['posy']);
            }
            elseif (!empty($cell_che['posx']))
            {
                $this->Pdf->SetX($cell_che['posx']);
            }
            elseif (!empty($cell_che['posy']))
            {
                $this->Pdf->SetY($cell_che['posy']);
            }
            $this->Pdf->Cell($cell_che['width'], 0, $cell_che['data'], 0, 0, $cell_che['align']);

            $this->Pdf->SetFont($cell_et_tot_fp['font_type'], $cell_et_tot_fp['font_style'], $cell_et_tot_fp['font_size']);
            $this->pdf_text_color($cell_et_tot_fp['data'], $cell_et_tot_fp['color_r'], $cell_et_tot_fp['color_g'], $cell_et_tot_fp['color_b']);
            if (!empty($cell_et_tot_fp['posx']) && !empty($cell_et_tot_fp['posy']))
            {
                $this->Pdf->SetXY($cell_et_tot_fp['posx'], $cell_et_tot_fp['posy']);
            }
            elseif (!empty($cell_et_tot_fp['posx']))
            {
                $this->Pdf->SetX($cell_et_tot_fp['posx']);
            }
            elseif (!empty($cell_et_tot_fp['posy']))
            {
                $this->Pdf->SetY($cell_et_tot_fp['posy']);
            }
            $this->Pdf->Cell($cell_et_tot_fp['width'], 0, $cell_et_tot_fp['data'], 0, 0, $cell_et_tot_fp['align']);

            $this->Pdf->SetFont($cell_tot_fp['font_type'], $cell_tot_fp['font_style'], $cell_tot_fp['font_size']);
            $this->pdf_text_color($cell_tot_fp['data'], $cell_tot_fp['color_r'], $cell_tot_fp['color_g'], $cell_tot_fp['color_b']);
            if (!empty($cell_tot_fp['posx']) && !empty($cell_tot_fp['posy']))
            {
                $this->Pdf->SetXY($cell_tot_fp['posx'], $cell_tot_fp['posy']);
            }
            elseif (!empty($cell_tot_fp['posx']))
            {
                $this->Pdf->SetX($cell_tot_fp['posx']);
            }
            elseif (!empty($cell_tot_fp['posy']))
            {
                $this->Pdf->SetY($cell_tot_fp['posy']);
            }
            $this->Pdf->Cell($cell_tot_fp['width'], 0, $cell_tot_fp['data'], 0, 0, $cell_tot_fp['align']);

            $this->Pdf->SetFont($cell_et_fech['font_type'], $cell_et_fech['font_style'], $cell_et_fech['font_size']);
            $this->pdf_text_color($cell_et_fech['data'], $cell_et_fech['color_r'], $cell_et_fech['color_g'], $cell_et_fech['color_b']);
            if (!empty($cell_et_fech['posx']) && !empty($cell_et_fech['posy']))
            {
                $this->Pdf->SetXY($cell_et_fech['posx'], $cell_et_fech['posy']);
            }
            elseif (!empty($cell_et_fech['posx']))
            {
                $this->Pdf->SetX($cell_et_fech['posx']);
            }
            elseif (!empty($cell_et_fech['posy']))
            {
                $this->Pdf->SetY($cell_et_fech['posy']);
            }
            $this->Pdf->Cell($cell_et_fech['width'], 0, $cell_et_fech['data'], 0, 0, $cell_et_fech['align']);

            $this->Pdf->SetFont($cell_38['font_type'], $cell_38['font_style'], $cell_38['font_size']);
            $this->pdf_text_color($cell_38['data'], $cell_38['color_r'], $cell_38['color_g'], $cell_38['color_b']);
            if (!empty($cell_38['posx']) && !empty($cell_38['posy']))
            {
                $this->Pdf->SetXY($cell_38['posx'], $cell_38['posy']);
            }
            elseif (!empty($cell_38['posx']))
            {
                $this->Pdf->SetX($cell_38['posx']);
            }
            elseif (!empty($cell_38['posy']))
            {
                $this->Pdf->SetY($cell_38['posy']);
            }
            $this->Pdf->Cell($cell_38['width'], 0, $cell_38['data'], 0, 0, $cell_38['align']);

            $this->Pdf->SetFont($cell_39['font_type'], $cell_39['font_style'], $cell_39['font_size']);
            $this->pdf_text_color($cell_39['data'], $cell_39['color_r'], $cell_39['color_g'], $cell_39['color_b']);
            if (!empty($cell_39['posx']) && !empty($cell_39['posy']))
            {
                $this->Pdf->SetXY($cell_39['posx'], $cell_39['posy']);
            }
            elseif (!empty($cell_39['posx']))
            {
                $this->Pdf->SetX($cell_39['posx']);
            }
            elseif (!empty($cell_39['posy']))
            {
                $this->Pdf->SetY($cell_39['posy']);
            }
            $this->Pdf->Cell($cell_39['width'], 0, $cell_39['data'], 0, 0, $cell_39['align']);

            $this->Pdf->SetFont($cell_40['font_type'], $cell_40['font_style'], $cell_40['font_size']);
            $this->pdf_text_color($cell_40['data'], $cell_40['color_r'], $cell_40['color_g'], $cell_40['color_b']);
            if (!empty($cell_40['posx']) && !empty($cell_40['posy']))
            {
                $this->Pdf->SetXY($cell_40['posx'], $cell_40['posy']);
            }
            elseif (!empty($cell_40['posx']))
            {
                $this->Pdf->SetX($cell_40['posx']);
            }
            elseif (!empty($cell_40['posy']))
            {
                $this->Pdf->SetY($cell_40['posy']);
            }
            $this->Pdf->Cell($cell_40['width'], 0, $cell_40['data'], 0, 0, $cell_40['align']);

            $this->Pdf->SetFont($cell_nfac['font_type'], $cell_nfac['font_style'], $cell_nfac['font_size']);
            $this->pdf_text_color($cell_nfac['data'], $cell_nfac['color_r'], $cell_nfac['color_g'], $cell_nfac['color_b']);
            if (!empty($cell_nfac['posx']) && !empty($cell_nfac['posy']))
            {
                $this->Pdf->SetXY($cell_nfac['posx'], $cell_nfac['posy']);
            }
            elseif (!empty($cell_nfac['posx']))
            {
                $this->Pdf->SetX($cell_nfac['posx']);
            }
            elseif (!empty($cell_nfac['posy']))
            {
                $this->Pdf->SetY($cell_nfac['posy']);
            }
            $this->Pdf->Cell($cell_nfac['width'], 0, $cell_nfac['data'], 0, 0, $cell_nfac['align']);

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

            $this->Pdf->SetFont($cell_iva['font_type'], $cell_iva['font_style'], $cell_iva['font_size']);
            $this->pdf_text_color($cell_iva['data'], $cell_iva['color_r'], $cell_iva['color_g'], $cell_iva['color_b']);
            if (!empty($cell_iva['posx']) && !empty($cell_iva['posy']))
            {
                $this->Pdf->SetXY($cell_iva['posx'], $cell_iva['posy']);
            }
            elseif (!empty($cell_iva['posx']))
            {
                $this->Pdf->SetX($cell_iva['posx']);
            }
            elseif (!empty($cell_iva['posy']))
            {
                $this->Pdf->SetY($cell_iva['posy']);
            }
            $this->Pdf->Cell($cell_iva['width'], 0, $cell_iva['data'], 0, 0, $cell_iva['align']);

            $this->Pdf->SetFont($cell_iva_19['font_type'], $cell_iva_19['font_style'], $cell_iva_19['font_size']);
            $this->pdf_text_color($cell_iva_19['data'], $cell_iva_19['color_r'], $cell_iva_19['color_g'], $cell_iva_19['color_b']);
            if (!empty($cell_iva_19['posx']) && !empty($cell_iva_19['posy']))
            {
                $this->Pdf->SetXY($cell_iva_19['posx'], $cell_iva_19['posy']);
            }
            elseif (!empty($cell_iva_19['posx']))
            {
                $this->Pdf->SetX($cell_iva_19['posx']);
            }
            elseif (!empty($cell_iva_19['posy']))
            {
                $this->Pdf->SetY($cell_iva_19['posy']);
            }
            $this->Pdf->Cell($cell_iva_19['width'], 0, $cell_iva_19['data'], 0, 0, $cell_iva_19['align']);

            $this->Pdf->SetFont($cell_iva_5['font_type'], $cell_iva_5['font_style'], $cell_iva_5['font_size']);
            $this->pdf_text_color($cell_iva_5['data'], $cell_iva_5['color_r'], $cell_iva_5['color_g'], $cell_iva_5['color_b']);
            if (!empty($cell_iva_5['posx']) && !empty($cell_iva_5['posy']))
            {
                $this->Pdf->SetXY($cell_iva_5['posx'], $cell_iva_5['posy']);
            }
            elseif (!empty($cell_iva_5['posx']))
            {
                $this->Pdf->SetX($cell_iva_5['posx']);
            }
            elseif (!empty($cell_iva_5['posy']))
            {
                $this->Pdf->SetY($cell_iva_5['posy']);
            }
            $this->Pdf->Cell($cell_iva_5['width'], 0, $cell_iva_5['data'], 0, 0, $cell_iva_5['align']);

            $this->Pdf->SetFont($cell_iva_0['font_type'], $cell_iva_0['font_style'], $cell_iva_0['font_size']);
            $this->pdf_text_color($cell_iva_0['data'], $cell_iva_0['color_r'], $cell_iva_0['color_g'], $cell_iva_0['color_b']);
            if (!empty($cell_iva_0['posx']) && !empty($cell_iva_0['posy']))
            {
                $this->Pdf->SetXY($cell_iva_0['posx'], $cell_iva_0['posy']);
            }
            elseif (!empty($cell_iva_0['posx']))
            {
                $this->Pdf->SetX($cell_iva_0['posx']);
            }
            elseif (!empty($cell_iva_0['posy']))
            {
                $this->Pdf->SetY($cell_iva_0['posy']);
            }
            $this->Pdf->Cell($cell_iva_0['width'], 0, $cell_iva_0['data'], 0, 0, $cell_iva_0['align']);

            $this->Pdf->SetFont($cell_tot_iva['font_type'], $cell_tot_iva['font_style'], $cell_tot_iva['font_size']);
            $this->pdf_text_color($cell_tot_iva['data'], $cell_tot_iva['color_r'], $cell_tot_iva['color_g'], $cell_tot_iva['color_b']);
            if (!empty($cell_tot_iva['posx']) && !empty($cell_tot_iva['posy']))
            {
                $this->Pdf->SetXY($cell_tot_iva['posx'], $cell_tot_iva['posy']);
            }
            elseif (!empty($cell_tot_iva['posx']))
            {
                $this->Pdf->SetX($cell_tot_iva['posx']);
            }
            elseif (!empty($cell_tot_iva['posy']))
            {
                $this->Pdf->SetY($cell_tot_iva['posy']);
            }
            $this->Pdf->Cell($cell_tot_iva['width'], 0, $cell_tot_iva['data'], 0, 0, $cell_tot_iva['align']);

            $this->Pdf->SetFont($cell_65['font_type'], $cell_65['font_style'], $cell_65['font_size']);
            $this->pdf_text_color($cell_65['data'], $cell_65['color_r'], $cell_65['color_g'], $cell_65['color_b']);
            if (!empty($cell_65['posx']) && !empty($cell_65['posy']))
            {
                $this->Pdf->SetXY($cell_65['posx'], $cell_65['posy']);
            }
            elseif (!empty($cell_65['posx']))
            {
                $this->Pdf->SetX($cell_65['posx']);
            }
            elseif (!empty($cell_65['posy']))
            {
                $this->Pdf->SetY($cell_65['posy']);
            }
            $this->Pdf->Cell($cell_65['width'], 0, $cell_65['data'], 0, 0, $cell_65['align']);

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

            $this->Pdf->SetFont($cell_67['font_type'], $cell_67['font_style'], $cell_67['font_size']);
            $this->pdf_text_color($cell_67['data'], $cell_67['color_r'], $cell_67['color_g'], $cell_67['color_b']);
            if (!empty($cell_67['posx']) && !empty($cell_67['posy']))
            {
                $this->Pdf->SetXY($cell_67['posx'], $cell_67['posy']);
            }
            elseif (!empty($cell_67['posx']))
            {
                $this->Pdf->SetX($cell_67['posx']);
            }
            elseif (!empty($cell_67['posy']))
            {
                $this->Pdf->SetY($cell_67['posy']);
            }
            $this->Pdf->Cell($cell_67['width'], 0, $cell_67['data'], 0, 0, $cell_67['align']);

            $this->Pdf->SetFont($cell_68['font_type'], $cell_68['font_style'], $cell_68['font_size']);
            $this->pdf_text_color($cell_68['data'], $cell_68['color_r'], $cell_68['color_g'], $cell_68['color_b']);
            if (!empty($cell_68['posx']) && !empty($cell_68['posy']))
            {
                $this->Pdf->SetXY($cell_68['posx'], $cell_68['posy']);
            }
            elseif (!empty($cell_68['posx']))
            {
                $this->Pdf->SetX($cell_68['posx']);
            }
            elseif (!empty($cell_68['posy']))
            {
                $this->Pdf->SetY($cell_68['posy']);
            }
            $this->Pdf->Cell($cell_68['width'], 0, $cell_68['data'], 0, 0, $cell_68['align']);

            $this->Pdf->SetFont($cell_69['font_type'], $cell_69['font_style'], $cell_69['font_size']);
            $this->pdf_text_color($cell_69['data'], $cell_69['color_r'], $cell_69['color_g'], $cell_69['color_b']);
            if (!empty($cell_69['posx']) && !empty($cell_69['posy']))
            {
                $this->Pdf->SetXY($cell_69['posx'], $cell_69['posy']);
            }
            elseif (!empty($cell_69['posx']))
            {
                $this->Pdf->SetX($cell_69['posx']);
            }
            elseif (!empty($cell_69['posy']))
            {
                $this->Pdf->SetY($cell_69['posy']);
            }
            $this->Pdf->Cell($cell_69['width'], 0, $cell_69['data'], 0, 0, $cell_69['align']);

            $this->Pdf->SetFont($cell_70['font_type'], $cell_70['font_style'], $cell_70['font_size']);
            $this->pdf_text_color($cell_70['data'], $cell_70['color_r'], $cell_70['color_g'], $cell_70['color_b']);
            if (!empty($cell_70['posx']) && !empty($cell_70['posy']))
            {
                $this->Pdf->SetXY($cell_70['posx'], $cell_70['posy']);
            }
            elseif (!empty($cell_70['posx']))
            {
                $this->Pdf->SetX($cell_70['posx']);
            }
            elseif (!empty($cell_70['posy']))
            {
                $this->Pdf->SetY($cell_70['posy']);
            }
            $this->Pdf->Cell($cell_70['width'], 0, $cell_70['data'], 0, 0, $cell_70['align']);

            $this->Pdf->SetFont($cell_71['font_type'], $cell_71['font_style'], $cell_71['font_size']);
            $this->pdf_text_color($cell_71['data'], $cell_71['color_r'], $cell_71['color_g'], $cell_71['color_b']);
            if (!empty($cell_71['posx']) && !empty($cell_71['posy']))
            {
                $this->Pdf->SetXY($cell_71['posx'], $cell_71['posy']);
            }
            elseif (!empty($cell_71['posx']))
            {
                $this->Pdf->SetX($cell_71['posx']);
            }
            elseif (!empty($cell_71['posy']))
            {
                $this->Pdf->SetY($cell_71['posy']);
            }
            $this->Pdf->Cell($cell_71['width'], 0, $cell_71['data'], 0, 0, $cell_71['align']);

            $this->Pdf->SetFont($cell_base19['font_type'], $cell_base19['font_style'], $cell_base19['font_size']);
            $this->pdf_text_color($cell_base19['data'], $cell_base19['color_r'], $cell_base19['color_g'], $cell_base19['color_b']);
            if (!empty($cell_base19['posx']) && !empty($cell_base19['posy']))
            {
                $this->Pdf->SetXY($cell_base19['posx'], $cell_base19['posy']);
            }
            elseif (!empty($cell_base19['posx']))
            {
                $this->Pdf->SetX($cell_base19['posx']);
            }
            elseif (!empty($cell_base19['posy']))
            {
                $this->Pdf->SetY($cell_base19['posy']);
            }
            $this->Pdf->Cell($cell_base19['width'], 0, $cell_base19['data'], 0, 0, $cell_base19['align']);

            $this->Pdf->SetFont($cell_base5['font_type'], $cell_base5['font_style'], $cell_base5['font_size']);
            $this->pdf_text_color($cell_base5['data'], $cell_base5['color_r'], $cell_base5['color_g'], $cell_base5['color_b']);
            if (!empty($cell_base5['posx']) && !empty($cell_base5['posy']))
            {
                $this->Pdf->SetXY($cell_base5['posx'], $cell_base5['posy']);
            }
            elseif (!empty($cell_base5['posx']))
            {
                $this->Pdf->SetX($cell_base5['posx']);
            }
            elseif (!empty($cell_base5['posy']))
            {
                $this->Pdf->SetY($cell_base5['posy']);
            }
            $this->Pdf->Cell($cell_base5['width'], 0, $cell_base5['data'], 0, 0, $cell_base5['align']);

            $this->Pdf->SetFont($cell_base0['font_type'], $cell_base0['font_style'], $cell_base0['font_size']);
            $this->pdf_text_color($cell_base0['data'], $cell_base0['color_r'], $cell_base0['color_g'], $cell_base0['color_b']);
            if (!empty($cell_base0['posx']) && !empty($cell_base0['posy']))
            {
                $this->Pdf->SetXY($cell_base0['posx'], $cell_base0['posy']);
            }
            elseif (!empty($cell_base0['posx']))
            {
                $this->Pdf->SetX($cell_base0['posx']);
            }
            elseif (!empty($cell_base0['posy']))
            {
                $this->Pdf->SetY($cell_base0['posy']);
            }
            $this->Pdf->Cell($cell_base0['width'], 0, $cell_base0['data'], 0, 0, $cell_base0['align']);

            $this->Pdf->SetFont($cell_tot_base['font_type'], $cell_tot_base['font_style'], $cell_tot_base['font_size']);
            $this->pdf_text_color($cell_tot_base['data'], $cell_tot_base['color_r'], $cell_tot_base['color_g'], $cell_tot_base['color_b']);
            if (!empty($cell_tot_base['posx']) && !empty($cell_tot_base['posy']))
            {
                $this->Pdf->SetXY($cell_tot_base['posx'], $cell_tot_base['posy']);
            }
            elseif (!empty($cell_tot_base['posx']))
            {
                $this->Pdf->SetX($cell_tot_base['posx']);
            }
            elseif (!empty($cell_tot_base['posy']))
            {
                $this->Pdf->SetY($cell_tot_base['posy']);
            }
            $this->Pdf->Cell($cell_tot_base['width'], 0, $cell_tot_base['data'], 0, 0, $cell_tot_base['align']);

            $this->Pdf->SetFont($cell_imp_consumo['font_type'], $cell_imp_consumo['font_style'], $cell_imp_consumo['font_size']);
            $this->pdf_text_color($cell_imp_consumo['data'], $cell_imp_consumo['color_r'], $cell_imp_consumo['color_g'], $cell_imp_consumo['color_b']);
            if (!empty($cell_imp_consumo['posx']) && !empty($cell_imp_consumo['posy']))
            {
                $this->Pdf->SetXY($cell_imp_consumo['posx'], $cell_imp_consumo['posy']);
            }
            elseif (!empty($cell_imp_consumo['posx']))
            {
                $this->Pdf->SetX($cell_imp_consumo['posx']);
            }
            elseif (!empty($cell_imp_consumo['posy']))
            {
                $this->Pdf->SetY($cell_imp_consumo['posy']);
            }
            $this->Pdf->Cell($cell_imp_consumo['width'], 0, $cell_imp_consumo['data'], 0, 0, $cell_imp_consumo['align']);

            $this->Pdf->SetFont($cell_etq_impoconsumo['font_type'], $cell_etq_impoconsumo['font_style'], $cell_etq_impoconsumo['font_size']);
            $this->pdf_text_color($cell_etq_impoconsumo['data'], $cell_etq_impoconsumo['color_r'], $cell_etq_impoconsumo['color_g'], $cell_etq_impoconsumo['color_b']);
            if (!empty($cell_etq_impoconsumo['posx']) && !empty($cell_etq_impoconsumo['posy']))
            {
                $this->Pdf->SetXY($cell_etq_impoconsumo['posx'], $cell_etq_impoconsumo['posy']);
            }
            elseif (!empty($cell_etq_impoconsumo['posx']))
            {
                $this->Pdf->SetX($cell_etq_impoconsumo['posx']);
            }
            elseif (!empty($cell_etq_impoconsumo['posy']))
            {
                $this->Pdf->SetY($cell_etq_impoconsumo['posy']);
            }
            $this->Pdf->Cell($cell_etq_impoconsumo['width'], 0, $cell_etq_impoconsumo['data'], 0, 0, $cell_etq_impoconsumo['align']);

            $this->Pdf->SetFont($cell_imp_bolsa['font_type'], $cell_imp_bolsa['font_style'], $cell_imp_bolsa['font_size']);
            $this->pdf_text_color($cell_imp_bolsa['data'], $cell_imp_bolsa['color_r'], $cell_imp_bolsa['color_g'], $cell_imp_bolsa['color_b']);
            if (!empty($cell_imp_bolsa['posx']) && !empty($cell_imp_bolsa['posy']))
            {
                $this->Pdf->SetXY($cell_imp_bolsa['posx'], $cell_imp_bolsa['posy']);
            }
            elseif (!empty($cell_imp_bolsa['posx']))
            {
                $this->Pdf->SetX($cell_imp_bolsa['posx']);
            }
            elseif (!empty($cell_imp_bolsa['posy']))
            {
                $this->Pdf->SetY($cell_imp_bolsa['posy']);
            }
            $this->Pdf->Cell($cell_imp_bolsa['width'], 0, $cell_imp_bolsa['data'], 0, 0, $cell_imp_bolsa['align']);

            $this->Pdf->SetFont($cell_et_imp_bolsa['font_type'], $cell_et_imp_bolsa['font_style'], $cell_et_imp_bolsa['font_size']);
            $this->pdf_text_color($cell_et_imp_bolsa['data'], $cell_et_imp_bolsa['color_r'], $cell_et_imp_bolsa['color_g'], $cell_et_imp_bolsa['color_b']);
            if (!empty($cell_et_imp_bolsa['posx']) && !empty($cell_et_imp_bolsa['posy']))
            {
                $this->Pdf->SetXY($cell_et_imp_bolsa['posx'], $cell_et_imp_bolsa['posy']);
            }
            elseif (!empty($cell_et_imp_bolsa['posx']))
            {
                $this->Pdf->SetX($cell_et_imp_bolsa['posx']);
            }
            elseif (!empty($cell_et_imp_bolsa['posy']))
            {
                $this->Pdf->SetY($cell_et_imp_bolsa['posy']);
            }
            $this->Pdf->Cell($cell_et_imp_bolsa['width'], 0, $cell_et_imp_bolsa['data'], 0, 0, $cell_et_imp_bolsa['align']);

            $this->Pdf->SetFont($cell_81['font_type'], $cell_81['font_style'], $cell_81['font_size']);
            $this->pdf_text_color($cell_81['data'], $cell_81['color_r'], $cell_81['color_g'], $cell_81['color_b']);
            if (!empty($cell_81['posx']) && !empty($cell_81['posy']))
            {
                $this->Pdf->SetXY($cell_81['posx'], $cell_81['posy']);
            }
            elseif (!empty($cell_81['posx']))
            {
                $this->Pdf->SetX($cell_81['posx']);
            }
            elseif (!empty($cell_81['posy']))
            {
                $this->Pdf->SetY($cell_81['posy']);
            }
            $this->Pdf->Cell($cell_81['width'], 0, $cell_81['data'], 0, 0, $cell_81['align']);

            $this->Pdf->SetFont($cell_82['font_type'], $cell_82['font_style'], $cell_82['font_size']);
            $this->pdf_text_color($cell_82['data'], $cell_82['color_r'], $cell_82['color_g'], $cell_82['color_b']);
            if (!empty($cell_82['posx']) && !empty($cell_82['posy']))
            {
                $this->Pdf->SetXY($cell_82['posx'], $cell_82['posy']);
            }
            elseif (!empty($cell_82['posx']))
            {
                $this->Pdf->SetX($cell_82['posx']);
            }
            elseif (!empty($cell_82['posy']))
            {
                $this->Pdf->SetY($cell_82['posy']);
            }
            $this->Pdf->Cell($cell_82['width'], 0, $cell_82['data'], 0, 0, $cell_82['align']);

            $this->Pdf->SetFont($cell_83['font_type'], $cell_83['font_style'], $cell_83['font_size']);
            $this->pdf_text_color($cell_83['data'], $cell_83['color_r'], $cell_83['color_g'], $cell_83['color_b']);
            if (!empty($cell_83['posx']) && !empty($cell_83['posy']))
            {
                $this->Pdf->SetXY($cell_83['posx'], $cell_83['posy']);
            }
            elseif (!empty($cell_83['posx']))
            {
                $this->Pdf->SetX($cell_83['posx']);
            }
            elseif (!empty($cell_83['posy']))
            {
                $this->Pdf->SetY($cell_83['posy']);
            }
            $this->Pdf->Cell($cell_83['width'], 0, $cell_83['data'], 0, 0, $cell_83['align']);

            $this->Pdf->SetFont($cell_84['font_type'], $cell_84['font_style'], $cell_84['font_size']);
            $this->pdf_text_color($cell_84['data'], $cell_84['color_r'], $cell_84['color_g'], $cell_84['color_b']);
            if (!empty($cell_84['posx']) && !empty($cell_84['posy']))
            {
                $this->Pdf->SetXY($cell_84['posx'], $cell_84['posy']);
            }
            elseif (!empty($cell_84['posx']))
            {
                $this->Pdf->SetX($cell_84['posx']);
            }
            elseif (!empty($cell_84['posy']))
            {
                $this->Pdf->SetY($cell_84['posy']);
            }
            $this->Pdf->Cell($cell_84['width'], 0, $cell_84['data'], 0, 0, $cell_84['align']);

            $this->Pdf->SetFont($cell_85['font_type'], $cell_85['font_style'], $cell_85['font_size']);
            $this->pdf_text_color($cell_85['data'], $cell_85['color_r'], $cell_85['color_g'], $cell_85['color_b']);
            if (!empty($cell_85['posx']) && !empty($cell_85['posy']))
            {
                $this->Pdf->SetXY($cell_85['posx'], $cell_85['posy']);
            }
            elseif (!empty($cell_85['posx']))
            {
                $this->Pdf->SetX($cell_85['posx']);
            }
            elseif (!empty($cell_85['posy']))
            {
                $this->Pdf->SetY($cell_85['posy']);
            }
            $this->Pdf->Cell($cell_85['width'], 0, $cell_85['data'], 0, 0, $cell_85['align']);

            $this->Pdf->SetFont($cell_86['font_type'], $cell_86['font_style'], $cell_86['font_size']);
            $this->pdf_text_color($cell_86['data'], $cell_86['color_r'], $cell_86['color_g'], $cell_86['color_b']);
            if (!empty($cell_86['posx']) && !empty($cell_86['posy']))
            {
                $this->Pdf->SetXY($cell_86['posx'], $cell_86['posy']);
            }
            elseif (!empty($cell_86['posx']))
            {
                $this->Pdf->SetX($cell_86['posx']);
            }
            elseif (!empty($cell_86['posy']))
            {
                $this->Pdf->SetY($cell_86['posy']);
            }
            $this->Pdf->Cell($cell_86['width'], 0, $cell_86['data'], 0, 0, $cell_86['align']);

            $this->Pdf->SetFont($cell_c_efec['font_type'], $cell_c_efec['font_style'], $cell_c_efec['font_size']);
            $this->pdf_text_color($cell_c_efec['data'], $cell_c_efec['color_r'], $cell_c_efec['color_g'], $cell_c_efec['color_b']);
            if (!empty($cell_c_efec['posx']) && !empty($cell_c_efec['posy']))
            {
                $this->Pdf->SetXY($cell_c_efec['posx'], $cell_c_efec['posy']);
            }
            elseif (!empty($cell_c_efec['posx']))
            {
                $this->Pdf->SetX($cell_c_efec['posx']);
            }
            elseif (!empty($cell_c_efec['posy']))
            {
                $this->Pdf->SetY($cell_c_efec['posy']);
            }
            $this->Pdf->Cell($cell_c_efec['width'], 0, $cell_c_efec['data'], 0, 0, $cell_c_efec['align']);

            $this->Pdf->SetFont($cell_c_tarj['font_type'], $cell_c_tarj['font_style'], $cell_c_tarj['font_size']);
            $this->pdf_text_color($cell_c_tarj['data'], $cell_c_tarj['color_r'], $cell_c_tarj['color_g'], $cell_c_tarj['color_b']);
            if (!empty($cell_c_tarj['posx']) && !empty($cell_c_tarj['posy']))
            {
                $this->Pdf->SetXY($cell_c_tarj['posx'], $cell_c_tarj['posy']);
            }
            elseif (!empty($cell_c_tarj['posx']))
            {
                $this->Pdf->SetX($cell_c_tarj['posx']);
            }
            elseif (!empty($cell_c_tarj['posy']))
            {
                $this->Pdf->SetY($cell_c_tarj['posy']);
            }
            $this->Pdf->Cell($cell_c_tarj['width'], 0, $cell_c_tarj['data'], 0, 0, $cell_c_tarj['align']);

            $this->Pdf->SetFont($cell_c_cheq['font_type'], $cell_c_cheq['font_style'], $cell_c_cheq['font_size']);
            $this->pdf_text_color($cell_c_cheq['data'], $cell_c_cheq['color_r'], $cell_c_cheq['color_g'], $cell_c_cheq['color_b']);
            if (!empty($cell_c_cheq['posx']) && !empty($cell_c_cheq['posy']))
            {
                $this->Pdf->SetXY($cell_c_cheq['posx'], $cell_c_cheq['posy']);
            }
            elseif (!empty($cell_c_cheq['posx']))
            {
                $this->Pdf->SetX($cell_c_cheq['posx']);
            }
            elseif (!empty($cell_c_cheq['posy']))
            {
                $this->Pdf->SetY($cell_c_cheq['posy']);
            }
            $this->Pdf->Cell($cell_c_cheq['width'], 0, $cell_c_cheq['data'], 0, 0, $cell_c_cheq['align']);

            $this->Pdf->SetFont($cell_c_credito['font_type'], $cell_c_credito['font_style'], $cell_c_credito['font_size']);
            $this->pdf_text_color($cell_c_credito['data'], $cell_c_credito['color_r'], $cell_c_credito['color_g'], $cell_c_credito['color_b']);
            if (!empty($cell_c_credito['posx']) && !empty($cell_c_credito['posy']))
            {
                $this->Pdf->SetXY($cell_c_credito['posx'], $cell_c_credito['posy']);
            }
            elseif (!empty($cell_c_credito['posx']))
            {
                $this->Pdf->SetX($cell_c_credito['posx']);
            }
            elseif (!empty($cell_c_credito['posy']))
            {
                $this->Pdf->SetY($cell_c_credito['posy']);
            }
            $this->Pdf->Cell($cell_c_credito['width'], 0, $cell_c_credito['data'], 0, 0, $cell_c_credito['align']);

            $this->Pdf->SetFont($cell_porc_ef['font_type'], $cell_porc_ef['font_style'], $cell_porc_ef['font_size']);
            $this->pdf_text_color($cell_porc_ef['data'], $cell_porc_ef['color_r'], $cell_porc_ef['color_g'], $cell_porc_ef['color_b']);
            if (!empty($cell_porc_ef['posx']) && !empty($cell_porc_ef['posy']))
            {
                $this->Pdf->SetXY($cell_porc_ef['posx'], $cell_porc_ef['posy']);
            }
            elseif (!empty($cell_porc_ef['posx']))
            {
                $this->Pdf->SetX($cell_porc_ef['posx']);
            }
            elseif (!empty($cell_porc_ef['posy']))
            {
                $this->Pdf->SetY($cell_porc_ef['posy']);
            }
            $this->Pdf->Cell($cell_porc_ef['width'], 0, $cell_porc_ef['data'], 0, 0, $cell_porc_ef['align']);

            $this->Pdf->SetFont($cell_porc_tarj['font_type'], $cell_porc_tarj['font_style'], $cell_porc_tarj['font_size']);
            $this->pdf_text_color($cell_porc_tarj['data'], $cell_porc_tarj['color_r'], $cell_porc_tarj['color_g'], $cell_porc_tarj['color_b']);
            if (!empty($cell_porc_tarj['posx']) && !empty($cell_porc_tarj['posy']))
            {
                $this->Pdf->SetXY($cell_porc_tarj['posx'], $cell_porc_tarj['posy']);
            }
            elseif (!empty($cell_porc_tarj['posx']))
            {
                $this->Pdf->SetX($cell_porc_tarj['posx']);
            }
            elseif (!empty($cell_porc_tarj['posy']))
            {
                $this->Pdf->SetY($cell_porc_tarj['posy']);
            }
            $this->Pdf->Cell($cell_porc_tarj['width'], 0, $cell_porc_tarj['data'], 0, 0, $cell_porc_tarj['align']);

            $this->Pdf->SetFont($cell_porc_cheq['font_type'], $cell_porc_cheq['font_style'], $cell_porc_cheq['font_size']);
            $this->pdf_text_color($cell_porc_cheq['data'], $cell_porc_cheq['color_r'], $cell_porc_cheq['color_g'], $cell_porc_cheq['color_b']);
            if (!empty($cell_porc_cheq['posx']) && !empty($cell_porc_cheq['posy']))
            {
                $this->Pdf->SetXY($cell_porc_cheq['posx'], $cell_porc_cheq['posy']);
            }
            elseif (!empty($cell_porc_cheq['posx']))
            {
                $this->Pdf->SetX($cell_porc_cheq['posx']);
            }
            elseif (!empty($cell_porc_cheq['posy']))
            {
                $this->Pdf->SetY($cell_porc_cheq['posy']);
            }
            $this->Pdf->Cell($cell_porc_cheq['width'], 0, $cell_porc_cheq['data'], 0, 0, $cell_porc_cheq['align']);

            $this->Pdf->SetFont($cell_porc_credito['font_type'], $cell_porc_credito['font_style'], $cell_porc_credito['font_size']);
            $this->pdf_text_color($cell_porc_credito['data'], $cell_porc_credito['color_r'], $cell_porc_credito['color_g'], $cell_porc_credito['color_b']);
            if (!empty($cell_porc_credito['posx']) && !empty($cell_porc_credito['posy']))
            {
                $this->Pdf->SetXY($cell_porc_credito['posx'], $cell_porc_credito['posy']);
            }
            elseif (!empty($cell_porc_credito['posx']))
            {
                $this->Pdf->SetX($cell_porc_credito['posx']);
            }
            elseif (!empty($cell_porc_credito['posy']))
            {
                $this->Pdf->SetY($cell_porc_credito['posy']);
            }
            $this->Pdf->Cell($cell_porc_credito['width'], 0, $cell_porc_credito['data'], 0, 0, $cell_porc_credito['align']);

            $this->Pdf->SetFont($cell_tf['font_type'], $cell_tf['font_style'], $cell_tf['font_size']);
            $this->pdf_text_color($cell_tf['data'], $cell_tf['color_r'], $cell_tf['color_g'], $cell_tf['color_b']);
            if (!empty($cell_tf['posx']) && !empty($cell_tf['posy']))
            {
                $this->Pdf->SetXY($cell_tf['posx'], $cell_tf['posy']);
            }
            elseif (!empty($cell_tf['posx']))
            {
                $this->Pdf->SetX($cell_tf['posx']);
            }
            elseif (!empty($cell_tf['posy']))
            {
                $this->Pdf->SetY($cell_tf['posy']);
            }
            $this->Pdf->Cell($cell_tf['width'], 0, $cell_tf['data'], 0, 0, $cell_tf['align']);

            $this->Pdf->SetFont($cell_porciento['font_type'], $cell_porciento['font_style'], $cell_porciento['font_size']);
            $this->pdf_text_color($cell_porciento['data'], $cell_porciento['color_r'], $cell_porciento['color_g'], $cell_porciento['color_b']);
            if (!empty($cell_porciento['posx']) && !empty($cell_porciento['posy']))
            {
                $this->Pdf->SetXY($cell_porciento['posx'], $cell_porciento['posy']);
            }
            elseif (!empty($cell_porciento['posx']))
            {
                $this->Pdf->SetX($cell_porciento['posx']);
            }
            elseif (!empty($cell_porciento['posy']))
            {
                $this->Pdf->SetY($cell_porciento['posy']);
            }
            $this->Pdf->Cell($cell_porciento['width'], 0, $cell_porciento['data'], 0, 0, $cell_porciento['align']);

            $this->Pdf->SetFont($cell_depto['font_type'], $cell_depto['font_style'], $cell_depto['font_size']);
            $this->pdf_text_color($cell_depto['data'], $cell_depto['color_r'], $cell_depto['color_g'], $cell_depto['color_b']);
            if (!empty($cell_depto['posx']) && !empty($cell_depto['posy']))
            {
                $this->Pdf->SetXY($cell_depto['posx'], $cell_depto['posy']);
            }
            elseif (!empty($cell_depto['posx']))
            {
                $this->Pdf->SetX($cell_depto['posx']);
            }
            elseif (!empty($cell_depto['posy']))
            {
                $this->Pdf->SetY($cell_depto['posy']);
            }
            $this->Pdf->Cell($cell_depto['width'], 0, $cell_depto['data'], 0, 0, $cell_depto['align']);

            $this->Pdf->SetFont($cell_113['font_type'], $cell_113['font_style'], $cell_113['font_size']);
            $this->pdf_text_color($cell_113['data'], $cell_113['color_r'], $cell_113['color_g'], $cell_113['color_b']);
            if (!empty($cell_113['posx']) && !empty($cell_113['posy']))
            {
                $this->Pdf->SetXY($cell_113['posx'], $cell_113['posy']);
            }
            elseif (!empty($cell_113['posx']))
            {
                $this->Pdf->SetX($cell_113['posx']);
            }
            elseif (!empty($cell_113['posy']))
            {
                $this->Pdf->SetY($cell_113['posy']);
            }
            $this->Pdf->Cell($cell_113['width'], 0, $cell_113['data'], 0, 0, $cell_113['align']);

            $this->Pdf->SetFont($cell_114['font_type'], $cell_114['font_style'], $cell_114['font_size']);
            $this->pdf_text_color($cell_114['data'], $cell_114['color_r'], $cell_114['color_g'], $cell_114['color_b']);
            if (!empty($cell_114['posx']) && !empty($cell_114['posy']))
            {
                $this->Pdf->SetXY($cell_114['posx'], $cell_114['posy']);
            }
            elseif (!empty($cell_114['posx']))
            {
                $this->Pdf->SetX($cell_114['posx']);
            }
            elseif (!empty($cell_114['posy']))
            {
                $this->Pdf->SetY($cell_114['posy']);
            }
            $this->Pdf->Cell($cell_114['width'], 0, $cell_114['data'], 0, 0, $cell_114['align']);

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


            $this->Pdf->SetFont($cell_resolu['font_type'], $cell_resolu['font_style'], $cell_resolu['font_size']);
            $this->Pdf->SetTextColor($cell_resolu['color_r'], $cell_resolu['color_g'], $cell_resolu['color_b']);
            if (!empty($cell_resolu['posx']) && !empty($cell_resolu['posy']))
            {
                $this->Pdf->SetXY($cell_resolu['posx'], $cell_resolu['posy']);
            }
            elseif (!empty($cell_resolu['posx']))
            {
                $this->Pdf->SetX($cell_resolu['posx']);
            }
            elseif (!empty($cell_resolu['posy']))
            {
                $this->Pdf->SetY($cell_resolu['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_resolu['width'], 0, $cell_resolu['data'], 0, 0, $cell_resolu['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_resolu['width'], 0, $atu_X, $atu_Y, $cell_resolu['data'], 0, 0, false, true, $cell_resolu['align']);
            }

            $this->Pdf->SetFont($cell_dire_['font_type'], $cell_dire_['font_style'], $cell_dire_['font_size']);
            $this->pdf_text_color($cell_dire_['data'], $cell_dire_['color_r'], $cell_dire_['color_g'], $cell_dire_['color_b']);
            if (!empty($cell_dire_['posx']) && !empty($cell_dire_['posy']))
            {
                $this->Pdf->SetXY($cell_dire_['posx'], $cell_dire_['posy']);
            }
            elseif (!empty($cell_dire_['posx']))
            {
                $this->Pdf->SetX($cell_dire_['posx']);
            }
            elseif (!empty($cell_dire_['posy']))
            {
                $this->Pdf->SetY($cell_dire_['posy']);
            }
            $this->Pdf->Cell($cell_dire_['width'], 0, $cell_dire_['data'], 0, 0, $cell_dire_['align']);

            $this->Pdf->SetFont($cell_correo_['font_type'], $cell_correo_['font_style'], $cell_correo_['font_size']);
            $this->pdf_text_color($cell_correo_['data'], $cell_correo_['color_r'], $cell_correo_['color_g'], $cell_correo_['color_b']);
            if (!empty($cell_correo_['posx']) && !empty($cell_correo_['posy']))
            {
                $this->Pdf->SetXY($cell_correo_['posx'], $cell_correo_['posy']);
            }
            elseif (!empty($cell_correo_['posx']))
            {
                $this->Pdf->SetX($cell_correo_['posx']);
            }
            elseif (!empty($cell_correo_['posy']))
            {
                $this->Pdf->SetY($cell_correo_['posy']);
            }
            $this->Pdf->Cell($cell_correo_['width'], 0, $cell_correo_['data'], 0, 0, $cell_correo_['align']);

          
          
            $this->Pdf->AddPage();
            $this->Pdf_image();

            $this->Pdf->SetFont($cell_87['font_type'], $cell_87['font_style'], $cell_87['font_size']);
            $this->pdf_text_color($cell_87['data'], $cell_87['color_r'], $cell_87['color_g'], $cell_87['color_b']);
            if (!empty($cell_87['posx']) && !empty($cell_87['posy']))
            {
                $this->Pdf->SetXY($cell_87['posx'], $cell_87['posy']);
            }
            elseif (!empty($cell_87['posx']))
            {
                $this->Pdf->SetX($cell_87['posx']);
            }
            elseif (!empty($cell_87['posy']))
            {
                $this->Pdf->SetY($cell_87['posy']);
            }
            $this->Pdf->Cell($cell_87['width'], 0, $cell_87['data'], 0, 0, $cell_87['align']);

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

            $this->Pdf->SetFont($cell_90['font_type'], $cell_90['font_style'], $cell_90['font_size']);
            $this->pdf_text_color($cell_90['data'], $cell_90['color_r'], $cell_90['color_g'], $cell_90['color_b']);
            if (!empty($cell_90['posx']) && !empty($cell_90['posy']))
            {
                $this->Pdf->SetXY($cell_90['posx'], $cell_90['posy']);
            }
            elseif (!empty($cell_90['posx']))
            {
                $this->Pdf->SetX($cell_90['posx']);
            }
            elseif (!empty($cell_90['posy']))
            {
                $this->Pdf->SetY($cell_90['posy']);
            }
            $this->Pdf->Cell($cell_90['width'], 0, $cell_90['data'], 0, 0, $cell_90['align']);

            $this->Pdf->SetFont($cell_91['font_type'], $cell_91['font_style'], $cell_91['font_size']);
            $this->pdf_text_color($cell_91['data'], $cell_91['color_r'], $cell_91['color_g'], $cell_91['color_b']);
            if (!empty($cell_91['posx']) && !empty($cell_91['posy']))
            {
                $this->Pdf->SetXY($cell_91['posx'], $cell_91['posy']);
            }
            elseif (!empty($cell_91['posx']))
            {
                $this->Pdf->SetX($cell_91['posx']);
            }
            elseif (!empty($cell_91['posy']))
            {
                $this->Pdf->SetY($cell_91['posy']);
            }
            $this->Pdf->Cell($cell_91['width'], 0, $cell_91['data'], 0, 0, $cell_91['align']);

            $this->Pdf->SetFont($cell_92['font_type'], $cell_92['font_style'], $cell_92['font_size']);
            $this->pdf_text_color($cell_92['data'], $cell_92['color_r'], $cell_92['color_g'], $cell_92['color_b']);
            if (!empty($cell_92['posx']) && !empty($cell_92['posy']))
            {
                $this->Pdf->SetXY($cell_92['posx'], $cell_92['posy']);
            }
            elseif (!empty($cell_92['posx']))
            {
                $this->Pdf->SetX($cell_92['posx']);
            }
            elseif (!empty($cell_92['posy']))
            {
                $this->Pdf->SetY($cell_92['posy']);
            }
            $this->Pdf->Cell($cell_92['width'], 0, $cell_92['data'], 0, 0, $cell_92['align']);

            $this->Pdf->SetFont($cell_93['font_type'], $cell_93['font_style'], $cell_93['font_size']);
            $this->pdf_text_color($cell_93['data'], $cell_93['color_r'], $cell_93['color_g'], $cell_93['color_b']);
            if (!empty($cell_93['posx']) && !empty($cell_93['posy']))
            {
                $this->Pdf->SetXY($cell_93['posx'], $cell_93['posy']);
            }
            elseif (!empty($cell_93['posx']))
            {
                $this->Pdf->SetX($cell_93['posx']);
            }
            elseif (!empty($cell_93['posy']))
            {
                $this->Pdf->SetY($cell_93['posy']);
            }
            $this->Pdf->Cell($cell_93['width'], 0, $cell_93['data'], 0, 0, $cell_93['align']);

            $this->Pdf->SetFont($cell_94['font_type'], $cell_94['font_style'], $cell_94['font_size']);
            $this->pdf_text_color($cell_94['data'], $cell_94['color_r'], $cell_94['color_g'], $cell_94['color_b']);
            if (!empty($cell_94['posx']) && !empty($cell_94['posy']))
            {
                $this->Pdf->SetXY($cell_94['posx'], $cell_94['posy']);
            }
            elseif (!empty($cell_94['posx']))
            {
                $this->Pdf->SetX($cell_94['posx']);
            }
            elseif (!empty($cell_94['posy']))
            {
                $this->Pdf->SetY($cell_94['posy']);
            }
            $this->Pdf->Cell($cell_94['width'], 0, $cell_94['data'], 0, 0, $cell_94['align']);

            $this->Pdf->SetFont($cell_95['font_type'], $cell_95['font_style'], $cell_95['font_size']);
            $this->pdf_text_color($cell_95['data'], $cell_95['color_r'], $cell_95['color_g'], $cell_95['color_b']);
            if (!empty($cell_95['posx']) && !empty($cell_95['posy']))
            {
                $this->Pdf->SetXY($cell_95['posx'], $cell_95['posy']);
            }
            elseif (!empty($cell_95['posx']))
            {
                $this->Pdf->SetX($cell_95['posx']);
            }
            elseif (!empty($cell_95['posy']))
            {
                $this->Pdf->SetY($cell_95['posy']);
            }
            $this->Pdf->Cell($cell_95['width'], 0, $cell_95['data'], 0, 0, $cell_95['align']);

            $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS");
            $NM_dt_sys = html_entity_decode($this->nm_data->FormataSaida('j/n/Y @?#?@a @?#?@l@?#?@a@?#?@s h:i:s A'), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
            $this->Pdf->SetFont($cell_96['font_type'], $cell_96['font_style'], $cell_96['font_size']);
            $this->Pdf->SetTextColor($cell_96['color_r'], $cell_96['color_g'], $cell_96['color_b']);
            if (!empty($cell_96['posx']) && !empty($cell_96['posy']))
            {
                $this->Pdf->SetXY($cell_96['posx'], $cell_96['posy']);
            }
            elseif (!empty($cell_96['posx']))
            {
                $this->Pdf->SetX($cell_96['posx']);
            }
            elseif (!empty($cell_96['posy']))
            {
                $this->Pdf->SetY($cell_96['posy']);
            }
            $this->Pdf->Cell($cell_96['width'], 0, $NM_dt_sys, 0, 0, $cell_96['align']);


            $this->Pdf->SetFont($cell_98['font_type'], $cell_98['font_style'], $cell_98['font_size']);
            $this->pdf_text_color($cell_98['data'], $cell_98['color_r'], $cell_98['color_g'], $cell_98['color_b']);
            if (!empty($cell_98['posx']) && !empty($cell_98['posy']))
            {
                $this->Pdf->SetXY($cell_98['posx'], $cell_98['posy']);
            }
            elseif (!empty($cell_98['posx']))
            {
                $this->Pdf->SetX($cell_98['posx']);
            }
            elseif (!empty($cell_98['posy']))
            {
                $this->Pdf->SetY($cell_98['posy']);
            }
            $this->Pdf->Cell($cell_98['width'], 0, $cell_98['data'], 0, 0, $cell_98['align']);

            $this->Pdf->SetFont($cell_99['font_type'], $cell_99['font_style'], $cell_99['font_size']);
            $this->pdf_text_color($cell_99['data'], $cell_99['color_r'], $cell_99['color_g'], $cell_99['color_b']);
            if (!empty($cell_99['posx']) && !empty($cell_99['posy']))
            {
                $this->Pdf->SetXY($cell_99['posx'], $cell_99['posy']);
            }
            elseif (!empty($cell_99['posx']))
            {
                $this->Pdf->SetX($cell_99['posx']);
            }
            elseif (!empty($cell_99['posy']))
            {
                $this->Pdf->SetY($cell_99['posy']);
            }
            $this->Pdf->Cell($cell_99['width'], 0, $cell_99['data'], 0, 0, $cell_99['align']);

            $this->Pdf->SetFont($cell_100['font_type'], $cell_100['font_style'], $cell_100['font_size']);
            $this->pdf_text_color($cell_100['data'], $cell_100['color_r'], $cell_100['color_g'], $cell_100['color_b']);
            if (!empty($cell_100['posx']) && !empty($cell_100['posy']))
            {
                $this->Pdf->SetXY($cell_100['posx'], $cell_100['posy']);
            }
            elseif (!empty($cell_100['posx']))
            {
                $this->Pdf->SetX($cell_100['posx']);
            }
            elseif (!empty($cell_100['posy']))
            {
                $this->Pdf->SetY($cell_100['posy']);
            }
            $this->Pdf->Cell($cell_100['width'], 0, $cell_100['data'], 0, 0, $cell_100['align']);

            $this->Pdf->SetFont($cell_101['font_type'], $cell_101['font_style'], $cell_101['font_size']);
            $this->pdf_text_color($cell_101['data'], $cell_101['color_r'], $cell_101['color_g'], $cell_101['color_b']);
            if (!empty($cell_101['posx']) && !empty($cell_101['posy']))
            {
                $this->Pdf->SetXY($cell_101['posx'], $cell_101['posy']);
            }
            elseif (!empty($cell_101['posx']))
            {
                $this->Pdf->SetX($cell_101['posx']);
            }
            elseif (!empty($cell_101['posy']))
            {
                $this->Pdf->SetY($cell_101['posy']);
            }
            $this->Pdf->Cell($cell_101['width'], 0, $cell_101['data'], 0, 0, $cell_101['align']);

            $this->Pdf->SetFont($cell_97['font_type'], $cell_97['font_style'], $cell_97['font_size']);
            $this->pdf_text_color($cell_97['data'], $cell_97['color_r'], $cell_97['color_g'], $cell_97['color_b']);
            if (!empty($cell_97['posx']) && !empty($cell_97['posy']))
            {
                $this->Pdf->SetXY($cell_97['posx'], $cell_97['posy']);
            }
            elseif (!empty($cell_97['posx']))
            {
                $this->Pdf->SetX($cell_97['posx']);
            }
            elseif (!empty($cell_97['posy']))
            {
                $this->Pdf->SetY($cell_97['posy']);
            }
            $this->Pdf->Cell($cell_97['width'], 0, $cell_97['data'], 0, 0, $cell_97['align']);

            $this->Pdf->SetFont($cell_119['font_type'], $cell_119['font_style'], $cell_119['font_size']);
            $this->pdf_text_color($cell_119['data'], $cell_119['color_r'], $cell_119['color_g'], $cell_119['color_b']);
            if (!empty($cell_119['posx']) && !empty($cell_119['posy']))
            {
                $this->Pdf->SetXY($cell_119['posx'], $cell_119['posy']);
            }
            elseif (!empty($cell_119['posx']))
            {
                $this->Pdf->SetX($cell_119['posx']);
            }
            elseif (!empty($cell_119['posy']))
            {
                $this->Pdf->SetY($cell_119['posy']);
            }
            $this->Pdf->Cell($cell_119['width'], 0, $cell_119['data'], 0, 0, $cell_119['align']);

            $this->Pdf->SetFont($cell_120['font_type'], $cell_120['font_style'], $cell_120['font_size']);
            $this->pdf_text_color($cell_120['data'], $cell_120['color_r'], $cell_120['color_g'], $cell_120['color_b']);
            if (!empty($cell_120['posx']) && !empty($cell_120['posy']))
            {
                $this->Pdf->SetXY($cell_120['posx'], $cell_120['posy']);
            }
            elseif (!empty($cell_120['posx']))
            {
                $this->Pdf->SetX($cell_120['posx']);
            }
            elseif (!empty($cell_120['posy']))
            {
                $this->Pdf->SetY($cell_120['posy']);
            }
            $this->Pdf->Cell($cell_120['width'], 0, $cell_120['data'], 0, 0, $cell_120['align']);
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
}
?>
