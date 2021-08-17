<?php
class impresion_pos_pdf_grid
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
   var $impuestos = array();
   var $impuestos_tipo_iva = array();
   var $impuestos_valor_iva = array();
   var $impuestos_base = array();
   var $impuestos_total = array();
   var $detalle_p_codigobar = array();
   var $detalle_p_nompro = array();
   var $detalle_d_cantidad = array();
   var $detalle_d_valorunit = array();
   var $detalle_d_valorpar = array();
   var $detalle_linea = array();
   var $fechaven = array();
   var $total = array();
   var $documento = array();
   var $nombres = array();
   var $vendedor = array();
   var $numero = array();
   var $resoluciondian = array();
   var $rango = array();
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
   $Tp_papel = array(200, 80);
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
   $_SESSION['scriptcase']['impresion_pos_pdf']['default_font'] = $this->default_font;
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
           if (in_array("impresion_pos_pdf", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->fechaven[0] = $Busca_temp['fechaven']; 
       $tmp_pos = strpos($this->fechaven[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->fechaven[0]))
       {
           $this->fechaven[0] = substr($this->fechaven[0], 0, $tmp_pos);
       }
       $fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->total[0] = $Busca_temp['total']; 
       $tmp_pos = strpos($this->total[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->total[0]))
       {
           $this->total[0] = substr($this->total[0], 0, $tmp_pos);
       }
       $total_2 = $Busca_temp['total_input_2']; 
       $this->total_2 = $Busca_temp['total_input_2']; 
       $this->documento[0] = $Busca_temp['documento']; 
       $tmp_pos = strpos($this->documento[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->documento[0]))
       {
           $this->documento[0] = substr($this->documento[0], 0, $tmp_pos);
       }
       $this->nombres[0] = $Busca_temp['nombres']; 
       $tmp_pos = strpos($this->nombres[0], "##@@");
       if ($tmp_pos !== false && !is_array($this->nombres[0]))
       {
           $this->nombres[0] = substr($this->nombres[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fechaven_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT convert(char(23),fechaven,121), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT EXTEND(fechaven, YEAR TO DAY), total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT fechaven, total, documento, nombres, vendedor, numero, resoluciondian, rango from (select  					  f.fechaven, 					  f.total, 					  c.documento, 					  c.nombres, 					  v.documento as vendedor, 					  concat(r.prefijo,' ',f.numfacven) as numero, 					  (select if(resolucion <> 0 and resolucion <> 1,concat('RESOLUCION DIAN ',resolucion),'') from resdian where Idres=f.resolucion) resoluciondian,                                          (select if(resolucion <> 0 and resolucion <> 1,concat('RANGO ',rangofac,' FECHA ',fecha),'') from resdian where Idres=f.resolucion) rango 					  from  					  facturaven f  					  left join terceros c on f.idcli=c.idtercero 					  left join terceros v on f.vendedor=v.idtercero 					  left join resdian r on f.resolucion=r.Idres 					  where  					  f.idfacven='" . $_SESSION['gidfacven'] . "') nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['order_grid'] = $nmgp_order_by;
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
     $this->Pdf->setCellMargins($left = '', $top = 5, $right = 5, $bottom = 30);
     $this->Pdf->SetAutoPageBreak(false);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['fechaven'] = "Fechaven";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['documento'] = "Documento";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['nombres'] = "Nombres";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['vendedor'] = "Vendedor";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['numero'] = "Numero";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['resoluciondian'] = "Resoluciondian";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['rango'] = "Rango";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle'] = "detalle";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['impuestos'] = "impuestos";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['impuestos_tipo_iva'] = "Tipo Iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['impuestos_valor_iva'] = "Valor Iva";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['impuestos_base'] = "Base";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['impuestos_total'] = "Total";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_p_codigobar'] = "Codigobar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_p_nompro'] = "Nompro";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_d_cantidad'] = "Cantidad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_d_valorunit'] = "Valorunit";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_d_valorpar'] = "Valorpar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['labels']['detalle_linea'] = "Linea";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['impresion_pos_pdf']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['impresion_pos_pdf']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->fechaven[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->total[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->total[$this->nm_grid_colunas] = (strpos(strtolower($this->total[$this->nm_grid_colunas]), "e")) ? (float)$this->total[$this->nm_grid_colunas] : $this->total[$this->nm_grid_colunas]; 
          $this->total[$this->nm_grid_colunas] = (string)$this->total[$this->nm_grid_colunas];
          $this->documento[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->nombres[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->vendedor[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->numero[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->resoluciondian[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->rango[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->impuestos_tipo_iva[$this->nm_grid_colunas] = array();
          $this->impuestos_valor_iva[$this->nm_grid_colunas] = array();
          $this->impuestos_base[$this->nm_grid_colunas] = array();
          $this->impuestos_total[$this->nm_grid_colunas] = array();
          $this->detalle_p_codigobar[$this->nm_grid_colunas] = array();
          $this->detalle_p_nompro[$this->nm_grid_colunas] = array();
          $this->detalle_d_cantidad[$this->nm_grid_colunas] = array();
          $this->detalle_d_valorunit[$this->nm_grid_colunas] = array();
          $this->detalle_d_valorpar[$this->nm_grid_colunas] = array();
          $this->detalle_linea[$this->nm_grid_colunas] = array();
          $this->Lookup->lookup_detalle($this->detalle[$this->nm_grid_colunas] , $_SESSION['gidfacven'], $array_detalle); 
          $NM_ind = 0;
          $this->detalle = array();
          foreach ($array_detalle as $cada_subselect) 
          {
              $this->detalle[$this->nm_grid_colunas][$NM_ind] = "";
              $this->detalle_p_codigobar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[4];
              $this->detalle_linea[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[5];
              $NM_ind++;
          }
          $this->Lookup->lookup_impuestos($this->impuestos[$this->nm_grid_colunas] , $_SESSION['gidfacven'], $array_impuestos); 
          $NM_ind = 0;
          $this->impuestos = array();
          foreach ($array_impuestos as $cada_subselect) 
          {
              $this->impuestos[$this->nm_grid_colunas][$NM_ind] = "";
              $this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[0];
              $this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[1];
              $this->impuestos_base[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[2];
              $this->impuestos_total[$this->nm_grid_colunas][$NM_ind] = $cada_subselect[3];
              $NM_ind++;
          }
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
          $this->total[$this->nm_grid_colunas] = sc_strip_script($this->total[$this->nm_grid_colunas]);
          if ($this->total[$this->nm_grid_colunas] === "") 
          { 
              $this->total[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->total[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->total[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->total[$this->nm_grid_colunas]);
          $this->documento[$this->nm_grid_colunas] = sc_strip_script($this->documento[$this->nm_grid_colunas]);
          if ($this->documento[$this->nm_grid_colunas] === "") 
          { 
              $this->documento[$this->nm_grid_colunas] = "" ;  
          } 
          $this->documento[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->documento[$this->nm_grid_colunas]);
          $this->nombres[$this->nm_grid_colunas] = sc_strip_script($this->nombres[$this->nm_grid_colunas]);
          if ($this->nombres[$this->nm_grid_colunas] === "") 
          { 
              $this->nombres[$this->nm_grid_colunas] = "" ;  
          } 
          $this->nombres[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->nombres[$this->nm_grid_colunas]);
          $this->vendedor[$this->nm_grid_colunas] = sc_strip_script($this->vendedor[$this->nm_grid_colunas]);
          if ($this->vendedor[$this->nm_grid_colunas] === "") 
          { 
              $this->vendedor[$this->nm_grid_colunas] = "" ;  
          } 
          $this->vendedor[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->vendedor[$this->nm_grid_colunas]);
          $this->numero[$this->nm_grid_colunas] = sc_strip_script($this->numero[$this->nm_grid_colunas]);
          if ($this->numero[$this->nm_grid_colunas] === "") 
          { 
              $this->numero[$this->nm_grid_colunas] = "" ;  
          } 
          $this->numero[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->numero[$this->nm_grid_colunas]);
          $this->resoluciondian[$this->nm_grid_colunas] = sc_strip_script($this->resoluciondian[$this->nm_grid_colunas]);
          if ($this->resoluciondian[$this->nm_grid_colunas] === "") 
          { 
              $this->resoluciondian[$this->nm_grid_colunas] = "" ;  
          } 
          $this->resoluciondian[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->resoluciondian[$this->nm_grid_colunas]);
          $this->rango[$this->nm_grid_colunas] = sc_strip_script($this->rango[$this->nm_grid_colunas]);
          if ($this->rango[$this->nm_grid_colunas] === "") 
          { 
              $this->rango[$this->nm_grid_colunas] = "" ;  
          } 
          $this->rango[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->rango[$this->nm_grid_colunas]);
          foreach ($this->impuestos_tipo_iva[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->impuestos_valor_iva[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->impuestos_base[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->impuestos_base[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->impuestos_base[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->impuestos_base[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->impuestos_base[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->impuestos_base[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->impuestos_total[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->impuestos_total[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->impuestos_total[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->impuestos_total[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->impuestos_total[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->impuestos_total[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_p_codigobar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_p_codigobar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_p_codigobar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_p_codigobar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_p_codigobar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_p_nompro[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_p_nompro[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_d_cantidad[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_d_cantidad[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_d_valorunit[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_d_valorunit[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_d_valorpar[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
              $this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_d_valorpar[$this->nm_grid_colunas][$NM_ind]);
          }
          foreach ($this->detalle_linea[$this->nm_grid_colunas] as $NM_ind => $Dados) 
          {
          if ($this->detalle_linea[$this->nm_grid_colunas][$NM_ind] === "") 
          { 
              $this->detalle_linea[$this->nm_grid_colunas][$NM_ind] = "" ;  
          } 
              $this->detalle_linea[$this->nm_grid_colunas][$NM_ind] = $this->SC_conv_utf8($this->detalle_linea[$this->nm_grid_colunas][$NM_ind]);
          }
            $cell_razonsoc = array('posx' => '0', 'posy' => 10, 'data' => $this->SC_conv_utf8('' . $_SESSION['grazonsoc'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_regimen = array('posx' => '0', 'posy' => 14, 'data' => $this->SC_conv_utf8('' . $_SESSION['gregimen'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_nit = array('posx' => '0', 'posy' => 18, 'data' => $this->SC_conv_utf8('' . $_SESSION['gnit'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_direccion = array('posx' => '0', 'posy' => 22, 'data' => $this->SC_conv_utf8('' . $_SESSION['gdireccion'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_telefono = array('posx' => '0', 'posy' => 26, 'data' => $this->SC_conv_utf8('TEL.:' . $_SESSION['gtelefono'] . ''), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_numero = array('posx' => 5, 'posy' => 34, 'data' => $this->SC_conv_utf8('FACTURA DE VENTA # ' . $this->numero[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_fechaven = array('posx' => 5, 'posy' => 38, 'data' => $this->SC_conv_utf8('Fecha: ' . $this->fechaven[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_vendedor = array('posx' => 5, 'posy' => 42, 'data' => $this->SC_conv_utf8('Vendedor: ' . $this->vendedor[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_nombres = array('posx' => 5, 'posy' => 46, 'data' => $this->SC_conv_utf8('Cliente: ' . $this->nombres[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_documento = array('posx' => 5, 'posy' => 50, 'data' => $this->SC_conv_utf8('CC/NIT: ' . $this->documento[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_titulos_detalle = array('posx' => 3, 'posy' => 60, 'data' => $this->SC_conv_utf8('Cant    Descripción                      ValorU    Total'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 9, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_linea = array('posx' => 3, 'posy' => 64, 'data' => $this->SC_conv_utf8('-----------------------------------------------------------------------------'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_detalle_d_cantidad = array('posx' => 3, 'posy' => 90, 'data' => $this->detalle_linea[$this->nm_grid_colunas], 'width'      => 200, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 7, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_total = array('posx' => 3, 'posy' => 100, 'data' => $this->SC_conv_utf8('TOTAL VENTA: ' . $this->total[$this->nm_grid_colunas] . ''), 'width'      => 0, 'align'      => 'R', 'font_type'  => 'Helvetica', 'font_size'  => 10, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_titulo_impuestos = array('posx' => '0', 'posy' => 140, 'data' => $this->SC_conv_utf8('Detalle del Impuesto'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_cabecera_impuestos = array('posx' => 3, 'posy' => 144, 'data' => $this->SC_conv_utf8('Tarifa      Base         Impuesto             Total'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_linea2 = array('posx' => 3, 'posy' => 146, 'data' => $this->SC_conv_utf8('-----------------------------------------------------------------------------'), 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_impuestos_tipo_iva = array('posx' => 3, 'posy' => 150, 'data' => $this->impuestos_tipo_iva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_impuestos_base = array('posx' => 16, 'posy' => 150, 'data' => $this->impuestos_base[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_impuestos_valor_iva = array('posx' => 32, 'posy' => 150, 'data' => $this->impuestos_valor_iva[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_impuestos_total = array('posx' => 52, 'posy' => 150, 'data' => $this->impuestos_total[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'L', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_resoluciondian = array('posx' => '0', 'posy' => 160, 'data' => $this->resoluciondian[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_rango = array('posx' => '0', 'posy' => 164, 'data' => $this->rango[$this->nm_grid_colunas], 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_facilweb = array('posx' => '0', 'posy' => 169, 'data' => $this->SC_conv_utf8('-FACILWEB-'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_correo1 = array('posx' => '0', 'posy' => 172, 'data' => $this->SC_conv_utf8('easeing@outlook.com'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_correo2 = array('posx' => '0', 'posy' => 175, 'data' => $this->SC_conv_utf8('facilweb@solucionesnavarro.com'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_telefonos = array('posx' => '0', 'posy' => 178, 'data' => $this->SC_conv_utf8('Tel.: 3209481569 - 3114485310'), 'width'      => 0, 'align'      => 'C', 'font_type'  => 'Helvetica', 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => B);
            $cell_detalle_linea = array('posx' => 3, 'posy' => '0', 'data' => $this->detalle_linea[$this->nm_grid_colunas], 'width'      => 75, 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => 8, 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_razonsoc['font_type'], $cell_razonsoc['font_style'], $cell_razonsoc['font_size']);
            $this->pdf_text_color($cell_razonsoc['data'], $cell_razonsoc['color_r'], $cell_razonsoc['color_g'], $cell_razonsoc['color_b']);
            if (!empty($cell_razonsoc['posx']) && !empty($cell_razonsoc['posy']))
            {
                $this->Pdf->SetXY($cell_razonsoc['posx'], $cell_razonsoc['posy']);
            }
            elseif (!empty($cell_razonsoc['posx']))
            {
                $this->Pdf->SetX($cell_razonsoc['posx']);
            }
            elseif (!empty($cell_razonsoc['posy']))
            {
                $this->Pdf->SetY($cell_razonsoc['posy']);
            }
            $this->Pdf->Cell($cell_razonsoc['width'], 0, $cell_razonsoc['data'], 0, 0, $cell_razonsoc['align']);

            $this->Pdf->SetFont($cell_regimen['font_type'], $cell_regimen['font_style'], $cell_regimen['font_size']);
            $this->pdf_text_color($cell_regimen['data'], $cell_regimen['color_r'], $cell_regimen['color_g'], $cell_regimen['color_b']);
            if (!empty($cell_regimen['posx']) && !empty($cell_regimen['posy']))
            {
                $this->Pdf->SetXY($cell_regimen['posx'], $cell_regimen['posy']);
            }
            elseif (!empty($cell_regimen['posx']))
            {
                $this->Pdf->SetX($cell_regimen['posx']);
            }
            elseif (!empty($cell_regimen['posy']))
            {
                $this->Pdf->SetY($cell_regimen['posy']);
            }
            $this->Pdf->Cell($cell_regimen['width'], 0, $cell_regimen['data'], 0, 0, $cell_regimen['align']);

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

            $this->Pdf->SetFont($cell_vendedor['font_type'], $cell_vendedor['font_style'], $cell_vendedor['font_size']);
            $this->pdf_text_color($cell_vendedor['data'], $cell_vendedor['color_r'], $cell_vendedor['color_g'], $cell_vendedor['color_b']);
            if (!empty($cell_vendedor['posx']) && !empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetXY($cell_vendedor['posx'], $cell_vendedor['posy']);
            }
            elseif (!empty($cell_vendedor['posx']))
            {
                $this->Pdf->SetX($cell_vendedor['posx']);
            }
            elseif (!empty($cell_vendedor['posy']))
            {
                $this->Pdf->SetY($cell_vendedor['posy']);
            }
            $this->Pdf->Cell($cell_vendedor['width'], 0, $cell_vendedor['data'], 0, 0, $cell_vendedor['align']);

            $this->Pdf->SetFont($cell_nombres['font_type'], $cell_nombres['font_style'], $cell_nombres['font_size']);
            $this->pdf_text_color($cell_nombres['data'], $cell_nombres['color_r'], $cell_nombres['color_g'], $cell_nombres['color_b']);
            if (!empty($cell_nombres['posx']) && !empty($cell_nombres['posy']))
            {
                $this->Pdf->SetXY($cell_nombres['posx'], $cell_nombres['posy']);
            }
            elseif (!empty($cell_nombres['posx']))
            {
                $this->Pdf->SetX($cell_nombres['posx']);
            }
            elseif (!empty($cell_nombres['posy']))
            {
                $this->Pdf->SetY($cell_nombres['posy']);
            }
            $this->Pdf->Cell($cell_nombres['width'], 0, $cell_nombres['data'], 0, 0, $cell_nombres['align']);

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

            $this->Pdf->SetFont($cell_titulos_detalle['font_type'], $cell_titulos_detalle['font_style'], $cell_titulos_detalle['font_size']);
            $this->pdf_text_color($cell_titulos_detalle['data'], $cell_titulos_detalle['color_r'], $cell_titulos_detalle['color_g'], $cell_titulos_detalle['color_b']);
            if (!empty($cell_titulos_detalle['posx']) && !empty($cell_titulos_detalle['posy']))
            {
                $this->Pdf->SetXY($cell_titulos_detalle['posx'], $cell_titulos_detalle['posy']);
            }
            elseif (!empty($cell_titulos_detalle['posx']))
            {
                $this->Pdf->SetX($cell_titulos_detalle['posx']);
            }
            elseif (!empty($cell_titulos_detalle['posy']))
            {
                $this->Pdf->SetY($cell_titulos_detalle['posy']);
            }
            $this->Pdf->Cell($cell_titulos_detalle['width'], 0, $cell_titulos_detalle['data'], 0, 0, $cell_titulos_detalle['align']);

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

			
			$this->Pdf->SetY(67);
			foreach ($this->detalle[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_detalle_linea['font_type'], $cell_detalle_linea['font_style'], $cell_detalle_linea['font_size']);
                if (!empty($cell_detalle_linea['posx']))
                {
                    $this->Pdf->SetX($cell_detalle_linea['posx']);
                }
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->SetTextColor($cell_detalle_linea['color_r'], $cell_detalle_linea['color_g'], $cell_detalle_linea['color_b']);
                $this->Pdf->writeHTMLCell($cell_detalle_linea['width'], 0, $atu_X, $atu_Y, $this->detalle_linea[$this->nm_grid_colunas][$NM_ind], 0, 0, false, true, $cell_detalle_linea['align']);
                $this->Pdf->SetY($atu_Y);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 3.5;
                $this->Pdf->SetY($max_Y);

				
			}

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

            $this->Pdf->SetFont($cell_titulo_impuestos['font_type'], $cell_titulo_impuestos['font_style'], $cell_titulo_impuestos['font_size']);
            $this->pdf_text_color($cell_titulo_impuestos['data'], $cell_titulo_impuestos['color_r'], $cell_titulo_impuestos['color_g'], $cell_titulo_impuestos['color_b']);
            if (!empty($cell_titulo_impuestos['posx']) && !empty($cell_titulo_impuestos['posy']))
            {
                $this->Pdf->SetXY($cell_titulo_impuestos['posx'], $cell_titulo_impuestos['posy']);
            }
            elseif (!empty($cell_titulo_impuestos['posx']))
            {
                $this->Pdf->SetX($cell_titulo_impuestos['posx']);
            }
            elseif (!empty($cell_titulo_impuestos['posy']))
            {
                $this->Pdf->SetY($cell_titulo_impuestos['posy']);
            }
            $this->Pdf->Cell($cell_titulo_impuestos['width'], 0, $cell_titulo_impuestos['data'], 0, 0, $cell_titulo_impuestos['align']);

            $this->Pdf->SetFont($cell_cabecera_impuestos['font_type'], $cell_cabecera_impuestos['font_style'], $cell_cabecera_impuestos['font_size']);
            $this->pdf_text_color($cell_cabecera_impuestos['data'], $cell_cabecera_impuestos['color_r'], $cell_cabecera_impuestos['color_g'], $cell_cabecera_impuestos['color_b']);
            if (!empty($cell_cabecera_impuestos['posx']) && !empty($cell_cabecera_impuestos['posy']))
            {
                $this->Pdf->SetXY($cell_cabecera_impuestos['posx'], $cell_cabecera_impuestos['posy']);
            }
            elseif (!empty($cell_cabecera_impuestos['posx']))
            {
                $this->Pdf->SetX($cell_cabecera_impuestos['posx']);
            }
            elseif (!empty($cell_cabecera_impuestos['posy']))
            {
                $this->Pdf->SetY($cell_cabecera_impuestos['posy']);
            }
            $this->Pdf->Cell($cell_cabecera_impuestos['width'], 0, $cell_cabecera_impuestos['data'], 0, 0, $cell_cabecera_impuestos['align']);

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

			
			$vyimpuesto = 100;
			$this->Pdf->SetY($vyimpuesto);

			foreach ($this->impuestos[$this->nm_grid_colunas] as $NM_ind => $Dados)
            {
                $this->Pdf->SetFont($cell_impuestos_tipo_iva['font_type'], $cell_impuestos_tipo_iva['font_style'], $cell_impuestos_tipo_iva['font_size']);
                if (!empty($cell_impuestos_tipo_iva['posx']))
                {
                    $this->Pdf->SetX($cell_impuestos_tipo_iva['posx']);
                }
                $this->pdf_text_color($this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind], $cell_impuestos_tipo_iva['color_r'], $cell_impuestos_tipo_iva['color_g'], $cell_impuestos_tipo_iva['color_b']);
                $this->Pdf->Cell($cell_impuestos_tipo_iva['width'], 0, $this->impuestos_tipo_iva[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_impuestos_tipo_iva['align']);
                $this->Pdf->SetFont($cell_impuestos_valor_iva['font_type'], $cell_impuestos_valor_iva['font_style'], $cell_impuestos_valor_iva['font_size']);
                if (!empty($cell_impuestos_valor_iva['posx']))
                {
                    $this->Pdf->SetX($cell_impuestos_valor_iva['posx']);
                }
                $this->pdf_text_color($this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind], $cell_impuestos_valor_iva['color_r'], $cell_impuestos_valor_iva['color_g'], $cell_impuestos_valor_iva['color_b']);
                $this->Pdf->Cell($cell_impuestos_valor_iva['width'], 0, $this->impuestos_valor_iva[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_impuestos_valor_iva['align']);
                $this->Pdf->SetFont($cell_impuestos_base['font_type'], $cell_impuestos_base['font_style'], $cell_impuestos_base['font_size']);
                if (!empty($cell_impuestos_base['posx']))
                {
                    $this->Pdf->SetX($cell_impuestos_base['posx']);
                }
                $this->pdf_text_color($this->impuestos_base[$this->nm_grid_colunas][$NM_ind], $cell_impuestos_base['color_r'], $cell_impuestos_base['color_g'], $cell_impuestos_base['color_b']);
                $this->Pdf->Cell($cell_impuestos_base['width'], 0, $this->impuestos_base[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_impuestos_base['align']);
                $this->Pdf->SetFont($cell_impuestos_total['font_type'], $cell_impuestos_total['font_style'], $cell_impuestos_total['font_size']);
                if (!empty($cell_impuestos_total['posx']))
                {
                    $this->Pdf->SetX($cell_impuestos_total['posx']);
                }
                $this->pdf_text_color($this->impuestos_total[$this->nm_grid_colunas][$NM_ind], $cell_impuestos_total['color_r'], $cell_impuestos_total['color_g'], $cell_impuestos_total['color_b']);
                $this->Pdf->Cell($cell_impuestos_total['width'], 0, $this->impuestos_total[$this->nm_grid_colunas][$NM_ind], 0, 0, $cell_impuestos_total['align']);
                if (!isset($max_Y) || empty($max_Y) || $this->Pdf->GetY() < $max_Y )
                {
                    $max_Y = $this->Pdf->GetY();
                }
                $max_Y += 3.5;
                $this->Pdf->SetY($max_Y);

				
			}

            $this->Pdf->SetFont($cell_resoluciondian['font_type'], $cell_resoluciondian['font_style'], $cell_resoluciondian['font_size']);
            $this->pdf_text_color($cell_resoluciondian['data'], $cell_resoluciondian['color_r'], $cell_resoluciondian['color_g'], $cell_resoluciondian['color_b']);
            if (!empty($cell_resoluciondian['posx']) && !empty($cell_resoluciondian['posy']))
            {
                $this->Pdf->SetXY($cell_resoluciondian['posx'], $cell_resoluciondian['posy']);
            }
            elseif (!empty($cell_resoluciondian['posx']))
            {
                $this->Pdf->SetX($cell_resoluciondian['posx']);
            }
            elseif (!empty($cell_resoluciondian['posy']))
            {
                $this->Pdf->SetY($cell_resoluciondian['posy']);
            }
            $this->Pdf->Cell($cell_resoluciondian['width'], 0, $cell_resoluciondian['data'], 0, 0, $cell_resoluciondian['align']);

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

            $this->Pdf->SetFont($cell_facilweb['font_type'], $cell_facilweb['font_style'], $cell_facilweb['font_size']);
            $this->pdf_text_color($cell_facilweb['data'], $cell_facilweb['color_r'], $cell_facilweb['color_g'], $cell_facilweb['color_b']);
            if (!empty($cell_facilweb['posx']) && !empty($cell_facilweb['posy']))
            {
                $this->Pdf->SetXY($cell_facilweb['posx'], $cell_facilweb['posy']);
            }
            elseif (!empty($cell_facilweb['posx']))
            {
                $this->Pdf->SetX($cell_facilweb['posx']);
            }
            elseif (!empty($cell_facilweb['posy']))
            {
                $this->Pdf->SetY($cell_facilweb['posy']);
            }
            $this->Pdf->Cell($cell_facilweb['width'], 0, $cell_facilweb['data'], 0, 0, $cell_facilweb['align']);

            $this->Pdf->SetFont($cell_correo1['font_type'], $cell_correo1['font_style'], $cell_correo1['font_size']);
            $this->pdf_text_color($cell_correo1['data'], $cell_correo1['color_r'], $cell_correo1['color_g'], $cell_correo1['color_b']);
            if (!empty($cell_correo1['posx']) && !empty($cell_correo1['posy']))
            {
                $this->Pdf->SetXY($cell_correo1['posx'], $cell_correo1['posy']);
            }
            elseif (!empty($cell_correo1['posx']))
            {
                $this->Pdf->SetX($cell_correo1['posx']);
            }
            elseif (!empty($cell_correo1['posy']))
            {
                $this->Pdf->SetY($cell_correo1['posy']);
            }
            $this->Pdf->Cell($cell_correo1['width'], 0, $cell_correo1['data'], 0, 0, $cell_correo1['align']);

            $this->Pdf->SetFont($cell_correo2['font_type'], $cell_correo2['font_style'], $cell_correo2['font_size']);
            $this->pdf_text_color($cell_correo2['data'], $cell_correo2['color_r'], $cell_correo2['color_g'], $cell_correo2['color_b']);
            if (!empty($cell_correo2['posx']) && !empty($cell_correo2['posy']))
            {
                $this->Pdf->SetXY($cell_correo2['posx'], $cell_correo2['posy']);
            }
            elseif (!empty($cell_correo2['posx']))
            {
                $this->Pdf->SetX($cell_correo2['posx']);
            }
            elseif (!empty($cell_correo2['posy']))
            {
                $this->Pdf->SetY($cell_correo2['posy']);
            }
            $this->Pdf->Cell($cell_correo2['width'], 0, $cell_correo2['data'], 0, 0, $cell_correo2['align']);

            $this->Pdf->SetFont($cell_telefonos['font_type'], $cell_telefonos['font_style'], $cell_telefonos['font_size']);
            $this->pdf_text_color($cell_telefonos['data'], $cell_telefonos['color_r'], $cell_telefonos['color_g'], $cell_telefonos['color_b']);
            if (!empty($cell_telefonos['posx']) && !empty($cell_telefonos['posy']))
            {
                $this->Pdf->SetXY($cell_telefonos['posx'], $cell_telefonos['posy']);
            }
            elseif (!empty($cell_telefonos['posx']))
            {
                $this->Pdf->SetX($cell_telefonos['posx']);
            }
            elseif (!empty($cell_telefonos['posy']))
            {
                $this->Pdf->SetY($cell_telefonos['posy']);
            }
            $this->Pdf->Cell($cell_telefonos['width'], 0, $cell_telefonos['data'], 0, 0, $cell_telefonos['align']);

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
