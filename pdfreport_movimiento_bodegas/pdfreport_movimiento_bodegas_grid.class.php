<?php
class pdfreport_movimiento_bodegas_grid
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
   var $array_detalle_fl_colores = array();
   var $array_detalle_fl_tallas = array();
   var $array_detalle_fl_sabor = array();
   var $detalle = array();
   var $detalle_fl_idnota = array();
   var $detalle_fl_idmovi = array();
   var $detalle_fl_producto = array();
   var $detalle_p_nompro = array();
   var $detalle_fl_destino = array();
   var $detalle_fl_cantidad = array();
   var $detalle_fl_presentacion = array();
   var $detalle_fl_colores = array();
   var $detalle_fl_tallas = array();
   var $detalle_fl_sabor = array();
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
   var $numeronota = array();
   var $prefijonota = array();
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
   $_SESSION['scriptcase']['pdfreport_movimiento_bodegas']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_movimiento_bodegas", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['campos_busca'];
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
       $this->prefijonota[0] = $Busca_temp['prefijonota']; 
       $tmp_pos = strpos($this->prefijonota[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->prefijonota[0]))
       {
           $this->prefijonota[0] = substr($this->prefijonota[0], 0, $tmp_pos);
       }
       $prefijonota_2 = $Busca_temp['prefijonota_input_2']; 
       $this->prefijonota_2 = $Busca_temp['prefijonota_input_2']; 
   } 
   else 
   { 
       $this->fecha_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_filtro'];
   $_SESSION['scriptcase']['pdfreport_movimiento_bodegas']['contr_erro'] = 'on';
if (!isset($_SESSION['tele'])) {$_SESSION['tele'] = "";}
if (!isset($this->sc_temp_tele)) {$this->sc_temp_tele = (isset($_SESSION['tele'])) ? $_SESSION['tele'] : "";}
if (!isset($_SESSION['direccion'])) {$_SESSION['direccion'] = "";}
if (!isset($this->sc_temp_direccion)) {$this->sc_temp_direccion = (isset($_SESSION['direccion'])) ? $_SESSION['direccion'] : "";}
if (!isset($_SESSION['nit'])) {$_SESSION['nit'] = "";}
if (!isset($this->sc_temp_nit)) {$this->sc_temp_nit = (isset($_SESSION['nit'])) ? $_SESSION['nit'] : "";}
if (!isset($_SESSION['empresa'])) {$_SESSION['empresa'] = "";}
if (!isset($this->sc_temp_empresa)) {$this->sc_temp_empresa = (isset($_SESSION['empresa'])) ? $_SESSION['empresa'] : "";}
 $_SESSION['pdfreport_movimiento_bodegas']['empresa_nombre']=$this->sc_temp_empresa;
$_SESSION['pdfreport_movimiento_bodegas']['nit']=$this->sc_temp_nit;
$_SESSION['pdfreport_movimiento_bodegas']['direccion']=$this->sc_temp_direccion;
$_SESSION['pdfreport_movimiento_bodegas']['telefono']=$this->sc_temp_tele;
if (isset($this->sc_temp_empresa)) {$_SESSION['empresa'] = $this->sc_temp_empresa;}
if (isset($this->sc_temp_nit)) {$_SESSION['nit'] = $this->sc_temp_nit;}
if (isset($this->sc_temp_direccion)) {$_SESSION['direccion'] = $this->sc_temp_direccion;}
if (isset($this->sc_temp_tele)) {$_SESSION['tele'] = $this->sc_temp_tele;}
$_SESSION['scriptcase']['pdfreport_movimiento_bodegas']['contr_erro'] = 'off'; 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'] = " where idmov=" . $_SESSION['par_idmov'] . "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, convert(char(23),fecha,121), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idmov, idtipotran, EXTEND(fecha, YEAR TO DAY), idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idmov, idtipotran, fecha, idpro, cantidad, idbodorig, idboddes, observaciones, colores, tallas, sabor, numeronota, prefijonota from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['order_grid'] = $nmgp_order_by;
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['idmov'] = "Idmov";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['idtipotran'] = "Idtipotran";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['fecha'] = "Fecha";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['idpro'] = "Idpro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['idbodorig'] = "Idbodorig";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['idboddes'] = "Idboddes";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['observaciones'] = "Observaciones";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['colores'] = "Colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['tallas'] = "Tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['sabor'] = "Sabor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['numeronota'] = "Numeronota";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['prefijonota'] = "Prefijonota";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle'] = "detalle";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_idnota'] = "Idnota";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_idmovi'] = "Idmovi";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_producto'] = "Producto";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_p_nompro'] = "Nompro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_destino'] = "Destino";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_presentacion'] = "Presentacion";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_colores'] = "Colores";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_tallas'] = "Tallas";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['labels']['detalle_fl_sabor'] = "Sabor";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_movimiento_bodegas']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_movimiento_bodegas']['qt_col_grid']) 
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
          $this->cantidad[$this->nm_grid_colunas] =  str_replace(",", ".", $this->cantidad[$this->nm_grid_colunas]);
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
          $this->numeronota[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->numeronota[$this->nm_grid_colunas] = (string)$this->numeronota[$this->nm_grid_colunas];
          $this->prefijonota[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->prefijonota[$this->nm_grid_colunas] = (string)$this->prefijonota[$this->nm_grid_colunas];
          $this->detalle_fl_idnota[$this->nm_grid_colunas] = array();
          $this->detalle_fl_idmovi[$this->nm_grid_colunas] = array();
          $this->detalle_fl_producto[$this->nm_grid_colunas] = array();
          $this->detalle_p_nompro[$this->nm_grid_colunas] = array();
          $this->detalle_fl_destino[$this->nm_grid_colunas] = array();
          $this->detalle_fl_cantidad[$this->nm_grid_colunas] = array();
          $this->detalle_fl_presentacion[$this->nm_grid_colunas] = array();
          $this->detalle_fl_colores[$this->nm_grid_colunas] = array();
          $this->detalle_fl_tallas[$this->nm_grid_colunas] = array();
          $this->detalle_fl_sabor[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detalle($this->detalle[$this->nm_grid_colunas] , $this->idmov[$this->nm_grid_colunas], $array_detalle); 
          $NM_ind = 0;
          $this->detalle = array();
          foreach ($array_detalle as $cada_subselect) 
          {
              $this->detalle[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[6];
              $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[7];
              $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[8];
              $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[9];
              $NM_ind++;
          }
          $this->idmov[$this->nm_grid_colunas] = sc_strip_script($this->idmov[$this->nm_grid_colunas]);
          if ($this->idmov[$this->nm_grid_colunas] === "") 
          { 
              $this->idmov[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idmov[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
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
          $this->idpro[$this->nm_grid_colunas] = sc_strip_script($this->idpro[$this->nm_grid_colunas]);
          if ($this->idpro[$this->nm_grid_colunas] === "") 
          { 
              $this->idpro[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->idpro[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->idpro[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->idpro[$this->nm_grid_colunas]);
          $this->cantidad[$this->nm_grid_colunas] = sc_strip_script($this->cantidad[$this->nm_grid_colunas]);
          if ($this->cantidad[$this->nm_grid_colunas] === "") 
          { 
              $this->cantidad[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->cantidad[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
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
                 if (strlen($temp[$ind_x]) > 80) 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 80, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->observaciones[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->observaciones[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->observaciones[$this->nm_grid_colunas]);
          $this->colores[$this->nm_grid_colunas] = sc_strip_script($this->colores[$this->nm_grid_colunas]);
          if ($this->colores[$this->nm_grid_colunas] === "") 
          { 
              $this->colores[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->colores[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->colores[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->colores[$this->nm_grid_colunas]);
          $this->tallas[$this->nm_grid_colunas] = sc_strip_script($this->tallas[$this->nm_grid_colunas]);
          if ($this->tallas[$this->nm_grid_colunas] === "") 
          { 
              $this->tallas[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->tallas[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->tallas[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->tallas[$this->nm_grid_colunas]);
          $this->sabor[$this->nm_grid_colunas] = sc_strip_script($this->sabor[$this->nm_grid_colunas]);
          if ($this->sabor[$this->nm_grid_colunas] === "") 
          { 
              $this->sabor[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->sabor[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->sabor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->sabor[$this->nm_grid_colunas]);
          $this->numeronota[$this->nm_grid_colunas] = sc_strip_script($this->numeronota[$this->nm_grid_colunas]);
          if ($this->numeronota[$this->nm_grid_colunas] === "") 
          { 
              $this->numeronota[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->numeronota[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->numeronota[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numeronota[$this->nm_grid_colunas]);
          $this->Lookup->lookup_prefijonota($this->prefijonota[$this->nm_grid_colunas] , $this->prefijonota[$this->nm_grid_colunas]) ; 
          $this->prefijonota[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->prefijonota[$this->nm_grid_colunas]);
          foreach ($this->detalle_fl_idnota[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_idnota[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_idmovi[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_idmovi[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_producto[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_producto[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_p_nompro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          if ($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] !== "") 
          { 
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = sc_strtoupper($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind]); 
          } 
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_destino[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_destino[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_presentacion[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          if ($this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] !== "") 
          { 
              $this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] = sc_strtoupper($this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind]); 
          } 
              $this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_colores[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detalle_fl_colores($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] , $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind], $array_detalle_fl_colores) ; 
              $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_tallas[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detalle_fl_tallas($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] , $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind], $array_detalle_fl_tallas) ; 
              $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_fl_sabor[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
              $this->Lookup->lookup_detalle_fl_sabor($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] , $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind], $array_detalle_fl_sabor) ; 
              $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_TITULO = array('posx' => 10, 'posy' => 5, 'data' => $this->SC_conv_utf8('NOTA DE INVENTARIO'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 18, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_No = array('posx' => 140, 'posy' => 7, 'data' => $this->SC_conv_utf8('Prefijo y No:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_prefijonota = array('posx' => 170, 'posy' => 7, 'data' => $this->prefijonota[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_numeronota = array('posx' => 185, 'posy' => 7, 'data' => $this->numeronota[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_empres = array('posx' => 10, 'posy' => 12, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_movimiento_bodegas']['empresa_nombre'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nit = array('posx' => 10, 'posy' => 16, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_movimiento_bodegas']['nit'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_direccion = array('posx' => 10, 'posy' => 20, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_movimiento_bodegas']['direccion'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_telefono = array('posx' => 10, 'posy' => 24, 'data' => $this->SC_conv_utf8('' . $_SESSION['pdfreport_movimiento_bodegas']['telefono'] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fecha = array('posx' => 160, 'posy' => 16, 'data' => $this->fecha[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_fecha = array('posx' => 140, 'posy' => 16, 'data' => $this->SC_conv_utf8('Fecha: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_linea = array('posx' => 11, 'posy' => 28, 'data' => $this->SC_conv_utf8('__________________________________________________________________________'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idtipotran = array('posx' => 50, 'posy' => 34, 'data' => $this->idtipotran[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_concepto = array('posx' => 10, 'posy' => 34, 'data' => $this->SC_conv_utf8('Concepto:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_observaciones = array('posx' => 10, 'posy' => 44, 'data' => $this->observaciones[$this->nm_grid_colunas], 'width'      => 170, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_idbodorig = array('posx' => 179, 'posy' => 65, 'data' => $this->idbodorig[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_et_origen = array('posx' => 140, 'posy' => 65, 'data' => $this->SC_conv_utf8('Ubicación Origen:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_ubicacion = array('posx' => 10, 'posy' => 65, 'data' => $this->SC_conv_utf8('Ubicación o destino:'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_idboddes = array('posx' => 55, 'posy' => 65, 'data' => $this->idboddes[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Observ = array('posx' => 10, 'posy' => 39, 'data' => $this->SC_conv_utf8('Observaciones: '), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_linea2 = array('posx' => 11, 'posy' => 67, 'data' => $this->SC_conv_utf8('__________________________________________________________________________'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_titulo_detalle = array('posx' => 11, 'posy' => 74, 'data' => $this->SC_conv_utf8('D E T A L L E'), 'width'      => 0, 'align'      => 'C', 'font_type'  => $this->default_font, 'font_size'  => 16, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => BU);
            $cell_articulo = array('posx' => 15, 'posy' => 82, 'data' => $this->SC_conv_utf8('Producto'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_cantidad_et = array('posx' => 150, 'posy' => 82, 'data' => $this->SC_conv_utf8('Cantidad'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_presentacion = array('posx' => 178, 'posy' => 82, 'data' => $this->SC_conv_utf8('Presentación'), 'width'      => 0, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 12, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalle_p_nompro = array('posx' => 16, 'posy' => 87, 'data' => $this->detalle_p_nompro[$this->nm_grid_colunas], 'width'      => 55, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_cantidad = array('posx' => 155, 'posy' => 87, 'data' => $this->detalle_fl_cantidad[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_presentacion = array('posx' => 180, 'posy' => 87, 'data' => $this->detalle_fl_presentacion[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_colores = array('posx' => 80, 'posy' => 87, 'data' => $this->detalle_fl_colores[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_tallas = array('posx' => 110, 'posy' => 87, 'data' => $this->detalle_fl_tallas[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_fl_sabor = array('posx' => 127, 'posy' => 87, 'data' => $this->detalle_fl_sabor[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Courier', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_TITULO['font_type'], $cell_TITULO['font_style'], $cell_TITULO['font_size']);
            $this->pdf_text_color($cell_TITULO['data'], $cell_TITULO['color_r'], $cell_TITULO['color_g'], $cell_TITULO['color_b']);
            if (!empty($cell_TITULO['posx']) && !empty($cell_TITULO['posy']))
            {
                $this->Pdf->SetXY($cell_TITULO['posx'], $cell_TITULO['posy']);
            }
            elseif (!empty($cell_TITULO['posx']))
            {
                $this->Pdf->SetX($cell_TITULO['posx']);
            }
            elseif (!empty($cell_TITULO['posy']))
            {
                $this->Pdf->SetY($cell_TITULO['posy']);
            }
            $this->Pdf->Cell($cell_TITULO['width'], 0, $cell_TITULO['data'], 0, 0, $cell_TITULO['align']);

            $this->Pdf->SetFont($cell_No['font_type'], $cell_No['font_style'], $cell_No['font_size']);
            $this->pdf_text_color($cell_No['data'], $cell_No['color_r'], $cell_No['color_g'], $cell_No['color_b']);
            if (!empty($cell_No['posx']) && !empty($cell_No['posy']))
            {
                $this->Pdf->SetXY($cell_No['posx'], $cell_No['posy']);
            }
            elseif (!empty($cell_No['posx']))
            {
                $this->Pdf->SetX($cell_No['posx']);
            }
            elseif (!empty($cell_No['posy']))
            {
                $this->Pdf->SetY($cell_No['posy']);
            }
            $this->Pdf->Cell($cell_No['width'], 0, $cell_No['data'], 0, 0, $cell_No['align']);

            $this->Pdf->SetFont($cell_prefijonota['font_type'], $cell_prefijonota['font_style'], $cell_prefijonota['font_size']);
            $this->pdf_text_color($cell_prefijonota['data'], $cell_prefijonota['color_r'], $cell_prefijonota['color_g'], $cell_prefijonota['color_b']);
            if (!empty($cell_prefijonota['posx']) && !empty($cell_prefijonota['posy']))
            {
                $this->Pdf->SetXY($cell_prefijonota['posx'], $cell_prefijonota['posy']);
            }
            elseif (!empty($cell_prefijonota['posx']))
            {
                $this->Pdf->SetX($cell_prefijonota['posx']);
            }
            elseif (!empty($cell_prefijonota['posy']))
            {
                $this->Pdf->SetY($cell_prefijonota['posy']);
            }
            $this->Pdf->Cell($cell_prefijonota['width'], 0, $cell_prefijonota['data'], 0, 0, $cell_prefijonota['align']);

            $this->Pdf->SetFont($cell_numeronota['font_type'], $cell_numeronota['font_style'], $cell_numeronota['font_size']);
            $this->pdf_text_color($cell_numeronota['data'], $cell_numeronota['color_r'], $cell_numeronota['color_g'], $cell_numeronota['color_b']);
            if (!empty($cell_numeronota['posx']) && !empty($cell_numeronota['posy']))
            {
                $this->Pdf->SetXY($cell_numeronota['posx'], $cell_numeronota['posy']);
            }
            elseif (!empty($cell_numeronota['posx']))
            {
                $this->Pdf->SetX($cell_numeronota['posx']);
            }
            elseif (!empty($cell_numeronota['posy']))
            {
                $this->Pdf->SetY($cell_numeronota['posy']);
            }
            $this->Pdf->Cell($cell_numeronota['width'], 0, $cell_numeronota['data'], 0, 0, $cell_numeronota['align']);

            $this->Pdf->SetFont($cell_empres['font_type'], $cell_empres['font_style'], $cell_empres['font_size']);
            $this->pdf_text_color($cell_empres['data'], $cell_empres['color_r'], $cell_empres['color_g'], $cell_empres['color_b']);
            if (!empty($cell_empres['posx']) && !empty($cell_empres['posy']))
            {
                $this->Pdf->SetXY($cell_empres['posx'], $cell_empres['posy']);
            }
            elseif (!empty($cell_empres['posx']))
            {
                $this->Pdf->SetX($cell_empres['posx']);
            }
            elseif (!empty($cell_empres['posy']))
            {
                $this->Pdf->SetY($cell_empres['posy']);
            }
            $this->Pdf->Cell($cell_empres['width'], 0, $cell_empres['data'], 0, 0, $cell_empres['align']);

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

            $this->Pdf->SetFont($cell_et_fecha['font_type'], $cell_et_fecha['font_style'], $cell_et_fecha['font_size']);
            $this->pdf_text_color($cell_et_fecha['data'], $cell_et_fecha['color_r'], $cell_et_fecha['color_g'], $cell_et_fecha['color_b']);
            if (!empty($cell_et_fecha['posx']) && !empty($cell_et_fecha['posy']))
            {
                $this->Pdf->SetXY($cell_et_fecha['posx'], $cell_et_fecha['posy']);
            }
            elseif (!empty($cell_et_fecha['posx']))
            {
                $this->Pdf->SetX($cell_et_fecha['posx']);
            }
            elseif (!empty($cell_et_fecha['posy']))
            {
                $this->Pdf->SetY($cell_et_fecha['posy']);
            }
            $this->Pdf->Cell($cell_et_fecha['width'], 0, $cell_et_fecha['data'], 0, 0, $cell_et_fecha['align']);

            $this->Pdf->SetFont($cell_linea['font_type'], $cell_linea['font_style'], $cell_linea['font_size']);
            $this->pdf_text_color($cell_linea['data'], $cell_linea['color_r'], $cell_linea['color_g'], $cell_linea['color_b']);
            if (!empty($cell_linea['posx']) && !empty($cell_linea['posy']))
            {
                $this->Pdf->SetXY($cell_linea['posx'], $cell_linea['posy']);
            }
            elseif (!empty($cell_linea['posx']))
            {
                $this->Pdf->SetX($cell_linea['posx']);
            }
            elseif (!empty($cell_linea['posy']))
            {
                $this->Pdf->SetY($cell_linea['posy']);
            }
            $this->Pdf->Cell($cell_linea['width'], 0, $cell_linea['data'], 0, 0, $cell_linea['align']);

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

            $this->Pdf->SetFont($cell_concepto['font_type'], $cell_concepto['font_style'], $cell_concepto['font_size']);
            $this->pdf_text_color($cell_concepto['data'], $cell_concepto['color_r'], $cell_concepto['color_g'], $cell_concepto['color_b']);
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
            $this->Pdf->Cell($cell_concepto['width'], 0, $cell_concepto['data'], 0, 0, $cell_concepto['align']);

            $this->Pdf->SetFont($cell_observaciones['font_type'], $cell_observaciones['font_style'], $cell_observaciones['font_size']);
            $this->Pdf->SetTextColor($cell_observaciones['color_r'], $cell_observaciones['color_g'], $cell_observaciones['color_b']);
            if (!empty($cell_observaciones['posx']) && !empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetXY($cell_observaciones['posx'], $cell_observaciones['posy']);
            }
            elseif (!empty($cell_observaciones['posx']))
            {
                $this->Pdf->SetX($cell_observaciones['posx']);
            }
            elseif (!empty($cell_observaciones['posy']))
            {
                $this->Pdf->SetY($cell_observaciones['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_observaciones['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_observaciones['width'], 0, trim($Lines), 0, 0, $cell_observaciones['align']);
                $Incre = true;
            }

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

            $this->Pdf->SetFont($cell_et_origen['font_type'], $cell_et_origen['font_style'], $cell_et_origen['font_size']);
            $this->pdf_text_color($cell_et_origen['data'], $cell_et_origen['color_r'], $cell_et_origen['color_g'], $cell_et_origen['color_b']);
            if (!empty($cell_et_origen['posx']) && !empty($cell_et_origen['posy']))
            {
                $this->Pdf->SetXY($cell_et_origen['posx'], $cell_et_origen['posy']);
            }
            elseif (!empty($cell_et_origen['posx']))
            {
                $this->Pdf->SetX($cell_et_origen['posx']);
            }
            elseif (!empty($cell_et_origen['posy']))
            {
                $this->Pdf->SetY($cell_et_origen['posy']);
            }
            $this->Pdf->Cell($cell_et_origen['width'], 0, $cell_et_origen['data'], 0, 0, $cell_et_origen['align']);

            $this->Pdf->SetFont($cell_ubicacion['font_type'], $cell_ubicacion['font_style'], $cell_ubicacion['font_size']);
            $this->pdf_text_color($cell_ubicacion['data'], $cell_ubicacion['color_r'], $cell_ubicacion['color_g'], $cell_ubicacion['color_b']);
            if (!empty($cell_ubicacion['posx']) && !empty($cell_ubicacion['posy']))
            {
                $this->Pdf->SetXY($cell_ubicacion['posx'], $cell_ubicacion['posy']);
            }
            elseif (!empty($cell_ubicacion['posx']))
            {
                $this->Pdf->SetX($cell_ubicacion['posx']);
            }
            elseif (!empty($cell_ubicacion['posy']))
            {
                $this->Pdf->SetY($cell_ubicacion['posy']);
            }
            $this->Pdf->Cell($cell_ubicacion['width'], 0, $cell_ubicacion['data'], 0, 0, $cell_ubicacion['align']);

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

            $this->Pdf->SetFont($cell_Observ['font_type'], $cell_Observ['font_style'], $cell_Observ['font_size']);
            $this->pdf_text_color($cell_Observ['data'], $cell_Observ['color_r'], $cell_Observ['color_g'], $cell_Observ['color_b']);
            if (!empty($cell_Observ['posx']) && !empty($cell_Observ['posy']))
            {
                $this->Pdf->SetXY($cell_Observ['posx'], $cell_Observ['posy']);
            }
            elseif (!empty($cell_Observ['posx']))
            {
                $this->Pdf->SetX($cell_Observ['posx']);
            }
            elseif (!empty($cell_Observ['posy']))
            {
                $this->Pdf->SetY($cell_Observ['posy']);
            }
            $this->Pdf->Cell($cell_Observ['width'], 0, $cell_Observ['data'], 0, 0, $cell_Observ['align']);

            $this->Pdf->SetFont($cell_linea2['font_type'], $cell_linea2['font_style'], $cell_linea2['font_size']);
            $this->pdf_text_color($cell_linea2['data'], $cell_linea2['color_r'], $cell_linea2['color_g'], $cell_linea2['color_b']);
            if (!empty($cell_linea2['posx']) && !empty($cell_linea2['posy']))
            {
                $this->Pdf->SetXY($cell_linea2['posx'], $cell_linea2['posy']);
            }
            elseif (!empty($cell_linea2['posx']))
            {
                $this->Pdf->SetX($cell_linea2['posx']);
            }
            elseif (!empty($cell_linea2['posy']))
            {
                $this->Pdf->SetY($cell_linea2['posy']);
            }
            $this->Pdf->Cell($cell_linea2['width'], 0, $cell_linea2['data'], 0, 0, $cell_linea2['align']);

            $this->Pdf->SetFont($cell_titulo_detalle['font_type'], $cell_titulo_detalle['font_style'], $cell_titulo_detalle['font_size']);
            $this->pdf_text_color($cell_titulo_detalle['data'], $cell_titulo_detalle['color_r'], $cell_titulo_detalle['color_g'], $cell_titulo_detalle['color_b']);
            if (!empty($cell_titulo_detalle['posx']) && !empty($cell_titulo_detalle['posy']))
            {
                $this->Pdf->SetXY($cell_titulo_detalle['posx'], $cell_titulo_detalle['posy']);
            }
            elseif (!empty($cell_titulo_detalle['posx']))
            {
                $this->Pdf->SetX($cell_titulo_detalle['posx']);
            }
            elseif (!empty($cell_titulo_detalle['posy']))
            {
                $this->Pdf->SetY($cell_titulo_detalle['posy']);
            }
            $this->Pdf->Cell($cell_titulo_detalle['width'], 0, $cell_titulo_detalle['data'], 0, 0, $cell_titulo_detalle['align']);

            $this->Pdf->SetFont($cell_articulo['font_type'], $cell_articulo['font_style'], $cell_articulo['font_size']);
            $this->pdf_text_color($cell_articulo['data'], $cell_articulo['color_r'], $cell_articulo['color_g'], $cell_articulo['color_b']);
            if (!empty($cell_articulo['posx']) && !empty($cell_articulo['posy']))
            {
                $this->Pdf->SetXY($cell_articulo['posx'], $cell_articulo['posy']);
            }
            elseif (!empty($cell_articulo['posx']))
            {
                $this->Pdf->SetX($cell_articulo['posx']);
            }
            elseif (!empty($cell_articulo['posy']))
            {
                $this->Pdf->SetY($cell_articulo['posy']);
            }
            $this->Pdf->Cell($cell_articulo['width'], 0, $cell_articulo['data'], 0, 0, $cell_articulo['align']);

            $this->Pdf->SetFont($cell_cantidad_et['font_type'], $cell_cantidad_et['font_style'], $cell_cantidad_et['font_size']);
            $this->pdf_text_color($cell_cantidad_et['data'], $cell_cantidad_et['color_r'], $cell_cantidad_et['color_g'], $cell_cantidad_et['color_b']);
            if (!empty($cell_cantidad_et['posx']) && !empty($cell_cantidad_et['posy']))
            {
                $this->Pdf->SetXY($cell_cantidad_et['posx'], $cell_cantidad_et['posy']);
            }
            elseif (!empty($cell_cantidad_et['posx']))
            {
                $this->Pdf->SetX($cell_cantidad_et['posx']);
            }
            elseif (!empty($cell_cantidad_et['posy']))
            {
                $this->Pdf->SetY($cell_cantidad_et['posy']);
            }
            $this->Pdf->Cell($cell_cantidad_et['width'], 0, $cell_cantidad_et['data'], 0, 0, $cell_cantidad_et['align']);

            $this->Pdf->SetFont($cell_presentacion['font_type'], $cell_presentacion['font_style'], $cell_presentacion['font_size']);
            $this->pdf_text_color($cell_presentacion['data'], $cell_presentacion['color_r'], $cell_presentacion['color_g'], $cell_presentacion['color_b']);
            if (!empty($cell_presentacion['posx']) && !empty($cell_presentacion['posy']))
            {
                $this->Pdf->SetXY($cell_presentacion['posx'], $cell_presentacion['posy']);
            }
            elseif (!empty($cell_presentacion['posx']))
            {
                $this->Pdf->SetX($cell_presentacion['posx']);
            }
            elseif (!empty($cell_presentacion['posy']))
            {
                $this->Pdf->SetY($cell_presentacion['posy']);
            }
            $this->Pdf->Cell($cell_presentacion['width'], 0, $cell_presentacion['data'], 0, 0, $cell_presentacion['align']);

            $this->Pdf->SetY(87);
            foreach ($this->detalle[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detalle_p_nompro['font_type'], $cell_detalle_p_nompro['font_style'], $cell_detalle_p_nompro['font_size']);
                if (!empty($cell_detalle_p_nompro['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_p_nompro['posx']);
                }
                $this->pdf_text_color($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind], $cell_detalle_p_nompro['color_r'], $cell_detalle_p_nompro['color_g'], $cell_detalle_p_nompro['color_b']);
                $this->Pdf->Cell($cell_detalle_p_nompro['width'], 0, $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_p_nompro['align']);
                $this->Pdf->SetFont($cell_detalle_fl_cantidad['font_type'], $cell_detalle_fl_cantidad['font_style'], $cell_detalle_fl_cantidad['font_size']);
                if (!empty($cell_detalle_fl_cantidad['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_cantidad['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_cantidad['color_r'], $cell_detalle_fl_cantidad['color_g'], $cell_detalle_fl_cantidad['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_cantidad['width'], 0, $this->detalle_fl_cantidad[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_cantidad['align']);
                $this->Pdf->SetFont($cell_detalle_fl_presentacion['font_type'], $cell_detalle_fl_presentacion['font_style'], $cell_detalle_fl_presentacion['font_size']);
                if (!empty($cell_detalle_fl_presentacion['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_presentacion['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_presentacion['color_r'], $cell_detalle_fl_presentacion['color_g'], $cell_detalle_fl_presentacion['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_presentacion['width'], 0, $this->detalle_fl_presentacion[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_presentacion['align']);
                $this->Pdf->SetFont($cell_detalle_fl_colores['font_type'], $cell_detalle_fl_colores['font_style'], $cell_detalle_fl_colores['font_size']);
                if (!empty($cell_detalle_fl_colores['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_colores['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_colores['color_r'], $cell_detalle_fl_colores['color_g'], $cell_detalle_fl_colores['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_colores['width'], 0, $this->detalle_fl_colores[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_colores['align']);
                $this->Pdf->SetFont($cell_detalle_fl_tallas['font_type'], $cell_detalle_fl_tallas['font_style'], $cell_detalle_fl_tallas['font_size']);
                if (!empty($cell_detalle_fl_tallas['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_tallas['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_tallas['color_r'], $cell_detalle_fl_tallas['color_g'], $cell_detalle_fl_tallas['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_tallas['width'], 0, $this->detalle_fl_tallas[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_tallas['align']);
                $this->Pdf->SetFont($cell_detalle_fl_sabor['font_type'], $cell_detalle_fl_sabor['font_style'], $cell_detalle_fl_sabor['font_size']);
                if (!empty($cell_detalle_fl_sabor['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_fl_sabor['posx']);
                }
                $this->pdf_text_color($this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind], $cell_detalle_fl_sabor['color_r'], $cell_detalle_fl_sabor['color_g'], $cell_detalle_fl_sabor['color_b']);
                $this->Pdf->Cell($cell_detalle_fl_sabor['width'], 0, $this->detalle_fl_sabor[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_detalle_fl_sabor['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 6;
                $this->Pdf->SetY($max_Y);

            }
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
