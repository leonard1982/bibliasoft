<?php
class pdfreport_traslado_merc_grid
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
   var $empresa = array();
   var $ladireccion = array();
   var $numnit = array();
   var $numtele = array();
   var $idmov = array();
   var $idtipotran = array();
   var $fecha = array();
   var $idpro = array();
   var $cantidad = array();
   var $idbodorig = array();
   var $idboddes = array();
   var $observaciones = array();
   var $colores = array();
   var $tallas = array();
   var $sabor = array();
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
   $Tp_papel = array(216, 140);
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
   $_SESSION['scriptcase']['pdfreport_traslado_merc']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_traslado_merc", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idmov[0] = $Busca_temp['idmov']; 
       $tmp_pos = strpos($this->idmov[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idmov[0]))
       {
           $this->idmov[0] = substr($this->idmov[0], 0, $tmp_pos);
       }
       $idmov_2 = $Busca_temp['idmov_input_2']; 
       $this->idmov_2 = $Busca_temp['idmov_input_2']; 
       $this->idtipotran[0] = $Busca_temp['idtipotran']; 
       $tmp_pos = strpos($this->idtipotran[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idtipotran[0]))
       {
           $this->idtipotran[0] = substr($this->idtipotran[0], 0, $tmp_pos);
       }
       $idtipotran_2 = $Busca_temp['idtipotran_input_2']; 
       $this->idtipotran_2 = $Busca_temp['idtipotran_input_2']; 
       $this->fecha[0] = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha[0]))
       {
           $this->fecha[0] = substr($this->fecha[0], 0, $tmp_pos);
       }
       $fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->idpro[0] = $Busca_temp['idpro']; 
       $tmp_pos = strpos($this->idpro[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idpro[0]))
       {
           $this->idpro[0] = substr($this->idpro[0], 0, $tmp_pos);
       }
       $idpro_2 = $Busca_temp['idpro_input_2']; 
       $this->idpro_2 = $Busca_temp['idpro_input_2']; 
       $this->observaciones[0] = $Busca_temp['observaciones']; 
       $tmp_pos = strpos($this->observaciones[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->observaciones[0]))
       {
           $this->observaciones[0] = substr($this->observaciones[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_traslado_merc']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
 $_SESSION['pdfreport_traslado_merc']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_traslado_merc']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_traslado_merc']['direccion']=$this->sc_temp_direccion;
$_SESSION['pdfreport_traslado_merc']['telefono']=$this->sc_temp_tele;

if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_traslado_merc']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'] = " where idmov=" . $_SESSION['par_idmov'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, convert(char(23),fecha,121), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, EXTEND(fecha, YEAR TO DAY), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['order_grid'] = $nmgp_order_by;
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
     $this->Pdf->setCellMargins($left = '', $top = 4, $right = '', $bottom = 4);
     $this->Pdf->SetAutoPageBreak(true, 4);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 8);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/usr__NM__img__NM__Nota Inventario_traslado.png", "1", "1", "137", "100", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['idmov'] = "Idmov";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['idtipotran'] = "Idtipotran";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['idpro'] = "Idpro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['idbodorig'] = "Idbodorig";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['idboddes'] = "Idboddes";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['colores'] = "Colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['tallas'] = "Tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['sabor'] = "Sabor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['empresa'] = "empresa";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['ladireccion'] = "ladireccion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['numnit'] = "numnit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['labels']['numtele'] = "numtele";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_traslado_merc']['lig_edit'];
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
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idmov[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idmov[$this->nm_grid_colunas] = (string)$this->idmov[$this->nm_grid_colunas];
          $this->idtipotran[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->idtipotran[$this->nm_grid_colunas] = (string)$this->idtipotran[$this->nm_grid_colunas];
          $this->fecha[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->idpro[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->idpro[$this->nm_grid_colunas] = (string)$this->idpro[$this->nm_grid_colunas];
          $this->cantidad[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->cantidad[$this->nm_grid_colunas] = (strpos(strtolower($this->cantidad[$this->nm_grid_colunas]), "e")) ? (float)$this->cantidad[$this->nm_grid_colunas] : $this->cantidad[$this->nm_grid_colunas]; 
          $this->cantidad[$this->nm_grid_colunas] = (string)$this->cantidad[$this->nm_grid_colunas];
          $this->idbodorig[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->idbodorig[$this->nm_grid_colunas] = (string)$this->idbodorig[$this->nm_grid_colunas];
          $this->idboddes[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->idboddes[$this->nm_grid_colunas] = (string)$this->idboddes[$this->nm_grid_colunas];
          $this->observaciones[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->colores[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->colores[$this->nm_grid_colunas] = (string)$this->colores[$this->nm_grid_colunas];
          $this->tallas[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->tallas[$this->nm_grid_colunas] = (string)$this->tallas[$this->nm_grid_colunas];
          $this->sabor[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->sabor[$this->nm_grid_colunas] = (string)$this->sabor[$this->nm_grid_colunas];
          $this->empresa[$this->nm_grid_colunas] = "";
          $this->ladireccion[$this->nm_grid_colunas] = "";
          $this->numnit[$this->nm_grid_colunas] = "";
          $this->numtele[$this->nm_grid_colunas] = "";
          $this->idmov[$this->nm_grid_colunas] = sc_strip_script($this->idmov[$this->nm_grid_colunas]);
          if ($this->idmov[$this->nm_grid_colunas] === "") 
          { 
              $this->idmov[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              $this->idmov[$this->nm_grid_colunas] = str_replace($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_traslado_merc']['decimal_db'], "", $this->idmov[$this->nm_grid_colunas]); 
              $this->nm_gera_mask($this->idmov[$this->nm_grid_colunas], "xxxxxx"); 
          } 
          $this->idmov[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idmov[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idtipotran($this->idtipotran[$this->nm_grid_colunas] , $this->idtipotran[$this->nm_grid_colunas]) ; 
          $this->idtipotran[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idtipotran[$this->nm_grid_colunas]);
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
          $this->Lookup->lookup_idpro($this->idpro[$this->nm_grid_colunas] , $this->idpro[$this->nm_grid_colunas]) ; 
          $this->idpro[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idpro[$this->nm_grid_colunas]);
          $this->cantidad[$this->nm_grid_colunas] = sc_strip_script($this->cantidad[$this->nm_grid_colunas]);
          if ($this->cantidad[$this->nm_grid_colunas] === "") 
          { 
              $this->cantidad[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cantidad[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->cantidad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->cantidad[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idbodorig($this->idbodorig[$this->nm_grid_colunas] , $this->idbodorig[$this->nm_grid_colunas]) ; 
          $this->idbodorig[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idbodorig[$this->nm_grid_colunas]);
          $this->Lookup->lookup_idboddes($this->idboddes[$this->nm_grid_colunas] , $this->idboddes[$this->nm_grid_colunas]) ; 
          $this->idboddes[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idboddes[$this->nm_grid_colunas]);
          $this->observaciones[$this->nm_grid_colunas] = sc_strip_script($this->observaciones[$this->nm_grid_colunas]);
          if ($this->observaciones[$this->nm_grid_colunas] === "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->observaciones[$this->nm_grid_colunas] !== "") 
          { 
              $this->observaciones[$this->nm_grid_colunas] = sc_strtolower($this->observaciones[$this->nm_grid_colunas]); 
              $this->observaciones[$this->nm_grid_colunas] = ucfirst($this->observaciones[$this->nm_grid_colunas]); 
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
          $this->Lookup->lookup_colores($this->colores[$this->nm_grid_colunas] , $this->colores[$this->nm_grid_colunas]) ; 
          $this->colores[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->colores[$this->nm_grid_colunas]);
          $this->Lookup->lookup_tallas($this->tallas[$this->nm_grid_colunas] , $this->tallas[$this->nm_grid_colunas]) ; 
          $this->tallas[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tallas[$this->nm_grid_colunas]);
          $this->Lookup->lookup_sabor($this->sabor[$this->nm_grid_colunas] , $this->sabor[$this->nm_grid_colunas]) ; 
          $this->sabor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sabor[$this->nm_grid_colunas]);
          if ($this->empresa[$this->nm_grid_colunas] === "") 
          { 
              $this->empresa[$this->nm_grid_colunas] = "" ;  
          } 
          $this->empresa[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->empresa[$this->nm_grid_colunas]);
          if ($this->ladireccion[$this->nm_grid_colunas] === "") 
          { 
              $this->ladireccion[$this->nm_grid_colunas] = "" ;  
          } 
          $this->ladireccion[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->ladireccion[$this->nm_grid_colunas]);
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
            $cell_idmov = array('posx' => 110, 'posy' => 2, 'data' => $this->idmov[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 14, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idtipotran = array('posx' => 45, 'posy' => 30, 'data' => $this->idtipotran[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fecha = array('posx' => 112, 'posy' => 16, 'data' => $this->fecha[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idpro = array('posx' => 32, 'posy' => 43, 'data' => $this->idpro[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_cantidad = array('posx' => 32, 'posy' => 54, 'data' => $this->cantidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 11, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idbodorig = array('posx' => 32, 'posy' => 71, 'data' => $this->idbodorig[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idboddes = array('posx' => 95, 'posy' => 71, 'data' => $this->idboddes[$this->nm_grid_colunas], 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa = array('posx' => 10, 'posy' => 10, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_traslado_merc']['empresa_nombre'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numnit = array('posx' => 10, 'posy' => 13, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_traslado_merc']['nit'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ladireccion = array('posx' => 10, 'posy' => 16, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_traslado_merc']['direccion'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numtele = array('posx' => 10, 'posy' => 19, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_traslado_merc']['telefono'] . ''), 'width'      => 100, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_color = array('posx' => 32, 'posy' => 49, 'data' => $this->colores[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_talla = array('posx' => 57, 'posy' => 49, 'data' => $this->tallas[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sabor = array('posx' => 80, 'posy' => 49, 'data' => $this->sabor[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_idmov['font_type'], $cell_idmov['font_style'], $cell_idmov['font_size']);
            $this->pdf_text_color($cell_idmov['data'], $cell_idmov['color_r'], $cell_idmov['color_g'], $cell_idmov['color_b']);
            if (!empty($cell_idmov['posx']) && !empty($cell_idmov['posy']))
            {
                $this->Pdf->SetXY($cell_idmov['posx'], $cell_idmov['posy']);
            }
            elseif (!empty($cell_idmov['posx']))
            {
                $this->Pdf->SetX($cell_idmov['posx']);
            }
            elseif (!empty($cell_idmov['posy']))
            {
                $this->Pdf->SetY($cell_idmov['posy']);
            }
            $this->Pdf->Cell($cell_idmov['width'], 0, $cell_idmov['data'], 0, 0, $cell_idmov['align']);

            $this->Pdf->SetFont($cell_idtipotran['font_type'], $cell_idtipotran['font_style'], $cell_idtipotran['font_size']);
            $this->pdf_text_color($cell_idtipotran['data'], $cell_idtipotran['color_r'], $cell_idtipotran['color_g'], $cell_idtipotran['color_b']);
            if (!empty($cell_idtipotran['posx']) && !empty($cell_idtipotran['posy']))
            {
                $this->Pdf->SetXY($cell_idtipotran['posx'], $cell_idtipotran['posy']);
            }
            elseif (!empty($cell_idtipotran['posx']))
            {
                $this->Pdf->SetX($cell_idtipotran['posx']);
            }
            elseif (!empty($cell_idtipotran['posy']))
            {
                $this->Pdf->SetY($cell_idtipotran['posy']);
            }
            $this->Pdf->Cell($cell_idtipotran['width'], 0, $cell_idtipotran['data'], 0, 0, $cell_idtipotran['align']);

            $this->Pdf->SetFont($cell_fecha['font_type'], $cell_fecha['font_style'], $cell_fecha['font_size']);
            $this->pdf_text_color($cell_fecha['data'], $cell_fecha['color_r'], $cell_fecha['color_g'], $cell_fecha['color_b']);
            if (!empty($cell_fecha['posx']) && !empty($cell_fecha['posy']))
            {
                $this->Pdf->SetXY($cell_fecha['posx'], $cell_fecha['posy']);
            }
            elseif (!empty($cell_fecha['posx']))
            {
                $this->Pdf->SetX($cell_fecha['posx']);
            }
            elseif (!empty($cell_fecha['posy']))
            {
                $this->Pdf->SetY($cell_fecha['posy']);
            }
            $this->Pdf->Cell($cell_fecha['width'], 0, $cell_fecha['data'], 0, 0, $cell_fecha['align']);

            $this->Pdf->SetFont($cell_idpro['font_type'], $cell_idpro['font_style'], $cell_idpro['font_size']);
            $this->pdf_text_color($cell_idpro['data'], $cell_idpro['color_r'], $cell_idpro['color_g'], $cell_idpro['color_b']);
            if (!empty($cell_idpro['posx']) && !empty($cell_idpro['posy']))
            {
                $this->Pdf->SetXY($cell_idpro['posx'], $cell_idpro['posy']);
            }
            elseif (!empty($cell_idpro['posx']))
            {
                $this->Pdf->SetX($cell_idpro['posx']);
            }
            elseif (!empty($cell_idpro['posy']))
            {
                $this->Pdf->SetY($cell_idpro['posy']);
            }
            $this->Pdf->Cell($cell_idpro['width'], 0, $cell_idpro['data'], 0, 0, $cell_idpro['align']);

            $this->Pdf->SetFont($cell_cantidad['font_type'], $cell_cantidad['font_style'], $cell_cantidad['font_size']);
            $this->pdf_text_color($cell_cantidad['data'], $cell_cantidad['color_r'], $cell_cantidad['color_g'], $cell_cantidad['color_b']);
            if (!empty($cell_cantidad['posx']) && !empty($cell_cantidad['posy']))
            {
                $this->Pdf->SetXY($cell_cantidad['posx'], $cell_cantidad['posy']);
            }
            elseif (!empty($cell_cantidad['posx']))
            {
                $this->Pdf->SetX($cell_cantidad['posx']);
            }
            elseif (!empty($cell_cantidad['posy']))
            {
                $this->Pdf->SetY($cell_cantidad['posy']);
            }
            $this->Pdf->Cell($cell_cantidad['width'], 0, $cell_cantidad['data'], 0, 0, $cell_cantidad['align']);

            $this->Pdf->SetFont($cell_idbodorig['font_type'], $cell_idbodorig['font_style'], $cell_idbodorig['font_size']);
            $this->pdf_text_color($cell_idbodorig['data'], $cell_idbodorig['color_r'], $cell_idbodorig['color_g'], $cell_idbodorig['color_b']);
            if (!empty($cell_idbodorig['posx']) && !empty($cell_idbodorig['posy']))
            {
                $this->Pdf->SetXY($cell_idbodorig['posx'], $cell_idbodorig['posy']);
            }
            elseif (!empty($cell_idbodorig['posx']))
            {
                $this->Pdf->SetX($cell_idbodorig['posx']);
            }
            elseif (!empty($cell_idbodorig['posy']))
            {
                $this->Pdf->SetY($cell_idbodorig['posy']);
            }
            $this->Pdf->Cell($cell_idbodorig['width'], 0, $cell_idbodorig['data'], 0, 0, $cell_idbodorig['align']);

            $this->Pdf->SetFont($cell_idboddes['font_type'], $cell_idboddes['font_style'], $cell_idboddes['font_size']);
            $this->pdf_text_color($cell_idboddes['data'], $cell_idboddes['color_r'], $cell_idboddes['color_g'], $cell_idboddes['color_b']);
            if (!empty($cell_idboddes['posx']) && !empty($cell_idboddes['posy']))
            {
                $this->Pdf->SetXY($cell_idboddes['posx'], $cell_idboddes['posy']);
            }
            elseif (!empty($cell_idboddes['posx']))
            {
                $this->Pdf->SetX($cell_idboddes['posx']);
            }
            elseif (!empty($cell_idboddes['posy']))
            {
                $this->Pdf->SetY($cell_idboddes['posy']);
            }
            $this->Pdf->Cell($cell_idboddes['width'], 0, $cell_idboddes['data'], 0, 0, $cell_idboddes['align']);

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

            $this->Pdf->SetFont($cell_color['font_type'], $cell_color['font_style'], $cell_color['font_size']);
            $this->pdf_text_color($cell_color['data'], $cell_color['color_r'], $cell_color['color_g'], $cell_color['color_b']);
            if (!empty($cell_color['posx']) && !empty($cell_color['posy']))
            {
                $this->Pdf->SetXY($cell_color['posx'], $cell_color['posy']);
            }
            elseif (!empty($cell_color['posx']))
            {
                $this->Pdf->SetX($cell_color['posx']);
            }
            elseif (!empty($cell_color['posy']))
            {
                $this->Pdf->SetY($cell_color['posy']);
            }
            $this->Pdf->Cell($cell_color['width'], 0, $cell_color['data'], 0, 0, $cell_color['align']);

            $this->Pdf->SetFont($cell_talla['font_type'], $cell_talla['font_style'], $cell_talla['font_size']);
            $this->pdf_text_color($cell_talla['data'], $cell_talla['color_r'], $cell_talla['color_g'], $cell_talla['color_b']);
            if (!empty($cell_talla['posx']) && !empty($cell_talla['posy']))
            {
                $this->Pdf->SetXY($cell_talla['posx'], $cell_talla['posy']);
            }
            elseif (!empty($cell_talla['posx']))
            {
                $this->Pdf->SetX($cell_talla['posx']);
            }
            elseif (!empty($cell_talla['posy']))
            {
                $this->Pdf->SetY($cell_talla['posy']);
            }
            $this->Pdf->Cell($cell_talla['width'], 0, $cell_talla['data'], 0, 0, $cell_talla['align']);

            $this->Pdf->SetFont($cell_sabor['font_type'], $cell_sabor['font_style'], $cell_sabor['font_size']);
            $this->pdf_text_color($cell_sabor['data'], $cell_sabor['color_r'], $cell_sabor['color_g'], $cell_sabor['color_b']);
            if (!empty($cell_sabor['posx']) && !empty($cell_sabor['posy']))
            {
                $this->Pdf->SetXY($cell_sabor['posx'], $cell_sabor['posy']);
            }
            elseif (!empty($cell_sabor['posx']))
            {
                $this->Pdf->SetX($cell_sabor['posx']);
            }
            elseif (!empty($cell_sabor['posy']))
            {
                $this->Pdf->SetY($cell_sabor['posy']);
            }
            $this->Pdf->Cell($cell_sabor['width'], 0, $cell_sabor['data'], 0, 0, $cell_sabor['align']);

          
$this->Pdf->Output("Nota No: ".$this->idmov[$this->nm_grid_colunas].'  '.$this->idtipotran[$this->nm_grid_colunas].'.pdf', 'I');
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
