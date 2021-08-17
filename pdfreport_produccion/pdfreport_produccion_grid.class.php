<?php
class pdfreport_produccion_grid
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
   var $detalle = array();
   var $detalle_nompro = array();
   var $detalle_fl_numproducc = array();
   var $detalle_fl_idpro = array();
   var $detalle_fl_idbod = array();
   var $detalle_fl_costop = array();
   var $detalle_fl_cantidad = array();
   var $detalle_fl_valorpar = array();
   var $detalle_fl_colores = array();
   var $detalle_c_color = array();
   var $detalle_fl_tallas = array();
   var $sc_field_2 = array();
   var $sc_field_3 = array();
   var $detalle_fl_sabor = array();
   var $idmat = array();
   var $numero = array();
   var $fecha = array();
   var $observ = array();
   var $vtotal = array();
   var $asentada = array();
   var $id_bodega = array();
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
   $_SESSION['scriptcase']['pdfreport_produccion']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_produccion", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->idmat[0] = $Busca_temp['idmat']; 
       $tmp_pos = strpos($this->idmat[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->idmat[0]))
       {
           $this->idmat[0] = substr($this->idmat[0], 0, $tmp_pos);
       }
       $idmat_2 = $Busca_temp['idmat_input_2']; 
       $this->idmat_2 = $Busca_temp['idmat_input_2']; 
       $this->numero[0] = $Busca_temp['numero']; 
       $tmp_pos = strpos($this->numero[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->numero[0]))
       {
           $this->numero[0] = substr($this->numero[0], 0, $tmp_pos);
       }
       $numero_2 = $Busca_temp['numero_input_2']; 
       $this->numero_2 = $Busca_temp['numero_input_2']; 
       $this->fecha[0] = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha[0]))
       {
           $this->fecha[0] = substr($this->fecha[0], 0, $tmp_pos);
       }
       $fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->fecha_2 = $Busca_temp['fecha_input_2']; 
       $this->observ[0] = $Busca_temp['observ']; 
       $tmp_pos = strpos($this->observ[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->observ[0]))
       {
           $this->observ[0] = substr($this->observ[0], 0, $tmp_pos);
       }
       $this->asentada[0] = $Busca_temp['asentada']; 
       $tmp_pos = strpos($this->asentada[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->asentada[0]))
       {
           $this->asentada[0] = substr($this->asentada[0], 0, $tmp_pos);
       }
       $asentada_2 = $Busca_temp['asentada_input_2']; 
       $this->asentada_2 = $Busca_temp['asentada_input_2']; 
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_produccion']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
 $_SESSION['pdfreport_produccion']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_produccion']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_produccion']['direccion1']=$this->sc_temp_direccion;
$_SESSION['pdfreport_produccion']['telefono1']=$this->sc_temp_tele;
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_produccion']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'] = " where numero=" . $_SESSION['par_numero'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idmat, numero, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idmat, numero, fecha, observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idmat, numero, convert(char(23),fecha,121), observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idmat, numero, fecha, observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idmat, numero, EXTEND(fecha, YEAR TO DAY), observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idmat, numero, fecha, observ, vtotal, asentada, id_bodega from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['order_grid'] = $nmgp_order_by;
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
     $this->Pdf->setCellMargins($left = 5, $top = 5, $right = 5, $bottom = 5);
     $this->Pdf->SetAutoPageBreak(true, 5);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 10);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['idmat'] = "Idmat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['numero'] = "Numero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['observ'] = "Observ";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['vtotal'] = "Vtotal";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['asentada'] = "Asentada";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['id_bodega'] = "Id Bodega";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle'] = "detalle";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_nompro'] = "Nompro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_numproducc'] = "Numproducc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_idpro'] = "Idpro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_idbod'] = "Idbod";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_costop'] = "Costop";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_valorpar'] = "Valorpar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_colores'] = "Colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_c_color'] = "Color";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_tallas'] = "Tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['sc_field_2'] = "tamaño";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['sc_field_3'] = "tamaño";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['labels']['detalle_fl_sabor'] = "Sabor";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_produccion']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_produccion']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->idmat[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->idmat[$this->nm_grid_colunas] = (string)$this->idmat[$this->nm_grid_colunas];
          $this->numero[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->numero[$this->nm_grid_colunas] = (string)$this->numero[$this->nm_grid_colunas];
          $this->fecha[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->observ[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->vtotal[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->vtotal[$this->nm_grid_colunas] =  str_replace(",", ".", $this->vtotal[$this->nm_grid_colunas]);
          $this->vtotal[$this->nm_grid_colunas] = (strpos(strtolower($this->vtotal[$this->nm_grid_colunas]), "e")) ? (float)$this->vtotal[$this->nm_grid_colunas] : $this->vtotal[$this->nm_grid_colunas]; 
          $this->vtotal[$this->nm_grid_colunas] = (string)$this->vtotal[$this->nm_grid_colunas];
          $this->asentada[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->asentada[$this->nm_grid_colunas] = (string)$this->asentada[$this->nm_grid_colunas];
          $this->id_bodega[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->id_bodega[$this->nm_grid_colunas] = (string)$this->id_bodega[$this->nm_grid_colunas];
          $this->detalle_nompro[$this->nm_grid_colunas] = array();
          $this->detalle_fl_numproducc[$this->nm_grid_colunas] = array();
          $this->detalle_fl_idpro[$this->nm_grid_colunas] = array();
          $this->detalle_fl_idbod[$this->nm_grid_colunas] = array();
          $this->detalle_fl_costop[$this->nm_grid_colunas] = array();
          $this->detalle_fl_cantidad[$this->nm_grid_colunas] = array();
          $this->detalle_fl_valorpar[$this->nm_grid_colunas] = array();
          $this->detalle_fl_colores[$this->nm_grid_colunas] = array();
          $this->detalle_c_color[$this->nm_grid_colunas] = array();
          $this->detalle_fl_tallas[$this->nm_grid_colunas] = array();
          $this->sc_field_2[$this->nm_grid_colunas] = array();
          $this->sc_field_3[$this->nm_grid_colunas] = array();
          $this->detalle_fl_sabor[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detalle($this->detalle[$this->nm_grid_colunas] , $this->numero[$this->nm_grid_colunas], $array_detalle); 
          $NM_ind = 0;
          $this->detalle = array();
          foreach ($array_detalle as $cada_subselect) 
          {
              $this->detalle[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalle_nompro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $this->detalle_c_color[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[8];
              $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[9];
              $this->sc_field_2[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[10];
              $this->sc_field_3[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[11];
              $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[12];
              $NM_ind++;
          }
          $this->idmat[$this->nm_grid_colunas] = sc_strip_script($this->idmat[$this->nm_grid_colunas]);
          if ($this->idmat[$this->nm_grid_colunas] === "") 
          { 
              $this->idmat[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idmat[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idmat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idmat[$this->nm_grid_colunas]);
          $this->numero[$this->nm_grid_colunas] = sc_strip_script($this->numero[$this->nm_grid_colunas]);
          if ($this->numero[$this->nm_grid_colunas] === "") 
          { 
              $this->numero[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numero[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numero[$this->nm_grid_colunas]);
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
          $this->observ[$this->nm_grid_colunas] = sc_strip_script($this->observ[$this->nm_grid_colunas]);
          if ($this->observ[$this->nm_grid_colunas] === "") 
          { 
              $this->observ[$this->nm_grid_colunas] = "" ;  
          } 
          $this->observ[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->observ[$this->nm_grid_colunas]);
          $this->vtotal[$this->nm_grid_colunas] = sc_strip_script($this->vtotal[$this->nm_grid_colunas]);
          if ($this->vtotal[$this->nm_grid_colunas] === "") 
          { 
              $this->vtotal[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->vtotal[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $this->vtotal[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vtotal[$this->nm_grid_colunas]);
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
          $this->Lookup->lookup_id_bodega($this->id_bodega[$this->nm_grid_colunas] , $this->id_bodega[$this->nm_grid_colunas]) ; 
          $this->id_bodega[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->id_bodega[$this->nm_grid_colunas]);
          foreach ($this->detalle_nompro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_nompro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_nompro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_nompro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_nompro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_numproducc[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_numproducc[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_idpro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_idpro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_idbod[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_idbod[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_costop[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_valorpar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
              $this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_colores[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_c_color[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_c_color[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_c_color[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_c_color[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_c_color[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_tallas[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sc_field_2[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sc_field_2[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sc_field_2[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sc_field_2[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sc_field_2[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->sc_field_3[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->sc_field_3[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->sc_field_3[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->sc_field_3[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->sc_field_3[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_sabor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_numero = array('posx' => '180', 'posy' => '15', 'data' => $this->numero[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '20', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_fecha = array('posx' => '30', 'posy' => '42', 'data' => $this->fecha[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_observ = array('posx' => '7', 'posy' => '63', 'data' => $this->observ[$this->nm_grid_colunas], 'width'      => '190', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_vtotal = array('posx' => '65', 'posy' => '49', 'data' => $this->vtotal[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $Titulo = array('posx' => '10', 'posy' => '30', 'data' => $this->SC_conv_utf8('Reporte traslado Materia Prima'), 'width'      => '0', 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => '22', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $Etiqueta1 = array('posx' => '165', 'posy' => '15', 'data' => $this->SC_conv_utf8('N°: '), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '20', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $et_fecha = array('posx' => '5', 'posy' => '42', 'data' => $this->SC_conv_utf8('Fecha:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $costo_total = array('posx' => '5', 'posy' => '49', 'data' => $this->SC_conv_utf8('Costo Materia Prima:$'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $observa = array('posx' => '5', 'posy' => '57', 'data' => $this->SC_conv_utf8('Observaciones:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '14', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $articulo = array('posx' => '15', 'posy' => '75', 'data' => $this->SC_conv_utf8('Artículo'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cantidad = array('posx' => '115', 'posy' => '75', 'data' => $this->SC_conv_utf8('Cantidad'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $costo = array('posx' => '135', 'posy' => '75', 'data' => $this->SC_conv_utf8('Costo unitario'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $Vr_parcial = array('posx' => '167', 'posy' => '75', 'data' => $this->SC_conv_utf8('Vr. Parcial'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalle_nompro = array('posx' => '15', 'posy' => '83', 'data' => $this->detalle_nompro[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_costop = array('posx' => '140', 'posy' => '83', 'data' => $this->detalle_fl_costop[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_cantidad = array('posx' => '120', 'posy' => '83', 'data' => $this->detalle_fl_cantidad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_valorpar = array('posx' => '170', 'posy' => '83', 'data' => $this->detalle_fl_valorpar[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $entrego = array('posx' => '20', 'posy' => '250', 'data' => $this->SC_conv_utf8('Entregó'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $recibio = array('posx' => '160', 'posy' => '250', 'data' => $this->SC_conv_utf8('Recibió'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $entrego_ = array('posx' => '5', 'posy' => '245', 'data' => $this->SC_conv_utf8('____________________'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $recibio_ = array('posx' => '145', 'posy' => '245', 'data' => $this->SC_conv_utf8('____________________'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_27 = array('posx' => '20', 'posy' => '260', 'data' => '', 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_28 = array('posx' => '28', 'posy' => '260', 'data' => '', 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '8', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $pag = array('posx' => '5', 'posy' => '260', 'data' => $this->SC_conv_utf8('Hoja: '), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $de = array('posx' => '23', 'posy' => '260', 'data' => $this->SC_conv_utf8('de '), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empresa = array('posx' => '10', 'posy' => '4', 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_produccion']['empresa_nombre'] . ''), 'width'      => '150', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nit = array('posx' => '10', 'posy' => '8', 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_produccion']['nit'] . ''), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_direccion = array('posx' => '10', 'posy' => '12', 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_produccion']['direccion1'] . ''), 'width'      => '120', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numtele = array('posx' => '10', 'posy' => '16', 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_produccion']['telefono1'] . ''), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_35 = array('posx' => '0', 'posy' => '0', 'data' => $this->idmat[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_36 = array('posx' => '0', 'posy' => '0', 'data' => $this->idmat[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_37 = array('posx' => '0', 'posy' => '0', 'data' => $this->idmat[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_c_color = array('posx' => '15', 'posy' => '87', 'data' => $this->detalle_c_color[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_3 = array('posx' => '45', 'posy' => '87', 'data' => $this->sc_field_3[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_sc_field_2 = array('posx' => '75', 'posy' => '87', 'data' => $this->sc_field_2[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => '9', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_eti_Des = array('posx' => '10', 'posy' => '25', 'data' => $this->SC_conv_utf8('Dirigido a:'), 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_bodega_Des = array('posx' => '35', 'posy' => '25', 'data' => $this->id_bodega[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '10', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_numero['font_type'], $cell_numero['font_style'], $cell_numero['font_size']);
            $this->pdf_text_color($cell_numero['data'], $cell_numero['color_r'], $cell_numero['color_g'], $cell_numero['color_b']);
            if (!empty($cell_numero['posx']) && !empty($cell_numero['posy']))
            {
                $this->Pdf->SetXY($cell_numero['posx'], $cell_numero['posy']);
            }
            elseif (!empty($cell_numero['posx']))
            {
                $this->Pdf->SetX($cell_numero['posx']);
            }
            elseif (!empty($cell_numero['posy']))
            {
                $this->Pdf->SetY($cell_numero['posy']);
            }
            $this->Pdf->Cell($cell_numero['width'], 0, $cell_numero['data'], 0, 0, $cell_numero['align']);

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

            $this->Pdf->SetFont($cell_observ['font_type'], $cell_observ['font_style'], $cell_observ['font_size']);
            $this->pdf_text_color($cell_observ['data'], $cell_observ['color_r'], $cell_observ['color_g'], $cell_observ['color_b']);
            if (!empty($cell_observ['posx']) && !empty($cell_observ['posy']))
            {
                $this->Pdf->SetXY($cell_observ['posx'], $cell_observ['posy']);
            }
            elseif (!empty($cell_observ['posx']))
            {
                $this->Pdf->SetX($cell_observ['posx']);
            }
            elseif (!empty($cell_observ['posy']))
            {
                $this->Pdf->SetY($cell_observ['posy']);
            }
            $this->Pdf->Cell($cell_observ['width'], 0, $cell_observ['data'], 0, 0, $cell_observ['align']);

            $this->Pdf->SetFont($cell_vtotal['font_type'], $cell_vtotal['font_style'], $cell_vtotal['font_size']);
            $this->pdf_text_color($cell_vtotal['data'], $cell_vtotal['color_r'], $cell_vtotal['color_g'], $cell_vtotal['color_b']);
            if (!empty($cell_vtotal['posx']) && !empty($cell_vtotal['posy']))
            {
                $this->Pdf->SetXY($cell_vtotal['posx'], $cell_vtotal['posy']);
            }
            elseif (!empty($cell_vtotal['posx']))
            {
                $this->Pdf->SetX($cell_vtotal['posx']);
            }
            elseif (!empty($cell_vtotal['posy']))
            {
                $this->Pdf->SetY($cell_vtotal['posy']);
            }
            $this->Pdf->Cell($cell_vtotal['width'], 0, $cell_vtotal['data'], 0, 0, $cell_vtotal['align']);

            $this->Pdf->SetFont($Titulo['font_type'], $Titulo['font_style'], $Titulo['font_size']);
            $this->pdf_text_color($Titulo['data'], $Titulo['color_r'], $Titulo['color_g'], $Titulo['color_b']);
            if (!empty($Titulo['posx']) && !empty($Titulo['posy']))
            {
                $this->Pdf->SetXY($Titulo['posx'], $Titulo['posy']);
            }
            elseif (!empty($Titulo['posx']))
            {
                $this->Pdf->SetX($Titulo['posx']);
            }
            elseif (!empty($Titulo['posy']))
            {
                $this->Pdf->SetY($Titulo['posy']);
            }
            $this->Pdf->Cell($Titulo['width'], 0, $Titulo['data'], 0, 0, $Titulo['align']);

            $this->Pdf->SetFont($Etiqueta1['font_type'], $Etiqueta1['font_style'], $Etiqueta1['font_size']);
            $this->pdf_text_color($Etiqueta1['data'], $Etiqueta1['color_r'], $Etiqueta1['color_g'], $Etiqueta1['color_b']);
            if (!empty($Etiqueta1['posx']) && !empty($Etiqueta1['posy']))
            {
                $this->Pdf->SetXY($Etiqueta1['posx'], $Etiqueta1['posy']);
            }
            elseif (!empty($Etiqueta1['posx']))
            {
                $this->Pdf->SetX($Etiqueta1['posx']);
            }
            elseif (!empty($Etiqueta1['posy']))
            {
                $this->Pdf->SetY($Etiqueta1['posy']);
            }
            $this->Pdf->Cell($Etiqueta1['width'], 0, $Etiqueta1['data'], 0, 0, $Etiqueta1['align']);

            $this->Pdf->SetFont($et_fecha['font_type'], $et_fecha['font_style'], $et_fecha['font_size']);
            $this->pdf_text_color($et_fecha['data'], $et_fecha['color_r'], $et_fecha['color_g'], $et_fecha['color_b']);
            if (!empty($et_fecha['posx']) && !empty($et_fecha['posy']))
            {
                $this->Pdf->SetXY($et_fecha['posx'], $et_fecha['posy']);
            }
            elseif (!empty($et_fecha['posx']))
            {
                $this->Pdf->SetX($et_fecha['posx']);
            }
            elseif (!empty($et_fecha['posy']))
            {
                $this->Pdf->SetY($et_fecha['posy']);
            }
            $this->Pdf->Cell($et_fecha['width'], 0, $et_fecha['data'], 0, 0, $et_fecha['align']);

            $this->Pdf->SetFont($costo_total['font_type'], $costo_total['font_style'], $costo_total['font_size']);
            $this->pdf_text_color($costo_total['data'], $costo_total['color_r'], $costo_total['color_g'], $costo_total['color_b']);
            if (!empty($costo_total['posx']) && !empty($costo_total['posy']))
            {
                $this->Pdf->SetXY($costo_total['posx'], $costo_total['posy']);
            }
            elseif (!empty($costo_total['posx']))
            {
                $this->Pdf->SetX($costo_total['posx']);
            }
            elseif (!empty($costo_total['posy']))
            {
                $this->Pdf->SetY($costo_total['posy']);
            }
            $this->Pdf->Cell($costo_total['width'], 0, $costo_total['data'], 0, 0, $costo_total['align']);

            $this->Pdf->SetFont($observa['font_type'], $observa['font_style'], $observa['font_size']);
            $this->pdf_text_color($observa['data'], $observa['color_r'], $observa['color_g'], $observa['color_b']);
            if (!empty($observa['posx']) && !empty($observa['posy']))
            {
                $this->Pdf->SetXY($observa['posx'], $observa['posy']);
            }
            elseif (!empty($observa['posx']))
            {
                $this->Pdf->SetX($observa['posx']);
            }
            elseif (!empty($observa['posy']))
            {
                $this->Pdf->SetY($observa['posy']);
            }
            $this->Pdf->Cell($observa['width'], 0, $observa['data'], 0, 0, $observa['align']);

            $this->Pdf->SetFont($articulo['font_type'], $articulo['font_style'], $articulo['font_size']);
            $this->pdf_text_color($articulo['data'], $articulo['color_r'], $articulo['color_g'], $articulo['color_b']);
            if (!empty($articulo['posx']) && !empty($articulo['posy']))
            {
                $this->Pdf->SetXY($articulo['posx'], $articulo['posy']);
            }
            elseif (!empty($articulo['posx']))
            {
                $this->Pdf->SetX($articulo['posx']);
            }
            elseif (!empty($articulo['posy']))
            {
                $this->Pdf->SetY($articulo['posy']);
            }
            $this->Pdf->Cell($articulo['width'], 0, $articulo['data'], 0, 0, $articulo['align']);

            $this->Pdf->SetFont($cantidad['font_type'], $cantidad['font_style'], $cantidad['font_size']);
            $this->pdf_text_color($cantidad['data'], $cantidad['color_r'], $cantidad['color_g'], $cantidad['color_b']);
            if (!empty($cantidad['posx']) && !empty($cantidad['posy']))
            {
                $this->Pdf->SetXY($cantidad['posx'], $cantidad['posy']);
            }
            elseif (!empty($cantidad['posx']))
            {
                $this->Pdf->SetX($cantidad['posx']);
            }
            elseif (!empty($cantidad['posy']))
            {
                $this->Pdf->SetY($cantidad['posy']);
            }
            $this->Pdf->Cell($cantidad['width'], 0, $cantidad['data'], 0, 0, $cantidad['align']);

            $this->Pdf->SetFont($costo['font_type'], $costo['font_style'], $costo['font_size']);
            $this->pdf_text_color($costo['data'], $costo['color_r'], $costo['color_g'], $costo['color_b']);
            if (!empty($costo['posx']) && !empty($costo['posy']))
            {
                $this->Pdf->SetXY($costo['posx'], $costo['posy']);
            }
            elseif (!empty($costo['posx']))
            {
                $this->Pdf->SetX($costo['posx']);
            }
            elseif (!empty($costo['posy']))
            {
                $this->Pdf->SetY($costo['posy']);
            }
            $this->Pdf->Cell($costo['width'], 0, $costo['data'], 0, 0, $costo['align']);

            $this->Pdf->SetFont($Vr_parcial['font_type'], $Vr_parcial['font_style'], $Vr_parcial['font_size']);
            $this->pdf_text_color($Vr_parcial['data'], $Vr_parcial['color_r'], $Vr_parcial['color_g'], $Vr_parcial['color_b']);
            if (!empty($Vr_parcial['posx']) && !empty($Vr_parcial['posy']))
            {
                $this->Pdf->SetXY($Vr_parcial['posx'], $Vr_parcial['posy']);
            }
            elseif (!empty($Vr_parcial['posx']))
            {
                $this->Pdf->SetX($Vr_parcial['posx']);
            }
            elseif (!empty($Vr_parcial['posy']))
            {
                $this->Pdf->SetY($Vr_parcial['posy']);
            }
            $this->Pdf->Cell($Vr_parcial['width'], 0, $Vr_parcial['data'], 0, 0, $Vr_parcial['align']);

            $this->Pdf->SetY(83);
            foreach ($this->detalle[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detalle_nompro['font_type'], $cell_detalle_nompro['font_style'], $cell_detalle_nompro['font_size']);
                if (!empty($cell_detalle_nompro['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_nompro['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detalle_nompro['color_r'], $cell_detalle_nompro['color_g'], $cell_detalle_nompro['color_b']);
                $this->Pdf->writeHTMLCell($cell_detalle_nompro['width'], 0, $atu_X, $atu_Y, $this->detalle_nompro[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detalle_nompro['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_detalle_fl_costop['font_type'], $cell_detalle_fl_costop['font_style'], $cell_detalle_fl_costop['font_size']);
                if (!empty($cell_detalle_fl_costop['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_costop['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_costop['color_r'], $cell_detalle_fl_costop['color_g'], $cell_detalle_fl_costop['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_costop['width'], 0, $this->detalle_fl_costop[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_costop['align']);
                $this->Pdf->SetFont($cell_detalle_fl_cantidad['font_type'], $cell_detalle_fl_cantidad['font_style'], $cell_detalle_fl_cantidad['font_size']);
                if (!empty($cell_detalle_fl_cantidad['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_cantidad['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_cantidad['color_r'], $cell_detalle_fl_cantidad['color_g'], $cell_detalle_fl_cantidad['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_cantidad['width'], 0, $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_cantidad['align']);
                $this->Pdf->SetFont($cell_detalle_fl_valorpar['font_type'], $cell_detalle_fl_valorpar['font_style'], $cell_detalle_fl_valorpar['font_size']);
                if (!empty($cell_detalle_fl_valorpar['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_valorpar['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_valorpar['color_r'], $cell_detalle_fl_valorpar['color_g'], $cell_detalle_fl_valorpar['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_valorpar['width'], 0, $this->detalle_fl_valorpar[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_valorpar['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 10;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($entrego['font_type'], $entrego['font_style'], $entrego['font_size']);
            $this->pdf_text_color($entrego['data'], $entrego['color_r'], $entrego['color_g'], $entrego['color_b']);
            if (!empty($entrego['posx']) && !empty($entrego['posy']))
            {
                $this->Pdf->SetXY($entrego['posx'], $entrego['posy']);
            }
            elseif (!empty($entrego['posx']))
            {
                $this->Pdf->SetX($entrego['posx']);
            }
            elseif (!empty($entrego['posy']))
            {
                $this->Pdf->SetY($entrego['posy']);
            }
            $this->Pdf->Cell($entrego['width'], 0, $entrego['data'], 0, 0, $entrego['align']);

            $this->Pdf->SetFont($recibio['font_type'], $recibio['font_style'], $recibio['font_size']);
            $this->pdf_text_color($recibio['data'], $recibio['color_r'], $recibio['color_g'], $recibio['color_b']);
            if (!empty($recibio['posx']) && !empty($recibio['posy']))
            {
                $this->Pdf->SetXY($recibio['posx'], $recibio['posy']);
            }
            elseif (!empty($recibio['posx']))
            {
                $this->Pdf->SetX($recibio['posx']);
            }
            elseif (!empty($recibio['posy']))
            {
                $this->Pdf->SetY($recibio['posy']);
            }
            $this->Pdf->Cell($recibio['width'], 0, $recibio['data'], 0, 0, $recibio['align']);

            $this->Pdf->SetFont($entrego_['font_type'], $entrego_['font_style'], $entrego_['font_size']);
            $this->pdf_text_color($entrego_['data'], $entrego_['color_r'], $entrego_['color_g'], $entrego_['color_b']);
            if (!empty($entrego_['posx']) && !empty($entrego_['posy']))
            {
                $this->Pdf->SetXY($entrego_['posx'], $entrego_['posy']);
            }
            elseif (!empty($entrego_['posx']))
            {
                $this->Pdf->SetX($entrego_['posx']);
            }
            elseif (!empty($entrego_['posy']))
            {
                $this->Pdf->SetY($entrego_['posy']);
            }
            $this->Pdf->Cell($entrego_['width'], 0, $entrego_['data'], 0, 0, $entrego_['align']);

            $this->Pdf->SetFont($recibio_['font_type'], $recibio_['font_style'], $recibio_['font_size']);
            $this->pdf_text_color($recibio_['data'], $recibio_['color_r'], $recibio_['color_g'], $recibio_['color_b']);
            if (!empty($recibio_['posx']) && !empty($recibio_['posy']))
            {
                $this->Pdf->SetXY($recibio_['posx'], $recibio_['posy']);
            }
            elseif (!empty($recibio_['posx']))
            {
                $this->Pdf->SetX($recibio_['posx']);
            }
            elseif (!empty($recibio_['posy']))
            {
                $this->Pdf->SetY($recibio_['posy']);
            }
            $this->Pdf->Cell($recibio_['width'], 0, $recibio_['data'], 0, 0, $recibio_['align']);

            $this->Pdf->SetFont($cell_27['font_type'], $cell_27['font_style'], $cell_27['font_size']);
            $this->Pdf->SetTextColor($cell_27['color_r'], $cell_27['color_g'], $cell_27['color_b']);
            if (!empty($cell_27['posx']) && !empty($cell_27['posy']))
            {
                $this->Pdf->SetXY($cell_27['posx'], $cell_27['posy']);
            }
            elseif (!empty($cell_27['posx']))
            {
                $this->Pdf->SetX($cell_27['posx']);
            }
            elseif (!empty($cell_27['posy']))
            {
                $this->Pdf->SetY($cell_27['posy']);
            }
            $this->Pdf->Cell($cell_27['width'], 0, $this->Pdf->PageNo(), 0, 0, $cell_27['align']);


            $this->Pdf->SetFont($cell_28['font_type'], $cell_28['font_style'], $cell_28['font_size']);
            $this->Pdf->SetTextColor($cell_28['color_r'], $cell_28['color_g'], $cell_28['color_b']);
            if (!empty($cell_28['posx']) && !empty($cell_28['posy']))
            {
                $this->Pdf->SetXY($cell_28['posx'], $cell_28['posy']);
            }
            elseif (!empty($cell_28['posx']))
            {
                $this->Pdf->SetX($cell_28['posx']);
            }
            elseif (!empty($cell_28['posy']))
            {
                $this->Pdf->SetY($cell_28['posy']);
            }
            $this->Pdf->Cell($cell_28['width'], 0, $this->Pdf->getAliasNbPages(), 0, 0, $cell_28['align']);


            $this->Pdf->SetFont($pag['font_type'], $pag['font_style'], $pag['font_size']);
            $this->pdf_text_color($pag['data'], $pag['color_r'], $pag['color_g'], $pag['color_b']);
            if (!empty($pag['posx']) && !empty($pag['posy']))
            {
                $this->Pdf->SetXY($pag['posx'], $pag['posy']);
            }
            elseif (!empty($pag['posx']))
            {
                $this->Pdf->SetX($pag['posx']);
            }
            elseif (!empty($pag['posy']))
            {
                $this->Pdf->SetY($pag['posy']);
            }
            $this->Pdf->Cell($pag['width'], 0, $pag['data'], 0, 0, $pag['align']);

            $this->Pdf->SetFont($de['font_type'], $de['font_style'], $de['font_size']);
            $this->pdf_text_color($de['data'], $de['color_r'], $de['color_g'], $de['color_b']);
            if (!empty($de['posx']) && !empty($de['posy']))
            {
                $this->Pdf->SetXY($de['posx'], $de['posy']);
            }
            elseif (!empty($de['posx']))
            {
                $this->Pdf->SetX($de['posx']);
            }
            elseif (!empty($de['posy']))
            {
                $this->Pdf->SetY($de['posy']);
            }
            $this->Pdf->Cell($de['width'], 0, $de['data'], 0, 0, $de['align']);

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

            $this->Pdf->SetFont($cell_nit['font_type'], $cell_nit['font_style'], $cell_nit['font_size']);
            $this->pdf_text_color($cell_nit['data'], $cell_nit['color_r'], $cell_nit['color_g'], $cell_nit['color_b']);
            if (!empty($cell_nit['posx']) && !empty($cell_nit['posy']))
            {
                $this->Pdf->SetXY($cell_nit['posx'], $cell_nit['posy']);
            }
            elseif (!empty($cell_nit['posx']))
            {
                $this->Pdf->SetX($cell_nit['posx']);
            }
            elseif (!empty($cell_nit['posy']))
            {
                $this->Pdf->SetY($cell_nit['posy']);
            }
            $this->Pdf->Cell($cell_nit['width'], 0, $cell_nit['data'], 0, 0, $cell_nit['align']);

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

            $this->Pdf->SetFont($cell_35['font_type'], $cell_35['font_style'], $cell_35['font_size']);
            $this->pdf_text_color($cell_35['data'], $cell_35['color_r'], $cell_35['color_g'], $cell_35['color_b']);
            if (!empty($cell_35['posx']) && !empty($cell_35['posy']))
            {
                $this->Pdf->SetXY($cell_35['posx'], $cell_35['posy']);
            }
            elseif (!empty($cell_35['posx']))
            {
                $this->Pdf->SetX($cell_35['posx']);
            }
            elseif (!empty($cell_35['posy']))
            {
                $this->Pdf->SetY($cell_35['posy']);
            }
            $this->Pdf->Cell($cell_35['width'], 0, $cell_35['data'], 0, 0, $cell_35['align']);

            $this->Pdf->SetFont($cell_36['font_type'], $cell_36['font_style'], $cell_36['font_size']);
            $this->pdf_text_color($cell_36['data'], $cell_36['color_r'], $cell_36['color_g'], $cell_36['color_b']);
            if (!empty($cell_36['posx']) && !empty($cell_36['posy']))
            {
                $this->Pdf->SetXY($cell_36['posx'], $cell_36['posy']);
            }
            elseif (!empty($cell_36['posx']))
            {
                $this->Pdf->SetX($cell_36['posx']);
            }
            elseif (!empty($cell_36['posy']))
            {
                $this->Pdf->SetY($cell_36['posy']);
            }
            $this->Pdf->Cell($cell_36['width'], 0, $cell_36['data'], 0, 0, $cell_36['align']);

            $this->Pdf->SetFont($cell_37['font_type'], $cell_37['font_style'], $cell_37['font_size']);
            $this->pdf_text_color($cell_37['data'], $cell_37['color_r'], $cell_37['color_g'], $cell_37['color_b']);
            if (!empty($cell_37['posx']) && !empty($cell_37['posy']))
            {
                $this->Pdf->SetXY($cell_37['posx'], $cell_37['posy']);
            }
            elseif (!empty($cell_37['posx']))
            {
                $this->Pdf->SetX($cell_37['posx']);
            }
            elseif (!empty($cell_37['posy']))
            {
                $this->Pdf->SetY($cell_37['posy']);
            }
            $this->Pdf->Cell($cell_37['width'], 0, $cell_37['data'], 0, 0, $cell_37['align']);

            $this->Pdf->SetY(87);
            foreach ($this->detalle[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detalle_c_color['font_type'], $cell_detalle_c_color['font_style'], $cell_detalle_c_color['font_size']);
                if (!empty($cell_detalle_c_color['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_c_color['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detalle_c_color['color_r'], $cell_detalle_c_color['color_g'], $cell_detalle_c_color['color_b']);
                $this->Pdf->writeHTMLCell($cell_detalle_c_color['width'], 0, $atu_X, $atu_Y, $this->detalle_c_color[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detalle_c_color['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sc_field_3['font_type'], $cell_sc_field_3['font_style'], $cell_sc_field_3['font_size']);
                if (!empty($cell_sc_field_3['posx']))
                {
                    $this->Pdf->SetX($cell_sc_field_3['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sc_field_3['color_r'], $cell_sc_field_3['color_g'], $cell_sc_field_3['color_b']);
                $this->Pdf->writeHTMLCell($cell_sc_field_3['width'], 0, $atu_X, $atu_Y, $this->sc_field_3[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sc_field_3['align']);
                $this->Pdf->SetY($atu_Y);
                $this->Pdf->SetFont($cell_sc_field_2['font_type'], $cell_sc_field_2['font_style'], $cell_sc_field_2['font_size']);
                if (!empty($cell_sc_field_2['posx']))
                {
                    $this->Pdf->SetX($cell_sc_field_2['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_sc_field_2['color_r'], $cell_sc_field_2['color_g'], $cell_sc_field_2['color_b']);
                $this->Pdf->writeHTMLCell($cell_sc_field_2['width'], 0, $atu_X, $atu_Y, $this->sc_field_2[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_sc_field_2['align']);
                $this->Pdf->SetY($atu_Y);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 10;
                $this->Pdf->SetY($max_Y);

            }

            $this->Pdf->SetFont($cell_eti_Des['font_type'], $cell_eti_Des['font_style'], $cell_eti_Des['font_size']);
            $this->pdf_text_color($cell_eti_Des['data'], $cell_eti_Des['color_r'], $cell_eti_Des['color_g'], $cell_eti_Des['color_b']);
            if (!empty($cell_eti_Des['posx']) && !empty($cell_eti_Des['posy']))
            {
                $this->Pdf->SetXY($cell_eti_Des['posx'], $cell_eti_Des['posy']);
            }
            elseif (!empty($cell_eti_Des['posx']))
            {
                $this->Pdf->SetX($cell_eti_Des['posx']);
            }
            elseif (!empty($cell_eti_Des['posy']))
            {
                $this->Pdf->SetY($cell_eti_Des['posy']);
            }
            $this->Pdf->Cell($cell_eti_Des['width'], 0, $cell_eti_Des['data'], 0, 0, $cell_eti_Des['align']);

            $this->Pdf->SetFont($cell_bodega_Des['font_type'], $cell_bodega_Des['font_style'], $cell_bodega_Des['font_size']);
            $this->pdf_text_color($cell_bodega_Des['data'], $cell_bodega_Des['color_r'], $cell_bodega_Des['color_g'], $cell_bodega_Des['color_b']);
            if (!empty($cell_bodega_Des['posx']) && !empty($cell_bodega_Des['posy']))
            {
                $this->Pdf->SetXY($cell_bodega_Des['posx'], $cell_bodega_Des['posy']);
            }
            elseif (!empty($cell_bodega_Des['posx']))
            {
                $this->Pdf->SetX($cell_bodega_Des['posx']);
            }
            elseif (!empty($cell_bodega_Des['posy']))
            {
                $this->Pdf->SetY($cell_bodega_Des['posy']);
            }
            $this->Pdf->Cell($cell_bodega_Des['width'], 0, $cell_bodega_Des['data'], 0, 0, $cell_bodega_Des['align']);
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
