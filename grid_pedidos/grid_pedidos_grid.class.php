<?php
class grid_pedidos_grid
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
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
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
   var $array_facturado = array();
   var $count_ger;
   var $sum_total;
   var $prefijo_ped_Old;
   var $arg_sum_prefijo_ped;
   var $Label_prefijo_ped;
   var $sc_proc_quebra_prefijo_ped;
   var $count_prefijo_ped;
   var $sum_prefijo_ped_total;
   var $vendedor_Old;
   var $arg_sum_vendedor;
   var $Label_vendedor;
   var $sc_proc_quebra_vendedor;
   var $count_vendedor;
   var $sum_vendedor_total;
   var $facturado;
   var $cambiar_cliente;
   var $imprimir;
   var $pos;
   var $cobrar;
   var $numero2;
   var $asentada;
   var $idcli;
   var $fechaven;
   var $total;
   var $vendedor;
   var $creado_en_movil;
   var $disponible_en_movil;
   var $idpedido;
   var $numfacven;
   var $nremision;
   var $credito;
   var $fechavenc;
   var $observaciones;
   var $saldo;
   var $numpedido;
   var $prefijo_ped;
   var $look_credito;
   var $look_asentada;
   var $grid_detallepedido;
   var $NM_cont_emb_linha;
//--- 
 function monta_grid($linhas = 0)
 {
   global $script_case_init, $nm_saida;
   $GLOBALS["script_case_init"] = $this->Ini->sc_page;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['field_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (!is_file($this->Ini->link_grid_detallepedido_cons_emb))
   {
       $this->NM_cmp_hidden['detalle'] = "off";
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = true;
       $_SESSION['scriptcase']['grid_detallepedido']['protect_modal'] = $this->Ini->sc_page;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['exibe_titulos'] = "S";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['exibe_total'] = "S";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['exibe_seq'] = "S";
       include_once ($this->Ini->link_grid_detallepedido_cons_emb);
       $this->grid_detallepedido = new grid_detallepedido_apl ;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = false;
       unset($_SESSION['scriptcase']['grid_detallepedido']['protect_modal']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
       { 
           include_once($this->Ini->path_embutida . "grid_pedidos/" . $this->Ini->Apl_resumo); 
       } 
       else 
       { 
           include_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
       } 
       $this->Res         = new grid_pedidos_resumo();
       $this->Res->Db     = $this->Db;
       $this->Res->Erro   = $this->Erro;
       $this->Res->Ini    = $this->Ini;
       $this->Res->Lookup = $this->Lookup;
      }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'])
       {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
            {
            } 
            else
            {
                $this->cabecalho();
            } 
       } 
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
            {
            } 
            else
            {
       $nm_saida->saida("                  <TR>\r\n");
       $nm_saida->saida("                  <TD id='sc_grid_content' style='padding: 0px;' colspan=3>\r\n");
            } 
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != 'print')
       { 
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("      <TD id=\"div_refin_search\" class=\"scGridRefinedSearchPadding\" valign='top'>\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $this->html_interativ_search();
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
           { 
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['refresh_interativ']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['refresh_interativ'] == "S") {
                   $this->Ini->Arr_result['setValue'][] = array('field' => 'div_refin_search', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               }
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['refresh_interativ']);
               $tb_disp = (!empty($this->nm_grid_sem_reg) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_int_search']) ? 'none' : '';
               $this->Ini->Arr_result['setDisplay'][] = array('field' => 'TB_Interativ_Search', 'value' => $tb_disp);
           } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_int_search'] = false;
       $nm_saida->saida("      </TD>\r\n");
       $nm_saida->saida("      <TD class=\"scGridRefinedSearchMolduraResult\" valign='top'>\r\n");
       $nm_saida->saida("       <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       } 
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['grid_pedidos'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['save_grid']))
       {
           $this->refresh_interativ_search();
       }
       unset ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['save_grid']);
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'] && (!isset($_GET['flash_graf']) || 'chart' != $_GET['flash_graf']))
       {
           $this->grid();
       }
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_bot();
       } 
       if (!$this->Proc_link_res && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != 'pdf' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != 'print')
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['print_all'] && empty($this->nm_grid_sem_reg) && ($Gera_res || $Gera_graf) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           $this->Res->monta_html_ini_pdf();
           $this->Res->monta_resumo();
           $this->Res->monta_html_fim_pdf();
           if ($Gera_graf)
           {
               $this->grafico_pdf();
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'chart' == $_GET['flash_graf'])
           {
               $this->Res->monta_resumo(true);
               require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
               $this->Graf  = new grid_pedidos_grafico();
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
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['graf_pdf'] == "S" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
       { 
           if (isset($_GET['flash_graf']) && 'pdf' == $_GET['flash_graf'] && $Gera_graf)
           {
               $this->grafico_pdf_flash();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "grid";
           } 
           elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && $Gera_graf)
           { 
               $this->grafico_pdf();
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "grid";
           } 
           else 
           { 
               $this->nm_fim_grid();
           } 
       } 
       else 
       { 
           $flag_apaga_pdf_log = TRUE;
           if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf")
           { 
               $flag_apaga_pdf_log = FALSE;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "igual";
           } 
           $this->nm_fim_grid($flag_apaga_pdf_log);
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'];
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
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult'])) {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult'] = 0;
   }
   $this->Img_embbed      = false;
   $this->nm_data         = new nm_data("es");
   $this->pdf_label_group = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['label_group'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['label_group'] : "S";
   $this->pdf_all_cab     = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['all_cab']))     ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['all_cab'] : "N";
   $this->pdf_all_label   = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['all_label']))   ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_pdf']['all_label'] : "N";
   $this->Grid_body = 'id="sc_grid_body"';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       $this->Grid_body = "";
   }
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_pedidos/grid_pedidos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['force_toolbar']);
   } 
       $this->Tem_tab_vert = false;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor")
   {
       $this->width_tabula_quebra  = "3px";
       $this->width_tabula_display = "none";
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_")
   {
       $this->width_tabula_quebra  = "0px";
       $this->width_tabula_display = "none";
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] != '')
   {
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] == "on")  {$_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] = "S";}
       if ($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] == "off") {$_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] = "N";}
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View || ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['psq_edit'] == 'N'))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] = "N";
   }
   $this->NM_cont_emb_linha = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['emb_linha'];
   $this->sc_proc_quebra_prefijo_ped = false;
   $this->sc_proc_quebra_vendedor = false;
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_pedidos", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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
   $this->nmgp_botoes['reneraracaja'] = "on";
   $this->nmgp_botoes['Vender'] = "on";
   $this->nmgp_botoes['regenerarainventario'] = "on";
   $this->Cmps_ord_def['asentada'] = " desc";
   $this->Cmps_ord_def['idcli'] = " desc";
   $this->Cmps_ord_def['fechaven'] = " desc";
   $this->Cmps_ord_def['vendedor'] = " desc";
   $this->Cmps_ord_def['disponible_en_movil'] = " asc";
   $this->Cmps_ord_def['idpedido'] = " desc";
   $this->Cmps_ord_def['numfacven'] = " desc";
   $this->Cmps_ord_def['nremision'] = " desc";
   $this->Cmps_ord_def['credito'] = " desc";
   $this->Cmps_ord_def['fechavenc'] = " desc";
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['btn_display']))
   {
       foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->Proc_link_res = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] || $this->Ini->sc_export_ajax_img)
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->fechaven = $Busca_temp['fechaven']; 
       $tmp_pos = strpos($this->fechaven, "##@@");
       if ($tmp_pos !== false && !is_array($this->fechaven))
       {
           $this->fechaven = substr($this->fechaven, 0, $tmp_pos);
       }
       $fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->fechaven_2 = $Busca_temp['fechaven_input_2']; 
       $this->numpedido = $Busca_temp['numpedido']; 
       $tmp_pos = strpos($this->numpedido, "##@@");
       if ($tmp_pos !== false && !is_array($this->numpedido))
       {
           $this->numpedido = substr($this->numpedido, 0, $tmp_pos);
       }
       $this->numfacven = $Busca_temp['numfacven']; 
       $tmp_pos = strpos($this->numfacven, "##@@");
       if ($tmp_pos !== false && !is_array($this->numfacven))
       {
           $this->numfacven = substr($this->numfacven, 0, $tmp_pos);
       }
       $this->nremision = $Busca_temp['nremision']; 
       $tmp_pos = strpos($this->nremision, "##@@");
       if ($tmp_pos !== false && !is_array($this->nremision))
       {
           $this->nremision = substr($this->nremision, 0, $tmp_pos);
       }
       $this->vendedor = $Busca_temp['vendedor']; 
       $tmp_pos = strpos($this->vendedor, "##@@");
       if ($tmp_pos !== false && !is_array($this->vendedor))
       {
           $this->vendedor = substr($this->vendedor, 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->fechaven_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "muda_qt_linhas";
   } 
       ob_start(); 
   $_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'on';
if (!isset($_SESSION['gbd_seleccionada'])) {$_SESSION['gbd_seleccionada'] = "";}
if (!isset($this->sc_temp_gbd_seleccionada)) {$this->sc_temp_gbd_seleccionada = (isset($_SESSION['gbd_seleccionada'])) ? $_SESSION['gbd_seleccionada'] : "";}
  $vsql = "select modificainvpedido from configuraciones order by idconfiguraciones desc limit 1";
 
      $nm_select = $vsql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiModificaInv = array();
      $this->vsimodificainv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiModificaInv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsimodificainv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiModificaInv = false;
          $this->vSiModificaInv_erro = $this->Db->ErrorMsg();
          $this->vsimodificainv = false;
          $this->vsimodificainv_erro = $this->Db->ErrorMsg();
      } 
;

if(isset($this->vsimodificainv[0][0]))
{
	if($this->vsimodificainv[0][0]=="SI")
	{
		$this->NM_cmp_hidden["cobrar"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['php_cmp_sel']["cobrar"] = "on"; }
	}
	else
	{
		$this->NM_cmp_hidden["cobrar"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['php_cmp_sel']["cobrar"] = "off"; }
	}
}

 
      $nm_select = "select tipo_negocio from empresas where nombre='".$this->sc_temp_gbd_seleccionada."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->ds_empresa = array();
      if ($SCrx = $this->Ini->nm_db_conn_facilweb->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->ds_empresa[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ds_empresa = false;
          $this->ds_empresa_erro = $this->Ini->nm_db_conn_facilweb->ErrorMsg();
      } 
;
if(isset($this->ds_empresa[0][0]))
	{
	if($this->ds_empresa[0][0]=='LAVAUTOS')
		{
		 if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_pedidos_CW') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };
		}
	}


$this->nmgp_botoes["Vender"] = "off";;
if (isset($this->sc_temp_gbd_seleccionada)) {$_SESSION['gbd_seleccionada'] = $this->sc_temp_gbd_seleccionada;}
$_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'off'; 
       $this->SC_Buf_onInit = ob_get_clean();; 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_pedidos'])) {
           $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['grid_pedidos'];

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

   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['insert'] != '')
   {
       $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['insert'];
       $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['insert'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['update'] != '')
   {
       $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['update'];
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['delete'] != '')
   {
       $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_pedido']['delete'];
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_sql_btn_run'] = array(); 
   $this->NM_btn_run_show = ($this->Ini->SC_Link_View || $this->grid_emb_form || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida']) ? false : true;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq']) 
   { 
      $this->nmgp_botoes['reneraracaja'] = "off";
      $this->nmgp_botoes['regenerarainventario'] = "off";
   } 
   if ($this->nmgp_botoes['reneraracaja'] != "on" && $this->nmgp_botoes['regenerarainventario'] != "on") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf") 
   { 
      $this->NM_btn_run_show = false;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_pedidos/grid_pedidos_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_pedidos_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")  
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] = $_SESSION['scriptcase']['contr_link_emb'];
   } 
   $this->Tot         = new grid_pedidos_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] = 20;
   }   
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['rows'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['rows']);
   }
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']['idpedido'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']['idpedido'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']['idpedido'] = 'DESC'; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select_orig'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select']; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra']['prefijo_ped']["prefijo_ped"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'] = array(); 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra']['vendedor']["vendedor"] = "asc"; 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']       = "igual" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['opcao_print'] = "print" ; 
       if ($this->Ini->sc_export_ajax) 
       { 
           $this->Img_embbed = true;
       } 
   } 
// 
   $this->count_ger = 0;
   $this->sum_total = 0;
   $this->arg_sum_prefijo_ped = "";
   $this->count_prefijo_ped = 0;
   $this->sum_prefijo_ped_total = 0;
   $this->arg_sum_vendedor = "";
   $this->count_vendedor = 0;
   $this->sum_vendedor_total = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1] ;  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total']);
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['contr_array_resumo']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['contr_array_resumo'] = "NAO";
       } 
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1] ;  
   $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][1];
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) 
   { 
       $nmgp_select = "SELECT count(*) AS countTest from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
       $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq']; 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'] . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $rt_grid = $this->Db->Execute($nmgp_select) ; 
       if ($rt_grid === false && !$rt_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit ; 
       }  
       $this->count_ger = $rt_grid->fields[0];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] = $rt_grid->fields[0];  
       
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "avanca" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total'] >  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] + 1; 
   if ($this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] > 0) 
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
       $nmgp_select = "SELECT numero2, asentada, idcli, str_replace (convert(char(10),fechaven,102), '.', '-') + ' ' + convert(char(8),fechaven,20), total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, str_replace (convert(char(10),fechavenc,102), '.', '-') + ' ' + convert(char(8),fechavenc,20), observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT numero2, asentada, idcli, fechaven, total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, fechavenc, observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT numero2, asentada, idcli, convert(char(23),fechaven,121), total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, convert(char(23),fechavenc,121), observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT numero2, asentada, idcli, fechaven, total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, fechavenc, observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
    elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT numero2, asentada, idcli, EXTEND(fechaven, YEAR TO DAY), total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, EXTEND(fechavenc, YEAR TO DAY), observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
   else 
   { 
       $nmgp_select = "SELECT numero2, asentada, idcli, fechaven, total, vendedor, creado_en_movil, disponible_en_movil, idpedido, numfacven, nremision, credito, fechavenc, observaciones, saldo, numpedido, prefijo_ped from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp"; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq']; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) 
   { 
       if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'])) 
       { 
           $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']; 
       } 
       else
       { 
           $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'] . ")"; 
       } 
   } 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_desc']; 
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
       $nmgp_order_by = " order by numero2";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
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
       $this->numero2 = $this->rs_grid->fields[0] ;  
       $this->asentada = $this->rs_grid->fields[1] ;  
       $this->asentada = (string)$this->asentada;
       $this->idcli = $this->rs_grid->fields[2] ;  
       $this->idcli = (string)$this->idcli;
       $this->fechaven = $this->rs_grid->fields[3] ;  
       $this->total = $this->rs_grid->fields[4] ;  
       $this->total =  str_replace(",", ".", $this->total);
       $this->total = (string)$this->total;
       $this->vendedor = $this->rs_grid->fields[5] ;  
       $this->vendedor = (string)$this->vendedor;
       $this->creado_en_movil = $this->rs_grid->fields[6] ;  
       $this->disponible_en_movil = $this->rs_grid->fields[7] ;  
       $this->idpedido = $this->rs_grid->fields[8] ;  
       $this->idpedido = (string)$this->idpedido;
       $this->numfacven = $this->rs_grid->fields[9] ;  
       $this->numfacven = (string)$this->numfacven;
       $this->nremision = $this->rs_grid->fields[10] ;  
       $this->nremision = (string)$this->nremision;
       $this->credito = $this->rs_grid->fields[11] ;  
       $this->credito = (string)$this->credito;
       $this->fechavenc = $this->rs_grid->fields[12] ;  
       $this->observaciones = $this->rs_grid->fields[13] ;  
       $this->saldo = $this->rs_grid->fields[14] ;  
       $this->saldo =  str_replace(",", ".", $this->saldo);
       $this->saldo = (string)$this->saldo;
       $this->numpedido = $this->rs_grid->fields[15] ;  
       $this->numpedido = (string)$this->numpedido;
       $this->prefijo_ped = $this->rs_grid->fields[16] ;  
       $this->prefijo_ped = (string)$this->prefijo_ped;
       if (!isset($this->prefijo_ped)) { $this->prefijo_ped = ""; }
       if (!isset($this->vendedor)) { $this->vendedor = ""; }
       $GLOBALS["numfacven"] = $this->rs_grid->fields[9] ;  
       $GLOBALS["numfacven"] = (string)$GLOBALS["numfacven"] ;
       $GLOBALS["idcli"] = $this->rs_grid->fields[2] ;  
       $GLOBALS["idcli"] = (string)$GLOBALS["idcli"] ;
       $GLOBALS["vendedor"] = $this->rs_grid->fields[5] ;  
       $GLOBALS["vendedor"] = (string)$GLOBALS["vendedor"] ;
       $GLOBALS["nremision"] = $this->rs_grid->fields[10] ;  
       $GLOBALS["nremision"] = (string)$GLOBALS["nremision"] ;
       $GLOBALS["prefijo_ped"] = $this->rs_grid->fields[16] ;  
       $GLOBALS["prefijo_ped"] = (string)$GLOBALS["prefijo_ped"] ;
       $this->look_asentada = $this->asentada; 
       $this->Lookup->lookup_asentada($this->look_asentada); 
       $this->arg_sum_vendedor = ($this->vendedor == "") ? " is null " : " = " . $this->vendedor;
       $this->look_credito = $this->credito; 
       $this->Lookup->lookup_credito($this->look_credito); 
       $this->arg_sum_prefijo_ped = ($this->prefijo_ped == "") ? " is null " : " = " . $this->prefijo_ped;
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $this->Lookup->lookup_facturado($this->facturado, $this->numfacven, $this->array_facturado); 
       $this->SC_sep_quebra = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo") 
       {
           $this->prefijo_ped_Old = $this->prefijo_ped ; 
           $this->quebra_prefijo_ped_prefijo($this->prefijo_ped) ; 
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor") 
       {
           $this->vendedor_Old = $this->vendedor ; 
           $this->quebra_vendedor_vendedor($this->vendedor) ; 
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->numero2 = $this->rs_grid->fields[0] ;  
           $this->asentada = $this->rs_grid->fields[1] ;  
           $this->idcli = $this->rs_grid->fields[2] ;  
           $this->fechaven = $this->rs_grid->fields[3] ;  
           $this->total = $this->rs_grid->fields[4] ;  
           $this->vendedor = $this->rs_grid->fields[5] ;  
           $this->creado_en_movil = $this->rs_grid->fields[6] ;  
           $this->disponible_en_movil = $this->rs_grid->fields[7] ;  
           $this->idpedido = $this->rs_grid->fields[8] ;  
           $this->numfacven = $this->rs_grid->fields[9] ;  
           $this->nremision = $this->rs_grid->fields[10] ;  
           $this->credito = $this->rs_grid->fields[11] ;  
           $this->fechavenc = $this->rs_grid->fields[12] ;  
           $this->observaciones = $this->rs_grid->fields[13] ;  
           $this->saldo = $this->rs_grid->fields[14] ;  
           $this->numpedido = $this->rs_grid->fields[15] ;  
           $this->prefijo_ped = $this->rs_grid->fields[16] ;  
           if (!isset($this->prefijo_ped)) { $this->prefijo_ped = ""; }
           if (!isset($this->vendedor)) { $this->vendedor = ""; }
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_pedidos']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['word_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if ($this->Ini->Proc_print && $this->Ini->Export_html_zip  && !$this->Ini->sc_export_ajax)
       {
           require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
           $this->pb = new scProgressBar();
           $this->pb->setRoot($this->Ini->root);
           $this->pb->setDir($_SESSION['scriptcase']['grid_pedidos']['glo_nm_path_imag_temp'] . "/");
           $this->pb->setProgressbarMd5($_GET['pbmd5']);
           $this->pb->initialize();
           $this->pb->setReturnUrl("./");
           $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['print_return']);
           $this->pb->setTotalSteps($this->count_ger);
       }
       if (!$this->Ini->sc_export_ajax && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Lista de pedidos, cotizaciones y proformas :: PDF</TITLE>
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
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pivot_charts']) : 0;
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
               grid_pedidos_pdf_progress_call("PDF\n", $this->Ini->Nm_lang);
               grid_pedidos_pdf_progress_call($this->Ini->path_js   . "\n", $this->Ini->Nm_lang);
               grid_pedidos_pdf_progress_call($this->Ini->path_prod . "/img/\n", $this->Ini->Nm_lang);
               grid_pedidos_pdf_progress_call($this->progress_tot   . "\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               grid_pedidos_pdf_progress_call($this->progress_tot . "_#NM#_" . "1_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>Lista de pedidos, cotizaciones y proformas</TITLE>\r\n");
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
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
       $css_body = "margin-top:0px;margin-bottom:0px;";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'] && !$this->Ini->sc_export_ajax)
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
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_pedidos_jquery-3.6.0.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_pedidos_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_pedidos_message.js\"></script>\r\n");
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
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
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] || $this->Ini->Apl_paginacao == "FULL")
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($this->count_ger) . ";\r\n");
           }
           else
           {
               $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid']) . ";\r\n");
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
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = scGetHeaderRow();\r\n");
           $nm_saida->saida("   headerPlaceholder = $(\"#sc-id-fixedheaders-placeholder\");\r\n");
           $nm_saida->saida("   if (!gridHeaders) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    scSetFixedHeadersContents(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    scSetFixedHeadersSize(gridHeaders);\r\n");
           $nm_saida->saida("    scSetFixedHeadersPosition(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("    if (scIsHeaderVisible(gridHeaders)) {\r\n");
           $nm_saida->saida("     headerPlaceholder.hide();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("    else {\r\n");
           $nm_saida->saida("     headerPlaceholder.show();\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
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
           $nm_saida->saida("   var gridHeaders = $(\".sc-ui-grid-header-row-grid_pedidos-1\"), headerDisplayed = true;\r\n");
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
           $nm_saida->saida("   tableOriginal = document.getElementById(\"sc-ui-grid-body-53fe0bc8\");\r\n");
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
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ancor_save']);
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
           $nm_saida->saida("       url: \"grid_pedidos_save_grid.php\",\r\n");
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
$nm_saida->saida("      url: \"grid_pedidos_save_grid.php\",\r\n");
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
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'])
       {
           $write_css = true;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_pedidos_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
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
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_pedidos_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['num_css'] . '.css');
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
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_pedidos_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['scriptcase']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")
       {
           $nm_saida->saida("  .css_iframes   { margin-bottom: 0px; margin-left: 0px;  margin-right: 0px;  margin-top: 0px; }\r\n");
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
       { 
           $nm_saida->saida("       .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
       } 
       $nm_saida->saida("  </style>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_btngrp" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_grid_" . strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_pedidos/grid_pedidos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_pedidos/grid_pedidos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_pedidos_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       if (!$this->Ini->Export_html_zip && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] && ($this->Print_All || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print")) 
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
          $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
          $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
          $vertical_center = '';
           $nm_saida->saida("  <body id=\"grid_horizontal\" class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $remove_margin . $vertical_center . $css_body . "\">\r\n");
       }
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->Print_All)
       { 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("<div id=\"id_debug_window\" style=\"display: none;\" class='scDebugWindow'><table class=\"scFormMessageTable\">\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageTitle\">" . $Cod_Btn . "&nbsp;&nbsp;Output</td></tr>\r\n");
           $nm_saida->saida("<tr><td class=\"scFormMessageMessage\" style=\"padding: 0px; vertical-align: top\"><div style=\"padding: 2px; height: 200px; width: 350px; overflow: auto\" id=\"id_debug_text\"></div></td></tr>\r\n");
           $nm_saida->saida("</table></div>\r\n");
       } 
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("PJ", "prefijo_ped");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor")
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'])
               {
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_othr_smry_msge'] . "</H1></div>\r\n");
               } 
               else
               {
                   $groupByLabel = sprintf("Vendedor", "vendedor");
                   $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">{$groupByLabel}</H1></div>\r\n");
               } 
           }
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'])
       { 
           $nm_saida->saida("      <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = "";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pdf_res'])
       {
           return;
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
   {
   }
   else
   {
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\" style=\"" . (isset($remove_border) ? $remove_border : '') . "\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/scriptcase__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD  colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_A_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_A_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    <TR>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_E_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_E_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <td style=\"padding: 0px;  vertical-align: top;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\"><tr>\r\n");
           $nm_saida->saida("    <TD colspan=3 style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_AL_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_AL_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
        } 
   }  
 }  
 function NM_cor_embutida()
 {  
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['cab_embutida'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['SC_herda_css'] = "S"; 
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       if (is_file($this->Ini->link_grid_detallepedido_cons_emb)) {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['SC_herda_css'] = "S"; 
           $GLOBALS["script_case_init"] = $this->Ini->sc_page;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = true;
           $_SESSION['scriptcase']['grid_detallepedido']['protect_modal'] = $this->Ini->sc_page;
           include_once ($this->Ini->link_grid_detallepedido_cons_emb);
           $this->grid_detallepedido = new grid_detallepedido_sub_css ;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = false;
           unset($_SESSION['scriptcase']['grid_detallepedido']['protect_modal']);
       }
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['scriptcase']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_pedidos']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_pedidos']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_pedidos']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_pedidos']) . "_";
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

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida']) ? "grid_pedidos_" : "";
   $this->css_sep = " ";
   $this->css_numero2_label = $compl_css_emb . "css_numero2_label";
   $this->css_numero2_grid_line = $compl_css_emb . "css_numero2_grid_line";
   $this->css_asentada_label = $compl_css_emb . "css_asentada_label";
   $this->css_asentada_grid_line = $compl_css_emb . "css_asentada_grid_line";
   $this->css_facturado_label = $compl_css_emb . "css_facturado_label";
   $this->css_facturado_grid_line = $compl_css_emb . "css_facturado_grid_line";
   $this->css_idcli_label = $compl_css_emb . "css_idcli_label";
   $this->css_idcli_grid_line = $compl_css_emb . "css_idcli_grid_line";
   $this->css_cambiar_cliente_label = $compl_css_emb . "css_cambiar_cliente_label";
   $this->css_cambiar_cliente_grid_line = $compl_css_emb . "css_cambiar_cliente_grid_line";
   $this->css_fechaven_label = $compl_css_emb . "css_fechaven_label";
   $this->css_fechaven_grid_line = $compl_css_emb . "css_fechaven_grid_line";
   $this->css_total_label = $compl_css_emb . "css_total_label";
   $this->css_total_grid_line = $compl_css_emb . "css_total_grid_line";
   $this->css_vendedor_label = $compl_css_emb . "css_vendedor_label";
   $this->css_vendedor_grid_line = $compl_css_emb . "css_vendedor_grid_line";
   $this->css_imprimir_label = $compl_css_emb . "css_imprimir_label";
   $this->css_imprimir_grid_line = $compl_css_emb . "css_imprimir_grid_line";
   $this->css_detalle_label = $compl_css_emb . "css_detalle_label";
   $this->css_detalle_grid_line = $compl_css_emb . "css_detalle_grid_line";
   $this->css_pos_label = $compl_css_emb . "css_pos_label";
   $this->css_pos_grid_line = $compl_css_emb . "css_pos_grid_line";
   $this->css_cobrar_label = $compl_css_emb . "css_cobrar_label";
   $this->css_cobrar_grid_line = $compl_css_emb . "css_cobrar_grid_line";
   $this->css_creado_en_movil_label = $compl_css_emb . "css_creado_en_movil_label";
   $this->css_creado_en_movil_grid_line = $compl_css_emb . "css_creado_en_movil_grid_line";
   $this->css_disponible_en_movil_label = $compl_css_emb . "css_disponible_en_movil_label";
   $this->css_disponible_en_movil_grid_line = $compl_css_emb . "css_disponible_en_movil_grid_line";
   $this->css_idpedido_label = $compl_css_emb . "css_idpedido_label";
   $this->css_idpedido_grid_line = $compl_css_emb . "css_idpedido_grid_line";
   $this->css_numfacven_label = $compl_css_emb . "css_numfacven_label";
   $this->css_numfacven_grid_line = $compl_css_emb . "css_numfacven_grid_line";
   $this->css_nremision_label = $compl_css_emb . "css_nremision_label";
   $this->css_nremision_grid_line = $compl_css_emb . "css_nremision_grid_line";
   $this->css_credito_label = $compl_css_emb . "css_credito_label";
   $this->css_credito_grid_line = $compl_css_emb . "css_credito_grid_line";
   $this->css_fechavenc_label = $compl_css_emb . "css_fechavenc_label";
   $this->css_fechavenc_grid_line = $compl_css_emb . "css_fechavenc_grid_line";
   $this->css_observaciones_label = $compl_css_emb . "css_observaciones_label";
   $this->css_observaciones_grid_line = $compl_css_emb . "css_observaciones_grid_line";
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['cab']))
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
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq'];
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
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cond_pesq'], 0, $trab_pos);
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" colspan=3 style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf']) 
     { 
         $this->NM_calc_span();
           $nm_saida->saida("   <TD colspan=\"" . $this->NM_colspan . "\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
     } 
     else if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) 
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
       $this->Ini->Img_export_zip[] = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__Ordering_25406.png";
       $img_LIN1_COL3 = "grp__NM__bg__NM__Ordering_25406.png";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img)
   {
       $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__Ordering_25406.png";
       $tmp_img_word = fopen($loc_img_word, "rb");
       $reg_img_word = fread($tmp_img_word, filesize($loc_img_word));
       fclose($tmp_img_word);
       $img_LIN1_COL3 = "data:image/jpeg;base64," . base64_encode($reg_img_word);
   }
   else
   {
       $img_LIN1_COL3 = $this->NM_raiz_img . $this->Ini->path_imag_cab . "/grp__NM__bg__NM__Ordering_25406.png";
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
   $nm_saida->saida("          Lista de pedidos, cotizaciones y proformas\r\n");
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
   $nm_saida->saida("          " . $nm_cab_filtro . "\r\n");
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
   $this->SC_contr_ck_grid = (!isset($this->SC_contr_ck_grid)) ? "''" : "none";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_label'])
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
   $nm_saida->saida("    <TR id=\"tit_grid_pedidos__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_pedidos-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($this->NM_btn_run_show) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" ><input type=checkbox id=\"NM_ck_run0\" name=\"NM_ck_grid[]\" value=\"0\" style=\"display:" . $this->SC_contr_ck_grid . "\" onClick=\"nm_marca_check_grid(this)\"></TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_label'])
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
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_pedidos/grid_pedidos_grid_" .strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_pedidos_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cols_emb'] = count($Nm_temp) - 1;
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
     foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels'] as $NM_cmp => $NM_lab)
     {
         if (empty($NM_lab) || $NM_lab == "&nbsp;")
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels'][$NM_cmp] = "No_Label" . $NM_seq_lab;
             $NM_seq_lab++;
         }
     } 
   } 
 }
 function NM_label_numero2()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['numero2'])) ? $this->New_label['numero2'] : "Número"; 
   if (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_numero2_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_numero2_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_asentada()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentado"; 
   if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_asentada_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_asentada_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'asentada')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
 function NM_label_facturado()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['facturado'])) ? $this->New_label['facturado'] : "Facturado"; 
   if (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_facturado_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_facturado_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_idcli()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
   if (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idcli_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idcli_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'idcli')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idcli')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_cambiar_cliente()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cambiar_cliente'])) ? $this->New_label['cambiar_cliente'] : ""; 
   if (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cambiar_cliente_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cambiar_cliente_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_fechaven()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
   if (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fechaven_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fechaven_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'fechaven')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('fechaven')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
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
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_total_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_total_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_vendedor()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
   if (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_vendedor_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_vendedor_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'vendedor')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('vendedor')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_imprimir()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "Imprimir"; 
   if (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_imprimir_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_imprimir_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_pos()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['pos'])) ? $this->New_label['pos'] : "POS"; 
   if (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_pos_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_pos_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_cobrar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['cobrar'])) ? $this->New_label['cobrar'] : "Cobrar"; 
   if (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_cobrar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_cobrar_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_creado_en_movil()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['creado_en_movil'])) ? $this->New_label['creado_en_movil'] : "Movil"; 
   if (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_creado_en_movil_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_creado_en_movil_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_disponible_en_movil()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['disponible_en_movil'])) ? $this->New_label['disponible_en_movil'] : "Disponible/Móvil"; 
   if (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_disponible_en_movil_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_disponible_en_movil_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'disponible_en_movil')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('disponible_en_movil')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_idpedido()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['idpedido'])) ? $this->New_label['idpedido'] : "Asentar Ped."; 
   if (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_idpedido_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_idpedido_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'idpedido')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('idpedido')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_numfacven()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Fac. No."; 
   if (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_numfacven_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_numfacven_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'numfacven')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('numfacven')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_nremision()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nremision'])) ? $this->New_label['nremision'] : "Remisión #"; 
   if (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nremision_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nremision_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'nremision')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('nremision')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
   }
   else
   {
   $nm_saida->saida("" . nl2br($SC_Label) . "\r\n");
   }
   $nm_saida->saida("</TD>\r\n");
   } 
 }
 function NM_label_credito()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Crédito"; 
   if (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_credito_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_credito_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'credito')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
   $nm_saida->saida("<a href=\"javascript:nm_gp_submit2('credito')\" class=\"" . $this->css_scGridLabelLink . "\"" . $Css_compl_sort . ">" . $link_img . "</a>\r\n");
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
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_fechavenc_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_fechavenc_label'] . "\" >\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
      $link_img = "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_cmp'] == 'fechavenc')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ordem_label'] == "desc")
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
 function NM_label_observaciones()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_observaciones_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observaciones_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ini_cor_grid']);
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
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq_filtro'];
// 
   $SC_Label = (isset($this->New_label['numero2'])) ? $this->New_label['numero2'] : "Número"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['numero2'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : "Asentado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['asentada'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['facturado'])) ? $this->New_label['facturado'] : "Facturado"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['facturado'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idcli'])) ? $this->New_label['idcli'] : "Cliente"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['idcli'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cambiar_cliente'])) ? $this->New_label['cambiar_cliente'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['cambiar_cliente'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : "Fecha"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['fechaven'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['total'])) ? $this->New_label['total'] : "Total"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['total'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['vendedor'])) ? $this->New_label['vendedor'] : "Vendedor"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['vendedor'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['imprimir'])) ? $this->New_label['imprimir'] : "Imprimir"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['imprimir'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['pos'])) ? $this->New_label['pos'] : "POS"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['pos'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['cobrar'])) ? $this->New_label['cobrar'] : "Cobrar"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['cobrar'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['creado_en_movil'])) ? $this->New_label['creado_en_movil'] : "Movil"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['creado_en_movil'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['disponible_en_movil'])) ? $this->New_label['disponible_en_movil'] : "Disponible/Móvil"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['disponible_en_movil'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['idpedido'])) ? $this->New_label['idpedido'] : "Asentar Ped."; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['idpedido'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['numfacven'])) ? $this->New_label['numfacven'] : "Fac. No."; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['numfacven'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['nremision'])) ? $this->New_label['nremision'] : "Remisión #"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['nremision'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['credito'])) ? $this->New_label['credito'] : "Crédito"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['credito'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['fechavenc'])) ? $this->New_label['fechavenc'] : "Vence"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['fechavenc'] = $SC_Label; 
   $SC_Label = (isset($this->New_label['observaciones'])) ? $this->New_label['observaciones'] : "Observaciones"; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['labels']['observaciones'] = $SC_Label; 
   if (!$this->grid_emb_form && isset($_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['grid_pedidos']['lig_edit'];
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_refresh'])
   {
       $this->refresh_interativ_search();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_refresh'] = false;
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->NM_btn_run_show = false;
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_pedidos#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['cab_embutida'] != "S")
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
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
           { 
           $nm_saida->saida("    <TD >\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
           } 
           $nm_saida->saida("  <td " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
           { 
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_A_grid_pedidos', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_D_grid_pedidos', 'value' => 'NM_Blank_Page.htm');
               $this->Ini->Arr_result['setSrc'][] = array('field' => 'nmsc_iframe_liga_E_grid_pedidos', 'value' => 'NM_Blank_Page.htm');
               $_SESSION['scriptcase']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
           if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" &&
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
           { 
               $nm_saida->saida("</TABLE></TD>\r\n");
               $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("</TD>\r\n");
               $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
               $nm_saida->saida("    </TD>\r\n");
               $nm_saida->saida("    </TR>\r\n");
           } 
       $nm_saida->saida("</TABLE>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_pedidos#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
{
}
else
{
       $nm_saida->saida("    <TR> \r\n");
}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
       { 
           $nm_saida->saida("    <TD  colspan=3>\r\n");
           $nm_saida->saida("    <TABLE cellspacing=0 cellpadding=0 width='100%'>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_EL_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_EL_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\"><TABLE style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
       } 
       $nm_id_aplicacao = " id=\"apl_grid_pedidos#?#1\"";
   } 
   $TD_padding = (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf") ? "padding: 0px !important;" : "";
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
{
}
else
{
   $nm_saida->saida("  <TD " . $this->Grid_body . " class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;" . $TD_padding . "\">\r\n");
}
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'])
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
if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf']) { 
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf']) { 
 }else { 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-53fe0bc8\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) { 
    $nm_saida->saida("</thead>\r\n");
 }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && $this->pdf_all_label != "S" && $this->pdf_label_group != "S") 
   { 
      $this->label_grid($linhas);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
   { 
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $this->nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] = 0;
   } 
   $this->nmgp_prim_pag_pdf = true;
   $this->Break_pag_pdf = array();
   $this->Break_pag_prt = array();
   $this->Break_pag_pdf['prefijo']['prefijo_ped'] = "S";
   $this->Break_pag_prt['prefijo']['prefijo_ped'] = "N";
   $this->Break_pag_pdf['vendedor']['vendedor'] = "S";
   $this->Break_pag_prt['vendedor']['vendedor'] = "N";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Config_Page_break_PDF'] = "N";
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF']))
   {
       if (isset($this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby']]))
       {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by")
           {
               foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp'] as $Cmp_gb => $resto)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF'][$Cmp_gb] = $this->Break_pag_pdf['sc_free_group_by'][$Cmp_gb];
               }
           }
           else
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF'] = $this->Break_pag_pdf[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby']];
           }
       }
       else
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF'] = array();
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo") 
   {
       if (isset($this->prefijo_ped))
       {
           $this->quebra_prefijo_ped_prefijo_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor") 
   {
       if (isset($this->vendedor))
       {
           $this->quebra_vendedor_vendedor_top(); 
       }
       $this->nmgp_prim_pag_pdf = false;
   }
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   $this->SC_seq_btn_run = 0;
   $nm_prog_barr = 0;
   $PB_tot       = "/" . $this->count_ger;;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          $this->NM_cont_emb_linha++;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['emb_linha']++;
          if ($this->Ini->qual_linha == "impar")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['ini_cor_grid'] = "impar";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] && !$this->Ini->sc_export_ajax)
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
          if (!$this->Ini->sc_export_ajax && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
                  grid_pedidos_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n", $this->Ini->Nm_lang);
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->numero2 = $this->rs_grid->fields[0] ;  
          $this->asentada = $this->rs_grid->fields[1] ;  
          $this->asentada = (string)$this->asentada;
          $this->idcli = $this->rs_grid->fields[2] ;  
          $this->idcli = (string)$this->idcli;
          $this->fechaven = $this->rs_grid->fields[3] ;  
          $this->total = $this->rs_grid->fields[4] ;  
          $this->total =  str_replace(",", ".", $this->total);
          $this->total = (string)$this->total;
          $this->vendedor = $this->rs_grid->fields[5] ;  
          $this->vendedor = (string)$this->vendedor;
          $this->creado_en_movil = $this->rs_grid->fields[6] ;  
          $this->disponible_en_movil = $this->rs_grid->fields[7] ;  
          $this->idpedido = $this->rs_grid->fields[8] ;  
          $this->idpedido = (string)$this->idpedido;
          $this->numfacven = $this->rs_grid->fields[9] ;  
          $this->numfacven = (string)$this->numfacven;
          $this->nremision = $this->rs_grid->fields[10] ;  
          $this->nremision = (string)$this->nremision;
          $this->credito = $this->rs_grid->fields[11] ;  
          $this->credito = (string)$this->credito;
          $this->fechavenc = $this->rs_grid->fields[12] ;  
          $this->observaciones = $this->rs_grid->fields[13] ;  
          $this->saldo = $this->rs_grid->fields[14] ;  
          $this->saldo =  str_replace(",", ".", $this->saldo);
          $this->saldo = (string)$this->saldo;
          $this->numpedido = $this->rs_grid->fields[15] ;  
          $this->numpedido = (string)$this->numpedido;
          $this->prefijo_ped = $this->rs_grid->fields[16] ;  
          $this->prefijo_ped = (string)$this->prefijo_ped;
          if (!isset($this->prefijo_ped)) { $this->prefijo_ped = ""; }
          if (!isset($this->vendedor)) { $this->vendedor = ""; }
          $GLOBALS["numfacven"] = $this->rs_grid->fields[9] ;  
          $GLOBALS["numfacven"] = (string)$GLOBALS["numfacven"];
          $GLOBALS["idcli"] = $this->rs_grid->fields[2] ;  
          $GLOBALS["idcli"] = (string)$GLOBALS["idcli"];
          $GLOBALS["vendedor"] = $this->rs_grid->fields[5] ;  
          $GLOBALS["vendedor"] = (string)$GLOBALS["vendedor"];
          $GLOBALS["nremision"] = $this->rs_grid->fields[10] ;  
          $GLOBALS["nremision"] = (string)$GLOBALS["nremision"];
          $GLOBALS["prefijo_ped"] = $this->rs_grid->fields[16] ;  
          $GLOBALS["prefijo_ped"] = (string)$GLOBALS["prefijo_ped"];
          $this->look_asentada = $this->asentada; 
          $this->Lookup->lookup_asentada($this->look_asentada); 
          $this->arg_sum_vendedor = ($this->vendedor == "") ? " is null " : " = " . $this->vendedor;
          $this->look_credito = $this->credito; 
          $this->Lookup->lookup_credito($this->look_credito); 
          $this->arg_sum_prefijo_ped = ($this->prefijo_ped == "") ? " is null " : " = " . $this->prefijo_ped;
          $this->SC_seq_page++; 
          if ($this->NM_btn_run_show)
          {
              $this->SC_seq_btn_run++;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_sql_btn_run'][$this->SC_seq_btn_run] = $this->rs_grid->fields;
          }
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final'] + 1; 
          $this->SC_sep_quebra = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
          if ($this->prefijo_ped !== $this->prefijo_ped_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo") 
          {  
              if (isset($this->prefijo_ped_Old))
              {
                 $this->quebra_prefijo_ped_prefijo_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby']]['prefijo_ped'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF']['prefijo_ped'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->prefijo_ped_Old = $this->prefijo_ped ; 
              $this->quebra_prefijo_ped_prefijo($this->prefijo_ped) ; 
              if (isset($this->prefijo_ped_Old))
              {
                 $this->quebra_prefijo_ped_prefijo_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          if ($this->vendedor !== $this->vendedor_Old && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor") 
          {  
              if (isset($this->vendedor_Old))
              {
                 $this->quebra_vendedor_vendedor_bot() ; 
              }
              if ($this->Print_All && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] && $this->Break_pag_prt[$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby']]['vendedor'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              elseif (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Page_break_PDF']['vendedor'] == "S")
              {
                  $this->nm_quebra_pagina("pagina"); 
              }
              $this->vendedor_Old = $this->vendedor ; 
              $this->quebra_vendedor_vendedor($this->vendedor) ; 
              if (isset($this->vendedor_Old))
              {
                 $this->quebra_vendedor_vendedor_top() ; 
              }
              $nm_houve_quebra = "S";
          } 
          $this->sc_proc_grid = true;
          $_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'on';
  if($this->asentada =="1")
{
	
	$this->NM_field_style["asentada"] = "background-color:#33ff99;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
    $this->pos  = "<a href='../frm_pos_impresion_pedidos_html/index.php?idfactura=".$this->idpedido ."' target='_blank'><img src='../_lib/img/usr__NM__bg__NM__apps_printer_15747.png' /></a>";
if($this->saldo ==0){
	
	$this->NM_field_style["cobrar"] = "background-color:#9999cc;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
 
      $nm_select = "select modificainvpedido from configuraciones where idconfiguraciones='1'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vsiModificaInv = array();
      $this->vsimodificainv = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vsiModificaInv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsimodificainv[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vsiModificaInv = false;
          $this->vsiModificaInv_erro = $this->Db->ErrorMsg();
          $this->vsimodificainv = false;
          $this->vsimodificainv_erro = $this->Db->ErrorMsg();
      } 
;
if(isset($this->vsimodificainv[0][0]))
	{
	if($this->vsimodificainv[0][0]=="SI")
		{
		$this->NM_field_style["imprimir"] = "background-color:#b9b9b8;";
		}
	}
if($this->facturado >0)
	{
	$this->facturado ='SI';
	$this->NM_field_style["facturado"] = "background-color:#58c964;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
	}
				
if($this->disponible_en_movil =="NO"){
	
	$this->NM_field_style["creado_en_movil"] = "background-color:#ffa0a3;font-size:15px;color:#000000;font-family:arial;font-weight:sans-serif;";
}
$_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'off';
          $this->Lookup->lookup_facturado($this->facturado, $this->numfacven, $this->array_facturado); 
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              if ($nm_houve_quebra == "S" || $this->nm_inicio_pag == 0)
              { 
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
                      $this->label_grid($linhas);
                  } 
                  $nm_houve_quebra = "N";
              } 
          } 
          else
          {
              if ($this->pdf_label_group != "S" && $this->pdf_all_label != "S")
              {
                  if ($this->nm_inicio_pag == 0 && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
                  {
                      $nm_houve_quebra = "N";
                  } 
              } 
              elseif (($nm_houve_quebra == "S" || ($this->nm_inicio_pag == 0)) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
              { 
                 if ($this->pdf_all_label == "S" && ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_")) 
                 { } 
                 elseif ($this->pdf_label_group == "S") 
                 {
                     if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
                         $this->label_grid($linhas);
                     } 
                 } 
                  $nm_houve_quebra = "N";
              } 
          } 
          $this->nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['final']; 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
              if ($temp == "fechaven")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida("d/m/y");
                  } 
              }
              if ($temp == "fechavenc")
              {
                  $conteudo_x = $teste;
                  nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
                  if (is_numeric($conteudo_x) && $conteudo_x > 0) 
                  { 
                      $this->nm_data->SetaData($teste, "YYYY-MM-DD");
                      $teste = $this->nm_data->FormataSaida("d/m/y");
                  } 
              }
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"  style=\"page-break-inside: avoid;\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\">&nbsp;</TD>\r\n");
 }
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\">\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
 if ($this->NM_btn_run_show){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"> <input type=\"checkbox\" id=\"NM_ck_run" . $this->SC_seq_btn_run . "\" class=\"sc-ui-check-run\" name=\"NM_ck_grid[]\" value=\"" . NM_encode_input($this->SC_seq_btn_run) . "\" style=\"align:left;vertical-align:middle;font-weight:bold;\" /></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] != "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_pedido']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_pedido'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_pedido"]) && $this->Ini->sc_lig_md5["form_pedido"] == "S")
              {
                  $Parms_Edt  = "idpedido?#?" . str_replace('"', "@aspasd@", $this->idpedido) . "?@?SC_glo_par_gidtercero?#?gidtercero?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idpedido?#?" . str_replace('"', "@aspasd@", $this->idpedido) . "?@?SC_glo_par_gidtercero?#?gidtercero?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_pedido . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_pedido', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_pedido . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_pedido', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\"><img id=\"b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</td><td style=\"padding: 0px\">" . $Link_Edit . "</td></tr></table></TD>\r\n");
 } 
 if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['mostra_edit'] == "N"){ 
              $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
              $linkTarget = isset($this->Ini->sc_lig_target['A_@scinf__@scinf_form_pedido']) ? $this->Ini->sc_lig_target['A_@scinf__@scinf_form_pedido'] : (isset($this->Ini->sc_lig_target['A_@scinf_']) ? $this->Ini->sc_lig_target['A_@scinf_'] : null);
              if (isset($this->Ini->sc_lig_md5["form_pedido"]) && $this->Ini->sc_lig_md5["form_pedido"] == "S")
              {
                  $Parms_Edt  = "idpedido?#?" . str_replace('"', "@aspasd@", $this->idpedido) . "?@?SC_glo_par_gidtercero?#?gidtercero?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
                  if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
                  {
                      if ('' != $Parms_Edt && '?@?' != substr($Parms_Edt, -3) && '*scout' != substr($Parms_Edt, -6))
                      {
                          $Parms_Edt .= '*scout';
                      }
                      $Parms_Edt .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
                  }
                  $Md5_Edt    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Edt);
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Edt)] = $Parms_Edt;
              }
              else
              {
                  $Md5_Edt  = "idpedido?#?" . str_replace('"', "@aspasd@", $this->idpedido) . "?@?SC_glo_par_gidtercero?#?gidtercero?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?nmgp_opcao?#?igual?@?";
              }
              $Link_Edit = nmButtonOutput($this->arr_buttons, "bform_editar", "nm_gp_submit4('" .  $this->Ini->link_form_pedido . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_pedido', '" . $this->SC_ancora . "')", "nm_gp_submit4('" .  $this->Ini->link_form_pedido . "', '$this->nm_location',  '$Md5_Edt' , '". (isset($linkTarget) ? $linkTarget : '_self') . "', '', 'form_pedido', '" . $this->SC_ancora . "')", "bedit", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\"><tr><td style=\"padding: 0px\"><img id=\"b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</td></tr></table></TD>\r\n");
 } 
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf"){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  NOWRAP align=\"center\" valign=\"top\" WIDTH=\"1px\"  HEIGHT=\"0px\"><img id=\"b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">\r\n");
          $nm_saida->saida("<img id=\"b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; document.getElementById('b_open_emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = ''; document.getElementById('emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "').style.display = 'none'; return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">\r\n");
          $nm_saida->saida("</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
              $this->NM_calc_span();
              $nm_saida->saida("</TR>\r\n");
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")
              { 
                  $nm_saida->saida("<TR  class=\"" . $this->css_line_back . "\" id=\"emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\"  style=\"display:none\">\r\n");
              } 
              else 
              { 
                  $nm_saida->saida("<TR  class=\"" . $this->css_line_back . "\" id=\"emb_grid_pedidos_linha_" . $this->NM_cont_emb_linha . "\"  style=\"display:''\">\r\n");
              } 
              $nm_saida->saida("<TD class=\"" . $this->css_line_fonf . "\" colspan=\"" . $this->NM_colspan . "\"><TABLE align=\"left\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px;\" width=\"100%\"><TR>\r\n");
              $this->NM_grid_detalle();
              $nm_saida->saida("</TR></TABLE></TD>\r\n");
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $this->Ini->Apl_paginacao == "FULL")
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
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
   if (method_exists($this->grid_detallepedido, "close_emb")) 
   {
       $this->grid_detallepedido->close_emb();
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
       if (isset($this->prefijo_ped_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "prefijo")
       {
           $this->quebra_prefijo_ped_prefijo_bot() ; 
       }
       if (isset($this->vendedor_Old) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "vendedor")
       {
           $this->quebra_vendedor_vendedor_bot() ; 
       }
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] . "_bot";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($this->NM_btn_run_show)
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['scriptcase']['saida_html']));
       $_SESSION['scriptcase']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
       $_SESSION['scriptcase']['contr_link_emb'] = "";   
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && empty($this->nm_grid_sem_reg) && 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
   { 
       $nm_saida->saida("</TABLE></TD>\r\n");
       $nm_saida->saida("<TD style=\"padding: 0px; border-width: 0px;\" valign=\"top\" width=1>\r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_DL_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_DL_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
       $nm_saida->saida("</TD>\r\n");
           $nm_saida->saida("    <TD style=\"padding: 0px; border-width: 0px; vertical-align: top;\">\r\n");
           $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_D_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_D_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
           $nm_saida->saida("    </TD>\r\n");
           $nm_saida->saida("    </TR>\r\n");
           $nm_saida->saida("    </TABLE>\r\n");
           $nm_saida->saida("    </TD>\r\n");
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_numero2()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off") { 
          $conteudo = sc_strip_script($this->numero2); 
          $conteudo_original = sc_strip_script($this->numero2); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numero2', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numero2', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_numero2_grid_line . "\"  style=\"" . $this->Css_Cmp['css_numero2_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_numero2_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_asentada()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off") { 
          $FieldDisp = "";
      }
      else {
          $FieldDisp = "none";
      }
          $conteudo = trim(NM_encode_input(sc_strip_script($this->look_asentada))); 
          $conteudo_original = trim(NM_encode_input(sc_strip_script($this->look_asentada))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_asentada_grid_line . "\"  style=\"display:" . $FieldDisp . ";" . $this->Css_Cmp['css_asentada_grid_line'] . $Style_asentada . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_Hidden_asentada_" . $this->SC_seq_page . "\" style= \"display: none;\">" . $this->asentada . "</span><span id=\"id_sc_field_asentada_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
 }
 function NM_grid_facturado()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off") { 
          $conteudo = sc_strip_script($this->facturado); 
          $conteudo_original = sc_strip_script($this->facturado); 
          $conteudo = trim($this->facturado); 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'facturado', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'facturado', $str_tem_display, $conteudo_original); 
          } 
              $Style_facturado = "";
          if (isset($this->NM_field_style["facturado"]) && !empty($this->NM_field_style["facturado"]))
          {
              $Style_facturado .= $this->NM_field_style["facturado"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_facturado_grid_line . "\"  style=\"" . $this->Css_Cmp['css_facturado_grid_line'] . $Style_facturado . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_facturado_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idcli()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->idcli)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idcli)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_idcli($conteudo , $this->idcli) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idcli', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idcli', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idcli_grid_line . "\"  style=\"" . $this->Css_Cmp['css_idcli_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_idcli_" . $this->SC_seq_page . "\">\r\n");
if (strlen($conteudo) > 15 && $conteudo != "&nbsp;") {
   $nm_saida->saida("" . sc_substr(strip_tags($conteudo), 0, 15) . nmButtonOutput($this->arr_buttons, "bqtd_bytes", "", "", "bidcli", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . str_replace('"', '&quot;', strip_tags($conteudo)) . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "") . "\r\n");
} else {
   $nm_saida->saida("$conteudo\r\n");
}
   $nm_saida->saida("</span></TD>\r\n");
      }
 }
 function NM_grid_cambiar_cliente()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off") { 
          $conteudo = $this->cambiar_cliente; 
          $conteudo_original = $this->cambiar_cliente; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__user_edit_32.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__user_edit_32.png";
                  $conteudo = "<img border=\"\" src=\"scriptcase__NM__ico__NM__user_edit_32.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__user_edit_32.png";
                  $tmp_cambiar_cliente = fopen($loc_img_word, "rb"); 
                  $reg_cambiar_cliente = fread($tmp_cambiar_cliente, filesize($loc_img_word)); 
                  fclose($tmp_cambiar_cliente);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_cambiar_cliente) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__user_edit_32.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cambiar_cliente', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cambiar_cliente', $str_tem_display, $conteudo_original); 
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cambiar_cliente_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cambiar_cliente_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_cambiar_cliente_@scinf_form_pedidos_cambia_clienteyvendedor']) ? $this->Ini->sc_lig_target['C_@scinf_cambiar_cliente_@scinf_form_pedidos_cambia_clienteyvendedor'] : (isset($this->Ini->sc_lig_target['C_@scinf_cambiar_cliente']) ? $this->Ini->sc_lig_target['C_@scinf_cambiar_cliente'] : null);
       if (isset($this->Ini->sc_lig_md5["form_pedidos_cambia_clienteyvendedor"]) && $this->Ini->sc_lig_md5["form_pedidos_cambia_clienteyvendedor"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis*scinS*scoutnmgp_opcao*scinigual*scoutidpedido*scin" . str_replace("'", "@aspass@", $this->idpedido) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutsc_redir_atualiz*scinok*scoutsc_redir_insert*scinok*scoutNMSC_modal*scinok*scout";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis*scinS*scoutnmgp_opcao*scinigual*scoutidpedido*scin" . str_replace("'", "@aspass@", $this->idpedido) . "*scoutNM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scoutsc_redir_atualiz*scinok*scoutsc_redir_insert*scinok*scoutNMSC_modal*scinok*scout";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_cambiar_cliente_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_pedidos_cambia_clienteyvendedor_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : 'modal') . "', '', '400', '650', '', 'form_pedidos_cambia_clienteyvendedor', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_cambiar_cliente_grid_line . "\" style=\"" . $this->Css_Cmp['css_cambiar_cliente_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_cambiar_cliente_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_fechaven()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->fechaven)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->fechaven)); 
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
                   $conteudo = $this->nm_data->FormataSaida("d/m/y");
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechaven', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechaven', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fechaven_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fechaven_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_fechaven_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'total', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'total', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_total_grid_line . "\"  style=\"" . $this->Css_Cmp['css_total_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_total_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_vendedor()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->vendedor)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->vendedor)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_vendedor($conteudo , $this->vendedor) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'vendedor', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'vendedor', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_vendedor_grid_line . "\"  style=\"" . $this->Css_Cmp['css_vendedor_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_vendedor_" . $this->SC_seq_page . "\">\r\n");
if (strlen($conteudo) > 20 && $conteudo != "&nbsp;") {
   $nm_saida->saida("" . sc_substr(strip_tags($conteudo), 0, 20) . nmButtonOutput($this->arr_buttons, "bqtd_bytes", "", "", "bvendedor", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . str_replace('"', '&quot;', strip_tags($conteudo)) . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "") . "\r\n");
} else {
   $nm_saida->saida("$conteudo\r\n");
}
   $nm_saida->saida("</span></TD>\r\n");
      }
 }
 function NM_grid_imprimir()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off") { 
          $conteudo = $this->imprimir; 
          $conteudo_original = $this->imprimir; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__printer_green_10875.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__printer_green_10875.png";
                  $conteudo = "<img border=\"\" src=\"usr__NM__bg__NM__printer_green_10875.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__printer_green_10875.png";
                  $tmp_imprimir = fopen($loc_img_word, "rb"); 
                  $reg_imprimir = fread($tmp_imprimir, filesize($loc_img_word)); 
                  fclose($tmp_imprimir);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_imprimir) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/usr__NM__bg__NM__printer_green_10875.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'imprimir', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'imprimir', $str_tem_display, $conteudo_original); 
          } 
              $Style_imprimir = "";
          if (isset($this->NM_field_style["imprimir"]) && !empty($this->NM_field_style["imprimir"]))
          {
              $Style_imprimir .= $this->NM_field_style["imprimir"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_imprimir_grid_line . "\"  style=\"" . $this->Css_Cmp['css_imprimir_grid_line'] . $Style_imprimir . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_imprimir_@scinf_pdfreport_pedidos_cti_proforma']) ? $this->Ini->sc_lig_target['C_@scinf_imprimir_@scinf_pdfreport_pedidos_cti_proforma'] : (isset($this->Ini->sc_lig_target['C_@scinf_imprimir']) ? $this->Ini->sc_lig_target['C_@scinf_imprimir'] : null);
       if (isset($this->Ini->sc_lig_md5["pdfreport_pedidos_cti_proforma"]) && $this->Ini->sc_lig_md5["pdfreport_pedidos_cti_proforma"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?par_pedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?par_pedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?";
       }
   $nm_saida->saida("<a id=\"id_sc_field_imprimir_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_pdfreport_pedidos_cti_proforma_cons . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_blank') . "', 'inicio', '0', '0', '', 'pdfreport_pedidos_cti_proforma', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_imprimir_grid_line . "\" style=\"" . $this->Css_Cmp['css_imprimir_grid_line'] . $Style_imprimir . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_imprimir_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'detalle', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'detalle', $str_tem_display, $conteudo_original); 
          } 
          $this->SC_nowrap = "";
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_detalle_grid_line . "\"  style=\"" . $this->Css_Cmp['css_detalle_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  >\r\n");
          if (!$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida_treeview'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")
          { 
              $link_div = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['ind_tree']++;
              $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['ind_tree'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detallepedido'][$this->NM_cont_body][1] = 'top';
              if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp)
              { 
                  $link_div  = "<img id=\"b_open_grid_detallepedido_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_open_grid_detallepedido_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_detallepedido_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detallepedido, 'grid_detallepedido'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
                  $link_div .= "<img id=\"b_close_grid_detallepedido_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_close_grid_detallepedido_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_detallepedido_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_detallepedido, 'grid_detallepedido'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
              }
              $nm_saida->saida("<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">");
              $nm_saida->saida("<TR> <TD align=\"left\">");
              $nm_saida->saida("<DIV id=\"tbody_grid_detallepedido_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
              $nm_saida->saida($link_div . "</DIV></TD></TR>");
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['ind_tree']++;
              $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['ind_tree'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_detallepedido'][$this->NM_cont_body][1] = 'bot';
              $nm_saida->saida("<tr><td>");
              if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp)
              { 
                  $nm_saida->saida("<DIV id=\"tbody_grid_detallepedido_" . $this->NM_cont_body . "_bot\" style=\"display:none\">");
              }
              else
              { 
                  $nm_saida->saida("<DIV id=\"tbody_grid_detallepedido_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
              }
          }
          $GLOBALS["script_case_init"] = $this->Ini->sc_page;
          $GLOBALS["nmgp_parms"] = "nmgp_lig_edit_lapis?#?S?@?par_idpedio?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = true;
          if (method_exists($this->grid_detallepedido, "controle"))
          {
              $this->grid_detallepedido->controle();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          {
              $this->Ini->conectDB();
              $this->Db = $this->Ini->Db;
              $this->Tot->Db = $this->Db;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida'] = false;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['emb_lig_aba']))
          { 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
              { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['emb_lig_aba'] = array_merge($this->Ini->Init_apl_lig, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['emb_lig_aba']);
              }
              else 
              { 
                 $this->Ini->Init_apl_lig = array_merge($this->Ini->Init_apl_lig, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['emb_lig_aba']);
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detallepedido']['embutida_treeview'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] != "pdf")
          { 
              $nm_saida->saida("</DIV></td></tr>");
              $nm_saida->saida("</table>");
          }
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_pos()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off") { 
          $conteudo = sc_strip_script($this->pos); 
          $conteudo_original = sc_strip_script($this->pos); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'pos', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'pos', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_pos_grid_line . "\"  style=\"" . $this->Css_Cmp['css_pos_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"  ><span id=\"id_sc_field_pos_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_cobrar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off") { 
          $conteudo = $this->cobrar; 
          $conteudo_original = $this->cobrar; 
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__currency_dollar_32.png"))
          { 
              $conteudo = "&nbsp;" ;  
          } 
          else 
          { 
              if ($this->Ini->Export_img_zip)
              {
                  $this->Ini->Img_export_zip[] = $this->Ini->root . "/" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__currency_dollar_32.png";
                  $conteudo = "<img border=\"\" src=\"scriptcase__NM__ico__NM__currency_dollar_32.png\"/>"; 
              }
              elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['doc_word'] || $this->Img_embbed || $this->Ini->sc_export_ajax_img) 
              { 
                  $loc_img_word = $this->Ini->root . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__currency_dollar_32.png";
                  $tmp_cobrar = fopen($loc_img_word, "rb"); 
                  $reg_cobrar = fread($tmp_cobrar, filesize($loc_img_word)); 
                  fclose($tmp_cobrar);  
                  $conteudo = "<img border=\"0\" src=\"data:image/jpeg;base64," . base64_encode($reg_cobrar) . "\"/>" ; 
              } 
              else 
              { 
                  $conteudo = "<img border=\"0\" src=\"" . $this->NM_raiz_img  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__currency_dollar_32.png\"/>" ; 
              } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'cobrar', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'cobrar', $str_tem_display, $conteudo_original); 
          } 
              $Style_cobrar = "";
          if (isset($this->NM_field_style["cobrar"]) && !empty($this->NM_field_style["cobrar"]))
          {
              $Style_cobrar .= $this->NM_field_style["cobrar"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_cobrar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_cobrar_grid_line'] . $Style_cobrar . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_cobrar_@scinf_form_pagar_pedido']) ? $this->Ini->sc_lig_target['C_@scinf_cobrar_@scinf_form_pagar_pedido'] : (isset($this->Ini->sc_lig_target['C_@scinf_cobrar']) ? $this->Ini->sc_lig_target['C_@scinf_cobrar'] : null);
       if (isset($this->Ini->sc_lig_md5["form_pagar_pedido"]) && $this->Ini->sc_lig_md5["form_pagar_pedido"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?par_idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?par_idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_cobrar_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_pagar_pedido_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_self') . "', '', '0', '0', '', 'form_pagar_pedido', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_cobrar_grid_line . "\" style=\"" . $this->Css_Cmp['css_cobrar_grid_line'] . $Style_cobrar . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_cobrar_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_grid_creado_en_movil()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off") { 
          $conteudo = sc_strip_script($this->creado_en_movil); 
          $conteudo_original = sc_strip_script($this->creado_en_movil); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'creado_en_movil', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'creado_en_movil', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
              $Style_creado_en_movil = "";
          if (isset($this->NM_field_style["creado_en_movil"]) && !empty($this->NM_field_style["creado_en_movil"]))
          {
              $Style_creado_en_movil .= $this->NM_field_style["creado_en_movil"];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_creado_en_movil_grid_line . "\"  style=\"" . $this->Css_Cmp['css_creado_en_movil_grid_line'] . $Style_creado_en_movil . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_creado_en_movil_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_disponible_en_movil()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off") { 
          $conteudo = sc_strip_script($this->disponible_en_movil); 
          $conteudo_original = sc_strip_script($this->disponible_en_movil); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'disponible_en_movil', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'disponible_en_movil', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_disponible_en_movil_grid_line . "\"  style=\"" . $this->Css_Cmp['css_disponible_en_movil_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"top\"   HEIGHT=\"0px\"><span id=\"id_sc_field_disponible_en_movil_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_idpedido()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off") { 
          $FieldDisp = "";
      }
      else {
          $FieldDisp = "none";
      }
          $conteudo = NM_encode_input(sc_strip_script($this->idpedido)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->idpedido)); 
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
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'idpedido', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'idpedido', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_idpedido_grid_line . "\"  style=\"display:" . $FieldDisp . ";" . $this->Css_Cmp['css_idpedido_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_Hidden_idpedido_" . $this->SC_seq_page . "\" style= \"display: none;\">" . $this->idpedido . "</span><span id=\"id_sc_field_idpedido_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
 }
 function NM_grid_numfacven()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->numfacven)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->numfacven)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_numfacven($conteudo , $this->numfacven) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'numfacven', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'numfacven', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_numfacven_grid_line . "\"  style=\"" . $this->Css_Cmp['css_numfacven_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_numfacven_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nremision()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->nremision)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->nremision)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_nremision($conteudo , $this->nremision) ; 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'nremision', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'nremision', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nremision_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nremision_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nremision_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_credito()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off") { 
          $conteudo = trim(NM_encode_input(sc_strip_script($this->look_credito))); 
          $conteudo_original = trim(NM_encode_input(sc_strip_script($this->look_credito))); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'credito', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'credito', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_credito_grid_line . "\"  style=\"" . $this->Css_Cmp['css_credito_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_credito_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
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
                   $conteudo = $this->nm_data->FormataSaida("d/m/y");
               } 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'fechavenc', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'fechavenc', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "NOWRAP";
          }
          else
          {
              $this->SC_nowrap = "NOWRAP";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_fechavenc_grid_line . "\"  style=\"" . $this->Css_Cmp['css_fechavenc_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\"><span id=\"id_sc_field_fechavenc_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_observaciones()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->observaciones)); 
          $conteudo_original = NM_encode_input(sc_strip_script($this->observaciones)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          if ($conteudo !== "&nbsp;") 
          { 
              $conteudo = sc_strtoupper($conteudo); 
          } 
          $str_tem_display = $conteudo;
          if(!empty($str_tem_display) && $str_tem_display != '&nbsp;' && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && !empty($conteudo)) 
          { 
              $str_tem_display = $this->getFieldHighlight('quicksearch', 'observaciones', $str_tem_display, $conteudo_original); 
              $str_tem_display = $this->getFieldHighlight('advanced_search', 'observaciones', $str_tem_display, $conteudo_original); 
          } 
              $conteudo = $str_tem_display; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'])
          {
              $this->SC_nowrap = "";
          }
          else
          {
              $this->SC_nowrap = "";
          }
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_observaciones_grid_line . "\"  style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\" " . $this->SC_nowrap . " align=\"\" valign=\"middle\"   HEIGHT=\"0px\">\r\n");
 if (!$this->Ini->Proc_print && !$this->Ini->SC_Link_View && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['scriptcase']['contr_link_emb'] != "pdf" && $conteudo != "&nbsp;"){ $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Ind_lig_mult']++;
       $linkTarget = isset($this->Ini->sc_lig_target['C_@scinf_observaciones_@scinf_form_pedido_CW']) ? $this->Ini->sc_lig_target['C_@scinf_observaciones_@scinf_form_pedido_CW'] : (isset($this->Ini->sc_lig_target['C_@scinf_observaciones']) ? $this->Ini->sc_lig_target['C_@scinf_observaciones'] : null);
       if (isset($this->Ini->sc_lig_md5["form_pedido_CW"]) && $this->Ini->sc_lig_md5["form_pedido_CW"] == "S") {
           $Parms_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?par_pedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?SC_glo_par_gmodificarinventario?#?gModificarInventario?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'] && isset($linkTarget))
           {
               if ('' != $Parms_Lig)
               {
                   $Parms_Lig .= '*scout';
               }
               $Parms_Lig .= 'under_dashboard*scin1*scoutdashboard_app*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['dashboard_app'] . '*scoutown_widget*scin' . $linkTarget . '*scoutparent_widget*scin' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['own_widget'] . '*scoutcompact_mode*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['compact_mode'] ? '1' : '0') . '*scoutremove_margin*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_margin'] ? '1' : '0') . '*scoutremove_border*scin' . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['remove_border'] ? '1' : '0');
           }
           $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
       } else {
           $Md5_Lig = "nmgp_lig_edit_lapis?#?S?@?nmgp_opcao?#?igual?@?idpedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?par_pedido?#?" . str_replace("'", "@aspass@", $this->idpedido) . "?@?SC_glo_par_gmodificarinventario?#?gModificarInventario?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?";
       }
   $nm_saida->saida("<a  id=\"id_sc_field_observaciones_" . $this->SC_seq_page . "\" href=\"javascript:nm_gp_submit5('" . $this->Ini->link_form_pedido_CW_edit . "', '$this->nm_location', '$Md5_Lig', '" . (isset($linkTarget) ? $linkTarget : '_self') . "', '', '0', '0', '', 'form_pedido_CW', '" . $this->SC_ancora . "')\" onMouseover=\"nm_mostra_hint(this, event, '')\" onMouseOut=\"nm_apaga_hint()\" class=\"" . $this->Ini->cor_link_dados . $this->css_sep . $this->css_observaciones_grid_line . "\" style=\"" . $this->Css_Cmp['css_observaciones_grid_line'] . "\">" . $conteudo . "</a>\r\n");
} else {
   $nm_saida->saida(" <span id=\"id_sc_field_observaciones_" . $this->SC_seq_page . "\">$conteudo </span>\r\n");
       } 
   $nm_saida->saida("</TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 21;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $this->NM_colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
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
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['print_navigator']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['print_navigator'] == "Netscape")
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
        if ($nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
        {
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf']) { 
           }
           else
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) { 
                $nm_saida->saida("     <thead>\r\n");
               }
               $this->cabecalho();
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) { 
                $nm_saida->saida("     </thead>\r\n");
               }
           }
        }
        $nm_saida->saida(" <TR> \r\n");
        $nm_saida->saida("  <TD style=\"padding: 0px; vertical-align: top;\"> \r\n");
        $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && ($this->pdf_all_cab == "S" || $this->pdf_all_label == "S")) { 
            $nm_saida->saida(" <thead> \r\n");
            if ($this->pdf_all_cab == "S")
            {
                $this->cabecalho();
            }
            if ($this->pdf_all_label == "S" && $nm_parms != "resumo" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
            {
                $this->label_grid();
            }
            $nm_saida->saida(" </thead> \r\n");
        }
        if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && $nm_parms != "resumo" && $nm_parms != "pagina" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
        {
            $this->label_grid();
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] && $this->pdf_label_group != "S" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'])
        {
            $this->nm_inicio_pag = 0;
        }
    }
 }
 function quebra_prefijo_ped_prefijo($prefijo_ped) 
 {
   global $tot_prefijo_ped;
   $this->sc_proc_quebra_prefijo_ped = true; 
   $this->Tot->quebra_prefijo_ped_prefijo($prefijo_ped, $this->arg_sum_prefijo_ped);
   $conteudo = $tot_prefijo_ped[0] ;  
   $this->count_prefijo_ped = $tot_prefijo_ped[1];
   $this->sum_prefijo_ped_total = $tot_prefijo_ped[2];
   $this->campos_quebra_prefijo_ped = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->prefijo_ped)); 
   $this->Lookup->lookup_prefijo_prefijo_ped($conteudo , $this->prefijo_ped) ; 
   $this->campos_quebra_prefijo_ped[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['prefijo_ped']))
   {
       $this->campos_quebra_prefijo_ped[0]['lab'] = $this->nmgp_label_quebras['prefijo_ped']; 
   }
   else
   {
   $this->campos_quebra_prefijo_ped[0]['lab'] = "PJ"; 
   }
   $this->sc_proc_quebra_prefijo_ped = false; 
 } 
 function quebra_vendedor_vendedor($vendedor) 
 {
   global $tot_vendedor;
   $this->sc_proc_quebra_vendedor = true; 
   $this->Tot->quebra_vendedor_vendedor($vendedor, $this->arg_sum_vendedor);
   $conteudo = $tot_vendedor[0] ;  
   $this->count_vendedor = $tot_vendedor[1];
   $this->sum_vendedor_total = $tot_vendedor[2];
   $this->campos_quebra_vendedor = array(); 
   $conteudo = NM_encode_input(sc_strip_script($this->vendedor)); 
   $this->Lookup->lookup_vendedor_vendedor($conteudo , $this->vendedor) ; 
   $this->campos_quebra_vendedor[0]['cmp'] = $conteudo; 
   if (isset($this->nmgp_label_quebras['vendedor']))
   {
       $this->campos_quebra_vendedor[0]['lab'] = $this->nmgp_label_quebras['vendedor']; 
   }
   else
   {
   $this->campos_quebra_vendedor[0]['lab'] = "Vendedor"; 
   }
   $this->sc_proc_quebra_vendedor = false; 
 } 
 function quebra_prefijo_ped_prefijo_top() 
 { global
          $prefijo_ped_ant_desc, 
          $nm_saida, $tot_prefijo_ped;
   $this->SC_tab_quebra = 0;
   $prefijo_ped_ant_desc = $this->campos_quebra_prefijo_ped[0]['cmp'];
   static $cont_quebra_prefijo_ped = 0; 
   $cont_quebra_prefijo_ped++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_pedidos_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_pedidos_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_pedidos_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_pedidos, 'grid_pedidos'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_pedidos_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_pedidos_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_pedidos_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_pedidos, 'grid_pedidos'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_pedidos'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_pedidos_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_prefijo_ped[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_prefijo_ped[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_prefijo_ped = "<table>"; 
   foreach ($this->campos_quebra_prefijo_ped as $cada_campo) 
   { 
       $this->Label_prefijo_ped .= "<tr>"; 
       $this->Label_prefijo_ped .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_prefijo_ped .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_prefijo_ped .= "</tr>"; 
   } 
   $this->Label_prefijo_ped .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_prefijo_ped . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_pedidos'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_pedidos_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_prefijo_ped_prefijo_bot() 
 { global 
          $prefijo_ped_ant_desc, 
          $nm_saida, $tot_prefijo_ped;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $prefijo_ped_ant_desc = $this->campos_quebra_prefijo_ped[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "numero2" && (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "facturado" && (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idcli" && (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cambiar_cliente" && (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fechaven" && (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_prefijo_ped[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "vendedor" && (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imprimir" && (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pos" && (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cobrar" && (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado_en_movil" && (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "disponible_en_movil" && (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpedido" && (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numfacven" && (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nremision" && (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "credito" && (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fechavenc" && (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_vendedor_vendedor_top() 
 { global
          $vendedor_ant_desc, 
          $nm_saida, $tot_vendedor;
   $this->SC_tab_quebra = 0;
   $vendedor_ant_desc = $this->campos_quebra_vendedor[0]['cmp'];
   static $cont_quebra_vendedor = 0; 
   $cont_quebra_vendedor++;
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_old = "";
   $nm_fecha_pdf_new = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $link_div   = "";
   $link_div_2 = "";
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree'];
       $link_div  = "<table style=\"border-collapse: collapse\"><tr>";
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
          $link_div .= "<td class=\"" . $this->css_scGridBlockLineBg . "\" style=\"width: " . $this->SC_tab_quebra . "px;\">&nbsp;</td>"; 
       }
       $link_div .= "<td style=\"padding: 0px\"><span align=\"left\">";
       $link_div .= "<img id=\"b_open_grid_pedidos_" . $this->NM_cont_body . "\" style=\"display:none\" onclick=\"document.getElementById('b_open_grid_pedidos_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_close_grid_pedidos_" . $this->NM_cont_body . "').style.display = ''; NM_liga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_pedidos, 'grid_pedidos'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_exp . "\">";
       $link_div .= "<img id=\"b_close_grid_pedidos_" . $this->NM_cont_body . "\" style=\"display:''\" onclick=\"document.getElementById('b_close_grid_pedidos_" . $this->NM_cont_body . "').style.display = 'none'; document.getElementById('b_open_grid_pedidos_" . $this->NM_cont_body . "').style.display = ''; NM_apaga_tbody(" . $this->NM_cont_body . ", NM_tab_grid_pedidos, 'grid_pedidos'); return false;\" src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Tree_img_col . "\">";
       $link_div .= "</span></td><td  class=\"scGridBlockFont\">";
       $link_div_2 = "</td></tr></table>";
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $this->NM_tbody_open = false;
           $nm_saida->saida("    </TBODY>");
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_pedidos'][$this->NM_cont_body]['1'] = 'top';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_pedidos_" . $this->NM_cont_body . "_top\" style=\"display:''\">");
   }
   $nm_nivel_book_pdf = "";
   $nm_fecha_pdf_new  = "";
   $this->NM_calc_span();
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
   {
       $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H2 style=\"font-size:0;padding:1px\">" .  $this->campos_quebra_vendedor[0]['cmp'] ;
       $nm_fecha_pdf_new = "</H2></div>";
   }
   $conteudo = $tot_vendedor[0] ;  
   if ($this->SC_sep_quebra)
   {
       $this->SC_sep_quebra = false;
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert']) { 
         } else {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $nm_saida->saida("<tr>\r\n");
   $nm_saida->saida("<td class=\"" . $this->css_scGridBlockSpaceBg . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
   $nm_saida->saida("</tr>\r\n");
         }
   }
   $colspan = $this->NM_colspan;
   $this->Label_vendedor = "<table>"; 
   foreach ($this->campos_quebra_vendedor as $cada_campo) 
   { 
       $this->Label_vendedor .= "<tr>"; 
       $this->Label_vendedor .= "<td>" . $cada_campo['lab'] . "</td><td> => </td>";
       $this->Label_vendedor .= "<td>" . $cada_campo['cmp'] . "</td>";
       $this->Label_vendedor .= "</tr>"; 
   } 
   $this->Label_vendedor .= "</table>"; 
   $nm_saida->saida("    <TR >\r\n");
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlock . "\" style=\"text-align:left;\"  style=\"text-align: left;\" NOWRAP " . "colspan=\"" . $colspan . "\"" . " align=\"\">\r\n");
   $nm_saida->saida("       " . $link_div . "\r\n");
   $nm_saida->saida("        " . $nm_nivel_book_pdf . $nm_fecha_pdf_new  . $this->Label_vendedor . $nm_fecha_pdf_old . "\r\n");
   $nm_saida->saida("       " . $link_div_2 . "\r\n");
   $nm_saida->saida("     </TD>\r\n");
   $nm_saida->saida("    </TR>\r\n");
   if ('' != $this->Ini->Tree_img_col && '' != $this->Ini->Tree_img_exp && !$this->Ini->Proc_print && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $nm_saida->saida("    </TBODY>");
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree']++;
       $this->NM_cont_body = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ind_tree'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']['grid_pedidos'][$this->NM_cont_body]['1'] = 'bot';
       $nm_saida->saida("    <TBODY id=\"tbody_grid_pedidos_" . $this->NM_cont_body . "_bot\" style=\"display:''\">");
       $this->NM_tbody_open = true;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_vendedor_vendedor_bot() 
 { global 
          $vendedor_ant_desc, 
          $nm_saida, $tot_vendedor;
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $vendedor_ant_desc = $this->campos_quebra_vendedor[0]['cmp'];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridSubtotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = "";
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "numero2" && (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "facturado" && (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idcli" && (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cambiar_cliente" && (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fechaven" && (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"   style=\"text-align: left;\"  NOWRAP " . "colspan=\"" . $colspan . "\"" . " >" . $tit_lin_sumariza_atu . "</TD>\r\n");
           $colspan = 0;
           $tit_lin_sumariza_atu = "&nbsp;";
      }
      $conteudo =  $tot_vendedor[2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . " css_total_sub_tot\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "vendedor" && (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "imprimir" && (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "pos" && (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "cobrar" && (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "creado_en_movil" && (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "disponible_en_movil" && (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "idpedido" && (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "numfacven" && (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "nremision" && (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "credito" && (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "fechavenc" && (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off"))
    {
        $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
    {
        $colspan++;
    }
   }
   if ($colspan > 0)
   {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridSubtotalFont . "\"  style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
       $nm_saida->saida("    </TR>\r\n");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$this->NM_emb_tree_no)
   {
       $this->NM_tbody_open = false;
       $nm_saida->saida("    </TBODY>");
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid'] && $this->nm_prim_linha)
   { 
       $nm_saida->saida("##NM@@"); 
       $this->nm_prim_linha = false; 
    } 
 } 
 function quebra_geral_prefijo_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_prefijo_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_prefijo(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      = $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
   $tit_lin_sumariza_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "numero2" && (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "facturado" && (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idcli" && (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cambiar_cliente" && (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechaven" && (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "vendedor" && (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "imprimir" && (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pos" && (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cobrar" && (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado_en_movil" && (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "disponible_en_movil" && (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpedido" && (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numfacven" && (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nremision" && (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "credito" && (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechavenc" && (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
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
 function quebra_geral_vendedor_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
        $nm_saida->saida("<td class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . "; height: 10px;\">&nbsp;</td>\r\n");
   }
    $nm_saida->saida("<td class=\"" . $this->css_scGridTotal . "\" style=\"height: 10px;\" colspan=\"" . $this->NM_colspan . "\">&nbsp;</td>\r\n");
    $nm_saida->saida("</tr>\r\n");
 }
 function quebra_geral_vendedor_bot() 
 {
   global 
          $nm_saida, $nm_data; 
   $this->Tot->quebra_geral_vendedor(); 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      = $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
   $tit_lin_sumariza_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "numero2" && (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "facturado" && (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idcli" && (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cambiar_cliente" && (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechaven" && (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "vendedor" && (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "imprimir" && (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pos" && (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cobrar" && (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado_en_movil" && (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "disponible_en_movil" && (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpedido" && (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numfacven" && (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nremision" && (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "credito" && (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechavenc" && (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
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
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
   $this->NM_calc_span();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
    $nm_saida->saida("<tr>\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['rows_emb']++;
   $nm_nivel_book_pdf = "";
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" && !$this->Print_All)
   {
      $nm_nivel_book_pdf = "<div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" .  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0] . "</H1></div>";
   }
   $tit_lin_sumariza      = $nm_nivel_book_pdf . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
   $tit_lin_sumariza_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][0];
       $nm_saida->saida("    <TR class=\"" . $this->css_scGridTotal . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_grid']) {
       $nm_saida->saida("    <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra  . "; display:" . $this->width_tabula_display . ";\">&nbsp;</TD>\r\n");
   }
   $tit_lin_sumariza_atu = $tit_lin_sumariza;
   $colspan  = 1;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] || $this->NM_btn_run_show)
   {
       $colspan++;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] == "print" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_pdf'] == "pdf")
   {
       $colspan--;
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['field_order'] as $Cada_cmp)
   {
    if ($Cada_cmp == "numero2" && (!isset($this->NM_cmp_hidden['numero2']) || $this->NM_cmp_hidden['numero2'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "asentada" && (!isset($this->NM_cmp_hidden['asentada']) || $this->NM_cmp_hidden['asentada'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "facturado" && (!isset($this->NM_cmp_hidden['facturado']) || $this->NM_cmp_hidden['facturado'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idcli" && (!isset($this->NM_cmp_hidden['idcli']) || $this->NM_cmp_hidden['idcli'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cambiar_cliente" && (!isset($this->NM_cmp_hidden['cambiar_cliente']) || $this->NM_cmp_hidden['cambiar_cliente'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechaven" && (!isset($this->NM_cmp_hidden['fechaven']) || $this->NM_cmp_hidden['fechaven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "total" && (!isset($this->NM_cmp_hidden['total']) || $this->NM_cmp_hidden['total'] != "off"))
    {
      if ($colspan > 0)
      {
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . "\" style=\"text-align: left;\"  " . "colspan=\"" . $colspan . "\"" . ">" . $tit_lin_sumariza_atu . "</TD>\r\n");
          $tit_lin_sumariza_atu = "&nbsp;";
          $colspan = 0;
      }
      $conteudo =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['tot_geral'][2] ; 
      nmgp_Form_Num_Val($conteudo, $_SESSION['scriptcase']['reg_conf']['grup_val'], $_SESSION['scriptcase']['reg_conf']['dec_val'], "2", "S", "2", $_SESSION['scriptcase']['reg_conf']['monet_simb'], "V:" . $_SESSION['scriptcase']['reg_conf']['monet_f_pos'] . ":" . $_SESSION['scriptcase']['reg_conf']['monet_f_neg'], $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit']) ; 
       $nm_saida->saida("     <TD class=\"" . $this->css_scGridTotalFont . " css_total_tot_ger\"  NOWRAP >" . $conteudo . "</TD>\r\n");
     }
    if ($Cada_cmp == "vendedor" && (!isset($this->NM_cmp_hidden['vendedor']) || $this->NM_cmp_hidden['vendedor'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "imprimir" && (!isset($this->NM_cmp_hidden['imprimir']) || $this->NM_cmp_hidden['imprimir'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "pos" && (!isset($this->NM_cmp_hidden['pos']) || $this->NM_cmp_hidden['pos'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "cobrar" && (!isset($this->NM_cmp_hidden['cobrar']) || $this->NM_cmp_hidden['cobrar'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "creado_en_movil" && (!isset($this->NM_cmp_hidden['creado_en_movil']) || $this->NM_cmp_hidden['creado_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "disponible_en_movil" && (!isset($this->NM_cmp_hidden['disponible_en_movil']) || $this->NM_cmp_hidden['disponible_en_movil'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "idpedido" && (!isset($this->NM_cmp_hidden['idpedido']) || $this->NM_cmp_hidden['idpedido'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "numfacven" && (!isset($this->NM_cmp_hidden['numfacven']) || $this->NM_cmp_hidden['numfacven'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "nremision" && (!isset($this->NM_cmp_hidden['nremision']) || $this->NM_cmp_hidden['nremision'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "credito" && (!isset($this->NM_cmp_hidden['credito']) || $this->NM_cmp_hidden['credito'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "fechavenc" && (!isset($this->NM_cmp_hidden['fechavenc']) || $this->NM_cmp_hidden['fechavenc'] != "off"))
    {
       $colspan++;
    }
    if ($Cada_cmp == "observaciones" && (!isset($this->NM_cmp_hidden['observaciones']) || $this->NM_cmp_hidden['observaciones'] != "off"))
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "Herramientas", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "Herramientas", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['reneraracaja'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['reneraracaja'][] = "sc_reneraracaja_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_reneraracaja_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "reneraracaja", "sc_btn_reneraracaja();", "sc_btn_reneraracaja();", "sc_reneraracaja_top", "", "Regenerar a Caja", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['regenerarainventario'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['regenerarainventario'][] = "sc_regenerarainventario_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_regenerarainventario_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "regenerarainventario", "sc_btn_regenerarainventario();", "sc_btn_regenerarainventario();", "sc_regenerarainventario_top", "", "Regenerar a inventario", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_pedidos&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['Vender'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['Vender'][] = "sc_Vender_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "Vender", "sc_btn_Vender();", "sc_btn_Vender();", "sc_Vender_top", "", "Venta Rápida", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
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
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_pedido"]) && $this->Ini->sc_lig_md5["form_pedido"] == "S") {
               $Parms_Lig  = "idpedido*scin" . str_replace('"', "@aspasd@", $this->idpedido) . "*scoutSC_glo_par_gidtercero*scingidtercero*scoutNM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "idpedido*scin" . str_replace('"', "@aspasd@", $this->idpedido) . "*scoutSC_glo_par_gidtercero*scingidtercero*scoutNM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_pedido . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_pedido'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_pedido . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_pedido'); return false;;", "sc_b_new_top", "", "Nuevo Documento", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
          }
        }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_pedidos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_pedidos_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'];
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
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 200) ? " selected" : "";
              $nm_saida->saida("           <option value=\"200\" " . $obj_sel . ">200</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 300) ? " selected" : "";
              $nm_saida->saida("           <option value=\"300\" " . $obj_sel . ">300</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 1000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"1000\" " . $obj_sel . ">1000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'];
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if (is_file("grid_pedidos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_pedidos_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
      {
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['qsearch'] == "on")
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var change_fast_top = \"\";</script>\r\n");
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2] : "";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
      if ($this->nmgp_botoes['group_2'] == "on" && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">var sc_itens_btgp_group_2_top = false;</script>\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_top')", "scBtnGrpShow('group_2_top')", "sc_btgp_btn_group_2_top", "", "Herramientas", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "Herramientas", "", "", "__sc_grp__", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("           $Cod_Btn\r\n");
          $NM_btn  = true;
          $NM_Gbtn = false;
          $Cod_Btn = nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 'top', 'list', 'ini');
          $nm_saida->saida("           $Cod_Btn\r\n");
      if ($this->nmgp_botoes['sel_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_selcmp_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $path_fields = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/fields/";
              $this->nm_btn_exist['sel_col'][] = "selcmp_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcolumns", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnSelCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&path_fields=" . $path_fields . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "selcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['sort_col'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsort", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnOrderCamposShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_order_campos.php?path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&use_alias=" . $UseAlias . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "ordcmp_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['groupby'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sel_groupby_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Q_free  = false;
          $Q_count = 0;
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_All_Groupby'] as $QB => $Tp)
          {
              if (!in_array($QB, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Groupby_hide']))
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
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bgroupby", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "scBtnGroupByShow('" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_sel_groupby.php?opc_ret=igual&path_img=" . $this->Ini->path_img_global . "&path_btn=" . $this->Ini->path_botoes . "&script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&embbed_groupby=Y&toolbar_pos=top', 'top');", "sel_groupby_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['reneraracaja'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['reneraracaja'][] = "sc_reneraracaja_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_reneraracaja_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "reneraracaja", "sc_btn_reneraracaja();", "sc_btn_reneraracaja();", "sc_reneraracaja_top", "", "Regenerar a Caja", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
          $NM_Gbtn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['regenerarainventario'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['regenerarainventario'][] = "sc_regenerarainventario_top";
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_2_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_sc_regenerarainventario_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "regenerarainventario", "sc_btn_regenerarainventario();", "sc_btn_regenerarainventario();", "sc_regenerarainventario_top", "", "Regenerar a inventario", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "group_2", "only_text", "text_right", "", "", "", "", "", "", "");
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
      if ($this->nmgp_botoes['pdf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
      $Tem_gb_pdf  = "s";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "_NM_SC_")
      {
          $Tem_gb_pdf = "n";
      }
      $Tem_pdf_res = "n";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
      {
          $Tem_pdf_res = "s";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
      {
          $Tem_pdf_res = "n";
      }
              $this->nm_btn_exist['pdf'][] = "pdf_top";
          $nm_saida->saida("            <div id=\"div_pdf_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpdf", "", "", "pdf_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_pdf.php?nm_opc=pdf&nm_target=0&nm_cor=cor&papel=1&lpapel=0&apapel=0&orientacao=1&bookmarks=1&largura=1200&conf_larg=S&conf_fonte=10&grafico=S&sc_ver_93=" . s . "&nm_tem_gb=" . $Tem_gb_pdf . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_pdf_res=grid,resume&nm_all_modules=grid,resume,chart&nm_label_group=S&nm_all_cab=N&nm_all_label=N&nm_orient_grid=2&password=n&summary_export_columns=N&pdf_zip=N&origem=cons&language=es&conf_socor=S&script_case_init=" . $this->Ini->sc_page . "&app_name=grid_pedidos&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
          if ($NM_Gbtn)
          {
                  $nm_saida->saida("           </td></tr><tr><td class=\"scBtnGrpBackground\">\r\n");
              $NM_Gbtn = false;
          }
      if ($this->nmgp_botoes['word'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_word_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_word_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
          {
              $Tem_word_res = "n";
          }
          $nm_saida->saida("            <div id=\"div_word_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['word'][] = "word_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bword", "", "", "word_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_word.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_cor=AM&nm_res_cons=" . $Tem_word_res . "&nm_ini_word_res=grid&nm_all_modules=grid,resume,chart&password=n&origem=cons&language=es&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
          $nm_saida->saida("            </div>\r\n");
              $NM_Gbtn = true;
      }
      if ($this->nmgp_botoes['xls'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xls_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xls_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['xml'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_xml_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_xml_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['csv'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $Tem_csv_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_csv_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
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
      if ($this->nmgp_botoes['rtf'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
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
      if ($this->nmgp_botoes['print'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
      {
          $Tem_pdf_res = "n";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
          {
              $Tem_pdf_res = "s";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Gb_Free_cmp']))
          {
              $Tem_pdf_res = "n";
          }
          $nm_saida->saida("           <script type=\"text/javascript\">sc_itens_btgp_group_1_top = true;</script>\r\n");
          $nm_saida->saida("            <div id=\"div_print_top\" class=\"scBtnGrpText scBtnGrpClick\">\r\n");
              $this->nm_btn_exist['print'][] = "print_top";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bprint", "", "", "print_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "thickbox", "" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_config_print.php?script_case_init=" . $this->Ini->sc_page . "&summary_export_columns=N&nm_opc=PC&nm_cor=PB&password=n&language=es&nm_page=" . NM_encode_input($this->Ini->sc_page) . "&nm_res_cons=" . $Tem_pdf_res . "&nm_ini_prt_res=grid&nm_all_modules=grid,resume,chart&origem=cons&KeepThis=true&TB_iframe=true&modal=true", "group_1", "only_text", "text_right", "", "", "", "", "", "", "");
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
              $NM_ult_sep = "NM_sep_3";
              $nm_saida->saida("          <img id=\"NM_sep_3\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['filter'] == "on"  && !$this->grid_emb_form)
      {
           $this->nm_btn_exist['filter'][] = "pesq_top";
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bpesquisa", "nm_gp_move('busca', '0', 'grid');", "nm_gp_move('busca', '0', 'grid');", "pesq_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $nm_saida->saida("           $Cod_Btn \r\n");
           $NM_btn = true;
      }
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['Vender'] == "on" && !$this->grid_emb_form) 
      { 
          $this->nm_btn_exist['Vender'][] = "sc_Vender_top";
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "Vender", "sc_btn_Vender();", "sc_btn_Vender();", "sc_Vender_top", "", "Venta Rápida", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          if ($this->nmgp_botoes['reload'] == "on")
          {
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "breload", "nm_gp_submit_ajax ('igual', 'breload');", "nm_gp_submit_ajax ('igual', 'breload');", "reload_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
      if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_grid))
      {
          if ($NM_btn)
          {
              $NM_btn = false;
              $NM_ult_sep = "NM_sep_4";
              $nm_saida->saida("          <img id=\"NM_sep_4\" class=\"NM_toolbar_sep\" src=\"" . $this->Ini->path_img_global . $this->Ini->Img_sep_grid . "\" align=\"absmiddle\" style=\"vertical-align: middle;\">\r\n");
          }
      }
        if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['new'] == "on" && $this->nmgp_botoes['insert'] == "on" && !$this->grid_emb_form)
        {
           $Sc_parent = ($this->grid_emb_form_full) ? "S" : "";
           if (isset($this->Ini->sc_lig_md5["form_pedido"]) && $this->Ini->sc_lig_md5["form_pedido"] == "S") {
               $Parms_Lig  = "idpedido*scin" . str_replace('"', "@aspasd@", $this->idpedido) . "*scoutSC_glo_par_gidtercero*scingidtercero*scoutNM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
               $Md5_Lig    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($Parms_Lig);
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
           } else {
               $Md5_Lig  = "idpedido*scin" . str_replace('"', "@aspasd@", $this->idpedido) . "*scoutSC_glo_par_gidtercero*scingidtercero*scoutNM_cancel_insert_new*scin1*scoutNM_cancel_return_new*scin1*scoutnmgp_opcao*scinnovo*scoutNM_btn_insert*scinS*scoutNM_btn_new*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
           }
         $this->nm_btn_exist['new'][] = "sc_b_new_top";
         $Cod_Btn = nmButtonOutput($this->arr_buttons, "bnovo", "nm_gp_submit1('" .  $this->Ini->link_form_pedido . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_pedido'); return false;;", "nm_gp_submit1('" .  $this->Ini->link_form_pedido . "', '$this->nm_location', '$Md5_Lig', '_self', 'form_pedido'); return false;;", "sc_b_new_top", "", "Nuevo Documento", "", "absmiddle", "N", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         $nm_saida->saida("           $Cod_Btn \r\n");
         $NM_btn = true;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['SC_Ind_Groupby'] != "_NM_SC_")
        {
          if ($this->nmgp_botoes['summary'] == "on" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'] && empty($this->nm_grid_sem_reg) && !$this->grid_emb_form)
          {
              $this->nm_btn_exist['summary'][] = "res_top";
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) {
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              else { 
                  $Cod_Btn = nmButtonOutput($this->arr_buttons, "bresumo", "nm_gp_move('resumo', '0');", "nm_gp_move('resumo', '0');", "res_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              } 
              $nm_saida->saida("           $Cod_Btn \r\n");
                  $NM_btn = true;
          }
        }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
          if (is_file("grid_pedidos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_pedidos_help.txt"); 
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['b_sair'] || $this->grid_emb_form || $this->grid_emb_form_full || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']))
      {
         $this->nmgp_botoes['exit'] = "off"; 
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_psq'])
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
      { 
          $_SESSION['scriptcase']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print") 
      {
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['goto'] == "on" && $this->Ini->Apl_paginacao != "FULL" )
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'];
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
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 10) ? " selected" : "";
              $nm_saida->saida("           <option value=\"10\" " . $obj_sel . ">10</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 20) ? " selected" : "";
              $nm_saida->saida("           <option value=\"20\" " . $obj_sel . ">20</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 50) ? " selected" : "";
              $nm_saida->saida("           <option value=\"50\" " . $obj_sel . ">50</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 100) ? " selected" : "";
              $nm_saida->saida("           <option value=\"100\" " . $obj_sel . ">100</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 200) ? " selected" : "";
              $nm_saida->saida("           <option value=\"200\" " . $obj_sel . ">200</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 300) ? " selected" : "";
              $nm_saida->saida("           <option value=\"300\" " . $obj_sel . ">300</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 500) ? " selected" : "";
              $nm_saida->saida("           <option value=\"500\" " . $obj_sel . ">500</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == 1000) ? " selected" : "";
              $nm_saida->saida("           <option value=\"1000\" " . $obj_sel . ">1000</option>\r\n");
              $obj_sel = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] == all) ? " selected" : "";
              $nm_saida->saida("           <option value=\"all\" " . $obj_sel . ">all</option>\r\n");
              $nm_saida->saida("          </select>\r\n");
              $NM_btn = true;
          }
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
          if ($this->nmgp_botoes['first'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if ($this->nmgp_botoes['back'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if (empty($this->nm_grid_sem_reg) && $this->nmgp_botoes['navpage'] == "on" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']) && $this->Ini->Apl_paginacao != "FULL" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'] != "all")
          {
              $Reg_Page  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['qt_lin_grid'];
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
          if ($this->nmgp_botoes['forward'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
          {
              $this->nm_btn_exist['forward'][] = "forward_bot";
              $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_avanca", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "nm_gp_submit_rec('" . $this->Rec_fim . "');", "forward_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
              $nm_saida->saida("           $Cod_Btn \r\n");
              $NM_btn = true;
          }
          if ($this->nmgp_botoes['last'] == "on" && empty($this->nm_grid_sem_reg) && $this->Ini->Apl_paginacao != "FULL" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']))
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
          if (is_file("grid_pedidos_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_pedidos_help.txt"); 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ]) &&
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond" ]) &&
                !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ]) &&
                (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'qp' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'eq' ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'ii'
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field . "_cond"] == 'ii')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ], substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ]))) == 0)
                    {
                        $str_value = $str_html_ini. substr($str_value, 0, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ])) .$str_html_fim . substr($str_value, strlen($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campos_busca'][ $field ]));
                    }
                }
            }
        }
        elseif($filter_type == 'quicksearch')
        {
            if(
                isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0]) &&
                (
                    (
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0] == 'SC_all_Cmp' &&
                    in_array($field, array('prefijo_ped', 'numpedido', 'idcli', 'observaciones', 'vendedor'))
                    ) ||
                    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0] == $field ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0], $field . '_VLS_') !== false ||
                    strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][0], '_VLS_' . $field) !== false
                )
            )
            {
                if($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][1] == 'qp')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2], $str_value_original) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    else
                    {
                        $keywords = preg_quote($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2], '/');
                        $str_value = preg_replace('/'. $keywords .'/i', $str_html_ini . '$0' . $str_html_fim, $str_value);
                    }
                }
                elseif($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][1] == 'eq')
                {
                    if(strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2], $str_value) == 0)
                    {
                        $str_value = $str_html_ini. $str_value .$str_html_fim;
                    }
                    elseif(!empty($str_value_original) && $str_value_original != '&nbsp;' && strcasecmp($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['fast_search'][2], $str_value_original) == 0)
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label'] = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_sql']   = array();
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search'] = array();
       }
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven'] = (isset($this->New_label['fechaven'])) ? $this->New_label['fechaven'] : 'Fecha';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_sql']['fechaven']   = "fechaven";
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada'] = (isset($this->New_label['asentada'])) ? $this->New_label['asentada'] : 'Asentado';
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_sql']['asentada']   = "asentada";
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
       $nm_saida->saida("        <div id='id_div_interativ_search_content' class='scGridRefinedSearchMoldura' style='min-width:160px;max-width:160px;overflow-x:hidden;'>\r\n");
       $nm_saida->saida("            <div id='id_div_interativ_search_fields'>\r\n");
       $lin_obj = $this->interativ_search_fechaven($bol_refin_use_modal);
       $nm_saida->saida("" . $lin_obj . "\r\n");
       $lin_obj = $this->interativ_search_asentada($bol_refin_use_modal);
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
       $array_fields[] = "fechaven";
       $array_fields[] = "asentada";
       if(is_array($array_fields) && !empty($array_fields))
       {
           $str_out = "";
           foreach($array_fields as $str_field)
           {
               $method = "interativ_search_" . $str_field;
               $str_out .= $this->$method($bol_refin_use_modal);
           }
           $this->Ini->Arr_result['setValue'][] = array('field' => 'id_div_interativ_search_fields', 'value' => NM_charset_to_utf8($str_out));
       }
   }
   function interativ_search_fechaven($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']["fechaven"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']["fechaven"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_fechaven\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('fechaven')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_fechaven\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_fechaven\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_fechaven\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','fechaven', '', 'fechaven', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idpedido','numfacven','nremision','credito','fechaven','fechavenc','idcli','subtotal','valoriva','total','asentada','observaciones','saldo','adicional','formapago','adicional2','adicional3','obspago','vendedor','numpedido','prefijo_ped','tipo_doc','fechadocu','creado','creado_inicio','creado_fin','creado_en_movil','disponible_en_movil','numero2');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "fechaven")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select fechaven, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'], $cada_cmp_apl) !== false)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY fechaven". $Cmps_where;
       $nm_comando .= " order by fechaven DESC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['fechaven'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_fechaven_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_fechaven' class='multiplefechaven' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('fechaven', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('fechaven', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = (int)10;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados']['fechaven'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $conteudo_x =  $formatado;
           nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
           if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
           { 
               $this->nm_data->SetaData($formatado, "YYYY-MM-DD  ");
               $formatado = $this->nm_data->FormataSaida("d/m/y");
           } 
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados']['fechaven'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_fechaven' style='display:none'>";
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
           $lin_obj  .= "   <span class='simplefechaven' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['fechaven']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven']) . "','fechaven','id_int_search_fechaven','fechaven', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven']) . "','fechaven','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'fechaven', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multiplefechaven' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['fechaven']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['fechaven']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_fechaven_" . md5($dados) . "\" name=\"int_search_fechaven[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_fechaven_". md5($dados) ."\" for=\"id_int_search_fechaven_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
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
           $lin_obj  .= "   <div id='id_see_more_fechaven' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_pedidos_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=fechaven&tp_obj=dt&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('fechaven');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_fechaven' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('fechaven');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "    nm_expand_int_search('fechaven');";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_fechaven\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('fechaven', false);", "nm_mult_int_search('fechaven', false);", "mult_int_search_fechaven", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven']) . "','fechaven','id_int_search_fechaven','fechaven', '', 'N');", "nm_proc_int_search('chbx', 'dt','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['fechaven']) . "','fechaven','id_int_search_fechaven','fechaven', '', 'N');", "app_int_search_fechaven", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('fechaven');", "nm_single_int_search('fechaven');", "single_int_search_fechaven", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $lin_obj .= "    </div>";
       }
       $lin_obj .= "    </td>";
       $lin_obj .= "    </tr>";
       $lin_obj .= "    </table>";
       $lin_obj .= "    </div>";
       return $lin_obj;
   }
   function interativ_search_asentada($bol_refin_use_modal)
   {
       $cle_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']["asentada"])) ? "" : "none";
       $exp_disp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']["asentada"])) ? "none" : "";
       $displ_open= false;
       $lin_obj  = "    <div id=\"div_int_asentada\">";
       $lin_obj .= "    <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "     <tr>";
       $lin_obj .= "      <td nowrap class='scGridRefinedSearchLabel' onclick=\"nm_toggle_int_search('asentada')\">";
       $lin_obj .= "        <table width='100%' cellspacing=0 cellpadding=0>";
       $lin_obj .= "         <tr>";
       $lin_obj .= "          <td nowrap>";
       $lin_obj .= "              <span id=\"id_expand_asentada\" style=\"display: " .  $exp_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer; padding:0px 2px 0px 0px;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_show . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span id=\"id_retract_asentada\" style=\"display: none;\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_hide . "\" BORDER=\"0\" />   </span>";
       $lin_obj .= "              <span class=\"dn-expand-button\" style=\"cursor: pointer;\">";
       $lin_obj .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada'];
       $lin_obj .= "              </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "          <td align='right'>";
       $lin_obj .= "              <span id=\"id_clear_asentada\" style=\"display: " .  $cle_disp . ";\">&nbsp;&nbsp;<IMG align='absmiddle' style=\"cursor: pointer;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_close . "\" BORDER=\"0\" onclick=\"event.stopPropagation(); nm_proc_int_search('clear','','','asentada', '', 'asentada', '', 'S')\"/>   </span>";
       $lin_obj .= "          </td>";
       $lin_obj .= "         </tr>";
       $lin_obj .= "        </table>";
       $lin_obj .= "     </td></tr>";
       $Cmps_where = "";
       $Cmps_apl = array('idpedido','numfacven','nremision','credito','fechaven','fechavenc','idcli','subtotal','valoriva','total','asentada','observaciones','saldo','adicional','formapago','adicional2','adicional3','obspago','vendedor','numpedido','prefijo_ped','tipo_doc','fechadocu','creado','creado_inicio','creado_fin','creado_en_movil','disponible_en_movil','numero2');
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'], $cada_cmp_apl) !== false)
           {
               $tmp_pos = strpos($cada_cmp_apl, ".");
               if ($tmp_pos !== false)
               {
                   $cada_cmp_apl = substr($cada_cmp_apl, ($tmp_pos + 1));
               }
               if ($cada_cmp_apl != "asentada")
               {
                   $Cmps_where .= "," . $cada_cmp_apl;
               }
           }
       }
       $nm_comando = "select asentada, COUNT(*) AS countTest" . $Cmps_where . " from (SELECT      idpedido,     numfacven,     nremision,     credito,     fechaven,     fechavenc,     idcli,     subtotal,     valoriva,     total,     asentada,     observaciones,     saldo,     adicional,     formapago,     adicional2,     adicional3,     obspago,     vendedor,      numpedido,     prefijo_ped,     tipo_doc,     DATE_FORMAT(fechadocu, \"%H:%I:%S\") as fechadocu,    fechadocu as creado,    fechadocu as creado_inicio,    fechadocu as creado_fin,    creado_en_movil,    disponible_en_movil,    concat((select r.prefijo from resdian r where r.Idres=p.prefijo_ped),'/',p.numpedido) as numero2 FROM      pedidos p WHERE     tipo_doc='PV' ) nm_sel_esp";
       $tmp_where = "";
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq']))
       {
           $tmp_where = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'];
       foreach ($Cmps_apl as $cada_cmp_apl)
       { 
           if (strpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_pesq'], $cada_cmp_apl) !== false)
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
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'])) 
       { 
           if (empty($tmp_where)) 
           { 
               $tmp_where = "where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo']; 
           } 
           else
           { 
               $tmp_where .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['where_resumo'] . ")"; 
           } 
       } 
       $nm_comando .= " " . $tmp_where;
       $nm_comando .= " GROUP BY asentada". $Cmps_where;
       $nm_comando .= " order by asentada ASC";
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
       $disp_link = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['asentada'])) ? "" : "none";
       $lin_obj  .= "   <tr><td><div class='scGridRefinedSearchMolduraResult' id=\"id_tab_asentada_link\" style=\"display: " . $disp_link . ";\">";
        $check_uncheck  = "
            <span id='id_check_asentada' class='multipleasentada' style='display:" . (($displ_open)?'':'none') . ";'>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox' checked='checked' onclick=\"refinedSearchCheckUncheckAll('asentada', true); this.checked=true;\" \>
                <input class='scAppDivToolbarInput' style='margin:0px' type='checkbox'                   onclick=\"refinedSearchCheckUncheckAll('asentada', false); this.checked=false;\" \>
            </span>";
       $qtd_see_more  = 0;
       $qtd_result_see_more  = 0;
       $bol_open_see_more  = false;
       if($bol_refin_use_modal)
       {
           $bol_populate_modal_values = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados']['asentada'])?false:true);
       }
       foreach ($result as $dados => $qtd_result)
       {
           $formatado = $dados;
           $this->Lookup->lookup_asentada($formatado);
           $formatado_exib  = $formatado;
           $dados = (string)$dados;
           if($bol_refin_use_modal && $bol_populate_modal_values)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_dados']['asentada'][$dados] = array('val'=>$formatado,'qtd'=>$qtd_result);
           }
           if($dados == '')
           {
               $formatado_exib = "" . $this->Ini->Nm_lang['lang_refine_search_empty'] . "";
           }
           $veja_mais_link  = '';
           $veja_mais_link  =sprintf($this->Ini->Nm_lang['lang_othr_refinedsearch_more_mask'], $qtd_result);
           if($qtd_see_more > 0 && $qtd_result_see_more >= $qtd_see_more && !$bol_open_see_more)
           {
               $lin_obj  .= "   <div id='id_see_more_list_asentada' style='display:none'>";
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
           $lin_obj  .= "   <span class='simpleasentada' style='display:" . (($displ_open)?'none':'') . ";'>";
           if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['asentada']))
           {
               $lin_obj  .= "        <IMG align='absmiddle' style=\"cursor: pointer; position:relative; opacity:0;\" SRC=\"" . $this->Ini->path_img_global . "/" . $this->Ini->refinedsearch_campo_close_icon . "\" BORDER=\"0\" onclick=\"nm_proc_int_search('clear_opc', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada']) . "','asentada','id_int_search_asentada','asentada', '" . NM_encode_input($dados . "##@@" . $formatado) . "', 'S');\"/>";
           }
           $lin_obj  .= "        <a href=\"javascript:nm_proc_int_search('link','nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada']) . "','asentada','" . NM_encode_input(NM_encode_input_js($dados . "##@@" . $formatado)) . "', 'asentada', '', 'N');\" class='scGridRefinedSearchCampoFont'>";
           $lin_obj  .= $formatado_exib;
           if(!empty($veja_mais_link))
           {
               $lin_obj  .= "            <span class='scGridRefinedSearchQuantidade'>" . $veja_mais_link . "</span>";
           }
           $lin_obj  .= "        </a>";
           $lin_obj  .= "    </span>";
           $lin_obj  .= "    <span class='multipleasentada' style='display:"  . (($displ_open)?'':'none') .  ";'>";
           $checked = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['asentada']['val_sel']) && in_array($dados, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['interativ_search']['asentada']['val_sel'])) ? " checked" : "";
           $checked = " checked";
           $lin_obj  .= "        <INPUT class='" . $this->css_scAppDivToolbarInput . "' style='margin:0px' type=\"checkbox\"  id=\"id_int_search_asentada_" . md5($dados) . "\" name=\"int_search_asentada[]\" value=\"" . NM_encode_input($dados . "##@@" . $formatado) . "\" $checked><span class='scGridRefinedSearchCampoFont'> <label for=\"id_int_search_asentada_". md5($dados) ."\" for=\"id_int_search_asentada_". md5($dados) ."\">" . $formatado_exib . "</label></span>";
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
           $lin_obj  .= "   <div id='id_see_more_asentada' class='scGridRefinedSearchVejaMais'>";
           $lin_obj  .= "       " . $check_uncheck;
           if($bol_refin_use_modal)
           {
               $lin_obj  .= "       <a href=\"javascript:tb_show('', 'grid_pedidos_refin_modal.php?sc_init=" . NM_encode_input($this->Ini->sc_page) . "&cmp_modal=asentada&tp_obj=nn&TB_iframe=true&modal=true&height=440&width=630', '');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           else
           {
               $lin_obj  .= "       <a style='display:" . (($displ_see_more)?'':'none') . ";'  href=\"javascript:toggleSeeMore('asentada');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_more'] ."</a>";
           }
           $lin_obj  .= "   </div>";
           $lin_obj  .= "   <div id='id_see_less_asentada' class='scGridRefinedSearchVejaMais' style='display:none;'>";
           $lin_obj  .= "   " . $check_uncheck;
           $lin_obj  .= "    <a href=\"javascript:toggleSeeMore('asentada');\" class='scGridRefinedSearchVejaMaisFont'>". $this->Ini->Nm_lang['lang_othr_refinedsearch_see_less'] ."</a>";
           $lin_obj  .= "   </div>";
      $lin_obj  .= "<SCRIPT>
";
      $lin_obj  .= "$( document ).ready(function() {";
      $lin_obj  .= "    nm_expand_int_search('asentada');";
      $lin_obj  .= "});";
      $lin_obj  .= "</SCRIPT>";
       $lin_obj  .= "   </div></td></tr>";
       {
           $lin_obj .= "    <tr class='toolbarFields'>";
           $lin_obj .= "    <td style='display:'>";
           $lin_obj .= "    <div class='scGridRefinedSearchToolbar' id=\"id_toolbar_asentada\" style='display:none'>";
           $disp_show_multi_btn = '';
           if (count($result) < 2)
           {
               $disp_show_multi_btn = 'none';
           }
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bmultiselect", "nm_mult_int_search('asentada', false);", "nm_mult_int_search('asentada', false);", "mult_int_search_asentada", "", "", "display: $disp_show_multi_btn;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "multiselect", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $disp_multi_btn = 'none';
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_apply", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada']) . "','asentada','id_int_search_asentada','asentada', '', 'N');", "nm_proc_int_search('chbx', 'nn','" . str_replace(array("'",'"'), array('__sasp__','__dasp__'), $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['int_search_label']['asentada']) . "','asentada','id_int_search_asentada','asentada', '', 'N');", "app_int_search_asentada", "", "", "display: $disp_multi_btn ;", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
           $lin_obj .= $Cod_Btn; 
           $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcons_cancel", "nm_single_int_search('asentada');", "nm_single_int_search('asentada');", "single_int_search_asentada", "", "", "display: none", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
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
       $nm_saida->saida("     if($( \"#id_slider_fechaven\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_fechaven').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_fechaven[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_fechaven').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','fechaven', '', 'fechaven', '', 'S');\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("         int_search_load_html = 'S';\r\n");
       $nm_saida->saida("     if($( \"#id_slider_asentada\").length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_range_asentada').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else if($( \"input[name='int_search_asentada[]']:checked\" ).length > 0)\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         $('#app_int_search_asentada').click();\r\n");
       $nm_saida->saida("     }\r\n");
       $nm_saida->saida("     else\r\n");
       $nm_saida->saida("     {\r\n");
       $nm_saida->saida("         nm_proc_int_search('clear','','','asentada', '', 'asentada', '', 'S');\r\n");
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
   $this->Graf  = new grid_pedidos_grafico();
   $this->Graf->Db     = $this->Db;
   $this->Graf->Erro   = $this->Erro;
   $this->Graf->Ini    = $this->Ini;
   $this->Graf->Lookup = $this->Lookup;
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pivot_charts']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['skip_charts']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['skip_charts']))
   {
       $this->Graf->monta_grafico('', 'pdf_lib');
       $prim_graf = true;
       $nm_saida->saida("<B><div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\">" . $this->Ini->Nm_lang['lang_btns_chrt_pdff_hint'] . "</H1></div></B>\r\n");
       $iChartCount = 1;
       $iChartTotal = sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pivot_charts']);
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
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
 { 
           $nm_saida->saida(" <style>\r\n");
            $nm_saida->saida("  table td, table tr{ page-break-inside: avoid !important; }\r\n");
           $nm_saida->saida(" </style>\r\n");
 } 
       $prim_graf = ($this->Ini->SC_module_export == "chart") ? true : false;
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['pivot_charts'] as $chart_index => $chart_data)
       {
           if (!$prim_graf)
           {
                   $nm_saida->saida("<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n");
           }
           $prim_graf = false;
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['proc_pdf_vert'])
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
               grid_pedidos_pdf_progress_call($this->progress_tot . "_#NM#_" . $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n", $this->Ini->Nm_lang, true);
               fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $sChartLang . " " . $iChartCount . "...\n");
               $iChartCount++;
               if (0 < $this->progress_res)
               {
                   $this->progress_now++;
               }
           }
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['this_chart_label'] = '';
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
           grid_pedidos_pdf_progress_call(100 . "_#NM#_" . 90 . "_#NM#_" . $lang_protect . "...\n", $this->Ini->Nm_lang);
           fwrite($this->progress_fp, 90 . "_#NM#_" . $lang_protect . "...\n");
           fclose($this->progress_fp);
       }
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['charts_html']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['charts_html'])
       {
            $nm_saida->saida("<script type=\"text/javascript\">\r\n");
            $nm_saida->saida("{$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['charts_html']}\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['chart_list']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['chart_list'] as $arr_chart)
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
   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0, $opc="")
   {
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $target = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
              echo "</SCRIPT>";
              return;
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
              echo "</SCRIPT>";
              exit;
          }
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $this->Ini->path_link . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
      if ($nm_target == "modal")
      {
          if (!empty($nm_apl_parms))
          {
              $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
              $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
              $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
          }
          $par_modal = "?script_case_init=" . NM_encode_input($this->Ini->sc_page) . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
           if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida_form_full']) || (isset($this->grid_emb_form_full) && $this->grid_emb_form_full))
           {
              $this->redir_modal = "$(function() { parent.tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
           else
           {
              $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['iframe_print'] )
      {
          $target = "_parent";
      }
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <HTML>
      <HEAD>
      <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0," />
<?php
}
?>
       <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
       <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
       <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
       <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
       <META http-equiv="Pragma" content="no-cache"/>
      </HEAD>
      <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
      <BODY>
   <?php
      }
   ?>
   <form name="Fredir" method="post" 
                     target="_self"> 
     <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($target == "_blank")
   {
?>
       <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
     <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
     <input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page) ?>"/> 
<?php
   }
?>
   </form> 
      <SCRIPT type="text/javascript">
          window.onload = function(){
             submit_Fredir();
          };
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $target ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
      </SCRIPT>
   <?php
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
      </BODY>
      </HTML>
   <?php
      }
      if ($target != "_blank")
      {
          exit;
      }
   }
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
   { 
        return;
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" &&
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "print" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao_print'] != "print" && !$this->Print_All) 
   { 
      $nm_saida->saida("     <tr><td colspan=3  class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\"> \r\n");
      $nm_saida->saida("     <iframe class=\"css_iframes\" id=\"nmsc_iframe_liga_B_grid_pedidos\" marginWidth=\"0px\" marginHeight=\"0px\" frameborder=\"0\" valign=\"top\" height=\"0px\" width=\"0px\" name=\"nm_iframe_liga_B_grid_pedidos\" scrolling=\"auto\" src=\"NM_Blank_Page.htm\"></iframe>\r\n");
      $nm_saida->saida("     </td></tr> \r\n");
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['embutida'])
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
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !$_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && $_SESSION['scriptcase']['proc_mobile'])
   { 
       $nm_saida->saida("   document.getElementById('first_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'first_bot', 'value' => "true");
       }
       $nm_saida->saida("   document.getElementById('back_bot').disabled = true;\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setDisabled'][] = array('field' => 'back_bot', 'value' => "true");
       }
   } 
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   if (typeof(scSetFixedHeaders) === typeof(function(){})) scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']) && !$_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['opc_liga']['nav']) && $_SESSION['scriptcase']['proc_mobile'])
       { 
           { 
               $nm_saida->saida("   document.getElementById('forward_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('forward_bot').className = \"scButton_" . $this->arr_buttons['bcons_avanca']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
               {
                   $this->Ini->Arr_result['setDisabled'][] = array('field' => 'forward_bot', 'value' => "true");
                   $this->Ini->Arr_result['setClass'][] = array('field' => 'forward_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_avanca']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_avanca']['display'] == 'only_img' || $this->arr_buttons['bcons_avanca']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_forward_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_forward_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_avanca']['image']);
                   }
               } 
           } 
           { 
               $nm_saida->saida("   document.getElementById('last_bot').disabled = true;\r\n");
               $nm_saida->saida("   document.getElementById('last_bot').className = \"scButton_" . $this->arr_buttons['bcons_final']['style'] . " disabled\";\r\n");
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
               {
                  $this->Ini->Arr_result['setDisabled'][] = array('field' => 'last_bot', 'value' => "true");
                  $this->Ini->Arr_result['setClass'][] = array('field' => 'last_bot', 'value' => "scButton_" . $this->arr_buttons['bcons_final']['style'] . ' disabled');
               }
               if ($this->arr_buttons['bcons_final']['display'] == 'only_img' || $this->arr_buttons['bcons_final']['display'] == 'text_img')
               { 
                   $nm_saida->saida("   document.getElementById('id_img_last_bot').src = \"" . $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image'] . "\";\r\n");
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
                   {
                       $this->Ini->Arr_result['setSrc'][] = array('field' => 'id_img_last_bot', 'value' => $this->Ini->path_botoes . "/" . $this->arr_buttons['bcons_final']['image']);
                   }
               } 
           } 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_pedidos', $(document).innerHeight())\",50);\r\n");
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
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_pedidos\"/>\r\n");
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
   $nm_saida->saida("                     action=\"grid_pedidos_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"Fprint\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_pedidos_iframe_prt.php\" \r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_cor_word=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("           document.Fdoc_word.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fdoc_word.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fdoc_word.action = \"grid_pedidos_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("   function sc_btn_reneraracaja()\r\n");
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
   $nm_saida->saida("       scJs_confirm('¿Desea regenerar registros a caja?', sc_btn_reneraracaja_ok, sc_btn_reneraracaja_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_reneraracaja_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"reneraracaja\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_reneraracaja_cancel()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       return;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var Crtl_btn_Vender = false;\r\n");
   $nm_saida->saida("   function sc_btn_Vender()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_Vender) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_Vender = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"Vender\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var vls_check = \"\";\r\n");
   $nm_saida->saida("   function sc_btn_regenerarainventario()\r\n");
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
   $nm_saida->saida("       scJs_confirm('¿Desea regenerar las ventas a inventario?', sc_btn_regenerarainventario_ok, sc_btn_regenerarainventario_cancel)\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_regenerarainventario_ok()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.FBtn_Run.nm_call_php.value = \"regenerarainventario\";\r\n");
   $nm_saida->saida("       document.FBtn_Run.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_regenerarainventario_cancel()\r\n");
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['ajax_nav'])
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
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'])) {
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
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'])) {
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
   if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) || (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['dashboard_info']['under_dashboard'])) {
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
   $nm_saida->saida("          par_modal = '?&nmgp_outra_jan=true&nmgp_url_saida=modal&SC_lig_apl_orig=grid_pedidos';\r\n");
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
   $nm_saida->saida("      if (pos == \"A\") {obj = document.getElementById('nmsc_iframe_liga_A_grid_pedidos');} \r\n");
   $nm_saida->saida("      if (pos == \"B\") {obj = document.getElementById('nmsc_iframe_liga_B_grid_pedidos');} \r\n");
   $nm_saida->saida("      if (pos == \"E\") {obj = document.getElementById('nmsc_iframe_liga_E_grid_pedidos');} \r\n");
   $nm_saida->saida("      if (pos == \"D\") {obj = document.getElementById('nmsc_iframe_liga_D_grid_pedidos');} \r\n");
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['grid_pedidos_iframe_params'] = array(
       'str_tmp'          => $this->Ini->path_imag_temp,
       'str_prod'         => $this->Ini->path_prod,
       'str_btn'          => $this->Ini->Str_btn_css,
       'str_lang'         => $this->Ini->str_lang,
       'str_schema'       => $this->Ini->str_schema_all,
       'str_google_fonts' => $this->Ini->str_google_fonts,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?script_case_init?#?" . $this->Ini->sc_page . "?@?jspath?#?" . $this->Ini->path_js . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_pedidos@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if (\"S\" == ajax)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               $('#TB_window').remove();\r\n");
   $nm_saida->saida("               $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=pdf&sAdd=__E__nmgp_tipo_pdf=\" + z + \"__E__sc_parms_pdf=\" + p + \"__E__sc_create_charts=\" + crt + \"__E__sc_graf_pdf=\" + g + \"__E__chart_level=\" + chart_level + \"__E__page_break_pdf=\" + page_break_pdf + \"__E__SC_module_export=\" + SC_module_export + \"__E__use_pass_pdf=\" + use_pass_pdf + \"__E__pdf_all_cab=\" + pdf_all_cab + \"__E__pdf_all_label=\" +  pdf_all_label + \"__E__pdf_label_group=\" +  pdf_label_group + \"__E__pdf_zip=\" +  pdf_zip + \"&nm_opc=pdf&KeepThis=true&TB_iframe=true&modal=true\", '');\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           else\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               window.location = \"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g + '&chart_level=' + chart_level + '&page_break_pdf=' + page_break_pdf + '&SC_module_export=' + SC_module_export + '&use_pass_pdf=' + use_pass_pdf + '&pdf_all_cab=' + pdf_all_cab + '&pdf_all_label=' +  pdf_all_label + '&pdf_label_group=' +  pdf_label_group + '&pdf_zip=' +  pdf_zip;\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\"+ str_type +\"&sAdd=__E__nmgp_tipo_print=\" + tp + \"__E__cor_print=\" + cor + \"__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("               document.Fprint.action = \"grid_pedidos_export_ctrl.php\";\r\n");
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
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__SC_module_export=\" + SC_module_export + \"__E__nmgp_tp_xls=\" + tp_xls + \"__E__nmgp_tot_xls=\" + tot_xls + \"__E__nmgp_password=\" + password + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value = \"xls\";\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tp_xls.value = tp_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_tot_xls.value = tot_xls;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_pedidos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_csv_conf(delim_line, delim_col, delim_dados, label_csv, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_delim_line=\" + delim_line + \"__E__nm_delim_col=\" + delim_col + \"__E__nm_delim_dados=\" + delim_dados + \"__E__nm_label_csv=\" + label_csv + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
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
   $nm_saida->saida("           document.Fexport.action = \"grid_pedidos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_xml_conf(xml_tag, xml_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_xml_tag=\" + xml_tag + \"__E__nm_xml_label=\" + xml_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value   = \"xml\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_tag.value   = xml_tag;\r\n");
   $nm_saida->saida("           document.Fexport.nm_xml_label.value = xml_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_pedidos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_json_conf(json_format, json_label, SC_module_export, password, ajax, str_type, bol_param)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (\"S\" == ajax)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           $('#TB_window').remove();\r\n");
   $nm_saida->saida("           $('body').append(\"<div id='TB_window'></div>\");\r\n");
   $nm_saida->saida("               nm_submit_modal(\"" . $this->Ini->path_link . "grid_pedidos/grid_pedidos_export_email.php?script_case_init={$this->Ini->sc_page}&path_img={$this->Ini->path_img_global}&path_btn={$this->Ini->path_botoes}&sType=\" + str_type +\"&sAdd=__E__nm_json_format=\" + json_format + \"__E__nm_json_label=\" + json_label + \"&KeepThis=true&TB_iframe=true&modal=true\", bol_param);\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_opcao.value       = \"json\";\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_format.value   = json_format;\r\n");
   $nm_saida->saida("           document.Fexport.nm_json_label.value    = json_label;\r\n");
   $nm_saida->saida("           document.Fexport.nmgp_password.value    = password;\r\n");
   $nm_saida->saida("           document.Fexport.SC_module_export.value = SC_module_export;\r\n");
   $nm_saida->saida("           document.Fexport.action = \"grid_pedidos_export_ctrl.php\";\r\n");
   $nm_saida->saida("           document.Fexport.submit() ;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_gp_rtf_conf()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fexport.nmgp_opcao.value   = \"rtf\";\r\n");
   $nm_saida->saida("       document.Fexport.action = \"grid_pedidos_export_ctrl.php\";\r\n");
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
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$script_case_init]['grid_pedidos']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form  = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Form1 = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("           var Obj_Doc   = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form  = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Form1 = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret']) . ";\r\n");
             $nm_saida->saida("          var Obj_Doc   = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form  = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Form1 = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['form_psq_ret'] . "." . str_replace("_autocomp", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret']) . ";\r\n");
          $nm_saida->saida("          var Obj_Doc   = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['campo_psq_ret'] . "\");\r\n");
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
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['js_apos_busca'] . "();\r\n");
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
   $nm_saida->saida("      document.F5.action = \"grid_pedidos_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_pedidos']['reg_start']))
   {
       $nm_saida->saida("      $(document).ready(function(){\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailStatus('grid_pedidos')\",50);\r\n");
       $nm_saida->saida("         setTimeout(\"parent.scAjaxDetailHeight('grid_pedidos', $(document).innerHeight())\",50);\r\n");
       $nm_saida->saida("      })\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
 }
function fGestionaStock($iddet, $tipo=2)
{
$_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'on';
  
if(!empty($iddet))
{	
	if (strpos(strtolower($this->Ini->nm_tpbanco), "access") === false && !$this->Ini->sc_tem_trans_banco)
{
    $this->Db->BeginTrans();
    $this->Ini->sc_tem_trans_banco = true;
}

	
	$vsqldetalle = "select 
					cantidad,
					idpro,
					costop,
					valorpar,
					idbod,
					idpedid,
					unidadmayor,
					factor,
					(select p.fechaven from pedidos p where p.idpedido=idpedid) as fecha
					from 
					detallepedido
					where 
					iddet='".$iddet."'
					";
	
	 
      $nm_select = $vsqldetalle; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vDatosDetalle = array();
      $this->vdatosdetalle = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vDatosDetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vdatosdetalle[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vDatosDetalle = false;
          $this->vDatosDetalle_erro = $this->Db->ErrorMsg();
          $this->vdatosdetalle = false;
          $this->vdatosdetalle_erro = $this->Db->ErrorMsg();
      } 
;
	
	if(isset($this->vdatosdetalle[0][0]))
	{
		$vcantidad = $this->vdatosdetalle[0][0];
		$vidpro    = $this->vdatosdetalle[0][1];
		$vcosto    = $this->vdatosdetalle[0][2];
		$vvalorpar = $this->vdatosdetalle[0][3];
		$vidbod    = $this->vdatosdetalle[0][4];
		$vnumfac   = $this->vdatosdetalle[0][5];
		$vtipo     = $tipo;
		$vdetalle  = "Venta-Pedido";
		$vidmov    = 1;
		$vfecha    = $this->vdatosdetalle[0][8];
		$vunidadmayor = $this->vdatosdetalle[0][6];
		$vfactor   = $this->vdatosdetalle[0][7];
		
		if($vunidadmayor!="SI" and $vfactor > 0)
		{
			$vcantidad = $vcantidad/$vfactor;
		}
	}
	
	
	if($tipo==2)
	{
		$vsqlinv = "INSERT 
			  inventario 
			  SET 
			  fecha		   ='".$vfecha."', 
			  cantidad	   =(".$vcantidad."*-1), 
			  idpro		   ='".$vidpro."', 
			  costo		   ='".$vcosto."',
			  valorparcial ='".$vvalorpar."', 
			  idbod        ='".$vidbod."', 
			  tipo		   ='".$vtipo."', 
			  detalle	   ='".$vdetalle."', 
			  idmov		   ='".$vidmov."',
			  idped 	   ='".$vnumfac."', 
			  iddetalle	   ='".$iddet."'
			  ";

		
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen-$vcantidad
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,sum(cantidad) as cantidad,sum(precio) as precio from detallecombos where idcombo='".$vidpro."' group by idproducto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
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
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$sqlcostoprod = "select costomen from productos where idprod='".$vidpro2."'";
						 
      $nm_select = $sqlcostoprod; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vcostoprod = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vcostoprod[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vcostoprod = false;
          $this->vcostoprod_erro = $this->Db->ErrorMsg();
      } 
;
						
						if(isset($this->vcostoprod[0][0]))
						{
							$vsqlinv2 = "INSERT 
								  inventario 
								  SET 
								  fecha		   ='".$vfecha."', 
								  cantidad	   =(($vcantidad2*$vcantidad)*-1), 
								  idpro		   ='".$vidpro2."', 
								  costo		   ='".$this->vcostoprod[0][0]."',
								  valorparcial ='".$vprecio2."', 
								  idbod        ='".$vidbod."', 
								  tipo		   ='".$vtipo."', 
								  detalle	   ='".$vdetalle."', 
								  idmov		   ='".$vidmov."',
								  idped  	   ='".$vnumfac."', 
								  iddetalle	   ='".$iddet."',
								  idcombo      ='".$vidpro."'
								  ";

							
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

							$vsqlstock2="UPDATE 
								   productos 
								   SET 
								   stockmen = (stockmen-($vcantidad2*$vcantidad))
								   WHERE 
								   idprod='".$vidpro2."'
								   ";

							
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
							
						}
					}
				}
			}
		}
	}
	
	if($tipo==1)
	{
		 
      $nm_select = "select escombo from productos where idprod='".$vidpro."'"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiEsCombo = array();
      $this->vsiescombo = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->vSiEsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vsiescombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiEsCombo = false;
          $this->vSiEsCombo_erro = $this->Db->ErrorMsg();
          $this->vsiescombo = false;
          $this->vsiescombo_erro = $this->Db->ErrorMsg();
      } 
;
		
		if(isset($this->vsiescombo[0][0]))
		{
			$vescombo = $this->vsiescombo[0][0];
			
			if($vescombo=='SI')
			{
				 
      $nm_select = "select idproducto,sum(cantidad) as cantidad,sum(precio) as precio from detallecombos where idcombo='".$vidpro."'  group by idproducto"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vItemsCombo = array();
      $this->vitemscombo = array();
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
                        $this->vItemsCombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                        $this->vitemscombo[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vItemsCombo = false;
          $this->vItemsCombo_erro = $this->Db->ErrorMsg();
          $this->vitemscombo = false;
          $this->vitemscombo_erro = $this->Db->ErrorMsg();
      } 
;
				if(isset($this->vitemscombo[0][0]))
				{
					for($i=0;$i<count($this->vitemscombo );$i++)
					{
						$vidpro2    = $this->vitemscombo[$i][0];
						$vcantidad2 = $this->vitemscombo[$i][1];
						$vprecio2   = $this->vitemscombo[$i][2];
						
						$vsqlinv2="delete 
								  from 
								  inventario 
								  where 
									  idpro='".$vidpro2."' 
								  and idped='".$vnumfac."' 
								  and detalle like '%Venta%' 
								  and iddetalle='".$iddet."'
								  and idcombo='".$vidpro."'
								  ";

						
     $nm_select = $vsqlinv2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;

						$vsqlstock2="UPDATE 
							   productos 
							   SET 
							   stockmen = stockmen+($vcantidad*$vcantidad2) 
							   WHERE 
							   idprod='".$vidpro2."'
							   ";

						
     $nm_select = $vsqlstock2; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
					}
				}
			}
		}
		
		
		$vsqlinv="delete 
				  from 
				  inventario 
				  where 
				      idpro='".$vidpro."' 
				  and idped='".$vnumfac."' 
				  and detalle like '%Venta%' 
				  and iddetalle='".$iddet."'
				  ";
		
		
     $nm_select = $vsqlinv; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
		
		$vsqlstock="UPDATE 
			   productos 
			   SET 
			   stockmen = stockmen+$vcantidad 
			   WHERE 
			   idprod='".$vidpro."'
			   ";

		
     $nm_select = $vsqlstock; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             if ($this->Ini->sc_tem_trans_banco)
             {
                 $this->Db->RollbackTrans(); 
                 $this->Ini->sc_tem_trans_banco = false;
             }
             exit;
         }
         $rf->Close();
      ;
	}
	
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

}
$_SESSION['scriptcase']['grid_pedidos']['contr_erro'] = 'off';
}
}
?>
