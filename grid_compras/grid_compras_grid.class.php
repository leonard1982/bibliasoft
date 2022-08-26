<?php
class grid_compras_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
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
   var $nm_campos_cab = array();
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
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
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
   var $sum_total;
   var $sum_subtotal;
   var $sum_valoriva;
   var $sum_a_pagar;
   var $sum_val_ica;
   var $sum_val_ret;
   var $sum_val_retiva;
   var $idprov_Old;
   var $arg_sum_idprov;
   var $Label_idprov;
   var $sc_proc_quebra_idprov;
   var $count_idprov;
   var $sum_idprov_total;
   var $sum_idprov_subtotal;
   var $sum_idprov_valoriva;
   var $sum_idprov_a_pagar;
   var $sum_idprov_val_ica;
   var $sum_idprov_val_ret;
   var $sum_idprov_val_retiva;
   var $total_Old;
   var $arg_sum_total;
   var $Label_total;
   var $sc_proc_quebra_total;
   var $count_total;
   var $sum_total_total;
   var $sum_total_subtotal;
   var $sum_total_valoriva;
   var $sum_total_a_pagar;
   var $sum_total_val_ica;
   var $sum_total_val_ret;
   var $sum_total_val_retiva;
   var $fechacom_Old;
   var $arg_sum_fechacom;
   var $Label_fechacom;
   var $sc_proc_quebra_fechacom;
   var $count_fechacom;
   var $sum_fechacom_total;
   var $sum_fechacom_subtotal;
   var $sum_fechacom_valoriva;
   var $sum_fechacom_a_pagar;
   var $sum_fechacom_val_ica;
   var $sum_fechacom_val_ret;
   var $sum_fechacom_val_retiva;
   var $pagada_Old;
   var $arg_sum_pagada;
   var $Label_pagada;
   var $sc_proc_quebra_pagada;
   var $count_pagada;
   var $sum_pagada_total;
   var $sum_pagada_subtotal;
   var $sum_pagada_valoriva;
   var $sum_pagada_a_pagar;
   var $sum_pagada_val_ica;
   var $sum_pagada_val_ret;
   var $sum_pagada_val_retiva;
   var $asentada_Old;
   var $arg_sum_asentada;
   var $Label_asentada;
   var $sc_proc_quebra_asentada;
   var $count_asentada;
   var $sum_asentada_total;
   var $sum_asentada_subtotal;
   var $sum_asentada_valoriva;
   var $sum_asentada_a_pagar;
   var $sum_asentada_val_ica;
   var $sum_asentada_val_ret;
   var $sum_asentada_val_retiva;
   var $pagos;
   var $a_pagar;
   var $devolucion;
   var $val_ica;
   var $val_ret;
   var $val_retiva;
   var $base0;
   var $iva_0;
   var $base5;
   var $iva_5;
   var $base19;
   var $iva_19;
   var $tasa;
   var $idfaccom;
   var $numfacom;
   var $formapago;
   var $fechacom;
   var $fechavenc;
   var $pagada;
   var $idprov;
   var $total;
   var $asentada;
   var $subtotal;
   var $valoriva;
   var $observaciones;
   var $saldo;
   var $id_pedidocom;
   var $retencion;
   var $reteica;
   var $reteiva;
   var $cod_cuenta;
   var $look_asentada;
   var $grid_detallecompra;
   var $NM_cont_emb_linha;
//--- 
 function monta_grid($linhas = 0)
 {
   global $script_case_init, $nm_saida;
   $GLOBALS["script_case_init"] = $this->Ini->sc_page;

   clearstatcache();
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
       { 
          include_once($this->Ini->path_embutida . "grid_compras/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
          include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_compras_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
   } 
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (!is_file($this->Ini->link_grid_detallecompra_cons_emb))
   {
       $this->NM_cmp_hidden['detalle'] = "off";
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = true;
       $_SESSION['scriptcase']['grid_detallecompra']['protect_modal'] = $this->Ini->sc_page;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['exibe_titulos'] = "S";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['exibe_total'] = "S";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['exibe_seq'] = "S";
       include_once ($this->Ini->link_grid_detallecompra_cons_emb);
       $this->grid_detallecompra = new grid_detallecompra_apl ;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = false;
       unset($_SESSION['scriptcase']['grid_detallecompra']['protect_modal']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=3>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("      <TD id=\"div_refin_search\" class=\"scGridRefinedSearchPadding\" valign='top'>\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $this->html_interativ_search();
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refresh_interativ']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refresh_interativ'] == "S") {
                   $this->Ini->Arr_result['setValue'][] = array('field' => 'div_refin_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               }
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refresh_interativ']);
               $tb_disp = (!empty($this->nm_grid_sem_reg) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_int_search']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'TB_Interativ_Search', 'value' => $tb_disp);
           } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_int_search'] = false;
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("      <TD class=\"scGridRefinedSearchMolduraResult\" valign='top'>\r\n");
       $nm_saida->saida("       <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       } 
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_compras'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['save_grid']))
       {
           $this->refresh_interativ_search();
       }
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("       </table>\r\n");
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("     </TR>\r\n");
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_compras_grafico();
               $this->Graf->Db     = $this->Db;
               $this->Graf->Erro   = $this->Erro;
               $this->Graf->Ini    = $this->Ini;
               $this->Graf->Lookup = $this->Lookup;
               $this->Graf->monta_grafico();
               exit;
           }
           elseif ($Gera_res || $Gera_graf)
           {
               $this->Res->monta_html_ini_pdf();
               $this->Res->monta_resumo();
               $this->Res->monta_html_fim_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'];
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
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_compras/grid_compras_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] = "N";
   }
   $this->NM_cont_emb_linha = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['emb_linha'];
   $this->sc_proc_quebra_idprov = false;
   $this->sc_proc_quebra_total = false;
   $this->sc_proc_quebra_fechacom = false;
   $this->sc_proc_quebra_pagada = false;
   $this->sc_proc_quebra_asentada = false;
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_compras", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['exit'] = "on";
   $this->nmgp_botoes['first'] = "on";
   $this->nmgp_botoes['back'] = "on";
   $this->nmgp_botoes['forward'] = "on";
   $this->nmgp_botoes['last'] = "on";
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
   $this->nmgp_botoes['goto'] = "on";
   $this->nmgp_botoes['qtline'] = "on";
   $this->nmgp_botoes['navpage'] = "on";
   $this->nmgp_botoes['rows'] = "on";
   $this->nmgp_botoes['summary'] = "on";
   $this->nmgp_botoes['new']    = "on";
   $this->nmgp_botoes['insert'] = "on";
   $this->nmgp_botoes['sel_col'] = "on";
   $this->nmgp_botoes['sort_col'] = "on";
   $this->nmgp_botoes['qsearch'] = "on";
   $this->nmgp_botoes['groupby'] = "on";
   $this->nmgp_botoes['gridsave'] = "on";
   $this->nmgp_botoes['gridsavesession'] = "on";
   $this->nmgp_botoes['SC_btn_0'] = "on";
   $this->Cmps_ord_def['idfaccom'] = " desc";
   $this->Cmps_ord_def['numfacom'] = " asc";
   $this->Cmps_ord_def['formapago'] = " asc";
   $this->Cmps_ord_def['fechacom'] = " desc";
   $this->Cmps_ord_def['fechavenc'] = " desc";
   $this->Cmps_ord_def['pagada'] = " asc";
   $this->Cmps_ord_def['idprov'] = " desc";
   $this->Cmps_ord_def['total'] = " desc";
   $this->Cmps_ord_def['asentada'] = " desc";
   $this->Cmps_ord_def['subtotal'] = " desc";
   $this->Cmps_ord_def['valoriva'] = " desc";
   $this->Cmps_ord_def['observaciones'] = " asc";
   $this->Cmps_ord_def['saldo'] = " desc";
   $this->Cmps_ord_def['id_pedidocom'] = " desc";
   $this->Cmps_ord_def['retencion'] = " desc";
   $this->Cmps_ord_def['reteica'] = " desc";
   $this->Cmps_ord_def['reteiva'] = " desc";
   $this->Cmps_ord_def['cod_cuenta'] = " asc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->fechacom = $Busca_temp['fechacom']; 
       $tmp_pos = strpos($this->fechacom, "##@@");
       if ($tmp_pos !== false && !is_array($this->fechacom))
       {
           $this->fechacom = substr($this->fechacom, 0, $tmp_pos);
       }
       $fechacom_2 = $Busca_temp['fechacom_input_2']; 
       $this->fechacom_2 = $Busca_temp['fechacom_input_2']; 
       $this->numfacom = $Busca_temp['numfacom']; 
       $tmp_pos = strpos($this->numfacom, "##@@");
       if ($tmp_pos !== false && !is_array($this->numfacom))
       {
           $this->numfacom = substr($this->numfacom, 0, $tmp_pos);
       }
       $this->idprov = $Busca_temp['idprov']; 
       $tmp_pos = strpos($this->idprov, "##@@");
       if ($tmp_pos !== false && !is_array($this->idprov))
       {
           $this->idprov = substr($this->idprov, 0, $tmp_pos);
       }
       $this->pagada = $Busca_temp['pagada']; 
       $tmp_pos = strpos($this->pagada, "##@@");
       if ($tmp_pos !== false && !is_array($this->pagada))
       {
           $this->pagada = substr($this->pagada, 0, $tmp_pos);
       }
       $this->asentada = $Busca_temp['asentada']; 
       $tmp_pos = strpos($this->asentada, "##@@");
       if ($tmp_pos !== false && !is_array($this->asentada))
       {
           $this->asentada = substr($this->asentada, 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fechacom_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "muda_qt_linhas";
   } 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_compras'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_compras'];

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

   if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['insert'] != '')
   {
       $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['insert'];
       $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['insert'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['update'] != '')
   {
       $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['update'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['delete'] != '')
   {
       $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['fac_compras']['delete'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_compras/grid_compras_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_compras_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")  
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_compras_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] = 30;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']['idfaccom'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']['idprov']["idprov"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']['total']["total"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']['fechacom']["fechacom"] = "desc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']['pagada']["pagada"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']['asentada']["asentada"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']       = "igual" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['opcao_print'] = "print" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_total = 0;
   $this->sum_subtotal = 0;
   $this->sum_valoriva = 0;
   $this->sum_a_pagar = 0;
   $this->sum_val_ica = 0;
   $this->sum_val_ret = 0;
   $this->sum_val_retiva = 0;
   $this->arg_sum_idprov = "";
   $this->count_idprov = 0;
   $this->sum_idprov_total = 0;
   $this->sum_idprov_subtotal = 0;
   $this->sum_idprov_valoriva = 0;
   $this->sum_idprov_a_pagar = 0;
   $this->sum_idprov_val_ica = 0;
   $this->sum_idprov_val_ret = 0;
   $this->sum_idprov_val_retiva = 0;
   $this->arg_sum_total = "";
   $this->count_total = 0;
   $this->sum_total_total = 0;
   $this->sum_total_subtotal = 0;
   $this->sum_total_valoriva = 0;
   $this->sum_total_a_pagar = 0;
   $this->sum_total_val_ica = 0;
   $this->sum_total_val_ret = 0;
   $this->sum_total_val_retiva = 0;
   $this->arg_sum_fechacom = "";
   $this->count_fechacom = 0;
   $this->sum_fechacom_total = 0;
   $this->sum_fechacom_subtotal = 0;
   $this->sum_fechacom_valoriva = 0;
   $this->sum_fechacom_a_pagar = 0;
   $this->sum_fechacom_val_ica = 0;
   $this->sum_fechacom_val_ret = 0;
   $this->sum_fechacom_val_retiva = 0;
   $this->arg_sum_pagada = "";
   $this->count_pagada = 0;
   $this->sum_pagada_total = 0;
   $this->sum_pagada_subtotal = 0;
   $this->sum_pagada_valoriva = 0;
   $this->sum_pagada_a_pagar = 0;
   $this->sum_pagada_val_ica = 0;
   $this->sum_pagada_val_ret = 0;
   $this->sum_pagada_val_retiva = 0;
   $this->arg_sum_asentada = "";
   $this->count_asentada = 0;
   $this->sum_asentada_total = 0;
   $this->sum_asentada_subtotal = 0;
   $this->sum_asentada_valoriva = 0;
   $this->sum_asentada_a_pagar = 0;
   $this->sum_asentada_val_ica = 0;
   $this->sum_asentada_val_ret = 0;
   $this->sum_asentada_val_retiva = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "proveedor" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "total" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "fecha" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "pagada" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "asentada" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_") 
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] == "all") 
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'];
           $this->Tot->$Gb_geral();
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] ;  
           $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1];
       } 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total']);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
       { 
           $this->totaliza_php_proveedor() ; 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
       { 
           $this->totaliza_php_total() ; 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
       { 
           $this->totaliza_php_fecha() ; 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
       { 
           $this->totaliza_php_pagada() ; 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
       { 
           $this->totaliza_php_asentada() ; 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
       { 
           $this->totaliza_php__NM_SC_() ; 
       } 
       else 
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'];
           $this->Tot->$Gb_geral();
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "proveedor" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "total" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "fecha" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "pagada" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "asentada" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_") 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo']))  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "NAO";
           } 
       }
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] > 0) 
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
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
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
       $this->idfaccom = $this->rs_grid->fields[0] ;  
       $this->idfaccom = (string)$this->idfaccom;
       $this->numfacom = $this->rs_grid->fields[1] ;  
       $this->formapago = $this->rs_grid->fields[2] ;  
       $this->fechacom = $this->rs_grid->fields[3] ;  
       $this->fechavenc = $this->rs_grid->fields[4] ;  
       $this->pagada = $this->rs_grid->fields[5] ;  
       $this->idprov = $this->rs_grid->fields[6] ;  
       $this->idprov = (string)$this->idprov;
       $this->total = $this->rs_grid->fields[7] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
       $this->total = (string)$this->total;
       $this->asentada = $this->rs_grid->fields[8] ;  
       $this->asentada = (string)$this->asentada;
       $this->subtotal = $this->rs_grid->fields[9] ;  
       $this->subtotal =  str_replace(",", ".", $this->subtotal);
       $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
       $this->subtotal = (string)$this->subtotal;
       $this->valoriva = $this->rs_grid->fields[10] ;  
       $this->valoriva =  str_replace(",", ".", $this->valoriva);
       $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
       $this->valoriva = (string)$this->valoriva;
       $this->observaciones = $this->rs_grid->fields[11] ;  
       $this->saldo = $this->rs_grid->fields[12] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
       $this->saldo = (string)$this->saldo;
       $this->id_pedidocom = $this->rs_grid->fields[13] ;  
       $this->id_pedidocom = (string)$this->id_pedidocom;
       $this->retencion = $this->rs_grid->fields[14] ;  
       $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
       $this->retencion = (string)$this->retencion;
       $this->reteica = $this->rs_grid->fields[15] ;  
       $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
       $this->reteica = (string)$this->reteica;
       $this->reteiva = $this->rs_grid->fields[16] ;  
       $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
       $this->reteiva = (string)$this->reteiva;
       $this->cod_cuenta = $this->rs_grid->fields[17] ;  
       if (!isset($this->idprov)) { $this->idprov = ""; }
       if (!isset($this->total)) { $this->total = ""; }
       if (!isset($this->fechacom)) { $this->fechacom = ""; }
       if (!isset($this->pagada)) { $this->pagada = ""; }
       if (!isset($this->asentada)) { $this->asentada = ""; }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
           $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->arg_sum_fechacom = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechacom, $Format_tst, "fechacom");
           if (empty($this->fechacom))
           {
               $this->Tot->Sc_groupby_fechacom = "fechacom";
           }
           else
           {
               $this->Tot->Sc_groupby_fechacom = $this->Ini->Get_sql_date_groupby("fechacom", $Format_tst);
           }
       }
       if ($this->fechacom == "")
       {
           $this->arg_sum_fechacom = " is null";
       }
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
       {
           $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
       }
       $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
       $this->arg_sum_idprov = ($this->idprov == "") ? " is null " : " = " . $this->idprov;
       $this->arg_sum_total = ($this->total == "") ? " is null " : " = " . $this->total;
       $this->arg_sum_asentada = ($this->asentada == "") ? " is null " : " = " . $this->asentada;
       $this->look_asentada = $this->asentada; 
       $this->Lookup->lookup_asentada($this->look_asentada); 
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor") 
       {
           $this->idprov_Old = $this->idprov ; 
           $this->quebra_idprov_proveedor($this->idprov) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total") 
       {
           $this->total_Old = $this->total ; 
           $this->quebra_total_total($this->total) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha") 
       {
           $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
           $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
           $this->fechacom_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechacom, $Format_tst); 
           $this->quebra_fechacom_fecha($this->fechacom) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada") 
       {
           $this->pagada_Old = $this->pagada ; 
           $this->quebra_pagada_pagada($this->pagada) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada") 
       {
           $this->asentada_Old = $this->asentada ; 
           $this->quebra_asentada_asentada($this->asentada) ; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->idfaccom = $this->rs_grid->fields[0] ;  
           $this->numfacom = $this->rs_grid->fields[1] ;  
           $this->formapago = $this->rs_grid->fields[2] ;  
           $this->fechacom = $this->rs_grid->fields[3] ;  
           $this->fechavenc = $this->rs_grid->fields[4] ;  
           $this->pagada = $this->rs_grid->fields[5] ;  
           $this->idprov = $this->rs_grid->fields[6] ;  
           $this->total = $this->rs_grid->fields[7] ;  
           $this->asentada = $this->rs_grid->fields[8] ;  
           $this->subtotal = $this->rs_grid->fields[9] ;  
           $this->valoriva = $this->rs_grid->fields[10] ;  
           $this->observaciones = $this->rs_grid->fields[11] ;  
           $this->saldo = $this->rs_grid->fields[12] ;  
           $this->id_pedidocom = $this->rs_grid->fields[13] ;  
           $this->retencion = $this->rs_grid->fields[14] ;  
           $this->reteica = $this->rs_grid->fields[15] ;  
           $this->reteiva = $this->rs_grid->fields[16] ;  
           $this->cod_cuenta = $this->rs_grid->fields[17] ;  
           if (!isset($this->idprov)) { $this->idprov = ""; }
           if (!isset($this->total)) { $this->total = ""; }
           if (!isset($this->fechacom)) { $this->fechacom = ""; }
           if (!isset($this->pagada)) { $this->pagada = ""; }
           if (!isset($this->asentada)) { $this->asentada = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_compras']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_compras']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista Compras :: PDF</TITLE>
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
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pivot_charts']) : 0;
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
               grid_compras_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_compras_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_compras_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_compras_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_compras_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Lista Compras</TITLE>\r\n");
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
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/grp__NM__ico__NM__favicon.ico\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'] && !$this->Ini->sc_export_ajax)
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
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_compras_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_compras_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_compras_message.js\"></script>\r\n");
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/css/ui.dropdownchecklist.standalone.css\" type=\"text/css\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/dropdown_check_list/js/ui.dropdownchecklist.js\"></script>\r\n");
           $nm_saida->saida("        <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("          var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';\r\n");
           $nm_saida->saida("          var sc_tbLangClose = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("          var sc_tbLangEsc = \"" . html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) . "\";\r\n");
           $nm_saida->saida("        </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery.scInput2.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/bluebird.min.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
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
           $nm_saida->saida("   var Qsearch_ok = true;\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] != "on")
           {
               $nm_saida->saida("   Qsearch_ok = false;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid']) . ";\r\n");
           }
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     NM_btn_disable();\r\n");
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     \$('#SC_fast_search_top').keyup(function(e) {\r\n");
               $nm_saida->saida("       scQuickSearchKeyUp('top', e);\r\n");
               $nm_saida->saida("     });\r\n");
           }
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
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
           $nm_saida->saida("     if (!isScrollNav) {\r\n");
           $nm_saida->saida("       for (i = 1; i <= scQtReg; i++) {\r\n");
           $nm_saida->saida("         scJQAddEvents(i);\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ancor_save']);
           }
           if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
           {
               $nm_saida->saida("     scQuickSearchKeyUp('top', null);\r\n");
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scQuickSearchSubmit_top() {\r\n");
           $nm_saida->saida("     document.F0_top.nmgp_opcao.value = 'fast_search';\r\n");
           $nm_saida->saida("     document.F0_top.submit();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scQuickSearchKeyUp(sPos, e) {\r\n");
           $nm_saida->saida("     if (null != e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("         if ('top' == sPos) nm_gp_submit_qsearch('top');\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("       else\r\n");
           $nm_saida->saida("       {\r\n");
           $nm_saida->saida("           $('#SC_fast_search_submit_top').show();\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }\r\n");
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
           $nm_saida->saida("       url: \"grid_compras_save_grid.php\",\r\n");
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
$nm_saida->saida("      url: \"grid_compras_save_grid.php\",\r\n");
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_compras_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
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
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_compras_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['num_css'] . '.css');
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_compras_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_compras/grid_compras_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_compras/grid_compras_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_compras/grid_compras_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_compras_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] == "print")) 
       {
           if ($this->Print_All) 
           {
               $nm_saida->saida(" <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           }
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"-webkit-print-color-adjust: exact;" . $css_body . "\">\r\n");
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
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Proveedor", "idprov");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Total", "total");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("" . $this->Ini->Nm_lang['lang_othr_cons_title_YYYYMMDD2'] . "", "fechacom");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Pagada", "pagada");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Asentada", "asentada");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['cab_embutida'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['SC_herda_css'] = "S"; 
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       if (is_file($this->Ini->link_grid_detallecompra_cons_emb)) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['SC_herda_css'] = "S"; 
           $GLOBALS["script_case_init"] = $this->Ini->sc_page;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = true;
           $_SESSION['scriptcase']['grid_detallecompra']['protect_modal'] = $this->Ini->sc_page;
           include_once ($this->Ini->link_grid_detallecompra_cons_emb);
           $this->grid_detallecompra = new grid_detallecompra_sub_css ;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = false;
           unset($_SESSION['scriptcase']['grid_detallecompra']['protect_modal']);
       }
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_compras']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_compras']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_compras']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_compras']) . "_";
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

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida']) ? "grid_compras_" : "";
   $this->css_sep = " ";
   $this->css_idfaccom_label = $compl_css_emb . "css_idfaccom_label";
   $this->css_idfaccom_grid_line = $compl_css_emb . "css_idfaccom_grid_line";
   $this->css_numfacom_label = $compl_css_emb . "css_numfacom_label";
   $this->css_numfacom_grid_line = $compl_css_emb . "css_numfacom_grid_line";
   $this->css_formapago_label = $compl_css_emb . "css_formapago_label";
   $this->css_formapago_grid_line = $compl_css_emb . "css_formapago_grid_line";
   $this->css_fechacom_label = $compl_css_emb . "css_fechacom_label";
   $this->css_fechacom_grid_line = $compl_css_emb . "css_fechacom_grid_line";
   $this->css_fechavenc_label = $compl_css_emb . "css_fechavenc_label";
   $this->css_fechavenc_grid_line = $compl_css_emb . "css_fechavenc_grid_line";
   $this->css_pagada_label = $compl_css_emb . "css_pagada_label";
   $this->css_pagada_grid_line = $compl_css_emb . "css_pagada_grid_line";
   $this->css_pagos_label = $compl_css_emb . "css_pagos_label";
   $this->css_pagos_grid_line = $compl_css_emb . "css_pagos_grid_line";
   $this->css_idprov_label = $compl_css_emb . "css_idprov_label";
   $this->css_idprov_grid_line = $compl_css_emb . "css_idprov_grid_line";
   $this->css_total_label = $compl_css_emb . "css_total_label";
   $this->css_total_grid_line = $compl_css_emb . "css_total_grid_line";
   $this->css_asentada_label = $compl_css_emb . "css_asentada_label";
   $this->css_asentada_grid_line = $compl_css_emb . "css_asentada_grid_line";
   $this->css_detalle_label = $compl_css_emb . "css_detalle_label";
   $this->css_detalle_grid_line = $compl_css_emb . "css_detalle_grid_line";
   $this->css_subtotal_label = $compl_css_emb . "css_subtotal_label";
   $this->css_subtotal_grid_line = $compl_css_emb . "css_subtotal_grid_line";
   $this->css_valoriva_label = $compl_css_emb . "css_valoriva_label";
   $this->css_valoriva_grid_line = $compl_css_emb . "css_valoriva_grid_line";
   $this->css_observaciones_label = $compl_css_emb . "css_observaciones_label";
   $this->css_observaciones_grid_line = $compl_css_emb . "css_observaciones_grid_line";
   $this->css_saldo_label = $compl_css_emb . "css_saldo_label";
   $this->css_saldo_grid_line = $compl_css_emb . "css_saldo_grid_line";
   $this->css_id_pedidocom_label = $compl_css_emb . "css_id_pedidocom_label";
   $this->css_id_pedidocom_grid_line = $compl_css_emb . "css_id_pedidocom_grid_line";
   $this->css_retencion_label = $compl_css_emb . "css_retencion_label";
   $this->css_retencion_grid_line = $compl_css_emb . "css_retencion_grid_line";
   $this->css_reteica_label = $compl_css_emb . "css_reteica_label";
   $this->css_reteica_grid_line = $compl_css_emb . "css_reteica_grid_line";
   $this->css_reteiva_label = $compl_css_emb . "css_reteiva_label";
   $this->css_reteiva_grid_line = $compl_css_emb . "css_reteiva_grid_line";
   $this->css_cod_cuenta_label = $compl_css_emb . "css_cod_cuenta_label";
   $this->css_cod_cuenta_grid_line = $compl_css_emb . "css_cod_cuenta_grid_line";
   $this->css_a_pagar_label = $compl_css_emb . "css_a_pagar_label";
   $this->css_a_pagar_grid_line = $compl_css_emb . "css_a_pagar_grid_line";
   $this->css_devolucion_label = $compl_css_emb . "css_devolucion_label";
   $this->css_devolucion_grid_line = $compl_css_emb . "css_devolucion_grid_line";
   $this->css_val_ica_label = $compl_css_emb . "css_val_ica_label";
   $this->css_val_ica_grid_line = $compl_css_emb . "css_val_ica_grid_line";
   $this->css_val_ret_label = $compl_css_emb . "css_val_ret_label";
   $this->css_val_ret_grid_line = $compl_css_emb . "css_val_ret_grid_line";
   $this->css_val_retiva_label = $compl_css_emb . "css_val_retiva_label";
   $this->css_val_retiva_grid_line = $compl_css_emb . "css_val_retiva_grid_line";
   $this->css_base0_label = $compl_css_emb . "css_base0_label";
   $this->css_base0_grid_line = $compl_css_emb . "css_base0_grid_line";
   $this->css_iva_0_label = $compl_css_emb . "css_iva_0_label";
   $this->css_iva_0_grid_line = $compl_css_emb . "css_iva_0_grid_line";
   $this->css_base5_label = $compl_css_emb . "css_base5_label";
   $this->css_base5_grid_line = $compl_css_emb . "css_base5_grid_line";
   $this->css_iva_5_label = $compl_css_emb . "css_iva_5_label";
   $this->css_iva_5_grid_line = $compl_css_emb . "css_iva_5_grid_line";
   $this->css_base19_label = $compl_css_emb . "css_base19_label";
   $this->css_base19_grid_line = $compl_css_emb . "css_base19_grid_line";
   $this->css_iva_19_label = $compl_css_emb . "css_iva_19_label";
   $this->css_iva_19_grid_line = $compl_css_emb . "css_iva_19_grid_line";
 }  
 function cabecalho()
 {
     if($_SESSION['scriptcase']['proc_mobile'] && method_exists($this, 'cabecalho_mobile'))
     {
         $this->cabecalho_mobile();
     }
     else if(method_exists($this, 'cabecalho_normal'))
     {
         $this->cabecalho_normal();
     }
 }
// 
//----- 
 function cabecalho_normal()
 {
   global
          $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
   $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
   $Lim   = strlen($Str_date);
   $Ult   = "";
   $Arr_D = array();
   for ($I = 0; $I < $Lim; $I++)
   {
       $Char = substr($Str_date, $I, 1);
       if ($Char != $Ult)
       {
           $Arr_D[] = $Char;
       }
       $Ult = $Char;
   }
   $Prim = true;
   $Str  = "";
   foreach ($Arr_D as $Cada_d)
   {
       $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
       $Str .= $Cada_d;
       $Prim = false;
   }
   $Str = str_replace("a", "Y", $Str);
   $Str = str_replace("y", "Y", $Str);
   $nm_data_fixa = date($Str); 
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) 
     {
         if($this->Tem_tab_vert)
         {
           $nm_saida->saida("   <TD colspan=\"2\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
         else{
           $nm_saida->saida("   <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
         }
     }
     else{
           $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     }
   } 
   if ($this->Ini->Export_img_zip)
   {
       $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_cart_32.png";
       $img_LIN1_COL3 = "scriptcase__NM__ico__NM__shopping_cart_32.png";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img)
   {
       $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_cart_32.png";
       $tmp_img_word = fopen($loc_img_word, "rb");
       $reg_img_word = fread($tmp_img_word, filesize($loc_img_word));
       fclose($tmp_img_word);
       $img_LIN1_COL3 = "data:image/jpeg;base64," . base64_encode($reg_img_word);
   }
   else
   {
       $img_LIN1_COL3 = $this->NM_raiz_img . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_cart_32.png";
   }
   $nm_saida->saida("   <TABLE width=\"100%\" class=\"" . $this->css_scGridHeader . "\">\r\n");
   $nm_saida->saida("    <TR align=\"center\">\r\n");
   $nm_saida->saida("     <TD style=\"padding: 0px\">\r\n");
   $nm_saida->saida("      <TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\">\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" rowspan=\"3\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          Lista Compras\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("             <IMG SRC=\"" . $img_LIN1_COL3 . "\" BORDER=\"0\"/>\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          " . $nm_cab_filtro . "\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("       <TR valign=\"middle\">\r\n");
   $nm_saida->saida("        <TD align=\"left\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"center\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD style=\"font-size: 5px\">\r\n");
   $nm_saida->saida("          &nbsp; &nbsp;\r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("        <TD align=\"right\" class=\"" . $this->css_scGridHeaderFont . "\">\r\n");
   $nm_saida->saida("          \r\n");
   $nm_saida->saida("        </TD>\r\n");
   $nm_saida->saida("       </TR>\r\n");
   $nm_saida->saida("      </TABLE>\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_label'])
      { 
          if (!isset($_SESSION['scriptcase']['saida_var']) || !$_SESSION['scriptcase']['saida_var']) 
          { 
              $_SESSION['scriptcase']['saida_var']  = true;
              $_SESSION['scriptcase']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['scriptcase']['saida_html'];
              $_SESSION['scriptcase']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_compras__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_compras-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_19_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_19_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_19_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_label'])
     { 
         if (isset($_SESSION['scriptcase']['saida_var']) && $_SESSION['scriptcase']['saida_var'])
         { 
             $Cod_Html = $_SESSION['scriptcase']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_compras/grid_compras_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_compras_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['scriptcase']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['scriptcase']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
     $NM_seq_lab = 1;
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_idfaccom()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idfaccom'])) ? $this->New_label['idfaccom'] : "#"; 
   if (!isset($this->NM_cmp_hidden['idfaccom']) || $this->NM_cmp_hidden['idfaccom'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idfaccom_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idfaccom_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'idfaccom')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idfaccom')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_numfacom()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['numfacom'])) ? $this->New_label['numfacom'] : "Número"; 
   if (!isset($this->NM_cmp_hidden['numfacom']) || $this->NM_cmp_hidden['numfacom'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_numfacom_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_numfacom_label'] . "\" NOWRAP WIDTH=\"2px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'numfacom')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('numfacom')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_formapago()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['formapago'])) ? $this->New_label['formapago'] : "F.Pago"; 
   if (!isset($this->NM_cmp_hidden['formapago']) || $this->NM_cmp_hidden['formapago'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_formapago_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_formapago_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'formapago')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('formapago')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_fechacom()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fechacom'])) ? $this->New_label['fechacom'] : "Fecha"; 
   if (!isset($this->NM_cmp_hidden['fechacom']) || $this->NM_cmp_hidden['fechacom'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fechacom_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fechacom_label'] . "\" NOWRAP WIDTH=\"2px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'fechacom')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('fechacom')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_fechavenc()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
   if (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fechavenc_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fechavenc_label'] . "\" NOWRAP WIDTH=\"2px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'fechavenc')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('fechavenc')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_pagada()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
   if (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_pagada_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_pagada_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'pagada')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('pagada')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_pagos()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['pagos'])) ? $this->New_label['pagos'] : "Abonos"; 
   if (!isset($this->NM_cmp_hidden['pagos']) || $this->NM_cmp_hidden['pagos'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_pagos_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_pagos_label'] . "\" NOWRAP WIDTH=\"1px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_idprov()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idprov'])) ? $this->New_label['idprov'] : "Proveedor"; 
   if (!isset($this->NM_cmp_hidden['idprov']) || $this->NM_cmp_hidden['idprov'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idprov_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idprov_label'] . "\" NOWRAP WIDTH=\"5px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'idprov')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idprov')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_total()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
   if (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_total_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'total')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('total')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_asentada()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
   if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asentada_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asentada_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'asentada')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('asentada')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_subtotal()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
   if (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_subtotal_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_subtotal_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'subtotal')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('subtotal')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_valoriva()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
   if (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_valoriva_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_valoriva_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'valoriva')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('valoriva')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_observaciones()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_observaciones_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" NOWRAP WIDTH=\"5px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'observaciones')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('observaciones')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_saldo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_saldo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_saldo_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'saldo')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('saldo')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_id_pedidocom()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['id_pedidocom'])) ? $this->New_label['id_pedidocom'] : "Pedido"; 
   if (!isset($this->NM_cmp_hidden['id_pedidocom']) || $this->NM_cmp_hidden['id_pedidocom'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_id_pedidocom_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_id_pedidocom_label'] . "\" NOWRAP WIDTH=\"1px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'id_pedidocom')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('id_pedidocom')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_retencion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['retencion'])) ? $this->New_label['retencion'] : "Retención %"; 
   if (!isset($this->NM_cmp_hidden['retencion']) || $this->NM_cmp_hidden['retencion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_retencion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_retencion_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'retencion')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('retencion')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_reteica()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['reteica'])) ? $this->New_label['reteica'] : "Reteica"; 
   if (!isset($this->NM_cmp_hidden['reteica']) || $this->NM_cmp_hidden['reteica'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_reteica_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_reteica_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'reteica')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('reteica')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_reteiva()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['reteiva'])) ? $this->New_label['reteiva'] : "Reteiva"; 
   if (!isset($this->NM_cmp_hidden['reteiva']) || $this->NM_cmp_hidden['reteiva'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_reteiva_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_reteiva_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'reteiva')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('reteiva')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_cod_cuenta()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cod Cuenta"; 
   if (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cod_cuenta_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cod_cuenta_label'] . "\" NOWRAP>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_cmp'] == 'cod_cuenta')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_label'] == "desc")
          {
              $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos) || $this->Ini->Label_sort_pos == "right")
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span><IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/>";
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\"/><span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('cod_cuenta')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_a_pagar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['a_pagar'])) ? $this->New_label['a_pagar'] : "Val a Pagar"; 
   if (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_a_pagar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_a_pagar_label'] . "\" NOWRAP WIDTH=\"1px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_devolucion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['devolucion'])) ? $this->New_label['devolucion'] : "Devolución"; 
   if (!isset($this->NM_cmp_hidden['devolucion']) || $this->NM_cmp_hidden['devolucion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_devolucion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_devolucion_label'] . "\" NOWRAP WIDTH=\"8px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_val_ica()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['val_ica'])) ? $this->New_label['val_ica'] : "$ ReteICA"; 
   if (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_val_ica_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_val_ica_label'] . "\" NOWRAP WIDTH=\"2px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_val_ret()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['val_ret'])) ? $this->New_label['val_ret'] : "$ Retención"; 
   if (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_val_ret_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_val_ret_label'] . "\" NOWRAP WIDTH=\"8px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_val_retiva()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['val_retiva'])) ? $this->New_label['val_retiva'] : "$ ReteIVA"; 
   if (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_val_retiva_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_val_retiva_label'] . "\" NOWRAP WIDTH=\"2px\">" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_base0()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['base0'])) ? $this->New_label['base0'] : "Base 0%"; 
   if (!isset($this->NM_cmp_hidden['base0']) || $this->NM_cmp_hidden['base0'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_base0_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_base0_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_iva_0()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['iva_0'])) ? $this->New_label['iva_0'] : "IVA 0%"; 
   if (!isset($this->NM_cmp_hidden['iva_0']) || $this->NM_cmp_hidden['iva_0'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_iva_0_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_0_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_base5()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['base5'])) ? $this->New_label['base5'] : "Base 5%"; 
   if (!isset($this->NM_cmp_hidden['base5']) || $this->NM_cmp_hidden['base5'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_base5_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_base5_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_iva_5()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['iva_5'])) ? $this->New_label['iva_5'] : "IVA 5%"; 
   if (!isset($this->NM_cmp_hidden['iva_5']) || $this->NM_cmp_hidden['iva_5'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_iva_5_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_5_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_base19()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['base19'])) ? $this->New_label['base19'] : "Base 19%"; 
   if (!isset($this->NM_cmp_hidden['base19']) || $this->NM_cmp_hidden['base19'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_base19_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_base19_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_iva_19()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['iva_19'])) ? $this->New_label['iva_19'] : "IVA 19%"; 
   if (!isset($this->NM_cmp_hidden['iva_19']) || $this->NM_cmp_hidden['iva_19'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_iva_19_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_iva_19_label'] . "\" NOWRAP>" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ini_cor_grid']);
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
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['idfaccom'])) ? $this->New_label['idfaccom'] : "#"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['idfaccom'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['numfacom'])) ? $this->New_label['numfacom'] : "Número"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['numfacom'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['formapago'])) ? $this->New_label['formapago'] : "F.Pago"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['formapago'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fechacom'])) ? $this->New_label['fechacom'] : "Fecha"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['fechacom'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['fechavenc'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : "Pagada"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['pagada'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['pagos'])) ? $this->New_label['pagos'] : "Abonos"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['pagos'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idprov'])) ? $this->New_label['idprov'] : "Proveedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['idprov'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['total'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentada"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['asentada'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "Subtotal"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['subtotal'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['valoriva'])) ? $this->New_label['valoriva'] : "Valoriva"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['valoriva'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['observaciones'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['saldo'])) ? $this->New_label['saldo'] : "Saldo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['saldo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['id_pedidocom'])) ? $this->New_label['id_pedidocom'] : "Pedido"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['id_pedidocom'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['retencion'])) ? $this->New_label['retencion'] : "Retención %"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['retencion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['reteica'])) ? $this->New_label['reteica'] : "Reteica"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['reteica'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['reteiva'])) ? $this->New_label['reteiva'] : "Reteiva"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['reteiva'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cod_cuenta'])) ? $this->New_label['cod_cuenta'] : "Cod Cuenta"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['cod_cuenta'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['a_pagar'])) ? $this->New_label['a_pagar'] : "Val a Pagar"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['a_pagar'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['devolucion'])) ? $this->New_label['devolucion'] : "Devolución"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['devolucion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['val_ica'])) ? $this->New_label['val_ica'] : "$ ReteICA"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['val_ica'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['val_ret'])) ? $this->New_label['val_ret'] : "$ Retención"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['val_ret'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['val_retiva'])) ? $this->New_label['val_retiva'] : "$ ReteIVA"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['val_retiva'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['base0'])) ? $this->New_label['base0'] : "Base 0%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['base0'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['iva_0'])) ? $this->New_label['iva_0'] : "IVA 0%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['iva_0'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['base5'])) ? $this->New_label['base5'] : "Base 5%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['base5'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['iva_5'])) ? $this->New_label['iva_5'] : "IVA 5%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['iva_5'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['base19'])) ? $this->New_label['base19'] : "Base 19%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['base19'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['iva_19'])) ? $this->New_label['iva_19'] : "IVA 19%"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['labels']['iva_19'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_compras']['lig_edit'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_refresh'])
   {
       $this->refresh_interativ_search();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_refresh'] = false;
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_compras#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_A_grid_compras', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_D_grid_compras', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_E_grid_compras', 'value' => 'NM_Blank_Page.htm');
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_compras#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_compras#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf']) { 
    if ($this->pdf_all_cab != "S") {
        $this->cabecalho();
    }
    $nm_saida->saida("              <thead>\r\n");
    if ($this->pdf_all_cab == "S") {
        $this->cabecalho();
    }
    if ($this->pdf_all_label == "S") {
        $this->label_grid();
    }
}
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-dd702762\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['proveedor']['idprov'] = "S";
   $this->Break_pag_prt['proveedor']['idprov'] = "N";
   $this->Break_pag_pdf['total']['total'] = "S";
   $this->Break_pag_prt['total']['total'] = "N";
   $this->Break_pag_pdf['fecha']['fechacom'] = "S";
   $this->Break_pag_prt['fecha']['fechacom'] = "N";
   $this->Break_pag_pdf['pagada']['pagada'] = "S";
   $this->Break_pag_prt['pagada']['pagada'] = "N";
   $this->Break_pag_pdf['asentada']['asentada'] = "S";
   $this->Break_pag_prt['asentada']['asentada'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF'] = array();
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor") 
   {
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total") 
   {
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha") 
   {
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada") 
   {
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada") 
   {
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          $this->NM_cont_emb_linha++;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['emb_linha']++;
          if ($this->Ini->qual_linha == "impar")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['ini_cor_grid'] = "impar";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && !$this->Ini->sc_export_ajax)
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
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_compras_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->idfaccom = $this->rs_grid->fields[0] ;  
          $this->idfaccom = (string)$this->idfaccom;
          $this->numfacom = $this->rs_grid->fields[1] ;  
          $this->formapago = $this->rs_grid->fields[2] ;  
          $this->fechacom = $this->rs_grid->fields[3] ;  
          $this->fechavenc = $this->rs_grid->fields[4] ;  
          $this->pagada = $this->rs_grid->fields[5] ;  
          $this->idprov = $this->rs_grid->fields[6] ;  
          $this->idprov = (string)$this->idprov;
          $this->total = $this->rs_grid->fields[7] ;  
          $this->total =  str_replace(",", ".", $this->total);
          $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
          $this->total = (string)$this->total;
          $this->asentada = $this->rs_grid->fields[8] ;  
          $this->asentada = (string)$this->asentada;
          $this->subtotal = $this->rs_grid->fields[9] ;  
          $this->subtotal =  str_replace(",", ".", $this->subtotal);
          $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
          $this->subtotal = (string)$this->subtotal;
          $this->valoriva = $this->rs_grid->fields[10] ;  
          $this->valoriva =  str_replace(",", ".", $this->valoriva);
          $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
          $this->valoriva = (string)$this->valoriva;
          $this->observaciones = $this->rs_grid->fields[11] ;  
          $this->saldo = $this->rs_grid->fields[12] ;  
          $this->saldo =  str_replace(",", ".", $this->saldo);
          $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
          $this->saldo = (string)$this->saldo;
          $this->id_pedidocom = $this->rs_grid->fields[13] ;  
          $this->id_pedidocom = (string)$this->id_pedidocom;
          $this->retencion = $this->rs_grid->fields[14] ;  
          $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
          $this->retencion = (string)$this->retencion;
          $this->reteica = $this->rs_grid->fields[15] ;  
          $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
          $this->reteica = (string)$this->reteica;
          $this->reteiva = $this->rs_grid->fields[16] ;  
          $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
          $this->reteiva = (string)$this->reteiva;
          $this->cod_cuenta = $this->rs_grid->fields[17] ;  
          if (!isset($this->idprov)) { $this->idprov = ""; }
          if (!isset($this->total)) { $this->total = ""; }
          if (!isset($this->fechacom)) { $this->fechacom = ""; }
          if (!isset($this->pagada)) { $this->pagada = ""; }
          if (!isset($this->asentada)) { $this->asentada = ""; }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
          {
               $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
               $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->arg_sum_fechacom = $this->Ini->Get_date_arg_sum($TP_Time . $this->fechacom, $Format_tst, "fechacom");
               if (empty($this->fechacom))
               {
                   $this->Tot->Sc_groupby_fechacom = "fechacom";
               }
               else
               {
                   $this->Tot->Sc_groupby_fechacom = $this->Ini->Get_sql_date_groupby("fechacom", $Format_tst);
               }
          }
          if ($this->fechacom == "")
          {
              $this->arg_sum_fechacom = " is null";
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
          {
              $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
          }
          $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
          $this->arg_sum_idprov = ($this->idprov == "") ? " is null " : " = " . $this->idprov;
          $this->arg_sum_total = ($this->total == "") ? " is null " : " = " . $this->total;
          $this->arg_sum_asentada = ($this->asentada == "") ? " is null " : " = " . $this->asentada;
          $this->look_asentada = $this->asentada; 
          $this->Lookup->lookup_asentada($this->look_asentada); 
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final'] + 1; 
          $this->SC_sep_quebra = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
          if ($this->idprov !== $this->idprov_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor") 
          {  
              if (isset($this->idprov_Old))
              {
                  $this->quebra_idprov_proveedor_top() ; 
              }
              if (isset($this->idprov_Old))
              {
                  $this->quebra_idprov_proveedor_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]['idprov'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']['idprov'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->idprov_Old = $this->idprov ; 
              $this->quebra_idprov_proveedor($this->idprov) ; 
              $nm_houve_quebra = "S";
          } 
          if ($this->total !== $this->total_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total") 
          {  
              if (isset($this->total_Old))
              {
                  $this->quebra_total_total_top() ; 
              }
              if (isset($this->total_Old))
              {
                  $this->quebra_total_total_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]['total'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']['total'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->total_Old = $this->total ; 
              $this->quebra_total_total($this->total) ; 
              $nm_houve_quebra = "S";
          } 
          $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
          $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
          $Cmp_tst    = $this->Ini->Get_arg_groupby($TP_Time . $this->fechacom, $Format_tst);
          if ($Cmp_tst != $this->fechacom_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha") 
          {  
              if (isset($this->fechacom_Old))
              {
                  $this->quebra_fechacom_fecha_top() ; 
              }
              if (isset($this->fechacom_Old))
              {
                  $this->quebra_fechacom_fecha_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]['fechacom'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']['fechacom'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
              $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
              $this->fechacom_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->fechacom, $Format_tst);
              $this->quebra_fechacom_fecha($this->fechacom) ; 
              $nm_houve_quebra = "S";
          } 
          if ($this->pagada !== $this->pagada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada") 
          {  
              if (isset($this->pagada_Old))
              {
                  $this->quebra_pagada_pagada_top() ; 
              }
              if (isset($this->pagada_Old))
              {
                  $this->quebra_pagada_pagada_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]['pagada'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']['pagada'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->pagada_Old = $this->pagada ; 
              $this->quebra_pagada_pagada($this->pagada) ; 
              $nm_houve_quebra = "S";
          } 
          if ($this->asentada !== $this->asentada_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada") 
          {  
              if (isset($this->asentada_Old))
              {
                  $this->quebra_asentada_asentada_top() ; 
              }
              if (isset($this->asentada_Old))
              {
                  $this->quebra_asentada_asentada_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby']]['asentada'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Page_break_PDF']['asentada'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->asentada_Old = $this->asentada ; 
              $this->quebra_asentada_asentada($this->asentada) ; 
              $nm_houve_quebra = "S";
          } 
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}
if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}
if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}
if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));
$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "fechacom")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
                  } 
              }
              if ($temp == "fechavenc")
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
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_iva_19_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"  >&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_iva_19_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\" >\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_fac_compras']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_fac_compras'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["fac_compras"]) && $this->Ini->sc_lig_md5["fac_compras"] == "S")
              {
                  $Parms_Edt  = "idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?par_idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?par_idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_fac_compras . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'fac_compras', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_fac_compras . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'fac_compras', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\" ><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\"><img id=\"b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</td><td style=\"padding: 0px\">" . $Link_Edit . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_fac_compras']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_fac_compras'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["fac_compras"]) && $this->Ini->sc_lig_md5["fac_compras"] == "S")
              {
                  $Parms_Edt  = "idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?par_idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?par_idfaccom?#?" . str_replace('"', "@aspasd@", $this->idfaccom) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_fac_compras . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'fac_compras', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_fac_compras . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'fac_compras', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\" ><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\"><img id=\"b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</td></tr></table></TD>\r\n");
 } 
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf"){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\" ><img id=\"b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
              $this->NM_calc_span();
              $nm_saida->saida("</TR>\r\n");
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")
              { 
                  $nm_saida->saida("<TR  class=\"" . $this->css_line_back . "\" id=\"emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\"  style=\"display:none\">\r\n");
              } 
              else 
              { 
                  $nm_saida->saida("<TR  class=\"" . $this->css_line_back . "\" id=\"emb_grid_compras_linha_" . $this->NM_cont_emb_linha . "\"  style=\"display:''\">\r\n");
              } 
              $nm_saida->saida("<TD class=\"" . $this->css_line_fonf . "\" colspan=\"" . $this->NM_colspan . "\"><TABLE align=\"left\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
              $this->NM_grid_detalle();
              $nm_saida->saida("</TR></TABLE></TD>\r\n");
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
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
   if (method_exists($this->grid_detallecompra, "close_emb")) 
   {
       $this->grid_detallecompra->close_emb();
   }
   if (!$this->rs_grid->EOF) 
   { 
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $nm_saida->saida("    </TBODY>");
       }
   } 
   if ($this->rs_grid->EOF) 
   { 
       if (isset($this->idprov_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
       {
           $this->quebra_idprov_proveedor_top() ; 
       }
       if (isset($this->idprov_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
       {
           $this->quebra_idprov_proveedor_bot() ; 
       }
       if (isset($this->total_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
       {
           $this->quebra_total_total_top() ; 
       }
       if (isset($this->total_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
       {
           $this->quebra_total_total_bot() ; 
       }
       if (isset($this->fechacom_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
       {
           $this->quebra_fechacom_fecha_top() ; 
       }
       if (isset($this->fechacom_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
       {
           $this->quebra_fechacom_fecha_bot() ; 
       }
       if (isset($this->pagada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
       {
           $this->quebra_pagada_pagada_top() ; 
       }
       if (isset($this->pagada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
       {
           $this->quebra_pagada_pagada_bot() ; 
       }
       if (isset($this->asentada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
       {
           $this->quebra_asentada_asentada_top() ; 
       }
       if (isset($this->asentada_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
       {
           $this->quebra_asentada_asentada_bot() ; 
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_idfaccom()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idfaccom']) || $this->NM_cmp_hidden['idfaccom'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idfaccom)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idfaccom)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idfaccom', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idfaccom', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idfaccom_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idfaccom_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_idfaccom_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_numfacom()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['numfacom']) || $this->NM_cmp_hidden['numfacom'] != "off") { 
          $conteudo = sc_strip_script($this->numfacom); 
          $conteudo_original = sc_strip_script($this->numfacom); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numfacom', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numfacom', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_numfacom_grid_line . "\"  style=\"" . $this->Css_Cmp['css_numfacom_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"2px\"  HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_numfacom_@scinf_reporte_compra']) ? $this->Ini->sc_lig_target['C_@scinf_numfacom_@scinf_reporte_compra'] : (isset($this->Ini->sc_lig_target['C_@scinf_numfacom']) ? $this->Ini->sc_lig_target['C_@scinf_numfacom'] : null);
       if (isset($this->Ini->sc_lig_md5["reporte_compra"]) && $this->Ini->sc_lig_md5["reporte_compra"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?gcompra?#?" . str_replace("'", "@aspass@", $this->idfaccom) . "?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?gcompra?#?" . str_replace("'", "@aspass@", $this->idfaccom) . "?@?";
       }
   $nm_saida->saida("<a id=\"id_sc_field_numfacom_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_reporte_compra_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_blank') . "', 'inicio', '0', '0', '', 'reporte_compra', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_numfacom_grid_line . "\" style=\"" . $this->Css_Cmp['css_numfacom_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_numfacom_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_formapago()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['formapago']) || $this->NM_cmp_hidden['formapago'] != "off") { 
          $conteudo = sc_strip_script($this->formapago); 
          $conteudo_original = sc_strip_script($this->formapago); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'formapago', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'formapago', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_formapago_grid_line . "\"  style=\"" . $this->Css_Cmp['css_formapago_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_formapago_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_fechacom()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fechacom']) || $this->NM_cmp_hidden['fechacom'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fechacom)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fechacom)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechacom', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechacom', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fechacom_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fechacom_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"2px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_fechacom_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_fechavenc()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fechavenc)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fechavenc)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechavenc', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechavenc', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fechavenc_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fechavenc_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"2px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_fechavenc_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_pagada()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['pagada']) || $this->NM_cmp_hidden['pagada'] != "off") { 
          $conteudo = sc_strip_script($this->pagada); 
          $conteudo_original = sc_strip_script($this->pagada); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pagada', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pagada', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_pagada = "";
          if (isset($this->NM_field_style["pagada"]) && !empty($this->NM_field_style["pagada"]))
          {
              $Style_pagada .= $this->NM_field_style["pagada"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_pagada_grid_line . "\"  style=\"" . $this->Css_Cmp['css_pagada_grid_line'] . $Style_pagada . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_pagada_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_pagos()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['pagos']) || $this->NM_cmp_hidden['pagos'] != "off") { 
          $conteudo = $this->pagos; 
          $conteudo_original = $this->pagos; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__invoice_dollar_32.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__invoice_dollar_32.png";
                  $conteudo = "<img border=\"\" src=\"scriptcase__NM__ico__NM__invoice_dollar_32.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__invoice_dollar_32.png";
                  $tmp_pagos = fopen($loc_img_word, "rb"); 
                  $reg_pagos = fread($tmp_pagos, filesize($loc_img_word)); 
                  fclose($tmp_pagos);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_pagos) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__invoice_dollar_32.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pagos', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pagos', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_pagos_grid_line . "\"  style=\"" . $this->Css_Cmp['css_pagos_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_pagos_@scinf_grid_terceros_cuentas_detalle_pagofc']) ? $this->Ini->sc_lig_target['C_@scinf_pagos_@scinf_grid_terceros_cuentas_detalle_pagofc'] : (isset($this->Ini->sc_lig_target['C_@scinf_pagos']) ? $this->Ini->sc_lig_target['C_@scinf_pagos'] : null);
       if (isset($this->Ini->sc_lig_md5["grid_terceros_cuentas_detalle_pagofc"]) && $this->Ini->sc_lig_md5["grid_terceros_cuentas_detalle_pagofc"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?gncuenta?#?" . str_replace("'", "@aspass@", $this->cod_cuenta) . "?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?gncuenta?#?" . str_replace("'", "@aspass@", $this->cod_cuenta) . "?@?";
       }
   $nm_saida->saida("<a id=\"id_sc_field_pagos_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_terceros_cuentas_detalle_pagofc_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_blank') . "', 'inicio', '0', '0', '', 'grid_terceros_cuentas_detalle_pagofc', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_pagos_grid_line . "\" style=\"" . $this->Css_Cmp['css_pagos_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_pagos_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_idprov()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idprov']) || $this->NM_cmp_hidden['idprov'] != "off") { 
          $conteudo = sc_strip_script($this->idprov); 
          $conteudo_original = sc_strip_script($this->idprov); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idprov($conteudo) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idprov', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idprov', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idprov_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idprov_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"5px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_idprov_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_total()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->total)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->total)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'total', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'total', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_total_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_total_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asentada()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->look_asentada))); 
          $conteudo_original = trim(NM_encode_input(sc_strip_script($this->look_asentada))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'asentada', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'asentada', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_asentada = "";
          if (isset($this->NM_field_style["asentada"]) && !empty($this->NM_field_style["asentada"]))
          {
              $Style_asentada .= $this->NM_field_style["asentada"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asentada_grid_line . "\"  style=\"" . $this->Css_Cmp['css_asentada_grid_line'] . $Style_asentada . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_asentada_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_detalle()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['detalle']) || $this->NM_cmp_hidden['detalle'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->detalle)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->detalle)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'detalle', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'detalle', $str_tem_display, $conteudo_original); 
          } 
          $this->SC_nowrap = "";
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_detalle_grid_line . "\"  style=\"" . $this->Css_Cmp['css_detalle_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          if (!$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida_treeview'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")
          { 
              $link_div = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['ind_tree']++;
              $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['ind_tree'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detallecompra'][$this->NM_cont_body][1] = 'top';
              if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp)
              { 
                  $link_div  = "<img id=\"b_open_grid_detallecompra_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_grid_detallecompra_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detallecompra_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detallecompra, 'grid_detallecompra'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
                  $link_div .= "<img id=\"b_close_grid_detallecompra_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_grid_detallecompra_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detallecompra_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detallecompra, 'grid_detallecompra'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
              }
              $nm_saida->saida("<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">");
              $nm_saida->saida("<TR> <TD align=\"left\">");
              $nm_saida->saida("<DIV id=\"tbody_grid_detallecompra_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
              $nm_saida->saida($link_div . "</DIV></TD></TR>");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['ind_tree']++;
              $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['ind_tree'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detallecompra'][$this->NM_cont_body][1] = 'bot';
              $nm_saida->saida("<tr><td>");
              if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp)
              { 
                  $nm_saida->saida("<DIV id=\"tbody_grid_detallecompra_" . $this->NM_cont_body . "_bot\" style=\"display:none\">");
              }
              else
              { 
                  $nm_saida->saida("<DIV id=\"tbody_grid_detallecompra_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
              }
          }
          $GLOBALS["script_case_init"] = $this->Ini->sc_page;
          $GLOBALS["nmgp_parms"] = "nmgp_lig_edit_lapis?#?S?@?par_idfaccom?#?" . str_replace("'", "@aspass@", $this->idfaccom) . "?@?";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = true;
          if (method_exists($this->grid_detallecompra, "controle"))
          {
              $this->grid_detallecompra->controle();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $this->Ini->conectDB();
              $this->Db = $this->Ini->Db;
              $this->Tot->Db = $this->Db;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida'] = false;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['emb_lig_aba']))
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
              { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['emb_lig_aba'] = array_merge($this->Ini->Init_apl_lig, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['emb_lig_aba']);
              }
              else 
              { 
                 $this->Ini->Init_apl_lig = array_merge($this->Ini->Init_apl_lig, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['emb_lig_aba']);
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallecompra']['embutida_treeview'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] != "pdf")
          { 
              $nm_saida->saida("</DIV></td></tr>");
              $nm_saida->saida("</table>");
          }
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_subtotal()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['subtotal']) || $this->NM_cmp_hidden['subtotal'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->subtotal)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->subtotal)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'subtotal', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'subtotal', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_subtotal_grid_line . "\"  style=\"" . $this->Css_Cmp['css_subtotal_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_subtotal_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_valoriva()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['valoriva']) || $this->NM_cmp_hidden['valoriva'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->valoriva)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->valoriva)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'valoriva', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'valoriva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_valoriva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_valoriva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_valoriva_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_observaciones()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
          $conteudo = sc_strip_script($this->observaciones); 
          $conteudo_original = sc_strip_script($this->observaciones); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'observaciones', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'observaciones', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_observaciones_grid_line . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"5px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_observaciones_" . $this->SC_seq_page . "\">\r\n");
if (strlen($conteudo) > 15 && $conteudo != "&nbsp;") {
   $nm_saida->saida("" . sc_substr(strip_tags($conteudo), 0, 15) . nmButtonOutput($this->arr_buttons, "bqtd_bytes", "", "", "bobservaciones", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . str_replace('"', '&quot;', strip_tags($conteudo)) . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "") . "\r\n");
} else {
   $nm_saida->saida("$conteudo\r\n");
}
   $nm_saida->saida("</span></TD>\r\n");
      }
 }
 function NM_grid_saldo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['saldo']) || $this->NM_cmp_hidden['saldo'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->saldo)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->saldo)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'saldo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'saldo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_saldo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_saldo_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_saldo_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_id_pedidocom()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['id_pedidocom']) || $this->NM_cmp_hidden['id_pedidocom'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->id_pedidocom)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->id_pedidocom)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_id_pedidocom($conteudo) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'id_pedidocom', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'id_pedidocom', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_id_pedidocom_grid_line . "\"  style=\"" . $this->Css_Cmp['css_id_pedidocom_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_id_pedidocom_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_retencion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['retencion']) || $this->NM_cmp_hidden['retencion'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->retencion)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->retencion)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "2", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'retencion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'retencion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_retencion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_retencion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_retencion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_reteica()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['reteica']) || $this->NM_cmp_hidden['reteica'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->reteica)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->reteica)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'reteica', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'reteica', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_reteica_grid_line . "\"  style=\"" . $this->Css_Cmp['css_reteica_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_reteica_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_reteiva()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['reteiva']) || $this->NM_cmp_hidden['reteiva'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->reteiva)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->reteiva)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "3", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'reteiva', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'reteiva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_reteiva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_reteiva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_reteiva_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cod_cuenta()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cod_cuenta']) || $this->NM_cmp_hidden['cod_cuenta'] != "off") { 
          $conteudo = sc_strip_script($this->cod_cuenta); 
          $conteudo_original = sc_strip_script($this->cod_cuenta); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cod_cuenta', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cod_cuenta', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cod_cuenta_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cod_cuenta_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_cod_cuenta_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_a_pagar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['a_pagar']) || $this->NM_cmp_hidden['a_pagar'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->a_pagar)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->a_pagar)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'a_pagar', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'a_pagar', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_a_pagar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_a_pagar_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"1px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_a_pagar_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_devolucion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['devolucion']) || $this->NM_cmp_hidden['devolucion'] != "off") { 
          $FieldDisp = "";
      }
      else {
          $FieldDisp = "none";
      }
          $conteudo = $this->devolucion; 
          $conteudo_original = $this->devolucion; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__ic_assignment_return_128_28215.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__ic_assignment_return_128_28215.png";
                  $conteudo = "<img border=\"\" src=\"usr__NM__ico__NM__ic_assignment_return_128_28215.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__ic_assignment_return_128_28215.png";
                  $tmp_devolucion = fopen($loc_img_word, "rb"); 
                  $reg_devolucion = fread($tmp_devolucion, filesize($loc_img_word)); 
                  fclose($tmp_devolucion);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_devolucion) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/usr__NM__ico__NM__ic_assignment_return_128_28215.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'devolucion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'devolucion', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_devolucion_grid_line . "\"  style=\"display:" . $FieldDisp . ";" . $this->Css_Cmp['css_devolucion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"8px\"  HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_devolucion_@scinf_grid_dev_com']) ? $this->Ini->sc_lig_target['C_@scinf_devolucion_@scinf_grid_dev_com'] : (isset($this->Ini->sc_lig_target['C_@scinf_devolucion']) ? $this->Ini->sc_lig_target['C_@scinf_devolucion'] : null);
       if (isset($this->Ini->sc_lig_md5["grid_dev_com"]) && $this->Ini->sc_lig_md5["grid_dev_com"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?par_idfaccom?#?" . str_replace("'", "@aspass@", $this->idfaccom) . "?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?par_idfaccom?#?" . str_replace("'", "@aspass@", $this->idfaccom) . "?@?";
       }
   $nm_saida->saida("<a id=\"id_sc_field_devolucion_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_dev_com_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_self') . "', 'inicio', '0', '0', '', 'grid_dev_com', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_devolucion_grid_line . "\" style=\"display:" . $FieldDisp . ";" . $this->Css_Cmp['css_devolucion_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_devolucion_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
 }
 function NM_grid_val_ica()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['val_ica']) || $this->NM_cmp_hidden['val_ica'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->val_ica)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->val_ica)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'val_ica', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'val_ica', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_val_ica_grid_line . "\"  style=\"" . $this->Css_Cmp['css_val_ica_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"2px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_val_ica_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_val_ret()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['val_ret']) || $this->NM_cmp_hidden['val_ret'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->val_ret)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->val_ret)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'val_ret', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'val_ret', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_val_ret_grid_line . "\"  style=\"" . $this->Css_Cmp['css_val_ret_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"8px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_val_ret_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_val_retiva()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['val_retiva']) || $this->NM_cmp_hidden['val_retiva'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->val_retiva)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->val_retiva)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'val_retiva', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'val_retiva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_val_retiva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_val_retiva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  WIDTH=\"2px\"  HEIGHT=\"0px\"><span id=\"id_sc_field_val_retiva_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_base0()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['base0']) || $this->NM_cmp_hidden['base0'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->base0)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base0)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'base0', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base0', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_base0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base0_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_base0_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_iva_0()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['iva_0']) || $this->NM_cmp_hidden['iva_0'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->iva_0)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_0)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'iva_0', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_0', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_iva_0_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_0_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_iva_0_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_base5()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['base5']) || $this->NM_cmp_hidden['base5'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->base5)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base5)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'base5', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_base5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_base5_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_iva_5()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['iva_5']) || $this->NM_cmp_hidden['iva_5'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->iva_5)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_5)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'iva_5', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_5', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_iva_5_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_5_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_iva_5_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_base19()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['base19']) || $this->NM_cmp_hidden['base19'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->base19)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->base19)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'base19', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'base19', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_base19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_base19_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_base19_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_iva_19()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['iva_19']) || $this->NM_cmp_hidden['iva_19'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->iva_19)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->iva_19)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "1", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'iva_19', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'iva_19', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_iva_19_grid_line . "\"  style=\"" . $this->Css_Cmp['css_iva_19_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_iva_19_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 32;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_pdf'] == "pdf")
   {
       $this->NM_colspan--;
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
   {
       $this->NM_colspan--;
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
        $nm_saida->saida("</TABLE></TD></TR>\r\n");
        $this->Ini->nm_cont_lin = ($nm_parms == "pagina") ? 0 : 1;
        if ($this->Print_All)
        {
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['print_navigator'] == "Netscape")
            {
                $nm_saida->saida("</TABLE><TABLE id=\"main_table_grid\" style=\"page-break-before:always;\" align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
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
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_idprov_proveedor($idprov) 
 {
   global $tot_idprov;
   $this->sc_proc_quebra_idprov = true; 
   $conteudo = $idprov;
   $this->Lookup->lookup_proveedor_idprov($conteudo) ; 
   $tot_idprov[0] = $idprov;
   $tot_idprov[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][0];
   $tot_idprov[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][1];
   $tot_idprov[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][2];
   $tot_idprov[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][3];
   $tot_idprov[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][4];
   $tot_idprov[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][5];
   $tot_idprov[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][6];
   $tot_idprov[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'][$idprov][7];
   $conteudo = $tot_idprov[0] ;  
   $this->count_idprov = $tot_idprov[1];
   $this->sum_idprov_total = $tot_idprov[2];
   $this->sum_idprov_subtotal = $tot_idprov[3];
   $this->sum_idprov_valoriva = $tot_idprov[4];
   $this->sum_idprov_a_pagar = $tot_idprov[5];
   $this->sum_idprov_val_ica = $tot_idprov[6];
   $this->sum_idprov_val_ret = $tot_idprov[7];
   $this->sum_idprov_val_retiva = $tot_idprov[8];
   $this->campos_quebra_idprov = array(); 
   $conteudo = sc_strip_script($this->idprov); 
   $this->Lookup->lookup_proveedor_idprov($conteudo) ; 
   $this->campos_quebra_idprov[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idprov']))
   {
       $this->campos_quebra_idprov[0]['lab'] = $this->nmgp_label_quebras['idprov']; 
   }
   else
   {
   $this->campos_quebra_idprov[0]['lab'] = "Proveedor"; 
   }
   $this->sc_proc_quebra_idprov = false; 
 } 
 function quebra_total_total($total) 
 {
   global $tot_total;
   $this->sc_proc_quebra_total = true; 
   $tot_total[0] = $total;
   $tot_total[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][0];
   $tot_total[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][1];
   $tot_total[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][2];
   $tot_total[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][3];
   $tot_total[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][4];
   $tot_total[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][5];
   $tot_total[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][6];
   $tot_total[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'][$total][7];
   $conteudo = $tot_total[0] ;  
   $this->count_total = $tot_total[1];
   $this->sum_total_total = $tot_total[2];
   $this->sum_total_subtotal = $tot_total[3];
   $this->sum_total_valoriva = $tot_total[4];
   $this->sum_total_a_pagar = $tot_total[5];
   $this->sum_total_val_ica = $tot_total[6];
   $this->sum_total_val_ret = $tot_total[7];
   $this->sum_total_val_retiva = $tot_total[8];
   $this->campos_quebra_total = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->total)); 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $this->campos_quebra_total[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['total']))
   {
       $this->campos_quebra_total[0]['lab'] = $this->nmgp_label_quebras['total']; 
   }
   else
   {
   $this->campos_quebra_total[0]['lab'] = "Total"; 
   }
   $this->sc_proc_quebra_total = false; 
 } 
 function quebra_fechacom_fecha($fechacom) 
 {
   global $tot_fechacom;
   $TP_Time = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $fechacom = $this->Ini->Get_arg_groupby($TP_Time . $fechacom, 'YYYYMMDD2'); 
   $this->sc_proc_quebra_fechacom = true; 
   $tot_fechacom[0] = $fechacom;
   $tot_fechacom[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][0];
   $tot_fechacom[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][1];
   $tot_fechacom[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][2];
   $tot_fechacom[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][3];
   $tot_fechacom[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][4];
   $tot_fechacom[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][5];
   $tot_fechacom[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][6];
   $tot_fechacom[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'][$fechacom][7];
   $conteudo = $tot_fechacom[0] ;  
   $this->count_fechacom = $tot_fechacom[1];
   $this->sum_fechacom_total = $tot_fechacom[2];
   $this->sum_fechacom_subtotal = $tot_fechacom[3];
   $this->sum_fechacom_valoriva = $tot_fechacom[4];
   $this->sum_fechacom_a_pagar = $tot_fechacom[5];
   $this->sum_fechacom_val_ica = $tot_fechacom[6];
   $this->sum_fechacom_val_ret = $tot_fechacom[7];
   $this->sum_fechacom_val_retiva = $tot_fechacom[8];
   $this->campos_quebra_fechacom = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->fechacom)); 
   $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
   $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fechacom');
   $TP_Time    = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
   $conteudo = $this->Ini->GB_date_format($TP_Time . $conteudo, $Format_tst, $Prefix_dat); 
   $this->campos_quebra_fechacom[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['fechacom']))
   {
       $this->campos_quebra_fechacom[0]['lab'] = $this->nmgp_label_quebras['fechacom']; 
   }
   else
   {
   $this->campos_quebra_fechacom[0]['lab'] = "Fecha"; 
   }
   $this->sc_proc_quebra_fechacom = false; 
 } 
 function quebra_pagada_pagada($pagada) 
 {
   global $tot_pagada;
   $this->sc_proc_quebra_pagada = true; 
   $tot_pagada[0] = $pagada;
   $tot_pagada[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][0];
   $tot_pagada[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][1];
   $tot_pagada[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][2];
   $tot_pagada[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][3];
   $tot_pagada[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][4];
   $tot_pagada[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][5];
   $tot_pagada[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][6];
   $tot_pagada[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'][$pagada][7];
   $conteudo = $tot_pagada[0] ;  
   $this->count_pagada = $tot_pagada[1];
   $this->sum_pagada_total = $tot_pagada[2];
   $this->sum_pagada_subtotal = $tot_pagada[3];
   $this->sum_pagada_valoriva = $tot_pagada[4];
   $this->sum_pagada_a_pagar = $tot_pagada[5];
   $this->sum_pagada_val_ica = $tot_pagada[6];
   $this->sum_pagada_val_ret = $tot_pagada[7];
   $this->sum_pagada_val_retiva = $tot_pagada[8];
   $this->campos_quebra_pagada = array(); 
   $conteudo = sc_strip_script($this->pagada); 
   $this->campos_quebra_pagada[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['pagada']))
   {
       $this->campos_quebra_pagada[0]['lab'] = $this->nmgp_label_quebras['pagada']; 
   }
   else
   {
   $this->campos_quebra_pagada[0]['lab'] = "Pagada"; 
   }
   $this->sc_proc_quebra_pagada = false; 
 } 
 function quebra_asentada_asentada($asentada) 
 {
   global $tot_asentada;
   $this->sc_proc_quebra_asentada = true; 
   $conteudo = $asentada;
   $this->Lookup->lookup_asentada_asentada($conteudo) ; 
   $tot_asentada[0] = $asentada;
   $tot_asentada[1] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][0];
   $tot_asentada[2] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][1];
   $tot_asentada[3] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][2];
   $tot_asentada[4] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][3];
   $tot_asentada[5] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][4];
   $tot_asentada[6] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][5];
   $tot_asentada[7] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][6];
   $tot_asentada[8] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'][$asentada][7];
   $conteudo = $tot_asentada[0] ;  
   $this->count_asentada = $tot_asentada[1];
   $this->sum_asentada_total = $tot_asentada[2];
   $this->sum_asentada_subtotal = $tot_asentada[3];
   $this->sum_asentada_valoriva = $tot_asentada[4];
   $this->sum_asentada_a_pagar = $tot_asentada[5];
   $this->sum_asentada_val_ica = $tot_asentada[6];
   $this->sum_asentada_val_ret = $tot_asentada[7];
   $this->sum_asentada_val_retiva = $tot_asentada[8];
   $this->campos_quebra_asentada = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->asentada)); 
   $this->Lookup->lookup_asentada_asentada($conteudo) ; 
   $this->campos_quebra_asentada[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['asentada']))
   {
       $this->campos_quebra_asentada[0]['lab'] = $this->nmgp_label_quebras['asentada']; 
   }
   else
   {
   $this->campos_quebra_asentada[0]['lab'] = "Asentada"; 
   }
   $this->sc_proc_quebra_asentada = false; 
 } 
 function quebra_idprov_proveedor_top() 
 { global
          $idprov_ant_desc, 
          $nm_saida, $tot_idprov;
   $this->SC_tab_quebra = 0;
   $idprov_ant_desc = $this->campos_quebra_idprov[0]['cmp'];
   static $cont_quebra_idprov = 0; 
   $cont_quebra_idprov++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_compras_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_compras_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_idprov[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_idprov[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_idprov = "<table>"; 
   foreach ($this->campos_quebra_idprov as $cada_campo) 
   { 
       $this->Label_idprov .= "<tr>"; 
       $this->Label_idprov .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_idprov .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_idprov .= "</tr>"; 
   } 
   $this->Label_idprov .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_idprov . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idprov_proveedor_bot() 
 { global 
          $idprov_ant_desc, 
          $nm_saida, $tot_idprov;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $idprov_ant_desc = $this->campos_quebra_idprov[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $nm_sub_totais = "Al proveedor&nbsp;";
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $tot_idprov[3] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Subtotal:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[7] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Retención:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[6] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteICA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[4] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">IVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[8] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteIVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[2] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. Compras:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_idprov[5] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"   NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
 } 
 function quebra_total_total_top() 
 { global
          $total_ant_desc, 
          $nm_saida, $tot_total;
   $this->SC_tab_quebra = 0;
   $total_ant_desc = $this->campos_quebra_total[0]['cmp'];
   static $cont_quebra_total = 0; 
   $cont_quebra_total++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_compras_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_compras_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_total[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_total[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_total = "<table>"; 
   foreach ($this->campos_quebra_total as $cada_campo) 
   { 
       $this->Label_total .= "<tr>"; 
       $this->Label_total .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_total .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_total .= "</tr>"; 
   } 
   $this->Label_total .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_total . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_total_total_bot() 
 { global 
          $total_ant_desc, 
          $nm_saida, $tot_total;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $total_ant_desc = $this->campos_quebra_total[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $nm_sub_totais = "";
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $tot_total[3] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Subtotal:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[7] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Retención:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[6] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteICA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[4] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">IVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[8] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteIVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[2] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. Compras:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_total[5] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"   NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
 } 
 function quebra_fechacom_fecha_top() 
 { global
          $fechacom_ant_desc, 
          $nm_saida, $tot_fechacom;
   $this->SC_tab_quebra = 0;
   $fechacom_ant_desc = $this->campos_quebra_fechacom[0]['cmp'];
   static $cont_quebra_fechacom = 0; 
   $cont_quebra_fechacom++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_compras_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_compras_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_fechacom[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_fechacom[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_fechacom = "<table>"; 
   foreach ($this->campos_quebra_fechacom as $cada_campo) 
   { 
       $this->Label_fechacom .= "<tr>"; 
       $this->Label_fechacom .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_fechacom .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_fechacom .= "</tr>"; 
   } 
   $this->Label_fechacom .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_fechacom . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_fechacom_fecha_bot() 
 { global 
          $fechacom_ant_desc, 
          $nm_saida, $tot_fechacom;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $fechacom_ant_desc = $this->campos_quebra_fechacom[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $nm_sub_totais = "";
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $tot_fechacom[3] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Subtotal:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[7] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Retención:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[6] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteICA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[4] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">IVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[8] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteIVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[2] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. Compras:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_fechacom[5] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"   NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
 } 
 function quebra_pagada_pagada_top() 
 { global
          $pagada_ant_desc, 
          $nm_saida, $tot_pagada;
   $this->SC_tab_quebra = 0;
   $pagada_ant_desc = $this->campos_quebra_pagada[0]['cmp'];
   static $cont_quebra_pagada = 0; 
   $cont_quebra_pagada++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_compras_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_compras_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_pagada[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_pagada[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_pagada = "<table>"; 
   foreach ($this->campos_quebra_pagada as $cada_campo) 
   { 
       $this->Label_pagada .= "<tr>"; 
       $this->Label_pagada .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_pagada .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_pagada .= "</tr>"; 
   } 
   $this->Label_pagada .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_pagada . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_pagada_pagada_bot() 
 { global 
          $pagada_ant_desc, 
          $nm_saida, $tot_pagada;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $pagada_ant_desc = $this->campos_quebra_pagada[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $nm_sub_totais = "";
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $tot_pagada[3] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Subtotal:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[7] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Retención:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[6] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteICA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[4] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">IVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[8] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteIVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[2] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. Compras:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_pagada[5] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"   NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
 } 
 function quebra_asentada_asentada_top() 
 { global
          $asentada_ant_desc, 
          $nm_saida, $tot_asentada;
   $this->SC_tab_quebra = 0;
   $asentada_ant_desc = $this->campos_quebra_asentada[0]['cmp'];
   static $cont_quebra_asentada = 0; 
   $cont_quebra_asentada++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_compras_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_compras_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_compras_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_compras_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_compras, 'grid_compras'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_asentada[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_asentada[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_asentada = "<table>"; 
   foreach ($this->campos_quebra_asentada as $cada_campo) 
   { 
       $this->Label_asentada .= "<tr>"; 
       $this->Label_asentada .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_asentada .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_asentada .= "</tr>"; 
   } 
   $this->Label_asentada .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_asentada . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_compras'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_compras_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_asentada_asentada_bot() 
 { global 
          $asentada_ant_desc, 
          $nm_saida, $tot_asentada;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $asentada_ant_desc = $this->campos_quebra_asentada[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $nm_sub_totais = "";
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $tot_asentada[3] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Subtotal:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[7] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">Retención:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[6] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteICA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[4] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">IVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[8] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">ReteIVA:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[2] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. Compras:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $conteudo =  $tot_asentada[5] ; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; text-align: left;\">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridSubtotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"   NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
 } 
 function quebra_geral_proveedor_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_proveedor_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_proveedor(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 
 function quebra_geral_total_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_total_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_total(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 
 function quebra_geral_fecha_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_fecha_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_fecha(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 
 function quebra_geral_pagada_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_pagada_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_pagada(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 
 function quebra_geral_asentada_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_asentada_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php_asentada(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 
 function quebra_geral__NM_SC__top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral__NM_SC__bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->totaliza_php__NM_SC_(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   $nm_sub_totais = "";
   $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   $this->NM_calc_span();
   $colspan = $this->NM_colspan - 1;
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "<tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Subtotal:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#333300;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">Retención:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteICA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">IVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#0000FF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">ReteIVA:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#FF0033;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. Compras:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; color:#000033;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5]; 
   nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "1", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
   $nm_sub_totais .= "</tr><tr><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"left\" style=\"padding: 0px; spacing: 0px; border-width: 0px; \">V. a Pagar:</td><td class=\"<?php echo $this->css_scGridTotalFont ?>\" align=\"right\" style=\"padding: 0px; spacing: 0px; border-width: 0px; font-size:18px;background-color:#FFFFFF;font-weight:bold;\">" . $conteudo . "</td>";
   $nm_sub_totais = "<table style=\"padding: 0px; spacing: 2px; border-width: 0px;\">" . $nm_sub_totais . "</tr></table>";
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_sub_totais . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
 } 

   function totaliza_php_proveedor()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_idprov = $this->idprov;
         $this->Lookup->lookup_proveedor_idprov($this->GB_idprov); 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), sc_strip_script($this->GB_idprov), sc_strip_script($idprov_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "proveedor")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['idprov'] = $this->Res->array_total_idprov;
      }
   }


   function totaliza_php_total()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "0", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->GB_total)), NM_encode_input(sc_strip_script($total_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "total")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['total'] = $this->Res->array_total_total;
      }
   }


   function totaliza_php_fecha()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
         $fechacom_SV = $this->fechacom;
         $this->fechacom = $this->Ini->Get_arg_groupby($this->fechacom, $Format_tst);
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
     $Format_tst = $this->Ini->Get_Gb_date_format('fecha', 'fechacom');
     $Prefix_dat = $this->Ini->Get_Gb_prefix_date_format('fecha', 'fechacom');
     $TP_Time    = (in_array('fechacom', $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
     $this->fechacom = $this->Ini->GB_date_format($TP_Time . $fechacom_SV, $Format_tst, $Prefix_dat); 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->fechacom)), NM_encode_input(sc_strip_script($fechacom_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "fecha")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['fechacom'] = $this->Res->array_total_fechacom;
      }
   }


   function totaliza_php_pagada()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), sc_strip_script($this->pagada), sc_strip_script($pagada_orig));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "pagada")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['pagada'] = $this->Res->array_total_pagada;
      }
   }


   function totaliza_php_asentada()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         $this->Lookup->lookup_asentada_asentada($this->GB_asentada); 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)), NM_encode_input(sc_strip_script($this->GB_asentada)), NM_encode_input(sc_strip_script($asentada_orig)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "asentada")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['arr_total']['asentada'] = $this->Res->array_total_asentada;
      }
   }


   function totaliza_php__NM_SC_()
   {
      $this->sc_proc_grid = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq_filtro'];
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] == "OK")
      {
          return;
      }
      //----- 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, str_replace (convert(char(10),fechacom,102), '.', '-') + ' ' + convert(char(8),fechacom,20), str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, convert(char(23),fechacom,121), convert(char(23),fechavenc,121), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, EXTEND(fechacom, YEAR TO DAY), EXTEND(fechavenc, YEAR TO DAY), pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
         $nmgp_select = "SELECT idfaccom, numfacom, formapago, fechacom, fechavenc, pagada, idprov, total, asentada, subtotal, valoriva, observaciones, saldo, id_pedidocom, retencion, reteica, reteiva, cod_cuenta from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'] ; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['order_grid'] = $nmgp_order_by;
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
      if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }  
      if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
      { 
         $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
         return;
      }  
      $this->Res->inicializa_arrays();
      $this->nm_grid_colunas = 0;
      while (!$this->rs_grid->EOF) 
      {
         $this->idfaccom = $this->rs_grid->fields[0] ;  
         $this->idfaccom = (string)$this->idfaccom;  
         $this->numfacom = $this->rs_grid->fields[1] ;  
         $this->formapago = $this->rs_grid->fields[2] ;  
         $this->fechacom = $this->rs_grid->fields[3] ;  
         $this->fechavenc = $this->rs_grid->fields[4] ;  
         $this->pagada = $this->rs_grid->fields[5] ;  
         $this->idprov = $this->rs_grid->fields[6] ;  
         $this->idprov = (string)$this->idprov;  
         $this->rs_grid->fields[7] =  str_replace(",", ".", $this->rs_grid->fields[7]);  
         $this->total = $this->rs_grid->fields[7] ;  
         $this->total = (strpos(strtolower($this->total), "e")) ? (float)$this->total : $this->total; 
         $this->total = (string)$this->total;  
         $this->asentada = $this->rs_grid->fields[8] ;  
         $this->asentada = (string)$this->asentada;  
         $this->rs_grid->fields[9] =  str_replace(",", ".", $this->rs_grid->fields[9]);  
         $this->subtotal = $this->rs_grid->fields[9] ;  
         $this->subtotal = (strpos(strtolower($this->subtotal), "e")) ? (float)$this->subtotal : $this->subtotal; 
         $this->subtotal = (string)$this->subtotal;  
         $this->rs_grid->fields[10] =  str_replace(",", ".", $this->rs_grid->fields[10]);  
         $this->valoriva = $this->rs_grid->fields[10] ;  
         $this->valoriva = (strpos(strtolower($this->valoriva), "e")) ? (float)$this->valoriva : $this->valoriva; 
         $this->valoriva = (string)$this->valoriva;  
         $this->observaciones = $this->rs_grid->fields[11] ;  
         $this->rs_grid->fields[12] =  str_replace(",", ".", $this->rs_grid->fields[12]);  
         $this->saldo = $this->rs_grid->fields[12] ;  
         $this->saldo = (strpos(strtolower($this->saldo), "e")) ? (float)$this->saldo : $this->saldo; 
         $this->saldo = (string)$this->saldo;  
         $this->id_pedidocom = $this->rs_grid->fields[13] ;  
         $this->id_pedidocom = (string)$this->id_pedidocom;  
         $this->retencion = $this->rs_grid->fields[14] ;  
         $this->retencion = (strpos(strtolower($this->retencion), "e")) ? (float)$this->retencion : $this->retencion; 
         $this->retencion = (string)$this->retencion;  
         $this->reteica = $this->rs_grid->fields[15] ;  
         $this->reteica = (strpos(strtolower($this->reteica), "e")) ? (float)$this->reteica : $this->reteica; 
         $this->reteica = (string)$this->reteica;  
         $this->reteiva = $this->rs_grid->fields[16] ;  
         $this->reteiva = (strpos(strtolower($this->reteiva), "e")) ? (float)$this->reteiva : $this->reteiva; 
         $this->reteiva = (string)$this->reteiva;  
         $this->cod_cuenta = $this->rs_grid->fields[17] ;  
         $idprov_orig = $this->idprov;
         $total_orig = $this->total;
         $fechacom_orig = $this->fechacom;
         $pagada_orig = $this->pagada;
         $asentada_orig = $this->asentada;
         $_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'on';
 if($this->asentada ==1)
{
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='SI')
{
	$this->NM_field_style["pagada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

if($this->pagada =='AB')
{
	$this->NM_field_style["pagada"] = "background-color:#adcbdf;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}

$vTasaRet=0;
$vTasaIca=0;
$vTRetIVA=0;
$vNumNota=0;
if(floatval($this->total )<0)
{
	$this->observaciones ="NOTA DE DEVOLUCIÓN";
	 
      $nm_select = "select num_ndevolucion from facturacom where idfaccom='".$this->idfaccom  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_com = array();
     if ($this->idfaccom !== "")
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
                        $this->ds_com[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_com = false;
          $this->ds_com_erro = $this->Db->ErrorMsg();
      } 
     } 
;
	if(isset($this->ds_com[0][0]))
	{
		$vNumNota=$this->ds_com[0][0];
		$this->numfacom =$this->numfacom .'-'."ND-".$vNumNota;
	}
}
else
{
}


if(floatval($this->retencion )>0)
	{
	$vTasaRet=round((floatval($this->retencion )/100), 3);
	$this->val_ret =round((floatval($this->subtotal )*$vTasaRet), 0);
	}
else
	{
	$this->val_ret =0;
	}

if(floatval($this->reteica )>0)
	{
	$vTasaIca=floatval($this->reteica );
	$this->val_ica =round(((floatval($this->subtotal )*$vTasaIca)/1000), 0);
	}
else
	{
	$this->val_ica =0;
	}

if(floatval($this->reteiva )>0)
	{
	$vTRetIVA=round((floatval($this->reteiva )/100), 3);
	$this->val_retiva =round((floatval($this->valoriva )*$vTRetIVA), 0);
	}
else
	{
	$this->val_retiva =0;
	}
$this->a_pagar =floatval($this->total )-(floatval($this->val_ret )+floatval($this->val_ica )+floatval($this->val_retiva ));

$sql = "SELECT sum(valorpar) as base, sum(iva) as eliva, tasaiva from detallecompra where idfaccom = $this->idfaccom  GROUP BY tasaiva";
 
      $nm_select = $sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dt = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
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
if(isset($this->dt[0][0]))
	{
	$i=0;
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	foreach($this->dt  as $adt)
		{
		$i=$i+1;
		if($adt[2]==0 and $this->base5 ==0 and $this->base19 ==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==0)
			{
			$this->base0  = $adt[0];
			$this->iva_0  = $adt[1];
			}
		if($adt[2]==5 and $this->base0  and $this->base19 ==0 )
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			$this->base0  = 0;
			$this->iva_0  = 0;
			$this->base19  = 0;
			$this->iva_19  = 0;
			}
		else if($adt[2]==5)
			{
			$this->base5  = $adt[0];
			$this->iva_5  = $adt[1];
			}
		if($adt[2]==19 and $this->base0  and $this->base5 ==0)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			$this->base5  = 0;
			$this->iva_5  = 0;
			$this->base0  = 0;
			$this->iva_0  = 0;
			}
		else if($adt[2]==19)
			{
			$this->base19  = $adt[0];
			$this->iva_19  = $adt[1];
			}
		
		}
		
	}
else
	{
	$this->base0  = 0;
	$this->iva_0  = 0;
	$this->tasa  = 0;
	$this->base5  = 0;
	$this->iva_5  = 0;
	$this->base19  = 0;
	$this->iva_19  = 0;
	
	}
$_SESSION['scriptcase']['grid_compras']['contr_erro'] = 'off';
         $this->arg_sum_fechacom = " = " . $this->Db->qstr($this->fechacom);
         $this->arg_sum_pagada = " = " . $this->Db->qstr($this->pagada);
         $this->arg_sum_idprov = " = " . $this->idprov;
         $this->arg_sum_total = " = " . $this->total;
         $this->arg_sum_asentada = " = " . $this->asentada;
         $this->Lookup->lookup_idprov($this->idprov) ; 
         $this->Lookup->lookup_asentada($this->asentada); 
         $this->GB_id_pedidocom = $this->id_pedidocom;
         $this->Lookup->lookup_id_pedidocom($this->GB_id_pedidocom) ; 
         $this->a_pagar = (strpos(strtolower($this->a_pagar), "e")) ? (float)$this->a_pagar : $this->a_pagar; 
         $this->a_pagar = (string)$this->a_pagar;  
         $this->val_ica = (strpos(strtolower($this->val_ica), "e")) ? (float)$this->val_ica : $this->val_ica; 
         $this->val_ica = (string)$this->val_ica;  
         $this->val_ret = (strpos(strtolower($this->val_ret), "e")) ? (float)$this->val_ret : $this->val_ret; 
         $this->val_ret = (string)$this->val_ret;  
         $this->val_retiva = (strpos(strtolower($this->val_retiva), "e")) ? (float)$this->val_retiva : $this->val_retiva; 
         $this->val_retiva = (string)$this->val_retiva;  
         $conteudo_x =  $this->fechacom;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->fechacom, "YYYY-MM-DD  ");
             $this->fechacom = $this->nm_data->FormataSaida("ddmmaaaa");
         } 
         $this->GB_total = $this->total;
         nmgp_Form_Num_Val($this->GB_total, "", "", "", "", "", "", "V::", "") ; 
         $this->GB_asentada = $this->asentada;
         nmgp_Form_Num_Val($this->GB_asentada, "", "", "0", "", "", "", "N:", "") ; 
         $this->Res->adiciona_registro(NM_encode_input(sc_strip_script($this->total)), NM_encode_input(sc_strip_script($this->subtotal)), NM_encode_input(sc_strip_script($this->valoriva)), NM_encode_input(sc_strip_script($this->a_pagar)), NM_encode_input(sc_strip_script($this->val_ica)), NM_encode_input(sc_strip_script($this->val_ret)), NM_encode_input(sc_strip_script($this->val_retiva)));
         $this->rs_grid->MoveNext();
      }
      $this->Res->finaliza_arrays();
      $this->rs_grid->Close();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][2] = $this->Res->array_total_geral[1];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][3] = $this->Res->array_total_geral[2];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][4] = $this->Res->array_total_geral[3];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][5] = $this->Res->array_total_geral[4];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][6] = $this->Res->array_total_geral[5];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][7] = $this->Res->array_total_geral[6];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][8] = $this->Res->array_total_geral[7];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_array_resumo'] = "OK";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][0] = "Total compras";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['tot_geral'][1] = $this->Res->array_total_geral[0];
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['contr_total_geral'] = "OK";
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
   function nmgp_barra_top_normal()
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"30\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_compras&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $Xls_mod_export = "grid";
          if ($Tem_xls_res == "n")
          {
              $Xls_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $Xml_mod_export = "grid";
          if ($Tem_xml_res == "n")
          {
              $Xml_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $Csv_mod_export = "";
          if ($Tem_csv_res == "n")
          {
              $Csv_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_1";
              $nm_saida->saida("          <img id=\"NM_sep_1\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["fac_compras"]) && $this->Ini->sc_lig_md5["fac_compras"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_fac_compras . "', '$this->nm_location', '$Md5_Lig', '_self', 'fac_compras'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_fac_compras . "', '$this->nm_location', '$Md5_Lig', '_self', 'fac_compras'); return false;;", "sc_b_new_top", "", "Nueva Compra", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "Registrar compra", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
          }
        }
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
              $NM_btn = true;
      }
          if (is_file("grid_compras_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_compras_help.txt"); 
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
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_bot_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn  = false;
      $NM_Gbtn = false;
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value);\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 30) ? " selected" : "";
              $nm_saida->saida("           <option value=\"30\" " . $obj_sel . ">30</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
              $Link_ini   = 1;
              if ($Page_Atu > $Max_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              elseif ($Page_Atu > $Mid_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              if (($Qtd_Pages - $Link_ini) < $Max_link)
              {
                  $Link_ini = ($Qtd_Pages - $Max_link) + 1;
              }
              if ($Link_ini < 1)
              {
                  $Link_ini = 1;
              }
              for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
              {
                  $rec = (($Link_ini - 1) * $Reg_Page) + 1;
                  if ($Link_ini == $Page_Atu)
                  {
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_compras_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_compras_help.txt"); 
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
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
          {
              $this->Ini->Arr_result['setVar'][] = array('var' => 'change_fast_top', 'value' => "");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_cmp))
          {
              $OPC_cmp = NM_conv_charset($OPC_cmp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_arg))
          {
              $OPC_arg = NM_conv_charset($OPC_arg, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($OPC_dat))
          {
              $OPC_dat = NM_conv_charset($OPC_dat, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
          $nm_saida->saida("          <input type=\"hidden\"  id=\"fast_search_f0_top\" name=\"nmgp_fast_search\" value=\"SC_all_Cmp\">\r\n");
          $nm_saida->saida("          <select id=\"cond_fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;display:none;\" name=\"nmgp_cond_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $OPC_sel = " selected='selected'";
          $nm_saida->saida("           <option value=\"qp\"$OPC_sel>" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>\r\n");
          $nm_saida->saida("          </select>\r\n");
          $nm_saida->saida("          <span id=\"quicksearchph_top\" class=\"" . $this->css_css_toolbar_obj . "\" style='display: inline-block; vertical-align: inherit;'>\r\n");
          $nm_saida->saida("           <span>\r\n");
          $nm_saida->saida("             <input type=\"text\" id=\"SC_fast_search_top\" class=\"" . $this->css_css_toolbar_obj . "_text\" style=\"border-width: 0px;\" name=\"nmgp_arg_fast_search\" value=\"" . NM_encode_input($OPC_dat) . "\" size=\"30\" onChange=\"change_fast_top = 'CH';\" alt=\"{maxLength: 255}\" placeholder=\"" . $this->Ini->Nm_lang['lang_othr_qk_watermark'] . "\">&nbsp;\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconSearch . "\" id=\"SC_fast_search_submit_top\" class='css_toolbar_obj_qs_search_img' src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_search . "\" onclick=\"nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("             <img style=\"display: " . $stateSearchIconClose . "\" class='css_toolbar_obj_qs_search_img' id=\"SC_fast_search_close_top\" src=\"" . $this->Ini->path_botoes . "/" . $this->Ini->Img_qs_clean . "\" onclick=\"document.getElementById('SC_fast_search_top').value = '__Clear_Fast__'; nm_gp_submit_qsearch('top');\">\r\n");
          $nm_saida->saida("            </span>\r\n");
          $nm_saida->saida("          </span>");
          $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $UseAlias =  "N";
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $UseAlias =  "N";
          }
          else
          {
              $UseAlias =  "S";
          }
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_compras/grid_compras_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Groupby_hide']))
              {
                  $Q_count++;
                  if ($QB == "sc_free_group_by")
                  {
                      $Q_free = true;
                  }
              }
          }
          if ($Q_count > 1 || $Q_free)
          {
              $this->nm_btn_exist['groupby'][] = "sel_groupby_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_compras/grid_compras_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
      }
      if ($this->nmgp_botoes['group_1'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_1_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_1", "scBtnGrpShow('group_1_top')", "scBtnGrpShow('group_1_top')", "sc_btgp_btn_group_1_top", "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_expt'] . "", "", "", "__sc_grp__", "text_img", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_compras&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_xls_res = "n";
          }
          $Xls_mod_export = "grid";
          if ($Tem_xls_res == "n")
          {
              $Xls_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xls_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xls'][] = "xls_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xls', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_xml_res = "n";
          }
          $Xml_mod_export = "grid";
          if ($Tem_xml_res == "n")
          {
              $Xml_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_xml_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['xml'][] = "xml_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bxml", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "nm_gp_xml_conf('tag','N','$Xml_mod_export','');", "xml_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_csv_res = "n";
          }
          $Csv_mod_export = "";
          if ($Tem_csv_res == "n")
          {
              $Csv_mod_export = "grid";
          }
          $nm_saida->saida("            <div id=\"div_csv_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['csv'][] = "csv_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcsv", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "nm_gp_csv_conf('1','1','1','N','$Csv_mod_export','');", "csv_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_rtf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['rtf'][] = "rtf_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "brtf", "nm_gp_rtf_conf();", "nm_gp_rtf_conf();", "rtf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_compras/grid_compras_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_1", 'group_1', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_1_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_1_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
      }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_2";
              $nm_saida->saida("          <img id=\"NM_sep_2\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["fac_compras"]) && $this->Ini->sc_lig_md5["fac_compras"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_fac_compras . "', '$this->nm_location', '$Md5_Lig', '_self', 'fac_compras'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_fac_compras . "', '$this->nm_location', '$Md5_Lig', '_self', 'fac_compras'); return false;;", "sc_b_new_top", "", "Nueva Compra", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "Registrar compra", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
          }
        }
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
              $NM_btn = true;
      }
          if (is_file("grid_compras_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_compras_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_psq'])
      {
          $this->nm_btn_exist['exit'][] = "sai_top";
         if ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
         elseif (!$this->Ini->SC_Link_View && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") 
         { 
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit();", "document.F5.action='$nm_url_saida'; document.F5.submit();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
         } 
      }
      elseif ($this->nmgp_botoes['exit'] == "on")
      {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal'])
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove()", "self.parent.tb_remove()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
        else
        {
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
        }
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
      }
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
      $this->NM_calc_span();
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_bot\" name=\"F0_bot\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_bot\" name=\"sc_truta_f0_bot\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_bot\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_bot\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_bot\"  colspan=3 class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'];
              $this->nm_btn_exist['goto'][] = "brec_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "birpara", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "var rec_nav = ((document.getElementById('rec_f0_bot').value - 1) * " . NM_encode_input($Reg_Page) . ") + 1; nm_gp_submit_ajax('muda_rec_linhas', rec_nav);", "brec_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $Page_Atu   = ceil($this->nmgp_reg_inicial / $Reg_Page);
              $nm_saida->saida("          <input id=\"rec_f0_bot\" type=\"text\" class=\"" . $this->css_css_toolbar_obj . "\" name=\"rec\" value=\"" . NM_encode_input($Page_Atu) . "\" style=\"width:25px;vertical-align: middle;\"/> \r\n");
              $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['qtline'] == "on" && $this->Ini->Apl_paginacao != "FULL")
          {
              $nm_saida->saida("          <span class=\"" . $this->css_css_toolbar_obj . "\" style=\"border: 0px;vertical-align: middle;\">" . $this->Ini->Nm_lang['lang_btns_rows'] . "</span>\r\n");
              $nm_saida->saida("          <select class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" id=\"quant_linhas_f0_bot\" name=\"nmgp_quant_linhas\" onchange=\"sc_ind = document.getElementById('quant_linhas_f0_bot').selectedIndex; nm_gp_submit_ajax('muda_qt_linhas', document.getElementById('quant_linhas_f0_bot').options[sc_ind].value);\"> \r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 30) ? " selected" : "";
              $nm_saida->saida("           <option value=\"30\" " . $obj_sel . ">30</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['first'][] = "first_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_inicio", "nm_gp_submit_rec('ini');", "nm_gp_submit_rec('ini');", "first_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['back'][] = "back_bot";
              if ($this->Rec_ini == 0)
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "disabled", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
              else
              {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_retorna", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "nm_gp_submit_rec('" . $this->Rec_ini . "');", "back_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
                  $nm_saida->saida("           $Cod_Btn \r\n");
              }
                  $NM_btn = true;
          }
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['qt_lin_grid'];
              $Max_link   = 5;
              $Mid_link   = ceil($Max_link / 2);
              $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
              $Qtd_Pages  = ceil($this->count_ger / $Reg_Page);
              $Page_Atu   = ceil($this->nmgp_reg_final / $Reg_Page);
              $Link_ini   = 1;
              if ($Page_Atu > $Max_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              elseif ($Page_Atu > $Mid_link)
              {
                  $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
              }
              if (($Qtd_Pages - $Link_ini) < $Max_link)
              {
                  $Link_ini = ($Qtd_Pages - $Max_link) + 1;
              }
              if ($Link_ini < 1)
              {
                  $Link_ini = 1;
              }
              for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
              {
                  $rec = (($Link_ini - 1) * $Reg_Page) + 1;
                  if ($Link_ini == $Page_Atu)
                  {
                      $nm_saida->saida("            <span class=\"scGridToolbarNavOpen\" style=\"vertical-align: middle;\">" . $Link_ini . "</span>\r\n");
                  }
                  else
                  {
                      $nm_saida->saida("            <a class=\"scGridToolbarNav\" style=\"vertical-align: middle;\" href=\"javascript: nm_gp_submit_rec(" . $rec . ");\">" . $Link_ini . "</a>\r\n");
                  }
                  $Link_ini++;
                  if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
                  {
                      $nm_saida->saida("            <img src=\"" . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
                  }
              }
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['last'][] = "last_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_final", "nm_gp_submit_rec('fim');", "nm_gp_submit_rec('fim');", "last_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['rows'] == "on" && empty($this->nm_grid_sem_reg))
          {
              $nm_sumario = "[" . $this->Ini->Nm_lang['lang_othr_smry_info'] . "]";
              $nm_sumario = str_replace("?start?", $this->nmgp_reg_inicial, $nm_sumario);
              if ($this->Ini->Apl_paginacao == "FULL")
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->count_ger."</span>", $nm_sumario);
              }
              else
              {
                  $nm_sumario = str_replace("?final?", "<span class='sm_counter_final'>".$this->nmgp_reg_final."</span>", $nm_sumario);
              }
              $nm_sumario = str_replace("?total?", "<span class='sm_counter_total'>".$this->count_ger."</span>", $nm_sumario);
              $nm_saida->saida("           <span class=\"summary_indicator " . $this->css_css_toolbar_obj . "\" style=\"border:0px;\"><span class='sm_counter'>" . $nm_sumario . "</span></span>\r\n");
              $NM_btn = true;
          }
          if (is_file("grid_compras_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_compras_help.txt"); 
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
      }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
       if (!isset($_SESSION['scriptcase']['proc_mobile']) || !$_SESSION['scriptcase']['proc_mobile'])
       {
           $this->nmgp_barra_top_normal();
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
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
   }
   function nmgp_embbed_placeholder_bot()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_export_email_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_bot\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td colspan=3>\r\n");
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
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('numfacom', 'idprov', 'pagada', 'observaciones', 'id_pedidocom'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
            }
        }
        return $str_value;
    }
   function html_interativ_search()
   {
       global $nm_saida;
       $bol_refin_use_modal = false;
       if($_SESSION['scriptcase']['proc_mobile'])
       {
           $bol_refin_use_modal = false;
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label'] = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']   = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom'] = (isset($this->New_label['fechacom'])) ? $this->New_label['fechacom'] : 'Fecha';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']['fechacom']   = "fechacom";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc'] = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : 'Vence';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']['fechavenc']   = "fechavenc";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov'] = (isset($this->New_label['idprov'])) ? $this->New_label['idprov'] : 'Proveedor';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']['idprov']   = "idprov";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['total'] = (isset($this->New_label['total'])) ? $this->New_label['total'] : 'Total';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']['total']   = "total";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada'] = (isset($this->New_label['pagada'])) ? $this->New_label['pagada'] : 'Pagada';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_sql']['pagada']   = "pagada";
       $tb_disp = (empty($this->nm_grid_sem_reg)) ? '' : 'none';
       $nm_saida->saida("     <script>\r\n");
       $nm_saida->saida("         var Tab_obj_int_mult = {};\r\n");
       $nm_saida->saida("     </script>\r\n");
       $nm_saida->saida(" <table id=\"TB_Interativ_Search\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top; width: 100%; display:" . $tb_disp . ";\" valign=\"top\" cellspacing=0 cellpadding=0>\r\n");
       $nm_saida->saida("   <tr id=\"NM_Interativ_Search\">\r\n");
       $nm_saida->saida("   <td valign=\"top\"> \r\n");
       $nm_saida->saida("    <form id= \"id_Interat_search\" name=\"FInterat_search\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"nmgp_opcao\" value=\"interativ_search\"/> \r\n");
       $nm_saida->saida("     <input type=\"hidden\" name=\"parm\" value=\"\"/> \r\n");
       $nm_saida->saida("    <div id='id_div_interativ_search' class=''>\r\n");
           $disp_btn_collapse = 'none'; 
           if('N' == 'S') 
           { 
               $disp_btn_collapse = ''; 
           } 
$nm_saida->saida("        <div id='app_int_search_toggle' class='scGridRefinedSearchCollapse' style='display: " . $disp_btn_collapse . "' onclick='nm_proc_int_search_toggle(false);'><i class='icon_fa " . $this->Ini->scGridRefinedSearchCollapseFAIcon . "'></i></div> \r\n");
       $nm_saida->saida("        <div id='id_div_interativ_search_content' class='scGridRefinedSearchMoldura' style='min-width:100px;max-width:120px;overflow-x:hidden;'>\r\n");
       $nm_saida->saida("            <div id='id_div_interativ_search_fields'>\r\n");
       $lin_obj = $this->interativ_search_fechacom($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_fechavenc($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_idprov($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_total($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_pagada($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $nm_saida->saida("            </div>\r\n");
       $nm_saida->saida("        </div>\r\n");
       $nm_saida->saida("    </div>\r\n");
       $nm_saida->saida("    </form>\r\n");
       $nm_saida->saida("   </td>\r\n");
       $nm_saida->saida("   </tr>\r\n");
       $nm_saida->saida(" </table>\r\n");
       $this->JS_interativ_search();
       $nm_saida->saida(" <SCRIPT LANGUAGE=\"Javascript\" SRC=\"" . $this->Ini->path_js . "/nm_format_num.js\"></SCRIPT>\r\n");
   }
   function refresh_interativ_search()
   {
       $bol_refin_use_modal = false;
       if($_SESSION['scriptcase']['proc_mobile'])
       {
           $bol_refin_use_modal = false;
       }
       $array_fields = array();
       $array_fields[] = "fechacom";
       $array_fields[] = "fechavenc";
       $array_fields[] = "idprov";
       $array_fields[] = "total";
       $array_fields[] = "pagada";
       if(is_array($array_fields) && !empty($array_fields))
       {
           $arr_new = [];
           foreach($array_fields as $key => $str_field)
           {
               if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search'][$str_field]))
               {
                   unset($array_fields[ $key ]);
                   $arr_new[] = $str_field;
               }
           }
           $array_fields = array_merge($arr_new, $array_fields);
           $str_out = "";
           foreach($array_fields as $str_field)
           {
               $method = "interativ_search_" . $str_field;
               $str_out .= $this->$method($bol_refin_use_modal);
           }
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_div_interativ_search_fields', 'value' => NM_charset_to_utf8($str_out));
       }
   }
   function interativ_search_fechacom($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["fechacom"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["fechacom"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_fechacom\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('fechacom')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_fechacom\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_fechacom\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_fechacom\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','fechacom', '', 'fechacom', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       { 
           $nm_comando = "select convert(char(23),fechacom,121), COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       { 
           $nm_comando = "select EXTEND(fechacom, YEAR TO DAY), COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       else
       { 
           $nm_comando = "select fechacom, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY fechacom". $Cmps_where;
       $nm_comando .= " order by fechacom DESC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechacom'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_fechacom_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_fechacom' class='multiplefechacom' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('fechacom', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('fechacom', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)3;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['fechacom'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $conteudo_x =  $formatado;
           nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
           if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
           { 
               $this->nm_data->SetaData($formatado, "YYYY-MM-DD  ");
               $formatado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
           } 
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['fechacom'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_fechacom' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simplefechacom' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechacom']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom']) . "','fechacom','id_int_search_fechacom','fechacom', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom']) . "','fechacom','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'fechacom', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multiplefechacom' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechacom']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechacom']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_fechacom_" . md5($dados) . "\" name=\"int_search_fechacom[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_fechacom_". md5($dados) ."\" for=\"id_int_search_fechacom_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_fechacom' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_compras_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=fechacom&tp_obj=dt&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('fechacom');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_fechacom' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('fechacom');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_fechacom\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('fechacom', false);", "nm_mult_int_search('fechacom', false);", "mult_int_search_fechacom", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom']) . "','fechacom','id_int_search_fechacom','fechacom', '', 'N');", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechacom']) . "','fechacom','id_int_search_fechacom','fechacom', '', 'N');", "app_int_search_fechacom", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('fechacom');", "nm_single_int_search('fechacom');", "single_int_search_fechacom", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_fechavenc($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["fechavenc"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["fechavenc"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_fechavenc\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('fechavenc')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_fechavenc\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_fechavenc\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_fechavenc\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','fechavenc', '', 'fechavenc', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
       { 
           $nm_comando = "select convert(char(23),fechavenc,121), COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
       { 
           $nm_comando = "select EXTEND(fechavenc, YEAR TO DAY), COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       else
       { 
           $nm_comando = "select fechavenc, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       } 
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY fechavenc". $Cmps_where;
       $nm_comando .= " order by fechavenc ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechavenc'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_fechavenc_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_fechavenc' class='multiplefechavenc' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('fechavenc', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('fechavenc', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)3;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['fechavenc'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $conteudo_x =  $formatado;
           nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
           if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
           { 
               $this->nm_data->SetaData($formatado, "YYYY-MM-DD  ");
               $formatado = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
           } 
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['fechavenc'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_fechavenc' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simplefechavenc' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechavenc']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc']) . "','fechavenc','id_int_search_fechavenc','fechavenc', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc']) . "','fechavenc','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'fechavenc', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multiplefechavenc' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechavenc']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['fechavenc']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_fechavenc_" . md5($dados) . "\" name=\"int_search_fechavenc[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_fechavenc_". md5($dados) ."\" for=\"id_int_search_fechavenc_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_fechavenc' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_compras_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=fechavenc&tp_obj=dt&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('fechavenc');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_fechavenc' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('fechavenc');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_fechavenc\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('fechavenc', false);", "nm_mult_int_search('fechavenc', false);", "mult_int_search_fechavenc", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc']) . "','fechavenc','id_int_search_fechavenc','fechavenc', '', 'N');", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['fechavenc']) . "','fechavenc','id_int_search_fechavenc','fechavenc', '', 'N');", "app_int_search_fechavenc", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('fechavenc');", "nm_single_int_search('fechavenc');", "single_int_search_fechavenc", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_idprov($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["idprov"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["idprov"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_idprov\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('idprov')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_idprov\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_idprov\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_idprov\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','idprov', '', 'idprov', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select idprov, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY idprov". $Cmps_where;
       $nm_comando .= " order by idprov ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['idprov'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_idprov_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_idprov' class='multipleidprov' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('idprov', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('idprov', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)3;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['idprov'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $this->Lookup->lookup_idprov($formatado);
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['idprov'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_idprov' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simpleidprov' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['idprov']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov']) . "','idprov','id_int_search_idprov','idprov', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov']) . "','idprov','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'idprov', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleidprov' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['idprov']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['idprov']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_idprov_" . md5($dados) . "\" name=\"int_search_idprov[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_idprov_". md5($dados) ."\" for=\"id_int_search_idprov_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_idprov' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_compras_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=idprov&tp_obj=nn&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('idprov');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_idprov' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('idprov');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_idprov\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('idprov', false);", "nm_mult_int_search('idprov', false);", "mult_int_search_idprov", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov']) . "','idprov','id_int_search_idprov','idprov', '', 'N');", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['idprov']) . "','idprov','id_int_search_idprov','idprov', '', 'N');", "app_int_search_idprov", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('idprov');", "nm_single_int_search('idprov');", "single_int_search_idprov", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_total($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["total"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["total"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_total\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('total')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_total\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_total\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['total'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_total\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','total', '', 'total', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select total, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY total". $Cmps_where;
       $nm_comando .= " order by total ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['total'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_total_link\" style=\"display: " . $disp_link . ";\">";
     if(count($result) >=2)
     {
       if(empty($range_min))
       {
           $range_min = 0;
       }
       if(empty($range_max))
       {
           $range_max = 0;
       }
       $range_min = (int) $range_min;
       $range_max = (int) $range_max;
       $range_min = $range_min - ($range_min % 5);
       $range_max = $range_max - (($range_max - $range_min) % 5) + 5;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refin_slider_total'])) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refin_slider_total']['min'] = $range_min;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refin_slider_total']['max'] = $range_max;
           $range_min_orig = $range_min;
           $range_max_orig = $range_max;
       }
       else {
           $range_min_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refin_slider_total']['min'];
           $range_max_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['refin_slider_total']['max'];
       }
       $lin_obj  .= "   <div class='scGridRefinedSearchCampo'>";
               $range_min_formatado  = str_replace(",", ".", $range_min);
               $range_max_formatado  = str_replace(",", ".", $range_max);
           nmgp_Form_Num_Val($range_min_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
           nmgp_Form_Num_Val($range_max_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $lin_obj  .= "    <div id='id_slider_total_values' style='text-align:center;'>";
       $lin_obj  .= "        <div id='id_slider_total_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
       if(isset($this->Ini->refinedsearch_values_separator) && !empty($this->Ini->refinedsearch_values_separator))
       {
           $lin_obj  .= "        <div style='display:inline-block;'><img src='" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_values_separator . "' align='absmiddle' /></div>";
       }
       $lin_obj  .= "        <div id='id_slider_total_values_max' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_max_formatado ."</div>";
       $lin_obj  .= "    </div>";
       $lin_obj  .= "    <div id='id_slider_total'></div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "    $( '#id_slider_total' ).slider({";
      $lin_obj  .= "        range: true,";
      $lin_obj  .= "        step: 5,";
      $lin_obj  .= "        min: " . str_replace(',', '.', $range_min_orig) . ",";
      $lin_obj  .= "        max: " . str_replace(',', '.', $range_max_orig) . ",";
      $lin_obj  .= "        values: [ " . str_replace(',', '.', $range_min) . ", " . str_replace(',', '.', $range_max) . " ],";
      $lin_obj  .= "        slide: function( event, ui ) {";
      $lin_obj  .= "            val_format1 = JS_Format_Num_Val( ui.values[ 0 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            val_format2 = JS_Format_Num_Val( ui.values[ 1 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            $( '#id_slider_total_values_min' ).html(val_format1);";
      $lin_obj  .= "            $( '#id_slider_total_values_max' ).html(val_format2);";
      $lin_obj  .= "        },";
      $lin_obj  .= "    });";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div>";
       $disp_btn_range='';
     }
     else
     {
         $disp_btn_range='none';
         if(count($result) == 1)
         {
               $range_min_formatado  = str_replace(",", ".", $range_min);
           nmgp_Form_Num_Val($range_min_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
             $lin_obj  .= "    <div id='id_slider_total_values' style='text-align:center;'>";
             $lin_obj  .= "        <div id='id_slider_total_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
             $lin_obj  .= "    </div>";
         }
     }
       $lin_obj  .= "   </div></td></tr>";
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "     <td>";
           $lin_obj .= "      <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_total\" style='display:" .  $cle_disp . "'>";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['total']) . "','total','id_int_search_total','total', '', 'S');", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['total']) . "','total','id_int_search_total','total', '', 'S');", "app_int_search_range_total", "", "", "display: $disp_btn_range", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "      </div>";
           $lin_obj .= "     </td>";
           $lin_obj .= "    </tr>";
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_pagada($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["pagada"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']["pagada"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_pagada\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('pagada')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_pagada\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_pagada\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_pagada\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','pagada', '', 'pagada', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $nm_comando = "select pagada, COUNT(*) AS countTest from " . $this->Ini->nm_tabela;
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_pesq'];
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY pagada". $Cmps_where;
       $nm_comando .= " order by pagada ASC";
       $result = array();
       $range_max = false;
       $range_min = false;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
       if ($RSI = $this->Db->Execute($nm_comando))
       {
           while (!$RSI->EOF) 
           { 
              if($RSI->fields[0] == '')
              {
                  if(isset($result[ $RSI->fields[0] ]))
                  {
                    $result[ $RSI->fields[0] ] += $RSI->fields[1];
                  }
                  else
                  {
                    $result[ $RSI->fields[0] ] = $RSI->fields[1];
                  }
              }
              else
              {
              $result[$RSI->fields[0]] = $RSI->fields[1];
              }
              if($range_max === false || $RSI->fields[0] > $range_max)
              {
                  $range_max = $RSI->fields[0];
              }
              if($range_min === false || $RSI->fields[0] < $range_min)
              {
                  $range_min = $RSI->fields[0];
              }
              $RSI->MoveNext() ;
           }  
           $RSI->Close(); 
       }
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
       $lin_mult  = "";
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['pagada'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_pagada_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_pagada' class='multiplepagada' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('pagada', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('pagada', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = 0;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['pagada'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_dados']['pagada'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_pagada' style='display:none'>";
               $bol_open_see_more  = true;
           }
           $on_mouse_over= "";
           $on_mouse_out = "";
           if(empty($disp_link))
           {
               $on_mouse_over= "$(this).find('img').css('opacity', 1);";
               $on_mouse_out = "$(this).find('img').css('opacity', 0);";
           }
           $lin_obj  .= "   <div class='scGridRefinedSearchCampo' onmouseover=\"". $on_mouse_over ."\" onmouseout=\"". $on_mouse_out ."\">";
           $lin_obj  .= "  <table cellspacing=0 cellpadding=0>";
           $lin_obj  .= "   <tr>";
           $lin_obj  .= "   <td>";
           $lin_obj  .= "   <span class='simplepagada' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['pagada']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada']) . "','pagada','id_int_search_pagada','pagada', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada']) . "','pagada','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'pagada', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multiplepagada' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['pagada']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['interativ_search']['pagada']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_pagada_" . md5($dados) . "\" name=\"int_search_pagada[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_pagada_". md5($dados) ."\" for=\"id_int_search_pagada_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= " <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "    </span>";
           $lin_obj  .= "   </td>";
           $lin_obj  .= "    </tr>";
           $lin_obj  .= "   </table>";
           $lin_obj  .= "   </div>";
           $qtd_result_see_more++;
       }
           $displ_see_more = false;
           if($bol_open_see_more)
           {
               $lin_obj  .= "   </div>";
               $displ_see_more = true;
           }
           if($bol_refin_use_modal)
           {
               $displ_see_more = true;
           }
           $lin_obj  .= "   <div id='id_see_more_pagada' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_compras_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=pagada&tp_obj=tx&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('pagada');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_pagada' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('pagada');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_pagada\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('pagada', false);", "nm_mult_int_search('pagada', false);", "mult_int_search_pagada", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada']) . "','pagada','id_int_search_pagada','pagada', '', 'N');", "nm_proc_int_search('chbx', 'tx','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['int_search_label']['pagada']) . "','pagada','id_int_search_pagada','pagada', '', 'N');", "app_int_search_pagada", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('pagada');", "nm_single_int_search('pagada');", "single_int_search_pagada", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function JS_interativ_search()
   {
       global $nm_saida;
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("     function toggleSeeMore(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if($('#id_see_less_'+obj_id).css('display') == 'none')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#id_see_more_list_'+obj_id).slideDown();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#id_see_more_list_'+obj_id).slideUp();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_see_less_'+obj_id).toggle();\r\n");
       $nm_saida->saida("         $('#id_see_more_'+obj_id).toggle();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     function nm_proc_int_search_all()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         int_search_load_html = 'N';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_fechacom\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_fechacom').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_fechacom[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_fechacom').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','fechacom', '', 'fechacom', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_fechavenc\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_fechavenc').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_fechavenc[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_fechavenc').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','fechavenc', '', 'fechavenc', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_idprov\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_idprov').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_idprov[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_idprov').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','idprov', '', 'idprov', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_total\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_total').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_total[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_total').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','total', '', 'total', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("         int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_pagada\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_pagada').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_pagada[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_pagada').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','pagada', '', 'pagada', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_clear_all()\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear_all','','','', '', '', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_search(tp_link, tp_obj, label, nam_db, val_obj, obj_id, val_atual, refresh)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         while (label.lastIndexOf(\"__sasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           label = label.replace(\"__sasp__\" , \"'\");\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (nam_db.lastIndexOf(\"__sasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           nam_db = nam_db.replace(\"__sasp__\" , \"'\");\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (label.lastIndexOf(\"__dasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           label = label.replace(\"__dasp__\" , '\"');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         while (nam_db.lastIndexOf(\"__dasp__\") != -1)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("           nam_db = nam_db.replace(\"__dasp__\" , '\"');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         var out_int = nam_db + '__DL__' + label + '__DL__' + tp_obj + '__DL__';\r\n");
       $nm_saida->saida("         if (tp_link == 'clear_all')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += 'clear_interativ_all';\r\n");
       $nm_saida->saida("             Tab_obj_int_mult = {};\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'clear')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += 'clear_interativ';\r\n");
       $nm_saida->saida("             Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'clear_opc')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             result = int_search_get_checkbox(obj_id, val_atual);\r\n");
       $nm_saida->saida("             if (result != '') {\r\n");
       $nm_saida->saida("                 out_int += result;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else {\r\n");
       $nm_saida->saida("                 out_int += 'clear_interativ';\r\n");
       $nm_saida->saida("                 Tab_obj_int_mult[\"'\" + obj_id + \"'\"] = 'N';\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'link')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += val_obj;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'range')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             out_int += $('#id_slider_' + obj_id).slider('values')[0] + \"_VLS_\" + $('#id_slider_' + obj_id).slider('values')[1];\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         if (tp_link == 'chbx' || tp_link == 'uncheck')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if(tp_link == 'uncheck')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 int_search_unset_checkbox(nam_db, val_atual, obj_id);\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             result  = int_search_get_checkbox(obj_id, '');\r\n");
       $nm_saida->saida("             if(tp_link == 'chbx' && result == '')\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 int_search_unset_checkbox(nam_db, val_atual, obj_id);\r\n");
       $nm_saida->saida("                 return;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             out_int += result;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[&]/g, \"__NM_AMP__\");\r\n");
       $nm_saida->saida("         out_int  = out_int.replace(/[%]/g, \"__NM_PRC__\");\r\n");
       $nm_saida->saida("         out_int  += '__DL__' + int_search_load_html;\r\n");
       $nm_saida->saida("         out_int  += '__DL__' + refresh;\r\n");
       $nm_saida->saida("         ajax_navigate('interativ_search', out_int);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     var submit_checkbox = 'N';\r\n");
       $nm_saida->saida("     function nm_proc_check_parent_value(bol_checked, str_cmp, value_md5)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        $('#id_int_search_'+ str_cmp +'_' + value_md5).prop('checked', bol_checked);\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_proc_int_search_toggle()\r\n");
       $nm_saida->saida("    {\r\n");
       $nm_saida->saida("        if ($('#id_div_interativ_search').hasClass('is-closed')) {\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search_content').show();\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search').css('position', 'relative');\r\n");
       $nm_saida->saida("            $('#app_int_search_open').hide();\r\n");
       $nm_saida->saida("            $('#app_int_search_close').show();\r\n");
       $nm_saida->saida("        } else {\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search_content').hide();\r\n");
       $nm_saida->saida("            $('#id_div_interativ_search').css('position', 'absolute');\r\n");
       $nm_saida->saida("            $('#app_int_search_open').show();\r\n");
       $nm_saida->saida("            $('#app_int_search_close').hide();\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("        $('#id_div_interativ_search').toggleClass('is-closed');\r\n");
       $nm_saida->saida("    }\r\n");
       $nm_saida->saida("     function int_search_unset_checkbox(nam_db, val_atual, obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         var obj_check = eval(\"document.getElementsByName('int_search_\" + obj_id + \"[]')\");\r\n");
       $nm_saida->saida("         has_checked = false;\r\n");
       $nm_saida->saida("         for (i = 0; i < obj_check.length; i++)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if(obj_check[i].checked && obj_check[i].value == val_atual)\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 obj_check[i].checked = false;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             if(obj_check[i].checked)\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 has_checked = true;\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         //if doesnt have checked anymore, clear\r\n");
       $nm_saida->saida("         if(!has_checked)\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_proc_int_search('clear','','', nam_db, '', obj_id, '', 'S')\r\n");
       $nm_saida->saida("             return;\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function int_search_get_checkbox(obj_id, val_out)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("        var val  = \"\";\r\n");
       $nm_saida->saida("        $( \"input[name='int_search_\"+ obj_id +\"[]']:checked\" ).each(function(){\r\n");
       $nm_saida->saida("            if($(this).val() != val_out)\r\n");
       $nm_saida->saida("            {\r\n");
       $nm_saida->saida("                val += (val != \"\") ? \"_VLS_\" : \"\";\r\n");
       $nm_saida->saida("                val += $(this).val();\r\n");
       $nm_saida->saida("            }\r\n");
       $nm_saida->saida("        });\r\n");
       $nm_saida->saida("        return val;\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_toggle_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if($('#id_expand_' + obj_id).css('display') != 'none')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_expand_int_search(obj_id);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         else\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             nm_retracts_int_search(obj_id);\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_expand_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             if (Tab_obj_int_mult[ obj_id ] && Tab_obj_int_mult[ obj_id ] == 'S') {\r\n");
       $nm_saida->saida("                 $('#app_int_search_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("             else\r\n");
       $nm_saida->saida("             {\r\n");
       $nm_saida->saida("                 $('#app_int_search_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("             }\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_tab_' + obj_id + '_link').css('display','');\r\n");
       $nm_saida->saida("         $('#id_toolbar_' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#id_retract_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("         $('#id_expand_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_retracts_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("             $('#app_int_search_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         $('#id_tab_' + obj_id + '_link').css('display','none');\r\n");
       $nm_saida->saida("         $('#id_toolbar_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#id_retract_' + obj_id).css('display','none');\r\n");
       $nm_saida->saida("         $('#id_expand_' + obj_id).css('display','');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_mult_int_search(obj_id, bol_first)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('.simple' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('.multiple' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#mult_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#single_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         if(submit_checkbox != 'S')\r\n");
       $nm_saida->saida("         {\r\n");
       $nm_saida->saida("            $('#app_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         }\r\n");
       $nm_saida->saida("         Tab_obj_int_mult[ obj_id ] = 'S';\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     function nm_single_int_search(obj_id)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('.simple' + obj_id).show();\r\n");
       $nm_saida->saida("         $('.multiple' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#mult_int_search_' + obj_id).show();\r\n");
       $nm_saida->saida("         $('#single_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         $('#app_int_search_' + obj_id).hide();\r\n");
       $nm_saida->saida("         Tab_obj_int_mult[ obj_id ] = 'N';\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("    function refinedSearchCheckUncheckAll(field_name, bol_value)\r\n");
       $nm_saida->saida("    {\r\n");
       $nm_saida->saida("        $(\"input[name='int_search_\"+ field_name +\"[]']\").prop('checked', bol_value);\r\n");
       $nm_saida->saida("        if (submit_checkbox == \"S\") {\r\n");
       $nm_saida->saida("            $('#app_int_search_' + field_name).click();\r\n");
       $nm_saida->saida("        }\r\n");
       $nm_saida->saida("    }\r\n");
       $nm_saida->saida("     $( document ).ready(function() {\r\n");
       $nm_saida->saida("        adjustMobile();\r\n");
       $nm_saida->saida("    });\r\n");
       $nm_saida->saida("function adjustMobile()\r\n");
       $nm_saida->saida("{\r\n");
       $nm_saida->saida("}\r\n");
       $nm_saida->saida("</script>\r\n");
   }
//--- 
//--- 
 function grafico_pdf()
 {
   global $nm_saida, $nm_lang;
   require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
   $this->Graf  = new grid_compras_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pivot_charts']);
       $sChartLang  = isset($this->Ini->Nm_lang['lang_pdff_pcht']) ? $this->Ini->Nm_lang['lang_pdff_pcht'] : 'Generating chart';
       if (!NM_is_utf8($sChartLang))
       {
           $sChartLang = sc_convert_encoding($sChartLang, "UTF-8", $_SESSION['scriptcase']['charset']);
       }
       $bChartFP = false;
      if (!isset($this->progress_fp) || !$this->progress_fp)
      {
           $bChartFP           = true;
           $str_pbfile         = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
           $this->progress_fp  = fopen($str_pbfile, 'a');
           $this->progress_tot = 100;
           $this->progress_now = 90;
           $this->progress_res = 0;
      }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['proc_pdf_vert'])
 { 
           $nm_saida->saida("<table style=\"width: 100%; page-break-inside: avoid !important;\" ><tr><td>\r\n");
 } else {
           $nm_saida->saida("<table><tr><td>\r\n");
 } 
           $tit_graf = $chart_data['title'];
           if ('' != $chart_data['subtitle'])
           {
               $tit_graf .= ' - ' . $chart_data['subtitle'];
           }
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $random_id = 'sc-id-h2-' . md5(session_id() . microtime() . rand(1, 1000));
           $nm_saida->saida("<b><h2 id=\"$random_id\">$tit_book_marks</h2></b>\r\n");
           if ($this->progress_fp)
           {
               grid_compras_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['this_chart_label'] = '';
           $this->Graf->monta_grafico($chart_index, 'pdf');
           $nm_saida->saida("</td></tr></table>\r\n");
       }
       if ($bChartFP)
       {
           $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
           if (!NM_is_utf8($lang_protect))
           {
               $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
           }
           grid_compras_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['charts_html']}\r\n");
            $nm_saida->saida("</script>\r\n");
       }
   }
       $nm_saida->saida("</body>\r\n");
       $nm_saida->saida("</HTML>\r\n");
 }
//--- 
//--- 
 function grafico_pdf_flash()
 {
   global $nm_saida, $nm_lang;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['chart_list'] as $arr_chart)
       {
           $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
       $nm_saida->saida("<b><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></b>\r\n");
           $nm_saida->saida("<table><tr><td>\r\n");
           $tit_graf       = $arr_chart[1];
           if ('UTF-8' != $_SESSION['scriptcase']['charset'])
           {
               $tit_graf = sc_convert_encoding($tit_graf, $_SESSION['scriptcase']['charset'], 'UTF-8');
           }
           $tit_book_marks = str_replace(" ", "&nbsp;", $tit_graf);
           $nm_saida->saida("<b><h2>$tit_book_marks</h2></b>\r\n");
           $nm_saida->saida("<img src=\"" . $arr_chart[0] . ".png\"/>\r\n");
           $_SESSION['scriptcase']['sc_num_img']++;
           $nm_saida->saida("</td></tr></table>\r\n");
       }
   }
   $nm_saida->saida("</body>\r\n");
   $nm_saida->saida("</HTML>\r\n");
 }
//--- 
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
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_compras\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_compras\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['embutida'])
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
   } 
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   Tab_lig_apls    = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_init    = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_Type    = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_lab     = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_hint    = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_img_on  = new Array();\r\n");
   $nm_saida->saida("   Tab_lig_img_off = new Array();\r\n");
   if (!empty($this->Ini->Init_apl_lig))
   {
       $ix = 0;
       foreach ($this->Ini->Init_apl_lig as $apls_name => $apls_parm)
       {
           $nm_saida->saida("   Tab_lig_apls[" . $ix . "] = '" . $apls_name . "';\r\n");
           $nm_saida->saida("   Tab_lig_init['" . $apls_name . "'] = '" . $apls_parm['ini'] . "';\r\n");
           $nm_saida->saida("   Tab_lig_Type['" . $apls_name . "'] = '" . $apls_parm['type'] . "';\r\n");
           $nm_saida->saida("   Tab_lig_lab['" . $apls_name . "'] = '" . $apls_parm['lab'] . "';\r\n");
           $nm_saida->saida("   Tab_lig_hint['" . $apls_name . "'] = '" . $apls_parm['hint'] . "';\r\n");
           $nm_saida->saida("   Tab_lig_img_on['" . $apls_name . "'] = '" . $apls_parm['img_on'] . "';\r\n");
           $nm_saida->saida("   Tab_lig_img_off['" . $apls_name . "'] = '" . $apls_parm['img_off'] . "';\r\n");
           $ix++;
       }
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      window.onload = function() {\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_compras', $(document).innerHeight())\",50);\r\n");
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
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_compras\"/>\r\n");
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
   $nm_saida->saida("                     action=\"grid_compras_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_compras_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_compras_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("   function SC_btn_0() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var tem_hint;\r\n");
   $nm_saida->saida("   function nm_mostra_hint(nm_obj, nm_evt, nm_mens)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (nm_mens == \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = true;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           theString=\"<DIV CLASS='ttip'>\" + nm_mens + \"</DIV>\";\r\n");
   $nm_saida->saida("           document.tooltip.document.write(theString);\r\n");
   $nm_saida->saida("           document.tooltip.document.close();\r\n");
   $nm_saida->saida("           document.tooltip.left = nm_evt.pageX + 14;\r\n");
   $nm_saida->saida("           document.tooltip.top = nm_evt.pageY + 2;\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"show\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              nmdg_nav = navigator.appName;\r\n");
   $nm_saida->saida("              elm = document.getElementById(\"tooltip\");\r\n");
   $nm_saida->saida("              elml = nm_obj;\r\n");
   $nm_saida->saida("              elm.innerHTML = nm_mens;\r\n");
   $nm_saida->saida("              if (nmdg_nav == \"Netscape\")\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.height = elml.style.height;\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.pageY + 2 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.pageX + 14 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              else\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  elm.style.top = nm_evt.y + document.body.scrollTop + 10 + 'px';\r\n");
   $nm_saida->saida("                  elm.style.left = nm_evt.x + document.body.scrollLeft + 10 + 'px';\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("              elm.style.visibility = \"visible\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_apaga_hint()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (!tem_hint)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       tem_hint = false;\r\n");
   $nm_saida->saida("       if (document.layers)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.tooltip.visibility = \"hidden\";\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if(document.getElementById)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("              elm.style.visibility = \"hidden\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['ajax_nav'])
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
   $nm_saida->saida("   function nm_gp_open_qsearch_div(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())\r\n");
   $nm_saida->saida("            {\r\n");
   $nm_saida->saida("                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});\r\n");
   $nm_saida->saida("            }\r\n");
   $nm_saida->saida("            nm_gp_open_qsearch_div_store_temp(pos);\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $('#id_qs_div_' + pos).toggle();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = \"\";\r\n");
   $nm_saida->saida("   function nm_gp_open_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [], tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        else\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_cancel_qsearch_div_store_temp(pos)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("        $('#fast_search_f0_' + pos).val('');\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos + \" option\").prop('selected', false);\r\n");
   $nm_saida->saida("        for(it=0; it<tmp_qs_arr_fields.length; it++)\r\n");
   $nm_saida->saida("        {\r\n");
   $nm_saida->saida("            $(\"#fast_search_f0_\" + pos + \" option[value='\"+ tmp_qs_arr_fields[it] +\"']\").prop('selected', true);\r\n");
   $nm_saida->saida("        }\r\n");
   $nm_saida->saida("        $(\"#fast_search_f0_\" + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_arr_fields = [];\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);\r\n");
   $nm_saida->saida("        $('#cond_fast_search_f0_' + pos).change();\r\n");
   $nm_saida->saida("        tmp_qs_str_cond = \"\";\r\n");
   $nm_saida->saida("        nm_gp_open_qsearch_div(pos);\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_submit_qsearch(pos) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       var out_qsearch = \"\";\r\n");
   $nm_saida->saida("       var ver_ch = eval('change_fast_' + pos);\r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '' && ver_ch == '')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           scJs_alert(\"" . $this->Ini->Nm_lang['lang_srch_req_field'] . "\");\r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).focus();\r\n");
   $nm_saida->saida("           return false;\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (document.getElementById('SC_fast_search_' + pos).value == '__Clear_Fast__')\r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.getElementById('SC_fast_search_' + pos).value = '';\r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       out_qsearch = $('#fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + $('#cond_fast_search_f0_' + pos).val();\r\n");
   $nm_saida->saida("       out_qsearch += \"_SCQS_\" + document.getElementById('SC_fast_search_' + pos).value;\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[+]/g, \"__NM_PLUS__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[&]/g, \"__NM_AMP__\");\r\n");
   $nm_saida->saida("       out_qsearch = out_qsearch.replace(/[%]/g, \"__NM_PRC__\");\r\n");
   $nm_saida->saida("       ajax_navigate('fast_search', out_qsearch); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      return ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit1(apl_lig, apl_saida, parms, target, apl_name) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      var sob_iframe = '';\r\n");
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'])) {
       $nm_saida->saida("      sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
       $nm_saida->saida("      if (typeof func_menu_aba !== 'function') \r\n");
       $nm_saida->saida("      { \r\n");
       $nm_saida->saida("          sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      } \r\n");
   }
   $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
   $nm_saida->saida("      eval (\"var aba_atual = \" + sob_iframe + \"parent.Aba_atual\"); \r\n");
   $nm_saida->saida("      if (apl_name != null && apl_name != '' && typeof func_menu_aba === 'function') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          for (i = 0; i < Tab_lig_apls.length; i++)\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              if (Tab_lig_apls[i] == apl_name)\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?#\\?/g, \"*scin\"); \r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?@\\?/g, \"*scout\"); \r\n");
   $nm_saida->saida("                  apl_lig += '?nmgp_parms=' + parms + '&nm_run_menu=1&NM_btn_cancel=N' + Tab_lig_init[apl_name];\r\n");
   $nm_saida->saida("                  apl_lig += '&Refresh_aba_menu=' + aba_atual;\r\n");
   $nm_saida->saida("                  func_menu_aba(apl_name, Tab_lig_lab[apl_name], Tab_lig_hint[apl_name], Tab_lig_img_on[apl_name], Tab_lig_img_off[apl_name], apl_lig, Tab_lig_Type[apl_name]);\r\n");
   $nm_saida->saida("                  return;\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      if (target != null) \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.target = target; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action               = apl_lig  ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_chave.value     = \"\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = \"edit_novo\" ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("         window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.submit() ;\r\n");
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
   $nm_saida->saida("   function nm_gp_submit4(apl_lig, apl_saida, parms, target, opc, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      var sob_iframe = '';\r\n");
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'])) {
       $nm_saida->saida("      sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
       $nm_saida->saida("      if (typeof func_menu_aba !== 'function') \r\n");
       $nm_saida->saida("      { \r\n");
       $nm_saida->saida("          sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      } \r\n");
   }
   $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
   $nm_saida->saida("      eval (\"var aba_atual = \" + sob_iframe + \"parent.Aba_atual\"); \r\n");
   $nm_saida->saida("      if (apl_name != null && apl_name != '' && typeof func_menu_aba === 'function') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          for (i = 0; i < Tab_lig_apls.length; i++)\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              if (Tab_lig_apls[i] == apl_name)\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  if (opc != null && opc != '') \r\n");
   $nm_saida->saida("                  {\r\n");
   $nm_saida->saida("                      opc = \"grid\";\r\n");
   $nm_saida->saida("                  }\r\n");
   $nm_saida->saida("                  else\r\n");
   $nm_saida->saida("                  {\r\n");
   $nm_saida->saida("                      opc = \"igual\";\r\n");
   $nm_saida->saida("                  }\r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?#\\?/g, \"*scin\"); \r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?@\\?/g, \"*scout\"); \r\n");
   $nm_saida->saida("                  apl_lig += '?nmgp_parms=' + parms + '&nm_run_menu=1&nmgp_opcao=' + opc + Tab_lig_init[apl_name];\r\n");
   $nm_saida->saida("                  apl_lig += '&Refresh_aba_menu=' + aba_atual;\r\n");
   $nm_saida->saida("                  func_menu_aba(apl_name, Tab_lig_lab[apl_name], Tab_lig_hint[apl_name], Tab_lig_img_on[apl_name], Tab_lig_img_off[apl_name], apl_lig, Tab_lig_Type[apl_name]);\r\n");
   $nm_saida->saida("                  return;\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      if (\"dbifrm_widget\" == target.substr(0, 13)) {\r\n");
   $nm_saida->saida("          var targetIframe = $(parent.document).find(\"[name='\" + target + \"']\");\r\n");
   $nm_saida->saida("          apl_lig = parent.scIframeSCInit && parent.scIframeSCInit[target] ? addUrlParam(apl_lig, \"script_case_init\", parent.scIframeSCInit[target]) : apl_lig;\r\n");
   $nm_saida->saida("          targetIframe.attr(\"src\", apl_lig);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc == 'igual' || opc == 'novo') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = opc;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"igual\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value   = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value       = parms ;\r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit5(apl_lig, apl_saida, parms, target, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      parms = parms.replace(/@percent@/g, \"%\"); \r\n");
   $nm_saida->saida("      if (m_confirm != null && m_confirm != '') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          if (confirm(m_confirm))\r\n");
   $nm_saida->saida("          { }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("             return;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      var sob_iframe = '';\r\n");
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['dashboard_info']['under_dashboard'])) {
       $nm_saida->saida("      sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
       $nm_saida->saida("      if (typeof func_menu_aba !== 'function') \r\n");
       $nm_saida->saida("      { \r\n");
       $nm_saida->saida("          sob_iframe += 'parent.';\r\n");
       $nm_saida->saida("      } \r\n");
   }
   $nm_saida->saida("      eval (\"var func_menu_aba = \" + sob_iframe + \"parent.createIframe\"); \r\n");
   $nm_saida->saida("      if (apl_name != null && apl_name != '' && typeof func_menu_aba === 'function') \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          for (i = 0; i < Tab_lig_apls.length; i++)\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              if (Tab_lig_apls[i] == apl_name)\r\n");
   $nm_saida->saida("              {\r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?#\\?/g, \"*scin\"); \r\n");
   $nm_saida->saida("                  parms = parms.replace(/\\?@\\?/g, \"*scout\"); \r\n");
   $nm_saida->saida("                  apl_lig += '?nmgp_parms=' + parms + '&nm_run_menu=1&nmgp_opcao=' + opc + Tab_lig_init[apl_name];\r\n");
   $nm_saida->saida("                  func_menu_aba(apl_name, Tab_lig_lab[apl_name], Tab_lig_hint[apl_name], Tab_lig_img_on[apl_name], Tab_lig_img_off[apl_name], apl_lig, Tab_lig_Type[apl_name]);\r\n");
   $nm_saida->saida("                  return;\r\n");
   $nm_saida->saida("              }\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (target == 'modal' || target == 'modal_rpdf') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          par_modal = '?&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_compras';\r\n");
   $nm_saida->saida("          if (opc != null && opc != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_opcao=grid';\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          if (parms != null && parms != '') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              par_modal += '&nmgp_parms=' + parms;\r\n");
   $nm_saida->saida("          }\r\n");
   $Sc_parent = "";
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $Sc_parent = "parent.";
   }
   $nm_saida->saida("          if (target == 'modal') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&modal=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("               " . $Sc_parent . "tb_show('', apl_lig + par_modal + '&TB_iframe=true&height=' + modal_h + '&width=' + modal_w, '');\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      if (target == '_blank') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_ancor_ult_lig = ancor;\r\n");
   $nm_saida->saida("          document.F3.nmgp_outra_jan.value = \"true\" ;\r\n");
   $nm_saida->saida("          window.open('','jan_sc','location=no,menubar=no,resizable,scrollbars,status=no,toolbar=no');\r\n");
   $nm_saida->saida("          document.F3.target = \"jan_sc\"; \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (\"dbifrm_widget\" == target.substr(0, 13)) {\r\n");
   $nm_saida->saida("          var targetIframe = $(parent.document).find(\"[name='\" + target + \"']\");\r\n");
   $nm_saida->saida("          apl_lig = parent.scIframeSCInit && parent.scIframeSCInit[target] ? addUrlParam(apl_lig, \"script_case_init\", parent.scIframeSCInit[target]) : apl_lig;\r\n");
   $nm_saida->saida("          targetIframe.attr(\"src\", apl_lig);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.action = apl_lig;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      document.F3.nmgp_outra_jan.value   = \"\" ;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function addUrlParam(sUrl, sParam, sValue) {\r\n");
   $nm_saida->saida("           var baseUrl, urlParams = [], objParams = {}, tmp, i;\r\n");
   $nm_saida->saida("           tmp = sUrl.split(\"?\");\r\n");
   $nm_saida->saida("           baseUrl = tmp[0];\r\n");
   $nm_saida->saida("           if (tmp[1]) {\r\n");
   $nm_saida->saida("                   urlParams = tmp[1].split(\"&\");\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           for (i = 0; i < urlParams.length; i++) {\r\n");
   $nm_saida->saida("                   tmp = urlParams[i].split(\"=\");\r\n");
   $nm_saida->saida("                   objParams[ tmp[0] ] = tmp[1] ? tmp[1] : \"\";\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           objParams[sParam] = sValue;\r\n");
   $nm_saida->saida("           urlParams = [];\r\n");
   $nm_saida->saida("           for (tmp in objParams) {\r\n");
   $nm_saida->saida("                   urlParams.push(tmp + \"=\" + objParams[tmp]);\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           return baseUrl + \"?\" + urlParams.join(\"&\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_submit6(apl_lig, apl_saida, parms, target, pos, alt, larg, opc, modal_h, modal_w, m_confirm, apl_name, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (apl_lig.substr(0, 7) == \"http://\" || apl_lig.substr(0, 8) == \"https://\")\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          if (target == '_blank') \r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.open (apl_lig);\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          else\r\n");
   $nm_saida->saida("          {\r\n");
   $nm_saida->saida("              window.location = apl_lig;\r\n");
   $nm_saida->saida("          }\r\n");
   $nm_saida->saida("          return;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_compras');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_compras');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_compras');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_compras');} \r\n");
   $nm_saida->saida("      obj.style.height = (alt == parseInt(alt)) ? alt + 'px' : alt;\r\n");
   $nm_saida->saida("      obj.style.width  = (larg == parseInt(larg)) ? larg + 'px' : larg;\r\n");
   $nm_saida->saida("      document.F3.target = target; \r\n");
   $nm_saida->saida("      document.F3.action = apl_lig  ;\r\n");
   $nm_saida->saida("      if (opc != null && opc != '') \r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"grid\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          document.F3.nmgp_opcao.value = \"\" ;\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = apl_saida ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      if (ancor != null && target == '_self') {\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['grid_compras_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_compras@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_compras/grid_compras_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("               document.Fprint.action = \"grid_compras_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_compras_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("           document.Fexport.action = \"grid_compras_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_compras_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_compras/grid_compras_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_compras_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_compras_export_ctrl.php\";\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_compras']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['campo_psq_ret'] . "\");\r\n");
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
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['js_apos_busca'] . "();\r\n");
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
   $nm_saida->saida("      document.F5.action = \"grid_compras_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_compras']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_compras')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_compras', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
