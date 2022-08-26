<?php
class grid_reporte_caja_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $nm_grid_slides_linha;
   var $Nm_bloco_aberto;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $NM_cmp_hidden   = array();
   var $nmgp_botoes     = array();
   var $nm_btn_exist    = array();
   var $nm_btn_label    = array(); 
   var $nm_btn_disabled = array();
   var $Cmps_ord_def    = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $nom_docu;
   var $nom_empresa;
   var $direccion;
   var $correo;
   var $telefono;
   var $et1;
   var $et2;
   var $documento;
   var $et3;
   var $rango;
   var $et4;
   var $cant_fact;
   var $et5;
   var $total;
   var $et6;
   var $et7;
   var $et8;
   var $et9;
   var $can_efec;
   var $med_efec;
   var $porc_efec;
   var $tot_efec;
   var $c_tarj;
   var $med_tarj;
   var $porc_tarj;
   var $tarjeta;
   var $c_cheq;
   var $med_cheq;
   var $porc_cheq;
   var $cheque;
   var $c_tra;
   var $med_tran;
   var $porc_tran;
   var $trans;
   var $c_credito;
   var $med_cred;
   var $porc_credito;
   var $credito;
   var $et10;
   var $total_vtas;
   var $et_iva;
   var $et_base;
   var $et_val_iva;
   var $etiva_19;
   var $base19;
   var $iva_19;
   var $etiva_5;
   var $base5;
   var $iva_5;
   var $etexc_0;
   var $base0;
   var $iva_0;
   var $et_tot;
   var $tot_base;
   var $tot_iva;
   var $et20;
   var $et_vac;
   var $et_imb;
   var $imp_bol;
   var $et_ic;
   var $imp_consumo;
   var $et_ic_dev;
   var $imp_consumo_dev;
   var $et_tot_inc;
   var $tot_inc;
   var $et_vn;
   var $venta_netas;
   var $et_reg;
   var $vent_reg;
   var $fac_anuladas;
   var $f_anul;
   var $et_obs;
   var $obs;
   var $et_fech_imp;
   var $fecha_imp;
   var $et_ubic;
   var $ubicacion;
   var $et_equipo;
   var $nom_equipo;
   var $et_serial;
   var $serial;
   var $et_fin2;
   var $prefijo;
   var $banco;
   var $correo_receptor;
   var $asunto;
   var $mensaje;
   var $fecha;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid();
       $this->nm_fim_grid();
   } 
   else 
   { 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=1>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_reporte_caja'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['save_grid']);
       $this->grid();
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       if (strpos(" " . $this->Ini->SC_module_export, "resume") !== false)
       { 
           $Gera_res = true;
       } 
       else 
       { 
           $Gera_res = false;
       } 
       if (strpos(" " . $this->Ini->SC_module_export, "chart") !== false)
       { 
           $Gera_graf = true;
       } 
       else 
       { 
           $Gera_graf = false;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] != "sc_free_total")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       $flag_apaga_pdf_log = TRUE;
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $nm_tem_quebra,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   $this->width_tabula_quebra  = "0px";
   $this->width_tabula_display = "none";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['mostra_edit'] = "N";
   }
   $nm_tem_quebra = 0;
   $this->Nm_bloco_aberto = false;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_reporte_caja", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "off";
   $this->nmgp_botoes['back'] = "off";
   $this->nmgp_botoes['forward'] = "off";
   $this->nmgp_botoes['last'] = "off";
   $this->nmgp_botoes['filter'] = "on";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['xls'] = "on";
   $this->nmgp_botoes['xml'] = "on";
   $this->nmgp_botoes['json'] = "on";
   $this->nmgp_botoes['csv'] = "on";
   $this->nmgp_botoes['rtf'] = "on";
   $this->nmgp_botoes['word'] = "on";
   $this->nmgp_botoes['doc'] = "on";
   $this->nmgp_botoes['export'] = "on";
   $this->nmgp_botoes['print'] = "on";
   $this->nmgp_botoes['html'] = "on";
   $this->Cmps_ord_def['fecha'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_resumo'])) 
   { 
       $this->Proc_link_res            = true;
       $this->nmgp_botoes['filter']    = 'off';
       $this->nmgp_botoes['groupby']   = 'off';
       $this->nmgp_botoes['dynsearch'] = 'off';
       $this->nmgp_botoes['qsearch']   = 'off';
       $this->nmgp_botoes['gridsave']  = 'off';
       $this->nmgp_botoes['exit']      = 'off';
   } 
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->fecha = $Busca_temp['fecha']; 
       $tmp_pos = strpos($this->fecha, "##@@");
       if ($tmp_pos !== false && !is_array($this->fecha))
       {
           $this->fecha = substr($this->fecha, 0, $tmp_pos);
       }
       $this->banco = $Busca_temp['banco']; 
       $tmp_pos = strpos($this->banco, "##@@");
       if ($tmp_pos !== false && !is_array($this->banco))
       {
           $this->banco = substr($this->banco, 0, $tmp_pos);
       }
       $this->prefijo = $Busca_temp['prefijo']; 
       $tmp_pos = strpos($this->prefijo, "##@@");
       if ($tmp_pos !== false && !is_array($this->prefijo))
       {
           $this->prefijo = substr($this->prefijo, 0, $tmp_pos);
       }
       $this->correo_receptor = $Busca_temp['correo_receptor']; 
       $tmp_pos = strpos($this->correo_receptor, "##@@");
       if ($tmp_pos !== false && !is_array($this->correo_receptor))
       {
           $this->correo_receptor = substr($this->correo_receptor, 0, $tmp_pos);
       }
       $this->asunto = $Busca_temp['asunto']; 
       $tmp_pos = strpos($this->asunto, "##@@");
       if ($tmp_pos !== false && !is_array($this->asunto))
       {
           $this->asunto = substr($this->asunto, 0, $tmp_pos);
       }
       $this->mensaje = $Busca_temp['mensaje']; 
       $tmp_pos = strpos($this->mensaje, "##@@");
       if ($tmp_pos !== false && !is_array($this->mensaje))
       {
           $this->mensaje = substr($this->mensaje, 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "muda_qt_linhas";
   } 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_reporte_caja'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_reporte_caja'];

           $this->nmgp_botoes['first']     = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['back']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['last']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['forward']   = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['summary']   = $tmpDashboardButtons['grid_summary']   ? 'on' : 'off';
           $this->nmgp_botoes['qsearch']   = $tmpDashboardButtons['grid_qsearch']   ? 'on' : 'off';
           $this->nmgp_botoes['dynsearch'] = $tmpDashboardButtons['grid_dynsearch'] ? 'on' : 'off';
           $this->nmgp_botoes['filter']    = $tmpDashboardButtons['grid_filter']    ? 'on' : 'off';
           $this->nmgp_botoes['sel_col']   = $tmpDashboardButtons['grid_sel_col']   ? 'on' : 'off';
           $this->nmgp_botoes['sort_col']  = $tmpDashboardButtons['grid_sort_col']  ? 'on' : 'off';
           $this->nmgp_botoes['goto']      = $tmpDashboardButtons['grid_goto']      ? 'on' : 'off';
           $this->nmgp_botoes['qtline']    = $tmpDashboardButtons['grid_lineqty']   ? 'on' : 'off';
           $this->nmgp_botoes['navpage']   = $tmpDashboardButtons['grid_navpage']   ? 'on' : 'off';
           $this->nmgp_botoes['pdf']       = $tmpDashboardButtons['grid_pdf']       ? 'on' : 'off';
           $this->nmgp_botoes['xls']       = $tmpDashboardButtons['grid_xls']       ? 'on' : 'off';
           $this->nmgp_botoes['xml']       = $tmpDashboardButtons['grid_xml']       ? 'on' : 'off';
           $this->nmgp_botoes['json']      = $tmpDashboardButtons['grid_json']      ? 'on' : 'off';
           $this->nmgp_botoes['csv']       = $tmpDashboardButtons['grid_csv']       ? 'on' : 'off';
           $this->nmgp_botoes['rtf']       = $tmpDashboardButtons['grid_rtf']       ? 'on' : 'off';
           $this->nmgp_botoes['word']      = $tmpDashboardButtons['grid_word']      ? 'on' : 'off';
           $this->nmgp_botoes['doc']       = $tmpDashboardButtons['grid_doc']       ? 'on' : 'off';
           $this->nmgp_botoes['print']     = $tmpDashboardButtons['grid_print']     ? 'on' : 'off';
           $this->nmgp_botoes['new']       = $tmpDashboardButtons['grid_new']       ? 'on' : 'off';
           $this->nmgp_botoes['img']       = $tmpDashboardButtons['img']            ? 'on' : 'off';
           $this->nmgp_botoes['html']      = $tmpDashboardButtons['html']           ? 'on' : 'off';
           $this->nmgp_botoes['reload']    = $tmpDashboardButtons['grid_reload']    ? 'on' : 'off';
       }
   }

   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_reporte_caja/grid_reporte_caja_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_reporte_caja_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['scriptcase']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['scriptcase']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_reporte_caja_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid'] = 10;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid'] = 1 ;  
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
       if (!empty($nmgp_quant_colunas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid'] = $nmgp_quant_colunas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_lin_grid'] * $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid']; 
   $this->nm_grid_slides_linha = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_col_grid'];
   $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin * $this->nm_grid_slides_linha; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'];
   $this->Tot->$Gb_geral();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['tot_geral'][1];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
    if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT convert(char(23),fecha,121) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT EXTEND(fecha, YEAR TO DAY) from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT fecha from (SELECT      fecha,     cantidad FROM      caja WHERE  documento>0 and resolucion >0 and banco = " . $_SESSION['elbanco'] . " and fecha='" . $_SESSION['lafecha'] . "' order by fecha desc limit 1) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->fecha = $this->rs_grid->fields[0] ;  
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->fecha = $this->rs_grid->fields[0] ;  
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_caja']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_reporte_caja']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Reporte POS Fiscal :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['scriptcase']['proc_mobile'])
           {
?>
                    <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no">
                    <meta name="mobile-web-app-capable" content="yes">
                    <meta name="apple-mobile-web-app-capable" content="yes">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <link rel="apple-touch-icon"   sizes="57x57" href="">
                    <link rel="apple-touch-icon"   sizes="60x60" href="">
                    <link rel="apple-touch-icon"   sizes="72x72" href="">
                    <link rel="apple-touch-icon"   sizes="76x76" href="">
                    <link rel="apple-touch-icon" sizes="114x114" href="">
                    <link rel="apple-touch-icon" sizes="120x120" href="">
                    <link rel="apple-touch-icon" sizes="144x144" href="">
                    <link rel="apple-touch-icon" sizes="152x152" href="">
                    <link rel="apple-touch-icon" sizes="180x180" href="">
                    <link rel="icon" type="image/png" sizes="192x192" href="">
                    <link rel="icon" type="image/png"   sizes="32x32" href="">
                    <link rel="icon" type="image/png"   sizes="96x96" href="">
                    <link rel="icon" type="image/png"   sizes="16x16" href="">
                    <meta name="msapplication-TileColor" content="#3C4858">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#3C4858">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#3C4858">
                    <link rel="shortcut icon" href=""><?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php 
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
 ?> 
 <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
 <?php 
 } 
 ?> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               grid_reporte_caja_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_reporte_caja_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_reporte_caja_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_reporte_caja_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_reporte_caja_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Reporte POS Fiscal</TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
$nm_saida->saida("                        <meta name=\"viewport\" content=\"minimal-ui, width=300, initial-scale=1, maximum-scale=1, user-scalable=no\">\r\n");
$nm_saida->saida("                        <meta name=\"mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-capable\" content=\"yes\">\r\n");
$nm_saida->saida("                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\"  href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"96x96\" href=\"\">\r\n");
$nm_saida->saida("                        <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#3C4858\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#3C4858\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#3C4858\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/grp__NM__ico__NM__favicon.ico\">\r\n");
       $css_body = "margin-top:30px;margin-bottom:30px;";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && !$this->Ini->sc_export_ajax)
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $confirmButtonClass = '';
           $cancelButtonClass  = '';
           $confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
           $cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
           $confirmButtonFA    = '';
           $cancelButtonFA     = '';
           $confirmButtonFAPos = '';
           $cancelButtonFAPos  = '';
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
               $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
               $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
               $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
               $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
               $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
               $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
           }
           if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
               $confirmButtonFAPos = 'text_right';
           }
           if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
               $cancelButtonFAPos = 'text_right';
           }
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButton = \"" . $confirmButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButton = \"" . $cancelButtonClass . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonText = \"" . $confirmButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonText = \"" . $cancelButtonText . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFA = \"" . $confirmButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFA = \"" . $cancelButtonFA . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertConfirmButtonFAPos = \"" . $confirmButtonFAPos . "\";\r\n");
           $nm_saida->saida("     var scSweetAlertCancelButtonFAPos = \"" . $cancelButtonFAPos . "\";\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_reporte_caja_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_reporte_caja_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_reporte_caja_message.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_sweetalert.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/sweetalert2.all.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/sweetalert/polyfill.min.js\"></script>\r\n");
           $nm_saida->saida("<script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/viewerjs/viewer.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("      if (!window.Promise)\r\n");
           $nm_saida->saida("      {\r\n");
           $nm_saida->saida("          var head = document.getElementsByTagName('head')[0];\r\n");
           $nm_saida->saida("          var js = document.createElement(\"script\");\r\n");
           $nm_saida->saida("          js.src = \"../_lib/lib/js/bluebird.min.js\";\r\n");
           $nm_saida->saida("          head.appendChild(js);\r\n");
           $nm_saida->saida("      }\r\n");
           $nm_saida->saida("      $(\"#TB_iframeContent\").ready(function(){\r\n");
           $nm_saida->saida("         jQuery(document).bind('keydown.thickbox', function(e) {\r\n");
           $nm_saida->saida("            var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("            if (keyPressed == 27) { \r\n");
           $nm_saida->saida("                tb_remove();\r\n");
           $nm_saida->saida("            }\r\n");
           $nm_saida->saida("         })\r\n");
           $nm_saida->saida("      })\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/font-awesome/css/all.min.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/bluebird.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
           { 
               $nm_saida->saida("   function sc_session_redir(url_redir)\r\n");
               $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       if (typeof(sc_session_redir_mobile) === typeof(function(){})) { sc_session_redir_mobile(url_redir); }\r\n");
               $nm_saida->saida("       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           window.parent.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("       else\r\n");
               $nm_saida->saida("       {\r\n");
               $nm_saida->saida("           if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.close();\r\n");
               $nm_saida->saida("               window.opener.sc_session_redir(url_redir);\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("           else\r\n");
               $nm_saida->saida("           {\r\n");
               $nm_saida->saida("               window.location = url_redir;\r\n");
               $nm_saida->saida("           }\r\n");
               $nm_saida->saida("       }\r\n");
               $nm_saida->saida("   }\r\n");
           }
           $nm_saida->saida("   var scBtnGrpStatus = {};\r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid']) . ";\r\n");
           }
           $gridWidthCorrection = '';
           if (false !== strpos($this->Ini->grid_table_width, 'calc')) {
               $gridWidthCalc = substr($this->Ini->grid_table_width, strpos($this->Ini->grid_table_width, '(') + 1);
               $gridWidthCalc = substr($gridWidthCalc, 0, strpos($gridWidthCalc, ')'));
               $gridWidthParts = explode(' ', $gridWidthCalc);
               if (3 == count($gridWidthParts) && 'px' == substr($gridWidthParts[2], -2)) {
                   $gridWidthParts[2] = substr($gridWidthParts[2], 0, -2) / 2;
                   $gridWidthCorrection = $gridWidthParts[1] . ' ' . $gridWidthParts[2];
               }
           }
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   return;\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersPosition(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   if(gridHeaders)\r\n");
           $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       headerPlaceholder.css({\"top\": 0" . $gridWidthCorrection . ", \"left\": (Math.floor(gridHeaders.offset().left) - $(document).scrollLeft()" . $gridWidthCorrection . ") + \"px\"});\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scIsHeaderVisible(gridHeaders) {\r\n");
           $nm_saida->saida("   if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(gridHeaders); }\r\n");
           $nm_saida->saida("   return gridHeaders.offset().top > $(document).scrollTop();\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scGetHeaderRow() {\r\n");
           $nm_saida->saida("   var gridHeaders = $(\".sc-ui-grid-header-row-grid_reporte_caja-1\"), headerDisplayed = true;\r\n");
           $nm_saida->saida("   if (!gridHeaders.length) {\r\n");
           $nm_saida->saida("    headerDisplayed = false;\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    if (!gridHeaders.filter(\":visible\").length) {\r\n");
           $nm_saida->saida("     headerDisplayed = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   if (!headerDisplayed) {\r\n");
           $nm_saida->saida("    gridHeaders = $(\".sc-ui-grid-header-row\").filter(\":visible\");\r\n");
           $nm_saida->saida("    if (gridHeaders.length) {\r\n");
           $nm_saida->saida("     gridHeaders = $(gridHeaders[0]);\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     gridHeaders = false;\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   return gridHeaders;\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersContents(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   var i, htmlContent;\r\n");
           $nm_saida->saida("   htmlContent = \"<table id=\\\"sc-id-fixed-headers\\\" class=\\\"scGridTabela\\\">\";\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    htmlContent += \"<tr class=\\\"scGridLabel\\\" id=\\\"sc-id-fixed-headers-row-\" + i + \"\\\">\" + $(gridHeaders[i]).html() + \"</tr>\";\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   htmlContent += \"</table>\";\r\n");
           $nm_saida->saida("   headerPlaceholder.html(htmlContent);\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersSize(gridHeaders) {\r\n");
           $nm_saida->saida("   var i, j, headerColumns, gridColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;\r\n");
           $nm_saida->saida("   tableOriginal = document.getElementById(\"sc-ui-grid-body-270f0fe1\");\r\n");
           $nm_saida->saida("   tableHeaders = document.getElementById(\"sc-id-fixed-headers\");\r\n");
           $nm_saida->saida("    tableWidth = $(tableOriginal).outerWidth();\r\n");
           $nm_saida->saida("   $(tableHeaders).css(\"width\", tableWidth);\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    headerColumns = $(\"#sc-id-fixed-headers-row-\" + i).find(\"td\");\r\n");
           $nm_saida->saida("    gridColumns = $(gridHeaders[i]).find(\"td\");\r\n");
           $nm_saida->saida("    for (j = 0; j < gridColumns.length; j++) {\r\n");
           $nm_saida->saida("     if (window.getComputedStyle(gridColumns[j])) {\r\n");
           $nm_saida->saida("      cellWidth = window.getComputedStyle(gridColumns[j]).width;\r\n");
           $nm_saida->saida("      cellHeight = window.getComputedStyle(gridColumns[j]).height;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("      cellWidth = $(gridColumns[j]).width() + \"px\";\r\n");
           $nm_saida->saida("      cellHeight = $(gridColumns[j]).height() + \"px\";\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $(headerColumns[j]).css({\r\n");
           $nm_saida->saida("      \"width\": cellWidth,\r\n");
           $nm_saida->saida("      \"height\": cellHeight\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     NM_btn_disable();\r\n");
           $nm_saida->saida("     $('#id_F0_bot').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpText\").mouseover(function() { $(this).addClass(\"scBtnGrpTextOver\"); }).mouseout(function() { $(this).removeClass(\"scBtnGrpTextOver\"); });\r\n");
           $nm_saida->saida("     $(\".scBtnGrpClick\").mouseup(function(event){\r\n");
           $nm_saida->saida("          event.preventDefault();\r\n");
           $nm_saida->saida("          if(event.target !== event.currentTarget) return;\r\n");
           $nm_saida->saida("          if($(this).find(\"a\").prop('href') != '')\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              $(this).find(\"a\").click();\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("          else\r\n");
           $nm_saida->saida("          {\r\n");
           $nm_saida->saida("              eval($(this).find(\"a\").prop('onclick'));\r\n");
           $nm_saida->saida("          }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ancor_save']);
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_groupby_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnGroupByHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#sel_groupby_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridShow(origem, embbed, pos, format, tipo) {\r\n");
     if (!$_SESSION['scriptcase']['proc_mobile']) { 
           $nm_saida->saida("     if(format == 'simplified')\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       if($(\"#id_save_grid_div_\" + pos).parent().hasClass('scBtnGrpText'))\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           id_parent_btn = $(\"#id_save_grid_div_\" + pos).closest('table').prev().attr('id');\r\n");
           $nm_saida->saida("           saveGrid = $(\"#id_div_save_grid_new_\" + pos).detach();\r\n");
           $nm_saida->saida("           $(\"#\" + id_parent_btn).append(saveGrid);\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if(tipo == '')\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("         tipo = 'save';\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if ($(\"#id_div_save_grid_new_\" + pos).css('display') != 'none') {\r\n");
               $nm_saida->saida("         $(\"#save_grid_\" + pos).removeClass(\"selected\");\r\n");
           $nm_saida->saida("         $(\"#id_div_save_grid_new_\" + pos).hide();\r\n");
               $nm_saida->saida("         return;\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("         if ($(\"#sc_id_save_grid_placeholder_\" + pos).css('display') != 'none') {\r\n");
               $nm_saida->saida("             $(\"#save_grid_\" + pos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("             scBtnSaveGridHide(pos);\r\n");
               $nm_saida->saida("             return;\r\n");
           $nm_saida->saida("         }\r\n");
           $nm_saida->saida("       }\r\n");
     }
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"POST\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: \"grid_reporte_caja_save_grid.php\",\r\n");
           $nm_saida->saida("       data: \"str_save_grid_option=\"+ tipo +\"&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . $this->Ini->sc_page . "&script_origem=\" + origem + \"&embbed_groupby=\" + embbed + \"&toolbar_pos=\" + pos + \"&format=\" + format\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("     if($(\"#id_div_save_grid_new_\" + pos).length > 0)\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       str_width  = $(document).width();\r\n");
           $nm_saida->saida("       str_height = $(document).height();\r\n");
           $nm_saida->saida("       $(\"#id_div_save_grid_new_\" + pos).html(data);\r\n");
           $nm_saida->saida("       $(\"#id_div_save_grid_new_\" + pos).show();\r\n");
           $nm_saida->saida("       saveGridAdjustHeightWidth(pos, str_width, str_height);\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + pos).show();\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function scBtnSaveGridSessionResponse(opcao, parm, pos)\r\n");
$nm_saida->saida("{\r\n");
$nm_saida->saida("    $.ajax({\r\n");
$nm_saida->saida("      type: \"POST\",\r\n");
$nm_saida->saida("      url: \"grid_reporte_caja_save_grid.php\",\r\n");
$nm_saida->saida("      data: \"ajax_ctrl=proc_ajax&script_case_init=" . $this->Ini->sc_page . "&Fsave_ok=\"+ opcao +\"&parm=\"+ parm +\"&toolbar_pos=\" + pos\r\n");
$nm_saida->saida("    })\r\n");
$nm_saida->saida("     .done(function(jsonReturn) {\r\n");
$nm_saida->saida("            var i, oResp;\r\n");
$nm_saida->saida("            Tst_integrid = jsonReturn.trim();\r\n");
$nm_saida->saida("            if (\"{\" != Tst_integrid.substr(0, 1)) {\r\n");
$nm_saida->saida("             alert (jsonReturn);\r\n");
$nm_saida->saida("             return;\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            eval(\"oResp = \" + jsonReturn);\r\n");
$nm_saida->saida("            if (oResp[\"setHtml\"]) {\r\n");
$nm_saida->saida("                for (i = 0; i < oResp[\"setHtml\"].length; i++) {\r\n");
$nm_saida->saida("                    $(\"#\" + oResp[\"setHtml\"][i][\"field\"]).html(oResp[\"setHtml\"][i][\"value\"]);\r\n");
$nm_saida->saida("                }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"setDisplay\"]) {\r\n");
$nm_saida->saida("                for (i = 0; i < oResp[\"setDisplay\"].length; i++) {\r\n");
$nm_saida->saida("                    $(\"#\" + oResp[\"setDisplay\"][i][\"field\"]).css(\"display\", oResp[\"setDisplay\"][i][\"value\"]);\r\n");
$nm_saida->saida("                }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"Fsave_ok\"] && oResp[\"Fsave_ok\"] != '') {\r\n");
$nm_saida->saida("                  if(oResp[\"Fsave_ok\"] == 'save_conf_grid')\r\n");
$nm_saida->saida("                  {                    sweetAlertConfig = {\r\n");
$nm_saida->saida("                        customClass: {\r\n");
$nm_saida->saida("                            popup: 'scSweetAlertPopup',\r\n");
$nm_saida->saida("                            header: 'scSweetAlertHeader',\r\n");
$nm_saida->saida("                            content: 'scSweetAlertMessage',\r\n");
$nm_saida->saida("                            confirmButton: scSweetAlertConfirmButton,\r\n");
$nm_saida->saida("                            cancelButton: scSweetAlertCancelButton\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    };\r\n");
$nm_saida->saida("                    sweetAlertConfig['toast'] = true;\r\n");
$nm_saida->saida("                    sweetAlertConfig['showConfirmButton'] = false;\r\n");
$nm_saida->saida("                    sweetAlertConfig['showCancelButton'] = false;\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['popup'] = 'scToastPopup';\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['header'] = 'scToastHeader';\r\n");
$nm_saida->saida("                    sweetAlertConfig['customClass']['content'] = 'scToastMessage';\r\n");
$nm_saida->saida("                    sweetAlertConfig['timer'] = 3000;\r\n");
$nm_saida->saida("                    sweetAlertConfig[\"position\"] = \"\";\r\n");
$nm_saida->saida("                    sweetAlertConfig[\"text\"] = \"" . $this->Ini->Nm_lang['lang_othr_savegrid_save_msge'] . "\";\r\n");
$nm_saida->saida("                    Swal.fire(sweetAlertConfig);                  }\r\n");
$nm_saida->saida("                  else if(oResp[\"Fsave_ok\"] == 'select_conf_grid')\r\n");
$nm_saida->saida("                  {\r\n");
$nm_saida->saida("                      nm_gp_move('igual', '0');\r\n");
$nm_saida->saida("                  }\r\n");
$nm_saida->saida("                  else if(oResp[\"Fsave_ok\"] == 'default')\r\n");
$nm_saida->saida("                  {\r\n");
$nm_saida->saida("                      nm_gp_move('igual', '0');\r\n");
$nm_saida->saida("                  }\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("            if (oResp[\"toolbar_pos\"] && oResp[\"toolbar_pos\"] != '') {\r\n");
$nm_saida->saida("                $('#sc_btgp_div_grid_session_' + oResp[\"toolbar_pos\"]).hide();\r\n");
$nm_saida->saida("                $('#save_grid_session_' + oResp[\"toolbar_pos\"]).removeClass('selected');\r\n");
$nm_saida->saida("            }\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionSave(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('save_conf_grid', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionLoad(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('select_conf_grid', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
$nm_saida->saida("function scBtnSaveGridSessionReset(pos){\r\n");
$nm_saida->saida("    scBtnSaveGridSessionResponse('default', 'session', pos);\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function saveGridAdjustHeightWidth(pos, str_width, str_height) {\r\n");
           $nm_saida->saida("       if(($('#save_grid_' + pos).offset().top+($('#id_div_save_grid_new_' + pos).height() * 2)+10) >= str_height)\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#id_div_save_grid_new_' + pos).offset({top:($('#save_grid_' + pos).offset().top-($('#save_grid_' + pos).height()/2)-$('#id_div_save_grid_new_' + pos).height())});\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       if(($('#save_grid_' + pos).offset().left + $('#id_div_save_grid_new_' + pos).outerWidth() +10) >= str_width)\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#id_div_save_grid_new_' + pos).css('left', str_width - $('#id_div_save_grid_new_' + pos).outerWidth() - 50)\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_sel_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnSelCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#selcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
$nm_saida->saida("function ajax_check_file(img_name, field , i , p, p_cache){\r\n");
$nm_saida->saida("    $(document).ready(function(){\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("        $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', '" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif');\r\n");
$nm_saida->saida("    var rs =$.ajax({\r\n");
$nm_saida->saida("                type: \"POST\",\r\n");
$nm_saida->saida("                url: 'index.php?script_case_init=" . $this->Ini->sc_page . "',\r\n");
$nm_saida->saida("                async: true,\r\n");
$nm_saida->saida("                data: 'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p='+ p + '&p_cache='+ p_cache,\r\n");
$nm_saida->saida("            }).done(function (rs) {\r\n");
$nm_saida->saida("                    if(rs.indexOf('</span>') != -1){\r\n");
$nm_saida->saida("                        rs = rs.substr(rs.indexOf('</span>')  + 7);\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                    if (rs != 0) {\r\n");
$nm_saida->saida("                        rs = rs.trim();\r\n");
$nm_saida->saida("                        rs_split = rs.split('_@@NM@@_');\r\n");
$nm_saida->saida("                        rs_orig = rs_split[0];\r\n");
$nm_saida->saida("                        rs = rs_split[1];\r\n");
$nm_saida->saida("                        if($('#id_sc_field_'+ field +'_'+i+'  > a > img').length != 0){\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'> img').attr('src', rs);\r\n");
$nm_saida->saida("                            var __tmp = $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href').split(\"',\")\r\n");
$nm_saida->saida("                            __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                            $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                        }else{\r\n");
$nm_saida->saida("                            if($('#id_sc_field_'+ field +'_'+i+' > a').length > 0 && ($('#id_sc_field_'+ field +'_'+i+' > a').attr('href')).indexOf('@SC_par@') != -1){\r\n");
$nm_saida->saida("                                var __file_doc = $('#id_sc_field_'+ field +'_'+i+' > a').attr('href').split('@SC_par@');\r\n");
$nm_saida->saida("                                var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+'  > a').attr('href', __file_doc.join('@SC_par@') );\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                            else{\r\n");
$nm_saida->saida("                                if($('#id_sc_field_'+field+'_'+i+' > span > a').length > 0){\r\n");
$nm_saida->saida("                                    var __tmp = $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href').split(\"',\");\r\n");
$nm_saida->saida("                                    if(__tmp[0].indexOf('nm_mostra_img') != -1){\r\n");
$nm_saida->saida("                                        __tmp[0] = \"javascript:nm_mostra_img('\" + rs_orig;\r\n");
$nm_saida->saida("                                    } else{\r\n");
$nm_saida->saida("                                        var __file_doc = __tmp[0].split('@SC_par@');\r\n");
$nm_saida->saida("                                        var ___file_doc = __file_doc[3].split(\"'\");\r\n");
$nm_saida->saida("                                        ___file_doc[0] = rs;\r\n");
$nm_saida->saida("                                        __file_doc[3] = ___file_doc.join(\"'\");\r\n");
$nm_saida->saida("                                        __tmp[0] = __file_doc.join('@SC_par@');\r\n");
$nm_saida->saida("                                        $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href', __tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                        //__tmp[1] = \"'\"+rs_orig+\"')\";\r\n");
$nm_saida->saida("                                    }\r\n");
$nm_saida->saida("                                    $('#id_sc_field_'+field+'_'+i+' > span > a').attr('href',__tmp.join(\"',\"));\r\n");
$nm_saida->saida("                                }\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                                $('#id_sc_field_'+ field +'_'+i+' > span > a > img').attr('src', rs);\r\n");
$nm_saida->saida("                            }\r\n");
$nm_saida->saida("                        }\r\n");
$nm_saida->saida("                    }\r\n");
$nm_saida->saida("                });\r\n");
$nm_saida->saida("    });\r\n");
$nm_saida->saida("}\r\n");
           $nm_saida->saida("   function scBtnExportEmail(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"POST\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_export_email_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_export_email_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_export_email_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnExportEmailHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_export_email_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_export_email_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     if ($(\"#sc_id_order_campos_placeholder_\" + sPos).css('display') != 'none') {\r\n");
           if ($_SESSION['scriptcase']['proc_mobile']) { 
               $nm_saida->saida("         //return;\r\n");
           }
           else {
               $nm_saida->saida("         scBtnOrderCamposHide(sPos);\r\n");
               $nm_saida->saida("         $(\"#ordcmp_\" + sPos).removeClass(\"selected\");\r\n");
               $nm_saida->saida("         return;\r\n");
           }
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpShow(sGroup) {\r\n");
           $nm_saida->saida("     if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).addClass('selected');\r\n");
           $nm_saida->saida("     var btnPos = $('#sc_btgp_btn_' + sGroup).offset();\r\n");
           $nm_saida->saida("     scBtnGrpStatus[sGroup] = 'open';\r\n");
           $nm_saida->saida("     $('#sc_btgp_btn_' + sGroup).mouseout(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = '';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     }).mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup + ' span a').click(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     $('#sc_btgp_div_' + sGroup).css({\r\n");
           $nm_saida->saida("       'left': btnPos.left\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseover(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'over';\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .mouseleave(function() {\r\n");
           $nm_saida->saida("       scBtnGrpStatus[sGroup] = 'out';\r\n");
           $nm_saida->saida("       setTimeout(function() {\r\n");
           $nm_saida->saida("         scBtnGrpHide(sGroup, false);\r\n");
           $nm_saida->saida("       }, 1000);\r\n");
           $nm_saida->saida("     })\r\n");
           $nm_saida->saida("     .show('fast');\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGrpHide(sGroup, bForce) {\r\n");
           $nm_saida->saida("     if (bForce || 'over' != scBtnGrpStatus[sGroup]) {\r\n");
           $nm_saida->saida("       $('#sc_btgp_div_' + sGroup).hide('fast');\r\n");
           $nm_saida->saida("       $('#sc_btgp_btn_' + sGroup).removeClass('selected');\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_reporte_caja_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
 { 
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->str_google_fonts . "\" />\r\n");
 } 
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_reporte_caja_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_reporte_caja_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_reporte_caja_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] == "print")) 
       {
           if ($this->Print_All) 
           {
               $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           }
           $nm_saida->saida("  <body id=\"grid_slide\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"-webkit-print-color-adjust: exact;" . $css_body . "\">\r\n");
           $nm_saida->saida("   <TABLE id=\"sc_table_print\" cellspacing=0 cellpadding=0 align=\"center\" valign=\"top\" " . $this->Tab_width . ">\r\n");
           $nm_saida->saida("     <TR>\r\n");
           $nm_saida->saida("       <TD>\r\n");
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "prit_web_page()", "prit_web_page()", "Bprint_print", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $nm_saida->saida("       </TD>\r\n");
           $nm_saida->saida("     </TR>\r\n");
           $nm_saida->saida("   </TABLE>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("  <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     $(\"#Bprint_print\").addClass(\"disabled\").prop(\"disabled\", true);\r\n");
           $nm_saida->saida("     $(function() {\r\n");
           $nm_saida->saida("         $(\"#Bprint_print\").removeClass(\"disabled\").prop(\"disabled\", false);\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     function prit_web_page()\r\n");
           $nm_saida->saida("     {\r\n");
           $nm_saida->saida("        if ($(\"#Bprint_print\").prop(\"disabled\")) {\r\n");
           $nm_saida->saida("            return;\r\n");
           $nm_saida->saida("        }\r\n");
           $nm_saida->saida("        document.getElementById('sc_table_print').style.display = 'none';\r\n");
           $nm_saida->saida("        var is_safari = navigator.userAgent.indexOf(\"Safari\") > -1;\r\n");
           $nm_saida->saida("        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1\r\n");
           $nm_saida->saida("        if ((is_chrome) && (is_safari)) {is_safari=false;}\r\n");
           $nm_saida->saida("        window.print();\r\n");
           $nm_saida->saida("        if (is_safari) {setTimeout(\"window.close()\", 1000);} else {window.close();}\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("  </script>\r\n");
       }
       else
       {
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_slide\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_reporte_caja']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_reporte_caja']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_reporte_caja']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_reporte_caja']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida']) ? "grid_reporte_caja_" : "";
   $this->css_sep = " ";
   $this->css_nom_docu_label = $compl_css_emb . "css_nom_docu_label";
   $this->css_nom_docu_grid_line = $compl_css_emb . "css_nom_docu_grid_line";
   $this->css_fecha_label = $compl_css_emb . "css_fecha_label";
   $this->css_fecha_grid_line = $compl_css_emb . "css_fecha_grid_line";
   $this->css_nom_empresa_label = $compl_css_emb . "css_nom_empresa_label";
   $this->css_nom_empresa_grid_line = $compl_css_emb . "css_nom_empresa_grid_line";
   $this->css_direccion_label = $compl_css_emb . "css_direccion_label";
   $this->css_direccion_grid_line = $compl_css_emb . "css_direccion_grid_line";
   $this->css_correo_label = $compl_css_emb . "css_correo_label";
   $this->css_correo_grid_line = $compl_css_emb . "css_correo_grid_line";
   $this->css_telefono_label = $compl_css_emb . "css_telefono_label";
   $this->css_telefono_grid_line = $compl_css_emb . "css_telefono_grid_line";
   $this->css_et1_label = $compl_css_emb . "css_et1_label";
   $this->css_et1_grid_line = $compl_css_emb . "css_et1_grid_line";
   $this->css_et2_label = $compl_css_emb . "css_et2_label";
   $this->css_et2_grid_line = $compl_css_emb . "css_et2_grid_line";
   $this->css_documento_label = $compl_css_emb . "css_documento_label";
   $this->css_documento_grid_line = $compl_css_emb . "css_documento_grid_line";
   $this->css_et3_label = $compl_css_emb . "css_et3_label";
   $this->css_et3_grid_line = $compl_css_emb . "css_et3_grid_line";
   $this->css_rango_label = $compl_css_emb . "css_rango_label";
   $this->css_rango_grid_line = $compl_css_emb . "css_rango_grid_line";
   $this->css_et4_label = $compl_css_emb . "css_et4_label";
   $this->css_et4_grid_line = $compl_css_emb . "css_et4_grid_line";
   $this->css_cant_fact_label = $compl_css_emb . "css_cant_fact_label";
   $this->css_cant_fact_grid_line = $compl_css_emb . "css_cant_fact_grid_line";
   $this->css_et5_label = $compl_css_emb . "css_et5_label";
   $this->css_et5_grid_line = $compl_css_emb . "css_et5_grid_line";
   $this->css_total_label = $compl_css_emb . "css_total_label";
   $this->css_total_grid_line = $compl_css_emb . "css_total_grid_line";
   $this->css_et6_label = $compl_css_emb . "css_et6_label";
   $this->css_et6_grid_line = $compl_css_emb . "css_et6_grid_line";
   $this->css_et7_label = $compl_css_emb . "css_et7_label";
   $this->css_et7_grid_line = $compl_css_emb . "css_et7_grid_line";
   $this->css_et8_label = $compl_css_emb . "css_et8_label";
   $this->css_et8_grid_line = $compl_css_emb . "css_et8_grid_line";
   $this->css_et9_label = $compl_css_emb . "css_et9_label";
   $this->css_et9_grid_line = $compl_css_emb . "css_et9_grid_line";
   $this->css_can_efec_label = $compl_css_emb . "css_can_efec_label";
   $this->css_can_efec_grid_line = $compl_css_emb . "css_can_efec_grid_line";
   $this->css_med_efec_label = $compl_css_emb . "css_med_efec_label";
   $this->css_med_efec_grid_line = $compl_css_emb . "css_med_efec_grid_line";
   $this->css_porc_efec_label = $compl_css_emb . "css_porc_efec_label";
   $this->css_porc_efec_grid_line = $compl_css_emb . "css_porc_efec_grid_line";
   $this->css_tot_efec_label = $compl_css_emb . "css_tot_efec_label";
   $this->css_tot_efec_grid_line = $compl_css_emb . "css_tot_efec_grid_line";
   $this->css_c_tarj_label = $compl_css_emb . "css_c_tarj_label";
   $this->css_c_tarj_grid_line = $compl_css_emb . "css_c_tarj_grid_line";
   $this->css_med_tarj_label = $compl_css_emb . "css_med_tarj_label";
   $this->css_med_tarj_grid_line = $compl_css_emb . "css_med_tarj_grid_line";
   $this->css_porc_tarj_label = $compl_css_emb . "css_porc_tarj_label";
   $this->css_porc_tarj_grid_line = $compl_css_emb . "css_porc_tarj_grid_line";
   $this->css_tarjeta_label = $compl_css_emb . "css_tarjeta_label";
   $this->css_tarjeta_grid_line = $compl_css_emb . "css_tarjeta_grid_line";
   $this->css_c_cheq_label = $compl_css_emb . "css_c_cheq_label";
   $this->css_c_cheq_grid_line = $compl_css_emb . "css_c_cheq_grid_line";
   $this->css_med_cheq_label = $compl_css_emb . "css_med_cheq_label";
   $this->css_med_cheq_grid_line = $compl_css_emb . "css_med_cheq_grid_line";
   $this->css_porc_cheq_label = $compl_css_emb . "css_porc_cheq_label";
   $this->css_porc_cheq_grid_line = $compl_css_emb . "css_porc_cheq_grid_line";
   $this->css_cheque_label = $compl_css_emb . "css_cheque_label";
   $this->css_cheque_grid_line = $compl_css_emb . "css_cheque_grid_line";
   $this->css_c_tra_label = $compl_css_emb . "css_c_tra_label";
   $this->css_c_tra_grid_line = $compl_css_emb . "css_c_tra_grid_line";
   $this->css_med_tran_label = $compl_css_emb . "css_med_tran_label";
   $this->css_med_tran_grid_line = $compl_css_emb . "css_med_tran_grid_line";
   $this->css_porc_tran_label = $compl_css_emb . "css_porc_tran_label";
   $this->css_porc_tran_grid_line = $compl_css_emb . "css_porc_tran_grid_line";
   $this->css_trans_label = $compl_css_emb . "css_trans_label";
   $this->css_trans_grid_line = $compl_css_emb . "css_trans_grid_line";
   $this->css_c_credito_label = $compl_css_emb . "css_c_credito_label";
   $this->css_c_credito_grid_line = $compl_css_emb . "css_c_credito_grid_line";
   $this->css_med_cred_label = $compl_css_emb . "css_med_cred_label";
   $this->css_med_cred_grid_line = $compl_css_emb . "css_med_cred_grid_line";
   $this->css_porc_credito_label = $compl_css_emb . "css_porc_credito_label";
   $this->css_porc_credito_grid_line = $compl_css_emb . "css_porc_credito_grid_line";
   $this->css_credito_label = $compl_css_emb . "css_credito_label";
   $this->css_credito_grid_line = $compl_css_emb . "css_credito_grid_line";
   $this->css_et10_label = $compl_css_emb . "css_et10_label";
   $this->css_et10_grid_line = $compl_css_emb . "css_et10_grid_line";
   $this->css_total_vtas_label = $compl_css_emb . "css_total_vtas_label";
   $this->css_total_vtas_grid_line = $compl_css_emb . "css_total_vtas_grid_line";
   $this->css_et_iva_label = $compl_css_emb . "css_et_iva_label";
   $this->css_et_iva_grid_line = $compl_css_emb . "css_et_iva_grid_line";
   $this->css_et_base_label = $compl_css_emb . "css_et_base_label";
   $this->css_et_base_grid_line = $compl_css_emb . "css_et_base_grid_line";
   $this->css_et_val_iva_label = $compl_css_emb . "css_et_val_iva_label";
   $this->css_et_val_iva_grid_line = $compl_css_emb . "css_et_val_iva_grid_line";
   $this->css_etiva_19_label = $compl_css_emb . "css_etiva_19_label";
   $this->css_etiva_19_grid_line = $compl_css_emb . "css_etiva_19_grid_line";
   $this->css_base19_label = $compl_css_emb . "css_base19_label";
   $this->css_base19_grid_line = $compl_css_emb . "css_base19_grid_line";
   $this->css_iva_19_label = $compl_css_emb . "css_iva_19_label";
   $this->css_iva_19_grid_line = $compl_css_emb . "css_iva_19_grid_line";
   $this->css_etiva_5_label = $compl_css_emb . "css_etiva_5_label";
   $this->css_etiva_5_grid_line = $compl_css_emb . "css_etiva_5_grid_line";
   $this->css_base5_label = $compl_css_emb . "css_base5_label";
   $this->css_base5_grid_line = $compl_css_emb . "css_base5_grid_line";
   $this->css_iva_5_label = $compl_css_emb . "css_iva_5_label";
   $this->css_iva_5_grid_line = $compl_css_emb . "css_iva_5_grid_line";
   $this->css_etexc_0_label = $compl_css_emb . "css_etexc_0_label";
   $this->css_etexc_0_grid_line = $compl_css_emb . "css_etexc_0_grid_line";
   $this->css_base0_label = $compl_css_emb . "css_base0_label";
   $this->css_base0_grid_line = $compl_css_emb . "css_base0_grid_line";
   $this->css_iva_0_label = $compl_css_emb . "css_iva_0_label";
   $this->css_iva_0_grid_line = $compl_css_emb . "css_iva_0_grid_line";
   $this->css_et_tot_label = $compl_css_emb . "css_et_tot_label";
   $this->css_et_tot_grid_line = $compl_css_emb . "css_et_tot_grid_line";
   $this->css_tot_base_label = $compl_css_emb . "css_tot_base_label";
   $this->css_tot_base_grid_line = $compl_css_emb . "css_tot_base_grid_line";
   $this->css_tot_iva_label = $compl_css_emb . "css_tot_iva_label";
   $this->css_tot_iva_grid_line = $compl_css_emb . "css_tot_iva_grid_line";
   $this->css_et20_label = $compl_css_emb . "css_et20_label";
   $this->css_et20_grid_line = $compl_css_emb . "css_et20_grid_line";
   $this->css_et_vac_label = $compl_css_emb . "css_et_vac_label";
   $this->css_et_vac_grid_line = $compl_css_emb . "css_et_vac_grid_line";
   $this->css_et_imb_label = $compl_css_emb . "css_et_imb_label";
   $this->css_et_imb_grid_line = $compl_css_emb . "css_et_imb_grid_line";
   $this->css_imp_bol_label = $compl_css_emb . "css_imp_bol_label";
   $this->css_imp_bol_grid_line = $compl_css_emb . "css_imp_bol_grid_line";
   $this->css_et_ic_label = $compl_css_emb . "css_et_ic_label";
   $this->css_et_ic_grid_line = $compl_css_emb . "css_et_ic_grid_line";
   $this->css_imp_consumo_label = $compl_css_emb . "css_imp_consumo_label";
   $this->css_imp_consumo_grid_line = $compl_css_emb . "css_imp_consumo_grid_line";
   $this->css_et_ic_dev_label = $compl_css_emb . "css_et_ic_dev_label";
   $this->css_et_ic_dev_grid_line = $compl_css_emb . "css_et_ic_dev_grid_line";
   $this->css_imp_consumo_dev_label = $compl_css_emb . "css_imp_consumo_dev_label";
   $this->css_imp_consumo_dev_grid_line = $compl_css_emb . "css_imp_consumo_dev_grid_line";
   $this->css_et_tot_inc_label = $compl_css_emb . "css_et_tot_inc_label";
   $this->css_et_tot_inc_grid_line = $compl_css_emb . "css_et_tot_inc_grid_line";
   $this->css_tot_inc_label = $compl_css_emb . "css_tot_inc_label";
   $this->css_tot_inc_grid_line = $compl_css_emb . "css_tot_inc_grid_line";
   $this->css_et_vn_label = $compl_css_emb . "css_et_vn_label";
   $this->css_et_vn_grid_line = $compl_css_emb . "css_et_vn_grid_line";
   $this->css_venta_netas_label = $compl_css_emb . "css_venta_netas_label";
   $this->css_venta_netas_grid_line = $compl_css_emb . "css_venta_netas_grid_line";
   $this->css_et_reg_label = $compl_css_emb . "css_et_reg_label";
   $this->css_et_reg_grid_line = $compl_css_emb . "css_et_reg_grid_line";
   $this->css_vent_reg_label = $compl_css_emb . "css_vent_reg_label";
   $this->css_vent_reg_grid_line = $compl_css_emb . "css_vent_reg_grid_line";
   $this->css_fac_anuladas_label = $compl_css_emb . "css_fac_anuladas_label";
   $this->css_fac_anuladas_grid_line = $compl_css_emb . "css_fac_anuladas_grid_line";
   $this->css_f_anul_label = $compl_css_emb . "css_f_anul_label";
   $this->css_f_anul_grid_line = $compl_css_emb . "css_f_anul_grid_line";
   $this->css_et_obs_label = $compl_css_emb . "css_et_obs_label";
   $this->css_et_obs_grid_line = $compl_css_emb . "css_et_obs_grid_line";
   $this->css_obs_label = $compl_css_emb . "css_obs_label";
   $this->css_obs_grid_line = $compl_css_emb . "css_obs_grid_line";
   $this->css_et_fech_imp_label = $compl_css_emb . "css_et_fech_imp_label";
   $this->css_et_fech_imp_grid_line = $compl_css_emb . "css_et_fech_imp_grid_line";
   $this->css_fecha_imp_label = $compl_css_emb . "css_fecha_imp_label";
   $this->css_fecha_imp_grid_line = $compl_css_emb . "css_fecha_imp_grid_line";
   $this->css_et_ubic_label = $compl_css_emb . "css_et_ubic_label";
   $this->css_et_ubic_grid_line = $compl_css_emb . "css_et_ubic_grid_line";
   $this->css_ubicacion_label = $compl_css_emb . "css_ubicacion_label";
   $this->css_ubicacion_grid_line = $compl_css_emb . "css_ubicacion_grid_line";
   $this->css_et_equipo_label = $compl_css_emb . "css_et_equipo_label";
   $this->css_et_equipo_grid_line = $compl_css_emb . "css_et_equipo_grid_line";
   $this->css_nom_equipo_label = $compl_css_emb . "css_nom_equipo_label";
   $this->css_nom_equipo_grid_line = $compl_css_emb . "css_nom_equipo_grid_line";
   $this->css_et_serial_label = $compl_css_emb . "css_et_serial_label";
   $this->css_et_serial_grid_line = $compl_css_emb . "css_et_serial_grid_line";
   $this->css_serial_label = $compl_css_emb . "css_serial_label";
   $this->css_serial_grid_line = $compl_css_emb . "css_serial_grid_line";
   $this->css_et_fin2_label = $compl_css_emb . "css_et_fin2_label";
   $this->css_et_fin2_grid_line = $compl_css_emb . "css_et_fin2_grid_line";
 }  
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_tem_quebra,
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['where_pesq_filtro'];
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_reporte_caja']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_reporte_caja#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"83\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida(" <TR> \r\n");
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_reporte_caja#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       $nm_id_aplicacao = " id=\"apl_grid_reporte_caja#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf_vert'] )
{
}
else
{
   $nm_saida->saida("    <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-270f0fe1\" align=\"center\" width=\"100%\">\r\n");
}
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Page_break_PDF'] = array();
       }
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $ini_grid = true;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   $this->nm_contr_album = 0;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->NM_field_color = array();
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['doc_word'] && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
          {
              $nm_prog_barr++;
              $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar . ": " . $nm_prog_barr . $PB_tot);
              $this->pb->addSteps(1);
          }
          //---------- Gauge ----------
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_reporte_caja_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->fecha = $this->rs_grid->fields[0] ;  
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final'] + 1; 
          if (!$ini_grid) {
              $this->SC_sep_quebra = true;
          }
          else {
              $ini_grid = false;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['rows_emb']++;
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_reporte_caja']['contr_erro'] = 'on';
if (!isset($_SESSION['gidtercero'])) {$_SESSION['gidtercero'] = "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
if (!isset($_SESSION['elprefijo'])) {$_SESSION['elprefijo'] = "";}
if (!isset($this->sc_temp_elprefijo)) {$this->sc_temp_elprefijo = (isset($_SESSION['elprefijo'])) ? $_SESSION['elprefijo'] : "";}
if (!isset($_SESSION['lafecha'])) {$_SESSION['lafecha'] = "";}
if (!isset($this->sc_temp_lafecha)) {$this->sc_temp_lafecha = (isset($_SESSION['lafecha'])) ? $_SESSION['lafecha'] : "";}
if (!isset($_SESSION['elbanco'])) {$_SESSION['elbanco'] = "";}
if (!isset($this->sc_temp_elbanco)) {$this->sc_temp_elbanco = (isset($_SESSION['elbanco'])) ? $_SESSION['elbanco'] : "";}
 $this->tot_efec =0.00;
$this->tarjeta =0.00;
$this->cheque =0.00;
$this->credito =0.00;
$this->trans  = 0.00;
$this->can_efec =0;
$this->c_tarj =0;
$this->c_cheq =0;
$this->c_credito =0;
$this->c_tra  = 0;
$this->porc_credito =0;
$this->iva_19 =0.00;
$this->iva_5 =0.00;
$this->iva_0 =0.00;
$this->tot_iva =0.00;
$this->base19 =0.00;
$this->base5 =0.00;
$this->base0 =0.00;
$this->tot_base =0.00;
$this->imp_bol  = 0.00;
$vImBolsa = 0;
$vIdPr_impb = 0;
$i=0;
$j=0;
$x=0;
$vNdoc='';
$vNres='';
$vIdfv='';
$vLis='';
$vIdrc='';
$vElUsuario = $this->sc_temp_gidtercero;
$vD = date("d/m/Y"); 
$vH = date("H");
$vM = date("i");
$vS = date("s");
$this->fecha_imp  = $vD.' - '.$vH.':'.$vM.':'.$vS;
 
      $nm_select = "SELECT ubicacion, n_equipo, serial FROM usuarios where tercero = $vElUsuario"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dse = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dse[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dse = false;
          $this->dse_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->dse[0][0]))
	{
	$this->ubicacion  = $this->dse[0][0];
	$this->nom_equipo  = $this->dse[0][1];
	$this->serial  = $this->dse[0][2];
	}
$sql_impb = "Select idprod from productos where tipo_producto = 'IM'";
 
      $nm_select = $sql_impb; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_pr = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_pr[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_pr = false;
          $this->ds_pr_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->ds_pr[0][0]))
	{
	$vIdPr_impb = $this->ds_pr[0][0];
	}
else
	{
	$vIdPr_impb = 0;
	}
$this->nom_docu  = 'COMPROBANTE DE INFORME DIARIO </br>';
$this->et10  = 'TOTAL FORMAS DE PAGO: ';
$this->et_iva   = '--IVA--';
$this->et_base  = '--VAL. BASE--';
$this->et_val_iva  = '--VAL. IVA--';
$this->etiva_19  = 'IVA 19%:';
$this->etiva_5  = 'IVA 5%:';
$this->etexc_0  = 'EXC o 0%:';
$this->et_tot  = 'TOTALES: ';
$this->et20  = '*** IMPUESTO BOLSAS (INC) ***';
$this->et_imb  = 'TOT IMP BOLSA';
$this->et_ic  = 'TOT INC VENTAS:';
$this->et_ic_dev  = 'TOT INC DEVOLUCIONES:';
$this->et_tot_inc  = 'TOTAL INC:';
$this->et_vn  = 'VENTAS NETAS:';
$this->et_reg  = 'VENTASA REGISTRADAS:';
$this->fac_anuladas  = 'FACTURAS ANULADAS:';
$this->obs  = 'N/A';
$this->et_obs  = 'OBSERVACIONES:';
$this->et_fech_imp  = 'FECHA DE IMPRESIÓN:';
$this->et_equipo  = 'NOM. EQUIPO:';
$this->et_serial  = 'SERIAL:';
$this->et_fin2  = 'Hecho en Facilweb</br>'.'facilweb@solucionesnavarro.com';
$this->et_ubic  = 'UBICACIÓN:';
 
      $nm_select = "SELECT razonsoc, nit, dv, direccion, telefono, correo, ciudad, nom_depto from datosemp Order By iddatos ASC Limit 1 "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dEmp = array();
      $this->demp = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dEmp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->demp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dEmp = false;
          $this->dEmp_erro = $this->Db->ErrorMsg();
          $this->demp = false;
          $this->demp_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->demp[0][0]))
	{
	$this->fecha  ='Fecha del comprobante: '.$this->fecha ;
	$this->nom_empresa  = 'Empresa: '.$this->demp[0][0]. ' Nit: '.$this->demp[0][1].'-'.$this->demp[0][2];
	$this->direccion  = 'Dirección: '.$this->demp[0][3].', '.$this->demp[0][6].' / '.$this->demp[0][7];
	$this->correo  = 'Correo electrónico: '.$this->demp[0][5];
	$this->telefono  = 'Teléfono: '.$this->demp[0][4];
	}
if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->total =$this->ds_fv[0][0];
	$this->et5 ='Total Facturado: ';
	}
else
	{
	 
      $nm_select = "SELECT SUM(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
	$this->total =$this->ds_fv[0][0];
	$this->et5 ='Total Facturado: ';
	
	 
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
      $this->dReso = array();
      $this->dreso = array();
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
                        $this->dReso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->dreso[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dReso = false;
          $this->dReso_erro = $this->Db->ErrorMsg();
          $this->dreso = false;
          $this->dreso_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->dreso[0][0]))
		{
		$res  = $this->dreso[0][0].' de '.$this->dreso[0][6].' del '.$this->dreso[0][1].$this->dreso[0][4].' a la '.$this->dreso[0][1].$this->dreso[0][5].' de fecha: '.$this->dreso[0][2];
		$this->et1  = 'Resolución DIAN #: ';
		}
	}
if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and tipo = 'FV' ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'  and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont = array();
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
                        $this->ds_cont[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont = false;
          $this->ds_cont_erro = $this->Db->ErrorMsg();
      } 
;
	}
$this->cant_fact =$this->ds_cont[0][0];
$this->et4  = '# de Facturas emitidas:';
if($this->sc_temp_elprefijo<>'' or $this->sc_temp_elprefijo<>NULL or $this->sc_temp_elprefijo>0)
	{
	 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
	if (isset($this->ds_ca2[0][0]))
	{
	$vIdres=$this->ds_ca2[0][1];
	 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
	$this->rango .=$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
	}
	 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;
	if (isset($this->ds_ca3[0][0]))
		{
		$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
		}
	$this->et3  = "Rango Facurado desde:";
	}
else
	{
	 
      $nm_select = "SELECT COUNT(DISTINCT resolucion) AS cantidad FROM facturaven WHERE banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->da_fv = array();
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
                        $this->da_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->da_fv = false;
          $this->da_fv_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->da_fv[0][0]))
		{
		if($this->da_fv[0][0]>1)
			{
			$this->rango ="RANGO: Varios";
			}
		else
			{
			 
      $nm_select = "SELECT numfacven, resolucion from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven ASC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca2 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca2 = false;
          $this->ds_ca2_erro = $this->Db->ErrorMsg();
      } 
;
	
			if (isset($this->ds_ca2[0][0]))
			{
			$vIdres=$this->ds_ca2[0][1];
			 
      $nm_select = "select prefijo from resdian where Idres=$vIdres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_res = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dt_res[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_res = false;
          $this->dt_res_erro = $this->Db->ErrorMsg();
      } 
;
			$this->rango .=$this->dt_res[0][0]. " ".$this->ds_ca2[0][0];
			}
			 
      $nm_select = "SELECT numfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' ORDER BY idfacven DESC LIMIT 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_ca3 = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_ca3[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_ca3 = false;
          $this->ds_ca3_erro = $this->Db->ErrorMsg();
      } 
;
			if (isset($this->ds_ca3[0][0]))
				{
				$this->rango .=" hasta ".$this->dt_res[0][0]." ".$this->ds_ca3[0][0];
				}
			}
		}
	$this->et3  = "Rango Facturado desde:";
	
	}
$this->et6  = 'CANTIDAD';
$this->et7  = 'FORMA PAGO';
$this->et8  = '%';
$this->et9  = 'VALOR';
if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
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
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT COUNT(*), sum(total) from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and credito= 1 and resolucion=$this->sc_temp_elprefijo ORDER BY idfacven "; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_cont2 = array();
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
                        $this->ds_cont2[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_cont2 = false;
          $this->ds_cont2_erro = $this->Db->ErrorMsg();
      } 
;
	}
if(isset($this->ds_cont2[0][1]))
	{
	$this->credito =$this->ds_cont2[0][1];
	$this->c_credito  = $this->ds_cont2[0][0];
	}
if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
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
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT documento, resolucion, cantidad, idrc from caja where documento>0 and resolucion>0 and banco=$this->sc_temp_elbanco and fecha='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo order by idcaja ASC"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_idf = array();
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
                        $this->ds_idf[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_idf = false;
          $this->ds_idf_erro = $this->Db->ErrorMsg();
      } 
;
	}
$tt=0;
if(isset($this->ds_idf[0][0]))
	{ 
	foreach($this->ds_idf  as $ads_idf)
		{
		$i=$i+1;
		$vNdoc=$ads_idf[0];
		$vNres=$ads_idf[1];
		$vIdrc=$ads_idf[3];
		 
      $nm_select = "select idfacven from facturaven where numfacven='$vNdoc' and resolucion=$vNres"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fv = array();
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
                        $this->ds_fv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fv = false;
          $this->ds_fv_erro = $this->Db->ErrorMsg();
      } 
;
		if(isset($this->ds_fv[0][0]))
			{
			if($vIdPr_impb>0)
				{
				$sql_bolsa = "Select sum(valorpar) from detalleventa where idpro = $vIdPr_impb and numfac = '".$this->ds_fv[0][0]."'";
				 
      $nm_select = $sql_bolsa; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->imb = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->imb[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->imb = false;
          $this->imb_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->imb[0][0]))
					{
					$vImBolsa = $vImBolsa + floatval($this->imb[0][0]);
					}
				}
			
			$vIdfv=$this->ds_fv[0][0];
			 
      $nm_select = "select idfp, monto from detallepagos where idfact=$vIdfv"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_dp = array();
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
                        $this->ds_dp[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dp = false;
          $this->ds_dp_erro = $this->Db->ErrorMsg();
      } 
;
			if(isset($this->ds_dp[0][0]))
				{
				$vLis = '';
				foreach($this->ds_dp  as $ads_dp)
					{
					$j=$j+1;
					$vLis.=$ads_dp[0];
					switch ($vLis)
						{
						case 1:
						$this->tot_efec =floatval($this->tot_efec )+floatval($ads_dp[1]); 
						$this->can_efec  = $this->can_efec +1;
						break;
						case 2:
						$this->tarjeta =floatval($this->tarjeta )+floatval($ads_dp[1]);
						$this->c_tarj  = $this->c_tarj +1;
						break;
						case 3:
						$this->cheque =floatval($this->cheque )+floatval($ads_dp[1]);
						$this->c_cheq  = $this->c_cheq +1;
						break;
							
						case 7:
						$this->trans  = floatval($this->trans )+floatval($ads_dp[1]);
						$this->c_tra  = $this->c_tra +1;
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
      $this->ds_dpi = array();
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
                        $this->ds_dpi[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_dpi = false;
          $this->ds_dpi_erro = $this->Db->ErrorMsg();
      } 
;
					if(isset($this->ds_dpi[0][0]))
						{
						$vLisi='';
						foreach($this->ds_dpi  as $ads_dpi)
							{
							$x=$x+1;
							$vLisi.=$ads_dpi[0];
							switch ($vLisi)
								{
								case 1:
								$this->tot_efec =floatval($this->tot_efec )+floatval($ads_dpi[1]);
								$this->can_efec  = $this->can_efec +1;
								break;
								case 2:
								$this->tarjeta =floatval($this->tarjeta )+floatval($ads_dpi[1]);
								$this->c_tarj  = $this->c_tarj +1;
								break;
								case 3:
								$this->cheque =floatval($this->cheque )+floatval($ads_dpi[1]);
								$this->c_cheq  = $this->c_cheq +1;
								break;
								
								case 7:
								$this->trans  = floatval($this->trans )+floatval($ads_dp[1]);
								$this->c_tra  = $this->c_tra +1;
								break;
								
								}
							$vLisi='';
							}
						$x=0;
						}
					else
						{
						$this->tot_efec =floatval($this->tot_efec )+floatval($this->ds_idf[0][2]);
						$this->can_efec  = floatval($this->cant_fact ) - (floatval($this->c_credito )+floatval($this->c_tarj )+floatval($this->c_cheq )+ floatval($this->c_tra ));
						}
					}
				else
					{
					$tt=$tt+1;
					$this->tot_efec =floatval($this->tot_efec )+floatval($ads_idf[2]);
					$this->can_efec  = floatval($this->cant_fact ) - (floatval($this->c_credito )+floatval($this->c_tarj )+floatval($this->c_cheq )+floatval($this->c_tra ));
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
$this->total_vtas =floatval($this->credito )+floatval($this->tot_efec )+floatval($this->cheque )+floatval($this->tarjeta )+floatval($this->trans );
$this->porc_efec  = round(($this->can_efec /$this->cant_fact ),2)*100;
$this->porc_tarj  = round(($this->c_tarj /$this->cant_fact ),2)*100;
$this->porc_cheq  = round(($this->c_cheq /$this->cant_fact ),2)*100;
$this->porc_tran  = round(($this->c_tra /$this->cant_fact ),2)*100;
$this->porc_credito  = round(($this->c_credito /$this->cant_fact ),2)*100;
$this->med_efec  = 'EN EFECTIVO:';
$this->med_tarj  = 'CON TARJETA:';
$this->med_cheq  = 'CON CHEQUES:';
$this->med_tran  = 'CON TRANSFERENCIA:';
$this->med_cred  = 'A CREDITO:';
if($this->sc_temp_elprefijo=='' or $this->sc_temp_elprefijo==NULL or $this->sc_temp_elprefijo==0)
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
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
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}
else
	{
	 
      $nm_select = "SELECT total, valoriva, imconsumo, retefuente, reteiva, reteica, cree, idfacven from facturaven where banco=$this->sc_temp_elbanco and fechaven='$this->sc_temp_lafecha' and resolucion=$this->sc_temp_elprefijo"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_fav = array();
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
                        $this->ds_fav[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_fav = false;
          $this->ds_fav_erro = $this->Db->ErrorMsg();
      } 
;
	}
$k=0;
$ads_facv='';
$vBase=0;
$vTasaRet=0;
$vTasaIca=0;
$vTasaRiva=0;
if(isset($this->ds_fav[0][0]))
	{
	foreach($this->ds_fav  as $ads_facv)
		{
		$k=$k+1;
		$vBase=$ads_facv[0]-$ads_facv[1];
		
		
			{
			 
      $nm_select = "select iva, adicional, valorpar from detalleventa where numfac=$ads_facv[7]"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt_df = array();
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
                        $this->dt_df[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dt_df = false;
          $this->dt_df_erro = $this->Db->ErrorMsg();
      } 
;
			$y=0;$prueba =$ads_facv[7];
			if(isset($this->dt_df[0][0]))
				{
				$vTiva='';
				foreach($this->dt_df  as $ads_df)
					{
					$y=$y+1;
					$vTiva=$ads_df[1];
					$this->tot_iva =$ads_df[0]+$this->tot_iva ;
					$this->tot_base =($ads_df[2]-$ads_df[0])+$this->tot_base ;
					switch($vTiva)
						{
						case 19:
						$this->iva_19 =$ads_df[0]+$this->iva_19 ;
						$this->base19 =($ads_df[2]-$ads_df[0])+$this->base19 ;
						break;
						
						case 5:
						$this->iva_5 =$ads_df[0]+$this->iva_5 ;
						$this->base5 =($ads_df[2]-$ads_df[0])+$this->base5 ;
						break;
						
						case 0:
						$this->iva_0 =$ads_df[0]+$this->iva_0 ;
						$this->base0 =$ads_df[2]+$this->base0 ;
						break;
						
						case 8:
						$this->imp_consumo =$ads_df[0]+$this->imp_consumo ;
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
if($vImBolsa>0)
	{
	$this->base0  = $this->base0  - $vImBolsa;
	$this->imp_bol  = $vImBolsa;
	$this->imp_consumo_dev  = 0;
	}
else
	{
	$this->imp_consumo =0;
	$this->imp_consumo_dev  = 0;
	}
$this->tot_inc  = $this->imp_consumo  - $this->imp_consumo_dev  + $this->imp_bol ;
$this->venta_netas   = $this->total ;
$this->vent_reg  = $this->total ;
$this->tot_iva =$this->tot_iva -$this->imp_consumo ;
if (isset($this->sc_temp_elbanco)) {$_SESSION['elbanco'] = $this->sc_temp_elbanco;}
if (isset($this->sc_temp_lafecha)) {$_SESSION['lafecha'] = $this->sc_temp_lafecha;}
if (isset($this->sc_temp_elprefijo)) {$_SESSION['elprefijo'] = $this->sc_temp_elprefijo;}
if (isset($this->sc_temp_gidtercero)) {$_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
$_SESSION['scriptcase']['grid_reporte_caja']['contr_erro'] = 'off';
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOddVert;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEvenVert;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "fecha")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
          }
   if (!$this->NM_flag_antigo)
   {
       $nm_contr_percentual = 100 / $this->nm_grid_slides_linha; 
       if ($this->nm_contr_album != 0 && $this->nm_contr_album % $this->nm_grid_slides_linha == 0)
       {
           $this->SC_ancora = $this->SC_seq_page;
$nm_saida->saida("      </tr></table></td></tr>\r\n");
$nm_saida->saida("<tr><td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</td><td style=\"padding: 0px\"><table align=\"center\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\">\r\n");
$nm_saida->saida("<tr id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
       }
       elseif ($this->nm_contr_album == 0)
       {
           $this->SC_ancora = $this->SC_seq_page;
$nm_saida->saida("      <tr><td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</td><td style=\"padding: 0px\"><table align=\"center\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\">\r\n");
$nm_saida->saida("<tr id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
       }
       $this->nm_contr_album++; 
       $this->Nm_bloco_aberto = true; 
   } 
$nm_saida->saida("   <td style=\"padding: 0px; vertical-align: top;\" width=\"" . $nm_contr_percentual . "%\">\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq']) { 
$nm_saida->saida("     &nbsp;\r\n");
 } 
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq']) { 
$nm_saida->saida("     \r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
$nm_saida->saida(" $Cod_Btn\r\n");
 } 
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[0]) || $this->Ini->nm_hidden_blocos[0] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
     if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf")
     {
         $Img_tit_blk_i = "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td class=\"" . $this->css_scGridBlockAlign . " css_blk_0\" style=\"border-width: 0px; padding: 0px; width: 100%;@STYBLK@\">";
         $Img_tit_blk_f = "</td></tr></table>";
     }
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_0_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_nom_docu_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nom_docu_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->nom_docu); 
          $conteudo_original = sc_strip_script($this->nom_docu); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nom_docu', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['nom_docu']) && $this->NM_cmp_hidden['nom_docu'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_nom_docu_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_fecha_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fecha_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->fecha)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fecha)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
               $conteudo_x =  $conteudo;
               nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
               if (is_numeric($conteudo_x) && $conteudo_x > 0) 
               { 
                   $this->nm_data->SetaData($conteudo, "YYYY-MM-DD");
                   $conteudo = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['fecha']) && $this->NM_cmp_hidden['fecha'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_fecha_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_nom_empresa_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nom_empresa_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->nom_empresa); 
          $conteudo_original = sc_strip_script($this->nom_empresa); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nom_empresa', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['nom_empresa']) && $this->NM_cmp_hidden['nom_empresa'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_nom_empresa_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_direccion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_direccion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->direccion); 
          $conteudo_original = sc_strip_script($this->direccion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'direccion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['direccion']) && $this->NM_cmp_hidden['direccion'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_direccion_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_correo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_correo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->correo); 
          $conteudo_original = sc_strip_script($this->correo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'correo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['correo']) && $this->NM_cmp_hidden['correo'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_correo_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_telefono_grid_line . "\"  style=\"" . $this->Css_Cmp['css_telefono_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->telefono); 
          $conteudo_original = sc_strip_script($this->telefono); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'telefono', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['telefono']) && $this->NM_cmp_hidden['telefono'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_telefono_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[1]) || $this->Ini->nm_hidden_blocos[1] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
     if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf")
     {
         $Img_tit_blk_i = "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td class=\"" . $this->css_scGridBlockAlign . " css_blk_1\" style=\"border-width: 0px; padding: 0px; width: 100%;@STYBLK@\">";
         $Img_tit_blk_f = "</td></tr></table>";
     }
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_1_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et1_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et1); 
          $conteudo_original = sc_strip_script($this->et1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et1', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et1']) && $this->NM_cmp_hidden['et1'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et1_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et2); 
          $conteudo_original = sc_strip_script($this->et2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et2']) && $this->NM_cmp_hidden['et2'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et2_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_documento_grid_line . "\"  style=\"" . $this->Css_Cmp['css_documento_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->documento); 
          $conteudo_original = sc_strip_script($this->documento); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'documento', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['documento']) && $this->NM_cmp_hidden['documento'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_documento_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et3_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et3_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et3); 
          $conteudo_original = sc_strip_script($this->et3); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et3', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et3']) && $this->NM_cmp_hidden['et3'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et3_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_rango_grid_line . "\"  style=\"" . $this->Css_Cmp['css_rango_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->rango)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->rango)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'rango', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['rango']) && $this->NM_cmp_hidden['rango'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_rango_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et4_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et4_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et4); 
          $conteudo_original = sc_strip_script($this->et4); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et4', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et4']) && $this->NM_cmp_hidden['et4'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et4_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_cant_fact_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cant_fact_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->cant_fact)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->cant_fact)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cant_fact', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['cant_fact']) && $this->NM_cmp_hidden['cant_fact'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_cant_fact_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et5); 
          $conteudo_original = sc_strip_script($this->et5); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et5']) && $this->NM_cmp_hidden['et5'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et5_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_total_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->total)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->total)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'total', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['total']) && $this->NM_cmp_hidden['total'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_total_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_line_back . "\"  colspan=\"1\">&nbsp;</TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[2]) || $this->Ini->nm_hidden_blocos[2] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_2_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_2\"  colspan=\"4\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_2\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "DETALLE FORMAS DE PAGO" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et6_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et6_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et6); 
          $conteudo_original = sc_strip_script($this->et6); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et6', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et6']) && $this->NM_cmp_hidden['et6'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et6_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et7_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et7_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et7); 
          $conteudo_original = sc_strip_script($this->et7); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et7', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et7']) && $this->NM_cmp_hidden['et7'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et7_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et8_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et8_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et8); 
          $conteudo_original = sc_strip_script($this->et8); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et8', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et8']) && $this->NM_cmp_hidden['et8'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et8_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et9_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et9_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et9); 
          $conteudo_original = sc_strip_script($this->et9); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et9', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et9']) && $this->NM_cmp_hidden['et9'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et9_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_can_efec_grid_line . "\"  style=\"" . $this->Css_Cmp['css_can_efec_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->can_efec)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->can_efec)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'can_efec', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['can_efec']) && $this->NM_cmp_hidden['can_efec'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_can_efec_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_med_efec_grid_line . "\"  style=\"" . $this->Css_Cmp['css_med_efec_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->med_efec); 
          $conteudo_original = sc_strip_script($this->med_efec); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med_efec', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['med_efec']) && $this->NM_cmp_hidden['med_efec'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_med_efec_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_porc_efec_grid_line . "\"  style=\"" . $this->Css_Cmp['css_porc_efec_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->porc_efec)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->porc_efec)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "%", "V:" . 4 . ":" . 6, $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porc_efec', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['porc_efec']) && $this->NM_cmp_hidden['porc_efec'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_porc_efec_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_tot_efec_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tot_efec_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->tot_efec)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tot_efec)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tot_efec', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['tot_efec']) && $this->NM_cmp_hidden['tot_efec'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_tot_efec_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_c_tarj_grid_line . "\"  style=\"" . $this->Css_Cmp['css_c_tarj_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->c_tarj)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->c_tarj)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'c_tarj', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['c_tarj']) && $this->NM_cmp_hidden['c_tarj'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_c_tarj_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_med_tarj_grid_line . "\"  style=\"" . $this->Css_Cmp['css_med_tarj_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->med_tarj); 
          $conteudo_original = sc_strip_script($this->med_tarj); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med_tarj', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['med_tarj']) && $this->NM_cmp_hidden['med_tarj'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_med_tarj_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_porc_tarj_grid_line . "\"  style=\"" . $this->Css_Cmp['css_porc_tarj_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->porc_tarj)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->porc_tarj)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "%", "V:" . 4 . ":" . 6, $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porc_tarj', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['porc_tarj']) && $this->NM_cmp_hidden['porc_tarj'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_porc_tarj_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_tarjeta_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tarjeta_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->tarjeta)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tarjeta)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tarjeta', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['tarjeta']) && $this->NM_cmp_hidden['tarjeta'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_tarjeta_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_c_cheq_grid_line . "\"  style=\"" . $this->Css_Cmp['css_c_cheq_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->c_cheq)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->c_cheq)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'c_cheq', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['c_cheq']) && $this->NM_cmp_hidden['c_cheq'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_c_cheq_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_med_cheq_grid_line . "\"  style=\"" . $this->Css_Cmp['css_med_cheq_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->med_cheq); 
          $conteudo_original = sc_strip_script($this->med_cheq); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med_cheq', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['med_cheq']) && $this->NM_cmp_hidden['med_cheq'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_med_cheq_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_porc_cheq_grid_line . "\"  style=\"" . $this->Css_Cmp['css_porc_cheq_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->porc_cheq)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->porc_cheq)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "%", "V:" . 4 . ":" . 6, $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porc_cheq', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['porc_cheq']) && $this->NM_cmp_hidden['porc_cheq'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_porc_cheq_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_cheque_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cheque_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->cheque)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->cheque)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cheque', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['cheque']) && $this->NM_cmp_hidden['cheque'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_cheque_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_c_tra_grid_line . "\"  style=\"" . $this->Css_Cmp['css_c_tra_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->c_tra)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->c_tra)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'c_tra', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['c_tra']) && $this->NM_cmp_hidden['c_tra'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_c_tra_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_med_tran_grid_line . "\"  style=\"" . $this->Css_Cmp['css_med_tran_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->med_tran); 
          $conteudo_original = sc_strip_script($this->med_tran); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med_tran', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['med_tran']) && $this->NM_cmp_hidden['med_tran'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_med_tran_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_porc_tran_grid_line . "\"  style=\"" . $this->Css_Cmp['css_porc_tran_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->porc_tran)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->porc_tran)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "%", "V:" . 4 . ":" . 6, $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porc_tran', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['porc_tran']) && $this->NM_cmp_hidden['porc_tran'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_porc_tran_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_trans_grid_line . "\"  style=\"" . $this->Css_Cmp['css_trans_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->trans)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->trans)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'trans', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['trans']) && $this->NM_cmp_hidden['trans'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_trans_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_c_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_c_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->c_credito)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->c_credito)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'c_credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['c_credito']) && $this->NM_cmp_hidden['c_credito'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_c_credito_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_med_cred_grid_line . "\"  style=\"" . $this->Css_Cmp['css_med_cred_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->med_cred); 
          $conteudo_original = sc_strip_script($this->med_cred); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'med_cred', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['med_cred']) && $this->NM_cmp_hidden['med_cred'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_med_cred_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_porc_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_porc_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->porc_credito)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->porc_credito)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", "%", "V:" . 4 . ":" . 6, $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'porc_credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['porc_credito']) && $this->NM_cmp_hidden['porc_credito'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_porc_credito_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->credito)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->credito)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['credito']) && $this->NM_cmp_hidden['credito'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_credito_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[3]) || $this->Ini->nm_hidden_blocos[3] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_3_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et10_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et10_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->et10); 
          $conteudo_original = sc_strip_script($this->et10); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et10', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et10']) && $this->NM_cmp_hidden['et10'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et10_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_total_vtas_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_vtas_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->total_vtas)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->total_vtas)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'total_vtas', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['total_vtas']) && $this->NM_cmp_hidden['total_vtas'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_total_vtas_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[4]) || $this->Ini->nm_hidden_blocos[4] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_4_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_4\"  colspan=\"3\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_4\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "IVA    -  DEPARTAMENTO:  SIN" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_iva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_iva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->et_iva); 
          $conteudo_original = sc_strip_script($this->et_iva); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_iva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_iva']) && $this->NM_cmp_hidden['et_iva'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_iva_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_base_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_base_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_base); 
          $conteudo_original = sc_strip_script($this->et_base); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_base', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_base']) && $this->NM_cmp_hidden['et_base'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_base_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_val_iva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_val_iva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_val_iva); 
          $conteudo_original = sc_strip_script($this->et_val_iva); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_val_iva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_val_iva']) && $this->NM_cmp_hidden['et_val_iva'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_val_iva_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_etiva_19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_etiva_19_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->etiva_19); 
          $conteudo_original = sc_strip_script($this->etiva_19); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'etiva_19', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['etiva_19']) && $this->NM_cmp_hidden['etiva_19'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_etiva_19_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_base19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base19_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->base19)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base19)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base19', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['base19']) && $this->NM_cmp_hidden['base19'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_base19_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_iva_19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_19_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->iva_19)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_19)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_19', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['iva_19']) && $this->NM_cmp_hidden['iva_19'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_iva_19_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_etiva_5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_etiva_5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->etiva_5); 
          $conteudo_original = sc_strip_script($this->etiva_5); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'etiva_5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['etiva_5']) && $this->NM_cmp_hidden['etiva_5'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_etiva_5_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_base5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->base5)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base5)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['base5']) && $this->NM_cmp_hidden['base5'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_base5_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_iva_5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->iva_5)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_5)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['iva_5']) && $this->NM_cmp_hidden['iva_5'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_iva_5_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_etexc_0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_etexc_0_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->etexc_0); 
          $conteudo_original = sc_strip_script($this->etexc_0); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'etexc_0', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['etexc_0']) && $this->NM_cmp_hidden['etexc_0'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_etexc_0_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_base0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base0_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->base0)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base0)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base0', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['base0']) && $this->NM_cmp_hidden['base0'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_base0_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_iva_0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_0_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->iva_0)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_0)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_0', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['iva_0']) && $this->NM_cmp_hidden['iva_0'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_iva_0_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_tot_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_tot_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->et_tot); 
          $conteudo_original = sc_strip_script($this->et_tot); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_tot', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_tot']) && $this->NM_cmp_hidden['et_tot'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_tot_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_tot_base_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tot_base_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->tot_base)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tot_base)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tot_base', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['tot_base']) && $this->NM_cmp_hidden['tot_base'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_tot_base_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_tot_iva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tot_iva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->tot_iva)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tot_iva)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tot_iva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['tot_iva']) && $this->NM_cmp_hidden['tot_iva'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_tot_iva_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[5]) || $this->Ini->nm_hidden_blocos[5] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_5_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_5\"  colspan=\"2\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_5\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "IMUESTO AL CONSUMO - DEPARTAMENTO: SIN" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et20_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et20_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et20); 
          $conteudo_original = sc_strip_script($this->et20); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et20', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et20']) && $this->NM_cmp_hidden['et20'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et20_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_vac_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_vac_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_vac); 
          $conteudo_original = sc_strip_script($this->et_vac); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_vac', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_vac']) && $this->NM_cmp_hidden['et_vac'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_vac_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_imb_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_imb_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_imb); 
          $conteudo_original = sc_strip_script($this->et_imb); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_imb', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_imb']) && $this->NM_cmp_hidden['et_imb'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_imb_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_imp_bol_grid_line . "\"  style=\"" . $this->Css_Cmp['css_imp_bol_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->imp_bol)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->imp_bol)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imp_bol', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['imp_bol']) && $this->NM_cmp_hidden['imp_bol'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_imp_bol_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_ic_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_ic_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_ic); 
          $conteudo_original = sc_strip_script($this->et_ic); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_ic', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_ic']) && $this->NM_cmp_hidden['et_ic'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_ic_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_imp_consumo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_imp_consumo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->imp_consumo)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->imp_consumo)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imp_consumo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['imp_consumo']) && $this->NM_cmp_hidden['imp_consumo'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_imp_consumo_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_ic_dev_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_ic_dev_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_ic_dev); 
          $conteudo_original = sc_strip_script($this->et_ic_dev); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_ic_dev', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_ic_dev']) && $this->NM_cmp_hidden['et_ic_dev'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_ic_dev_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_imp_consumo_dev_grid_line . "\"  style=\"" . $this->Css_Cmp['css_imp_consumo_dev_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->imp_consumo_dev)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->imp_consumo_dev)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imp_consumo_dev', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['imp_consumo_dev']) && $this->NM_cmp_hidden['imp_consumo_dev'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_imp_consumo_dev_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_tot_inc_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_tot_inc_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->et_tot_inc); 
          $conteudo_original = sc_strip_script($this->et_tot_inc); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_tot_inc', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_tot_inc']) && $this->NM_cmp_hidden['et_tot_inc'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_tot_inc_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_tot_inc_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tot_inc_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->tot_inc)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->tot_inc)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'tot_inc', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['tot_inc']) && $this->NM_cmp_hidden['tot_inc'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_tot_inc_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[6]) || $this->Ini->nm_hidden_blocos[6] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_6_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_6\"  colspan=\"2\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_6\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "RESUMEN" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_vn_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_vn_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_vn); 
          $conteudo_original = sc_strip_script($this->et_vn); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_vn', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_vn']) && $this->NM_cmp_hidden['et_vn'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_vn_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_venta_netas_grid_line . "\"  style=\"" . $this->Css_Cmp['css_venta_netas_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->venta_netas)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->venta_netas)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'venta_netas', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['venta_netas']) && $this->NM_cmp_hidden['venta_netas'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_venta_netas_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_reg_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_reg_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_reg); 
          $conteudo_original = sc_strip_script($this->et_reg); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_reg', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_reg']) && $this->NM_cmp_hidden['et_reg'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_reg_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_vent_reg_grid_line . "\"  style=\"" . $this->Css_Cmp['css_vent_reg_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = NM_encode_input(sc_strip_script($this->vent_reg)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->vent_reg)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vent_reg', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['vent_reg']) && $this->NM_cmp_hidden['vent_reg'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_vent_reg_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_fac_anuladas_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fac_anuladas_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->fac_anuladas); 
          $conteudo_original = sc_strip_script($this->fac_anuladas); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fac_anuladas', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['fac_anuladas']) && $this->NM_cmp_hidden['fac_anuladas'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_fac_anuladas_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_f_anul_grid_line . "\"  style=\"" . $this->Css_Cmp['css_f_anul_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->f_anul); 
          $conteudo_original = sc_strip_script($this->f_anul); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'f_anul', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['f_anul']) && $this->NM_cmp_hidden['f_anul'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_f_anul_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_obs_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_obs_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_obs); 
          $conteudo_original = sc_strip_script($this->et_obs); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_obs', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_obs']) && $this->NM_cmp_hidden['et_obs'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_obs_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_obs_grid_line . "\"  style=\"" . $this->Css_Cmp['css_obs_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->obs); 
          $conteudo_original = sc_strip_script($this->obs); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'obs', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['obs']) && $this->NM_cmp_hidden['obs'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_obs_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[7]) || $this->Ini->nm_hidden_blocos[7] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_7_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_7\"  colspan=\"2\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_7\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_fech_imp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_fech_imp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_fech_imp); 
          $conteudo_original = sc_strip_script($this->et_fech_imp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_fech_imp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_fech_imp']) && $this->NM_cmp_hidden['et_fech_imp'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_fech_imp_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_fecha_imp_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fecha_imp_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->fecha_imp); 
          $conteudo_original = sc_strip_script($this->fecha_imp); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fecha_imp', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['fecha_imp']) && $this->NM_cmp_hidden['fecha_imp'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_fecha_imp_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_ubic_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_ubic_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_ubic); 
          $conteudo_original = sc_strip_script($this->et_ubic); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_ubic', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_ubic']) && $this->NM_cmp_hidden['et_ubic'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_ubic_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_ubicacion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ubicacion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->ubicacion); 
          $conteudo_original = sc_strip_script($this->ubicacion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ubicacion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['ubicacion']) && $this->NM_cmp_hidden['ubicacion'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_ubicacion_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_equipo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_equipo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_equipo); 
          $conteudo_original = sc_strip_script($this->et_equipo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_equipo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_equipo']) && $this->NM_cmp_hidden['et_equipo'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_equipo_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_nom_equipo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nom_equipo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->nom_equipo); 
          $conteudo_original = sc_strip_script($this->nom_equipo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nom_equipo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['nom_equipo']) && $this->NM_cmp_hidden['nom_equipo'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_nom_equipo_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr><tr>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_serial_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_serial_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->et_serial); 
          $conteudo_original = sc_strip_script($this->et_serial); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_serial', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_serial']) && $this->NM_cmp_hidden['et_serial'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_serial_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_serial_grid_line . "\"  style=\"" . $this->Css_Cmp['css_serial_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          $conteudo = sc_strip_script($this->serial); 
          $conteudo_original = sc_strip_script($this->serial); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'serial', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['serial']) && $this->NM_cmp_hidden['serial'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
$nm_saida->saida("     <span id=\"id_sc_field_serial_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("   </tr></table>\r\n");
 }
$nm_saida->saida("   </td></tr></table>\r\n");
$nm_saida->saida("    <table width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr valign=\"top\"><td style=\"padding: 0px\" width=\"100%\" height=\"\">\r\n");
 if(!isset($this->Ini->nm_hidden_blocos[8]) || $this->Ini->nm_hidden_blocos[8] != "off")
 {
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     $Collapse_blk  = "";
$nm_saida->saida("  <TABLE class=\"" . $this->css_scGridTabela . "\"  style=\"border-collapse:collapse;\" cellspacing=0px cellpadding=0px align=\"center\" id=\"grid_reporte_caja_hidden_bloco_8_" . $this->nm_contr_album . "\" width=\"100%\" style=\"height: 100%\">\r\n");
$nm_saida->saida("   <TR>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_scGridBlock . " css_blk_8\"  colspan=\"3\" height=\"20px\" width=\"100%\" >\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("       <TD class=\"" . $this->css_scGridBlockFont . " css_blk_8\"  style=\"padding: 0px;\" align=\"\" valign=\"\">" . str_replace("@STYBLK@", "",$Img_tit_blk_i) . "" . $Img_tit_blk_f . "</TD>\r\n");
$nm_saida->saida("      </TR>\r\n");
$nm_saida->saida("     </TABLE>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("   </TR>\r\n");
$nm_saida->saida("   <TR >\r\n");
$nm_saida->saida("    <TD  style=\"border-width: 0px; border-style: none; \" height=\"\" valign=\"top\" width=\"100%\">\r\n");
$nm_saida->saida("     <TABLE style=\"padding: 0px; spacing: 0px; border-width: 0px; border-collapse:collapse;\" width=\"100%\">\r\n");
$nm_saida->saida("      <TR>\r\n");
$nm_saida->saida("     <TD class=\"" . $this->css_line_back . $this->css_sep . $this->css_et_fin2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_et_fin2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\">\r\n");
          $conteudo = sc_strip_script($this->et_fin2); 
          $conteudo_original = sc_strip_script($this->et_fin2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'et_fin2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if (isset($this->NM_cmp_hidden['et_fin2']) && $this->NM_cmp_hidden['et_fin2'] == "off")
          {
              $conteudo = "&nbsp;";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
$nm_saida->saida("     <span id=\"id_sc_field_et_fin2_" . $this->SC_seq_page . "\"><span >" . $conteudo . "</span></span>\r\n");
$nm_saida->saida("    </TD>\r\n");
$nm_saida->saida("    <TD class=\"" . $this->css_line_back . "\"  colspan=\"2\">&nbsp;</TD>\r\n");
$nm_saida->saida("   </tr></table></td>\r\n");
$nm_saida->saida("    </tr></table>\r\n");
 }
$nm_saida->saida("    </td></tr></table></td>\r\n");
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   $this->NM_Fecha_bloco("fim");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($this->rs_grid->EOF) 
   { 
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao']       = "igual" ; 
   } 
 }
 function NM_Fecha_bloco($opc="ok")
 {
   global $nm_saida;
   $nm_contr_percentual = 100 / $this->nm_grid_slides_linha; 
   $this->nm_contr_album = $this->nm_contr_album % $this->nm_grid_slides_linha;
   if ($this->nm_contr_album != 0 && $this->nm_contr_album != $this->nm_grid_slides_linha)
   {
       while ($this->nm_contr_album < $this->nm_grid_slides_linha)
       {
          $nm_saida->saida("  <td style=\"padding: 0px; vertical-align: top;\" width=\"" .  $nm_contr_percentual . "%\">\r\n");
          $nm_saida->saida("    <TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"  align=\"center\"  width=\"100%\">\r\n");
          $nm_saida->saida("      <TR>\r\n");
          $nm_saida->saida("        <TD>&nbsp;\r\n");
          $nm_saida->saida("        </TD>\r\n");
          $nm_saida->saida("      </TR>\r\n");
          $nm_saida->saida("    </TABLE>\r\n");
          $nm_saida->saida("  </td>\r\n");
          $this->nm_contr_album++;
       }
   }
   $this->nm_contr_album = 0;
   if ($this->Nm_bloco_aberto)
   {
       $this->Nm_bloco_aberto = false;
       if ($opc != "fim")
       {
           $nm_saida->saida("     </tr></table></td></tr>\r\n");
       }
       else
       {
           $nm_saida->saida("     </tr></table></td>\r\n");
       }
   }
 }
 function nm_quebra_pagina($nm_parms)
 {
    global $nm_saida;
    if ($this->nmgp_prim_pag_pdf && $nm_parms == "pagina")
    {
        $this->nmgp_prim_pag_pdf = false;
        return;
    }
    $this->Ini->nm_cont_lin++;
    if (($this->Ini->nm_limite_lin > 0 && $this->Ini->nm_cont_lin > $this->Ini->nm_limite_lin) || $nm_parms == "pagina" || $nm_parms == "resumo" || $nm_parms == "total")
    {
        $this->NM_Fecha_bloco();
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE></TD></TR>\r\n");
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
                $nm_saida->saida("<TR><TD style=\"padding: 0px\"><TABLE width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\">\r\n");
            }
            else
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" class=\"scGridBorder\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
            }
        }
        else
        {
            $nm_saida->saida("</table><div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div><table width='100%' cellspacing=0 cellpadding=0>\r\n");
        }
   $nm_saida->saida("    <TABLE align=\"center\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\">\r\n");
   $nm_saida->saida("     <TR> \r\n");
    }
 }
 function quebra_geral_sc_free_total_top() 
 {
   global $nm_saida; 
 }
 function quebra_geral_sc_free_total_bot() 
 {
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
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] != "print") 
      {
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
              $this->nm_btn_exist['print'][] = "print_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_bot = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_bot')", "scBtnGrpShow('group_1_bot')", "sc_btgp_btn_group_1_bot", "", "Enviar al Correo", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['pdf'][] = "email_pdf_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
          $nm_saida->saida("            <div id=\"div_email_pdf_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailpdf", "", "", "email_pdf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_pdf.php?export_ajax=S&nm_opc=pdf&nm_target=&nm_cor=cor&papel=1&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid&nm_all_modules=grid&password=n&summary_export_columns=N&origem=cons&language=es&conf_socor=S&nm_label_group=S&nm_all_cab=N&nm_all_label=N&&pdf_zip=Nnm_orient_grid=4&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['doc'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['doc'][] = "email_doc_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
      $Tem_word_res = "n";
          $nm_saida->saida("            <div id=\"div_email_doc_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemaildoc", "", "", "email_doc_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&export_ajax=S&nm_opc=doc_word&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['xls'][] = "email_xls_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_xls_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailxls", "", "", "email_xls_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=xls&sAdd=&nm_opc=xls&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['xml'][] = "email_xml_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_xml_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailxml", "", "", "email_xml_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=xml&sAdd=&nm_opc=xml&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['json'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['json'][] = "email_json_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_json_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailjson", "", "", "email_json_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=json&sAdd=&nm_opc=json&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['csv'][] = "email_csv_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_csv_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailcsv", "", "", "email_csv_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=csv&sAdd=&nm_opc=csv&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['rtf'][] = "email_rtf_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_rtf_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailrtf", "", "", "email_rtf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=rtf&sAdd=&nm_opc=rtf&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_bot) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_bot').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
              $this->nm_btn_exist['pdf'][] = "pdf_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid&nm_all_modules=grid&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=4&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
          if (is_file("grid_reporte_caja_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_reporte_caja_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_bot";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('busca', '0', '');", "nm_gp_move('busca', '0', '');", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] != "print") 
      {
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_reporte_caja_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_reporte_caja_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('busca', '0', '');", "nm_gp_move('busca', '0', '');", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao_print'] != "print") 
      {
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
              $this->nm_btn_exist['print'][] = "print_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_bot = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_bot')", "scBtnGrpShow('group_1_bot')", "sc_btgp_btn_group_1_bot", "", "Enviar al Correo", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['pdf'][] = "email_pdf_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
          $nm_saida->saida("            <div id=\"div_email_pdf_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailpdf", "", "", "email_pdf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_pdf.php?export_ajax=S&nm_opc=pdf&nm_target=&nm_cor=cor&papel=1&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid&nm_all_modules=grid&password=n&summary_export_columns=N&origem=cons&language=es&conf_socor=S&nm_label_group=S&nm_all_cab=N&nm_all_label=N&&pdf_zip=Nnm_orient_grid=4&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['doc'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['doc'][] = "email_doc_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
      $Tem_word_res = "n";
          $nm_saida->saida("            <div id=\"div_email_doc_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemaildoc", "", "", "email_doc_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&export_ajax=S&nm_opc=doc_word&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['xls'][] = "email_xls_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_xls_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailxls", "", "", "email_xls_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=xls&sAdd=&nm_opc=xls&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['xml'][] = "email_xml_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_xml_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailxml", "", "", "email_xml_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=xml&sAdd=&nm_opc=xml&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['json'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['json'][] = "email_json_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_json_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailjson", "", "", "email_json_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=json&sAdd=&nm_opc=json&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['csv'][] = "email_csv_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_csv_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailcsv", "", "", "email_csv_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=csv&sAdd=&nm_opc=csv&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $this->nm_btn_exist['rtf'][] = "email_rtf_bot";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_bot = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_email_rtf_bot\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bemailrtf", "", "", "email_rtf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&sType=rtf&sAdd=&nm_opc=rtf&nm_target=0&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'bot', 'app', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_bot) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_bot').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
              $this->nm_btn_exist['pdf'][] = "pdf_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=XX&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid&nm_all_modules=grid&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=4&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_reporte_caja&KeepThis=true&TB_iframe=true&modal=true", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
          if (is_file("grid_reporte_caja_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_reporte_caja_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full)
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if ($this->nmgp_botoes['exit'] == "on")
      {
          $this->nm_btn_exist['exit'][] = "sai_bot";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('busca', '0', '');", "nm_gp_move('busca', '0', '');", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_bot', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'] && $this->force_toolbar)
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
           $this->nmgp_embbed_placeholder_top();
       }
   }
   function nmgp_barra_bot()
   {
       if (isset($_SESSION['scriptcase']['proc_mobile']) && $_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_mobile();
       }
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_embbed_placeholder_bot();
           $this->nmgp_barra_bot_normal();
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
    function getFieldHighlight($filter_type, $field, $str_value, $str_value_original='')
    {
        $str_html_ini = '<div class="highlight">';
        $str_html_fim = '</div>';

        if($filter_type == 'advanced_search')
        {
            if (
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('fecha', 'cantidad'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
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
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE></TD>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_btn_disable()\r\n");
   $nm_saida->saida("   {\r\n");
   foreach ($this->nm_btn_disabled as $cod_btn => $st_btn) {
      if (isset($this->nm_btn_exist[$cod_btn]) && $st_btn == 'on') {
         foreach ($this->nm_btn_exist[$cod_btn] as $cada_id) {
       $nm_saida->saida("     $('#" . $cada_id . "').prop('onclick', null).off('click').addClass('disabled').removeAttr('href');\r\n");
       $nm_saida->saida("     $('#div_" . $cada_id . "').addClass('disabled');\r\n");
         }
      }
   }
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      window.onload = function() {\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_reporte_caja', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      }\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_reporte_caja\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_reporte_caja_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_reporte_caja_iframe_prt.php\" \r\n");
   $nm_saida->saida("                     target=\"jan_print\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"path_botoes\" value=\"" . $this->Ini->path_botoes . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"tp_print\" value=\"PC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"print\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_print\" value=\"PC\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_print\" value=\"PB\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fexport\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tp_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tot_xls\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_line\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_col\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_delim_dados\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_label_csv\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_tag\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_xml_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_format\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_json_label\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"AM\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_module_export\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_password\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      return ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_open_export(arq_export) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      window.location = arq_export;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt, ajax, chart_level, page_break_pdf, SC_module_export, use_pass_pdf, pdf_all_cab, pdf_all_label, pdf_label_group, pdf_zip) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"xml\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.SC_module_export.value = z;\r\n");
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['grid_reporte_caja_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_reporte_caja@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_print_conf(tp, cor, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fprint.tp_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_tipo_print.value = tp;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_cor_print.value = cor;\r\n");
   $nm_saida->saida("           document.Fprint.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fprint.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           if (password != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.Fprint.target = '_self';\r\n");
   $nm_saida->saida("               document.Fprint.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.open('','jan_print','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           document.Fprint.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xls_conf(tp_xls, SC_module_export, password, tot_xls, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"csv\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_line.value = delim_line;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_col.value = delim_col;\r\n");
   $nm_saida->saida("           document.Fexport.nm_delim_dados.value = delim_dados;\r\n");
   $nm_saida->saida("           document.Fexport.nm_label_csv.value = label_csv;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_reporte_caja/grid_reporte_caja_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_reporte_caja_export_ctrl.php\";\r\n");
   $nm_saida->saida("       document.Fexport.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var image = new Image();\r\n");
   $nm_saida->saida("       image.src = imagem;\r\n");
   $nm_saida->saida("       var viewer = new Viewer(image, {\r\n");
   $nm_saida->saida("           navbar: false,\r\n");
   $nm_saida->saida("           hidden: function () {\r\n");
   $nm_saida->saida("               viewer.destroy();\r\n");
   $nm_saida->saida("           },\r\n");
   $nm_saida->saida("       });\r\n");
   $nm_saida->saida("       viewer.show();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo2 + \"?nmgp_parms=\" + campo1, \"ScriptCase\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_reporte_caja']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (Obj_Form != Obj_Form1 && Obj_Form1)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form1.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_reporte_caja_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_reporte_caja']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_reporte_caja')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_reporte_caja', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
