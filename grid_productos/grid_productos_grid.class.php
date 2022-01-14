<?php
class grid_productos_grid
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
   var $NM_bg_tot;
   var $NM_bg_sub_tot;
   var $NM_btn_run_show; 
   var $SC_seq_btn_run;
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
   var $sum_existencia_menor;
   var $codigobar_Old;
   var $arg_sum_codigobar;
   var $Label_codigobar;
   var $sc_proc_quebra_codigobar;
   var $count_codigobar;
   var $sum_codigobar_existencia_menor;
   var $nompro_Old;
   var $arg_sum_nompro;
   var $Label_nompro;
   var $sc_proc_quebra_nompro;
   var $count_nompro;
   var $sum_nompro_existencia_menor;
   var $unimay_Old;
   var $arg_sum_unimay;
   var $Label_unimay;
   var $sc_proc_quebra_unimay;
   var $count_unimay;
   var $sum_unimay_existencia_menor;
   var $unimen_Old;
   var $arg_sum_unimen;
   var $Label_unimen;
   var $sc_proc_quebra_unimen;
   var $count_unimen;
   var $sum_unimen_existencia_menor;
   var $idgrup_Old;
   var $arg_sum_idgrup;
   var $Label_idgrup;
   var $sc_proc_quebra_idgrup;
   var $count_idgrup;
   var $sum_idgrup_existencia_menor;
   var $idpro1_Old;
   var $arg_sum_idpro1;
   var $Label_idpro1;
   var $sc_proc_quebra_idpro1;
   var $count_idpro1;
   var $sum_idpro1_existencia_menor;
   var $idiva_Old;
   var $arg_sum_idiva;
   var $Label_idiva;
   var $sc_proc_quebra_idiva;
   var $count_idiva;
   var $sum_idiva_existencia_menor;
   var $escombo_Old;
   var $arg_sum_escombo;
   var $Label_escombo;
   var $sc_proc_quebra_escombo;
   var $count_escombo;
   var $sum_escombo_existencia_menor;
   var $btn_stock;
   var $agregarnotainv;
   var $sc_field_0;
   var $idgrup;
   var $codigobar;
   var $nompro;
   var $imagen;
   var $existencia_menor;
   var $unimen;
   var $preciomen;
   var $idiva;
   var $ubicacion;
   var $costomen;
   var $idpro1;
   var $escombo;
   var $idprod;
   var $unimay;
   var $recmayamen;
   var $preciofull;
   var $stockmay;
   var $stockmen;
   var $idpro2;
   var $otro;
   var $otro2;
   var $preciomen2;
   var $preciomen3;
   var $precio2;
   var $preciomay;
   var $unidmaymen;
   var $look_otro;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_productos/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_productos_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
      }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=3>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("      <TD id=\"div_refin_search\" class=\"scGridRefinedSearchPadding\" valign='top'>\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $this->html_interativ_search();
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refresh_interativ']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refresh_interativ'] == "S") {
                   $this->Ini->Arr_result['setValue'][] = array('field' => 'div_refin_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               }
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refresh_interativ']);
               $tb_disp = (!empty($this->nm_grid_sem_reg) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_int_search']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'TB_Interativ_Search', 'value' => $tb_disp);
           } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_int_search'] = false;
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("      <TD class=\"scGridRefinedSearchMolduraResult\" valign='top'>\r\n");
       $nm_saida->saida("       <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       } 
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_productos'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['save_grid']))
       {
           $this->refresh_interativ_search();
       }
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != 'print')
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_productos_grafico();
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'];
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_productos/grid_productos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by")
   {
       if (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1)
       {
           $this->width_tabula_quebra  = (((count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) - 1) * 13) + 3) . "px";
           $this->width_tabula_display = "''";
           $this->Tem_tab_vert = true;
       }
       else
       {
           $this->width_tabula_quebra  = "0px";
           $this->width_tabula_display = "none";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] = "N";
   }
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_productos", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['group_2'] = "on";
   $this->nmgp_botoes['group_1'] = "on";
   $this->nmgp_botoes['group_2'] = "on";
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
   $this->nmgp_botoes['reload'] = "on";
   $this->nmgp_botoes['elimina'] = "on";
   $this->nmgp_botoes['SC_btn_0'] = "on";
   $this->nmgp_botoes['copiar_producto'] = "on";
   $this->nmgp_botoes['btn_subir_a_nube'] = "on";
   $this->nmgp_botoes['btn_actualizar_nube'] = "on";
   $this->nmgp_botoes['btn_recalcular'] = "on";
   $this->Cmps_ord_def['idgrup'] = " desc";
   $this->Cmps_ord_def['codigobar'] = " asc";
   $this->Cmps_ord_def['nompro'] = " asc";
   $this->Cmps_ord_def['existencia_menor'] = " desc";
   $this->Cmps_ord_def['unimen'] = " asc";
   $this->Cmps_ord_def['preciomen'] = " desc";
   $this->Cmps_ord_def['idiva'] = " desc";
   $this->Cmps_ord_def['ubicacion'] = " asc";
   $this->Cmps_ord_def['costomen'] = " desc";
   $this->Cmps_ord_def['idpro1'] = " desc";
   $this->Cmps_ord_def['escombo'] = " asc";
   $this->Cmps_ord_def['idprod'] = " desc";
   $this->Cmps_ord_def['unimay'] = " asc";
   $this->Cmps_ord_def['recmayamen'] = " desc";
   $this->Cmps_ord_def['preciofull'] = " asc";
   $this->Cmps_ord_def['stockmay'] = " desc";
   $this->Cmps_ord_def['stockmen'] = " desc";
   $this->Cmps_ord_def['idpro2'] = " desc";
   $this->Cmps_ord_def['otro'] = " desc";
   $this->Cmps_ord_def['otro2'] = " desc";
   $this->Cmps_ord_def['preciomen2'] = " desc";
   $this->Cmps_ord_def['preciomen3'] = " desc";
   $this->Cmps_ord_def['precio2'] = " desc";
   $this->Cmps_ord_def['preciomay'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->codigobar = $Busca_temp['codigobar']; 
       $tmp_pos = strpos($this->codigobar, "##@@");
       if ($tmp_pos !== false && !is_array($this->codigobar))
       {
           $this->codigobar = substr($this->codigobar, 0, $tmp_pos);
       }
       $this->nompro = $Busca_temp['nompro']; 
       $tmp_pos = strpos($this->nompro, "##@@");
       if ($tmp_pos !== false && !is_array($this->nompro))
       {
           $this->nompro = substr($this->nompro, 0, $tmp_pos);
       }
       $this->idgrup = $Busca_temp['idgrup']; 
       $tmp_pos = strpos($this->idgrup, "##@@");
       if ($tmp_pos !== false && !is_array($this->idgrup))
       {
           $this->idgrup = substr($this->idgrup, 0, $tmp_pos);
       }
       $this->idpro1 = $Busca_temp['idpro1']; 
       $tmp_pos = strpos($this->idpro1, "##@@");
       if ($tmp_pos !== false && !is_array($this->idpro1))
       {
           $this->idpro1 = substr($this->idpro1, 0, $tmp_pos);
       }
       $this->idpro2 = $Busca_temp['idpro2']; 
       $tmp_pos = strpos($this->idpro2, "##@@");
       if ($tmp_pos !== false && !is_array($this->idpro2))
       {
           $this->idpro2 = substr($this->idpro2, 0, $tmp_pos);
       }
       $this->idiva = $Busca_temp['idiva']; 
       $tmp_pos = strpos($this->idiva, "##@@");
       if ($tmp_pos !== false && !is_array($this->idiva))
       {
           $this->idiva = substr($this->idiva, 0, $tmp_pos);
       }
       $this->escombo = $Busca_temp['escombo']; 
       $tmp_pos = strpos($this->escombo, "##@@");
       if ($tmp_pos !== false && !is_array($this->escombo))
       {
           $this->escombo = substr($this->escombo, 0, $tmp_pos);
       }
       $this->stockmen = $Busca_temp['stockmen']; 
       $tmp_pos = strpos($this->stockmen, "##@@");
       if ($tmp_pos !== false && !is_array($this->stockmen))
       {
           $this->stockmen = substr($this->stockmen, 0, $tmp_pos);
       }
       $stockmen_2 = $Busca_temp['stockmen_input_2']; 
       $this->stockmen_2 = $Busca_temp['stockmen_input_2']; 
       $this->ubicacion = $Busca_temp['ubicacion']; 
       $tmp_pos = strpos($this->ubicacion, "##@@");
       if ($tmp_pos !== false && !is_array($this->ubicacion))
       {
           $this->ubicacion = substr($this->ubicacion, 0, $tmp_pos);
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "muda_qt_linhas";
   } 
       ob_start(); 
   $_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'on';
if (!isset($_SESSION['gnube_activa'])) {$_SESSION['gnube_activa'] = "";}
if (!isset($this->sc_temp_gnube_activa)) {$this->sc_temp_gnube_activa = (isset($_SESSION['gnube_activa'])) ? $_SESSION['gnube_activa'] : "";}
if (!isset($_SESSION['gusuario_logueo'])) {$_SESSION['gusuario_logueo'] = "";}
if (!isset($this->sc_temp_gusuario_logueo)) {$this->sc_temp_gusuario_logueo = (isset($_SESSION['gusuario_logueo'])) ? $_SESSION['gusuario_logueo'] : "";}
 $this->NM_cmp_hidden["agregarnotainv"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "off"; }
 
      $nm_select = "select grupo from usuarios where usuario='".$this->sc_temp_gusuario_logueo."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiExiste = array();
      $this->vsiexiste = array();
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
                        $this->vSiExiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiexiste[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiExiste = false;
          $this->vSiExiste_erro = $this->Db->ErrorMsg();
          $this->vsiexiste = false;
          $this->vsiexiste_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsiexiste[0][0]))
{
	if($this->vsiexiste[0][0]==1)
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "on"; }
	}
}


$vsql = "select ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota from configuraciones where idconfiguraciones=1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vConfig = array();
      $this->vconfig = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vConfig[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vconfig[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vConfig = false;
          $this->vConfig_erro = $this->Db->ErrorMsg();
          $this->vconfig = false;
          $this->vconfig_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vconfig[0][0]))
{
	if($this->vconfig[0][0]=="SI")
	{
		$this->NM_cmp_hidden["idgrup"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idgrup"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idgrup"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idgrup"] = "off"; }
	}
	
	if($this->vconfig[0][1]=="SI")
	{
		$this->NM_cmp_hidden["codigobar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["codigobar"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["codigobar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["codigobar"] = "off"; }
	}
	
	if($this->vconfig[0][2]=="SI")
	{
		$this->NM_cmp_hidden["imagen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["imagen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["imagen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["imagen"] = "off"; }
	}
	
	if($this->vconfig[0][3]=="SI")
	{
		$this->NM_cmp_hidden["existencia_menor"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["existencia_menor"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["existencia_menor"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["existencia_menor"] = "off"; }
	}
	
	if($this->vconfig[0][4]=="SI")
	{
		$this->NM_cmp_hidden["unimen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["unimen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["unimen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["unimen"] = "off"; }
	}
	
	if($this->vconfig[0][5]=="SI")
	{
		$this->NM_cmp_hidden["preciomen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["preciomen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["preciomen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["preciomen"] = "off"; }
	}
	
	if($this->vconfig[0][6]=="SI")
	{
		$this->NM_cmp_hidden["idiva"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idiva"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idiva"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idiva"] = "off"; }
	}
	
	if($this->vconfig[0][7]=="SI")
	{
		$this->NM_cmp_hidden["btn_stock"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["btn_stock"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["btn_stock"] = "off"; }
	}
	
	if($this->vconfig[0][8]=="SI")
	{
		$this->NM_cmp_hidden["ubicacion"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["ubicacion"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["ubicacion"] = "off"; }
	}
	
	if($this->vconfig[0][9]=="SI")
	{
		$this->NM_cmp_hidden["costomen"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["costomen"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["costomen"] = "off"; }
	}
	
	if($this->vconfig[0][10]=="SI")
	{
		$this->NM_cmp_hidden["idpro1"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["idpro1"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["idpro1"] = "off"; }
	}
	
	if($this->vconfig[0][11]=="SI")
	{
		$this->NM_cmp_hidden["escombo"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["escombo"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["escombo"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["escombo"] = "off"; }
	}
	
	if($this->vconfig[0][12]=="SI")
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["agregarnotainv"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['php_cmp_sel']["agregarnotainv"] = "off"; }
	}
}


if($this->sc_temp_gnube_activa == "SI")
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "on";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "on";;
}
else
{
	$this->nmgp_botoes["btn_subir_a_nube"] = "off";;
	$this->nmgp_botoes["btn_actualizar_nube"] = "off";;
}
if (isset($this->sc_temp_gusuario_logueo)) {$_SESSION['gusuario_logueo'] = $this->sc_temp_gusuario_logueo;}
if (isset($this->sc_temp_gnube_activa)) {$_SESSION['gnube_activa'] = $this->sc_temp_gnube_activa;}
$_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'off'; 
       $this->SC_Buf_onInit = ob_get_clean();; 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_productos'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_productos'];

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

   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['insert'] != '')
   {
       $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['insert'];
       $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['insert'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['update'] != '')
   {
       $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['update'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_productos']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['delete'] != '')
   {
       $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_productos']['delete'];
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_sql_btn_run'] = array(); 
   $this->NM_btn_run_show = ($this->Ini->SC_Link_View || $this->grid_emb_form || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida']) ? false : true;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq']) 
   { 
      $this->nmgp_botoes['elimina'] = "off";
      $this->nmgp_botoes['btn_subir_a_nube'] = "off";
      $this->nmgp_botoes['btn_actualizar_nube'] = "off";
      $this->nmgp_botoes['btn_recalcular'] = "off";
   } 
   if ($this->nmgp_botoes['elimina'] != "on" && $this->nmgp_botoes['btn_subir_a_nube'] != "on" && $this->nmgp_botoes['btn_actualizar_nube'] != "on" && $this->nmgp_botoes['btn_recalcular'] != "on") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_productos/grid_productos_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_productos_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'] != "pdf")  
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_productos_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] = 15;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idprod'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idgrup'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select'] = array(); 
           $Free_sql_atual = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_sql'] as $cmp => $resto)
           {
               foreach ($resto as $cmp_sql => $ord)
               {
                   $Free_sql_atual[$cmp_sql] = 0;
               } 
           } 
           if (!isset($Free_sql_atual['idprod']))
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idprod'] = 'DESC'; 
           } 
           $Free_sql_atual = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_sql'] as $cmp => $resto)
           {
               foreach ($resto as $cmp_sql => $ord)
               {
                   $Free_sql_atual[$cmp_sql] = 0;
               } 
           } 
           if (!isset($Free_sql_atual['idgrup']))
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idgrup'] = 'DESC'; 
           } 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idprod'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']['idgrup'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'] = array(); 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'] = array(); 
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_sql'] as $cmp_var => $resto)
           {
               foreach ($resto as $SC_Sql_col => $SC_Sql_order)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'][$cmp_var][$SC_Sql_col] = $SC_Sql_order;
               }
           }
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']       = "igual" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_existencia_menor = 0;
   $this->arg_sum_codigobar = "";
   $this->count_codigobar = 0;
   $this->sum_codigobar_existencia_menor = 0;
   $this->arg_sum_nompro = "";
   $this->count_nompro = 0;
   $this->sum_nompro_existencia_menor = 0;
   $this->arg_sum_unimay = "";
   $this->count_unimay = 0;
   $this->sum_unimay_existencia_menor = 0;
   $this->arg_sum_unimen = "";
   $this->count_unimen = 0;
   $this->sum_unimen_existencia_menor = 0;
   $this->arg_sum_idgrup = "";
   $this->count_idgrup = 0;
   $this->sum_idgrup_existencia_menor = 0;
   $this->arg_sum_idpro1 = "";
   $this->count_idpro1 = 0;
   $this->sum_idpro1_existencia_menor = 0;
   $this->arg_sum_idiva = "";
   $this->count_idiva = 0;
   $this->sum_idiva_existencia_menor = 0;
   $this->arg_sum_escombo = "";
   $this->count_escombo = 0;
   $this->sum_escombo_existencia_menor = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] > 0) 
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
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT idgrup, codigobar, nompro, imagen, existencia_menor, unimen, preciomen, idiva, ubicacion, costomen, idpro1, escombo, idprod, unimay, recmayamen, preciofull, stockmay, stockmen, idpro2, otro, otro2, preciomen2, preciomen3, precio2, preciomay, unidmaymen from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_desc']; 
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
   if (empty($nmgp_order_by))
   {
       $nmgp_order_by = " order by idgrup";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
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
       $this->idgrup = $this->rs_grid->fields[0] ;  
       $this->idgrup = (string)$this->idgrup;
       $this->codigobar = $this->rs_grid->fields[1] ;  
       $this->nompro = $this->rs_grid->fields[2] ;  
       $this->imagen = $this->rs_grid->fields[3] ;  
       $this->existencia_menor = $this->rs_grid->fields[4] ;  
       $this->existencia_menor = (string)$this->existencia_menor;
       $this->unimen = $this->rs_grid->fields[5] ;  
       $this->preciomen = $this->rs_grid->fields[6] ;  
       $this->preciomen =  str_replace(",", ".", $this->preciomen);
       $this->preciomen = (string)$this->preciomen;
       $this->idiva = $this->rs_grid->fields[7] ;  
       $this->idiva = (string)$this->idiva;
       $this->ubicacion = $this->rs_grid->fields[8] ;  
       $this->costomen = $this->rs_grid->fields[9] ;  
       $this->costomen =  str_replace(",", ".", $this->costomen);
       $this->costomen = (string)$this->costomen;
       $this->idpro1 = $this->rs_grid->fields[10] ;  
       $this->idpro1 = (string)$this->idpro1;
       $this->escombo = $this->rs_grid->fields[11] ;  
       $this->idprod = $this->rs_grid->fields[12] ;  
       $this->idprod = (string)$this->idprod;
       $this->unimay = $this->rs_grid->fields[13] ;  
       $this->recmayamen = $this->rs_grid->fields[14] ;  
       $this->recmayamen =  str_replace(",", ".", $this->recmayamen);
       $this->recmayamen = (string)$this->recmayamen;
       $this->preciofull = $this->rs_grid->fields[15] ;  
       $this->preciofull =  str_replace(",", ".", $this->preciofull);
       $this->preciofull = (string)$this->preciofull;
       $this->stockmay = $this->rs_grid->fields[16] ;  
       $this->stockmay =  str_replace(",", ".", $this->stockmay);
       $this->stockmay = (string)$this->stockmay;
       $this->stockmen = $this->rs_grid->fields[17] ;  
       $this->stockmen = (string)$this->stockmen;
       $this->idpro2 = $this->rs_grid->fields[18] ;  
       $this->idpro2 = (string)$this->idpro2;
       $this->otro = $this->rs_grid->fields[19] ;  
       $this->otro = (string)$this->otro;
       $this->otro2 = $this->rs_grid->fields[20] ;  
       $this->otro2 = (string)$this->otro2;
       $this->preciomen2 = $this->rs_grid->fields[21] ;  
       $this->preciomen2 =  str_replace(",", ".", $this->preciomen2);
       $this->preciomen2 = (string)$this->preciomen2;
       $this->preciomen3 = $this->rs_grid->fields[22] ;  
       $this->preciomen3 =  str_replace(",", ".", $this->preciomen3);
       $this->preciomen3 = (string)$this->preciomen3;
       $this->precio2 = $this->rs_grid->fields[23] ;  
       $this->precio2 =  str_replace(",", ".", $this->precio2);
       $this->precio2 = (string)$this->precio2;
       $this->preciomay = $this->rs_grid->fields[24] ;  
       $this->preciomay =  str_replace(",", ".", $this->preciomay);
       $this->preciomay = (string)$this->preciomay;
       $this->unidmaymen = $this->rs_grid->fields[25] ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
       { 
           if (!empty($this->imagenprod))
           { 
               $this->imagenprod = $this->Db->BlobDecode($this->imagenprod, false, true, "BLOB");
           }
       }
       if (!isset($this->codigobar)) { $this->codigobar = ""; }
       if (!isset($this->nompro)) { $this->nompro = ""; }
       if (!isset($this->unimay)) { $this->unimay = ""; }
       if (!isset($this->unimen)) { $this->unimen = ""; }
       if (!isset($this->idgrup)) { $this->idgrup = ""; }
       if (!isset($this->idpro1)) { $this->idpro1 = ""; }
       if (!isset($this->idiva)) { $this->idiva = ""; }
       if (!isset($this->escombo)) { $this->escombo = ""; }
       $GLOBALS["idiva"] = $this->rs_grid->fields[7] ;  
       $GLOBALS["idiva"] = (string)$GLOBALS["idiva"] ;
       $this->arg_sum_idgrup = ($this->idgrup == "") ? " is null " : " = " . $this->idgrup;
       $this->arg_sum_codigobar = " = " . $this->Db->qstr($this->codigobar);
       $this->arg_sum_nompro = " = " . $this->Db->qstr($this->nompro);
       $this->arg_sum_unimen = " = " . $this->Db->qstr($this->unimen);
       $this->arg_sum_idiva = ($this->idiva == "") ? " is null " : " = " . $this->idiva;
       $this->arg_sum_idpro1 = ($this->idpro1 == "") ? " is null " : " = " . $this->idpro1;
       $this->arg_sum_escombo = " = " . $this->Db->qstr($this->escombo);
       $this->arg_sum_unimay = " = " . $this->Db->qstr($this->unimay);
       $this->look_otro = $this->otro; 
       $this->Lookup->lookup_otro($this->look_otro); 
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by") 
       {
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp] : $cmp;
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               $Cmp_Old    = $cmp . '_Old';
               $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
               $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
           }
           $sql_where = "";
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
               if (!empty($Format_tst))
               {
                   $tmp = $this->$cmp;
                   if (!empty($tmp))
                   {
                       $sql = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                   }
               }
               $cmp_qb     = $this->$cmp;
               $tmp        = "arg_sum_" . $cmp;
               $sql_where .= (!empty($sql_where)) ? " and " : "";
               $sql_where .= $sql . $this->$tmp;
               $tmp        = "quebra_" . $cmp . "_sc_free_group_by";
               $this->$tmp($cmp_qb, $sql_where, $cmp);
           }
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->idgrup = $this->rs_grid->fields[0] ;  
           $this->codigobar = $this->rs_grid->fields[1] ;  
           $this->nompro = $this->rs_grid->fields[2] ;  
           $this->imagen = $this->rs_grid->fields[3] ;  
           $this->existencia_menor = $this->rs_grid->fields[4] ;  
           $this->unimen = $this->rs_grid->fields[5] ;  
           $this->preciomen = $this->rs_grid->fields[6] ;  
           $this->idiva = $this->rs_grid->fields[7] ;  
           $this->ubicacion = $this->rs_grid->fields[8] ;  
           $this->costomen = $this->rs_grid->fields[9] ;  
           $this->idpro1 = $this->rs_grid->fields[10] ;  
           $this->escombo = $this->rs_grid->fields[11] ;  
           $this->idprod = $this->rs_grid->fields[12] ;  
           $this->unimay = $this->rs_grid->fields[13] ;  
           $this->recmayamen = $this->rs_grid->fields[14] ;  
           $this->preciofull = $this->rs_grid->fields[15] ;  
           $this->stockmay = $this->rs_grid->fields[16] ;  
           $this->stockmen = $this->rs_grid->fields[17] ;  
           $this->idpro2 = $this->rs_grid->fields[18] ;  
           $this->otro = $this->rs_grid->fields[19] ;  
           $this->otro2 = $this->rs_grid->fields[20] ;  
           $this->preciomen2 = $this->rs_grid->fields[21] ;  
           $this->preciomen3 = $this->rs_grid->fields[22] ;  
           $this->precio2 = $this->rs_grid->fields[23] ;  
           $this->preciomay = $this->rs_grid->fields[24] ;  
           $this->unidmaymen = $this->rs_grid->fields[25] ;  
           if (!isset($this->codigobar)) { $this->codigobar = ""; }
           if (!isset($this->nompro)) { $this->nompro = ""; }
           if (!isset($this->unimay)) { $this->unimay = ""; }
           if (!isset($this->unimen)) { $this->unimen = ""; }
           if (!isset($this->idgrup)) { $this->idgrup = ""; }
           if (!isset($this->idpro1)) { $this->idpro1 = ""; }
           if (!isset($this->idiva)) { $this->idiva = ""; }
           if (!isset($this->escombo)) { $this->escombo = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_productos']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_productos']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de productos :: PDF</TITLE>
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
                    <meta name="msapplication-TileColor" content="#61678C">
                    <meta name="msapplication-TileImage" content="">
                    <meta name="theme-color" content="#61678C">
                    <meta name="apple-mobile-web-app-status-bar-style" content="#61678C">
                    <link rel="shortcut icon" href=""><?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
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
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pivot_charts']) : 0;
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
               grid_productos_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_productos_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_productos_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_productos_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_productos_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Lista de productos</TITLE>\r\n");
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
$nm_saida->saida("                        <meta name=\"msapplication-TileColor\" content=\"#61678C\" >\r\n");
$nm_saida->saida("                        <meta name=\"msapplication-TileImage\" content=\"\">\r\n");
$nm_saida->saida("                        <meta name=\"theme-color\" content=\"#61678C\">\r\n");
$nm_saida->saida("                        <meta name=\"apple-mobile-web-app-status-bar-style\" content=\"#61678C\">\r\n");
$nm_saida->saida("                        <link rel=\"shortcut icon\" href=\"\">\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       $css_body = "margin-left:0px;margin-top:0px;";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'] && !$this->Ini->sc_export_ajax)
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
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_productos_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_productos_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_productos_message.js\"></script>\r\n");
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid']) . ";\r\n");
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
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ancor_save']);
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
           $nm_saida->saida("       url: \"grid_productos_save_grid.php\",\r\n");
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
$nm_saida->saida("      url: \"grid_productos_save_grid.php\",\r\n");
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_productos_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
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
                   if (substr(trim($NM_line_css), 0, 12) == ".scGridTotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
                   if (substr(trim($NM_line_css), 0, 15) == ".scGridSubtotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_sub_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
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
                   if (substr(trim($NM_line_css), 0, 12) == ".scGridTotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
                   if (substr(trim($NM_line_css), 0, 15) == ".scGridSubtotal")
                   {
                       $tmp_pos = strpos($NM_line_css, "background-color:");
                       if ($tmp_pos !== false)
                       {
                           $tmp_pos += 17;
                           $tmp_pos1 = strpos($NM_line_css, ";", $tmp_pos);
                           if ($tmp_pos1 === false)
                           {
                               $tmp_pos1 = strpos($NM_line_css, "}", $tmp_pos);
                           }
                           $this->NM_bg_sub_tot = trim(substr($NM_line_css, $tmp_pos, ($tmp_pos1 - $tmp_pos)));
                       }
                   }
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
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_productos_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['num_css'] . '.css');
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_productos_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_productos/grid_productos_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_productos/grid_productos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
  {
   $nm_saida->saida("      thead { display: table-header-group !important; }\r\n");
   $nm_saida->saida("      tfoot { display: table-row-group !important; }\r\n");
   $nm_saida->saida("      table td, table tr, td, tr, table { page-break-inside: avoid !important; }\r\n");
   $nm_saida->saida("      #summary_body > td { padding: 0px !important; }\r\n");
  }
           $nm_saida->saida("  </style>\r\n");
       }
       if (!empty($this->SC_Buf_onInit))
       { 
       $nm_saida->saida("" . $this->SC_Buf_onInit . "\r\n");
       } 
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_productos/grid_productos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_productos_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print")) 
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
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Código", "codigobar");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_productos']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_productos']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_productos']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_productos']) . "_";
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

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida']) ? "grid_productos_" : "";
   $this->css_sep = " ";
   $this->css_idgrup_label = $compl_css_emb . "css_idgrup_label";
   $this->css_idgrup_grid_line = $compl_css_emb . "css_idgrup_grid_line";
   $this->css_codigobar_label = $compl_css_emb . "css_codigobar_label";
   $this->css_codigobar_grid_line = $compl_css_emb . "css_codigobar_grid_line";
   $this->css_nompro_label = $compl_css_emb . "css_nompro_label";
   $this->css_nompro_grid_line = $compl_css_emb . "css_nompro_grid_line";
   $this->css_imagen_label = $compl_css_emb . "css_imagen_label";
   $this->css_imagen_grid_line = $compl_css_emb . "css_imagen_grid_line";
   $this->css_existencia_menor_label = $compl_css_emb . "css_existencia_menor_label";
   $this->css_existencia_menor_grid_line = $compl_css_emb . "css_existencia_menor_grid_line";
   $this->css_unimen_label = $compl_css_emb . "css_unimen_label";
   $this->css_unimen_grid_line = $compl_css_emb . "css_unimen_grid_line";
   $this->css_preciomen_label = $compl_css_emb . "css_preciomen_label";
   $this->css_preciomen_grid_line = $compl_css_emb . "css_preciomen_grid_line";
   $this->css_idiva_label = $compl_css_emb . "css_idiva_label";
   $this->css_idiva_grid_line = $compl_css_emb . "css_idiva_grid_line";
   $this->css_btn_stock_label = $compl_css_emb . "css_btn_stock_label";
   $this->css_btn_stock_grid_line = $compl_css_emb . "css_btn_stock_grid_line";
   $this->css_ubicacion_label = $compl_css_emb . "css_ubicacion_label";
   $this->css_ubicacion_grid_line = $compl_css_emb . "css_ubicacion_grid_line";
   $this->css_costomen_label = $compl_css_emb . "css_costomen_label";
   $this->css_costomen_grid_line = $compl_css_emb . "css_costomen_grid_line";
   $this->css_idpro1_label = $compl_css_emb . "css_idpro1_label";
   $this->css_idpro1_grid_line = $compl_css_emb . "css_idpro1_grid_line";
   $this->css_escombo_label = $compl_css_emb . "css_escombo_label";
   $this->css_escombo_grid_line = $compl_css_emb . "css_escombo_grid_line";
   $this->css_agregarnotainv_label = $compl_css_emb . "css_agregarnotainv_label";
   $this->css_agregarnotainv_grid_line = $compl_css_emb . "css_agregarnotainv_grid_line";
   $this->css_idprod_label = $compl_css_emb . "css_idprod_label";
   $this->css_idprod_grid_line = $compl_css_emb . "css_idprod_grid_line";
   $this->css_unimay_label = $compl_css_emb . "css_unimay_label";
   $this->css_unimay_grid_line = $compl_css_emb . "css_unimay_grid_line";
   $this->css_recmayamen_label = $compl_css_emb . "css_recmayamen_label";
   $this->css_recmayamen_grid_line = $compl_css_emb . "css_recmayamen_grid_line";
   $this->css_preciofull_label = $compl_css_emb . "css_preciofull_label";
   $this->css_preciofull_grid_line = $compl_css_emb . "css_preciofull_grid_line";
   $this->css_stockmay_label = $compl_css_emb . "css_stockmay_label";
   $this->css_stockmay_grid_line = $compl_css_emb . "css_stockmay_grid_line";
   $this->css_stockmen_label = $compl_css_emb . "css_stockmen_label";
   $this->css_stockmen_grid_line = $compl_css_emb . "css_stockmen_grid_line";
   $this->css_idpro2_label = $compl_css_emb . "css_idpro2_label";
   $this->css_idpro2_grid_line = $compl_css_emb . "css_idpro2_grid_line";
   $this->css_otro_label = $compl_css_emb . "css_otro_label";
   $this->css_otro_grid_line = $compl_css_emb . "css_otro_grid_line";
   $this->css_otro2_label = $compl_css_emb . "css_otro2_label";
   $this->css_otro2_grid_line = $compl_css_emb . "css_otro2_grid_line";
   $this->css_preciomen2_label = $compl_css_emb . "css_preciomen2_label";
   $this->css_preciomen2_grid_line = $compl_css_emb . "css_preciomen2_grid_line";
   $this->css_preciomen3_label = $compl_css_emb . "css_preciomen3_label";
   $this->css_preciomen3_grid_line = $compl_css_emb . "css_preciomen3_grid_line";
   $this->css_precio2_label = $compl_css_emb . "css_precio2_label";
   $this->css_precio2_grid_line = $compl_css_emb . "css_precio2_grid_line";
   $this->css_preciomay_label = $compl_css_emb . "css_preciomay_label";
   $this->css_preciomay_grid_line = $compl_css_emb . "css_preciomay_grid_line";
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['cab']))
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq'];
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
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cond_pesq'], 0, $trab_pos);
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) 
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
       $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png";
       $img_LIN1_COL3 = "usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img)
   {
       $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png";
       $tmp_img_word = fopen($loc_img_word, "rb");
       $reg_img_word = fread($tmp_img_word, filesize($loc_img_word));
       fclose($tmp_img_word);
       $img_LIN1_COL3 = "data:image/jpeg;base64," . base64_encode($reg_img_word);
   }
   else
   {
       $img_LIN1_COL3 = $this->NM_raiz_img . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__1455554405_line-34_icon-icons.com_53300.png";
   }
   $nm_saida->saida("<TABLE width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" cellpadding=\"0\" cellspacing=\"0\">\r\n");
   $nm_saida->saida("<TR align=\"center\">\r\n");
   $nm_saida->saida(" <TD colspan=\"3\">\r\n");
   $nm_saida->saida("     <table  style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\r\n");
   $nm_saida->saida("       <tr valign=\"middle\">\r\n");
   $nm_saida->saida("         <td align=\"left\" ><span class=\"" . $this->css_scGridHeaderFont . "\"> Lista de productos </span></td>\r\n");
   $nm_saida->saida("         <td style=\"font-size: 5px\">&nbsp; &nbsp; </td>\r\n");
   $nm_saida->saida("         <td align=\"center\" ><span class=\"" . $this->css_scGridHeaderFont . "\"> " . $nm_cab_filtro . " </span></td>\r\n");
   $nm_saida->saida("         <td style=\"font-size: 5px\">&nbsp; &nbsp; </td>\r\n");
   $nm_saida->saida("         <td align=\"right\" ><span class=\"" . $this->css_scGridHeaderFont . "\">    <IMG SRC=\"" . $img_LIN1_COL3 . "\" BORDER=\"0\"/> &nbsp;&nbsp;</span></td>\r\n");
   $nm_saida->saida("         <td width=\"3px\" class=\"" . $this->css_scGridHeader . "\"></td>\r\n");
   $nm_saida->saida("       </tr>\r\n");
   $nm_saida->saida("     </table>\r\n");
   $nm_saida->saida(" </TD>\r\n");
   $nm_saida->saida("</TR>\r\n");
   $nm_saida->saida("<TR align=\"center\" >\r\n");
   $nm_saida->saida("  <TD height=\"5px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("  <TD height=\"1px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("  <TD height=\"1px\" class=\"" . $this->css_scGridHeader . "\"></TD>\r\n");
   $nm_saida->saida("</TR>\r\n");
   $nm_saida->saida("</TABLE>\r\n");
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
   $this->SC_contr_ck_grid = (!isset($this->SC_contr_ck_grid)) ? "''" : "none";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_label'])
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
   $nm_saida->saida("    <TR id=\"tit_grid_productos__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_productos-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($this->NM_btn_run_show) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" ><input type=checkbox id=\"NM_ck_run0\" name=\"NM_ck_grid[]\" value=\"0\" style=\"display:" . $this->SC_contr_ck_grid . "\" onClick=\"nm_marca_check_grid(this)\"></TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] == "S")) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_label'])
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
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_productos/grid_productos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_productos_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cols_emb'] = count($Nm_temp) - 1;
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
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_idgrup()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : "Grupo"; 
   if (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idgrup_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idgrup_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'idgrup')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idgrup')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_codigobar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
   if (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_codigobar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_codigobar_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'codigobar')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('codigobar')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_nompro()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Producto"; 
   if (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nompro_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nompro_label'] . "\" NOWRAP WIDTH=\"200px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'nompro')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('nompro')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_imagen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
   if (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_imagen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_imagen_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_existencia_menor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['existencia_menor'])) ? $this->New_label['existencia_menor'] : "Existencia"; 
   if (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_existencia_menor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_existencia_menor_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'existencia_menor')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('existencia_menor')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_unimen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['unimen'])) ? $this->New_label['unimen'] : "Unidad"; 
   if (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_unimen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_unimen_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'unimen')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('unimen')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_preciomen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : "Precio"; 
   if (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_preciomen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomen_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'preciomen')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('preciomen')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_idiva()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idiva'])) ? $this->New_label['idiva'] : "Impuesto(%)"; 
   if (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idiva_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idiva_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'idiva')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idiva')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_btn_stock()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['btn_stock'])) ? $this->New_label['btn_stock'] : "Stock"; 
   if (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_btn_stock_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_btn_stock_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_ubicacion()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "Ubicacion"; 
   if (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_ubicacion_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_ubicacion_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'ubicacion')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('ubicacion')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_costomen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['costomen'])) ? $this->New_label['costomen'] : "Costo"; 
   if (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_costomen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_costomen_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'costomen')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('costomen')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_idpro1()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : "Proveedor"; 
   if (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idpro1_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idpro1_label'] . "\" NOWRAP WIDTH=\"70px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'idpro1')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idpro1')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_escombo()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; 
   if (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_escombo_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_escombo_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'escombo')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('escombo')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_agregarnotainv()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['agregarnotainv'])) ? $this->New_label['agregarnotainv'] : "Nota"; 
   if (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_agregarnotainv_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_agregarnotainv_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_idprod()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idprod'])) ? $this->New_label['idprod'] : "Producto"; 
   if (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idprod_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idprod_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'idprod')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idprod')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_unimay()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['unimay'])) ? $this->New_label['unimay'] : "Unidad"; 
   if (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_unimay_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_unimay_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'unimay')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('unimay')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_recmayamen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['recmayamen'])) ? $this->New_label['recmayamen'] : "Factor"; 
   if (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_recmayamen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_recmayamen_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'recmayamen')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('recmayamen')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_preciofull()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['preciofull'])) ? $this->New_label['preciofull'] : "Precio"; 
   if (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_preciofull_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciofull_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'preciofull')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('preciofull')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_stockmay()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['stockmay'])) ? $this->New_label['stockmay'] : "Stock Mayor"; 
   if (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_stockmay_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_stockmay_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'stockmay')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('stockmay')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_stockmen()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['stockmen'])) ? $this->New_label['stockmen'] : "Existencia"; 
   if (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_stockmen_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_stockmen_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'stockmen')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('stockmen')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_idpro2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idpro2'])) ? $this->New_label['idpro2'] : "Proveedor 2"; 
   if (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idpro2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idpro2_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'idpro2')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idpro2')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_otro()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "Descuento"; 
   if (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_otro_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_otro_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'otro')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('otro')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_otro2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['otro2'])) ? $this->New_label['otro2'] : "%  Desc."; 
   if (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_otro2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_otro2_label'] . "\" NOWRAP WIDTH=\"70px\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'otro2')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('otro2')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_preciomen2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['preciomen2'])) ? $this->New_label['preciomen2'] : "$ Menudeo Especial"; 
   if (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_preciomen2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomen2_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'preciomen2')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('preciomen2')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_preciomen3()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['preciomen3'])) ? $this->New_label['preciomen3'] : "$ Menudeo Mayor"; 
   if (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_preciomen3_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomen3_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'preciomen3')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('preciomen3')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_precio2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['precio2'])) ? $this->New_label['precio2'] : "$ Mayor Especial"; 
   if (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_precio2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_precio2_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'precio2')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('precio2')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_preciomay()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['preciomay'])) ? $this->New_label['preciomay'] : "$ Mayor"; 
   if (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_preciomay_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_preciomay_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_cmp'] == 'preciomay')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('preciomay')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ini_cor_grid']);
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
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : "Grupo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['idgrup'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : "Código"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['codigobar'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : "Producto"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['nompro'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['imagen'])) ? $this->New_label['imagen'] : "Imagen"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['imagen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['existencia_menor'])) ? $this->New_label['existencia_menor'] : "Existencia"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['existencia_menor'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['unimen'])) ? $this->New_label['unimen'] : "Unidad"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['unimen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : "Precio"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['preciomen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idiva'])) ? $this->New_label['idiva'] : "Impuesto(%)"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['idiva'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['btn_stock'])) ? $this->New_label['btn_stock'] : "Stock"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['btn_stock'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : "Ubicacion"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['ubicacion'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['costomen'])) ? $this->New_label['costomen'] : "Costo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['costomen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : "Proveedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['idpro1'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['escombo'])) ? $this->New_label['escombo'] : "Combo"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['escombo'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['agregarnotainv'])) ? $this->New_label['agregarnotainv'] : "Nota"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['agregarnotainv'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idprod'])) ? $this->New_label['idprod'] : "Producto"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['idprod'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['unimay'])) ? $this->New_label['unimay'] : "Unidad"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['unimay'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['recmayamen'])) ? $this->New_label['recmayamen'] : "Factor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['recmayamen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['preciofull'])) ? $this->New_label['preciofull'] : "Precio"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['preciofull'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['stockmay'])) ? $this->New_label['stockmay'] : "Stock Mayor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['stockmay'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['stockmen'])) ? $this->New_label['stockmen'] : "Existencia"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['stockmen'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idpro2'])) ? $this->New_label['idpro2'] : "Proveedor 2"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['idpro2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['otro'])) ? $this->New_label['otro'] : "Descuento"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['otro'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['otro2'])) ? $this->New_label['otro2'] : "%  Desc."; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['otro2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['preciomen2'])) ? $this->New_label['preciomen2'] : "$ Menudeo Especial"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['preciomen2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['preciomen3'])) ? $this->New_label['preciomen3'] : "$ Menudeo Mayor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['preciomen3'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['precio2'])) ? $this->New_label['precio2'] : "$ Mayor Especial"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['precio2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['preciomay'])) ? $this->New_label['preciomay'] : "$ Mayor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['labels']['preciomay'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_productos']['lig_edit'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_refresh'])
   {
       $this->refresh_interativ_search();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_refresh'] = false;
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->NM_btn_run_show = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_productos#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['cab_embutida'] != "S")
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_A_grid_productos', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_D_grid_productos', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_E_grid_productos', 'value' => 'NM_Blank_Page.htm');
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_productos#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_productos#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   if ($this->NM_btn_run_show)
   { 
       $nm_saida->saida("       <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("       <form name=\"FBtn_Run\" method=\"post\" action=\"./\" target=\"_self\">\r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nmgp_opcao\" value=\"formphp\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"rec\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nm_call_php\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"nm_run_opt_sel\" value=\"\"> \r\n");
       $nm_saida->saida("        <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"> \r\n");
       $nm_saida->saida("       </div> \r\n");
   } 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf']) { 
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-08dce820\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['sc_free_group_by']['codigobar'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['codigobar'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['nompro'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['nompro'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['unimay'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['unimay'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['unimen'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['unimen'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['idgrup'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['idgrup'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['idpro1'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['idpro1'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['idiva'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['idiva'] = "N";
   $this->Break_pag_pdf['sc_free_group_by']['escombo'] = "S";
   $this->Break_pag_prt['sc_free_group_by']['escombo'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Page_break_PDF'] = array();
       }
   }
   $this->SC_top       = array();
   $this->SC_bot       = array();
   $this->SC_bot[]     = "codigobar"; 
   $this->SC_top[]     = "codigobar"; 
   $this->SC_bot[]     = "nompro"; 
   $this->SC_top[]     = "nompro"; 
   $this->SC_bot[]     = "unimay"; 
   $this->SC_top[]     = "unimay"; 
   $this->SC_bot[]     = "unimen"; 
   $this->SC_top[]     = "unimen"; 
   $this->SC_bot[]     = "idgrup"; 
   $this->SC_top[]     = "idgrup"; 
   $this->SC_bot[]     = "idpro1"; 
   $this->SC_top[]     = "idpro1"; 
   $this->SC_bot[]     = "idiva"; 
   $this->SC_top[]     = "idiva"; 
   $this->SC_bot[]     = "escombo"; 
   $this->SC_top[]     = "escombo"; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] == 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by") 
   {
       $Nivel_gb = 1;
       $this->Tab_Nv_tree = array();
       $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']);
       $this->Ult_qb_free = $this->Nivel_gbBot;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
       {
           $this->Tab_Nv_tree[$cmp] = $Nivel_gb;
           $Nivel_gb++;
           if (in_array($cmp, $this->SC_top))
           {
               $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
               $this->$tmp($cmp);
           }
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $this->SC_seq_btn_run = 0;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] && !$this->Ini->sc_export_ajax)
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
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_productos_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->idgrup = $this->rs_grid->fields[0] ;  
          $this->idgrup = (string)$this->idgrup;
          $this->codigobar = $this->rs_grid->fields[1] ;  
          $this->nompro = $this->rs_grid->fields[2] ;  
          $this->imagen = $this->rs_grid->fields[3] ;  
          $this->existencia_menor = $this->rs_grid->fields[4] ;  
          $this->existencia_menor = (string)$this->existencia_menor;
          $this->unimen = $this->rs_grid->fields[5] ;  
          $this->preciomen = $this->rs_grid->fields[6] ;  
          $this->preciomen =  str_replace(",", ".", $this->preciomen);
          $this->preciomen = (string)$this->preciomen;
          $this->idiva = $this->rs_grid->fields[7] ;  
          $this->idiva = (string)$this->idiva;
          $this->ubicacion = $this->rs_grid->fields[8] ;  
          $this->costomen = $this->rs_grid->fields[9] ;  
          $this->costomen =  str_replace(",", ".", $this->costomen);
          $this->costomen = (string)$this->costomen;
          $this->idpro1 = $this->rs_grid->fields[10] ;  
          $this->idpro1 = (string)$this->idpro1;
          $this->escombo = $this->rs_grid->fields[11] ;  
          $this->idprod = $this->rs_grid->fields[12] ;  
          $this->idprod = (string)$this->idprod;
          $this->unimay = $this->rs_grid->fields[13] ;  
          $this->recmayamen = $this->rs_grid->fields[14] ;  
          $this->recmayamen =  str_replace(",", ".", $this->recmayamen);
          $this->recmayamen = (string)$this->recmayamen;
          $this->preciofull = $this->rs_grid->fields[15] ;  
          $this->preciofull =  str_replace(",", ".", $this->preciofull);
          $this->preciofull = (string)$this->preciofull;
          $this->stockmay = $this->rs_grid->fields[16] ;  
          $this->stockmay =  str_replace(",", ".", $this->stockmay);
          $this->stockmay = (string)$this->stockmay;
          $this->stockmen = $this->rs_grid->fields[17] ;  
          $this->stockmen = (string)$this->stockmen;
          $this->idpro2 = $this->rs_grid->fields[18] ;  
          $this->idpro2 = (string)$this->idpro2;
          $this->otro = $this->rs_grid->fields[19] ;  
          $this->otro = (string)$this->otro;
          $this->otro2 = $this->rs_grid->fields[20] ;  
          $this->otro2 = (string)$this->otro2;
          $this->preciomen2 = $this->rs_grid->fields[21] ;  
          $this->preciomen2 =  str_replace(",", ".", $this->preciomen2);
          $this->preciomen2 = (string)$this->preciomen2;
          $this->preciomen3 = $this->rs_grid->fields[22] ;  
          $this->preciomen3 =  str_replace(",", ".", $this->preciomen3);
          $this->preciomen3 = (string)$this->preciomen3;
          $this->precio2 = $this->rs_grid->fields[23] ;  
          $this->precio2 =  str_replace(",", ".", $this->precio2);
          $this->precio2 = (string)$this->precio2;
          $this->preciomay = $this->rs_grid->fields[24] ;  
          $this->preciomay =  str_replace(",", ".", $this->preciomay);
          $this->preciomay = (string)$this->preciomay;
          $this->unidmaymen = $this->rs_grid->fields[25] ;  
          if (!isset($this->codigobar)) { $this->codigobar = ""; }
          if (!isset($this->nompro)) { $this->nompro = ""; }
          if (!isset($this->unimay)) { $this->unimay = ""; }
          if (!isset($this->unimen)) { $this->unimen = ""; }
          if (!isset($this->idgrup)) { $this->idgrup = ""; }
          if (!isset($this->idpro1)) { $this->idpro1 = ""; }
          if (!isset($this->idiva)) { $this->idiva = ""; }
          if (!isset($this->escombo)) { $this->escombo = ""; }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              if (!empty($this->imagenprod))
              { 
                  $this->imagenprod = $this->Db->BlobDecode($this->imagenprod, false, true, "BLOB");
              }
          }
          $GLOBALS["idiva"] = $this->rs_grid->fields[7] ;  
          $GLOBALS["idiva"] = (string)$GLOBALS["idiva"];
          $this->arg_sum_idgrup = ($this->idgrup == "") ? " is null " : " = " . $this->idgrup;
          $this->arg_sum_codigobar = " = " . $this->Db->qstr($this->codigobar);
          $this->arg_sum_nompro = " = " . $this->Db->qstr($this->nompro);
          $this->arg_sum_unimen = " = " . $this->Db->qstr($this->unimen);
          $this->arg_sum_idiva = ($this->idiva == "") ? " is null " : " = " . $this->idiva;
          $this->arg_sum_idpro1 = ($this->idpro1 == "") ? " is null " : " = " . $this->idpro1;
          $this->arg_sum_escombo = " = " . $this->Db->qstr($this->escombo);
          $this->arg_sum_unimay = " = " . $this->Db->qstr($this->unimay);
          $this->look_otro = $this->otro; 
          $this->Lookup->lookup_otro($this->look_otro); 
          $this->SC_seq_page++; 
          if ($this->NM_btn_run_show)
          {
              $this->SC_seq_btn_run++;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_sql_btn_run'][$this->SC_seq_btn_run] = $this->rs_grid->fields;
          }
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final'] + 1; 
          $this->SC_sep_quebra = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by") 
          {  
              $SC_arg_Gby = array();
              $SC_arg_Sql = array();
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                  $SC_arg_Gby[$cmp] = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
              }
              $SC_lst_Gby = array();
              $gb_ok      = false;
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
              {
                  $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                  $SC_arg_Sql[$cmp] = $sql;
                  $Fun_GB  = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp] : $cmp;
                  if (!empty($Format_tst))
                  {
                      $temp = $this->$cmp;
                      if (!empty($temp))
                      {
                          $SC_arg_Sql[$cmp] = $this->Ini->Get_sql_date_groupby($sql, $Format_tst);
                      }
                  }
                  $temp = $cmp . "_Old";
                  if ($SC_arg_Gby[$cmp] != $this->$temp || $gb_ok)
                  {
                      $SC_lst_Gby[] = $cmp;
                      $gb_ok = true;
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']);
              krsort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_bot))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                      $this->$tmp($cmp);
                      $this->Nivel_gbBot--;
                  }
                  $sql_where = "";
                  $cmp_qb     = $this->$cmp;
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $Col_Gb => $Sql)
                  {
                      $tmp        = "arg_sum_" . $Col_Gb;
                      $sql_where .= (!empty($sql_where)) ? " and " : "";
                      $sql_where .= $SC_arg_Sql[$Col_Gb] . $this->$tmp;
                      if ($Col_Gb == $cmp)
                      {
                          break;
                      }
                  }
                  $tmp  = "quebra_" . $cmp . "_sc_free_group_by";
                  $this->$tmp($cmp_qb, $sql_where, $cmp);
              }
              if (!empty($SC_lst_Gby))
              {
                  $cmp = $SC_lst_Gby[0];
                  if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby']][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
                  elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Page_break_PDF'][$cmp] == "S")
                  {
                      $this->nm_quebra_pagina("pagina"); 
                  }
              }
              $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']);
              ksort ($SC_lst_Gby);
              foreach ($SC_lst_Gby as $Ind => $cmp)
              {
                  if (in_array($cmp, $this->SC_top))
                  {
                      $tmp = "quebra_" . $cmp . "_sc_free_group_by_top";
                      $this->$tmp($cmp);
                  }
              }
              if (!empty($SC_lst_Gby))
              {
                  $nm_houve_quebra = "S";
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
                  {
                      $Cmp_orig   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_orig'][$cmp] : $cmp;
                      $Format_tst = $this->Ini->Get_Gb_date_format('sc_free_group_by', $cmp);
                      $Cmp_Old   = $cmp . '_Old';
                      $TP_Time = (in_array($Cmp_orig, $this->Ini->Cmp_Sql_Time)) ? "0000-00-00 " : "";
                      $this->$Cmp_Old = $this->Ini->Get_arg_groupby($TP_Time . $this->$Cmp_orig, $Format_tst); 
                  }
              }
          }  
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'on';
 if($this->escombo =="SI")
{
	$this->NM_field_style["escombo"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
if ($this->otro ==1)
	{
	$this->NM_field_style["otro"] = "background-color:#33ff00;";
	$this->NM_field_style["otro2"] = "background-color:#33ff00;";
	}
if($this->unidmaymen =="SI")
{
}
else
{
	$this->stockmen  = 0;
}
if($this->unimen >0)
	{
	 
      $nm_select = "select descripcion_um from unidades_medida where codigo_um = '".$this->unimen  ."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->das = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->das[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->das = false;
          $this->das_erro = $this->Db->ErrorMsg();
      } 
;
	if(isset($this->das[0][0]))
		{
		$this->unimen  = $this->das[0][0];
		}
	else
		{
		$this->unimen  = 'Unidad';
		}
	}
$_SESSION['scriptcase']['grid_productos']['contr_erro'] = 'off';
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['final']; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomay_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomay_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if ($this->NM_btn_run_show){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomay_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"> <input type=\"checkbox\" id=\"NM_ck_run" . $this->SC_seq_btn_run . "\" class=\"sc-ui-check-run\" name=\"NM_ck_grid[]\" value=\"" . NM_encode_input($this->SC_seq_btn_run) . "\" style=\"align:left;vertical-align:middle;font-weight:bold;\" /></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_productos']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_productos'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_productos"]) && $this->Ini->sc_lig_md5["form_productos"] == "S")
              {
                  $Parms_Edt  = "idprod?#?" . str_replace('"', "@aspasd@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idprod?#?" . str_replace('"', "@aspasd@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_productos . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_productos', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_productos . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_productos', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\">" . $Link_Edit . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_productos']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_productos'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_productos"]) && $this->Ini->sc_lig_md5["form_productos"] == "S")
              {
                  $Parms_Edt  = "idprod?#?" . str_replace('"', "@aspasd@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idprod?#?" . str_replace('"', "@aspasd@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_productos . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_productos', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_productos . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_productos', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] == "S")) { 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"right\" valign=\"top\"   HEIGHT=\"0px\">" . $seq_det . "</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by")
       {
           $SC_lst_Gby = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp'] as $cmp => $sql)
           {
               $SC_lst_Gby[] = $cmp;
           }
           $this->Nivel_gbBot = count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']);
           krsort ($SC_lst_Gby);
           foreach ($SC_lst_Gby as $Ind => $cmp)
           {
               if (in_array($cmp, $this->SC_bot))
               {
                   $tmp = "quebra_" . $cmp . "_sc_free_group_by_bot";
                   $this->$tmp($cmp);
                   $this->Nivel_gbBot--;
               }
           }
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($this->NM_btn_run_show)
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_idgrup()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idgrup)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idgrup)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idgrup($conteudo , $this->idgrup) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idgrup', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idgrup', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idgrup_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idgrup_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idgrup_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_codigobar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off") { 
          $conteudo = sc_strip_script($this->codigobar); 
          $conteudo_original = sc_strip_script($this->codigobar); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'codigobar', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'codigobar', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_codigobar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_codigobar_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_codigobar_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nompro()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off") { 
          $conteudo = sc_strip_script($this->nompro); 
          $conteudo_original = sc_strip_script($this->nompro); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nompro', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nompro', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nompro_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nompro_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nompro_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_imagen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off") { 
          $conteudo = $this->imagen; 
          $conteudo_original = $this->imagen; 
          if ($conteudo == "" || empty($this->imagen) || $this->imagen == "none" || $this->imagen == "*nm*") 
          { 
              $conteudo = "&nbsp;" ;  
              $out_imagen = "" ; 
          } 
          elseif ($this->Ini->Gd_missing)
          { 
              $conteudo = "<span class=\"scErrorLine\">" . $this->Ini->Nm_lang['lang_errm_gd'] . "</span>";
          } 
          else 
          { 
              $nm_local_img = $this->Ini->path_imagens .'/'. "/" . $_SESSION['gnit'] . "/" . "/"; 
              nm_fix_SubDirUpload($conteudo, $this->Ini->root . $this->Ini->path_imagens,  "/" . $_SESSION['gnit'] . "/"); 
              $md5_imagen  = md5("/" . $_SESSION['gnit'] . "/" . $conteudo);
              $in_imagen = $this->Ini->root . $nm_local_img . $conteudo;
              $nm_tmp_ver_bk = strpos($conteudo, " "); 
              if ($nm_tmp_ver_bk === false)
              {
                  if (is_file($in_imagen))  
                  { 
                     $NM_ler_img = true;
                     $out_imagen = $this->Ini->path_imag_temp . "/sc_imagen_" . $md5_imagen . ".jpg" ;  
                     if (is_file($this->Ini->root . $out_imagen))  
                     { 
                         $NM_img_time = filemtime($this->Ini->root . $out_imagen) + 0; 
                         if ($this->Ini->nm_timestamp < $NM_img_time)  
                         { 
                             $NM_ler_img = false;
                             $in_imagen = $this->Ini->root . $out_imagen;
                         } 
                     } 
                     if ($NM_ler_img) 
                     { 
                         $tmp_imagen = fopen($in_imagen, "r") ; 
                         $reg_imagen = fread($tmp_imagen, filesize($in_imagen)) ; 
                         fclose($tmp_imagen) ;  
                         $arq_imagen = fopen($this->Ini->root . $out_imagen, "w") ;  
                         fwrite($arq_imagen, $reg_imagen); 
                         fclose($arq_imagen) ;  
                         $in_imagen = $this->Ini->root . $out_imagen;
                     } 
                     $nm_local_img = ""; 
                     $conteudo     = $out_imagen; 
                  } 
              }
              $NM_redim_img = true;
              $out_imagen = $this->Ini->path_imag_temp . "/sc_imagen_7070" . $md5_imagen . ".jpg" ;  
              if (is_file($this->Ini->root . $out_imagen))  
              { 
                  $NM_img_time = filemtime($this->Ini->root . $out_imagen) + 0; 
                  if ($this->Ini->nm_timestamp < $NM_img_time)  
                  { 
                      $NM_redim_img = false;
                  } 
              } 
              if ($NM_redim_img && is_file($in_imagen)) 
              { 
                  $sc_obj_img = new nm_trata_img($in_imagen);
                  $sc_obj_img->setWidth(70);
                  $sc_obj_img->setHeight(70);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $out_imagen);
              } 
              $loc_img_word = $in_imagen;
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Ini->sc_export_ajax_img) 
              { 
                  $tmp_imagen = fopen($loc_img_word, "rb"); 
                  $reg_imagen = fread($tmp_imagen, filesize($loc_img_word)); 
                  fclose($tmp_imagen);  
              } 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $out_imagen;
                  $Clear_path_img = str_replace($this->Ini->path_imag_temp . "/", "", $out_imagen);
                  $conteudo = "<img border=\"0\" src=\"" . $Clear_path_img . "\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_imagen) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img . $out_imagen . "\"/>" ; 
              } 
          }  
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'imagen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imagen', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_imagen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_imagen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_imagen_@scinf_grid_productos_imagen']) ? $this->Ini->sc_lig_target['C_@scinf_imagen_@scinf_grid_productos_imagen'] : (isset($this->Ini->sc_lig_target['C_@scinf_imagen']) ? $this->Ini->sc_lig_target['C_@scinf_imagen'] : null);
       if (isset($this->Ini->sc_lig_md5["grid_productos_imagen"]) && $this->Ini->sc_lig_md5["grid_productos_imagen"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?gidproducto?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?gidproducto?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?";
       }
   $nm_saida->saida("<a id=\"id_sc_field_imagen_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_grid_productos_imagen_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_blank') . "', 'inicio', '0', '0', '', 'grid_productos_imagen', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_imagen_grid_line . "\" style=\"" . $this->Css_Cmp['css_imagen_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_imagen_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_existencia_menor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->existencia_menor)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->existencia_menor)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'existencia_menor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'existencia_menor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_existencia_menor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_existencia_menor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_existencia_menor_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_unimen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off") { 
          $conteudo = sc_strip_script($this->unimen); 
          $conteudo_original = sc_strip_script($this->unimen); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'unimen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'unimen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_unimen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_unimen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_unimen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_preciomen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->preciomen)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->preciomen)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'preciomen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'preciomen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_preciomen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_preciomen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_preciomen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idiva()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idiva)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idiva)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idiva($conteudo , $this->idiva) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idiva', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idiva', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idiva_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idiva_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idiva_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_btn_stock()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off") { 
          $conteudo = $this->btn_stock; 
          $conteudo_original = $this->btn_stock; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_bag_24.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_bag_24.png";
                  $conteudo = "<img border=\"\" src=\"scriptcase__NM__ico__NM__shopping_bag_24.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_bag_24.png";
                  $tmp_btn_stock = fopen($loc_img_word, "rb"); 
                  $reg_btn_stock = fread($tmp_btn_stock, filesize($loc_img_word)); 
                  fclose($tmp_btn_stock);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_btn_stock) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__shopping_bag_24.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'btn_stock', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'btn_stock', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_btn_stock_grid_line . "\"  style=\"" . $this->Css_Cmp['css_btn_stock_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_btn_stock_@scinf_control_stock']) ? $this->Ini->sc_lig_target['C_@scinf_btn_stock_@scinf_control_stock'] : (isset($this->Ini->sc_lig_target['C_@scinf_btn_stock']) ? $this->Ini->sc_lig_target['C_@scinf_btn_stock'] : null);
       if (isset($this->Ini->sc_lig_md5["control_stock"]) && $this->Ini->sc_lig_md5["control_stock"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis*scinS*scoutnmgp_opcao*scinigual*scoutgidprod_stock*scin" . str_replace("'", "@aspass@", $this->idprod) . "*scoutNM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scout";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis*scinS*scoutnmgp_opcao*scinigual*scoutgidprod_stock*scin" . str_replace("'", "@aspass@", $this->idprod) . "*scoutNM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scoutNMSC_modal*scinok*scout";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_btn_stock_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_control_stock_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : 'modal') . "', '', '500', '600', '', 'control_stock', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_btn_stock_grid_line . "\" style=\"" . $this->Css_Cmp['css_btn_stock_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_btn_stock_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_ubicacion()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off") { 
          $conteudo = sc_strip_script($this->ubicacion); 
          $conteudo_original = sc_strip_script($this->ubicacion); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'ubicacion', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'ubicacion', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_ubicacion_grid_line . "\"  style=\"" . $this->Css_Cmp['css_ubicacion_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_ubicacion_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_costomen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off") { 
          $nm_cor_num = ($this->costomen < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->costomen)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->costomen)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'costomen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'costomen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_costomen_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_costomen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_costomen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idpro1()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off") { 
          $conteudo = sc_strip_script($this->idpro1); 
          $conteudo_original = sc_strip_script($this->idpro1); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idpro1($conteudo) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idpro1', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idpro1', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idpro1_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idpro1_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idpro1_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_escombo()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off") { 
          $conteudo = sc_strip_script($this->escombo); 
          $conteudo_original = sc_strip_script($this->escombo); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'escombo', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'escombo', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_escombo = "";
          if (isset($this->NM_field_style["escombo"]) && !empty($this->NM_field_style["escombo"]))
          {
              $Style_escombo .= $this->NM_field_style["escombo"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_escombo_grid_line . "\"  style=\"" . $this->Css_Cmp['css_escombo_grid_line'] . $Style_escombo . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_escombo_@scinf_form_combos']) ? $this->Ini->sc_lig_target['C_@scinf_escombo_@scinf_form_combos'] : (isset($this->Ini->sc_lig_target['C_@scinf_escombo']) ? $this->Ini->sc_lig_target['C_@scinf_escombo'] : null);
       if (isset($this->Ini->sc_lig_md5["form_combos"]) && $this->Ini->sc_lig_md5["form_combos"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idprod?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?gidprod?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idprod?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?gidprod?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?NM_btn_insert?#?N?@?NM_btn_update?#?S?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_escombo_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_combos_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_self') . "', '', '0', '0', '', 'form_combos', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_escombo_grid_line . "\" style=\"" . $this->Css_Cmp['css_escombo_grid_line'] . $Style_escombo . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_escombo_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_agregarnotainv()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off") { 
          $conteudo = $this->agregarnotainv; 
          $conteudo_original = $this->agregarnotainv; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__add2_32.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__add2_32.png";
                  $conteudo = "<img border=\"\" src=\"scriptcase__NM__ico__NM__add2_32.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__add2_32.png";
                  $tmp_agregarnotainv = fopen($loc_img_word, "rb"); 
                  $reg_agregarnotainv = fread($tmp_agregarnotainv, filesize($loc_img_word)); 
                  fclose($tmp_agregarnotainv);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_agregarnotainv) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__add2_32.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'agregarnotainv', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'agregarnotainv', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_agregarnotainv_grid_line . "\"  style=\"" . $this->Css_Cmp['css_agregarnotainv_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_agregarnotainv_@scinf_form_mov_ajusteinv']) ? $this->Ini->sc_lig_target['C_@scinf_agregarnotainv_@scinf_form_mov_ajusteinv'] : (isset($this->Ini->sc_lig_target['C_@scinf_agregarnotainv']) ? $this->Ini->sc_lig_target['C_@scinf_agregarnotainv'] : null);
       if (isset($this->Ini->sc_lig_md5["form_mov_ajusteinv"]) && $this->Ini->sc_lig_md5["form_mov_ajusteinv"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?post_producto?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?post_producto?#?" . str_replace("'", "@aspass@", $this->idprod) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?N?@?NM_btn_delete?#?N?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_agregarnotainv_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_mov_ajusteinv_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_self') . "', '', '0', '0', '', 'form_mov_ajusteinv', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_agregarnotainv_grid_line . "\" style=\"" . $this->Css_Cmp['css_agregarnotainv_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_agregarnotainv_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_idprod()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idprod)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idprod)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idprod', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idprod', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idprod_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idprod_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idprod_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_unimay()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off") { 
          $conteudo = sc_strip_script($this->unimay); 
          $conteudo_original = sc_strip_script($this->unimay); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'unimay', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'unimay', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_unimay_grid_line . "\"  style=\"" . $this->Css_Cmp['css_unimay_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_unimay_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_recmayamen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->recmayamen)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->recmayamen)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'recmayamen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'recmayamen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_recmayamen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_recmayamen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_recmayamen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_preciofull()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->preciofull)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->preciofull)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'preciofull', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'preciofull', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_preciofull_grid_line . "\"  style=\"" . $this->Css_Cmp['css_preciofull_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_preciofull_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_stockmay()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->stockmay)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->stockmay)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", "", "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'stockmay', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'stockmay', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_stockmay_grid_line . "\"  style=\"" . $this->Css_Cmp['css_stockmay_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_stockmay_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_stockmen()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->stockmen)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->stockmen)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'stockmen', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'stockmen', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_stockmen_grid_line . "\"  style=\"" . $this->Css_Cmp['css_stockmen_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_stockmen_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idpro2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idpro2)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idpro2)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idpro2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idpro2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idpro2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idpro2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idpro2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_otro()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off") { 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->look_otro))); 
          $conteudo_original = trim(NM_encode_input(sc_strip_script($this->look_otro))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otro', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otro', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_otro = "";
          if (isset($this->NM_field_style["otro"]) && !empty($this->NM_field_style["otro"]))
          {
              $Style_otro .= $this->NM_field_style["otro"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_otro_grid_line . "\"  style=\"" . $this->Css_Cmp['css_otro_grid_line'] . $Style_otro . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_otro_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_otro2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->otro2)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->otro2)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'otro2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'otro2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_otro2 = "";
          if (isset($this->NM_field_style["otro2"]) && !empty($this->NM_field_style["otro2"]))
          {
              $Style_otro2 .= $this->NM_field_style["otro2"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_otro2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_otro2_grid_line'] . $Style_otro2 . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_otro2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_preciomen2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off") { 
          $nm_cor_num = ($this->preciomen2 < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->preciomen2)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->preciomen2)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'preciomen2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'preciomen2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_preciomen2_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomen2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_preciomen2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_preciomen3()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off") { 
          $nm_cor_num = ($this->preciomen3 < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->preciomen3)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->preciomen3)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'preciomen3', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'preciomen3', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_preciomen3_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomen3_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_preciomen3_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_precio2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off") { 
          $nm_cor_num = ($this->precio2 < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->precio2)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->precio2)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'precio2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'precio2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_precio2_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_precio2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_precio2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_preciomay()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off") { 
          $nm_cor_num = ($this->preciomay < 0) ? "color:#FF0000;" : "";
          $conteudo = NM_encode_input(sc_strip_script($this->preciomay)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->preciomay)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($conteudo, ",", ",", "0", "S", "2", "$", "V:3:3", "-") ; 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'preciomay', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'preciomay', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_preciomay_grid_line . "\"  style=\"" . $nm_cor_num . "" . $this->Css_Cmp['css_preciomay_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_preciomay_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 30;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_pdf'] == "pdf")
   {
       $this->NM_colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $this->NM_colspan--; 
       }
   } 
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
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
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['print_navigator'] == "Netscape")
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
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_codigobar_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_codigobar = true; 
   $this->Tot->quebra_codigobar_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_codigobar = $$Var_name_gb;
   $conteudo = $tot_codigobar[0] ;  
   $this->count_codigobar = $tot_codigobar[1];
   $this->sum_codigobar_existencia_menor = $tot_codigobar[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->codigobar); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['codigobar']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['codigobar']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Código"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_codigobar = false; 
 } 
 function quebra_nompro_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_nompro = true; 
   $this->Tot->quebra_nompro_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_nompro = $$Var_name_gb;
   $conteudo = $tot_nompro[0] ;  
   $this->count_nompro = $tot_nompro[1];
   $this->sum_nompro_existencia_menor = $tot_nompro[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->nompro); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['nompro']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['nompro']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Descripción"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_nompro = false; 
 } 
 function quebra_unimay_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_unimay = true; 
   $this->Tot->quebra_unimay_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_unimay = $$Var_name_gb;
   $conteudo = $tot_unimay[0] ;  
   $this->count_unimay = $tot_unimay[1];
   $this->sum_unimay_existencia_menor = $tot_unimay[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->unimay); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['unimay']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['unimay']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Unidad"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_unimay = false; 
 } 
 function quebra_unimen_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_unimen = true; 
   $this->Tot->quebra_unimen_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_unimen = $$Var_name_gb;
   $conteudo = $tot_unimen[0] ;  
   $this->count_unimen = $tot_unimen[1];
   $this->sum_unimen_existencia_menor = $tot_unimen[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->unimen); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['unimen']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['unimen']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Unidad"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_unimen = false; 
 } 
 function quebra_idgrup_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_idgrup = true; 
   $this->Tot->quebra_idgrup_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_idgrup = $$Var_name_gb;
   $conteudo = $tot_idgrup[0] ;  
   $this->count_idgrup = $tot_idgrup[1];
   $this->sum_idgrup_existencia_menor = $tot_idgrup[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->idgrup)); 
   $this->Lookup->lookup_sc_free_group_by_idgrup($conteudo , $this->idgrup) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idgrup']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['idgrup']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Grupo o Familia"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_idgrup = false; 
 } 
 function quebra_idpro1_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_idpro1 = true; 
   $this->Tot->quebra_idpro1_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_idpro1 = $$Var_name_gb;
   $conteudo = $tot_idpro1[0] ;  
   $this->count_idpro1 = $tot_idpro1[1];
   $this->sum_idpro1_existencia_menor = $tot_idpro1[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->idpro1); 
   $this->Lookup->lookup_sc_free_group_by_idpro1($conteudo) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idpro1']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['idpro1']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Proveedor"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_idpro1 = false; 
 } 
 function quebra_idiva_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_escombo = false;
   $this->sc_proc_quebra_idiva = true; 
   $this->Tot->quebra_idiva_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_idiva = $$Var_name_gb;
   $conteudo = $tot_idiva[0] ;  
   $this->count_idiva = $tot_idiva[1];
   $this->sum_idiva_existencia_menor = $tot_idiva[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->idiva)); 
   $this->Lookup->lookup_sc_free_group_by_idiva($conteudo , $this->idiva) ; 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['idiva']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['idiva']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "%IVA"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_idiva = false; 
 } 
 function quebra_escombo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global $$Var_name_gb, $Desc_Gb_Ant;
   $this->sc_proc_quebra_codigobar = false;
   $this->sc_proc_quebra_nompro = false;
   $this->sc_proc_quebra_unimay = false;
   $this->sc_proc_quebra_unimen = false;
   $this->sc_proc_quebra_idgrup = false;
   $this->sc_proc_quebra_idpro1 = false;
   $this->sc_proc_quebra_idiva = false;
   $this->sc_proc_quebra_escombo = true; 
   $this->Tot->quebra_escombo_sc_free_group_by($Cmp_qb, $Where_qb, $Cmp_Name);
   $tot_escombo = $$Var_name_gb;
   $conteudo = $tot_escombo[0] ;  
   $this->count_escombo = $tot_escombo[1];
   $this->sum_escombo_existencia_menor = $tot_escombo[2];
   $Temp_cmp_quebra = array(); 
   $conteudo = sc_strip_script($this->escombo); 
   $Temp_cmp_quebra[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['escombo']))
   {
       $Temp_cmp_quebra[0]['lab'] = $this->nmgp_label_quebras['escombo']; 
   }
   else
   {
       $Temp_cmp_quebra[0]['lab'] = "Combo"; 
   }
   $this->$Cmps_Gb_Free = $Temp_cmp_quebra;
   $this->sc_proc_quebra_escombo = false; 
 } 
 function quebra_codigobar_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_codigobar = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['codigobar'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_codigobar = 0; 
   $cont_quebra_codigobar++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_codigobar[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_codigobar = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_codigobar .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_codigobar .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_codigobar .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_codigobar .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_codigobar .= "</tr>"; 
   } 
   $this->Label_codigobar .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_codigobar . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_codigobar_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_codigobar = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_codigobar[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_nompro_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_nompro = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['nompro'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_nompro = 0; 
   $cont_quebra_nompro++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H3 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H3></div>";
   }
   $conteudo = $tot_nompro[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_nompro = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_nompro .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_nompro .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_nompro .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_nompro .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_nompro .= "</tr>"; 
   } 
   $this->Label_nompro .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_nompro . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_nompro_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_nompro = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_nompro[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_unimay_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_unimay = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['unimay'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_unimay = 0; 
   $cont_quebra_unimay++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H4 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H4></div>";
   }
   $conteudo = $tot_unimay[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_unimay = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_unimay .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_unimay .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_unimay .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_unimay .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_unimay .= "</tr>"; 
   } 
   $this->Label_unimay .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_unimay . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_unimay_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_unimay = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_unimay[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_unimen_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_unimen = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['unimen'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_unimen = 0; 
   $cont_quebra_unimen++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H5 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H5></div>";
   }
   $conteudo = $tot_unimen[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_unimen = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_unimen .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_unimen .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_unimen .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_unimen .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_unimen .= "</tr>"; 
   } 
   $this->Label_unimen .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_unimen . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_unimen_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_unimen = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_unimen[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idgrup_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idgrup = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['idgrup'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_idgrup = 0; 
   $cont_quebra_idgrup++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H6 style=\"font-size:0;padding:1px\">" .  $this->$Cmps_Gb_Free[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H6></div>";
   }
   $conteudo = $tot_idgrup[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_idgrup = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_idgrup .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_idgrup .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_idgrup .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_idgrup .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_idgrup .= "</tr>"; 
   } 
   $this->Label_idgrup .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_idgrup . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idgrup_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idgrup = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_idgrup[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idpro1_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idpro1 = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['idpro1'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_idpro1 = 0; 
   $cont_quebra_idpro1++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_idpro1[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_idpro1 = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_idpro1 .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_idpro1 .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_idpro1 .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_idpro1 .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_idpro1 .= "</tr>"; 
   } 
   $this->Label_idpro1 .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_idpro1 . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idpro1_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idpro1 = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_idpro1[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idiva_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idiva = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['idiva'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_idiva = 0; 
   $cont_quebra_idiva++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_idiva[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_idiva = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_idiva .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_idiva .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_idiva .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_idiva .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_idiva .= "</tr>"; 
   } 
   $this->Label_idiva .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_idiva . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_idiva_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_idiva = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_idiva[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_escombo_sc_free_group_by_top($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_escombo = $$Var_name_gb;
   $this->SC_tab_quebra = (count($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']) > 1) ? 10 * $this->Tab_Nv_tree['escombo'] : 0;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
   static $cont_quebra_escombo = 0; 
   $cont_quebra_escombo++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
   }
   $conteudo = $tot_escombo[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_escombo = "<table>"; 
   $Cmps_gb = $this->$Cmps_Gb_Free;
   foreach ($Cmps_gb as $cada_campo) 
   { 
       $this->Label_escombo .= "<tr>"; 
       if ($this->SC_tab_quebra > 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'])
       {
           $this->Label_escombo .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $this->Label_escombo .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_escombo .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_escombo .= "</tr>"; 
   } 
   $this->Label_escombo .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_escombo . $nm_fecha_pdf_old . "</TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_escombo_sc_free_group_by_bot($Cmp_Name) 
 {
   $Var_name_gb  = "SC_tot_" . $Cmp_Name;
   $Cmps_Gb_Free = "campos_quebra_" . $Cmp_Name;
   $Desc_Gb_Ant  = $Cmp_Name . "_ant_desc";
   global 
          $Desc_Gb_Ant, 
          $nm_saida, $$Var_name_gb;
   $tot_escombo = $$Var_name_gb;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $Desc_Gb_Ant = $this->$Cmps_Gb_Free[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_escombo[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_existencia_menor_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_familia_top() 
 {
 }
 function quebra_geral_familia_bot() 
 {
 }
 function quebra_geral_sc_free_group_by_top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_sc_free_group_by_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_sc_free_group_by(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_existencia_menor_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
 } 
 function quebra_geral__NM_SC__top() 
 {
   global $nm_saida; 
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral__NM_SC__bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral__NM_SC_(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      =  $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] . ")";
   $tit_lin_sumariza_orig =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][1] . ")";
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 2;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf")
   {
       $colspan--;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['exibe_seq'] != "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
       {
           $colspan--; 
       }
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "idgrup" && (!isset($this->NM_cmp_hidden['idgrup']) || $this->NM_cmp_hidden['idgrup'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "codigobar" && (!isset($this->NM_cmp_hidden['codigobar']) || $this->NM_cmp_hidden['codigobar'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nompro" && (!isset($this->NM_cmp_hidden['nompro']) || $this->NM_cmp_hidden['nompro'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "imagen" && (!isset($this->NM_cmp_hidden['imagen']) || $this->NM_cmp_hidden['imagen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "existencia_menor" && (!isset($this->NM_cmp_hidden['existencia_menor']) || $this->NM_cmp_hidden['existencia_menor'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_existencia_menor_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "unimen" && (!isset($this->NM_cmp_hidden['unimen']) || $this->NM_cmp_hidden['unimen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen" && (!isset($this->NM_cmp_hidden['preciomen']) || $this->NM_cmp_hidden['preciomen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idiva" && (!isset($this->NM_cmp_hidden['idiva']) || $this->NM_cmp_hidden['idiva'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "btn_stock" && (!isset($this->NM_cmp_hidden['btn_stock']) || $this->NM_cmp_hidden['btn_stock'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "ubicacion" && (!isset($this->NM_cmp_hidden['ubicacion']) || $this->NM_cmp_hidden['ubicacion'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "costomen" && (!isset($this->NM_cmp_hidden['costomen']) || $this->NM_cmp_hidden['costomen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpro1" && (!isset($this->NM_cmp_hidden['idpro1']) || $this->NM_cmp_hidden['idpro1'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "escombo" && (!isset($this->NM_cmp_hidden['escombo']) || $this->NM_cmp_hidden['escombo'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "agregarnotainv" && (!isset($this->NM_cmp_hidden['agregarnotainv']) || $this->NM_cmp_hidden['agregarnotainv'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idprod" && (!isset($this->NM_cmp_hidden['idprod']) || $this->NM_cmp_hidden['idprod'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "unimay" && (!isset($this->NM_cmp_hidden['unimay']) || $this->NM_cmp_hidden['unimay'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "recmayamen" && (!isset($this->NM_cmp_hidden['recmayamen']) || $this->NM_cmp_hidden['recmayamen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciofull" && (!isset($this->NM_cmp_hidden['preciofull']) || $this->NM_cmp_hidden['preciofull'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "stockmay" && (!isset($this->NM_cmp_hidden['stockmay']) || $this->NM_cmp_hidden['stockmay'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "stockmen" && (!isset($this->NM_cmp_hidden['stockmen']) || $this->NM_cmp_hidden['stockmen'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpro2" && (!isset($this->NM_cmp_hidden['idpro2']) || $this->NM_cmp_hidden['idpro2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "otro" && (!isset($this->NM_cmp_hidden['otro']) || $this->NM_cmp_hidden['otro'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "otro2" && (!isset($this->NM_cmp_hidden['otro2']) || $this->NM_cmp_hidden['otro2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen2" && (!isset($this->NM_cmp_hidden['preciomen2']) || $this->NM_cmp_hidden['preciomen2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomen3" && (!isset($this->NM_cmp_hidden['preciomen3']) || $this->NM_cmp_hidden['preciomen3'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "precio2" && (!isset($this->NM_cmp_hidden['precio2']) || $this->NM_cmp_hidden['precio2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "preciomay" && (!isset($this->NM_cmp_hidden['preciomay']) || $this->NM_cmp_hidden['preciomay'] != "off"))
    {
       $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\"   " . "colspan=\"" . $colspan . "\"" . ">&nbsp;</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          $OPC_cmp_sel = explode("_VLS_", $OPC_cmp);
          $nm_saida->saida("          <select   id=\"fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" name=\"nmgp_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          $SC_Label_atu['idpro1'] = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : 'Proveedor'; 
          $SC_Label_atu['idgrup'] = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : 'Grupo'; 
          $SC_Label_atu['codigobar'] = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : 'Código'; 
          $SC_Label_atu['nompro'] = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : 'Producto'; 
          $SC_Label_atu['ubicacion'] = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : 'Ubicacion'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              $OPC_sel = (in_array($CMP, $OPC_cmp_sel) || ($CMP == 'SC_all_Cmp' && empty($OPC_cmp))) ? " selected" : "";
              $nm_saida->saida("           <option value=\"" . $CMP . "\"$OPC_sel>" . $LABEL . "</option>\r\n");
           }
          $nm_saida->saida("          </select>\r\n");
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
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "HERRAMIENTAS", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
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
          $nm_saida->saida("            <div id=\"div_ordcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['copiar_producto'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['copiar_producto'][] = "sc_copiar_producto_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_copiar_producto_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
           if (isset($this->Ini->sc_lig_md5["control_copiar_producto"]) && $this->Ini->sc_lig_md5["control_copiar_producto"] == "S") {
               $Parms_Lig  = "script_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "script_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "copiar_producto", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('control_copiar_producto')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'control_copiar_producto');;", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('control_copiar_producto')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'control_copiar_producto');;", "sc_copiar_producto_top", "", "Copiar Producto", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['elimina'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['elimina'][] = "sc_elimina_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_elimina_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "elimina", "sc_btn_elimina();", "sc_btn_elimina();", "sc_elimina_top", "", "Borrar Producto", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_save_grid_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_productos&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_subir_a_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_subir_a_nube'][] = "sc_btn_subir_a_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_subir_a_nube", "sc_btn_btn_subir_a_nube();", "sc_btn_btn_subir_a_nube();", "sc_btn_subir_a_nube_top", "", "Subir a la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_actualizar_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_actualizar_nube'][] = "sc_btn_actualizar_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_actualizar_nube", "sc_btn_btn_actualizar_nube();", "sc_btn_btn_actualizar_nube();", "sc_btn_actualizar_nube_top", "", "Actualizar Precios y Stock Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_recalcular'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_recalcular'][] = "sc_btn_recalcular_top";
               $btn_value = "Recalcular";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "Recalcular Existencias";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
          $nm_saida->saida("<img src=\"" . $this->Ini->path_botoes . "/scriptcase__NM__ico__NM__refresh_32.png\"  id=\"sc_btn_recalcular_top\" onClick=\"sc_btn_btn_recalcular();; return false\" border=\"0px\" title=\"" . $btn_hint . "\" style=\"vertical-align: middle;cursor: pointer;\" align=\"absmiddle\" class=\"scButton_default\">\r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_productos"]) && $this->Ini->sc_lig_md5["form_productos"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_productos . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_productos'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_productos . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_productos'); return false;;", "sc_b_new_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
        }
          if (is_file("grid_productos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_productos_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'])
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'];
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
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 15) ? " selected" : "";
              $nm_saida->saida("           <option value=\"15\" " . $obj_sel . ">15</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'];
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if (is_file("grid_productos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_productos_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          $OPC_cmp_sel = explode("_VLS_", $OPC_cmp);
          $nm_saida->saida("          <select   id=\"fast_search_f0_top\" class=\"" . $this->css_css_toolbar_obj . "\" style=\"vertical-align: middle;\" name=\"nmgp_fast_search\" onChange=\"change_fast_top = 'CH';\">\r\n");
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          $SC_Label_atu['idpro1'] = (isset($this->New_label['idpro1'])) ? $this->New_label['idpro1'] : 'Proveedor'; 
          $SC_Label_atu['idgrup'] = (isset($this->New_label['idgrup'])) ? $this->New_label['idgrup'] : 'Grupo'; 
          $SC_Label_atu['codigobar'] = (isset($this->New_label['codigobar'])) ? $this->New_label['codigobar'] : 'Código'; 
          $SC_Label_atu['nompro'] = (isset($this->New_label['nompro'])) ? $this->New_label['nompro'] : 'Producto'; 
          $SC_Label_atu['ubicacion'] = (isset($this->New_label['ubicacion'])) ? $this->New_label['ubicacion'] : 'Ubicacion'; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              $OPC_sel = (in_array($CMP, $OPC_cmp_sel) || ($CMP == 'SC_all_Cmp' && empty($OPC_cmp))) ? " selected" : "";
              $nm_saida->saida("           <option value=\"" . $CMP . "\"$OPC_sel>" . $LABEL . "</option>\r\n");
           }
          $nm_saida->saida("          </select>\r\n");
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
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "HERRAMIENTAS", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
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
          $nm_saida->saida("            <div id=\"div_ordcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['sort_col'][] = "ordcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_productos/grid_productos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['copiar_producto'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['copiar_producto'][] = "sc_copiar_producto_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_copiar_producto_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
           if (isset($this->Ini->sc_lig_md5["control_copiar_producto"]) && $this->Ini->sc_lig_md5["control_copiar_producto"] == "S") {
               $Parms_Lig  = "script_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "script_case_init*scin" . NM_encode_input($this->Ini->sc_page) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "copiar_producto", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('control_copiar_producto')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'control_copiar_producto');;", "nm_gp_submit5('" .  $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link  . "" .  SC_dir_app_name('control_copiar_producto')  . "/index.php', '$this->nm_location', '" .  $Md5_Lig  . "', '_self', '', '', '', '', 'control_copiar_producto');;", "sc_copiar_producto_top", "", "Copiar Producto", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_productos/grid_productos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['elimina'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['elimina'][] = "sc_elimina_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_elimina_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "elimina", "sc_btn_elimina();", "sc_btn_elimina();", "sc_elimina_top", "", "Borrar Producto", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if ($this->nmgp_botoes['gridsave'] == "on" && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $save_grid_format = 'extended';
          if($_SESSION['scriptcase']['proc_mobile'])
          {
              $save_grid_format = 'extended';
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_save_grid_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("            <div id='id_save_grid_div_top' style='display:inline-block'>\r\n");
          }
              $this->nm_btn_exist['gridsave'][] = "save_grid_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgridsave", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "scBtnSaveGridShow('cons', 'Y', 'top', 'extended', '');", "save_grid_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          if ($save_grid_format == 'simplified' && !$_SESSION['scriptcase']['proc_mobile'])
          {
          $nm_saida->saida("              <div id='id_div_save_grid_new_top' style='display:none; position: absolute;'>\r\n");
          $nm_saida->saida("              </div>\r\n");
          $nm_saida->saida("            </div>\r\n");
          }
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'fim');
          $nm_saida->saida("           $Cod_Btn\r\n");
          $nm_saida->saida("           <script type=\"text/javascript\">\r\n");
          $nm_saida->saida("             if (!sc_itens_btgp_group_2_top) {\r\n");
          $nm_saida->saida("                 document.getElementById('sc_btgp_btn_group_2_top').style.display='none'; }\r\n");
          $nm_saida->saida("           </script>\r\n");
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "familia" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=N&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_productos&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bexcel", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "nm_gp_xls_conf('xlsx', '$Xls_mod_export', '','N');", "xls_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_productos/grid_productos_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "Buscar", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_subir_a_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_subir_a_nube'][] = "sc_btn_subir_a_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_subir_a_nube", "sc_btn_btn_subir_a_nube();", "sc_btn_btn_subir_a_nube();", "sc_btn_subir_a_nube_top", "", "Subir a la Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_actualizar_nube'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_actualizar_nube'][] = "sc_btn_actualizar_nube_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "btn_actualizar_nube", "sc_btn_btn_actualizar_nube();", "sc_btn_btn_actualizar_nube();", "sc_btn_actualizar_nube_top", "", "Actualizar Precios y Stock Nube", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['btn_recalcular'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['btn_recalcular'][] = "sc_btn_recalcular_top";
               $btn_value = "Recalcular";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "Recalcular Existencias";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
          $nm_saida->saida("<img src=\"" . $this->Ini->path_botoes . "/scriptcase__NM__ico__NM__refresh_32.png\"  id=\"sc_btn_recalcular_top\" onClick=\"sc_btn_btn_recalcular();; return false\" border=\"0px\" title=\"" . $btn_hint . "\" style=\"vertical-align: middle;cursor: pointer;\" align=\"absmiddle\" class=\"scButton_default\">\r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_productos"]) && $this->Ini->sc_lig_md5["form_productos"] == "S") {
               $Parms_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "NM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_productos . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_productos'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_productos . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_productos'); return false;;", "sc_b_new_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "familia" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['SC_Gb_Free_cmp']))
            { }
            else {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
            }
          }
        }
          if (is_file("grid_productos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_productos_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_psq'])
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'];
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
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 15) ? " selected" : "";
              $nm_saida->saida("           <option value=\"15\" " . $obj_sel . ">15</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['qt_lin_grid'];
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']))
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
          if (is_file("grid_productos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_productos_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('nompro', 'unimay', 'unimen', 'idpro1', 'codigobar', 'ubicacion', 'idgrup'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['fast_search'][2], $str_value_original) == 0)
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label'] = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']   = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup'] = 'Grupo/Familia';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']['idgrup']   = "idgrup";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['stockmen'] = 'Stock';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']['stockmen']   = "stockmen";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['preciomen'] = (isset($this->New_label['preciomen'])) ? $this->New_label['preciomen'] : 'Precio';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']['preciomen']   = "preciomen";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1'] = 'Proveedor 1';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']['idpro1']   = "idpro1";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva'] = 'Impuesto';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_sql']['idiva']   = "idiva";
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
       $nm_saida->saida("        <div id='id_div_interativ_search_content' class='scGridRefinedSearchMoldura' style='min-width:120px;max-width:140px;overflow-x:hidden;'>\r\n");
       $nm_saida->saida("            <div id='id_div_interativ_search_fields'>\r\n");
       $lin_obj = $this->interativ_search_idgrup($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_stockmen($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_preciomen($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_idpro1($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_idiva($bol_refin_use_modal);
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
       $array_fields[] = "idgrup";
       $array_fields[] = "stockmen";
       $array_fields[] = "preciomen";
       $array_fields[] = "idpro1";
       $array_fields[] = "idiva";
       if(is_array($array_fields) && !empty($array_fields))
       {
           $arr_new = [];
           foreach($array_fields as $key => $str_field)
           {
               if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search'][$str_field]))
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
   function interativ_search_idgrup($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idgrup"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idgrup"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_idgrup\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('idgrup')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_idgrup\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_idgrup\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_idgrup\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','idgrup', '', 'idgrup', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idprod','codigobar','nompro','unimay','unimen','costomay','costomen','recmayamen','preciofull','preciomen','stockmay','stockmen','idgrup','idpro1','idpro2','idiva','otro','otro2','imagenprod','escombo','unidmaymen','existencia_menor','preciomen2','preciomen3','precio2','preciomay','imagen','ubicacion');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "idgrup")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select idgrup, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_ok = substr($cada_cmp_apl, ($tmp_pos + 1));
                   $tmp_where = str_replace($cada_cmp_apl, $cada_cmp_ok, $tmp_where);
               }
           }
       }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY idgrup". $Cmps_where;
       $nm_comando .= " order by idgrup DESC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idgrup'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_idgrup_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_idgrup' class='multipleidgrup' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('idgrup', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('idgrup', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)5;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idgrup'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $this->Lookup->lookup_idgrup($formatado , $formatado);
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idgrup'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_idgrup' style='display:none'>";
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
           $lin_obj  .= "   <span class='simpleidgrup' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idgrup']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup']) . "','idgrup','id_int_search_idgrup','idgrup', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup']) . "','idgrup','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'idgrup', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleidgrup' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idgrup']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idgrup']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_idgrup_" . md5($dados) . "\" name=\"int_search_idgrup[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_idgrup_". md5($dados) ."\" for=\"id_int_search_idgrup_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
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
           $lin_obj  .= "   <div id='id_see_more_idgrup' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_productos_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=idgrup&tp_obj=nn&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('idgrup');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_idgrup' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('idgrup');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
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
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_idgrup\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('idgrup', false);", "nm_mult_int_search('idgrup', false);", "mult_int_search_idgrup", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup']) . "','idgrup','id_int_search_idgrup','idgrup', '', 'N');", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idgrup']) . "','idgrup','id_int_search_idgrup','idgrup', '', 'N');", "app_int_search_idgrup", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('idgrup');", "nm_single_int_search('idgrup');", "single_int_search_idgrup", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_stockmen($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["stockmen"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["stockmen"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_stockmen\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('stockmen')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_stockmen\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_stockmen\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['stockmen'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_stockmen\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','stockmen', '', 'stockmen', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idprod','codigobar','nompro','unimay','unimen','costomay','costomen','recmayamen','preciofull','preciomen','stockmay','stockmen','idgrup','idpro1','idpro2','idiva','otro','otro2','imagenprod','escombo','unidmaymen','existencia_menor','preciomen2','preciomen3','precio2','preciomay','imagen','ubicacion');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "stockmen")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select stockmen, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_ok = substr($cada_cmp_apl, ($tmp_pos + 1));
                   $tmp_where = str_replace($cada_cmp_apl, $cada_cmp_ok, $tmp_where);
               }
           }
       }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY stockmen". $Cmps_where;
       $nm_comando .= " order by stockmen DESC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['stockmen'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_stockmen_link\" style=\"display: " . $disp_link . ";\">";
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_stockmen'])) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_stockmen']['min'] = $range_min;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_stockmen']['max'] = $range_max;
           $range_min_orig = $range_min;
           $range_max_orig = $range_max;
       }
       else {
           $range_min_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_stockmen']['min'];
           $range_max_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_stockmen']['max'];
       }
       $lin_obj  .= "   <div class='scGridRefinedSearchCampo'>";
               $range_min_formatado  = str_replace(",", ".", $range_min);
               $range_max_formatado  = str_replace(",", ".", $range_max);
           nmgp_Form_Num_Val($range_min_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
           nmgp_Form_Num_Val($range_max_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $lin_obj  .= "    <div id='id_slider_stockmen_values' style='text-align:center;'>";
       $lin_obj  .= "        <div id='id_slider_stockmen_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
       if(isset($this->Ini->refinedsearch_values_separator) && !empty($this->Ini->refinedsearch_values_separator))
       {
           $lin_obj  .= "        <div style='display:inline-block;'><img src='" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_values_separator . "' align='absmiddle' /></div>";
       }
       $lin_obj  .= "        <div id='id_slider_stockmen_values_max' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_max_formatado ."</div>";
       $lin_obj  .= "    </div>";
       $lin_obj  .= "    <div id='id_slider_stockmen'></div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "    $( '#id_slider_stockmen' ).slider({";
      $lin_obj  .= "        range: true,";
      $lin_obj  .= "        step: 5,";
      $lin_obj  .= "        min: " . str_replace(',', '.', $range_min_orig) . ",";
      $lin_obj  .= "        max: " . str_replace(',', '.', $range_max_orig) . ",";
      $lin_obj  .= "        values: [ " . str_replace(',', '.', $range_min) . ", " . str_replace(',', '.', $range_max) . " ],";
      $lin_obj  .= "        slide: function( event, ui ) {";
      $lin_obj  .= "            val_format1 = JS_Format_Num_Val( ui.values[ 0 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            val_format2 = JS_Format_Num_Val( ui.values[ 1 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            $( '#id_slider_stockmen_values_min' ).html(val_format1);";
      $lin_obj  .= "            $( '#id_slider_stockmen_values_max' ).html(val_format2);";
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
             $lin_obj  .= "    <div id='id_slider_stockmen_values' style='text-align:center;'>";
             $lin_obj  .= "        <div id='id_slider_stockmen_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
             $lin_obj  .= "    </div>";
         }
     }
       $lin_obj  .= "   </div></td></tr>";
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "     <td>";
           $lin_obj .= "      <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_stockmen\" style='display:" .  $cle_disp . "'>";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['stockmen']) . "','stockmen','id_int_search_stockmen','stockmen', '', 'S');", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['stockmen']) . "','stockmen','id_int_search_stockmen','stockmen', '', 'S');", "app_int_search_range_stockmen", "", "", "display: $disp_btn_range", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
   function interativ_search_preciomen($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["preciomen"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["preciomen"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_preciomen\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('preciomen')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_preciomen\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_preciomen\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['preciomen'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_preciomen\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','preciomen', '', 'preciomen', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idprod','codigobar','nompro','unimay','unimen','costomay','costomen','recmayamen','preciofull','preciomen','stockmay','stockmen','idgrup','idpro1','idpro2','idiva','otro','otro2','imagenprod','escombo','unidmaymen','existencia_menor','preciomen2','preciomen3','precio2','preciomay','imagen','ubicacion');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "preciomen")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select preciomen, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_ok = substr($cada_cmp_apl, ($tmp_pos + 1));
                   $tmp_where = str_replace($cada_cmp_apl, $cada_cmp_ok, $tmp_where);
               }
           }
       }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY preciomen". $Cmps_where;
       $nm_comando .= " order by preciomen DESC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['preciomen'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_preciomen_link\" style=\"display: " . $disp_link . ";\">";
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
       $range_min = $range_min - ($range_min % 500);
       $range_max = $range_max - (($range_max - $range_min) % 500) + 500;
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_preciomen'])) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_preciomen']['min'] = $range_min;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_preciomen']['max'] = $range_max;
           $range_min_orig = $range_min;
           $range_max_orig = $range_max;
       }
       else {
           $range_min_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_preciomen']['min'];
           $range_max_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['refin_slider_preciomen']['max'];
       }
       $lin_obj  .= "   <div class='scGridRefinedSearchCampo'>";
               $range_min_formatado  = str_replace(",", ".", $range_min);
               $range_max_formatado  = str_replace(",", ".", $range_max);
           nmgp_Form_Num_Val($range_min_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
           nmgp_Form_Num_Val($range_max_formatado, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
       $lin_obj  .= "    <div id='id_slider_preciomen_values' style='text-align:center;'>";
       $lin_obj  .= "        <div id='id_slider_preciomen_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
       if(isset($this->Ini->refinedsearch_values_separator) && !empty($this->Ini->refinedsearch_values_separator))
       {
           $lin_obj  .= "        <div style='display:inline-block;'><img src='" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_values_separator . "' align='absmiddle' /></div>";
       }
       $lin_obj  .= "        <div id='id_slider_preciomen_values_max' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_max_formatado ."</div>";
       $lin_obj  .= "    </div>";
       $lin_obj  .= "    <div id='id_slider_preciomen'></div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "    $( '#id_slider_preciomen' ).slider({";
      $lin_obj  .= "        range: true,";
      $lin_obj  .= "        step: 500,";
      $lin_obj  .= "        min: " . str_replace(',', '.', $range_min_orig) . ",";
      $lin_obj  .= "        max: " . str_replace(',', '.', $range_max_orig) . ",";
      $lin_obj  .= "        values: [ " . str_replace(',', '.', $range_min) . ", " . str_replace(',', '.', $range_max) . " ],";
      $lin_obj  .= "        slide: function( event, ui ) {";
      $lin_obj  .= "            val_format1 = JS_Format_Num_Val( ui.values[ 0 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            val_format2 = JS_Format_Num_Val( ui.values[ 1 ], '" . $_SESSION['scriptcase']['reg_conf']['grup_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['dec_num'] . "', '0', 'S', '2', '', 'N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] . "', '" . $_SESSION['scriptcase']['reg_conf']['simb_neg'] . "', '" . $_SESSION['scriptcase']['reg_conf']['num_group_digit'] . "');";
      $lin_obj  .= "            $( '#id_slider_preciomen_values_min' ).html(val_format1);";
      $lin_obj  .= "            $( '#id_slider_preciomen_values_max' ).html(val_format2);";
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
             $lin_obj  .= "    <div id='id_slider_preciomen_values' style='text-align:center;'>";
             $lin_obj  .= "        <div id='id_slider_preciomen_values_min' style='display:inline-block;' class='scGridRefinedSearchRangeValues'>". $range_min_formatado ."</div>";
             $lin_obj  .= "    </div>";
         }
     }
       $lin_obj  .= "   </div></td></tr>";
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "     <td>";
           $lin_obj .= "      <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_preciomen\" style='display:" .  $cle_disp . "'>";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['preciomen']) . "','preciomen','id_int_search_preciomen','preciomen', '', 'S');", "nm_proc_int_search('range', 'bw','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['preciomen']) . "','preciomen','id_int_search_preciomen','preciomen', '', 'S');", "app_int_search_range_preciomen", "", "", "display: $disp_btn_range", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
   function interativ_search_idpro1($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idpro1"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idpro1"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_idpro1\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('idpro1')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_idpro1\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_idpro1\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_idpro1\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','idpro1', '', 'idpro1', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idprod','codigobar','nompro','unimay','unimen','costomay','costomen','recmayamen','preciofull','preciomen','stockmay','stockmen','idgrup','idpro1','idpro2','idiva','otro','otro2','imagenprod','escombo','unidmaymen','existencia_menor','preciomen2','preciomen3','precio2','preciomay','imagen','ubicacion');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "idpro1")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select idpro1, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_ok = substr($cada_cmp_apl, ($tmp_pos + 1));
                   $tmp_where = str_replace($cada_cmp_apl, $cada_cmp_ok, $tmp_where);
               }
           }
       }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY idpro1". $Cmps_where;
       $nm_comando .= " order by idpro1 DESC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idpro1'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_idpro1_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_idpro1' class='multipleidpro1' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('idpro1', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('idpro1', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)3;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idpro1'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $this->Lookup->lookup_idpro1($formatado);
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idpro1'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_idpro1' style='display:none'>";
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
           $lin_obj  .= "   <span class='simpleidpro1' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idpro1']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1']) . "','idpro1','id_int_search_idpro1','idpro1', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1']) . "','idpro1','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'idpro1', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleidpro1' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idpro1']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idpro1']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_idpro1_" . md5($dados) . "\" name=\"int_search_idpro1[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_idpro1_". md5($dados) ."\" for=\"id_int_search_idpro1_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
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
           $lin_obj  .= "   <div id='id_see_more_idpro1' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_productos_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=idpro1&tp_obj=nn&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('idpro1');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_idpro1' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('idpro1');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
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
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_idpro1\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('idpro1', false);", "nm_mult_int_search('idpro1', false);", "mult_int_search_idpro1", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1']) . "','idpro1','id_int_search_idpro1','idpro1', '', 'N');", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idpro1']) . "','idpro1','id_int_search_idpro1','idpro1', '', 'N');", "app_int_search_idpro1", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('idpro1');", "nm_single_int_search('idpro1');", "single_int_search_idpro1", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_idiva($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idiva"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']["idiva"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_idiva\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('idiva')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_idiva\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_idiva\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_idiva\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','idiva', '', 'idiva', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idprod','codigobar','nompro','unimay','unimen','costomay','costomen','recmayamen','preciofull','preciomen','stockmay','stockmen','idgrup','idpro1','idpro2','idiva','otro','otro2','imagenprod','escombo','unidmaymen','existencia_menor','preciomen2','preciomen3','precio2','preciomay','imagen','ubicacion');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "idiva")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select idiva, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idprod,     codigobar,     nompro,     unimay,     unimen,     costomay,     costomen,     recmayamen,     preciofull,     preciomen,     stockmay,     stockmen,     idgrup,     idpro1,     idpro2,     idiva,     otro,     otro2,     imagenprod,     escombo,     unidmaymen,     if(maneja_tcs_lfs='LFS',if(unidmaymen='SI',coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)*recmayamen,coalesce((select sum(vl.existencia) from vencimiento_lote vl where vl.idproducto=idprod),0)),(if(unidmaymen='SI',(stockmen*recmayamen),stockmen))) as existencia_menor,    preciomen2,    preciomen3,    precio2,    preciomay,    imagen,    ubicacion FROM      productos ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_ok = substr($cada_cmp_apl, ($tmp_pos + 1));
                   $tmp_where = str_replace($cada_cmp_apl, $cada_cmp_ok, $tmp_where);
               }
           }
       }
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY idiva". $Cmps_where;
       $nm_comando .= " order by idiva ASC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idiva'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_idiva_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_idiva' class='multipleidiva' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('idiva', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('idiva', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)10;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idiva'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $this->Lookup->lookup_idiva($formatado , $formatado);
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_dados']['idiva'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_idiva' style='display:none'>";
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
           $lin_obj  .= "   <span class='simpleidiva' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idiva']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva']) . "','idiva','id_int_search_idiva','idiva', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva']) . "','idiva','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'idiva', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleidiva' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idiva']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['interativ_search']['idiva']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_idiva_" . md5($dados) . "\" name=\"int_search_idiva[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_idiva_". md5($dados) ."\" for=\"id_int_search_idiva_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
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
           $lin_obj  .= "   <div id='id_see_more_idiva' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_productos_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=idiva&tp_obj=nn&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('idiva');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_idiva' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('idiva');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
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
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_idiva\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('idiva', false);", "nm_mult_int_search('idiva', false);", "mult_int_search_idiva", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva']) . "','idiva','id_int_search_idiva','idiva', '', 'N');", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['int_search_label']['idiva']) . "','idiva','id_int_search_idiva','idiva', '', 'N');", "app_int_search_idiva", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('idiva');", "nm_single_int_search('idiva');", "single_int_search_idiva", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
       $nm_saida->saida("     if($( \"#id_slider_idgrup\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_idgrup').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_idgrup[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_idgrup').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','idgrup', '', 'idgrup', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_stockmen\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_stockmen').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_stockmen[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_stockmen').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','stockmen', '', 'stockmen', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_preciomen\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_preciomen').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_preciomen[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_preciomen').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','preciomen', '', 'preciomen', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     if($( \"#id_slider_idpro1\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_idpro1').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_idpro1[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_idpro1').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','idpro1', '', 'idpro1', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("         int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_idiva\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_idiva').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_idiva[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_idiva').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','idiva', '', 'idiva', '', 'S');\r\n");
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
   $this->Graf  = new grid_productos_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pivot_charts']);
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['proc_pdf_vert'])
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
               grid_productos_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['this_chart_label'] = '';
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
           grid_productos_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['charts_html']}\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['chart_list'] as $arr_chart)
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
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_productos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_productos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['embutida'])
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_productos', $(document).innerHeight())\",50);\r\n");
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
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_productos\"/>\r\n");
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
   $nm_saida->saida("                     action=\"grid_productos_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_productos_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_productos_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_elimina()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Seguro?, proceso no se puede reversar', sc_btn_elimina_ok, sc_btn_elimina_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_elimina_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"elimina\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_elimina_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function SC_btn_0() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function copiar_producto() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Desea subir a la Nube los productos seleccionados?', sc_btn_btn_subir_a_nube_ok, sc_btn_btn_subir_a_nube_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"btn_subir_a_nube\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_subir_a_nube_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Desea actualizar los precios y el stock en la Nube?', sc_btn_btn_actualizar_nube_ok, sc_btn_btn_actualizar_nube_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"btn_actualizar_nube\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_actualizar_nube_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_btn_recalcular()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       var checked_records, i;\r\n");
   $nm_saida->saida("       vls_check = \"\";\r\n");
   $nm_saida->saida("       checked_records = $(\".sc-ui-check-run\").filter(\":checked\");\r\n");
   $nm_saida->saida("       for (i = 0; i <= checked_records.length; i++)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           vls_check += (vls_check != \"\") ? \";\" : \"\";\r\n");
   $nm_saida->saida("           vls_check += $(checked_records[i]).val();\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (vls_check == \"\" || vls_check == \"0\" || vls_check == \"undefined\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           scJs_alert (\"" . $this->Ini->Nm_lang['lang_othr_slct'] . "\");\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_run_opt_sel.value = vls_check;\r\n");
   $nm_saida->saida("       document.FBtn_Run.target = \"_self\";\r\n");
   $nm_saida->saida("       scJs_confirm('¿Desea recalcular las existencias de los productos seleccionados?', sc_btn_btn_recalcular_ok, sc_btn_btn_recalcular_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_recalcular_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"btn_recalcular\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_btn_recalcular_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_marca_check_grid(obj_mark)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      $(\".sc-ui-check-run\").prop(\"checked\", $(obj_mark).prop(\"checked\"));\r\n");
   $nm_saida->saida("   }\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['ajax_nav'])
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
   $nm_saida->saida("       obj = document.getElementById('fast_search_f0_' + pos);\r\n");
   $nm_saida->saida("       if (!obj.length)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           out_qsearch = obj.options[obj.selectedIndex].value;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           for (iCheck = 0; iCheck < obj.length; iCheck++)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               if (obj.options[iCheck].selected)\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   out_qsearch += (out_qsearch != \"\") ? \"_VLS_\" : \"\";\r\n");
   $nm_saida->saida("                   out_qsearch += obj.options[iCheck].value;\r\n");
   $nm_saida->saida("               }\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("       }\r\n");
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
   $nm_saida->saida("          par_modal = '?&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_productos';\r\n");
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
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_productos');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_productos');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_productos');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_productos');} \r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['grid_productos_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_productos@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_productos/grid_productos_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("               document.Fprint.action = \"grid_productos_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_productos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("           document.Fexport.action = \"grid_productos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_productos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_productos/grid_productos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_productos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_productos_export_ctrl.php\";\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_productos']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['campo_psq_ret'] . "\");\r\n");
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
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['js_apos_busca'] . "();\r\n");
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
   $nm_saida->saida("      document.F5.action = \"grid_productos_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_productos']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_productos')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_productos', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
}
?>
